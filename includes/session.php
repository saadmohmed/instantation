<?php
class Session{

    private $signed_in = false;
    public $user_id;




    function __construct(){
        session_start();
        $this->check_the_sgined_in();
    }

    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user){
        if ($user) {
            $this->user_id = $_SESSION['id'] = $user->id;
            $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

private function check_the_sgined_in(){
   if (isset($_SESSION['id'])) {
       $this->user_id = $_SESSION['id'];
        $this->signed_in = true;
   }else{
    unset($this->user_id);
        $this->signed_in = false;
   }
}


public function logout(){
      unset($this->user_id);
      unset($_SESSION['id']);
      $this->signed_in = false;
      header("Location: ../login.php");
}
}

$session =new Session();
?>