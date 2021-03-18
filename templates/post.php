<?php
$post_query = "SELECT * FROM news WHERE id='$id' LIMIT 1";
$result = mysqli_query($db, $post_query);
$cur_post = mysqli_fetch_assoc($result);

?>
<!-- bradcam_area  -->
<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3><?php echo $cur_post["header"] ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area  -->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="<?php echo $cur_post["image"] ?>" alt="">
                    </div>
                    <div class="blog_details">
                        <h2>
                            <?php echo $cur_post["header"] ?>
                        </h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-user"></i>
                                    <?php
                                    $cur_post_user_id = $cur_post["creator"];
                                    $cur_user_check_query = "SELECT * FROM users WHERE id='$cur_post_user_id' LIMIT 1";
                                    $result = mysqli_query($db, $cur_user_check_query);
                                    $cur_post_user = mysqli_fetch_assoc($result);
                                    echo $cur_post_user["username"]
                                    ?>
                                </a></li>
                            <li><a href="#"><i class="fa fa-comments"></i> <?php
                                    $cur_post_id = $cur_post["id"];
                                    $res = $db->query("SELECT count(*) FROM post_comments WHERE post_id='$cur_post_id' LIMIT 1");
                                    $row = $res->fetch_row();
                                    $count = $row[0];
                                    echo $count;
                                    ?> комментариев</a></li>
                        </ul>
                        <p class="excert">
                            <?php echo $cur_post["post_text"] ?>
                        </p>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">

                        <div class="col-sm-4 text-center my-2 my-sm-0">
                            <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                        </div>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="media align-items-center">
                        <?php
                        $cur_post_user_id = $cur_post["creator"];
                        $cur_user_check_query = "SELECT * FROM users WHERE id='$cur_post_user_id' LIMIT 1";
                        $result = mysqli_query($db, $cur_user_check_query);
                        $cur_post_user = mysqli_fetch_assoc($result);
                        ?>
                        <img src="<?php echo $cur_post_user["avatar"] ?>" alt="">
                        <div class="media-body">
                            <a href="#">
                                <h4><?php echo $cur_post_user["username"] ?></h4>
                            </a>
                            <p>Автор</p>
                        </div>
                    </div>
                </div>
                <div class="comments-area">

                    <?php
                    $cur_post_id = $cur_post["id"];
                    $res = $db->query("SELECT count(*) FROM post_comments WHERE post_id='$cur_post_id' LIMIT 1");
                    $row = $res->fetch_row();
                    $count = $row[0];
                    echo '<h4>';
                    echo $count;
                    echo' комментариев</h4>';
                    $cur_post_id = $cur_post["id"];
                    foreach ( $db->query("SELECT * FROM post_comments WHERE post_id='$cur_post_id' order by date") as $cur_comment ) {
                        $cur_comment_user_id = $cur_comment["user_id"];
                        $cur_user_check_query = "SELECT * FROM users WHERE id='$cur_comment_user_id' LIMIT 1";
                        $result = mysqli_query($db, $cur_user_check_query);
                        $cur_comment_user = mysqli_fetch_assoc($result);
                    ?>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="<?php echo $cur_comment_user["avatar"] ?>" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        <?php echo $cur_comment["comment_text"] ?>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#"><?php echo $cur_comment_user["username"] ?></a>
                                            </h5>
                                            <p class="date">
                                                <?php
                                                $php_date = strtotime($cur_comment["date"]);
                                                $today = date('d.m.Y', $php_date);
                                                echo $today;
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="comment-form">
                    <h4>Оставить комментарий</h4>
                    <form class="form-contact comment_form" action="/vendor/server.php" id="commentForm" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                              <textarea class="form-control w-100" name="comment_text" id="comment" cols="30" rows="9"
                                        placeholder="Текст комментария" required></textarea>
                                </div>
                            </div>
                        <input type="hidden" name="user_id" value="<?php echo $cur_user["id"] ?>">
                            <input type="hidden" name="post_id" value="<?php echo $cur_post["id"] ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="leave-comment" class="button button-contactForm btn_1 boxed-btn">Оставить комментарий</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword'
                                           onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
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
<!--================ Blog Area end =================-->