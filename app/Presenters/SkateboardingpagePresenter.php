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

    public function renderDefault() {
        //$this->template->connect = "Beha";

        $this->vypisProduktu();
    }

    public function vypisProduktu() {
        $produkty = $this->dbManager->vypisProduktu();

        $this->template->produkty = $produkty;
    }
}
