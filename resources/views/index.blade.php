@extends('layouts.app')

@section('content')
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-8">
      <h1 class="m-0 text-dark">
          Suggestions
      </h1>
    </div>
    <div class="col-4">
      <h1 class="text-right">
          <a class="btn btn-primary align-middle" href="{{ route('suggestions.create') }}">Add New</a>
      </h1>
    </div>
  </div>
</div>
</section>
<section class="content">
  <div class="container-fluid">

    @include('flash::message')

    <div class="row">
      @include('suggestion-box::lists')
    </div>

    {{ $suggestions->links() }}

  </div>
</section>
@endsection
