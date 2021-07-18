<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Announcer as Announcer;

class AnnouncerController extends Controller
{
    //
    public function index(){

        $announcer = Announcer::first();

        $active = $announcer->active;
        $imageURL = url('/').$announcer->image_path;
        

        // return $announcer->image_path;

        // return $announcer;
        // die();

        // $parentsOnly = Faq::where('parent_id', null)
        //                 ->where('active', true)
        //                 ->orderBy('sort_no', 'asc')
        //                 ->get();

        // return view('components.faq', compact('parents', 'parentsOnly'));
        
        // return view('components.announcer');

        return view('components.announcer', compact('imageURL', 'active'));

    }

    public function update_popup(Request $req){

        $comments = $req->comments;
        // $formFile = $req->formFile;
        // $comments = $req->comments;

        $status = false;
        $flag = false;
        
        if($comments == "on"){
            $status = true;
        }

        // if formFileada then replace 
        $formFile = $req->file('formFile');
        $image_path = null;

        if($formFile){
            $uploadFile = $this->UploadFile($formFile);
            $image_path = "/storage/popup/".$uploadFile;
            $flag = true;
        }

        $getData = Announcer::get()->count();

        // if data exist update, if not exist insert 
        if($getData > 0){

            $currentdt = date('Y-m-d H:i:s');
            $announcer = Announcer::first()
                                    ->update([
                                        'active' => $status,
                                        'updated_by' => auth()->user()->id,
                                        'updated_at' => $currentdt
                                    ]);
            
            if($flag){

                $currentdt = date('Y-m-d H:i:s');
                $announcer = Announcer::first()
                                    ->update([
                                        'active' => $status,
                                        'image_path' => $image_path,
                                        'updated_by' => auth()->user()->id,
                                        'updated_at' => $currentdt
                                    ]);

                return $image_path;
                die();                  
            }

        }else{

            $currentdt = date('Y-m-d H:i:s');
            $announcer = new Announcer;
            $announcer->image_path = $image_path;
            $announcer->updated_by = auth()->user()->id;
            $announcer->active = $status;
            $announcer->created_at = $currentdt;
            $announcer->updated_at = $currentdt;

            $result = $announcer->save();

        }

        return $req;

        // die();

    }

    function UploadFile($file){

        $file_name = null;

    	if($file){
    		$file_name = $file->getClientoriginalName();
    		// $mime_type = $file->getClientmimeType();

    		// upload into doc path
            $file->move('storage/popup', $file_name);

    	}

        return $file_name;
    }


    // API SECTION 
    public function retrieve_popup(){

        $announcer = Announcer::first();

        $data = [ 
            'status' => true,
            'apiName' => "retrievePopup"
        ];

        $data['data'] = $announcer;

        return response()->json($data);

    }
}
