@php
if(isset($post->post_id))
{
  $post->id = $post->post_id;
}
@endphp

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