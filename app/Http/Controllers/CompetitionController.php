<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index() {
        $competitions = Competition::all();
        return view("competitions.index", ["competitions" => $competitions]);
    }
    
    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'available_languages' => 'required|string|max:255',
            'point_for_good_answer' => 'required|integer',
            'point_for_bad_answer' => 'required|integer',
            'point_for_no_answer' => 'required|integer',
        ]);

        $competition = Competition::create($validated);

        return response()->json([
            'success' => true,
            'competition' => $competition,
            'message' => 'Verseny sikeresen létrehozva.'
        ]);
    }
    
    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer',
            'available_languages' => 'required|string|max:255',
            'point_for_good_answer' => 'required|integer',
            'point_for_bad_answer' => 'required|integer',
            'point_for_no_answer' => 'required|integer',
        ]);

        $competition = Competition::find($id);
        $competition->update($validated);
        
        return response()->json([
            'success' => true,
            'competition' => $competition,
            'message'=> 'Verseny sikeresen módosítva.'
        ]);
    }

    public function delete(string $id) {
        Competition::find($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Verseny sikeresen törölve.'
        ]);
    }
}
