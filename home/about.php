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
        <title>Legalicy Andreiixe | About</title>
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
                        <!--MainAbout me-->
                        <table border="0" cellspacing="0" cellpadding="0" width="415">
                            <tbody>
                                <tr>
                                    <td valign="bottom" width="321">
                                        <font face="geneva, arial" size="+1">
                                            <b>
                                                Who am I?
                                            </b>
                                        </font>
                                        <hr size="1"></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <font face="geneva, arial" size="-1">
                                            <b>About Me</b>
                                        </font>
                                        <br>
                                        I am a student studying to become a full stack developer. This website is created to learn how the internet was formed in the years 1997 or 2000.
                                        <p>
                                            <font face="geneva, arial" size="-1">
                                                <b>
                                                    What is this website?<br>
                                                </b>
                                            </font>
                                            It is a personal website with a 90's or 2000's vibe. In general, it is made to learn the beginnings of the Internet.
                                        </p>
                                        <p>
                                            <font face="geneva, arial" size="-1">
                                                <b>
                                                    What old browsers does this website work on?<br>
                                                </b>
                                            </font>
                                            This website was fully tested on a machine with windows xp. It is compatible with Internet Explorer 4.01, but with official tests it is fully compatible with Internet Explorer 6.0.
                                        </p>
                                        <p>
                                            <font face="geneva, arial" size="-1">
                                                <b>
                                                    Are the images and website templates original?<br>
                                                </b>
                                            </font>
                                            Of course yes, every file and image is original, but there is a but, It is a template of the website, it is based on old aol.com from 1997 or 1998 (of course from pictures to made from scratch).
                                        </p>
                                        <p>
                                            <font face="geneva, arial" size="-1">
                                                <b>
                                                    Why are there ads on the website?<br>
                                                </b>
                                            </font>
                                            The ads on the first page are not real, from my point of view I added them to give me a 90' vibe. Who knows, maybe there will be real ads :)).
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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