<?php

Class ExampleController extends Controller {

    public $layout = "backend";// กำหนดให้แสดง templates ตามต้องการ ทั้งหน้า

    public function actionSql_dataprovider() {
        //Comment
        //SqldataProvider คือ การเขียน Sql เองเพื่อเอาไปทำ DataProvider เพื่อไปใช้ใน GrideView

        $count = Yii::app()->db->createCommand('SELECT COUNT(*) FROM mas_menu')->queryScalar();
        $query = "SELECT menu_id AS id,menu_name,menu_url,use_name,use_lname
                    FROM mas_menu m 
                    INNER JOIN user u ON m.create_by = u.use_id ";

        $dataProvider = new CSqlDataProvider($query, array(
            'totalItemCount' => $count,
            'sort' => array(
                'attributes' => array(
                    'id', 'menu_name', 'menu_url', //กำหนัดว่าจะให้ ฟิวส์ไหน เรียงลำดับ บน -> ล่าง,ล่าง -> บน
                ),
            ),
            'pagination' => array(
                'pageSize' => 2, //จำนวนต่อหน้า
            ),
        ));
        
        $data['header'] = "";
        $data['provider'] = $dataProvider;
        $this->render('index', $data);
    }

}
