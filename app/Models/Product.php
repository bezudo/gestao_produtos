<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'brand_id',
        'category_id',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function addStock($amount)
    {
        if ($amount > 0) {
            $this->quantity += $amount;
            $this->save();
            return true;
        }
        return false;
    }

    public function removeStock($amount)
    {
        if ($amount > 0 && $this->quantity >= $amount) {
            $this->quantity -= $amount;
            $this->save();
            return true;
        }
        return false;
    }

    public function adjustStock($amount)
    {
        if ($amount >= 0) {
            $this->quantity = $amount;
            $this->save();
            return true;
        }
        return false;
    }
}
