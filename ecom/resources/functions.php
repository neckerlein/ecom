<?php

//Test Database Connection:
//if($connection) { echo "is connected"; }


//*************** HELPER functions ***************

function redirect($location)
{
	return header("Location: $location" );
}


function confirm($result) {
    global $connection;
    if(!$result) {
        die("SQL QUERY FAILED" . mysqli_error($connection));
    }
}

function query($sql) {
	global $connection;
	return mysqli_query($connection, $sql);
    confirm($query);
}





function escape_string($string) {
	global $connection;
	return mysqli_real_escape_string($connection, $string);
}


function fetch_array($result) {
	return mysqli_fetch_array($result);
}


function set_message($msg){
if(!empty($msg)){
	$_SESSION['message'] = $msg;
}
else {
	$msg = "";
}
}


//*************** FRONTEND functions ***************

function get_products_index() {

$query = query("SELECT * FROM products");


while($row = fetch_array($query)) {

$product = <<<DELIMITER

<div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a target="_blank" href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                            <div class="caption">
                                <a target="_blank" href="item.php?id={$row['product_id']}"><h4 class="pull-right">
                                {$row['product_price']}
                                {$row['product_price_currency_text']}
                                </h4></a>
                                <h4> <a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                                <p> <a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_description']}</a></p>
                                <p>
                                     <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Kaufen</a>
                                </p>
                            </div>
                            


                        </div>
                    </div>
DELIMITER;


echo $product;
}
}



function get_categories() {

	$query = query("SELECT * FROM categories");
	
	

	while($row = fetch_array($query)) {
$category_links = <<<DELIMITER

<a href='category.php?id={$row['category_id']}' class='list-group-item'>{$row['category_title']}</a>

DELIMITER;

        echo $category_links;

	}

}



function get_products_in_category() {

$query = query("SELECT * FROM products WHERE product_category_id = ". escape_string($_GET['id']) . " ");


while($row = fetch_array($query)) {

$product = <<<DELIMITER

<div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h3>
                        <p><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_description']}</a></p>
                        <p>
                                     <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Kaufen</a>
                                </p>
                    </div>
                </div>
            </div>
DELIMITER;


echo $product;
}
}



function get_products_in_shop() {

$query = query("SELECT * FROM products");


while($row = fetch_array($query)) {

$product = <<<DELIMITER

<div class="row text-center">

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_title']}</a></h3>
                        <p><a target="_blank" href="item.php?id={$row['product_id']}">{$row['product_description']}</a></p>
                        <p>
                                     <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Kaufen</a>
                                </p>
                    </div>
                </div>
            </div>
DELIMITER;


echo $product;
}
}



//*************** BACkEND functions ***************

function login_user()
{

if(isset($_POST['submit']))	

$username = escape_string($_POST['username']);
$password = escape_string($_POST['password']);

$query = query("SELECT * FROM user WHERE user_name = '{$username}' AND user_password = '{$password}' ");
confirm($query);

if(mysqli_num_rows($query) == 0)
	{
		set_message("Password or username is wrong");
		
	}
else
	{
		redirect("admin");
	}

}


function send_contact_form() {

if(isset($_POST['submit'])) 

$to = "u21-slam@gmx.de";
$from_name = escape_string($_POST['name']);
$email = escape_string($_POST['email']);
$subject = escape_string($_POST['subject']);
$message = escape_string($_POST['message']);
$headers = "From: {$from_name} {$email}";
$result = mail($to, $subject, $message, $headers);

if(!result)
{ set_message("Error. Your Message has not been sent.");
redirect("contact.php");}
else
{ set_message("Your Message has been sent.");}

}


function display_message(){
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
}



function cart()

{

$total = 0;
$item_quantity = 0;

foreach($_SESSION as $name => $value) {

    if ($value > 0) {


    }

    if(substr($name, 0, 8 ) =="product_") {

$length = strlen($name - 8);
$id = substr($name, 8, $length);

        $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id) . " ");
       

while($row = fetch_array($query))  {

$subtotal = $row['product_price'] * $value;
$subtotal_text = $subtotal . " ". $row['product_price_currency_text'];
$item_quantity +=$value;


$product = <<<DELIMITER

   <tr>
                <td>{$row['product_title']}</td>
                <td>{$row['product_price']} {$row['product_price_currency_text']}</td>
                <td>{$value}</td>
                <td>{$subtotal}</td>

                <td>

                <a class="btn btn-success" href="cart.php?add={$row['product_id']}">
                <span class="glyphicon glyphicon-plus"></span></a>

                <a class="btn btn-warning" href="cart.php?remove={$row['product_id']}">
                <span class="glyphicon glyphicon-minus"></span></a>

                <a class="btn btn-danger" href="cart.php?delete={$row['product_id']}">
                <span class="glyphicon glyphicon-remove"></span></a>


                </td>

              
    </tr>

DELIMITER;

echo $product;

}

$_SESSION['item_total'] = $total += $subtotal;
$_SESSION['item_quantity'] = $item_quantity;

}
                }
            }

?>