<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-hotel</title>
</head>
<body>

<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

?>


<?php

    $parking = isset($_GET['parcheggio']);
    $vote = (int) ($_GET['voto']) ?? 0;

    $hotels_filtered = [];

    foreach ( $hotels as $hotel ) {

        if ( $parking && !$hotel['parking'] ) {

            continue;

        }

        if ( $hotel['vote'] < $vote ) {

            continue;

        }

         $hotels_filtered[] = $hotel;

    }

?>

<form method="GET">
    <div>
        <label>Parcheggio</label>
        <input name="parcheggio" type="checkbox" value="true" <?php if ($parking) echo 'checked'; ?>>
    </div>
    <div>
        <label>Voto</label>
        <input name="voto" type="number" min="0" max="5" step="1" value="<?php echo $vote; ?>">
    </div>
    <button type="submit">Filtra</button>
    <a href="./">Reset</a>
</form>
    
<?php foreach ( $hotels_filtered as $hotel ) : ?>

    <ul>
        <?php foreach ( $hotel as $key => $value ) : ?>
            <li><?php echo $key . " " . ($key == "parking" ? ($value ? "Si" : "No") : $value); ?></li>
        <?php endforeach; ?>
    </ul>

<?php endforeach; ?>


</body>
</html>