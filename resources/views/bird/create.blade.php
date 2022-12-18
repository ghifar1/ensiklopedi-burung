@extends('layouts.app')

@section('content')
    <!-- create animal -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Animal</div>
                    <div class="card-body">
                        <!-- create form for create animal for input name, description, animal class, and image -->
                        <form action="{{ route('birds.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group
                            @error('name') has-error @enderror">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('description') has-error @enderror">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('bird_genus_id') has-error @enderror">
                                <label for="bird_genus_id">Genus Burung</label>
                                <select name="bird_genus_id" id="bird_genus_id" class="form-control">
                                    <option value="">Choose Genus</option>
                                    @foreach ($birdGenus as $genus)
                                        <option value="{{ $genus->id }}">{{ $genus->name }}</option>
                                    @endforeach
                                </select>
                                @error('animal_class_id')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('species') has-error @enderror">
                                <label for="endemic">Species</label>
                                <input type="text" name="species" id="species" class="form-control" placeholder="Enter Species">{{ old('species') }}</input>
                                @error('species')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('endemic') has-error @enderror">
                                <label for="endemic">Endemic</label>
                                <input type="text" name="endemic" id="endemic" class="form-control" placeholder="Enter Endemic">{{ old('endemic') }}</input>
                                @error('endemic')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('habitat') has-error @enderror">
                                <label for="habitat">Habitat</label>
                                <input type="text" name="habitat" id="habitat" class="form-control" placeholder="Enter Habitat">{{ old('habitat') }}</input>
                                @error('habitat')
                                <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('status') has-error @enderror">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="">Choose Status</option>
                                    <option value="extinct">Punah</option>
                                    <option value="extinct in the wild">Punah di alam liar</option>
                                    <option value="endangered">Terancam Punah</option>
                                    <option value="vulnerable">Rentan</option>
                                    <option value="near threatened">Hampir Terancam</option>
                                    <option value="least concern">Kurang Perhatian</option>
                                    <option value="data deficient">Data Kurang Lengkap</option>
                                    <option value="safe">Aman</option>
                                    <option value="not evaluated">Belum Dinilai</option>

                                </select>
                                @error('status')
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
                            <!-- button for input data -->
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <!-- button for cancel input data -->
                            <a href="{{ route('birds.index') }}" class="btn btn-danger mt-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


