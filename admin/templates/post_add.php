<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Новая новость</h4>
            <p class="card-description">
                Создание новой новости
            </p>
            <form class="forms-sample" enctype="multipart/form-data" method="post" action="/vendor/server.php">

                <div class="form-group">
                    <label for="exampleInputUsername1">Заголовок</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Заголовок" name="header">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение</label>
                    <input type="file" class="form-control" id="imageUpload1" placeholder="изображение" name="image">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Текст новости</label>
                    <textarea class="form-control" id="exampleInputDescription1" placeholder="Текст новости" name="post_text"></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Краткий текст новости</label>
                    <textarea class="form-control" id="exampleInputDescription1" placeholder="Краткий текст новости" name="short_post"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mr-2" name="create_post">Создать</button>
                <a class="btn btn-light" href="/admin/?page=posts">Отмена</a>
            </form>
        </div>
    </div>
</div>