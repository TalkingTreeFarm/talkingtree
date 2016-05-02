
<div class="container">
    <h1 class="header"><a href="{{{action('HomeController@homePage')}}}">Talking Tree Farm</a></h1>


            <!-- Collect the nav links, forms, and other content for toggling -->
    
    <nav class="navbar">
        <div class="navbar-inner">        
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li><a href="/our_story">Our Story</a></li>
                    <li><a href="{{{action('PostsController@index')}}}">Education</a></li>
                    <li><a href="/events">Events</a></li>
                    <li><a href="{{{action('ProductsController@index')}}}">Order a Basket</a></li>
                    <li><a href="#footer">Contact</a></li>
                    @if (Auth::user()->role_id==1)
                        <li>
                            <a id="drop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{{ Auth::user()->first_name . '\'s Profile' }}}<span class="caret"></span></a>
                            <ul id="menu" class="dropdown-menu" aria-labelledby="drop">
                                <li><a href="{{{ action('ProductsController@edit', Auth::user()->id) }}}"><i class="fa fa-shopping-cart"></i>&nbsp;Manage Inventory</a></li>
                                <li><a href="{{{ action('PostsController@edit', Auth::user()->id) }}}"><i class="fa fa-rss" aria-hidden="true"></i>&nbsp;Manage Blog</a></li>
                                <li><a href="{{{ action('UsersController@show', Auth::user()->id) }}}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Profile</a></li>
                                <li><a href="{{{ action('UsersController@edit', Auth::user()->id) }}}"><i class="fa fa-pencil" aria-hidden="true"></i></i>&nbsp;Edit Profile</a></li>
                                <li><a href="{{{ action('UsersController@getLogout', Auth::user()->id) }}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                            </ul> 
                    @elseif (Auth::user()->role_id==2)                         
                            <a id="drop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{{ Auth::user()->first_name . '\'s Profile' }}}<span class="caret"></span></a>
                            <ul id="menu" class="dropdown-menu" aria-labelledby="drop">
                                <li><a href="{{{ action('OrdersController@index', Auth::user()->id) }}}"><i class="fa fa-shopping-cart"></i>&nbsp;My Orders</a></li>
                                <li><a href="{{{ action('UsersController@show', Auth::user()->id) }}}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Profile</a></li>
                                <li><a href="{{{ action('UsersController@edit', Auth::user()->id) }}}"><i class="fa fa-pencil" aria-hidden="true"></i></i>&nbsp;Edit Profile</a></li>
                                <li><a href="{{{ action('UsersController@getLogout', Auth::user()->id) }}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                            </ul> 
                    @else
                        <li><a href="{{{ action('UsersController@doLogin') }}}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</span></a></li>
                    @endif
                        </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>

