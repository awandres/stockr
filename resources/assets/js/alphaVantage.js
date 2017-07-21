$(document).ready(function(){

  const $stocksTable = $('#stocksTable');

  if ($stocksTable.length > 0) {
    const $stockRows = $stocksTable.find('tr.stock-info');
    const yesterday = new Date(new Date().setDate(new Date().getDate()-1)).toISOString().split('T')[0].toString();

    for (let i = 0; i < $stockRows.length; i++) {
      const $stockRow = $($stockRows[i]);

      const symbol = $stockRow.find('.symbol').text().trim();

      requestDailyTimeSeries(symbol, function(result) {
        const price = parseFloat(result['Time Series (Daily)'][yesterday]['4. close'], 2).toFixed(2);

        $stockRow.find('.price').text('$' + price);
      });
    }
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
