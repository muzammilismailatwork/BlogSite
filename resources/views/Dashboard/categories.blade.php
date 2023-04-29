@extends("Layouts.Dashboard.app")
@section("title")
Categories
@endsection
@section("content")
    <div class="container-fluid py-4">
{{--        @foreach($Category as $cat)--}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Authors table</h6>
                        <a type="button" class="btn btn-success" href="{{route("dashboard.addcat")}}"><i class="fas fa-plus"></i> Add Category</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created at</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                @foreach($category as $cat)
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{$cat->image}}" class="avatar avatar-sm me-3" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$cat->cat_name}}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$cat->created_at}}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <a href="{{route("dashboard.category.edit",[$cat->id])}}"> <i class="fas fa-edit"></i></a>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{route("dashboard.category.delete",[$cat->id])}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                    @endforeach
                            </table>
                        </div>
                        {{$category->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @endforeach--}}
@endsection
