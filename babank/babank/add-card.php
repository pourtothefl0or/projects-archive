<?php
session_start();
require ('functions/config.php');

if(!$_SESSION['user']) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" rel="icon" href="images/favicon.png">
    <link rel="stylesheet" href="/styles/uni.css">
    <title>БА-БАНК - Добавить карту</title>
</head>
<body>
<?php require ('components/header.php'); ?>
    <main>
        <div class="forms">
            <div class="container">
                <h2 class="title">Добавить карту</h2>
                <form action="functions/f_mod-card.php" method="POST" class="form-content">
                    <!-- 1 -->
                    <label class="form-label">Номер карты</label>
                    <input type="text" name="number" class="form-input" minlength="16" maxlength="16" pattern="[0-9]*" placeholder="Введите номер карты" required>
                    <!-- 2 -->    
                    <label class="form-label">Имя</label>
                    <input type="text" name="first_name" class="form-input" placeholder="Введите имя" required>
                    <!-- 3 -->   
                    <label class="form-label">Фамилия</label>
                    <input type="text" name="last_name" class="form-input" placeholder="Введите фамилию" required>
                    <!-- 4 -->   
                    <label class="form-label">Месяц</label>
                    <select name="month" class="form-input select" required>
                            <option value="" disabled selected>Выберите месяц</option>
                            <option value="1">Январь</option>
                            <option value="2">Февраль</option>
                            <option value="3">Март</option>
                            <option value="4">Апрель</option>
                            <option value="5">Май</option>
                            <option value="6">Июнь</option>
                            <option value="7">Июль</option>
                            <option value="8">Август</option>
                            <option value="9">Сентябрь</option>
                            <option value="10">Октябрь</option>
                            <option value="11">Ноябрь</option>
                            <option value="12">Декабрь</option>
                    </select>
                    <!-- 5 -->
                    <label class="form-label">Год</label>
                    <input type="number" name="year" class="form-input" min="2021" max="2100" step="1" placeholder="Введите год" required>
                    <!-- 6 -->   
                    <label class="form-label">CVC</label>
                    <input type="text" name="cvc" class="form-input" minlength="3" maxlength="3" pattern="[0-9]*" placeholder="Введите CVC карты" required>
                    <!-- 7 -->   
                    <button type="submit" name="add" class="button">Добавить карту</button>
                    <small class="form-error"><?php echo $_SESSION['error']; unset ($_SESSION['error']); ?></small>
                </form>
            </div>
        </div>
    </main>
</body>
</html>