<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function show(){
        $show_subscriber = \App\Models\Subscription::orderby("id","desc")->paginate(5);
        return view("dashboard.subscribe",["subscription"=>$show_subscriber]);
    }
}
