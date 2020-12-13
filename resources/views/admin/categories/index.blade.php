@extends('layouts._admin_layout')
@section('title',__('categories.title'))
@section('page_header',__('categories.page_header'))
@section('page_description',__('categories.page_description'))

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold">@lang('categories.table_title')</span>
                </div>
                @can('create',\App\Category::class)
                <div class="actions">
                    <a href="{{route('categories.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> @lang('categories.add')</a>
                </div>
                    @endcan
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-hover  table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th> # </th>
                            <th> {{ucfirst(__('categories.name'))}} </th>
                            <th> {{ucfirst(__('categories.order'))}} </th>
                            <th>@lang('categories.products_count')</th>
                            <th> {{ucfirst(__('categories.logo'))}} </th>
                            <th> @lang('categories.parent_category') </th>
                            <th>@lang('operations.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $counter=0; ?>
                        @foreach($categories as $category)
                            <?php $counter+=1; ?>
                        <tr class="text-center">
                            <td> {{$counter}} </td>
                            <td> {{$category->name}} </td>
                            <td> {{$category->order}} </td>
                            <td>{{count($category->products)}}</td>
                            <td> <img class="img-responsive" src="{{$category->getLogoPathAttribute()}}" style="width:70px;height:70px;">  </td>
                            <td> {{$category->parent->name??__('statuses.not_found')}}  </td>
                            <td>
                                @can('update',\App\Category::class)
                               <a href="{{route('categories.edit',$category->id)}}" title="@lang('operations.edit')" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                @endcan
                                @can('delete',\App\Category::class)
                               <a href="{{route('categories.delete',$category->id)}}" title="@lang('operations.delete')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                    @endcan
                               <a title="@lang('operations.view')" class="btn btn-info"><span class="fa fa-eye"></span></a>
                            </td>
                        </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection