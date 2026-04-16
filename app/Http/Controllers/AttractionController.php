<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Destination;

class AttractionController extends Controller
{
    public function index(){
        $attractions = Attraction::all();
        return view('pages.attractions.indexattraction', compact('attractions'));    
    }

    public function show($id){
        $attraction = Attraction::findOrFail($id);
        return view('pages.attractions.detailattraction', compact('attraction'));
    }

    public function create(){
        $destinations = Destination::all();
        return view('pages.attractions.create', compact('destinations'));
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required',
            'description' => 'nullable',
        ]);     

        Attraction::create($validatedData);
        return redirect('/attractions')->with('success', 'Attraction created successfully.');
    }

    public function edit($id){
        $destinations = Destination::all();
        $attraction = Attraction::findOrFail($id);
        return view('pages.attractions.editattraction', compact('attraction', 'destinations'));
    }   

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'destination_id' => 'required|exists:destinations,id'
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