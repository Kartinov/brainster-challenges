<?php

require_once __DIR__ . '/../autoload.php';

if (!isset($_GET['id'])) {
    redirectTo(route('home'));
}

$companyId = $_GET['id'];

require_once __DIR__ . '/../database/connection.php';

// Check if ID exists
$q = "SELECT `id` FROM `companies` WHERE `id` = :companyId";
$stmt = $conn->prepare($q);

$stmt->execute(['companyId' => $companyId]);

if (!$stmt->rowCount()) {
    redirectTo(route('home'));
}

/**
 * Website content
 */
$q = "SELECT 
          `companies`.`id`,  
          `companies`.`company_name`,
          `companies`.`phone`,
          `providing_types`.`type`,
          `locations`.`country`,
          `locations`.`city`,
          `locations`.`address`,
          `social_links`.`facebook`,
          `social_links`.`twitter`,
          `social_links`.`linkedin`,
          `social_links`.`instagram`,
          `content`.`cover_image`,
          `content`.`main_title`,
          `content`.`main_subtitle`,
          `content`.`main_description`,
          `content`.`contact_description`,
          `content`.`id` as `content_id`
      FROM
          `companies`
              JOIN
          `providing_types` ON `companies`.`providing_type_id` = `providing_types`.`id`
              JOIN
          `locations` ON `companies`.`id` = `locations`.`company_id`
      		JOIN
      	`social_links` ON `companies`.`id` = `social_links`.`company_id`
      		JOIN
      	`content` ON `companies`.`id` = `content`.`company_id`
      WHERE
          `companies`.`id` = $companyId";

$stmt = $conn->query($q);
$companyContent = $stmt->fetch();

/**
 * Website cards
 */
$q = "SELECT 
          *
      FROM
          `cards`
      WHERE
          `content_id` = {$companyContent['content_id']}";

$stmt  = $conn->query($q);
$cards = $stmt->fetchAll();

require_once __DIR__ . "/../partials/header.php"; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="<?= route('company', $companyId) ?>"><?= $companyContent['company_name'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul id="main-nav" class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#<?= $companyContent['type'] ?>"><?= $companyContent['type'] ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid bg-image text-center text-white hero-banner py-4 position-relative" style="background-image: url(<?= $companyContent['cover_image'] ?>);">
    <div class="row h-100">
        <div class="dark-overlay position-absolute zindex-modal"></div>
        <h1 class="col-6 offset-3 position-relative zindex-popover"><?= $companyContent['main_title'] ?></h1>
        <h2 class="col-6 offset-3 position-relative zindex-popover"><?= $companyContent['main_subtitle'] ?></h2>
    </div>
</div>

<div class="container">
    <!-- About Us -->
    <section id="about" class="row justify-content-center text-center">
        <div class="col-md-6 py-3">
            <h2>About Us</h2>
            <p><?= $companyContent['main_description'] ?></p>
            <hr>
            <span class="d-block">Tel: <?= $companyContent['phone'] ?></span>
            <span class="d-block">Location: <?= "{$companyContent['address']}, {$companyContent['city']}, {$companyContent['country']}" ?></span>
        </div>
    </section>

    <!-- Services/Products -->
    <section id="<?= $companyContent['type'] ?>">
        <h2 class="text-capitalize"><?= $companyContent['type'] ?></h2>
        <div class="card-columns">


            <?php foreach ($cards as $card) : ?>

                <div class="card">
                    <a href="#">
                        <img class="card-img-top" src="<?= $card['card_image'] ?>" alt="Card image">
                        <div class="card-body bg-dark text-white">
                            <h5 class="card-title"><?= $card['card_title'] ?></h5>
                            <p class="card-text">
                                <?= $card['card_description'] ?>
                            </p>
                            <p class="card-text"><small>Last updated <?= time_since(time() - strtotime($cards[0]['updated_at'])) ?> ago</small></p>
                        </div>
                    </a>
                </div>

            <?php endforeach ?>

        </div>
    </section>
    <hr>

    <!-- Contact Section -->
    <section id="contact" class="py-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact</h2>
                <p><?= $companyContent['contact_description'] ?></p>
            </div>
            <div class="col-md-6">

                <!-- This form doesn't do anything -->
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="4" placeholder="Send us a message"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-info">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<footer class="text-center py-3 bg-dark text-white">
    <p>Copyright by <?= $companyContent['company_name'] ?> @ Brainster</p>
    <div class="socials d-flex justify-content-center">
        <a href="<?= $companyContent['linkedin'] ?>" class="social-link" target="_blank">Linkedin</a>
        <a href="<?= $companyContent['facebook'] ?>" class="social-link" target="_blank">Facebook</a>
        <a href="<?= $companyContent['twitter'] ?>" class="social-link" target="_blank">Twitter</a>
        <a href="<?= $companyContent['instagram'] ?>" class="social-link" target="_blank">Instagram</a>
    </div>
</footer>

<?php require_once __DIR__ . '/../partials/footer.php' ?>