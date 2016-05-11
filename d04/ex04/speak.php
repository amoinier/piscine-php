<?php
session_start();
			if ($_SESSION['loggued_on_user'])
			{?>
				<html>
					<head>
						<meta charset="utf-8">
						<title>Speak</title>
						<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
					</head>
					<body>
						<form action="speak.php" method="POST">
							<input type="msg" name="msg" value=>
							<input type="submit" name="submit" value="OK">
						</form>
					</body>
				</html>
				<?php
				if ($_POST["msg"] && $_POST["submit"] === "OK")
				{
					if (!file_exists("../private"))
						mkdir("../private");
					if (!file_exists("../private/chat"))
						file_put_contents("../private/chat", "");
					$data = unserialize(file_get_contents("../private/chat"));
					if ($data)
					{
						foreach ($data as $key => $val)
						{
							$ok = $key + 1;
						}
					}
					$data[$ok]['login'] = $_SESSION['loggued_on_user'];
					$data[$ok]['time'] = time();
					$data[$ok]['msg'] = $_POST['msg'];
					//$fd = fopen("../private/chat", 'r+');
					//if (flock($fd, LOCK_EX))
					//{
						file_put_contents("../private/chat", serialize($data));
					//	flock($fd, LOCK_UN);
					//}
					//fclose($fd);
				}
			}
			else
				echo "ERROR\n";
		?>
