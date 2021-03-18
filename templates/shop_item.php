<?php

$user_check_query = "SELECT * FROM tariffs WHERE id='$id' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$tariff = mysqli_fetch_assoc($result);

?>

<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3><?php echo $tariff["name"] ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<div class="job_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            <div class="thumb">
                                <img src="<?php echo $tariff["image"] ?>" style="width: 50px; height: 50px;" alt="">
                            </div>
                            <div class="jobs_conetent">
                                <a href="#"><h4><?php echo $tariff["name"] ?></h4></a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i> Нижний Новгород</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Описание:</h4>
                        <p><?php echo $tariff["description"] ?></p>
                    </div>
                </div>
                <div class="apply_job_form white-bg">
                    <h4>Приобрести тариф</h4>
                    <form action="/vendor/server.php" method="post">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="submit_btn">
                                    <input type="hidden" value="<?php echo $tariff["id"] ?>" name="id">
                                    <input type="hidden" value="<?php echo $cur_user["id"] ?>" name="user_id">
                                    <?php
                                    $is_bought = True;
                                    if ($is_logged === True) {
                                        $is_bought = False;
                                        $cur_user_id = $cur_user["id"];
                                        $cur_tariff_id = $tariff["id"];
                                        $tariff_check_query = "SELECT * FROM bought_tarrifes WHERE user_id='$cur_user_id' AND tarrif_id='$cur_tariff_id' LIMIT 1";
                                        $result = mysqli_query($db, $tariff_check_query);
                                        $cur_bought_tariff = mysqli_fetch_assoc($result);
                                        if ($cur_bought_tariff) { // if user exists
                                            $is_bought = True;
                                        }
                                    }
                                    ?>

                                    <?php if($is_bought==True){?>
                                        <button class="boxed-btn3 w-100" type="submit" name="buy-tariff" disabled>Уже приобретен!</button>
                                    <?php } else {?>
                                        <button class="boxed-btn3 w-100" type="submit" name="buy-tariff">Приобрести!</button>
                                    <?php }?>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Итого:</h3>
                    </div>
                    <div class="job_content">
                        <ul>
                            <li>Дата появления: <span>
                                    <?php
                                    $php_date = strtotime($tariff["creation_date"]);
                                    $today = date('d.m.Y', $php_date);
                                    echo $today;
                                    ?>
                                </span></li>
                            <li>Стоимость: <span><?php echo $tariff["price"] ?> рублей</span></li>
                            <li>Город: <span>Нижний Новгород</span></li>
                        </ul>
                    </div>
                </div>
                <div class="share_wrap d-flex">
                    <span>Share at:</span>
                    <ul>
                        <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                    </ul>
                </div>
                <div class="job_location_wrap">
                    <div class="job_lok_inner">
                        <div id="map" style="height: 200px;"></div>
                        <script>
                            function initMap() {
                                var uluru = {lat: -25.363, lng: 131.044};
                                var grayStyles = [
                                    {
                                        featureType: "all",
                                        stylers: [
                                            { saturation: -90 },
                                            { lightness: 50 }
                                        ]
                                    },
                                    {elementType: 'labels.text.fill', stylers: [{color: '#ccdee9'}]}
                                ];
                                var map = new google.maps.Map(document.getElementById('map'), {
                                    center: {lat: -31.197, lng: 150.744},
                                    zoom: 9,
                                    styles: grayStyles,
                                    scrollwheel:  false
                                });
                            }

                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap"></script>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>