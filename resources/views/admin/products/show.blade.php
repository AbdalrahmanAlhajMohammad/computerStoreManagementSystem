@extends('layouts._admin_layout')
@section('title',__('products.show_title'))
@section('page_header',__('products.show_page_header'))
@section('page_description',__('products.show_page_description'))
@section('metronic_plugins_css')
    <link href="{{asset('metronic_template')}}/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet ">
                    <!-- SIDEBAR USERPIC -->
                    <div class="">
                        <img src="{{$product->getLogoPathAttribute()}}" class="img-responsive" alt=""></div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name"> {{$product->name}} </div>
                        <div class="profile-usertitle-job"> {{$product->category->name}} </div>
                    </div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->
                    <div class="profile-userbuttons">
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-circle green btn-sm"><span
                                    class="fa fa-edit"></span> @lang('operations.edit')</a>
                        <a href="{{route('products.delete',$product->id)}}" class="btn btn-circle red btn-sm"><span
                                    class="fa fa-trash"></span> @lang('operations.delete')</a>
                    </div>
                    <!-- END SIDEBAR BUTTONS -->
                    <!-- SIDEBAR MENU -->
                    <div class="profile-usermenu">
                        <ul class="nav">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-home"></i> Overview </a>
                            </li>
                            <li class="active">
                                <a href="page_user_profile_1_account.html">
                                    <i class="icon-settings"></i> Account Settings </a>
                            </li>
                            <li>
                                <a href="page_user_profile_1_help.html">
                                    <i class="icon-info"></i> Help </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->
                <div class="portlet light ">
                    <!-- STAT -->
                    <div class="row list-separated profile-stat">
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 4.5</div>
                            <div class="uppercase profile-stat-text"> Rate of Ratings</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 2000</div>
                            <div class="uppercase profile-stat-text"> views</div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-6">
                            <div class="uppercase profile-stat-title"> 1200</div>
                            <div class="uppercase profile-stat-text"> Customers ordered this</div>
                        </div>
                    </div>
                    <!-- END STAT -->
                    <div>
                        <h4 class="profile-desc-title">Social Medias</h4>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="http://www.keenthemes.com">www.keenthemes.com</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-twitter"></i>
                            <a href="http://www.twitter.com/keenthemes/">@keenthemes</a>
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">@lang('products.info')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">@lang('products.highlights')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">@lang('products.specifications')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">@lang('products.images')</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_5" data-toggle="tab">@lang('products.ratings')</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_1_1">
                                        <table class="table table-hover table-striped table-bordered">
                                            <tr>
                                                <th>@lang('products.name')</th>
                                                <td>{{$product->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('products.description')</th>
                                                <td>{{$product->description}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('categories.category')</th>
                                                <td>{{$product->category->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('products.price')</th>
                                                <td>{{$product->price}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('products.quantity')</th>
                                                <td>{{$product->quantity}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('products.active')</th>
                                                <td>{{$product->active?__('products.active'):__('products.not_active')}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('manufactories.manufactor')</th>
                                                <td>{{$product->manufactory->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('products.created_at')</th>
                                                <td>{{$product->created_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>@lang('products.updated_at')</th>
                                                <td>{{$product->updated_at}}</td>
                                            </tr>
                                        </table>

                                    </div>
                                    <!-- END PERSONAL INFO TAB -->
                                    <!-- CHANGE AVATAR TAB -->
                                    <div class="tab-pane" id="tab_1_2">
                                        <div class="mt-element-list">
                                            <div class="mt-list-head list-simple ext-1 font-white bg-green-sharp">
                                                <div class="list-head-title-container">
                                                    <h3 class="list-title">@lang('products.highlights')</h3>
                                                </div>
                                            </div>
                                            <div class="mt-list-container list-simple ext-1">
                                                <ul>
                                                    @foreach($product->highlights as $highlight)
                                                        <li class="mt-list-item done">
                                                            <div class="list-icon-container">
                                                                <i class="icon-check"></i>
                                                            </div>
                                                            <div class="list-item-content">
                                                                <h3 class="uppercase">
                                                                    <a href="javascript:;">{{$highlight->context}}</a>
                                                                </h3>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END CHANGE AVATAR TAB -->
                                    <!-- CHANGE PASSWORD TAB -->
                                    <div class="tab-pane" id="tab_1_3">
                                        <table class="table table-hover table-striped table-bordered">
                                            @foreach($product->specifications as $specification)
                                            <tr>
                                                <th>{{$specification->title}}</th>
                                                <td>{{$specification->content}}</td>
                                                <th>@lang('products.created_at')</th>
                                                <td>{{$product->created_at}}</td>
                                            </tr>
                                                @endforeach
                                        </table>
                                    </div>
                                    <!-- END CHANGE PASSWORD TAB -->
                                    <!-- PRIVACY SETTINGS TAB -->
                                    <div class="tab-pane" id="tab_1_4">
                                        <form action="#">
                                            <table class="table table-light table-hover">
                                                <tbody>
                                                <tr>
                                                    <td> Anim pariatur cliche reprehenderit, enim eiusmod high life
                                                        accusamus..
                                                    </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios1"
                                                                       value="option1"> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios1"
                                                                       value="option2" checked=""> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf
                                                        moon
                                                    </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios11"
                                                                       value="option1"> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios11"
                                                                       value="option2" checked=""> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf
                                                        moon
                                                    </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios21"
                                                                       value="option1"> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios21"
                                                                       value="option2" checked=""> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> Enim eiusmod high life accusamus terry richardson ad squid wolf
                                                        moon
                                                    </td>
                                                    <td>
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios31"
                                                                       value="option1"> Yes
                                                                <span></span>
                                                            </label>
                                                            <label class="mt-radio">
                                                                <input type="radio" name="optionsRadios31"
                                                                       value="option2" checked=""> No
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <!--end profile-settings-->
                                            <div class="margin-top-10">
                                                <a href="javascript:;" class="btn red"> Save Changes </a>
                                                <a href="javascript:;" class="btn default"> Cancel </a>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- END PRIVACY SETTINGS TAB -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection
@section('metronic_plugins')
    <script src="{{asset('metronic_template')}}/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
@endsection
