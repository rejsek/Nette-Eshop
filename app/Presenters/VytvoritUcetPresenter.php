<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Forms;
use Nette\Application\UI\Form;
use App\Models;
use Nette\Security\SimpleIdentity;


final class VytvoritUcetPresenter extends Nette\Application\UI\Presenter {
    private $createForm;
    private $database;
    private $passwords;
    
    public function __construct(Forms\CreateFormFactory $createForm, Models\dbManager $database, Nette\Security\Passwords $passwords) {
        $this->createForm = $createForm;
        $this->database = $database;
        $this->passwords = $passwords;
    }

    /**
     * Metoda která vytvoří formulář pro vytvoření účtu
     */
    
    public function createComponentCreateForm(): Form {
        $form = $this->createForm->create();
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }


    /**
     * Metoda zpracuje data a pošle do dbManageru 
     */

    public function formSucceeded(Form $form, $data): void {
        $this->flashMessage('Účet byl vytvořen.');
        $this->database->vlozUzivateleDoDB($data->jmeno, $data->prijmeni, $data->email, $data->heslo);
        $this->redirect('Homepage:');
    }
}
?>