@extends('layouts.app')

@push('title') Team @endpush

@section('content')
    <div class="row" id="team">
    	<div class="col-md-6 @if(!Auth::user()->isAdmin()) col-md-offset-3 @endif">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title"> List of team members </h3>
			  </div>
			  <div class="panel-body">
			     <table class="table">
			     	<thead>
			     		<tr>
			     			<th style="width:10px">#</th>
			     			<th>Name</th>
			     			<th>Email</th>
			     			<th>Phone</th>
			     			<th>Role</th>
			     			<th>Action</th>
			     		</tr>
			     	</thead>
			     	<tbody>
			     		<tr transition="expand" v-for="member in teams">
			     			<td style="width:10px">@{{ $index + 1 }}</a></td>
			     			<td>@{{ member.name }}</td>
			     			<td>@{{ member.email }}</td>
			     			<td>@{{ member.phone }}</td>
			     			<td>@{{ member.role }}</td>
			     			<td>
			     				<a href="#" @click.prevent="sendMessage(member.phone,member.name)"><i class="glyphicon glyphicon-envelope" style="color:green"></i></a>
			     				&nbsp;
			     				@if(Auth::user()->isAdmin())
			     				<a href="#" @click.prevent="removeMember(member.id,this.newMember.teamid)"><i class="glyphicon glyphicon-trash" style="color:red"></i></a>
			     				@endif
			     			</td>
			     		</tr>
			     	</tbody>
			     </table>
			  </div>
			</div>
    	</div>
    	@if(Auth::user()->isAdmin())
    	<div class="col-md-6">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">
					Invite Member
				</h3>
			  </div>
			  <div class="panel-body">
			   	<form role="form" method="POST" v-on:submit.prevent="InviteMember">
			   		<div class="alert alert-danger" v-if="!isValid">
						<ul>
							<li v-show="!validation.email">Input a valid email address.</li>
						</ul>
					</div>
			   	  	<fieldset class="form-group">
					  <label for="email">Email</label>
					  <input v-model="newMember.email" type="email" class="form-control" id="email" name="email">
					</fieldset>
				  <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" v-if="!edit">Submit</button>
				</form>
			  </div>
			</div>
    	</div>
    	@endif
    </div>
	
@endsection

@push('script')
<script type="text/javascript">
	var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

	var vm = new Vue({
		http: {
	      root: '/root',
	      headers: {
	        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
	      }
	    },

		el: '#team',

		data: {
			newMember: {
				id: '',
				email: '',
				teamid: ''
			},

			success: false,

			edit: false
		},

		methods: {

			sendMessage: function (num, name) {
				if(num){
					swal({
					  title: "Send msg to " + name,
					  input: 'text',
					  confirmButtonText: "Send",
					  showCancelButton: true,
					  inputValidator: function(value) {
					    return new Promise(function(resolve, reject) {
					      if (value) {
					        swal.enableLoading();
						    setTimeout(function() {
						      resolve();
						    }, 2000);
					      } else {
					        reject('You need to write something!');
					      }
					    });
					  }
					}).then(function(msg) {
					  if (msg) {
					  	var data = { phone: num, body: msg }
					  	vm.$http.post('/api/sms', data).then(function (response) {
				  			swal("Beep! beep! beep!", "Your message will be delivered shortly", "success"); 
					  	}, function (response) {
					  		swal("Oops! "+response.status+" Error code occurs", response.statusText, "error");
					  	})
					  }
					})
				} else {
					swal("Oops!", "You need a number to send a message", "error");
				}
				
			},

			fetchMember: function (id) {
				this.$http.get('/api/team/' + id + '/members', function (data) {
			    	this.$set('teams', data)
			    })
			},

			fetchTeam: function () {
				this.$http.get('/api/team', function (data) {
					if(data.size > 1){
						swal({
						  title: 'Select a team',
						  input: 'select',
						  inputOptions: data.content,
						  inputPlaceholder: 'Select Teams',
						  showCancelButton: false,
						  allowOutsideClick: false,
						  inputValidator: function(value) {
						    return new Promise(function(resolve, reject) {
						      if (value === "Select Teams") {
						        reject('You need to select a team :D');
						      } else {
						        resolve();
						      }
						    });
						  }
						}).then(function(result) {
						  vm.newMember.teamid = result;
						  if (result) {
						    	vm.fetchMember(result)
						  }
						})
					} else {
						vm.fetchMember(data.id)
					}
				})
			},
		
			removeMember: function (id, teamid) {
				swal({
				  title: 'Are you sure?',
				  text: "You want to remove this member?",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, remove it!'
				}).then(function(isConfirm) {
				  if (isConfirm) {
				  	vm.$http.get('/api/team/' + id + '/' + teamid)
				    swal(
				      'Removed!',
				      'Member is removed.',
				      'success'
				    );
				    vm.fetchMember(teamid)
				  }
				})

				
			},

			InviteMember: function () {
				// User input
				var member = this.newMember

				// Clear form input
				this.newMember = { email:'' }

				// Send post request
				this.$http.post('/api/member/', member).then( function (data) {
					swal("Ahoy!","Email is successfully added to your team","success");
					vm.fetchMember(member.teamid)
				}, function (data) {
					swal("Oops!","Please check either the email is registered or already a member","error");
					vm.fetchMember(member.teamid)
				})
			}

		},

		computed: {
			validation: function () {
				return {
					email: emailRE.test(this.newMember.email)
				}
			},

			isValid: function () {
				var validation = this.validation
				return Object.keys(validation).every(function (key) {
					return validation[key]
				})
			}
		},

		ready: function () {
			this.fetchTeam()
		}
	});
</script>
@endpush