<?php

namespace app\actions\site;

use app\controllers\SiteController;
use yii\base\Action;

/**
 * Displays about page.
 *
 * @return string
 */
class AboutAction
    extends Action
{
    public function __construct(
        string $id,
        SiteController $controller,
        array $config = []
    ) {
        parent::__construct($id, $controller, $config);
    }

    public function run(): string
    {
        return $this->controller->render('about');
    }

}
