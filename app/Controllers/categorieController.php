<?php
namespace  App\Controllers;

use Core\Controller ;
use App\Service\CategorieService;
use App\Model\Categorie;


class CategorieController extends Controller{

    private $CategorieService;

    public function __construct()
    {
        $this->CategorieeService = new CategorieService();
        
    }

    
    
    public function index(){
        $data = [
            "categories" => $this->categirieService->getAllCategories()
        ];
        require_once '../app/Views/Admin/Categorie.php';

        // return $this->view("register",$data);
    }

    public function create(){
        $nom=trim(htmlspecialchars($_POST["nom"])) ;
        $description=trim(htmlspecialchars($_POST["description"]));
        $description=trim(htmlspecialchars($_POST["type"]));
        $description=trim(htmlspecialchars($_POST["basePoints"]));
        $description=trim(htmlspecialchars($_POST["coefficient"]));    
       if( $this->CategorieeService->addCategorie($nom, $description, $type, $basePoints, $coefficient)){
        
       }
         
    }

    public function update(){
        $id=trim(htmlspecialchars($_POST["id"])) ;

        $nom=trim(htmlspecialchars($_POST["nom"])) ;
        $description=trim(htmlspecialchars($_POST["description"]));
        $type=trim(htmlspecialchars($_POST["type"]));
        $basePoints=trim(htmlspecialchars($_POST["basePoints"]));
        $coefficient=trim(htmlspecialchars($_POST["coefficient"]));    
       if( $this->CategorieeService->addCategorie($nom, $description, $type, $basePoints, $coefficient)){
        
       }
         
    }

}