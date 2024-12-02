<?php
class PropertyData{

private $categories = [
    "Apartment", "Building", "Commercial Space", "Condominium", "House & Lot",
    "Lot w/ Unfinished Structure", "Lot with Structure", "Others", "Townhouse", "Vacant Lot", "Warehouse"
];

private $locations = [
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

private $lot_areas = [
    "0-250" => "1 sqm to 250 sqm",
    "251-500" => "251 sqm to 500 sqm",
    "501-750" => "501 sqm to 750 sqm",
    "751-1000" => "751 sqm to 1,000 sqm",
    "1001-1500" => "1,001 sqm to 1,500 sqm",
    "1501-2500" => "1,501 sqm to 2,500 sqm",
    "2501-1000000" => "2,501 sqm and above"
];

private $floor_areas; 

private $price_ranges = [
    "1-500000" => "PHP 1 to PHP 500,000",
    "500001-1000000" => "PHP 500,001 to PHP 1,000,000",
    "1000001-5000000" => "PHP 1,000,001 to PHP 5,000,000",
    "5000001-10000000" => "PHP 5,000,001 to PHP 10,000,000",
    "10000001-15000000" => "PHP 10,000,001 to PHP 15,000,000",
    "15000001-20000000" => "PHP 15,000,001 to PHP 20,000,000",
    "20000001-50000000" => "PHP 20,000,001 to PHP 50,000,000",
    "50000001-above" => "PHP 50,000,001 and above"
];

private $property_classes = [
    'Green' => 'Green Tag',
    'Yellow' => 'Yellow Tag',
    'Red' => 'Red Tag'
];

public function __construct() //make the fields lot area == floor area
{
    
    $this->floor_areas = $this->lot_areas;
}

public function getCategories()
    {
        return $this->categories;
    }

    public function getLocations()
    {
        return $this->locations;
    }

    public function getLotAreas()
    {
        return $this->lot_areas;
    }

    public function getFloorAreas()
    {
        return $this->floor_areas;
    }

    public function getPriceRanges()
    {
        return $this->price_ranges;
    }

    public function getPropertyClasses()
    {
        return $this->property_classes;
    }
}
?>