<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Forms;
use Nette\Application\UI\Form;
use App\Models;


final class PrihlasitPresenter extends Nette\Application\UI\Presenter {
    private $loginForm;
    private $authenticator;
    
    public function __construct(Forms\LoginFormFactory $loginForm, Models\myAuthenticator $authenticator) {
        $this->loginForm = $loginForm;
        $this->authenticator = $authenticator;
    }
    
    public function renderDefault() {
        //$this->template->pozdrav = "Funguje";
    }

    public function createComponentLoginForm(): Form {
        $form = $this->loginForm->create();
        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void {
        try {
            $user = $this->getUser();
            $user->setAuthenticator($this->authenticator);
            $user->login($data->email, $data->password);

            $this->flashMessage('Byl jste úspěšně registrován.');
            $this->redirect('Homepage:');
        } catch(Nette\Security\AuthenticationException $e) {
            $this->flashMessage('Spatne udaje.');
            bdump($data);
        }
        
        /*$data->name;
        $data->password;*/
    }

    public function actionOut() {
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení');
        $this->redirect('Homepage:');
    }
}
?>