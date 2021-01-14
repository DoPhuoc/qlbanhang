<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductPost as Product;
class ProductController extends Controller
{
    public function index()
    {
        $products=Products::latest()->paginate(10);
        return view('admin.product.listproduct')->with('products',$products);
    }
    public function Addproduct()
    {
        $categories = Categories::where('status',1)->get();
        //dd($category);
        $brands = Brands::where('status',1)->get();
        //dd($brands);
        return view('admin.product.add-product',compact('categories','brands'));
    }
    public function handleAddproduct(Product $request)
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
        $hotProduct = $request->hotProduct;
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
            'categories_id' => $category,
            'brands_id' => $brand,
            'name_product' => $nameProduct,
            'slug_product' => $slug,
            'description'  =>$description,
            'image' => $imageProduct,
            'hot_product'=>$hotProduct,
            'quantity' => $quantity,
            'price' => $price,
            'status' => $status,
            'sale_off' => $saleOff,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];

        $insertShoes = Products::create($dataInsert);

        if($insertShoes){
            $request->session()->flash('success', 'Them thanh cong');

            return redirect()->route('admin.list.product');
        } else {
            // loi - van o lai form add brand
            $request->session()->flash('error', 'Them that bai');
            return redirect()->route('admin.add.product');
        }
    }
    public function Editproduct(){
        return view('admin.product.edit-product');
    }

}
