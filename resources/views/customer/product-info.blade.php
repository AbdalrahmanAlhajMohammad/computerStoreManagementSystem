@extends('layouts._customer_layout')

@section('title',__('products.show_title'))

@section('content')
    <div class="row">
        <div class="col-md-3">
             <img src="{{$product->logo}}" class="img-fluid">
        </div>
        <div class="col-md-9">
            <h1>{{$product->name}}</h1><br>
            <h4>{{$product->price}} $</h4><br>
            <h4>@lang('products.highlights')</h4><br
            <ul style="list-style: circle;">
                @foreach($product->highlights as $highlight)
                    <li>{{$highlight->context}}</li>
                    @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">@lang('products.specifications')</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">@lang('products.images')</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table table-hover table-striped table-bordered">
                        @foreach($product->specifications as $specification)
                            <tr>
                                <th>{{$specification->title}}</th>
                                <td>{{$specification->content}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        @foreach($product->images as $image)
                        <div class="col-md-3">
                            <img src="{{$image->image}}" class="img-fluid">
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>
    </div>
@endsection