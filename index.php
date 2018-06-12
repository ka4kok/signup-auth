<?php

session_start();

?>

<html>
<head>
    <script src="js/jquery.min.js"></script>
</head>
<body>

<div class="box" style="display: flex; justify-content: center">
    <div>
        <div><h1 style="color: green">Главная страница</h1></div>

        <span class="reg_errors" style="color: red"></span>

        <?php if (empty($_SESSION['name'])) { ?>
        <form class="form_auth">
            Ваше имя: <input type="text" name="name"> <br><br>
            Ваш пароль: <input type="text" name="password"> <br><br>
            <input type="submit" value="Войти">
            <a href="/signup.php">Зарегистрироваться</a>
        </form>  <?php } else { ?>
            <?php echo '<div class="message">Добро пожаловать'.' '.  $_SESSION['name'] .' </div>';
            echo '<a class="logout" href="logout.php">Выйти</a>';
        } ?>
    </div>
</div>

<script src="js/common.js"></script>
</body>
</html>



