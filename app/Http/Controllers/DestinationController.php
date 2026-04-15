<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination; 

class DestinationController extends Controller
{
    public function index(Request $request){

    $keyword = $request->input('search');
    
    if ($keyword !=''){
        $destinations = Destination::where('name','LIKE', '%' . $keyword . '%')->paginate(5);
    }else {
        $destinations = Destination::orderby('id')->paginate(5);
    }
    return view('pages.destinations.indexDestinasi', compact('destinations'));
    
    
    }

    public function show($id)
    {
        
        $destinations = Destination::findOrFail($id);
        return view('pages.destinations.detaildestinasi', compact('destinations'));
    }

    public function create()
    {
        return view('pages.destinations.createDestination');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        Destination::create($request->all());
        return redirect('/destinations')->with('success', 'Destination created successfully.');
    }

    public function delete($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return redirect('/destinations')->with('success', 'Destination deleted successfully.'); 
    }

    public function edit($id)
    {
    
        $destination = Destination::findOrFail($id);
    
        return view('pages.destinations.editDestination', compact('destination'));
    }

    public function update(Request $request, $id)
    {
      
        $destination = Destination::find($id);

        if ($destination) {
            $destination->update($request->all());
            
            return redirect('/destinations')->with('success', 'Destination updated successfully.');
        } else {
      
            return redirect('/destinations')->with('error', 'Destination not found.');
        }
    }
}







