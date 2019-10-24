
@section('navigation')
<nav class="navbar navbar-default nav-blue">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      <a class="navbar-brand" href="{{route('welcome')}}">Wisdom World</a>
      </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        <li><a href="{{ route('tag.show')}}">Tags <span class="sr-only">(current)</span></a></li>
          {{-- <li><a href="#">Article</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li> --}}
        </ul>
       
        <form class="ajax navbar-form navbar-left" action="{{route('filter.index')}}" id="formFilter" method="get"  >
          <div class="form-group">
            <input type="text" class="form-control" name="filter" placeholder="Search" id="filter">
           </div>
        </form>


        <ul class=" nav navbar-nav navbar-right" >
            @if (Route::has('login'))
                {{-- <div class="top-right links"> --}}
                    @auth
                    @if(isset($userInfo))
                    <li style="margin-left:5px">
                    {{-- <a href="{{route('profile', ['name' => Auth::user()->name])}}" ><img src="{{ get_image_path('profile', $userInfo->image)}}" class="img-circle" style="
                      width:30px; height:30px; overflow:hidden"> </a> --}}
                    </li>

                    <li class="dropdown">
                     <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="{{route('profile', ['name' => Auth::user()->name])}}" ><img src="{{ get_image_path('profile', $userInfo->image)}}" class="img-circle" style="
                            width:30px; height:30px; overflow:hidden; margin-right:-25px;"> </a>
                        <ul class="dropdown-menu" style="margin-right:-100px;">
                        <li><a href="{{route('profile', ['name' => Auth::user()->name])}}" style="color:blue">{{Auth::user()->name}}'s Profile</a></li>
                        <li><a href="{{route('post.create')}}">Create Article</a></li>
                        <li><a href="#">Articles</a></li>
                        <li><a href="#">Notifications</a></li>
                        {{-- <li><a href="#">Settings</a></li> --}}
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Logout</a></li>
                      </ul>
                    </li>
                    @endIf

                   

                    <li class="pull-right" style="margin-left:5px">
                        <a  href="{{ route('admin.logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                        
                    @else
                    <li>
                        <a href="{{ route('login') }}" style="margin-left:5px">Login</a>
                    </li>
                        

                        @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" style="margin-left:5px">Register</a>
                        </li>
                            
                        @endif
                    @endauth
                {{-- </div> --}}
            @endif
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  @endsection


  

  @push('userfoot')
  {{-- <script>

  $('#filter').keypress(function (e) {
    if (e.which == 13) {
      filterBy = $('#filter').val();
      
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });

        $.ajax({
            
            type     : "GET",
            cache    : false,
            url      : $('#formFilter').attr('action'),
            data     : {'filterBy': filterBy},
            success  : function(data) {

             console.log(data);

            }


             });
             return false; 
            }
  });

        
</script> --}}

 
  @endpush