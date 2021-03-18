<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Новости</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->


<!--================Blog Area =================-->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <?php
                    foreach ( $db->query('SELECT * FROM news order by date') as $cur_post ) {
                    ?>
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="<?php echo $cur_post["image"]?>" alt="">
                            <a href="#" class="blog_item_date">
                                <h3>
                                    <?php
                                    $php_date = strtotime($cur_post["date"]);
                                    $today = date('d.m', $php_date);
                                    echo $today;
                                    ?>
                                </h3>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/?page=post&id=<?php echo $cur_post["id"] ?>">
                                <h2><?php echo $cur_post["header"]?></h2>
                            </a>
                            <p><?php echo $cur_post["short_post"]?></p>
                            <ul class="blog-info-link">

                                <li>
                                    <a href="#"><i class="fa fa-user"></i>
                                        <?php
                                        $cur_post_user_id = $cur_post["creator"];
                                        $cur_user_check_query = "SELECT * FROM users WHERE id='$cur_post_user_id' LIMIT 1";
                                        $result = mysqli_query($db, $cur_user_check_query);
                                        $cur_post_user = mysqli_fetch_assoc($result);
                                        echo $cur_post_user["username"]
                                        ?>
                                    </a>
                                </li>
                                <?php
                                $cur_post_id = $cur_post["id"];
                                $res = $db->query("SELECT count(*) FROM post_comments WHERE post_id='$cur_post_id' LIMIT 1");
                                $row = $res->fetch_row();
                                $count = $row[0];

                                ?>
                                <li><a href="#"><i class="fa fa-comments"></i> <?php echo $count; ?> Comments</a></li>
                            </ul>
                        </div>
                    </article>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                           onfocus="this.placeholder = ''"
                                           onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>