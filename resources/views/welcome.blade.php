<!doctype html>



@extends('User.layouts.master')
@include('User.layouts.navigation')
@include('User.layouts.header')
@include('User.layouts.footer')


@section('title')
    IMS
@endsection

@section('content')
        <div class="container">
          {{-- <ExampleComponent></ExampleComponent> --}}

          <div class="row">
             
            <div class="col-md-8">
              
             
             
             <div class="row">
              @forelse($latestPosts as $post)
                <div class="card mb-3" >
                    <div class="row no-gutters">
                      <div class="col-md-8" style="margin-bottom:15px">
                        <div class="card-body">
                            
                          <h4 class="card-title"> {{$post->title}}</h4>
                          <p class="card-text">
                          @php
                          $post_id = $post->id;
                           
                          $string = strip_tags($post->description);
                          if (strlen($string) > 200) {

                                // truncate string
                                $stringCut = substr($string, 0, 200);
                                $endPoint = strrpos($stringCut, ' ');

                                //if the string doesn't contain any space then it will cut without word basis.
                                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                $string .= '... ';
                            }
                            echo $string;

                          @endphp
                           @if(strlen($post->description) > 200)
                           <a href="{{route('post.show', $post->id)}}">Read More</a>
                           @else
                           <a href="{{route('post.show', $post->id)}}">View</a>
                          @endif
                          </p>
                         
                        
                        <p class="card-text"><small class="text-muted">Published by: <a href="{{route('profile',$post->user->id )}}"> {{$post->user->name}}</a> </small></p>
                        
                        </div>
                      </div>
                      <div class="col-md-4">
                          <img src="{{ get_image_path('post', $post->image)}}" class="card-img thumb-image">
                    </div>
                    </div>
                  </div>
                  @empty
                  <tr>
                      No any record found.
                  </tr>
              @endforelse
               {{$latestPosts->render()}}
            </div>
            </div>
            <div class="col-md-4">
               
                <ul class="list-group">
                    @foreach($types as $type)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      {{$type->title}}
                    <span class="badge badge-primary badge-pill">{{$type->postCount()}}</span>
                    </li>
                    @endforeach
                   
                  </ul>
            </div>
          </div>

          
            
            <div class="row">
                    {{-- @foreach($types as $type) --}}
                <div class="col-md-4">
                    @foreach($posts[1] as $post)
                        <div class="card"  style="width: 35rem;">
                                <img src="{{ get_image_path('post', $post->image)}}" class="card-img-top " style="height:250px;">
                                
                                <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                              </div>
                              @break

                              @endforeach
                </div>

                <div class="col-md-4">
                        @forelse($posts[2] as $post)
                    <div class="card mb-3" >
                        <div class="row no-gutters">
                          <div class="col-md-4">
                                <img src="{{ get_image_path('post', $post->image)}}" class="card-img thumb-image" >
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                                
                              <h5 class="card-title">{{$post->title}}</h5>
                            <p class="card-text">  @php
                                $string = strip_tags($post->description);
                                if (strlen($string) > 100) {
      
                                      // truncate string
                                      $stringCut = substr($string, 0, 100);
                                      $endPoint = strrpos($stringCut, ' ');
      
                                      //if the string doesn't contain any space then it will cut without word basis.
                                      $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                      $string .= '...';
                                  }
                                  echo $string;
      
                                @endphp
                                 @if(strlen($post->description) > 200)
                                 <a href="{{route('post.show', $post->id)}}">Read More</a>
                                 @else
                                 <a href="{{route('post.show', $post->id)}}">View</a>
                                @endif
                                </p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            
                            </div>
                          </div>
                        </div>
                      </div>
                      @empty
                      @endforelse
                      
                      @if($posts[2]->count() > 3)
                      <a href="#" class="btn btn-primary" >View more</a>
                      @endif
                </div>


                <div class="col-md-4">
                        <div class="col-md-4">
                                @forelse($posts[3] as $post)
                                    <div class="card" style="width: 35rem;">
                                            <img src="{{ get_image_path('post', $post->image)}}" class="card-img-top" style="height:250px;">
                                            
                                            <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                              <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                          </div>
                                          @empty
                                          @endforelse
                            </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                
              </div>
            </div>
            {{-- <div class="row">
                @foreach($types as $type)
                @if(count($posts[$type->id]) > 0)
                <div class="col-md-3">
                          @foreach($posts[$type->id] as $post)
                        <div class="card" style="width: 18rem;">
                                <img src="{{ get_image_path('post', $post->image)}}" class="card-img-top" style="height:250px;">
                                
                                <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                              </div>
                              @break
                              @endforeach
                             
                </div>

                
                @endif
                @endforeach
            </div> --}}
        </div>
  

@endsection