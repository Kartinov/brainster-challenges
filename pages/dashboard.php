<?php

require_once __DIR__ . "/../autoload.php";

usersOnly();

$title = "Dashboard";
$style_path = "../assets/css/main.css";

require_once __DIR__ . '/../partials/header.php';
?>

<main id="dashboard" class="flex flex-column justify-content-center align-items-center cover">
    <h1 class="fade-scale"><?= "Welcome " . $_SESSION['user']; ?></h1>
    <a href="../logout.php" class="btn btn-dark fade-scale">Logout</a>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>