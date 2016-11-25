@extends('layouts.main')
@section('content')
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-11">

                <h1 class="page-header">
                    SMS Logs
                </h1>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>Phone Number</th>
                            <th>Vaccine</th>
                            <th>Standard Schedule</th>
                            <th>Type</th>
                            <th>Sending Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($records as $key => $sched)
                        <?php $child = App\Child::find($sched->child_id); ?>
                        <?php $vaccine = App\Vaccine::find($sched->vaccine_id); ?>
                        <tr>
                            <td><a href="/details/{{ $sched->child_id }}">{{ $child->phone_number }}</a></td>
                            <td class="center">{{ $vaccine->name }}</td>
                            <td class="center">{{ $vaccine->description }}</td>
                            <td class="center">{{ $sched->type }}</td>
                            <td class="center">{{ $sched->remind_date }}</td>
                        </tr>

                        @endforeach
                        </tbody>
                    </table>

                     <div class="col-md-offset-5">{{ $records->links() }}</div>
                </div>
            </div>




        </div>
        <!-- /.row -->


        <hr>

    </div>
@endsection