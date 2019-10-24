
<form action="post">
<div class="form-group">
        <label for="exampleFormControlTextarea1">Write your question @auth ,{{ Auth::user()->name }}@endauth</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      <button type="submit" id="post" class="btn btn-primary btn-block mb-2" style="float:right; display:none;" >post</button>
</form>


@push('userfoot')
    <script>
        $("textarea").keyup(function () {
            
        if(!$('textarea').val())
        {
            $('#post').css("display", "none");
        }else
        {
            $('#post').css("display", "block",);
        }
        });
        
    </script>
@endpush