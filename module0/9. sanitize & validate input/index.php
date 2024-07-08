<?php
if (isset($_POST['login'])) {
    // sanitize
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    print("Username: " . $username . "<br/>");
    print("Age: " . $age . "<br/>");
    print("Email: " . $email . "<br/>");

    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    if (empty($age)) {
        echo "Please enter a valid age.";
    } else {
        echo "Your age: " . $age . "<br/>";
    }
}
