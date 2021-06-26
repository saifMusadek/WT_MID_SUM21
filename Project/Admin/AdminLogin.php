<?php  
  $usernameADlog = "";
  $err_usernameADlog = "";
  $passwordAD="";
  $err_passwordAD="";
  $sampleUser = "AIUB";

  $hasError = false;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["usernameADlog"])){
      $err_usernameADlog = "This field cannot be empty! ";
      $hasError = true;
    }elseif(strcmp($_POST["usernameADlog"], $sampleUser) != 0){
      $err_usernameADlog = "No such Username exist!";
      $hasError = true;
    }else{
      $usernameADlog = $_POST["usernameADlog"];
    }

    if(empty($_POST["passwordAD"])){
      $err_passwordAD = "This field cannot be empty! ";
      $hasError = true;
    }elseif($_POST["passwordAD"] != "AIub#1000"){
        $err_passwordAD = "Password Incorrect";
        $hasError = true;
      }else{
      $passwordAD = $_POST["passwordAD"];
    }
  }

  if(!$hasError){
    echo "Log in success";

  }


?>


<html>
  <head>
    <title>Admin Login</title>
  </head>
  <body>
    <fieldset>
      <legend>
        <h1><b>Admin Login</b></h1>
      </legend>

      <form align="left" action="LogInSuccess.php" method="POST">
        <table>
          <tr>
            <td>Username:</td>
            <td><input type="text" name="usernameADlog" /></td>
            <td><span><?php echo $err_usernameADlog; ?></span><br /></td>
          </tr>

          <tr>
            <td>Password:</td>
            <td><input type="password" name="passwordAD" /></td>
            <td><span><?php echo $err_passwordAD; ?></span><br /></td>
          </tr>
          <tr><td><br><br><br></td></tr>
          <tr>
            <td>Do not have an account? <a href="../Admin/AdminSignin.php">Create an account</a></td>
          </tr>
          <tr>
            <td><input type="submit" value = "logIn"></td>
          </tr>
        </table>
      </form>
    </fieldset>

    <br>
    <p>
      Sample Username: AIUB</p>
      <p>
      Sample Password: AIub#1000
    </p>
  </body>
</html>
