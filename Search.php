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
  <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.all.min.js"></script>


    <link rel="stylesheet" href="Styles\stylesearch.css">
    <link rel="stylesheet" href="Styles\style.css">
</head>
<body>

<nav>
<a href="index.php">
    <div class="logo">Clavem</div>
</a>    
    <ul class="navbar">
        <li><a href="index.php">Home</a></li>
        <li><a href="About.html">About Us</a></li>
        <li><a href="Contact.html">Contact Us</a></li>
    </ul>
</nav>

<div class="container mt-5">

HTML;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchHandler = new SearchHandler();
    $data = [
        'categories' => $_POST['category'] ?? '',
        'locations' => $_POST['location'] ?? '',
        'lot_areas' => $_POST['lot_area'] ?? '',
        'floor_areas' => $_POST['floor_area'] ?? '',
        'price_ranges' => $_POST['price_range'] ?? '',
        'property_classes' => $_POST['property_class'] ?? '',
        'sort_by' => $_POST['sort_by'] ?? '',
    ];
    

    $results = $searchHandler->handleSearch($data);

    if (is_array($results) && isset($results[0]['categories'])) {
        echo "<br><br>";
        foreach ($results as $index => $property) {
            // Make sure to escape special characters for safety
            $property_id = htmlspecialchars($property['property_id']); // Include property_id
            $category = htmlspecialchars($property['categories']);
            $location = htmlspecialchars($property['locations']);
            $lotArea = htmlspecialchars($property['lot_areas']);
            $floorArea = htmlspecialchars($property['floor_areas']);
            $price = number_format($property['price_ranges'], 2);
            $classification = htmlspecialchars($property['property_classes']);
            $description = htmlspecialchars($property['descr']); // Description
    
            // Generate the card for each property
            echo "<div class='card mb-3'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title font-weight-bold'>{$category}</h5>";
            echo "<p class='card-text'><strong>Location:</strong> {$location}</p>";
            echo "<p class='card-text'><strong>Lot Area:</strong> {$lotArea} sqm</p>";
            echo "<p class='card-text'><strong>Floor Area:</strong> {$floorArea} sqm</p>";
            echo "<p class='card-text'><strong>Price:</strong> PHP {$price}</p>";
            echo "<p class='card-text'><strong>Classification:</strong> {$classification}</p>";
            
    
            // More Info Button
            echo "<button type='button' class='btn btn-info' onclick='showDescription(\"{$property_id}\", \"{$category}\", \"{$location}\", \"{$lotArea}\", \"{$floorArea}\", \"{$price}\", \"{$classification}\", \"{$description}\")'>More Info</button>";
            echo "</div>";
            echo "</div>";
        }
    } elseif (is_array($results)) {
        echo "<br><br>" . "<div class='alert alert-warning'>No properties found matching your criteria.</div>";
    } else {
        echo "<div class='alert alert-danger'>";
        echo "<h4 class='alert-heading'>Validation Errors</h4>";
        echo "<ul class='mb-0'>";
        foreach ($results as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "</div>";
    }}
    ?>
    
    <script>
    // Function to show SweetAlert with all property details, including property_id
    function showDescription(property_id, category, location, lotArea, floorArea, price, classification, description) {
        Swal.fire({
            title: 'Property Details ', // Display property_id in the title
            html: `
                <strong>Property ID:</strong> ${property_id} <br>
                <strong>Category:</strong> ${category} <br>
                <strong>Location:</strong> ${location} <br>
                <strong>Lot Area:</strong> ${lotArea} sqm <br>
                <strong>Floor Area:</strong> ${floorArea} sqm <br>
                <strong>Price:</strong> PHP ${price} <br>
                <strong>Classification:</strong> ${classification} <br>
                <strong>Description:</strong> <br> ${description} <br>
            `,
        
            confirmButtonText: 'Close'
        });
    }
    </script>