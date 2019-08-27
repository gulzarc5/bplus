@extends('web.templet.master')
@section('title', 'cart')
@section('content')
<div class="container">
   <header class="page-header">
      <h2 >My Shopping Bag</h2>
   </header>
   <div class="row">
      <div class="col-md-10">
         <table class="table table table-shopping-cart">
            <thead>
               <tr>
                  <th>Product</th>
                  <th>Title</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th>Action</th>
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
                  <td>
                     <input class="form-control table-shopping-qty" type="number" value="1" min="1" />
                  </td>
                  <td>₹499</td>
                  <td class="table-shopping-check-remove">
                     <a class="fa fa-close table-shopping-remove" href="#"></a>
                     <a class="fa fa-check table-shopping-check" href="#" ></a>
                  </td>
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
                  <td>
                     <input class="form-control table-shopping-qty" type="number" value="1" min="1" />
                  </td>
                  <td>₹350</td>
                  <td class="table-shopping-check-remove">
                     <a class="fa fa-close table-shopping-remove" href="#"></a>
                     <a class="fa fa-check table-shopping-check" href="#" ></a>
                  </td>
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
                  <td>
                     <input class="form-control table-shopping-qty" type="number" value="1" min="1" />
                  </td>
                  <td>₹1100</td>
                  <td class="table-shopping-check-remove">
                     <a class="fa fa-close table-shopping-remove" href="#"></a>
                     <a class="fa fa-check table-shopping-check" href="#" ></a>
                  </td>
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
                  <td>
                     <input class="form-control table-shopping-qty" type="number" value="1" min="1" />
                  </td>
                  <td>₹250</td>
                  <td class="table-shopping-check-remove">
                     <a class="fa fa-close table-shopping-remove" href="#"></a>
                     <a class="fa fa-check table-shopping-check" href="#" ></a>
                  </td>
               </tr>
            </tbody>
         </table>
         <div class="gap gap-small"></div>
      </div>
      <div class="col-md-2">
         <ul class="shopping-cart-total-list">
            <li><span>Subtotal</span><span>₹2199</span>
            </li>
            <li><span>Shopping</span><span>Free</span>
            </li>
            <li><span>Taxes</span><span>₹0</span>
            </li>
            <li><span>Total</span><span>₹2199</span>
            </li>
         </ul>
         <a class="btn btn-primary" href="#">Checkout</a>
      </div>
   </div>
   <ul class="list-inline">
      <li><a class="btn btn-default" href="#">Continue Shopping</a>
      </li>
      <li><a class="btn btn-default" href="#">Update Bag</a>
      </li>
   </ul>
</div>
<div class="container">
            <div class="text-center"><i class="fa fa-cart-arrow-down empty-cart-icon"></i>
                <p class="lead">You haven't Fill Your Shopping Cart Yet</p><a class="btn btn-primary btn-lg" href="#">Start Shopping <i class="fa fa-long-arrow-right"></i></a>
            </div>
            <div class="gap"></div>
        </div>
@endsection