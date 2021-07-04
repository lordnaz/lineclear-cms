<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Faq as Faq;

class FaqController extends Controller
{
    //
    public function index(){

        if(auth()->user()){

            $parents = Faq::where('active', true)
                        ->orderBy('sort_no', 'asc')
                        ->get();

            $parentsOnly = Faq::where('parent_id', null)
                            ->where('active', true)
                            ->orderBy('sort_no', 'asc')
                            ->get();

            return view('components.faq', compact('parents', 'parentsOnly'));
            
        }else{
            // return view('auth.login');
            return redirect('login');
        }

    }

    public function editFaq($id){

        if(auth()->user()){
            // all item 
            $item = Faq::where('id', $id)
                        ->first();

            return view('components.faq_edit', compact('item'));
        }else{
            // return view('auth.login');
            return redirect('login');
        }

    }

    public function deleteParent($id){

        if(auth()->user()){
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
        }else{
            // return view('auth.login');
            return redirect('login');
        }
        
    }

    public function deleteChild($id){

        if(auth()->user()){
            $currentdt = date('Y-m-d H:i:s');

            $deleteItem = Faq::where('id', $id)
                            ->update([
                                'active' => false,
                                'updated_by' => auth()->user()->id,
                                'updated_at' => $currentdt
                            ]);

            return redirect('faq');
        }else{
            // return view('auth.login');
            return redirect('login');
        }
    }

    public function submitFaq(Request $req){

        if(auth()->user()){
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

        }else{
            // return view('auth.login');
            return redirect('login');
        }

    }


    public function updateFaq(Request $req){

        // $data = $req->input();
        // return $data;
        // die();
        
        if(auth()->user()){
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
        }else{
            // return view('auth.login');
            return redirect('login');
        }
    }
}
