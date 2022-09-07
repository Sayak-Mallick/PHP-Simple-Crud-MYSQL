<?php
//database conection  file
include('dbconnection.php');
//Code for deletion
if (isset($_GET['delid'])) {
    $rid = intval($_GET['delid']);
    $sql = mysqli_query($con, "delete from tblusers where ID=$rid");
    echo "<script>alert('Data deleted');</script>";
    echo "<script>window.location.href = 'index.php'</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHP simple CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
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

    .button,
    .button::after {
        width: 380px;
        height: 86px;
        font-size: 36px;
        background: linear-gradient(45deg, transparent 5%, #E94560 5%);
        border: 0;
        color: #fff;
        letter-spacing: 3px;
        line-height: 88px;
        box-shadow: 6px 0px 0px #00E6F6;
        outline: transparent;
        position: relative;
    }

    .button:hover {
        color: royalblue;
        background: linear-gradient(45deg, transparent 5%, #EBC7E8 5%);
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
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7" align="right">
                            <a id="newUser" href="insert.php" class="button btn btn-secondary"><i class="material-icons">&#xE147;</i>
                                <span>Add New User</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-hover table-lg">
                    <thead>
                        <tr>
                            <th>SL.NO</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Created Date</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ret = mysqli_query($con, "select * from tblusers");
                        $cnt = 1;
                        $row = mysqli_num_rows($ret);
                        if ($row > 0) {
                            while ($row = mysqli_fetch_array($ret)) {

                        ?>
                                <!--Fetch the Records -->
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['FirstName']; ?> <?php echo $row['LastName']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                                    <td><?php echo $row['MobileNumber']; ?></td>
                                    <td> <?php echo $row['CreationDate']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>

                                    <td>
                                        <center>
                                            <a style="font-size:11px ;" href="read.php?viewid=<?php echo htmlentities($row['ID']); ?>" class="view" title="View" data-toggle="tooltip">VIEW</a>
                                            <a style="font-size:11px ;" href="edit.php?editid=<?php echo htmlentities($row['ID']); ?>" class="edit" title="Edit" data-toggle="tooltip">EDIT</a>
                                            <a style="font-size:11px ;" href="index.php?delid=<?php echo ($row['ID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');">DELETE
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                            <?php
                                $cnt = $cnt + 1;
                            }
                        } else { ?>
                            <tr>
                                <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>


</html>