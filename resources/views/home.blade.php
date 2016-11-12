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

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left">
                                <label class="col-md-1 control-label">Name</label>

                                <div class="col-md-4">
                                    <input type="name" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                            @if(isset($child))
                                
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
                                        @foreach($child as $children)
                                            <tr>
                                                <form action="" method="POST">
                                                   <td><input type="checkbox" value="{{ $children->id }}" name="children[]"></td> 
                                                </form>
                                                <td><a href="{{ url('/child')."/".$children->id }}">{{$children->parent}}</a></td>
                                                <td>{{$children->phone_number}}</td>
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
                            {{ $child->links() }}
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection