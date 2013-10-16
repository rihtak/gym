<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property integer $customer_id
 * @property string $customer_ic_no
 * @property string $first_name
 * @property string $last_name
 * @property string $email_id
 * @property integer $gender
 * @property integer $blood_group
 * @property string $date_of_birth
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $country
 * @property string $pincode
 * @property string $created_date
 * @property string $modified_date
 *
 * The followings are the available model relations:
 * @property CustomerAdmissons[] $customerAdmissons
 */
class Customers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_ic_no, first_name', 'required'),
			array('gender, blood_group', 'numerical', 'integerOnly'=>true),
			array('customer_ic_no, first_name, last_name, email_id, address_1, address_2, city, country, pincode', 'length', 'max'=>255),
			array('date_of_birth, created_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('customer_id, customer_ic_no, first_name, last_name, email_id, gender, blood_group, date_of_birth, address_1, address_2, city, country, pincode, created_date, modified_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'customerAdmissons' => array(self::HAS_MANY, 'CustomerAdmissons', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'customer_id' => 'Customer',
			'customer_ic_no' => 'Customer Ic No',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email_id' => 'Email',
			'gender' => 'Gender',
			'blood_group' => 'Blood Group',
			'date_of_birth' => 'Date Of Birth',
			'address_1' => 'Address 1',
			'address_2' => 'Address 2',
			'city' => 'City',
			'country' => 'Country',
			'pincode' => 'Pincode',
			'created_date' => 'Created Date',
			'modified_date' => 'Modified Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('customer_ic_no',$this->customer_ic_no,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email_id',$this->email_id,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('blood_group',$this->blood_group);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('address_1',$this->address_1,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
