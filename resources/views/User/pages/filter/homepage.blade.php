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

   
 

    

    <div class="row">
     
        
        {{-- @forelse($tags as $tag) --}}
         @foreach($posts as $post)
           @include('User\pages\tag\partial\posts')
         @endforeach

         {{-- {{$posts->render()}} --}}

        {{-- @empty                                                                                    

        @endforelse --}}
     {{-- {{$tags->render()}} --}}
    </div>
  </div>
</div>

@endsection