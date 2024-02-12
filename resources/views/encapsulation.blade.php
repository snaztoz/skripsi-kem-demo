@extends('layouts.base')

@section('title', 'Encapsulation')

@section('content')
  <x-header currentPage="encapsulation" />

  <h1 class="text-center">Encapsulation</h1>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <x-encapsulation-form />
        <hr />
        <x-encapsulation-result :$encapsulationResult />
      </div>
    </div>
  </div>
@endsection
