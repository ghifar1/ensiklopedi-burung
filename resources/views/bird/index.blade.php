@extends('layouts.app')

@section('content')
    <!-- create blank two column layout with same span inside container class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        <!-- description about birds in bahasa indonesia -->
                        <p>Ini adalah halaman untuk mengelola data hewan. Hewan adalah makhluk hidup yang memiliki ciri-ciri tertentu. Contoh hewan adalah kucing, anjing, dan lain-lain. Hewan memiliki nama, deskripsi, dan kelas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin</div>
                    <div class="card-body">
                        <!-- create two stack button for create bird_family and birds -->
                        <a href="{{ route('birds.create') }}" class="btn btn-primary">Create Animal</a>
                        <a href="{{ route('bird_family.index') }}" class="btn btn-primary">List Animal class</a>

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
                    <div class="card-header">Animal</div>
                    <div class="card-body">
                        <div class="form-group
                            @error('animal_class_id') has-error @enderror">
                            <label for="animal_class_id">Animal Class</label>
                            <select name="animal_class_id" id="animal_class_id" class="form-control">
                                <option value="">Choose Animal Class</option>
                                @foreach ($animalClasses as $animalClass)
                                    <option value="{{ $animalClass->id }}">{{ $animalClass->name }}</option>
                                @endforeach
                            </select>
                            @error('animal_class_id')
                            <span class="help-block
                                    text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- table of list birds with bootstrap pagination -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($animals as $animal)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img width="200px" src="{{url("storage/".str_replace("public/", "", $animal->image))}}" /></td>
                                        <td>
                                            <table>
<tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kelas</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->animalClass->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Spesies</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->species }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Endemik</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->endemic }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Habitat</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->habitat }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Berat</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->weight }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Ukuran</td>
                                                    <td>:</td>
                                                    <td>{{ $animal->size }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status Kehidupan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <h4>
                                                            @if($animal->status == "endangered")
                                                                <span class="badge bg-danger">Langka</span>
                                                            @elseif($animal->status == "extinct")
                                                                <span class="badge bg-danger">Punah</span>
                                                            @elseif($animal->status == "threatened")
                                                                <span class="badge bg-warning">Terancam</span>
                                                            @elseif($animal->status == "vulnerable")
                                                                <span class="badge bg-warning">Rentan</span>
                                                            @elseif($animal->status == "safe")
                                                                <span class="badge bg-success">Aman</span>
                                                            @endif

                                                        </h4>
                                                    </td>
                                                </tr>

                                            </table>
                                        </td>
                                        <td>
                                            <a href="{{ route('birds.edit', $animal->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('birds.destroy', $animal->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $animals->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(() =>{
            $('#animal_class_id').on('change', function(){
                let animalClassId = $(this).val();
                window.location.href = `{{ route('birds.index') }}?animal_class_id=${animalClassId}`;
            });
        })
    </script>

@endsection
