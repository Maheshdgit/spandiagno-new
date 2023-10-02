<?php
include 'conn.php';
$ue = $_POST['useremail'];
$pas = md5($_POST['userpass']);

$sql = "SELECT * FROM admin_login wHERE username = '$ue'";
$result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                        $row = mysqli_fetch_assoc($result);
                                $uemail = $row['username'];
                                $pass = $row['password'];
                                if($pass == $pas){
                                    echo 'success';
                                    session_start();
                                    $_SESSION['username'] =  $uemail ;
                                    $_SESSION['admin'] = 1;
                                }
                                else{
                                    echo "Please try again !!!";
                                }
                            }

