@extends('layouts.app')

@push('title') Admin @endpush

@section('content')
    <div class="row" id="admin">
    	<div class="col-md-6">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title"> Users </h3>
			  </div>
			  <div class="panel-body">
			     <table class="table">
			     	<thead>
			     		<tr>
			     			<th style="width:10px">#</th>
			     			<th>Name</th>
			     			<th>Email</th>
			     			<th>Phone</th>
			     			<th>Action</th>
			     		</tr>
			     	</thead>
			     	<tbody>
			     		<tr transition="expand" v-for="user in users">
			     			<td style="width:10px">@{{ $index + 1 }}</a></td>
			     			<td>@{{ user.name}}</td>
			     			<td>@{{ user.email }}</td>
			     			<td>@{{ user.phone }}</td>
			     			<td>
			     				<a href="#" @click.prevent="sendMessage(user.phone,user.name)"><i class="glyphicon glyphicon-envelope" style="color:green"></i></a>
			     				&nbsp;
			     				<a href="#" @click.prevent="showUser(user.id)"><i class="glyphicon glyphicon-edit"></i></a>
			     				&nbsp;
			     				<a href="#" @click.prevent="removeUser(user.id)"><i class="glyphicon glyphicon-trash" style="color:red"></i></a>
			     			</td>
			     		</tr>
			     	</tbody>
			     </table>
			  </div>
			</div>
    	</div>
    	<div class="col-md-6">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">
					<span v-if="!edit"> Create </span> 
					<span v-if="edit"> Edit </span> 
					User
				</h3>
			  </div>
			  <div class="panel-body">
			   	<form role="form" method="POST" v-on:submit.prevent="AddNewUser">

			   	      <div class="alert alert-danger" v-if="!isValid">
						<ul>
							<li v-show="!validation.name">Name Number field is required.</li>
							<li v-show="!validation.phone">Phone Number field is required.</li>
							<li v-show="!validation.email">Input a valid email address.</li>
						</ul>
					  </div>
				     <fieldset class="form-group">
					    <label for="name">Name</label>
					    <input v-model="newUser.name" type="text" class="form-control" id="name">
					  </fieldset>
					  <fieldset class="form-group">
					    <label for="email">Email</label>
					    <input v-model="newUser.email" type="email" class="form-control" id="email">
					  </fieldset>
					  <fieldset class="form-group">
					    <label for="phone">Phone</label>
					    <input v-model="newUser.phone" type="text" class="form-control" id="phone">
					  </fieldset>
				  	  <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" v-if="!edit">Submit</button>
				  	  <button :disabled="!isValid" class="btn btn-primary pull-right" type="submit" v-if="edit" @click.prevent="editUser(newUser.id)">Edit User</button>
				</form>
			  </div>
			</div>
    	</div>
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

		el: '#admin',

		data: {
			newUser: {
				id: '',
				name: '',
				email: '',
				phone: ''
			},

			message: false,

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
		
			fetchUser: function () {
				this.$http.get('/api/user', function (data) {
					this.$set('users', data)
				})
			},
		
			removeUser: function (id) {
				swal({
				  title: 'Are you sure?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  confirmButtonText: 'Yes, delete it!'
				}).then(function(isConfirm) {
				  if (isConfirm) {
				  	vm.$http.delete('/api/user/' + id)
				    swal(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    );
				    vm.fetchUser()
				  }
				})

				
			},

			editUser: function (id) {
				this.newUser.phone = $('#phone').intlTelInput("getNumber");

				var user = this.newUser

				this.newUser = {name: '', phone: '', email: ''}

				this.$http.patch('/api/user/' + id, user, function (data) {
					swal("Ahoy!","You have successfully edited the user","success");
				})

				vm.fetchUser()

				this.edit = false

			},

			showUser: function (id) {
				this.edit = true

				this.$http.get('/api/user/' + id, function (data) {
					$("#phone").intlTelInput("setNumber", data.phone);
					this.newUser.id = data.id,
					this.newUser.name = data.name,
					this.newUser.email = data.email,
					this.newUser.phone = $("#phone").intlTelInput("getNumber", intlTelInputUtils.numberFormat.NATIONAL);
				})
			},

			AddNewUser: function () {

				this.newContact.phone = $('#phone').intlTelInput("getNumber");
				// User input
				var contacts = this.newContact

				// Clear form input
				this.newContact = {firstname:'', lastname:'', email:'', phone:'', address:'' }

				// Send post request
				this.$http.post('/api/contacts/', contacts, function (data) {
					swal("Ahoy!",data.firstname + " is successfully added to your contacts","success");
					vm.fetchContact()
				})
			}

		},

		computed: {
			validation: function () {
				return {
					name: !!this.newUser.name.trim(),
					email: emailRE.test(this.newUser.email),
					phone: !!this.newUser.phone.trim()
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
			this.fetchUser()
		}
	});
</script>
@endpush