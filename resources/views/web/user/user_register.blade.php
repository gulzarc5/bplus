@extends('web.templet.master')

@section('title', 'login')

@section('content')
	<div class="mfp-with-anim  mfp-dialog clearfix" >
        <h3 class="widget-title text-center">Create your Account
        </h3>
        <hr />
        <form>
          <div class="form-group">
            <label>Email
            </label>
            <input class="form-control" type="text" />
          </div>
          <div class="form-group">
            <label>Password
            </label>
            <input class="form-control" type="text" />
          </div>
          <div class="form-group">
            <label>Repeat Password
            </label>
            <input class="form-control" type="text" />
          </div>
          <div class="form-group">
            <label>Phone Number
            </label>
            <input class="form-control" type="text" />
          </div>
          <div class="checkbox">
            <label>
              <input class="i-check" type="checkbox" />Subscribe to the Newsletter
            </label>
          </div>
          <input class="btn btn-primary" type="submit" value="Create Account" />
        </form>
        <div class="gap gap-small">
        </div>
        <ul class="list-inline">
          <li>
            <a href="#nav-login-dialog" class="popup-text">Already Memeber
            </a>
          </li>
        </ul>
      </div>
@endsection