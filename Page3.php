<!DOCTYPE html>
<html lang="en">
<!--
 *  FILE                : Page3.php
 *  PROJECT             : Web Design and Development PROG2001 - Final Exam Practical
 *	PROGRAMMER			: Andrew Gordon
 *	FIRST VERSION		: Dec. 13 2020
 *  DESCRIPTION         : The SET Pizza Shop web app allows a user to enter their details, customize their pizza,
 *                        and confirm their order
 *                        
 *                        Allows the customer to see their order total, including toppings, cost per topping, and
 *                        a total cost. The custome can then choose to confirm or cancel the order.
 -->
<head>
    <title>SET Pizza Shop - Order Confirmation</title>
    <link rel="stylesheet" href="Content/Styles.css" />
</head>
<?php
// start the session
session_start();
// get all the toppings, and the final cost
$pepperonis = $_GET['pepperonis'];
$mushrooms = $_GET['mushrooms'];
$olives = $_GET['olives'];
$peppers = $_GET['peppers'];
$cheese = $_GET['cheese'];
$totalPrice = $_GET['finalCost'];
?>
<body>
    <h1>SET Pizza Shop</h1>
    <form id="confirmForm" name="confirmForm" action="Page4.php" method="GET">
        <table>
            <tr>
                <td style="width: 33%"></td>
                <td style="width: auto">
                    <span id="userPrompt" class="prompt">Ciao <?php echo $_SESSION["firstName"] ?></span>
                </td>
                <td style="width: 33%"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3">
                    <span id="orderHeader">ORDER TOTAL</span>
                    <hr>
                </td>
            </tr>
            <tr>
                <td>
                    <!-- only display toppings that were chosen -->
                    <span class="orderLine" id="pepperoniLine" <?php if($pepperonis == "") echo hidden ?> >Pepperoni:</span>
                    <br>
                    <span class="orderLine" id="mushroomLine" <?php if($mushrooms == "") echo hidden ?> >Mushrooms:</span>
                    <br>
                    <span class="orderLine" id="oliveLine" <?php if($olives == "") echo hidden ?> >Green Olives:</span>
                    <br>
                    <span class="orderLine" id="pepperLine" <?php if($peppers == "") echo hidden ?> >Green Peppers:</span>
                    <br>
                    <span class="orderLine" id="dblCheeseLine" <?php if($cheese == "") echo hidden ?> >Double Cheese:</span>
                    <br>
                    <span id="pizzaLine" class="orderLine">Base Pizza:</span>
                </td>
                <td>
                </td>
                <td>
                    <!-- only display prices of toppings chosen -->
                    <span class="orderLine" id="pepperoniPrice" <?php if($pepperonis == "") echo hidden ?> >$1.00</span>
                    <br>
                    <span class="orderLine" id="mushroomPrice" <?php if($mushrooms == "") echo hidden ?> >$1.00</span>
                    <br>
                    <span class="orderLine" id="olivePrice" <?php if($olives == "") echo hidden ?> >$1.00</span>
                    <br>
                    <span class="orderLine" id="pepperPrice" <?php if($peppers == "") echo hidden ?> >$1.00</span>
                    <br>
                    <span class="orderLine" id="dblCheesePrice" <?php if($cheese == "") echo hidden ?> >$1.50</span>
                    <br>
                    <span id="pizzaPrice" class="orderLine">$10.00</span>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            <tr>
                <td class="bottomLine">
                    <span id="totalPriceLine">Total price:</span>
                </td>
                <td class="bottomLine"></td>
                <td class="bottomLine">
                    <span id="totalPrice" class="totalPrice">$<?php echo $totalPrice ?></span>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="orderStatus" class="button" value="CONFIRM"/></td>
                <td>&nbsp;</td>
                <td><input type="submit" name="orderStatus" class="button" value="CANCEL"/></td>
            </tr>
        </table>
    </form>
</body>

</html>