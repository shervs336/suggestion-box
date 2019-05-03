@foreach($suggestions as $suggestion)
  <div class="card">
    <div clas="card-body">
      $suggestion->description
    </div>
  </div>
@endforeach
