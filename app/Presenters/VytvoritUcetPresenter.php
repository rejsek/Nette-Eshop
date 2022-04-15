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
    
    public function renderDefault() {
        //$this->template->pozdrav = "Funguje";
    }

    public function createComponentCreateForm(): Form {
        $form = $this->createForm->create();
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void {
        $this->flashMessage('Účet byl vytvořen.');
        
        /*$passwords = $data->heslo;
        $hash = $this->passwords->hash($passwords);
        
        $replacePassword = array('3' => $hash);
        
        $data = array_replace($replacePassword);
        
        bdump($data);*/
        $this->database->vlozUzivateleDoDB($data->jmeno, $data->prijmeni, $data->email, $data->heslo);
        $this->redirect('Homepage:');
    }
}
?>