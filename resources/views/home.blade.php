@extends('layouts.main')

@section('content')
<header class="intro" style="background-color: white">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                <div class="container">
                    <h2 style="color: black; text-align: left">Registrations</h2>
                </div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/search') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="text-align:left">
                                <label class="col-md-1 control-label">Name</label>

                                <div class="col-md-4">
                                    <input type="name" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                            
                            </form>
                </div>
                <br/>
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body" style="text-align:left; color: black">
                            @if(isset($child))
                                @if(isset($search))
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Father</th>
                                                <th>Mother</th>
                                                <th>Guardian</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                        @foreach($search as $searched)
                                            <tr>
                                                <td>{{$children->name}}</td>
                                                <td>{{$children->father}}</td>
                                                <td>{{$children->mother}}</td>
                                                <td>{{$children->guardian}}</td>
                                                <td>{{$children->contact}}</td>
                                                <td>{{$children->address}}</td>
                                                <td></td>
                                                <td>
                                                    <a href="#" @click.prevent="sendMessage(con.phone,con.firstname)"><i class="glyphicon glyphicon-envelope" style="color:green"></i></a>
                                                    &nbsp;
                                                    <a href="#" @click.prevent="showContact(con.id)"><i class="glyphicon glyphicon-edit"></i></a>
                                                    &nbsp;
                                                    <a href="#" @click.prevent="removeContact(con.id)"><i class="glyphicon glyphicon-trash" style="color:red"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Father</th>
                                                <th>Mother</th>
                                                <th>Guardian</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                        @foreach($child as $children)
                                            <tr>
                                                <td>{{$children->name}}</td>
                                                <td>{{$children->father}}</td>
                                                <td>{{$children->mother}}</td>
                                                <td>{{$children->guardian}}</td>
                                                <td>{{$children->contact}}</td>
                                                <td>{{$children->address}}</td>
                                                <td></td>
                                                <td>
                                                    <a href="#" @click.prevent="sendMessage(con.phone,con.firstname)"><i class="glyphicon glyphicon-envelope" style="color:green"></i></a>
                                                    &nbsp;
                                                    <a href="#" @click.prevent="showContact(con.id)"><i class="glyphicon glyphicon-edit"></i></a>
                                                    &nbsp;
                                                    <a href="#" @click.prevent="removeContact(con.id)"><i class="glyphicon glyphicon-trash" style="color:red"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            @else
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Father</th>
                                            <th>Mother</th>
                                            <th>Guardian</th>
                                            <th>Contact</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>qwe</td>
                                            <td>qweqweqweqweqwe</td>
                                            <td>qweqwe</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="wrap" style="color:black">
        <div class="container container-space">
            <br/><br/><br/><br/><br/><br/>
            <div class="row">
                <div id="sendsms">
                <div class="col-md-4" >
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Send a message <small>(note: Trial version can only send sms to verified numbers only)</small></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" v-on:submit.prevent="sendMessage">
                                <div class="alert alert-danger" v-if="!isValid">
                                    <ul>
                                        <li v-show="!validation.phone">Phone Number field is required.</li>
                                        <li v-show="!validation.body">Message field is required.</li>
                                    </ul>
                                </div>
                                <fieldset class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input v-model="Sms.phone" type="text" class="form-control" id="phone">
                                  </fieldset>
                                <fieldset class="form-group">
                                    <label for="exampleTextarea">Message</label>
                                    <textarea v-model="Sms.body" class="form-control" id="exampleTextarea" rows="3"></textarea>
                                </fieldset>
                                <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" >Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-heading">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{url('search-child')}}">
                                    
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <div class="panel-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div> -->
    </header>
