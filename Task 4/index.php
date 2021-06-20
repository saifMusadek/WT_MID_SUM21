<?php 
    $days =[];
    for($i = 1; $i<32; $i++){
        $days[] = $i;
    }

    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    $years = [];
    for($i = 0; $i<122; $i++){
        $years[] = 1900+$i;
    }
    
  $name="";
  $err_name="";
  $username="";
  $err_username="";
  $password="";
  $err_password="";
  $confirm_password="";
  $err_confirm_password="";
  $email="";
  $err_email="";
  $code="";
  $err_code="";
  $number="";
  $err_number="";
  $street_address="";
  $err_street_address="";
  $city="";
  $err_city="";
  $state="";
  $err_state="";
  $zip_code="";
  $err_zip_code="";
  $day="";
  $err_day="";
  $month="";
  $err_month="";
  $year="";
  $err_year="";
  $gender="";
  $err_gender="";
  $ca[]="";
  $err_ca[]="";
  $bio="";
  $err_bio="";

  function hasEmail($em){
      $arr = array("@", ".");
      $arr2 = [];
      $num;
      $num2;
      $num3;
      foreach($arr as $e){
        if(strpos($em, $e) == false){
            return false;
        }      
      }
      
      return true;
      
    }

    function hasPassword($em){
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
  
  $hasError=false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
              
        if(empty($_POST["name"])){
            $err_name="Name Required";
            $hasError = true;
        }elseif(strlen($_POST["name"]) < 6){
            $err_name = "Name Must be greater than 6";
            $hasError = true;
        }else{
                $name = $_POST["name"];
        }

        if(empty($_POST["username"])){
            $err_username="Username Required";
            $hasError = true;
        }elseif(strlen($_POST["username"]) < 6){
                $err_username = "Username must contain atleast 6 characters";
                $hasError = true;
        }else{
                $username = $_POST["username"];
        }

        if(empty($_POST["password"])){
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

        if($_POST["confirm_password"] != $_POST["password"] ){
            $err_confirm_password="Password did not match!";
            $hasError = true;
        }else{
                $confirmed_pass = $_POST["confirm_password"];
        }

        if(empty((isset($_POST["gender"])))){
            $err_gender="Gender Required !";
            $hasError = true;
          }else{
            $gender = $_POST["gender"];
          }

              
        if(empty($_POST["email"])){
            $err_email="Email Required";
            $hasError = true;
        }elseif(hasEmail($_POST["email"]) == false){
            $err_email="Email must contain @ and at least one .(dot) after @";
        }else{
            $email = $_POST["email"];
        }

        if(empty($_POST["number"])){
            $err_number="country code required";
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

        if(empty($_POST["number"])){
            $err_number="this field cannot be empty";
            $hasError = true;
        }elseif(strlen($_POST["number"]) >3 and strlen($_POST["number"]) <1){
                $err_number = "phone no. must be 11 digits";
                $hasError = true;
        }elseif(is_numeric($_POST["number"])== false){
            $err_number = "phone no. must me numeric";
            $hasError = true;
        }else{
                $number = $_POST["number"];
        }

        if(empty($_POST["street_address"])){
            $err_street_address="this field cannot be empty";
            $hasError = true;
        }else{
            $street_address = $_POST["street_address"];
        }

        if(empty($_POST["city"])){
            $err_city="this field cannot be empty";
            $hasError = true;
        }else{
            $city = $_POST["city"];
        }

        if(empty($_POST["state"])){
            $err_state="This field cannot be empty";
            $hasError = true;
        }else{
            $state = $_POST["state"];
        }

        if(empty($_POST["bio"])){
            $err_bio="This field cannot be empty";
            $hasError = true;
        }else{
            $state = $_POST["bio"];
        }

        if(empty($_POST["day"])){
            $err_day="This field cannot be empty";
            $hasError = true;
        }else{
            $state = $_POST["day"];
        }

        if(empty($_POST["month"])){
            $err_month="This field cannot be empty";
            $hasError = true;
        }else{
            $state = $_POST["month"];
        }

        if(empty($_POST["year"])){
            $err_year="This field cannot be empty";
            $hasError = true;
        }else{
            $state = $_POST["year"];
        }
        

              if(!$hasError){
              echo $_POST["name"]."<br>";
              echo $_POST["Username"]."<br>";
              echo $_POST["password"]."<br>";
              echo $_POST["gender"]."<br>";
              echo $_POST["code"]."<br>";
              echo $_POST["number"]."<br>";
              echo $_POST["email"]."<br>";
              echo $_POST["day"]."<br>";
              echo $_POST["month"]."<br>";
              echo $_POST["year"]."<br>";
              echo $_POST["street_address"]."<br>";
              echo $_POST["city"]."<br>";
              echo $_POST["state"]."<br>";
              echo $_POST["zip_code"]."<br>";
              echo $_POST["bio"]."<br>";
              
              $arr = $_POST["hobbies"];
              foreach($arr as $e){
                echo "$e <br>";
                }
            }
    }

            

              
            
        


?>
<html>
    <head>
        <title>Task_4</title>
    </head>
    <body>
        <fieldset>
            <legend><h1><b>Club Member Registration</b></h1></legend>

            <form align="left" action="" method="post">
                <table>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name"></td>
                        <td><span><?php echo $err_name; ?></span><br /></td>
                    
                    </tr>
                    
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username"></td>
                        <td><span><?php echo $err_username; ?></span><br /></td>
                    
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password"></td>
                        <td><span><?php echo $err_password; ?></span><br /></td>
                    
                    </tr>
                    
                    
                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirm_password"></td>
                        <td><span><?php echo $err_confirm_password; ?></span><br /></td>
                    
                    </tr>

                    
                    <tr>
                        <td>Email:</td>
                        <td><input type="text" name="email"></td>
                        <td><span><?php echo $err_email; ?></span><br /></td>
                    
                    </tr>

                    
                    <tr>
                        <td>Phone:</td>
                        <td><input placeholder = "code" type="text" name="code"> - <input placeholder = "Number" type="text" name="number"></td>
                        <td><span><?php echo $err_code;  ?></span></td>
                        <td><span><?php echo $err_number;  ?></span><br /></td>
                    </tr>

                    <tr>
                        <td>Address:</td>
                        <td><input placeholder = "street_address" type="text" name="street_address"></td>
                        <td><span><?php echo $err_street_address;  ?></span><br /></td>
                        
                    </tr>

                    <tr>
                        <td></td>
                        <td><input placeholder = "City" type="text" name="city"> - <input placeholder = "State" type="text" name="state"><br></td>
                        <td><span><?php echo $err_state;  ?></span><br /></td>
                        
                    
                    </tr>

                    <tr>
                        <td></td>
                        <td><input placeholder = "Postal/Zip Code" type="text" name="zip_code"></td>
                        <td><span><?php echo $err_zip_code;  ?></span><br /></td>
                        

                    </tr>

                    <tr>
                        <td>Birth Date:</td>
                        <td>
                            <select name="day">
                                
                                <option selected disabled>Day</option>
                                    <?php foreach($days as $e){
                                        echo "<option>$e</option>";
                                    } ?>
                                    <span><?php echo $err_day;  ?></span><br />
                            </select>
                        </td>
                            <td>
                            <select name="month">
                            <option selected disabled>Month</option>
                            
                            <?php foreach($months as $i){
                                        echo "<option>$i</option>";
                                    } ?>
                                    <span><?php echo $err_month;  ?></span><br />
                            </select>
                            </td>
                            <td>
                            <select name="year">
                            <option selected disabled>Year</option>
                            <?php foreach($years as $j){
                                        echo "<option>$j</option>";
                                    } ?>
                                    <span><?php echo $err_year;  ?></span><br />
                            </select>
                            </td>
                    </tr>

                    <tr>
                        <td>Gender:</td>
                        <td>
                            <input type="radio" name="gender" value="male" />Male
                            <input type="radio" name="gender" value="female" />Female
                        </td>
                        <td><span><?php echo $err_gender; ?></span><br /></td>
           
                    </tr>

                    <tr>
                        <td>Where did you<br>hear about us?</td>
                        <td>
                            <input type="checkbox" name="ca[]" value="A Friend or Colleague" />A Friend or Colleague<br>
                            <input type="checkbox" name="ca[]" value="Google" />Google<br>
                            <input type="checkbox" name="ca[]" value="Blog Post" />Blog Post<br>
                            <input type="checkbox" name="ca[]" value="News Articleer" />News Article<br>
                        </td>
           
                    </tr>
                    
                    <tr>
                        <td>Bio:</td>
                        <td><textarea name="bio"></textarea></td>
                        <td><span><?php echo $err_bio; ?></span><br /></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="register " />
                        </td>
                    </tr>
        
                </table>
        
        
        
            </form>
        
        </fieldset>
    </body>
</html>