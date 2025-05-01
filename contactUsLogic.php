<?php



if($_SERVER["REQUEST_METHOD"] == "POST"){


    $to      = 'feedback@mtgSearch.com';
    $subject = 'Feedback';
    $message = wordwrap($_POST['message'],70, "\r\n");
    $headers = array(
        'From' => $_POST['email'],
        'Reply-To' => '',
        'X-Mailer' => 'PHP/' . phpversion()
    );

    mail($to, $subject, $message, $headers);

    header("Location: index.php");
    exit();

}

?>