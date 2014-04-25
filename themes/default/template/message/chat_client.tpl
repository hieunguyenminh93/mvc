<?php echo $header; ?>
<?php echo $title_bar;?>
<div class="box-content">
    <form action="#" method="post" name="chat_client">
        <input type="text" id="chat_lient" name="input"/>
        <input type="submit" id="button_chat" value="send">
    </form>
    <div id="chat_message">

    </div>
    <script>
        $(document).ready(function(){
            $("form").submit(function(e){
                e.preventDefault();
                if($("#chat_client").val() != ''){
                    $.ajax({
                        url: 'ajax/message/chat_client.php',
                        method: 'post',
                        data: {'message':$("#chat_client")},
                        error:function(jqXHR,status,error){
                            console.write("eeee");
                            alert(status);
                        },
                        success: function(data,status,qXHR){
                             $('#chat_message').append("<div>data</div>");
                        }

                    });
                    //e.submit();
                }else{
                    alert("null");
                }
            });
        });
    </script>
</div>
<?php echo $footer;?>