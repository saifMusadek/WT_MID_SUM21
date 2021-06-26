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
$members = "";
$err_members = "";
$join_date = "";
$err_join_date = "";
$bank = "";
$err_bank = "";
$salary = "";
$err_salary = "";

$hasError=false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
          
    if(empty($_POST["name"])){
        $err_name="Cannot be blank";
        $hasError = true;
    }else{
            $name = $_POST["name"];
    }

    if(empty($_POST["bank"])){
        $err_bank="Cannot be blank";
        $hasError = true;
    }else{
            $bank = $_POST["bank"];
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

  //members
  if(empty($_POST["members"])){
    $err_members="Cannot be blank";
    $hasError = true;
}elseif(is_numeric($_POST["members"])== false){
    $err_members = "Must be numeric";
    $hasError = true;
}else{
        $members = $_POST["members"];
}

//join_date
if(empty($_POST["join_date"])){
    $err_join_date="Cannot be blank";
    $hasError = true;
}else{
        $join_date = $_POST["join_date"];
}


    if(empty($_POST["salary"])){
      $err_salary="Cannot be blank";
      $hasError = true;
  }elseif(is_numeric($_POST["salary"])== false){
      $err_salary = "Has to be numeric";
      $hasError = true;
  }else{
          $salary = $_POST["salary"];
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
    <h1>Employee List</h1>
    <table border="1">
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Join Date</th>
        <th>Gender</th>
        <th>NID</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Bank Info</th>
        <th>Salary</th>
        <th>Members</th>

      </tr>
      <tr>
        <td align="center">Khalid</td>
        <td align="center">35</td>
        <td align="center">22/05/2016</td>
        <td align="center">Male</td>
        <td align="center">55532300000</td>
        <td align="center">asda@gmail.com</td>
        <td align="center">12000000000</td>
        <td align="center">United Bank</td>
        <td align="center">30000</td>
        <td align="center">6</td>
      </tr>
      <tr>
      <td align="center">Hamoodi</td>
        <td align="center">29</td>
        <td align="center">3/03/2014</td>
        <td align="center">Male</td>
        <td align="center">52127200000</td>
        <td align="center">masdah@yahoo.com</td>
        <td align="center">12340000000</td>
        <td align="center">Dhaka Bank</td>
        <td align="center">35000</td>
        <td align="center">7</td>
      </tr>
    <?php
    if(!$hasError){
    echo "<tr>";
    echo "<td align=center>$name</td>";
    echo "<td align=center>$age</td>";
    echo "<td align=center>$join_date</td>";
    echo "<td align=center>$gender</td>";
    echo "<td align=center>$nid</td>";
    echo "<td align=center>$email</td>";
    echo "<td align=center>$number</td>";
    echo "<td align=center>$bank</td>";
    echo "<td align=center>$salary</td>";
    echo "<td align=center>$members</td>";

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
          <td>Join Date:</td>
          <td><input type="text" name="join_date" value="<?php echo $join_date;?>" /></td>
          <td>
            <span><?php echo $err_join_date; ?></span><br />
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
          <td>Salary:</td>
          <td><input type="text" name="salary" value="<?php echo $salary;?>" /></td>
          <td>
            <span><?php echo $err_salary; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Bank Info:</td>
          <td><input type="text" name="bank" value="<?php echo $bank;?>" /></td>
          <td>
            <span><?php echo $err_bank; ?></span><br />
          </td>
        </tr>

        <tr>
          <td>Members:</td>
          <td><input type="number" name="members" value="<?php echo $members;?>" /></td>
          <td>
            <span><?php echo $err_members; ?></span><br />
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