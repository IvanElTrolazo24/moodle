<?php
namespace MVC\Models;

use App\MySQL\Conexion;

class Rol {
	protected $datos = [
		'id' => '',
		'nombre' => '',
		'descripcion' => ''
	];

	public function __get($campo) {
        return $this->datos[$campo];
    }

    public function __set($campo, $valor) {
        $this->datos[$campo] = $valor;
    }

	public static function getRoles()
	{
		$cnn = new Conexion();
		$query = "select * from roles";
		$rst = $cnn->query($query);
		$cnn->close();

		if (!$rst) {
			die('Error al ejecutar la consulta');
		} else {
			if ($rst->num_rows > 0) {
				$resultado = [];
				while ($r = $rst->fetch_assoc()) {
					$rol = new Rol();
					$rol->id = $r['id'];
					$rol->nombre = $r['nombre'];
					$rol->descripcion = $r['descripcion'];
					array_push($resultado, $rol);
				}
				return $resultado;
			} else {
				return false;
			}
		}
	}

	public static function getRolByID()
	{
		// conectar
		// definir consulta
		// ejecutar consulta
		// evaluar resultado
		// retornar resultado
		 // crear conexion a MySQL
        $cnn = new Conexion();
        // definir sentencia SQL
        $sql = sprintf("select * from roles where id=%d", $rolid);
        // ejecutar la sentencia ($rst = resultset)
        $rst = $cnn->query($sql);
        // cerrar conexion
        $cnn->close();
        if (!$rst) {
            die('Error al ejecutar la consulta MySQL');
        } elseif ($rst->num_rows == 1) { // mysqli_restult
            // rol encontrado
            // recoger los registros devueltos por la consulta
            $r = $rst->fetch_assoc();
            $this->id = $rolid;
            $this->username = $r['username'];
            $this->email = $r['email'];
            $this->nombres = $r['nombres'];
            $this->apellidos = $r['apellidos'];
            $this->foto = $r['foto'];
            $this->rol_id = $r['rol_id'];
            return true;
        } else {
            // rol no encontrado
            return false;
        }
	}
}