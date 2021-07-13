<?php
declare(strict_types = 1);

namespace api\modules\v2;

use yii\base\Module as BaseModule;
use api\modules\v2\salesDept;
use api\modules\v2\advertDept;
use api\modules\v2\projectDevDept;

class Module extends BaseModule
{
    public function init(): void
    {
        parent::init();

        $this->modules = [
            //营销部
            'sales-dept' => [
                'class' => salesDept\Module::class
            ],
            //广告部
            'advert-dept' => [
                'class' => advertDept\Module::class,
            ],
            //项目拓展部
            'project-dev-dept' => [
                'class' => projectDevDept\Module::class,
            ]
        ];
    }
}
