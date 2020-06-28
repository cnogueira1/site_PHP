<?php
$mysqli = new mysqli('localhost', 'cnogueira','07101997@Julio', 'Devs');

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query = "SELECT * FROM usuario_login";
$result = $mysqli->query($query);

while($row = $result->fetch_array())
{
$rows[] = $row;
}


echo "<div class='user-exibe'>";

foreach($rows as $row)
{
    echo "<div class='pessoa'>";
    echo "  <p> {$row['nome_completo']}</p>";
    echo "<p> {$row['cargo']}</p>";
    echo"   <div class='container-image'>";
    echo "  <img src='./../complementos/img/user/{$row['image']}' />";
    echo "  </div>"; 
    echo "<p> {$row['email']}</p>";
    echo "</div>";
}

echo '</div>';
/* free result set */
$result->close();

/* close connection */
$mysqli->close();
?>

