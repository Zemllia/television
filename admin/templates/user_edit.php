<?php
    $user_check_query = "SELECT * FROM users WHERE id='$id' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
?>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $user["username"]?></h4>
            <p class="card-description">
                Изменение пользователя <?php echo $user["username"]?>
            </p>
            <form class="forms-sample" method="post" action="/vendor/server.php">
                <div class="form-group">
                    <label for="exampleInputUsername1">Имя пользователя</label>
                    <input type="text" value="<?php echo $user["username"]?>" class="form-control" id="exampleInputUsername1" placeholder="имя пользователя" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email адрес</label>
                    <input type="email" value="<?php echo $user["email"]?>" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label><p></p>
                    <label for="exampleInputPassword1">Оставить пустым, если без изменений</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="пароль" name="password">

                </div>
                <input type="hidden" value="<?php echo $user["id"]?>" name="id">
                <button type="submit" class="btn btn-primary mr-2" name="edit_user">Сохранить</button>
                <button class="btn btn-light" onclick="window.location.href = '/admin/?page=users'">Отмена</button>
            </form>
        </div>
    </div>
</div>