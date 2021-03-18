        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Пользователи</h4>
                    <p class="card-description">

                    </p>
                    <div class="table-responsive">
                        <button type="button" class="btn btn-primary" style="float: right;" onclick="window.location.href='/admin/?page=tariff-add';">Создать</button>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Изображение
                                </th>
                                <th>
                                    Название
                                </th>
                                <th>
                                    Количество пользователей
                                </th>
                                <th>
                                    Количество каналов
                                </th>
                                <th>
                                    Цена
                                </th>
                                <th>
                                    Дата создания
                                </th>
                                <th>
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ( $db->query('SELECT * FROM tariffs') as $cur_tarrif ) {
                            ?>
                                <tr>
                                    <td class="py-1">
                                        <?php
                                        $img_path = null;

                                        if (is_null($cur_tarrif['image']) || $cur_tarrif['image'] === "") {
                                            $img_path = "/media/avatars/default.png";
                                        } else {
                                            $img_path = $cur_tarrif['image'];
                                        }
                                        echo '<img src="';
                                        echo $img_path;
                                        echo '" alt="image"/>';
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_name = $cur_tarrif["name"];
                                        echo $cur_name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_tariff_id = $cur_tarrif["id"];
                                        $res = $db->query("SELECT count(*) FROM bought_tarrifes WHERE tarrif_id='$cur_tariff_id' LIMIT 1");
                                        $row = $res->fetch_row();
                                        $count = $row[0];
                                        echo $count;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $cur_name = $cur_tarrif["channels_amount"];
                                        echo $cur_name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $price = $cur_tarrif["price"];
                                        echo $price;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $php_date = strtotime($cur_tarrif["creation_date"]);
                                        $today = date('d.m.Y', $php_date);
                                        echo $today;
                                        ?>
                                    </td>
                                    <td>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_tarrif["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="edit-tariff" value="редактировать" class="btn btn-success">
                                        </form>
                                        <p></p>
                                        <form method="post" action="/vendor/server.php">
                                            <?php $cur_id = $cur_tarrif["id"] ?>
                                            <input type="hidden" value="<?php echo $cur_id ?>" name="id">
                                            <input type="submit" name="delete-tariff" value="удалить" class="btn btn-danger">
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