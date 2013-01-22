<?php

class Model_Orm_Video extends \Orm\Model
{
   protected static $_table_name = 'video';
   protected static $_primary_key = array('video_id');
   protected static $_properties = array(
      'video_id',
      'video_url' => array(
          'data type' => 'varchar',
          'label' => 'YouTube URL: '
      ),
      'video_name' => array(
	    'data_type' => 'varchar',
	    'label' => 'Video Name: '),
      'video_descr' => array(
	    'data_type' => 'varchar',
	    'label' => 'Video Description: '),
      'video_user_id',
      'video_post_date',
      'video_report'
   );

   protected static $_belongs_to =
	    array(
        //'passwordusers' => array(
	    //'key_from' => 'video_user_id',
	   // 'model_to' => 'Model_Users',
	   // 'key_to' => 'id'),
        'users' => array(
            'key_from' => 'video_user_id',
	    'model_to' => 'Model_Users',
	    'key_to' => 'id')
   );

 
  protected static $_has_many = array(
			    'comments' => array(
				    'key_from' => 'video_id',
				    'model_to' => 'Model_Comments',
				    'key_to' => 'comment_video_id',
				    'cascade_save' => true,
				    'cascade_delete' => false)
				);
   //SHEIT VARBUT VAJADZEES VEEL ARII TAGUS
  
  public static function validate($factory) {
	$val = Validation::forge($factory);
	
	//because we want to check if location is valid
	//$val->add_callable("Model_Orm_Location");

	$val->add_field('video_name', 'Video Name', 'required|max_length[255]');
        $val->add_field('video_url', 'YouTube URL', 'required|max_length[255]');
	$val->add_field('video_descr', 'Video Description', 'required|max_length[255]');
	return $val;
    }

}