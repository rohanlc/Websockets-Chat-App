 <?php
 
 $user = 'root';
 $pass = '';
 $db = 'test';
 $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
//$sql = "insert into mirraw_chat (chat, from_id, to_id, time_stamp) values (1,2,3,4)";
// $db->query($sql);
 $text = $_GET["text"];
$from = $_GET["from"];
$to = $_GET["to"];
$time_stamp = time();
$sql = 'insert into mirraw_chat (chat, from_id, to_id, time_stamp) values ("'.$text.'" , '.$from.' , '.$to.' , '.$time_stamp.' )';
if ($db->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

echo $text;

$db->close();	
	
	
	
	
	
?>	