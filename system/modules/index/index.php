<?php 
$tpl = new template('system/modules/index/index.tpl');
$tpl->set(array('PAGE_TITLE' => 'Hey !','CSS' => 'style.css'));
echo $tpl->parse();
?>