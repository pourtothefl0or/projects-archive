<?php
session_start();
require ('functions/config.php');

$id = $_SESSION['user']['id'];
$cards = mysqli_query($db, "SELECT * FROM `cards` WHERE `users_id` = '$id'");

$date = date("Y-m-d");
$time = date("H:i");

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
    <title>БА-БАНК - Добавить операцию</title>
</head>
<body>
<?php require ('components/header.php'); ?>
    <main>
        <div class="forms">
            <div class="container">
                <h2 class="title">Добавить  операцию</h2>
                <form action="functions/f_mod-check.php" method="POST" class="form-content">
                    <!-- 1 -->
                    <label class="form-label">Карта</label>
                    <select name="card" class="form-input" required>
                        <?php while ($card = mysqli_fetch_assoc($cards)) { ?>
                            <option value="<?= $card['cards_id']; ?>"><?php echo '('.$card['cards_name'].')'.' '; require ('components/card_number.php'); ?></option>
                        <?php } ?>
                    </select>
                    <!-- 2 -->
                    <label class="form-label">Название</label>
                    <input type="text" name="checks_product" class="form-input" placeholder="Введите название операции" required>
                    <!-- 3 -->
                    <label class="form-label">Дата</label>
                    <input type="date" name="date" class="form-input" min="<?= $date; ?>" value="<?= $date; ?>" required>
                    <!-- 4 -->
                    <label class="form-label">Время</label>
                    <input type="time" name="time" class="form-input" value="<?= $time; ?>" required>
                    <!-- 5 -->   
                    <label class="form-label">Сумма</label>
                    <input type="number" name="sum" class="form-input" placeholder="Введите сумму операции (₽)" required>
                    <!-- 6 -->   
                    <button type="submit" name="add" class="button">Добавить операцию</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>