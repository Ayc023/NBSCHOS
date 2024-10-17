<?php
$host = 'localhost';  
$db = 'medical';      
$user = 'root';      
$pass = '';           

try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $pdo->query("SELECT form_id, form_date FROM medical_form");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["data" => $data]);

} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
