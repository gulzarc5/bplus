@extends('seller.template.seller_master')

@section('content')

			<!-- page content -->
		  <div class="right_col" role="main">
			 <!-- top tiles -->
			 <div class="row tile_count">
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-user"></i> Total Products</span>
				  <div class="count green">2500</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-clock-o"></i> Total Orders</span>
				  <div class="count green">123.50</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-user"></i> Pending Orders</span>
				  <div class="count green">2,500</div>
				</div>
				<div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
				  <span class="count_top"><i class="fa fa-user"></i> Delivered Orders</span>
				  <div class="count green">4,567</div>
				</div>
		  
			  
			 </div>
			 <!-- /top tiles -->

			 <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
				 
				 @if(Auth::guard('seller')->user()->verification_status == 1)
				  <div class="x_content bs-example-popovers">
					 <div class="alert alert-danger alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Hello {{ Auth::guard('seller')->user()->name }}</strong> Please Update Your Required Detalis To get All The features of Seler Panel <a href="{{ route('seller.MyprofileForm') }}" style="color:blue; font-weight: bold">Click Here to Update</a href="#">
					 </div>
				  </div>
				  @elseif(Auth::guard('seller')->user()->verification_status == 2)
					 <div class="x_content bs-example-popovers">
						<div class="alert alert-warning alert-dismissible fade in" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						  <strong>Hello {{ Auth::guard('seller')->user()->name }}</strong> Your Acount is Under Review. After Completion of This Process We Will Notify You Through Email/Sms. Thank You
						</div>
					 </div>
				  @endif



				</div>

			 </div>


			 <div class="clearfix"></div>
			 <div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Last 10 Added Products</h2>
							<div class="clearfix"></div>
						</div>

						<div class="x_content">
							<div class="table-responsive">
								<table class="table table-striped jambo_table bulk_action">
									 <thead>
										  <tr class="headings">                
												<th class="column-title">Sl No. </th>
												<th class="column-title">Title</th>
												<th class="column-title">Main Category</th>
												<th class="column-title">First Category</th>
												<th class="column-title">Second Category</th>
												<th class="column-title">Brand</th>
												<th class="column-title">Status</th>
									 </thead>

									 <tbody>

										@if(isset($data['last_10_product']) && !empty($data['last_10_product']) && count($data['last_10_product']) > 0)
											@php
											  $count = 1;
											@endphp

											@foreach($data['last_10_product'] as $product)
											  <tr class="even pointer">
													<td class=" ">{{ $count++ }}</td>
													<td class=" ">{{ $product->name }}</td>
													<td class=" ">{{ $product->c_name }}</td>
													<td class=" ">{{ $product->first_c_name }}</td>
													<td class=" ">{{ $product->second_c_name }}</td>
													<td class=" ">{{ $product->brand_name }}</td>
													<td class=" ">
														 @if($product->status == '1')
															  <button class='btn btn-primary'>Approved</button>
														 @else
																<button class='btn btn-warning'>Waiting For Approval</button>
														 @endif
													 </td>
											  </tr>
										  	@endforeach
									  	@else
										 	<tr>
											  <td colspan="5" style="text-align: center">Sorry No Data Found</td>
										 	</tr>
									  	@endif
									 </tbody>
								</table>
						  	</div>

						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Last 10 Orders</h2>
							<div class="clearfix"></div>
						</div>

						<div class="x_content">
							<div class="table-responsive">
								<table class="table table-striped jambo_table bulk_action">
									 <thead>
										  <tr class="headings">                
												<th class="column-title">Sl No. </th>
												<th class="column-title">Title</th>
												<th class="column-title">Main Category</th>
												<th class="column-title">First Category</th>
												<th class="column-title">Second Category</th>
												<th class="column-title">Brand</th>
												<th class="column-title">Status</th>
									 </thead>

									 <tbody>

										@if(isset($data['last_10_product']) && !empty($data['last_10_product']) && count($data['last_10_product']) > 0)
											@php
											  $count = 1;
											@endphp

											@foreach($data['last_10_product'] as $product)
											  <tr class="even pointer">
													<td class=" ">{{ $count++ }}</td>
													<td class=" ">{{ $product->name }}</td>
													<td class=" ">{{ $product->c_name }}</td>
													<td class=" ">{{ $product->first_c_name }}</td>
													<td class=" ">{{ $product->second_c_name }}</td>
													<td class=" ">{{ $product->brand_name }}</td>
													<td class=" ">
														 @if($product->status == '1')
															  <button class='btn btn-primary'>Approved</button>
														 @else
																<button class='btn btn-warning'>Waiting For Approval</button>
														 @endif
													 </td>
											  </tr>
										  	@endforeach
									  	@else
										 	<tr>
											  <td colspan="5" style="text-align: center">Sorry No Data Found</td>
										 	</tr>
									  	@endif
									 </tbody>
								</table>
						  	</div>

						</div>
					</div>
				</div>
			 </div>

		  </div>
		  <!-- /page content -->

 @endsection