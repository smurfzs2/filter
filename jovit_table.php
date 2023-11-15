<?php
session_start();
include 'jovit_dbConn.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>FILTER</title>
<link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>

<!-- searchbox -->
<div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12">
                <form action="#" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search by First Name" name="first_name">
                        <input type="text" class="form-control" placeholder="Search by Last Name" name="last_name">
                        <input type="text" class="form-control" placeholder="Search by Address" name="address">
                        <select class="form-control" name="gender">
                            <option value="" selected disabled>Search by Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                        <input type="date" class="form-control" placeholder="Search by Birthday" name="birthday">
                        <input type="department" class="form-control" placeholder="Search by Department" name="department">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- table -->
        <div class="row">
            <!-- rest of your existing code -->
        </div>
    </div>
















<!-- table -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Details

                    <a href="jovit_pieChart.php" class="btn btn-primary float-end" style="margin-right: 10px;">Pie Chart</a>
                    <a href="jovit_barGraph.php" class="btn btn-primary float-end" style="margin-right: 10px; margin-bottom: 10px;">Bar Graph</a>
                    <a href="jovit_clustered.php" class="btn btn-primary float-end" style="margin-right: 10px; margin-bottom: 10px;">Clustered</a>


                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Birthdate</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM tbl_jovit";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $idnumber = 1;
                            foreach ($query_run as $details) {
                                ?>
                                <tr>
                                    <td><?= $idnumber++; ?></td>
                                    <td><?= $details['firstName']; ?></td>
                                    <td><?= $details['lastName']; ?></td>
                                    <td><?= $details['gender'] == '1' ? "Male" : "Female"; ?></td>
                                    <td><?= $details['address']; ?></td>
                                    <td><?= date('F j, Y', strtotime($details['birthDate'])); ?></td>
                                    <td><?= $details['departmentId'];?></td>
                                    <td>
                                        <a href="jovit_edit.php?id=<?= $details['id']; ?>"
                                           class="btn btn-success btn-sm">Edit</a>
                                        <form action="jovit_code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_data"
                                                    value="<?= $details['id']; ?>"
                                                    class="btn btn-danger btn-sm">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
