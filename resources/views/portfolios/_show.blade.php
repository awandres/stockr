<div class="row">
  <div class="col s8 offset-s2">
    <div class="row">
      <div class="col s12 deep-purple-text">
        <h3>Your Portfolio</h3>
      </div>
    </div>
    <div class="row">
      <div class="col s12 collection">
        @foreach ($portfolio->stocks as $stock)
          <a href="/stocks/{{$stock->id}}" class="collection-item">{{$stock->symbol}}</a>
        @endforeach
      </div>
    </div>
  </div>
</div>