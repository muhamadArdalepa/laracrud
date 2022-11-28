<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('test');
    }
    public function index()
    {
        return 'lecturer addition form';
    }
    public function create()
    {
        return 'lecturer data table';
    }
    public function show()
    {
        return 'lecturer detail page';
    }
}
