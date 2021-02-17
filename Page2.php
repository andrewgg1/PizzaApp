<!DOCTYPE html>
<html lang="en">
<!--
 *  FILE                : Page2.php
 *  PROJECT             : Web Design and Development PROG2001 - Final Exam Practical
 *	PROGRAMMER			: Andrew Gordon
 *	FIRST VERSION		: Dec. 13 2020
 *  DESCRIPTION         : The SET Pizza Shop web app allows a user to enter their details, customize their pizza,
 *                        and confirm their order
 *                        
 *                        Allows the customer to choose their toppings, uses AJAX to dynamically update the cost.
 -->
<head>
    <title>SET Pizza Shop - Customize Your Pizza</title>
    <title>Text Editor</title>
    <link rel="stylesheet" href="Content/Styles.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Jquery method(s)
    /*  -- Method Header Comment
    Purpose :	Sends a GET request to the Cost Calculator anytime the user clicks a checkmark, this will include a value
                of 1 for every topping checked and a 0 if not checked. It then sets the new total on this page.
    Inputs	:	The checkbox values of each topping: pepperoni, mushrooms, olives, peppers, cheese
    Outputs	:	New total cost
    Returns	:	The total cost
    */
    $(document).ready(function () {
        $("#pepperoniCheckbox, #mushroomCheckbox, #olivesCheckbox, #peppersCheckbox, #cheeseCheckbox").change(function () {
            $.ajax({
                type: "GET",
                url: "CostCalc.php?args=" + JSON.stringify({'pepperonis': $("#pepperoniCheckbox").is(':checked'),
                'mushrooms': $("#mushroomCheckbox").is(':checked'), 'olives': $("#olivesCheckbox").is(':checked'),
                'peppers': $("#peppersCheckbox").is(':checked'), 'cheese': $("#cheeseCheckbox").is(':checked') }),
                contentType: 'application/json',
            }).always(function(data){
                $("#totalCost").html('$' + data);
                $("#finalCost").val(data);
            });
        });
    });

    // Javascript method(s)
    /*  -- Method Header Comment
    Name	:	checkToppings
    Purpose :	Makes sure at least 1 topping has been selected before submitting
    Inputs	:	None
    Outputs	:	None
    Returns	:	bool    true        at least 1 topping was selected
                        false       no toppings were selected
    */
    function checkToppings()
    {
        // if at least 1 topping was selected
        if(document.getElementById("pepperoniCheckbox").checked || document.getElementById("mushroomCheckbox").checked ||
        document.getElementById("olivesCheckbox").checked || document.getElementById("peppersCheckbox").checked ||
        document.getElementById("cheeseCheckbox").checked )
        {
            return true;
        }
        // no toppings were selected
        else
        {
            document.getElementById("inputError").innerHTML = "At least 1 topping must be selected";
            return false;
        }
    }

    </script>
<?php
// start the session and save the full name and first name into their own session variables
session_start();
$_SESSION["customerName"] = $_GET['customerName'];
$_SESSION["firstName"] = $_GET['firstName'];
?>
</head>
<body>
    <h1>SET Pizza Shop </h1>
    <form id="customizeForm" name="customizeForm" action="Page3.php" method="GET" onsubmit="return checkToppings();">
        <table>
            <tr>
                <td style="width: 33%"></td>
                <td style="width: 33%"><span id="userPrompt" class="prompt">Ciao <?php echo $_SESSION["firstName"] ?> </span></td>
                <td style="width: 33%"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <label class="checkLabel">Pepperoni</label>
                </td>
                <td></td>
                <td>
                    <input type="checkbox" id="pepperoniCheckbox" class="checkbox" name="pepperonis" value="Pepperoni"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="checkLabel">Mushrooms</label>
                </td>
                <td></td>
                <td>
                <input type="checkbox" id="mushroomCheckbox" class="checkbox" name="mushrooms" value="Mushrooms"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="checkLabel">Green Olives</label>
                </td>
                <td></td>
                <td>
                <input type="checkbox" id="olivesCheckbox" class="checkbox" name="olives" value="Green Olives"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="checkLabel">Green Peppers</label>
                </td>
                <td></td>
                <td>
                <input type="checkbox" id="peppersCheckbox" class="checkbox" name="peppers" value="Green Peppers"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label class="checkLabel">Double Cheese</label>
                </td>
                <td></td>
                <td>
                <input type="checkbox" id="cheeseCheckbox" class="checkbox" name="cheese" value="Double Cheese"/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><div class="checkLabel">Total Cost</div></td>
                <td>
                    <div id="totalCost" class="checkLabel">$10.00</div>
                    <input id="finalCost" name="finalCost" type="hidden" value="10.00">
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" id="submitButton" class="button" value="Build Pizza"/>&nbsp;</td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td><div id="inputError" class="Error"></div></td>
            </tr>

        </table>
    </form>
</body>
</html>
