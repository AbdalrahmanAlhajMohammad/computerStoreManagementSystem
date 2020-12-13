@extends('layouts._customer_layout')

@section('title',__('customer.sub_categories'))

@section('content')
<div class="row mt-5">
    @foreach($subCategories as $subCategory)
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top img-fluid" style="height: 130px;" src="{{$subCategory->logo}}" alt="Card image cap">
            <div class="card-body text-center">
                <h5 class="card-title ">{{$subCategory->name}}</h5>
                <a href="{{route('customer.categories.show'."?category_id=$subCategory->id")}}" class="btn btn-primary">@lang('customer.view_products')</a>
            </div>
        </div>
    </div>
        @endforeach
</div>
@endsection