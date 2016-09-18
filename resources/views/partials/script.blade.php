       @if ($a->user_id === Auth::user()->id)
      <script>
        $(function(){
        $("[data-toggle=popover{{$a->id}}]").popover();

        });
      </script>
  {{-- Ajax send request for action each status --}}

  <script>
      /*PRIVACY CHANGE*/
      
      var privacy = {{$a->privacy}};
      $(document).on("click","#privacy{{$a->id}}", function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          <?php 

          ?>
          if (privacy == 0) {
            var key = 1;
          }else{
            var key = 0;
          }
          var status_id = '{{ $a->id }}';  
               
          $.ajax({
            type: 'POST',
            data: {key:key, status_id:status_id},
            success: function(msg) { 
              
             $("#popover-privacy{{$a->id}}").load(location.href + " #popover-privacy{{$a->id}}");
             if (key === 1) {
                privacy = 1;
             }
             else{
              privacy = 0;
             }
             
            },
            url: "{{route('post.privacy')}}",
            cache:false
          });
        });
      </script>
      @endif
        <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function myFunction{{$a->id}}() {
            document.getElementById("myDropdown{{$a->id}}").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
      </script>
      <script>
      /*DELETE*/
      $(document).on("click","#delete{{$a->id}}",function() {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
          var status_id = '{{ $a->id }}';         
          $.ajax({
            type: 'POST',
            data: {status_id:status_id},
            success: function(msg) { 
            $('#post_panel{{$a->id}}').fadeTo('medium', 0).slideUp();
            },
            url: "{{route('post.delete')}}",
            cache:false
          });
        });
  </script>
  <script>
var auto_refresh = setInterval(
function ()
{
$("#comment-list{{$a->id}}").load(location.href + " #comment-list{{$a->id}}");
}, 100000000); // refresh every 10000 milliseconds
  </script>