@extends('web.templet.master')
@section('title', 'aboutus')
@section('content')
<div class="container">
            <header class="page-header">
                <h1 class="page-title">Checkout Order</h1>
            </header>
            <p class="checkout-login-text">Sign in or Register to your TheBox profile to faster order checkout.</p>
            <div class="row row-col-gap" data-gutter="60">
            	<div class="col-md-12">
            		 <div class="col-md-6">
                    <h3 class="widget-title">Billng Details</h3>
                    <div class="box">
                    	<p><b>State:</b> Assam</p>
                        <p><b>City:</b> Guwahati</p>
                        <p><b>Pin Code:</b> 781022
                        <p><b>Address:</b> Nupur Niwas, Purbanchal Path, Downtown, Dispur,
						Guwahati </p>
					</div>
					<div style="margin-top: 10px;">
					<a href="" style="background-color: #ccc;border: 1px #ccc solid;padding: 5px 10px 5px 10px;border-radius: 4px;">Edit</a>
					</div>
                </div>
                <div class="col-md-6">
                    <h3 class="widget-title">Order Info</h3>
                    <div class="box">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>QTY</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Gucci Patent Leather Open Toe Platform</td>
                                    <td>1</td>
                                    <td>₹499</td>
                                </tr>
                                <tr>
                                    <td>Nikon D5200 24.1 MP Digital SLR Camera</td>
                                    <td>1</td>
                                    <td>₹350</td>
                                </tr>
                                <tr>
                                    <td>Apple 11.6" MacBook Air Notebook</td>
                                    <td>1</td>
                                    <td>₹1100</td>
                                </tr>
                                <tr>
                                    <td>Fossil Women's Original Boyfriend</td>
                                    <td>1</td>
                                    <td>₹250</td>
                                </tr>
                                <tr>
                                    <td>Subtotal</td>
                                    <td></td>
                                    <td>₹2199</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td></td>
                                    <td>₹0</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td>₹2199</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 10px; margin-left: 80%;">
					<a href="" style="background-color: green;border: 1px green solid;padding: 5px 10px 5px 10px;border-radius: 4px; color: #fff">Place Order</a>
					</div>
                </div>
               
            
                <div class="col-md-6" style="margin-top: -12%">
                	<form>
                    	<div class="form-group">
                            <label>State</label>
                           <select class="form-control" id="state">
                              <option selected disabled>Select State</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                           </select>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" id="city">
		                              <option selected disabled>Select City</option>
		                              <option value="1">1</option>
		                              <option value="2">2</option>
		                              <option value="3">3</option>
		                              <option value="4">4</option>
		                              <option value="5">5</option>
		                              <option value="6">6</option>
		                           </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Pin Code</label>
                                    <input class="form-control" type="text" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
@endsection