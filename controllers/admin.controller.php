<?php   
    include_once('models/genero.model.php');
    include_once('models/pelicula.model.php');
    include_once('views/admin.view.php');
    include_once('views/visitor.view.php');
    include_once('helpers/auth.helper.php');
    include_once('models/imagen.model.php');

    class AdminController{
        private $modelp;
        private $modelg;
        private $viewa;
        private $viewu;
        private $authHelper;
        private $modelm;

        public function __construct(){
            $this->authHelper = new AuthHelper();
            $this->modelg= new GeneroModel();
            $this->modelp= new PeliculaModel();
            $this->viewa= new AdminView();
            $this->viewu= new VisitorView();
            $this->modelm= new ImagenModel();
        }
        public function addPelicula(){
            $this->authHelper->checkAdmin();
            $generos= $this->modelg->getAll();
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $director = $_POST['director'];
            $estreno = $_POST['estreno'];       
            $descripcion = $_POST['descripcion'];
            $id_genero = $_POST['genero'];
            if (!empty($nombre) && (!empty($director)) && (!empty($id_genero))){
                $id_pelicula = $this->modelp->save($nombre, $director, $estreno, $duracion, $descripcion, $id_genero);
                $this->saveImg($id_pelicula);
                
                header("Location: peliculas");
            } else
            $this->viewa->showError("Faltan datos obligatorios", $generos);
        }
        public function deletePelicula($params = NULL) {
            $idpelicula = $params[':ID'];
            $this->authHelper->checkAdmin();
            $this->deleteImgLocal($idpelicula);
            $this->modelp->delete($idpelicula);
            header("Location: ../peliculas");
        }
        private function deleteimgLocal($id_pelicula){
            $imagenes = $this->modelm->getImgByPelicula($id_pelicula);
            foreach ($imagenes as $imagen) {
                unlink($imagen->ruta);
            }
        }
        public function deleteImg($params = NULL){
            $id_imagen = $params[':ID'];
            $this->authHelper->checkAdmin();
            $imagen = $this->modelm->getImagen($id_imagen);
            unlink($imagen->ruta);
            $this->modelm->deleteByID($id_imagen);
            header("Location: ../peliculas/".$imagen->id_pelicula_fk);
        }
        public function deleteAllImgByPelicula($params = NULL){
            $id_pelicula= $params[':ID'];
            $this->authHelper->checkAdmin();
            $this->deleteImgLocal($id_pelicula);
            $this->modelm->deleteByPelicula($id_pelicula);
            header("Location: ../peliculas/".$id_pelicula);
        }
        public function toEditPelicula($params = NULL){
            $idpelicula = $params[':ID'];
            $this->authHelper->checkAdmin();
            $pelicula = $this->modelp->getConGenero($idpelicula);
            $generos = $this->modelg->getAll();
            
            if($pelicula){
                
                $this->viewa->showToEdit($pelicula, $generos);
            }
            else
                $this->viewu->showError('La id no pertenece a ninguna pelicula');
        }
        public function editPelicula($params = NULL){
            $generos= $this->modelg->getAll();
            $idpelicula = $params[':ID'];
            $this->authHelper->checkAdmin();
            $nombre = $_POST['nombre'];
            $duracion = $_POST['duracion'];
            $director = $_POST['director'];
            $estreno = $_POST['estreno'];
            $descripcion = $_POST['descripcion'];
            $id_genero = $_POST['genero'];
            if (!empty($nombre) && (!empty($director)) && (!empty($id_genero))){
                $this->saveImg($idpelicula);
                $this->modelp->update($nombre, $director, $estreno, $duracion, $descripcion, $id_genero, $idpelicula);
                header("Location: ../peliculas");
            } else
            $this->viewu->showError("Faltan datos obligatorios, porfavor ingrese el nombre, el director y el genero", $generos);
        }
        public function addGenero(){
            $this->authHelper->checkAdmin();
            $nombre= $_POST['nombre'];
            $imagen= $_POST['imagen'];
            if(!empty($nombre)){
                $this->modelg->save($nombre, $imagen);
                header('Location: generos');
            }
            else
            $this->viewu->showError("No se pudo agregar genero, falta el nombre");
        }
        public function deleteGenero($params = NULL){
            $idgenero = $params[':ID'];
            $this->authHelper->checkAdmin();;
            $this->modelg->delete($idgenero);
            header('Location: ../generos');
        }
        public function toEditGenero($params = NULL){
            $idgenero = $params[':ID'];
            $this->authHelper->checkAdmin();
            $genero = $this->modelg->get($idgenero);
            $generos = $this->modelg->getAll();
            if($genero)
            $this->viewa->showToEditGenero($genero, $generos);
            else
            $this->viewu->showError('La id no pertenece a ningun genero');
        }
        public function editGenero($params = NULL){
            $idgenero = $params[':ID'];
            $this->authHelper->checkAdmin();
            $nombre= $_POST['nombre'];
            $imagen= $_POST['imagen'];
            if(!empty($nombre)){
                $this->modelg->update($nombre, $imagen, $idgenero);
              header("Location: ../generos");
            }
            else
            $this->viewu->showError("Por favor  ingrese un nombre");
        }
        public function showError($msgerror){
            $generos = $this->modelg->getAll();
            $this->viewu->showError($msgerror,$generos);
        }
    private function saveImg($id_pelicula){
        foreach($_FILES["imagenes"]['tmp_name'] as $key => $tmp_name){

            //Validamos que el archivo exista
            if($_FILES["imagenes"]["name"][$key]) {
                if($_FILES['imagenes']['type'][$key] == "image/jpg" || $_FILES['imagenes']['type'][$key] == "image/jpeg" 
                || $_FILES['imagenes']['type'][$key] == "image/png" ) {
                $filename = $_FILES["imagenes"]["name"][$key]; //Obtenemos el nombre original del archivo
                $source = $_FILES["imagenes"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
                
                $directorio = 'img/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
                
                
                $dir=opendir($directorio); //Abrimos el directorio de destino
                $target_path = $this->modelm->uploadImage($directorio, $source, $filename);
                $this->modelm->save($target_path, $id_pelicula);
                closedir($dir); //Cerramos el directorio de destino
                }
            }
        }
    }
}