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
                <form role="form" action="{{url('/update')."/".$child->id}}" method="POST">
                    {!!csrf_field()!!}
                        Search:
                        <input type="search" name="action" value="">
                        <input style="font-family:Century Gothic" type="submit" value="search" class="glyphicon glyphicon-search">
                        <br>
                        <br>
                        Parent's Name: <input type="" name="parent" value="{{$child->parent}}"><br><br>
                        Child's Name: <input type="" name="name" value="{{$child->name}}"><br><br>
                        Phone Number: <input type="" name="phone_number" value="{{$child->phone_number}}" >
                        <br><br>
                        <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Vaccine</th>
                            <th>Status</th>
                            <th>Vaccination Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($child->vaccineCovered as $vaccine)
                        <tr>
                            <td>{{ $vaccine->name }}</td>
                            @if($vaccine->pivot->status == 'covered')
                                <td class="center">
                                    <span class="label label-success">Finished</span>
                                </td>
                            @else
                                <td class="center">
                                    <span class="label label-danger">Unfinished</span>
                                </td>
                            @endif
                            
                            <td>{{ $vaccine->pivot->vaccination_range }}</td>
                            <td><a href="#" onclick="update({{ $child->id }}, {{ $vaccine->pivot->id }})"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        </tr> 

                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success" type="submit">Update Child's Informtation Details</button>
                </form>
                </div>
            </div>
        </div>
@endsection

@push('js')
<script type="text/javascript">
    function update(child_id, pivot_id) {
        swal({
          title: 'Update Status',
          input: 'select',
          inputOptions: {
            'covered': 'Finished',
            'ongoing': 'Unfinished'
          },
          inputPlaceholder: 'Select status',
          showCancelButton: true,
          inputValidator: function (value) {
            return new Promise(function (resolve, reject) {
              if (value != '') {
                resolve()
              }
            })
          }
        }).then(function (result) {
            var data = {
                child_id: child_id,
                pivot_id: pivot_id,
                status: result
            }
           $.get('/update/schedule-status', data).then(function (result) {
                window.location.reload()
            })
        })
       
    }
</script>
@endpush