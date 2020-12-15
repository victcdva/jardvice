@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="ct-chart" id="jardevicedatachart"></div>
          </div>
        </div>
      </div>
  </div>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-more.js"></script>
  <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript">

    var leveldata = <?php echo $leveldata; ?>;
    var createdat = <?php echo $createdat;?>;
    var jardata = <?php echo $jardata;?>;
 
    var converted = JSON.stringify(jardata);
    var parsed = JSON.parse(converted);
    
    
    console.log(leveldata);
    

    var gaugeOptions = {
    chart: {
        type: 'solidgauge'
    },
    title: null,
    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#EEE',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    exporting: {
        enabled: false
    },

    tooltip: {
        enabled: false
    },

    // the value axis
    yAxis: {
        stops: [
          [0, '#DF5353'], // red
          [76.38/95, '#DDDF0D'], // green
          [93/95, '#55BF3B'] // blue
        ],
        lineWidth: 0,
        tickWidth: 0,
        minorTickInterval: null,
        tickAmount: 2,
        title: {
            y: -70
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                y: 5,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('jardevicedatachart', Highcharts.merge(gaugeOptions, {
    
    yAxis: {
        min: 0,
        max: 100,
        title: {
            text: 'Content'
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Speed',
        data: [leveldata],
        dataLabels: {
            format:
                '<div style="text-align:center">' +
                '<span style="font-size:25px">{y}</span><br/>' +
                '<span style="font-size:12px;opacity:0.4">%</span>' +
                '</div>'
        },
        tooltip: {
            valueSuffix: ' km/h'
        }
    }]

}));





  </script>
@endsection
