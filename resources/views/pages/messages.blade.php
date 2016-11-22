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
                         <form action="{{ url('search') }}" method="GET" id="search">
                            <div class="sort">
                               <br> Recipient's Barangay
                                     <select class="field" name="barangay" id="barangay">
                                        <option value="">Select Barangay</option>
                                        @if(isset($_GET['barangay']))
                                        <option value="Suarez" {{ $_GET['barangay'] == 'Suarez' ? 'selected' : '' }}>From Brgy. Suarez</option>
                                        <option value="Tubod" {{ $_GET['barangay'] == 'Tubod' ? 'selected' : '' }}>From Brgy. Tubod</option>
                                        @else
                                         <option value="Suarez">From Brgy. Suarez</option>
                                        <option value="Tubod">From Brgy. Tubod</option>
                                        @endif
                                    </select>
                                <br><br>
                            </div>
                            Search:
                            @if(isset($_GET['parent']) && !empty($_GET['parent']))
                            <input type="search" name="parent" value="{{ $_GET['parent'] }}">
                            @else
                             <input type="search" name="parent" value="">
                            @endif
                           <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        </div>

                        <br><br>
                    <table class="table table-striped table-bordered responsive">
                     <form action="{{url('/send/bulk')}}" method="POST">
                        {{ csrf_field() }}
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
                                   <td><input type="checkbox" value="{{ $child->id }}" name="child[]" class="checkbox"></td> 
                                    <td>{{$child->parent}}</td>
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
                            <select class="field" name="message_type">
                                <option value="remind">Reminder</option>
                                <option value="recall">Recall</option>
                            </select>
                            <br><br>
                            <textarea rows="8" cols="100" resize="none" name="message" required>
                                
                            </textarea>
                    <br><br>
                    <button type="submit" class="btn btn-success">
                        <i class="glyphicon glyphicon-envelope icon-white"></i>
                        Send
                     </button>
                    </form>
                    </div>
                </div>
            </div>




        </div>
        
        <!-- /.row -->


        <hr>

    </div>
@endsection

@push('js')
<script type="text/javascript">
    function texts() {
        console.log($('.checkbox').val());
    }
</script>
@endpush