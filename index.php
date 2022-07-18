<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP CRUD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php require_once "process.php"; ?>
    <div class="container">
        <!--get data from database -->
        <?php
    $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
    ?>
        <!-- show data in page -->
        <div class="row justify-conent-centr">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Loction</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php

    while ($row =$result->fetch_assoc()): ?>
                <tr>
                    <td><?= ($row['name']) ?></td>
                    <td><?= ($row['location']) ?></td>
                    <td></td>
                </tr>

                <?php endwhile; ?>
            </table>
        </div>


        <?php
    function pre_r($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    ?>

        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Enter your location">
                </div>
                <div class="form-group">
                    <button type="submit" name="save" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>