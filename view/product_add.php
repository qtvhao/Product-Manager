<?php include 'header.php';?>
<div class="container">
    <form action="index.php" method="POST" class="form-horizontal" role="form">
        <div class="form-group">
            <legend>Add Product</legend>
        </div>
        <form action="index.php" method="POST" class="form-horizontal" role="form">
            <div class="form-group">
                <legend>Form title</legend>
            </div>
            <input type="hidden" name="action" class="form-control" value="add_product">
            <div class="form-group">
                <label for="inputCategory_id" class="col-sm-2 control-label">Category_id:</label>
                <div class="col-sm-10">
                    <select name="category_id" id="inputCategory_id" class="form-control">
                        <?php
foreach ($categories as $category) {
	echo "<option value='$category[categoryID]'>$category[categoryName]</option>";
}

?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputCode" class="col-sm-2 control-label">Code:</label>
                <div class="col-sm-10">
                    <input type="text" name="code" id="inputCode" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="inputName" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPrice" class="col-sm-2 control-label">Price:</label>
                <div class="col-sm-10">
                    <input type="text" name="price" id="inputPrice" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </form>
    </form>
    <a class="btn btn-info" href="index.php?action=list_products" role="button">View Product List</a>
</div>
<?php include 'footer.php';?>
