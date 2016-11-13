
@extends('layouts.main')

@section('content')
<header class="intro" style="background-color: white">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                <div class="container" style="margin-top: 100px">
                    <h2 style="color: black; text-align: left">Information Details</h2>
                </div>
                            <form class="form-horizontal" method="POST" action="{{ url('/update')."/".$child->id }}">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Parent's name</label>

                                <div class="col-md-5">
                                    <input type="parent" class="form-control" name="parent" value="{{ $child->parent }}">

                                    @if ($errors->has('parent'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('parent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Child's name</label>

                                <div class="col-md-5">
                                    <input type="name" class="form-control" name="name" value="{{ $child->name }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <label class="col-md-2 control-label">Phone Number</label>

                                <div class="col-md-5">
                                    <input type="phone_number" class="form-control" name="phone_number" value="{{ $child->phone_number }}">

                                    @if ($errors->has('phone_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="btn btn-success col-md-2 col-md-offset-1" type="submit"> Update </button>
                            </div>
                        </form>
                </div>  
                <br/>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body" style="text-align:left; color: black">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Vaccine</th>
                                                <th>Status</th>
                                                <th>Vaccination Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    
                                        @foreach($child->vaccineCovered as $vaccine)
                                            <tbody>
                                            <tr>
                                                <td>{{ $vaccine->name }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                        </div>
                    </div>
                     <div>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@push('js')
<script type="text/javascript">
    $( function() {
        @if(session('message'))
            swal("{{ session('message') }}", 'New child registered!', 'success');
        @endif
      });
</script>
@endpush