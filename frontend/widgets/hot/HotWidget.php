<?php
namespace frontend\widgets\hot;
/**
 * 热门浏览组件
 */
use common\models\Post;
use common\models\PostExtend;
use Yii;
use yii\base\Widget;
use common\models\PostModel;
use yii\helpers\Url;
use common\models\PostExtendModel;
use yii\db\Query;

class HotWidget extends Widget
{
    /**
     * 文章列表的标题
     */
    public $title = '';

    /**
     * 显示条数
     */
    public $limit = 8;

    /**
     * 是否显示更多
     */
    public $more = true;

    /**
     * 是否显示分页
     */
    public $page = true;

    public function run()
    {
        $res = (new Query())
            ->select('a.browser, b.id, b.title')
            ->from(['a'=>PostExtend::tableName()])
            ->join('LEFT JOIN',['b'=>Post::tableName()],'a.post_id = b.id')
            ->where('b.is_valid ='.Post::IS_VALID)
            ->orderBy('browser DESC, id DESC')
            ->limit($this->limit)
            ->all();

        $result['title'] = $this->title?:'热门浏览';
        $result['more'] = Url::to(['post/index','sort'=>'hot']);
        $result['body'] = $res?:[];

        return $this->render('hot',['data'=>$result]);
    }
}