@extends("Layouts.Public.app")
@section("title")
    LogBook - HomePage
@endsection

@section("content")
<section class="section">
    <div class="container">
        <div class="row">
            <aside class="col-lg-4 order-2 order-lg-1">
                <!-- Search -->
                <div class="widget">
                    <h5 class="widget-title"><span>Search</span></h5>
                    <form action="/logbook-hugo/search" class="widget-search">
                        <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                        <button type="submit"><i class="ti-search"></i>
                        </button>
                    </form>
                </div>
                <!-- categories -->
                <div class="widget">
                    <h5 class="widget-title"><span>Categories</span></h5>
                    <ul class="list-unstyled widget-list">
                        @foreach($categories as $category)
                        <li><a href="#!" class="d-flex">{{$category->cat_name}}
                                <small class="ml-auto">{{$category->posts()->count()}}</small></a>
                        </li>
                        @endforeach
                        <!-- <li><a href="#!" class="d-flex">Newyork city
                                <small class="ml-auto">(2)</small></a>
                        </li>
                        <li><a href="#!" class="d-flex">Photobooth
                                <small class="ml-auto">(1)</small></a>
                        </li>
                        <li><a href="#!" class="d-flex">Photography
                                <small class="ml-auto">(2)</small></a>
                        </li>
                        <li><a href="#!" class="d-flex">Videography
                                <small class="ml-auto">(1)</small></a>
                        </li> -->
                    </ul>
                </div>
                <!-- tags -->
                <div class="widget">
                    <h5 class="widget-title"><span>Tags</span></h5>
                    <ul class="list-inline widget-list-inline">
                        <li class="list-inline-item"><a href="#!">Booth</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">City</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Image</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">New</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Photo</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Seasone</a>
                        </li>
                        <li class="list-inline-item"><a href="#!">Video</a>
                        </li>
                    </ul>
                </div>
                <!-- latest post -->
                <div class="widget">
                    <h5 class="widget-title"><span>Latest Article</span></h5>
                    <!-- post-item -->
                    @foreach($latest as $post)
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-elements.html">
                                <img loading="lazy" class="mr-3" src="{{$post->post_image}}">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-elements.html">{{$post->post_title}}</a></h5>
                                <small>{{$post->created_at}}</small>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                    <!-- <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-details-1.html">
                                <img loading="lazy" class="mr-3" src="images/post/post-1.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-details-1.html">Cheerful Loving Couple Bakers Drinking Coffee</a>
                                </h5>
                                <small>March 14, 2020</small>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-unstyled widget-list">
                        <li class="media widget-post align-items-center">
                            <a href="post-details-2.html">
                                <img loading="lazy" class="mr-3" src="images/post/post-2.jpg">
                            </a>
                            <div class="media-body">
                                <h5 class="h6 mb-0"><a href="post-details-2.html">Cheerful Loving Couple Bakers Drinking Coffee</a>
                                </h5>
                                <small>March 14, 2020</small>
                            </div>
                        </li>
                    </ul> -->
                </div>
            </aside>

            <div class="col-lg-8 order-1 order-lg-2 mb-5 mb-lg-0">
                @foreach($posts as $post)
                <article class="row mb-5">
                    <div class="col-md-4 mb-4 mb-md-0">

                        <img loading="lazy" src="{{$post->post_image}}" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        <!-- <div class="post-slider slider-sm">
                            <img loading="lazy" src="images/post/post-6.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                            <img loading="lazy" src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                            <img loading="lazy" src="images/post/post-3.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div> -->
                    </div>
                    <div class="col-md-8">
                        <h3 class="h5"><a class="post-title" href="post-elements.html">{{$post->post_title}}</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">{{$post->user_name->name}}</a>
                            </li>
                            <li class="list-inline-item">{{$post->created_at}}</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">{{$post->category->cat_name}}</a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                            </li>
                        </ul>
                        <p>{{$post->post_description}}</p> <a href="{{route("read",[$post->id])}}" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article>
                @endforeach
                <!-- <article class="row mb-5">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                            <img loading="lazy" src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h5"><a class="post-title" href="post-details-1.html">Cheerful Loving Couple Bakers Drinking
                                Coffee</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                            </li>
                            <li class="list-inline-item">Date : March 14, 2020</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">Photography </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, …</p> <a href="post-details-1.html" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article>
                <article class="row mb-5">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                            <img loading="lazy" src="images/post/post-2.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                            <img loading="lazy" src="images/post/post-4.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h5"><a class="post-title" href="post-details-2.html">Cheerful Loving Couple Bakers Drinking
                                Coffee</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                            </li>
                            <li class="list-inline-item">Date : March 14, 2020</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">Photobooth </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Booth </a> ,<a href="#!" class="ml-1">Image </a>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, …</p> <a href="post-details-2.html" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article>
                <article class="row mb-5">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                            <img loading="lazy" src="images/post/post-3.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h5"><a class="post-title" href="post-details-2.html">Cheerful Loving Couple Bakers Drinking
                                Coffee</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                            </li>
                            <li class="list-inline-item">Date : March 14, 2020</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">Videography </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Video </a> ,<a href="#!" class="ml-1">Image </a>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, …</p> <a href="post-details-2.html" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article>
                <article class="row mb-5">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                            <img loading="lazy" src="images/post/post-4.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                            <img loading="lazy" src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h5"><a class="post-title" href="post-details-1.html">Cheerful Loving Couple Bakers Drinking
                                Coffee</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                            </li>
                            <li class="list-inline-item">Date : March 14, 2020</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">Four seasone </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">Seasone </a>
                                ,<a href="#!" class="ml-1">New </a>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, …</p> <a href="post-details-1.html" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article>
                <article class="row mb-5">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                            <img loading="lazy" src="images/post/post-5.jpg" class="img-fluid" alt="post-thumb" style="height:200px; object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h5"><a class="post-title" href="post-details-1.html">Cheerful Loving Couple Bakers Drinking
                                Coffee</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                            </li>
                            <li class="list-inline-item">Date : March 14, 2020</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">Newyork city </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">City </a> ,<a href="#!" class="ml-1">Photo </a>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, …</p> <a href="post-details-1.html" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article> -->
                <!-- <article class="row mb-5">
                    <div class="col-12">
                        <h3 class="h5"><a class="post-title" href="post-details-2.html">Cheerful Loving Couple Bakers Drinking
                                Coffee</a></h3>
                        <ul class="list-inline post-meta mb-2">
                            <li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">John Doe</a>
                            </li>
                            <li class="list-inline-item">Date : March 14, 2020</li>
                            <li class="list-inline-item">Categories : <a href="#!" class="ml-1">Newyork city </a>
                            </li>
                            <li class="list-inline-item">Tags : <a href="#!" class="ml-1">City </a> ,<a href="#!" class="ml-1">Photo </a>
                            </li>
                        </ul>
                        <p>It’s no secret that the digital industry is booming. From exciting startups to global brands, companies are reaching out to digital agencies, responding to the new possibilities available. However, the industry is fast becoming overcrowded, heaving with agencies offering similar services — on the …</p> <a href="post-details-2.html" class="btn btn-outline-primary">Continue Reading</a>
                    </div>
                </article> -->
            </div>
        </div>
    </div>
</section>
@endsection
