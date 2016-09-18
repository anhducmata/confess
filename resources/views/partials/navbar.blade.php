<nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand logo" href="{{ url('/') }}">
                    <img style="    width: 33px;
    height: 33px;" src="/images/logo.png" alt="">
                </a>
            </div>
        @if (Auth::check())
        <div class="col-md-5 search">
            <div class="form-group">
                <div class="icon-addon addon-sm">
                    <input type="text" placeholder="Tìm kiếm..." class="form-control" id="email">
                    <label for="email" class="fa fa-search" rel="tooltip" title="email"></label>
                </div>
            </div>
        </div>
        
        <div class="col-md-1" style="margin-top: 15px; margin-left: 10px; width: auto">
            <a href="{{ url('/user/'.Auth::user()->id)  }}" style="color: #fff; text-decoration: none;"  role="button" aria-expanded="false"><img class="avatar  avatar-nav" src="{{ Auth::user()->avatar }}" /> {{ Auth::user()->name }}
        </div>
        <div class="col-md-2 noti" >
        <a  title=""><img class="friend" src="/images/addfriend.png" alt=""></a>
        <a title="" style="padding-left: 10px; padding-right:  5px;"><img class="message" src="/images/message.png" alt=""></a>
        <a  title=""><img class="notification" src="/images/noti.png" alt=""></a>
        </div>
        @endif  
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" style="margin-left: auto" data-toggle="dropdown" role="button" aria-expanded="false"><span class="caret" style="color: #333; border-width: 6px;"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/user/'. Auth::user()->id) }}" title="">{{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>