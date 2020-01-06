<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Order;
use App\Orderitem;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function postCheckout(Request $request){
        $this->validate($request,[
            'phone'=>'required',
            'address'=>'required'
        ]);
        $order=new Order();
        $order->user_id=Auth::id();
        $order->phone=$request['phone'];
        $order->address=$request['address'];
        $order->save();
        $items=Session::get('cart')->posts;
        foreach ($items as $i){
            $order_item=new Orderitem();
            $order_item->order_id=$order->id;
            $order_item->item_name=$i['post']['item_name'];
            $order_item->price=$i['post']['price'];
            $order_item->qty=$i['qty'];
            $order_item->amount=$i['amount'];
            $order_item->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('info','The order have been checkout');

    }
    public function getDecreaseCart($id){
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->decrease($id);

        if(count($cart->posts) < 1){
            Session::forget('cart');
        }else{
            Session::put('cart', $cart);
        }

        return redirect()->back();
    }
    public function getIncrease($id){
        $post=Post::whereId($id)->firstOrFail();
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->increase($post);
        Session::put('cart', $cart);
        return redirect()->back();
    }
public function ShoppingCart(){
   return view('shopping_cart');
}
    public function addToCard($id){
        $post=Post::whereId($id)->firstOrFail();
        $oldPost=Session::has('cart')? Session::get('cart'):null;
        $cart=new Cart($oldPost);
        $cart->add($post);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getSearchPosts(Request $request){
        $q=$_GET['q'];
        $cats=Category::get();
        $posts=Post::where('item_name',"LIKE","%$q%")
            ->orWhere('price',"LIKE","%$q%")
            ->OrderBy('id','desc')->paginate("6");
        return view('welcome')->with(['cats'=>$cats,'posts'=>$posts]);
    }
    public function getPostsByCategory($cat_id){
        $cats=Category::get();
        $posts=Post::where('category_id',$cat_id)->OrderBy('id','desc')->paginate("6");
        return view('welcome')->with(['cats'=>$cats,'posts'=>$posts]);
    }
    public function index(){
        $cats=Category::get();
        $posts=Post::OrderBy('id', 'desc')->paginate("6");
        return view("welcome")->with(['cats'=>$cats, 'posts'=>$posts]);
    }
    public function getImage($file_name){
        $file=Storage::disk('posts')->get($file_name);
        return response($file)->header('Content-type','*.*');
    }
}
