<?php

namespace App\Http\Controllers;

use App\Mail\adminContectEmail;
use App\Mail\clientContectEmail;
use App\Mail\subscriptionEmail;
use App\Models\Contact;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MyController extends Controller
{
    public function home(){
        $show_posts = \App\Models\Posts::inRandomOrder()->paginate(5);
        $category = \App\Models\Categories::orderby("id","desc")->paginate(5);
        $latest_posts =\App\Models\Posts::orderby("id", "desc")->paginate(5);
        return view("Frontend.index",["posts"=>$show_posts , "categories"=>$category , "latest"=>$latest_posts]);
        
    }
    public function about(){
        return view("Frontend.about");
    }
    public function contact(){
        return view("Frontend.contact");
    }
    public function contact_form(Request $request){
    $data = $request->validate([
        "name" => "required|min:4",
        "email"=>"required|email",
        "message"=>"required|min:4",
    ]);
    $newUser = Contact::create($data);
    Mail::to($newUser->email)->send(new clientContectEmail($newUser));
    Mail::to("admin@form.com")->send(new adminContectEmail($newUser));
    return redirect()->route("homepage")->with("success","Successfully Submitted");
    }
    public function subscription(Request $request){
        $data = $request->validate([
           "email"=>"required|unique:subscriptions|email",
        ]);
        $newUser = Subscription::create($data);
        Mail::to($newUser->email)->send(new subscriptionEmail($newUser));
        return redirect()->route("homepage")->with("success","Subscription Successfully");
    }
    public function read($id){
        $posts = \App\Models\Posts::find($id);
        return view("Frontend.continueread",["post"=>$posts]);
    }
//    public function myregister(){
//        return view("Layouts.register");
//    }
//    public function mylogin(){
//        return view("Layouts.login");
//    }
    //
}
