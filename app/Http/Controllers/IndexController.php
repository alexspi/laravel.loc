<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
   public function index(){
       $hellow="Привет всем это тестовый проект Laravel";

       $description = "Потом тут будет админка ))";
       return view('hello',compact('hellow','description'));
   }
}
