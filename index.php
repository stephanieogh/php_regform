<div class="container" style="text-align:center">
<?php 
     require('config/db.php');

    if(isset($_POST['regBtn'])){
        $firstName = ucfirst($_POST['firstName']);
        $lastName = $_POST['lastName'];
        $email =$_POST['email'];
        $dob = $_POST['dob']; //sha1, md5, salt are different hash functions used to hide passwords
        $phoneNumber = $_POST['phone'];
        $address = $_POST['address'];
        $guardianName = $_POST['guardianName'];
        $religion = $_POST['religion'];
        $message = $_POST['message'];


    // die($password); die is a function used to kill programs that follow immediately below the die function

        if(empty($firstName) || empty($lastName)  || empty($email) ){
            echo "All fields are required";

        }else{
            $insertQuery = mysqli_query($connection, "INSERT INTO `registration_form`
            ( id, first_name, last_name, email, dob, phone_number, address, guardian_name, religion, message, created_at) 
            VALUES 
            ('', '$firstName', '$lastName', '$email', '$dob', '$phoneNumber', '$address', '$guardianName', '$religion', '$message', now())"
            );

            if($insertQuery){
                //echo "Account successfully created";
                header('location:welcome.php');//header function is used to navigate to another webpage
            }else{
                echo mysqli_error($connection)."Oops! something went wrong";
            }

        }
    }


?>

<form action="index.php" method="POST">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>registration-form</title>
</head>
<body>
    <div class="container">
        <h2 class="topic">Primary Registration Form</h2>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstName" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" class="form-control" placeholder="Phone Numner">
                    </div>
                    <div class="form-group">
                        <label for="guardianname">Guardian Name</label>
                        <input type="text" name="guardianName" class="form-control" placeholder="Guardian Name">
                    </div>
                    <div class="form-group">
                        <label for="religion">Religion</label>
                        <select name="religion" class="form-control">
                            <option value="christianity">christianity</option>
                            <option value="muslim">muslim</option>
                        </select>
                    </div>
            </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastName" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <label for="lastname">DOB</label>
                        <input type="date" name="dob" class="form-control" placeholder="DOB">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="" cols="10" rows="5" class="form-control" placeholder="Message"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="regBtn" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div> 
</body>
</html>