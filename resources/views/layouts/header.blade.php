<header class="header animated headroom--not-bottom swingInX headroom--top" id="site-header">
        <div class="container">
                <div class="header-content-wrapper">
                    <div class="logo">
                        <div class="logo-text">
                            <div class="logo-title"><a href="{{url('/')}}" >LARAVEL'S BLOG</a></div>
                        </div>
                    </div>

                    <nav id="primary-menu" class="primary-menu primary-menu-responsive">
                        <a href="javascript:void(0)" id="menu-icon-trigger" class="menu-icon-trigger showhide" style="display: none;">
                            <span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: visible;">
                                <svg width="1000px" height="1000px">
                                    <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800" style="stroke-dashoffset: 5803.15; stroke-dasharray: 2901.57, 2981.57, 240;"></path>
                                    <path id="pathE" d="M 300 500 L 700 500" style="stroke-dashoffset: 800; stroke-dasharray: 400, 480, 240;"></path>
                                    <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200" style="stroke-dashoffset: 6993.11; stroke-dasharray: 3496.56, 3576.56, 240;"></path>
                                </svg>
                            </span>
                        </a>
                        <ul class="primary-menu-menu primary-menu-indented scrollable" style="overflow: hidden; max-height: 460px;">
                        @foreach($categories as $category )    
                            <li class="">
                                <a href={{url("categories", $category->id)}}>{{$category->name}}</a>
                            </li>
                        @endforeach
                        <li class="scrollable-fix"></li></ul>
                    </nav>
                    <ul class="nav-add">
                        <li class="search search_main" style="color: black; margin-top: 5px;">
                        
                            <a href="#" class="js-open-search">
                                <i class="seoicon-loupe"></i>
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
    </header>