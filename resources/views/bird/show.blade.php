@extends('layouts.app')

@section('content')
    <!-- create blank two column layout with same span inside container class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Detail Burung</div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{asset('images/'.$bird->image)}}" class="img-fluid">
                        </div>
                            <div class="col-md-6">
                            <table class="table table-striped">
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

                            </table>
                    </div>
                    </div>
                        <p>Deskripsi: </p>
                        <p>{{ $bird->description }}</p>
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
