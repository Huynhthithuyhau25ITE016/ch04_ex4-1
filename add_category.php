<?php
require_once('database.php');

// Get the category name from the form
$category_name = filter_input(INPUT_POST, 'category_name');

// Add the category to the database
$query = 'INSERT INTO categories (categoryName)
          VALUES (:category_name)';
$statement = $db->prepare($query);
$statement->bindValue(':category_name', $category_name);
$statement->execute();
$statement->closeCursor();

// Display the Category List page
include('category_list.php');
?>
