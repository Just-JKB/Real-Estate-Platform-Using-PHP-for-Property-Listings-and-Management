<?php
require_once 'SearchHandler.php';

echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles\stylesearch.css">
    <link rel="stylesheet" href="Styles\style.css">
</head>
<body>

<nav>
    <div class="logo">Clavem</div>
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="About.php">About Us</a></li>
        <li><a href="Contact.php">Contact Us</a></li>
    </ul>
</nav>

<div class="container mt-5">
HTML;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchHandler = new SearchHandler();
    $data = [
        'categories' => $_POST['categories'] ?? '',
        'locations' => $_POST['locations'] ?? '',
        'lot_areas' => $_POST['lot_areas'] ?? '',
        'floor_areas' => $_POST['floor_areas'] ?? '',
        'price_ranges' => $_POST['price_ranges'] ?? '',
        'property_classes' => $_POST['property_classes'] ?? '',
        'sort_by' => $_POST['sort_by'] ?? '',
    ];

    $results = $searchHandler->handleSearch($data);

    if (is_array($results) && isset($results[0]['categories'])) {
        echo "<br>" ."<br>";
        foreach ($results as $property) {
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title font-weight-bold'>{$property['categories']}</h5>";
            echo "<p class='card-text'><strong>Location:</strong> {$property['locations']}</p>";
            echo "<p class='card-text'><strong>Lot Area:</strong> {$property['lot_areas']} sqm</p>";
            echo "<p class='card-text'><strong>Floor Area:</strong> {$property['floor_areas']} sqm</p>";
            echo "<p class='card-text'><strong>Price:</strong> PHP " . number_format($property['price_ranges'], 2) . "</p>";
            echo "<p class='card-text'><strong>Classification:</strong> {$property['property_classes']}</p>";
            echo "</div>";
            echo "</div>";
        }
    } elseif (is_array($results)) {
        echo "<br><br>" ."<div class='alert alert-warning'>No properties found matching your criteria.</div>";
    } else {
        echo "<div class='alert alert-danger'>";
        echo "<h4 class='alert-heading'>Validation Errors</h4>";
        echo "<ul class='mb-0'>";
        foreach ($results as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }
}

?>
