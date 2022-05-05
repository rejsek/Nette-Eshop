<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Models;

final class SkateboardingpagePresenter extends Nette\Application\UI\Presenter {
    private $database;
    private $dbManager;

    public function __construct(Nette\Database\Explorer $database, Models\dbManager $dbManager) {
        $this->database = $database;
        $this->dbManager = $dbManager;
    }
    
    public function renderDefault(int $page = 1): void {
        $produkty = $this->dbManager->vypisProduktu();

        $lastPage = 0;
        $this->template->produkty = $produkty->page($page, 9, $lastPage);

        $this->template->page = $page;
        $this->template->lastPage = $lastPage;
    }

    public function vypisProduktu() {
        $produkty = $this->dbManager->vypisProduktu();

        $this->template->produkty = $produkty;
    }
}
