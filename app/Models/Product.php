<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    protected $guareded = [];
    use HasFactory;
    public function orders():BelongsToMany{
        return $this->belongsToMany(Order::class)
                ->withPivot('total_quantity','total_price');
    }
    // public function price():Attribute
    // {
    //     return Attribute::make(fn($value)=>str_replace('.',',',$value/100).'€');
    // }
    public function getFormattedPriceAttribute(){
        return str_replace('.',',',$this->price/100).'$';
    }
}
