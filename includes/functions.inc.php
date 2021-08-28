<?php
function emptyInputSignup($email,$username,$password) {
    $result;
    if(empty($email) || empty($username) || empty($password)){
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}
    
function invalidEmail($email) {
    $result;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
        }
    return $result;
    }    
    

function invalidUname($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/" , $username)) {
        $result=true;
    }
    else{
        $result=false;
    }
    return $result;
}  



function unameExists($conn, $username,$email) {
   $sql = "SELECT * FROM signup WHERE USERNAME= ? OR EMAIL=?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);
   if ($row = mysqli_fetch_assoc($resultData)) {
       return $row;
   }
   else {
       $result=false;
       return $result;
   }

   mysqli_stmt_close($stmt);
    } 

    function createUser($conn, $email, $username, $password) {
        $sql = "INSERT INTO signup (EMAIL, USERNAME, PASSWORD) VALUES(?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
         header("location: ../signup.php?error=stmtfailed");
         exit();
        }

        $hashedpasswordpassword = password_hash($password, PASSWORD_DEFAULT);
     
        mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashedpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
    exit(); 
         } 
    



         function emptyInputSignin($username,$password) {
            $result;
            if (empty($username) || empty($password)) {
                $result=true;
            }
            else{
                $result=false;
            }
            return $result;
        }

        function signinUser($conn, $username, $pword) {
            $unameExists= unameExists($conn, $username,$username);

            if ($unameExists=== false) {

                header("location: ../signin.php?error=wrongsignin");
                exit();
            }

            $pwordHashed = $unameExists["PASSWORD"];
            $checkpword = password_verify($pword, $pwordHashed);

            if ($checkpword=== false) {
                header("location: ../signin.php?error=wrongsignin");
                exit();
            }
            elseif ($checkpword=== true) {
                session_start();
                $_SESSION["ID"] =  $unameExists["ID"];
                $_SESSION["UNAME"] =  $unameExists["UNAME"];
                header("location: ../index.php?error");
                exit();
            }
        }


        