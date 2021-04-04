<?php

namespace app\actions\site;

use app\controllers\SiteController;
use app\models\ContactForm;
use Yii;
use yii\base\Action;
use yii\web\Response;

/**
 * Displays contact page.
 *
 * @return Response|string
 */
class ContactAction
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
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->controller->refresh();
        }
        return $this->controller->render(
            'contact',
            [
                'model' => $model,
            ]
        );
    }

}
