@extends('layouts.main')

@section('content')
<br/><br/><br/>
	<div class="container">
				<div class="col-md-offset-3">
					<div class="container container-space">
				        <div class="row">
				            <div class="col-lg-12" align="center">
				                <h1 style="color:#524B4B"></h1>
				            </div>
				        </div>
			        <div class="row">
			            <div class="col-md-4 col-sm-offset-1">
			            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register-child') }}" >
			            {!! csrf_field() !!}
			            <h2 style="color:#524B4B; font-family:Century Gothic; font-size:26px">Register Child</h2>
			                
			                <div class="form-group has-feedback">
			                    <label for="name" class="control-label"> Child's Name </label>
			                    <input type="text" class="form-control" id="name" name="name" value="" required>
			                </div>

			                <div class="form-group has-feedback">
			                    <label for="birthday" class="control-label"> Child's Birthday </label>
			                    <input type="text" id="datepicker" class="form-control" id="birthday" name="birthday" value="" required>
			                </div>
			               
			                <div class="form-group">
			                    <label for="parent" class="control-label"> Parent's Name </label>
			                    <input type="text" class="form-control" id="parent" name="parent" required>
			                </div>

			                <div class="form-group">
			                    <label for="phone_number" class="control-label"> Phone Number </label>
			                    <input type="integer" class="form-control" id="phone_number" name="phone_number" required>
			                </div>      
			                
			                <div class="form-group">
			                    <label for="address" class="control-label"> Select Barangay <br></label>
			                            <select name="barangay" class="field" required>
			                                <option value="">----</option>
			                                <option value="Suarez">From Brgy. Suarez</option>
			                                <option value="Tubod">From Brgy. Tubod</option>
			                            </select>
			                </div>

			                 <div class="form-group">
			                    <div class="col-xs-6 col-xs-push-6" align="right">
			                        <input style="font-family:Century Gothic" type="submit" value="Register" class="btn btn-success btn-lg">
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
	    $( "#datepicker" ).datepicker({
	    	dateFormat: "yy-mm-dd"
	    });
	  });
</script>
@endpush