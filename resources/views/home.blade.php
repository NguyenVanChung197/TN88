@extends('main')

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">

                @foreach($banners as $banner)

                    <div class="item-slick1" style="background-image: url({{ $banner->thumb }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Banner -->


    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140" style="margin-top:100px;">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5" style="font-family: 'Roboto', sans-serif;">
                    Tổng quan sản phẩm
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*" style="font-family: 'Roboto', sans-serif;">
                        Tất cả sản phẩm
                    </button>
                </div>
            </div>

            <div id="loadProduct">
            @include('products.list')
            </div>


            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04 " style="font-family: 'Roboto', sans-serif;">
                    Xem thêm
                </a>
            </div>
        </div>
    </section>
@endsection
