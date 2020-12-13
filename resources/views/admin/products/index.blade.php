@extends('layouts._admin_layout')
@section('title',__('products.title'))
@section('page_header',__('products.page_header'))
@section('page_description',__('products.page_description'))

@section('css')
    <link href="{{asset('metronic_template')}}/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('metronic_template')}}/assets/global/plugins/ion.rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <form>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-magnifier font-dark"></i>
                            <span class="caption-subject font-dark sbold uppercase">@lang('operations.search')</span>
                        </div>

                    </div>
                    <div class="portlet-body form">
                        <div class="row">
                            <div class="form-group margin-bottom-5">
                                <label class="col-md-1 control-label">@lang('products.name')</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="{{request()['name']}}" placeholder="@lang('products.enter_name_placeholder')" name="name">
                                </div>

                            </div>
                            <div class="form-group margin-bottom-5">
                                <label class="col-md-1 control-label">@lang('categories.category')</label>
                                <div class="col-md-3">
                                    <select name="category_id" class="form-control selectpicker">
                                        <option value="">@lang('categories.select')</option>
                                        @foreach($categories as $category)
                                            <option {{request()['category_id']==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group margin-bottom-5">
                                <label class="col-md-1 control-label">State</label>
                                <div class="col-md-3">
                                    <select name="state" class="form-control selectpicker">
                                        <option value="">any state</option>
                                        <option value="1" {{request()['state']==1?'selected':''}}>@lang('products.active')</option>
                                        <option value="0" {{request()['state']==0?'selected':''}}>@lang('products.not_active')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group margin-bottom-5">
                                <label class="col-md-1 control-label">@lang('manufactories.manufactor')</label>
                                <div class="col-md-3">
                                    <select name="manufactor_id" class="form-control selectpicker">
                                        <option value="">@lang('manufactories.select')</option>
                                        @foreach($manufactories as $manufactory)
                                            <option {{request()['manufactor_id']==$manufactory->id?'selected':''}} value="{{$manufactory->id}}">{{$manufactory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group margin-bottom-5">
                                <label class="col-md-1 control-label">@lang('products.price')</label>
                                <div class="col-md-7">
                                    <input id="price" type="text" value="" name="price" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-md-2">
                               <button class="btn red" type="submit"><span class="icon-magnifier"></span> @lang('operations.search') </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold">@lang('products.table_title')</span>
                    </div>
                    @can('create',\App\Product::class)
                        <div class="actions">
                            <a href="{{route('products.create')}}" class="btn btn-primary"><span
                                        class="fa fa-plus"></span> @lang('products.add')</a>
                        </div>
                    @endcan
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover  table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th> #</th>
                                <th> @lang('products.name') </th>
                                <th> @lang('products.logo') </th>
                                <th>@lang('categories.category')</th>
                                <th>@lang('manufactories.manufactor')</th>
                                <th> @lang('products.price') </th>
                                <th> @lang('products.active') </th>
                                <th> @lang('products.quantity') </th>
                                <th>@lang('operations.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $counter = 0; ?>
							@php
							if(request()['page'] && is_numeric(request()['page']))
								$counter=request()['page']*5-5+1;
							else
								$counter=1;
							@endphp
                            @foreach($products as $product)
                                
                                <tr class="text-center">
                                    <td> {{$counter}} </td>
                                    <td> {{$product->name}} </td>
                                    <td><img class="img-responsive" src="{{$product->getLogoPathAttribute()}}"
                                             style="width:70px;height:70px;"></td>
                                    <td>{{$product->category->name}}</td>
                                    <td><img src="{{$product->manufactory->getLogoPathAttribute()}}"
                                             style="height: 70px;width:70px; "><br>{{$product->manufactory->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->active?__('products.active'):__('products.not_active')}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>
                                        @can('update',\App\Category::class)
                                            <a href="{{route('products.edit',$product->id)}}"
                                               title="@lang('operations.edit')" class="btn btn-success"><span
                                                        class="fa fa-edit"></span></a>
                                        @endcan
                                        @can('delete',\App\Category::class)
                                            <a href="{{route('products.delete',$product->id)}}"
                                               title="@lang('operations.delete')" class="btn btn-danger"><span
                                                        class="fa fa-trash"></span></a>
                                        @endcan
                                        <a href="{{route('products.show',$product->id)}}"
                                           title="@lang('operations.view')" class="btn btn-info"><span
                                                    class="fa fa-eye"></span></a>
                                    </td>
                                </tr>
                                <?php $counter += 1; ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
		
    </div>
	<div class="row">
	<div class="col-md-12">
	{{$products->links()}}
	</div>
	</div>
	
@endsection

@section('js')
    <script src="{{asset('metronic_template')}}/assets/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $("#price").ionRangeSlider({
                type:"double",
                min:0,
                max:2700,
                step:1,
                @if(request()['price'])
                 <?php  $price=explode(';',request()['price']); ?>
                    @if(count($price)==2)
                    from:{{$price[0]}},
                    to:{{$price[1]}}
                    @endif
                @endif
            });
        });
    </script>
@endsection