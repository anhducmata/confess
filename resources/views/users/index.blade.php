@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           @foreach($status as $a)
         <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left image">
          
                    <img src="{{ $user->avatar }}" class="img-circle avatar" alt="user profile image">
                
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="{{ url('/user/'. $user->id) }}"><b> {{ $user->name }} </b></a>
                    </div>
                    <h6 class="text-muted time">
                    @if ($a->privacy == 1)
                        <i class="fa fa-globe cope" aria-hidden="true"></i>
                    @else
                        <i class="fa fa-lock cope" aria-hidden="true"></i>
                    @endif
                    <i class="cope">{{ $a->timeAgo($a->created_at) }}</i>
                    </h6>
                </div>
                <div class="option pull-right" align="right">
                    <i class="fa fa-chevron-down pagerLink dropbtn" onclick="myFunction{{$a->id}}()" aria-hidden="true" area-expanded= "false" >
                          <div id="myDropdown{{$a->id}}" class="dropdown-content">
                            @if ($a->privacy == 1)
                            <a href="#home">Private bài viết</a>
                            @else
                            <a href="#home">Public bài viết</a>    
                            @endif
                            
                            <hr style="margin: 0px!important">
                            <a href="#about">Xoá bài viết </a>
                          </div>
                    </<i></i>
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
                </div>
            </div> 
            <div class="post-description"> 
                <p class="content">{{ $a->body }}</p>
                <div class="stats">
                    <a href="#" class="btn btn-default stat-item"  style="border-color: #fff;"> 
                       <i class="fa fa-heart" aria-hidden="true"></i>
                       {{ $a->like->count() }}
                      
                    </a>
                    <aa href="#" class="btn btn-default stat-item " style="border-color: #fff;" >
                       <i class="fa fa-comment" aria-hidden="true"></i>
                       {{ $a->comment->count() }}
                    </aa>
                        <script>
                        $("aa").click(function() {
                        $('html,body').animate({
                        scrollTop: $(".second{{$a->id}}").offset().top},
                        'slow');
                        });
                        </script>
                    <a href="#" class="btn btn-default stat-item " style="border-color: #fff;" >
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                    </a>
                   
                    <a  href="" title="" style="font-size: 13.5px;">
                     người khác
                    </a>
                   
                </div>
            </div>
            <div class="post-footer">

                <ul class="comments-list second{{$a->id}}">
                 @foreach ($a->comment as $c)
                    <li class="comment">
                        <a class="pull-left" href="#">
                             <img class="avatar" src="{{ $c->user->avatar }}" alt="avatar">
                        </a>

                        <div class="comment-body">
                            <div class="comment-heading">                    
                                <a href="{{  url('/user/'. $c->user->id)  }}" title=""><h4 class="user">{{$c->user->name }}</h4></a>·
                                <p class="inline">{{ $c->body }}</p>
                                <span><a class="fa fa-remove btn-remove" href="#" title="Delete"></a></span>
                            </div>
                            <div class="comment-heading" link="blue">
                                <a class="link"  href="" title="">Thích</a> ·
                                <a class="link" onclick="showElem{{$a->id}}()" title="">Trả lời</a> ·
                                <h5 class="time">{{ $c->status->timeAgo($c->created_at) }}</h5>  
                            </div>
                           
                            <script>
                                function showElem{{$a->id}}() {
                                    document.getElementById("input{{$a->id}}").style.display = "block";
                                    document.getElementById("input{{$a->id}}").value = '{{"@ $a->user_id"}}'
                                }
                            </script>
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
                                <span><a class="fa fa-remove btn-remove" href="#" title="Delete"></a></span>
                                </div>
                                <div class="comment-heading" link="blue">
                                <a class="link"  href="" title="">Thích</a> ·
                                <a class="link"  onclick="showElem{{$a->id}}()" title="">Trả lời</a> ·
                                <h5 class="time">{{ $rc->comment->status->timeAgo($c->created_at) }}</h5>  
                                </div>
                                </div>
                            </div>
                         <div class="comment-heading" style="    padding: 6px 0px 10px 50px;">
                                <input class="form-control" type="text" id="input{{$a->id}}" placeholder="Viết Trả Lời..." style="height: 25px !important; display:none;">
                            </div>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
                <div class="input-group">
                
                <input class="form-control"  autocomplete="off" id="comments" placeholder="Viết bình luận..." type="text">
                </div>
            </div>
        </div>
    @endforeach
        </div>
    </div>
</div>

    
<div class="row">
    <div class="paginate">
             {!! $status->render() !!}
    </div>
</div>
   

@endsection
