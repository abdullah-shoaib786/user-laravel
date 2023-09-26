<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductController extends Controller
{
    function saveProduct(Request $req){

        if($req->file('product_image') != null){
            $imageName = time().'.'.$req->product_image->extension();
            $req->product_image->move('images', $imageName);
        }else{
            $imageName = 'default.jpg';
        }

        DB::table('products')->insert([
            'name' => $req->product_name ,
            'price' => $req->product_price,
            'category' => $req->product_category,
            'description' => $req->product_description,
            'gallery' => 'images/'.$imageName,
            'user_id' => $req->user_id

        ]);

        return redirect('/product');
    }

    function showProduct(){
        $product = Product::where('user_id','=' ,auth()->user()->id)->get();
        return view('/product',compact('product'));

    }
    function getProductValue($id){
        $loginUserId = auth()->user()->id;
        $values= Product::find($id);
        if($loginUserId == $values['user_id']){
            return view('editProduct',['data'=>$values]);
        }else{
            return redirect('product');
        }

    }
    function updateProductData(Request $req){
        if($req->file('product_image') != null){
            $imageName = 'images/'.time().'.'.$req->product_image->extension();
            $req->product_image->move('images', $imageName);

            unlink($req->image);
        }else{
            $imageName = $req->image;
        }
        Product::where('id', $req->product_id)->update([
            'name' => $req->product_name ,
            'price' => $req->product_price,
            'category' => $req->product_category,
            'description' => $req->product_description,
            'gallery' => $imageName,
            'user_id' => auth()->user()->id

        ]);

        return redirect('/product');

    }
    function deleteProduct($id){
        $product= Product::find($id);
            unlink($product['gallery']);
        $product->delete();
        return redirect('/product');

    }


    function getAllProducts(){
        $allProducts = Product::all();
        return view('home',compact('allProducts'));

    }

    function productDetail($id){
        $product= Product::find($id);
        return view('productDetail',compact('product'));

    }

    function searchProduct(Request $req){
        $searchProduct = Product::where('name','like','%'.$req->product.'%')->get();
        return view('searchProduct',compact('searchProduct'));



    }

    function addToCart(Request $req){

       if(auth()->user()){
          Cart::insert([
               'product_id' => $req->product_id ,
               'user_id' => auth()->id()
           ]);
           return redirect('/home');

       }else{
           return redirect('/login');
       }

    }

     function cartItemCount(){
        $loginUserId = auth()->id();
        return Cart::where('user_id',$loginUserId)->count();
    }

    function getCartList(){
        $loginUserId = auth()->id();
        $getCartProducts = Cart::join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$loginUserId)
            ->select('products.*','cart.id as cart_id')
            ->get();
        return view('cartList',compact('getCartProducts'));
    }
    function removeToCart($id){
        Cart::destroy($id);
        return redirect('cartList');
    }

    function orderNow(){
        $loginUserId = auth()->id();
          $getCartProductsSum = Cart::join('products','cart.product_id','=','products.id')
            ->where('cart.user_id',$loginUserId)
            ->sum('products.price');
        return view('orderNow', compact('getCartProductsSum'));
//        $getCartProductsSum = Cart::with('product')->where('user_id',$loginUserId)->get();
//        return view('orderNow', compact('getCartProductsSum'));

    }

    function orderPlace(Request $req){
        $loginUserId = auth()->id();
        $allCarts = Cart::where('user_id',$loginUserId)->get();

        foreach ($allCarts as $cart ){
            Order::insert([
                'product_id' => $cart->product_id ,
                'user_id' => $cart->user_id,
                'status' => 'pending',
                'payment_method' => $req->payment,
                'address' => $req->address,
            ]);
            Cart::where('user_id',$loginUserId)->delete();

        }
        return redirect('home');
    }

    function getOrderList(){
        $loginUserId = auth()->id();
        $getOderList = Order::with('product')->where('user_id',$loginUserId)->get();
        return view('orderList', compact('getOderList'));
//        $getOderList = Product::with('order')->get();
//        return $getOderList;die();
//        foreach ($getOderList as $item){
//
//           foreach($item->order as $item){
//               return $item->status;die();
//           }
//        }
//        if($getOderList->order != null){
//            return '1';die();
//        }
//        return view('orderList', compact('getOderList'));

    }
}
