<?php

namespace App\Http\Controllers;

use App\Models\BirdFamily;
use App\Models\Log;
use Illuminate\Http\Request;

class BirdFamilyController extends Controller
{
    public function index()
    {
        $birdFamilies = BirdFamily::paginate(5);
        return view('bird_family.index', compact('birdFamilies'));
    }

    public function create()
    {
        return view('bird_family.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $birdFamily = new BirdFamily([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'order' => $request->get('order'),
        ]);
        $birdFamily->save();
        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Menambah Bird Family '.$birdFamily->name,
        ]);
        return redirect('/bird_family')->with('success', 'Bird Family saved!');
    }

    public function show($id)
    {
        $birdFamily = BirdFamily::find($id);
        return view('bird_family.show', compact('birdFamily'));
    }

    public function edit($id)
    {
        $birdFamily = BirdFamily::find($id);
        return view('bird_family.edit', compact('birdFamily'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $birdFamily = BirdFamily::find($id);
        $birdFamily->name = $request->get('name');
        $birdFamily->description = $request->get('description');
        $birdFamily->save();

        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Mengubah Bird Family '.$birdFamily->name,
        ]);

        return redirect('/bird_family')->with('success', 'Bird Family updated!');
    }

    public function destroy($id)
    {
        $birdFamily = BirdFamily::find($id);
        $birdFamily->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Menghapus Bird Family '.$birdFamily->name,
        ]);
        return redirect('/bird_family')->with('success', 'Bird Family deleted!');
    }
}
