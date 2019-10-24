@extends('User.layouts.master')
@include('User.layouts.navigation')
@include('User.layouts.header')
@include('User.layouts.footer')


@section('title')
    IMS
@endsection

<style>
.postImage
{
    height:100%;
    width:800px;
    overflow: hidden;
}

</style>


@section('content')


<div class="container">

  
<div class="row">
        <div class="col-md-2">  </div>

        {{-- latest post --}}
        <div class="col-md-8">
        <div class="row">
            <div class="col-md-1">
                <a href="{{route('profile',$post->user->id )}}"><img src="{{get_image_path('profile', $post->user->userInfo->image)}}" class="img-circle" style="margin-top:10px; width:50px; height:50px; overflow:hidden;" alt=""></a>
                    
            </div>
            <div class="col-md-3">
                
            {{$post->user->name}} @if($post->user->id != Auth::user()->id ) 
            
            @if($post->checkFollow() == false)
                <form action="{{ route('user.follow', $post->user->id)}}" enctype="multipart/form-data" method="post" class="ajax">
                    {{csrf_field() }}
                <button class="btn btn-primary btn-sm" type="submit">
                        Follow User </button>
                </form>
                @else
                <form action="{{ route('user.unfollow', $post->user->id)}}" enctype="multipart/form-data" method="post" class="ajax">
                        {{csrf_field() }}
                    <button class="btn btn-danger btn-sm" type="submit">
                            Unfollow User </button>
                    </form>
                @endif
                @endif
            <div style="margin-top:-5px;">  
            <p style="color:gray"> Published on: {{$post->toMonthName()}}</p>   
            </div>
            </div>

            <div class="col-md-2"></div>
    
            <div class="col-md-6">
                   <strong>Tags: </strong>
                     @forelse($post->tags as $tag)
                    <button  class="btn btn-primary btn-sm" disabled style="margin-btn:2px;">{{$tag->tag}}</button>
                    @empty
                    No tags.
                    @endforelse
            </div>
            
        </div>
        <div class="row">
                <h3>{{$post->title}}</h3>
                <img src="{{get_image_path('post', $post->image)}}" class="postImage" alt="" style="">
                <p style="text-align:center; margin-top:10px;">{{$post->description}}</p>
                <p>Refrence: {{$post->refrence}}</p>
                 
                
        </div>

        <div id="showLike" style="margin-top:30px; float:left; margin-left:-20px;">
            <span style="color:blue; margin-top:10px;" id="likeCount">{{$post->likeCount()}}</span> <span style="color:blue; margin-top:10px;"> likes  </span>  
            <span style="color:green; float:right; margin-left:20px;" >@if($post->authLike()==true)
                   <strong> (You like this post.) </strong>
                @endif
            </span>
            <span id="authLike" style="color:green; float:right; display:none;" > 
                    <strong> (You like this post.) </strong>
            </span>
        </div>

    

        {{-- like button html --}}
        <form action="{{route('like.store')}}" id="like-form" {{--method="post" class="ajax"--}}>
            {{-- @csrf --}}
            <div class="form-group">
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <button type="button" id="like"  class="btn btn-primary" style="margin-top:10px; float:right;">Like</button>
            </div>
        </form>
        </div>

       


        <div class="col-md-2">

        </div>
</div>





<div style="margin:50px;"></div>
<div class="row">
        <div class="col-md-2">
        </div>


        <div class="col-md-8">
            <h4 style="text-align:center"><strong>Comments</strong> </h4>
        @forelse ($post->postComments as $postComment)
        <img src="{{get_image_path('profile', $postComment->image)}}" class="img-circle" style=" width:30px; height:30px; overflow:hidden;" alt="">
        <strong>{{$postComment->name}}</strong>

        <p>{{$postComment->comment}}</p>

        {{-- to implement using table.--}}
        {{-- <table>
            <tr style="padding-bottom:10px;">
                <td><img src="{{get_image_path('profile', $postComment->image)}}" class="img-circle" style=" width:30px; height:30px; overflow:hidden;" alt="">
                    <strong>{{$postComment->name}}</strong></td>
                <td style="padding-left:30px;">{{$postComment->comment}}</td>
            </tr>
        </table> --}}
            
        @empty
        <p style="color:blue">No comments yet</p> 
        @endforelse

        {{-- comment button --}}
        <div style="margin:50px;"></div>
        <form action="{{route('comment.store', $post->id)}}" method="post" >
                @csrf
                <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea type="text" name="comment" class="form-control" rows="5" placeholder="Comment here"></textarea>
                        <button type="submit" class="btn btn-primary" style="margin-top:10px; float:right;">Comment</button>
                </div>
            </form>
        </div>


        <div class="col-md-2">
                
        </div>
</div>


</div>
@endSection
@push('userfoot')

<script>
    $("#like").click(function(){
       postId = $("input[name=post_id]").val();
       userId = $("input[name=user_id]").val();

       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
       
        $.ajax({
            
            type     : "POST",
            cache    : false,
            url      : $('#like-form').attr('action'),
            data     : {'user_id': userId, 'post_id': postId},
            success  : function(data) {
              
                if(data.likeCount != "null")
                {
                    $("#likeCount").empty()
                    $("#likeCount").append(data.likeCount);
                    $("#authLike").css('display', '');
                }else
                {
                    alert('You have liked the post already');
                   
                }
                
            }
    });
    })
  </script>

@endpush
