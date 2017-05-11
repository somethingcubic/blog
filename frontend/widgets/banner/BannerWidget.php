<?php

namespace frontend\widgets\banner;

use Yii;
use yii\bootstrap\Widget;

class BannerWidget extends Widget
{
    public $items = [];

    public function init()
    {
        if (empty($this->items)) {
            $this->items = [
                [
                    'label' => 'demo1',
                    'image_url' => '/static/images/banner/b_0.jpg',
                    'url' => ['site/index'],
                    'html' => '',
                    'active' => 'active',
                ],
                [
                    'label' => 'demo1',
                    'image_url' => '/static/images/banner/b_1.jpg',
                    'url' => ['site/index'],
                    'html' => '',
                    'active' => '',
                ],
                [
                    'label' => 'demo1',
                    'image_url' => '/static/images/banner/b_2.jpg',
                    'url' => ['site/index'],
                    'html' => '',
                    'active' => '',
                ]
            ];
        }
    }

    public function run()
    {
        $data['items'] = $this->items;
        return $this->render('index', ['data' => $data]);
    }
}