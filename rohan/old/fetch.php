 <?php
 
 $user = 'root';
 $pass = '';
 $db = 'test';
 $db = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
//$sql = "insert into mirraw_chat (chat, from_id, to_id, time_stamp) values (1,2,3,4)";
// $db->query($sql);

$from = $_GET["from"];
$sql = 'select id, chat, time_stamp from mirraw_chat where fetched = 0 and from_id = '.$from.' order by time_stamp';

//$sql = 'insert into mirraw_chat (chat, from_id, to_id, time_stamp) values ("'.$text.'" , '.$from.' , '.$to.' , '.$time_stamp.' )';

if ($db->query($sql)->num_rows > 0) {
   // echo "New record created successfully";
   $result = $db->query($sql);
   $chat_str = '';
    while($row = $result->fetch_assoc()) {
		$chat_str .= $row["chat"]."<br>";
		$sql = 'update mirraw_chat set fetched = 1 where id = '.$row["id"];
		$db->query($sql);
	}
	echo $chat_str;
} else { echo "";
   // echo "Error: " . $sql . "<br>" . $db->error;
}



$db->close();	

?>	