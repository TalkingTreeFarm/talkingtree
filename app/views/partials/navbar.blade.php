
<div class="container">
    <h1 class="header">Talking Tree Farm</h1>


            <!-- Collect the nav links, forms, and other content for toggling -->
    
    <nav class="navbar">
        <div class="navbar-inner">        
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#story">Our Story</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#education">Education</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#events">Events</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#basket">Order a Basket</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#basket">Contact</a>
                    </li>
                    @if (Auth::check()) 
                        <li><a href="{{{ action('UsersController@show', Auth::id()) }}}">User</a></li>
                        <li><a href="{{{ action('PostsController@create') }}}">Create</a></li>
                        <li><a href="{{{ action('UsersController@getLogout') }}}">Logout</a></li>
                    @else
                        <li><a href="{{{ action('UsersController@doLogin') }}}">Login</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

