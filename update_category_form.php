<?php
require_once('database.php');

// Get the category ID
$category_id = filter_input(INPUT_POST, 'category_id');

// Get the category
$query = 'SELECT * FROM categories
          WHERE categoryID = :category_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$category = $statement->fetch();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<header>
    <h1>Product Manager</h1>
</header>

<main>
    <h1>Update Category</h1>

    <form action="update_category.php" method="post">
        <input type="hidden" name="category_id"
               value="<?php echo $category['categoryID']; ?>">

        <label>Name:</label>
        <input type="text" name="category_name"
               value="<?php echo htmlspecialchars($category['categoryName']); ?>">

        <input type="submit" value="Update">
    </form>

    <br>
    <p><a href="category_list.php">List Categories</a></p>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
</footer>
</body>
</html>
