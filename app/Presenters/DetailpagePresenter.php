<?php
    namespace App\Presenters;
    
    use Nette;
    use App\Models;

    final class DetailpagePresenter extends Nette\Application\UI\Presenter {
        private $database;
        private $dbManager;

        public function __construct(Nette\Database\Explorer $database, Models\dbManager $dbManager) {
            $this->database = $database;
            $this->dbManager = $dbManager;
        }
        
        public function actionShow($id_pr) {
            $detaily = $this->dbManager->detailProduktu($id_pr);

            $this->template->detaily = $detaily;
        }
    }
?>