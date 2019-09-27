<?php

function validarRegistracion($datos) {
  $errores = [];

  //Validar nombre. Valida > 4 caracteres.
  if (strlen($datos["name"]) < 5){
    $errores["name"] = "El nombre debe contener más de 4 caracteres";
  }

  //Validar gender
  if (!isset($datos["gender"])){
    $errores["gender"] = "Debe seleccionar un gender";
  }

  //Validar password
  if ($datos["password"] == ""){
    $errores["password"] = "Debe completar el password";
  }

  //Validar confirmacion password completa.
  if ($datos["cpassword"] == ""){
    $errores["cpassword"] = "Debe completar la confirmación del password";
  }

  //Validar password sea igual a confirmar password.
  if($datos["password"] != $datos["cpassword"]){
    $errores["password_conf"] = "Password y confirmacion deben ser iguales";
  }

  //Validar email esté completo.
  if($datos["email"] == ""){
    $errores["email"] = "Debe completar el campo email";
  }

  //Validar email sea un email.
  if( filter_var($datos["email"], FILTER_VALIDATE_EMAIL) == false ){
    $errores["email"] = "Debe ingresar un mail válido";
  }

  return $errores;
}


function validateAge($birthday, $age = 18)
{
    // $birthday can be UNIX_TIMESTAMP or just a string-date.
    if(is_string($birthday)) {
        $birthday = strtotime($birthday);
    }

    // check
    // 31536000 is the number of seconds in a 365 days year.
    if(time() - $birthday < $age * 31536000)  {
        return false;
    }

    return true;
}

?>
