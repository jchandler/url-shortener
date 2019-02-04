<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UrlFormController extends Controller
{
    public function form()
    {
      return view('url.form');
    }

    public function save()
    {
      
    }
}
