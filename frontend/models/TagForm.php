<?php
/**
 * Created by PhpStorm.
 * User: qiansenmiao
 * Date: 2017/5/8
 * Time: 下午5:37
 */

namespace frontend\models;

use common\models\Tag;
use Yii;
use yii\base\Model;

class TagForm extends Model
{
    public $id;

    public $tags;

    public function rules()
    {
        return [
            ['tags', 'required'],
            ['tags', 'each', 'rule' => ['string']],
        ];
    }

    /**
     * 保存标签集合
     * @return array
     */
    public function saveTags()
    {
        $ids = [];
        if (!empty($this->tags)) {
            foreach ($this->tags as $tag) {
                $ids[] = $this->_saveTag($tag);
            }
        }
        return $ids;
    }

    /**
     * 保存标签
     * @param $tag
     * @return mixed
     * @throws \Exception
     */
    private function _saveTag($tag)
    {
        $model = new Tag();
        $res = $model->find()->where(['tag_name' => $tag])->one();
        if (!$res) {
            //新建标签
            $model->tag_name = $tag;
            $model->post_num = 1;
            if (!$model->save()) {
                throw new \Exception('保存标签失败');
            }
            return $model->id;
        } else {
            $res->updateCounters(['post_num' => 1]);
        }
        return $res->id;
    }
}