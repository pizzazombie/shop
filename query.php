// ПОЭЛЕМЕНТНОЕ ИЗВЛЕЧЕНИЕ РЕЗУЛЬТАТОВ БД
<?php // query.php
require_once 'login.php';
$conn = new mysqli ($hm, $un, $pw, $db );
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM catalogs";
$result = $conn->query($query);

if (!$result) die ($conn->error);

$rows = $result->num_rows;
echo '<br>';
for ($j = 0 ; $j < $rows ; ++$j)
{
$result->data_seek($j);
    echo 'id: '          . $result->fetch_assoc()['id']. '<br>';
$result->data_seek($j);
    echo 'Name: '        . $result->fetch_assoc()['name'] . '<br>';
$result->data_seek($j);
    echo 'Description: ' . $result->fetch_assoc()['description'] . '<br>';

}
$result->close();
$conn->close();
?>