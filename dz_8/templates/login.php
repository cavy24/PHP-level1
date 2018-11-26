<?php if($vars['errors']):?>
    <?= $vars['errors']; ?>
<?php endif; ?>
<form method="post">
    <input name="username">
    <input name="password" type="password">
    <input type="checkbox" name="rememberme">
    <input type="submit">
</form>
<?php echo hashPassword(170717) . PHP_EOL;
echo hashPassword('admin170717');