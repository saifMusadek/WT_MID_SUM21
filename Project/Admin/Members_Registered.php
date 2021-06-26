<?php
$name="";
$err_name="";
$email="";
$err_email="";
$number="";
$err_number="";
$age = "";
$err_age = "";
$gender="";
$err_gender="";
$nid = "";
$err_nid = "";
$amount_paid = "";
$err_amount_paid = "";
$amount_due = "";
$err_amount_due = "";
$total_amount = "";
$err_total_amount = "";
$trainer = "";
$err_trainer = "";

$hasError=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
          
    if(empty($_POST["name"])){
        $err_name="Cannot be blank";
        $hasError = true;
    }else{
            $name = $_POST["name"];
    }


    if(empty((isset($_POST["gender"])))){
        $err_gender="Gender Required !";
        $hasError = true;
      }else{
        $gender = $_POST["gender"];
      }

      if(empty($_POST["age"])){
        $err_age = "Cannot be blank";
        $hasError = true;
      }else{
        $age = $_POST["age"];
      }

          
    if(empty($_POST["email"])){
        $err_email="Email Required";
        $hasError = true;
    }else{
        $email = $_POST["email"];
    }

    if(empty($_POST["number"])){
        $err_number="Cannot be blank";
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

    if(empty($_POST["nid"])){
      $err_nid="Cannot be blank";
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

    if(empty($_POST["trainer"])){
        $err_trainer="Cannot be blank";
        $hasError = true;
    }else{
        $trainer = $_POST["trainer"];
    }


    if(empty($_POST["amount_due"])){
      $err_amount_due="Cannot be blank";
      $hasError = true;
  }elseif(is_numeric($_POST["amount_due"])== false){
      $err_amount_due = "Has to be numeric";
      $hasError = true;
  }else{
          $amount_due = $_POST["amount_due"];
  }
  
  if(empty($_POST["amount_paid"])){
    $err_amount_paid="Cannot be blank";
    $hasError = true;
}elseif(is_numeric($_POST["amount_paid"])== false){
    $err_amount_paid = "Has to be numeric";
    $hasError = true;
}else{
        $amount_paid = $_POST["amount_paid"];
}

if(empty($_POST["total_amount"])){
  $err_total_amount="Cannot be blank";
  $hasError = true;
}elseif(is_numeric($_POST["total_amount"])== false){
  $err_total_amount = "Has to be numeric";
  $hasError = true;
}else{
      $total_amount = $_POST["total_amount"];
}



  if(!$hasError){
  echo "Success";
}
}

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Document</title>
  </head>
  <body>
    <h1>Registered Members List</h1>
    <table border="1">
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>NID</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Amount Paid</th>
        <th>Amount Due</th>
        <th>Total Amount</th>
        <th>Trainer</th>
      </tr>
      <tr>
        <td align="center">Sayed</td>
        <td align="center">22</td>
        <td align="center">Male</td>
        <td align="center">12345678910</td>
        <td align="center">asda@gmail.com</td>
        <td align="center">5553230000</td>
        <td align="center">1200</td>
        <td align="center">800</td>
        <td align="center">3000</td>
        <td align="center">No❌</td>
      </tr>
      <tr>
        <td align="center">Admed</td>
        <td align="center">33</td>
        <td align="center">Male</td>
        <td align="center">12444666666</td>
        <td align="center">ahmed@email.com</td>
        <td align="center">5521200000</td>
        <td align="center">2000</td>
        <td align="center">4000</td>
        <td align="center">6000</td>
        <td align="center">Yes✅</td>
      </tr>
    <?php
    if(!$hasError){
    echo "<tr>";
    echo "<td align=center>$name</td>";
    echo "<td align=center>$age</td>";
    echo "<td align=center>$gender</td>";
    echo "<td align=center>$nid</td>";
    echo "<td align=center>$email</td>";
    echo "<td align=center>$number</td>";
    echo "<td align=center>$amount_paid</td>";
    echo "<td align=center>$amount_due</td>";
    echo "<td align=center>$total_amount</td>";
    echo "<td align=center>$trainer</td>";
    echo "</tr>";
    }
    
    ?>
  
    </table>


    <fieldset>
      <legend><h3>Manual Table Entry</h3></legend>
      <table>
      <form align="left" action="" method="post">
        <tr>
          <td>Name:</td>
          <td><input type="text" name="name" value="<?php echo $name;?>" /></td>
          <td>
            <span><?php echo $err_name; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Age:</td>
          <td><input type="number" name="age" value="<?php echo $age;?>" /></td>
          <td>
            <span><?php echo $err_age; ?></span><br />
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
          <td>National ID:</td>
          <td>
            <input
              placeholder="NID"
              type="text"
              name="nid"
              value="<?php echo $nid;?>"
            />
          </td>
          <td>
            <span><?php echo $err_nid; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Email:</td>
          <td>
            <input type="email" name="email" value="<?php echo $email;?>" />
          </td>
          <td>
            <span><?php echo $err_email; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Phone number:</td>
          <td>
            <input
              placeholder="number"
              type="text"
              name="number"
              value="<?php echo $number;?>"
            />
          </td>
          <td>
            <span><?php echo $err_number; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Amount Paid:</td>
          <td><input type="text" name="amount_paid" value="<?php echo $amount_paid;?>" /></td>
          <td>
            <span><?php echo $err_amount_paid; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Amount Due:</td>
          <td><input type="text" name="amount_due" value="<?php echo $amount_due;?>" /></td>
          <td>
            <span><?php echo $err_amount_due; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Total Amount:</td>
          <td><input type="text" name="total_amount" value="<?php echo $total_amount;?>" /></td>
          <td>
            <span><?php echo $err_total_amount; ?></span><br />
          </td>
        </tr>

       
        <tr><td>Trainer:</td>
          <td>
          <select name="trainer">
          <option selected disabled>~Select~</option>
            <option>Yes✅</option>
            <option>No❌</option>
          </select>
          </td>
          <td>
            <span><?php echo $err_trainer; ?></span><br />
          </td>
        </tr>
        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="submit" value="Enter  " />
                        </td>
                    </tr>
      </form>
    </table>
    </fieldset>

    <a href="AdminAccount.php">Back</a>
   
  </body>
</html>