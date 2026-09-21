<?php
require_once('database.php');

// Get the category ID and new name
$category_id = filter_input(INPUT_POST, 'category_id');
$category_name = filter_input(INPUT_POST, 'category_name');

// Update the category
$query = 'UPDATE categories
          SET categoryName = :category_name
          WHERE categoryID = :category_id';

$statement = $db->prepare($query);
$statement->bindValue(':category_name', $category_name);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$statement->closeCursor();

// Display the Category List page
include('category_list.php');
?>
