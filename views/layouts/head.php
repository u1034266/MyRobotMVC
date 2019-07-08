<!doctype html>
<head>
    <meta charset="utf-8">

    <title>My Robot</title>
    <link rel="icon" type="image/png" src="public/img/r2d2">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding-top: 5rem;
        }
        .viewContentContainer {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>

<main role="main" class="container">

    <div class="viewContentContainer">

        <?php
            echo $viewContent;
        ?>

    </div>

</main>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</body>
</html>