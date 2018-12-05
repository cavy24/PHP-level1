<?php require_once LIB_DIR. 'module/main/header.php'; ?>

<h2><?= $vars['title_h2']?></h2>

<p>Уважаемый(ая) <?=$_SESSION['user']?>, вы можете оплатить заказ (и доставку) любым удобным для вас способом из перечисленных ниже.</p>
<ul>
<?php foreach ($vars['payments'] as $payment): ?>
<li><?=$payment ?></li>
<?php endforeach;?>
</ul>
<?php require_once LIB_DIR. 'module/main/footer.php'; ?>