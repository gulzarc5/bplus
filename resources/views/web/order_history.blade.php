@extends('web.templet.master')
@section('title', 'orderhistory')
@section('content')
<div class="container">
   <header class="page-header">
      <h2>Your Order History</h2>
   </header>
   <div class="row">
      <div class="col-md-12">
         <table class="table table table-shopping-cart">
            <thead>
               <tr>
                  <th>Product</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td class="table-shopping-cart-img">
                     <a href="#">
                     <img src="img/cart/1.jpg" alt="Image Alternative text" title="Image Title" />
                     </a>
                  </td>
                  <td class="table-shopping-cart-title"><a href="#">Gucci Patent Leather Open Toe Platform</a>
                  </td>
                  <td>₹499</td>
                  <td>2</td>
                  <td>₹499</td>
                  <td><a class="order-status-pay">Pay</a></td>
               </tr>
               <tr>
                  <td class="table-shopping-cart-img">
                     <a href="#">
                     <img src="img/cart/2.jpg" alt="Image Alternative text" title="Image Title" />
                     </a>
                  </td>
                  <td class="table-shopping-cart-title"><a href="#">Nikon D5200 24.1 MP Digital SLR Camera</a>
                  </td>
                  <td>₹350</td>
                  <td>1</td>
                  <td>₹350</td>
                   <td><a class="order-status-pending">Panding</a></td>
               </tr>
               <tr>
                  <td class="table-shopping-cart-img">
                     <a href="#">
                     <img src="img/cart/3.jpg" alt="Image Alternative text" title="Image Title" />
                     </a>
                  </td>
                  <td class="table-shopping-cart-title"><a href="#">Apple 11.6" MacBook Air Notebook</a>
                  </td>
                  <td>₹1100</td>
                  <td>1</td>
                  <td>₹1100</td>
                   <td><a class="order-status-pay">Pay</a></td>
               </tr>
               <tr>
                  <td class="table-shopping-cart-img">
                     <a href="#">
                     <img src="img/cart/4.jpg" alt="Image Alternative text" title="Image Title" />
                     </a>
                  </td>
                  <td class="table-shopping-cart-title"><a href="#">Fossil Women's Original Boyfriend</a>
                  </td>
                  
                  <td>₹250</td>
                  <td>3</td>
                  <td>₹250</td>
                  <td><a class="order-status-pending">Panding</a></td>
               </tr>
            </tbody>
         </table>
         <div class="gap gap-small"></div>
      </div>
      
   </div>
   <ul class="list-inline">
      <li><a class="btn btn-default" href="#">Continue Shopping</a>
      </li>
   </ul>
</div>

@endsection