@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-11">
                
                <h1 class="page-header">
                    Compose Message
                </h1>
                    <div class="box-content">
                            <form method="get" action="{{url('search')}}" role="form">
                               <div class="sort">
                               <br> Recipient's Barangay
                                    <select class="field" name="barangay">
                                        <option value="">Select Barangay</option>
                                        <option value="Suarez">From Brgy. Suarez</option>
                                        <option value="Tubod">From Brgy. Tubod</option>
                                    </select>
                                <br><br>
                            </div>
                            Search:
                            <input type="text" name="parent" required>
                            <input style="font-family:Century Gothic" type="submit" value="search" class="glyphicon glyphicon-search"> 
                            </form>
                        </div>

                        <br><br>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Parents' Name</th>
                            <th>Phone Number</th>
                            <th>Barangay</th>
                            <th>Status</th>
                            <th>Date Sent</th>
                        </tr>
                        </thead>
                        @if(isset($children))
                            @foreach($children as $child)
                                <tbody>
                                <tr>
                                    <form action="" method="POST">
                                   <td><input type="checkbox" value="{{ $child->id }}" name="child[]"></td> 
                                    </form>
                                    <td><a href="{{ url('/details')."/".$child->id }}">{{$child->parent}}</a></td>
                                    <td>{{$child->phone_number}}</td>
                                    <td>{{$child->barangay}}</td>
                                    <td class="center">
                                        <span class="label-warning label label-default">On going</span>
                                    </td>
                                    <td></td>
                                </tr>
                                </tbody>
                            @endforeach
                        @else
                        <tbody>
                        <tr>
                            <td><input type="checkbox"class="" id="" name="">
                            Maria Makiling</td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-warning label label-default">On going</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"class="" id="" name="">
                            Maria Makiling</td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-warning label label-default">On going</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"class="" id="" name="">
                            Maria Makiling</td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-warning label label-default">On going</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        </tbody>
                        @endif
                    </table>
                    <div class="col-md-offset-5">{{ $children->links() }}</div>
                    <div class="sort">
                            Type of Message <br>
                            <select class="field">
                                <option value="">Reminder</option>
                                <option value="">Recall</option>
                            </select>
                            <br><br>
                                <textarea rows="8" cols="100" resize="none" name="message" form="usrform"></textarea>
                    <br><br>
                    <a class="btn btn-success" href="#">
                        <i class="glyphicon glyphicon-envelope icon-white"></i>
                        Send
                     </a>
                        </div>
                </div>
            </div>




        </div>
        
        <!-- /.row -->


        <hr>

    </div>
@endsection