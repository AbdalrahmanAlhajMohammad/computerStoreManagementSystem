@extends('layouts._admin_layout')
@section('title',__('slider.title'))
@section('page_header',__('slider.title'))
@section('page_description',__('slider.description'))
@section('metronic_plugins_css')
    <link href="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-3">
                <button class="btn btn-primary" v-on:click="addItem()"><span class="fa fa-plus"></span>@lang('slider.add_item')</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('content-management.slider.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-3">
                            <button type="submit" class="btn blue">@lang('operations.save')</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">

                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr role="row" class="heading">
                                    <th width="8%"> @lang('slider.image') </th>
                                    <th width="25%"> @lang('slider.title_en') </th>
                                    <th width="25%"> @lang('slider.title_ar') </th>
                                    <th width="8%"> @lang('slider.order') </th>
                                    <th width="10%"> @lang('slider.category_or_product') </th>
                                    <th width="23%"> @lang('slider.category_or_product_id') </th>
                                    <th width="5%"> @lang('slider.visible') </th>
                                    <th width="2%"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in items" v-show="items.length>0">
                                    <td>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img :src="item.image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> @lang('operations.select_image') </span>
                                                                    <span class="fileinput-exists"> @lang('operations.change') </span>
                                                                    <input type="file" :name="`slider_items[${index}][image]`" v-on:change="onFileChange($event,index)"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('operations.remove') </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" v-model="item.title" :name="`slider_items[${index}][title]`"
                                               value="Thumbnail image"></td>
                                    <td>
                                        <input type="text" class="form-control" v-model="item.ar_title" :name="`slider_items[${index}][ar_title]`"
                                               value="Thumbnail image"></td>
                                    <td>
                                        <input type="text" class="form-control" v-model="item.order" :name="`slider_items[${index}][order]`" value="1">
                                    </td>


                                    <td>
                                        <label>
                                            <input type="radio" v-model="item.category_or_product" :name="`slider_items[${index}][category_or_product]`" value="c"> @lang('categories.category') </label>
                                        <input type="radio" v-model="item.category_or_product" :name="`slider_items[${index}][category_or_product]`" value="p">@lang('products.product') </label>
                                    </td>
                                    <td>
                                        <select class="form-control" v-model="item.category_or_product_id" :name="`slider_items[${index}][category_id]`" v-show="item.category_or_product=='c'">
                                            <option>@lang('operations.select')</option>
                                            @foreach($categories as $category)
                                                <option  value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control" v-model="item.category_or_product_id" :name="`slider_items[${index}][product_id]`" v-show="item.category_or_product=='p'">
                                            <option>@lang('operations.select')</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->name}}</option>
                                            @endforeach
                                        </select>

                                    </td>
                                    <td>
                                        <input type="checkbox" :name="`slider_items[${index}][visible]`" class="form-control" v-model="item.visible">
                                    </td>
                                    <td>
                                        <button type="button" v-on:click="removeItem(index)" class="btn red btn-sm">
                                            <i class="fa fa-times"></i></button>
                                        <input type="hidden" :name="`slider_items[${index}][id]`" v-model="item.id">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <button class="btn btn-primary"><span class="fa fa-plus"></span>@lang('operations.save')</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

@section('metronic_plugins')
    <script src="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

<script>
    var app=new Vue({
        el:'#app',
        data:{
            items:[
                @foreach($slider_items as $item)
                {'id':'{{$item->id}}','title':'{{$item->title}}','ar_title':'{{$item->ar_title}}','image':'{{$item->image}}','category_or_product':'{{$item->category_or_product}}',
                    'category_or_product_id':'{{$item->category_or_product_id}}','order':'{{$item->order}}','visible':'{{$item->visible}}'},
                @endforeach
            ]
        },
        methods:{
            addItem()
            {
               this.items.push({'id':'','title':'','ar_title':'','image':'','category_or_product':'',
               'category_or_product_id':'','order':'','visible':''});
            },
            removeItem(index)
            {
              this.items.splice(index,1);
            },
            onFileChange(e,index) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.items[index].image=files[1];
            }
        }
    });
</script>
@endsection
