<?php

// Include config file
require_once "config/config.php";

$sql = "SELECT * FROM users WHERE username = 'test'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rank = $row["rank"];
		if ($rank == "") {
			$rank = "user";
		}
		echo $rank;
    }
} else {
    echo "0 results";
}
?>