<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show(){
        $show_contact = \App\Models\Contact::orderby("id","desc")->paginate(5);
        return view("dashboard.contact", ["contacts"=>$show_contact]);
    }
}
