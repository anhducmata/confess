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

                                @if ( $a->privacy === 0)
                                <a id="popover-privacy{{$a->id}}" tabindex="0" class="popover-privacy" data-html="true" data-toggle="popover{{$a->id}}" data-trigger="focus" title="Riêng Tư" data-content='<a id="privacy{{$a->id}}" style="text-decoration: none; color: #333;font-size: 12px;" class="e"  title=""><i class="fa fa-globe cope"></i><i class="fa fa-exchange" aria-hidden="true"></i><i class="fa fa-lock cope"></i></a>'><i id="privacyicon{{$a->id}}" class="fa fa-lock cope"></i></a>
                                

                                @else
                                @if ( $a->privacy === 1)
                                <a id="popover-privacy{{$a->id}}" tabindex="0" class="popover-privacy" data-html="true" data-toggle="popover{{$a->id}}" data-trigger="focus" title="Riêng Tư" data-content='<a id="privacy{{$a->id}}" style="text-decoration: none; color: #333;font-size: 12px;" class="e"  title=""><i class="fa fa-lock cope"></i><i class="fa fa-exchange" aria-hidden="true"></i><i class="fa fa-globe cope"></i></a>'><i id="privacyicon{{$a->id}}" class="fa fa-globe cope"></i></a>
                                
                                @endif
                                
                                @endif
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
                                
                                </<i></i>
                            </div>
                        </div>
                        <div class="post-description">
                            <p class="content">{{ $a->body }}</p>
                            <div class="stats">
                                <a href="#" class="btn btn-default stat-item"  style="border-color: #fff;">
                                    <i class="fa fa-heart" aria-hidden="true" 
                                    @if ($a->like->contains('user_id',Auth::user()->id))
                                        style="color: #F22EBE;" 
                                    @endif></i>
                                    {{ $a->like->count() }}
                                </a>
                                <a href="#" class="btn btn-default stat-item " style="border-color: #fff;" >
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    {{ $a->comment->count() }}
                                </a>
                                <a href="#" class="btn btn-default stat-item " style="border-color: #fff;" >
                                    <i class="fa fa-share-alt" aria-hidden="true" ></i>
                                    {{ $a->share->count() }}
                                </a>
                                
                                <a  href="" title="" style="font-size: 13.5px;">
                                </a>
                                
                            </div>
                        </div>
                        <div class="post-footer">
                            <ul class="comments-list second{{$a->id}}" id="comment-list{{$a->id}}">
                                @foreach ($a->comment as $c)


                                @include('ajax.comment_Delete')
                                @include('ajax.comment_Like')


                                <li class="comment" id="comment-row{{$c->id}}">
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
                                            <a class="link" onclick="showElem{{$a->id}}()" title="" id="comment-reply">Trả lời</a> ·
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
                                {!! Form::text('body', null, ['id' => 'body'.$a->id ,'class' => 'form-control', 'placeholder'=> 'Bình luận', 'autocomplete' => 'off']) !!}
                                {!! Form::submit('submit', ['style' => 'display: none']) !!}
                                <script>
                                $( 'form#addcomment{{$a->id}}' ).submit(function(e) {
                                e.preventDefault();
                                var user_id = $('#user_id').val();
                                var body = $('#body{{$a->id}}').val();
                                var status_id = $('#status_id{{$a->id}}').val();
                                
                                $.ajax({
                                type: "POST",
                                url: "{{route('post.comment.create')}}",
                                data: {user_id:user_id, body:body, status_id:status_id},
                                success: function( data ) {
                                $("#comment-list{{$a->id}}").load(location.href + " #comment-list{{$a->id}}");
                                $('input#body{{$a->id}}').val('');
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

<div class="row">
    <div class="paginate">
        {!! $statuses->render() !!}
    </div>
</div>

@endsection