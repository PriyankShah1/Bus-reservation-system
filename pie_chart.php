<?php  
 $connect = mysqli_connect("localhost", "root", "", "booking");  
 $querys = "SELECT Source, count(*) as number FROM bookingt GROUP BY Source";  
 $queryd = "SELECT Destn, count(*) as number FROM bookingt GROUP BY Destn";  
 $queryb = "SELECT Bus, count(*) as number FROM bookingt GROUP BY Bus";
 $results = mysqli_query($connect, $querys);  
 $resultd = mysqli_query($connect, $queryd);  
 $resultb = mysqli_query($connect, $queryb);  
 ?>  
 <!DOCTYPE html>  
 <html>  
        <head>  
            <title>Make Simple Pie Chart by Google Chart API with PHP Mysql</title>  
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
            <script type="text/javascript">  
            google.charts.load('current', {'packages':['corechart']});  
            google.charts.setOnLoadCallback(drawCharts);  
            google.charts.setOnLoadCallback(drawChartd);
            google.charts.setOnLoadCallback(drawChartb);
    
            function drawCharts()  
            {  
                    var data = google.visualization.arrayToDataTable([  
                            ['Source', 'Number'],  
                            <?php  
                            while($row = mysqli_fetch_array($results))  
                            {  
                                echo "['".$row["Source"]."', ".$row["number"]."],";  
                            }  
                            
                            ?>  
                        ]);  
                    var options = {  
                        title: 'Percentage of Source selected',  
                        is3D:true,  
                            //pieHole: 0.4  
                        };  
                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3ds'));  
                    chart.draw(data, options);  
            } 

            function drawChartd()  
            {  
                    var data = google.visualization.arrayToDataTable([  
                            ['Destn', 'Number'],  
                            <?php  
                            while($row = mysqli_fetch_array($resultd))  
                            {  
                                echo "['".$row["Destn"]."', ".$row["number"]."],";  
                            }  
                            
                            ?>  
                        ]);  
                    var options = {  
                        title: 'Percentage of Destination selected',  
                        is3D:true,  
                        //pieHole: 0.4  
                        };  
                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3dd'));  
                    chart.draw(data, options);  
            }   

            function drawChartb() {
                var data = google.visualization.arrayToDataTable([
                    ['Bus', 'Number'],  
                        <?php  
                        while($row = mysqli_fetch_array($resultb))  
                        {  
                            echo "['".$row["Bus"]."', ".$row["number"]."],";  
                        }  
                        
                        ?>  
                ]);

                var options = {  
                        title: 'Percentage of popular buses selected',  
                        is3D:true,  
                        //pieHole: 0.4  
                        };  

                var chart = new google.visualization.ColumnChart(document.getElementById("piechart_3db"));
                    chart.draw(data, options);

            }

            </script>  

            <style>

                * {
                  
                }

                h1{
                    text-align: center;
                    font-size: 40px;
                    color: #FF6600; 
                }

                #piechart_3ds,#piechart_3dd,#piechart_3db {
                    width: 600px; 
                    height: 500px;
                    display: flex;
                }

                #div1{
                    width: 600px;
                    float:left;
                    border: 2px solid;
                    margin-left: 5px;
                }

                #div2{
                    width: 600px;
                    float:right;
                    border: 2px solid;
                    margin-right: 5px;
                }

                #div3{
                    width: 600px;
                    border: 2px solid;
                    margin-left: 25%;
                }

                hr{
                    width: 100%;
                }

            </style>

        </head>  
      <body>  
            <h1>Choose Wisely !!!</h1>
           <br /><br />  
            <div id="main">
                <div id="div1">
                    <h3 align="center">Analysis of Source :</h3>  
                    <br />  
                    <div id="piechart_3ds"></div>  
                </div>
                <div id="div2" >
                    <h3 align="center">Analysis of Destination :</h3>  
                    <br />  
                    <div id="piechart_3dd"></div>
            </div>
            <hr>
            <br /><br />  
            <div id="div3" >
                    <h3 align="center">Analysis of popular Buses :</h3>  
                    <br />  
                    <div id="piechart_3db"></div>
            </div> 
      </body>  
 </html>  