<?php

require_once 'PropertyData.php';


$propertyData = new PropertyData();

$categories = $propertyData->getCategories();
$locations = $propertyData->getLocations();
$lot_areas = $propertyData->getLotAreas();
$floor_areas = $propertyData->getFloorAreas();
$price_ranges = $propertyData->getPriceRanges();
$property_classes = $propertyData->getPropertyClasses();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clavem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <br>
        <br>
        <h3>Find Properties for Sale</h3>
        <form method="POST" action="search.php">
            
            <!-- Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control">
                    <option value="" selected>Select Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category) ?>"><?= htmlspecialchars($category) ?></option>
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
                    <?php foreach ($lot_areas as $key => $label): ?>
                        <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Floor Area -->
            <div class="form-group">
                <label for="floor_area">Floor Area (sqm.)</label>
                <select id="floor_area" name="floor_area" class="form-control">
                    <option value="" selected>Select Floor Area</option>
                    <?php foreach ($floor_areas as $key => $label): ?>
                        <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Price Range -->
            <div class="form-group">
                <label for="price_range">Price Range</label>
                <select id="price_range" name="price_range" class="form-control">
                    <option value="" selected>Select Price Range</option>
                    <?php foreach ($price_ranges as $key => $label): ?>
                        <option value="<?= htmlspecialchars($key) ?>"><?= htmlspecialchars($label) ?></option>
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
            <button style="background-color: #cba560; border-color:#cba560" type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</body>
</html>
