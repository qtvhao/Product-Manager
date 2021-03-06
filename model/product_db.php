<?php
//các hàm làm việc với bảng products
//các cột trong bảng products: productID,categoryID,productCode,productName,listPrice
function get_products() {
	global $db;
	$query = 'SELECT * FROM products ORDER BY productID';
	$products = $db->query($query);
	return $products;
}
function get_products_by_category($category_id) {
	global $db;
	$query = "SELECT * FROM products
	WHERE categoryID='$category_id'
	ORDER BY productID";
	$products = $db->query($query);
	return $products;
}
function get_product($product_id) {
	global $db;
	$query = "SELECT * FROM products
	WHERE productID = '$product_id'";
	$product = $db->query($query)->fetch();
	return $product;
}
function delete_product($product_id) {
	global $db;
	$db->exec("DELETE FROM products WHERE productID='$product_id'");
}
function add_product($category_id, $code, $name, $price) {
	global $db;
	$query = ("INSERT INTO products
						(categoryID,productCode,productName,listPrice)
				VALUES
						('$category_id','$code','$name','$price')
		");
	$db->exec($query);
}