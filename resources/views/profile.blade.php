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


                        <tr>
                            <td> BCG </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr> 
                        <tr>
                            <td> OPV 1st dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                                                <tr>
                            <td> OPV 2nd dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                                                <tr>
                            <td> OPV 3rd dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> PENTAVALENT 1st dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> PENTAVALENT 2nd dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> PENTAVALENT 3rd dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> Hepatitis B </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> Measles </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> PCV 13 1st dose</td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> PCV 13 2nd dose</td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> PCV 13 3rd dose</td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> MMR 1st dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> MMR 2nd dose </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
                        <tr>
                            <td> IPV </td>
                            <td class="center">
                                <span class="label label-danger">Unfinished</span>
                            </td>
                            <td contenteditable="true" class="center"></td>
                        </tr>
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