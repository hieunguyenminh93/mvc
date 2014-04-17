<?php echo $header;?>
<?php echo $title_bar;?>
<?php echo $slider;?>
<div id="container">
    <div class="box-content body">
        <div class="register-form">
            <h4><?php echo $title_form;?></h4>
            <h3><?php echo $message;?></h3>
            <form id="register" method="post" action="index.php?route=account/register">
                <div class="row-input">
                    <div class="form-label">
                        <label for="username"><?php echo $label_for_username;?></label>

                    </div>
                    <div class="form-input">
                        <input name="username" type="text" id="username">
                    </div>
                    <div class="message-error" id="e-username"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="firstname"><?php echo $label_for_firstname;?></label>

                    </div>
                    <div class="form-input">
                        <input name="firstname" type="text" id="firstname">
                    </div>
                    <div class="message-error" id="e-firstname"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="lastname"><?php echo $label_for_lastname;?></label>
                    </div>
                    <div class="form-input">
                        <input name="lastname" type="text" id="lastname">
                    </div>
                    <div class="message-error" id="e-lastname"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="passwd"><?php echo $label_for_passwd;?></label>

                    </div>
                    <div class="form-input">
                        <input name="passwd" type="password" id="passwd">

                    </div>
                    <div class="message-error" id="e-passwd"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="retype"><?php echo $label_for_retype;?></label>

                    </div>
                    <div class="form-input">
                        <input name="retype" type="password" id="retype">
                    </div>
                    <div class="message-error" id="e-retype"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="email"><?php echo $label_for_email;?></label>
                    </div>
                    <div class="form-input">
                        <input name="email" type="text" id="email">
                    </div>
                    <div class="message-error" id="e-email"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="address"><?php echo $label_for_address;?></label>

                    </div>
                    <div class="form-input">
                        <input name="address" type="text" id="address">
                    </div>
                    <div class="message-error" id="e-address"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="birthday"><?php echo $label_for_birthday;?></label>
                    </div>
                    <div class="form-input">
                        <input name="birthday" type="text" id="birthday" data-pattern="">
                    </div>
                    <div class="message-error" id="e-birthday"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-label">
                        <label for="sex-m" style="width: 90px"><?php echo $label_for_sex_m;?></label>
                        <input type="radio" name="sex" id="sex-m" value="0">
                        <label for="sex-f" style="width: 90px"><?php echo $label_for_sex_f;?></label>
                        <input name="sex" type="radio" id="sex-f" value="1">
                    </div>
                    <div class="form-input">


                    </div>
                    <div class="message-error" id="e-address"></div>
                    <div class="clr"></div>
                </div>
                <div class="row-input">
                    <div class="form-input">
                        <input name="submit" type="submit" id="submit" value="<?php echo $label_for_submit;?>" style="width: 100px">
                        <a href="index.php?route=account/login"><?php echo $or_login;?></a>
                    </div>
                </div>
                <div class="clr"></div>
            </form>
            <script>
                var is_ok = true;
                $('#username').keyup(function(){
                    if($('#username').val() == ''){
                        $('#e-username').empty();
                    }else{
                        $.ajax({
                            url: "ajax/account/check_account.php",
                            data: {"username":$('#username').val()},
                            dataType: 'text',
                            type: "POST",
                            beforeSend: function(){
                                //alert($('#username').val());
                                //$('#img_ok').remove();
                                $('#e-username').empty();
                                $('#e-username').append("<img id=\"img_ok\" src =\"themes/default/img/loading.gif\" style='width: 20px;height: 20px;'/>").show();
                            },
                            success: function(data,status,jqXHR){
                                //alert(data);
                                if(data == 1){
                                    var img = "<img id=\"img_ok\" src =\"themes/default/img/ok.ico\" style='width: 20px;height: 20px;'/>";
                                    $("#e-username").empty();
                                    $('#username').addClass('input-ok').show();
                                    $('#e-username').append(img).fadeOut(2000);

                                    //e.submit();
                                }else{
                                    var img = "<img id=\"img_not_valid\" src =\"themes/default/img/not_valid.ico\" style='width: 20px;height: 20px;'/>";
                                    $('#e-username').empty();
                                    //$('#img_not_valid').remove();
                                    //$('#img_ok').remove();
                                    $('#username').removeClass('input-ok');
                                    $('#e-username').append(img);
                                }
                            },
                            error: function(jqXHR,statusText,e){
                                $('#e-username').text('Ajax error '+e).show().fadeOut(1000);
                            }
                        });
                    }
                });
                //
                $('#passwd').keyup(function(){
                   if($('#username').val() == ''){
                       $('#username').focus();
                   }else{
                       $('#img_ok').fadeOut(1000);
                       if($('#passwd').val().length <= 4){
                           $('#e-passwd').text('not valid').show().fadeOut(1000);
                       }else{
                           var f = $('#passwd').val().match(/[A-Z0-9a-z]/gi);
                           $('')
                       }

                   }
                });
                //email validate

                $('#email').keyup(function(){
                    var re = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
                    if(!re.test($('#email').val())){
                        $('#e-email').text('email not match').show();
                        is_ok = false;
                    }else{
                        is_ok = true;
                        $('#e-email').fadeOut(0);
                    }
                });

                //first name check
                $('#firstname').keyup(function(){
                    if($('#firstname').val() == ''){
                        $('#e-firstname').text("Error").show().fadeOut(2000);
                        is_ok = false;
                    }
                });
                //last name check
                $('#lastname').keyup(function(){
                    if($('#lastname').val() == ''){
                        $('#e-lastname').text("Error").show().fadeOut(2000);
                        is_ok = false;
                    }
                });
                //retype password check
                $('#retype').keyup(function(){
                    if($('#passwd').val().length <= 4){
                        $('#e-passwd').text("Password not correct").show();
                        $('#passwd').focus();
                    }else{
                        if($('#passwd').val() != $('#retype').val()){
                            $('#e-retype').text('Password not match').show();
                        }else{
                            $('#e-retype').fadeOut(0);
                        }
                    }
                });
                //


                //form submit
                $('form').submit(function(e){
                    //alert($('#username').val());
                    if($('#username').val() == ''){
                        $('#username').focus();
                        $('#e-username').text('Error').show().fadeOut(1000);
                    }else if($('#passwd').val() == ''){
                        $('#passwd').focus();
                        $('#e-passwd').text('Error').show().fadeOut(1000);
                    }else if($('#retype').val() == ''){
                        $('#retype').focus();
                        $('#e-retype').text('Error').show().fadeOut(1000);
                    }else if($('#email').val() == ''){
                        $('#email').focus();
                        $('#e-email').text('Error').show().fadeOut(1000);
                    }else if($('#firstname').val() == ''){
                        $('#firstname').focus();
                        $('#e-firstname').text("Error").show().fadeOut(1000);
                    }else if($('#lastname').val() == ''){
                        $('#lastname').focus();
                        $('#e-lastname').text("Error").show().fadeOut(1000);
                    }else if($('#birthday').val() == ''){
                        $('#birthday').focus();
                        $('#e-birthday').text("error").show().fadeOut(1000);

                    }else if($('#address').val() == ''){
                        $('#address').focus();
                        $('#e-address').text("error").show().fadeOut(1000);
                    }else{
                        /*var username = $('#username').val();

                        $.ajax({
                           url: "ajax/account/check_account.php",
                           data: {"username":"ss"},
                           type: "POST",
                           beforeSend: function(){
                               var img = "<img id=\"img_ok\" src =\"themes/default/img/loading.gif\" style='width: 20px;height: 20px;'/>";
                               $('#e-username').empty();
                               $('#e-username').append(img);
                           },
                           success: function(data,status,jqXHR){
                               var img = "<img id=\"img_ok\" src =\"themes/default/img/ok.ico\" style='width: 20px;height: 20px;'/>";
                              $('#e-username').empty();
                              $('#e-username').append(img);
                              e.submit();
                           },
                           error: function(jqXHR,statusText,e){
                                $('#e-username').text('Ajax error '+e).show().fadeOut(1000);
                           }
                        });*/
                        e.submit();

                    }
                    e.preventDefault();
                });
            </script>
        </div>
    </div>
</div>
<?php echo $footer;?>
