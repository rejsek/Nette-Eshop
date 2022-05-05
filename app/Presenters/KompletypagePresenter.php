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
    
    public function renderDefault(int $page = 1): void {
        $komplety = $this->dbManager->vypisComplete();

        $lastPage = 0;
        $this->template->komplety = $komplety->page($page, 9, $lastPage);

        $this->template->page = $page;
        $this->template->lastPage = $lastPage;
    }

    public function vypisProduktu() {
        $komplety = $this->dbManager->vypisComplete();

        $this->template->komplety = $komplety;
    }
    
}
