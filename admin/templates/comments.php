        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Пользователи</h4>
                    <p class="card-description">

                    </p>
                    <div class="table-responsive">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Новость
                                </th>
                                <th>
                                    Комментатор
                                </th>
                                <th>
                                    Комментарий
                                </th>
                                <th>
                                    Дата
                                </th>
                                <th>
                                    Действие
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ( $db->query('SELECT * FROM post_comments') as $cur_comment) {
                            ?>
                                <tr>
                                    <td class="py-1">
                                        <?php
                                        $cur_comment_post_id = $cur_comment["post_id"];
                                        $post_check_query = "SELECT * FROM news WHERE id='$cur_comment_post_id' LIMIT 1";
                                        $result = mysqli_query($db, $post_check_query);
                                        $cur_post = mysqli_fetch_assoc($result);
                                        $cur_post_header = $cur_post['header'];
                                        echo $cur_post_header;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_post_user_id = $cur_comment["user_id"];
                                        $user_check_query = "SELECT * FROM users WHERE id='$cur_post_user_id' LIMIT 1";
                                        $result = mysqli_query($db, $user_check_query);
                                        $cur_user = mysqli_fetch_assoc($result);
                                        $cur_user_username = $cur_user['username'];
                                        echo $cur_user_username;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $cur_comment['comment_text'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $php_date = strtotime($cur_comment["date"]);
                                        $today = date('d.m.Y', $php_date);
                                        echo $today;
                                        ?>
                                    </td>
                                    <td>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_comment["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="delete-comment" value="удалить" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>