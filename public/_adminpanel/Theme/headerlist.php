<?php

$categorysay = $db->prepare("SELECT COUNT(*) FROM category ");
$categorysay->execute();
$categorysaycek = $categorysay->fetchColumn();