<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
CREATE TABLE `liens` (
  `id_liens` int(11) NOT NULL,
  `nom_liens` varchar(255) NOT NULL,
  `url_liens` varchar(1000) NOT NULL,
  `description_liens` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


    ?>
</body>
</html>