<?php
namespace PositionUpdate;

use Common\Auth;
use Common\BaseClient;

/**
 * @author: d.larchikov <d.larchikov@b2b-center.ru>
 */
class Client extends BaseClient
{
    const WSDL_URL = 'https://www.b2b-center.ru/soap_nsi/PositionUpdate?wsdl';

    public function run()
    {
        $positionCreate = new Position();
        $positionCreate->name = 'Краткое имя позиции';
        $positionCreate->full_name = 'Полное имя позиции';
        $positionCreate->import_id = 'DB-157'; // ID позиции из Вашей базы данных
        $positionCreate->unit_name = 'кг'; // Единицы изменения в любом виде

        $auth = new Auth();
        $auth->login = 'login';
        $auth->password = 'password';

        $request = new Request();
        $request->auth = $auth;
        $request->positionUpdate = $positionCreate;

        $this->process($request);
    }
}
