<?php
namespace App\Controllers\Admin;

use Core\Controller;
use App\Models\Admin\Categorias;
class ProductosController extends Controller
{
    private $categoriasModel;
    public function __construct()
    {
        // Inicializa el modelo de categorias para poder usarlo.
        $this->categoriasModel = new Categorias();
    }

    // Muestra la pagina principal con el listado de productos
    public function index()
    {
        $this->view('admin/productos/index', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'Productos'
        ]);
        exit;
    }
    public function nuevo(){
        // Estas categorias se utilizan para llenar el selector del formulario de nuevo producto
        $categorias = $this->categoriasModel->categorias_select();
        // Envia a la vista los datos necesarios para renderizar el formulario de nuevo producto
        $this->view('admin/productos/nuevo', [
            'isAdmin'   => true,
            'module'    => 'admin',
            'pageTitle' => 'Nuevo Producto',
            'categorias' => $categorias
        ]);
        exit;
    }
    public function guardar(){
    $data = $_POST;
    //validar datos
    if(!empty($data['categoria']) && !empty($data['codigo']) && !empty($data
    ['nombre']) && !empty($data['descripcion']) && !empty($data['precio']) &&
    !empty($data['stock'])){
        //guardar producto
        //llmar al modelo de productos para guardar el producto en la base de
        datos
    }else{
        header('Location: ' . BASE_URL . '/admin/productos/nuevo');
    }
}
}