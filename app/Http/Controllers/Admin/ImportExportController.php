<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Models\{
	Category
};
use App\CommonHelper;
class ImportExportController extends Controller{

	public function __construct(CategoryRepository $categoryRepository,CommonHelper $common_helper){
	    $this->middleware('auth:admin');
	    $this->categoryRepository=$categoryRepository;
	    $this->common_helper = $common_helper;
	}

	public function importCategories(Request $request)
    {
        $csvFileName=$this->common_helper->process_image($request,'public/csv_files','csvFile');
        $csvFile=public_path('/csv_files/'.$csvFileName);
        $file = fopen($csvFile,"r");
        $i=0;
        $data=[];
		while(($line = fgetcsv($file)) !== FALSE)
		  {
		  	if ($i > 0) {
		  		$data[]=$line;		  		
		  	}
		  	$i++;
		  }
		fclose($file);
		foreach ($data as $key => $categoryRow) {
		    $url=$categoryRow[3];
		    $name =basename($url);
		    $imageName = time().'-'.$name;
		    file_put_contents(public_path('/category_images/'.$imageName), $url);
		    $search=array_search($categoryRow[3], $categoryRow);
		    // dd($data[$key][$search]);
		    $data[$key][$search]=$imageName; 

		}
		// return $data;
		Category::create($data);
    }

    public function exportCategories()
    {
    	$categories=$this->categoryRepository->getAllCategories();
        $fileName = 'categories.csv';
		$headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );
        $columns=array('Name','Slug','Parent','Image','Status','MetaTitle','MetaTags','MetaDescription');
        $file=fopen($fileName,'w');
		fputcsv($file,$columns);
		foreach ($categories as $category) {
		    $row['name']=$category->name;
		    $row['slug']=$category->slug;
		    $row['parent']=$category->parent;
		    $row['image']= asset('public/category_images/'.$category->image);
		    $row['status']=$category->status;
		    $row['meta_title']=$category->meta_title;
		    $row['meta_tags']=$category->meta_tags;
		    $row['meta_desc']=$category->meta_desc;
		    fputcsv($file,$row);
		}
		fclose($file);
		
		return response()->download($fileName, 'categories.csv', $headers);
    }



}
