<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products=Product::whereRaw('true');
        if ($request['name'])
            $products->where('name','like',"%{$request['name']}%");
        if ($request['category_id'])
            $products->where('category_id',$request['category_id']);
        if ($request['state']!=null)
            $products->where('active',$request['state']);
        if ($request['manufactor_id'])
            $products->where('manufactor_id',$request['manufactor_id']);
        if ($request['price'])
        {
            $price=explode(';',$request['price']);
            if (count($price)==2)
                $products->whereBetween('price',$price);
        }
        // $products=$products->get();
        $products=$products->paginate(5)
            ->appends(['name'=>$request['name'],'category_id'=>$request['category_id'],'state'=>$request['state'],'manufactor_id'=>$request['manufactor_id']
                ,'price'=>$request['price']]);
        return $products;
     }

    public function show($id)
    {
        return Product::find($id);
    }

}
