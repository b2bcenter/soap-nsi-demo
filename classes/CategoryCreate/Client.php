<?php
namespace CategoryCreate;

use Common\Auth;
use Common\BaseClient;

/**
 * @author: d.larchikov <d.larchikov@b2b-center.ru>
 */
class Client extends BaseClient
{
    const WSDL_URL = 'https://www.b2b-center.ru/soap_nsi/CategoryCreate?wsdl';

    public function run()
    {
        $categoryCreate = new Category();
        $categoryCreate->title = 'Новая категория';
        $categoryCreate->id_to_import = 'Test1'; // ID из Вашей БД.
        // $categoryCreate->parent_import_id = '100050'; // Если нужно создать вложеную категорию
        // $categoryCreate->code = 'H1010'; // Раскоментируйте если нужно задать свои
        $categoryCreate->type = 1; // 1 - товар, 2 - услуга

        $auth = new Auth();
        $auth->login = 'login'; // Логин от учетной записи торговой площадки b2b-center.ru
        $auth->password = 'password';  // Пароль от учетной записи торговой площадки b2b-center.ru

        $request = new Request();
        $request->auth = $auth;
        $request->categoryCreate = $categoryCreate;

        $this->process($request);
    }
}
