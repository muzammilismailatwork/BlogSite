<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function posts(){
        if(auth()->user()->admin){
        $show_posts = \App\Models\Posts::orderby("userid", "desc")->paginate(5);
        }
        else{
        $show_posts = \App\Models\Posts::where("userid", auth()->user()->id)->orderby("id", "desc")->paginate(5);
        }
        return view("dashboard.posts",["posts"=>$show_posts]);
    }
    public function addposts(){
        $dd=\App\Models\Categories::all();
        return view("dashboard.addpost", compact("dd"));
    }
    public function store(Request $request){
        $x=$request->validate([
            "post_title"=>"required",
            "post_cat"=>"required",
            "post_description"=>"required",
            "post_image"=>"required|mimes:png,jpg,jpeg",
        ]);
        $fileName = time().".".$request->post_image->extension();
        $image=$request->post_image->move(public_path("uploads"),$fileName);
        $x["post_image"]="/uploads/".$fileName;
        $x["userid"]= auth()->user()->id;
        Posts::create($x);
        return redirect()->route("dashboard.posts")->with("success", "Your post is created!");
    }
    public function edit($id){
        $post = Posts::find($id);
        $dd=\App\Models\Categories::all();
        return view("dashboard.updatepost", compact("post", "dd"));
    }
    public function update(Request $request,$id){
        $y=$request->validate([
            "post_title"=>"required",
            "post_cat"=>"required",
            "post_description"=>"required",
            "post_image"=>"mimes:png,jpg,jpeg",
        ]);

        $update_posts = Posts::find($id);

        if(isset($request->post_image)){
            if(File::exists(public_path($update_posts->post_image))){
                unlink(public_path($update_posts->post_image));
            }
            $fileName = time().".".$request->post_image->extension();
            $request->post_image->move(public_path("uploads"),$fileName);
            $y["post_image"]="/uploads/".$fileName;
        }
        $update_posts->update($y);
        return redirect()->route("dashboard.posts")->with("success", "Post Updated Successfully");
    }
    public function delete($id){
        $post = Posts::find($id);
        $post->delete();
        return redirect(route("dashboard.posts"))->with("success","category deleted Successfully");
    }
}
