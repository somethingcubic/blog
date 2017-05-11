<?php

namespace common\models;

use common\models\base\BaseModel;
use Yii;

/**
 * This is the model class for table "{{%cats}}".
 *
 * @property integer $id
 * @property string $cat_name
 */
class Cat extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cats}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'cat_name' => '分类名称',
        ];
    }

    public static function getAllCats()
    {
        $cat = ['0' => '暂无分类'];
        $res = self::find()->asArray()->all();
        if ($res) {
            foreach ($res as $k => $list) {
                $cat[$list['id']] = $list['cat_name'];
            }
        }
        return $cat;
    }
}
