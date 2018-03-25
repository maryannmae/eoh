<?php
// Include config file
require_once 'config-treb.php';
 
// Define variables and initialize with empty values
$wed_pic= "";
$wed_pic_err =  "";
 
// Processing form data when form is submitted
if(isset($_POST["wed_ID"])){
    // Get hidden input value
    $id = $_POST["wed_ID"];
    
    //  images
   $target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["wed_pic"][""]);
	$profpic = $target_file;
    
    // Check input errors before inserting in database
    if(empty($wed_pic_err){
        // Prepare an insert statement
        $sql = "UPDATE galleryweddings SET wed_pic=:wed_pic WHERE wed_ID=:wed_ID";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':wed_pic', $param_wed_pic);
         
            $stmt->bindParam(':wed_ID', $param_wed_ID);
            
            // Set parameters
            $param_wed_pic = $wed_pic;
            
            $param_wed_ID = $wed_pic;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records updated successfully. Redirect to landing page
                header("location: index.html");
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
    if(isset($_GET["wed_ID"])){
        // Get URL parameter
        $id =  trim($_GET["wed_ID"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM galleryweddings WHERE wed_ID=:wed_ID";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':wed_ID', $param_wed_ID);
            
            // Set parameters
            $param_wed_ID = $wed_ID;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                    // Retrieve individual field value
                    $name = $row["wed_PIC"];
                    
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
		<meta charset="utf-8">
		<title>Event Organization Hub</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="plugins/select2/select2.css" rel="stylesheet">
		<link href="plugins/justified-gallery/justifiedGallery.css" rel="stylesheet">
		<link href="css/style_v2.css" rel="stylesheet">
		<link href="plugins/chartist/chartist.min.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div id="box-one-content"></div>
			<script>
				$(document).ready(function() {
				// Add class for fullscreen content
					$('#content').addClass('full-content');
                        <h2>Update Wedding Gallery</h2>
                    </div>
				</div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
							<div class="form-group <?php echo (!empty($wed_pic_err)) ? 'has-error' : ''; ?>">
                            <label>Wedding Image</label>
                            <input type="file" name="wed_pic" class="form-control">
							<span class="help-block"><?php echo $wed_pic_err;?></span>
                        </div>
                        <input type="hidden" name="wed_ID" value="<?php echo $wed_ID; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Upload Image">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
					});
				</script>
                </div>
            </div>        
        </div>
		
    </div>
</body>
</html>