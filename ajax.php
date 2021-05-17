<?php
	if (isset($_POST['key'])) {
		$response = "";
		require 'connection.php';

		if ($_POST['key'] == 'getResults') {
			$sql = $conn->query("SELECT DATE_TIME, Score, IP, OS, Browser, CPU_Cores, Ram, Download_Speed, latency FROM records ORDER BY id DESC;");
			while($data = $sql->fetch_array()) {
				$response .= '
					<tr>
						<td>'.$data['DATE_TIME'].'</td>
            <td>'.$data['Score'].'</td>
            <td>'.$data['IP'].'</td>
            <td>'.$data['OS'].'</td>
            <td>'.$data['Browser'].'</td>
            <td>'.$data['CPU_Cores'].'</td>
            <td>'.$data['Ram'].'</td>
            <td>'.$data['Download_Speed'].'</td>
            <td>'.$data['latency'].'</td>
					</tr>
				';
			}
		}


		exit($response);
	}


	

?>