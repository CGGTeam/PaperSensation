<?php
    /**
     * Created by PhpStorm.
     * User: antoi
     * Date: 2018-05-01
     * Time: 10:36 PM
     */
    require_once "Utilitaires/iRetour.php";
    class JSONView implements iRetour {
        private $model;

        public function __construct($model = null) {
            $this->model = $model;
        }
        
        public function afficher() {
            log_fichier("wtf");
            ob_end_clean();
            header('Content-Type: application/json');
            echo $this->model;
        }
    }