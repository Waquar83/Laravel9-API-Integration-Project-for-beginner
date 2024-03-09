<?php

namespace App\Http\Controllers\API\docs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIDocController extends Controller
{
    public function index(){
        return view('docs.api_docs');
    }
}
