<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function index(){

        $slider_lists = Slider::where('active', true)
                    ->orderBy('sort_value', 'asc')
                    ->get();

        return view('components.slider', compact('slider_lists'));
    }

    public function remove_slider($id){
        // return $id;

        $uuid = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Slider::where('id', $id)
                ->update([
                    'updated_by' => $uuid, 
                    'active' => false,
                    'updated_at' => $currentdt
                ]);

        return redirect()->route('slider');
    }

    public function upload_slider(Request $req){

        // $data = $req->input();

        $uuid = auth()->user()->id;
        $currentdt = date('d-m-Y H:i:s');

        // if formFileada then replace 
        $formFile = $req->file('desktopSlider');
        $image_path = null;

        if($formFile){
            $uploadFileDestop = $this->UploadFile($formFile);
            $image_path_desktop = "/storage/slider/".$uploadFileDestop;
            $flag = true;
        }

        // $formFile = $req->file('mobileSlider');
        // $image_path = null;

        // if($formFile){
        //     $uploadFileMobile = $this->UploadFile($formFile);
        //     $image_path_mobile = "/storage/slider/".$uploadFileMobile;
        //     $flag = true;
        // }

        if($uploadFileDestop != null){
            $add_banner = Slider::create([
                'sort_value' => $req->sort,
                'image_path_desktop' => $image_path_desktop,
                'image_path_mobile' => null,
                'external_link' => null,
                'updated_by' => $uuid,
                'created_at' => $currentdt,
                'updated_at' => $currentdt
            ]);
        }
        
        // return $image_path;
        return redirect()->route('slider');

    }

    function UploadFile($file){

        $file_name = null;

    	if($file){
    		// $file_name = $file->getClientoriginalName();
    		// $mime_type = $file->getClientmimeType();
            $extension = $file->extension();

            $file_name = uniqid('').".".$extension;

    		// upload into doc path
            $file->move('storage/slider', $file_name);

    	}

        return $file_name;
    }


    // API SECTION 

    public function retrieve_slider(){

        $getAll = Slider::where('active', 1)
                        ->orderBy('sort_value', 'asc')
                        ->get();

        $data = [ 
            'status' => true,
            'apiName' => "retrieveSlider"
        ];

        $data['data'] = $getAll;

        return response()->json($data);
    }
}
