@extends('layouts._admin_layout')
@section('title',__('account.title'))
@section('page_header',__('account.page_header'))
@section('page_description',__('account.page_description'))

@section('content')
<div class="row">
    <div class="portlet light bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">@lang('account.table_title')</span>
            </div>
            @can('create',\App\User::class)
            <div class="actions">
                <a href="{{route('accounts.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> @lang('account.create_page_header')</a>
            </div>
                @endcan
        </div>
        <div class="portlet-body">
            <div class="table-scrollable">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th> @lang('account.full_name') </th>
                        <th>@lang('account.email')</th>
                        <th>@lang('account.mobile')</th>
                        <th>@lang('account.active_state')</th>
                        <th>@lang('operations.actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$user->getFullNameAttribute()}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->getActiveStateAttribute()}}</td>
                        <td>
                            @can('update',\App\User::class)
                            <a href="{{route('accounts.edit',$user->id)}}" title="@lang('operations.edit')" class="btn btn-icon-only blue">
                                <i class="fa fa-edit"></i>
                            </a>
                            @endcan
                            <a href="{{route('accounts.show',$user->id)}}" title="@lang('operations.view')" class="btn btn-icon-only default">
                                <i class="fa fa-eye"></i>
                            </a>
                                @can('delete',\App\User::class)
                            <a href="{{route('accounts.delete',$user->id)}}" title="@lang('operations.delete')" class="btn btn-icon-only red">
                                <i class="fa fa-trash"></i>
                            </a>
                                @endcan
                                @can('permissions',\App\User::class)
                            <a href="{{route('accounts.permissions',$user->id)}}" title="" class="btn green">
                                <i class="fa fa-list"> @lang('account.permissions_settings')</i>
                            </a>
                                    @endcan
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection