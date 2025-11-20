<?php 
include "../includes/session.php";
include "../includes/DB.php";

//update
if(isset($_POST['actions']) && $_POST['actions'] == "update"){
	$statuscolumn = htmlentities(addslashes($_POST['statuscolumn']));
	$status = htmlentities(addslashes($_POST['status']));
	$idcolumn = htmlentities(addslashes($_POST['idcolumn']));
	$id = htmlentities(addslashes($_POST['id']));
	$tablename_u = htmlentities(addslashes($_POST['tablename_status']));	
	mysqli_query($con,"UPDATE {$tablename_u} SET {$statuscolumn}='{$status}' WHERE {$idcolumn}={$id}");
	echo "update";
}else{
	
}


if(isset($_POST['action']) && $_POST['action'] == "DeprChange"){
	$deptid= htmlentities(addslashes($_POST['deptid']));
	if($deptid !=''){
		$deptq = mysqli_query($con,"SELECT * FROM `userlogin` WHERE Dept = '{$deptid}' ORDER BY `userlogin`.`stafforder` ASC");
	}else{
		$deptq = mysqli_query($con,"SELECT * FROM `userlogin`");
	}
	$dept = '';
	$i=1;
	while($res_dept = mysqli_fetch_object($deptq)){
		
		$dept .='<tr>
			<td width="5%">'.$i.'</td>
			<td width="30%">'.stripslashes($res_dept->FullName).'</td>
			<td width="10%">'.$res_dept->Dept.'</td>
            <td width="30%">'.$res_dept->designation.'</td>
			<td width="10%">'; if($res_dept->profileImg!=""){ $dept .='<img width="100px" src="../faculty-img-doc/'.$res_dept->profileImg.'">'; } $dept .='</td>
            <td width="10%">'.$res_dept->stafforder.'</td>
            <td width="10%">
				<a href="edit_staff.php?eid='.$res_dept->ULid.'">Edit</a> | 
				<a class="delete" href="javascript:void(0)" data-id="'.$res_dept->ULid.'">Delete</a>
			</td>
        </tr>';
		
	$i++;	
	}
	echo $dept;
	
}

if(isset($_POST['action']) && $_POST['action'] == "Faculty"){
	$id= htmlentities(addslashes($_POST['bid']));
	$year = '<option value="">Select</option>';
	if($id == '4'){
		$faculty = mysqli_query($con,"SELECT * FROM tbl_mjcet_courses WHERE BranchId = '{$id}'");
		while($res_year = mysqli_fetch_object($faculty)){
			$year .= '<option value="'.$res_year->sid.'">'.$res_year->section_name.'</option>';
		}
	}else if($id == '11'){
		$faculty = mysqli_query($con,"SELECT * FROM tbl_mjcet_departments WHERE BranchId = '{$id}'");
		while($res_year = mysqli_fetch_object($faculty)){
			$year .= '<option value="'.$res_year->sid.'">'.$res_year->section_name.'</option>';
		}
	}else if($id == '12'){
		$faculty = mysqli_query($con,"SELECT * FROM tbl_mjcet_sections WHERE status = '1'");
		while($res_year = mysqli_fetch_object($faculty)){
			$year .= '<option value="'.$res_year->sid.'">'.$res_year->section_name.'</option>';
		}
	}
	echo $year;
}

if(isset($_POST['action']) && $_POST['action'] == "STAFF"){
	$id= htmlentities(addslashes($_POST['bid']));
	$faculty = mysqli_query($con,"SELECT *  FROM `tbl_mjcet_megha_menu_dept_section` WHERE `menuSulg` LIKE '%staff-list%' AND mainMenuId = '{$id}' AND status = '1'");
	$res_year = mysqli_fetch_object($faculty);
	
}


/*start Department Banners menu List*/
if(isset($_POST['action']) && $_POST['action'] == "DeptBanners"){
	$dval= htmlentities(addslashes($_POST['dval']));
	$ban = '<option value="">Select</option>';
	if($dval == 'courses'){
		$banners = mysqli_query($con,"SELECT * FROM tbl_mjcet_courses WHERE status = '1'");
		while($res_banners = mysqli_fetch_object($banners)){
			$ban .= '<option value="'.$res_banners->sulgname.'">'.$res_banners->menuNmae.'</option>';
		}
	}else if($dval == 'departments'){
		$banners = mysqli_query($con,"SELECT * FROM tbl_mjcet_departments WHERE status = '1'");
		while($res_banners = mysqli_fetch_object($banners)){
			$ban .= '<option value="'.$res_banners->sulgname.'">'.$res_banners->menuNmae.'</option>';
		}
	}else if($dval == 'sections'){
		$banners = mysqli_query($con,"SELECT * FROM tbl_mjcet_sections WHERE status = '1'");
		while($res_banners = mysqli_fetch_object($banners)){
			$ban .= '<option value="'.$res_banners->sulgname.'">'.$res_banners->menuNmae.'</option>';
		}
	}
	echo $ban;
}
/* end Department Banners menu List*/


/*gallery category List*/
if(isset($_POST['action']) && $_POST['action'] == "GalleryCat"){
	echo $gval= htmlentities(addslashes($_POST['gval']));
	$gal = '<option value="">Select</option>';
	$gallery = mysqli_query($con,"SELECT * FROM tbl_mjcet_gallery_cat WHERE status = '1' AND catType='{$gval}' ORDER BY `tbl_mjcet_gallery_cat`.`catOrder` ASC");
	while($res_gallery = mysqli_fetch_object($gallery)){
		$gal .= '<option value="'.$res_gallery->catSulg.'">'.$res_gallery->catTitle.'</option>';
	}
	
	echo $gal;
}
/* end gallery category List*/



/*gallery category List*/
if(isset($_POST['action']) && $_POST['action'] == "SideMenu"){
	$sid= htmlentities(addslashes($_POST['sid']));
	$sidem = mysqli_query($con,"SELECT * FROM tbl_mjcet_side_submenu WHERE menuDocument='' AND status = '1' AND menuType='{$sid}' ORDER BY `menuOrder` ASC");
	if(mysqli_num_rows($sidem) !="0"){
		while($res_sidem = mysqli_fetch_object($sidem)){
			$sval .= '<option value="'.$res_sidem->menuSulg.'">'.$res_sidem->menuName.'</option>';
		}
	}else{
		$sval = '<option value="">No records Found</option>';
	}
	
	echo $sval;
}
/* end gallery category List*/




?>