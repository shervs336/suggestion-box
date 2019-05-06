@forelse($suggestions as $suggestion)
  <div class="card">
    <div clas="card-body">
      $suggestion->description
    </div>
  </div>
@empty
  <div class="col">
    <div class="alert bg-dark">
      <p class="mb-0">There are no suggestions yet! Start creating one by going <a class="btn-link" href="{{ route('suggestions.create') }}">here</a></p>
    </div>
  </div>
@endforelse
