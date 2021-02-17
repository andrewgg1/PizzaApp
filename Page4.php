<!DOCTYPE html>
<html lang="en">
<!--
 *  FILE                : Page4.php
 *  PROJECT             : Web Design and Development PROG2001 - Final Exam Practical
 *	PROGRAMMER			: Andrew Gordon
 *	FIRST VERSION		: Dec. 13 2020
 *  DESCRIPTION         : The SET Pizza Shop web app allows a user to enter their details, customize their pizza,
 *                        and confirm their order
 *                        
 *                        Displays the customer's name and the order status chosen, CONFIRMED or CANCELLED. Also allows them to start over from the beginning if they would like to place a new order
 -->
<head>
    <title>SET Pizza Shop - Thank You</title>
    <link rel="stylesheet" href="Content/Styles.css" />
</head>
<?php
// start session and get the order status
session_start();
$orderStatus = $_GET['orderStatus'];
?>
<body>
    <h1>SET Pizza Shop</h1>
    <form id="finalForm">
        <table>
            <tr>
                <td></td>
                <td style="width: auto">
                    <span id="thanksMessage" class="prompt">Thank you <?php echo $_SESSION["customerName"] ?></span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input type=button class="button" onClick="parent.location='Page1.html'" value='Click here to start over'></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <span id="statusMessage" class="statusMessage">ORDER <?php echo $orderStatus ?>ED</span>
                </td>
            </tr>
        </table>
    </form>
</body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>

</html>