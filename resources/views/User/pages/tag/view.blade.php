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
            
            <h3> <strong>Follow the tags</strong> </h3>
             @forelse($unTagged as $unTag)
             <form action="{{route('tag.store',  $unTag->id)}}" method="post" class="ajax">
             @csrf
                 <button class="btn btn-primary btn-sm" style="vertical-align:top; float:left; margin:5px;" type="submit">
                         {{$unTag->tag}}
                  </button>
          </form>
          @empty
         
          @endforelse
    </div>

  
    <br><br>
    <div class="row">
            <h4 style="color:gray"><strong></strong>You tagged</h4>
            @forelse($userTags as $userTag)
            {{-- <button class="btn btn-primary btn-sm" style="vertical-align:top; float:left; margin:5px;">
                    {{$userTag->tag()}}
             </button> --}}

             <form action="{{route('tag.remove',  $userTag->id)}}" method="post" class="ajax">
                    @csrf
                        <button class="btn btn-danger btn-sm" style="vertical-align:top; float:left; margin:5px;" type="submit">
                                {{$userTag->tag()}}
                         </button>
                 </form>
             @empty
             @endforelse
    </div>

<a href="{{route('welcome')}}" class="btn btn-primary"  style="float:right">Skip</a>

    
</div>




   
@endsection

      