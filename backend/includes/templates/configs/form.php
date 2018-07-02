<?php
/**
 * @var $attributes array
 * @var $context \includes\classes\ConfigMenu
 */
if ( $_POST['configs'] ) {
    $dataAttributes = $_POST['configs'];
	$context->saveAttributes($dataAttributes);
}
?>
<form action="" method="post">
    <h1><?php echo strtoupper('Configs Data') ?></h1>
    <table>
	    <?php foreach ($attributes as $attribute): ?>
            <?php
            $param = 'configs['.$attribute['param'].']';
            $label = $attribute['label'];
            $value = $context->getAttribute($attribute['param']);
            ?>
            <tr class="form-item">
                <td><label for="<?php echo esc_attr($param) ?>"><?php echo esc_html($label) ?></label></td>
                <td><input type="text" id="<?php echo esc_attr($param) ?>" name="<?php echo esc_attr($param) ?>" value="<?php echo esc_attr($value) ?>"></td>
            </tr>
	    <?php endforeach; ?>
    </table>
    <button>Save</button>
</form>