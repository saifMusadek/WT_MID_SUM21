<html>
<head>
    <title>Admin_Profile</title>
</head>
<body>
    <h1>Profile</h1>
    <h5>Demo....will be changed later</h5>
    <?php
    $handle = fopen("AccountInfo.txt","r");
    while(!feof($handle)){

        $data = fgets($handle);
        echo "$data <br />";
    }
    


?>
</body>
</html>