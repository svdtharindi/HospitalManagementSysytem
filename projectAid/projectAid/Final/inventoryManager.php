<?php session_start();

?>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" type="text/css" href="./tablecss.css">

    <!-- <link rel="stylesheet" href="add_css 2.css"> -->

    <!-- webpage icon -->
    <link rel="icon" type="image/x-icon" href="src/logoSquare.png">
    <!-- webpage icon -->

    <!-- imported font -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <!-- imported font -->
    <title>
        Dashboard
    </title>
</head>

<body>

    <div id="myDIV" class="sidebar" id="sideNavbar">
        <!-- <br>
        <i id="closeBtn" class="fa fa-close"></i>
        <br> -->
        <!-- <p class="slideSelect active" id="Home">Home</p> -->
        <p class="slideSelect active" id="Inventory">Inventory</p>


    </div>
    <div id="contentDiv" class="content">



        <div class="catTwo" style="display: block;" id="Inventorydiv">
            <p>
                <!---DINITHI -->

                <form id="form1" name="form1" method="post">
                    <table id="myTable" border="1" style="border: 1px solid black;">
                        <tr class="header">
                            <th>Product Name</th>
                            <th>MedID</th>
                            <th>Manufacture</th>
                            <th>Problem</th>
                            <th>Catergory</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Expiry Date</th>
                        </tr>
                       

                        
                    <?php

                    if (isset($_GET["id"])) {
                        $id = $_GET["id"];
                        // echo "ID:" . $id;
                    }
                    $con = mysqli_connect("localhost", "root", "", "FINAL_PROJECT");
                    if (!$con) {
                        die("Cannot connect to DB Server");
                        echo "Can't connect";
                    }



                    $sql2 = "SELECT * FROM `Inventory` WHERE `MedID`='" . $id . "'";



                    $result2 = mysqli_query($con, $sql2);

                    if (mysqli_num_rows($result2) > 0) {

                        $no_row = mysqli_num_rows($result2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $medid = $row2["MedID"];
                        echo "<tr>
                        <td>" . $row2["ProductName"] . "</td>
                        <td>" . $row2["MedID"] . "</td>
                        <td>" . $row2["Manufacture"] . "</td>
                        <td>" . $row2["Problem"] . "</td>
                        <td>" . $row2["Category"] . "</td>
                        <td>" . $row2["Price"] . "</td>
                        <td>" . $row2["Availability"] . "</td>
                        <td>" . $row2["ExpiryDate"] . "</td>
                        </tr>";
                    }

                    ?>


                    </table>
                </form>
                <form id="form1" name="form1" action="" method="post">
                    <table id="myTable" border="1">
                        <tr class="header">
                            <th style="width:10%;">Order</th>
                            <th style="width:10%;"> </th>
                            <th style="width:10%;"> </th>
                        </tr>
                        <tr style="height:10vh ;">
                            <th>Quantity</th>
                            <td><input type='text' name='quantity' id='quantity'></td>
                            <td><input type="submit" name="cost" id="cost" value="Calculate cost"></td>
                        </tr>
                        <tr>
                        <?php

                            if (isset($_POST["cost"])) {
                                $sql2 = "SELECT * FROM `Inventory` WHERE `MedID`='" . $id . "'";
                                $result2 = mysqli_query($con, $sql2);
                                if (mysqli_num_rows($result2) > 0) {                                    
                                    $row2 = mysqli_fetch_assoc($result2);
                                    $price = $row2["Price"];    
                                    $quantity=$_POST["quantity"];
                                    
                                    $tot=$price*$quantity;
                                    echo"<td>
                                            Total Price :
                                        </td> 
                                        <td name='quan' value='".$quantity."'>
                                             ".$tot."   
                                        </td>";
                                        
                                            $sql3 = "INSERT INTO `orderinventory`(`OrderID`, `MedID`, `Quantity`,`TotalCost`) 
                                            VALUES (null,'" . $id . "','" . $quantity . "','".$tot."');";
                                           
                                            mysqli_query($con, $sql3);  
                                            
                                         
                                       

                                }
                            }

                            ?>
                           
                        </tr>

                    </table>
               

                <?php
                    // if (isset($_POST["cost"])) {
                    //     echo    "<div class='invenMgrBtnContainer' id='btnContainer'>
                    //     <input type='submit' id='submit' name='submit'>
                    //     <input type='submit' id='cancel' name='cancel' value='Cancel'>
                    // </div>";
                    // }
                ?>

            <div class="invenMgrBtnContainer" id="btnContainer">
                    <input type='submit' id='submit' name='submit'>
                    <input type='submit' id='cancel' name='cancel' value="Cancel">
                </div>

                <?php
                     
                ?>

              

                </form>
                
                

           



            
                


                </table>

                </form>
            </p>
        </div>
        <!--DINITHI END WINDOW-->
        <!--END DINITHI-->
    </div>

    <div class="rightDiv ">
        <div class="userImg">
            <img src="src/userimage.png" alt="" class="loggedinuserImg">
        </div>
        <p>
            Dr.Saveen Malinga
        </p>
        <p>
            DoctorID:69
        </p>
        <button id="logout">
            Logout
        </button>

    </div>


</body>

<!-- <script>
    var Calculate = document.getElementById("cost");
    Calculate.addEventListener("click", function() {
        document.getElementById("btnContainer").style.display = "block";
    });
</script> -->



</html>