<?php

class crud
{
	private $db;
	
	function __construct($con)
	{
		$this->db = $con;
	}

	//dashboard
	public function dashboard($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$count = $stmt->fetchColumn();

		echo $count;
	}

	// crud asuransi
	public function getAsuransi($idAsuransi)
	{
		$stmt = $this->db->prepare("SELECT * FROM asuransi WHERE id_asuransi=:id_asuransi");
		$stmt->execute(array(":id_asuransi"=>$idAsuransi));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update_asuransi($id_asuransi,$nama_asuransi)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE asuransi SET nama_asuransi=:nama_asuransi
													WHERE id_asuransi=:id_asuransi ");
			$stmt->bindparam(":id_asuransi",$id_asuransi);
			$stmt->bindparam(":nama_asuransi",$nama_asuransi);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function dropdown_asuransi($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value=<?php echo $row['id_asuransi'];?>><?php echo $row['nama_asuransi']; ?></option>
                <?php
			}
		}
	}

	public function data_asuransi($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$no=1;
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><?php echo $no++; ?></td>
	                <td><?php echo($row['nama_asuransi']); ?></td>
	                <td align="center">
	                	<a href="asuransi_edit.php?edit_id=<?php echo($row['id_asuransi']); ?>">
						<i class="glyphicon glyphicon-edit"></i></a>
						<a href="asuransi_hapus.php?delete_id=<?php echo($row['id_asuransi']); ?>">
						<i class="glyphicon glyphicon-remove-circle"></i></a>
	                </td>
                </tr>
                <?php
			}
		}
	}

	public function simpan_asuransi($nama_asuransi)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO asuransi(nama_asuransi) VALUES(:nama_asuransi)");
			$stmt->bindparam(":nama_asuransi",$nama_asuransi);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function simpan_laporan_pengerjaan($no_polisi,$las_ketok,$dempul,$cat,$finishing,$poles)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO laporan_pengerjaan(no_polisi,las_ketok,dempul,cat,finishing,poles) VALUES(:no_polisi,:las_ketok,:dempul,:cat,:finishing,:poles)");
			$stmt->bindparam(":no_polisi",$no_polisi);
			$stmt->bindparam(":las_ketok",$las_ketok);
			$stmt->bindparam(":dempul",$dempul);
			$stmt->bindparam(":cat",$cat);
			$stmt->bindparam(":finishing",$finishing);
			$stmt->bindparam(":poles",$poles);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function simpan_status_mobil($asuransi,$no_polisi)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO status_mobil(id_asuransi,no_polisi) VALUES(:asuransi,:no_polisi)");
			$stmt->bindparam(":asuransi",$asuransi);
			$stmt->bindparam(":no_polisi",$no_polisi);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function hapus_asuransi($id_asuransi)
	{
		$stmt = $this->db->prepare("DELETE FROM asuransi WHERE id_asuransi=:id_asuransi");
		$stmt->bindparam(":id_asuransi",$id_asuransi);
		$stmt->execute();
		return true;
	}

	// crud status pengerjaan
	public function getStatus($idStatus)
	{
		$stmt = $this->db->prepare("SELECT * FROM status_pengerjaan WHERE id_status=:id_status");
		$stmt->execute(array(":id_status"=>$idStatus));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function dropdown_status_pengerjaan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
				<option value=<?php echo $row['id_status'];?>><?php echo $row['nama_status']; ?></option>
                <?php
			}
		}
	}

	public function data_statuspengerjaan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$no=1;
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><?php echo $no++; ?></td>
	                <td><?php echo($row['nama_status']); ?></td>
	                <td align="center">
	                	<a href="status_pengerjaan_edit.php?edit_id=<?php echo($row['id_status']); ?>">
						<i class="glyphicon glyphicon-edit"></i></a>
						<a href="status_pengerjaan_hapus.php?delete_id=<?php echo($row['id_status']); ?>">
						<i class="glyphicon glyphicon-remove-circle"></i></a>
	                </td>
                </tr>
                <?php
			}
		}
	}

	public function laporan_pengerjaan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$no=1;
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><?php echo $no++; ?></td>
	                <td><?php echo($row['no_polisi']); ?></td>
	                <td><?php echo($row['las_ketok']); ?> Hari</td>
	                <td><?php echo($row['dempul']); ?> Hari</td>
	                <td><?php echo($row['cat']); ?> Hari</td>
	                <td><?php echo($row['finishing']); ?> Hari</td>
	                <td><?php echo($row['poles']); ?> Hari</td>
	                <td align="center">
	                	<a href="laporan_pengerjaan_cetak.php?id=<?php echo($row['id_laporan_pengerjaan']); ?>" target="_blank">
						Cetak</a>
	                </td>
                </tr>
                <?php
			}
		}
	}

	public function simpan_status_pengerjaan($nama_status)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO status_pengerjaan(nama_status) VALUES(:nama_status)");
			$stmt->bindparam(":nama_status",$nama_status);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function hapus_status_pengerjaan($id_status)
	{
		$stmt = $this->db->prepare("DELETE FROM status_pengerjaan WHERE id_status=:id_status");
		$stmt->bindparam(":id_status",$id_status);
		$stmt->execute();
		return true;
	}

	public function update_status_pengerjaan($id_status,$nama_status)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE status_pengerjaan SET nama_status=:nama_status
													WHERE id_status=:id_status ");
			$stmt->bindparam(":id_status",$id_status);
			$stmt->bindparam(":nama_status",$nama_status);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	// crud claim

	
	public function simpan_claim($nama,$alamat,$status,$asuransi,$telp,$email,$no_pol,$merk,$model,$warna,$tahun,$tgl_claim,$jam_claim)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO data_claim(nama_pemilik,alamat,id_status,asuransi,no_telp,email,no_polisi,merk_mobil,model_mobil,warna_mobil,tahun_mobil,tgl_claim,jam_claim) VALUES(:nama_pemilik,:alamat,:id_status,:asuransi,:no_telp,:email,:no_polisi,:merk_mobil,:model_mobil,:warna_mobil,:tahun_mobil,:tgl_claim,:jam_claim)");
			$stmt->bindparam(":nama_pemilik",$nama);
			$stmt->bindparam(":alamat",$alamat);
			$stmt->bindparam(":id_status",$status);
			$stmt->bindparam(":asuransi",$asuransi);
			$stmt->bindparam(":no_telp",$telp);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":no_polisi",$no_pol);
			$stmt->bindparam(":merk_mobil",$merk);
			$stmt->bindparam(":model_mobil",$model);
			$stmt->bindparam(":warna_mobil",$warna);
			$stmt->bindparam(":tahun_mobil",$tahun);
			$stmt->bindparam(":tgl_claim",$tgl_claim);
			$stmt->bindparam(":jam_claim",$jam_claim);
			$stmt->execute();
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getIdClaim($idClaim)
	{
		$stmt = $this->db->prepare("SELECT * FROM data_claim,status_pengerjaan WHERE data_claim.id_claim=:id_claim and data_claim.id_status=status_pengerjaan.id_status");
		$stmt->execute(array(":id_claim"=>$idClaim));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function update_claim($id_claim,$id_status,$tgl_selesai=null,$nama_pemilik,$alamat,$no_telp,$email,$merk_mobil,$warna_mobil,$tahun_mobil)
	{
		try
		{
			if($id_status == 7){
				$stmt=$this->db->prepare("UPDATE data_claim SET id_status=:id_status,
																tgl_selesai=:tgl_selesai,
																nama_pemilik=:nama_pemilik,
																alamat=:alamat,
																no_telp=:no_telp,
																email=:email,
																merk_mobil=:merk_mobil,
																warna_mobil=:warna_mobil,
																tahun_mobil=:tahun_mobil
														WHERE id_claim=:id_claim ");
				$stmt->bindparam(":id_claim",$id_claim);
				$stmt->bindparam(":id_status",$id_status);
				$stmt->bindparam(":tgl_selesai",$tgl_selesai);
				$stmt->bindparam(":nama_pemilik",$nama_pemilik);
				$stmt->bindparam(":alamat",$alamat);
				$stmt->bindparam(":no_telp",$no_telp);
				$stmt->bindparam(":email",$email);
				$stmt->bindparam(":merk_mobil",$merk_mobil);
				$stmt->bindparam(":warna_mobil",$warna_mobil);
				$stmt->bindparam(":tahun_mobil",$tahun_mobil);
				$stmt->execute();
				
				return true;

			} else {
				$stmt=$this->db->prepare("UPDATE data_claim SET id_status=:id_status,
																nama_pemilik=:nama_pemilik,
																alamat=:alamat,
																no_telp=:no_telp,
																email=:email,
																merk_mobil=:merk_mobil,
																warna_mobil=:warna_mobil,
																tahun_mobil=:tahun_mobil
														WHERE id_claim=:id_claim ");
				$stmt->bindparam(":id_claim",$id_claim);
				$stmt->bindparam(":id_status",$id_status);
				$stmt->bindparam(":nama_pemilik",$nama_pemilik);
				$stmt->bindparam(":alamat",$alamat);
				$stmt->bindparam(":no_telp",$no_telp);
				$stmt->bindparam(":email",$email);
				$stmt->bindparam(":merk_mobil",$merk_mobil);
				$stmt->bindparam(":warna_mobil",$warna_mobil);
				$stmt->bindparam(":tahun_mobil",$tahun_mobil);
				$stmt->execute();
				
				return true;	
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}

	public function data_status_mobil($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$no=1;
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><?php echo $no++; ?></td>
	                <td><?php echo($row['nama_asuransi']); ?></td>
	                <td><?php echo($row['no_polisi']); ?></td>
                </tr>
                <?php
			}
		}
	}

	public function data_claim($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$no=1;
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				?>
                <tr>
	                <td><?php echo $no++; ?></td>
	                <td><?php echo($row['nama_pemilik']); ?></td>
	                <td><?php echo($row['nama_status']); ?></td>
	                <td><?php echo($row['nama_asuransi']); ?></td>
	                <td><?php echo($row['no_telp']); ?></td>
	                <td><?php echo($row['email']); ?></td>
	                <td><?php echo($row['no_polisi']); ?></td>
	                <td><?php echo($row['merk_mobil']); ?></td>
	                <td><?php echo($row['model_mobil']); ?></td>
	                <td><?php echo($row['warna_mobil']); ?></td>
	                <td><?php echo($row['tahun_mobil']); ?></td>
	                <td><?php echo($row['tgl_claim']); ?></td>
	                <td align="center">
	                	<a href="claim_edit.php?edit_id=<?php echo($row['id_claim']); ?>">
						<i class="glyphicon glyphicon-edit"></i></a>
						<a href="claim_hapus.php?delete_id=<?php echo($row['id_claim']); ?>">
						<i class="glyphicon glyphicon-remove-circle"></i></a>
	                </td>
                </tr>
                <?php
			}
		}
	}

	public function claim_hapus($id_claim)
	{
		$stmt = $this->db->prepare("DELETE FROM data_claim WHERE id_claim=:id_claim");
		$stmt->bindparam(":id_claim",$id_claim);
		$stmt->execute();
		return true;
	}

	
	// cek status pengerjaan
	public function getNoPol($noPol)
	{
		$stmt = $this->db->prepare("SELECT * FROM data_claim WHERE no_polisi=:no_polisi");
		$stmt->execute(array(":no_polisi"=>$noPol));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}	

	public function getCekMobil($idAsuransi,$noPol)
	{
		$stmt = $this->db->prepare("SELECT * FROM status_mobil WHERE no_polisi=:no_polisi and id_asuransi=:id_asuransi");
		$stmt->bindparam(":no_polisi",$noPol);
		$stmt->bindparam(":id_asuransi",$idAsuransi);
		$stmt->execute();
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}	
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><ul class="pagination"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<li><a href='".$self."?page_no=1'>First</a></li>";
				echo "<li><a href='".$self."?page_no=".$previous."'>Previous</a></li>";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
				}
				else
				{
					echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<li><a href='".$self."?page_no=".$next."'>Next</a></li>";
				echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Last</a></li>";
			}
			?></ul><?php
		}
	}
	
	/* paging */

	// auth
	public function auth($query){
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0) 
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
			//SESSION	
				$_SESSION['id'] 	  = $row['id_user'];
				$_SESSION['username'] = $row['username'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['nama'] 	  = $row['nama'];	
				//redirect ke halaman index
				header('location:admin/index.php');
			}		
		} 
		else 
		{
			//kalau username ataupun password tidak terdaftar di database
			header('location:admin.php?error=1');
		}
	}
	
}
