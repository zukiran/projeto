<?php

namespace Hcode\Model;

use \Hcode\Model;
use \Hcode\DB\Sql;

class User extends Model{

  public static function login($login, $password){

    $sql = new Sql();
    $results = $sql -> select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
      ":LOGIN"=>$login
      ));
      if (count($results)===0) {
        throw new \Exception("Usuario ou senha Inválidos");
        }
    $data = $results[0];

    if(password_verify($password, $data["despassword"]) === true){

    $user = new user();
    $user -> setiduser($data["iduser"]);
    var_dump($user);
    exit;



  }else {
    throw new \Exception("Usuario ou senha Inválidos");
  }
  }

}

 ?>