<section id="registration">
    <div id="wrap">
        <div class="container container-space">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h1 style="color:#524B4B"></h1>
 
            </div>
        </div>
            
        <div class="row">
            <div class="col-md-4 col-sm-offset-1">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/register-child') }}">
            {!! csrf_field() !!}
            <h2 style="color:#524B4B; font-family:Century Gothic; font-size:26px">Register Child</h2>
                
                <div class="form-group has-feedback">
                    <label for="register_guardianname" class="control-label"> Child's Name </label>
                    <input type="text" class="form-control" id="name" name="name" value="">
                </div>

                <div class="form-group has-feedback">
                    <label for="register_guardianname" class="control-label"> Father's Name </label>
                    <input type="text" class="form-control" id="father" name="father" value="">
                </div>

                <div class="form-group has-feedback">
                    <label for="register_guardianname" class="control-label"> Mother's Name </label>
                    <input type="text" class="form-control" id="mother" name="mother" value="">
                </div>
               
                <div class="form-group">
                    <label for="register_phonenumber" class="control-label"> Guardian's Name </label>
                    <input type="text" class="form-control" id="guardian" name="guardian">
                </div>

                <div class="form-group">
                    <label for="register_childsname" class="control-label"> Contact Number </label>
                    <input type="integer" class="form-control" id="contact" name="contact">
                </div>      
                
                <div class="form-group">
                    <label for="address" class="control-label"> Select Barangay <br></label>
                            <select name="barangay" class="field">
                                <option value="">----</option>
                                <option value="Suarez">From Brgy. Suarez</option>
                                <option value="Tubod">From Brgy. Tubod</option>
                            </select>
                </div>

                 <div class="form-group">
                    <div class="col-xs-6 col-xs-push-6" align="right">
                        <input style="font-family:Century Gothic" type="submit" value="Register" class="btn btn-success btn-lg">
                    </div>
                </div>
            </div>
                
            </form>
            </div>
            </div>
        </div>
   </div>
</section>
<section id="messages">
    <div class="wrap">
        <div class="container container-space">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h1 style="color:#524B4B"></h1>
                </div>
            </div>
            <div class="row" id="sendsms">
            <div class="col-md-6 col-md-offset-3">
            <br/><br/>
            <h2 style="color:#524B4B; font-family:Century Gothic; font-size:26px; text-align:center">Messages</h2>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Send a message <small>(note: Trial version can only send sms to verified numbers only)</small></h3>
              </div>
              <div class="panel-body">
                <form role="form" v-on:submit.prevent="sendMessage">
                    <div class="alert alert-danger" v-if="!isValid">
                        <ul>
                            <li v-show="!validation.phone">Phone Number field is required.</li>
                            <li v-show="!validation.body">Message field is required.</li>
                        </ul>
                      </div>
                     <fieldset class="form-group">
                        <label for="phone">Phone #</label>
                        <input v-model="Sms.phone" type="text" class="form-control" id="phone">
                      </fieldset>
                      <fieldset class="form-group">
                        <label for="exampleTextarea">Message</label>
                        <textarea v-model="Sms.body" class="form-control" id="exampleTextarea" rows="3"></textarea>
                      </fieldset>
                      <button :disabled="!isValid" type="submit" class="btn btn-primary pull-right" >Send</button>
                </form>
              </div>
            </div>
        </div>
    </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script type="text/javascript">
    var nameRE = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

    var vm = new Vue({
        http: {
          root: '/root',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
          }
        },

        el: '#sendsms',

        data: {
            Sms: {
              phone: '',
              body: ''
            }
        },

        methods: {

            sendMessage: function () {
                this.Sms.phone = $('#phone').intlTelInput("getNumber");
                
                var text = this.Sms;

                this.Sms = {phone: '', body: ''}

                vm.$http.post('/api/sms', text).then(function (response) {
                    swal("Beep! beep! beep!", "Your message will be delivered shortly", "success"); 
                }, function (response) {
                    swal("Oops! "+response.status+" Error code occurs", response.statusText, "error");
                })
            }

        },

        computed: {
            validation: function () {
                return {
                    phone: !!this.Sms.phone.trim(),
                    body: !!this.Sms.body.trim()
                }
            },

            isValid: function () {
                var validation = this.validation
                return Object.keys(validation).every(function (key) {
                    return validation[key]
                })
            }
        }
    })
</script>
@endpush