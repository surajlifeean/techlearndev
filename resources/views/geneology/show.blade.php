<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{Auth::user()->fname}}'s Geneology</title>

    <link rel="stylesheet" href="{{asset('css/hierarchy-view.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>

    <!--Basic style-->    

    <!--Management Hierarchy-->
    <section class="management-hierarchy">
        <!-- 
        <h1> 1. Management Hierarchy</h1> -->
        <div class="hv-container">
            <div class="hv-wrapper" style="text-align: center">


                 <div id="chart_div" style="display: inline-block;"></div>

            </div>
      
        </div>

    </section>
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

        var dataarray1=[
          [{v:'A', f:'<a href={{route("my-geneology.show",1025)}}>A</a><img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'},'', 'The President'],
          [{v:'B', f:'Bjkjlk<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'},'A', 'VP'],
          [{v:'C', f:'C<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'A', ''],
          [{v:'D', f:'Dkjlkj<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'B', 'Bob Sponge'],
          [{v:'E', f:'Ehjh<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'B', ''],
          [{v:'F', f:'F<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'C', ''],
          [{v:'G', f:'G<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'C', ''],
          [{v:'N', f:'N<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'G', ''],
          [{v:'O', f:'O<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'G', ''],
          [{v:'H', f:'Hkjl<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'D', ''],
          ['Empty', 'D', ''],
          [{v:'J', f:'J<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'E', ''],
          [{v:'K', f:'K<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'E', ''],
          [{v:'L', f:'L<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'F', ''],
         [{v:'M', f:'M<img src="{{asset('/images/user.jpg')}}" style="border-radius: 50%; width:80px;height:auto;">'}, 'F', '']];
        // For each orgchart box, provide the name, manager, and tooltip to show.

        // console.log(dataarray1);

        data.addRows(dataarray);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
      }
</script>
</body>

</html>