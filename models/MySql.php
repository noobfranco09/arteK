<<<<<<< HEAD
<?php
//Clase para conectar a la base de datos MySQL
class MySQL
{

    //Datos de conexión
    private $ipServidor = "localhost";
    private $usuario = "root";
    private $contraseña = "";
    private $baseDatos = "artek";

    private $conexion;

    //Metodo para conectar la base de datos
    public function conectar()
    {

        //Crear la conexión
        $this->conexion = mysqli_connect($this->ipServidor, $this->usuario, $this->contraseña, $this->baseDatos);

        //Verificar si hay errores en la conexión
        if (!$this->conexion) {
            die("Error de conexion: " . mysqli_connect_error());
        }

        //Establecer el conjunto de caracteres a utf8
        mysqli_set_charset($this->conexion, "utf8");
    }


    //Metodo para cerrar la conexión
    public function desconectar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
        }
    }

    //Metodo para ejecutar una consulta
    public function efectuarConsulta($consulta)
    {
        //verificar la codificacion sea utf8
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        mysqli_query($this->conexion, "SET CHARACTER SET 'utf8'");

        $resultado = mysqli_query($this->conexion, $consulta);

        if (!$resultado) {
            echo "Error en la consulta: " . mysqli_error($this->conexion);
        }

        return $resultado;
    }
}
=======
<?php

    class Mysql
    {
        private $ipservidor="localhost";
        private $usuarioBase="root";
        private $contraseña="";
        private $nombreBaseDatos="arteK";
        private $conexion;


        public function  conectar()
        {
            $this->conexion=mysqli_connect($this->ipservidor,$this->usuarioBase,$this->contraseña,$this->nombreBaseDatos);
            if(!$this->conexion)
            {
                die("Error al conectar a la base de datos".mysqli_connect_error());
            }

            //Establecer codificacion utf8
            mysqli_set_charset($this->conexion,"utf8");
        }

        public function desconectar()
        {
            if($this->conexion)
            {
                mysqli_close($this->conexion);
            }
        }

        public function consulta($consulta)
        {
            mysqli_query($this->conexion,"SET NAMES 'utf8'");
            mysqli_query($this->conexion,"SET CHARACTER SET 'utf8'");

            $resultado= mysqli_query($this->conexion,$consulta);
            if(!$resultado)
            {
                echo "Error en la consulta:" . mysqli_error( $this->conexion);
            };
            return $resultado;
        }
        public function obtenerUltimoId(){
            mysqli_insert_id($this->conexion);
        }
    }

>>>>>>> 284760b (se agrega la conexión a la base de datos, tener en cuenta que la deben llamar artK al importarla a mariadb)
?>