<script>
      /*COMMENT DELETE*/
      $(document).on("click","#comment-delete{{$c->id}}",function() {

          $('#comment-row{{$c->id}}').fadeTo('fast', 0).slideUp();
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
            },
            url: "{{route('post.comment.delete')}}",
            cache:false
          });
        });
</script>