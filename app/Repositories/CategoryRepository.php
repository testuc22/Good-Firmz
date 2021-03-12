<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	Category,ProductCategories
};
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\CommonHelper;
class CategoryRepository{

    public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }
    /**
     * Get All Categories
     */
    public function getAllCategories(){
        return Category::where('parent', 0)
                ->with(['children'])
                ->get();
        return $categories;
    }

    public function filterAllCategories($request){
        $builder = new Category;
        if($request->has('category_name') && $request->has('category_name')!="") {
            $categories = $builder->where('name','like','%'.$request->category_name.'%')->get();
        }else{
            $categories = $builder->get();
        }
        return $categories;
    }

    public function getParentCategories($status=0){
        $category = Category::where('parent',0);
        if($status) {
            $category = $category->where('status',1);
        }
        return $category->orderBy('id','desc')->get();
    }

    public function getCategoryById($id){
        return Category::with('parentName')->find($id);
    }

    public function addCategory($request){
        $this->validateCategoryData($request);
        dd('ok');
        $categoryData=$this->getCategoryData($request);
        Category::create($categoryData);
        $this->common_helper->setFlashMessage($request,'Product Category Created Successfully',"success");
        return $this->get_return_url();
    }

    public function validateCategoryData($request){
        $request->validate([
        	'name'=>'required|unique:categories'
        ]);
    }

    public function getCategoryData($request){
        $arrayCat = array(
            'parent'=> $request->parent ? $request->parent : 0,
            'name'=>$request->name,
            'slug'=>$this->common_helper->create_unique_slug($request->name,0,'categories'),
            'status'=>$request->has('status') ? 1 : 0,
            'featured'=>$request->has('featured') ? 1 : 0,
            'meta_title'=>$request->meta_title,
            'meta_tags'=>$request->meta_tags,
            'meta_desc'=>$request->meta_desc,
        );
        
        $imageData = $this->common_helper->process_image($request,'public/category_images','image');
        if($imageData){
            $arrayCat['image'] = $imageData;
        }
        return $arrayCat;
    }

    public function updateCategory($request,$id){
        $this->validateCategoryData($request);
        $categoryData=$this->getCategoryData($request);
        $this->getCategoryById($id)->update($categoryData);
        $this->common_helper->setFlashMessage($request,'Product Category Updated Successfully',"success");
        return $this->get_return_url();
    }

    public function get_return_url(){
        return redirect()->route('list-categories');
    }

    public function UpdateCategoryStatus($request){
        $this->getCategoryById($request->category)->update(['status'=>$request->status]);
        return response(['message'=>'Category Status Updated Successfully',200]);
    }

    public function deleteCategory($request,$id){
        $category = $this->getCategoryById($id);
        $image = $category->image;
        $category->delete();
        Storage::delete('public/category_images/'.$image);
        $affected = DB::table('categories')
              ->where('parent',$id)
              ->update(['parent' => 0]);

        $this->common_helper->setFlashMessage($request,'Category Deleted Successfully',"success");
        return $this->get_return_url();
    }

    public function getChildCategories($category=0){
        return Category::where('parent',$category)->get();
    }

    public function getCategoriesDropdown($categoryIDs=array(),$status = 0){
        $allCategories = $this->getParentCategories($status);
        $html = '';
        foreach ($allCategories as $key => $cat) {
            $selected = "";
            if($categoryIDs && in_array($cat->id, $categoryIDs)){
                $selected = "selected";
            }
            $html .= '<option value="'.$cat->id.'" '.$selected.'>'.$cat->name.'</option>';
            $categoriesHTML = $this->getChildOptions($cat,"",$categoryIDs);
            $html .= $categoriesHTML;
        }
        // $html .= '</select>';
        return $html;
    }
    public function getChildOptions($cat,$current_cat,$categoryIDs=array()){
        
        $html = '';
        $categories = $this->getChildCategories($cat->id);
        if(!empty($categories)){
            foreach($categories as $category){
                $current_cat_1 = $current_cat." -- ";
                $selected = "";
                if($categoryIDs && in_array($category->id, $categoryIDs)){
                    $selected = "selected";
                }
                $html .= '<option value="'.$category->id.'"  '.$selected.'>'.$current_cat_1.''.$category->name.'</option>';

                /*$categories = $this->getChildOptions($category,$current_cat_1,$categoryIDs);
                $html .= $categories;*/
            }
        }
        return $html;
    }

    public function getCategoriesWithConditions($ids=array()){
        $category = Category::where('status',1);
        if(!empty($ids)){
            $category = $category->whereIn('id',$ids);
        }
        return $category->get();
    }

    /**
     * Get Category By Slug
     */
    public function getCategoryBySlug($slug)
    {
        $category = Category::with('products')
                        ->where('slug', $slug)
                        ->get();
        return $category;
    }

    public function featureCategories()
    {
        $categories = Category::where('parent', 0)
                        ->featured()
                        ->inRandomOrder()
                        ->take(2)
                        ->get();
        $categories = $categories->each(function($category){
            $category->load(['children' => function($query) {
                $query->limit(2)->get();
            }]);
        });
        return $categories;
    }    

    /**
     * Get Parent Wise Category
     */
    public function getCategoryByParentId($id)
    {
        $categories = Category::where('parent', $id)->get();
        return $categories;
    }
}
