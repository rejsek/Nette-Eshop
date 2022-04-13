<?php
    namespace App\Models;
    use App\Forms;
    use Nette;

    final class dbManager {
        private $database;
        private $createForm;

        public function __construct(Nette\Database\Explorer $database, Forms\CreateFormFactory $createForm) {
            $this->database = $database;
            $this->createForm = $createForm;
        }

        public function vypisProduktu() {
            $data = $this->database->table('produkt')->select('*')->where('id_kat', [1,2,3,4,5,6])->fetchAll();

            return $data;
        }

        /**
         * Metoda pro vypis produktu z kategorie boty - id 7
         */
        
        public function vypisBot() {
            $data = $this->database->table('produkt')->select('*')->where('id_kat', 7)->fetchAll();
        
            return $data;
        }

        public function detailProduktu($id_pr) {
            $detail = $this->database->table('produkt')->where('id_pr', $id_pr)->fetchAll();

            return $detail;
        }

        public function vlozUzivateleDoDB($data) {
            bdump($data);

            $this->database->table('uzivatel')->insert($data);
        }

        public function vlozProduct($data) {
            bdump($data);

            $this->database->table('produkt')->insert($data);
        }
    }
?>