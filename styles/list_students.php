<?php
$host = 'localhost';
$db   = 'taus_data';
$user = 'root';      // adjust to your AMPPS MySQL user
$pass = 'mysql';     // adjust password if changed
$dsn  = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
  $pdo = new PDO($dsn, $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
  ]);

  $stmt = $pdo->query('SELECT * FROM vw_student_classes ORDER BY studentID');
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("DB error: " . $e->getMessage());
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Students & Classes</title></head>
<body>
  <h1>Students & Classes</h1>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>Student</th><th>Email</th><th>Class</th><th>Location</th></tr>
    <?php foreach($rows as $r): ?>
      <tr>
        <td><?php echo htmlspecialchars($r['firstName'] . ' ' . $r['lastName']); ?></td>
        <td><?php echo htmlspecialchars($r['email']); ?></td>
        <td><?php echo htmlspecialchars($r['className']); ?></td>
        <td><?php echo htmlspecialchars($r['location']); ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
