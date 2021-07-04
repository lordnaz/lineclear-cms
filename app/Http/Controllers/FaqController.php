<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq as Faq;

class FaqController extends Controller
{
    //
    public function index(){

        $parents = Faq::where('active', true)
                        ->orderBy('sort_no', 'asc')
                        ->get();

        $parentsOnly = Faq::where('parent_id', null)
                        ->where('active', true)
                        ->orderBy('sort_no', 'asc')
                        ->get();

        // return $parent_id;

        // die();

        return view('components.faq', compact('parents', 'parentsOnly'));
    }

    public function editFaq($id){

        // all item 
        $item = Faq::where('id', $id)
                    ->first();

        // return $item;

        // die();

        return view('components.faq_edit', compact('item'));

    }

    public function deleteParent($id){
        $currentdt = date('Y-m-d H:i:s');

        $deleteParent = Faq::where('id', $id)
                        ->update([
                            'active' => false,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => $currentdt
                        ]);

        $deleteChild = Faq::where('parent_id', $id)
                        ->update([
                            'active' => false,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => $currentdt
                        ]);

        return redirect('faq');
    }

    public function deleteChild($id){

        $currentdt = date('Y-m-d H:i:s');

        $deleteItem = Faq::where('id', $id)
                        ->update([
                            'active' => false,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => $currentdt
                        ]);

        return redirect('faq');
    }

    public function submitFaq(Request $req){

        // $data = $req->input();
        // return $data;
        // die();

        $currentdt = date('Y-m-d H:i:s');

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
        $faq->active = true;
        $faq->created_at = $currentdt;
        $faq->updated_at = $currentdt;

        $faq->save();

        return redirect()->route('faq');
    }


    public function updateFaq(Request $req){

        // $data = $req->input();
        // return $data;
        // die();

        $currentdt = date('Y-m-d H:i:s');

        $updateItem = Faq::where('id', $req->id)
                        ->update([
                            'sort_no' => $req->number, 
                            'question_str' => $req->editor3,
                            'answer_str' => $req->editor4,
                            'updated_by' => auth()->user()->id,
                            'updated_at' => $currentdt
                        ]);

        return redirect()->route('edit_faq', ['id' => $req->id]);

    }
}
