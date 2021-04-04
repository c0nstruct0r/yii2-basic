<?php

namespace app\actions\site;

use app\controllers\SiteController;
use app\models\LoginForm;
use Yii;
use yii\base\Action;
use yii\web\Response;

/**
 * Login action.
 *
 * @return Response|string
 */
class LoginAction
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
        if (!Yii::$app->user->isGuest) {
            return $this->controller->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->controller->goBack();
        }

        $model->password = '';
        return $this->controller->render(
            'login',
            [
                'model' => $model,
            ]
        );
    }

}
