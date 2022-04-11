<?php
namespace app\controllers;
use app\core\Controller;
use app\models\Aluno;

class AlunoController extends Controller{
    
   public function index(){

      //instância do Model criada
        $objAluno = new Aluno();
        $dados["lista"] = $objAluno->lista();
        $dados["view"] = "Aluno/index";
         //echo "<pre>";
         //print_r($dados);
         //exit;
         $this->load("template",$dados);
       
   } 

   public function edit($id){
      $objAluno = new Aluno();
      $dados["Aluno"] = $objAluno->getAluno($id);
      $dados["view"] = "aluno/Create";
   /*echo "<pre>";
      print_r($dados);
      exit;

      */$this->load("template",$dados);

   }

   //Criar método create
   public function create(){
      $dados["view"] = "aluno/Create";
      $this->load("template",$dados);
       
   }

   public function salvar(){
    
      $objAluno = new Aluno();
      $aluno = new \stdClass();
      $aluno->aluno         = $_POST["aluno"];
      $aluno->matricula        = $_POST["matricula"];
      $aluno->turma        = $_POST["turma"];
      
      $aluno->idaluno     =$_POST["idaluno"];
      


      if($aluno->idaluno) {

            //cchamar método do objAluno
            $objAluno->editar($aluno);
           } else {
         $objAluno->inserir($aluno);
      }
     header("location:".URL_BASE."aluno");
         

   }
  
   public function excluir($id){
      $objAluno = new Aluno();
      $objAluno->excluir($id);
      header("location:".URL_BASE."aluno");


   }

}
