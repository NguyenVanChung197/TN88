<div class="reviews">
<div class="review-group mt-20">
    <div class="show-review">
        Đánh giá sản phẩm
        <i class="fa-solid fa-caret-down"></i>
    </div>
    @foreach( $rates as $rate)
    <div class="review-item mt-20">
        <div class="review-user row">
            <div class="user-name ml-20">{{ $rate->user->name}}</div>
            <div class="user-rate row ml-20">
                @for ($i = 0; $i < $rate->star; $i++)
                <i class="user-star-icon active fa fa-star"></i>
                @endfor
                @for ($i = 0; $i < 5 - $rate->star; $i++)
                <i class="user-star-icon fa fa-star-regular"></i>
                @endfor
            </div>
            <div class="user-time ml-20">
                @if(is_null($rate->updated_at))
                {{ $rate->created_at }}
                @else
                {{ $rate->updated_at }}
                @endif
            </div>
        </div>
        <div class="review-message mt-20">{{ $rate->content }}</div>
        @if (auth()->user())
        <div class="accordion-item button-reply-items">
            <div class="group-btn row mt-20">
                <a class="accordion-button collapsed btn-reply" href="#collapseEditReview{{$rate->id}}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseEditReview{{$rate->id}}">
                Trả lời
                </a>
                @if($rate->isMyReview())
                <a class="btn-edit mt-10 ml-20" data-toggle="collapse" href="#editReview{{$rate->id}}" role="button" aria-expanded="false" aria-controls="editReview{{$rate->id}}">Sửa</a>
                <form action="{{ route('reviews.destroy', [$rate->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn-delete">Xóa</button>
                </form>
                @endif
            </div>
            <div class="collapse" id="collapseEditReview{{$rate->id}}">
                <div class="form-reply">
                    <form action="{{ route('reviews.store') }}" method="POST">
                        @csrf
                        <div class="form-floating">
                            <textarea name="content" id="message" class="review-textarea @error('message') is-invalid @enderror" autofocus></textarea>
                            <label for="floatingTextarea" class="mt-20 ml-20">Nội dung</label>
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="parent_id" value="{{ $rate->id }}">
                        <div class="btn-comment">
                            <button type="submit" class="btn-send">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        <div class="box-edit collapse" id="editReview{{$rate->id}}">
            <div class="form-comment">
                <form action="{{ route('reviews.update',[$rate->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-floating">
                        <textarea name="content" id="content" class="review-update-textarea @error('content') is-invalid @enderror" autofocus>{{ $rate->content }}</textarea>
                        <label for="floatingTextarea" class="mt-20 ml-20">Nội dung</label>

                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="btn-comment">
                        <button type="submit" class="btn-send">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="user-reply mt-20 ml-40">
            @foreach ($replies as $key => $reply)
            @if($reply->parent_id == $rate->id)
            <div class="review-user mt-20 row">
                <div class="user-name ml-20">{{ $reply->user->name}}</div>
                <div class="user-time ml-20">
                    @if(is_null($reply->updated_at))
                    {{ $reply->created_at }}
                    @else
                    {{ $reply->updated_at }}
                    @endif
                </div>
            </div>
            <div class="review-message mt-20">{{ $reply->content }}</div>
            @if ($reply->isMyReply())
            <div class="group-btn row mt-20">
                <a class="btn-reply-edit ml-20" data-toggle="collapse" href="#editReply{{$reply->id}}" role="button" aria-expanded="false" aria-controls="editReply{{$reply->id}}">Sửa</a>
                <form action="{{ route('reviews.destroy', [$reply->id]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn-delete">Xóa</button>
                </form>
            </div>
            @endif
            <div class="box-edit collapse" id="editReply{{$reply->id}}">
                <div class="form-reply">
                    <form action="{{ route('reviews.update',[$reply->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-floating">
                            <textarea name="content" id="content" class="reply-textarea @error('content') is-invalid @enderror" autofocus>{{ $reply->content }}</textarea>
                            <label for="floatingTextarea"class="mt-20 ml-20">Nội dung</label>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="parent_id" value="{{ $rate->id }}">
                        <div class="btn-comment">
                            <button type="submit" class="btn-send"> Gửi </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endforeach
</div>
<div class="leave-review mt-20">
    <form class="leave-review" action="{{ route('reviews.store') }}" method="POST">
        @csrf
        <div class="leave-title">Đánh giá</div>
        <div class="review-input mt-20 ml-10">
        <label for="floatingTextarea" class="mt-20 ml-20">Nội dung</label>
            <textarea name="content" id="content" class="review-textarea @error('content') is-invalid @enderror" autofocus></textarea>
            @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="leave-vote mt-20 row">
            <span class="vote-title">Đánh giá sao</span>
            <div class="vote-rate row mt-7 ml-20">
                <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                <label class="star star-5" for="star-5"></label>
                <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                <label class="star star-4" for="star-4"></label>
                <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                <label class="star star-3" for="star-3"></label>
                <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                <label class="star star-2" for="star-2"></label>
                <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                <label class="star star-1" for="star-1"></label>
            </div>
        </div>
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn-send">Gửi</button>
    </form>
</div>

</div>