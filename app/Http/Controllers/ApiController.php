<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class ApiController extends Controller
{
    public function index()
    {
        $flowers = Flower::all();

        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function amount($amount)
    {
        $flowers = Flower::take($amount)->get();

        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function type($type)
    {
        $flowers = Flower::where('type', $type)->get();

        return $flowers->toJson(JSON_PRETTY_PRINT);
    }

    public function amountType($amount, $type)
    {
        $flowers = Flower::where('type', $type)->take($amount)->get();

        return $flowers->toJson(JSON_PRETTY_PRINT);
    }
}
