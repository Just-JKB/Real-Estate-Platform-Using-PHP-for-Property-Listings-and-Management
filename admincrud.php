<?php
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