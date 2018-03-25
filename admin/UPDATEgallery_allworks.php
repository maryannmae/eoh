
<?php
// Include config file
require_once 'config-treb.php';
 
// Define variables and initialize with empty values
$AW_PIC="";
$AW_PIC_err= "";
 
// Processing form data when form is submitted
if(isset($_POST["AW_ID"])){
    // Get hidden input value
    $id = $_POST["AW_ID"];}
    //INSERT NG BAGONG WEDDING PICTURE
    $target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["AW_PIC"]["name"]);
	$profpic = $target_file;
    
 
    
    // Check input errors before inserting in database
    if(empty($AW_PIC) ){
        // Prepare an insert statement
        $sql = "UPDATE galleryallworks SET AW_PIC=:AW_PIC  WHERE AW_ID=:AW_ID";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':AW_PIC', $param_AW_PIC);
            $stmt->bindParam(':AW_ID', $param_AW_ID);
            
            // Set parameters
            $param_AW_PIC= $AW_PIC;
            $param_AW_ID= $AW_ID;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
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
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["AW_ID"])){
        // Get URL parameter
        $id =  trim($_GET["AW_ID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM galleryweddings WHERE AW_ID= :AW_ID";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':AW_ID', $param_AW_ID);
            
            // Set parameters
            $param_AW_ID = $AW_ID;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $AW_PIC = $row["AW_PIC"];
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        unset($stmt);
        
        // Close connection
        unset($pdo);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Allworks</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen"> 
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/moment-with-locales.js"></script>

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
                        <h2>Update Works</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group <?php echo (!empty($AW_PIC_err)) ? 'has-error' : ''; ?>">
                            <label>Wedding Image</label>
                            <input type="file" name="AW_PIC" class="form-control">
							<span class="help-block"><?php echo $AW_PIC_err;?></span>
                        </div>
                        <input type="hidden" name="AW_ID" value="<?php echo $AW_ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Upload Image">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
		
    </div>
</body>
</html>