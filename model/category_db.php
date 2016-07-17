<?php
//các hàm làm việc với bảng categories
//các cột trong bảng categories: categoryID,categoryName
function get_categories() {
	global $db;
	$query = 'SELECT * FROM categories ORDER BY categoryID';
	$result = $db->query($query);
	return $result;
}
function get_category_name($category_id) {
	global $db;
	$query = "SELECT * FROM categories WHERE categoryID=$category_id";
	$category = $db->query($query)->fetch();
	$category_name = $category['categoryName'];
	return $category_name;
}