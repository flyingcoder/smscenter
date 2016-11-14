@extends('layouts.main')
@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">


            <!-- Blog Entries Column -->
            <div class="col-md-11">

                <h1 class="page-header">
                   Vaccination Record
                </h1>
                        Search:
                        <input type="search" name="action" value="">
                        <input style="font-family:Century Gothic" type="submit" value="search" class="glyphicon glyphicon-search">
                        <br>
                        <br>
                        Parent's Name: <input type="" name="parents_name"><br><br>
                        Child's Name: <input type="" name="childs_name"><br><br>
                        Phone Number: <input type="" name="phone_number"><br>
                        <br>
                        <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Vaccine</th>
                            <th>Status</th>
                            <th>Vaccination Date</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($child->vaccineCovered as $vaccine)
                        <tr>
                            <td>{{ $vaccine->name }}</td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr> 

                        @endforeach
                        </tbody>
                    </table>
                
                    <a class="btn btn-success" href="#">
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        Edit
                    </a>
                    <a class="btn btn-success" href="#">
                        <i class="glyphicon glyphicon-ok icon-white"></i>
                        Update
                    </a>

                </div>
            </div>




        </div>
@endsection