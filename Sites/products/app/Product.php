<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name',
     'category_id',
     'brand',
     'description',
     'location',
     'alcohol_percentages',
     'volumn_ml',
     'type',
     'rating_up',
     'rating_down',
     'unit_price',
     'package_sm_price',
     'package_sm_qty',
     'package_lg_price',
     'package_lg_qty',
    ];

    public function category()
    {
        return $this->hasOne('\App\Category', 'id', 'category_id');
    }
}
