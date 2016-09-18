 <div class="row">
                                      
            <!-- Nav tabs --><div class="card">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="border: 1px;">What's Up {{Auth::user()->name}}</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Ảnh / Video</a></li>
            </ul>

            <!-- FORM -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home"> 
                {{ Form::open(array('method'=>'post','url' => route('post.status'), 'id'=>'statusBox')) }}
            <div class="panel-body ">
                   {{ Form::token() }}
                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                    {{Form::textarea('status', null, array('class'=>'form-control status', 'id'=>'body', 'name'=>'status', 'rows'=>'3'))}}
                            <script>
                                    jQuery.each(jQuery('textarea[data-autoresize]'), function() {
                                    var offset = this.offsetHeight - this.clientHeight;
                                 
                                    var resizeTextarea = function(el) {
                                        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
                                    };
                                    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
                                });
                            </script>
            </div>
            <div class="panel-footer share-buttons borderRoundBottom">
            <span class="pull-left" id="loading" style="display: none">
                    <div class="cssload-container">
                    <div class="cssload-zenith"></div>
                </div>
            
                
            </span>
                <span class="pull-right">
                
                    <select name="privacy" class="privacy" id="privacy">
                        <option value="0" >Chỉ mình tôi</option>
                        <option value="1" >Công Khai</option>
                        <option value="2" >Bạn Bè</option>
                        <option value="3" >Ngoại trừ Bạn Bè</option>
                        <option value="4" id='privacy_custom' >Tùy chỉnh</option>
                        <option value="5" id='privacy_custom' >Anonymous</option>                         
                    </select>
                    
                    {{Form::submit('Post', array('name'=>'submit', 'class'=>'btn btn-sm btn-success post-submit'))}}
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  </script>
<script>
       $( '#statusBox' ).on( 'submit', function(e) {
        e.preventDefault();
        $('#news').fadeIn();
         $('#loading').show();
      var user_id = $('#user_id').val();
      var body = $('#body').val();
      var privacy = $('#privacy').val();
      $.ajax({
            type: "POST",
            url: "{{route('post.status')}}",
            data: {user_id:user_id, body:body, privacy:privacy},
            success: function( data ) {
            $('#loading').fadeOut(1000);
            var $s = $(".alert");
            $("#news").css('display', 'block').fadeTo(4000, 1000).slideUp();
            $('#body').val('');
            $("#statuslist").load(location.href + " #statuslist").fadeIn('slow');            }
        });

        
   });
</script>
                </span>
            </div>
            {{ Form::close() }}</div>
                <div role="tabpanel" class="tab-pane" id="profile" style="    height: 156px;">
                <div class="panel-body ">
                    {{Form::textarea('status', null, array('class'=>'form-control status', 'id'=>'body', 'name'=>'status', 'rows'=>'3'))}}
                    </div>
            <div class="panel-footer share-buttons borderRoundBottom">
                <span class="pull-right">
                 <script>
                                    jQuery.each(jQuery('textarea[data-autoresize]'), function() {
                                    var offset = this.offsetHeight - this.clientHeight;
                                 
                                    var resizeTextarea = function(el) {
                                        jQuery(el).css('height', 'auto').css('height', el.scrollHeight + offset);
                                    };
                                    jQuery(this).on('keyup input', function() { resizeTextarea(this); }).removeAttr('data-autoresize');
                                });
                            </script>
                 {{Form::submit('Post', array('name'=>'submit', 'class'=>'btn btn-sm btn-success post-submit'))}}
                 </span>
                
                </div>
                </div>
                </div>
            </div>
    </div>
