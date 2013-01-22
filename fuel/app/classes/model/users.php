<?php

class Model_Users extends \Orm\Model
{
   protected static $_table_name = 'users';
   protected static $_primary_key = array('id');
   protected static $_properties = array(
      'id',
      'username' => array(
        'data_type' => 'varchar',
	    'label' => 'Username: '
        ),
      'password' => array(
           'data_type' => 'varchar',
           'label' => 'Password: '
        ),
      'group',
      'email' => array(
	    'data_type' => 'varchar'),
      'last_login',
      'login_hash' => array(
	    'data_type' => 'varchar'),
      'profile_fields' => array(
	    'data_type' => 'text'),
      'created_at'
   );
   
   protected static $_has_many = array(
			    'video' => array(
				    'key_from' => 'id',
				    'model_to' => 'Model_Orm_Video',
				    'key_to' => 'video_user_id',
				    'cascade_save' => true,
				    'cascade_delete' => false),
			    'comments' => array(
				    'key_from' => 'id',
				    'model_to' => 'Model_Comments',
				    'key_to' => 'comment_user_id',
				    'cascade_save' => true,
				    'cascade_delete' => false)
			);
}