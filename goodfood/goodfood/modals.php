<!-- modal -->
<div class="modal-overlay">
    <div class="container flex-c-c">
        <?php 
            if (!$_SESSION['user']) { require('auth.php'); }
            require('calc.php');
            if ($_SESSION['user']['flag'] == 1) { require('product-mod.php'); }
        ?>
    </div>
</div>
<!-- //modal -->