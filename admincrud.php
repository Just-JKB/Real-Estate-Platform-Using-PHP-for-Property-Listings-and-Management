<?php
require_once 'DatabaseConnection.php';

class PropertyCRUD {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    // Create a new property
    public function createProperty($data) {
        $query = "INSERT INTO property (categories, locations, lot_areas, floor_areas, price_ranges, property_classes, descr)
                  VALUES (:categories, :locations, :lot_areas, :floor_areas, :price_ranges, :property_classes, :descr)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':categories' => $data['categories'] ?? '',
            ':locations' => $data['locations'] ?? '',
            ':lot_areas' => $data['lot_areas'] ?? '',
            ':floor_areas' => $data['floor_areas'] ?? '',
            ':price_ranges' => $data['price_ranges'] ?? '',
            ':property_classes' => $data['property_classes'] ?? '',
            ':descr' => $data['descr'] ?? '',
        ]);
    }

    // Read all properties
    public function getProperties() {
        $query = "SELECT * FROM property";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single property by ID (for editing)
    public function getPropertyById($property_id) {
        $query = "SELECT * FROM property WHERE property_id = :property_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':property_id' => $property_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a property
    public function updateProperty($property_id, $data) {
        $query = "UPDATE property SET 
                  categories = :categories, locations = :locations, lot_areas = :lot_areas,
                  floor_areas = :floor_areas, price_ranges = :price_ranges, property_classes = :property_classes, descr = :descr
                  WHERE property_id = :property_id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':property_id' => $property_id,
            ':categories' => $data['categories'] ?? '',
            ':locations' => $data['locations'] ?? '',
            ':lot_areas' => $data['lot_areas'] ?? '',
            ':floor_areas' => $data['floor_areas'] ?? '',
            ':price_ranges' => $data['price_ranges'] ?? '',
            ':property_classes' => $data['property_classes'] ?? '',
            ':descr' => $data['descr'] ?? '',
        ]);
    }

    // Delete a property
    public function deleteProperty($property_id) {
        $query = "DELETE FROM property WHERE property_id = :property_id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':property_id' => $property_id]);
    }
    //Check for duplicates
    public function checkDuplicateProperty($data) {
        $query = "SELECT COUNT(*) as count FROM property WHERE 
                    descr = :descr";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':descr', $data['descr']);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

}
?>
