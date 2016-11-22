    @extends('layouts.main')

    @section('content')
        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-12">
                    
                    <h1 class="page-header">
                        Registration
                    </h1>
                    
                    <div class="row">
                        <div class="col-md-4 col-sm-offset-1">
                        <form action="{{url('register-child')}}" role="form" method="post">
                            {!! csrf_field() !!}
                            <div class="form-group has-feedback">
    			                    <label for="name" class="control-label"> Child's Name </label>
    			                    <input type="text" class="form-control" id="name" name="name" value="" required>
    			                </div>

    			                <div class="form-group has-feedback">
    			                    <label for="birthday" class="control-label"> Child's Birthday </label>
    			                    <input type="text" id="datepicker" class="form-control" id="birthday" name="birthday" value="" placeholder="YYYY-MM-DD" required>
    			                </div>
    			               
    			                <div class="form-group">
    			                    <label for="parent" class="control-label"> Parent's Name </label>
    			                    <input type="text" class="form-control" id="parent" name="parent" required>
    			                </div>

    			                <div class="form-group">
    			                    <label for="phone" class="control-label" style="display: block"> Phone Number </label>
    			                    <input type="tel" class="form-control" id="phone" style="width: 360px;" name="phone_number" autocomplete="off" required>
    			                </div>

    			                <div class="form-group">
                                <label for="barangay" class="control-label"> Select Barangay <br></label>
                                        <select name="barangay" class="field" required>
                                            <option value="">----</option>
                                            <option value="Tambacan">From Brgy. Tambacan</option>
                                            <option value="Tubod">From Brgy. Tubod</option>
                                        </select>
                            	</div>
                        </div>
                            
                        <div class="col-md-4 col-sm-offset-1">
                        
                            <div class="form-group">
                                <label for="vaccines_covered" class="control-label"> Vaccine/s Covered</label><br>
                                    @foreach(App\Vaccine::all() as $value)
                                        <input type="checkbox" value="{{$value->id}}" id="bcg" name="vaccine[]"> {{$value->name}} <b>({{ $value->description }})</b><br>
                                    @endforeach
                            </div>

                             <div class="form-group">
                                <div class="col-xs-6 col-xs-push-6" align="right">
                                    <input type="hidden" name="action" value="register">
                                    <input style="font-family:Century Gothic" type="submit" value="Register" class="btn btn-default btn-lg">
                                </div>
                            </div>
                        </div>
                            
                        </form>
                    </div>
                    </div> 

                </div>
            </div>
        </div>
    @endsection

    @push('js')
    <script type="text/javascript">
    	$( function() {
    		@if(session('message'))
    			swal("{{ session('message') }}", 'New child registered!', 'success');
    		@endif

    	  });
    </script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('bower_components/intl-tel-input/build/js/intlTelInput.js') }}"></script>
    <script src="{{ asset('bower_components/intl-tel-input/build/js/utils.js') }}"></script>
    <script>
        $("#phone").intlTelInput({
            preferredCountries: ['ph']
        });
    </script>
    @endpush