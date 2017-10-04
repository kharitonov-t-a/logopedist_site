<?php
namespace app\widgets;

use yii\grid\GridView;
use Yii;
use Closure;
use yii\i18n\Formatter;
use yii\base\InvalidConfigException;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\VarDumper;
// use yii\widgets\BaseListView;
// use yii\base\Model;
// use app\models\Messege;
 
class GridView_Messege extends GridView
{
    public function init()
    {
        parent::init();
    }

    /**
     * Renders the data models for the grid view.
     */
    public function renderItems()
    {

        // $model = new Messege();

        // echo $this->render('createMessege', [
        //     'model' => $model,
        // ]);

    	$models = array_values($this->dataProvider->getModels());

        $arrMessege = [];

        foreach ($models as $index => $model) {
        	$arrMessege[] = array(
                "id" => $model["id"],
                "name" => $model["name"], 
                "datemessege" => $model["datemessege"], 
                "messege" => $model["messege"],
                "typemessege" => $model["typemessege"],
                );
        }
        
        return $this->render('messegeList', [
        	'model' => $arrMessege,
        ]);

    }

    public $layout = "{summary}\n{items}\n{pager}";
}


































?>