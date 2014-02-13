<?php echo $header;?>
<div id='content'>
	<?php echo $title;?>
	<div class="box-content-error">
		<div id="error"><?php if(!is_null($error)){foreach ($error as $value) {
			echo $value."\n";
		}}?></div>
	</div>
	<div class='box-content'>

		<div>
			<form action="index.php?route=install/install" method="post">
				<dl>
					<dd>
						<dl>
							<dd><?php echo $text_hostname;?></dd>
							<dd>
								<input type="text" required="required" name="<?php echo $id_hostname?>"><label
									for="<?php echo $id_hostname;?>"></label>
							</dd>

						</dl>
					</dd>
					<dd>
						<dl>
							<dd><?php echo $text_username;?></dd>
							<dd>
								<input type="text" required="required" name="<?php echo $id_username;?>"><label
									for="<?php echo $id_username;?>"></label>
							</dd>

						</dl>
					</dd>
					<dd>
						<dl>
							<dd><?php echo $text_passwd;?></dd>
							<dd>
								<input type="text" required="required" name="<?php echo $id_passwd;?>"><label
									for="<?php echo $id_passwd;?>"></label>
							</dd>

						</dl>
					</dd>
					<dd>
						<dl>
							<dd><?php echo $text_database;?></dd>
							<dd>
								<input type="text" required="required" name="<?php echo $name_database;?>"><label
									for="<?php echo $name_database;?>"></label>
							</dd>

						</dl>
					</dd>
					<dd>
						<dl>
							<dd>
								<button formnovalidate="formnovalidate" type="submit"><?php echo $text_button;?></button>
							</dd>
						</dl>
					</dd>
				</dl>
			</form>
			<script type="text/javascript">
			document.addEventListener("DOMContentLoaded", function() {
				document.forms[0].addEventListener('submit', function(e) {
					e.preventDefault();
					e.currentTarget.classList.add('submitted');
					var er = false;
					//alert(document.forms[0].length);
					for(var i = 0; i<document.forms[0].length - 1;i++){
						//alert(document.forms[0][i].value);
						if (document.forms[0][i].value == "") {
							document.forms[0][i].forcus();
							er = true;
							break;
						} else {
							//document.forms[0][i].forcus();
						}
					}
					if(!er){
						document.forms[0].submit();
					}
				});

			});
		</script>
		</div>
	</div>
</div>
<?php echo $footer;?>