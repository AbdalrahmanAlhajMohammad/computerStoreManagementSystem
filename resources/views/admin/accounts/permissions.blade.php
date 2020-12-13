@extends('layouts._admin_layout')
@section('title',__('account.create_title'))
@section('page_header',__('account.create_page_header'))
@section('page_description',__('account.create_page_description'))

@section('content')
    <div class='container'>

        <div class="col-md-12 col-lg-12 ">

            <form  method="post" enctype="multipart/form-data" action="{{route('accounts.permissions.update',$user->id)}}">
                @csrf


                <div class="form-group row">
                        <ul class='list-unstyled'>
                            <?php $userLinks = $user->links()->get(); ?>
                            @foreach($links->where('parent_id',0) as $link)
                                <div class="col-md-2">
                                <li>
                                    <div class="custom-control custom-checkbox mr-sm-2">
                                        <input {{$userLinks->where('id',$link->id)->count()>0?"checked":""}} type="checkbox" value="{{$link->id}}" class="custom-control-input" id="linkCheckbox{{$link->id}}" name="links[]">
                                        <label class="custom-control-label" for="linkCheckbox{{$link->id}}"><b>{{$link->title}}</b></label>
                                    </div>
                                    <ul>
                                        @foreach($links->where('parent_id',$link->id) as $sublink)
                                            <li style="display: inline-block;">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    <input {{$userLinks->where('id',$sublink->id)->count()>0?"checked":""}} type="checkbox" value="{{$sublink->id}}" class="custom-control-input" id="linkCheckbox{{$sublink->id}}" name="links[]">
                                                    <label class="custom-control-label" for="linkCheckbox{{$sublink->id}}">{{$sublink->title}}</label>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                </div>
                            @endforeach
                        </ul>
                    </div>





                <div class="form-group row">
                    <div class="col-sm-9 mt-3">
                        <button type="submit" name="register" class="btn btn-primary">Save Links</button>
                    </div>
                </div>

            </form>
        </div>

    </div>


</div>
@endsection



@section('js')
    <script>
        $(function(){
            $(":checkbox").change(function(){
                //الاب واولاد عمه
                $(this).parent().next().find(":checkbox").prop('checked',$(this).prop('checked'));

                //$(this).parent().parent().parent()
                var isChecked = $(this).closest('ul').find(':checked').length;
                $(this).closest('ul').prev().find(":checkbox").prop('checked',isChecked);
            });
        });
    </script>
@endsection