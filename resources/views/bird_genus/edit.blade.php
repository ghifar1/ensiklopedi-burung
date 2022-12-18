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
                        <form action="{{ route('bird_genus.update', $birdGenus->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group
                            @error('name') has-error @enderror">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ $birdGenus->name }}">
                                @error('name')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('description') has-error @enderror">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter Description">{{ $birdGenus->description }}</textarea>
                                @error('description')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
{{--                            @error('species') has-error @enderror">--}}
{{--                                <label for="species">Species</label>--}}
{{--                                <input type="text" name="species" id="species" class="form-control" placeholder="Enter Species" value="{{ $animal->species }}">--}}
{{--                                @error('species')--}}
{{--                                    <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('endemic') has-error @enderror">--}}
{{--                                <label for="endemic">Endemic</label>--}}
{{--                                <input type="text" name="endemic" id="endemic" class="form-control" placeholder="Enter Endemic" value="{{ $animal->endemic }}">--}}
{{--                                @error('endemic')--}}
{{--                                    <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('habitat') has-error @enderror">--}}
{{--                                <label for="habitat">Habitat</label>--}}
{{--                                <input type="text" name="habitat" id="habitat" class="form-control" placeholder="Enter Habitat" value="{{ $animal->habitat }}">--}}
{{--                                @error('habitat')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('weight') has-error @enderror">--}}
{{--                                <label for="weight">Weight</label>--}}
{{--                                <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter Weight" value="{{ $animal->weight }}">--}}
{{--                                @error('weight')--}}
{{--                                    <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('size') has-error @enderror">--}}
{{--                                <label for="size">Size</label>--}}
{{--                                <input type="text" name="size" id="size" class="form-control" placeholder="Enter Size" value="{{ $animal->size }}">--}}
{{--                                @error('size')--}}
{{--                                    <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('status') has-error @enderror">--}}
{{--                                <label for="status">Status</label>--}}
{{--                                <select name="status" id="status" class="form-control">--}}
{{--                                    <option value="">Choose Status</option>--}}
{{--                                    @foreach([['title' => 'endangered', 'value' => 'Langka'], ['title' => 'vulnerable', 'value' => 'Rentan'], ['title' => 'threatened', 'value' => 'Terancam'],  ['title' => 'extinct', 'value' => 'Punah'], ['title' => 'safe', 'value' => 'Aman']] as $status)--}}
{{--                                        <option value="{{ $status['title'] }}" {{ $status['title'] == $animal->status ? 'selected' : '' }}>{{ $status['value'] }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                @error('status')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <div class="form-group
                            @error('bird_family_id') has-error @enderror">
                                <label for="bird_family_id">Bird Family</label>
                                <select name="bird_family_id" id="bird_family_id" class="form-control">
                                    <option value="">Choose Bird Family</option>
                                    <!-- create foreach for get all animal class from database -->
                                    @foreach ($birdFamilies as $birdFamily)
                                        <option value="{{ $birdFamily->id }}" {{ $birdGenus->bird_family_id == $birdFamily->id ? 'selected' : '' }}>{{ $birdFamily->name }}</option>
                                    @endforeach
                                </select>
                                @error('animal_class_id')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group--}}
{{--                            @error('image') has-error @enderror">--}}
{{--                                <label for="image">Image</label>--}}
{{--                                <input type="file" name="image" id="image" class="form-control">--}}
{{--                                @error('image')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('image') has-error @enderror">--}}
{{--                                <img src="{{ asset('storage/' . $animal->image) }}" alt="" width="100px">--}}
{{--                            </div>--}}
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{url('/bird_genus')}}" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
