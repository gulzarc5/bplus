@extends('web.templet.master')

@section('title', 'login')

@section('content')
	<div class="mfp-with-anim mfp-dialog clearfix" >
        <h3 class="widget-title text-center">User Login
        </h3>
        <hr />
        <form>
          <div class="form-group">
            <label>Email or Username
            </label>
            <input class="form-control" type="text" />
          </div>
          <div class="form-group">
            <label>Password
            </label>
            <input class="form-control" type="text" />
          </div>
          <div class="checkbox">
            <label>
              <input class="i-check" type="checkbox" />Remeber Me
            </label>
          </div>
          <input class="btn btn-primary" type="submit" value="Sign In" />
        </form>
        <div class="gap gap-small">
        </div>
        <ul class="list-inline">
          <li>
            <a href="#nav-account-dialog" >Not Member Yet
            </a>
          </li>
          <li>
            <a href="#nav-pwd-dialog" >Forgot Password?
            </a>
          </li>
        </ul>
      </div>
      
@endsection