<?php
session_start();

?>
<html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="login.css">

<!-- imported font -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

<!-- imported font -->

<head>
    <title>
        Login Page
    </title>
</head>

<body>
    <div class="logoDiv">

    </div>
    <div class="loginCenter">
        <!-- <div class="insideUpper">

        </div> -->
        <div class="loginForm">
            <!-- <form action="">
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <input type="submit" placeholder="Login">
            </form> -->
            <table border="0" class="loginTable">
                <form action="" method="post">
                    <tr>
                        <td><input type="text" name="username" id="username" placeholder="Username"></td>

                    </tr>
                    <tr>
                        <td><input type="password" name="password" id="password" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" id="submit" value="Login">
                        </td>
                    </tr>
                    <?php 
                    if(isset($_POST["submit"]))
                    {
                $username=$_POST["username"];
                //echo "<script>alert('".$username."')</script>";
                $password=$_POST["password"];
                //echo "<script>alert('".$password."')</script>";

                 
                $con=mysqli_connect("localhost","root","","FINAL_PROJECT");
                if(!$con)
                {
                die("Cannot connect to DB Server");
                echo"Can't connect";
                }
                $sql="SELECT * FROM `UserAcccount` WHERE `username`='dinithi@gmail.com'";
                $result2=mysqli_query($con,$sql);
                
                if(mysqli_num_rows($result2)>0)
                {
                
                    $no_row=mysqli_num_rows($result2);
                    $row2=mysqli_fetch_assoc($result2);
                    
                
                    $db_username=$row2["username"];
                    //echo "<script>alert('".$db_username."')</script>";
                    $db_password=$row2["password"];
                    //echo "<script>alert('".$db_password."')</script>";
                    if(($db_username==$username)&&($db_password==$password))
                    {
                       //echo "<script>alert('WORKED')</script>";
                    
                        $_SESSION["uname"] = $username;
                        header('Location:dashboard.php');
                    }
                    else {
                        // echo "wrong credentials";
                        echo '<script type="text/javascript">                                        
                        alert("invalid username or password");
                        </script>';
                    }
                    //    header('Location:dashboard.php?id='.$row2["username"].'');
                      

                    
                   

                }
                    }

                    ?>
                </form>
            </table>
        </div>

    </div>


</body>

</html>