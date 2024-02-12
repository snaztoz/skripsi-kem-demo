@extends('layouts.base')

@section('title', 'Decapsulation')

@section('content')
  <x-header currentPage="decapsulation" />

  <h1 class="text-center">Decapsulation</h1>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <x-decapsulation-form />
        <hr />
        <x-decapsulation-result :$decapsulationResult />
      </div>
    </div>
  </div>
@endsection
