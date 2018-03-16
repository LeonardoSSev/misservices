<section id="servicos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Serviços mais procurados</h2>
                <hr class="star-primary">
            </div>
        </div>
        <?php
            $imagens = [
                "images/eletricista.jpg",
                "images/manutencao.jpg",
                "images/limpeza.jpg",
                "images/pedreiro.jpg",
                "images/marceneiro.jpg",
                "images/pintor.jpg"
            ];

            foreach ($imagens as $i => $img):
                $i+= 1;
        ?>
            <?php if($i%3 == 1 && $i%3 != 0):  ?>
                <div class="row">
            <?php endif; ?>
                    <div class="col-sm-4 service-item">
                        <!-- <div class="caption">
                            <div class="caption-content">
                                <i></i>
                            </div>
                        </div> -->
                        <img src="<?php echo $img ?>" class="img-responsive" alt="" />
                    </div>
            <?php if($i%3 < 1): ?>
                </div> <!-- end row -->
            <?php endif;            
            endforeach;
        ?>
    </div>
</section>