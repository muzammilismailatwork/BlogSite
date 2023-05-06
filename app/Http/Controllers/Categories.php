<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Categories as CategoryModel;
use Illuminate\Support\Facades\File;

class Categories extends Controller
{
    public function cat(){
        $this->autorize("view_category", App\Models\User::class);
        $category = \App\Models\Categories::orderby("id","desc")->paginate(5);
        return view("dashboard.categories", compact("category"));
    }
    public function addcat(){

        return view("dashboard.addcategories");
    }

    public function store(Request $request){
        $x=$request->validate([
            "cat_name"=>"required",
            "image"=>"required|mimes:png,jpg,jpeg|max:5000",
        ]);
        $fileName = time().".".$request->image->extension();
        $image=$request->image->move(public_path("uploads"), $fileName);
        $x['image']='/uploads/'.$fileName;
        \App\Models\Categories::create($x);
        return redirect()->route("dashboard.categories")->with("success","category created successfully!");
    }
    public function edit(\App\Models\Categories $category){
        return view("dashboard.updatecategories", compact("category"));
    }
    public function update(Request $request, $id){
        $y = $request->validate([
            "cat_name"=>"required",
            "image"=>"mimes:png,jpg,jpeg",
        ]);

        $categories = \App\Models\Categories::find($id);
        if (isset($request->image)){
            if (File::exists(public_path($categories->image))) {
                unlink(public_path($categories->image));
            }
            $fileName = time().".".$request->image->extension();
            $request->image->move(public_path("uploads"),$fileName);
            $y["image"]='/uploads/'.$fileName;
        }
        //dd($categories);
        $categories->update($y);
        return redirect()->route("dashboard.categories")->with("success","Category has been updated successfully!");
    }
       public function delete(\App\Models\Categories $category){
           $category->delete();
           return redirect()->route("dashboard.categories")->with("success","category deleted successfully!");
       }

    }
