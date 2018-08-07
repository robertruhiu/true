<?php

class connectionClass extends mysqli
{
    public $host = "localhost", $dbname = "webcam", $dbpass = "1234567890", $dbuser = "dennis";
    public $con;

    public function __construct()
    {
        if ($this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname)) {
        } else {
            return "<h1>Error while connecting database</h1>";
        }
    }
}
