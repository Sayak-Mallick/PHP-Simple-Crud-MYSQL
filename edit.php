<?php
//Database Connection
include('dbconnection.php');
if (isset($_POST['submit'])) {
    $eid = $_GET['editid'];
    //Getting Post Values
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contno = $_POST['contactno'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $add = $_POST['address'];

    //Query for data updation
    $query = mysqli_query($con, "update  tblusers set FirstName='$fname',LastName='$lname', MobileNumber='$contno', gender='$gender', Email='$email', Address='$add' where ID='$eid'");

    if ($query) {
        echo "<script>alert('You have successfully update the data');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Update User</div>
        <div class="content">
            <form method="POST">
                <?php
                $eid = $_GET['editid'];
                $ret = mysqli_query($con, "select * from tblusers where ID='$eid'");
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $row['FirstName']; ?>" required="true">
                        </div>
                        <div class="input-box">
                            <span class="details">Last name</span>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $row['LastName']; ?>" required="true">
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input type="email" class="form-control" name="email" placeholder="Enter your Email id" value="<?php echo $row['Email']; ?>" required="true">
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" class="form-control" name="contactno" placeholder="Enter your Mobile Number" value="<?php echo $row['MobileNumber']; ?>" required="true" maxlength="10" pattern="[0-9]+">
                        </div>
                        <div class="input-box">
                            <span class="details">Address</span>
                            <textarea class="form-control" name="address" placeholder="Enter Your Address" required="true"><?php echo $row['Address']; ?></textarea>
                        </div>

                    </div>
                    <div class="gender-details">
                        <input id="dot-1" type="radio" name="gender" value="Male" <?php if ($row['gender'] == "Male") {
                                                                                        echo "checked";
                                                                                    } ?> />
                        <input id="dot-2" type="radio" name="gender" value="Female" <?php if ($row['gender'] == "Female") {
                                                                                        echo "checked";
                                                                                    } ?> />
                        <span class="gender-title">Gender</span>
                        <div class="category">
                            <label for="dot-1">
                                <span class="dot one"></span>
                                <span class="gender">Male</span>
                            </label>
                            <label for="dot-2">
                                <span class="dot two"></span>
                                <span class="gender">Female</span>
                            </label>
                        </div>
                    </div>
                <?php
                } ?>
                <div class="button">
                    <input type="submit" name="submit" value="Update">
                </div>
            </form>
            <center>
                <div class="text-center">View Aready Inserted Data!! <a style='background-color: royalblue; color: white;text-decoration: none;padding: 4px 8px;border-radius: 3px;font-weight: bold;' href="index.php">View</a></div>
            </center>
        </div>
    </div>

</body>

</html>