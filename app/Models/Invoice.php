<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'user_id'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function fruits()
    {
        return $this
            ->belongsToMany(Fruit::class, 'fruit_invoice', 'invoice_id', 'fruit_id')
            ->withPivot(['quantity', 'category_name']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($invoice) {
            $invoice->id = str()->uuid();
        });
    }
}
