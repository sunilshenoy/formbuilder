<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class FormBuilderController extends Controller
{
    /**
     * List forms created.
     */

    function index()
    {
        //Get a list of forms created.
        $dynamicForms = DB::table('forms')->get();
        return view('builder/index',['forms'=>$dynamicForms]);
    }
}
