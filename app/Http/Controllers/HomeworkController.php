<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeworkController extends Controller
{
    public function homework()
    {
        return view('admin.homework.list');
    }

    public function add()
    {
        return view('admin.homework.add');
    }
}
