<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	ProductCategory,
	Product
};
use App\Repositories\{
    CategoryRepository
};

class ProductRepository
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }

    public function createProduct($request)
    {
        $this->validateData($request);
        $productData=$this->getProductData($request);
        $product=Product::create($productData);
        if ($request->product_tags!=null) {
            $this->assignTagsToProduct($request,$product);
        }
        return $this->getMessage($request,'Product Created Successfully');
    }

    public function validateData($request)
    {
        $request->validate([
            'productName'=>'required',
            'category'=>'required'
        ]);
    }

    public function getProductData($request)
    {
        return [
            'productName'=>$request->productName,
            'product_category_id'=>$request->category,
            'status'=>$request->has('status') ? 1 : 0
        ];
    }

    public function getMessage($request,$message)
    {
        $request->session()->flash('success',$message);
        return redirect()->route('list-products');
    }

    public function assignTagsToProduct($request,$product)
    {
        $productTags=explode(',',$request->product_tags);
        $data=[];
        foreach ($productTags as $productTag) {
            $data[]=['product_id'=>$product->id,'tag_id'=>$productTag];
        }
        $product->productTags()->sync($productTags);
    }
}
