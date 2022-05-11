<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function bangla()
    {
        session()->get('language');
        session()->forget('language');
        session::put('language','bangla');
        return redirect()->back();
    }
    
    public function english()
    {
        session()->get('language');
        session()->forget('language');
        session::put('language','english');
        return redirect()->back();
    }
}
