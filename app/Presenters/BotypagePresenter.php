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

    public function renderDefault() {
        $this->vypisProduktu();
    }

    public function vypisProduktu() {
        $boty = $this->dbManager->vypisBot();

        $this->template->boty = $boty;
    }
}
