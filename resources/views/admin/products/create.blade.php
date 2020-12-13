@extends('layouts._admin_layout')
@section('title',__('products.create_title'))
@section('page_header',__('products.page_header'))
@section('page_description',__('products.page_description'))

@section('metronic_plugins_css')
    <link href="{{asset('metronic_template')}}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="row" id="app">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase">{{ucfirst(__('products.create_product_form'))}}</span>
                    </div>

                </div>
                <div class="portlet-body form">
                    <form class="form-horizontal" v-on:reset="resetDynamicInputs()" role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab" aria-expanded="true"> @lang('products.info') </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_2" data-toggle="tab" aria-expanded="false"> @lang('products.highlights') <span class="badge badge-primary" v-if="highlights.length>0" v-text="highlights.length"></span> </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_3" data-toggle="tab" aria-expanded="false"> @lang('products.specifications') <span class="badge badge-primary" v-if="specifications.length>0" v-text="specifications.length"></span> </a>
                            </li>
                            <li class="">
                                <a href="#tab_1_4" data-toggle="tab" aria-expanded="false"> @lang('products.images') <span class="badge badge-primary" v-if="images.length>0" v-text="images.length"></span> </a>
                            </li>
                        </ul>
                        <div class="tab-content form-body">
                            <div class="tab-pane fade in active" id="tab_1_1">
                                <div class="form-group">

                                    <label class="col-md-1 control-label">@lang('products.name')</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{old('name')}}" placeholder="@lang('products.enter_name_placeholder')" name="name">
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="col-md-1 control-label">@lang('products.ar_name')</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{old('ar_name')}}" placeholder="@lang('products.enter_name_placeholder')" name="ar_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('products.description')</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('products.ar_description')</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="ar_description" rows="3">{{old('ar_description')}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('products.logo')</label>
                                    <div class="col-md-9">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> @lang('operations.select_image') </span>
                                                                    <span class="fileinput-exists"> @lang('operations.change') </span>
                                                                    <input type="file" name="logo"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('operations.remove') </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('categories.category')</label>
                                    <div class="col-md-9">
                                        <select name="category_id" class="form-control selectpicker">
                                            <option value="">@lang('categories.select')</option>
                                            @foreach($categories as $category)
                                                <option {{old('category_id')==$category->id?'checked':''}} value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('products.price')</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{old('price')}}" placeholder="@lang('products.enter_price_placeholder')" name="price">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('manufactories.manufactor')</label>
                                    <div class="col-md-9">
                                        <select name="manufactor_id" class="form-control selectpicker">
                                            <option value="">@lang('manufactories.select')</option>
                                            @foreach($manufactories as $manufactory)
                                                <option value="{{$manufactory->id}}">{{$manufactory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('products.active')</label>
                                    <div class="col-md-9">
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" name="active" class="make-switch" checked data-on-color="primary" data-off-color="info" value="1">                                </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-1 control-label">@lang('products.quantity')</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" value="{{old('quantity')}}" placeholder="@lang('products.enter_quantity_placeholder')" name="quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade " id="tab_1_2">
                                <div class="form-group">

                                    <label class="col-md-1 control-label">@lang('products.highlights')</label>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-primary" v-on:click="addHighLight()"><span class="fa fa-plus"></span></button>
                                        <span class="badge badge-primary" v-show="highlights.length>0" v-text="highlights.length"></span>
                                    </div>
                                    <div class="col-md-9" v-show="highlights.length>0" >
                                        <div class="row margin-bottom-5" v-for="(item,index) in highlights" >
                                            <div class="col-md-11">
                                                <input type="text" v-model="item.highlight" class="form-control" :id="index"  placeholder="@lang('products.enter_highlight_placeholder')" name="highlights[]">
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" class="btn btn-danger" :id="index" v-on:click="removeHighLight(index)"><span class="fa fa-trash"></span></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab_1_3">
                                <div class="form-group">
                                    <div class="col-md-12 table-responsive"  >
                                            <table class="tabel  table-striped fixed-table" style="width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-3 text-center" >Title</th>
                                                    <th class="col-md-8 text-center">Content</th>
                                                    <th class="col-md-1 text-center"><button type="button" class="btn btn-primary" v-on:click="addSpecification()"><span class="fa fa-plus"></span></button></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(item,index) in specifications" v-if="specifications.length>0" class="">

                                                    <td class="col-md-3 text-center padding-tb-10">
                                                        <input type="text" class="form-control" v-model="item.specification.title"  placeholder="@lang('products.enter_specification_title_placeholder')"  :name="`specifications[${index}][title]`">
                                                    </td>
                                                    <td class="col-md-3 text-center">
                                                        <input type="text" class="form-control" v-model="item.specification.content"   placeholder="@lang('products.enter_specification_content_placeholder')" :name="`specifications[${index}][content]`">
                                                    </td>
                                                    <td class="col-md-3 text-center">
                                                        <button type="button" class="btn btn-danger" :id="index" v-on:click="removeSpecification(index)"><span class="fa fa-trash"></span></button>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab_1_4">
                                <div class="form-group">
                                    <div class="col-md-12 table-responsive"  >
                                            <table class="tabel  table-striped fixed-table" style="width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th class="col-md-3 text-center" >@lang('products.image_title')</th>
                                                    <th class="col-md-8 text-center">@lang('products.images')</th>
                                                    <th class="col-md-1 text-center"><button type="button" class="btn btn-primary" v-on:click="addImage()"><span class="fa fa-plus"></span></button></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(item,index) in images" v-if="images.length>0" class="">
                                                    <td class="col-md-2 text-center padding-tb-10">
                                                        <input type="text" class="form-control" v-model="item.title"  placeholder="@lang('products.enter_specification_title_placeholder')" :name="`images[${index}][title]`">
                                                    </td>

                                                    <td class="col-md-9 text-center">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> @lang('operations.select_image') </span>
                                                                    <span class="fileinput-exists"> @lang('operations.change') </span>
                                                                    <input type="file" :name="`images[${index}][image]`"   v-on:change="onFileChange($event,index)"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> @lang('operations.remove') </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="col-md-1 text-center">
                                                        <button type="button" class="btn btn-danger" :id="index" v-on:click="removeImage(index)"><span class="fa fa-trash"></span></button>

                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="form-actions">
                            @csrf
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green"><span class="fa fa-plus"></span>@lang('operations.add')</button>
                                    <button type="reset" class="btn default">@lang('operations.reset')</button>
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
        var app=new Vue({
            el:'#app',
          data:{
              highlights:[
                      @for($i=0;;$i++)
                      <?php
                          if (!old("highlights.$i"))
                              break;
                      ?>
                  {'highlight':'{{old("highlights.$i")}}'},
                  @endfor
              ],
              specifications:[],
              images:[],
              myFiles: ['']
          },
            methods:{
              addHighLight()
              {
                  this.highlights.push({'highlight':''});
              }
              ,removeHighLight(index)
                {
                   // alert(index);
                    this.highlights.splice(index,1);
                },addSpecification()
              {
                  this.specifications.push({'specification':{'title':'','content':''}});
              }
              ,removeSpecification(index)
                {
                   // alert(index);
                    this.specifications.splice(index,1);
                },addImage()
                {
                    this.images.push({'image':'','title':''});
                },
                removeImage(index)
                {
                    this.images.splice(index,1);
                },resetDynamicInputs()
                {
                    this.highlights=[];
                    this.specifications=[];
                    this.images=[];
                },
                onFileChange(e,index) {
                    var files = e.target.files || e.dataTransfer.files;
                    if (!files.length)
                        return;
                    this.images[index].image=files[1];
                }

            }
        });
    </script>
@endsection