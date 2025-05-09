<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:index.php");
    }
    $msg = "";
    $resultset = "";
    if(isset($_POST['show_report'])){
        $start_date = $_POST['startdate']."-01-01"; 
        $end_date = $_POST['enddate']."-12-31";
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
                                <label for="">Start Year</label>
                                <input type="text" class="form-control" name="startdate" placeholder="Enter Start Year" required>
                            </div>
                            <div class="form-group">
                                <label for=""> End Year</label>
                                <input type="text" class="form-control" name="enddate" placeholder="Enter End Year" required>
                            </div>
                            <input type="submit" name="show_report" class="btn btn-primary "  value="Show Report">
                        </form>
                        <?php
                        if(isset($_POST['show_report'])){
                        if(mysqli_num_rows($resultset)>0){
                            echo "<table class = 'table table-striped'>";
                            echo "<caption style = 'background-color: #2C3A47; margin: 20px 0 0 0; text-align: center; padding:20px; font-size:29px; color: white;'> $msg </caption>";
                            echo "<tr>";
                            echo "<th> Date </th>";                   
                            echo "<th> Item's </th>";                   
                            echo "<th> Amount </th>";            
                            echo "</tr>";

                        while($row = mysqli_fetch_assoc($resultset)){
                            

                            echo "<tr>";
                            echo "<td> $row[expensedate] </td>";                   
                            echo "<td> $row[expenseitem] </td>";                   
                            echo "<td> $row[expensecost] </td>";            
                            echo "</tr>";
                        }
                        echo "</table>";
                    }}
                    ?>
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