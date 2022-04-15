<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Models;

final class KompletypagePresenter extends Nette\Application\UI\Presenter {
    private $database;
    private $dbManager;

    public function __construct(Nette\Database\Explorer $database, Models\dbManager $dbManager) {
        $this->database = $database;
        $this->dbManager = $dbManager;
    }

    /**
     * Metoda zobrazuje produkty z databáze
     */
    
    public function renderDefault() {
        $this->vypisProduktu();
    }

    public function vypisProduktu() {
        $komplety = $this->dbManager->vypisComplete();

        $this->template->komplety = $komplety;
    }
    
}
