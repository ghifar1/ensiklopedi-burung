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
                        <form action="{{ route('bird_genus.store') }}" method="POST" enctype="multipart/form-data">
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
                            @error('bird_family_id') has-error @enderror">
                                <label for="bird_family_id">Family</label>
                                <select name="bird_family_id" id="bird_family_id" class="form-control">
                                    <option value="">Pilih Family</option>
                                    @foreach ($birdFamilies as $family)
                                        <option value="{{ $family->id }}">{{ $family->name }}</option>
                                    @endforeach
                                </select>
                                @error('bird_family_id')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
{{--                            <div class="form-group--}}
{{--                            @error('species') has-error @enderror">--}}
{{--                                <label for="endemic">Species</label>--}}
{{--                                <input type="text" name="species" id="species" class="form-control" placeholder="Enter Species">{{ old('species') }}</input>--}}
{{--                                @error('species')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('endemic') has-error @enderror">--}}
{{--                                <label for="endemic">Endemic</label>--}}
{{--                                <input type="text" name="endemic" id="endemic" class="form-control" placeholder="Enter Endemic">{{ old('endemic') }}</input>--}}
{{--                                @error('endemic')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('habitat') has-error @enderror">--}}
{{--                                <label for="habitat">Habitat</label>--}}
{{--                                <input type="text" name="habitat" id="habitat" class="form-control" placeholder="Enter Habitat">{{ old('habitat') }}</input>--}}
{{--                                @error('habitat')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('weight') has-error @enderror">--}}
{{--                                <label for="weight">Weight</label>--}}
{{--                                <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter Weight">{{ old('weight') }}</input>--}}
{{--                                @error('weight')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('size') has-error @enderror">--}}
{{--                                <label for="size">Size</label>--}}
{{--                                <input type="text" name="size" id="size" class="form-control" placeholder="Enter Size">{{ old('size') }}</input>--}}
{{--                                @error('size')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('status') has-error @enderror">--}}
{{--                                <label for="status">Status</label>--}}
{{--                                <select name="status" id="status" class="form-control">--}}
{{--                                    <option value="">Choose Status</option>--}}
{{--                                    <!-- options value from endangered, vulnerable, threatened, extinct, safe and text translate to indonesian-->--}}
{{--                                    <option value="endangered">Langka</option>--}}
{{--                                    <option value="vulnerable">Rentan</option>--}}
{{--                                    <option value="threatened">Terancam</option>--}}
{{--                                    <option value="extinct">Punah</option>--}}
{{--                                    <option value="safe">Aman</option>--}}
{{--                                </select>--}}
{{--                                @error('status')--}}
{{--                                <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group--}}
{{--                            @error('image') has-error @enderror">--}}
{{--                                <label for="image">Image</label>--}}
{{--                                <input type="file" name="image" id="image" class="form-control">--}}
{{--                                @error('image')--}}
{{--                                    <span class="help-block--}}
{{--                                    text-danger">{{ $message }}</span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                            <!-- button for input data -->
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <!-- button for cancel input data -->
                            <a href="{{ route('bird_genus.index') }}" class="btn btn-danger mt-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


