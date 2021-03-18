        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Пользователи</h4>
                    <p class="card-description">

                    </p>
                    <div class="table-responsive">
                        <button type="button" class="btn btn-primary" style="float: right;" onclick="window.location.href='/admin/?page=post-add';">Создать</button>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Заголовок
                                </th>
                                <th>
                                    Дата создания
                                </th>
                                <th>
                                    Количество комментариев
                                </th>
                                <th>
                                    Создатель
                                </th>
                                <th>
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ( $db->query('SELECT * FROM news') as $cur_post ) {
                            ?>
                                <tr>
                                    <td class="py-1">
                                        <?php
                                        echo $cur_post["header"]
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $php_date = strtotime($cur_post["date"]);
                                        $today = date('d.m.Y', $php_date);
                                        echo $today;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_post_id = $cur_post["id"];
                                        $res = $db->query("SELECT count(*) FROM post_comments WHERE post_id='$cur_post_id' LIMIT 1");
                                        $row = $res->fetch_row();
                                        $count = $row[0];
                                        echo $count;
                                        ?>
                                    </td>
                                    <td>
                                        <?php

                                        $cur_post_user_id = $cur_post["creator"];
                                        $user_check_query = "SELECT * FROM users WHERE id='$cur_post_user_id' LIMIT 1";
                                        $result = mysqli_query($db, $user_check_query);
                                        $cur_user = mysqli_fetch_assoc($result);
                                        $cur_user_username = $cur_user['username'];
                                        echo $cur_user_username;
                                        ?>
                                    </td>
                                    <td>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_post["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="edit-post" value="редактировать" class="btn btn-success">
                                        </form>
                                        <p></p>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_post["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="delete-post" value="удалить" class="btn btn-danger">
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