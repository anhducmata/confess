@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" id="content">
            @include('partials.post')
            
            <div id="news" style="display: none; opacity:0.8">
                <div class='alert alert-success'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <strong>Nice ! {{Auth::user()->name}}</strong> Your post was successfully published ...
                </div>
            </div>
            <div class="statuslist" id="statuslist">
                @foreach($statuses as $a)
                <div class="panel panel-white post panel-shadow" id="post_panel{{$a->id}}" onmouseover="document.getElementById('dropbtn{{$a->id}}').style.opacity = '0.9';" onmouseleave="document.getElementById('dropbtn{{$a->id}}').style.opacity = '0.05';">
                    <div class="reload" id="reload{{$a->id}}">
                        <div class="post-heading">
                            <div class="pull-left image">
                                
                                <img src="{{ $a->user->avatar }}" class="img-circle avatar" alt="user profile image">
                                
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="{{ url('/user/'. $a->user_id) }}"><b> {{ $a->user->name }} </b></a>
                                </div>
                                {{-- must '==='  --}}
                                <h6 class="text-muted time">
                                <i class="fa fa-clock-o" title="{{$a->created_at }}" aria-hidden="true"></i>
                                <i class="cope">{{ $a->timeAgo($a->created_at) }}</i>
                                </h6>
                            </div>
                            <div class="option pull-right" align="right">
                                <i class="fa fa-chevron-down pagerLink dropbtn" id="dropbtn{{$a->id}}" onclick="myFunction{{$a->id}}()" aria-hidden="true" area-expanded= "false" >
                                
                                <div id="myDropdown{{$a->id}}" class="dropdown-content">
                                    
                                    
                                    @if ($a->user_id  == Auth::user()->id)
                                    <a id='delete{{$a->id}}' > Xóa</a>
                                    @else
                                    <a id='hide{{$a->id}}' > Ẩn bài viết</a>
                                    @endif
                                    
                                    @include('partials.script')
                                    <hr style="margin: 0px!important">
                                    
                                </div>
                                
                                </i>
                            </div>
                        </div>
                        <div class="post-description" id="post-description{{$a->id}}">
                            <p class="content">{{ $a->body }}</p>
                            <hr style="margin-bottom: 0px!important;">
                        <script>
                            $(document).on('click', '#liking{{$a->id}}', function(){
                                          $.ajaxSetup({
                                              headers: {
                                                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                              }
                                          });
                                          var status_id = '{{ $a->id }}';
                                          var user_id = '{{ Auth::user()->id}}';
                                          $.ajax({
                                            type: 'POST',
                                            data: {status_id:status_id, user_id:user_id},
                                            success: function(msg) {
                                                $("#reload-like{{$a->id}}").load(location.href + " #reload-like{{$a->id}}");
                                            },
                                            url: "{{route('post.status.like')}}",
                                            cache:false
                                          });
                            });
                        </script>
                        <div id="reload-like{{$a->id}}">
                            <div class="stats">
                                <i  class="btn btn-default stat-item" id="liking{{$a->id}}"  style="border-color: #fff;padding-right: 0px!important;">
                                    <img src="/images/like.png" style="width: 16px; height: 16px;" aria-hidden="true" 
                                    @if ($a->like->contains('user_id',Auth::user()->id))
                                        style="color: #F22EBE;" 
                                    @endif></img>
                                </i>
                                <label id="liking{{$a->id}}" class="label-style">
                                @if ($a->like->contains('user_id', Auth::user()->id))
                                    Bỏ thích
                                @else
                                    Thích
                                @endif
                                </label>

                                <a href="#" class="btn btn-default stat-item" style="border-color: #fff;margin-left: 50px;    padding-right: 0px;" >
                                    <img src="/images/comment.png" style="width: 16px; height: 16px; margin-top: 3px;" aria-hidden="true" ></img>
                                </a>
                                <label for="body{{$a->id}}" class="label-style">Bình luận</label>


                                <a href="#" class="btn btn-default stat-item " style="border-color: #fff; margin-left: 60px;    padding-right: 0px;" >
                                    <img src="/images/share.png" style="width: 14px; height: 14px; margin-top: 3px;" aria-hidden="true" ></img>   

                                </a><label class="label-style" class="label-style">Chia sẻ</label>
                               
                            </div>
                            <div id="result-like-stat{{$a->id}}" style="width: 0px!important;">
                    @if ($a->like->contains('user_id', Auth::user()->id))
                        @if ($a->like->count() == 1)
                        <hr style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="stat-info ">
                            <a  class="like-result">
                                <img src="images/thumbs-up.png" class="like-result-image"  alt="">
                                Bạn đã thích bài viết này !
                            </a>
                        </div>
                        @else
                        <hr style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="stat-info ">
                            <a  class="like-result">
                                <img src="images/thumbs-up.png" class="like-result-image"  alt="">
                                    Bạn và {{$a->like->count()-1}} người đã thích bài viết này !
                            </a>
                        </div>

                        @endif                    
                    @else
                        @if ($a->like->count() == 0)
                            
                        @else
                         <hr style="margin-top: 0px;margin-bottom: 0px;">
                        <div class="stat-info ">
                        <a  class="like-result">
                        <img src="images/thumbs-up.png" class="like-result-image"  alt="">
                        {{$a->like->count()}} người đã thích bài viết này
                        
                        </a>
                        </div>
                
                        @endif
                    @endif
                    </div>  
                    </div>
                        </div>

                        <div class="post-footer" style="padding-top: 22px;">
                            <ul class="comments-list second{{$a->id}}" id="comment-list{{$a->id}}">
                                @foreach ($a->comment as $c)

                                <li class="comment" id="comment-row{{$c->id}}">

                                @include('ajax.comment_Delete')
                                @include('ajax.comment_Like')
                                    <a class="pull-left" href="#">
                                        <img class="avatar" src="{{  $c->user->avatar  }}" alt="avatar">
                                    </a>
                                    <div class="comment-body">
                                        <div class="comment-heading">
                                            <a href="{{  url('/user/'. $c->user->id)  }}" title=""><h4 class="user">
                                                {{ $c->user->name }}
                                            </h4></a>·
                                            <p class="inline">{{ $c->body }}</p>
                                            
                                        </div>
                                        <div class="comment-heading" link="blue" id="comment-heading">
                                        @if ($c->commentlike->contains('user_id',Auth::user()->id))
                                            <a class="link"   title="" id="comment-unlike{{$c->id}}">Bỏ thích</a> ·
                                        @else 
                                            <a class="link"   title="" id="comment-like{{$c->id}}">Thích</a> ·
                                        @endif
                                            <a class="link"  title="" id="comment-reply">Trả lời</a> ·
                                             @if ($c->user_id == Auth::user()->id)
                                            <a class="link" id="comment-delete{{$c->id}}" title="Delete">Xóa</a> · 
                                            @endif
                                            @if ($c->commentlike->count() > 0)
                                                <i class="fa fa-thumbs-o-up" style="font-size: 12px;" aria-hidden="true">
                                                {{ $c->commentlike->count()}}  ·
                                            @endif</i> 
                                            <h5 class="time">{{ $c->status->timeAgo($c->created_at) }}</h5>
                                        </div>
                                    </div>
                                    <ul class="comments-list">
                                        @foreach ($c->replyComment as $rc)
                                        <li class="comment" >
                                            <div class="feeds">
                                                <a class="pull-left" href="#" >
                                                    <img class="avatar" src="{{ $rc->user->avatar }}" alt="avatar">
                                                </a>
                                                <div class="comment-body" >
                                                    <div class="comment-heading">
                                                        <a href="{{  url('/user/'. $rc->user->id)  }}" title=""><h4 class="user">{{$rc->user->name }}</h4></a>·
                                                        <p class="inline">{{ $rc->body }}</p>
                                                    </div>
                                                    <div class="comment-heading" link="blue">
                                                         <div class="comment-heading" link="blue" id="comment-heading">
                                                     @if ($rc->replycommentlike->contains('user_id',Auth::user()->id))
                                                     <a class="link"  href="" title="Bỏ thích bình luận này" id="replycomment-unlike">Bỏ thích</a> ·
                                                     @else 
                                                     <a class="link"  id="replycomment-like" title="Thích bình luận này">Thích</a> ·
                                                     @endif
                                                       
                                                        <a class="link"  onclick="" title="">Trả lời</a> ·
                                                        @if ($rc->user_id == Auth::user()->id)
                                                            <a class="link" id="replycomment-delete{{$rc->id}}" title="Delete">Xóa</a> · 
                                                        @endif
                                                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>  · 
                                                        <h5 class="time">{{ $c->status->timeAgo($c->created_at) }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-heading" style="    padding: 6px 0px 10px 50px;">
                                                
                                                
                                                <input name="comment" class="form-control" type="text" id="input{{$a->id}}" placeholder="Viết Trả Lời..." style="height: 25px !important; display:none;">
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            <div class="input-group comments-box">
                                {!! Form::open(array('url' => route('post.comment.create'), 'method' => 'POST', 'id' => "addcomment".$a->id)) !!}
                                {{-- <input class="form-control"  autocomplete="off" id="comments" placeholder="Viết bình luận..." type="text"> --}}
                                {!! Form::hidden('user_id', Auth::user()->id, ['id' => 'user_id']) !!}
                                {!! Form::hidden('status_id', $a->id, ['id' => 'status_id'.$a->id]) !!}
                                <img src="{{Auth::user()->avatar}}" style="width: 25px;
                                                                            height: 25px;
                                                                            position: absolute;
                                                                            border-radius: 3px;
                                                                            top: 3px;
                                                                            z-index: 999;
                                                                            left: 3px;" alt="">
                                {!! Form::text('body', null, ['id' => 'body'.$a->id ,'class' => 'form-control', 'placeholder'=> 'Bình luận...', 'autocomplete' => 'off', 'style' => 'height: 25px;border-radius: 2px!important;    height: 32px;
                                    border-radius: 3px!important;
                                    padding-left: 40px;']) !!}
                                {!! Form::submit('submit', ['style' => 'display: none']) !!}
                                <script>
                                $( 'form#addcomment{{$a->id}}' ).submit(function(e) {
                                e.preventDefault();
                                var user_id = $('#user_id').val();
                                var body = $('#body{{$a->id}}').val();
                                var status_id = $('#status_id{{$a->id}}').val();

                                var comment_block = '<li class="comment" id="comment-row"> <a class="pull-left" href="#"> <img class="avatar" src="{{ Auth::user()->avatar }}" alt="avatar"> </a> <div class="comment-body"> <div class="comment-heading"> <a href="{{ url('/user/'. Auth::user()->id) }}" title=""><h4 class="user"> {{  Auth::user()->name }} </h4></a>· <p class="inline">'+body+'</p> </div> <div class="comment-heading" link="blue" id="comment-heading"><a class="link" title="" id="comment-reply">Trả lời</a> · <a class="link" id="comment-delete" title="Delete">Xóa</a> · </i> <h5 class="time"> vừa xong </h5> </div> </div> </li>';
                                $('#comment-list{{$a->id}}').append(comment_block);
                                $('input#body{{$a->id}}').val('');
                                $.ajax({
                                type: "POST",
                                url: "{{route('post.comment.create')}}",
                                data: {user_id:user_id, body:body, status_id:status_id},
                                success: function( data ) {
                                $("#comment-list{{$a->id}}").load(location.href + " #comment-list{{$a->id}}");
                                    }
                                });
                                });
                                </script>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
  <script>
    var auto_refresh = setInterval(
    function (){
        $("#comment-list{{$a->id}}").load(location.href + " #comment-list{{$a->id}}");
    }, 60000); // refresh every 10000 milliseconds
  </script>
<div class="row">
    <div class="paginate">
        {!! $statuses->render() !!}
    </div>
</div>

@endsection