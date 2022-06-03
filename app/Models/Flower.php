<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Flower extends Model
{
    use HasFactory;

    // By default, table name is assumed to be 'flowers'
    // protected $table = 'flower';

    // By default, it assume table has a primary key named 'id'
    // protected $primaryKey = 'myprimarykey';

    // If you are not using timestamps() features (created_at / updated_at)
    // public $timestamps = false;

    public function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value . ' €',
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('d M Y', strtotime($value)),
        );
    }

    // Relationship
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
