@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-11">
                <h1 class="page-header">
                    Vaccination Record
                </h1>
                    <div class="box-content">
                         <form action="{{ url('search') }}" method="GET" id="search">
                            <div class="sort">
                               <br> Recipient's Barangay
                                     <select class="field" name="barangay" id="barangay">
                                        <option value="">Select Barangay</option>
                                        @if(isset($_GET['barangay']))
                                        <option value= "Tambacan" {{ $_GET['barangay'] == 'Tambacan' ? 'selected' : '' }}>From Brgy. Tambacan</option>
                                        <option value="Tubod" {{ $_GET['barangay'] == 'Tubod' ? 'selected' : '' }}>From Brgy. Tubod</option>
                                        @else
                                         <option value="Tambacan">From Brgy. Tambacan</option>
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
                        <thead>
                        <tr>
                            <th>Parents' Name</th>
                            <th>Phone Number</th>
                            <th>Barangay</th>
                            <th>Status</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        @if(isset($children))
                            @foreach($children as $child)
                                <tbody>
                                <tr>    
                                    <td><a href="{{ url('/details')."/".$child->id }}">{{$child->parent}}</a></td>
                                    <td>{{$child->phone_number}}</td>
                                    <td>{{$child->barangay}}</td>
                                    <?php $count = count($child->vaccineCovered()->wherePivot('status', 'ongoing')->get()); ?>
                                    <td class="center">
                                        <span class="label-warning label label-default">{{ $count > 0 ? $count." ongoing vaccine to be covered"  : "Completed" }}</span>
                                    </td>
                                    <td><a onclick="deleteData({{ $child->id }})" style="cursor: pointer;"><span class="glyphicon glyphicon-trash"></span></a></td>
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
                </div>
            </div>




        </div>
        
        <!-- /.row -->


        <hr>

    </div>
@endsection

@push('js')
<script type="text/javascript">

     function deleteData(id) {
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.get('/delete/child/' +id).then(function(result){
                    swal({
                        title: 'Deleted',
                        text: 'Deletion is successful!',
                        type: 'success',
                    }).then(function () {
                        window.location.reload()
                    })
                })
            })
            
        }
</script>
@endpush