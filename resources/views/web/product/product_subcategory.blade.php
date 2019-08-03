@extends('web.templet.master')
@section('title','product')

@section('content')
<div class="container">
  <header class="page-header">
    <h2 class="page-title">Kitchen
    </h2>
    <ol class="breadcrumb page-breadcrumb">
      <li>
        <a href="#">Home
        </a>
      </li>
      <li>
        <a class="active">Kitchen
        </a>
      </li>
    </ol>
  </header>
</div>
<div class="gap" style="margin-top: -20px;">
</div>
<div class="container">
  <h4 >kitchen, Cookware & Serveware
  </h4>
  <hr>
  <div class="row row-sm-gap" data-gutter="15">
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/2.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Pans
        </h5>
        <p class="banner-category-desc">173 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/1.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Tawas
        </h5>
        <p class="banner-category-desc">599 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/3.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Pressure Cookers
        </h5>
        <p class="banner-category-desc">534 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/4.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Kitchen Tools
        </h5>
        <p class="banner-category-desc">453 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/5.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Gas Stoves
        </h5>
        <p class="banner-category-desc">251 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/6.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Rice Cookers
        </h5>
        <p class="banner-category-desc">437 products
        </p>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <h4 >Kitchen Storage
  </h4>
  <hr>
  <div class="row row-sm-gap" data-gutter="15">
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/7.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Water Bottles
        </h5>
        <p class="banner-category-desc">173 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/8.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Lunch Box
        </h5>
        <p class="banner-category-desc">599 products
        </p>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <h4 >Tableware & Dinnerware
  </h4>
  <hr>
  <div class="row row-sm-gap" data-gutter="15">
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/9.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Coffee Mug
        </h5>
        <p class="banner-category-desc">173 products
        </p>
      </a>
    </div>
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/10.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Dinner Set
        </h5>
        <p class="banner-category-desc">599 products
        </p>
      </a>
    </div>
  </div>
</div>
<div class="container">
  <h4 >Cleaning Supplies
  </h4>
  <hr>
  <div class="row row-sm-gap" data-gutter="15">
    <div class="col-md-2">
      <a class="banner-category" href="{{url('product_saller')}}">
        <img class="banner-category-img" src="{{('src/img/kitchen_icon/11.png')}}" alt="Image Alternative text" title="Image Title" />
        <h5 class="banner-category-title">Cleaner
        </h5>
        <p class="banner-category-desc">173 products
        </p>
      </a>
    </div>
  </div>
</div>
@endsection