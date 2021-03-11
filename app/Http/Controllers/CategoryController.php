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

    /**
     * Category Listing
     */
    public function categoryDetail($slug)
    {
    	$category = $this->category_repository->getCategoryBySlug($slug)->first();
    	return view('new-frontend.category')->with(['category'=>$category]);
    }

    /**
     * Get All Category Listing
     */
    public function allCategoryListing()
    {
        $categories = $this->category_repository->getAllCategories();
        return view('new-frontend.all-category')->with(['categories'=>$categories]);
    }
}
