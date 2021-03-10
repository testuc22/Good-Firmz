<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller{

	public function __construct(CategoryRepository $categoryRepository){
	    $this->middleware('auth:admin');
	    $this->categoryRepository=$categoryRepository;
	}

    public function listCategories(Request $request){
        $categories=$this->categoryRepository->filterAllCategories($request);
        return view('admin/categories/list')->with(['categories'=>$categories]);
    }

    public function listChildCategories($id){
        $categories=$this->categoryRepository->getChildCategories($id);
        return view('admin/categories/list')->with(['categories'=>$categories]);
    }

    public function getAddCategoryPage(){
        $allCategories=$this->categoryRepository->getAllCategories();
        $dropdown = $this->categoryRepository->getCategoriesDropdown(array(),0);
        return view('admin/categories/create')->with(['allCategories'=>$allCategories,'dropdown'=>$dropdown]);
    }

    public function addCategory(Request $request){
        $result=$this->categoryRepository->addCategory($request);
        return $result;
    }

    public function getEditCategoryPage($id){
        $category=$this->categoryRepository->getCategoryById($id);
        $dropdown = $this->categoryRepository->getCategoriesDropdown(array($category->parent),0);
        // return $category;
        return view('admin/categories/edit')->with(['category'=>$category,'dropdown'=>$dropdown]);
    }

    public function updateCategory(Request $request,$id){
        $result=$this->categoryRepository->updateCategory($request,$id);
        return $result;
    }

    public function UpdateCategoryStatus(Request $request){
        $result=$this->categoryRepository->UpdateCategoryStatus($request);
        return $result;
    }

    public function deleteCategory(Request $request,$id){
        $result=$this->categoryRepository->deleteCategory($request,$id);
        return $result;
    }

    public function importCategories()
    {
        
    }

    public function exportCategories()
    {
        $result=$this->categoryRepository->exportCategories();
        return $result;
    }

    /**
     * Ajax Call For Category Subcategory
     */
    public function categoryAjaxCall($id)
    {
        $categories = $this->categoryRepository->getCategoryByParentId($id);
        return json_encode($categories);
    }
}
