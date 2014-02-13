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
			
			$this->template = TEMPALTE . '/install/install.tpl';
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
				$output .= "define(\"DB_HOSTNAME\",\"$hostname\");\n";
				$output .= "define(\"DB_USER\",\"$username\");\n";
				$output .= "define(\"DB_PASSWD\",\"$passwd\");\n";
				$output .= "define(\"DB_DRIVER\",\"mysql\");\n";
				$output .= "define(\"DB_DB\",\"$database\");\n";
				
				$config = fopen ( $dir . '/config/config.php', 'x' );
				
				fwrite ( $config, "<?php\n" );
				fwrite ( $config, $output );
				fwrite ( $config, "?>" );
				fclose ( $config );
				$this->data ['result'] = 'Install Finished!!!';
				return true;
			} else {
			}
		}
	}
}
?>