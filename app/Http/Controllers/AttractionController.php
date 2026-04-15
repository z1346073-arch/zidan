<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attraction;



class AttractionController extends Controller
{
    public function index(){
        $attractions = Attraction::all();
        return view('pages.attractions.indexattraction', compact('attractions'));    
    }

    public function create(){
        return view('pages.attractions.create');
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Attraction::create($validatedData);
        return redirect('/attractions')->with('success', 'Attraction created successfully.');
    }

    public function edit($id){
        $attraction = Attraction::find($id);
        return view('pages.attractions.editattraction', compact('attraction'));
    }   

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $attraction = Attraction::find($id);
        $attraction->update($request->all());
        return redirect('/attractions')->with('success', 'Attraction updated successfully.');
    }   

    public function delete($id){
        $attraction = Attraction::find($id);
        $attraction->delete();
        return redirect('/attractions')->with('success', 'Attraction deleted successfully.');
    }
}