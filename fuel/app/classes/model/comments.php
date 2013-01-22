<?php

class Model_Comments extends \Orm\Model
{
   protected static $_table_name = 'comments';
   protected static $_primary_key = array('comment_id');
   protected static $_properties = array(
      'comment_id',
      'comment_descr' => array(
	    'data_type' => 'varchar',
	    'label' => 'Comment: '),
      'comment_user_id',
      'comment_video_id',
      'comment_status',
      'comment_post_date'    
   );
   protected static $_belongs_to =
	    array(
                'users' => array(
                    'key_from' => 'comment_user_id',
                    'model_to' => 'Model_Users',
                    'key_to' => 'id'),
                
                'video' => array(
                    'key_from' => 'comment_video_id',
                    'model_to' => 'Model_Video',
                    'key_to' => 'video_id')
             );
     public static function validate($factory) {
	$val = Validation::forge($factory);
	
	//because we want to check if location is valid
	//$val->add_callable("Model_Orm_Location");

	$val->add_field('comment_descr', 'Comment; ', 'required|max_length[255]');
	return $val;
    }

}