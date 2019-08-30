@extends('web.templet.master')
@section('title','product')

@section('content')

<div class="container">
  <div class="mfp-content">
<div class="mfp-with-anim mfp-hide mfp-dialog1 clearfix" id="myModal">
  <img src="{{asset('src/img/product_loader.gif')}}"style='position:relative;top:250px;left:230px;z-index:2000'> 
        </div>
      </div>
  <header class="page-header">
    <h1 class="page-title">
      @if(isset($second_category_name) && !empty($second_category_name))
        @if(!empty($second_category_name->name))
          {{ $second_category_name->name }}
          <input type="hidden" id="category_id_filter" value="{{$second_category_name->id}}">
        @endif
      @endif
    </h1>
    <ol class="breadcrumb page-breadcrumb">
      <li><a href="#">Home</a></li>
      <li><a href="#">Fasion</a></li>
      <li><a href="#">Women</a></li>
      <li><a href="#">Accessories</a></li>
      <li class="active">Handbags</li>
    </ol>
    <ul class="category-selections clearfix">
      <li><a class="fa fa-th-large category-selections-icon active" href="#"></a></li>
      <li><a class="fa fa-th-list category-selections-icon" href="#"></a></li>
      <li>
        <span class="category-selections-sign">Sort by :</span>
        <select class="category-selections-select">
        <option selected>Newest First</option>
          {{-- <option>Best Sellers</option>
          <option>Trending Now</option> --}}
          {{-- <option>Best Raited</option> --}}
          <option>Price : Lowest First</option>
          <option>Price : Highest First</option>
          <option>Title : A - Z </option>
          <option>Title : Z - A</option>
        </select>
      </li>
     {{--  <li>
        <span class="category-selections-sign">Items :
        </span>
        <select class="category-selections-select">
          <option>9 / page
          </option>
          <option selected>12 / page
          </option>
          <option>18 / page
          </option>
          <option>All
          </option>
        </select>
      </li> --}}
    </ul>
  </header>
  <div class="row">
    <div class="col-md-3">
      <aside class="category-filters category-filters-color">

        {{-- FIlter Category Section  --}}
        @if(isset($seller_second_category) && !empty($seller_second_category))
          <div class="category-filters-section">
            <h3 class="widget-title-sm">Category</h3>
            <ul class="cateogry-filters-list">
              @foreach($seller_second_category as $second_category)
                <li><a href="{{route('web.product_view',['seller_id'=>encrypt($second_category->seller_id),'second_category'=>encrypt($second_category->second_category)])}}">{{$second_category->category_name}}</a>
                  
                </li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="category-filters-section popup-text" data-effect="mfp-move-from-top" >
          <h3 class="widget-title-sm">Price</h3>
          <input type="hidden" id="price-slider" />
        </div>


        @if(isset($products_sellers) && !empty($products_sellers))

          <div class="category-filters-section">
            <h3 class="widget-title-sm">Sallers</h3>

            @foreach($products_sellers as $products_seller)
              <div class="checkbox">
                <label>
                  @if(isset($seller_id) && !empty($seller_id) && ($seller_id == $products_seller->seller_id ))
                  <input class="i-check" checked type="checkbox"  name="sellers" value="{{ $products_seller->seller_id }}" />{{$products_seller->seller_name}}
                  @else
                    <input class="i-check" type="checkbox"  name="sellers" value="{{ $products_seller->seller_id }}" />{{$products_seller->seller_name}}
                  @endif
                  <!-- <span class="category-filters-amount">(55)
                  </span> -->
                </label>
              </div>
            @endforeach

          </div>

        @endif


        @if(isset($products_brands) && !empty($products_brands))

        <div class="category-filters-section">
          <h3 class="widget-title-sm">Brands</h3>

          @foreach($products_brands as $products_brand)
          <div class="checkbox">
            <label>
              <input class="i-check" type="checkbox"  name="brand" value="{{$products_brand->brand_id}}" />{{$products_brand->brand_name}}
              <span class="category-filters-amount">({{$products_brand->total}})</span>
            </label>
          </div>
          @endforeach

        </div>

        @endif

        @if(isset($product_colors) && !empty($product_colors))

        <div class="category-filters-section">
          <h3 class="widget-title-sm">Colors
          </h3>

          @foreach($product_colors as $product_color)
          <div class="checkbox">
            <label>
              <input class="i-check" type="checkbox" name="color"  value="{{ $product_color->color_id }}" />{{ $product_color->color_name }}<span style="height: 15px; width: 30px;   background-color: {{ $product_color->color_value }}; border-radius: 30%; display: inline-block;"></span>
              <span class="category-filters-amount">({{ $product_color->total }})
              </span>
            </label>
          </div>
          @endforeach

        </div> 

        @endif


    </aside>
    </div>
    <div class="col-md-9">
      <div class="row" data-gutter="15">
        @if(isset($product_against_seller) && !empty($product_against_seller))
          @foreach($product_against_seller as $products)
            <div class="col-md-4">
              <div class="product ">
                  <ul class="product-labels">
                  </ul>
                  <div class="product-img-wrap">
                      <img class="product-img-primary" src="{{asset('images/product/thumb/'. $products->main_image.'')}}" alt="Image Alternative text" title="Image Title" />
                      <img class="product-img-alt" src="{{asset('images/product/thumb/'. $products->main_image.'')}}" alt="Image Alternative text" title="Image Title" />
                  </div>
                  <a class="product-link" href="{{route('web.product_details',['product_id' => encrypt($products->id)])}}">
                  </a>
                  <div class="product-caption">
                      {{-- <ul class="product-caption-rating">
                          <li class="rated">
                              <i class="fa fa-star">
                                </i>
                          </li>
                          <li class="rated">
                              <i class="fa fa-star">
                                </i>
                          </li>
                          <li class="rated">
                              <i class="fa fa-star">
                                </i>
                          </li>
                          <li class="rated">
                              <i class="fa fa-star">
                                </i>
                          </li>
                          <li>
                              <i class="fa fa-star">
                                </i>
                          </li>
                      </ul> --}}
                      <h5 class="product-caption-title">{{$products->name}}
                            </h5>
                      <div class="product-caption-price">
                          <span class="product-caption-price-new">{{ number_format($products->price,2)}}
                              </span>
                      </div>
                      <ul class="product-caption-feature-list">
                          {{-- <li>3 left
                          </li> --}}
                          <li>Free Shipping
                          </li>
                      </ul>
                  </div>
              </div>
            </div>
          @endforeach
        @endif
      </div>
      <div class="row">
        @if(isset($pagination))
          <div class="col-md-6">
            <p class="category-pagination-sign">{{$pagination['total_product']}} items found in Cell Phones. Showing {{$pagination['current_page']}} - {{$pagination['total_page']}}
            </p>
          </div>
          <div class="col-md-6">
            <nav>
              <ul class="pagination category-pagination pull-right">

                @if(!empty($pagination['total_page']))
                  @for($i = 1; $i <= $pagination['total_page']; $i++ )

                    @if($i == $pagination['current_page'])
                      <li class="active">
                        <a href="#">{{$i}}
                        </a>
                      </li>
                    @elseif($i == $pagination['total_page'])
                      <li class="last">
                        <a href="#">
                           <i class="fa fa-long-arrow-right"></i>
                        </a>
                      </li>
                    @else
                      <li class="active">
                        <a href="#">{{$i}}
                        </a>
                      </li>
                    @endif
                  @endfor
                @endif
                
                </li>
                <li class="last">
                  <a href="#">
                    <i class="fa fa-long-arrow-right">
                    </i>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
