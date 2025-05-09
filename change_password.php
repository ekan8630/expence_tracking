<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }
    $msg = "";
    $resultset = "";
    if(isset($_POST['show_report'])){
        $start_date = $_POST['startdate'];
        $end_date = $_POST['enddate'];
        $user = $_SESSION['userid'];
        include './dbconfig.php';
        $conn = mysqli_connect(HOSTNAME, USERNAME, "",DBNAME);
        $qry = "select * from expense where expensedate >= '$start_date' AND expensedate <= '$end_date'";
        $resultset =  mysqli_query($conn,$qry);
        $msg = "Expense Summary from $start_date to $end_date"; 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-sm-12">
            <?php
                include("./navbar.php");            
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3 sidebar">
            <?php
                include("./sidebar.php");
            ?>
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="container-fluid">
                        <form method="post">
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="psswd" placeholder="New Password" required >
                            </div>
                            <div class="form-group">
                                <label for=""> Confirm Password</label>
                                <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                            </div>
                            <input type="submit" name="change_pass" class="btn btn-primary "  value="Submit">
                        </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 text-center footer ">
            <h5>Footer @ Copyright Reserved Act 2021.</h5>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
</body>
</html>