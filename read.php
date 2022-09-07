<?php
include('dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP simple CRUD</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
</head>

<style>
    body {
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
    }

    a {
        text-decoration: none;
        padding: 2px 4px;
        border-radius: 3px;
        color: black;
        font-weight: bold;
    }

    .view {
        background-color: royalblue;
        color: white;
    }

    .edit {
        background-color: #029e74;
        color: white;
    }

    .delete {
        background-color: #E94560;
        color: white;
    }

    table,
    td,
    th {
        border: 1px solid;
        border-collapse: collapse;
    }

    table {
        background-color: #F9F9F9;
    }

    td {
        padding: 10px 15px;
        width: 10%;
    }

    th {
        height: 70px;
    }

    td {
        width: 10%;
    }
</style>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>User <b>Details</b></h2>
                        </div>

                    </div>
                </div>
                <table cellpadding="0" cellspacing="0" border="0" class="display table  table-bordered table-bordered" id="hidden-table-info">

                    <tbody>
                        <?php
                        $vid = $_GET['viewid'];
                        $ret = mysqli_query($con, "select * from tblusers where ID =$vid");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {

                        ?>
                            <tr>
                                <th>First Name</th>
                                <td><?php echo $row['FirstName']; ?></td>
                                <th>Last Name</th>
                                <td><?php echo $row['LastName']; ?></td>
                                <th>Gender</th>
                                <td><?php echo $row['gender']; ?></td>
                            </tr>
                            <tr>

                                <th>Email</th>
                                <td><?php echo $row['Email']; ?></td>
                                <th>Mobile Number</th>
                                <td><?php echo $row['MobileNumber']; ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo $row['Address']; ?></td>
                                <th>Creation Date</th>
                                <td><?php echo $row['CreationDate']; ?></td>
                            </tr>
                        <?php
                            $cnt = $cnt + 1;
                        } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>