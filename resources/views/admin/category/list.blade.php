@extends('admin.main')

@section('content')
<form method="GET" action="{{ route('test3')}}">
                    <div class="dis-none panel-search w-full p-t-10 p-b-15" style="margin: 20px;">
                        <div class="bor8 dis-flex p-l-15">
                        <input name="search" id="search_input" class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" placeholder="Nhập từ khóa" style="padding: 5px; border-radius: 15px" />
                            <button style=" border-radius: 15px;padding: 5px;" class="btn-primary size-113 flex-c-m fs-16 cl2 hov-cl1 tran-04" type="submit" >
                                Tìm kiếm
                            </button>
                        </div>
    </div>
</form>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center">Tên danh mục</th>
                <th style="text-align: center">Tình trạng</th>
                <th style="text-align: center">Cập nhật</th>
                <th style="width: 100px">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::category($categories) !!}
        </tbody>
    </table>
    <div>
        {{ $categories->links() }}
    </div>
@endsection


