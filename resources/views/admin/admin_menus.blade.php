<?php
if (auth()->user()->super_admin)
    $usersLinks = \App\Link::all();
else
    $usersLinks = auth()->user()->links;
$links = $usersLinks->where('parent_id', 0);
$currentRouteName = \Illuminate\Support\Facades\Route::currentRouteName();
?>
@foreach($links as $link)
    <?php
    $sublinks = $usersLinks->where('parent_id', $link->id)
        ->where('show_in_menu', 1);
    ?>
    <?php $countSubLinksActive = $sublinks->where('route', $currentRouteName)->count() ?>
    <li class="nav-item {{$countSubLinksActive>0?'active open':''}} ">

        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="{{$link->icon}}"></i>
            <span class="title">{{$link->title}}</span>
            <span class="arrow "></span>
        </a>


        <ul class="sub-menu">
            @foreach ($sublinks as $sublink)
                <li class="nav-item {{$currentRouteName==$sublink->route?'active open':''}}">
                    <a href="/admin{{$sublink->url}}" class="nav-link">
                        <i class="icon-link"></i> {{$sublink->title}}</a>
                </li>
            @endforeach
        </ul>


    </li>
@endforeach

<li>
    <a href="/translations" target="_blank" class="nav-link nav-toggle">
        <i class="fa fa-language"></i>
        <span class="title">Go to Translation Manager</span>
    </a>
</li>