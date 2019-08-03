@extends('web.templet.master')

@section('title', 'login')

@section('content')

  <div id="login">
  	<div class="container">
  		<center>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" >
                	<div  class="col-md-4"></div>
                    <div id="login-box" class="col-md-4">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info" style="text-decoration: underline;">Seller Login From</h3>
                            <div style="margin-top: 38px;">
                            <div class="form-group">
                                <label for="username" class="text-info"></label><br>
                                <input type="text" name="username" id="username" class="form-control sell_login" placeholder="enter your user name">
                                @if($errors->has('username'))
	                    	<span class="invalid-feedback" role="alert" style="color:red">
		                        <strong>{{ $errors->first('username') }}</strong>
		                    </span>
		              	@enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info"></label><br>
                                <input type="text" name="password" id="password" class="form-control sell_login" placeholder="enter your password">
                                @if($errors->has('password'))
	                    	<span class="invalid-feedback" role="alert" style="color:red">
		                        <strong>{{ $errors->first('password') }}</strong>
		                    </span>
		              	@enderror
                            </div>
                            <div class="form-group">
                            	<input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                                <br><a href="{{url('seller_register')}}" class="text-info"> Create your Account here</a>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </center>
       
        </div>
    </div>
@endsection