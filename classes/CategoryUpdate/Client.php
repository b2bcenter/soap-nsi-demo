<?php
namespace CategoryUpdate;

use Common\Auth;
use Common\BaseClient;

/**
 * @author: d.larchikov <d.larchikov@b2b-center.ru>
 */
class Client extends BaseClient
{
    const WSDL_URL = 'https://www.b2b-center.ru/soap_nsi/CategoryUpdate?wsdl';

    public function run()
    {
        $categoryUpdate = new Category();
        $categoryUpdate->title = 'Новое имя категории';
        $categoryUpdate->id_to_import = 'Test1'; // ID из Вашей БД.
        $categoryUpdate->type = 1; // 1 - товар, 2 - услуга

        $auth = new Auth();
        $auth->login = 'login'; // Логин от учетной записи торговой площадки b2b-center.ru
        $auth->password = 'password';  // Пароль от учетной записи торговой площадки b2b-center.ru

        $request = new Request();
        $request->auth = $auth;
        $request->categoryUpdate = $categoryUpdate;

        $this->process($request);
    }
}
