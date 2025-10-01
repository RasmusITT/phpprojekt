<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-4">
  <div class="row">
    <?php
    if (($handle = fopen("data/flowers.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            [$nimi, $hind, $kirjeldus] = $data;
            echo '<div class="col-md-3 mb-4">';
            echo '<div class="card">';
            echo '<img src="pildid/'.strtolower($nimi).'.jpg" class="card-img-top" alt="'.$nimi.'">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">'.$nimi.'</h5>';
            echo '<p class="card-text">'.$kirjeldus.'</p>';
            echo '<p><b>'.$hind.' €</b></p>';
            echo '<a href="ostukorv.php?lisa='.$nimi.'" class="btn btn-primary">Lisa ostukorvi</a>';
            echo '</div></div></div>';
        }
        fclose($handle);
    }
    ?>
  </div>
</div>

  </body>