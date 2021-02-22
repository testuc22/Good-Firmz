<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
	CategoryRepository
};
class CategoryController extends Controller{
    //
    public function __construct(CategoryRepository $category_repository){
    	$this->category_repository = $category_repository;
    }
    public function all_categories(){
    	$categories = $this->category_repository->getCategoriesWithConditions(array());
    	return view('front.categories.all_categories')->with(['categories'=>$categories]);
    }

    
}
