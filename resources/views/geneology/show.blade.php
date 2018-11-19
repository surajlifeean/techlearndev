@extends('main')

@section('stylesheets')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{Auth::user()->fname}}'s Geneology</title>

    <link rel="stylesheet" href="{{asset('css/hierarchy-view.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style type="text/css">
    section .hv-container {
    flex-grow: 1;
    overflow: hidden;
    justify-content: center;
}
table {
border-collapse: separate!important; 
}

div.chart_div table {
    width: auto;
    margin: 0 auto !important;
}


.chart_box {
  width: 900px;
  margin: 0 auto;
}
/*
.google-visualization-orgchart-node {
    text-align: center;
    vertical-align: middle;
    font-family: arial,helvetica;
    cursor: default;
    border: 0px solid #b5d9ea;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -webkit-box-shadow: rgba(0, 0, 0, 0.5) 3px 3px 3px;
    -moz-box-shadow: rgba(0, 0, 0, 0.5) 3px 3px 3px;
    background-color: #edf7ff;
    background: -webkit-gradient(linear, left top, left bottom, from(#edf7ff), to(#cde7ee));
}*/
    </style>
@endsection

@section('content')
    <!--Basic style-->    

    <!--Management Hierarchy-->

<section class="dashboard-section">

@include('partials._sidenav')

<div class="dashboard-area">
            <div class="dashboard-area-top">
                <a href="javascript:void(0);" class="dashboard-collapse"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> &nbsp; &nbsp;Dashboard</a>
            </div>

<div class="p-3 card-wrap">
    <section class="management-hierarchy">
        <!-- 
        <h1> 1. Management Hierarchy</h1> -->
        <div class="hv-container">
            <div class="hv-wrapper" style="text-align: center">

<div class="chart_box">

                 <!-- <div id="chart_div" style="display: inline-block;"></div> -->
  <div id="chart_div" style='width: 900px; height: 600px;'></div>
</div>
            </div>
      
        </div>

    </section>
    </div>
</div>
</section>
@endsection

@section('scripts')

<script type="text/javascript">
          google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');


        var jArray= <?php echo json_encode($teamArray); ?>;

        console.log(jArray);

        var dataarray=jArray;

        // myDataTable.setRowProperty(3, 'style', 'border: 1px solid green');
        // var dataarray1=[
        //   [{v:'A', f:'<a href={{route("my-geneology.show",1025)}}>A</a><img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'},'', 'The President'],
        //   [{v:'B', f:'Bjkjlk<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'},'A', 'VP'],
        //   [{v:'C', f:'C<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'A', ''],
        //   [{v:'D', f:'Dkjlkj<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'B', 'Bob Sponge'],
        //   [{v:'E', f:'Ehjh<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'B', ''],
        //   [{v:'F', f:'F<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'C', ''],
        // 2 [{v:'G', f:'G<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'C', ''],
        //   [{v:'N', f:'N<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'G', ''],
        //   [{v:'O', f:'O<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'G', ''],
        //   [{v:'H', f:'Hkjl<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'D', ''],
        //   ['Empty', 'D', ''],
        //   [{v:'J', f:'J<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'E', ''],
        //   [{v:'K', f:'K<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'E', ''],
        //   [{v:'L', f:'L<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'F', ''],
        //  [{v:'M', f:'M<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'F', '']];
        // For each orgchart box, provide the name, manager, and tooltip to show.

        // console.log(dataarray1);

        data.addRows(dataarray);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});

        chart.setRowProperty(2, 'style', 'border: 0px solid green');
      }


      // document.getElementsByClassName('google-visualization-orgchart-node').style.border = "0px solid #b5d9ea";
</script>


@endsection