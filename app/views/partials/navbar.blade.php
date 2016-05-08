<div class="container">
{{--     <div class = "col-xs-12">
        <div class = "col-xs-4"></div>
        <div class = "col-xs-4">
            
        </div>
        <div class = "col-xs-4"></div>
    </div> --}}
            <!-- Collect the nav links, forms, and other content for toggling -->

    <nav class="navbar">
        <div class="navbar-inner">
            <div class="collapse navbar-collapse" id="navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{{ action('HomeController@ourStory') }}}">Our Story</a></li>
                    <li><a href="{{{action('PostsController@index')}}}">Education</a></li>
                    <li><a href="/events">Events</a></li>
                    <li>{{-- <a href="{{{action('HomeController@homePage')}}}"> --}}<img src="/images/logo-navbar.svg" id = "logo" class="img-responsive" alt="Talking Tree Farm" height="auto" width="200"></a></li>
                    <li><a href="{{{action('ProductsController@index')}}}">Order a Basket</a></li>
                    <li><a href="{{{action('HomeController@contact')}}}">Contact</a></li>
                    <li>
                    @if (Auth::check()&& Auth::user()->isAdmin())
                            <a id="drop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{{ Auth::user()->first_name . '\'s Profile' }}}<span class="caret"></span></a>
                            <ul id="menu" class="dropdown-menu" aria-labelledby="drop">
                                <li><a href="{{{ action('ProductsController@inventory')}}}"><i class="fa fa-leaf" aria-hidden="true"></i></i>&nbsp;Manage Inventory</a></li>
                                <li><a href="{{{ action('OrdersController@index')}}}"><i class="fa fa-shopping-cart"></i>&nbsp;View Orders</a></li>
                                <li><a href="{{{ action('PostsController@index', Auth::user()->id)}}}"><i class="fa fa-rss" aria-hidden="true"></i>&nbsp;Manage Blog</a></li>
                                <li><a href="{{{ action('UsersController@userProfile', Auth::user()->id) }}}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Profile</a></li>
                                <li><a href="{{{ action('UsersController@getLogout', Auth::user()->id) }}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                            </ul>
                    @elseif (Auth::check())
                            <a id="drop" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{{ Auth::user()->first_name . '\'s Profile' }}}<span class="caret"></span></a>
                            <ul id="menu" class="dropdown-menu pull-right" aria-labelledby="drop">
                                <li><a href="{{{ action('OrdersController@index', Auth::user()->id) }}}"><i class="fa fa-shopping-cart"></i>&nbsp;My Orders</a></li>
                                <li><a href="{{{ action('UsersController@userProfile', Auth::user()->id) }}}"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;My Profile</a></li>
                                <li><a href="{{{ action('UsersController@edit', Auth::user()->id) }}}"><i class="fa fa-pencil" aria-hidden="true"></i></i>&nbsp;Edit Profile</a></li>
                                <li><a href="{{{ action('UsersController@getLogout', Auth::user()->id) }}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                            </ul>
                    @else
                        <li><a href="{{{ action('UsersController@doLogin') }}}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</span></a></li>
                    @endif
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.navbar inner -->
    </nav>
</div>
