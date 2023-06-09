@extends('main')

@section('content')
    <div class="bg0 m-t-23 p-b-140 p-t-80">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                   <h3 style="font-family: 'Roboto', sans-serif; " >{{ $title }}</h3>
                </div>

                <div class="flex-w flex-c-m m-tb-10">
                    <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                        <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                        <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        <span style="font-family: 'Roboto', sans-serif;" ></span>
                    </div>

                    <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                        <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                        <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                        
                        <span style="font-family: 'Roboto', sans-serif;" >
                        Tìm kiếm</span>
                    </div>
                </div>

                <!-- Search product -->
                <!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                    </div>
                </div> -->

                <form method="GET" action="{{ route('cates.index', ['id' => $id, 'slug' => $slug])}}">
                    <div class="dis-none panel-search w-full">
                        <div class="bor8 dis-flex p-l-15">
                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 tran-04" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                            <input name="search" id="search_input" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" placeholder="Nhập từ khóa" style="color:gray; font-family: 'Roboto', sans-serif;" name="search-product" />
                        </div>
    </div>
</form>

                <!-- Filter -->
                <div class="dis-none panel-filter w-full p-t-10">
                    <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                        <div class="filter-col1 p-r-15 p-b-27">
                            <div class="mtext-102 cl2 p-b-15" style="font-family: 'Roboto', sans-serif;" >
                                Sắp xếp theo
                            </div>

                            <ul>
                                <li class="p-b-6">
                                    <a href="{{ request()->url() }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto', sans-serif;">
                                        Mặc định
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'asc']) }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto', sans-serif;">
                                        Giá : Thấp đến Cao
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <a href="{{ request()->fullUrlWithQuery(['price' => 'desc']) }}" class="filter-link stext-106 trans-04" style="font-family: 'Roboto', sans-serif;">
                                        Giá : Cao đến Thấp
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('products.list')

            {!! $products->links() !!}
        </div>
    </div>
@endsection
