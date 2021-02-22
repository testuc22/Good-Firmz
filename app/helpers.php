<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommonHelper{

	public function setFlashMessage($request,$message,$type){
		$request->session()->flash($type,$message);
	}

	public function process_image($request,$image_path,$file_name){
		$imageName = "";
        if($request->file($file_name)){
            $name = $request->file($file_name)->getClientOriginalName();
            $imageName = time().'-'.$name;
            /*$path = Storage::putFileAs(
                $image_path, $request->file($file_name), $imageName ,'public'
            );*/

            $request->file($file_name)->move($image_path, $imageName);

            if(isset($request->old_image) && $request->old_image!="" ){
                $image_path = realpath($image_path);
                unlink($image_path.'/'.$request->old_image);
            }
        }
        return $imageName;
	}

    public function create_unique_slug($title, $id = 0,$tableName){
        $slug = Str::of($title)->slug('-');
        $allSlugs = $this->getRelatedSlugs($slug, $id,$tableName);
        
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0,$tableName){
        return DB::table($tableName)
              ->select('id','name','slug')
              ->where('slug', 'like', $slug.'%')
              ->where('id', '<>', $id)
              ->get();
    }
}

?>