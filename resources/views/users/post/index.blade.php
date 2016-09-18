@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
           @foreach($posts as $a)
         <div class="panel panel-white post panel-shadow">

            <div class="post-heading">

                <div class="pull-left image">
                    <img src="{{ $a->uavatar }}" class="img-circle avatar" alt="user profile image">
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="{{ url('/user/'. $a->uid) }}"><b> {{ $a->uname }} </b></a> <i class="fa fa-pencil" aria-hidden="true"></i> <a href="{{ url('/posts/'. $a->id) }}" title="{{ $a->title }}">{{ $a->title }}</a>
                    </div>
                    <h6 class="text-muted time"><i class="fa fa-globe cope" aria-hidden="true"></i><i class="cope">{{ $controller->timeAgo($a->created_at) }}</i>
                         @if ($a->tags != null)
                    {{-- <i class="fa fa-hashtag cope" aria-hidden="true"></i> --}}
                    @foreach(explode(',',$a->tags) as $value) {{--  --}}
                    <a href="{{ url('/user/'. $value) }}" class="tags" title="">
                    {{ $controller->GetName($value)['0']->name }} {{-- get variable form array--}}
                    </a>
                    @endforeach
                    @endif  
                    </h6>
                   
                </div>
                <div class="option pull-right" align="right">
                    <a class="fa fa-chevron-down pagerLink" aria-hidden="true" area-expanded= "false" ></a>

                </div>
            </div> 
            <div class="post-description"> 
                <p>{{ $a->content }}</p>

                <div class="stats">
                    <a href="#" class="btn btn-default stat-item"  style="border-color: #fff;"> 
                        <img src="/images/like.png" alt="" width="20" height="20"> {{ ' '.sizeof(explode(',', $a->liked)) }}
                    </a>
                    <a href="#" class="btn btn-default stat-item " style="border-color: #fff;" >
                        <img src="/images/comment.png" alt="" width="20" height="20">{{ ' '.sizeof(explode(',', $a->comment)) }}
                    </a>
                    <a href="#" class="btn btn-default stat-item " style="border-color: #fff;" >
                        <img src="/images/share.png" alt="" width="20" height="20">{{ ' '.sizeof(explode(',', $a->shared)) }}
                    </a>
                   
                    <a  href="" title="" style="font-size: 13.5px;">
                     <?php  
                        $arr = explode(',',$a->liked);
                         echo $controller->GetName(end($arr))['0']->name;
                    ?>
                     và {{ sizeof(explode(',', $a->comment))  + sizeof(explode(',', $a->liked)) + sizeof(explode(',', $a->shared)) - 1 }} người khác
                    </a>
                   
                </div>
            </div>
            <div class="post-footer">
                <div class="input-group">
                    {!! Form::open() !!}
                        <input class="form-control"  autocomplete="off" id="comments" placeholder="Viết bình luận..." type="text">
                    {!! Form::close() !!}
                    <script type="text/javascript" charset="utf-8" async defer>
                        $(document).ready(function(){
                            $('#comments').focus();
                            $('#comments').keypress(function(event){
                                var key = (event.keyCode ? event.keyCode : event.which);
                                if (key = 13 ) {
                                    var info = $('#comments').val();
                                    $.ajax({
                                        method: "POST",
                                        url: "/home".
                                        data: {name: info},
                                        success :function(status){
                                            $('#result').append($status);
                                            $('#result').val('');
                                        }
                                    });
                                };
                            });
                        });
                    </script>


                </div>
                <ul class="comments-list">
                    <li class="comment">
                        <a class="pull-left" href="#">
                            <img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
                        </a>
                        <div class="comment-body">
                            <div class="comment-heading">
                                <h4 class="user">Gavino Free</h4>
                                
                            </div>
                            <h5 class="time">5 minutes ago</h5>
                        </div>
                        <ul class="comments-list">
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="http://bootdey.com/img/Content/user_3.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">Ryan Haywood</h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p>Relax my friend</p>
                                </div>
                            </li> 
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="http://bootdey.com/img/Content/user_2.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    <div class="comment-heading">
                                        <h4 class="user">Gavino Free</h4>
                                        <h5 class="time">3 minutes ago</h5>
                                    </div>
                                    <p>Ok, cool.</p>
                                </div>
                            </li> 
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    @endforeach
        </div>
    </div>
</div>
@endsection
