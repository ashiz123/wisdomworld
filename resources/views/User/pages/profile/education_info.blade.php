
    @extends('User.layouts.master')
    @include('User.layouts.navigation')
    @include('User.layouts.header')
    @include('User.layouts.footer')
    
    
    @section('title')
        IMS
    @endsection
    
    @section('content')
    
    <div class="container">
        <div class="profile_card">
                <h3>Qualification and skill</h3>
            <br>
                <form action="{{route('education_info.store',  ['name' => Auth::user()->name]) }}" method="post">
                        {{ csrf_field() }}
                                <div class="row" style="margin-bottom:10px;">
                                  <div class="col-md-6">
                                      <label for="highest_level">Highest level</label>
                                    <input type="text" name="highest_level" class="form-control" placeholder="Highest study level">
                                  </div>
                                  <div class="col-md-6">
                                        <label for="main_subject">Main subject</label>
                                    <input type="text" name="main_subject" class="form-control" placeholder="Enter your main subject">
                                  </div>
                                </div>

                                <div class="row" style="margin-bottom:10px;">
                                    <div class="col-md-6">
                                        <label for="Skills">Skills</label>
                                      <input type="text" name="skills" class="form-control" placeholder="skills">
                                    </div>
                                    <div class="col-md-6">
                                          <label for="completion_on">Completion on</label>
                                      <input type="date" name="completion_on" class="form-control" placeholder="Enter your completion date">
                                    </div>
                                  </div>

                                 
    
                                {{-- <div class="row">
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                </div> --}}
    
                                
                              
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Create education info</button>
                </div>
            </form>
        </div>
        </div>
          @endsection
   