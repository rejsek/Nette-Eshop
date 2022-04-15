<?php
    namespace App\Models;
    use App\Forms;
    use Nette;

    final class dbManager {
        private $database;
        private $createForm;
        private $passwords;

        public function __construct(Nette\Database\Explorer $database, Forms\CreateFormFactory $createForm, Nette\Security\Passwords $passwords) {
            $this->database = $database;
            $this->createForm = $createForm;
            $this->passwords = $passwords;
        }

        /**
         * Metoda pro vypis produktu z kategorie 1, 2, 3, 4, 5, 6
         */
        
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

        /**
         * Metoda pro vypis produktu z kategorie komplety - id 8
         */
        
        public function vypisComplete() {
            $data = $this->database->table('produkt')->select('*')->where('id_kat', 8)->fetchAll();
        
            return $data;
        }

        /**
         * Metoda pro zobrazeni detailu produktu na zaklade vstupniho id
         */
        
        public function detailProduktu($id_pr) {
            $detail = $this->database->table('produkt')->where('id_pr', $id_pr)->fetchAll();

            return $detail;
        }

        public function vlozUzivateleDoDB($jmeno, $prijmeni, $email, $heslo) {
            //bdump($data);

            //$this->database->table('uzivatel')->insert($data);
            $this->database->table('uzivatel')->insert([
                "jmeno" => $jmeno,
                "prijmeni" => $prijmeni,
                "email" => $email,
                "heslo" => $this->passwords->hash($heslo)
            ]);
        }

        public function vlozProduct($data) {
            bdump($data);

            $this->database->table('produkt')->insert($data);
        }
    }
?>