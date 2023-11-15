<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style/style.css">

    <?php
    include '../connection.php';
    
    function getByID($table,$id){
        global $db;
        $query = "SELECT * FROM $table WHERE id='$id'";
        return $query_run = mysqli_query($db,$query);
    }
    ?>

    
</head>
<body>

<div class="container">

   
    <form action="jera_action.php" method="POST">

    <?php 

        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $data = getByID($db, "tbl_jeramay",$id);
        
            if(mysqli_num_rows($data) > 0)
            {
                $data = mysqli_fetch_array($data);
            
            ?>
                <h2>Your details</h2>
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <div class="row">
                    <div class="col-25">
                    <label for="fname">First Name</label>
                    </div>
                    <div class="col-75">
                    <input required type="text" name="firstName" value="<?php echo $data['firstName'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                    <label for="lname">Last Name</label>
                    </div>
                    <div class="col-75">
                    <input required type="text" name="lastName" value="<?php echo $data['lastName'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                    <label for="address">Address</label>
                    </div>
                    <div class="col-75">
                    <textarea required name="address"  cols="30" rows="3"><?php echo $data['address'];?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                    <label for="gender">Gender</label>
                    </div>
                    <div class="col-75">
                              <input required type="radio" name="gender" <?=$data['gender']=="0" ? "checked" : ""?> value="0" >
                              <label for="male">Male</label>
                              <input required type="radio" name="gender" <?=$data['gender']=="1" ? "checked" : ""?> value="1">
                              <label for="female">Female</label>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                    <label for="bday">Birthday</label>
                    </div>
                    <div class="col-75">
                    <input required type="date" name="birthday" value="<?php echo date('Y-m-d',strtotime($data["birthday"]))?>">
                    </div>
                </div>
            
            <div class="row">
                <input style="background-color: black;"  type="submit" name="update_btn" value="Update">
            </div>

            <?php
            }

}
            else echo "error";

            ?>

    </form>
</div>

</body>
</html>