@if(isset($product_min_max_price) && !empty($product_min_max_price) && !empty($product_min_max_price->min_price) && !empty($product_min_max_price->max_price))
<script type="text/javascript">
  $("#price-slider").ionRangeSlider({
    min: {{ $product_min_max_price->min_price }},
    max: {{ $product_min_max_price->max_price }},
    type: 'double',
    prefix: "Rs ",
    prettify: false,
    hasGrid: false
});
</script>
@else
  <script type="text/javascript">
  $("#price-slider").ionRangeSlider({
    min: 0,
    max: 1000,
    type: 'double',
    prefix: "Rs ",
    prettify: false,
    hasGrid: false
});
@endif
</script>

<script>



$("#irs-1").click(function () {

  // var category_id_filter = $("#category_id_filter").val();
  // var prices = $("#price-slider").val();

  // var filter_color = $("input[name='color']:checked").map(function(){return $(this).val();}).get();

  // var filter_sellers = new Array();
  // $("input:checkbox[name=sellers]:checked").each(function(){
  //     filter_sellers.push($(this).val());
  // });

  // var filter_brands = new Array();
  // $("input:checkbox[name=brand]:checked").each(function(){
  //     filter_brands.push($(this).val());
  // });
  // console.log(filter_brands);
  // console.log(filter_sellers);
  // console.log(filter_color);
 
  filterProduct();
  

  // alert("category "+category_id_filter+" filter_color "+filter_color+" prices "+prices+" filter_sellers "+filter_sellers+" filter_brands "+filter_brands);

})


  function filterProduct() {
      var category_id_filter = $("#category_id_filter").val();
      var prices = $("#price-slider").val();

      var filter_color = $("input[name='color']:checked").map(function(){return $(this).val();}).get();

      var filter_sellers = new Array();
      $("input:checkbox[name=sellers]:checked").each(function(){
          filter_sellers.push($(this).val());
      });

      var filter_brands = new Array();
      $("input:checkbox[name=brand]:checked").each(function(){
          filter_brands.push($(this).val());
      });
      // console.log(filter_brands);
      // console.log(filter_sellers);
      // console.log(filter_color);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url:"{{ route('web.product_filter')}}",
        data:{
          category:category_id_filter,
          prices:prices,
          colors:filter_color,
          sellers:filter_sellers,
          brands:filter_brands,
        },
        beforeSend:function() { 
             $('#myModal').modal('show');
             $("#myModal").removeClass("mfp-hide");


        },
        // complete:function() {
        //        $("#loading-excel").remove();
        // },
        success:function(data){
           $('#myModal').modal('hide');
          $("#myModal").addClass("mfp-hide");
            console.log(data);
            // var cat = JSON.parse(data);
            // $("#first_category").html("<option value=''>Please Select Sub Category</option>");

            // $.each( cat, function( key, value ) {
            //     $("#first_category").append("<option value='"+key+"'>"+value+"</option>");
            // });

        }
    });
  }
</script>



@endsection