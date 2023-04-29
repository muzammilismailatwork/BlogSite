@extends("Layouts.Dashboard.app")
@section("title")
Add Categories
@endsection
@section("content")
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 p-3">
                <div class="card-header pb-0">
                    <h6>Input Category</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <form method="POST" action="{{route("dashboard.posts.store")}}" class="align-items-center mb-0" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                                <input type="text" name="post_title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Post Title">
                            </div>
                            @error("post_name")
                            {{$message}}
                            @enderror
                            <!-- dropdown -->
                            <div class="form-group">
                            <label for="exampleInputEmail1">Post Title</label>
                            <select name="post_cat" class=" dropdown form-control dropdown-toggle" id="membership">
                                @foreach($dd as $drop)
                                <option value="{{$drop->id}}">{{$drop->cat_name}}</option>
                                @endforeach
                            </select>
                            </div>
                            <!-- dropdown end -->
                            @error("post_cat")
                            {{$message}}
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Post Description</label>
                                <input name="post_description" type="text" class="form-control" id="exampleInputDescription" placeholder="Enter Description">
                            </div>
                            @error("post_description")
                            {{$message}}
                            @enderror
                            <div class="form-group">
                                <label for="exampleInputPassword1">Post Image</label>
                                <input name="post_image" type="file" class="form-control" id="exampleInputImage" placeholder="Select Image">
                            </div>
                            @error("post_image")
                            {{$message}}
                            @enderror
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
