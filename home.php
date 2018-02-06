
<?php

require_once 'Membership.php';
$membership = New Membership();
$membership-> confirm_login();
?>

<html >
<br>
<br>
<br>

<div style="float: left";">

<form class="form-inline">
  <div class="form-group">
    <label for="exampleInputName2">City: &nbsp; </label>
    <input type="text" class="form-control" id="City" placeholder="City" required="">
  </div>
  <br>
  <div class="form-group">
    <label for="exampleInputEmail2">State:</label>
    <input type="email" class="form-control" id="State" placeholder="Two Letter Abbreviation" required="">
  </div>
  
  <br>
  <!--search users form with button -->
  
<button type="submit" id="search_Button"  Onclick="setUrl(); return false;" >Search Users</button>
</form>
</div>
</p>


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>MlMapper Map Page</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body{
      padding-top: 70px;
    }
</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MLMapper</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php" target="_self">Home</a></li>
        <li><a href="about.php" target="_self">About</a></li>
        <li><a href="contact.php" target="_self">Contact</a></li>
        <li><a href="login.php?status=loggedOut" target="_self">Log Out</a></li>

      </ul>
    </div>
  </div>
</nav>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin-left: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(39.833333, -98.583333),
          zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://192.168.64.2/xmldb.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('First_Name');
              var name = markerElem.getAttribute('City');
              var address = markerElem.getAttribute('State');
              var type = markerElem.getAttribute('Phone_Number');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('Latitude')),
                  parseFloat(markerElem.getAttribute('Longitude')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name + ", "
              infowincontent.appendChild(strong);
              

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));
              //make clickable link
              var a = document.createElement('a');
              var linkText = document.createTextNode("Show users here");
              a.appendChild(linkText);
              a.title = "Show users";
              a.href = "test.php?city="+name+"&state="+address;
              infowincontent.appendChild(a);
              //
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyB2KxZ0mZh_3siIIVuC8YXkxnFPk-xs0rw &callback=initMap">
    </script>
  </body>

  <style type="text/css">
    p { margin-right: 90%; /* Or another measurement unit, like px */ }
  </style>
  <p>
  
</html>

<!--function defined for url with query string-->
<script type="text/javascript">
function setUrl() {
    window.location.href = 'test.php?city='+document.getElementById('City').value+'&state='+document.getElementById('State').value;
};
</script>