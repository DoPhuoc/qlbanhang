<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::latest()->paginate(10);
        return view('admin.products.list')->with('products',$products);
    }
    public function create()
    {
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();

        return view('admin.products.add',compact('categories','brands'));
    }
    public function store(StoreProductRequest $request)
    {
        $product_id = $request->product_id;
        $category= $request->categoty_id;
        $brand_id = $request->brandProduct;
        $nameProduct = $request->nameProduct;
        $slug = Str::slug($nameProduct, '-');
        $price = $request->priceProduct;
        //$price = trim(str_replace(',','', $price));
        $quantity = $request->qtyProduct;
        $quantity = is_numeric($quantity) && $quantity > 0 ? $quantity: 1;
        $saleOff = $request->saleOffProduct;
        $saleOff = is_numeric($saleOff) ? $saleOff : 0;
        $category = $request->categoryProduct;
        $brand = $request->brandProduct;
        $description= $request->desProduct;
        $hotProduct = $request->bestSell;
        $status = $request->status;
        $arrImages = [];
        if($request->hasFile('images')){
            $image = $request->file('images');
            foreach ($image as $key => $i) {
                if($i->isValid()){
                    $nameImage = $i->getClientOriginalName();
                    $i->move('uploads/images/products',$nameImage);
                    $arrImages[] = $nameImage;
                }
            }
        }

        $imageProduct = array_pop($arrImages);
        $dataInsert = [
            'product_id'=> $product_id,
            'category_id' => $category,
            'brand_id' => $brand,
            'name' => $nameProduct,
            'slug' => $slug,
            'description'  =>$description,
            'image' => $imageProduct,
            'best_selling'=>$hotProduct,
            'quantity' => $quantity,
            'price' => $price,
            'status' => $status,
            'sale_off' => $saleOff,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];

        $insertShoes = Product::create($dataInsert);
        if($insertShoes){
            Alert::success('Thêm thành công');
            return redirect()->route('admin.list.product');
        } else {
            Alert::error('Thêm thất bại');
            return redirect()->route('admin.add.product');
        }
    }
    public function Editproduct(){
        return view('admin.products.edit-product');
    }


}
