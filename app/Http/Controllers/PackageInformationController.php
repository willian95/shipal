<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageInformationController extends Controller
{
    function index(){
        return view("packageInfomation");
    }
}
