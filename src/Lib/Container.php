<?php

$sc= new Lib\ContainerBuilder();

$sc->set('request',new Lib\Request);
$sc->set('DbConnection',new Lib\DbPDO(Lib\Config::get('connectionDB')));

$sc->set('repasitory_man',new Lib\RepasitoryManager($sc->get('DbConnection')));



return $sc;