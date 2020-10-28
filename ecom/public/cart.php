<?php require_once("../resources/config.php"); ?>

<?php 


// ADD

if(isset($_GET['add']))
{

$query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']). " ");

while($row = fetch_array($query)) {

    if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']])
    {

    $_SESSION['product_' . $_GET['add']] +=1;
    redirect("checkout.php");
        
    }
    else {
        set_message("You tried adding another " . $row['product_title'] . ". We only have" . " " . $row['product_quantity'] . " ". " available.");

        redirect("checkout.php");
    }

}

}

// REMOVE

if(isset($_GET['remove']))
{


$_SESSION['product_' . $_GET['remove']]--;

if($_SESSION['product_' . $_GET['remove']] <1) 
    { 
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);

        redirect("checkout.php");
    }
else
    {
   redirect("checkout.php"); 
    }
}


// DELETE

if(isset($_GET['delete']))
{

if($_SESSION['product_' . $_GET['delete']] = '0')
    { 
        redirect("checkout.php");
    }

unset($_SESSION['item_total']);
unset($_SESSION['item_quantity']);


redirect("checkout.php");

}

?>




