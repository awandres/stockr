<section class="section">
  <div class="col s12 center">
    <div class="row">
      <div class="col s12 chart-btns">
        <a href="#daily" data-timeframe="daily" class="waves-effect waves-purple btn-flat">Daily</a>
        <a href="#weekly" data-timeframe="weekly" class="waves-effect waves-purple btn-flat">Weekly</a>
        <a href="#monthly" data-timeframe="monthly" class="waves-effect waves-purple btn-flat">Monthly</a>
      </div>
    </div>
    <div class="row">
      <div class="col s12 chart-container">
        <div id="chartLoader" class="progress">
           <div class="indeterminate"></div>
        </div>
        <canvas id="stockChart" width="600" height="400"></canvas>
      </div>
    </div>
  </div>
</section>
