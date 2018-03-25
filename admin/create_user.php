<?php
// Include config file
require_once 'config-treb.php';
 
// Define variables and initialize with empty values
 $U_UserName= $U_Email_Account=$U_Password  = $U_Profile="";
 $U_UserName_err = $U_Email_Account_err=$U_Password_err =$U_Profile_err  ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate account name
    $input_name = trim($_POST["U_UserName"]);
    if(empty($input_U_)){
        $name_err = "Please enter a user name.";
    } elseif(!filter_var(trim($_POST["U_UserName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid user name.';
    } else{
        $name = $input_name;
    }
    
    // Validate password
    $input_address = trim($_POST["U_Password"]);
    if(empty($input_address)){
        $address_err = 'Please enter a password.';     
    } else{
        $address = $input_U_Password;
    }
    
	//Prof Pic
	//pwede dito ilagay un mga validations sa sample ko dati
	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["U_Profile"]["U_UserName"]);
	$profpic = $target_file;
	
	//Date
	$date = $_POST["date"];
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
		//Upload Pic
		move_uploaded_file($_FILES["profpic"]["tmp_name"], $target_file);
		
        // Prepare an insert statement
        $sql = "INSERT INTO useraccount ( U_Profile, U_Email_Account, U_UserName, U_Password) VALUES (:UserID, :U_Profile, :U_Email_Account, :U_UserName, :U_Password)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
           
            $stmt->bindParam(':U_Profile', $param_U_Profile);
            $stmt->bindParam(':U_Email_Account', $param_U_Email_Account);
			$stmt->bindParam(':U_UserName', $param_U_UserName);
			$stmt->bindParam(':U_Password', $param_U_Password);
            
            // Set parameters
            
            $param_U_Profile = $U_Profile;
            $param_U_Email_Account = $U_Email_Account;
			$param_U_User = $U_UserName;
			$param_U_Password = $U_Password;
            
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
		<meta charset="utf-8">
		<title>DevOOPS</title>
		<meta name="description" content="description">
		<meta name="author" content="Evgeniya">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="../css/style_v1.css" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
  <div class="container-fluid">
	<div id="page-login" class="row">
		<div class="col-xs-12 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
			<div class="text-right">
				<a href="page_login_v1.html" class="txt-default">Already have an account?</a>
			</div>
			<div class="box">
				<div class="box-content">
					<div class="text-center">
						<h3 class="page-header">Event Organization Hub Register Page</h3>
					</div>
                    <p>Please fill this form.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
						<div class="form-group <?php echo (!empty($U_Profile_err)) ? 'has-error' : ''; ?>">
                            <label>Profile Picture</label>
                            <input type="file" name="U_Profile" class="form-control">
							<span class="help-block"><?php echo $U_Profile_err;?></span>
                        </div>
						
						<div class="form-group <?php echo (!empty($U_UserName_err)) ? 'has-error' : ''; ?>">
								<label class="control-label">Username</label>
									<input type="text" name="U_UserName" class="form-control" value="<?php echo $U_UserName; ?>">
								<span class="help-block"><?php echo $U_UserName_err;?></span>
                        </div>
						
						 <div class="form-group <?php echo (!empty($U_Email_Account_err)) ? 'has-error' : ''; ?>">
								<label class="control-label">E-mail</label>
								 <textarea name="U_Email_Account" class="form-control"><?php echo $U_Email_Account; ?></textarea>
								<span class="help-block"><?php echo $U_Email_Account_err;?></span>
                        </div>
						
						 <div class="form-group <?php echo (!empty($U_Password_err)) ? 'has-error' : ''; ?>">
								<label class="control-label">Password</label>
								  <input type="text" name="U_Password" class="form-control" value="<?php echo $U_Password; ?>">
                            <span class="help-block"><?php echo $U_Password_err;?></span>
                        </div>
					
						
					
					
                        <input type="register" class="btn btn-primary" value="Register">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
					
                </div>
            </div>        
        </div>
    </div>
</body>
</html>