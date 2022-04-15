<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Forms;
use Nette\Application\UI\Form;
use App\Models;


final class PridatProductPresenter extends Nette\Application\UI\Presenter {
    private $addForm;
    private $database;
    
    public function __construct(Forms\AddProductFactory $addForm, Models\dbManager $database) {
        $this->addForm = $addForm;
        $this->database = $database;
    }

    /**
     * Metoda zobrazující formulář pro přidání produktu
     */
    
    public function createComponentAddForm(): Form {
        $form = $this->addForm->create();
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    /**
     * Metoda, která proběhne po stisku tlačítka u formuláře
     * Pošle data do dbManageru
     */
    
    public function formSucceeded(Form $form, $data): void {
        $this->flashMessage('Přidáno');
        $this->database->vlozProduct($data);
        $this->redirect('Homepage:');
        bdump($data);
    }
}
?>