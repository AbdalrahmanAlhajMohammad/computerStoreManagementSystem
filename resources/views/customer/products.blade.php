@extends('layouts._customer_layout')

@section('title',__('customer.products'))

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('one_tech_template')}}/styles/shop_styles.css">
    <link rel="stylesheet" type="text/css" href="{{asset('one_tech_template')}}/styles/shop_responsive.css">

@endsection
@section('content')
    <div class="shop" id="app">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <!-- Shop Sidebar -->
                    <div class="shop_sidebar">
                        <div class="sidebar_section">
                            <div class="sidebar_title">Categories</div>
                            <ul class="sidebar_categories">
                                @foreach($categories as $category)
                                <li><label> {{$category->name}} </label><input type="checkbox" v-on:change="categoryCheck({{$category->id}},$event)" class="" value="{{$category->id}}"></li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="sidebar_section">
                            <div class="sidebar_subtitle brands_subtitle">@lang('manufactories.manufactor')</div>
                            <ul class="brands_list">
                                @foreach($manufactories as $manufactor)
                                <li class="brand"><label>{{$manufactor->name}}</label><input type="checkbox" v-on:change="manufactorCheck({{$manufactor->id}},$event)" class="" value="{{$manufactor->id}}"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="col-lg-9">

                    <!-- Shop Content -->

                    <div class="shop_content">
                        <div class="shop_bar clearfix">
                            <div class="shop_product_count"><span>@{{ products.length }}</span> @lang('customer.products was found')</div>
                            <div class="shop_sorting">
                                <span>Sort by:</span>
                                <ul>
                                    <li>
                                        <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                        <ul>
                                            <li class="shop_sorting_button" data-isotope-option="{ &quot;sortBy&quot;: &quot;original-order&quot; }">highest rated</li>
                                            <li class="shop_sorting_button" data-isotope-option="{ &quot;sortBy&quot;: &quot;name&quot; }">name</li>
                                            <li class="shop_sorting_button" data-isotope-option="{ &quot;sortBy&quot;: &quot;price&quot; }">price</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_grid" style="position: relative; height: 1265px;">
                            <div class="product_grid_border"></div>



                            <!-- Product Item -->
                           <div class="row">
                               <div class="col-md-3 m-2" v-for="(item,index) in products">
                                   <div class="card" >
                                       <img class="card-img-top img-fluid" style="height: 130px;" :src="item.logo" alt="Card image cap">
                                       <div class="card-body text-center">
                                           <h5 class="card-title ">@{{item.name}}</h5>
                                           <h5 class="card-title ">$ @{{item.price}}</h5>
                                           <a :href="`products/${item.id}`" class="btn btn-primary">@lang('operations.view')</a>
                                       </div>
                                   </div>
                               </div>
                           </div>


                        </div>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">21</a></li>
                            </ul>
                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('js')}}/vue.js"></script>
    <script src="{{asset('js')}}/axios.min.js"></script>

    <script>
        var app=new Vue({
            el:'#app',
            data: {
                products: [],
                categories:[],
                categoriesSeralized:'{{request()['category_id']}}',
                manufactories:[],
                manufactoriesSeralized:'',


            },
            methods:{
                getProducts()
                {
                    vm=this;
                    axios.get('{{route('customer.products.search')}}', {
                        params:{'categories':vm.categoriesSeralized,'manufactories':vm.manufactoriesSeralized}
                    })
                        .then(function (response) {
                            vm.products=response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                categoryCheck(id,event)
                {
                    if (event.target.checked)
                    {
                        this.categories.push(id);

                    }
                    else
                    {
                         var index=this.categories.indexOf(id);
                         this.categories.splice(index,1);

                    }
                    this.categoriesSeralized='';
                    for(i=0;i<this.categories.length;i++)
                    {
                        this.categoriesSeralized+=this.categories[i]+','
                    }
                    this.getProducts();


                },manufactorCheck(id,event)
                {
                    if (event.target.checked)
                    {
                        this.manufactories.push(id);

                    }
                    else
                    {
                         var index=this.manufactories.indexOf(id);
                         this.manufactories.splice(index,1);

                    }
                    this.manufactoriesSeralized='';
                    for(i=0;i<this.manufactories.length;i++)
                    {
                        this.manufactoriesSeralized+=this.manufactories[i]+','
                    }
                    this.getProducts();


                }
            },
            created:function(){
               this.getProducts();
            }
        });
    </script>
@endsection