<?php 

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");

try {
    $db = new PDO('mysql:host=localhost;dbname=animaux_V;charset=utf8', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
  } catch (PDOException $e) {
    echo "Connection failed : ". $e->getMessage();
  }



  $username = $_POST['username'];
  $password = $_POST['password'];

    try {
      $query = "select * from `users` where `username`=:username and `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      $stmt->bindValue('password', $password, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
		    session_start();
		  $db_username=$row['username'];
        $_SESSION["username"]=$db_username;
		$_SESSION['login_user_time']=time();
        echo $row['satuts'];
        return;
       
      } else {
        echo "nok";
        return;
      }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }

?>
