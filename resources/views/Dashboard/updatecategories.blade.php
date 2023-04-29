@extends("Layouts.Dashboard.app")
@section("title")
Edit Categories
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
                        <form method="POST" action="{{route("dashboard.category.update",[$category->id])}}" class="align-items-center mb-0" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter Category</label>
                                <input value="{{$category->cat_name}}" type="text" name="cat_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Attached Category File</label>
                                <input value="{{$category->image}}" name="image" type="file" class="form-control" id="exampleInputPassword1">
                            </div>
                            @error("image")
                            {{$message}}
                            @enderror

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
