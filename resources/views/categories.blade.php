<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Seosight - Index Page</title>

     @include('layouts.style')
    

    
        <style>
        .padded-50{
            padding: 40px;
        }
        .text-center{
            text-align: center;
        }
    </style>

</head>


<body class=" ">

<!-- Header -->

    @include('layouts.header')

<!-- ... End Header -->

<div class="content-wrapper">

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category : {{ $cat->name }} </h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
                        <div class="case-item-wrap">
                            @foreach($cat->posts as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ asset('storage/'.$post->featured) }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('single', ['slug' => $post->slug]) }}">{{$post->title}}</a></h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">
                            @foreach($tags as $tag)
                            <a href="{{ route('tags', $tag->id) }}" class="w-tags-item">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
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
                        <form class="subscribe-form" method="post" action="http://theme.crumina.net/html-seosight/import.php">
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                    </div>

                    <div class="images-block">
                        <img src="{{ asset('app/img/subscr-gear.png') }}" alt="gear" class="gear">
                        <img src="{{ asset('app/img/subscr1.png') }}" alt="mail" class="mail">
                        <img src="{{ asset('app/img/subscr-mailopen.png') }}" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- End Subscribe Form -->

</div>

<!-- Footer -->
@include('layouts.footer')

<!-- End Footer -->

<!-- Overlay Search -->

@include('layouts.overlay')

<!-- End Overlay Search -->

<!-- JS Script -->
@include('layouts.script')

<!-- ...end JS Script -->

</body>

<!-- Mirrored from theme.crumina.net/html-seosight/15_blog_details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Nov 2016 13:03:10 GMT -->
</html>