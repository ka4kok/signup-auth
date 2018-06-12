<html>
<head>
    <script src="js/jquery.min.js"></script>
</head>
<body>

<div class="box" style="display: flex; justify-content: center">
    <div>

        <span class="reg_errors" style="color: red"></span>

        <form class="form_reg">
            Введите имя: <input type="text" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : ''?>"> <br><br>
            Введите возраст: <input type="number" name="age"  value="<?= isset($_POST['age']) ? $_POST['age'] : ''?>"> <br><br>
            Введите пароль: <input type="text" name="password"  value="<?= isset($_POST['password']) ? $_POST['password'] : ''?>"> <br><br>
            <input class="btn_reg" type="submit" value="Зарегистрироваться">
        </form>
    </div>
</div>

<script src="js/common.js"></script>
</body>
</html>
