@extends('layouts.app')

@section('content')
    <!-- create animal class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Family</div>
                    <div class="card-body">
                        <!-- create form for create animal class for input name and description -->
                        <form action="{{ route('bird_family.update', $birdFamily->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group
                            @error('name') has-error @enderror">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{ $birdFamily->name }}">
                                @error('name')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('order') has-error @enderror">
                                <label for="order">Order</label>
                                <input type="text" name="order" id="order" class="form-control" placeholder="Enter Order" value="{{ $birdFamily->order }}">
                                @error('order')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group
                            @error('description') has-error @enderror">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Enter Description">{{ $birdFamily->description }}</textarea>
                                @error('description')
                                    <span class="help-block
                                    text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- button for input data -->
                            <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            <!-- button for cancel input data -->
                            <a href="{{ route('bird_family.index') }}" class="btn btn-danger mt-4">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
