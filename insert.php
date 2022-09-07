<?php
//Databse Connection file
include('dbconnection.php');
if (isset($_POST['submit'])) {
    //getting the post values
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contno = $_POST['contactno'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $add = $_POST['address'];

    // Query for data insertion
    $query = mysqli_query($con, "insert into tblusers(FirstName,LastName, MobileNumber,gender, Email, Address) values('$fname','$lname', '$contno','$gender', '$email', '$add' )");
    if ($query) {
        echo "<script>alert('You have successfully inserted the data');</script>";
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
        <div class="title">Insert User</div>
        <div class="content">
            <form method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" class="form-control" name="fname" placeholder="First Name" required="true">
                    </div>
                    <div class="input-box">
                        <span class="details">Last name</span>
                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required="true">
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" class="form-control" name="email" placeholder="Enter your Email id" required="true">
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" class="form-control" name="contactno" placeholder="Enter your Mobile Number" required="true" maxlength="10" pattern="[0-9]+">
                    </div>
                    <div class="input-box">
                        <span class="details">Address</span>
                        <textarea class="form-control" name="address" placeholder="Enter Your Address" required="true"></textarea>
                    </div>

                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" value="Male" id="dot-1">
                    <input type="radio" name="gender" value="Female" id="dot-2">
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
                <div class="button">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
            <center>  
                <div class="text-center">View Aready Inserted Data!! <a style='background-color: royalblue; color: white;text-decoration: none;padding: 4px 8px;border-radius: 3px;font-weight: bold;' href="index.php">View</a></div>
            </center>
        </div>
    </div>

</body>

</html>