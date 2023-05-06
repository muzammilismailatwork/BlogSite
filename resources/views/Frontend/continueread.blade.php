@extends("Layouts.Public.app")
@section("title")
    LogBook - Continue Reading
@endsection

@section("content")
<section class="section">
	<div class="container">
		<article class="row mb-4">
			<div class="col-lg-10 mx-auto mb-4">
				<h1 class="h2 mb-3">{{$post->post_title}}</h1>
				<ul class="list-inline post-meta mb-3">
					<li class="list-inline-item"><i class="ti-user mr-2"></i><a href="author.html">{{$post->user_name->name}}</a>
					</li>
					<li class="list-inline-item">{{$post->post_created_at}}</li>
					<li class="list-inline-item">Categories : <a href="#!" class="ml-1">{{$post->category->cat_name}} </a>
					</li>
					<li class="list-inline-item">Tags : <a href="#!" class="ml-1">Photo </a> ,<a href="#!" class="ml-1">Image </a> 
					</li>
				</ul>
			</div>
			<div class="col-12 mb-3">
                <img src="{{$post->post_image}}" class="img-fluid" alt="post-thumb">
				<!-- <div class="post-slider">
					<img src="images/post/post-6.jpg" class="img-fluid" alt="post-thumb">
					<img src="images/post/post-1.jpg" class="img-fluid" alt="post-thumb">
					<img src="images/post/post-3.jpg" class="img-fluid" alt="post-thumb">
				</div> -->
			</div>
			
            <div class="content">
					
					<h5 id="paragraph">Description</h5>
					<p>{{$post->post_description}}</p>
					<hr>
			</div>
</section>
@endsection
