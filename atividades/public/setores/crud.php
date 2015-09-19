<?php
header('Content-Type: text/html; charset=utf-8');

require_once '../../src/crud.php';

$post = $_POST;
unset($post['action']);

switch (trim($_POST['action'])) {
    case 'insert':
        unset($post['id']);
        insert ('setores', $post);
        break;

    case 'update':
        update ('setores', $post, ['id' => 1]);
        break;

    case 'delete':
        delete ('setores', ['id' => 1]);
        break;

    case 'select':
        # code...
        break;
}
