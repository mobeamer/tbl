<?php
class DataPacket
{
    public $errorID = 0;
    public $errorMsg = "";
    public $userAlerts = [];
    public $debug = [];
    public $auth = "";
    public $data = "";
    public $growlMsg="";
    
    function __construct() 
    {
        $this->data = new stdClass();
        $this->auth = new stdClass();
        $this->auth->userID = -1;
        $this->auth->userGuid = "xxx";
    }    

    function addAuth($conn, $userID) 
    {
        $sql = "select * from mb_user where userID = $userID";

        $u = getDataObject($conn, $sql);
        $this->auth = new stdClass();
        $this->auth->userID = $u->userID;
        $this->auth->userGuid = $u->userGuid;
    }


    public function log($msg)
    {
        array_push($this->debug, $msg);
    }

    public function logError($msg)
    {
        $this->errorID = 14;
        $this->errorMsg = $msg;
    }

    public function logUserAlert($msg)
    {
        array_push($this->userAlerts, $msg);
    }

    public function logUserAlertAndError($msg)
    {
        $this->logUserAlert($msg);
        $this->logError($msg);
    }


    public function hasError() {return $this->hadError();}
    public function hadError() 
    {
        return $this->errorID > 0;
    }

    public function merge($out)
    {

        $this->debug = array_merge($this->debug, $out->debug);
        $this->userAlerts = array_merge($this->userAlerts, $out->userAlerts);

        if($this->errorID == 0)
        {
            $this->errorID  = $out->errorID;
            $this->errorMsg = $out->errorMsg;
        }

    }

    public function addGrowl($msg)
    {
        $this->growlMsg = $msg;
    }


    public function generateOutput()
    {
        $out = new stdClass();

        $out->growl = $this->growlMsg;
        
        $out->error = new stdClass();
        
        $out->error->errorID = $this->errorID;
        
        $out->error->errorMsg = $this->errorMsg;
        
        $out->auth = $this->auth;
        
        $out->debug = new stdClass();
        
        $out->data = $this->data;
        
        $out->data->msg = new stdClass();

        $out->data->msg->growl = $this->growlMsg;
    
        $out->debug = $this->debug;
        
        $out->userAlerts = $this->userAlerts;

        
        return json_encode($out);
    }
}
?>