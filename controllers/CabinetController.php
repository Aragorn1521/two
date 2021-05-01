<?php

Class CabinetController
{
    public function actionIndex()
    {
        $userId = User::chekLogged();
        echo $userId;
        require_once ROOT.'/views/cabinet/index.php';
        return true;
    }
}

