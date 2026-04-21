<?php 
$uname = $_POST['uname'];
$password = $_POST['password'];

$error ="";

if(strlen($uname)<2){
    $error="Username must have at least 2 characters.";
}

else if(!$uname.include("." || !$uname.include())){
    $error="Username can only contain letters, numbers, period (.), dash (-), or underscore (_).";
}
else if(strlen($password)<8){
    $error="Password must be at least 8 characters long.";
}
else if ( $password) {
    $error = "Password must contain at least one special character: @, #, $, or %.";
}
if ($error != "") {
    echo "<h3 style='color: red;'>$error</h3>";
    echo "<a href='javascript:history.back()'>Go Back and Try Again</a>";

} else {
    // No errors, login is successful
    echo "<h3 style='color: green;'>Login Successful!</h3>";
    echo "<p>Welcome, " . $uname . "!</p>";
}

?>
