<?php
 
namespace console\controllers;
 
use yii\console\Controller;
use common\models\Stock;
use common\models\Daily_stock_on_hand;
use yii\db\Expression;
 
/**
 * Test controller
 */
class StockController extends Controller {
 
    public function actionIndex() {
        echo "cron service runnning";
    }
 
    public function actionSave_daily_stockonhand(){

        $model = Stock::find()->limit(10)->all();

        foreach($model as $row){
            $model_dailyStockOnHand = new Daily_stock_on_hand();
            $model_dailyStockOnHand->ProductID = $row->ProductID;
            $model_dailyStockOnHand->OnHand = $row->Onhandbal;
            $model_dailyStockOnHand->Date = new Expression('NOW()');
            $model_dailyStockOnHand->save();


        }
    }

}