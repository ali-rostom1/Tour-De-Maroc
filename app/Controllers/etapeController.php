<?php
namespace  App\Controllers;

use App\Service\EtapeService;
use Core\Controller ;
use App\Model\Etape;
use App\Service\CategorieService;


class EtapeController extends Controller{

    private $etapeService;
    private $categorieService;


    public function __construct()
    {
        $this->etapeService = new EtapeService();
        $this->categorieService = new CategorieService();

        
    }


    
    public function index(){
        //  $this->dataEtape(6);
        $data = [
            "etapes" => $this->etapeService->getAllEtape(),
            "categories" => $this->categorieService->getAllCategories()

        ];
        extract($data);
        require_once '../app/Views/Admin/Etapes.php';



    }

    public function create(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
              
        $description=trim(htmlspecialchars($_POST["description"]));
        $lieuArrivee=trim(htmlspecialchars($_POST["lieuArrivee"]));
        $lieuDepart=trim(htmlspecialchars($_POST["lieuDepart"]));
        $categorie_id=trim(htmlspecialchars($_POST["categorie_id"]));    
        $distance=trim(htmlspecialchars($_POST["distance"]));    
        $nom=trim(htmlspecialchars($_POST["nom"]));    

       if( $this->etapeService->create($nom,$distance,$lieuDepart,$lieuArrivee,$description,$categorie_id)){
            $this->index();
            exit();
        
        
       }

        }         
    }

    public function delete($id){
        if ($this->etapeService->delete( $id)) {
            header('Location:/tour-de-maroc/etape/index');
            exit();  
        }
    }


    public function update(){

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id=trim(htmlspecialchars($_POST["etapeId"])) ;

              
            $description=trim(htmlspecialchars($_POST["editDescription"]));
            $lieuArrivee=trim(htmlspecialchars($_POST["editLieuArrivee"]));
            $lieuDepart=trim(htmlspecialchars($_POST["editLieuDepart"]));
            $categorie_id=trim(htmlspecialchars($_POST["editCategorie_id"]));    
            $distance=trim(htmlspecialchars($_POST["editDistance"]));    
            $nom=trim(htmlspecialchars($_POST["editNom"]));    
    
           if( $this->etapeService->update($id,$nom,$distance,$lieuDepart,$lieuArrivee,$description,$categorie_id)){
                $this->index();
                exit();
            
            
           }
    
            }  
         
    }

    public function dataEtape($id){
        header('Content-Type: application/json');
        if($etape = $this->etapeService->getById($id)){
            $json = $etape->toArray();
            echo json_encode($json);
            die;

            
        }
    }



}