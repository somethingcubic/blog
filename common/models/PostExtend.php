<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%post_extends}}".
 *
 * @property integer $id
 * @property integer $post_id
 * @property integer $browser
 * @property integer $collect
 * @property integer $praise
 * @property integer $comment
 */
class PostExtend extends \common\models\base\BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post_extends}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'browser', 'collect', 'praise', 'comment'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'post_id' => '文章id',
            'browser' => '浏览量',
            'collect' => '收藏量',
            'praise' => '点赞',
            'comment' => '评论',
        ];
    }

    /**
     * 更新文章统计
     * @param $cond
     * @param $attribute
     * @param $num
     */
    public function upCounter($cond, $attribute, $num)
    {
        $counter = $this->findOne($cond);
        if (!$counter) {
            $this->setAttributes($cond);
            $this->$attribute = $num;
            $this->save();
        } else {
            $countData[$attribute] = $num;
            $counter->updateCounters($countData);
        }

    }
}
