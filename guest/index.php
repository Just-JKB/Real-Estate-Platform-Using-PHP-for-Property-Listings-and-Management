<?php

require_once '../Database/PropertyData.php'; //calling property data using require once so that if it fails it shows an error


$propertyData = new PropertyData(); //object instantiation to get the PropertyData class and its arrays

$categories = $propertyData->getCategories();//method calls
$locations = $propertyData->getLocations();
$lot_areas = $propertyData->getLotAreas();
$floor_areas = $propertyData->getFloorAreas();
$price_ranges = $propertyData->getPriceRanges();
$property_classes = $propertyData->getPropertyClasses();
?>


<!DOCTYPE html>  <!-- Start of html file inside php file -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clavem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/style.css">
</head>
<body>
    <nav>
    <a href="index.php">
    <div class="logo">Clavem</div>
</a>   
        <ul class="navbar">
            <li><a href="../guest/index.php">Home</a></li>
            <li><a href="../html/About.html">About Us</a></li>
            <li><a href="../html/Contact.html">Contact Us</a></li>
        </ul>
    </nav>

    <div class="container mt-5"> 
        <br>
        <br>
        <h3>Find Properties for Sale</h3>
        <form method="POST" action="../guest/search.php"> <!-- uses form for user interaction POST for security and the action for where to go    -->
            <!-- Dropdown for all variables -->

            <!-- Category -->    
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control">
                    <option value="" selected>Select Category</option>
                    <?php foreach ($categories as $category): ?> <!-- calls all variables of the array -->
                        <option value="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></option><!-- creates the dropdown -->
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <select id="location" name="location" class="form-control">
                    <option value="" selected>Select Location</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?= htmlspecialchars($location) ?>"><?= htmlspecialchars($location) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

             <!-- Lot Area -->
             <div class="form-group">
                <label for="lot_area">Lot Area (sqm.)</label>
                <select id="lot_area" name="lot_area" class="form-control">
                    <option value="" selected>Select Lot Area</option>
                    <?php foreach ($lot_areas as $key => $range): ?>
                        <option value="<?= $key ?>"><?= $key ?> (<?= $range[0] ?> sqm to <?= $range[1] ?> sqm)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            
             <!-- Floor Area -->
             <div class="form-group">
                <label for="floor_area">Floor Area (sqm.)</label>
                <select id="floor_area" name="floor_area" class="form-control">
                    <option value="" selected>Select Floor Area</option>
                    <?php foreach ($floor_areas as $key => $range): ?>
                        <option value="<?= $key ?>"><?= $key ?> (<?= $range[0] ?> sqm to <?= $range[1] ?> sqm)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Price Range -->
            <div class="form-group">
                <label for="price_range">Price Range</label>
                <select id="price_range" name="price_range" class="form-control">
                    <option value="" selected>Select Price Range</option>
                    <?php foreach ($price_ranges as $key => $range): ?>
                        <option value="<?= $key ?>">PHP <?= number_format($range[0]) ?> to PHP <?= number_format($range[1]) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Property Classification -->
            <div class="form-group">
                <label for="property_class">Property Classification</label>
                <select id="property_class" name="property_class" class="form-control">
                    <option value="" selected>Select Classification</option>
                    <?php foreach ($property_classes as $key => $label): ?>
                        <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Submit Button -->
            <button style="background-color: #cba560; border-color:#cba560"class="btn btn-primary" type="submit" >Search</button>
        </form>
    </div>

    <footer class="footer-bar">
	&copy; 2024 Clavem. All rights reserved.
</footer>
</body>
</html>
