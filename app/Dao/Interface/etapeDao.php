<?php 
    namespace App\Dao\Interface;

    use App\Model\Etape;


    interface EtapeDao{
        public function getAll() : array;
        public function getById(int $id) : Etape;
        public function save(Etape $etape) : bool;
        public function update(Etape $etape) : bool;
        public function delete(Etape $etape) : bool;
    }

?>