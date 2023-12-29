<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.php">Add New User</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Divisi</th>
        <th>Direktorat</th>
        <th>Action</th>
    </tr>
    <?php 
			include "../config/koneksi.php";
			$ambildata = mysqli_query($koneksi,"
			SELECT
			u.nama nama_user, u.jabatan jabatan_user, d.nama nama_departemen, i.nama nama_divisi, r.nama nama_direktorat
			FROM tbl_user u
			JOIN tbl_departemen d ON u.id_departemen=d.id
			JOIN tbl_divisi i ON u.id_divisi=i.id
			JOIN tbl_direktorat r ON u.id_direktorat=r.id");
			while($tampil = mysqli_fetch_array($ambildata)){ ?>
		
				<tr>
				<td ><a href="edit_user.php?nama_user=<?php echo $tampil["nama_user"]?>"><?= $tampil['nama_user']?> </a></td>
				<td ><?= $tampil['jabatan_user']?></td>
				<td ><?= $tampil['nama_departemen']?></td>
				<td ><?= $tampil['nama_divisi']?></td>
				<td ><?= $tampil['nama_direktorat']?></td>
              
				<td> 
                <a href='edit.php?id=$user_data[id]'>Edit</a>    
                <a href="delete.php?nama_user=<?php echo $tampil["nama_user"] ?> "> Delete</a></td>
				</tr>
			<?php } ?>
    </table>
</body>
</html>




<div class="row mb-3">
				<label for="validationSelect" class="col-sm-2 col-form-label">Tanggal</label>
				<div class="col-sm-10">
					<input type="date" name="tgl"  value="<?php echo $data['tgl_event'];?>"/>
				</div>
			</div>