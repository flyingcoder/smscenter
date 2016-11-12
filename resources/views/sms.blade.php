@extends('layouts.main')
@section('content')
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
@endsection