<?php include 'header.php';?>
<div class="container">
    <h1>Product List</h1>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <h2>Categories</h2>
            <ul class="list-group">
                <?php
foreach ($categories as $category) {
	echo "<a href='?category_id=$category[categoryID]' class='list-group-item'>$category[categoryName]</a>";
}
?>
            </ul>
        </div>
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
foreach ($products as $product) {
	echo '<tr>';
	echo "<td>$product[productCode]</td>";
	echo "<td>$product[productName]</td>";
	echo "<td>$product[listPrice]</td>";
	echo <<<QWE
<td>
	<form action="." method="post">
		<input type="hidden" name="action" value="delete_product">
		<input type="hidden" name="product_id" value="$product[productID]">
		<input type="hidden" name="category_id" value="$product[categoryID]">
		<button type="submit" class="btn btn-danger">Delete</button>
	</form>
</td>
QWE;
	echo '</tr>';
}
?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="?action=show_add_form" role="button">Add Product</a>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
