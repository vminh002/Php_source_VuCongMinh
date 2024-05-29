<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;

class ProductController extends Controller
{
    //
    public function login(){
        $name = "Nguyen Minh Anh";
        return view('login')->with('name', $name);
    }
    function getProducts(){
        $products = ProductModel::all();
        return view('admin.product.getProducts', ['products' => $products]);
    }
    function getProductsbyBand(Request $request){
        $band = $request->input('selectBand');
        $products = ProductModel::where('band',$band)->get();
        return view('admin.product.getProductsByBand', ['products'=> $products]);
    }
    function editProduct($pid){
        $product = ProductModel::where('pid',$pid)->first();
        return view('admin.product.updateProduct', ['product' => $product]);
    }
    function updateProduct(Request $request, $pid){
        $product = ProductModel::where('pid', $pid)->first();
        $product->pid = $request->pid;
        $product->pname = $request->pname;
        $product->company = $request->company;
        $product->band = $request->selectBand;
        $product->year = $request->selectYear;
        if (isset($_FILES['ImageFile']) && $_FILES['ImageFile']['error'] === UPLOAD_ERR_OK) {
            $pimage = 'data:image/png;base64,'
                .base64_decode(file_get_contents($_FILES['ImageFile']['tmp_name']));
            $product -> pimage = $pimage;
        }
        $product -> save();
        return redirect('updateProduct/' . $pid)
        -> with("Note", "Sửa thành công");
    }
    function deleteProduct($pid){
        $product = ProductModel::where('pid', $pid)->first();
        $product->delete();
        return redirect('admin/product/getProducts')
        ->with("Note", "Xóa thành công");
    }
}