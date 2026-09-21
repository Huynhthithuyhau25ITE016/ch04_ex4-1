<?php
require_once('database.php');

// Get the category ID from the form
$category_id = filter_input(INPUT_POST, 'category_id');

// Delete the category from the database
$query = 'DELETE FROM categories
          WHERE categoryID = :category_id';
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$statement->closeCursor();

// Display the Category List page
include('category_list.php');
?>
