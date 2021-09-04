<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banner;

class BannerController extends Controller
{
    //

    public function index(){

        $banner_lists = Banner::where('active', true)
                    ->orderBy('sort_value', 'asc')
                    ->get();

        return view('components.banner', compact('banner_lists'));
    }

    public function remove_banner($id){
        // return $id;

        $uuid = auth()->user()->id;
        $currentdt = date('Y-m-d H:i:s');
        
        // update job status
        Banner::where('id', $id)
                ->update([
                    'updated_by' => $uuid, 
                    'active' => false,
                    'updated_at' => $currentdt
                ]);

        return redirect()->route('banner');
    }

    public function upload_banner(Request $req){

        // $data = $req->input();

        $uuid = auth()->user()->id;
        $currentdt = date('d-m-Y H:i:s');

        // if formFileada then replace 
        $formFile = $req->file('desktopBanner');
        $image_path = null;

        if($formFile){
            $uploadFileDestop = $this->UploadFile($formFile);
            $image_path_desktop = "/storage/banner/".$uploadFileDestop;
            $flag = true;
        }

        $formFile = $req->file('mobileBanner');
        $image_path = null;

        if($formFile){
            $uploadFileMobile = $this->UploadFile($formFile);
            $image_path_mobile = "/storage/banner/".$uploadFileMobile;
            $flag = true;
        }

        if($uploadFileDestop != null && $uploadFileMobile != null){
            $add_banner = Banner::create([
                'sort_value' => $req->sort,
                'image_path_desktop' => $image_path_desktop,
                'image_path_mobile' => $image_path_mobile,
                'external_link' => $req->link,
                'updated_by' => $uuid,
                'created_at' => $currentdt,
                'updated_at' => $currentdt
            ]);
        }
        
        // return $image_path;
        return redirect()->route('banner');

    }

    function UploadFile($file){

        $file_name = null;

    	if($file){
    		// $file_name = $file->getClientoriginalName();
    		// $mime_type = $file->getClientmimeType();
            $extension = $file->extension();

            $file_name = uniqid('').".".$extension;

    		// upload into doc path
            $file->move('storage/banner', $file_name);

    	}

        return $file_name;
    }


    // API SECTION 

    public function retrieve_banner(){

        $getAll = Banner::where('active', 1)
                        ->orderBy('sort_value', 'asc')
                        ->get();

        $data = [ 
            'status' => true,
            'apiName' => "retrieveBanner"
        ];

        $data['data'] = $getAll;

        return response()->json($data);
    }
}
