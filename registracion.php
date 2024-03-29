<?php
require_once("funciones.php");

// Genero variables default para persistencia.
$nombreDefault = "";
$telefonoDefault = "";
$emailDefault = "";
// $fechaDefault = "";

//Verifico si vengo por Post.
if ($_POST){
  $datosIngresados = $_POST;
  // Validar.
  $errores = validarRegistracion($datosIngresados);

  //Si no hay errores:
  if(empty($errores)){
    //Registrar al usuario.->proxima clase
    //Reenviarlo a la pág. de éxito.
    header("Location:exito.php");exit;
  }
  //Si sí hay errores.
    //Muestro los errores.
    foreach ($errores as $error) {
      echo $error . "<br>";
    }

  //Armar la persistencia de los datos ingresados.
  if(isset($errores["name"]) == false){
    $nombreDefault = $_POST["name"];
  }

  $telefonoDefault = $_POST["phone"];

  if (isset($errores["email"]) == false) {
    $emailDefault = $_POST["email"];
  }


}


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>

                    <!-- FORMULARIO -->

                    <form method="POST" action="registracion.php">
                        <div class="input-group">
                            <input class="input--style-3" type="text"
                            placeholder="Name" name="name" value="<?=$nombreDefault?>">
                            <div class="">
                              <?php if($_POST && isset($errores["name"])){
                                echo '<h3 class="input--style-3">' . $errores["name"] . "</h3>";
                              }
                                ?>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender">
                                  <?php if($_POST && $_POST["gender"] != ""): ?>
                                    <option disabled="disabled">Gender</option>
                                  <?php else: ?>
                                    <option disabled="disabled" selected="selected">Gender</option>
                                  <?php endif; ?>

                                    <?php if($_POST && $_POST["gender"] == "Male"): ?>
                                    <option selected>Male</option>
                                  <?php else: ?>
                                    <option>Male</option>
                                  <?php endif; ?>

                                  <?php if($_POST && $_POST["gender"] == "Female"):  ?>
                                    <option selected>Female</option>
                                  <?php else: ?>
                                    <option>Female</option>
                                  <?php endif; ?>

                                    <?php if($_POST && $_POST["gender"] == "Other"): ?>
                                    <option selected>Other</option>
                                  <?php else: ?>
                                    <option>Other</option>
                                  <?php endif; ?>



                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Email"
                             name="email" value="<?=$emailDefault?>">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password"
                            placeholder="Password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password"
                            placeholder="Password Confirmation" name="cpassword">
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Phone"
                             name="phone" value="<?= $telefonoDefault ?>">
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
