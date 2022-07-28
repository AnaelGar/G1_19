<?php   
    class docente extends Conectar{
     
        public function get_docentes(){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="SELECT * FROM docente "; 
            $sql=$conectar->prepare($sql); 
            $sql->execute(); 
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_docente($NumeroDocente){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="SELECT * FROM docente WHERE NumeroDocente = ?"; 
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $NumeroDocente); 
            $sql->execute(); 
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_docente($NumeroDocente,$Nombre,$Apellidos,$FechaDeContratacion,$Direccion,$Salario,$Profesion){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="INSERT INTO docente(NumeroDocente,Nombre,Apellidos,FechaDeContratacion,Direccion,Salario,Profesion) 
            VALUES (?,?,?,?,?,?,?);"; 
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $NumeroDocente); 
            $sql->bindValue(2, $Nombre); 
            $sql->bindValue(3, $Apellidos); 
            $sql->bindValue(4, $FechaDeContratacion); 
            $sql->bindValue(5, $Direccion); 
            $sql->bindvalue(6, $Salario); 
            $sql->bindvalue (7, $Profesion); 
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_docente($NumeroDocente,$Nombre,$Apellidos,$FechaDeContratacion,$Direccion,$Salario,$Profesion){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="UPDATE docente SET Nombre=?,Apellidos=?,FechaDeContratacion=?,Direccion=?,Salario=?,Profesion=?
            WHERE (NumeroDocente = ?);";
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $Nombre); 
            $sql->bindValue(2, $Apellidos); 
            $sql->bindValue(3, $FechaDeContratacion); 
            $sql->bindValue(4, $Direccion); 
            $sql->bindvalue(5, $Salario); 
            $sql->bindvalue (6, $Profesion); 
            $sql->bindValue(7, $NumeroDocente); 
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_docente($NumeroDocente){
            $conectar= parent::conexion(); 
            parent::set_names(); 
            $sql="DELETE FROM docente WHERE NumeroDocente = ?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroDocente);  
            $sql->execute(); 
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>
