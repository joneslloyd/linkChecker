<html>

<head>
    <title>Link Checker</title>
</head>

<body>

    <?php

$url = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = test_input($_POST["url"]);
}

function test_input($data)
{
    $html = file_get_contents($url);

    $doc = new DOMDocument();
    $doc->loadHTML($html);

    $xpath = new DOMXpath($doc);

    $nodes = $xpath->query('//a');
    
    if (!$nodes) {
        return false;
    }

    $hrefs = [];
    foreach ($nodes as $node) {
        $hrefs[] = $node->getAttribute('href');
    }

    return print_r( '<pre>'.print_r($hrefs, true).'</pre>', true );
}



?>

    <h2>PHP Form Validation Example</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"]);?>">
        URL: <input type="text" name="url">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
echo "<h2>Your Input:</h2>";
echo $url;
?>
</body>

</html>
