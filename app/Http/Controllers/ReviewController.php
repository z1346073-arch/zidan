<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Attraction;

class ReviewController extends Controller
{
   public function index(){
        $review = Review::all();
        return view('pages.reviews.indexreview', compact('review'));    
    }

    public function show($id){
        $review = Review::findOrFail($id);
        return view('pages.reviews.detailreview', compact('review'));
    }

    public function create(){
        $attractions = Attraction::all();
       return view('pages.reviews.createreview', compact('attractions'));
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'attraction_id' => 'required|exists:attractions,id',
            'reviewer_name' => 'required',
            'comment' => 'required',
        ]);     

        Review::create($validatedData);
        return redirect('/reviews')->with('success', 'Review created successfully.');
    }

    public function edit($id){
        $attractions = Attraction::all();
        $review = Review::findOrFail($id);
        return view('pages.reviews.editreview', compact('review', 'attractions'));
    }   

    public function update(Request $request, $id){
        $request->validate([
            'reviewer_name' => 'required',
            'comment' => 'required',
            'attraction_id' => 'required|exists:attractions,id'
        ]);

        $review = Review::find($id);
        $review->update($request->all());
        return redirect('/reviews')->with('success', 'Review updated successfully.');
    }   

    public function destroy($id){
        $review = Review::find($id);
        $review->delete();
        return redirect('/reviews')->with('success', 'Review deleted successfully.');
    }
}
