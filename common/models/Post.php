<?php

namespace common\models;

use Yii;
use common\models\base\BaseModel;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $summary
 * @property string $content
 * @property string $label_img
 * @property integer $cat_id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $is_valid
 * @property integer $created_at
 * @property integer $updated_at
 */
class Post extends BaseModel
{
    const IS_VALID = 1;//已发布
    const NO_VALID = 0;//未发布

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    public function getRelate()
    {
        return $this->hasMany(RelationPostTags::className(), ['post_id' => 'id']);
    }

    public function getExtend()
    {
        return $this->hasOne(PostExtend::className(), ['post_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['cat_id', 'user_id', 'is_valid', 'created_at', 'updated_at'], 'integer'],
            [['title', 'summary', 'label_img', 'user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增ID',
            'title' => '标题',
            'summary' => '摘要',
            'content' => '内容',
            'label_img' => '标签图',
            'cat_id' => '分类id',
            'user_id' => '用户id',
            'user_name' => '用户名',
            'is_valid' => '是否有效：0-未发布 1-已发布',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
