<?php

// Static Content
$missionStatement = "Our mission is to provide high-quality products and exceptional customer service.";

// Team Information
$teamMembers = [
    "John Doe",
    "Jane Smith",
    "Michael Johnson",
    "Emily Davis"
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
</head>
<body>
    <h1>About Us</h1>
    <p><?php echo $missionStatement; ?></p>
    <h2>Our Team</h2>
    <ul>
        <?php foreach ($teamMembers as $member) { ?>
            <li><?php echo $member; ?></li>
        <?php } ?>
    </ul>
</body>
</html>
