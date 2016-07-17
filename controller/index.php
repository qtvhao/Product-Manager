<?php
require '../model/database.php'; //lên một thư mục (product_manager), mở thư mục model (product_manager/model) require file database.php
//file database tạo $db
require '../model/product_db.php';
require '../model/category_db.php';
if (isset($_POST['action'])) {
	$action = $_POST['action']; //lấy input action nếu dùng POST method
} else if (isset($_GET['action'])) {
	$action = $_GET['action']; //nếu dùng GET method
} else {
	$action = 'list_products'; //giá trị mặc định - nếu không có input
}
//bây giờ ta có một $action - hành động list,delete,show,add
if ($action == 'list_products') {
	//lấy ID của category hiện tại
	if (!isset($_GET['category_id'])) {
		$category_id = 1;
	} else {
		$category_id = $_GET['category_id'];
	}

	//lấy dữ liệu về product và category
	$category_name = get_category_name($category_id);
	$categories = get_categories();
	$products = get_products_by_category($category_id);
	//hiển thị danh sách sản phẩm
	include '../view/product_list.php';
} else if ($action == 'delete_product') {
	//lấy ID
	$product_id = $_POST['product_id'];
	$category_id = $_POST['category_id'];
	//xoá sản phẩm
	delete_product($product_id);
	//hiển thị trang Product list cho thư mục hiện tại
	header("Location: .?category_id=$category_id");
} else if ($action == 'show_add_form') {
	$categories = get_categories();
	include '../view/product_add.php';
} else if ($action == 'add_product') {
	$category_id = $_POST['category_id'];
	$code = $_POST['code'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	//kiểm tra input đúng/sai
	if (empty($code) || empty($name) || empty($price)) {
		$error = "Invalid product data. Check all fields and try again.";
		include '../errors/error.php';
	} else {
		add_product($category_id, $code, $name, $price);
		//hiển thị trang Product List cho category hiện tại
		header("Location: .?category_id=$category_id");
	}
}
