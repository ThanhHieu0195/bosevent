<?php
/**
 *@var $post_id
 */
$sessions = \includes\classes\Constants::HOME_SESSIONS;
for ($i=0; $i < count($sessions); $i++) {
	$name = 'home/homeSession'.$sessions[$i];
    $template = includes\Bootstrap::bootstrap()->helper->getPathTemplate($name);
    echo includes\Bootstrap::bootstrap()->helper->render($template, array('post_id' => $post_id));
}
?>