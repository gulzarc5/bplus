@extends('web.templet.master')
@section('title', 'sell_on_bplus1')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-6 col-md-offset-3">
         <div class="panel panel-login" style="margin-top: 20px;">
            <div class="panel-heading" style="margin-top: 10px;">
               <div class="row">
                  <center>
                     <div class="col-md-12">
                        <h2>Sell On Bplus</h2>
                     </div>
                  </center>
               </div>
               <hr>
            </div>
            <div class="mfp-with-anim" id="myprofile-form" style=" display: block;">
               <form>
                  <div class="row">
                     <div class="col-lg-12">
                        <h3 style="margin-left: 15px;">Personal Information</h3>
                        <div style="margin-top: 30px;">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Name
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Email
                                 </label>
                                 <input class="form-control" type="email" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Mobile
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>DOB
                                 </label>
                                 <input class="form-control" type="date" />
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Gender
                                 </label>
                                 <div style="display: flex;">
                                    <label class="container">
                                    <input type="radio" checked="checked" name="radio"> Male
                                    <span class="checkmark"></span>
                                    </label>
                                    <label class="container">
                                    <input type="radio" name="radio"> Female
                                    <span class="checkmark"></span>
                                    </label>
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
                                 <label>State
                                 </label>
                                 <select class="form-control">
                                    <option selected disabled>...Select State...</option>
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>City
                                 </label>
                                 <select class="form-control">
                                    <option selected disabled>...Select City...</option>
                                    <option value="male">Male</option>
                                    <option value="Female">Female</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Pin Code
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                           <textarea rows="3" cols="45" class="form-control" placeholder="address">
                           </textarea>
                        </div>
                  </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-lg-12">
                        <h3 style="margin-left: 15px;">Bank</h3>
                        <div style="margin-top: 30px;">
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Bank Name
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Branch Name
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>Account Number
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>IFSC Code
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-group">
                                 <label>MICR Code
                                 </label>
                                 <input class="form-control" type="text" />
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <input class="btn btn-primary " type="submit" value="Edit" />
                  </div>
               </form>
               <div class="gap gap-small">
               </div>
            </div>
            <div class="mfp-with-anim mfp-dialog clearfix" id="changepass-form" style="margin-top: -20px; display: none;">
               <form>
                  <div class="form-group">
                     <label>Recent Password
                     </label>
                     <input class="form-control" type="text" />
                  </div>
                  <div class="form-group">
                     <label>New Password
                     </label>
                     <input class="form-control" type="text" />
                  </div>
                  <div class="form-group">
                     <label>Comfirm Password
                     </label>
                     <input class="form-control" type="text" />
                  </div>
                  <input class="btn btn-primary" type="submit" value="Sign In" />
               </form>
               <div class="gap gap-small">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
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
@endsection