<?php
namespace  App\Controllers;

use App\Service\CategorieService;
use Core\Controller ;
use App\Model\Categorie;

class CategorieController extends Controller{

    private $categorieService;

    public function __construct()
    {
        $this->categorieService = new CategorieService();
        
    }

    
    
    public function index(){
        $data = [
            "categories" => $this->categorieService->getAllCategories()
        ];
        extract($data);
        // $this->dataCategorie(2);

        // var_dump($categories);
        require_once '../app/Views/Admin/Category.php';

        // return $this->view("register",$data);
    }

    public function create(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              
        $description=trim(htmlspecialchars($_POST["description"]));
        $type=trim(htmlspecialchars($_POST["type"]));
        $basePoints=trim(htmlspecialchars($_POST["basePoints"]));
        $coefficient=trim(htmlspecialchars($_POST["coefficient"]));    
       if( $this->categorieService->addCategorie( $description, $type, $basePoints, $coefficient)){
        header('Location:/tour-de-maroc/categorie/index');
        exit();
        
        
       }

        }         
    }

    public function delete($id){
        if ($this->categorieService->deleteCategorie( $id)) {
            header('Location:/tour-de-maroc/categorie/index');
            exit();  
        }
    }


    public function update(){
        $id=trim(htmlspecialchars($_POST["categorieId"])) ;

        $description=trim(htmlspecialchars($_POST["editDescription"]));
        $type=trim(htmlspecialchars($_POST["editType"]));
        $basePoints=trim(htmlspecialchars($_POST["editBasePoints"]));
        $coefficient=trim(htmlspecialchars($_POST["editCoefficient"]));    
       if( $this->categorieService->updateCategorie($id, $description, $type, $basePoints, $coefficient)){
        header('Location:/tour-de-maroc/categorie/index');
        exit();
        
       }
         
    }

    public function dataCategorie($id){
        if($categorie = $this->categorieService->getCategorieById($id)){
            $json = [
                "categorie_id" => $categorie->getCategorieId(),
                "description" => $categorie->getDescription(),
                "type" => $categorie->getType(),
                "basePoints" => $categorie->getBasePoints(),
                "coefficient" => $categorie->getCoefficient()
            ];
            echo json_encode($json);
        }
    }



}