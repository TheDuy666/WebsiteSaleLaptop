@extends('layout.customerApp')

@section('content')
<div class="card">
    <div class="row justify-content-between my-4">
        @foreach($allProducts->chunk(4) as $chunk)
            @foreach($chunk as $product)
                <li class="col-6 col-wd-3 col-md-4 product-item">
                    <div class="product-item__outer h-100">
                        <div class="product-item__inner px-xl-4 p-3">
                            <div class="product-item__body pb-xl-2">
                                <div class="mb-2"><a href=""  class="font-size-12 text-gray-5">{{$product-> category_name}}</a></div>
                                <h5 class="mb-1 product-item__title"><a href="{{ route('customer.view-detail', ['id' => $product->id]) }}" class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
                                <div class="mb-2">
                                    <a href="{{ route('customer.view-detail', ['id' => $product->id]) }}" class="d-block text-center"><img class="img-fluid" style="max-width: 100%; height: 200px";  src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}"></a>
                                </div>
                                <div class="flex-center-between mb-1">
                                    <div class="prodcut-price">
                                        <div class="text-gray-100"><p class="card-text">Price: {{ number_format($product->price),0, ',', '.'}}VNĐ</p></div>
                                    </div>
                                    <form action="{{ route('cart.add', $product->id) }}" method="GET" id="frmQuantity">
                                    @csrf
                                        <input type="hidden" value="ADD_TO_CART" name="type" id="type"/>
                                        <div class="d-none d-xl-block product-add-cart">
                                            <button  type="submit" class="btn-add-cart btn-primary "><i class="ec ec-add-to-cart"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                    <a href="{{ route('customer.view-detail', ['id' => $product->id]) }}" class="text-gray-6 font-size-13">
                                        <form action="{{route('customer.buy-now', ['product_id'=>$product->id])}}" method="post" class="container">
                                            @csrf
                                            @if($product->quantity > 0)
                                                <button type="submit" class="btn btn-primary">Đặt hàng</button>
                                            @else
                                                <button type="submit" class="btn btn-danger" disabled>Hết hàng</button>
                                            @endif
                                            <a href="{{ route('customer.view-detail', ['id' => $product->id]) }}" class="btn btn-outline-dark" style="margin-right:10px">View Details</a>
                                        </form>

                                    </a>
                                </div>
                            </div>
                            <div class="product-item__footer">

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        @endforeach
    </div>
</div>

@endsection
