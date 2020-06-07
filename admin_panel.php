<?php
    require_once 'login.php';
    $conn = new mysqli($hm, $un, $db, $pw);
    if ($conn->connect_error) die($conn->connect_error);

    if (isset($_POST['delete']) && isset($_POST['name'])) {
        $name = get_post($conn. 'name');
        $query = "DELETE FROM products WHERE name='$name'";
        $result = $conn->query($query);
        if (!$result) echo "Something went wrong: $query<br>". $conn->error."<br><br>"; 
    }

    if (isset($_POST['name']) &&
        isset($_POST['description']) &&
        isset($_POST['size']) &&
        isset($_POST['color']) &&
        isset($_POST['price']) &&
        isset($_POST['path_to_image'])) {
            $name = get_post($conn.'name');
            $description = get_post($conn.'description');
            $size = get_post($conn.'size');
            $color = get_post($conn.'color');
            $price = get_post($conn.'price');
            $path_to_image = get_post($conn.'path_to_image');

            $query = "INSERT INTO products VALUES".
            "('$name', '$description', '$size', '$color', '$price', '$path_to_image')";
            $result = $conn->query($query);
            if (!$result) echo "Something went wrong: $query<br>".
                $conn->error ."<br><br>";
    }

    echo <<<_END
    <form action="admin_panel.php" method="post"><pre>
    Name <input type="text" name="name">
    Description <input type="text" name="description">
    Size <input type="text" name="size">
    Color <input type="text" name="color">
    Price <input type="text" name="price">
    path_to_img <input type="text" name="path_to_img">
            <input type="submit" value="ADD PRODUCT">
    
    </pre></form>
    _END;

    $query = "SELECT * FROM products";

    $result = $conn->query($query);

    if (!$result) die ("Cannot to connect to database: " . $conn->error);

    $rows = $result->num_rows;

    for ($j = 0; $j < $rows; ++$j) {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQL_NUM); //ALARM MAYBE ZERO DOWN

        echo <<<_END
        <pre>
        ID $row[0]
        Name $row[1]
        Description $row[2]
        Size $row[3]
        Color $row[4]
        Price $row[5]
        path_to_img $row[6]
        </pre>
        <form action="admin_panel.php method="post">
        <input type="hidden" name="delete" value="yes">
        <input type="hidden" name="name" value="$row[1]">
        <input type="submit" value="DELETE PRODUCT"></form>

        _END;
    }

    $result->close();
    $conn->close();

    function get_post($conn, $var) {
        return $conn->real_escape_string($_POST[$var]);
    }

?>
