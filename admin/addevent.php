<?php
// Include config file
require_once 'config-treb.php';
 
// Define variables and initialize with empty values
$B_Services = $B_Redate = $B_Packages = $B_Venue = $B_Customer = $B_Organizer="";
$B_Services_err = $B_Redate_err = $B_Packages_err = $B_Venue_err = $B_Customer_err = $B_Organizer_err="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
	// Validate name
    $input_B_Customer = trim($_POST["B_Customer"]);
    if(empty($input_B_Customer)){
        $B_Customer_err = "Please enter your name.";
    } elseif(!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $B_Customer_err = 'Please enter a valid name.';
    } else{
        $B_Customer = $input_B_Customer;
    }
    
    // Validate Services
    $input_B_Services = trim($_POST["B_Services"]);
    if(empty($input_B_Services)){
        $B_Services_err = 'Please choose your service.';     
    } else{
        $B_Services = $input_B_Services;
    }
    
    // Validate packages
    $input_B_Packages = trim($_POST["B_Packages"]);
    if(empty($input_B_Packages)){
        $B_Packages_err= "Please choose your packages.";     
    } else{
        $B_Packages = $input_B_Packages;
    }
	  
    // Validate Venue
    $input_B_Venue= trim($_POST["B_Venue"]);
    if(empty($input_B_Venue)){
        $B_Venue_err= "Please enter your venue.";     
    } else{
        $B_Venue = $input_B_Venue;
    }
	  
    // Validate organizer
    $input_B_Organizer = trim($_POST["B_Organizer"]);
    if(empty($input_B_Organizer)){
        $B_Organizer_err = "Please your organizer.";     
    } else{
        $B_Organizer = $input_B_Organizer;
    }
	
	//validate Date
	$B_Redate = $_POST["B_Redate"];
    
	 
	//Check input errors before inserting in database
    if(empty($B_Services_err) && empty($B_Redate_err) && empty($B_Packages)) && (empty($B_Venue) && empty($B_Customer_err) && empty($B_Organizer_err)){
		
        // Prepare an insert statement
        $sql = "INSERT INTO booking (B_Services, B_Redate, B_Packages, B_Venue, B_Customer, B_Organizer) VALUES (:B_Services, :B_Redate, :B_Packages, :B_Venue, :B_Customer, :B_Organizer)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':B_Services', $param_B_Services);
            $stmt->bindParam(':B_Redate', $param_B_Redate);
            $stmt->bindParam(':B_Packages', $param_B_Packages);
			$stmt->bindParam(':B_Venue', $param_B_Venue);
			$stmt->bindParam(':B_Customer', $param_B_Customer);
			$stmt->bindParam(':B_Organizer', $param_B_Organizer);
			
            
            // Set parameters
            $param_B_Services = $B_Services;
            $param_B_Redate = $B_Redate;
            $param_B_Packages = $B_Packages;
			$param_B_Venue = $B_Venue;
			$param_B_Customer = $B_Customer;
			$param_B_Organizer= $B_Organizer;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
								<!--HINDI PA ITO ANG HEAD TAG NITO!!!!!!!!!!!!!DAPAT MAY RADIO BUTTON SA PACKAGES , MAY PAMIMILIAN AT MAY AUTOMATIC NA PRICE NA. -->
								<!--AT WAG KALIMUTAN ANF LINK NG BAWAT ORGANIZER THEN ITATYPE NLANG KUNG SINO ANG MAPIPILING ORGANIZER---->
								<!--SA ADMIN LANG MAKIKITA ANG DOWNPAYMENT , BALANCE AT TOTAL AMOUNT NG CUSTOMER-->
    <meta charset="UTF-8">
    <title>Booking</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen"> 
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment-with-locales.js"></script>
	<script src="js/bootstrap-datetimepicker.js"></script>

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Reservation</h2>
                    </div>
                    <p>Please fill this form and submit to reserve an event.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
						
						<!--FOR CUSTOMER NAME-->
                        <div class="form-group <?php echo (!empty($B_Customer_err)) ? 'has-error' : ''; ?>">
                            <label>Customer Name</label>
                            <input type="text" name="B_Customer" class="form-control" value="<?php echo $B_Customer; ?>">
                            <span class="help-block"><?php echo $B_Customer_err;?></span>
                        </div>
						
						<!--FOR SERVICES-->
                        <div class="form-group <?php echo (!empty($B_Services_err)) ? 'has-error' : ''; ?>">
                            <label>Service</label>
                            <span class="help-block"><?php echo $B_Services_err;?></span>
                        </div>
						
						<!--FOR PACKAGES-->
                        <div class="form-group <?php echo (!empty($B_Packages_err)) ? 'has-error' : ''; ?>">
                            <label>Choose Package</label>
                            <input type="text" name="B_Packages" class="form-control" value="<?php echo $B_Packages; ?>">
                            <span class="help-block"><?php echo $B_Packages_err;?></span>
                        </div>
						
						<!--FOR RESERVATION DATE-->
						<div class="form-group <?php echo (!empty($B_Redate)) ? 'has-error' : ''; ?>">
						<label>Date Reservation</label>
						<div class='input-group date' id='datetimepicker'>
							<input type='text' name='date' class="form-control" required />
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
							</span>
							<span class="help-block"><?php echo $B_Redate_err;?></span>
						</div>
						</div>
						<script type="text/javascript">
							$(function () {
								$('#datetimepicker').datetimepicker({
								format: 'YYYY-MM-DD HH:mm:00'
								});
							});
						</script>
						
						<!--FOR VENUE-->
                        <div class="form-group <?php echo (!empty($B_Venue_err)) ? 'has-error' : ''; ?>">
                            <label>Venue</label>
                            <input type="text" name="B_Venue" class="form-control" value="<?php echo $B_Venue; ?>">
                            <span class="help-block"><?php echo $B_Venue_err;?></span>
                        </div>
						
						<!--FOR ORGANIZER-->
                        <div class="form-group <?php echo (!empty($B_Organizer_err)) ? 'has-error' : ''; ?>">
                            <label>Event Organizer</label>
                            <input type="text" name="B_Organizer" class="form-control" value="<?php echo $B_Organizer; ?>">
                            <span class="help-block"><?php echo $B_Organizer_err;?></span>
                        </div>
						
                        <input type="reserve" class="btn btn-primary" value="Reserve Event">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
					
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
 