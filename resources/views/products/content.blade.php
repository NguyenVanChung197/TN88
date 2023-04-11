@extends('main')
@section('content')
    <div class="container p-t-80">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="/" class="stext-109 cl8 hov-cl1 trans-04" style="font-family: 'Roboto', sans-serif;">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->category->id }}-{{ Str::slug($product->category->name) }}.html"
               class="stext-109 cl8 hov-cl1 trans-04" style="font-family: 'Roboto', sans-serif;">
                {{ $product->category->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4" style="font-family: 'Roboto', sans-serif;">
				{{ $title }}
			</span>
        </div>
    </div>

    <section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">
                                    <li class="slick-active" role="presentation">
                                        <img src="{{ $product->thumb }}">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w">
                                <button class="arrow-slick3 prev-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-left" aria-hidden="true"></i></button>
                                <button class="arrow-slick3 next-slick3 slick-arrow" style=""><i
                                        class="fa fa-angle-right" aria-hidden="true"></i></button>
                            </div>

                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                             data-thumb="images/product-detail-01.jpg" data-slick-index="0"
                                             aria-hidden="false"
                                             style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                             tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">

                                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                   href="images/product-detail-01.jpg" tabindex="0">
                                                    <i class="fa fa-expand"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14" style="font-family: 'Roboto', sans-serif;">
                            {{ $title }}
                        </h4>

                        <p class="stext-102 cl3 p-t-23" style="font-family: 'Roboto', sans-serif; color: black; font-size: 14px">
                            {{ $product->description }}
                        </p>

                        <p class="stext-102 cl3 p-t-23" style="color: black; font-size: 16px" style="font-family: 'Roboto', sans-serif;">
                            Giá : {{ number_format($product->price) }}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <!-- <form action="/add-cart" method="post"> -->
                                        @if ($product->price !== NULL)
                                            @if($product->qty > 0)
                                            <button class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning" style="width:430px; transform: translate(-110px, 0)"role="button" style="font-family: 'Roboto', sans-serif;">Thêm vào giỏ hàng</a> </button>
                                            @else
                                            <button class="btn-holder btn btn-warning" style="width:430px; transform: translate(-110px, 0)"role="button" style="font-family: 'Roboto', sans-serif;"disabled> Hết hàng </button>
                                            @endif
                                        @endif
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        

                        <!--  -->
                    </div>
                    
                </div>
            </div>
        <div>
 </section>

 @include('products.rate')

    <section class="sec-relate-product bg0 p-t-45 p-b-105">
        
    </section>

@endsection
