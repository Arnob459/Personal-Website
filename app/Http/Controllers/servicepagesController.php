<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service;


class servicepagesController extends Controller
{
    //
    public function create(){
        return view('pages/services/create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string', 
        ]);
        $services = new Service;
        $services->icon = $request->icon;
        $services->title = $request->title;
        $services->description = $request->description;
        $services->save();
        return redirect()->route('admin.services.create')->with('success','New Service Create Successfully');
    }
    public function list(){
        $services = Service::all();
        return view ('pages.services.list',['services'=>$services]);

    }
    public function edit($id) {
        $service = Service::find($id);
        return view('pages.services.edit', ['service'=>$service]);
    }
    public function update(Request $request, $id){
        $this->validate($request, [
            'icon' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string', 
        ]);

        $services = Service::find($id);
        $services->icon = $request->icon;
        $services->title = $request->title;
        $services->description = $request->description;

        $services->save();

        return redirect()->route('admin.services.list')->with('success','Service Updated Successfully');
    }
    public function delete($id){
        $service = Service::find($id);
        $service ->delete();
        return redirect()->route('admin.services.list')->with('success','Service Deleted Successfully');

    }
    // public function destroy($id){
    //     $service = Service::find($id);
    //     $service ->delete();
    //     return redirect()->route('admin.services.list')->with('success','Service Deleted Successfully');

    // }

}
