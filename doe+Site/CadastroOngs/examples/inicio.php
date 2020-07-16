<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE php>
<php lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logos/favicon.ico">
  <link rel="icon" type="image/png" href="../assets/img/logos/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administração e Controle
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/now-ui-dashboard.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script>

    carregarDados();

    var mes = new Array();
    var meses = new Array();
    var retornos = new Array();

  function carregarDados(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function(){	
      if(xhr.readyState==4 && xhr.status==200){
              mes[0] = formata(xhr.responseText);
              meses[0] = parseInt(mes[0]);
              mes[1] = formata(xhr.responseText);
              meses[1] = parseInt(mes[1]);
          }
    }
    xhr.open("GET","grafico-mes.php",true);
      xhr.send();

      //Grafico 1
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawMultSeries);

      function drawMultSeries() {
            var data = google.visualization.arrayToDataTable([
              ['Mês', 'N° de Doações'],
              ['Janeiro', meses[0]],
              ['Fevereiro', meses[1]],
              ['Março', 26],
              ['Abril', 20],
              ['Maio', 15],
              ['Junho', 52],
              ['Julho', 26],
              ['Agosto', 60],
              ['Setembro', 52],
              ['Outubro', 56],
              ['Novembro', 16],
              ['Dezembro', 64]
            ]);

            var options = {
              chartArea: {width: '100%', height: '100%'},
              width: '100%',
              height: 400,
              hAxis: {
                minValue: 0
              },
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
      }
  }	

    /* function formata(strDados){
      var objDados = JSON.parse(strDados);
      for(la of objDados['lista']){
          retornos[i] += la;
      }
    } */
  

  function formata(strDados){
      var objDados = JSON.parse(strDados);
      var jan = '';
      for(la of objDados['lista'][0]){
          jan += la;
      }
      return jan;
  }

  function formata2(strDados){
    var objDados = JSON.parse(strDados);
    var fev = '';
    for(la of objDados['lista'][1]){
      fev += la;
    }
    return fev;
  }

        //Grafico 2
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {
          var data = google.visualization.arrayToDataTable([
            ['Mês',  'Seguidores'],
            ['Jan', 8],
            ['Fev', 6],
            ['Mar', 6],
            ['Abr', 4],
            ['Mai', 10],
            ['Jun', 11],
            ['Jul', 14],
            ['Ago', 7],
            ['Set', 4],
            ['Out', 8],
            ['Nov', 12],
            ['Dez', 5],
          ]);

          var options = {
            chartArea: {width: 515},
            width: '100%',
            isStacked: true
          };

          var chart2 = new google.visualization.SteppedAreaChart(document.getElementById('chart2_div'));

          chart2.draw(data, options);
        }
  
  </script>
</head>

<body>