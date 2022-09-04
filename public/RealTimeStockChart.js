define(["require", "exports", 'Scripts/MindFusion.Charting'], function (require, exports, m) {
    "use strict";
	
	var Charting = m.MindFusion.Charting;
	var Controls = m.MindFusion.Charting.Controls;
	var Collections = m.MindFusion.Charting.Collections;
	var Drawing = m.MindFusion.Charting.Drawing;
	
	var stockChart = new Controls.CandlestickChart(document.getElementById('stockChart'));
	
	stockChart.title = "The Big Corporation";
	stockChart.theme.titleFontSize = 16;
	
	stockChart.candlestickWidth = 12;
	
	stockChart.showLegend = false;
	stockChart.showXCoordinates = false;
	stockChart.xAxisLabelRotationAngle = 30;
	
	stockChart.xAxis.minValue = 0;
	stockChart.xAxis.interval = 1;
	stockChart.xAxis.maxValue = 40;
	stockChart.xAxis.title = "Time";
	stockChart.yAxis.title = "Price";
	
	stockChart.gridType = Charting.GridType.Horizontal;
	stockChart.theme.gridColor1 = new Drawing.Color("#ffffff");
	stockChart.theme.gridColor2 = new Drawing.Color("#fafafa");
	stockChart.theme.gridLineColor = new Drawing.Color("#cecece");
	stockChart.theme.gridLineStyle = Drawing.DashStyle.Dash;
	
	stockChart.plot.seriesStyle = new Charting.CandlestickSeriesStyle(new Drawing.Brush("#ff2f26"), new Drawing.Brush("#00b140"), new Drawing.Brush("#2e2e2a"), 2, Drawing.DashStyle.Solid, stockChart.plot.seriesRenderers.item(0));
	
	stockChart.theme.axisLabelsBrush = stockChart.theme.axisTitleBrush = stockChart.theme.axisStroke = new Drawing.Brush("#2e2e2e"); 
	stockChart.theme.highlightStroke = new Drawing.Brush("#cecece");
	
	
	
	var dataList = new Collections.List();
	updateStock();
	
	function updateStock()
	{
		$.getJSON("https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY&symbol=AAPL&interval=1min&apikey=KOE7PMEOOPD18BYD", function(json) {
		
		    var times = json["Time Series (1min)"];
			
			var update = false;
			
			if(stockChart.series.count() > 0)
				  update = true;
			  
			  for(var time in times)
			  {
				  var stock_info = times[time];
				  
				  var dataItem = new Charting.StockPrice(stock_info["1. open"], stock_info["4. close"], stock_info["3. low"],
				  stock_info["2. high"], new Date(time));
				  
				  dataList.add(dataItem);
				  
				  if(update)
				  {
					  dataList.removeAt(0);
					  break;
				  }                				  
				   
			  }
			  
			 
			  
			  var series = new Charting.StockPriceSeries(dataList);
			  series.dateTimeFormat = Charting.DateTimeFormat.ShortTime;
			  
			  var data = new Collections.ObservableCollection();
			  data.add(series);
			  stockChart.series = data;
			  stockChart.draw();
			  
			  
		});
	}
	
	setInterval(updateStock, 5000);
	
});