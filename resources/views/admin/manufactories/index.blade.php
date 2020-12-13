@extends('layouts._admin_layout')
@section('title',__('manufactories.title'))
@section('page_header',__('manufactories.page_header'))
@section('page_description',__('manufactories.page_description'))

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold">@lang('manufactories.table_title')</span>
                    </div>
                    <div class="actions">
                        <a href="{{route('manufactories.create')}}" class="btn btn-primary"><span class="fa fa-plus"></span> @lang('manufactories.add')</a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover  table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th> # </th>
                                <th> {{ucfirst(__('manufactories.name'))}} </th>
                                <th>@lang('manufactories.products_count')</th>
                                <th> {{ucfirst(__('manufactories.logo'))}} </th>
                                <th>@lang('operations.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $counter=0; ?>
                            @foreach($manufactories as $manufactory)
                                <?php $counter+=1; ?>
                                <tr class="text-center">
                                    <td> {{$counter}} </td>
                                    <td> {{$manufactory->name}} </td>
                                    <td>{{count($manufactory->products)}}</td>
                                    <td> <img class="img-responsive" src="{{$manufactory->getLogoPathAttribute()}}" style="width:70px;height:70px;">  </td>
                                    <td>
                                        <a href="{{route('manufactories.edit',$manufactory->id)}}" title="@lang('operations.edit')" class="btn btn-success"><span class="fa fa-edit"></span></a>
                                        <a href="{{route('manufactories.delete',$manufactory->id)}}" title="@lang('operations.delete')" class="btn btn-danger"><span class="fa fa-trash"></span></a>
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