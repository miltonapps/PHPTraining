@extends('layouts.app')

@section('title', 'CLUB CONNECT')

@section('content')
<div class="products-container">
    <div class="products-list-page">
        <div>
            <div>
                <div>
                    <div class="product-head-banner top-nav">
                        <div class="top-nav-left">
                            <img src="/images/logowhite.svg" class="logo-padding"/>
                        </div>
                        <div class="top-nav-middle">
                            <a id="middleDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{$currentCategory}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="middleDropdown">
                                    @foreach ($categories as $category)
                                    <a class="dropdown-item" 
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __($category->name) }}
                                    </a>
    
                                    <form id="logout-form" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endforeach
                            </div>
                        </div>
                        <div class="top-nav-right">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <?php $string = 'Hello, '. Auth::user()->name;
                                    if (strlen($string) > 20) {
                                        $trimstring = substr($string, 0, 20). '...';
                                    } else {
                                        $trimstring = $string;
                                    }
                                    echo $trimstring;
                                ?>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="product-subhead-banner">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Home / Category / {{$currentCategory}}
                    </div>
                </div>
            </div>
        </div>
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
                            <button value="View" class="product-link">View</button>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
