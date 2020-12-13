@extends('layouts._admin_layout')
@section('title',__('manufactories.create_title'))
@section('page_header',__('manufactories.create_page_header'))
@section('page_description',__('manufactories.create_page_description'))

@section('content')
<div class="row">
<div class="col-md-12">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-dark"></i>
                <span class="caption-subject font-dark sbold uppercase">{{ucfirst(__('manufactories.create_manufactor_form'))}}</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" action="{{route('manufactories.store')}}" method="post" enctype="multipart/form-data">
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('manufactories.name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{old('name')}}" placeholder="@lang('manufactories.enter_name_placeholder')" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('manufactories.ar_name')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" value="{{old('ar_name')}}" placeholder="@lang('manufactories.enter_name_placeholder')" name="ar_name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">@lang('manufactories.logo')</label>
                        <div class="col-md-9">
                            <input type="file" class="form-control" value="{{old('logo')}}" placeholder="@lang('manufactories.enter_logo_placeholder')" name="logo">
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