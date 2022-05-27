<!DOCTYPE html>
<html>
    <head>
        <style type="text/css">
            body{
                background-image: url(screen.jpg);
                background-size: cover;
                background-attachment: fixed;
            }
            .content{
                background: white;
                width:50%;
                padding: 40px;
                margin: 100px auto;
            }
        </style>
        <meta charset="utf-8">
        <tiltle></tiltle>
        <link rel="stylesheet" href="jobentry.css">
        <link rel="stylesheet" href="style.css">

    </head>

    <body>
    <div class="entrybox">
            <br><br><br>
            <h1 align="center"> JOB Details </h1>
                <table border="10" width=70% cellspacing="10" cellpadding="5" align="center" bgcolor= #DCDCDC>
                    <tr>
                        <th>Company Name</th>
                        <th>BRANCH</th>
                        <th>CTC</th>
                        <th>DATE</th>
                        <th>CGPA</th>
                        <th>JOB DESCRIPTION</th>
                        <th>APPLY JOB</th>
                    </tr>
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

                        $username = $_POST["user"];
                        $pass = $_POST["pass"];
                        $query = "SELECT * FROM STUDENT WHERE USERNAME='$username' AND PASSWORD='$pass'";
                        $result = mysqli_query($conn,$query);
                        $count = mysqli_num_rows($result);

                        if($count > 0)
                        {
                            $sql = "SELECT * FROM JOBENTRY";
                            $result = $conn->query($sql);

                            if($result-> num_rows > 0)
                            {
                                while($row = $result-> fetch_assoc())
                                {
                                    $cname = $row["CNAME"];
                                    echo "<tr><td>" . $row["CNAME"] . "</td><td>" . $row["BRANCH"] . "</td><td>" . $row["CTC"] . "</td><td>" . $row["DATE"] . "</td><td>" . $row["CGPA"] . "</td><td>" . $row["JOB_DESCRIPTION"] . "</td><td align=\"centre\"><button class=\"btn btn1\" onclick=\"myFunction()\">Apply</button></td></tr>";
                                    echo "<script>
                                    function myFunction() {
                                      window.alert(\"Applied Successfully\");
                                    }
                                    </script>";
                                    $sqlquery = "INSERT INTO APPLY (USER,PASSWORD,JOB) VALUES('$username','$pass','$cname')";
                                    $result2 = mysqli_query($conn,$sqlquery);
                                }
                                echo "</table>";
                            }
                            else{
                                echo "0 results";
                            }
                        }

                        else
                        {
                            echo "<script>window.alert(\"Invalid Credentials\");</script>";
                            header("Location:studentlogin.html");
                        }

                        mysqli_close($conn);

                        ?>

    </body>

</html>