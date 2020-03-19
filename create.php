<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $address = $pa = $da = $basic = $salary = "";
$name_err = $address_err = $pa_err = $da_err = $basic_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    // validate pa
    $input_pa = trim($_POST["pa"]);
    if(empty($input_pa)){
        $pa_err = "Please enter the pa amount.";     
    } elseif(!ctype_digit($input_pa)){
        $pa_err = "Please enter a positive integer value.";
    } else{
        $pa = $input_pa;
    }
    // validate da
    $input_da = trim($_POST["da"]);
    if(empty($input_da)){
        $da_err = "Please enter the da amount.";     
    } elseif(!ctype_digit($input_da)){
        $da_err = "Please enter a positive integer value.";
    } else{
        $da = $input_da;
    }
    // validate basic
    $input_basic = trim($_POST["basic"]);
    if(empty($input_basic)){
        $basic_err = "Please enter the basic amount.";     
    } elseif(!ctype_digit($input_basic)){
        $basic_err = "Please enter a positive integer value.";
    } else{
        $basic = $input_basic;
    }
    
    // Validate salary
    // $input_salary = trim($_POST["salary"]);
    // if(empty($input_salary)){
    //     $salary_err = "Please enter the salary amount.";     
    // } elseif(!ctype_digit($input_salary)){
    //     $salary_err = "Please enter a positive integer value.";
    // } else{
    //     $salary = $input_salary;
    // }
    

    $name = $_POST['name'];
    $address = $_POST['address'];
    $pa = $_POST['pa'];
    $da = $_POST['da'];
    $basic = $_POST['basic'];
    $salary = $_POST['salary'];
    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($pa_err) && empty($salary_err) && empty($da_err) && empty($basic_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, pa, da, basic, salary) VALUES ('$name', '$address', '$pa', '$da', '$basic', '$salary')";
        // Attempt to execute the prepared statement
        if(mysqli_query($connection, $sql)){
            // Records created successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
         
        // Close statement
        // mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($connection);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pa_err)) ? 'has-error' : ''; ?>">
                            <label>pa</label>
                            <input id="pa" type="text" name="pa" class="form-control pa" onkeyup="annotate()" value="<?php echo $pa; ?>">
                            <span class="help-block"><?php echo $pa_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($da_err)) ? 'has-error' : ''; ?>">
                            <label>da</label>
                            <input id="da" type="text" name="da" class="form-control" onkeyup="annotate()" value="<?php echo $da; ?>">
                            <span class="help-block"><?php echo $da_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($basic_err)) ? 'has-error' : ''; ?>">
                            <label>basic</label>
                            <input id="basic" type="text" name="basic" class="form-control" onkeyup="annotate()" value="<?php echo $basic; ?>">
                            <span class="help-block"><?php echo $basic_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input id="salary" type="text" name="salary" class="form-control salary" readonly>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <script>
        // function add(){
        //     var pa = document.getElementById('pa').value;
        //     var da = document.getElementById('da').value;
        //     var basic = document.getElementById('basic').value;
        //     var salary = parseInt(pa) + parseInt(da) + parseInt(basic);
        //     document.getElementById('salary').value = salary;

        // }

        function annotate(){
  var pa= document.getElementById("pa").value;
  var da= document.getElementById("da").value;
  var basic= document.getElementById("basic").value;
  document.getElementById("salary").value= parseInt(pa) + parseInt(da) + parseInt(basic);
}
    </script>
</body>
</html>