<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portfolio;
use Illuminate\Support\Facades\Storage;




class portfoliopagesController extends Controller
{
    ////
    public function create(){
        return view('pages/portfolios/create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'big_image' => 'required|image',
            'small_image' => 'required|image',
            'description' => 'required|string', 
            'client' => 'required|string', 
            'category' => 'required|string', 
        ]);

        $portfolios = new Portfolio;
        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;
        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;

        $big_file = $request->file('big_image');
        Storage::putFile('public/img/', $big_file);
        $portfolios->big_image = "storage/img/".$big_file->hashName();

        $small_file = $request->file('small_image');
        Storage::putFile('public/img/', $small_file);
        $portfolios->small_image = "storage/img/".$small_file->hashName();

        $portfolios->save();

        return redirect()->route('admin.portfolios.create')->with('success','New Portfolio Created Successfully');
    }
    public function list(){
        $portfolios = Portfolio::all();
        return view ('pages.portfolios.list',['portfolios'=>$portfolios]);

    }
    public function edit($id) {
        $portfolio = Portfolio::find($id);
        return view('pages.portfolios.edit', ['portfolio'=>$portfolio]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'description' => 'required|string', 
            'client' => 'required|string', 
            'category' => 'required|string', 
        ]);

        $portfolios = Portfolio::find($id);
        $portfolios->title = $request->title;
        $portfolios->sub_title = $request->sub_title;
        $portfolios->description = $request->description;
        $portfolios->client = $request->client;
        $portfolios->category = $request->category;

        if($request->file('big_image')){
            $big_file = $request->file('big_image');
            Storage::putFile('public/img/', $big_file);
            $portfolios->big_image = "storage/img/".$big_file->hashName();
        }
        
        if($request->file('small_image')){
            $small_file = $request->file('small_image');
            Storage::putFile('public/img/', $small_file);
            $portfolios->small_image = "storage/img/".$small_file->hashName();
        }

        $portfolios->save();

        return redirect()->route('admin.portfolios.list')->with('success','Portfolio Updated Successfully');
    }
    public function delete($id)
    {
        $portfolio = Portfolio::find($id);
        @unlink(public_path($portfolio->big_image));
        @unlink(public_path($portfolio->small_image));
        $portfolio->delete();

        return redirect()->route('admin.portfolios.list')->with('success','Portfolio Deleted Successfully');
    }
}
