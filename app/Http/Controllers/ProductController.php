<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

class ProductController extends Controller {

    //
    public function createProduct() {
        $categories = Category::where('publicationStatus', 0)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 0)->get();
        return view('admin.product.addProductContent', ['categories' => $categories], ['manufacturers' => $manufacturers]);
    }

    public function saveProduct(Request $request) {

        $this->validate($request, [
            'productName' => 'required',
            'productPrice' => 'required',
            'productQuantity' => 'required',
            'productImage' => 'required',
            'productDescription' => 'required',
        ]);

        $productImage = $request->file('productImage');
        $imageName = $productImage->getClientOriginalName();
        $imageDirectory = 'public/productImage/';
        $productImage->move($imageDirectory, $imageName);
        $imageUrl = $imageDirectory . $imageName;
        $this->productInfo($request, $imageUrl);
        return redirect('/product/add')->with('message', 'Product info saved successfully.');



        //query builder
//        DB::table('products')->insert([
//            'productName' => $request->productName,
//            'productDescription' => $request->productDescription,
//            'publicationStatus' => $request->publicationStatus,
//        ]);
//        return redirect()->back()->with('message', 'Product created successfully');
    }

    protected function productInfo($request, $imageUrl) {
        $product = new Product();
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->productDescription = $request->productDescription;
        $product->productImage = $imageUrl;
        $product->publicationStatus = $request->publicationStatus;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->save();
    }

    public function manageProduct() {
        $products = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->get();
        return view('admin.product.manageProductContent', ['products' => $products]);
    }

    public function viewProduct($id) {
        $product = DB::table('products')
                ->where('products.id', $id)
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->first();
        return view('admin.product.viewProductContent', ['product' => $product]);
    }

//    
    public function editProduct($id) {
        $categories = Category::where('publicationStatus', 0)->get();
        $manufacturers = Manufacturer::where('publicationStatus', 0)->get();
        $productInfoById = Product::where('id', $id)->first();

        return view('admin.product.editProductContent', ['productInfo' => $productInfoById], ['categories' => $categories])->with(['manufacturers' => $manufacturers]);
    }

    public function updateProduct(Request $request) {
        $updatedImage = $this->checkImageExistense($request);
        
        $product = Product::find($request->productId);
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $product->publicationStatus = $request->publicationStatus;
        $product->productPrice = $request->productPrice;
        $product->productQuantity = $request->productQuantity;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->productImage = $updatedImage;
        $product->save();
        return redirect('/product/manage')->with('updateSuccess', 'Product info updated successfully');
    }

    private function checkImageExistense($request) {
        $productById = Product::where('id', $request->productId)->first();
        $productImage = $request->productImage;
        if ($productImage) {
            unlink($productById->productImage);
            $imageName = $productImage->getClientOriginalName();
            $imageDirectory = 'public/productImage/';
            $productImage->move($imageDirectory, $imageName);
            $imageUrl = $imageDirectory . $imageName;
        } else{ 
           $imageUrl = $productById->productImage;
        }        
        return $imageUrl;
    }

   
    public function deleteProduct($id)  {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('deleteSuccess', 'Product info deleted successfully');
    }
}
