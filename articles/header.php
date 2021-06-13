<?php
//  PHP'de sonradan dahil ettiğimiz (özellikle görsel yani HTML kodlar barındıran) dosyalarda, dışarıdan da atanabilecek ancak atanmamışsa varsayılan bir değerle çalışmasını istediğimiz işlemler için, ilgili görsel parçasının içinde isset fonksiyonu ile o değişkenin atanıp atanmadığına bakabilir, atanmadıysa varsayılan bir değer atayabiliriz
if (!isset($documentTitle)) $documentTitle = "Articles";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php
    $baseFontSize = 16;
    if (isset($_COOKIE['base-font-size'])) $baseFontSize = $_COOKIE['base-font-size'];
    ?>
    <style>
        :root {
            font-size: <?= $baseFontSize ?>px;
        }
    </style>
    <title><?= $documentTitle; ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Articles</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="random.php">Random Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="newarticle.php">Create New Article</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="setFontSize.php?dir=up" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-up-circle-fill"></i>
                        </a>
                        <a href="setFontSize.php?dir=down" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-down-circle-fill"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>