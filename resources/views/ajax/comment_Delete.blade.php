<script>
      /*COMMENT DELETE*/
      $(document).on("click","#comment-delete{{$c->id}}",function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          var comment_id = '{{ $c->id }}';         
          $.ajax({
            type: 'POST',
            data: {comment_id:comment_id},
            success: function(msg) { 
            $('#comment-row{{$c->id}}').fadeTo('medium', 0).slideUp();
            },
            url: "{{route('post.comment.delete')}}",
            cache:false
          });
        });
</script>