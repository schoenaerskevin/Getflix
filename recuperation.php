<?php

include_once('dbreq.php');
include_once('function_send_mail.php');


if(isset($_GET['section'])) {
    $section = htmlspecialchars($_GET['section']);
} else {
    $section = "";
}

if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
    if(!empty($_POST['recup_mail'])) {
        $recup_mail = htmlspecialchars($_POST['recup_mail']);
        if(filter_var($recup_mail, FILTER_VALIDATE_EMAIL)) {
            $mailexist = $bdd->prepare('SELECT id,pseudo FROM user WHERE mail = ?');
            $mailexist->execute(array($recup_mail));
            $mailexist_count = $mailexist->rowCount();
            if($mailexist_count == 1) {
                $pseudo = $mailexist->fetch();
                $pseudo = $pseudo['pseudo'];

                $_SESSION['recup_mail'] = $recup_mail;
                for ($i=0; $i < 8; $i++) {
                    $recup_code .= mt_rand(0,9);
                }
              
                $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail = ?');
                $mail_recup_exist->execute(array($recup_mail));
                $mail_recup_exist = $mail_recup_exist->rowCount();

                //Verif if email already exists in recuperation
                if($mail_recup_exist == 1) {            //If exists => update code
                    $recup_insert = $bdd->prepare('UPDATE recuperation SET code = ? WHERE mail = ?');
                    $recup_insert->execute(array($recup_code,$recup_mail));
                } else {                                //Else => create new entry
                    $recup_insert = $bdd->prepare('INSERT INTO recuperation(mail,code) VALUES (?, ?)');
                    $recup_insert->execute(array($recup_mail,$recup_code));
                }



                //Send email
                $subject='Reset password';
                $message='
                <html>
                    <head>

                        <title>STREAMLER.COM</title>
                        <meta charset="utf-8" />
                    </head>
                    <body style="background-color:#343a40; color:white;">
                        <div align="center" style="font-size:150%">
                            <img width="100%" height="100px" src="http://streamler.orgfree.com/assets/img/mail_banner.PNG">
                            <p>Hello <b>'.$pseudo.'</b>,</p>
                            <p>Here is your verification code: <b>'.$recup_code.'</b></p>
                            <p>Please click <a href="http://localhost/exercices/Getflix/recuperation.php?section=code"><b>HERE</b></a> to reset your password.</p>
                            <p>.</p>
                            <p>See you soon on <b>Streamler.com</b></p>
                            <img width="100%" height="10px" src="http://streamler.orgfree.com/assets/img/bottom_line.PNG">
                            <p style="font-size:60%">This email is sent from an account we use for sending messages only.</p>
                            <p style="font-size:60%">So if you want to contact us, don\'t reply to this email - we won\'t  receive your response.</p>
                         </div>
                       </font>
                    </body>
                </html>';
                $recipients=$recup_mail;
                sendmail($subject,$message,$recipients);


            } else {
                $error = "Email address not registered";
            }
        } else {
            $error = "Invalid email address";
        }
    } else {
        $error = "Please enter your email address";
    }

}

//verification code processing
if(isset($_POST['verif_submit'],$_POST['verif_code'])) {
    if(!empty($_POST['verif_code'])) {
        $verif_code = htmlspecialchars($_POST['verif_code']);
        $verif_req = $bdd->prepare('SELECT * FROM recuperation WHERE mail = ? AND code = ?');
        $verif_req-> execute(array($_SESSION['recup_mail'],$verif_code));
        $verif_req = $verif_req->rowCount();
        if($verif_req == 1) {
            $del_req = $bdd->prepare('DELETE FROM recuperation WHERE mail = ?');             //if OK, delete entry
            $del_req->execute(array($_SESSION['recup_mail']));
            header('Location:http://localhost/exercices/Getflix/recuperation.php?section=changemdp');
        } else {
            $error = "Invalid code";
        }
    } else {
        $error = "Please enter your verification code";
    }
}

if(isset($_POST['change_submit'])) {
    if(isset($_POST['change_mdp'],$_POST['change_mdpc'])) {
        $mdp = htmlspecialchars($_POST['change_mdp']);
        $mdpc = htmlspecialchars($_POST['change_mdpc']);
        if(!empty($mdp) AND !empty($mdpc)) {
            if($mdp == $mdpc) {
                $mdp = sha1($mdp);

                $ins_id = $bdd->prepare('SELECT * FROM user WHERE mail = ?');    
                $ins_id->execute(array($_SESSION['recup_mail'])); 
                $ins_id = $ins_id->fetch();
                
                
                $ins_mdp = $bdd->prepare('UPDATE mdp SET mdp = ? WHERE id = ?');     
                $ins_mdp->execute(array($mdp,$ins_id['id'])); 

                header('Location:http://localhost/exercices/Getflix/connexion.php');
                          
            } else {
                $error = "Your passwords are not the same";
            }
        } else {
            $error = "Please fill in all the required fields";
        }
    } else {
        $error = "Please fill in all the required fields";
    }
}

?>

<table width="100%">
    <tr>
        <td id="tdlogo">
            <a style="font-family: 'Londrina Shadow', cursive; font-size:3em" class="logo navbar-brand"
                href="index.php">
                <i class="fa fa-gamepad" style="font-size:1em"></i>
                <img src="https://fontmeme.com/permalink/200903/a5e3585f8b36c0d7384a137bc9d64a60.png" alt="netflix-font"
                    border="0">
            </a>
        </td>
    </tr>
</table>

<div>
    <?php
	include 'intro.php';
?>

    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="assets/img/helmet.png" class="brand_logo" alt="Logo">
                        <h4 style="color:black">Password recovery</h4>
                    </div>
                </div>

                <div class="d-flex justify-content-center form_container">
                    <?php if($section == 'code') { ?>
                    Password recovery for <?php echo $_SESSION['recup_mail'] ?>
                    <form method="post">
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="text" name="verif_code" class="form-control input_pass" value=""
                                placeholder="Verification Code">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button name="verif_submit" type="submit" class="btn login_btn">Submit</button>
                        </div>
                    </form>

                    <?php } elseif($section == "changemdp") { ?>
                    New password for<?php echo $_SESSION['recup_mail'] ?>
                    <form method="post">

                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="change_mdp" class="form-control input_pass" value=""
                                placeholder="New Password">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="change_mdpc" class="form-control input_pass" value=""
                                placeholder="Confirm New Password">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button name="change_submit" type="submit" class="btn login_btn">Submit</button>
                        </div>
                    </form>

                    <?php } else { ?>
                    <form method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="recup_mail" class="form-control input_user" value=""
                                placeholder="Your Email Address">
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button name="recup_submit" type="submit" class="btn login_btn">Submit</button>
                        </div>
                    </form>

                    <?php } ?>
                    <?php if(isset($error)) { echo '<span style="color:red">'.$error.'</span>';} else { echo "<br />"; } ?>

                </div>
                
                <p style="color:black;" class="text-center">We will send you an email with instructions on how to reset
                    your password.</p>
            </div>
        </div>
    </div>
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
	  integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
	  integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
	  <script src="assets/js/script.js"></script>
 </body>
 </html>
  
</body>
</html>
