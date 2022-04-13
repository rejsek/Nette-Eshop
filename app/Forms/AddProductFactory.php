<?php
    namespace App\Forms;
    use Nette\Application\UI\Form;

    final class AddProductFactory {
        public function create() {
            $form = new Form;
            
            $form->addText('nazev_pr', 'Název produktu: ')->setRequired('Zadejte prosím název produktu');
            $form->addText('obrazek', 'URL obrázku: ')->setRequired('Zadejte prosím URL adresu obrázku');
            $form->addTextArea('popis', 'Popis produktu: ')->setRequired('Zadejte prosím popis produktu');
            $form->addInteger('cena', 'Cena:')->setRequired('Zadejte prosím cenu produktu');
            $form->addInteger('pocet_ks', 'Počet kusů:')->setRequired('Zadejte prosím počet kusů');
            $form->addInteger('id_kat', 'ID kategorie:')->setRequired('Zadejte prosím ID kategorie')->addRule($form::RANGE, 'ID musí být v rozsahu mezi %d a %d.', [0, 10]);
            $form->addSubmit('send', 'Přidat');
            
            return $form;
        }
    }
?>