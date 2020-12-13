<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\SliderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentManagementController extends Controller
{
    public function slider()
    {
        $categories=Category::all();
        $products=Product::all();
        $slider_items=SliderItem::all();
        return view('admin.content_management.slider_content')
            ->with(compact('categories','products','slider_items'));
    }

    public function updateSlider(Request $request)
    {
        foreach ($request['slider_items'] as $slider_item)
        {
            $sliderItem=SliderItem::find($slider_item['id']);
            if (!$sliderItem)
                $sliderItem=new SliderItem();
            $sliderItem->title=$slider_item['title'];
            $sliderItem->ar_title=$slider_item['ar_title'];
            if ($slider_item['image'])
            {
                Storage::delete("public/slider/{$sliderItem->image}");
                $sliderItem->image=$slider_item['image'];
            }
            $sliderItem->category_or_product=$slider_item['category_or_product'];
            if ($slider_item['category_or_product']=='c')
                $sliderItem->category_or_product_id=$slider_item['category_id'];
            elseif($slider_item['category_or_product']=='p')
                $sliderItem->category_or_product_id=$slider_item['product_id'];
            $sliderItem->order=$slider_item['order'];
            $sliderItem->visible=$slider_item['visible'];
            $sliderItem->save();

        }

        \Session::flash('msg','s'.__('operations.updating_successfuly',['item'=>__('slider.title')]));
        return redirect()->route('content-management.slider');
    }
}
