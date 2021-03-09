<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
	SearchRepository,CategoryRepository
};
class SearchController extends Controller {

    public function __construct(SearchRepository $search_repo,CategoryRepository $categoryRepository){
    	$this->search_repo = $search_repo;
    	$this->categoryRepository = $categoryRepository;
    }
    public function index(Request $request){
        $categories = $this->search_repo->searchProduct($request);
    	/*$sellers = $this->search_repo->search_listings($request);
    	$parentCategories = $this->categoryRepository->getParentCategories(1);
        return view('front.seller.all_listings')->with(['sellers'=>$sellers,'parentCategories'=>$parentCategories]);*/
        return view('new-frontend.product-listing')->with(['categories'=>$categories]);
    }
}
