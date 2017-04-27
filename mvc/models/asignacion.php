<?php
namespace MVC\Models;

use App\MySQL\Conexion;

class Asignacion {
	protected $datos = [
		'id' => '',
		'curso_id' => '',
		'titulo' => '',
        'instruccion' => ''
        

	];

	public function __get($campo) {
        return $this->datos[$campo];
    }

    public function __set($campo, $valor) {
        $this->datos[$campo] = $valor;
    }

	public static function getAsignaciones()
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

	public static function getAsignacionByID($rolid)
	{
		// conectar
		// definir consulta
		// ejecutar consulta
		// evaluar resultado
		// retornar resultado
		 // crear conexion a MySQL
        $cnn = new Conexion();
        // definir sentencia SQL
        $query = sprintf("select * from roles where id=%d", $rolid);
        // ejecutar la sentencia ($rst = resultset)
        $rst = $cnn->query($query);
        // cerrar conexion
        $cnn->close();
        if (!$rst) {
            die('Error al ejecutar la consulta MySQL');
        } elseif ($rst->num_rows == 1) { // mysqli_result
            // rol encontrado
            // recoger los registros devueltos por la consulta
			$rol = new Rol();
            $r = $rst->fetch_assoc();
            $this->id = $rolid;
            $this->nombre = $r['nombre'];
            $this->descripcion = $r['descripcion'];
            return $rol;
        } else {
            // rol no encontrado
            return false;
        }
	}
    public function create()
    {
        //Metodo para crear nuevos cursos
    }
    public function delete()
    {
        //Metodo para eliminar cursos
    }
 
    public function edit()
    {
        //Metodo para editar cursos
    }

}