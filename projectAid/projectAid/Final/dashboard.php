<?php
session_start();
if (!isset($_SESSION["uname"])) {
    header('Location:login.php');
}
?>
<?php
            if(isset($_POST["logout"])){
                session_destroy();
                header('Location:login.php');   
            }
        ?>

<html>

<head>
    <?php
        $con = mysqli_connect("localhost", "root", "", "FINAL_PROJECT");
        if(!$con){
            echo "<script>
            alert ('Couldn't connect to the database!');
            </script>";
        }

        $selectDoctor = "SELECT `FirstName` FROM `staff`";
        $selectAdoc = "SELECT * FROM `staff`";
        $selectAllPatient="SELECT * FROM `patient`";        
        $selectAllStaff="SELECT * FROM `staff`";
        $selectAllappointment="SELECT * FROM `appointments`";
        $selectAllPatResult=mysqli_query($con,$selectAllPatient);
        $selectAllappointmentResult=mysqli_query($con,$selectAllappointment);
        $selectAllappointmentResult2=mysqli_query($con,$selectAllappointment);
        $selectAllPatientResult=mysqli_query($con,$selectAllPatient);
        $selectAllPatientResult2=mysqli_query($con,$selectAllPatient);
        $docNameResult=mysqli_query($con,$selectAdoc);
        $doctorNameResult=mysqli_query($con,$selectDoctor);
        $selectAllStaffResult=mysqli_query($con,$selectAllStaff);
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
        Dashboard
    </title>
</head>

<body style="contain: content;">

    <div id="myDIV" class="sidebar" id="sideNavbar">
        <!-- <br>
        <i id="closeBtn" class="fa fa-close"></i>
        <br> -->
        <p class="slideSelect active" id="Home">Home</p>
        <p class="slideSelect" id="Manage Patient">Manage Patient</p>
        <p class="slideSelect" id="Manage Staff">Manage Staff</p>
        <p class="slideSelect" id="Billing">Billing</p>
        <p class="slideSelect" id="Appointments">Appointments</p>
        <p class="slideSelect" id="Inventory">Inventory</p>
        <p class="slideSelect" id="Monthly Reports">Monthly Reports</p>

    </div>
    <div id="contentDiv" class="content">
        <div class="catTwo" style="display: block;" id="Homediv">
            <div class="tileHolder">
                <div class="homeTile">
                    <div class="tileinner" style="background-image: url('src/appointments.png');"></div>
                    <div class="test">
                        <p>
                            Appointments
                        </p>
                        <p>
                            18
                        </p>
                    </div>
                </div>
                <div class="homeTile">
                    <div class="tileinner" style="background-image: url('src/patient.png');"></div>
                    <div class="test">
                        <p>
                            Patients
                        </p>
                        <p>
                            1000
                        </p>
                    </div>
                </div>
                <div class="homeTile">
                    <div class="tileinner" style="background-image:url('src/delete.png');"></div>
                    <div class="test">
                        <p>
                            Delete Requests
                        </p>
                        <p>
                            10
                        </p>
                    </div>
                </div>
                <div class="homeTile">
                    <div class="tileinner" style="background-image: url('src/medical\ staff.png');">
                    </div>
                    <div class="test">
                        <p>
                            Total Medical Staff
                        </p>
                        <p>
                            99
                        </p>
                    </div>
                </div>
            </div>

            <div class="staffList">
                <table border="0" class="appointmentsTable2">

                    <tr>
                        <th>
                            Appointments List
                        </th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                    </tr>
                </table> 
                <?php
                    if(mysqli_num_rows($selectAllappointmentResult)>0){
                        while($appRow=mysqli_fetch_assoc($selectAllappointmentResult)){
                            echo "<div class='appointmentTile'>
                            <table border='0' class='appointmentsTable'>
                                <tr>
                                    <td>
                                        <p>".$appRow["Date"]."</p>
                                    </td>
                                    <td>
                                        <img src='src/userimage.png' alt='' class='patientImg'>
        
                                        <p>".$appRow["PatientName"]."</p>
                                    </td>
                                    <td>
                                        <img src='src/userimage.png' alt='' class='patientImg'>
                                        <p>".$appRow["Doctor"]."</p>
                                    </td>
                                </tr>
                            </table>
                        </div>";
                        }
                    }
                ?>               
            </div>

        </div>
        <div class="catTwo" style="display: none;" id="Manage Patientdiv">
            <div class="tileHolder2">
                <div class="homeTile TileCenter" id="addPatientOpenbtn" onclick="windowManager('addPatientWindowPop')">
                    <p class="TileText">Add Patient</p>
                </div>
                <!-- <div class="homeTile TileCenter">
                    <p class="TileText">Update Patient</p>
                </div>
                <div class="homeTile TileCenter">
                    <p class="TileText">Delete Patient</p>
                </div> -->
            </div>
            <div class="addStaffWindow" id="addPatientWindowPop">
                <div class="addStaffInner" id="insideAddPatient" style="display: none;">
                    <i class="fa fa-close closebtn" id="addPatientClosebtn" onclick="windowCloser('addPatientWindowPop')"></i>

                    <!-- START OF DINITHI'S CODE -->
                    <div class="innerAddPatient">
                        <!-- <div class="tileHolder3">
                            <button class="tablinks active" onclick="openInfo(event, 'AddPatient1')">Profile Details</button>
                            <button class="tablinks" onclick="openInfo(event, 'AddPatient2')">Other Details</button>
                        </div> -->
                        <div class="tabContent2" id="AddPatient1">
                            <form action="dashboard.php" method="POST">
                                <table border="0" class="addStaffProfileDetailsTable">
                                    <tr>
                                        <!--Next Row-->
                                        <td colspan="2"> <input type="text" name="patFirstName" autocomplete="on" required placeholder="First Name"></td>
                                        <td colspan="2"> <input type="text" name="patLastName" autocomplete="on" required placeholder="Last Name"></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>Birth Date</p>
                                        </td>
                                        <td> <input type="date" name="patDob" autocomplete="on" required></td>
                                        <td>
                                            <p>Gender</p>
                                        </td>
                                        <td>
                                            <select  id="gender" name="patGender">
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>                                            
                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input id="nic" type="text" name="patNic" autocomplete="on" required placeholder="NIC">
                                        </td>
                                        <td>
                                            <input type="text" id="Age" name="patAge" required placeholder="Age" max="99" min="10">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input id="phone" type="text" name="patPhone" autocomplete="on" required placeholder="mobile number">
                                        </td>
                                        <td colspan="2">
                                            <input id="email" type="email" name="patEmail" autocomplete="on" required placeholder="email address">
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td>
                                            <p>Current Address</p>
                                        </td> -->
                                        <td colspan="3"> <textarea name="patAddress" id="" cols="1" rows="4" placeholder="Address"></textarea>

                                    </tr>
                                    <!--Next Row-->
                                    <tr>
                                        <td colspan="2">
                                            <select name="patSelectedDoc" id="">
                                                <option value="" disabled selected>
                                                    Assign a Doctor 
                                                </option>
                                                <?php
                                                    while($doctorNameRow=mysqli_fetch_array($doctorNameResult)):;
                                                    echo" <option value=".$doctorNameRow[0]." >".$doctorNameRow[0]."</option>";
                                                    // echo $doctorNameRow[0];
                                                    endwhile;
                                                ?>                                         
                                            </select>
                                        </td>
                                        <td colspan="2"> </td>
                                    </tr>
                                    
                                    <tr>
                                        <td colspan="4">
                                            <input type="submit" name="AddPatientSub" value="Admit Patient">
                                        </td>
                                    </tr>
                                </table>
                        </div>
                        </form>
                        <?php
                            if(isset($_POST["AddPatientSub"])){
                                $patFirstName=$_POST["patFirstName"];
                                $patLastName=$_POST["patLastName"];
                                $patDob=$_POST["patDob"];
                                $patGender=$_POST["patGender"];
                                $patNic=$_POST["patNic"];
                                $patAge=$_POST["patAge"];
                                $patPhone=$_POST["patPhone"];
                                $patEmail=$_POST["patEmail"];
                                $patAddress=$_POST["patAddress"];
                                $patDoc=$_POST["patSelectedDoc"];

                                $insertPatient="INSERT INTO `patient`(`PatientID`, `FirstName`, `Lastname`, `DOB`,`age`, `Gender`, `MobileNumber`, `email`, `address`, `doctor`) 
                                VALUES (null,'".$patFirstName."','".$patLastName."','".$patDob."','".$patAge."','".$patGender."','".$patPhone."','".$patEmail."','".$patAddress."','".$patDoc."')";

                                if(mysqli_query($con,$insertPatient)){
                                    header("Refresh:0");
                                }
                                
                            }
                        ?>

                    </div>



                    <!-- END OF DINITHI'S CODE -->
                </div>
            </div>
            <div class="staffList" style="display: block;">
                <table border="0" class="appointmentsTable2">

                    <tr>
                        <th>
                            Patient List
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Name</th>
                        <th style="width: 10%;">Patient ID</th>
                        <th>Assigned Doctor</th>
                        <th></th>
                        <th></th>
                    </tr>
                </table>
                <?php
                    if(mysqli_num_rows($selectAllPatientResult)>0){
                        while($selectPatientRow=mysqli_fetch_assoc($selectAllPatientResult)){
                            echo "<table border='0' class='appointmentsTable'>
                            <tr>
                                <td style='width: 30%;'>
                                    <img src='src/userimage.png' alt='' class='patientImg'>
                                    <p>".$selectPatientRow["FirstName"]."</p>
                                </td>
                                <td style='width: 10%;'>
                                    <p>".$selectPatientRow["PatientID"]."</p>
                                </td>
                                <td>
                                    <p>".$selectPatientRow["doctor"]."</p>
                                </td>
                                <td style='width: 40%;'>
                                    <input type='button' value='Create prescription' onclick=location.href='createPrescription.php?id=".$selectPatientRow["PatientID"]."'></td>
                            </tr>
                        </table>";
                        }
                    
                    }
                ?>
                
            </div>
        </div>
        <div class="catTwo" style="display: none;" id="Manage Staffdiv">
            <!-- <button class="hamburgerIcon">
                <i class="fa fa-bars"></i>
            </button> -->
            <div class="tileHolder2">
                <div class="homeTile TileCenter" id="addStaffOpenbtn" onclick="windowManager('addStaffWindowPop')">
                    <p class="TileText">Add Staff Member</p>
                </div>
                <!-- <div class="homeTile TileCenter">
                    <p class="TileText">Update Staff Member</p>
                </div> -->
            </div>
            <div class="staffList" style="display: block;">
                <table border="0" class="appointmentsTable2">

                    <tr>
                        <th>
                            Medical Staff
                        </th>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Name</th>
                        <th style="width: 10%;">Staff Id</th>
                        <th>Job Role</th>
                        <th></th>
                        <th></th>
                        
                    </tr>
                </table>
                <?php
                    if(mysqli_num_rows($selectAllStaffResult)>0){
                        while($selectStaffRow=mysqli_fetch_assoc($selectAllStaffResult)){
                            echo "<table border='0'  class='appointmentsTable'>
                            <tr>
                                <td style='width: 30%;'>
                                    <img src='src/userimage.png' alt='' class='patientImg'>
                                    <p>".$selectStaffRow["FirstName"]."</p>
                                </td>
                                <td style='width: 10%;'>
                                    <p>".$selectStaffRow["StaffID"]."</p>
                                </td>
                                <td>
                                    <p>".$selectStaffRow["emp_type"]."</p>
                                </td>
                                <td style='width: 40%;'><input type='button' value='update'>
                                    </td>
                                
                               
                            </tr>
                        </table>";
                        }
                    
                    }
                ?>

            </div>
            <div class="addStaffWindow" id="addStaffWindowPop">
                <div class="addStaffInner" id="insideAddStaff" style="display: none;">
                    <i class="fa fa-close closebtn" id="addStaffClosebtn" onclick="windowCloser('addStaffWindowPop')"></i>

                    <!-- START OF DINITHI'S CODE -->
                    <div class="innerAddStaff">
                        <div class="tileHolder3" id="addStaffFormTabHolder">
                            <button class="tablinks active" onclick="openInfo(event, 'ProfileDetails')">Profile Details</button>
                            <button class="tablinks" onclick="openInfo(event, 'OtherDetails')">Other Details</button>
                        </div>
                        <div class="tabContent" id="ProfileDetails">
                            <form action="" method="POST">
                                <table border="0" class="addStaffProfileDetailsTable">
                                    <tr>
                                        <!--Next Row-->
                                        <td colspan="2"> <input type="text" name="staffFname" autocomplete="on" required placeholder="First Name"></td>
                                        <td colspan="2"> <input type="text" name="staffLname" autocomplete="on" required placeholder="Last Name"></td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>Birth Date</p>
                                        </td>
                                        <td> <input type="date" name="staffDob" autocomplete="on" required></td>
                                        <td>
                                            <p>Gender</p>
                                        </td>
                                        <td>
                                            <select name="staffGender" id="gender">
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                            
                                            </select>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input id="nic" type="text" name="staffNic" autocomplete="on" required placeholder="NIC">
                                        </td>
                                        <td> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input id="phone" type="text" name="staffMobile" autocomplete="on" required placeholder="mobile number">
                                        </td>
                                        <td colspan="2">
                                            <input id="email" type="email" name="staffEmail" autocomplete="on" required placeholder="email address">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Current Address</p>
                                        </td>
                                        <td colspan="3"> <textarea name="staffAddress" id="" cols="1" rows="4" placeholder="Street Address"></textarea>

                                    </tr>
                                    <!--Next Row-->
                                    <tr>
                                        <td colspan="2"> <input type="text" name="staffCity" autocomplete="on" required placeholder="City"></td>
                                        <td colspan="2"> <input type="text" name="staffState" autocomplete="on" required placeholder="State/Province"></td>


                                    </tr>
                                </table>

                        </div>
                        <div class="tabContent" id="OtherDetails" style="display: none;">
                            <table class="addStaffProfileDetailsTable" border="0">
                                <tr>
                                    <th>
                                        <p>Staff Picture</p>
                                        </td>
                                        <td colspan="3">
                                            <input type="file" name="staffImg" value="" />
                                        </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Qualifications</p>
                                    </td>
                                    <td colspan="2"><textarea name="staffQualification" id="" cols="1" rows="5"></textarea></td>


                                </tr>
                                <tr>

                                    <td>Department</td>
                                    <td colspan="2">
                                        <select name="staffDept" id="department">
                                            <option value="Outpatient department (OPD)">Outpatient department (OPD)</option>
                                            <option value="Inpatient Service (IP)"> Inpatient Service (IP)</option>
                                            <option value="Medical Department">Medical Department</option>
                                            <option value="Nursing Department"> Nursing Department</option>
                                            <option value="Paramedical Department">Paramedical Department</option>
                                            <option value="Physical Medicine">Physical Medicine</option>
                                            <option value="Operation Theatre Complex (OT)">Operation Theatre Complex (OT)</option>
                                            <option value="Inpatient Service (IP)"> Inpatient Service (IP)</option>
                                        </select>

                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        <p>User Account Type</p>
                                    </td>
                                    <td> <select name="staffAccType" id="">
                                        <option value="" disabled selected>
                                           Select the Account Type
                                        </option>
                                        <option value="Medical Staff">Medical Staff</option>
                                        <option value="Administrator">Administrator</option>
                                        
                                    </select></td>


                                    <td>Employee Type</td>
                                    <td>
                                        <select  id="department" name="staffEmpType">
                                        <option value="Nurses">Nurses</option>
                                        <option value="Physicians"> Physicians</option>
                                        <option value="Pharmacists">Pharmacists</option>
                                        <option value="Doctor">Doctor</option>
                                        </select>

                                    </td>


                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <input type="submit" name="staffAddSub" value="Add Staff Member">
                                    </td>
                                </tr>
                                <?php
                                    if(isset($_POST["staffAddSub"])){
                                        $staffFirstName=$_POST["staffFname"];
                                        $staffLastName=$_POST["staffLname"];
                                        $staffDob=$_POST["staffDob"];
                                        $staffGender=$_POST["staffGender"];
                                        $staffNic=$_POST["staffNic"];
                                        // $staffAge=$_POST["staffAge"];
                                        $staffMobile=$_POST["staffMobile"];
                                        $staffEmail=$_POST["staffEmail"];
                                        $staffAddress=$_POST["staffAddress"];
                                        $staffCity=$_POST["staffCity"];
                                        $staffState=$_POST["staffState"];
                                        $staffImg = "imgPath/".basename($_FILES["staffImg"]["name"]);
                                        move_uploaded_file($_FILES["staffImg"]["tmp_name"],$staffImg);
                                        $staffQual=$_POST["staffQualification"];
                                        $staffDept=$_POST["staffDept"];
                                        $staffAccType=$_POST["staffAccType"];
                                        $staffEmpType=$_POST["staffEmpType"];

                                        $insertStaff="INSERT INTO `staff`(`StaffID`, `FirstName`, `LatName`, `DOB`, `Gender`, `NIC`, `Mobile`, `email`, `streetAddress`, `City`, `Province`, `image`, `qualification`, `department`, `emp_type`) 
                                        VALUES (NULL,'".$staffFirstName."','".$staffLastName."','". $staffDob."','". $staffGender."','".$staffNic."','".$staffMobile."','".$staffEmail."','". $staffAddress."','".$staffCity."','".$staffState."','". $staffImg."','".$staffQual."','".$staffDept."','".$staffEmpType."')";

                                        $insertUserAcc="INSERT INTO `useracccount`(`username`, `password`, `accountType`) VALUES ('$staffEmail','$staffNic','$staffAccType')";

                                        mysqli_query($con,$insertStaff);
                                        mysqli_query($con,$insertUserAcc);
                                
                            }
                        ?>

                            </table>
                        </div>
                        </form>

                    </div>



                    <!-- END OF DINITHI'S CODE -->
                </div>
            </div>
        </div>
        <div class="catTwo" style="display: none;" id="Billingdiv">
            <div class="tabContent3">
                <div class="AppointmentleftHolder">
                    <input type="text" placeholder="Search by patient name" id="searchBarBilling" onkeyup="searchBilling()">
                    <div class="BillingLeftBigBox" id="BillingLeftBigBox">
                        <?php

                        if(mysqli_num_rows($selectAllPatientResult2)>0){
                            while($patRow2=mysqli_fetch_assoc($selectAllPatientResult2)){
                                echo "<div class='BillingContentBox'>                            
                                <p id='".$patRow2["FirstName"]."'>Patient Name : ".$patRow2["FirstName"]."</p>
                                <p id='".$patRow2["PatientID"]."'>Patient id : ".$patRow2["PatientID"]." </p>
                            </div>";
                            }
                        }
                        ?>                               
                    </div>
                </div>
                <div class="AppointmentRightHolder">
                    <form action="dashboard.php" method="POST">
                        <table border="0" class="AppointmentInputTable">
                            <tr>
                                <td>
                                    <input type="text" name="BillingPatId" id="BillingPatId" placeholder="Patient Id">
                                </td>
                                <td>
                                    <input type="text" name="BillingPatName" id="BillingPatName" placeholder="Patient Name">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Select a Date :</p>
                                </td>
                                <td>
                                    <input type="date" name="BillingDate">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Room Cost</p>
                                </td>
                                <td>
                                    <input type="text" placeholder="" name="BillingRoomCost">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Staff Charge :</p>
                                </td>
                                <td>
                                    <input type="text" name="BillingStaffCharge">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Medication Charge :</p>
                                </td>
                                <td>
                                    <input type="text" name="BillingMedCharge">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Discounts :</p>
                                </td>
                                <td>
                                    <input type="text" name="BillingDiscount">
                                </td>
                            </tr>
                            <tr aria-rowspan="2">
                                <td colspan="2">
                                    <input type="submit" name="BillingSub" id="" value="Generate Bill">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                         if(isset($_POST["BillingSub"])){
                            $billPatID=$_POST["BillingPatId"];
                            $billPatName=$_POST["BillingPatName"];
                            $billDate=$_POST["BillingDate"];
                            $billRoom=$_POST["BillingRoomCost"];
                            $billStaff=$_POST["BillingStaffCharge"];
                            $billMed=$_POST["BillingMedCharge"];
                            $billDisc=$_POST["BillingDiscount"];
                            
                            $insertBill="INSERT INTO `insertcost2`(`PID`, `Pdetails`, `Rcost`, `StaffCharge`, `Medicost`, `Discount`, `date`) 
                            VALUES ('".$billPatID."','".$billPatName."','".$billRoom."','".$billStaff."','".$billMed."','".$billDisc."','".$billDate."')";
                            mysqli_query($con,$insertBill);


                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="catTwo" style="display: none;" id="Appointmentsdiv">
            <div class="tileHolder2">
                <div class="homeTile TileCenter" onclick="windowManager('addAppointmentWindowPop')">
                    <p class="TileText">Add Appointments</p>
                </div>
            </div>
            <div class="staffList">
                <table border="0" class="appointmentsTable2">

                    <tr>
                        <th>
                            Appointments List
                        </th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Patient</th>
                        <th>Doctor</th>
                    </tr>
                </table>               
                <?php
                    if(mysqli_num_rows($selectAllappointmentResult2)>0){
                        while($appRow=mysqli_fetch_assoc($selectAllappointmentResult2)){
                            echo "<div class='appointmentTile'>
                            <table border='0' class='appointmentsTable'>
                                <tr>
                                    <td>
                                        <p>".$appRow["Date"]."</p>
                                    </td>
                                    <td>
                                        <img src='src/userimage.png' alt='' class='patientImg'>
        
                                        <p>".$appRow["PatientName"]."</p>
                                    </td>
                                    <td>
                                        <img src='src/userimage.png' alt='' class='patientImg'>
                                        <p>".$appRow["Doctor"]."</p>
                                    </td>
                                </tr>
                            </table>
                        </div>";
                        }
                    }
                ?>

            </div>
            <div class="addStaffWindow" id="addAppointmentWindowPop" style="height:80%; ">
                <div class="addStaffInner" id="insideAddStaff" style="display: none;">
                    <i class="fa fa-close closebtn" id="addStaffClosebtn" onclick="windowCloser('addAppointmentWindowPop')"></i>
                    <div class="tabContent3">
                        <div class="AppointmentleftHolder">
                            <input type="text" placeholder="Search by patient name" id="searchBar" onkeyup="searchFunction()">
                            <div class="AppointmentleftBigBox" id="AppointmentleftBigBox">                                
                                <?php
                                    if(mysqli_num_rows($selectAllPatResult)>0){
                                        while($patRow=mysqli_fetch_assoc($selectAllPatResult)){
                                            echo "<div class='AppointmentContentBox'>                                    
                                            <p id='".$patRow["FirstName"]."'>Patient Name : ".$patRow["FirstName"]." </p>
                                            <p id='".$patRow["PatientID"]."'>Patient id : ".$patRow["PatientID"]." </p>
                                        </div>";
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <div class="AppointmentRightHolder">
                            <form action="dashboard.php" method="POST">
                                <table border="0" class="AppointmentInputTable">
                                    <tr>
                                        <td>
                                            <input type="text" name="patId" id="patId" placeholder="Patient Id">
                                        </td>
                                        <td>
                                            <input type="text" name="patName" id="patName" placeholder="Patient Name">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Select a Date :</p>
                                        </td>
                                        <td>
                                            <input type="date" name="appDate">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Select a Time :</p>
                                        </td>
                                        <td>
                                            <input type="time" name="appTime">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Select a Doctor :</p>
                                        </td>
                                        <td>
                                            <select name="appDoc" id="">
                                                <option value="" disabled selected>
                                                    Pick a Doctor
                                                </option>
                                                <?php
                                                    if(mysqli_num_rows($docNameResult)>0){
                                                        while($docRow=mysqli_fetch_assoc($docNameResult)){
                                                            echo "<option value='".$docRow["FirstName"]."'>".$docRow["FirstName"]."</option>";
                                                        }
                                                    }
                                                ?> 
                                            </select>
                                        </td>
                                    </tr>
                                    <tr aria-rowspan="2">
                                        <td colspan="2">
                                            <input type="submit" name="AddAppSubmit" id="" value="Add Appointment">
                                        </td>
                                    </tr>
                                    <?php
                                    if(isset($_POST["AddAppSubmit"])){
                                        $appPatID=$_POST["patId"];
                                        $appPatName=$_POST["patName"];
                                        $appDate=$_POST["appDate"];
                                        $appTime=$_POST["appTime"];
                                        $appDoc=$_POST["appDoc"];
                                        
                                    $insertAppointment="INSERT INTO `appointments`(`AppointmnetID`, `PatientID`, `PatientName`, `Date`, `Time`, `Doctor`) 
                                    VALUES (NULL,'".$appPatID."','".$appPatName."','".$appDate."','".$appTime."','".$appDoc."')";

                                    mysqli_query($con,$insertAppointment);


                                    }
                                    ?>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="catTwo" style="display: none;" id="Inventorydiv">
            <div class="tabContent3">
                <!---DINITHI -->
                
                <!--DINITHI WINDOW-->
                


                        
                        <!--<div class="AppointmentleftBigBox" id="AppointmentleftBigBox">
                                    <div class="AppointmentContentBox">-->


                        <table id="myTable2">
                            <tr>
                                <td colspan="6">
                                <input type="text" placeholder="Search by Inventory name" id="searchInventoryBar" onkeyup="searchInventory()">
                                </td>
                            
                            </tr>
                        </table>            
                        <table id="myTable">
                            
                            <tr class="header">
                                <th style="width:20%;">Product Name</th>
                                <th style="width:20%;">MedID</th>
                                <th style="width:20%;">Manufacture</th>

                                <th style="width:20%;">Catergory</th>

                                <th style="width:40%;">Availability</th>

                                <th style="width:40%;">Expiry Date</th>
                            </tr>
                            <?php
                                                                    
                        
                                $con=mysqli_connect("localhost","root","","FINAL_PROJECT");
                            if(!$con)
                            {
                            die("Cannot connect to DB Server");
                            echo"Can't connect";
                            }
                            $sql1="SELECT COUNT(*) AS count_p FROM `Inventory`";
                            
                            
                        
                            mysqli_query($con,$sql1);
                            $result1=mysqli_query($con,$sql1);
                            if(mysqli_num_rows($result1)>0)
                                {
                                    
                                    $no_row=mysqli_num_rows($result1);
                                    $row1=mysqli_fetch_assoc($result1);
                                    $count=$row1["count_p"];
                                }
                            
                                
                                for($i=1;$i<=$count;$i++)
                                {
                                    
                                    $sql2="SELECT * FROM `Inventory` WHERE `tempID`='".$i."'";
                                
                                    $result2=mysqli_query($con,$sql2);
                                
                                    if(mysqli_num_rows($result2)>0)
                                    {
                                    
                                        $no_row=mysqli_num_rows($result2);
                                        $row2=mysqli_fetch_assoc($result2);
                                        echo " <tr onclick=location.href='inventoryManager.php?id=".$row2["MedID"]."'>";
                                    
                                        echo"<td>".$row2["ProductName"]."</td>";
                                        echo"<td>".$row2["MedID"]."</td>";
                                        echo"<td>".$row2["Manufacture"]."</td>";
                                        
                                        echo"<td>".$row2["Category"]."</td>";
                                    
                                        echo"<td>".$row2["Availability"]."</td>";

                                        echo "<td>".$row2["ExpiryDate"]."</td>";
                                    

                                        
                                        
                                    
                                        echo "</tr>";

                                    }
                                
                                }
                            
                        ?>




                        </table>


                        <!---PHP END-->

            </div>
                    
        </div>
        <div class="catTwo" style="display: none;" id="Monthly Reportsdiv">
            <div class="tileHolder2">
            <div class="homeTile TileCenter" id="addPatientOpenbtn" onclick="windowManager('addInvReportWindowPop')">
                        <p class="TileText">Inventory Report</p>
                    </div>
                    <div class="homeTile TileCenter" onclick="windowManager('addAppReportWindowPop')">
                        <p class="TileText">Appointment Report</p>
                    </div>
                    <div class="homeTile TileCenter" onclick="windowManager('addPrescReportWindowPop')">
                        <p class="TileText">Prescription Report</p>
                    </div>
                    <div class="homeTile TileCenter" onclick="windowManager('addStaffReportWindowPop')">
                        <p class="TileText">Staff Report</p>
                    </div>
                </div>
                <div class="addStaffWindow" id="addInvReportWindowPop">
                    <div class="addStaffInner" id="insideAddPatient" style="display: none;">
                        <i class="fa fa-close closebtn" id="addPatientClosebtn" onclick="windowCloser('addInvReportWindowPop')"></i>
                        <!-- <div id="piechart" style="width: 900px; height: 500px;"></div> -->
                        <!-- START OF DINITHI'S CODE -->
                        <div class="innerAddPatient">

                       
                       


                        <h1>Inventory Report</h1>
                        <!--<div class="AppointmentleftBigBox" id="AppointmentleftBigBox">
                                    <div class="AppointmentContentBox">-->

                                   

                        <table id="myTable">
                            <tr class="header">
                            <th style="width:20%;">Product Name</th>
                            <th style="width:20%;">MedID</th>
                            <th style="width:20%;">Manufacture</th>
                            <th style="width:20%;">Problem</th>
                            <th style="width:20%;">Catergory</th>
                            <th style="width:40%;">Price/unit</th>
                            <th style="width:40%;">Availability</th>
                            <th style="width:40%;">Expiry Date</th>
                           
                            <th style="width:40%;"></th>
                            </tr>
                            <?php
                                                                    
                                            
                                                    $con=mysqli_connect("localhost","root","","FINAL_PROJECT");
                                                if(!$con)
                                                {
                                                die("Cannot connect to DB Server");
                                                echo"Can't connect";
                                                }
                                                $sql1="SELECT COUNT(*) AS count_p FROM `Inventory`";
                                                
                                                
                                            
                                                mysqli_query($con,$sql1);
                                                $result1=mysqli_query($con,$sql1);
                                                if(mysqli_num_rows($result1)>0)
                                                    {
                                                        
                                                        $no_row=mysqli_num_rows($result1);
                                                        $row1=mysqli_fetch_assoc($result1);
                                                        $count=$row1["count_p"];
                                                    }
                                                
                                                    
                                                    for($i=1;$i<=$count;$i++)
                                                    {
                                                        
                                                        $sql2="SELECT * FROM `Inventory` WHERE `tempID`='".$i."'";
                                                    
                                                        $result2=mysqli_query($con,$sql2);
                                                        
                                                    
                                                        if(mysqli_num_rows($result2)>0)
                                                        {
                                                        
                                                            $no_row=mysqli_num_rows($result2);
                                                            $row2=mysqli_fetch_assoc($result2);
                                                            echo " <tr>";
                                                        
                                                            echo"<td>".$row2["ProductName"]."</td>";
                                                            echo"<td>".$row2["MedID"]."</td>";
                                                            echo"<td>".$row2["Manufacture"]."</td>";
                                                            echo"<td>".$row2["Problem"]."</td>";
                                                            echo"<td>".$row2["Category"]."</td>";
                                                            echo"<td>".$row2["Price"]."</td>";
                                                            echo"<td>".$row2["Availability"]."</td>";
                                                            echo"<td>".$row2["ExpiryDate"]."</td>";
                                                            

                                                            
                                                        
                                                            echo "</tr>";

                                                        }
                                                    
                                                    }
                                                
                                            ?>




                        </table>


                        </div>
                        </div>
                        </div>
                        <div class="addStaffWindow" id="addAppReportWindowPop">
                    <div class="addStaffInner" id="insideAddPatient" style="display: none;">
                        <i class="fa fa-close closebtn" id="addPatientClosebtn" onclick="windowCloser('addAppReportWindowPop')"></i>
                        <!-- <div id="piechart" style="width: 900px; height: 500px;"></div> -->
                        <!-- START OF DINITHI'S CODE -->
                        <div class="innerAddPatient">

                       
                       


                        <h1>Inventory Report</h1>
                        <!--<div class="AppointmentleftBigBox" id="AppointmentleftBigBox">
                                    <div class="AppointmentContentBox">-->

                                   

                                    <table id="myTable">
                            <tr class="header">
                            <th style="width:20%;">AppointmentID</th>
                            <th style="width:20%;">PatientID</th>
                            <th style="width:20%;">PatientName</th>
                            <th style="width:20%;">Date</th>
                            <th style="width:20%;">Time</th>
                            <th style="width:40%;">Doctor</th>
                           
                           
                            <th style="width:40%;"></th>
                            </tr>
                            <?php
                                                                    
                                            
                                                    $con=mysqli_connect("localhost","root","","FINAL_PROJECT");
                                                if(!$con)
                                                {
                                                die("Cannot connect to DB Server");
                                                echo"Can't connect";
                                                }
                                                $sql1="SELECT COUNT(*) AS count_p FROM `appointments`";
                                                
                                                
                                            
                                                mysqli_query($con,$sql1);
                                                $result1=mysqli_query($con,$sql1);
                                                if(mysqli_num_rows($result1)>0)
                                                    {
                                                        
                                                        $no_row=mysqli_num_rows($result1);
                                                        $row1=mysqli_fetch_assoc($result1);
                                                        $count=$row1["count_p"];
                                                    }
                                                
                                                    
                                                    for($i=1;$i<=$count;$i++)
                                                    {
                                                        
                                                        $sql2="SELECT * FROM `appointments` WHERE `AppointmnetID`='".$i."'";
                                                    
                                                        $result2=mysqli_query($con,$sql2);
                                                        
                                                    
                                                        if(mysqli_num_rows($result2)>0)
                                                        {
                                                        
                                                            $no_row=mysqli_num_rows($result2);
                                                            $row2=mysqli_fetch_assoc($result2);
                                                            echo " <tr>";
                                                        
                                                           
                                                            echo"<td>".$row2["AppointmnetID"]."</td>";
                                                            echo"<td>".$row2["PatientID"]."</td>";
                                                            echo"<td>".$row2["PatientName"]."</td>";
                                                            echo"<td>".$row2["Date"]."</td>";
                                                            echo"<td>".$row2["Time"]."</td>";
                                                            echo"<td>".$row2["Doctor"]."</td>";
                                                          
                                                            
                                                        
                                                            echo "</tr>";

                                                        }
                                                    
                                                    }
                                                
                                            ?>




                        </table>


                        </div>
                        </div>
                        </div>
                        <div class="addStaffWindow" id="addPrescReportWindowPop">
                    <div class="addStaffInner" id="insideAddPatient" style="display: none;">
                        <i class="fa fa-close closebtn" id="addPatientClosebtn" onclick="windowCloser('addPrescReportWindowPop')"></i>
                        <!-- <div id="piechart" style="width: 900px; height: 500px;"></div> -->
                        <!-- START OF DINITHI'S CODE -->
                        <div class="innerAddPatient">

                       
                       


                        <h1>Inventory Report</h1>
                        <!--<div class="AppointmentleftBigBox" id="AppointmentleftBigBox">
                                    <div class="AppointmentContentBox">-->

                                   

                                    <table id="myTable">
                            <tr class="header">
                            <th style="width:20%;">PatientName</th>
                            <th style="width:20%;">PatientID</th>
                            <th style="width:20%;">Doctor</th>
                            <th style="width:20%;">Medical Condition</th>
                            <th style="width:20%;">Drug</th>
                            <th style="width:40%;">Drug quantity</th>
                           
                           
                            <th style="width:40%;"></th>
                            </tr>
                            <?php
                                                                    
                                            
                                                    $con=mysqli_connect("localhost","root","","FINAL_PROJECT");
                                                if(!$con)
                                                {
                                                die("Cannot connect to DB Server");
                                                echo"Can't connect";
                                                }
                                                $sql1="SELECT COUNT(*) AS count_p FROM `appointments`";
                                                
                                                
                                            
                                                mysqli_query($con,$sql1);
                                                $result1=mysqli_query($con,$sql1);
                                                if(mysqli_num_rows($result1)>0)
                                                    {
                                                        
                                                        $no_row=mysqli_num_rows($result1);
                                                        $row1=mysqli_fetch_assoc($result1);
                                                        $count=$row1["count_p"];
                                                    }
                                                
                                                    
                                                    for($i=1;$i<=$count;$i++)
                                                    {
                                                        
                                                        $sql2="SELECT * FROM `prescription` WHERE `patientId`='".$i."'";
                                                    
                                                        $result2=mysqli_query($con,$sql2);
                                                        
                                                    
                                                        if(mysqli_num_rows($result2)>0)
                                                        {
                                                        
                                                            $no_row=mysqli_num_rows($result2);
                                                            $row2=mysqli_fetch_assoc($result2);
                                                            echo " <tr>";
                                                        
                                                           
                                                            echo"<td>".$row2["patientName"]."</td>";
                                                            echo"<td>".$row2["patientId"]."</td>";
                                                            echo"<td>".$row2["doctor"]."</td>";
                                                            echo"<td>".$row2["MedicalCondition"]."</td>";
                                                            echo"<td>".$row2["drugName"]."</td>";
                                                            echo"<td>".$row2["drugQuantity"]."</td>";
                                                          
                                                            
                                                        
                                                            echo "</tr>";

                                                        }
                                                    
                                                    }
                                                
                                            ?>




                        </table>


                        </div>
                        </div>
                        </div>
                        <div class="addStaffWindow" id="addStaffReportWindowPop">
                    <div class="addStaffInner" id="insideAddPatient" style="display: none;">
                        <i class="fa fa-close closebtn" id="addPatientClosebtn" onclick="windowCloser('addStaffReportWindowPop')"></i>
                        <!-- <div id="piechart" style="width: 900px; height: 500px;"></div> -->
                        <!-- START OF DINITHI'S CODE -->
                        <div class="innerAddPatient">

                       
                       


                        <h1>Inventory Report</h1>
                        <!--<div class="AppointmentleftBigBox" id="AppointmentleftBigBox">
                                    <div class="AppointmentContentBox">-->

                                   

                                    <table id="myTable">
                            <tr class="header">
                            <th style="width:20%;">StaffId</th>
                            <th style="width:20%;">Name</th>
                            <th style="width:20%;">nic</th>
                            <th style="width:20%;">email</th>
                            <th style="width:20%;">Employee Type</th>
                            
                           
                           
                            <th style="width:40%;"></th>
                            </tr>
                            <?php
                                                                    
                                            
                                                    $con=mysqli_connect("localhost","root","","FINAL_PROJECT");
                                                if(!$con)
                                                {
                                                die("Cannot connect to DB Server");
                                                echo"Can't connect";
                                                }
                                                $sql1="SELECT COUNT(*) AS count_p FROM `staff`";
                                                
                                                
                                            
                                                mysqli_query($con,$sql1);
                                                $result1=mysqli_query($con,$sql1);
                                                if(mysqli_num_rows($result1)>0)
                                                    {
                                                        
                                                        $no_row=mysqli_num_rows($result1);
                                                        $row1=mysqli_fetch_assoc($result1);
                                                        $count=$row1["count_p"];
                                                    }
                                                
                                                    
                                                    for($i=1;$i<=$count;$i++)
                                                    {
                                                        
                                                        $sql2="SELECT * FROM `staff` WHERE `StaffID`='".$i."'";
                                                    
                                                        $result2=mysqli_query($con,$sql2);
                                                        
                                                    
                                                        if(mysqli_num_rows($result2)>0)
                                                        {
                                                        
                                                            $no_row=mysqli_num_rows($result2);
                                                            $row2=mysqli_fetch_assoc($result2);
                                                            echo " <tr>";
                                                        
                                                           
                                                            echo"<td>".$row2["StaffID"]."</td>";
                                                            echo"<td>".$row2["FirstName"]."</td>";
                                                            echo"<td>".$row2["NIC"]."</td>";
                                                            echo"<td>".$row2["email"]."</td>";
                                                            echo"<td>".$row2["emp_type"]."</td>";
                                                            // echo"<td>".$row2["drugQuantity"]."</td>";
                                                          
                                                            
                                                        
                                                            echo "</tr>";

                                                        }
                                                    
                                                    }
                                                
                                            ?>




                        </table>


                        </div>
                        </div>
                        </div>
                        
          
        </div>              
            </div>
        </div>


    </div>

    <?php
        $sqlX="SELECT * FROM `staff` WHERE `email` = '".$_SESSION["uname"]."'";
        $sqlresult=mysqli_query($con,$sqlX);
        if(mysqli_num_rows($sqlresult)>0){
            $loggedinrow=mysqli_fetch_assoc($sqlresult);
        }
    ?>  
    <div class="rightDiv ">
        <div class="userImg">
            <img src="src/userimage.png" alt="" class="loggedinuserImg">
        </div>
        <p>
            <?php echo $loggedinrow["FirstName"]; ?>
        </p>
        <p>
            Staff Id :
            <?php echo $loggedinrow["StaffID"]; ?>
        </p>
        <form method="post">
        <button id="logout" name="logout">   
            Logout         
        </button>        
        </form>
        

    </div>


</body>

<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("slideSelect");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            // console.log("current before is :", current[0]);
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
            console.log(this.id);
            divFunc(this.id);
            // var test = document.getElementById(this.id).textContent;
            // console.log("Current after is : ", current[0]);
            // console.log(test);
            // console.log(this.className);
            // console.log("id is :", this.id);
        });
    }
</script>

<script>
    // function divFunc(divId) {
    //     var div = divId.concat("div");
    //     var main = document.getElementById("contentDiv");
    //     var innerArr = main.getElementsByTagName("div");
    //     // console.log("forwareded value :", div);
    //     for (var i = 0; i < innerArr.length; i++) {
    //         console.log("array value :", innerArr[i]);

    //         if (innerArr[i].id == div) {
    //             // console.log("Matching pair is :", innerArr[i]);
    //             // console.log("And :", div);
    //             document.getElementById(innerArr[i].id).style.display = "block";
    //             // var x = document.getElementById(div);
    //             // x.style.display = "block";
    //         } else {
    //             document.getElementById(innerArr[i].id).style.display = "none";
    //         }

    //     }


    // }
</script>

<script>
    function divFunc(divId) {
        var divArray = ["Homediv", "Manage Patientdiv", "Manage Staffdiv", "Billingdiv", "Appointmentsdiv", "Inventorydiv", "Monthly Reportsdiv"];
        var div = divId.concat("div");
        document.getElementById(div).style.display = "block";
        for (var i = 0; i < divArray.length; i++) {
            if (divArray[i] != div) {
                document.getElementById(divArray[i]).style.display = "none";
            }

        }
    }
</script>


<script>
    // function divFunc(divId) {
    //     const divArray = ["Homediv", "Manage Patientdiv", "Manage Staffdiv", "Billingdiv", "Appointmentsdiv", "Inventorydiv", "Monthly Reportsdiv"];
    //     var div = divId.concat("div");

    //     console.log("div is : ", div);

    //     for (var i = 0; i < divArray.length; i++) {
    //         if (divArray[i] == div) {
    //             document.getElementById(divArray[i]).style.display = "block";
    //             console.log("success :", div);
    //         } else {
    //             document.getElementById(div).style.display = "none";
    //             console.log("fail");
    //         }

    //     }

    // }
</script>

<!-- <script>
    var closebtn = document.getElementById("closeBtn");
    closebtn.addEventListener("click", function() {
        document.getElementById("sideNavbar").style.width = "0";
    });
</script> -->

<script>
    // var closeStaff = document.getElementById("addStaffClosebtn");
    // closeStaff.addEventListener("click", function() {
    //     document.getElementById("addStaffWindowPop").style.width = "0%";
    //     closeStaff.style.display = "none";
    //     document.getElementById("insideAddStaff").style.display = "none";
    //     document.getElementById("addStaffForm").style.display = "none";


    // });

    // var openStaff = document.getElementById("addStaffOpenbtn");
    // openStaff.addEventListener("click", function() {
    //     document.getElementById("addStaffWindowPop").style.width = "75%";
    //     closeStaff.style.display = "block";
    //     document.getElementById("insideAddStaff").style.display = "block";
    //     document.getElementById("addStaffForm").style.display = "block";

    // });

    // var closePatient = document.getElementById("addPatientClosebtn");
    // var openPatient = document.getElementById("addPatientOpenbtn");
    // openPatient.addEventListener("click", function() {
    //     document.getElementById("addPatientWindowPop").style.width = "75%";
    //     closePatient.style.display = "block";
    //     document.getElementById("insideAddPatient").style.display = "block";
    //     document.getElementById("addPatientForm").style.display = "block";

    // });
    // closePatient.addEventListener("click", function() {
    //     document.getElementById("addPatientWindowPop").style.width = "0%";
    //     closePatient.style.display = "none";
    //     document.getElementById("insideAddPatient").style.display = "none";
    //     document.getElementById("addPatientForm").style.display = "none";

    // });
    function windowManager(windowId) {
        var windows, i, j, everyInner;

        var current = document.getElementById(windowId);
        current.style.width = "80%";
        var inner = current.getElementsByClassName("addStaffInner");
        inner[0].style.display = "block";

        windows = document.getElementsByClassName("addStaffWindow");
        for (i = 0; i < windows.length; i++) {
            if (windows[i].id != windowId) {
                document.getElementById(windows[i].id).style.width = "0%";
                everyInner = windows[i].getElementsByClassName("addStaffInner");
                everyInner[0].style.display = "none";

            }
        }
    }


    function windowCloser(windowId) {
        var current = document.getElementById(windowId);
        var inner = current.getElementsByClassName("addStaffInner");
        inner[0].style.display = "none";
        current.style.width = "0%"
    }
</script>
<script>
    function openInfo(evt, info) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabContent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(info).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<!-- <script>
    var prof = document.getElementById("profileDetails");
    prof.addEventListener("click", function() {
        document.getElementById("OtherDetails").style.display = "none";
        document.getElementById("profileDetails").style.display = "block";
    });

    var oth = document.getElementById("OtherDetails");
    oth.addEventListener("click", function() {
        document.getElementById("profileDetails").style.display = "none";
        document.getElementById("OtherDetails").style.display = "block";
    });
</script> -->

<script>
    var main = document.getElementById("AppointmentleftBigBox");
    var inside = main.getElementsByClassName("AppointmentContentBox");
    for (var i = 0; i < inside.length; i++) {
        inside[i].addEventListener("click", function() {
            var currentActive = document.getElementsByClassName("activated");
            for (var x = 0; x < currentActive.length; x++) {
                console.log("Current val ", x, currentActive[x]);
            }

            if (currentActive.length > 0) {
                currentActive[0].className = currentActive[0].className.replace(" activated", "");
            }

            this.className += " activated";
            var mostinner = this.getElementsByTagName("p");
            for (var j = 0; j < mostinner.length; j++) {
                document.getElementById("patName").value = mostinner[0].id;
                document.getElementById("patId").value = mostinner[1].id;

            }
        });
    }

    function searchFunction() {
        // Declare variables 
        var input, filter, outsideBox, insideDiv, p, i, txtValue;
        input = document.getElementById("searchBar");
        filter = input.value.toUpperCase(); //get serached value and turn to upper case

        outsideBox = document.getElementById("AppointmentleftBigBox");
        insideDiv = outsideBox.getElementsByClassName("AppointmentContentBox"); //since tr is tage takes getelemnet by tag

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < insideDiv.length; i++) {
            p = insideDiv[i].getElementsByTagName("p")[0];
            if (p) {
                txtValue = p.textContent || p.innerText; //innerText is function of html

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    insideDiv[i].style.display = "";
                } else {
                    insideDiv[i].style.display = "none";
                }
            }
        }
    }
