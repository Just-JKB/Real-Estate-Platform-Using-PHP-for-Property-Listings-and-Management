<?php
require_once 'admincrud.php';

$propertyCRUD = new PropertyCRUD();
$action = $_GET['action'] ?? null;
$message = "";

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($action === 'create') {
        $data = $_POST;
        if ($propertyCRUD->createProperty($data)) {
            $message = "Property created successfully!";
            $showAlert = true;
            $alertTitle = "Success!";
            $alertText = "Property added successfully!";
            $alertIcon = "success";
        } else {
            $message = "Failed to create property.";
            $showAlert = true;
            $alertTitle = "Try Again!";
            $alertText = "Failed to create property.";
            $alertIcon = "error";
        }
    } elseif ($action === 'update') {
        $id = $_POST['id'];
        $data = $_POST;
        if ($propertyCRUD->updateProperty($id, $data)) {
            $message = "Property updated successfully!";
            $showAlert = true;
            $alertTitle = "Good job!";
            $alertText = "Property updated successfully!";
            $alertIcon = "success";
        } else {
            $message = "Failed to update property.";
            $showAlert = true;
            $alertTitle = "Oops!";
            $alertText = "Failed to update property.";
            $alertIcon = "error";
        }
    }
}

// Handle deletion
if ($action === 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    if ($propertyCRUD->deleteProperty($id)) {
        $message = "Property deleted successfully!";
        $showAlert = true;
        $alertTitle = "Deleted!";
        $alertText = "Your property has been deleted.";
        $alertIcon = "success";
    } else {
        $message = "Failed to delete property.";
        $showAlert = true;
        $alertTitle = "Oops!";
        $alertText = "Failed to delete property.";
        $alertIcon = "error";
    }
}

// Get all properties
$properties = $propertyCRUD->getProperties();

// Handle edit request
$editProperty = null;
if ($action === 'edit' && isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($properties as $property) {
        if ($property['property_id'] == $id) {
            $editProperty = $property;
            break;
        }
    }
}

// Define categories, locations, and property classes
$categories = ['Apartment', 'Building', 'Commercial Space', 'Condominium', 'House & Lot', 'Lot w/ Unfinished Structure', 'Lot with Structure', 'Others', 'Townhouse', 'Vacant Lot', 'Warehouse'];
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
$property_classes = ['1', '2', '3'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clavem</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <!-- Main content -->
    <div class="container mt-5">
        <br>
        <h1>Manage Properties</h1>
        <?php if ($message): ?>
            <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <!-- Add/Edit Property Form -->
        <h2><?= $editProperty ? "Edit Property" : "Post a New Property" ?></h2>
        <form method="POST" action="?action=<?= $editProperty ? 'update' : 'create' ?>">
            <?php if ($editProperty): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($editProperty['property_id']) ?>">
            <?php endif; ?>
            <div class="form-group">
                <label>Category</label>
                <select name="categories" class="form-control" <?= $editProperty ? 'disabled' : '' ?> required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category) ?>" <?= $editProperty && $editProperty['categories'] == $category ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Location</label>
                <select name="locations" class="form-control" <?= $editProperty ? 'disabled' : '' ?> required>
                    <option value="">Select Location</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?= htmlspecialchars($location) ?>" <?= $editProperty && $editProperty['locations'] == $location ? 'selected' : '' ?>>
                            <?= htmlspecialchars($location) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Lot Area</label>
                <input type="text" name="lot_areas" class="form-control" value="<?= $editProperty ? htmlspecialchars($editProperty['lot_areas']) : '' ?>" <?= $editProperty ? 'disabled' : '' ?> required>
            </div>
            <div class="form-group">
                <label>Floor Area</label>
                <input type="text" name="floor_areas" class="form-control" value="<?= $editProperty ? htmlspecialchars($editProperty['floor_areas']) : '' ?>" <?= $editProperty ? 'disabled' : '' ?> required>
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price_ranges" class="form-control" value="<?= $editProperty ? htmlspecialchars($editProperty['price_ranges']) : '' ?>"  required>
            </div>
            <div class="form-group">
                <label>Property Class</label>
                <select name="property_classes" class="form-control" required>
                    <option value="">Select Property Class</option>
                    <?php foreach ($property_classes as $property_class): ?>
                        <option value="<?= htmlspecialchars($property_class) ?>" <?= $editProperty && $editProperty['property_classes'] == $property_class ? 'selected' : '' ?>>
                            <?= htmlspecialchars($property_class) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success"><?= $editProperty ? "Update Property" : "Post Property" ?></button>
            <?php if ($editProperty): ?>
                <a href="manage_properties.php" class="btn btn-secondary">Cancel</a>
            <?php endif; ?>
        </form>

        <!-- List Properties -->
        <h2 class="mt-5">Properties</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Location</th>
                    <th>Lot Area</th>
                    <th>Floor Area</th>
                    <th>Price</th>
                    <th>Classification</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($properties as $property): ?>
                    <tr>
                        <td><?= htmlspecialchars($property['property_id']) ?></td>
                        <td><?= htmlspecialchars($property['categories']) ?></td>
                        <td><?= htmlspecialchars($property['locations']) ?></td>
                        <td><?= htmlspecialchars($property['lot_areas']) ?></td>
                        <td><?= htmlspecialchars($property['floor_areas']) ?></td>
                        <td><?= number_format($property['price_ranges'], 2) ?></td>
                        <td><?= htmlspecialchars($property['property_classes']) ?></td>
                        <td>
                            <a href="?action=edit&id=<?= $property['property_id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $property['property_id'] ?>)">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmDelete(propertyId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "?action=delete&id=" + propertyId;
                }
            });
        }
    </script>

    <?php if (isset($showAlert) && $showAlert): ?>
        <script>
            Swal.fire({
                title: "<?= $alertTitle ?>",
                text: "<?= $alertText ?>",
                icon: "<?= $alertIcon ?>"
            });
        </script>
    <?php endif; ?>
</body>
</html>
