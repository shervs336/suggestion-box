@extends('layouts.app')

@section('content')
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-12">
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
      From Package
      @include('suggestion-box::lists')
    </div>

  </div>
</section>
@endsection
