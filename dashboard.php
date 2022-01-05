<?php

include("connection.php");
session_start();
if(isset($_POST['foodtype']) && isset($_POST['location']))
{
    $foodtype = $_POST["foodtype"];
    $location = $_POST["location"];
    
    $sql = "INSERT INTO food (foodtype, location) VALUES ( '$foodtype', '$location')";   // Use you own column name from login table
    if (!mysqli_query($con, $sql)) {
        echo "Error: " . mysqli_error($con);
    }
    
}

$query="select * from food"; 
$result=mysqli_query($con,$query); 


      ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/my-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="js/cards.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>
    <!--header area start-->
    <header>
        <div class="left_area">
            <h3>Food4<span>Thought</span></h3>
        </div>
        <div class="right_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!--header area end-->
    <!--sidebar start-->
    <section>
        <div class="sidebar">
            <center>
                <img src="img/1.png" class="profile_image" alt="">
                <h4>Demo User</h4>
            </center>
            <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
            <a href="#popup1"><i class="fas fa-cogs"></i><span>Create Request</span></a>
            <a href="javascript:gclick()"><i class="fas fa-table"></i><span>Create Card</span></a>
            <a href="#"><i class="fas fa-th"></i><span>ABC</span></a>
            <a href="#"><i class="fas fa-info-circle"></i><span>ABC</span></a>
            <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
        </div>
        <!--sidebar end-->
    </section>





    <div id="box1" class="container-1">
        <?php while($rows=mysqli_fetch_assoc($result)){?>
        <div class="courses-container">
            <div class="course">
                <div class="course-preview">
                    <img src="img/map.jpg" height="200" width="200">
                </div>
                <div class="course-info">
                    <h6><?php echo $rows['location']; ?></h6>
                    <h2><?php echo $rows['foodtype']; ?></h2>
                    <button type="button" class="btn">More Info</button>
                    <!-- Modal -->


                </div>

            </div>
            <?php } ?>
        </div>
    </div>


    <div id="popup1" class="overlay">
        <div class="popup">
            <h2>Donation Form</h2>
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label for="foodtype">Food type</label>
                        <input id="foodtype" type="foodtype" name="foodtype">

                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input id="location" type="location" name="location">
                    </div>



                    <div class="form-group m-0">
                        <button type="submit" class="btn">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container-2">

    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
