<?php

namespace App\Http\Controllers\Customer;

use App\Category;
use App\Customer;
use App\Http\Requests\AccountRequest;
use App\Manufactory;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:customer');
    }

    public function home()
    {
        $categories=Category::all();
        return view('customer.home')
            ->with(compact('categories'));
    }

    public function categories()
    {

    }

    public function subcategories($id)
    {
        $subCategories=Category::where('parent_id',$id)->get();
        return view('customer.sub_categories')
            ->with(compact('subCategories'));
    }

    public function products(Request $request)
    {
        $categories=Category::where('parent_id','!=','0')->get();
        $manufactories=Manufactory::all();
       return view('customer.products')
           ->with(compact('categories','manufactories'));
    }

    public function searchForProduct(Request $request)
    {
        $categories=$request['categories'];
        $price=$request['price'];
        $manufactories=$request['manufactories'];
        $products=$products=Product::whereRaw('true');
        if ($categories)
           $products=$products->whereIn('category_id',[$categories]);
        if ($manufactories)
            $products=$products->whereIn('manufactor_id',[$manufactories]);
        $products=$products->get();
        return $products;
    }

    public function productInfo($id)
    {
        $product=Product::find($id);
        return view('customer.product-info')
            ->with(compact('product'));
    }

    public function register()
    {
        return view('customer.register');
    }

    public function postRegister(AccountRequest $request)
    {
        $customer=new Customer();
        $customer->first_name=$request['first_name'];
        $customer->last_name=$request['last_name'];
        $customer->email=$request['email'];
        $customer->password=$request['password'];
        $customer->mobile=$request['mobile'];
        $customer->gender=$request['gender'];
        $customer->save();
        \Session::flash('msg:registering complete successfuly');

    }

    public function login()
    {

    }

    public function postLogin()
    {

    }

}
