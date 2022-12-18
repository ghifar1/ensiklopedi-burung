@extends('layouts.app')

@section('content')
    <!-- create blank two column layout with same span inside container class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Genus</div>
                    <div class="card-body">
                       <h2> <i>{{ $birdGenus->name }}</i></h2>
                        <p>{{ $birdGenus->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <!-- create two stack button for create bird_family and birds -->
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
