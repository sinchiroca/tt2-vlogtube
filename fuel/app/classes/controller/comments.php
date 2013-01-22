<?php

use \Model_Orm_Video;
use \Model_Orm_Passworduser;
use \Model_User;
use \Model_Comments;

class Controller_Comments extends Controller_Template {
    private $_auth;
    private $_user_id;
    
    public function before() {
	parent::before();
	
	$this->_auth = Auth::instance();
	$userids = $this->_auth->get_user_id();
	$this->_user_id = $userids[1];
	
    }
    public function action_index($video_id = null) {
	isset($video_id) and Response::redirect("vlog/list");

	$vlog = Model_Orm_Vidoe::find($video_id, array(
		    "related" =>
		    array("comments")
		));
	//isset($vlog) and Response::redirect("vlog/list");
        
	
        
	    $data['vlog'] = $vlog;
	    $this->template->title = "Comments of: " . $vlog->video_name;
	    $this->template->content = View::forge('comments/index', $data);
   
    }
   
    public function action_create ($id = null) {
        is_null($id) and Response::redirect('vlog/list');
	$data = array(); //to be passed into the view
        
        $video = Model_Orm_Video::find($id);
        //echo $video->video_name;
        
	if (Input::method() == "POST") {
	    $val = Model_Comments::validate('create');
	    if ($val->run()) {
		$newComment = new Model_Comments();
                $newComment->comment_descr = $val->validated("comment_descr");
                $array = Auth::instance()->get_user_id();
                $comment_user_id = $array[1];
                $newComment->comment_user_id = $comment_user_id;
                $unixtime = time();
                $newComment->comment_post_date = $unixtime;
                $newComment->comment_video_id = $id;
                $newComment->comment_status = 1;
                //$uploader = 0;
		//$newVideo->video_user_id = $uploader;
		//first, we save the item without attachments
		$newComment->save();
                
		Response::redirect("vlog/view/" . $newComment->comment_video_id);
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
	   

	    //we assign a random value to the form
	    //$data["form_key"] = md5(mt_rand(1000, 10000));
	} else {
            $view = View::forge('comments/create');
            $view->set('videos', $video);
            $this->template->title = "Adding Comment to `".$video->video_name."`.";    
            //return Response::redirect('comments/create/'.$video->video_id);
            $this->template->content = $view;
//$data["locations"] = Model_Orm_Location::get_locations();
	
	//$this->add_rich_form_scripts();
	
        }
    }
    
    public function action_view($id = null) {
	is_null($id) and Response::redirect('vlog/list');
	/*
        $comments = Model_Comment::find('all', array(
            'where'=> array(array('comment_video_id', $id)),
                'order_by' => array('comment_post_date'=>"desc")));
         * 
         */
       /*
        foreach ($comments as $comment) {
            $username = Model_User::find("username", array(
                'where'=> array(array('id', $comment->comment_user_id))));
            $arr = array($comment, $username); 
        }
        * 
        */
	//is_null($comment) and Response::redirect('vlog/list');
        
        $vlog = Model_Orm_Video::find($video_id, array(
		    "related" =>
		    array("comments")
		));
        foreach ($comments as $comment) {
            $username = Model_User::find("username", array(
                'where'=> array(array('id', $vlog->comments->comment_user_id))));
            $arr = array($comments, $username); 
        }
	$data["comments"] = $event;
	//$comment_view = View::forge("comment/view", $arr);
	//$comment_view->set("comments", $arr);
       
        $this->template->content = View::forge("comment/view", $arr);
        //return Response::redirect('comment/view');
    }

    public function action_delete($id = null) {
	is_null($id) and Response::redirect('event');
	$event = Model_Orm_Event::find($id);
	is_null($event) and Response::redirect('Event');
	$event->delete();
	Session::set_flash("success", "Deleted the item ".$event->title);
	Response::redirect('Event');
    }

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
}
