<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Более 100000 довольных клиентов!</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!-- job_listing_area_start  -->
<div class="job_listing_area plus_padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="recent_joblist_wrap">
                    <div class="recent_joblist white-bg ">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h4>Список тарифов</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_lists m-0">
                    <div class="row" >
                        <?php
                        foreach ( $db->query('SELECT * FROM tariffs order by creation_date') as $cur_tariff ) {
                        ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="single_jobs white-bg d-flex justify-content-between">
                                <div class="jobs_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="<?php echo $cur_tariff['image']?>" style="width: 48px; height: 48px;" alt="">
                                    </div>
                                    <div class="jobs_conetent">
                                        <a href="/?page=shop-unit&id=<?php echo $cur_tariff['id'] ?>"><h4><?php echo $cur_tariff['name']?></h4></a>
                                        <div class="links_locat d-flex align-items-center">
                                            <div class="location">
                                                <p> <i class="fa fa-map-marker"></i> Нижний Новгород</p>
                                            </div>
                                            <div class="location">
                                                <p> <i class="fa fa-clock-o"></i> Проведение сразу после покупки</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="jobs_right">
                                    <div class="apply_now">
                                        <a class="heart_mark" href="#"> <i class="fa fa-heart"></i> </a>
                                        <a href="/?page=shop-unit&id=<?php echo $cur_tariff['id'] ?>" class="boxed-btn3">Подробнее</a>
                                    </div>
                                    <div class="date">
                                        <p>
                                            <?php
                                            $php_date = strtotime($cur_tariff["creation_date"]);
                                            $today = date('d.m.Y', $php_date);
                                            echo $today;
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- job_listing_area_end  -->