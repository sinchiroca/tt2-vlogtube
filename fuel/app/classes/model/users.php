<?php

class Model_Users extends \Orm\Model
{
   protected static $_table_name = 'users';
   protected static $_primary_key = array('user_id');
   protected static $_properties = array(
      'user_id',
      'user_name' => array(
	    'data_type' => 'varchar',
	    'label' => 'Username: '),
      'user_role',
      'user_email' => array(
	    'data_type' => 'varchar',
	    'label' => 'E-mail: ')
   );
   
   protected static $_has_many = array(
			    'video' => array(
				    'key_from' => 'user_id',
				    'model_to' => 'Model_Video',
				    'key_to' => 'video_user_id',
				    'cascade_save' => true,
				    'cascade_delete' => false)
				);
   protected static $_has_many = array(
			    'comments' => array(
				    'key_from' => 'user_id',
				    'model_to' => 'Model_Comments',
				    'key_to' => 'comment_user_id',
				    'cascade_save' => true,
				    'cascade_delete' => false)
				);
}