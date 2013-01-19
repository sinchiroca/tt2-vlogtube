<?php

class Model_Comments extends \Orm\Model
{
   protected static $_table_name = 'comments';
   protected static $_primary_key = array('comment_id');
   protected static $_properties = array(
      'comment_id',
      'comment_descr' => array(
	    'data_type' => 'varchar',
	    'label' => 'Comment Description: '),
      'comment_user_id',
      'comment_video_id',
      'comment_post_date'    
   );
   protected static $_belongs_to =
	    array(
        'users' => array(
	    'key_from' => 'comment_user_id',
	    'model_to' => 'Model_Users',
	    'key_to' => 'user_id')
   );
   protected static $_belongs_to =
	    array(
        'video' => array(
	    'key_from' => 'comment_video_id',
	    'model_to' => 'Model_Video',
	    'key_to' => 'video_id')
   );
   
}