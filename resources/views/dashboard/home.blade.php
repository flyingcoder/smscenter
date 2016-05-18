@extends('layouts.app')

@push('title') Dashboard @endpush

@section('content')
    <div class="row" id="sendsms">
    	<!-- <div class="col-md-6">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Inbox</h3>
			  </div>
			  <div class="panel-body">
			   	<table>
			   		
			   	</table>
			  </div>
			</div>
    	</div> -->
    	<div class="col-md-6 col-md-offset-3">
    		<div class="panel panel-default">
			  <div class="panel-heading">
				<h3 class="panel-title">Send a message <small>(note: Trial version can only send sms to verified numbers only)</small></h3>
			  </div>
			  <div class="panel-body">
			    <form role="form" v-on:submit.prevent="sendMessage">
				    <div class="alert alert-danger" v-if="!isValid">
						<ul>
							<li v-show="!validation.phone">Phone Number field is required.</li>
							<li v-show="!validation.body">Message field is required.</li>
						</ul>
					  </div>
				     <fieldset class="form-group">
					    <label for="phone">Phone #</label>
					    <input v-model="Sms.phone" type="text" class="form-control" id="phone">
					  </fieldset>
			    	  <fieldset class="form-group">
					    <label for="exampleTextarea">Message</label>
					    <textarea v-model="Sms.body" class="form-control" id="exampleTextarea" rows="3"></textarea>
					  </fieldset>
					  <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" >Send</button>
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

		el: '#sendsms',

		data: {
			Sms: {
			  phone: '',
			  body: ''
			}
		},

		methods: {

			sendMessage: function () {
				this.Sms.phone = $('#phone').intlTelInput("getNumber");
				
				var text = this.Sms;

				this.Sms = {phone: '', body: ''}

			  	vm.$http.post('/api/sms', text).then(function (response) {
		  			swal("Beep! beep! beep!", "Your message will be delivered shortly", "success"); 
			  	}, function (response) {
			  		swal("Oops! "+response.status+" Error code occurs", response.statusText, "error");
			  	})
			}

		},

		computed: {
			validation: function () {
				return {
					phone: !!this.Sms.phone.trim(),
					body: !!this.Sms.body.trim()
				}
			},

			isValid: function () {
				var validation = this.validation
				return Object.keys(validation).every(function (key) {
					return validation[key]
				})
			}
		}
	})
</script>
@endpush