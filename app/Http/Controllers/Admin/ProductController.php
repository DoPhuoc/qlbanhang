<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brands;
use App\Model\Categories;
use App\Model\Products;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductPost as Product;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateStoreProductPost;
class ProductController extends Controller
{
    public function index()
    {
        $products=Products::latest()->paginate(10);
        return view('admin.product.listproduct')->with('products',$products);
    }
    public function Addproduct()
    {
        $category = Categories::where('status',1)->get();
        //dd($category);
        $brands = Brands::where('status',1)->get();
        //dd($brands);
        return view('admin.product.add-product',compact('category','brands'));
    }
    public function handleAddproduct(Product $request)
    {
        $product_id = $request->product_id;
        $nameProduct = $request->nameProduct;
        $slug = Str::slug($nameProduct, '-');
        $price = $request->priceProduct;

        $quality = $request->qtyProduct;
        $quality = is_numeric($quality) && $quality > 0 ? $quality: 1;
        $saleOff = $request->saleOffProduct;
        $saleOff = is_numeric($saleOff) ? $saleOff : 0;
        $category = $request->categoryProduct;
        $brand = $request->brandProduct;
        $description= $request->desProduct;
        $hotProduct = $request->hotProduct;
        $status = $request->status;
        $arrImages = [];
        //thuc hien upload file
        //kiem tra xem nguoi co chon file ko
        if($request->hasFile('images')){
            //Lay thong tin cua file
            $image = $request->file('images');
            
            foreach ($image as $key => $i) {
                //lay ra duoc ten file va duong dan luu tam thoi file
                if($i->isValid()){
                    $nameImage = $i->getClientOriginalName();
                    $i->move('uploads/images/products',$nameImage);
                    $arrImages[] = $nameImage;
                }
            }
        }
        //truyen du lieu mang 
        $imageProduct = array_pop($arrImages);
        //tien hanh luu thong vao db
        $dataInsert = [
            'product_id'=> $product_id,
            'categories_id' => $category,
            'brands_id' => $brand,
            'name_product' => $nameProduct,
            'slug_product' => $slug,
            'description'  =>$description,
            'image' => $imageProduct,
            'hot_product'=>$hotProduct,
            'quantity' => $quality,
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
            
            $request->session()->flash('error', 'Them that bai');
            return redirect()->route('admin.add.product');
        } 
    }
    public function Editproduct($id){
        $category = Categories::where('status',1)->get();
        //dd($category);
        $brands = Brands::where('status',1)->get();
        $products = Products::find($id);
        //dd($products);
        return view('admin.product.edit-product',compact('products','category','brands'));
    }
    public function testProduct(Request $request){
        die();
    }
    public function handleEditproduct(Request $request){
        $id = $request->id;
        $id = is_numeric($id) && $id > 0 ? $id : 0;
        $infoProduct = DB::table('products')
            ->where('id', $id)
            ->first();
        if($infoProduct){
        $product_id = $request->product_id;
        $nameProduct = $request->nameProduct;
        $slug = Str::slug($nameProduct, '-');
        $price = $request->priceProduct;
        $quality = $request->qtyProduct;
        $quality = is_numeric($quality) && $quality > 0 ? $quality: 1;
        $saleOff = $request->saleOffProduct;
        $saleOff = is_numeric($saleOff) ? $saleOff : 0;
        $category = $request->categoryProduct;
        $brand = $request->brandProduct;
        $description= $request->desProduct;
        $hotProduct = $request->hotProduct;
        $imageProduct= $infoProduct->image;
        $status = $request->status;
        $uploadPhoto = [];
        $arrImages = [];
       
        $uploadPhoto = null;
        $newPhoto = null;
        if($request->hasFile('images')) {
            $image =$request->file('images');
            foreach($image as $key=>$i)
            if($i->isValid()) {
                $newPhoto = $i->getClientOriginalName();
                $uploadPhoto = $i->move('uploads/images/products', $newPhoto);
            }
        }
        //dd($uploadPhoto,$newPhoto);

        if($uploadPhoto && $newPhoto){
            $update = DB::table('products')
                ->where('id', $id)
                ->update([
                    'product_id'=> $product_id,
                    'categories_id' => $category,
                    'brands_id' => $brand,
                    'name_product' => $nameProduct,
                    'slug_product' => $slug,
                    'description'  =>$description,
                    'image' => $newPhoto,
                    'hot_product'=>$hotProduct,
                    'quantity' => $quality,
                    'price' => $price,
                    'status' => $status,
                    'sale_off' => $saleOff,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => null
            ]);
        }else{
            $update = DB::table('products')
            ->where('id', $id)
            ->update([
                'product_id'=> $product_id,
                'categories_id' => $category,
                'brands_id' => $brand,
                'name_product' => $nameProduct,
                'slug_product' => $slug,
                'description'  =>$description,
                'image' => $imageProduct,
                'hot_product'=>$hotProduct,
                'quantity' => $quality,
                'price' => $price,
                'status' => $status,
                'sale_off' => $saleOff,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
        if($update){
            $request->session()->flash('success', 'Sửa thành công');
            return redirect()->route('admin.list.product');
        } else {
            
            $request->session()->flash('error', 'Sửa thất bại');
            return redirect()->route('admin.add.product');
        }  
        }else{
            return view('admin.partials.not-found-page');
        }
        
    }
 
}
