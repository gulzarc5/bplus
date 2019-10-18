@extends('seller.template.seller_master')

@section('content')
<style>@media(max-width:425px){.new{width: 100%!important;left: 0!important;}}</style>
<div class="right_col" role="main">
    <div class="row">
    	{{-- <div class="col-md-2"></div> --}}
        @if(Auth::guard('seller')->user()->verification_status == 3)

    	<div class="col-md-12" style="margin-top:50px;">
    	    <div class="x_panel">

    	        <div class="x_title">
    	            <h2>Add New Product</h2>
    	            <div class="clearfix"></div>
    	        </div>
                <div>
                     @if (Session::has('message'))
                        <div class="alert alert-success" >{{ Session::get('message') }}</div>
                     @endif
                     @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                     @endif

                </div>
    	        <div>
    	            <div class="x_content">
    	           
    	            	{{ Form::open(['method' => 'post','route'=>'seller.add_new_product' , 'enctype'=>'multipart/form-data']) }}
    	            	
                       <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                  <label for="name">Product name</label>
                                  <input type="text" class="form-control" name="name"  placeholder="Enter Product name" >
                                    @if($errors->has('name'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                  <label for="tag_name">Tag Name</label>
                                  <input type="text" class="form-control" name="tag_name"  placeholder="Enter Tag Name" >

                                </div>                                                            
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <label for="category">Select Category</label>
                                    <select class="form-control" name="category" id="category">
                                        <option value="">Select Category</option>
                                        @if(isset($category) && !empty($category))
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('category'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('category') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <label for="first_category">Select First Category</label>
                                    <select class="form-control" name="first_category" id="first_category">
                                      <option value="">Select First Category</option>
                                    </select>
                                    @if($errors->has('first_category'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('first_category') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <label for="second_category">Select Second Category</label>
                                    <select class="form-control" name="second_category" id="second_category">
                                        <option value="">Select Second Category</option>
                                    </select>
                                    @if($errors->has('second_category'))
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $errors->first('second_category') }}</strong>
                                        </span>
                                    @enderror
                                </div>                            
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3" >
                                    <label for="brand">Select Brand</label>
                                    <select class="form-control" name="brand" id="brand">
                                        <option value="">Select Brand</option>
                                    </select>
                                </div>                        
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="mrp">M.R.P</label>
                                <input type="number" step="any" class="form-control" name="mrp"  placeholder="Enter Product M.R.P" >
                                @if($errors->has('mrp'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('mrp') }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="price">Sell Price</label>
                                <input type="number" step="any" class="form-control" name="price"  placeholder="Enter Product Sell Price" >
                                @if($errors->has('price'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                <label for="min_quantity">Min Order Quantity</label>
                                <input type="number" class="form-control" name="min_quantity"  placeholder="Enter Min Order Quantity" >
                                @if($errors->has('min_quantity'))
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $errors->first('min_quantity') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="colors_div">

                        </div>
                        
                        <div class="well" style="overflow: auto">
                            <div class="form-row mb-10">
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="size">Type Product Short Descrition</label>
                                    <textarea class="form-control" name="short_description"></textarea>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12 mb-3">
                                    <label for="size">Type Product Long Descrition</label>
                                    <textarea class="form-control" rows="6" id="long_description" name="long_description">
                                        <div class="table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>dfsds</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </textarea>
                                </div>

                            </div>
                       </div>

                       <div class="well" style="overflow: auto" id="image_div">
                            <div class="form-row mb-10">
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    <label for="size">Image</label>
                                    <input type="file" name="image[]" class="form-control">
                                </div>
                                
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                    
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12 mb-3">
                                   <a class="btn btn-sm btn-primary" style="margin-top: 25px;" onclick="add_more_image()">Add More</a>                                 
                                </div>  
                            </div>
                            @if($errors->has('image'))
                                <span class="invalid-feedback" role="alert" style="color:red">
                                    <strong>{{ $errors->first('image') }}</strong>
                                </span>
                            @enderror

                       </div>

    	            	<div class="form-group">
    	            	 	@if(isset($first_category) && !empty($first_category))
                                {{ Form::submit('Save', array('class'=>'btn btn-success')) }}
                            @else
                                {{ Form::submit('Submit', array('class'=>'btn btn-success')) }}
                            @endif
    	                	
    	            	</div>
    	            	{{ Form::close() }}

    	            </div>
    	        </div>
    	    </div>
    	</div>

        @else
            <div class="x_content bs-example-popovers new" style=" position: absolute;top: 43%;width: 48%;    left: 37%;">
                <div class="alert alert-danger alert-dismissible fade in" role="alert"style="font-size: 19px;padding: 38px 15px;text-align: center;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="    top: -29px;right: -6px;color: #000;"><span aria-hidden="true">×</span></button>
                  <strong>Sorry !!</strong>  We are Unable to Process Your Request .<br> Your Account is Under Verification 

                </div>
              </div>
        @endif
    	{{-- <div class="col-md-2"></div> --}}
    </div>
</div>


 @endsection

  @section('script')
     <script type="text/javascript">
        var color_html = null;
         var size={};
        $(document).ready(function(){
            $("#category").change(function(){
                var category = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"GET",
                    url:"{{ url('/admin/first/Category/')}}"+"/"+category+"",
                    success:function(data){
                        // console.log(data);
                        var cat = JSON.parse(data);
                        $("#first_category").html("<option value=''>Please Select First Category</option>");

                        $.each( cat, function( key, value ) {
                            $("#first_category").append("<option value='"+key+"'>"+value+"</option>");
                        });

                    }
                });
            });

            $("#first_category").change(function(){
                var category = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"GET",
                    url:"{{ url('/admin/second/Category/')}}"+"/"+category+"",
                    success:function(data){
                        // console.log(data);
                        var cat = JSON.parse(data);
                        $("#second_category").html("<option value=''>Please Select Second Category</option>");

                        $.each( cat, function( key, value ) {
                            $("#second_category").append("<option value='"+key+"'>"+value+"</option>");
                        });

                    }
                });
            });

             $("#second_category").change(function(){
                        
                var category = $('#category').val();
                var first_category = $('#first_category').val();
                var second_category = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:"GET",
                    url:"{{ url('/admin/Products/ajax/form/load/data')}}"+"/"+category+"/"+first_category+"/"+second_category+"",
                    success:function(data){
                        // console.log(data.varients);
                        if (data.brands.length > 0) {                           
                            $("#brand").html("<option value=''>Please Select Second Category</option>");
                            $.each( data.brands, function( key, value ) {
                                $("#brand").append("<option value='"+value.brand_id+"'>"+value.brand_name+"</option>");
                            });
                        }

                        if (data.colors.length > 0) {          
                          var  color_htmls = '<div class="well" style="overflow: auto">'+
                            '<div id="color_div">'+
                                '<div class="form-row mb-3" >'+
                                    '<div class="col-md-4 col-sm-12 col-xs-12 mb-3">'+
                                        '<label for="color">Select Color</label>'+
                                        '<select class="form-control color" name="color[]" id="color"><option value="">Please Select Color</option>';
                         
                             color_html += "<option value=''>Please Select Color</option>";
                            $.each( data.colors, function( key, value ) {
                               color_htmls += "<option value='"+value.color_id+"' style='background-color:"+value.color_value+"'>"+value.color_name+"</option>";
                                color_html +="<option value='"+value.color_id+"' style='background-color:"+value.color_value+"'>"+value.color_name+"</option>";
                            });

                            color_htmls +='</select>'+
                                    '</div>'+
                                    '<div class="col-md-2 col-sm-12 col-xs-12 mb-3">'+
                                       '<a class="btn btn-sm btn-primary" style="margin-top: 25px;" onclick="addMoreColor()">Add More</a>'+
                                    '</div>'+                     
                                '</div>'+
                            '</div>'+
                        '</div>';
                        $("#colors_div").html(color_htmls);
                        }
                    }
                });
            });
        });

    </script>
    <script src="{{ asset('admin/javascript/product.js') }}"></script>

    <script src="{{ asset('admin/ckeditor_4/cdeditor/ckeditor.js')}}"></script>

    <script>
        CKEDITOR.replace( 'long_description' );
    </script>
    <style>
        .ck-editor__editable_inline {
            min-height: 250px !important;
        }   
    </style>
 @endsection


        
    