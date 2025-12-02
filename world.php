<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'] ?? '';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {

  echo "<table>";

  echo "<tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence Year</th>
    <th>Head of State</th>
  </tr>";

  foreach ($results as $row) {
    echo "<tr>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['continent']}</td>";
    echo "<td>{$row['independence_year']}</td>";
    echo "<td>{$row['head_of_state']}</td>";
    echo "</tr>";
  }

  echo "</table>";
}
