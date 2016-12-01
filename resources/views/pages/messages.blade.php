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
                                        <option value="Tambacan" {{ $_GET['barangay'] == 'Tambacan' ? 'selected' : '' }}>From Brgy. Tambacan</option>
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
                     <form action="{{url('/send/bulk')}}" method="POST">
                        {{ csrf_field() }}
                        <thead>
                        <tr>
                            <th></th>
                            <th>Parents' Name</th>
                            <th>Phone Number</th>
                            <th>Barangay</th>
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
                            <select class="field" name="message_type" id="typeOfMessage">
                                <option >Select Options</option>
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
    @if(!empty(session('message')))
        swal("Sent!", "{{ session('message') }}", "success");
    @endif
    $(document).ready(function () {
        $('#typeOfMessage').change(function () {
            var value = $('#typeOfMessage').val()
            if(value === 'recall'){
                var text = "PAHIBALO! \n Ang imong anak na si ______ kay pabakunahan og ______ krng (date and time) sa Barangay (Tambacan or Tubod) Health Center. \n Sent via CHO: \n DUMDUM Zenaida Casilac \n Head Nurse";
                $('textarea').val(text)
            } else {
                var text = "PAHIBALO! \n Adunay ipahigayon nga pagpa-bakuna sa [vaccine type] karung umaabot nga [Date & Time] sa barangay [Tubod/Tambacan] Health center. Ginaawhag ka isip ginikanan sa pag-tambong niini. Daghan salamat. \n Sent via DUMDUM \n Zenaida Casilac \n (CHO Head Nurse/EPI Head)";
                $('textarea').val(text)
            }
        })
    });

    function texts() {
        console.log($('.checkbox').val());
    }
</script>
@endpush