@extends('layouts.app')

@push('title') New Team @endpush

@section('content')
    <div class="row" id="addteam">
    	<div class="col-md-6 col-md-offset-3">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Create new team</h3>
			  </div>
			  <div class="panel-body">
			    <form role="form" method="POST" v-on:submit.prevent="AddNewTeam">
			    	 <div class="alert alert-danger" v-if="!isValid">
						<ul>
							<li v-show="!validation.teamname">Team Name field is required.</li>
						</ul>
					  </div>
				     <fieldset class="form-group">
					    <label for="teamname">Your team name</label>
					    <input type="text"  v-model="newTeam.teamname" class="form-control" id="teamname">
					  </fieldset>
			    	  <fieldset class="form-group">
					    <label for="description">Description <em>optional</em></label>
					    <textarea  v-model="newTeam.description" class="form-control" id="description" rows="3"></textarea>
					  </fieldset>
					  <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" v-if="!edit">Submit</button>
				  	  <button :disabled="!isValid" class="btn btn-primary pull-right" type="submit" v-if="edit" @click.prevent="editContact(newContact.id)">Edit User</button>
			    </form>
			  </div>
			</div>
    	</div>
    </div>
	
@endsection

@push('script')
<script type="text/javascript">

	var vmteam = new Vue({
		http: {
	      root: '/root',
	      headers: {
	        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
	      }
	    },

		el: '#addteam',

		data: {
			newTeam: {
				id: '',
				teamname: '',
				description: ''
			},

			edit: false
		},

		methods: {

			/*editTeam: function (id) {

				var contact = this.newContact

				this.newContact = {firstname: '', lastname: '', phone: '', email: '', address: ''}

				this.$http.patch('/api/contacts/' + id, contact, function (data) {
					swal("Ahoy!","You have successfully edited your contact " + contact.firstname,"success");
				})

				this.edit = false

			},*/

			AddNewTeam: function () {
				// User input
				var team = this.newTeam

				// Clear form input
				this.newTeam = {teamname:'', description:'' }

				// Send post request
				this.$http.post('/api/team/', team).then(function (data) {
					if(data.ok){
						swal("Ahoy!", "Team " + data.teamname + " is successfully added ","success");
					} else {
						if(data[0])
							swal("Oops!", data[0],"error");
					}
				})
			}

		},

		computed: {
			validation: function () {
				return {
					teamname: !!this.newTeam.teamname.trim()
				}
			},

			isValid: function () {
				var validation = this.validation
				return Object.keys(validation).every(function (key) {
					return validation[key]
				})
			}
		}
	});
</script>
@endpush