<?php
use Orm\Model;

class Model_Vlog extends Model
{
    protected static $_table_name = 'video';

    protected static $_belongs_to = array(
        'category' => array(
            'key_from' => 'entry_category_id',
            'model_to' => 'Model_Category',
            'key_to' => 'category_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

    protected static $_properties = array(
        'entry_id',
        'entry_title',
        'entry_excerpt',
        'entry_description',
        'entry_category_id',
        'entry_created_at',
        'entry_updated_at'
    );

    protected static $_primary_key = array('entry_id');

    protected static $_conditions = array(
        'order_by' => array('entry_id' => 'desc')
    );

    protected static $_observers = array(
        'Observer_Blog'
    );
}
