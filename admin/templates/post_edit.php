<?php
$user_check_query = "SELECT * FROM news WHERE id='$id' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$post = mysqli_fetch_assoc($result);
?>
<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Изменить новость </h4>
            <p class="card-description">
                Создание новой новости
            </p>
            <form class="forms-sample" enctype="multipart/form-data" method="post" action="/vendor/server.php">

                <div class="form-group">
                    <label for="exampleInputUsername1">Заголовок</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Заголовок" name="header" value="<?php echo $post['header'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение</label>
                    <input type="file" class="form-control" id="imageUpload1" placeholder="изображение" name="image">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Текст новости</label>
                    <textarea class="form-control" id="exampleInputDescription1" placeholder="Текст новости" name="post_text"><?php echo $post['post_text'] ?></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Краткий текст новости</label>
                    <textarea class="form-control" id="exampleInputDescription1" placeholder="Краткий текст новости" name="short_post"><?php echo $post['short_post'] ?></textarea>
                </div>
                <input type="hidden" name="id" value="<?php echo $post["id"]?>">
                <button type="submit" class="btn btn-primary mr-2" name="edit_post_action">Изменить</button>
                <a class="btn btn-light" href="/admin/?page=posts">Отмена</a>
            </form>
        </div>
    </div>
</div>