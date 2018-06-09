<?php

class Chat extends Core
{
	public function fetchMessages($fromid,$toid)
	{
		/*$this->query("
			SELECT 		`chat`.`msg`,
						`users`.`username`,
						`users`.`uid`
			FROM 		`chat`
			JOIN 		`users`
			ON 			`chat`.`msgfrom`=`users`.`uid`
			ORDER BY 	`chat`.`time`
			DESC
			");*/
			//$this->query("SELECT `chat`.`msg` FROM `chat` WHERE (`chat`.`msgfrom`=".(int)$fromid." OR `chat`.`msgfrom`=".(int)$toid." ) AND (`chat`.`msgto`=".(int)$fromid." OR `chat`.`msgto`=".(int)$toid.") ORDER BY `chat`.`time` DESC");
			$this->query("SELECT `chat`.`msg`,`users`.`username` FROM `chat` JOIN `users` ON `chat`.`msgfrom`=`users`.`uid` WHERE (`chat`.`msgfrom`=".(int)$fromid." OR `chat`.`msgfrom`=".(int)$toid." ) AND (`chat`.`msgto`=".(int)$fromid." OR `chat`.`msgto`=".(int)$toid.") ORDER BY `chat`.`time` DESC");
		return $this->rows();
	}
	public function throwMessage($fromid,$toid,$msg)
	{
		$this->query("
			INSERT INTO `chat` (`msgfrom`,`msgto`,`msg`,`time`)
			VALUES (".(int)$fromid.",".(int)$toid.",'".$this->db->real_escape_string(htmlentities($msg))."',UNIX_TIMESTAMP())

			");
	}
}

?>


