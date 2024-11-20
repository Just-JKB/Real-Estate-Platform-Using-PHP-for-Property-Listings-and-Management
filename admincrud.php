<?php

require_once 'db properties.php';

class PropertyCRUD {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    // Create a new property
    public function createProperty($data) {
        $query = "INSERT INTO property (categories, locations, lot_areas, floor_areas, price_ranges, property_classes)
                  VALUES (:categories, :locations, :lot_areas, :floor_areas, :price_ranges, :property_classes)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':categories' => $data['categories'],
            ':locations' => $data['locations'],
            ':lot_areas' => $data['lot_areas'],
            ':floor_areas' => $data['floor_areas'],
            ':price_ranges' => $data['price'],
            ':property_classes' => $data['property_classes'],
        ]);
    }

    // Read all properties
    public function getProperties() {
        $query = "SELECT * FROM property";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update a property
    public function updateProperty($property_id, $data) {
        $query = "UPDATE property SET 
                  categories = :categories, locations = :locations, lot_areas = :lot_areas,
                  floor_areas = :floor_areas, price_ranges = :price_ranges, property_classes = :property_classes
                  WHERE property_id = :property_id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':property_id' => $property_id,
            ':categories' => $data['categories'],
            ':locations' => $data['locations'],
            ':lot_areas' => $data['lot_areas'],
            ':floor_areas' => $data['floor_areas'],
            ':price_ranges' => $data['price_ranges'],
            ':property_classes' => $data['property_classes'],
        ]);
    }

    // Delete a property
    public function deleteProperty($property_id) {
        $query = "DELETE FROM property WHERE property_id = :property_id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([':property_id' => $property_id]);
    }
}
?>

Class Admin{
    private $conn;
    private $tbl_name = "Properties";

    public $category;
    public $location;
    public $lot_area;
    public $floor_area;
    public $price_ranges;
    public $property_classes;
    public $con = $conn;

//create
public function create() {
    $query = "INSERT INTO " . $this->tbl_name . " (category,location,lot_area,floor_area,price_ranges,property_classes) VALUES (:name, :email)";
    $pfields = $this->conn->prepare($query);

    $pfields->bindParam(':Category', $this->category);
    $pfields->bindParam(':Location', $this->location);
    $pfields->bindParam(':Lot Area', $this->lot_area);
    $pfields->bindParam(':Floor Area', $this->floor_area);
    $pfields->bindParam(':Price Ranges', $this->price_ranges);
    $pfields->bindParam(':Property Classes', $this->property_classes);

    if ($pfields->execute()) {
        return true;
    }

    return false;
}

//update




//delete

}

Class User{
    //read
public $con = $conn;
public $tble_name = $tbl_name;

    public function read(){
        $query = "SELECT * FROM " .$this->tble_name;
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        return $stmt;
    }


}
?>

