<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Новый пользователь</h4>
            <p class="card-description">
                Создание нового пользователя
            </p>
            <form class="forms-sample" method="post" action="/vendor/server.php">
                <div class="form-group">
                    <label for="exampleInputUsername1">Имя пользователя</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="имя пользователя" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email адрес</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="пароль" name="password_1">

                </div>
                <button type="submit" class="btn btn-primary mr-2" name="create_user">Создать</button>
                <a class="btn btn-light" href="/admin/?page=users">Отмена</a>
            </form>
        </div>
    </div>
</div>