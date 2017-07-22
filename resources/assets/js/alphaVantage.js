$(document).ready(function(){

  const $stocksList = $('#stocksList');
  const $stockPage = $('#stockPage');
  const day = new Date(new Date().setDate(new Date().getDate()-1)).toISOString().split('T')[0].toString();

  if ($stocksList.length > 0) {
    const $stockRows = $stocksList.find('.stock-info');

    for (let i = 0; i < $stockRows.length; i++) {
      const $stockRow = $($stockRows[i]);

      const symbol = $stockRow.find('.symbol').text().trim();

      requestTimeSeries(symbol, function(result) {
        const price = parseFloat(result['Time Series (Daily)'][day]['4. close'], 2).toFixed(2);

        $stockRow.find('.price').text('$' + price);
      });
    }
  } else if ($stockPage.length > 0) {
    const symbol = $stockPage.data('stock-symbol');

    requestTimeSeries(symbol, function(result) {
      const price = parseFloat(result['Time Series (Daily)'][day]['4. close'], 2).toFixed(2);

      $stockPage.find('.price').text('$' + price);

      buildChart(processData(result));

      chartButtonListener();
    });
  }
});

function requestTimeSeries(symbol, callBack, timeframe = "daily",) {
  const url = "https://www.alphavantage.co/query?function=TIME_SERIES_" + timeframe.toUpperCase() + "&symbol="+ symbol+"&apikey=0YYNS3HALJIQTTGC";

  $.ajax({
    url: url,
    success: function(result) {
      callBack(result);
    }
  });
}

function processData(rawData) {
  let metaData;
  let stockData;
  let isMonthly = false;

  for (key in rawData) {
    if (rawData.hasOwnProperty(key)) {

      if (key.indexOf('Meta Data') !== -1) {
        metaData = rawData[key];
      } else if (key.indexOf('Time Series') !== -1) {
        stockData = rawData[key];
        if (key.indexOf('Monthly') !== -1) {
          isMonthly = true;
        }
      }
    }
  }

  let processedData = [];
  let labels = [];
  let dataObj = {};
  let maxDays = 30;
  let maxMonths = 12;

  for (time in stockData) {
    if (stockData.hasOwnProperty(time)) {
      let timeCoord = time;

      if (time.indexOf(' ') !== -1) {
        timeCoord = time.substr(0, time.indexOf(' '));
      }

      if (isMonthly) {
        timeCoord = moment(timeCoord).format('MMMM');
      }

      processedData.unshift({
        x: timeCoord,
        y: stockData[time]['4. close']
      });

      if (isMonthly) {

        labels.unshift(timeCoord);

        maxMonths--;

        if (maxMonths === 0) {
          break;
        }
      } else {
        labels.unshift(timeCoord);

        maxDays--;

        if (maxDays === 0) {
          break;
        }
      }
    }
  }

  dataObj = {
    labels: labels,
    datasets: [
      {
        label: metaData['2. Symbol'] + '-' + metaData['1. Information'].split(' ').shift(),
        data: processedData
      }
    ]
  }

  return dataObj;
}

function buildChart(data) {
  const ctx = document.getElementById('stockChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'line',
    data: data,
  });

  $('#chartLoader').addClass('hide');

}

function chartButtonListener()  {
  const $chartButtons = $('.chart-btns a');
  const symbol = $('#stockSymbol').text();

  $chartButtons.on('click', function(event) {
    event.preventDefault();

    const $loader = $('#chartLoader');
    const timeframe = event.target.getAttribute('data-timeframe');
    const $chartCanvas = $('#stockChart');

    $loader.removeClass('hide');
    $chartCanvas.remove();
    $('.chart-container').append('<canvas id="stockChart" width="600" height="400"></canvas>')

    requestTimeSeries(symbol, function(result) {
      buildChart(processData(result));
    }, timeframe);
  });
}

function getLastTwelveMonths() {

}
