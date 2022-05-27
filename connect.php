<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "placement";

$conn = mysqli_connect($host,$dbusername,$dbpassword,$dbname);

if(!$conn)
{
    die("Connection failed : " . mysqli_connect_error());
}

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $branch = $_POST['branch'];
    $sslc = $_POST['sslc'];
    $puc = $_POST['puc'];
    $cgpa = $_POST['cgpa'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    if($name != "" && $usn != "" && $branch != "" && $sslc != "" && $puc != "" && $cgpa != "" && $user != "" && $pass != "" && strlen($usn) == 10)
    {
        $sql_query = "INSERT INTO student (NAME,USN,BRANCH,SSLC,PUC,CGPA,USERNAME,PASSWORD) VALUES ('$name','$usn','$branch','$sslc','$puc','$cgpa','$user','$pass')";
    
        if(mysqli_query($conn,$sql_query))
        {
            echo "<script>window.alert(\"New student registered !!\");</script>";
        }
        else
        {
            echo "Error : " . $sql . "" . mysqli_error($conn);
        }
    }

    else
    {
        echo "<script>window.alert(\"Fields left empty or Invalid fields!!\");</script>";
        echo "<script>window.location='studententry.html';</script>";
        
    }

    
    mysqli_close($conn);

}

?>