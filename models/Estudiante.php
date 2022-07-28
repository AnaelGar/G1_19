<?php  
//Realizado POr Anael Ivanov Garcia Lagos 
//Entidad Estudiante
    class estudiante extends Conectar{
     
        public function get_estudiantes(){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="SELECT * FROM Estudiante "; 
            $sql=$conectar->prepare($sql); 
            $sql->execute(); 
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_estudiante($NumeroAlumno){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="SELECT * FROM Estudiante WHERE NumeroAlumno = ?"; 
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $NumeroAlumno); 
            $sql->execute(); 
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_estudiante($NumeroAlumno,$Nombre,$Apellidos,$FechaNacimiento,$Direccion,$Altura,$Carrera){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="INSERT INTO Estudiante(NumeroAlumno,Nombre,Apellidos,FechaNacimiento,Direccion,Altura,Carrera) 
            VALUES (?,?,?,?,?,?,?);"; 
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $NumeroAlumno); 
            $sql->bindValue(2, $Nombre); 
            $sql->bindValue(3, $Apellidos); 
            $sql->bindValue(4, $FechaNacimiento); 
            $sql->bindValue(5, $Direccion); 
            $sql->bindvalue(6, $Altura); 
            $sql->bindvalue (7, $Carrera); 
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function update_estudiante($NumeroAlumno,$Nombre,$Apellidos,$FechaNacimiento,$Direccion,$Altura,$Carrera){
            $conectar=parent::conexion(); 
            parent::set_names(); 
            $sql="UPDATE Estudiante SET Nombre=?,Apellidos=?,FechaNacimiento=?,Direccion=?,Altura=?,Carrera=?
            WHERE (NumeroAlumno = ?);";
            $sql=$conectar->prepare($sql); 
            $sql->bindValue(1, $Nombre); 
            $sql->bindValue(2, $Apellidos); 
            $sql->bindValue(3, $FechaNacimiento); 
            $sql->bindValue(4, $Direccion); 
            $sql->bindvalue(5, $Altura); 
            $sql->bindvalue (6, $Carrera); 
            $sql->bindValue(7, $NumeroAlumno); 
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_estudiante($NumeroAlumno){
            $conectar= parent::conexion(); 
            parent::set_names(); 
            $sql="DELETE FROM Estudiante WHERE NumeroAlumno = ?"; 
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NumeroAlumno);  
            $sql->execute(); 
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

?>
