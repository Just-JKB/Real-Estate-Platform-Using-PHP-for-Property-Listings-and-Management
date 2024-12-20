<?php

require_once '../Database/DatabaseConnection.php'; //calling property data using require once so that if it fails it shows an error

class SearchHandler //class that handles the search operation 
{
    private $pdo; //instance of database connection

    private $results = [];//empty array for results

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    private function buildQuery($data)
{
    $query = "SELECT * FROM property WHERE 1=1";
    $params = [];

    if ($data['categories']) {
        $query .= " AND categories = :categories";
        $params[':categories'] = $data['categories'];
    }

    if ($data['locations']) {
        $query .= " AND locations = :locations";
        $params[':locations'] = $data['locations'];
    }

    if ($data['lot_areas']) {
        [$minLot, $maxLot] = explode('-', $data['lot_areas']);
        if ($maxLot === '1000000') {
            $query .= " AND lot_areas >= :min_lot";
            $params[':min_lot'] = $minLot;
        } else {
            $query .= " AND lot_areas BETWEEN :min_lot AND :max_lot";
            $params[':min_lot'] = $minLot;
            $params[':max_lot'] = $maxLot;
        }
    }
    
    if ($data['floor_areas']) {
        [$minFloor, $maxFloor] = explode('-', $data['floor_areas']);
        if ($maxFloor === '1000000') {
            $query .= " AND floor_areas >= :min_floor";
            $params[':min_floor'] = $minFloor;
        } else {
            $query .= " AND floor_areas BETWEEN :min_floor AND :max_floor";
            $params[':min_floor'] = $minFloor;
            $params[':max_floor'] = $maxFloor;
        }
    }

    if ($data['price_ranges']) {
        [$minPrice, $maxPrice] = explode('-', $data['price_ranges']);
        if ($maxPrice === 'above') {
            $query .= " AND price_ranges >= :min_price";
            $params[':min_price'] = $minPrice;
        } else {
            $query .= " AND price_ranges BETWEEN :min_price AND :max_price";
            $params[':min_price'] = $minPrice;
            $params[':max_price'] = $maxPrice;
        }
    }

    if ($data['property_classes']) {
        $query .= " AND property_classes = :property_classes";
        $params[':property_classes'] = $data['property_classes'];
    }

    if ($data['sort_by']) {
        switch ($data['sort_by']) {
            case 'price_asc':
                $query .= " ORDER BY price_ranges ASC";
                break;
            case 'price_desc':
                $query .= " ORDER BY price_ranges DESC";
                break;
            case 'lot_area_asc':
                $query .= " ORDER BY lot_areas ASC";
                break;
            case 'lot_area_desc':
                $query .= " ORDER BY lot_areas DESC";
                break;
            case 'floor_area_asc':
                $query .= " ORDER BY floor_areas ASC";
                break;
            case 'floor_area_desc':
                $query .= " ORDER BY floor_areas DESC";
                break;
            default:
                break;
        }
    }

    return [$query, $params];
}


    public function handleSearch($data)
    {

        [$query, $params] = $this->buildQuery($data);

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->results;
    }
    
    public function getCategories()
    {
        return ['Apartment', 'Building', 'Commercial Space', 'Condominium', 'House & Lot', 'Lot w/ Unfinished Structure', 'Lot with Structure','Townhouse', 'Vacant Lot', 'Warehouse'];
    }

    public function getLocations()
    {
        return [
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
    }

    public function getLotAreas()
    {
        return ['40-250', '251-500', '501-750', '751-1000', '1001-1500', '1501-2500', '2501-1000000'];
    }

    public function getFloorAreas()
    {
        return ['0-250', '251-500', '501-750', '751-1000', '1001-1500', '1501-2500', '2501-1000000'];
    }

    public function getPriceRanges()
    {
        return ['1-500000', '500001-1000000', '1000001-5000000', '5000001-10000000', '10000001-15000000', '15000001-20000000', '20000001-50000000', '50000001-above'];
    }

    public function getPropertyClasses()
    {
        return ['Green', 'Yellow', 'Red'];
    }
}
