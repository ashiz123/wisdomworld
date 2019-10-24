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
        <div class="col-md-3" >
            <div class="profile-top">
                <img src="" alt="">
                <img src="{{ get_image_path('profile', $basicInfo->image)}}" class="img-circle" style="
                 width:130px; height:130px; overflow:hidden"> 
                <h2 class="text_center">{{$user->name}}</h2>
                <p class="text_center">{{$user->email}}</p>
                {{-- <button type="button" class="btn btn-primary btn_msg" >Follow</button> --}}
                {{-- <a class="btn btn-primary btn_msg"  href="{{ route('user.follow', 1)}}">Follow User</a> --}}

               
                @if($showFollowButton == 'App/Followers::show_follow_button')
                @if($follow == 'App/Followers::show_follow')
                <form action="{{ route('user.follow', $basicInfo->user->id)}}" enctype="multipart/form-data" method="post" class="ajax">
                    {{csrf_field() }}
                 <button class="btn btn-primary btn_msg" type="submit">
                        Follow User </button>
                </form>
                @else
                <form action="{{ route('user.unfollow', $basicInfo->user->id)}}" enctype="multipart/form-data" method="post" class="ajax">
                        {{csrf_field() }}
                     <button class="btn btn-danger btn_msg" type="submit">
                            Unfollow User </button>
                    </form>
                @endif
                @endif

                  
            </div>


            <div class="basic_info">
                <h4>Basic Info</h4>
            <p>{{$user->email}}</p>
            <p>{{$basicInfo->country}}, {{$basicInfo->state}}, {{$basicInfo->address}}</p>
            <p>{{$basicInfo->contact}}</p>

            <button class="btn" style="float:right">Edit</button>
            </div>
       
        </div>

        <div class="col-md-9">
                @forelse($latestPost as $post)
                <div class="card mb-3" >
                    <div class="row no-gutters">
                      <div class="col-md-8" style="margin-bottom:15px">
                        <div class="card-body">
                            
                          <h4 class="card-title"> {{$post->title}}</h4>
                          <p class="card-text">
                          @php
                          $string = strip_tags($post->description);
                          if (strlen($string) > 200) {

                                // truncate string
                                $stringCut = substr($string, 0, 200);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '...';
                            }
                            echo $string;

                          @endphp
                           @if(strlen($post->description) > 200)
                           <a href="{{route('post.show', $post->id)}}">Read More</a>
                          @endif
                          </p>
                        
                          <p class="card-text"><small class="text-muted">Published on: {{$post->created_at->format('Y-m-d')}}</small></p>
                        
                        </div>
                      </div>
                      <div class="col-md-4">
                          <img src="{{ get_image_path('post', $post->image)}}" class="card-img" style="height:100px;">
                    </div>
                    </div>
                  </div>
                  @empty
                  <tr>
                  Post is not created yet. <a href="{{route('post.create')}}">Create the post</a>
                  </tr>
              @endforelse
                  {{$latestPost->render()}}
        </div>
    </div>
    </div>
      @endsection