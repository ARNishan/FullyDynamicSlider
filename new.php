<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "test");
function make_query($connect)
{
$query = "SELECT * FROM post";
$result = mysqli_query($connect, $query);
return $result;
}
function make_slide_indicators($connect)
{
$output = '';
$count = 0;
$result = make_query($connect);
while($row = mysqli_fetch_array($result))
{
if($count == 0)
{
$output .= '
<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
';
}
else
{
$output .= '
<li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
';
}
$count = $count + 1;
}
return $output;
}
function make_slides($connect)
{
$output = '';
$count = 0;
$result = make_query($connect);
while($row = mysqli_fetch_array($result))
{
if($count == 0)
{
$output .= '<div class="item active">';
  }
  else
  {
  $output .= '<div class="item">';
    }
    $output .= '
    <style type="text/css">
    .img-responsive{
       height: 220px;
    width: 220px;
    margin-left: 245px;
    margin-top: 85px;
    }
    </style>
    <div class="container">
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <br>
          <br>
          <h1>'.$row["title"].'</h1>
          <p>'.$row["body"].'</p>
          <h4>Technology used :</h4> <h4>'.$row["tags"].'</h4>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <br>
          <br>
          <img class="img-responsive"  src="'.$row["image"].'"  alt="'.$row["title"].'" />
        </div>
      </div>

    </div>
  </div>

  ';
  $count = $count + 1;
  }
  return $output;
  }
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <title>Portfolio</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style type="text/css">
      @media screen and (min-width: 768px){
      .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev {
      margin-left: -30px;
      }
    }
      .carousel-control:focus, .carousel-control:hover {
      color: #a50b0b;
      text-decoration: none;
      filter: alpha(opacity=90);
      outline: 0;
      opacity: .9;
      }
      .carousel-control {
      background-image:none !important;
      filter:none !important;
      }
      </style>
    </head>
    <body>
      <br />
      <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php echo make_slide_indicators($connect); ?>
        </ol>
        <div class="carousel-inner">
          <?php echo make_slides($connect); ?>
        </div>





        <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <img src="assets/web.png" style=" margin-left: 870px;
    height: 500px;
    width: 350px;
    margin-top: -320px;
">

    </body>