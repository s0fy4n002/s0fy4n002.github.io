<html lang="en"><head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Seosight - Index Page</title>

    @include("layouts.style")

    <!--External fonts-->

    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" type="text/css">
    <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>


<body class="">

<div class="content-wrapper">
    
    @include("layouts.header")

    <div class="header-spacer"></div>

    <div class="container">
        <div class="row">
            
            <div class="col-lg-10">
            @foreach($posts as $post)
                <article class="hentry post post-standard sticky">

                        <div class="post-thumb">
                            <img src="{{asset('/storage/'.$post->featured)}}" alt="seo">
                            
                            
                            
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{url('single', $post->slug)}}">{{$post->title}}</a>
                                    </h2>
                                    

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $post->created_at->toFormattedDateString() }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$post->categories->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            @endforeach

            </div>
            <div class="col-lg-2">
                
                <div class="list-group">
                    <a class="list-group-item list-group-item-action active">
                        Tags
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Marketing</a>
                    <a href="#" class="list-group-item list-group-item-action">Jobs</a>
                    <a href="#" class="list-group-item list-group-item-action">Programmer</a>
                </div>
                
            </div>
        </div>

       
    </div>


<!-- Subscribe Form -->

<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="subscribe scrollme">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Email Newsletters!</h4>
                        <form class="subscribe-form" method="post" action="">
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Sign up for new Seosignt content, updates, surveys &amp; offers.</div>

                    </div>

                    <div class="images-block">
                        <img src="app/img/subscr-gear.png" alt="gear" class="gear" style="opacity: 0; transform: rotateZ(0deg);">
                        <img src="app/img/subscr1.png" alt="mail" class="mail" style="opacity: 0; bottom: -322px;">
                        <img src="app/img/subscr-mailopen.png" alt="mail" class="mail-2" style="opacity: 0; right: -1170px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Subscribe Form -->
</div>

@include("layouts.footer")


<!-- Overlay Search -->

<div class="overlay_search">
    <div class="container">
        <div class="row">
            <div class="form_search-wrap">
                <form action="{{route('result')}}" method="get">
                    <input class="overlay_search-input" placeholder="Type and hit Enter..." type="text" name="cari">
                    <a href="#" class="overlay_search-close">
                        <span></span>
                        <span></span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Overlay Search -->
@include("layouts.script")



</body></html>