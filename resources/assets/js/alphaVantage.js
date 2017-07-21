$(document).ready(function(){

  const $stocksList = $('#stocksList');
  const $stockInfo = $('#stockPage');
  const day = new Date(new Date().setDate(new Date().getDate()-1)).toISOString().split('T')[0].toString();

  if ($stocksList.length > 0) {
    const $stockRows = $stocksList.find('.stock-info');

    for (let i = 0; i < $stockRows.length; i++) {
      const $stockRow = $($stockRows[i]);

      const symbol = $stockRow.find('.symbol').text().trim();

      requestDailyTimeSeries(symbol, function(result) {
        const price = parseFloat(result['Time Series (Daily)'][day]['4. close'], 2).toFixed(2);

        $stockRow.find('.price').text('$' + price);
      });
    }
  } else if ($stockInfo.length > 0) {
    const symbol = $stockInfo.data('stock-symbol');

    requestDailyTimeSeries(symbol, function(result) {
      const price = parseFloat(result['Time Series (Daily)'][day]['4. close'], 2).toFixed(2);

      $stockInfo.find('.price').text('$' + price);

      buildChart(processData(result));
    });
  }
});

function requestDailyTimeSeries(symbol, callBack) {
  $.ajax({
    url: "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY_ADJUSTED&symbol="+ symbol+"&apikey=0YYNS3HALJIQTTGC",
    success: function(result) {
      callBack(result);
    }
  });
}

function requestWeeklyTimeSeries(symbol, callBack) {
  $.ajax({
    url: "https://www.alphavantage.co/query?function=TIME_SERIES_WEEKLY_ADJUSTED&symbol="+ symbol+"&apikey=0YYNS3HALJIQTTGC",
    success: function(result) {
      callBack(result);
    }
  });
}

function requestMontlyTimeSeries(symbol, callBack) {
  $.ajax({
    url: "https://www.alphavantage.co/query?function=TIME_SERIES_MONTHLY_ADJUSTED&symbol="+ symbol+"&apikey=0YYNS3HALJIQTTGC",
    success: function(result) {
      callBack(result);
    }
  });
}

function processData(rawData) {
  const metaData = rawData['Meta Data'];
  const stockData = rawData['Time Series (Daily)'];

  let processedData = [];
  let labels = [];
  let dataObj = {};
  let maxDays = 30;

  for (day in stockData) {
    if (stockData.hasOwnProperty(day)) {
      let dayCoord = day;

      if (day.indexOf(' ') !== -1) {
        dayCoord = day.substr(0, day.indexOf(' '))
      }

      processedData.push({
        x: dayCoord,
        y: stockData[day]['4. close']
      });

      labels.unshift(dayCoord);

      maxDays--;

      if (maxDays === 0) {
        break;
      }
    }
  }
  console.log(processedData);

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
  console.log(data);
  const ctx = document.getElementById('stockChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'line',
    data: data,
  });

  $('#chartLoader').addClass('hide');

}
