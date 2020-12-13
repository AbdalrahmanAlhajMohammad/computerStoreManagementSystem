@extends('layouts._customer_layout')

@section('title',__('customer.home_title'))
@section('css')
    <link rel="stylesheet" type="text/css"
          href="{{asset('one_tech_template')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css"
          href="{{asset('one_tech_template')}}/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{asset('one_tech_template')}}/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{asset('one_tech_template')}}/styles/responsive.css">
    <link rel="stylesheet" type="text/css" href="{{asset('one_tech_template')}}/styles/main_styles.css">

    <style>
        .example-slide {
            align-items: center;
            background-color: #666;
            color: #999;
            display: flex;
            font-size: 1.5rem;
            justify-content: center;
            min-height: 10rem;
            max-height: 150px;
        }
    </style>

@endsection
@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-12">
                <template>
                    <carousel :data="slider"></carousel>
                </template>
            </div>
        </div>
        <div class="row mt-5">

            <!-- Char. Item -->

            @foreach($categories as $category)
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start" style="float: none;">
                        <div class="char_icon"><img src="{{$category->logo}}" alt="" class="img-fluid"><br></div><br>
                        <div class="char_content">
                            <br>
                            <div class="char_title">{{$category->name}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

@endsection

@section('js')
    <script src="{{asset('one_tech_template')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>

    <script src="{{asset('one_tech_template')}}/js/custom.js"></script>
    <script src="{{asset('js')}}/vue.js"></script>
    <script src="{{asset('vue-carousel-master/dist')}}/vue-carousel.js"></script>
    <script>
        Vue.component(VueCarousel.name, VueCarousel);
        var app = new Vue({
            el: '#app',
            data: {
                slider: [
                    <?php $sliders = \App\SliderItem::where('visible', true)->get(); ?>
                            @foreach($sliders as $slider)
                        '<div class="example-slide" style="background:url({{$slider->image}}); background-size:100% 100%;">' +
                    '<a href="{{$slider->url()}}">' +
                    '{{$slider->title}}' +
                    '</a>' +
                    '</div>',
                    @endforeach

                ]
            }
        });
    </script>
@endsection