@forelse($suggestions as $suggestion)
  <div class="col-sm-12">
    <div class="card suggestion">
      <div class="card-body">
        <div class="float-right">
          <span class="fa fa-clock-o fa-fw"></span> <span class="badge badge-pill badge-secondary">{{ $suggestion->created_at->diffForHumans() }}</span>
          <span class="fa fa-commenting-o fa-fw"></span> <span class="badge badge-pill badge-secondary">{{ $suggestion->comments->count() }}</span>
          <div class="dropdown d-inline">
            <span class="badge badge-pill badge-primary text-center"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-ellipsis-v fa-fw"></i>
            </span>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="{{ route('suggestions.edit', $suggestion) }}">Edit</a>
              <a class="dropdown-item bg-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-{{$suggestion->id}}').submit();">
                  Remove
              </a>
              <form id="logout-form-{{ $suggestion->id }}" action="{!! route('suggestions.destroy', $suggestion) !!}" method="POST" style="display: none;">
                @method('DELETE')
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        </div>

        <img src="{{ route('getAvatar', $suggestion->user_id) }}" class="img-icon image-elevation-2">


        <div class="description">
          <h5 class="card-title font-weight-bold"><a href="{{ route('suggestions.show', $suggestion) }}">{{ $suggestion->subject }}</a></h5>
          <p class="card-text">{!! $suggestion->description !!}</p>
        </div>
      </div>
    </div>
  </div>
@empty
  <div class="col">
    <div class="alert bg-dark">
      <p class="mb-0">There are no suggestions yet! Start creating one by going <a class="btn-link" href="{{ route('suggestions.create') }}">here</a></p>
    </div>
  </div>
@endforelse
