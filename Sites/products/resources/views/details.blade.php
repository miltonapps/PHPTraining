@extends('layouts.framework')

@section('content')
<div class="details-frame">
    <a href="/home/category/{{$currentCategory}}">
        < Back
    </a>
    <div class="products-grid row">
        <div class="left-panel col-12 col-sm-12 col-md-8 card row">

            <div class="product-image-wrap col-sm-3 col-md-3">
                <img src="/images/<?php echo str_replace(' ','', $currentProduct->name)?>@2x.png"
                    class="product-image" />
            </div>
            <div class="description col-sm-9 col-md-9">
                <div class="brand-row">
                    <i class="fas fa-copyright" style="font-size:1.6em"></i>
                    <span>{{$currentProduct->brand}}</span>
                </div>
                <div class="name">{{$currentProduct->name}}</div>
                <div class="type">{{$currentProduct->type}}</div>
                <h6 class="brew">Brew Sheet</h6>
                <div class="icon-bar">
                    <div class="percentage">
                        <i class="fas fa-percent" style="font-size:1.4em"></i>
                        <span>{{$currentProduct->alcohol_percentages}}%</span>
                    </div>

                    <div class="volume">
                        <i class="fas fa-glass-whiskey" style="font-size:1.4em"></i>
                        <span>{{$currentProduct->volumn_ml}}ml</span>
                    </div>

                    <div class="type-icon">
                        <i class="fas fa-beer" style="font-size:1.4em"></i>
                        <span>{{$currentProduct->type}}</span>
                    </div>

                    <div class="location">
                        <i class="fas fa-globe-africa" style="font-size:1.4em"></i>
                        <span>{{$currentProduct->location}}</span>
                    </div>
                </div>

                <h6 class="brew">Description</h6>
                <div class="description">{{$currentProduct->description}}</div>

                <h6 class="brew">Rating</h6>
                <div class="icon-bar">
                    <?php
                                function formatString($num) {
                                    if($num>1000) {

                                    $x = round($num);
                                    $x_number_format = number_format($x);
                                    $x_array = explode(',', $x_number_format);
                                    $x_parts = array('k', 'm', 'b', 't');
                                    $x_count_parts = count($x_array) - 1;
                                    $x_display = $x;
                                    $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
                                    $x_display .= $x_parts[$x_count_parts - 1];

                                    return $x_display;

                                    }

                                    return $num;
                                    } 
                                ?>
                    <div class="up">
                        <i class="far fa-thumbs-up" style="color:red;font-size:1.4em"></i>
                        <span><?php echo formatString($currentProduct->rating_up); ?></span>
                    </div>

                    <div class="down">
                        <i class="far fa-thumbs-down" style="color:green;font-size:1.4em"></i>
                        <span><?php echo formatString($currentProduct->rating_down); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="right-panel col-md-auto card">
            <label>Price & Quantity</label>

            <div class="price-box">
                <div class="uom">
                    <div class="unit">Per Bottle</div>
                    <div class="price">${{$currentProduct->unit_price}}</div>
                </div>
                <div class="price-bar">
                    <button id='price1-' class='down_count btn' title='Down'>-</i></button>
                    <input id='price1-counter' class='counter' type="text" placeholder="value..." value='0' />
                    <button id='price1+' class='up_count btn' title='Up'>+</button>
                </div>
            </div>
            <div class="price-box">
                <div class="uom">
                    <div class="unit">6 Pack</div>
                    <div class="price">${{$currentProduct->package_sm_price}}</div>
                </div>
                <div class="price-bar">
                    <button id='price2-' class='down_count btn' title='Down'>-</i></button>
                    <input id='price2-counter' class='counter' type="text" placeholder="value..." value='0' />
                    <button id='price2+' class='up_count btn' title='Up'>+</button>
                </div>
            </div>

            <div class="price-box">
                <div class="uom">
                    <div class="unit">Slab (24 Pack)</div>
                    <div class="price">${{$currentProduct->package_lg_price}}</div>
                </div>
                <div class="price-bar">
                    <button id='price3-' class='down_count btn' title='Down'>-</i></button>
                    <input id='price3-counter' class='counter' type="text" placeholder="value..." value='0' />
                    <button id='price3+' class='up_count btn' title='Up'>+</button>
                </div>
            </div>

            <button value="View" class="product-link">Add to basket</button>

            <button value="View" class="product-link checkout">Proceed to Checkout</button>
        </div>
    </div>
</div>
@endsection