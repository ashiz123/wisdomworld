@extends('User.layouts.master')
@include('User.layouts.navigation')
@include('User.layouts.header')
@include('User.layouts.footer')


@section('title')
    IMS
@endsection

@section('content')

<div class="container">
<div class="row">
   
       {{-- {{dd(Auth::user()->tag)}} --}}
    <ul class="nav nav-pills">
            @foreach(Auth::user()->tag as $tag)
    <li role="presentation" ><a href="{{route('tag.showById', $tag->id)}}">{{$tag->tagName()}}</a></li>
            @endforeach
    </ul>

    

    <div class="row">
        @forelse($posts as $post)
        @include('User\pages\tag\partial\posts')
        @empty
            <br><br>
            <h3 style="margin-left:30px; color:grey">No any post for now</h3>
        @endforelse
    </div>



</div>


</div>

@endsection