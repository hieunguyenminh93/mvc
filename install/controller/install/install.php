<?php
class ControllerInstallInstall extends Controller {
	private $error = array ();
	public function running() {
		/*
		 * method to write config to file
		 */
		
		$this->language->load ( '/install' ); // this is ca load from config database;
		$this->document->setTitle ( $this->language->get ( 'text_result_title' ) );
		
		if ($this->validate ()) {
			
			$this->template = TEMPLATE . '/install/install.tpl';
			$this->children = array (
					'common/header',
					'common/title',
					'common/footer' 
			);
			$this->install ();
			$this->response->setOutput ( $this->render () );
		} else {
			
			$this->redirect ( 'index.php?route=inputsetting' );
		}
	}
	private function validate() {
		$dir = dirname ( realpath ( "../index.php" ) );
		if(file_exists($dir . '/config/config.php'))
			return false;
		$er = array ();
		if (! $this->request->post ['hostname']) {
			
			$er ['hostname'] = $this->language->get ( 'error_hostname' );
		}
		if (! $this->request->post ['username']) {
			$er ['username'] = $this->language->get ( 'error_username' );
		}
		/*
		 * if(!$this->request->post['passwd']){ $this->error['passwd'] = ''; } if(!$this->request->post['']){ $this->error[''] = ''; }
		 */
		$this->request->post ['error'] = $er;
		$this->error = $er;
		// print_r($this->error);
		if ($this->error) {
			
			return false;
		}
		return true;
	}
	private function create_config_admin($args){
		$dir = dirname ( realpath ( "../index.php" ) );
		$output .= "define(\"VERSION\",\"2\");\n";
		$output .= "define(\"SYSTEM_CLASS\",\"$dir/system/class\");\n";
		$output .= "define(\"SYSTEM_LIB\",\"$dir/system/library\");\n";
		$output .= "define(\"SYSTEM_DB\",\"$dir/system/database\");\n";
		$output .= "define(\"ENGINEER\", \"$dir/admin\");\n";
		$output .= "define(\"TEMPLATE\", \"$dir/admin/view\");\n";
		$output .= "define(\"LANGUAGE\",\"$dir/admin/language\");\n";
		$output .= "define(\"DB_HOSTNAME\",\"$args[hostname]\");\n";
		$output .= "define(\"DB_USER\",\"$args[username]\");\n";
		$output .= "define(\"DB_PASSWD\",\"$args[passwd]\");\n";
		$output .= "define(\"DB_DRIVER\",\"mysql\");\n";
		$output .= "define(\"DB_DB\",\"$args[db]\");\n";
		// more define here etc....
		$config = fopen ( $dir . '/admin/config.php', 'x' );
		
		fwrite ( $config, "<?php\n" );
		fwrite ( $config, $output );
		fwrite ( $config, "?>" );
		fclose ( $config );
	}
	private function install() {
		// process for install after check validate finished!!!!
		$post = $this->request->post;
		
		if (count ( $post ['error'] ) == 0) {
			// process with no error;
			// data get from user input!!!
			$hostname = $post ['hostname'];
			$username = $post ['username'];
			$passwd = $post ['passwd'];
			$database = $post ['database'];
			// checking enviroment
			$db_conf = array (
					'hostname' => $hostname,
					'username' => $username,
					'passwd' => $passwd,
					'db' => $database,
					'driver' => 'mysql' 
			);
			$connect = new Database ( $db_conf );
			$output = "";
			if ($connect) {
				// define const to write config file
				$dir = dirname ( realpath ( "../index.php" ) );
				$output .= "define(\"VERSION\",\"2\");\n";
				$output .= "define(\"SYSTEM_CLASS\",\"$dir/system/class\");\n";
				$output .= "define(\"SYSTEM_LIB\",\"$dir/system/library\");\n";
				$output .= "define(\"SYSTEM_DB\",\"$dir/system/database\");\n";
				$output .= "define(\"ENGINEER\", \"$dir/engineer\");\n";
				$output .= "define(\"TEMPLATE\", \"$dir/themes\");\n";
				$output .= "define(\"LANGUAGE\",\"$dir/engineer/language\");\n";
				$output .= "define(\"DB_HOSTNAME\",\"$hostname\");\n";
				$output .= "define(\"DB_USER\",\"$username\");\n";
				$output .= "define(\"DB_PASSWD\",\"$passwd\");\n";
				$output .= "define(\"DB_DRIVER\",\"mysql\");\n";
				$output .= "define(\"DB_DB\",\"$database\");\n";
				// more define here etc....
				$config = fopen ( $dir . '/config/config.php', 'x' );
				
				fwrite ( $config, "<?php\n" );
				fwrite ( $config, $output );
				fwrite ( $config, "?>" );
				fclose ( $config );
				//create admin config file
				$this->create_config_admin($db_conf);
				//create database;
				$file = $dir.'/install/mysql/sql.sql';
				 
				if (!file_exists($file)) {
					exit('Could not load sql file: ' . $file);
				}
				
				$lines = file($file);
				
				if ($lines) {
					$sql = '';
				
					foreach($lines as $line) {
						if ($line && (substr($line, 0, 2) != '--') && (substr($line, 0, 1) != '#')) {
							$sql .= $line;
				
							if (preg_match('/;\s*$/', $line)) {
								$sql = str_replace("DROP TABLE IF EXISTS `oc_", "DROP TABLE IF EXISTS `" . $data['db_prefix'], $sql);
								$sql = str_replace("CREATE TABLE `oc_", "CREATE TABLE `" . $data['db_prefix'], $sql);
								$sql = str_replace("INSERT INTO `oc_", "INSERT INTO `" . $data['db_prefix'], $sql);
				
								$connect->query($sql);
				
								$sql = '';
							}
						}
					}
				}
				//end create database;
				
				$this->data ['result'] = 'Install Finished!!!';
				return true;
			} else {
			}
		}
	}
}
?>