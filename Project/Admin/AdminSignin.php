<?php
  $name="";
  $err_name="";
  $username="";
  $err_username="";
  $password="";
  $err_password = "";
  $confirm_password = "";
  $err_confirm_password= "";
  $email = "";
  $err_email = "";
  $lang ="";
  $err_lang = "";
  $street_address = "";
  $err_street_address="";
  $city = "";
  $err_city = "";
  $state = "";
  $err_state = "";
  $zip_code = "";
  $err_zip_code = "";
  $code = "";
  $err_code = "";
  $number = "";
  $err_number = "";
  $nid = "";
  $err_nid = "";
  $action = "";
  $hasError=false;
  function hasPassword($em){
    $num=0;
    $num2=0;
    $num3=0;
    $arr2 =[];
    $e = "#";

    if(strlen($em)<8){
        return false;
    }

    if(strpos($em, $e) == false){
        return false;
    }      

    for($i = 0; $i<strlen($em); $i++){
        $arr2[] = $em[$i];
    }


    foreach($arr2 as $e){
        if(is_numeric($e)){
            $num++;
        }
        if(ctype_upper ($e)){
            $num2++;
        }
        if(ctype_lower ($e)){
          $num3++;
      }
    }

    if($num == 0 and $num2 == 0 and $num3 == 0){
        return false;
    }

    return true;
  }




            if($_SERVER["REQUEST_METHOD"] == "POST"){
              
              if(empty($_POST["name"])){                            // NAME
                $err_name="Name Required";
                $hasError = true;

              }elseif(strlen($_POST["name"]) < 2){
                $err_name = "Name Must be greater than 2";
                $hasError = true;

              }else{
                $name = $_POST["name"];
              }
 
              if(empty($_POST["username"])){                      // USERNAME
                $err_username="Username Required";
                $hasError = true;

              }elseif(strlen($_POST["username"]) < 2){
                $err_username = "Username Must be greater than 2";
                $hasError = true;

              }else{
                $username = $_POST["username"];
              }

              if(empty($_POST["password"])){                    // PASSWORD
                $err_password="Password Required";
                $hasError = true;
            }elseif(strlen($_POST["password"]) < 8){
                    $err_password = "password must contain atleast 8 characters";
                    $hasError = true;
            }elseif(hasPassword($_POST["password"]) == false){
                $err_password = "password must contain at least 8 character, 1 special character(#),1 number and combination of uppercase and lowercase alphabet.";
                $hasError = true;
            }else{
                $password = $_POST["password"];
            }
    
            if(empty($_POST["confirm_password"])){                        // CONFIRM_PASSWORD
              $err_confirm_password = "This field cannot be empty";
              $hasError = true;
            }
            elseif($_POST["confirm_password"] != $_POST["password"] ){      
                $err_confirm_password="Password did not match!";
                $hasError = true;
            }else{
                  $confirmed_pass = $_POST["confirm_password"];
            }

            if(empty($_POST['email'])){                             //EMAIL
              $err_email = "Email cannot be empty";
              $hasError = true;
            }else{
              $email = $_POST["email"];
            }

            if(empty($_POST['lang'])){                             //LANG
              $err_lang = "Language cannot be empty";
              $hasError = true;
            }else{
              $lang = $_POST["lang"];
            }


            if(empty($_POST['street_address'])){                          // STREET_ADDRESS
              $err_street_address = "This field cannot be empty";
              $hasError = true;
            }else{
              $street_address = $_POST["street_address"];
            }
          
            if(empty($_POST['city'])){                                //CITY
              $err_city = "this field cannot be empty";
              $hasError = true;
            }else{
              $city = $_POST["city"];
            }

            if(empty($_POST['state'])){                                //STATE
              $err_state = "this field cannot be empty";
              $hasError = true;
            }else{
              $state = $_POST["state"];
            }
            
            if(empty($_POST["zip_code"])){                // ZIP_CODE
              $err_zip_code="Zip code required";
              $hasError = true;
          }elseif(strlen($_POST["zip_code"]) >5){
                  $err_zip_code = "Zip code must be 5 digit";
                  $hasError = true;
          }elseif(is_numeric($_POST["zip_code"])== false){
              $err_zip_code = "Zip code must me numeric";
              $hasError = true;
          }else{
                  $zip_code = $_POST["zip_code"];
          }

          if(empty($_POST["code"])){        // CODE
            $err_code="country code required";
            $hasError = true;
        }elseif(strlen($_POST["code"]) >3 and strlen($_POST["code"]) <1){
                $err_code = "Country code must be 2 or 3 digit";
                $hasError = true;
        }elseif(is_numeric($_POST["code"])== false){
            $err_code = "Country code must me numeric";
            $hasError = true;
        }else{
                $code = $_POST["code"];
        }

        if(empty($_POST["number"])){                // PHONE NUMBER
          $err_number="this field cannot be empty";
          $hasError = true;
      }elseif(strlen($_POST["number"]) !=11){
              $err_number = "phone no. must be 11 digits";
              $hasError = true;
      }elseif(is_numeric($_POST["number"])== false){
          $err_number = "phone no. must me numeric";
          $hasError = true;
      }else{
              $number = $_POST["number"];
      }


      if(empty($_POST["nid"])){                // NID
        $err_nid="this field cannot be empty";
        $hasError = true;
    }elseif(strlen($_POST["nid"]) !=11){
            $err_nid = "NID must be 11 digits";
            $hasError = true;
    }elseif(is_numeric($_POST["nid"])== false){
        $err_nid = "NID must me numeric";
        $hasError = true;
    }else{
            $nid = $_POST["nid"];
    }
  }

  if(!$hasError and empty($_POST["password"]) != true){
    $action = "SignInComplete.php";
    echo $action;

  }else{
    $action = "";
    echo $action."Empty";

  }
 

  $handle = fopen("AccountInfo.txt", "w");
  fwrite($handle, "Name: ".$name."\nUsername: ".$username."\nEmail: ".$email."\nLanguage: ".$lang."National ID: ".$nid."\nStreet Address: ".$street_address."\nState: ".$state."\nCity: ".$city."\nCountry Code: ".$code."\nPhone: ".$number);

    
  ?>

