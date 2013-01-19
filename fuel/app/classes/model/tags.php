<?php
//SHIS NAV PABEIGTS UN NEZINU VAI PABEIGSIM
class Model_Tags extends \Orm\Model
{
   protected static $_table_name = 'tags';
   protected static $_primary_key = array('tag_id');
   protected static $_properties = array(
      'comment_id',
      'comment_descr' => array(
	    'data_type' => 'varchar',
	    'label' => 'Comment Description: ')
   );
   /*
   protected static $_has_many = array(
			    'entries' => array(
				    'key_from' => 'category_id',
				    'model_to' => 'Model_Blog',
				    'key_to' => 'entry_category_id',
				    'cascade_save' => true,
				    'cascade_delete' => false)
				);
   protected static $_has_many = array(
			    'entries' => array(
				    'key_from' => 'category_id',
				    'model_to' => 'Model_Blog',
				    'key_to' => 'entry_category_id',
				    'cascade_save' => true,
				    'cascade_delete' => false)
				);
    * 
    */
}