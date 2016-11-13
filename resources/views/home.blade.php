@extends('layouts.main')

@section('content')
<header class="intro" style="background-color: white">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                <div class="container">
                    <h2 style="color: black; text-align: left">Registrations</h2>
                </div>
                            <form class="form-horizontal" role="form" method="GET" action="{{ url('/search') }}">

                            <div class="form-group{{ $errors->has('parent') ? ' has-error' : '' }}" style="text-align:left">
                                <label class="col-md-2 control-label">Parent Name</label>

                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="parent" value="{{ old('parent') }}" required>

                                    @if ($errors->has('parent'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('parent') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            
                            </form>
                </div>
                <br/>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body" style="text-align:left; color: black">
                            @if(isset($children))
                                
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>index</th>
                                                <th>Parent Name</th>
                                                <th>Phone Number</th>
                                                <th>Status</th>
                                                <th>Date Sent</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                        @foreach($children as $child)
                                            <tr>
                                                <form action="" method="POST">
                                                   <td><input type="checkbox" value="{{ $child->id }}" name="child[]"></td> 
                                                </form>
                                                <td><a href="{{ url('/details')."/".$child->id }}">{{$child->parent}}</a></td>
                                                <td>{{$child->phone_number}}</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                               
                            @else
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Parent Name</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <th>Date Sent</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                     <div>
                            {{ $children->links() }}
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection