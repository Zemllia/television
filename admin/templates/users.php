        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Пользователи</h4>
                    <p class="card-description">

                    </p>
                    <div class="table-responsive">
                        <script>
                            void
                        </script>
                        <button type="button" class="btn btn-primary" style="float: right;" onclick="window.location.href='/admin/?page=user-add';">Создать</button>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Изображение
                                </th>
                                <th>
                                    Имя пользователя
                                </th>
                                <th>
                                    Количество тарифов
                                </th>
                                <th>
                                    Дата последнего входа
                                </th>
                                <th>
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $user_check_query = "SELECT * FROM users";
                                $result = mysqli_query($db, $user_check_query) or die ('Error: '.mysqli_error ($db));;
                                $users = mysqli_fetch_array($result);

                            foreach ( $db->query('SELECT * FROM users') as $cur_user ) {
                            ?>
                                <tr>
                                    <td class="py-1">
                                        <?php
                                        $img_path = null;

                                        if (is_null($cur_user['avatar']) || $cur_user['avatar'] === "") {
                                            $img_path = "/media/avatars/default.png";
                                        } else {
                                            $img_path = $cur_user['avatar'];
                                        }
                                        echo '<img src="';
                                        echo $img_path;
                                        echo '" alt="image"/>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_username = $cur_user["username"];
                                        echo $cur_username;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_user_id = $cur_user["id"];
                                        $res = $db->query("SELECT count(*) FROM bought_tarrifes WHERE user_id='$cur_user_id' LIMIT 1");
                                        $row = $res->fetch_row();
                                        $count = $row[0];
                                        echo $count;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $php_date = strtotime($cur_user["last_login_date"]);
                                        $today = date('d.m.Y', $php_date);
                                        echo $today;
                                        ?>
                                    </td>
                                    <td>
                                        <?php if(!($_SESSION['username'] === $cur_user["username"])){ ?>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_user["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="edit-user" value="редактировать" class="btn btn-success">
                                        </form>
                                        <p></p>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_user["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="delete-user" value="удалить" class="btn btn-danger">
                                        </form>
                                        <?php } ?>

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