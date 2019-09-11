@extends('web.templet.master')
@section('title', 'myProfile')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-login" style="margin-top: 20px;">
            <div class="panel-heading" style="margin-top: 10px;">
               <div class="row">
                  <center>
                     <div class="col-md-6">
                        <a href="#" class="active" id="myprofile-form-link">My Profile</a>
                     </div>
                     <div class="col-md-6">
                        <a href="#" id="changepass-form-link">Change Password</a>
                     </div>
                  </center>
               </div>
               <hr>
               @if (Session::has('message'))
                  <div class="alert alert-success" >{{ Session::get('message') }}</div>
               @endif
               @if (Session::has('error'))
                  <div class="alert alert-danger">{{ Session::get('error') }}</div>
               @endif
            </div>
            <div class="mfp-with-anim" id="myprofile-form" style=" display: block;">
               @if(isset($user_data) && !empty($user_data))

                 {{ Form::open(['method' => 'post','route'=>'web.myprofile_update']) }}
                     <div class="row">
                        <div class="col-lg-12">
                           <h3 style="margin-left: 15px;">Personal Information</h3>
                           <div style="margin-top: 30px;">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{ $user_data['user']->name }}" disabled/>
                                    @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" value="{{ $user_data['user']->email }}"  disabled/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="text"  value="{{ $user_data['user']->mobile }}" disabled/>
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input class="form-control" type="date" name="dob" id="dob" value="{{ $user_data['user_details']->dob }}" disabled/>
                                    @if($errors->has('dob'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Gender</label>
                                    <div style="display: flex;">
                                       @if(!empty($user_data['user_details']->dob) && ($user_data['user_details']->dob == 'F') )
                                       <label class="container">
                                          <input type="radio" checked="checked" name="gender" value="M" disabled id="m" > Male
                                          <span class="checkmark"></span>
                                       </label>
                                       <label class="container">
                                          <input type="radio" name="gender" value="F" disabled id="f" checked> Female
                                          <span class="checkmark"></span>
                                       </label>
                                       @else
                                           <label class="container">
                                                <input type="radio" checked="checked" name="gender" value="M" disabled id="m" checked> Male
                                                <span class="checkmark"></span>
                                             </label>
                                             <label class="container">
                                                <input type="radio" name="gender" value="F" disabled id="f" > Female
                                                <span class="checkmark"></span>
                                             </label>
                                       @endif

                                       @if($errors->has('gender'))
                                           <span class="invalid-feedback" role="alert" style="color:red">
                                               <strong>{{ $errors->first('gender') }}</strong>
                                           </span>
                                       @enderror
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-lg-12">
                           <h3 style="margin-left: 15px;">Address </h3>
                           <div style="margin-top: 30px;">
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control" name="state" id="state" disabled>
                                       <option selected disabled>...Select State...</option>
                                       @if(isset($states) && !empty($states))
                                       @foreach($states as $state)
                                          @if($user_data['user_details']->state_id == $state->id)
                                             <option value="{{ $state->id }}" selected>{{ $state->name }}</option>
                                          @else
                                             <option value="{{ $state->id }}">{{ $state->name }}</option>
                                          @endif
                                       @endforeach
                                       @endif
                                    </select>

                                    @if($errors->has('state'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city" id="city" disabled>
                                       <option selected disabled>...Select City...</option>
                                       @if(!empty($user_data['city_list']))
                                          @foreach($user_data['city_list'] as $city)
                                             @if( $user_data['user_details']->city_id == $city->id)
                                                <option  value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                             @else
                                                <option  value="{{ $city->id }}">{{ $city->name }}</option>
                                             @endif                                             
                                          @endforeach
                                       @endif
                                    </select>

                                    @if($errors->has('city'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group">
                                    <label>Pin Code</label>
                                    <input class="form-control" type="text" name="pin" value="{{ $user_data['user_details']->pin  }}" id="pin" disabled/>
                                    @if($errors->has('pin'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('pin') }}</strong>
                                        </span>
                                    @enderror
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <textarea rows="3" cols="45" class="form-control" placeholder="address" name="address" id="address" disabled>{{ $user_data['user_details']->address  }}</textarea>
                        </div>
                     </div>
                     <div class="col-md-12" id="profile_btn">
                        <a class="btn btn-warning" onclick="userProfileValidation()"> Edit </a>
                     </div>
                  {{ Form::close() }}
               @endif
               <div class="gap gap-small">
               </div>
            </div>
            <div class="mfp-with-anim mfp-dialog clearfix" id="changepass-form" style="margin-top: -20px; display: none;">
                  <div id="err_msg"></div>
                  <div class="form-group">
                     <label>Current Password</label>
                     <input class="form-control" type="text" name="current_pass" />
                  </div>
                  <div class="form-group">
                     <label>New Password</label>
                     <input class="form-control" type="text" name="new_pass" />
                  </div>
                  <div class="form-group">
                     <label>Comfirm Password</label>
                     <input class="form-control" type="text" name="confirm_pass" />
                  </div>
                  <input class="btn btn-primary" type="button" value="Submit" id="pass_change" />
              
               <div class="gap gap-small">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/web_user_profile.js') }}"></script>
<script type="text/javascript">
   $(function() {
   
       $('#myprofile-form-link').click(function(e) {
   		$("#myprofile-form").delay(100).fadeIn(100);
    		$("#changepass-form").fadeOut(100);
   		$('#changepass-form-link').removeClass('active');
   		$(this).addClass('active');
   		e.preventDefault();
   	});
   	$('#changepass-form-link').click(function(e) {
   		$("#changepass-form").delay(100).fadeIn(100);
    		$("#myprofile-form").fadeOut(100);
   		$('#myprofile-form-link').removeClass('active');
   		$(this).addClass('active');
   		e.preventDefault();
   	});
   
   });
</script>


<script type="text/javascript">

        $(document).ready(function(){
            $("#state").change(function(){
                var state = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"GET",
                    url:"{{ url('City/list/')}}"+"/"+state+"",
                    success:function(data){
                        // console.log(data);
                        // var cat = JSON.parse(data);
                        $("#city").html("<option value=''>Select City</option>");

                        $.each( data, function( key, value ) {
                            $("#city").append("<option value='"+key+"'>"+value+"</option>");
                        });

                    }
                });
            });



             $("#pass_change").click(function(){
               var current_pass = $("input[name='current_pass']").val();
               var new_pass = $("input[name='new_pass']").val();
               var confirm_pass = $("input[name='confirm_pass']").val();
               // alert(current_pass);
                $.ajax({
                    type:"POST",
                     url:"{{ route('web.user_change_password')}}",
                     data:{
                        _token:'{{ csrf_token() }}',
                        current_pass:current_pass,
                        new_pass:new_pass,
                        confirm_pass:confirm_pass
                     },
                    success:function(data){
                        // console.log(data);
                        if (data == 0) {
                           $("#err_msg").html("<div class='alert alert-danger'>Sorry !! Current Password Does Not Matched</div>");
                        }else if (data == 1) {
                           $("#err_msg").html("<div class='alert alert-success'>Password Changed Successfully</div>");
                        }else if (data == 3) {
                           $("#err_msg").html("<div class='alert alert-danger'>Password Must Be 8 Character Long</div>");
                        }else if (data == 4) {
                           $("#err_msg").html("<div class='alert alert-danger'>Sorry!! New Password is Same With Previous Password</div>");
                        }else{
                           $("#err_msg").html("<div class='alert alert-danger'>Confirm Password Does Not Matched</div>");
                        }

                    }
                });
            });
        });




    </script>


@endsection


     