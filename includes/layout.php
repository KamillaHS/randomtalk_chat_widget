
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="style.css" />
</head>

<body>

<?php

include('post.php');


$randNames = [
    'ConfidentDeceiving',
    'PolygonLadida',
    'ArcherFishCherry',
    'ConchBurnish',
    'ZillionMoidart',
    'SailorBats'
];

$username = $randNames[array_rand($randNames)];
$username2 = $randNames[array_rand($randNames)];
$username3 = $randNames[array_rand($randNames)];

function showText($text, $username) {
    for ($x = 0; $x < 1; $x++) {
        echo '<div id="placeholder_chat">' .
            '<p id="username">' . $username . '</p>' .
            '<p id="chat_message">: ' .
            $text .'</p></div><br>';
    }
}


//function show_message() {
//    $message = $_POST['usermsg'];
//
//    if(isset($_POST['submitmsg'])) {
//        if(!empty($_POST['usermsg'])) {
//            echo $message;
//        }
//    }
//}

echo '<div id="wrapper">' .
    '<div id="menu">' .
        '<p class="welcome">Welcome to RandomTalk <b><p id="usernameTitle">' . $username . '</p></b></p>' .
        '<div style="clear:both"></div>' .
    '</div>' .

    '<div id="chatbox">';
        showText('Hello, I am a test.', $username);
        showText('Awesome!', $username2);
        showText('We are all tests...', $username3);
        showText('Indeed...', $username);
//        show_message();


//        $message = ! empty( $instance['usermsg'] ) ? $instance['usermsg'] : esc_html__( $message, 'randomtalk_domain' );
//        show_message($message);

//    if(file_exists("log.html") && filesize("log.html") > 0){
//        $handle = fopen("log.html", "r");
//        $contents = fread($handle, filesize("log.html"));
//        fclose($handle);
//
//        echo $contents;
//    }


echo '</div>' .
    '<form name="message" action="">' .
        '<input name="usermsg" type="text" id="usermsg" size="63" />' .
        '<input name="submitmsg" type="submit"  id="submitmsg" value="Send" />' .
    '</form>' .
    '</div>';



?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){

        // $('#submitmsg').click(function() {
        //     $.post("post.php",
        //         {usermsg: $('#usermsg').val()},
        //         function(data) {
        //             $('#chatbox').html(data);
        //         })
        // });
    //


        //If user submits the form
        $("#submitmsg").click(function(){
            var clientmsg = $("#usermsg").val();
            $.post("post.php", {text: clientmsg});
            $("#usermsg").attr("value", "");
            return false;
        });

        //Load the file containing the chat log
        function loadLog(){

            $.ajax({
                url: "log.html",
                cache: false,
                success: function(html){
                    $("#chatbox").html(html); //Insert chat log into the #chatbox div
                },
            });
        }

        setInterval (loadLog, 2500);	//Reload file every 2500 ms or x ms
    });
</script>
</body>

</html>
