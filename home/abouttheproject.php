<?php

require "../config/config.php";

// Get the current page URL
$currentURL = $_SERVER['REQUEST_URI'];

// Check if the user is logged in
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $statement = mysqli_prepare($conn, "SELECT * FROM tb_user WHERE id = ?");
    mysqli_stmt_bind_param($statement, "i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

    // Log the login activity with the current page URL
    $logMessage = 'User with ID ' . $id . ' logged in at ' . date('Y-m-d H:i:s') . ' from page: ' . $currentURL . "\n";
    $logFilePath = '../dashboard/Login.log'; // Set the path to your log file
    file_put_contents($logFilePath, $logMessage, FILE_APPEND);
} else {
    header("Location: login.php");
    exit();
}
?>

<html>
    <head>
        <title>Legalicy Andreiixe | About the project</title>
    </head>
    <body topmargin="5" leftmargin="5" bgcolor="#ffffff" link="#0000CC" vlink="#660099" alink="#cccccc">
        <table border="0" width="590" cellpadding="0" cellspacing="0">
            <tbody>
                <tr valign="top">
                    <!--Prima coloana-->
                    <!--NavBar-->
                    <td width="140">
                    <a href="../index">
                        <img src="../src/images/logos/LegalicyLogo.gif" width="138" height="34" alt="Legalicy Andreiixe" border="0">
                        </a>
                        <br>
                        <a href="about">
                            <img src="../src/images/bar/about.gif" width="138" height="36" alt="About" border="0">
                        </a>
                        <br>
                        <a href="blog">
                            <img src="../src/images/bar/Blog.gif" width="138" height="36" alt="Blog" border="0">
                        </a>
                        <br>
                        <a href="link">
                            <img src="../src/images/bar/Links.gif" width="138" height="36" alt="Links" border="0">
                        </a>
                        <Br>
                        <br>
                        <?php if ($row && $row['role'] == 'tester') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='../Tester/newstuff'>Dashboard Tester</a></center>";
                        } ?> 
                        <?php if ($row && $row['role'] == 'admin') {
                        // User is an admin, display dashboard option
                        echo "<center><a href='../dashboard/admin'>Dashboard Admin</a></center>";
                        } ?> 
                        <br>
                        <br>
                        <center>
                            <table border="0" width="88%" cellpadding="3" cellspacing="0">
                                <tbody><tr>
                                    <td bgcolor="#FFBEBE" align="center">
                                    <hr size="0.5" width="60">
                                    <a href="../config/srcuser">
                                        <img src="../pfp/<?php echo $row['image'];?>" width = 100><br>
                                    </a>
                                        <hr size="0.5" width="60">
                                        <font face="geneva, arial" size="+1" color="#FF0000"><b><?php echo $row["name"]; ?></b></font>
                                        <hr size="0.5" width="60">
                                        <a href="../config/signout">Sign Out</a></font>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </center>
                        <br>
                        <br>
                        <!--/Extended opensource-->
                        <!--Olther Andreiixe links-->
                        <p>
                        <font face="geneva, arial" size="-1">
                                <a href="https://andreiixe.github.io/">Github Website</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="http://filesandreiixe.infinityfreeapp.com/">Andreiixe Files</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="feedback">Feedback</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="linkus">Link to Us</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                                <a href="../src/txt/Builds.txt">Updates</a>
                                <font size="+1">&nbsp;</font>
                                <br>
                            </font>
                        </p>
                        <!--/olther andreiixe links-->
                        <!--Host :))-->
                        <font face="geneva, arial" size="-2">
                            <br>
                            <br>
                            Host provided by
                            <a href="http://www.awardspace.com/">AwardSpace</a>
                        </font>
                        <!--/Host-->
                        <!--Msie-->
                        <!--/msie-->
                        <!--copyright (I added more because it looks cool)-->
                        <p>
                        <font face="geneva, arial" size="-2">
                                By Pika Dev.<br>
                                All rights rezerved.
                            </font>
                        </p>
                        <!--copyright-->
                    </td>
                    <td width="4" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="4" height="1">
                    </td>
                    <td bgcolor="#666666" width="1" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="1" height="1">
                    </td>
                    <td width="5" valign="bottom">
                        <img src="src/images/punctsalv.gif" width="5" height="1">
                    </td>
                    <!--/navbar-->
                    <td width="425">
                        <table cellspacing="0" cellpadding="0" border="0" width="415">
                            <tbody>
                                <tr>
                                    <td>
                                        <font size="+1" face="geneva, arial">
                                            <b>
                                                About Legalicy Andreiixe
                                            </b>
                                        </font>
                                        <hr size="1">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                            <table cellspacing="0" cellpadding="0" border="0" width="415">
                                <tbody>
                                    <tr>
                                        <td>
                                            <font size="-1" face="geneva, arial">
                                                <b>
                                                    <a href="credits.php">
                                                        The Legalicy Andreiixe Team
                                                    </a>
                                                </b>
                                            </font>
                                            <br>
                                            <br>
                                            <font size="-1" face="geneva, arial">
                                                <b>
                                                    How did the project start?
                                                </b>
                                            </font>
                                            <br>
                                            It started as a game made for fun, but over time I realized that I can learn something from it and that's why I keep updating.
                                            <br>
                                            <br>
                                            <font size="-1" face="geneva, arial">
                                                <b>
                                                    What is the use of the website?
                                                </b>
                                            </font>
                                            <br>
                                            None, I don't even pay for the host because I did it on a free host. Anyway, its usefulness is more for documentation than Personal website.
                                            <br>
                                            <br>
                                            <font size="-1" face="geneva, arial">
                                                <b>
                                                    When should you stop updating the website?
                                                </b>
                                            </font>
                                            <br>
                                            It depends, I probably won't make updates when I go to baccalaureate. If I don't pass the exam, I will abandon the website in the abyss of the Internet.
                                            <br>
                                            <br>
                                            <font size="-1" face="geneva, arial">
                                                <b>
                                                    Are you going to implement new features?
                                                </b>
                                            </font>
                                            <br>
                                            It depends on what features, in particular I would like the support for internet explorer 6 to remain.
                                        </td>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                        <p><br>
                            <table width="425" border="0" cellpadding="4" cellspacing="2">
                            <tbody><tr>
                                <td colspan="2">
                                <hr size="1">
                                </td>
                            </tr>
                            </tbody></table>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>   