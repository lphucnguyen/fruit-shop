<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'unit'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function invoices()
    {
        return $this
            ->belongsToMany(Invoice::class, 'fruit_invoice', 'fruit_id', 'invoice_id')
            ->withPivot(['quantity', 'category_name']);
    }
}
