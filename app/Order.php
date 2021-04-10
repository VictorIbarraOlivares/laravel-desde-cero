<?php

namespace App;

use App\User;
use App\Payment;
use App\Product;
use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'customer_id'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }

    public function getTotalAttribute()
    {
        return $this->products()
        ->withoutGlobalScope(AvailableScope::class)// para ignorar los globalScope
        ->get()
        ->pluck('total')->sum();
    }
}
