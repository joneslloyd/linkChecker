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

function test_input($data) {
  return $data;
 $html = file_get_contents($url);

$doc = new DOMDocument();
$doc->loadHTML($html);

$xpath = new DOMXpath($doc);

$nodes = $xpath->query('//a');

foreach($nodes as $node) {
    var_dump($node->getAttribute('href'));
}
}

$html = file_get_contents($url);

$doc = new DOMDocument();
$doc->loadHTML($html);

$xpath = new DOMXpath($doc);

$nodes = $xpath->query('//a');

foreach($nodes as $node) {
    var_dump($node->getAttribute('href'));
}

?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  URL: <input type="text" name="url">
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $url;
?>
 </body>
</html>
