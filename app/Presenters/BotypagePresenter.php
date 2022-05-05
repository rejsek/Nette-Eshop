<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Models;

final class BotypagePresenter extends Nette\Application\UI\Presenter {
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
        $boty = $this->dbManager->vypisBot();

        $lastPage = 0;
        $this->template->boty = $boty->page($page, 9, $lastPage);

        $this->template->page = $page;
        $this->template->lastPage = $lastPage;
    }

    public function vypisProduktu() {
        $boty = $this->dbManager->vypisBot();

        $this->template->boty = $boty;
    }
}
