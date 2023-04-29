@extends("Layouts.Dashboard.app")
@section("title")
Posts
@endsection
@section("content")
<div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Authors table</h6>
                        <a type="button" class="btn btn-success" href="{{route("dashboard.addposts")}}"><i class="fas fa-plus"></i> Add Post</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Post Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Post Category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Post Description</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                @foreach($posts as $post)
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{$post->post_image}}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$post->post_title}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$post->category->cat_name}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$post->post_description}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$post->created_at}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{route("dashboard.posts.edit",[$post->id])}}"> <i class="fas fa-edit"></i></a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{route("dashboard.posts.delete",[$post->id])}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
