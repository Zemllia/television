<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Новый тариф</h4>
            <p class="card-description">
                Создание нового тарифа
            </p>
            <form class="forms-sample" enctype="multipart/form-data" method="post" action="/vendor/server.php">

                <div class="form-group">
                    <label for="exampleInputUsername1">Название</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="название" name="name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Изображение</label>
                    <input type="file" class="form-control" id="imageUpload1" placeholder="изображение" name="image">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Описание</label>
                    <textarea class="form-control" id="exampleInputDescription1" placeholder="описание" name="description"></textarea>

                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Колчиство каналов</label>
                    <input type="number" class="form-control" id="exampleInputChannelsAmount1" placeholder="Количество каналов" name="channels_amount">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Цена Руб.</label>
                    <input type="number" class="form-control" id="descriptionPasword1" placeholder="цена" name="price">

                </div>

                <button type="submit" class="btn btn-primary mr-2" name="create_tariff">Создать</button>
                <a class="btn btn-light" href="/admin/?page=users">Отмена</a>
            </form>
        </div>
    </div>
</div>