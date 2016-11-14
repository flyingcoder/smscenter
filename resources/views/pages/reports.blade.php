@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-11">

                <h1 class="page-header">
                    SMS Logs
                </h1>
                        Messages Sent: <input type="" name="messages_sent"><br><br>
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
                            <td><a href="profile.html"> Maria Makiling</a></td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-complete label label-default">Delivered</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        <tr>
                            <td><a href="profile.html"> Maria Makiling</a></td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-complete label label-default">Delivered</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        <tr>
                            <td><a href="profile.html"> Maria Makiling</a></td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-danger label label-default">Failed</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        </tbody>
                    </table>

                    Updated Accounts: <input type="" name="updated_accounts"><br><br>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Parents' Name</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th>Date Updated</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td><a href="profile.html"> Maria Makiling</a></td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-complete label label-default">Completed</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        <tr>
                            <td><a href="profile.html"> Maria Makiling</a></td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-warning label label-default">On going</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        <tr>
                            <td><a href="profile.html"> Maria Makiling</a></td>
                            <td class="center">09356659624</td>
                            <td class="center">
                                <span class="label-warning label label-default">On going</span>
                            </td>
                            <td class="center">01/01/2016</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>




        </div>
        <!-- /.row -->


        <hr>

    </div>
@endsection