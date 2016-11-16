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
                                        <option value="suarez">From Brgy. Suarez</option>
                                        <option value="tubod">From Brgy. Tubod</option>
                                    </select>
                                <br><br>
                            </div>
                            Search:
                            <input type="search" name="action" value="">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        </div>

                        <br><br>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Parents' Name</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Date Sent</th>
                        </tr>
                        </thead>
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
                    </table>
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

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#barangay').change(function () {
            $('#search').submit();
        })
    })
</script>
@endpush