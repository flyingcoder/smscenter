@extends('layouts.main')


@section('content')
	<div id="wrap">
        <div class="container container-space">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 style="color:#524B4B">Guardian & Child Registration</h1>
 
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-4 col-sm-offset-1">
            <form action="" role="form" method="post">
            <h2 style="color:#524B4B; font-family:Century Gothic; font-size:26px">Create Registration</h2>
                
                 <div class="form-group has-feedback">
                    <label for="register_guardianname" class="control-label"> Guardian's Name </label>
                    <input type="text" class="form-control" id="register_guardianname" name="register_guardianname" value="">
                </div>
               
                <div class="form-group">
                    <label for="register_phonenumber" class="control-label"> Phone Number </label>
                    <input type="integer" class="form-control" id="register_phonenumber" name="register_phonenumber">
                </div>

                <div class="form-group">
                    <label for="register_childsname" class="control-label"> Child's Name </label>
                    <input type="text" class="form-control" id="register_childsname" name="register_childsname">
                </div>
                
                <div class="form-group">
                    <label for="barangay" class="control-label"> Select Barangay <br></label>
                            <select class="field">
                                <option value="">----</option>
                                <option value="">From Brgy. Suarez</option>
                                <option value="">From Brgy. Tubod</option>
                            </select>
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
@endsection

