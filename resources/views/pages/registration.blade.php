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
                    <form action="" role="form" method="post">
                        
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
                            <label for="barangay" class="control-label"> Select Barangay <br></label>
                                    <select name="barangay" class="field" required>
                                        <option value="">----</option>
                                        <option value="">From Brgy. Suarez</option>
                                        <option value="">From Brgy. Tubod</option>
                                    </select>
                        	</div>
                    </div>
                        
                    <div class="col-md-4 col-sm-offset-1">
                    
                        <div class="form-group">
                            <label for="vaccines_covered" class="control-label"> Vaccine/s Covered</label><br>
                            <input type="checkbox" class="" id="bcg" name=""> BCG <br>
                            <input type="checkbox" class="" id="opv1" name=""> OPV 1st dose <br>
                            <input type="checkbox" class="" id="opv2" name=""> OPV 2nd dose <br>
                            <input type="checkbox" class="" id="opv3" name=""> OPV 3rd dose <br>
                            <input type="checkbox" class="" id="penta1" name=""> PENTAVALENT 1st dose <br>
                            <input type="checkbox" class="" id="penta2" name=""> PENTAVALENT 2nd dose <br>
                            <input type="checkbox" class="" id="penta3" name=""> PENTAVALENT 3rd dose <br>
                            <input type="checkbox" class="" id="hepab" name=""> Hepatiis B <br>
                            <input type="checkbox" class="" id="measles" name=""> Measles <br>
                            <input type="checkbox" class="" id="pcv1" name=""> PCV 13 1st dose <br>
                            <input type="checkbox" class="" id="pcv2" name=""> PCV 13 2nd dose <br>
                            <input type="checkbox" class="" id="pcv3" name=""> PCV 13 3rd dose <br>
                            <input type="checkbox" class="" id="mmr1" name=""> MMR 1st dose <br>
                            <input type="checkbox" class="" id="mmr2" name=""> MMR 2nd dose <br>
                            <input type="checkbox" class="" id="ipv" name=""> IPV <br>

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
	
	    $( "#datepicker" ).datepicker({
	    	dateFormat: "yy-mm-dd"
	    });
	  });
</script>
@endpush