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
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        echo "<script type='text/javascript'> document.location ='index.php'; </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP simple CRUD</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="signup-form">
        <form method="POST">
            <?php
            $eid = $_GET['editid'];
            $ret = mysqli_query($con, "select * from tblusers where ID='$eid'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
            <h2>Update </h2>

            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="fname"
                            value="<?php echo $row['FirstName']; ?>" required="true"></div>
                    <div class="col"><input type="text" class="form-control" name="lname"
                            value="<?php echo $row['LastName']; ?>" required="true"></div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="contactno" value="<?php echo $row['MobileNumber']; ?>"
                    required="true" maxlength="10" pattern="[0-9]+">
            </div>

            <div class="form-group">
                <input type="radio" name="gender" value="Male"
                    <?php if ($gender == 'Male') echo 'checked="checked"'; ?>" />
                Male<br />
                <input type="radio" name="gender" value="Female"
                    <?php if ($gender == 'Female') echo 'checked="checked"'; ?>" />
                Female<br />


            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" value="<?php echo $row['Email']; ?>"
                    required="true">
            </div>

            <div class="form-group">
                <textarea class="form-control" name="address" required="true"><?php echo $row['Address']; ?></textarea>
            </div>
            <?php
            } ?>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
            </div>
        </form>

    </div>
</body>

</html>