<html>
  <head>
    <title>AdminSignin</title>
  </head>
  <body>
    <fieldset>
      <legend>
        <h1><b>Admin Signin</b></h1>
      </legend>

      <?php echo$action;?>
      <form align="left" action="<?php echo$action;?>" method="post">
        <table>
          <tr>
            <td>Name:</td>
            <td><input type="text" name="name" value="<?php echo $name;?>"/></td>
            <td><span><?php echo $err_name; ?></span><br /></td>
          </tr>

          <tr>
            <td>Username:</td>
            <td><input type="text" name="username" value="<?php echo $username;?>" /></td>
            <td><span><?php echo $err_username; ?></span><br /></td>
          </tr>

          <tr>
            <td>Password:</td>
            <td><input type="password" name="password" value="<?php echo $password;?>" /></td>
            <td><span><?php echo $err_password; ?></span><br /></td>
          </tr>
          <tr>
            <td>Confirm Password:</td>
            <td><input type="password" name="confirm_password" value="<?php echo $confirm_password;?>" /></td>
            <td><span><?php echo $err_confirm_password; ?></span><br /></td>
          </tr>

          <tr>
            <td>Email:</td>
            <td><input type="email" name="email" value="<?php echo $email;?>" /></td>
            <td><span><?php echo $err_email; ?></span><br /></td>
          </tr>

          <tr>
            <td>Language:</td>
            <td><input type="text" name="lang" value="<?php echo $lang;?>" /></td>
            <td><span><?php echo $err_lang; ?></span><br /></td>
          </tr>

          <tr>
            <td>Address:</td>
            <td>
              <input
                placeholder="street_address"
                type="text"
                name="street_address"
                value="<?php echo $street_address;?>"
                
              />
            </td>
            <td><span><?php echo $err_street_address; ?></span><br /></td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input placeholder="City" type="text" name="city" value="<?php echo $city;?>" /> -
              <input placeholder="State" type="text" name="state" value="<?php echo $state;?>" /><br />
            </td>
            <td><span><?php echo $err_city; ?></span><br /></td>
          </tr>

          <tr>
            <td></td>
            <td>
              <input
                placeholder="Postal/Zip Code"
                type="text"
                name="zip_code"
                value="<?php echo $zip_code;?>"
              />
            </td>
            <td><span><?php echo $err_zip_code; ?></span><br /></td>
          </tr>

          <tr>
            <td>Phone number:</td>
            <td>
              <input placeholder="code" type="text" name="code" value="<?php echo $code;?>" /> -
              <input placeholder="number" type="text" name="number" value="<?php echo $number;?>" />
            </td>
            <td><span><?php echo $err_code; ?></span><br /></td>
          </tr>
          <tr>
            <td>National ID:</td>
            <td>
              <input placeholder="NID" type="text" name="nid" value="<?php echo $nid;?>"/>
            </td>
            <td><span><?php echo $err_nid; ?></span><br /></td>
          </tr>
          <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="register "  /><br><br><br>    Already have an account?<a href="AdminLogin.php">Log in</a>
                        </td>
                    </tr>
        </table>
      </form>
    </fieldset>
  </body>
</html>

