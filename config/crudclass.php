<?php

class crud
{
	private $db;
	
	function __construct($con)
	{
		$this->db = $con;
	}
	
	public function simpan_claim($nama,$status,$asuransi,$telp,$email,$no_pol,$merk,$model,$warna,$tahun,$tgl_claim,$jam_claim)
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO data_claim(nama_pemilik,id_status,asuransi,no_telp,email,no_polisi,merk_mobil,model_mobil,warna_mobil,tahun_mobil,tgl_claim,jam_claim) VALUES(:nama_pemilik,:id_status,:asuransi,:no_telp,:email,:no_polisi,:merk_mobil,:model_mobil,:warna_mobil,:tahun_mobil,:tgl_claim,:jam_claim)");
			$stmt->bindparam(":nama_pemilik",$nama);
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

	public function getNoPol($noPol)
	{
		$stmt = $this->db->prepare("SELECT * FROM data_claim WHERE no_polisi=:no_polisi");
		$stmt->execute(array(":no_polisi"=>$noPol));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}

	public function getStatus($idStatus)
	{
		$stmt = $this->db->prepare("SELECT * FROM status_pengerjaan WHERE id_status=:id_status");
		$stmt->execute(array(":id_status"=>$idStatus));
		$editRow=$stmt->fetch(PDO::FETCH_ASSOC);
		return $editRow;
	}
	
	public function update_claim($id_claim,$id_status)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE data_claim SET id_status=:id_status
													WHERE id_claim=:id_claim ");
			$stmt->bindparam(":id_claim",$id_claim);
			$stmt->bindparam(":id_status",$id_status);
			$stmt->execute();
			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function hapus($id)
	{
		$stmt = $this->db->prepare("DELETE FROM table1 WHERE id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
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
	                	<a href="admin/asuransi_edit.php?edit_id=<?php echo($row['id_asuransi']); ?>">
						<i class="glyphicon glyphicon-edit"></i></a>
						<a href="admin/asuransi_hapus.php?delete_id=<?php echo($row['id_asuransi']); ?>">
						<i class="glyphicon glyphicon-remove-circle"></i></a>
	                </td>
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
	                	<a href="admin/status_edit.php?edit_id=<?php echo($row['id_status']); ?>">
						<i class="glyphicon glyphicon-edit"></i></a>
						<a href="admin/status_hapus.php?delete_id=<?php echo($row['id_status']); ?>">
						<i class="glyphicon glyphicon-remove-circle"></i></a>
	                </td>
                </tr>
                <?php
			}
		}
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

	// login
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
