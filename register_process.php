<?php
include 'db_connection.php';

// Get user input from the registration form
$name = $_POST['name'];
$id = $_POST['id'];
$department = $_POST['department'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$address = $_POST['address'];

// SQL query to insert user data into the database
$query = "INSERT INTO users (name, id, department, email, dob, password, address) VALUES (?, ?, ?, ?, ?, ?, ?)";

// Prepare and execute the query using prepared statements
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'sssssss', $name, $id, $department, $email, $dob, $password, $address);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    // Registration successful

   

    // Declare variables
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    
    
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
    
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'peterisibor84@gmail.com';                     //SMTP username
        $mail->Password   = 'bpnkuzuhsrflvsaz';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('peterisibor84@gmail.com');     //Add a recipient
    
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }














    header("Location: login.php");
} else {
    // Registration failed
    // You can handle the registration failure scenario here
    header("Location: register.php?error=registration_failed");
}

// Close the database connection
mysqli_close($connection);
?>
