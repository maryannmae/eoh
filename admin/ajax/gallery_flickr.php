<?php
// Check existence of id parameter before processing further
if(isset($_GET["wed_ID"])){
    // Include config file
    require_once 'config-treb.php';
    
    // Prepare a select statement
    $sql = "SELECT * FROM galleryweddings WHERE wed_ID = :wed_ID";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':wed_ID', $param_wed_ID);
        
        // Set parameters
        $param_wed_ID= trim($_GET["wed_ID"]);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // Retrieve individual field value
                $wed_ID= $row["wed_ID"];
                $wed_pic = $row["wed_pic"];
               
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
} 
?>
		
<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div id="box-one-content">		
				
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	// Add class for fullscreen content
	$('#content').addClass('full-content');
	
});
</script>
</body>
</html>

