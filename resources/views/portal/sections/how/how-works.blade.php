<?php
    $title = [
        "Contrate e/ou seja contratado",
        "Escolha o melhor profissional",
        "Segurança"
    ];

    $img_how = [
        "images/contrate.jpg",
        "images/escolha.jpg",
        "images/seguranca.jpg"
    ];
?>

<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Vantagens MisServices</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="slider owl-carousel">
            <?php foreach(array_combine($title, $img_how) as $t => $i):  ?>
                <div class="slide">
                    <img src="<?php echo $i ?>" class="img-how" alt="">
                    <h1><?php echo $t ?></h1>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>