<?php
class PropertyData{

public $categories = [
    "Apartment", "Building", "Commercial Space", "Condominium", "House & Lot",
    "Lot w/ Unfinished Structure", "Lot with Structure", "Townhouse", "Vacant Lot", "Warehouse"
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

// Lot Areas
private $lot_areas = [
    "40-250" => [40, 250],
    "251-500" => [251, 500],
    "501-750" => [501, 750],
    "751-1000" => [751, 1000],
    "1001-1500" => [1001, 1500],
    "1501-2500" => [1501, 2500],
    "2501-1000000" => [2501, 1000000]
];

// Floor Areas
private $floor_areas = [
    "0-250" => [0, 250],
    "251-500" => [251, 500],
    "501-750" => [501, 750],
    "751-1000" => [751, 1000],
    "1001-1500" => [1001, 1500],
    "1501-2500" => [1501, 2500],
    "2501-1000000" => [2501, 1000000]
];

// Price Ranges
private $price_ranges = [
    "1-500000" => [1, 500000],
    "500001-1000000" => [500001, 1000000],
    "1000001-5000000" => [1000001, 5000000],
    "5000001-10000000" => [5000001, 10000000],
    "10000001-15000000" => [10000001, 15000000],
    "15000001-20000000" => [15000001, 20000000],
    "20000001-50000000" => [20000001, 50000000],
    "50000001-above" => [50000001, PHP_INT_MAX]
];

private $property_classes = [
    'Green Tag' => 'Green',
    'Yellow Tag' => 'Yellow',
    'Red Tag' => 'Red'
];

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