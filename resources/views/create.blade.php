@extends('layouts.app')

@section('content')
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-12">
      <h1 class="m-0 text-dark">
          Suggestions
      </h1>
    </div>
  </div>
</div>
</section>
<section class="content">
  <div class="container-fluid">

    <div class="row">
      <div class="col-8">
        <div class="card">
          <div class="card-header bg-primary">
            <h5 class="card-title">Create a new Suggestion</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('suggestions.store') }}">
              @method('POST')
              @csrf
              @include('suggestion-box::fields')
            </form>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection

@section('scripts')
  <script>
    ClassicEditor
        .create( document.querySelector( '.wysiwig' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>
@append
