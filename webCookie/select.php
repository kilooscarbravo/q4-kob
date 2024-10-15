<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    if (empty($_COOKIE["lang"])) {
        setcookie("lang", $_GET["language"], time() + 100);
    }
    if (!isset($_COOKIE["lang"])) {
        setcookie("lang", $_GET["language"], time() + 100);
    } else {
        setcookie("lang", $_GET["language"], time() + 100);
    }

?>
</body>
</html>