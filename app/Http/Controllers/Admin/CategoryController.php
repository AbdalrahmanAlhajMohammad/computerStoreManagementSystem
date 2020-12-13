<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Category::class,'category');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $categories=Category::all();
            return view('admin.categories.index')
                ->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentCategories=Category::where('parent_id',0)->get();
        return view('admin.categories.create')
            ->with(compact('parentCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //Category::create($request->all());
        $category=new Category();
        $category->name=$request['name'];
        $category->ar_name=$request['ar_name'];
        $category->order=$request['order'];
        if ($request->hasFile('logo'))
        $category->logo=basename($request->file('logo')->store('public/categories'));
        $category->parent_id=$request['parent_category_id'];
        $category->save();
        \Session::flash('msg','s:'.__('categories.insert_successfuly'));
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       // $category=Category::find($id);
        $parentCategories=Category::where('parent_id',0)->get();
        return view('admin.categories.edit')
            ->with(compact('category','parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
       // $category=Category::find($id);
        $category->name=$request['name'];
        $category->ar_name=$request['ar_name'];
        $category->order=$request['order'];
        if ($request->hasFile('logo'))
        {
            Storage::delete("public/categories/$category->logo");
            $category->logo=basename($request->file('logo')->store('public/categories'));
        }
        $category->parent_id=$request['parent_category_id'];
        $category->update();
        \Session::flash('msg','s:'.__('operations.updating_successfuly',['item'=>__('categories.category')]));
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       // $category=Category::find($id);
        $category->delete();
        Storage::delete("public/categories/$category->logo");
        \Session::flash('msg','s:'.__('categories.delete_successfuly'));
        return redirect()->route('categories.index');
    }
}
