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
      <div class="col-sm-12">
        <div class="card suggestion">
          <div class="card-body">
            <div class="float-right">
              <span class="fa fa-clock-o fa-fw"></span> <span class="badge badge-pill badge-secondary">{{ $suggestion->created_at->diffForHumans() }}</span>
            </div>

            <img src="{{ route('getAvatar', $suggestion->user_id) }}" class="img-icon image-elevation-2">

            <div class="description">
              <h5 class="card-title font-weight-bold"><a href="{{ route('suggestions.show', $suggestion) }}">{{ $suggestion->subject }}</a></h5>
              <p class="card-text">{!! $suggestion->description !!}</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-12">
        <form action="{{ route('comments.store', $suggestion) }}" method="POST">
          @method('POST')
          @csrf
          <div class="form-group">
            <textarea class="wysiwig" rows="5" name="message"></textarea>
          </div>
          <div class="form-group text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>

      <div class="col-sm-12">
        <h5 class="text-dark">
            Comments
        </h5>
      </div>

      @forelse($comments as $comment)
      <div class="col-sm-12">
        <div class="card suggestion">
          <div class="card-body">
            <div class="float-right">
              <span class="fa fa-clock-o fa-fw"></span> <span class="badge badge-pill badge-secondary">{{ $suggestion->created_at->diffForHumans() }}</span>
              <div class="dropdown d-inline">
                <span class="badge badge-pill badge-primary text-center"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-ellipsis-v fa-fw"></i>
                </span>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item bg-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-{{$comment->id}}').submit();">
                      Remove
                  </a>
                  <form id="logout-form-{{ $comment->id }}" action="{!! route('comments.destroy', [$suggestion, $comment]) !!}" method="POST" style="display: none;">
                    @method('DELETE')
                    {{ csrf_field() }}
                  </form>
                </div>
              </div>
            </div>

            <img src="{{ route('getAvatar', $comment->user_id) }}" class="img-icon image-elevation-2">

            <div class="description">
              <p class="card-text">{!! $comment->message !!}</p>
            </div>
          </div>
        </div>
      @empty
        <div class="col-sm-12">
          <div class="alert alert-info">
            <p class="mb-0">No Comments Found</p>
          </div>
        </div>
      @endforelse

      {{ $comments->links() }}
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
