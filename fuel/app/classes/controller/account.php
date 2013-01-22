<?php
use \Model_Users;

class Controller_Account extends Controller_Template {
    
    public function before() {
        parent::before();
        
        $this->template->page_search = View::forge('vlog/search');
        $auth = Auth::instance();
        $user_id = $auth->get_user_id();
        if ($user_id[1] != 0) {
        //the user has logged in, we can load a language
            //$user = Model_Users::find($user_id);
            //$this->template->hello = $user->username;
        $lang_pref = $auth->get_profile_fields("language", null);
        if ($lang_pref != null) {
        Config::set("language", $lang_pref);
            }
        } 
        Lang::load("account");
        Lang::load("vlog");
    }
    
    public function action_setlang($lang=null){
    //assumes there is an authenticated user
        if ($lang!=null){
        $auth = Auth::instance();
        $auth->update_user(array("language"=>$lang));
        Response::redirect("vlog/list");
        }
    }
    
    public function action_create() {
        if (Input::method() == "POST") {
            $exist_user = DB::select("id")
                ->from("users")
                ->where("email", "=", Input::post("usermail"))
                ->execute()
                ->as_array();
        $is_err = false;
        if (count($exist_user) > 0) {
            //sorry, the username is taken already :(
            Session::set_flash("error", __('ACTION_CREATE_USERTAKEN'));
            $is_err = true;
        }

        if (Input::post("password") != Input::post("password_rep")) {
            Session::set_flash("error", __('ACTION_CREATE_PASSNOTMATCH'));
            $is_err = true;
        }
        
        if ((((Input::post("password")) || (Input::post("password_rep"))) == NULL) || ((Input::post("usermail")) == NULL)) {
            Session::set_flash("error", __('ACTION_CREATE_PASSEMPTY'));
            $is_err = true;
        }

        if ($is_err == false) {
            //no errors - we can register!
            $verification_key = md5(mt_rand(0, mt_getrandmax()));
            $newid = Auth::instance()->create_user(
            Input::post("usermail"), //username = email
                Input::post("password"),
                Input::post("usermail"),
                1, //simple user
                array("verified" => true,
        "       verification_key" => $verification_key)
            );
            Session::set_flash("success", __('ACTION_CREATE_SUCCESS'));
            //nothing else to do here
            Response::redirect("/");
        }
    }
    $this->template->page_title = __('ACTION_CREATE_TITLE');
    $this->template->page_content = View::forge("account/create");
    }


    
    
    public function action_simpleauth() {
        $data = array();
        // If so, you pressed the submit button. let's go over the steps
        
        if (Input::method() == "POST") {
            // first of all, let's get a auth object
            $auth = Auth::instance();

            // check the credentials. This assumes that you have the previous table created and
            // you have used the table definition and configuration as mentioned above.
            if ($auth->login()) {
                // credentials ok, go right in
                $main_sidebar = View::forge("vlog/sidebar");
                $this->template->page_content = Response::redirect('vlog/list');
                $this->template->page_sidebar = $main_sidebar;
            } else {
            // Oops, no soup for you. try to login again. Set some values to
        // repopulate the username field and give some error text back to the view
        //$data['username'] = Input::post('username');
               //$this->template->page_content = View::forge('account/simpleauth');
                Session::set_flash("error", __('ACTION_SIMPLEAUTH_WRONG'));
        //$data['login_error'] = 'Wrong username/password combo. Try again';
            }
                
        }else{   // Show the login form
            $main_sidebar = View::forge("vlog/sidebar");
            $this->template->page_content = View::forge('account/simpleauth');
            $this->template->page_sidebar = $main_sidebar; 
        }
    }

    public function action_logout() {
            $auth = Auth::instance();
            $auth->logout();
            Response::redirect("/");
    }
    
}
?>
