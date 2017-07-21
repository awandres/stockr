<div class="row">
  <div class="col s8 offset-s2">
    <div class="row">
      <div class="col s12 deep-purple-text">
        <h3>Your Portfolio</h3>
      </div>
    </div>
    <div class="row">
      <div id="stocksList" class="col s12 collection">
        @foreach ($portfolio->stocks as $stock)
          <a href="/stocks/{{$stock->slug}}" class="collection-item">
            <div class="row valign-wrapper stock-info">

              <div class="col s2 symbol">
                {{$stock->symbol}}
              </div>
              <div class="col s6">
                {{$stock->name}}
              </div>
              <div class="col s2 price offset-s2">
                <div class="preloader-wrapper small active">
                  <div class="spinner-layer">
                    <div class="circle-clipper left">
                      <div class="circle"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
