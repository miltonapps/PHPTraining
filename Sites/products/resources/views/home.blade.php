@extends('layouts.framework')

@section('content')
<div class="content">
    <div class="products-grid row">
        @foreach ($products as $product)
            @if ($product->category->name == $currentCategory || $currentCategory == "All")
            <div class="product-card col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xm-12">
                <div class="product-item card">
                    <div class="product-image-wrap">
                        <img src="/images/<?php echo str_replace(' ','', $product->name)?>@2x.png"  class="product-image"/>
                    </div>
                    <div class="product-name product-text">
                        {{ $product->name }}
                    </div>
                    <div class="product-text">
                        {{ $product->alcohol_percentages }}% {{ $product->volumn_ml }}ml
                    </div>
                    <div class="product-text">
                        ${{ $product->unit_price }} - ${{ $product->package_lg_price }}
                    </div>
                    <button value="View" class="product-link" onclick="event.preventDefault();
                    window.location = '/details/' + <?php echo $product->id ?>;">View</button>
                </div>
            </div>
            @endif
        @endforeach
    </div>
    @if ($products != null and count($products) > 0)
        <div class="products-grid">
            {{ $products->links() }}
        </div>
    @else
    No products found.
    @endif
</div>
@endsection
