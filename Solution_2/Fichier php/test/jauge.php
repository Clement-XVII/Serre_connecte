<?php
    $url=$_SERVER['REQUEST_URI'];
    header("Refresh: 5; URL=$url");
    /* Database connection settings */
    $servername = "localhost";
    $username = "clement";
    $password = "1234";
    $dbname = "test";
    $conn = mysqli_connect($servername, $username, $password, $dbname);


    $time = '';
    $temp = '';
    $hum = '';
    $today = date("Y-m-d H:i:s");
    $tommorow = date('Y-m-d H:i:s', strtotime($today . ' +1 day'));

    //query to get data from the table
    //'2021-04-13 00:00:00'
    $sql = "SELECT time, temp,hum FROM sensor ORDER BY id DESC";
    //$sql = "SELECT * FROM sensor WHERE id BETWEEN 50 AND 100";
    //"SELECT order_date, SUM(grand_total) AS total_grand  FROM orders GROUP BY order_date LIMIT = 15";
    $result = mysqli_query($conn, $sql);

    //loop through the returned data
    while ($row = mysqli_fetch_array($result)) {

        $time = $time . '"'. $row['time'].'",';
        $temp = $temp . '"'. $row['temp'] .'",';
        $hum = $hum . '"'. $row['hum'] .'",';
    }

    $time = trim($time,",");
    $temp = trim($temp,",");
    $hum = trim($hum,",");
?>
<!doctype html>
<html>
  <head>
  <meta charset="utf-8"/>
  <meta name="author" content="Clement-XVII">
  <title>Custom Sectors</title>
  <style type="text/css">
  body{
    font-family: Arial;
      margin: 80px 100px 10px 100px;
      padding: 0;
      color: white;
      text-align: center;
      background: #555652;
      background-image: url('test.jpg');
      background-size: cover;
      background-attachment: fixed;
  }
  .container {
            width: 450px;
            margin: 1px auto 0 auto;
            text-align: center;
        }

        .gauge {
            width: 450px;
            height: 450px;
        }
  .button {
      display: inline-block;
    padding: 15px 25px;
    font-size: 24px;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    outline: none;
    color: #fff;
    background-color: #222;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #999;
  }

  .button:hover {background-color: #3072ab}

  .button:active {
    background-color: #3072ab;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
  }
</style>
  </head>
  <body>
    <h1>Dernière température sous forme de jauge exprimer en degrès celsius</h1>
  <div class="container">
    <div id="g" class="gauge"></div>
    <div id="g1" class="gauge"></div>
    </div>
  <script src="raphael-2.1.4.min.js"></script>
  <script src="justgage.js"></script>
  <script>

    var g = new JustGage({
      id: "g",
      label: "température",
      value : [<?php echo $temp; ?>],
      symbol: ' °C',
      valueFontColor: "white",
      min: 0,
      max: 40,
      decimals: 2,
      gaugeWidthScale: 0.6,
      pointer: true,
      customSectors: [{
        color : "#ff0000",
          lo : 0,
          hi : 10
        },{
          color : "#ffff00",
          lo : 10,
          hi : 20
         },{
          color : "#00ff00",
          lo : 20,
          hi : 25
         },{
          color : "#ffff00",
          lo : 25,
          hi : 30
         },{
          color : "#ff0000",
          lo : 30,
          hi : 40
        }],
      });

    var g1 = new JustGage({
      id: "g1",
      label: "Humidité",
      value : [<?php echo $hum; ?>],
      symbol: ' %',
      valueFontColor: "white",
      min: 0,
      max: 100,
      decimals: 2,
      gaugeWidthScale: 0.6,
      pointer: true,
      customSectors: [{
        color : "#ff0000",
          lo : 0,
          hi : 30
        },{
          color : "#ffff00",
          lo : 30,
          hi : 40
         },{
          color : "#00ff00",
          lo : 40,
          hi : 70
         },{
          color : "#ffff00",
          lo : 70,
          hi : 80
         },{
          color : "#ff0000",
          lo : 80,
          hi : 100
        }],
      });


  </script>
  </body>
  <form>
  <button class=button type="button" onclick="document.location='http://localhost/test/datenter.php'">Tableau</button>
  <button class=button type="button" onclick="document.location='http://localhost/test/index.html'">Accueil</button>
  <button class=button type="button" onclick="document.location='http://localhost/test/graph.php'">Graphique</button>
    </form>
</html>