</script>

<script>
    var main = document.getElementById("BillingLeftBigBox");
    var inside = main.getElementsByClassName("BillingContentBox");
    for (var i = 0; i < inside.length; i++) {
        inside[i].addEventListener("click", function() {
            var currentActive = document.getElementsByClassName("activated");
            for (var x = 0; x < currentActive.length; x++) {
                console.log("Current val ", x, currentActive[x]);
            }

            if (currentActive.length > 0) {
                currentActive[0].className = currentActive[0].className.replace(" activated", "");
            }

            this.className += " activated";
            var mostinner = this.getElementsByTagName("p");
            for (var j = 0; j < mostinner.length; j++) {
                document.getElementById("BillingPatName").value = mostinner[0].id;
                document.getElementById("BillingPatId").value = mostinner[1].id;

            }
        });
    }

    function searchBilling() {
        // Declare variables 
        var input, filter, outsideBox, insideDiv, p, i, txtValue;
        input = document.getElementById("searchBarBilling");
        filter = input.value.toUpperCase(); //get serached value and turn to upper case

        outsideBox = document.getElementById("BillingLeftBigBox");
        insideDiv = outsideBox.getElementsByClassName("BillingContentBox"); //since tr is tage takes getelemnet by tag

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < insideDiv.length; i++) {
            p = insideDiv[i].getElementsByTagName("p")[0];
            if (p) {
                txtValue = p.textContent || p.innerText; //innerText is function of html

                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    insideDiv[i].style.display = "";
                } else {
                    insideDiv[i].style.display = "none";
                }
            }
        }
    }

    function searchInventory() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("searchInventoryBar");
  filter = input.value.toUpperCase();//get serached value and turn to upper case
  
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");//since tr is tage takes getelemnet by tag

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;//innerText is function of html
     
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display="";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>

</html>