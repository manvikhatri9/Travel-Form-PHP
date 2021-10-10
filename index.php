<?php
    if(isset($_POST['fullname'])){
    $insert = true;
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
    die("connection failed to database due to". mysqli_connect_error());
    }
    // echo "Success connecting to database";

    $fullname= $_POST['fullname'];
    $age= $_POST['age'];
    $date_of_birth= $_POST['dob'];
    $email= $_POST['email'];
    $phone_number= $_POST['phonenumber'];
    $organization_name= $_POST['organization_name'];
    $departure_date_and_time= $_POST['departure_date_and_time'];
    $return_date_and_time= $_POST['return_date_and_time'];

    $sql="INSERT INTO `phpproject`.`project` (`Full Name`, `Age`, `Date Of Birth`, `Email`, `Phone Number`, `Organization Name`, `Departure Date and Time`, `Return Date and Time`, `dt`) VALUES ('$fullname', '$age', '$date_of_birth', '$email', '$phone_number', '$organization_name', '$departure_date_and_time', '$return_date_and_time', current_timestamp());";

    //echo $sql;

    if($con->query($sql)== TRUE)
    {
        //echo "Successfully Inserted";
        $insert=true;

    }
    else
    {
        echo "ERROR $sql <br> $con->error";
    }
    $con->close();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>

<body>

    <img class="bg" src="bg.jpg" alt="trip">
    <div class="container">

        <h3>Panjab University Chandigarh US trip form</h3>
        <?php
        if($insert==true)
        {
        echo "<p class='submitMsg'>Thank you for submitting your form.</p>";
        }
        ?>
    </div>

    <div class="registration">
        <form action="index.php" method="POST">
            <h2>Registration Form</h2>
            <label>Full Name :</label>
            <input type="text" name="fullname" placeholder="Enter your name">

            <label>Age :</label>
            <input type="number" name="age" placeholder="Enter your age">

            <label>Date Of Birth :</label>
            <input type="date" name="dob" placeholder="">

            <label>Email :</label>
            <input type="email" name="email" placeholder="Enter your email">

            <label>Phone Number :</label>
            <input type="number" name="phonenumber" placeholder="Enter your phone number">

            <label>Organization Name :</label>
            <input type="text" name="organization_name" placeholder="">

            <label>Departure date and time :</label>
            <input type="datetime-local" name="departure_date_and_time" placeholder="">

            <label>Return date and time :</label>
            <input type="datetime-local" name="return_date_and_time" placeholder="">
        
            <input class="btn" type="submit" value="Submit"> 
        </form>
    </div>
            

    <script src="index.js"></script>
</body>

</html>