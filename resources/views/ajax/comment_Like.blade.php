<script>
      $(document).on("click","#comment-like{{$c->id}}",function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          var comment_id = '{{ $c->id }}';
          var user_id = '{{ Auth::user()->id}}';
      
          $.ajax({
            type: 'POST',
            data: {comment_id:comment_id, user_id:user_id},
            success: function(msg) { 
              $("#comment-list{{$a->id}}").load(location.href + " #comment-list{{$a->id}}");
            },
            url: "{{route('post.comment.like')}}",
            cache:false
          });
        });
</script>
<script>
      $(document).on("click","#comment-unlike{{$c->id}}",function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          var comment_id = '{{ $c->id }}';
          var user_id = '{{ Auth::user()->id}}';         
          $.ajax({
            type: 'POST',
            data: {comment_id:comment_id, user_id:user_id},
            success: function(msg) { 
              $("#comment-list{{$a->id}}").load(location.href + " #comment-list{{$a->id}}");
            },
            url: "{{route('post.comment.unlike')}}",
            cache:false
          });
        });
</script>