<?php
require_once("controllers/tareas.php");
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':

        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tarea->new($data);
            if ($cantidad) {

                $data = $tarea->get();
                include('views/tarea/index.php');
            } else {

                include('views/tarea/form.php');
            }
        } else {
            include('views/tarea/form.php');
        }
        break;
    case 'edit':

        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id'];
            $cantidad = $tarea->edit($id, $data);
            if ($cantidad) {

                $data = $tarea->get();
                include('views/tarea/index.php');
            } else {

                $data = $tarea->get();
                include('views/tarea/index.php');
            }
        } else {

            include('views/tarea/form.php');
        }
        break;
    case 'delete':
        $cantidad = $tarea->delete($id);
        if ($cantidad) {
            $data = $tarea->get();
            include('views/tarea/index.php');
        } else {

            $data = $tarea->get();
            include('views/tarea/index.php');
        }
        break;
    default:

        include("views/tarea/index.php");
}
?>
<h1></h1>