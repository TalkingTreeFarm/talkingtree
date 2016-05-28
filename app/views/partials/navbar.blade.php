<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-inner">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                &#9776;
            </button>
        </div>
            <div class="collapse navbar-collapse" id="#bs-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/" class="visible-xs visible-sm">Home</a></li>
                    <li><a href="{{{ action('HomeController@ourStory') }}}">Our Story</a></li>
                    <li><a href="{{{action('PostsController@index')}}}">Education</a></li>
                    <li><a href="/events">Events</a></li>
                    <li><a href="/"><img src="/images/logo-navbar.svg" id = "logo" class="img-responsive hidden-xs hidden-sm" alt="Talking Tree Farm" ></a><li>
                    <li><a href="{{{action('ProductsController@index')}}}">Order a Basket</a></li>
                    <li><a href="{{{action('HomeController@contact')}}}">Contact</a></li>
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
                            <li><a href="{{{ action('UsersController@getLogout', Auth::user()->id) }}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;Logout</a></li>
                        </ul>
                    @else
                        <li><a href="{{{ action('UsersController@doLogin') }}}"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</span></a></li>
                    @endif
                    </li>
                </ul>
            </div>
    </nav>
</div>