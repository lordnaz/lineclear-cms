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
            $uploadFile = $this->UploadFile($formFile);
            $image_path = "/storage/banner/".$uploadFile;
            $flag = true;
        }

        if($uploadFile != null){
            $add_banner = Banner::create([
                'sort_value' => $req->sort,
                'image_path' => $image_path,
                'external_link' => $req->link,
                'type' => 'desktop',
                'updated_by' => $uuid,
                'created_at' => $currentdt,
                'updated_at' => $currentdt
            ]);
        }


        $formFile = $req->file('mobileBanner');
        $image_path = null;

        if($formFile){
            $uploadFile = $this->UploadFile($formFile);
            $image_path = "/storage/banner/".$uploadFile;
            $flag = true;
        }

        if($uploadFile != null){
            $add_banner = Banner::create([
                'sort_value' => $req->sort,
                'image_path' => $image_path,
                'external_link' => $req->link,
                'type' => 'mobile',
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
}
