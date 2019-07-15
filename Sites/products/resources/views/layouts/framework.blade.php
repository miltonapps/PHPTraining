@extends('layouts.app')

@section('framework')
<div class="products-container">
    <div class="products-list-page">
        <div class="product-head-banner top-nav row">
            <div class="top-nav-left offset-sm-5 offset-md-0 offset-4">
                <img src="/images/logowhite.svg" class="logo-padding"/>
            </div>
            <div class="top-nav-mid col-md-8 offset-md-0 col-sm-12 offset-sm-1 col-10 offset-1">
                <div class="top-nav-mid-top">
                    <a id="middle-drop-down" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                        <?php $string = $currentCategory;
                        if (strlen($string) > 8) {
                            $trimstring = substr($string, 0, 8). '...';
                        } else {
                            $trimstring = $string;
                        }
                        echo $trimstring;
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="middle-drop-down">
                            @foreach ($categories as $category)
                            <a class="dropdown-item" href="{{ route('homeCategory', $category->name) }}"
                                onclick="event.preventDefault();
                                                document.getElementById('category-form{{$category->id}}').submit();">
                                {{ __($category->name) }}
                            </a>
                            <form id="category-form{{$category->id}}" action="{{ route('homeCategory', $category->name) }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                            @endforeach

                    </div>
                    <div class="search-bar">
                        <input id="searchInput" placeholder="Search..."/>
                        <span id="searchBtn" class="fa fa-search scope" onclick="event.preventDefault();
                            window.location = '/home/search/' + document.getElementById('searchInput').value;">
                        </span>
                    </div>
                </div>
                <div class="top-nav-mid-bottom">
                    <span>Lisings</span>
                    <span>Item 2</span>
                    <span>Item 3</span>
                </div>
            </div>
            <div class="top-nav-right offset-2 offset-sm-4 offset-md-0">
                <div class="top-nav-right-icon">
                    <i class="fas fa-shopping-basket"style="color:white;font-size:1.6em"></i>
                </div>
                <div>
                <hr class="vertical-bar"/>
                </div>
                <div class="top-nav-right-group">
                    <div class="top-nav-right-group-name">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle top-nav-right-group-text" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php $string = 'Hello, '. Auth::user()->name;
                                if (strlen($string) > 16) {
                                    $trimstring = substr($string, 0, 16). '...';
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
                    <div class="top-nav-right-group-text">Your Account</div>
                </div>

                <div class="top-nav-right-end">
                        <i class="fas fa-user"style="color:white;font-size:1.6em"></i>
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
            @if ($currentProduct != null and strlen($currentProduct->name))
            / {{$currentProduct->name}}
            @endif
        </div>

        @yield('content')
        
        <div class="product-head-banner top-nav row product-footer">
                <div class="top-nav-left offset-sm-5 offset-md-0">
                    <img src="/images/logowhite.svg" class="logo-padding"/>
                </div>
                <hr class="bottom-line"/>

                <div class="logo-padding year">{{ __('© 2019 CUB') }}</div>
                <div class="logo-padding contact">{{ __('Contact | FAQs | Privacy Policy | Terms of Use') }}</div>
        </div>
    </div>
</div>
@endsection
