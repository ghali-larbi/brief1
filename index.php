<?php
ini_set('display_errors', 'off');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
    body{
        overflow-x:hidden;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="menu.jpg" width="30" height="30" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">+2126543278</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href=""><i class="fa fa-facebook-square" aria-hidden="true"></i>
              <i class="fa fa-twitter-square" aria-hidden="true"></i>
              <i class="fa fa-instagram" aria-hidden="true"></i>

</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""></a>
              </li>             
          </ul>
        </div>
      </nav>
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="img1.jpg"  class="d-block w-100" height="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                
                </div>
              </div>
              <div class="carousel-item">
                <img src="img2.jpg"  class="d-block w-100" height="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                 
                </div>
              </div>
              <div class="carousel-item">
                <img src="img3.jpg"  class="d-block w-100" height="500" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
<div class="container-fluid">
  <div class="row">
     <div class=" col-12">
     <h1 class="mt-4 d-flex justify-content-center">le repat aujoud'hui</h1>
     </div>
     <?php
    include('connexion.php');
    $query="select nomRepat from menu";
    $result=$conn->query($query);
    $data=$result->fetchAll();
    $seed = floor(time()/(24 * 60 * 60));
    srand($seed);
   // print_r($data[$i]["nomRepat"]);
   $repat=rand(0,count($data));
?>
     <div class="mt-2 col-lg-6 col-12 d-flex justify-content-center">
     <div class="row">
      <div class="mt-2 col-12 d-flex justify-content-center"><img src="icone.png" alt="" height="100"></div>
      <span class="mb-5 col-8 h4 text-warning offset-1" ><?php  echo $data[$repat]['nomRepat'];?>..........................................</span><strong class="h4" >20dh </strong>    
     </div>
     </div>
     <div class=" mt-5 col-lg-6 col-12">
     <img src="image.jpg" alt="" width="600" height="300">
     </div>
  </div>
</div>

<div class="row">
<div class="mt-5 col-lg-6 col-12">
<img src="commander.jpg" alt=""width="500" height="300">
</div>
<div class="mt-5 col-6" >
  <div class="row ">
  <?php
  $nom=$_POST["nom"];
  $prenom=$_POST["prenom"];
  $telephone=$_POST["telephone"];
  $lieu=$_POST["lieu"];
    if(isset($_POST["commander"]))
    {
        $query="insert into client values(null,'".$nom."','".$prenom."','".$telephone."','".$lieu."')";
        $conn->exec($query);
      
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'larbighali89@gmail.com';                     // SMTP username
    $mail->Password   = 'Password';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('larbighali89@gmail.com',$nom);
    $mail->addAddress('larbighali89@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'commander un repat';
    $mail->Body    = 'commander  '.$data[$repat]['nomRepat'].'<p>nom/prenom : '.$nom.' '.$prenom.'</p>telephone : '.$telephone.'</p>' ;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "<div class='col-12 mt-5'><div class='col-6 offset-3 alert alert-success' role='alert'><p class='d-flex justify-content-center'>bien envoyer </p></div></div>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

    }
  ?>
  <form class="col-lg-6 col-12 offset-3" method="POST" >
  
  <div class="form-group">
    <label for="formGroupExampleInput">nom</label>
    <input type="text" class="form-control" name="nom"required >
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">prenom</label>
    <input type="text" class="form-control" name="prenom" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">numero telephone</label>
    <input type="text" class="form-control" name="telephone" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">lieu livraison</label>
    <input type="text" class="form-control" name="lieu" required>
  </div>
  <div class="col-12 offset-4">
  <button type="submit" class="btn btn-md btn-primary" name="commander">commander</button>
  </div>
</form>
  </div>
</div>
</div>
<footer class="mt-3 col-12 bg-dark">
<span class="d-flex justify-content-center text-white">copyright &copy;</span>
</footer> 












<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>