<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url(); ?>/assets/bd/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    <?= $title; ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="<?= base_url(); ?>/assets/bd/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= base_url(); ?>/assets/bd/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link href="<?= base_url(); ?>/assets/bd/css/black-dashboard.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="<?= base_url(); ?>/assets/bd/demo/demo.css" rel="stylesheet" /> -->
</head>

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('timejav').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
function startDate() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  var da = today.getDay();
  var mo = today.getMonth();
  var ye = today.getFullYear();
  m = checkDate(m);
  s = checkDate(s);
  document.getElementById('datejav').innerHTML =
  h + ":" + m + ":" + s + ' ' + da + '-' + mo + '-' + ye;
  var t = setTimeout(startDate, 500);
}
function checkDate(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
function start(){
  startDate();
  startTime();
}
</script>
<script type="text/javascript">
  function refreshPage () {
      var page_y = document.getElementsByTagName("body")[0].scrollTop;
      window.location.href = window.location.href.split('?')[0] + '?page_y=' + page_y;
  }
  window.onload = function () {
      setTimeout(refreshPage, 35000);
      if ( window.location.href.indexOf('page_y') != -1 ) {
          var match = window.location.href.split('?')[1].split("&")[0].split("=");
          document.getElementsByTagName("body")[0].scrollTop = match[1];
      }
  }
</script>

<body class="" onload="start()">
