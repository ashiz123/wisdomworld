

@extends('Admin.layouts.master')
@include('Admin.layouts.navigation')
@include('Admin.layouts.sidebar')
@include('Admin.layouts.footer')


@section('title')
    IMS
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <h1>Admin</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
