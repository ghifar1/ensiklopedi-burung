<?php

namespace App\Http\Controllers;

use App\Models\Bird;
use App\Models\BirdGenus;
use App\Models\Log;
use Illuminate\Http\Request;

class BirdController extends Controller
{
    public function index()
    {
        return view('bird.index');
    }

    public function create()
    {
        $birdGenus = BirdGenus::all();
        return view('bird.create', compact('birdGenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'description' => 'required',
            // check if the bird genus exists
            'bird_genus_id' => 'required|exists:bird_genera,id',
        ]);

        // get image and move it to public path and save path to database
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);

        $bird = new Bird([
            'name' => $request->get('name'),
            'species' => $request->get('species'),
            'description' => $request->get('description'),
            'image' => $image_name,
            'endemic' => $request->get('endemic'),
            'location' => $request->get('location'),
            'habitat' => $request->get('habitat'),
            'bird_genus_id' => $request->get('bird_genus_id'),
            'status' => $request->status,
            'is_deleted' => 0,
        ]);
        $bird->save();

        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Menambah data burung '.$bird->name,
        ]);
        return redirect('/home')->with('success', 'Bird saved!');
    }

    public function show($id)
    {
        $bird = Bird::find($id);
        return view('bird.show', compact('bird'));
    }

    public function edit($id)
    {
        $bird = Bird::find($id);
        $birdGenus = BirdGenus::all();
        return view('bird.edit', compact('bird', 'birdGenus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'description' => 'required',
            // check if the bird genus exists
            'bird_genus_id' => 'required|exists:bird_genera,id',
        ]);

        $bird = Bird::find($id);
        $bird->name = $request->get('name');
        $bird->species = $request->get('species');
        $bird->description = $request->get('description');
        $bird->endemic = $request->get('endemic');
        $bird->location = $request->get('location');
        $bird->habitat = $request->get('habitat');
        $bird->bird_genus_id = $request->get('bird_genus_id');
        $bird->status = $request->status;
        $bird->is_deleted = 0;

        // get image and move it to public path and save path to database
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
            $bird->image = $image_name;
        }

        $bird->save();

        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Mengubah data burung '.$bird->name,
        ]);

        return redirect('/home')->with('success', 'Bird updated!');
    }

    public function destroy($id)
    {
//        $bird = Bird::find($id);
//        $bird->is_deleted = 1;
//        $bird->save();

        $bird = Bird::find($id);
        $bird->delete();

        Log::create([
            'user_id' => auth()->user()->id,
            'message' => 'Menghapus data burung '.$bird->name,
        ]);

        return redirect('/home')->with('success', 'Bird deleted!');
    }

    public function hardDelete($id)
    {
        $bird = Bird::find($id);
        $bird->delete();
        return redirect('/home')->with('success', 'Bird deleted!');
    }

    public function restore($id)
    {
        $bird = Bird::find($id);
        $bird->is_deleted = 0;
        $bird->save();
        return redirect('/home')->with('success', 'Bird restored!');
    }
}
