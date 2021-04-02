<?php

namespace app\controllers;

use Yii;
use app\models\Guests;
use app\models\Events;
use app\models\Guestbook;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\db\QueryBuilder;

/**
 * AdminController implements the CRUD actions for Guests model.
 */
class AdminController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Guests models.
     * @return mixed
     */

    /**
     * Displays a single Guests model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Guests model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Guests();
        $events = Events::find()->all();

        $formData = Yii::$app->request->post();

        if ($model->load($formData) && $model->save()) {

                $guest_id = $model->id;
                if(!empty($formData['Guests']['event'])){

                    foreach($formData['Guests']['event'] as $value){
                        $guestbook = new Guestbook();

                        $guestbook->guest_id = $guest_id;
                        $guestbook->event_id = $value;
                        $guestbook->save();

                    }
                }
                Yii::$app->getSession()->setFlash('message', "Record has been saved.");
                return $this->redirect(['guests']);
        }

        return $this->render('guestForm', [
            'model' => $model ,'events' => $events,
        ]);
    }

    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $events = Events::find()->where(['flag_show' => 'Y'])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

                Yii::$app->getSession()->setFlash('message', "Record has been updated.");
                return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'events' => $events,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['guests']);
    }


    protected function findModel($id)
    {
        if (($model = Guests::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionGuests(){

        $guests = Guests::find()->all();
        return $this->render('guest', ['guests' => $guests]);
    }


    //EVENTS CODE
    
    public function actionViewevent($id)
    {
        $model = Events::findOne($id);
        return $this->render('event', ['model' => $model]);
    }

   

    public function actionUpdateevent($id)
    {  

        $model = $this->findModelevent($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->getSession()->setFlash('message', "Event has been updated.");
            return $this->redirect(['viewevent', 'id' => $model->id]);
        }

        return $this->render('updateEvent', [
            'model' => $model,
        ]);
    }


    public function actionEvents()
    {
        $model = new Events();

        $formData = Yii::$app->request->post();

        if ($model->load($formData) && $model->save()) {

                Yii::$app->getSession()->setFlash('message', "Events has been saved.");
                return $this->redirect(['eventlist']);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('eventForm', [
            'model' => $model,
        ]);
    }

    public function actionEventlist()
    {
        $events = Events::find()->all();
        return $this->render('eventList', ['events' => $events]);
    }

    public function actionDeleteevent($id)
    {

        $have_guest = Guestbook::find($id)->all();
        
        $this->findModelevent($id)->delete();
        return $this->redirect(['eventlist']);
    }

    protected function findModelevent($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRegisterguest($id)
    {
        $query = new \yii\db\Query();
        $result = $query->select('first_name, last_name, phone_number, gender')
                ->from('guestbook')
                ->leftjoin('guests', 'guests.id = guestbook.guest_id')
                ->where([
                    'guestbook.event_id' => $id
                ])
                ->limit(60)
                ->all();

        return $this->render('registerGuest', ['result' => $result]);
    }

    public function Guestbookcount($id)
    {
        $query  = new \yii\db\Query();
        $result = $query->select(['COUNT(guest_id) AS count'])
                ->from('guestbook')
                ->where(['guestbook.event_id' => $id])
                ->all();

            if($result[0]['count'] > 0){
                return true;
            }else{
                return false;
            }
    }
}
