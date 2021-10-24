@include('inc')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"> </script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


<div class="container">
    @if(isset($device))
<script>
    var AQI = [];
    var O3 = [];
    var NO2 = [];
    var SO2 = [];
    var CO = [];
    var PM10 = [];
    var PM2_5 = [];
    var date = [];
    @foreach ($device->measurement as $data)
    @if($data->Chem_AQI>0)
    AQI.push({!! $data->Chem_AQI !!});
    @else
    AQI.push(0);
    @endif

    @if($data->Chem_O3>0)
    O3.push({!! $data->Chem_O3 !!});
    @else
    O3.push(0);
    @endif

    @if($data->Chem_NO2>0)
    NO2.push({!! $data->Chem_NO2 !!});
    @else
    NO2.push(0);
    @endif

    @if($data->Chem_SO2>0)
    SO2.push({!! $data->Chem_SO2 !!});
    @else
    SO2.push(0);
    @endif

    @if($data->Chem_CO>0)
    CO.push({!! $data->Chem_CO !!});
    @else
    CO.push(0);
    @endif

    @if($data->Chem_PM10>0)
    PM10.push({!! $data->Chem_PM10 !!});
    @else
    PM10.push(0);
    @endif

    @if($data->Chem_PM2_5>0)
    PM2_5.push({!! $data->Chem_PM2_5 !!});
    @else
    PM2_5.push(0);
    @endif


    date.push(new Date("{{$data->created_at}}"));
    @endforeach
    
    </script> 
<div id='Graph'  style="height: 500px; width:100%;">              
    <script> 
    var trace1 = {
        x: date,
        y: AQI,
        type: 'scatter',
        name: 'AQI',
        xaxis: "x4",
        yaxis: "y4", 
        mode: 'markers',
    };
    var trace2 = {
        x: date,
        y: O3,
        type: 'scatter',
        name: 'O3',
        xaxis: "x4",
        yaxis: "y4",
        mode: 'markers',
    };
    var trace3 = {
        x: date,
        y: NO2,
        type: 'scatter',
        name: 'NO2',
        xaxis: "x4",
        yaxis: "y4",
        mode: 'markers',
    };
    var trace4 = {
        x: date,
        y: SO2,
        type: 'scatter',
        name: 'SO2',
        xaxis: "x4",
        yaxis: "y4",
        mode: 'markers',
    };
    var trace5 = {
        x: date,
        y: CO,
        type: 'scatter',
        name: 'CO',
        xaxis: "x4",
        yaxis: "y4",
        mode: 'markers',
    };
    var trace6 = {
        x: date,
        y: PM10,
        type: 'scatter',
        name: 'PM 10',
        xaxis: "x4",
        yaxis: "y4",
        mode: 'markers',
    };
    var trace7 = {
        x: date,
        y: PM2_5,
        type: 'scatter',
        name: 'PM 2.5',
        xaxis: "x4",
        yaxis: "y4",
        mode: 'markers',
    };
          
    var data = [trace1, trace2, trace3, trace4,trace5,trace6,trace7];
    var layout = {
      title:'Device Data'};
    Plotly.newPlot('Graph', data, layout);
    </script> 
        @endif
    </div>
    </div>