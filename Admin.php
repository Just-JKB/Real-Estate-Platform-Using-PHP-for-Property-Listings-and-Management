<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once 'DatabaseConnect.php';
        require_once 'AdminCRUD.php';

        $database = new Database();
        $db = $database->getConnection();

        $user = new User($db);
        $pfields = $user->read()



?>
    
</body>
</html>