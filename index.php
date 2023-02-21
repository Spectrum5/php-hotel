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

    $parkingFilter = null;
    if (isset($_GET['parking'])) {
        $parkingFilter = $_GET['parking'];
    }

    $voteFilter = null;
    if (isset($_GET['vote'])) {
        $voteFilter = $_GET['vote'];
    }

    $filteredHotels = [];
    foreach ($hotels as $hotel) {
        if (
            $parkingFilter == ''
            ||
            (
                $parkingFilter == '1'
                &&
                $hotel['parking'] == true
            )
            ||
            (
                $parkingFilter == '0'
                &&
                $hotel['parking'] == false
            )
        ) {
            if (
                $voteFilter == ''
                ||
                $hotel['vote'] >= $voteFilter
            )

                $filteredHotels[] = $hotel;
        }
    }

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>PHP Hotel</title>

</head>

<body>

    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form action="" method="GET">
                        <label for="parking">Parcheggio</label>
                        <select name="parking" id="parking" class="form-select">
                            <option value="">Tutti</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        <label for="vote">Voto</label>

                        <input type="number" name="vote" id="vote" min="1" max="5">

                        <button type="submit">
                            Filtra
                        </button>
                    </form>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Parking</th>
                                <th scope="col">Vote</th>
                                <th scope="col">Distance to center</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($filteredHotels as $key => $hotel) { ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo ($key + 1) ?>
                                    </th>
                                    <td>
                                        <?php echo $hotel['name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel['description'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($hotel['parking'] ? 'Sì' : 'No'); ?>
                                    </td>
                                    <td>
                                        <?php echo $hotel['vote'] ?> &#128970;
                                    </td>
                                    <td>
                                        A <?php echo $hotel['distance_to_center'] ?> Km dal centro
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </main>

</body>

</html>