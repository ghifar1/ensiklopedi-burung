@extends('layouts.app')

@section('content')
    <!-- create blank two column layout with same span inside container class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List Burung</div>
                    <div class="card-body">
                       <!-- table of birds with pagination-->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($birds as $bird)
                                    <tr @if($bird->is_deleted)class="bg-danger" @endif>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td><img src="{{asset('images/'.$bird->image)}}"></td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td><b>Nama</b></td>
                                                    <td>:</td>
                                                    <td>{{ $bird->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Family</b></td>
                                                    <td>:</td>
                                                    <td><a href=""><i>{{ $bird->bird_genus->bird_family->name }}</i></a></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Genus</b></td>
                                                    <td>:</td>
                                                    <td><a href=""><i>{{ $bird->bird_genus->name }}</i></a></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Spesies</b></td>
                                                    <td>:</td>
                                                    <td><i>{{ $bird->species }}</i></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Endemik</b></td>
                                                    <td>:</td>
                                                    <td>{{ $bird->endemic }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Status</b></td>
                                                    <td>:</td>
                                                    <td>
                                                        @if ($bird->status == "extinct")
                                                            <span class="badge bg-black">Punah</span>
                                                        @elseif ($bird->status == "extinct in the wild")
                                                            <span class="badge bg-black">Punah di Alam</span>
                                                        @elseif ($bird->status == "endangered")
                                                            <span class="badge bg-danger">Terancam Punah</span>
                                                        @elseif ($bird->status == "vulnerable")
                                                            <span class="badge bg-warning">Rentan</span>
                                                        @elseif ($bird->status == "near threatened")
                                                            <span class="badge bg-warning">Hampir Terancam</span>
                                                        @elseif ($bird->status == "least concern")
                                                            <span class="badge bg-info">Kurang Perhatian</span>
                                                        @elseif ($bird->status == "data deficient")
                                                            <span class="badge bg-info">Data Kurang Lengkap</span>
                                                        @elseif ($bird->status == "not evaluated")
                                                            <span class="badge bg-info">Belum Dinilai</span>
                                                        @elseif($bird->status == "safe")
                                                            <span class="badge bg-success">Aman</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Dibuat</b></td>
                                                    <td>:</td>
                                                    <td>{{ $bird->created_at }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Diubah</b></td>
                                                    <td>:</td>
                                                    <td>{{ $bird->updated_at }}</td>
                                                </tr>

                                            </table>
                                            <!-- detail bird button -->
                                            <a href="{{ route('birds.show', $bird->id) }}" class="btn btn-primary">Lihat Detail</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('birds.edit', $bird->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('birds.destroy', $bird->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            @if($bird->is_deleted)
                                                <form action="{{ route('birds.restore', $bird->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Restore</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $birds->links() }}


                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Admin</div>
                    <div class="card-body">
                        <!-- create two stack button for create bird_family and birds -->
                        <a href="{{ route('bird_family.index') }}" class="btn btn-primary">List Family</a>
                        <a href="{{ route('bird_genus.index') }}" class="btn btn-primary">List Genus</a>
                        <a href="{{ route('birds.create') }}" class="btn btn-primary">Buat Burung</a>

                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-header">Log Activity</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $log)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $log->message }}</td>
                                        <td>{{ $log->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $logs->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
