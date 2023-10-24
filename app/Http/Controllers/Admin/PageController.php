<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PageController extends Controller
{
  public function index()
  {
    $title = "Homepage";
    return view('home', compact('title'));
  }
}