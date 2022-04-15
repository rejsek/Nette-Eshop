<?php
    namespace App\Models;

    use Nette;
    use Nette\Security\SimpleIdentity;

    class myAuthenticator implements Nette\Security\Authenticator {
        private $database;
        private $passwords;

        public function __construct(Nette\Database\Explorer $database, Nette\Security\Passwords $passwords) {
            $this->database = $database;
            $this->passwords = $passwords;
        }

        public function authenticate(string $email, string $passwords):Nette\Security\IIdentity {
            $row = $this->database->table('uzivatel')->where('email', $email)->fetch();
            bdump($row);

            $res = $this->passwords->hash($passwords);
            bdump($res);

            if(!$row) {
                throw new Nette\Security\AuthenticationException('Nenalezen');
            }

            if(!$this->passwords->verify($passwords, $row->heslo)) {
                throw new Nette\Security\AuthenticationException('Spatny heslo');
            }

            return new SimpleIdentity(
                $row->id_uz,
                $row->id_role, // nebo pole více rolí
                ['email' => $row->email]
            );
        }
    }
?>