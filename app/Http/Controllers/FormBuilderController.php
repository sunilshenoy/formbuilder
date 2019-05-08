<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Illuminate\Support\Facades\Auth;

class FormBuilderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List forms created.
     */

    function index()
    {
        //Get a list of forms created.
        $dynamicForms = DB::table('forms')->get();
        return view('builder/index',['forms'=>$dynamicForms]);
    }

    /**
     * Create new dynamic form
     */

    function create()
    {
        return view('builder/create');
    }

    /**
     * Store the new dynamic form data
     */

    function store(Request $request)
    {
        //Validate the form entry
        $validator = Validator::make($request->all(), [
                  'form_structure' => 'required|json',
                  'name' => 'required|max:100'
                ]);
        if (!$validator->fails()) {
            //Store the dynamic form data
            DB::table('forms')->insert(['user_id' => Auth::id(),'name'=>$request['name'],'json_schema'=>$request['form_structure'],'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]);
            $request->session()->flash('status', 'Form created!');
            return redirect('/home');
        } else {
            return redirect('/create')->withErrors($validator)->withInput();
        }
    }
}
