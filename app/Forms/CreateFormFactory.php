<?php
    namespace App\Forms;
    use Nette\Application\UI\Form;

    final class CreateFormFactory {
        public function create() {
            $form = new Form;
            
            $form->addText('jmeno', 'Jméno: ')->setRequired('Zadejte prosím jméno');
            $form->addText('prijmeni', 'Příjmení: ')->setRequired('Zadejte prosím příjmení');
            $form->addEmail('email', 'Přihlašovací e-mail: ')->setRequired('Zadejte prosím e-mail');
            $form->addPassword('heslo', 'Heslo:')->setRequired('Zadejte prosím heslo');
            $form->addSubmit('send', 'Registrovat');
            
            return $form;
        }
    }
?>