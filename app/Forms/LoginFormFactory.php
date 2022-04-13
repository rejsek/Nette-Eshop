<?php
    namespace App\Forms;
    use Nette\Application\UI\Form;

    final class LoginFormFactory {
        public function create() {
            $form = new Form;
            
            $form->addEmail('email', 'Email: ')->setRequired('Zadejte prosím e-mail');
            $form->addPassword('password', 'Heslo:')->setRequired('Zadejte prosím heslo');           
            $form->addSubmit('send', 'Přihlásit');
            
            return $form;
        }
    }
?>