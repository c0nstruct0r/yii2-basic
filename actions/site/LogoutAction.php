<?php

namespace app\actions\site;

use app\controllers\SiteController;
use Yii;
use yii\base\Action;
use yii\web\Response;

/**
 * Logout action.
 *
 * @return Response
 */
class LogoutAction
    extends Action
{
    public function __construct(
        string $id,
        SiteController $controller,
        array $config = []
    ) {
        parent::__construct($id, $controller, $config);
    }

    public function run()
    {
        Yii::$app->user->logout();
        return $this->controller->goHome();
    }

}
