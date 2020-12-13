<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Manufactory;
use App\Product;
use App\ProductHighlight;
use App\ProductImage;
use App\ProductsSpecifications;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       // $this->authorizeResource(Product::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
       // $this->authorize('index');
       /* if (!Gate::allows('index-product'))
        {
            return response(null,403);
        }*/

       /* if (!auth()->user()->can('index-product',Product::class))
            return response(null,403);*/

        $products= Product::whereRaw('true')->when($request['name'], function($query) use($request){
            $query->where('name','like',"%{$request['name']}%");

        });
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
        $categories=Category::all();
        $manufactories=Manufactory::all();
        return view('admin.products.index')
            ->with(compact('products','categories','manufactories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $manufactories=Manufactory::all();

        return view('admin.products.create')
            ->with(compact('categories','manufactories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product=new Product();
        $product->name=$request['name'];
        $product->ar_name=$request['ar_name'];
        $product->description=$request['description'];
        $product->ar_description=$request['ar_description'];
        if ($request->hasFile('logo'))
        $product->logo=basename($request->file('logo')->store('public/products'));
        $product->category_id=$request['category_id'];
        $product->price=$request['price'];
        $product->manufactor_id=$request['manufactor_id'];
        $product->active=$request['active'];
        $product->quantity=$request['quantity'];
        $product->save();
        if ($request->has('highlights'))
            foreach ($request['highlights'] as $highlight)
            {
                $productHighlight=new ProductHighlight();
                $productHighlight->context=$highlight;
                $productHighlight->product_id=$product->id;
                $productHighlight->save();
            }
        if ($request->has('specifications'))
            foreach ($request['specifications'] as $specification)
            {
                $ProductSpecifications=new ProductsSpecifications();
                $ProductSpecifications->title=$specification['title'];
                $ProductSpecifications->content=$specification['content'];
                $ProductSpecifications->product_id=$product->id;
                $ProductSpecifications->save();
            }

        if ($request->has('images_titles') || $request->hasFile('images'))
            for ($i=0;$i<count($request['images_titles']);$i++)
            {
                $productImage=new ProductImage();
                if ($request['images_titles'][$i])
                    $productImage->title=$request['images_titles'][$i];
                if ($request->hasFile('images')[$i])
                    $productImage->image=basename($request->file('images')[$i]->store("public/products/$product->id"));
                $productImage->product_id=$product->id;
                $productImage->save();
            }

        \Session::flash('msg','s:'.__('products.insert_successfuly'));
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       // $product=Product::find($id);
       // dd($product);
        return view('admin.products.show')
        ->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       // $product=Product::find($id);
        $categories=Category::all();
        $manufactories=Manufactory::all();
        return view('admin.products.edit2')
            ->with(compact('product','categories','manufactories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {

       // $product=Product::find($id);
        $product->name=$request['name'];
        $product->ar_name=$request['ar_name'];
        $product->description=$request['description'];
        $product->ar_description=$request['ar_description'];
        if ($request->hasFile('logo'))
        {
            Storage::delete("public/products/$product->logo");
            $product->logo=basename($request->file('logo')->store('public/products'));
        }
        $product->category_id=$request['category_id'];
        $product->price=$request['price'];
        $product->manufactor_id=$request['manufactor_id'];
        $product->active=$request['active'];
        $product->quantity=$request['quantity'];
        $product->save();
        ProductHighlight::where('product_id',$product->id)->delete();
        if ($request->has('highlights'))
        {
            foreach ($request['highlights'] as $highlight)
            {
                $productHighlight=new ProductHighlight();
                $productHighlight->context=$highlight;
                $productHighlight->product_id=$product->id;
                $productHighlight->save();
            }
        }
        ProductsSpecifications::where('product_id',$product->id)->delete();
        if ($request->has('specifications'))
            foreach ($request['specifications'] as $specification)
            {
                $ProductSpecifications=new ProductsSpecifications();
                $ProductSpecifications->title=$specification['title'];
                $ProductSpecifications->content=$specification['content'];
                $ProductSpecifications->product_id=$product->id;
                $ProductSpecifications->save();
            }

        if ($request->has('images'))
        {
            $notDeletedImages=array();
            foreach ($request['images'] as $image)
            {
                $imageId=$image['id'];
                array_push($notDeletedImages,$imageId);
                $productImage=ProductImage::find($imageId);
                if (!$productImage)
                $productImage=new ProductImage();
                    $productImage->title=$image['title'];
                if (isset($image['image']))
                {

                    if ($productImage->image)
                        Storage::delete("public/products/{$productImage->product_id}/{$productImage->image}");
                    $productImage->image=basename(Storage::putFile("public/products/$product->id",$image['image']));
                }
                $productImage->product_id=$product->id;
                $productImage->save();
            }
            foreach (ProductImage::where('product_id',$product->id)
                         ->whereNotIn('id',$notDeletedImages)->cursor() as $image)
            {
                Storage::delete("public/products/{$image->product_id}/{$image->image}");
            }
            ProductImage::where('product_id',$product->id)
                ->whereNotIn('id',$notDeletedImages)->delete();

        }

        else
        {
            ProductImage::where('product_id',$product->id)->delete();
            Storage::deleteDirectory("public/products/{$product->id}");
        }

        \Session::flash('msg','s:'.__('operations.updating_successfuly',['item'=>__('products.product')]));
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       // $product=Product::find($id);
        ProductHighlight::where('product_id',$product->id)->delete();
        ProductsSpecifications::where('product_id',$product->id)->delete();
        ProductImage::where('product_id',$product->id)->delete();
        $product->delete();
        Storage::delete("public/products/$product->logo");
        Storage::deleteDirectory("public/products/{$product->id}");

        \Session::flash('msg','s:'.__('products.delete_successfuly'));
        return redirect()->route('products.index');
    }
}
