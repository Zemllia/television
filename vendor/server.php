<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('192.168.0.60', 'root', 'ghjujyland', 'kurs_project');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $today = date("Y-m-d");

        $query = "INSERT INTO users (username, email, password, last_login_date, avatar) 
  			  VALUES('$username', '$email', '$password', '$today', '/media/avatars/default.png')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

if (isset($_POST['create_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $today = date("Y-m-d");

        $query = "INSERT INTO users (username, email, password, last_login_date, avatar) 
  			  VALUES('$username', '$email', '$password', '$today', '/media/avatars/default.png')";
        mysqli_query($db, $query);
        header('location: /admin/');
    }
}


if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);



    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            $today = date("Y-m-d");
            $query = "UPDATE users SET last_login_date='$today' WHERE username='$username'";
            $retval = mysqli_query($db, $query);
            if(! $retval ) {
                die('Could not update data: ' . mysqli_error($db));
            }

            header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

if (isset($_POST['edit_user'])) {
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (! empty($username)) {

        $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        } else {
            $query = "UPDATE users SET username='$username' WHERE id='$id'";
            $retval = mysqli_query($db, $query);
            if(! $retval ) {
                die('Could not update data: ' . mysqli_error($db));
            }
        }
    }

    if (! empty($email)) {

        $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }

            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        } else {
            $query = "UPDATE users SET email='$email' WHERE id='$id'";
            $retval = mysqli_query($db, $query);
            if(! $retval ) {
                die('Could not update data: ' . mysqli_error($db));
            }
        }
    }

    if (! empty($password)) {
        $password = md5($password);
        $query = "UPDATE users SET password='$password' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }
    header('location: /admin/?page=users');
}

