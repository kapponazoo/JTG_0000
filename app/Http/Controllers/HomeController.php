<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;

class HomeController extends Controller
{
    public function index()
    {
        $pieces = Piece::inRandomOrder()->take(7)->get();
        return view('home', compact('pieces'));
    }
}