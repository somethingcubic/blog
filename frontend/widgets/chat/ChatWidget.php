<?php
/**
 * Created by PhpStorm.
 * User: qiansenmiao
 * Date: 2017/5/10
 * Time: 下午1:55
 */

namespace frontend\widgets\chat;


use frontend\models\FeedForm;
use yii\bootstrap\Widget;

class ChatWidget extends Widget
{
    public function run()
    {
        $feed = new FeedForm();
        $data['feed'] = $feed->getList();
        return $this->render('index', ['data' => $data]);
    }
}