if (isset($_POST['create_tariff'])) {
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $channels_amount = mysqli_real_escape_string($db, $_POST['channels_amount']);
    $price = mysqli_real_escape_string($db, $_POST['price']);

    $target_file = NULL;


    $uploaddir = '/var/www/html/media/tariff_images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    echo $_FILES['image']['error'];
    echo '<pre>';
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $target_file = '/media/tariff_images/' . basename($_FILES['image']['name']);
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    echo 'Некоторая отладочная информация:';
    print_r($_FILES);

    print "</pre>";

    if (empty($name)) { array_push($errors, "name is required"); }
    if (empty($description)) { array_push($errors, "description is required"); }
    if (empty($channels_amount)) { array_push($errors, "channels amount is required"); }
    if (empty($price)) { array_push($errors, "price is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $tariff_check_query = "SELECT * FROM tariffs WHERE name='$name' LIMIT 1";
    $result = mysqli_query($db, $tariff_check_query);
    $tariff = mysqli_fetch_assoc($result);

    if ($tariff) { // if user exists
        if ($tariff['username'] === $name) {
            array_push($errors, "Name already exists");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $today = date("Y-m-d");

        $query = "INSERT INTO tariffs (name, description, image, channels_amount, price, creation_date) 
  			  VALUES('$name', '$description', '$target_file', '$channels_amount', '$price', '$today')";
        mysqli_query($db, $query);
        header('location: /admin/?page=products');
    }
}

if (isset($_POST['edit-user'])) {
    $id = $_POST['id'];
    echo $id;
    header("location: /admin/?page=user-edit&id=$id");
}

if (isset($_POST['delete-user'])) {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM products WHERE id='$id'";
    $retval = mysqli_query($db, $query);
    header("location: /admin/?page=users");
}

if (isset($_POST['edit-tariff'])) {
    $id = $_POST['id'];
    echo $id;
    header("location: /admin/?page=tariff-edit&id=$id");
}

if (isset($_POST['delete-tariff'])) {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM tariffs WHERE id='$id'";
    $retval = mysqli_query($db, $query);
    header("location: /admin/?page=products");
}

if (isset($_POST['buy-tariff'])) {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    echo $id;
    echo $user_id;
    $query = "INSERT INTO bought_tarrifes (user_id, tarrif_id) 
  			  VALUES('$user_id', '$id')";
    $retval = mysqli_query($db, $query);
    header("location: /?page=shop-unit&id=$id");
}

if (isset($_POST['edit-post'])) {
    $id = $_POST['id'];
    echo $id;
    header("location: /admin/?page=post-edit&id=$id");
}

if (isset($_POST['delete-post'])) {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM news WHERE id='$id'";
    $retval = mysqli_query($db, $query);
    header("location: /admin/?page=news");
}

if (isset($_POST['leave-comment'])) {
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    $comment_text = $_POST['comment_text'];
    $today = date("Y-m-d");

    echo $post_id;
    echo '|';
    echo $user_id;
    echo '|';
    echo $comment_text;
    echo '|';
    echo $today;

    $query = "INSERT INTO post_comments (post_id, user_id, comment_text, date) 
  			  VALUES('$post_id', '$user_id', '$comment_text', $today)";
    mysqli_query($db, $query) or die(mysqli_error($db));
    header('location: /?page=post&id=' . $post_id);;
}

if (isset($_POST['delete-comment'])) {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM post_comments WHERE id='$id'";
    $retval = mysqli_query($db, $query);
    header("location: /admin/?page=comments");
}

if (isset($_POST['edit_tariff_action'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $channels_amount = $_POST['channels_amount'];
    $price = $_POST['price'];

    $uploaddir = '/var/www/html/media/tariff_images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    echo $_FILES['image']['error'];
    echo '<pre>';
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $target_file = '/media/tariff_images/' . basename($_FILES['image']['name']);
        $query = "UPDATE tariffs SET image='$target_file' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    echo 'Некоторая отладочная информация:';
    print_r($_FILES);
    print_r('|');
    print_r($id);
    print_r('|');
    print_r($name);
    print_r('|');
    print_r($description);
    print_r('|');
    print_r($channels_amount);
    print_r('|');
    print_r($price);

    print "</pre>";


    if (! empty($name)) {

        $query = "UPDATE tariffs SET name='$name' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    if (! empty($description)) {

        $query = "UPDATE tariffs SET description='$description' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    if (! empty($channels_amount)) {

        $query = "UPDATE tariffs SET channels_amount='$channels_amount' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    if (! empty($price)) {

        $query = "UPDATE tariffs SET channels_amount='$channels_amount' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    header('location: /admin/?page=products');
}

if (isset($_POST['create_post'])) {
    $header = mysqli_real_escape_string($db, $_POST['header']);
    $post_text = mysqli_real_escape_string($db, $_POST['post_text']);
    $short_post = mysqli_real_escape_string($db, $_POST['short_post']);

    $target_file = NULL;

    $username = $_SESSION['username'];
    $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $cur_user = mysqli_fetch_assoc($result);
    $cur_user_id = $cur_user['id'];


    $uploaddir = '/var/www/html/media/post_images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    echo $_FILES['image']['error'];
    echo '<pre>';
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $target_file = '/media/post_images/' . basename($_FILES['image']['name']);
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        $target_file = '/media/post_images/default.png';
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    echo 'Некоторая отладочная информация:';
    print_r($_FILES);

    print "</pre>";

    if (empty($header)) { array_push($errors, "header is required"); }
    if (empty($post_text)) { array_push($errors, "post text is required"); }
    if (empty($short_post)) { array_push($errors, "short post text is required"); }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $post_check_query = "SELECT * FROM news WHERE header='$header' LIMIT 1";
    $result = mysqli_query($db, $post_check_query);
    $post = mysqli_fetch_assoc($result);

    if ($post) { // if user exists
        if ($post['header'] === $header) {
            array_push($errors, "Name already exists");
        }
    }
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $today = date("Y-m-d");

        $query = "INSERT INTO news (header, post_text, date, creator, short_post, image) 
  			  VALUES('$header', '$post_text', '$today', '$cur_user_id', '$short_post', '$target_file')";
        mysqli_query($db, $query);
        header('location: /admin/?page=news');
    }
}

if (isset($_POST['edit_post_action'])) {
    $id = $_POST['id'];
    $header = mysqli_real_escape_string($db, $_POST['header']);
    $post_text = mysqli_real_escape_string($db, $_POST['post_text']);
    $short_post = mysqli_real_escape_string($db, $_POST['short_post']);

    $uploaddir = '/var/www/html/media/post_images/';
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);
    echo $_FILES['image']['error'];
    echo '<pre>';
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        $target_file = '/media/tariff_images/' . basename($_FILES['image']['name']);
        $query = "UPDATE news SET image='$target_file' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

    print "</pre>";


    if (! empty($header)) {

        $query = "UPDATE news SET header='$header' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    if (! empty($post_text)) {

        $query = "UPDATE news SET post_text='$post_text' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    if (! empty($short_post)) {

        $query = "UPDATE news SET short_post='$short_post' WHERE id='$id'";
        $retval = mysqli_query($db, $query);
        if(! $retval ) {
            die('Could not update data: ' . mysqli_error($db));
        }
    }

    header('location: /admin/?page=news');
}

