<?php
$user_check_query = "SELECT * FROM tariffs WHERE id='$id' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$tariff = mysqli_fetch_assoc($result);
?>

<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Тариф <?php echo $tariff["name"]?></h4>
            <p class="card-description">
                Изменить тариф <?php echo $tariff["name"]?>
            </p>
            <form class="forms-sample" enctype="multipart/form-data" method="post" action="/vendor/server.php">

                <div class="form-group">
                    <label for="exampleInputUsername1">Название</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="название" name="name" value="<?php echo $tariff["name"]?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение <p>Оставить пустым, если не изменно</p></label>
                    <input type="file" class="form-control" id="imageUpload1" placeholder="изображение" name="image">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Описание</label>
                    <textarea class="form-control" id="exampleInputDescription1" placeholder="описание" name="description"><?php echo $tariff["description"]?></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Колчиство каналов</label>
                    <input type="number" class="form-control" id="exampleInputChannelsAmount1" placeholder="Количество каналов" name="channels_amount" value="<?php echo $tariff["channels_amount"]?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Цена Руб.</label>
                    <input type="number" class="form-control" id="descriptionPasword1" placeholder="цена" name="price" value="<?php echo $tariff["price"]?>">

                </div>
                <input type="hidden" name="id" value="<?php echo $tariff["id"]?>">
                <button type="submit" class="btn btn-primary mr-2" name="edit_tariff_action">Изменить</button>
                <a class="btn btn-light" href="/admin/?page=users">Отмена</a>
            </form>
        </div>
    </div>
</div>