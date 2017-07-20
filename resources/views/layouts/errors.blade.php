@if (count($errors))
  <div class="card-panel red">
    <div class="alert alert-danger">
      <ul>
        <?php foreach ($errors->all() as $error): ?>
          <li>{{$error}}</li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
@endif
