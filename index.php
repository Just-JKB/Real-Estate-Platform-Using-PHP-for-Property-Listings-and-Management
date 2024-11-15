<?php
$categories = [
    "Apartment", "Building", "Commercial Space", "Condominium", "House & Lot",
    "Lot w/ Unfinished Structure", "Lot with Structure", "Others", "Townhouse", "Vacant Lot", "Warehouse"
];

$locations = [
    "Adya", "Anilao", "Anilao-Labac", "Antipolo del Norte", "Antipolo del Sur", "Bagong Pook", "Balintawak", "Banaybanay", "Bolbok",
     "Bugtong na Pulo", "Bulacnin", "Bulaklakan", "Calamias", "Cumba", "Dagatan", "Duhatan", "Halang", "Inosloban", "Kayumanggi", "Latag",
      "Lodlod", "Lumbang", "Mabini", "Malagonlong", "Malitlit", "Marauoy", "Mataas na Lupa", "Munting Pulo", "Pagolingin Bata", 
      "Pagolingin East", "Pagolingin West", "Pangao", "Pinagkawitan", "Pinagtongulan", "Plaridel", "Poblacion Barangay 1", 
      "Poblacion Barangay 2", "Poblacion Barangay 3", "Poblacion Barangay 4", "Poblacion Barangay 5", "Poblacion Barangay 6", 
      "Poblacion Barangay 7", "Poblacion Barangay 8", "Poblacion Barangay 9", "Poblacion Barangay 9-A", "Poblacion Barangay 10", 
      "Poblacion Barangay 11", "Poblacion Barangay 12", "Pusil", "Quezon", "Rizal", "Sabang", "Sampaguita", "San Benito", "San Carlos", 
      "San Celestino", "San Francisco", "San Guillermo", "San Jose", "San Lucas", "San Salvador", "San Sebastian", "Santo Niño", 
      "Santo Toribio", "Sapac", "Sico", "Talisay", "Tambo", "Tangob", "Tanguay", "Tibig", "Tipacan"
];

$lot_areas = [
    "0-250" => "1 sqm to 250 sqm",
    "251-500" => "251 sqm to 500 sqm",
    "501-750" => "501 sqm to 750 sqm",
    "751-1000" => "751 sqm to 1,000 sqm",
    "1001-1500" => "1,001 sqm to 1,500 sqm",
    "1501-2500" => "1,501 sqm to 2,500 sqm",
    "2501-1000000" => "2,501 sqm and above"
];

$floor_areas = $lot_areas; 

$price_ranges = [
    "1-500000" => "PHP 1 to PHP 500,000",
    "500001-1000000" => "PHP 500,001 to PHP 1,000,000",
    "1000001-5000000" => "PHP 1,000,001 to PHP 5,000,000",
    "5000001-10000000" => "PHP 5,000,001 to PHP 10,000,000",
    "10000001-15000000" => "PHP 10,000,001 to PHP 15,000,000",
    "15000001-20000000" => "PHP 15,000,001 to PHP 20,000,000",
    "20000001-50000000" => "PHP 20,000,001 to PHP 50,000,000",
    "50000001-above" => "PHP 50,000,001 and above"
];

$property_classes = [
    "1" => "Green Tag",
    "2" => "Yellow Tag",
    "3" => "Red Tag"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clavem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
        <!-- Category  -->
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category" class="form-control">
                <option value="" selected>Select Category</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category ?>"><?= $category ?></option>
                <?php endforeach; ?>
            </select>
        </div>
                        
        <div class="form-group">
            <label for="location">Location</label>
            <select id="location" name="location" class="form-control">
                <option value="" selected>Select Location</option>
                <?php foreach ($locations as $location): ?>
                    <option value="<?= $location ?>"><?= $location ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Lot Area  -->
        <div class="form-group">
            <label for="lot_area">Lot Area (sqm.)</label>
            <select id="lot_area" name="lot_area" class="form-control">
                <option value="" selected>Select Lot Area</option>
                <?php foreach ($lot_areas as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Floor Area  -->
        <div class="form-group">
            <label for="floor_area">Floor Area (sqm.)</label>
            <select id="floor_area" name="floor_area" class="form-control">
                <option value="" selected>Select Floor Area</option>
                <?php foreach ($floor_areas as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Price Range  -->
        <div class="form-group">
            <label for="price_range">Price Range</label>
            <select id="price_range" name="price_range" class="form-control">
                <option value="" selected>Select Price Range</option>
                <?php foreach ($price_ranges as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Property Classification  -->
        <div class="form-group">
            <label for="property_class">Property Classification</label>
            <select id="property_class" name="property_class" class="form-control">
                <option value="" selected>Select Classification</option>
                <?php foreach ($property_classes as $key => $label): ?>
                    <option value="<?= $key ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
</body>
</html>
