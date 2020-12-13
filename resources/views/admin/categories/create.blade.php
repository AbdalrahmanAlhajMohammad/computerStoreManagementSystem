@extends('layouts._admin_layout')
@section('title',__('categories.create_title'))
@section('page_header',__('categories.create_page_header'))
@section('page_description',__('categories.create_page_description'))
@section('metronic_plugins_css')
    <link href="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">{{ucfirst(__('categories.create_category_form'))}}</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.en_name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{old('name')}}" placeholder="@lang('categories.enter_name_placeholder')" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.ar_name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{old('ar_name')}}" placeholder="@lang('categories.enter_name_placeholder')" name="ar_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.order')</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" value="{{old('order')}}" placeholder="@lang('categories.enter_order_placeholder')" name="order">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('categories.logo')</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                        <label class="col-md-1 control-label">@lang('categories.parent_category')</label>
                        <div class="col-md-9">
                            <select class="form-control" name="parent_category_id">
                                <option value="">@lang('operations.select')</option>
                                <option value="0">@lang('statuses.not_found')</option>
                                @foreach($parentCategories as $parent)
                                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    @csrf

                </div>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn green"><span class="fa fa-plus"></span>@lang('operations.add')</button>
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
@endsection
