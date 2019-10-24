

@extends('User.layouts.master')
@include('User.layouts.navigation')
@include('User.layouts.header')
@include('User.layouts.footer')


@section('title')
    IMS
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
        <div class="col-md-3">
          <h3 class="primary">My profile</h3>
         <p style="color:blue">joined on {{Auth::user()->created_at->format('Y')}} {{$month_name}}</p> 
           {{-- @if($basic_info == 0)
         <a href="" data-toggle="modal" data-target="#profileUpdate">Create Basic info</a>
          @else
          <a href="" data-toggle="modal" data-target="#profileUpdate">Update Basic info</a>  
          @endif --}}

          <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="{{route('timeline', ['name' => Auth::user()->name])}}">Timeline</a></li>
            <li role="presentation"><a href="#">About</a></li>
            <li role="presentation"><a href="#">Friends</a></li>
            <li role="presentation"><a href="#">Photos</a></li>
          </ul>
           
            @include('User.partial.profile_update_modal')
        </div>
        <div class="col-md-9">
            <div class="card">
                @yield('profile-container')
                {{-- <div class="card-header">User question</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ Auth::user()->name }}
                    You are logged in! <h1>home</h1>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
