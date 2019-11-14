<?php
require_once("models/comentarios.model.php");
require_once("./api/json.view.php");
require_once("models/pelicula.model.php");
require_once("models/genero.model.php");
include_once('helpers/auth.helper.php');



    class ApiController{

    private $modelc;
    private $modelp;
    private $modelg;
    private $viewjson;
    private $data;
    private $authHelper;

    public function __construct(){
        $this->modelc = new ComentarioModel();
        $this->modelp = new PeliculaModel();
        $this->viewjson = new JSONView();
        $this->modelg = new GeneroModel();
        $this->authHelper = new AuthHelper();
        $this->data = file_get_contents("php://input");
    }
    private function getData() {
        return json_decode($this->data);
    }
    public function getComentariosByPelicula($params = NULL){
        $id_pelicula = $params[':ID'];
        if($this->modelp->get($id_pelicula)){
            $this->modelg->getAll();
            $comentarios = $this->modelc->getComentariosByPelicula($id_pelicula);
            $this->viewjson->response($comentarios, 200);
        }else{
            $this->viewjson->response('No existe el id de esas pelicula', 404);
        }
    }
    public function addComentario(){
        $data = $this->getData();
        $comentario = $this->modelc->save($data->cuerpo , $data->puntaje, $data->id_pelicula_fk, $data->id_user_fk);
        if($comentario){
            $this->viewjson->response('Su comentario ha sido posteado', 200);
        }else{
            $this->viewjson->response('No se pudo postear su comentario', 500);
        }
    }
    public function deleteComentario($params = NULL){
        $this->authHelper->checkAdmin();
        $id_comentario = $params[':ID'];
        $comentario = $this->modelc->get($id_comentario);
        if($comentario){
            $this->modelc->delete($id_comentario);
            $this->viewjson->response('Comentario borrado con exito', 200);
        }else{
            $this->viewjson->response("La comentario con el id= $id_comentario no existe", 404);
        }
    }
}