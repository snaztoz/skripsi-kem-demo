@extends('layouts.base')

@section('title', 'Keys Generation')

@section('content')
  <x-header currentPage="keys-generation" />

  <h1 class="text-center">Keys Generation</h1>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <x-keys-generation-form />
        <hr />
        <x-keys-generation-result :$generationResult />
      </div>
    </div>
  </div>
@endsection
