<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flower extends Model
{
    use HasFactory;

    // By default, table name is assumed to be 'flowers'
    // protected $table = 'flower';

    // By default, it assume table has a primary key named 'id'
    // protected $primaryKey = 'myprimarykey';

    // If you are not using timestamps() features (created_at / updated_at)
    // public $timestamps = false;
}
