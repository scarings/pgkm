 <?php
function getURL()
{
$url="http://103.252.163.10:8085/kimia_farma/index.php/apicontroller/listobat";
    //  Initiate curl
$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$buffer=curl_exec($ch);
$result = json_decode($buffer,true);
// Closing
curl_close($ch);
return $result;

//var_dump($result);
//echo $result->nama_obat;
//return $result;
// Will dump a beauty json :3
//var_dump(json_decode($result, true));

}
$data=getURL();

 ?>

 <!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="materialize/css/style.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>

    <body>
  <div class="navbar-fixed">
      <nav class="indigo darken-4">
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo"><img src="materialize/img/Kimia_farma.png" class="responsive-img"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Item 1</a></li>
        <li><a href="components.html">Item 2</a></li>
      </ul>
    </div>
  </nav>
   </div>
  <div class="preloader-wrapper big active" id="preload" style="margin-left:45%; margin-top:20%;">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>

<div id="tes" style="display:none;">
    <div class="col s12" style="margin-top:5%;">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Test 1</a></li>
        <li class="tab col s3"><a  href="#test2">Test 2</a></li>

      </ul>
    </div>
    <div id="test1" class="col s12">
      <?php
foreach ($data as $key) {


?>
      <div class="row">
          <div class="col s12">
          <div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <a href="detail.php"><img  src="http://ahlikolesterol.com/wp-content/uploads/2015/02/obat-obatan.jpg"></a>
        </div>
        <div class="card-content">
          <span class="card-title activator grey-text text-darken-4"><h6 class="potong"><?php echo $key['nama_obat']; ?></h6> <i class="mdi-navigation-more-vert right"></i></span>
          <p><h6 class="price">Rp.500</h6></p>
        </div>
        <div class="card-reveal">
          <span class="card-title grey-text text-darken-4"><?php echo $key['nama_obat']; ?><i class="mdi-navigation-close right"></i></span>
          <p><?php echo $key['jenis_obat']; ?></p>
        </div>
      </div>
        </div>
       
      </div>
      <?php
    }
       ?>
    </div>
    <div id="test2" class="col s12">Test 2</div>
</div>
</div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="materialize/js/jquery.min.js"></script>
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>


        <script type="text/javascript">
  $( document ).ready(function() {
     $('.button-collapse').sideNav({menuWidth: 240, activationWidth: 70});
      $('#preload').fadeOut();
      $('#tes').show();
});
  </script>
    </body>
  </html>