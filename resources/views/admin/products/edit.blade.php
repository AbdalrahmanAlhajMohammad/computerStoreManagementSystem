@extends('layouts._admin_layout')
@section('title',__('products.edit_title'))
@section('page_header',__('products.edit_title'))
@section('page_description',__('products.edit_page_description'))

@section('metronic_plugins_css')
    <script src="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" type="text/javascript"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ucfirst(__('products.edit_product_form'))}}</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" role="form" action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('products.name')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$product->name}}" placeholder="@lang('products.enter_name_placeholder')" name="name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('products.description')</label>
                                <div class="col-md-9">
                                    <textarea class="form-control"  name="description" rows="3">{{$product->description}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('products.logo')</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img src="{{$product->getLogoPathAttribute()}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> @lang('operations.select_image') </span>
                                                                    <span class="fileinput-exists"> @lang('operations.change') </span>
                                                                    <input type="file" name="logo"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('operations.remove') </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('categories.category')</label>
                                <div class="col-md-9">
                                    <select name="category_id" class="form-control selectpicker">
                                      <option value="">@lang('categories.select')</option>
                                        @foreach($categories as $category)
                                            <option {{$product->category_id==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('products.price')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$product->price}}" placeholder="@lang('products.enter_price_placeholder')" name="price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('manufactories.manufactor')</label>
                                <div class="col-md-9">
                                    <select name="manufactor_id" class="form-control selectpicker">
                                        <option value="">@lang('manufactories.select')</option>
                                        @foreach($manufactories as $manufactory)
                                            <option {{$product->manufactor_id==$manufactory->id?'selected':''}} value="{{$manufactory->id}}">{{$manufactory->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('products.active')</label>
                                <div class="col-md-9">
                                    <input type="hidden" name="active" value="0">
                                    <input {{$product->active?'checked':''}} type="checkbox" name="active" class="make-switch"  data-on-color="primary" data-off-color="info" value="1">                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-1 control-label">@lang('products.quantity')</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="{{$product->quantity}}" placeholder="@lang('products.enter_quantity_placeholder')" name="quantity">
                                </div>
                            </div>

                            @csrf
                             @method('PUT')
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green"><span class="fa fa-plus"></span>@lang('operations.edit')</button>
                                    <button type="reset" class="btn default">@lang('operations.reset')</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('metronic_plugins')
    <script src="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
    <script src="{{asset('metronic_template')}}/assets/global/plugins/jquery-repeater/jquery.repeater.js" type="text/javascript"></script>
    <script src="{{asset('metronic_template')}}/assets/pages/scripts/form-repeater.min.js" type="text/javascript"></script>

@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.repeater').repeater();
        });
    </script>
@endsection