<div class="row">
  <div class="col s8 offset-s2">
    <div class="row">
      <div class="col s12 deep-purple-text">
        <h3>{{$user->name}}'s Portfolio</h3>
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
              <div class="col s1 remove">
                @if (auth()->user()->portfolio->stocks->contains($stock->id))
                  <form class="" action="/portfolio/remove_stock" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="stock_id" value="{{$stock->id}}">
                    <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="remove from portfolio"><i class="material-icons">remove</i></button>
                  </form>
                @else
                  <form class="" action="/portfolio/add_stock" method="post">
                    {{  csrf_field() }}
                    <input type="hidden" name="stock_id" value="{{$stock->id}}">
                    <button type="submit" name="action" class="btn-floating waves-effect waves-light red" title="add to portfolio"><i class="material-icons">add</i></button>
                  </form>
                @endif

              </div>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
