@extends('layouts._admin_layout')
@section('title',__('categories.edit_title'))
@section('page_header',__('categories.edit_page_header'))
@section('page_description',__('categories.edit_page_description'))

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">@lang('categories.edit_category_form')</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.en_name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$category->name}}" placeholder="@lang('categories.enter_name_placeholder')" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.ar_name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{$category->ar_name}}" placeholder="@lang('categories.enter_name_placeholder')" name="ar_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.order')</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" value="{{$category->order}}" placeholder="@lang('categories.enter_order_placeholder')" name="order">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.logo')</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" value="{{$category->logo}}" placeholder="@lang('categories.enter_logo_placeholder')" name="logo">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.parent_category')</label>
                        <div class="col-md-9">
                            <select class="form-control" name="parent_category_id">
                                <option value="">@lang('operations.select')</option>
                                <option value="0">@lang('statuses.not_found')</option>
                                @foreach($parentCategories as $parent)
                                    <option {{$parent->id==$category->parent_id}} value="{{$parent->id}}">{{$parent->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 offset-3">
                            <div class="mt-overlay-1">
                                <img src="{{$category->getLogoPathAttribute()}}" class="img-responsive img-thumbnail" >
                            </div>
                        </div>
                    </div>
                    @csrf
                    @method('PUT')
                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green"><span class="fa fa-edit"></span>@lang('operations.edit')</button>
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