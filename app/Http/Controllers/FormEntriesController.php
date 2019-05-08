<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormEntriesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    function index($form_id)
    {
        if(isset($form_id)) {
            $formDetails = DB::table('forms')->where('id',$form_id)->get();
            $formEntries = DB::table('form_entries')->where('form_id',$form_id)->get();
            return view('entries/index',['form'=>$formDetails,'entries'=>$formEntries]);
        } else
            return view('/home');

    }
    function create($form_id)
    {
        $formDetails = DB::table('forms')->where('id',$form_id);
        if($formDetails->count() > 0) {
            $form = $formDetails->get();
            $fields = json_decode($form[0]->json_schema);
            return view('entries/new',['form'=>$form,'fields'=>$fields]);
        }

    }
    function store($form_id, Request $request)
    {
        //TODO: Have a way to validate the dynamic data
        $jsonData = json_encode($request->except('_token'));
        DB::table('form_entries')->insert(
                ['form_id' => $form_id,'data'=>$jsonData,'created_at'=>date("Y-m-d H:i:s"),'updated_at'=>date("Y-m-d H:i:s")]
        );
        return redirect('entries/'.$form_id);
    }
    function edit($form_id, $entry_id)
    {
        $formDetails = DB::table('forms')->where('id',$form_id);
        if($formDetails->count() > 0) {

            $form = $formDetails->get();
            $fields = json_decode($form[0]->json_schema);
            $formEntry = DB::table('form_entries')->where('id', $entry_id)->where('form_id',$form_id)->get();
            $entry = json_decode($formEntry[0]->data);

            return view('entries/edit',['form'=>$form,'fields'=>$fields,'entry'=>$entry,'entry_id'=>$entry_id]);
        }
    }

    function update($form_id, $entry_id, Request $request)
    {
        //TODO: Have a way to validate the dynamic data
        $jsonData = json_encode($request->except('_token','_method'));
        DB::table('form_entries')->where('form_id',$form_id)->where('id',$entry_id)->update(
                ['form_id' => $form_id,'data'=>$jsonData,'updated_at'=>date("Y-m-d H:i:s")]
        );
        return redirect('entries/'.$form_id);
    }

    function delete($form_id, $entry_id, Request $request)
    {

        DB::table('form_entries')->where('id', $entry_id)->where('form_id',$form_id)->delete();
        $request->session()->flash('status', 'Entry deleted!');
        return redirect('entries/'.$form_id);
    }
}
