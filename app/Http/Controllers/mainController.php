<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;

class mainController extends Controller
{
    //
    public function index(){
        $main = Main::first();
        return view('pages/main',['main'=>$main]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string', 
        ]);

        $main = Main::first();
        $main->title = $request->title;
        $main->sub_title = $request->sub_title;

        if($request->file('bc_img')){
            $img_file = $request->file('bc_img');
            $img_file->storeAs('public/img/','bc_img.' . $img_file->getClientOriginalExtension());
            $main->bc_img = 'storage/img/bc_img.' . $img_file->getClientOriginalExtension();
        }

        if($request->file('resume')){
            $pdf_file = $request->file('resume');
            $pdf_file->storeAs('public/pdf/','resume.' . $pdf_file->getClientOriginalExtension());
            $main->resume = 'storage/pdf/resume.' . $pdf_file->getClientOriginalExtension();
        }

        $main->save();

        return redirect()->route('admin.main')->with('success', "Main Page data has been updated successfully");
    }

}
