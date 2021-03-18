<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider  d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="slider_text">
                        <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">Более 10000 клиентов</h5>
                        <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Откройте для себя телефизор с другой стороны</h3>
                        <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">Мы проводим телевидиние в день обращения. У нас приветливые мастера и отзывчивые менеджеры</p>
                        <div class="sldier_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
                            <a href="/?page=shop" class="boxed-btn3">Хочу!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
        <img src="../img/banner/illustration.png" alt="">
    </div>
</div>
<p style="margin-top: 20px;"></p>

<!-- job_listing_area_start  -->
<div class="job_listing_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section_title">
                    <h3>Подборка тарифов</h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="brouse_job text-right">
                    <a href="/?page=shop" class="boxed-btn4">Смотреть все</a>
                </div>
            </div>
        </div>
        <div class="job_lists">
            <div class="row">
                <?php
                foreach ( $db->query('SELECT * FROM tariffs order by creation_date limit 10') as $cur_tariff ) {
                ?>
                <div class="col-lg-12 col-md-12">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="jobs_conetent">
                                <a href="/?page=shop-unit&id=<?php echo $cur_tariff['id'] ?>"><h4><?php echo $cur_tariff['name'] ?></h4></a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i> Нижний Новгрод</p>
                                    </div>
                                    <div class="location">
                                        <p> <i class="fa fa-clock-o"></i> Сразу после вашего звонка</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                <a href="/?page=shop-unit&id=<?php echo $cur_tariff['id'] ?>" class="boxed-btn3">Приобрести!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->
<!-- /testimonial_area  -->