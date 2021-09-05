<?php
    include_once 'conn.php';
    
    $sql = "SELECT * FROM registered_person";

    $count_pending = 0;
    $count_vaccinated = 0;

        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if($row['status_vacc'] == "Pending"){
                        
                        $count_pending++;
                    }
                    if($row['status_vacc'] == "Vaccinated"){

                        $count_vaccinated++;
                    }
                        
                }
            }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
</head>
<body>
    <header>
        <div class="hamburger-menu">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="time-header">
            <div id="clock">
            </div>
            <div class="greetings">
                <span>Good evening, Admin</span>
            </div>
        </div>
        <div class="acc-help">
            <div class="acc">
                <a href="#" class="sign-out">Sign Out</a>
            </div>
            <div class="help">
                <i class="fa fa-question-circle-o" aria-hidden="true"></i>
            </div>
        </div>
    </header>
    <main>
        <div class="main-title-header">
            <div class="intro">
                <div class="title">
                    <span>Registered Vaccine Persons</span>
                </div>
                <div class="sub-title">
                    <span>There are no updates since September 1, 2021.</span>
                </div>
            </div>
            <div class="watch">
                <div class="count">
                    <div class="vaccinated">
                        <span><?php echo $count_vaccinated; ?></span>
                    </div>
                    <div class="pending">
                        <span><?php echo $count_pending; ?></span>
                    </div>
                </div>
                <div class="description">
                    <div class="vaccinated-desc">
                        <span>Vaccinated</span>
                    </div>
                    <div class="pending-desc">
                        <span>Pending</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-sud">
            <div class="buttons">
                <div class="search">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <div class="update">
                    <button><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </div>
                <div id="delete">   
                    <button id = "del"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div class="tables">
        <?php
            $sql = "SELECT * FROM registered_person";
            if($result = mysqli_query($conn, $sql)){
                echo "<table>";
                echo "<tr>";
                echo "<th class = first-border>First Name</th>";
                echo "<th>Last Name</th>";
                echo "<th>Address</th>";
                echo "<th>Mobile#</th>";
                echo "<th>Email</th>";
                echo "<th class = last-border>Status</th>";
                echo "</tr>";
                if(mysqli_num_rows($result) > 0){
                    
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" ."Block " . $row['block_no'] . ", Lot " . $row['lot_no']. ", " . $row['street'] . " St." . $row['barangay'] . ", " . $row['city'] . " City, " . $row['province'] . ", " . $row['country'] . "</td>";
                        echo "<td>" . "+63" . $row['mobile_number'] . "</td>";
                        echo "<td>" . $row['email_address'] . "</td>";
                        echo "<td>" . $row['status_vacc'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Free result set
                    mysqli_free_result($result);
                } 
            }
        ?>     
        </div>
    </main>
    <script src="time.js"></script>
</body>

</html>