@extends('User.layouts.master')
@include('User.layouts.navigation')
@include('User.layouts.header')
@include('User.layouts.footer')

<style>
    input {
    border: none !important;
    background: transparent !important;
}

textarea {
    border: none !important;
    background: transparent !important;
}

.bigger-input
{
    height:50px !important;
    font-size:16pt !important;
}

.input-row
{
    margin-bottom:10px;
}



@media(max-width:991px){
    .post-btn
{
    margin-top:0px;
    
}
}

@media(min-width:992px){
    .post-btn
{
    margin-top:-100px;
    float:right;
}
}
</style>


@section('title')
    IMS
@endsection

@section('content')
<div class="container">
<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data" class="ajax">
    {{csrf_field() }}
            <div class="form-group input-row">
                    <input type="text" name="title" class="form-control bigger-input" placeholder="Enter Title" >
            </div>

            <div class="form-group input-row" >
                    <textarea type="text" name="description" rows="5" class="form-control" placeholder="Enter Description" ></textarea>
            </div>

            <div class="form-group row input-row" >
               
                <div class="col-md-6">
                        <select class="form-control" name="post_type_id">
                            @foreach($postTypes as $postType)
                        <option  value="{{$postType->id}}">{{$postType->title}}</option>
                             @endforeach   
                              </select>
                </div>

                <div class="col-md-6">
                        <input type="text" name="slug" class="form-control " placeholder="Enter Slug" >
                </div>
            </div>

            <div class="form-group row input-row" >
                    <div class="col-md-6" style="position:relative">
                            <img id="blah" src="" alt="Place image" style="height: 180px;  overflow: hidden;  " />
                            <input type="file" id="imgInp" name="image" style="margin-bottom: 5px; " class="form-control"><br>
                    </div>

                  

                    <div class="col-md-6">
                            <input type="text" name="links" class="form-control " placeholder="Enter links" style="margin-bottom: 10px; " >
                    </div>

                    {{-- <div class="col-md-6">
                            <select class="form-control" name="tag" multiple>
                                <option value="">Select the tags</option>
                              
                                @foreach($tags as $tag)
                                   <option  value="{{$tag->tag}}">{{$tag->tag}}</option>
                                 @endforeach  
                               
                                  </select>
                    </div> --}}

                    <div class="col-md-6">
                            <select class="form-control" name="tags[]" multiple>
                                <option value="">Select the tags</option>
                              
                                @foreach($tags as $tag)
                                   <option  value="{{$tag->id}}">{{$tag->tag}}</option>
                                 @endforeach  
                               
                                  </select>
                    </div>

                  

                    

                    <div class="col-md-6">
                            <input type="text" name="refrence" class="form-control " placeholder="Enter refrence"  style="margin-bottom: 10px; " >
                    </div>

                    <div class="col-md-6">
                            <input type="text" name="author" class="form-control " placeholder="Enter author"  style="margin-bottom: 10px; " >
                    </div>

                    <div class="col-md-6">
                        <div class="form-check">
                          <label class="form-check-label" style="margin-left:15px;">
                            <input type="checkbox" class="form-control " name="publish" id="" value="1" style="margin-top:20px; margin-left:0px;" checked>
                           Publish
                          </label>
                        </div>
                    </div>
    
                   
                </div>
                

                <div class="row">
                        <button type="submit" class="btn btn-primary">Post Article</button>
                                {{-- <button class="btn btn-success post-btn" type="submit" >Post Article</button> --}}
                        
                </div>

                

              


    </form>
</div>

@endSection

@push('userfoot')
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
</script>

@endpush