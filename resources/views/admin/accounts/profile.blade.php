
@extends('layouts._admin_layout')
@section('title',__('account.profile'))
@section('page_header',__('account.profile'))
@section('page_description',__('account.show_title'))
@section('metronic_plugins_css')
    <link href="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
    <link href="{{asset('metronic_template')}}/assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="profile">
                <div class="tabbable-line tabbable-full-width">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> @lang('operations.overview') </a>
                        </li>
                        <li class="">
                            <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> @lang('account.account') </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-unstyled profile-nav">
                                        <li>
                                            <img src="{{$user->logo}}" class="img-responsive pic-bordered" alt="">
                                            <a href="#tab_3-3" data-toggle="tab" class="profile-edit"> edit </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8 profile-info">
                                            <h1 class="font-green sbold uppercase">{{$user->getFullNameAttribute()}}</h1>
                                            <p>
                                                <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                                            </p>
                                            <ul class="list-inline">
                                                <i class="fa fa-calendar"></i>{{$user->date_of_birth}}</li>
                                                <li>
                                                    <i class="fa fa-mobile"></i>{{$user->mobile}}</li>
                                                <li>
                                                    <i class="fa fa-star"></i>{{$user->getGenderASTextAttribute()}}</li>
                                            </ul>
                                        </div>
                                        <!--end col-md-8-->
                                        <div class="col-md-4">
                                            <div class="portlet sale-summary">
                                                <div class="portlet-title">
                                                    <div class="caption font-red sbold">@lang('account.activity_history')</div>
                                                    <div class="tools">
                                                        <a class="reload" href="javascript:;" data-original-title="" title=""> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body" style="">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                                        <span class="sale-info">@lang('account.last_login_date')
                                                                            <i class="fa fa-img-up"></i>
                                                                        </span>
                                                            <span class="sale-num">{{$user->last_login_date??__('statuses.unknown')}}</span>
                                                        </li>
                                                        <li>
                                                                        <span class="sale-info">@lang('account.last_logout_date')
                                                                            <i class="fa fa-img-down"></i>
                                                                        </span>
                                                            <span class="sale-num">{{$user->last_logout_date??__('statuses.unknown')}}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-md-4-->
                                    </div>
                                    <!--end row-->

                                </div>
                            </div>
                        </div>
                        <!--tab_1_2-->
                        <div class="tab-pane" id="tab_1_3">
                            <div class="row profile-account">
                                <div class="col-md-3">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_1-1" aria-expanded="false">
                                                <i class="fa fa-cog"></i> Personal info </a>
                                            <span class="after"> </span>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_2-2" aria-expanded="false">
                                                <i class="fa fa-picture-o"></i> Change Avatar </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_3-3" aria-expanded="false">
                                                <i class="fa fa-lock"></i> Change Password </a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-md-9">
                                    <div class="tab-content">
                                        <div id="tab_1-1" class="tab-pane active">
                                            <form role="form" action="{{route('accounts.profile.update')}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label class="control-label">@lang('account.first_name')</label>
                                                    <input type="text" value="{{$user->first_name}}" name="first_name" placeholder="John" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('account.last_name')</label>
                                                    <input type="text" value="{{$user->last_name}}" name="last_name" placeholder="Doe" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('account.mobile')</label>
                                                    <input type="text" value="{{$user->mobile}}" name="mobile" placeholder="+1 646 580 DEMO (6284)" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('account.email')</label>
                                                    <input type="text" value="{{$user->email}}" name="email" placeholder="Design, Web etc." class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('account.gender')</label>
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
                                                    </div> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('account.date_of_birth')</label>
                                                    <input type="date" name="date_of_birth" class="form-control"> </div>
                                                <div class="margiv-top-10">
                                                    <button type="submit" class="btn green"> @lang('operations.save') </button>
                                                    <a href="javascript:;" class="btn default"> @lang('operations.cancel') </a>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_2-2" class="tab-pane">
                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                eiusmod. </p>
                                            <form action="{{route('accounts.profile.logo.update')}}" method="post" role="form" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                            <img src="{{$user->logo}}" alt=""> </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                        <div>
                                                                        <span class="btn default btn-file">
                                                                            <span class="fileinput-new">@lang('operations.select_image')</span>
                                                                            <span class="fileinput-exists">@lang('operations.change')</span>
                                                                            <input type="file" name="logo"> </span>
                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> @lang('operations.remove') </a>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix margin-top-10">
                                                        <span class="label label-danger"> NOTE! </span>
                                                        <span> Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                    </div>
                                                </div>
                                                <div class="margin-top-10">
                                                    <button type="submit" class="btn green"> @lang('operations.save') </button>
                                                    <a href="javascript:;" class="btn default"> @lang('operations.cancel') </a>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_3-3" class="tab-pane">
                                            <form action="{{route('accounts.profile.change-password')}}" method="post">
                                                @csrf
                                                @method('put')
                                                <div class="form-group">
                                                    <label class="control-label">@lang('passwords.current_password')</label>
                                                    <input type="password" name="old_password" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('passwords.new_password')</label>
                                                    <input type="password" name="password" class="form-control"> </div>
                                                <div class="form-group">
                                                    <label class="control-label">@lang('passwords.re_type_new_password')</label>
                                                    <input type="password" name="password_confirmation" class="form-control"> </div>
                                                <div class="margin-top-10">
                                                    <button type="submit" class="btn green">@lang('operations.change_password')</button>
                                                    <a href="javascript:;" class="btn default">@lang('operations.cancel')</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="tab_4-4" class="tab-pane">
                                            <form action="#">
                                                <table class="table table-bordered table-striped">
                                                    <tbody><tr>
                                                        <td> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus.. </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios1" value="option1"> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios1" value="option2" checked=""> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios21" value="option1"> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios21" value="option2" checked=""> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios31" value="option1"> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios31" value="option2" checked=""> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Enim eiusmod high life accusamus terry richardson ad squid wolf moon </td>
                                                        <td>
                                                            <div class="mt-radio-inline">
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios41" value="option1"> Yes
                                                                    <span></span>
                                                                </label>
                                                                <label class="mt-radio">
                                                                    <input type="radio" name="optionsRadios41" value="option2" checked=""> No
                                                                    <span></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody></table>
                                                <!--end profile-settings-->
                                                <div class="margin-top-10">
                                                    <a href="javascript:;" class="btn green"> Save Changes </a>
                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-md-9-->
                            </div>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="tab_1_6">
                            <div class="row">
                                <div class="col-md-2">
                                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_1" aria-expanded="false">
                                                <i class="fa fa-briefcase"></i> General Questions </a>
                                            <span class="after"> </span>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_2" aria-expanded="false">
                                                <i class="fa fa-group"></i> Membership </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_3" aria-expanded="false">
                                                <i class="fa fa-leaf"></i> Terms Of Service </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_1" aria-expanded="false">
                                                <i class="fa fa-info-circle"></i> License Terms </a>
                                        </li>
                                        <li class="">
                                            <a data-toggle="tab" href="#tab_2" aria-expanded="false">
                                                <i class="fa fa-tint"></i> Payment Rules </a>
                                        </li>
                                        <li class="active">
                                            <a data-toggle="tab" href="#tab_3" aria-expanded="false">
                                                <i class="fa fa-plus"></i> Other Questions </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-10">
                                    <div class="tab-content">
                                        <div id="tab_1" class="tab-pane">
                                            <div id="accordion1" class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_1" class="panel-collapse collapse in">
                                                        <div class="panel-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                                            laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore
                                                            wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably
                                                            haven't heard of them accusamus labore sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_2" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                            sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_3" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                            sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_4" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_5" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_6" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion1_7" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_2" class="tab-pane">
                                            <div id="accordion2" class="panel-group">
                                                <div class="panel panel-warning">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                                                you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                                                                beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt
                                                                you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_2" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                            sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_3" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                            sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_4" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_5" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_6" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion2_7" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_3" class="tab-pane active">
                                            <div id="accordion3" class="panel-group">
                                                <div class="panel panel-danger">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1"> 1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                                nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. </p>
                                                            <p> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                                                                craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                                                                nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-success">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2"> 2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_2" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                            sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3"> 3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_3" class="panel-collapse collapse">
                                                        <div class="panel-body"> Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit,
                                                            enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf
                                                            moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                                            ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore
                                                            sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4"> 4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_4" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5"> 5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_5" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6"> 6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_6" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7"> 7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
                                                        </h4>
                                                    </div>
                                                    <div id="accordion3_7" class="panel-collapse collapse">
                                                        <div class="panel-body"> 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                                            coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                                            occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod.
                                                            Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end tab-pane-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('metronic_plugins')
    <script src="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection