<?php

namespace App\Http\Controllers;

use App\Models\BirdFamily;
use App\Models\BirdGenus;
use App\Models\Log;
use Illuminate\Http\Request;

class BirdGenusController extends Controller
{
    public function index()
    {
        $genuses = BirdGenus::paginate(5);
        return view('bird_genus.index', compact('genuses'));
    }

    public function create()
    {
        $birdFamilies = BirdFamily::all();
        return view('bird_genus.create', compact('birdFamilies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // check if the bird family exists
            'bird_family_id' => 'required|exists:bird_families,id',
        ]);

        $birdGenus = new BirdGenus([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'bird_family_id' => $request->get('bird_family_id'),
        ]);
        $birdGenus->save();
        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Menambah Bird Genus '.$birdGenus->name,
        ]);
        return redirect('/bird_genus')->with('success', 'Bird Genus saved!');
    }

    public function show($id)
    {
        $birdGenus = BirdGenus::find($id);
        return view('bird_genus.show', compact('birdGenus'));
    }

    public function edit($id)
    {
        $birdGenus = BirdGenus::find($id);
        $birdFamilies = BirdFamily::all();
        return view('bird_genus.edit', compact('birdGenus', 'birdFamilies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // check if the bird family exists
            'bird_family_id' => 'required|exists:bird_families,id',
        ]);

        $birdGenus = BirdGenus::find($id);
        $birdGenus->name = $request->get('name');
        $birdGenus->description = $request->get('description');
        $birdGenus->bird_family_id = $request->get('bird_family_id');
        $birdGenus->save();
        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Mengubah Bird Genus '.$birdGenus->name,
        ]);

        return redirect('/bird_genus')->with('success', 'Bird Genus updated!');
    }

    public function destroy($id)
    {
        $birdGenus = BirdGenus::find($id);
        $birdGenus->delete();
        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Menghapus Bird Genus '.$birdGenus->name,
        ]);
        return redirect('/bird_genus')->with('success', 'Bird Genus deleted!');
    }
}
