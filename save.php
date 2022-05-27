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
    $cname = $_POST['name'];
    $branch = $_POST['branch'];
    $ctc = $_POST['ctc'];
    $date = $_POST['date'];
    $cgpa = $_POST['cgpa'];
    $jdesc = $_POST['jdesc'];

    if($cname != "" && $branch != "" && $ctc != "" && $date !="" && $cgpa != "" && $jdesc != "")
    {
        $sql_query = "INSERT INTO JOBENTRY (CNAME,BRANCH,CTC,DATE,CGPA,JOB_DESCRIPTION) VALUES ('$cname','$branch','$ctc','$date','$cgpa','$jdesc')";
    

        if(mysqli_query($conn,$sql_query))
        {
            echo "New job entered  !!";
        }
        else
        {
            echo "Error : " . $sql . "" . mysqli_error($conn);
        }
    }
    else
    {
        echo "<script>window.alert(\"Fields left empty or Invalid fields!!\");</script>";
        echo "<script>window.location='jobentry.html';</script>";
    }

    
    mysqli_close($conn);
}

?>