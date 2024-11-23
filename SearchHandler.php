<?php

require_once 'DatabaseConnection.php';

class SearchHandler
{
    private $pdo;
    private $errors = [];
    private $results = [];

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    private function validateInput($data)
    {
        if ($data['categories'] && !in_array($data['categories'], $this->getCategories())) {
            $this->errors[] = "Invalid category selected.";
        }

        if ($data['locations'] && !in_array($data['locations'], $this->getLocations())) {
            $this->errors[] = "Invalid location selected.";
        }
     
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
        $query .= " AND lot_areas = :lot_areas";
        $params[':lot_areas'] = $data['lot_areas'];
    }

    if ($data['floor_areas']) {
        $query .= " AND floor_areas = :floor_areas";
        $params[':floor_areas'] = $data['floor_areas'];
    }

    if ($data['price_ranges']) {
        [$minPrice, $maxPrice] = explode('-', $data['price_ranges']);
        if ($maxPrice === 'above') {
            $query .= " AND price >= :min_price";
            $params[':min_price'] = $minPrice;
        } else {
            $query .= " AND price BETWEEN :min_price AND :max_price";
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
                $query .= " ORDER BY price ASC";
                break;
            case 'price_desc':
                $query .= " ORDER BY price DESC";
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
        $this->validateInput($data);

        if (!empty($this->errors)) {
            return $this->errors;
        }

        [$query, $params] = $this->buildQuery($data);

        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);

        $this->results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $this->results;
    }

    public function getCategories()
    {
        return ['Apartment', 'Building', 'Commercial Space', 'Condominium', 'House & Lot', 'Lot w/ Unfinished Structure', 'Lot with Structure', 'Others', 'Townhouse', 'Vacant Lot', 'Warehouse'];
    }

    public function getLocations()
    {
        return ['Adya', 'Anilao', 'Antipolo del Norte', 'Antipolo del Sur']; // Add all locations
    }

    public function getLotAreas()
    {
        return ['0-250', '251-500', '501-750', '751-1000', '1001-1500', '1501-2500', '2501-1000000'];
    }

    public function getFloorAreas()
    {
        return $this->getLotAreas(); // Reuse same options
    }

    public function getPriceRanges()
    {
        return ['1-500000', '500001-1000000', '1000001-5000000', '5000001-10000000', '10000001-15000000', '15000001-20000000', '20000001-50000000', '50000001-above'];
    }

    public function getPropertyClasses()
    {
        return ['1', '2', '3'];
    }
}