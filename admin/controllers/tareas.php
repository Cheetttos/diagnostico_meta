<?php
require_once("sistema.php");
class Tarea extends Sistema{

    public function get($id = null)
    {
        $this->db();
        if (is_null($id)) {
            $sql = "select * from tareas";
            $st = $this->db->prepare($sql);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "select * from tareas where id_tareas = :id";
            $st = $this->db->prepare($sql);
            $st->bindParam(":id", $id, PDO::PARAM_INT);
            $st->execute();
            $data = $st->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }

    public function new($data)
    {
        try{
            $this->db();
            $this->db->beginTransaction();
            $sql = "INSERT INTO tareas (descripcion, estado) VALUES (:descripcion, :estado)";
            $st = $this->db->prepare($sql);
            $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
            $st->bindParam(":estado", $data['estado']);
            $st->execute();
            $rc = $st->rowCount();
            $this->db->commit();
        }catch(PDOException $ex){
            $rc=0;
            $this->db->rollBack();
        }
        return $rc;
    }
    public function edit($id, $data)
    {
        $this->db();
        $sql = "UPDATE tareas SET descripcion = :descripcion, estado = :estado WHERE id = :id";
        $st = $this->db->prepare($sql);
        $st->bindParam(":id", $id, PDO::PARAM_INT);
        $st->bindParam(":descripcion", $data['descripcion'], PDO::PARAM_STR);
        $st->bindParam(":estado", $data['estado']);
        $st->execute();
        $rc = $st->rowCount();
        return $rc;
    }

    // Función para eliminar una tarea por su ID
    function delete($id)
    {
        global $conexion;

        $stmt = $conexion->prepare("DELETE FROM tareas WHERE id = :id");
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Función para obtener el nombre del estado según el valor
    function obtenerNombreEstado($valor)
    {
        switch ($valor) {
            case 1:
                return "Pendiente";
            case 2:
                return "En Progreso";
            case 3:
                return "Completada";
            default:
                return "Desconocido";
        }
    }

}$tarea = new Tarea();

?>