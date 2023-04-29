@extends("Layouts.Dashboard.app")
@section("title")
Update Post
@endsection
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 p-3">
                <div class="card-header pb-0">
                    <h6>Update Post</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <form method="POST" action="{{route("dashboard.posts.update",[$post->id])}}" class="align-items-center mb-0" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                                <input value="{{$post->post_title}}" type="text" name="post_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Title">
                            </div>
                            <!-- dropdown -->
                            <div class="form-group">
                            <label for="exampleInputEmail1">Select Category</label>
                            <select name="post_cat" class=" dropdown form-control dropdown-toggle" id="membership" name="post_cat">
                                @foreach($dd as $drop)
                                    <option @if($drop->id == $post->post_cat) selected @endif value="{{$drop->id}}">{{$drop->cat_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <!-- dropdown end -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Post Description</label>
                                <input value="{{$post->post_description}}" name="post_description" type="text" class="form-control" id="exampleInputDescription" placeholder="Enter Description">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Post Image</label>
                                <input value="{{$post->post_image}}" type="file" name="post_image" class="form-control" id="exampleInputImage" placeholder="Select Image">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
