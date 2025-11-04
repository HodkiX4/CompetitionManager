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
            'year' => 'required|number',
            'available_languages' => 'required|text',
            'pfc' => 'required|number',
            'pfw' => 'required|number',
            'pfn' => 'required|number'
        ]);

        $competition = Competition::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Verseny sikeresen étrehozva.'
        ]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|number',
            'available_languages' => 'required|text',
            'pfc' => 'required|number',
            'pfw' => 'required|number',
            'pfn' => 'required|number'
        ]);

        $competition = Competition::update($validated);

        return response()->json([
            'success' => true,
            'message'=> 'Verseny sikeresen módosítva.'
        ]);
    }

    public function delete(Competition $competition) {
        $competition->delete();

        return response()->json([
            'success' => true,
            'message' => 'Verseny sikeresen törölve.'
        ]);
    }
}
