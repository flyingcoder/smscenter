@extends('layouts.app')

@push('title') Phone Book @endpush

@section('content')
    <div class="row" id="contacts">
    	<div class="col-md-6">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title"> Contacts </h3>
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
			     		<tr transition="expand" v-for="con in contacts">
			     			<td style="width:10px">@{{ $index + 1 }}</a></td>
			     			<td>@{{ con.firstname + " " + con.lastname}}</td>
			     			<td>@{{ con.email }}</td>
			     			<td>@{{ con.phone }}</td>
			     			<td>
			     				<a href="#" @click.prevent="sendMessage(con.phone,con.firstname)"><i class="glyphicon glyphicon-envelope" style="color:green"></i></a>
			     				&nbsp;
			     				<a href="#" @click.prevent="showContact(con.id)"><i class="glyphicon glyphicon-edit"></i></a>
			     				&nbsp;
			     				<a href="#" @click.prevent="removeContact(con.id)"><i class="glyphicon glyphicon-trash" style="color:red"></i></a>
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
					Contacts
				</h3>
			  </div>
			  <div class="panel-body">
			   	<form role="form" method="POST" v-on:submit.prevent="AddNewContact">

			   	  <div class="alert alert-danger" v-if="!isValid">
					<ul>
						<li v-show="!validation.firstname">First Name field is required.</li>
						<li v-show="!validation.lastname">Last Name field is required.</li>
						<li v-show="!validation.email">Input a valid email address.</li>
						<li v-show="!validation.phone">Phone Number field is required.</li>
						<li v-show="!validation.address">Address field is required.</li>
					</ul>
				  </div>
			   	  <div class="row">
			   	  	<fieldset class="form-group col-md-6">
					  <label for="firstname">First Name</label>
					  <input v-model="newContact.firstname" type="text" class="form-control" id="firstname" name="firstname">
					</fieldset>
					 <fieldset class="form-group col-md-6">
					    <label for="lastname">Last Name</label>
					    <input v-model="newContact.lastname" type="text" class="form-control" id="lastname" name="lastname">
					  </fieldset>
			   	  </div>
			   	  <div class="row">
			   	  	<fieldset class="form-group col-md-6">
					  <label for="email">Email</label>
					  <input v-model="newContact.email" type="email" class="form-control" id="email" name="email">
					</fieldset>
					<fieldset class="form-group col-md-6">
					  <label for="phone">Phone</label>
					  <input v-model="newContact.phone" type="tel" class="form-control" id="phone" name="phone">
					</fieldset>
			   	  </div>
				  <fieldset class="form-group">
					  <label for="address">Address</label>
					  <input v-model="newContact.address" type="text" class="form-control" id="address" name="address">
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
	var emailRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

	var vm = new Vue({
		http: {
	      root: '/root',
	      headers: {
	        'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
	      }
	    },

		el: '#contacts',

		data: {
			newContact: {
				id: '',
				user_id: {{ Auth::user()->id }},
				firstname: '',
				lastname: '',
				email: '',
				phone: '',
				address: ''
			},

			contacts: '',

			message: false,

			success: false,

			edit: false
		},

		methods: {

			sendMessage: function (num, name) {
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
			},
		
			fetchContact: function () {
				this.$http.get('/api/contacts', function (data) {
					this.$set('contacts', data)
				})
			},
		
			removeContact: function (id) {
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
				  	vm.$http.delete('/api/contacts/' + id)
				    swal(
				      'Deleted!',
				      'Your file has been deleted.',
				      'success'
				    );
				    vm.fetchContact()
				  }
				})

				
			},

			editContact: function (id) {
				this.newContact.phone = $('#phone').intlTelInput("getNumber");

				var contact = this.newContact

				this.newContact = {firstname: '', lastname: '', phone: '', email: '', address: ''}

				this.$http.patch('/api/contacts/' + id, contact, function (data) {
					swal("Ahoy!","You have successfully edited your contact " + contact.firstname,"success");
				})

				vm.fetchContact()

				this.edit = false

			},

			showContact: function (id) {
				this.edit = true

				this.$http.get('/api/contacts/' + id, function (data) {
					$("#phone").intlTelInput("setNumber", data.phone);
					this.newContact.id = data.id,
					this.newContact.user_id = data.user_id,
					this.newContact.firstname = data.firstname,
					this.newContact.lastname = data.lastname,
					this.newContact.email = data.email,
					this.newContact.address = data.address,
					this.newContact.phone = $("#phone").intlTelInput("getNumber", intlTelInputUtils.numberFormat.NATIONAL);
				})
			},

			AddNewContact: function () {

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
					firstname: !!this.newContact.firstname.trim(),
					lastname: !!this.newContact.lastname.trim(),
					email: emailRE.test(this.newContact.email),
					phone: !!this.newContact.phone.trim(),
					address: !!this.newContact.address.trim()
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
			this.fetchContact()
		}
	});
</script>
@endpush