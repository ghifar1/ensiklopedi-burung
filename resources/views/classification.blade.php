@extends('layouts.app')

@section('content')
    <!-- create blank two column layout with same span inside container class -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Peta Klasifikasi</div>
                    <div class="card-body">
                      @foreach($birdFamilies as $family)
                        <div class="card my-2">
                          <div class="card-header">
                            <a href={{route('bird_family.show', $family->id)}}>{{ $family->name }}</a>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              @foreach($family->bird_genera as $genus)
                                <div class="col-md-4">
                                  <a href={{route('bird_genus.show', $genus->id)}}>{{ $genus->name }}</a>
                                </div>
                                  <div class="col-md-6">
                                    @foreach($genus->birds as $bird)
                                      <a href="{{route('birds.show', $bird->id)}}">{{ $bird->species }}</a>
                                    @endforeach
                                  </div>
                              @endforeach
                            </div>
                          </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <!-- create two stack button for create bird_family and birds -->
                        <a href="{{ url('')}}" class="btn btn-primary">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
