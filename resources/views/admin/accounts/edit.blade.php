@extends('layouts._admin_layout')
@section('title',__('account.edit_title'))
@section('page_header',__('account.edit_page_header'))
@section('page_description',__('account.edit_page_description'))
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
                    <span class="caption-subject font-dark sbold uppercase">@lang('account.edit_title')</span>
                </div>
                <div class="actions">
                        <a href="{{route('accounts.index')}}" class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                            @lang('account.page_description')</a>

                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" role="form" action="{{route('accounts.update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.first_name')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name" placeholder="@lang('operations.enter_field',['field'=>__('account.first_name')])">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.last_name')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$user->last_name}}" name="last_name" placeholder="@lang('operations.enter_field',['field'=>__('account.last_name')])">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.gender')</label>
                            <div class="col-md-9">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" {{$user->gender=='m'?'checked':''}} id="radio53" name="gender" class="md-radiobtn" value="m">
                                        <label for="radio53">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span>@lang('statuses.male')</label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="radio54" {{$user->gender=='f'?'checked':''}} name="gender" class="md-radiobtn"  value="f">
                                        <label for="radio54">
                                            <span class="inc"></span>
                                            <span class="check"></span>
                                            <span class="box"></span>@lang('statuses.female')</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.email')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="email" value="{{$user->email}}" placeholder="@lang('operations.enter_field',['field'=>__('account.email')])">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.password')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="password"  placeholder="@lang('operations.set_empty_if_not_want_change',['field'=>__('account.password')])">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.date_of_birth')</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" name="date_of_birth"  placeholder="@lang('operations.enter_field',['field'=>__('account.password')])">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.logo')</label>
                            <div class="col-md-9">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{$user->logo}}" alt="" /> </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> @lang('operations.select_image') </span>
                                                                    <span class="fileinput-exists"> @lang('operations.change') </span>
                                                                    <input type="file" value="" name="logo"> </span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('operations.remove') </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.mobile')</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$user->mobile}}" name="mobile" placeholder="@lang('operations.enter_field',['field'=>__('account.mobile')])">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('account.active_state')</label>
                            <div class="col-md-9">
                                <input type="hidden" name="active" value="0">
                                <input type="checkbox" {{$user->active?'checked':''}} name="active" class="make-switch" checked data-on-color="success" data-on-text="<i class='fa fa-check'></i>" data-off-color="danger" data-off-text="<i class='fa fa-times'></i>" value="1">                                </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green"><span class="fa fa-edit"></span> @lang('operations.edit')</button>
                                <button type="button" class="btn default">@lang('operations.reset')</button>
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