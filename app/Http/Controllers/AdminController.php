<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function posts(){
        return view('admin.posts', [
            'pageTitle' => 'Posts',
        ]);
    }
}
