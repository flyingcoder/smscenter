@extends('layouts.app')

@push('title') Profile @endpush

@section('content')
    <div class="row" id="profile">
    	<div class="col-md-6 col-md-offset-3">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">My Profile</small></h3>
			  </div>
			  <div class="panel-body">
			    <form role="form" v-on:submit.prevent="editProfile">
				    <div class="alert alert-danger" v-if="!isValid">
						<ul>
							<li v-show="!validation.name">Name Number field is required.</li>
							<li v-show="!validation.phone">Phone Number field is required.</li>
							<li v-show="!validation.email">Input a valid email address.</li>
						</ul>
					  </div>
				     <fieldset class="form-group">
					    <label for="name">Name</label>
					    <input v-model="newProfile.name" type="text" class="form-control" id="name">
					  </fieldset>
					  <fieldset class="form-group">
					    <label for="email">Email</label>
					    <input v-model="newProfile.email" type="email" class="form-control" id="email">
					  </fieldset>
					  <fieldset class="form-group">
					    <label for="phone">Phone</label>
					    <input v-model="newProfile.phone" type="text" class="form-control" id="phone">
					  </fieldset>
					  <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" >Update</button>
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

		el: '#profile',

		data: {
			newProfile: {
			  id: '',
			  name: '',
			  email: '',
			  phone: ''
			},

			edit: false
		},

		methods: {

			showProfile: function (id) {
				$("#phone").intlTelInput("setNumber", "{{ Auth::user()->phone }}");
				this.newProfile.id = {{ Auth::user()->id }},
				this.newProfile.name = "{{ Auth::user()->name }}",
				this.newProfile.email = "{{ Auth::user()->email }}",
				this.newProfile.phone = $("#phone").intlTelInput("getNumber", intlTelInputUtils.numberFormat.NATIONAL);
			},

			editProfile: function () {
				this.newProfile.phone = $('#phone').intlTelInput("getNumber");

				var profile = this.newProfile

				this.newProfile = {name: '', phone: '', email: ''}

				this.$http.patch('/api/user/' + profile.id, profile, function (data) {
					swal("Ahoy!","Your profile is updated ","success");
				})

				vm.showProfile()

			}

		},

		computed: {
			validation: function () {
				return {
					phone: !!this.newProfile.phone.trim(),
					name: !!this.newProfile.name.trim(),
					email: emailRE.test(this.newProfile.email),
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
			this.showProfile({{ Auth::user()->id }})
		}
	})
</script>
@endpush