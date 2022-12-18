@extends('layouts.app')

@section('content')
    <!-- create blank two column layout with same span inside container class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <!-- description about birds family in indonesian-->
                        <p>ini adalah halaman dashboard untuk mengelola data family burung</p>
                       </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin</div>
                    <div class="card-body">
                        <!-- create two stack button for create bird_family and birds -->
                        <a href="{{ route('bird_family.create') }}" class="btn btn-primary">Buat Family</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- create table for show all animal classes -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bird Family</div>
                    <div class="card-body">
                      <!-- table of list animal classes with bootstrap pagination -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($birdFamilies as $birdFamily)
                                    <tr>
                                        <td>{{ $birdFamily->name }}</td>
                                        <td>{{ mb_strimwidth($birdFamily->description, 0, 200, "...") }}</td>
                                        <td>
                                            <a href="{{ route('bird_family.edit', $birdFamily->id) }}" class="btn btn-primary my-1">Edit</a>
                                            <form action="{{ route('bird_family.destroy', $birdFamily->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $birdFamilies->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
