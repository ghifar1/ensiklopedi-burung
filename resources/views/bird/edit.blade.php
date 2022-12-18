@extends('layouts.app')

@section('content')
    <!-- edit birds -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Animal</div>
                    <div class="card-body">
                        <!-- create form for edit animal for input name, description, species, endemic, weight, size, status animal class, and image -->
                        <form action="{{ route('birds.update', $bird->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group
                            @error('name') has-error @enderror">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ $bird->name }}">
                                @error('name')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('description') has-error @enderror">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter Description">{{ $bird->description }}</textarea>
                                @error('description')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('species') has-error @enderror">
                                <label for="species">Species</label>
                                <input type="text" name="species" id="species" class="form-control" placeholder="Enter Species" value="{{ $bird->species }}">
                                @error('species')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('endemic') has-error @enderror">
                                <label for="endemic">Endemic</label>
                                <input type="text" name="endemic" id="endemic" class="form-control" placeholder="Enter Endemic" value="{{ $bird->endemic }}">
                                @error('endemic')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('habitat') has-error @enderror">
                                <label for="habitat">Habitat</label>
                                <input type="text" name="habitat" id="habitat" class="form-control" placeholder="Enter Habitat" value="{{ $bird->habitat }}">
                                @error('habitat')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            <div class="form-group
                            @error('status') has-error @enderror">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Choose Status</option>
                                    @foreach([['title' => 'extinct', 'value' => 'Punah'],
['title' => 'extinct in the wild', 'value' => 'Punah di Alam liar'],
['title' => 'endangered', 'value' => 'Terancam Punah'],
['title' => 'vulnerable', 'value' => 'rentan'],
['title' => 'near threatened', 'value' => 'Hampir Terancam'],
['title' => 'least concern', 'value' => 'Kurang Perhatian'],
['title' => 'data deficient', 'value' => 'Data Kurang Lengkap'],
['title' => 'safe', 'value' => 'Aman'],
['title' => 'not evaluated', 'value' => 'Tidak Dinilai']] as $status)
                                        <option value="{{ $status['title'] }}" {{ $status['title'] == $bird->status ? 'selected' : '' }}>{{ $status['value'] }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('bird_genus_id') has-error @enderror">
                                <label for="bird_genus_id">Genus burung</label>
                                <select name="bird_genus_id" id="bird_genus_id" class="form-control">
                                    <option value="">Choose Genus</option>
                                    <!-- create foreach for get all animal class from database -->
                                    @foreach ($birdGenus as $genus)
                                        <option value="{{ $genus->id }}" {{ $bird->bird_genus_id == $genus->id ? 'selected' : '' }}>{{ $genus->name }}</option>
                                    @endforeach
                                </select>
                                @error('animal_class_id')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('image') has-error @enderror">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('image') has-error @enderror">
                                <img src="{{ asset('storage/' . $bird->image) }}" alt="" width="100px">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{url('/home')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
