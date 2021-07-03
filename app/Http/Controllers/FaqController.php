<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq as Faq;

class FaqController extends Controller
{
    //
    public function index(){

        return view('components.faq');
    }

    public function submitFaq(Request $req){

        // $data = $req->input();
        // return $data;
        // die();

        $currentdt = date('d-m-Y H:i:s');

        $answer = $req->editor2;

        if($req->parent_id == "" || $req->parent_id == null){
            $answer = "";
        }

        $faq = new Faq;

        $faq->sort_no = $req->number;
        $faq->parent_id = $req->parent_id;
        $faq->question_str = $req->editor;
        $faq->answer_str = $answer;
        $faq->updated_by = auth()->user()->id;
        $faq->created_at = $currentdt;
        $faq->updated_at = $currentdt;

        $faq->save();

        return redirect()->route('faq');
    }
}
