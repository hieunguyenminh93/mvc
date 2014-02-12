<?php
    
    /**
     * Database
     * 
     * @package   
     * @author mvc
     * @copyright nguyen minh hieu
     * @version 2014
     * @access public
     * @see class DB in project opencart;
     */
    class Database{
        private $driver;
        public function __construct($agrs){
            if(file_exists(SYSTEM_DB.'/'.$agrs['driver'].'.php')){
                require_once SYSTEM_DB.'/'.$agrs['driver'].'.php'; 
            }else{
                exit('Error: Could not load database file ' . $agrs['driver'] . '!');
            }
            $this->driver = new $agrs['driver']($agrs['hostname'],$agrs['username'],$agrs['passwd'],$agrs['db']);
        }
        public function query($sql) {
		  return $this->driver->query($sql);
        }
	
        public function escape($value) {
            return $this->driver->escape($value);
        }
	
        public function countAffected() {
            return $this->driver->countAffected();
        }
        public function getLastId() {
            return $this->driver->getLastId();
        }
    }
?>