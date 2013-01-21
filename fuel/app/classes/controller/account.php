<?php

class Controller_Account extends Controller_Template {
    
    public function before() {
        parent::before();
        
        $auth = Auth::instance();
        $user_id = $auth->get_user_id();
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
            Session::set_flash("error", "The username is already taken");
            $is_err = true;
        }

        if (Input::post("password") != Input::post("password_rep")) {
            Session::set_flash("error", "Passwords do not match!");
            $is_err = true;
        }
        
        if ((((Input::post("password")) || (Input::post("password_rep"))) == NULL) || ((Input::post("usermail")) == NULL)) {
            Session::set_flash("error", "Empty passwords and/or usernames are not allowed!");
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
            Session::set_flash("success", "Registration successful!");
            //nothing else to do here
            Response::redirect("/");
        }
    }
    $this->template->page_title = "Register to VlogTube";
    $this->template->page_content = View::forge("account/create");
    }


    
    
    public function action_simpleauth() {
        $data = array();
        // If so, you pressed the submit button. let's go over the steps
        
        if (Input::method()=="POST") {
            // first of all, let's get a auth object
            $auth = Auth::instance();

            // check the credentials. This assumes that you have the previous table created and
            // you have used the table definition and configuration as mentioned above.
            if ($auth->login()) {
                // credentials ok, go right in
                $this->template->page_content = View::forge('account/create');
                }
            } else {
            // Oops, no soup for you. try to login again. Set some values to
        // repopulate the username field and give some error text back to the view
        //$data['username'] = Input::post('username');
                Session::set_flash("error", "User name or password incorrect.");
        //$data['login_error'] = 'Wrong username/password combo. Try again';
            }

            // Show the login form
            $this->template->content = View::forge('account/simpleauth');
    }

    public function action_logout() {
            $auth = Auth::instance();
            $auth->logout();
            Response::redirect("/");
    }
    
}
?>
