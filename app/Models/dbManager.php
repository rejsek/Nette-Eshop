<?php
    namespace App\Models;
    use Nette;

    final class dbManager {
        private $database;
        private $passwords;

        public function __construct(Nette\Database\Explorer $database, Nette\Security\Passwords $passwords) {
            $this->database = $database;
            $this->passwords = $passwords;
        }

        /**
         * Metoda pro vypis produktu z kategorie 1, 2, 3, 4, 5, 6
         */
        
        public function vypisProduktu(): Nette\Database\Table\Selection {
            $data = $this->database->table('produkt')->select('*')->where('id_kat', [1,2,3,4,5,6]);

            return $data;
        }

        /**
         * Metoda pro vypis produktu z kategorie boty - id 7
         */
        
        public function vypisBot(): Nette\Database\Table\Selection {
            $data = $this->database->table('produkt')->select('*')->where('id_kat', 7);
        
            return $data;
        }

        /**
         * Metoda pro vypis produktu z kategorie komplety - id 8
         */
        
        public function vypisComplete(): Nette\Database\Table\Selection {
            $data = $this->database->table('produkt')->select('*')->where('id_kat', 8);
        
            return $data;
        }

        /**
         * Metoda pro zobrazeni detailu produktu na zaklade vstupniho id
         * 
         * @param $id_pr: id produktu
         */
        
        public function detailProduktu($id_pr) {
            $detail = $this->database->table('produkt')->where('id_pr', $id_pr)->fetchAll();

            return $detail;
        }

        /**
         * Metoda pro přidání uživatele do databáze
         * 
         * @param $jmeno: jmeno uzivatele
         * @param $prijmeni: prijmeni uzivatele
         * @param $email: email uzivatele
         * @param $heslo: heslo uzivatele
         */
        
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

        /**
         * Metoda pro přidání produktu do databáze
         * 
         * @param $data: data získaná z formuláře
         */
        
        public function vlozProduct($data) {
            bdump($data);

            $this->database->table('produkt')->insert($data);
        }

        /**
         * Metoda vrací celkový počet produktů
         */
    }
?>