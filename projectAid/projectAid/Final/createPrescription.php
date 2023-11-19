<html>

<head>
    <?php
        $con = mysqli_connect("localhost", "root", "", "FINAL_PROJECT");
        if(!$con){
            echo "<script>
            alert ('Couldn't connect to the database!');
            </script>";
        }
    ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="dashboard.css">
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

    </title>
</head>

<body style="contain: content;">

    <?php
        if(isset($_GET["id"])){
            $id =$_GET["id"];
        }

        $selectPat = "SELECT * FROM `patient` WHERE `PatientID` = '".$id."'";
        $selectPatResult=mysqli_query($con,$selectPat);

        if(mysqli_num_rows($selectPatResult)>0){
            $patientRow=mysqli_fetch_assoc($selectPatResult);
        }
        

    ?>
    <div id="myDIV" class="sidebar" id="sideNavbar">
        <p class="slideSelect active" id="Inventory">Patient</p>
    </div>
    <div id="contentDivPrescription" class="content">
        <div class="innerPrescription">
            <div class="prescLeft">
                <div class="patientCardPresc">
                    <table class="patientCardPrescTable" border="0">
                        <tr>
                            <tr>
                                <th colspan="2">
                                    Patient Details
                                </th>
                            </tr>
                            <td>
                                <p>
                                    Patient Name
                                </p>
                            </td>
                            <td>
                                <p>
                                    : <?php echo $patientRow["FirstName"]; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Patient ID
                                </p>
                            </td>
                            <td>
                                <p>
                                    : <?php echo $patientRow["PatientID"]; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Gender
                                </p>
                            </td>
                            <td>
                                <p>
                                    : <?php echo $patientRow["Gender"]; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Age
                                </p>
                            </td>
                            <td>
                                <p>
                                    : <?php echo $patientRow["age"]; ?>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Assigned Doctor
                                </p>
                            </td>
                            <td>
                                <p>
                                    : <?php echo $patientRow["doctor"]; ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="prescRight" style="contain: content;">
            <form action="" method="POST">   
            <table class="prescTable" border="0">
                    

                    <tr>
                        <th colspan="2">
                            <p>Medical Prescription</p>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                Diagnosed With :
                            </p>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <textarea name="medicalRecord" id="" cols="1" rows="10">

                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Drug :</p>
                        </td>
                        <td>
                            <p>Amount :</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="selectDrug" id="">
                                <option value="" disabled selected>
                                    Select a drug :
                                </option>
                                <?php
                                    $selectDrug="SELECT * FROM `inventory`";
                                    $selectDrugResult = mysqli_query($con,$selectDrug);

                                    if(mysqli_num_rows($selectDrugResult)>0){
                                        while($drugRow=mysqli_fetch_assoc($selectDrugResult)){
                                            echo "<option value='".$drugRow["ProductName"]."'>
                                                    ".$drugRow["ProductName"]."
                                                </option>";
                                        }
                                    }
                                ?>
                                <!-- <option value="1">
                                    1
                                </option> -->
                            </select>
                        </td>
                        <td>
                            <input type="number" name="selectAmount">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="prescSubmit" id="" value="Create Prescription">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="reset" value="Clear Prescription">
                        </td>
                    </tr>
                </table>
                <?php
                    if(isset($_POST["prescSubmit"])){
                        $medRec=$_POST["medicalRecord"];
                        $drugName=$_POST["selectDrug"];
                        $drugAmt=$_POST["selectAmount"];

                        $insertPresc="INSERT INTO `prescription`(`patientName`, `patientId`, `patAge`, `doctor`, `MedicalCondition`, `drugName`, `drugQuantity`)
                         VALUES ('".$patientRow["FirstName"]."','".$id."','".$patientRow["age"]."','".$patientRow["doctor"]."','".$medRec."','".$drugName."','".$drugAmt."')";

                        if(mysqli_query($con,$insertPresc)){
                            echo "<script>
                            alert('prescription Successfully Created!');
                        </script>";
                        }
                        
                    }
                
                ?>
            </form>
            </div>
            
        </div>
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

</html>