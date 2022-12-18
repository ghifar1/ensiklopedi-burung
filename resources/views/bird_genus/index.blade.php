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
                        <p>ini adalah halaman dashboard untuk mengelola data genus burung</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin</div>
                    <div class="card-body">
                        <!-- create two stack button for create bird_family and birds -->
                        <a href="{{ route('bird_genus.create') }}" class="btn btn-primary">Buat Genus</a>
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
                    <div class="card-header">Bird Genus</div>
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
                            @foreach ($genuses as $genus)
                                <tr>
                                    <td>{{ $genus->name }}</td>
                                    <td>{{ mb_strimwidth($genus->description, 0, 200, "...") }}</td>
                                    <td>
                                        <a href="{{ route('bird_genus.edit', $genus->id) }}" class="btn btn-primary my-1">Edit</a>
                                        <form action="{{ route('bird_genus.destroy', $genus->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $genuses->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
