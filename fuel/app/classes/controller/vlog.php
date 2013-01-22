<?php

use \Model_Orm_Video;
use \Model_Orm_Passworduser;
use \Model_Comments;

class Controller_Vlog extends Controller_Template {
    private $_auth;
    private $_user_id;
    
    public function before() {
	parent::before();
	
	$this->_auth = Auth::instance();
	$userids = $this->_auth->get_user_id();
	$this->_user_id = $userids[1];
        $this->template->page_search = View::forge('vlog/search');
	
    }
    /**
     * Demonstrates reading data through an ORM model
     */
    public function action_index() {

	$main_content = View::forge("account/simpleauth");
        $main_sidebar = View::forge("vlog/sidebar");

	$this->template->page_content = $main_content;
        $this->template->page_sidebar = $main_sidebar;
    }

    public function action_create() {
	if ( ! Auth::has_access('vlog.create') ) {
	//if ($this->_user_id == 0){
	    Session::set_flash("error", "Only registered users may create events");
	    Response::redirect("/") and die();
	}
	$data = array(); //to be passed into the view

	if (Input::method() == "POST") {
	    $val = Model_Orm_Video::validate('create');
	    if ($val->run()) {
		$newVideo = new Model_Orm_Video();
                $newVideo->video_url = $val->validated("video_url");
		$newVideo->video_name = $val->validated("video_name");
		$newVideo->video_descr = $val->validated("video_descr");
                $array = Auth::instance()->get_user_id();
                $video_user_id = $array[1];
                $newVideo->video_user_id = $video_user_id;
                $unixtime = time();
                $newVideo->video_post_date = $unixtime; 
                $newVideo->video_report = 0;
		//$uploader = 0;
		//$newVideo->video_user_id = $uploader;
		//first, we save the item without attachments
		$newVideo->save();

		Session::set_flash("success", "New video uploaded: " . $val->validated("video_name"));
		Response::redirect("vlog/list/" . $newVideo->video_id);
	    } else {
		//validation did not work. 
		//But still, there may be uploaded files!
		//$errors = $this->try_get_attachments();
		Session::set_flash("error", "ERROR ERROR");
	    }
	    //$this->template->title = "Trying to save an event";
	    //$data["form_key"] = Input::post("form_key");
	//} else {
	    //the first GET request
	    $this->template->title = "Creating new video entry";

	    //we assign a random value to the form
	    //$data["form_key"] = md5(mt_rand(1000, 10000));
	} else {
	//$data["locations"] = Model_Orm_Location::get_locations();
	
	//$this->add_rich_form_scripts();
	$this->template->page_content = View::forge("vlog/create", $data);
        }
    }
    
    
    public function action_list() {
	/*
        if ( ! Auth::has_access('vlog.create') ) {
	//if ($this->_user_id == 0){
	    Session::set_flash("error", "Only registered users may create events");
	    Response::redirect("/") and die();
	}
         * 
         */
        $array = Auth::instance()->get_user_id();
        $video_user_id = $array[1];
       
        $video_model = Model_Orm_Video::find('all', array(
            'where'=> array(array('video_user_id', $video_user_id)),
                'order_by' => array('video_post_date'=>"desc")));
        
        $blabla = View::forge('vlog/list');
        $blabla->set('video_model', $video_model);
        $this->template->page_title = "List of Vlogs";
	$this->template->page_content = $blabla;
        //$this->template->content = View::forge("comments/view");
    }
    
    public function action_view($id = null) {
	is_null($id) and Response::redirect('vlog/create');
	//$vlog = Model_Orm_Video::find($id);
        
        $vlog = Model_Orm_Video::find($id, array( 
            'related'=>array('comments', 'users')
        ));
            
        
	is_null($vlog) and Response::redirect('vlog/create');

	//$data["event"] = $event;
	$vlog_view = View::forge("vlog/view");
	$vlog_view->set("vlog", $vlog);
	$this->template->title = "Viewing Vlog";
	$this->template->page_content = $vlog_view;
    }

    public function action_delete($id = null) {
        $array = Auth::instance()->get_user_id();
        $video_user_id = $array[1];
        $user = Model_Users::find($video_user_id);
        
        if ($user->group != 100 ) {
            Session::set_flash("error", "You are no admin, buddy!!!");
            return Response::redirect('vlog/list');
        } else {
            is_null($id) and Response::redirect('vlog/list');
            $vlog = Model_Orm_Video::find($id);
            is_null($vlog) and Response::redirect('vlog/list');
            $vlog->video_report = 6;
            $vlog->save();
            Session::set_flash("success", "Deleted the item ".$vlog->video_name);
            Response::redirect('vlog/list');
        }
    }
    /**
     * since we have "rich form", additional scripts
     * and stylesheets are needed
     */
    private function add_rich_form_scripts() {

	$this->template->libs_js = array(
	    "http://code.jquery.com/jquery-1.8.2.js",
	    "http://code.jquery.com/ui/1.9.1/jquery-ui.js",
	    "jquery-ui-timepicker-addon.js",
	    "http://cdn.aloha-editor.org/latest/lib/require.js"
	);
	$this->template->libs_css = array(
	    "http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css",
	    "datetimepicker.css",
	    "http://cdn.aloha-editor.org/latest/css/aloha.css"
	);
    }
    
    public function action_search()
    {
        $data = array();
        $data = "%".Input::post("search_keyword")."%";
        $is_err = false;
        if (!Input::post("search_keyword")) {
            Session::set_flash("error", __('ACTION_SEARCH_INPUT'));
            $is_err = true;
        }
        
        $video_model = array();
        if (!$is_err){
            $video_model = Model_Orm_Video::find('all', array(
                'where'=> array(array('video_name','LIKE', $data)),
                'order_by' => array('video_post_date'=>"desc")));
        }
            //$video_model = DB::select()->FROM('video')->WHERE('video_name', 'like', $data)->execute();

        
            $blabla = View::forge('vlog/list', $video_model);
            $blabla->set('video_model', $video_model);
            $this->template->page_title = "List of Vlogs";
            $this->template->page_content = $blabla;
            $this->template->page_search = View::forge('vlog/search');
        
    }
    
}