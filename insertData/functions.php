<?php

	function query($sql) {
		include "databases/db.php";
		$result = mysqli_query($connect, $sql);
		$i=1;

		if ($result) {
			while ($row = mysqli_fetch_assoc($result)) {
				$id_mhs = $row['id_mhs'];
				$gambar_mhs = $row['gambar_mhs'];
				$nim_mhs = $row['nim_mhs'];
				$nama_mhs = $row['nama_mhs'];
				$email_mhs = $row['email_mhs'];
				$prodi = $row['prodi'];

				echo "
					<tr>
						<td>".$i++."</td>
						<td><img src='assets/image/".$gambar_mhs."' width='100'></td>
						<td>".$nim_mhs."</td>
						<td>".$nama_mhs."</td>
						<td>".$email_mhs."</td>
						<td>".$prodi."</td>
						<td>
							<a href='detail.php?id=".$id_mhs."'>edit</a> | <a href='delete.php?id=".$id_mhs."'>delete</a>
						</td>
					</tr>
				";
			}
		}

		return $row;
	}

	function queryGet($sql) {
		include "databases/db.php";

		$result = mysqli_query($connect, $sql);
		$row = mysqli_fetch_assoc($result);

		$id_mhs = $row['id_mhs'];
		$gambar_mhs = $row['gambar_mhs'];
		$nim_mhs = $row['nim_mhs'];
		$nama_mhs = $row['nama_mhs'];
		$email_mhs = $row['email_mhs'];
		$prodi = $row['prodi'];

		echo "
			<li><img src='assets/image/".$gambar_mhs."' width='100'></li>
			<li>".$nim_mhs."</li>
			<li>".$nama_mhs."</li>
			<li>".$email_mhs."</li>
			<li>".$prodi."</li>
			<a href='index.php'>kembali ke daftar mahasiswa</a>
		";
	}

	function tambahMHS($data) {
		include "databases/db.php";

		$nama = htmlspecialchars($data['nama']);
		$nim = htmlspecialchars($data['nim']);
		$email = htmlspecialchars($data['email']);
		$prodi = htmlspecialchars($data['prodi']);
		$gambar = htmlspecialchars($data['gambar']);

		$sql = "INSERT INTO user VALUES ('','$gambar', '$nim', '$nama', '$email', '$prodi')";

		$result = mysqli_query($connect, $sql);

		echo mysqli_error($connect);
		return mysqli_affected_rows($connect);
	}
?>