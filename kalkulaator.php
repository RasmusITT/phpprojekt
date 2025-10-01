<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <form method="post">
  <input type="text" name="nimi" placeholder="Lille nimi" required><br>
  <input type="number" name="kogus" placeholder="Kogus" required><br>
  <label><input type="checkbox" name="vaas"> Lisa vaas (+7 €)</label><br>
  <button type="submit">Arvuta</button>
</form>

<?php
if ($_POST) {
    $nimi = $_POST['nimi'];
    $kogus = $_POST['kogus'];
    $hind = 0;

    if (($handle = fopen("data/flowers.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($data[0] == $nimi) {
                $hind = $data[1];
                break;
            }
        }
        fclose($handle);
    }

    $summa = $hind * $kogus;
    if (isset($_POST['vaas'])) $summa += 7;
    echo "<p>Kokku: $summa €</p>";

    file_put_contents("orders.txt", "$nimi x$kogus = $summa €\n", FILE_APPEND);
}
?>

  </body>