<?php 
class bas {
	
	public $a,$id,$fornot,$induskind,$foid,$fdeid;
	
    function bas(){
         global $hostname;
         global $dbuser;
         global $dbpass;
         global $dbname;

         global $int_dir;
         global $charset1,$charset2,$charset3;
		 
         $this->hostname=$hostname;
         $this->dbuser=$dbuser;
         $this->dbpass=$dbpass;		 
         $this->dbname=$dbname;
		 $this->dbport = 3306;
		 $this->charset1=$charset1;
		 $this->charset2=$charset2;
		 $this->charset3=$charset3;

         $this->nowfile=basename($_SERVER['SCRIPT_NAME']);	//
         
		$this->int_dir=$int_dir;

		$this->anndata="ann";//annuity 년차료
		$this->appdata="app";		 
		$this->bankdata="bank";
		$this->chuldata="chul";
		$this->customdata="customer";	
		$this->debitdata="debit";
		$this->estidata="esti";
		$this->filedata="file";
		$this->gangdata="gang";//annuity 년차료
		$this->groupdata="groupdata";//annuity 년차료
		$this->headdata="head";
		$this->letterdata="letter";
		$this->maildata="mail";
		$this->mboarddata="mboard";
		$this->memberdata="member";
		$this->offdata="off";
		$this->officedata="office";
        $this->outdata="outgo";
        $this->outinter="outinter";
		$this->prodata="pro";
		$this->saudata="sau";
        $this->saupdata="saup";		
		$this->scheduledata="schedule";
		$this->simdata="simdata";
        $this->simpro="simpro";
		$this->simprodata="simpro";
		$this->smalldata="small";
		$this->staffdata="staff";
		
		if (  trim($_SERVER['SERVER_NAME'])=='localhost'  ){
		    $this->connection = mysqli_connect($this->hostname,$this->dbuser,$this->dbpass,$this->dbname);
            mysqli_query($this->connection,"set names utf8");
        }else{
		    $this->connection = mysqli_connect($this->hostname,$this->dbuser,$this->dbpass,$this->dbname);
            mysqli_query($this->connection,"set names utf8");
        }
		foreach($_GET as $k =>$w){
            $this->$k=$w;			
		}
    }

    function staffname($staffid){
	    
		$query = "SELECT krname from $this->staffdata";		
		$result = $this->connection->query($query);
		if ($result){
			if($result->num_rows>0){
				$row=$result->fetch_row();
				$krname=$row['krname'];
            }
		}
        return $krname;		 	
		
		
		
		
	}
	function tablefields($tablename){///테이블의 필드항목을 배열로 구함
	    $fields=array();
		$query = "SELECT * from $tablename";		
		$result = $this->connection->query($query);
		if ($result){
			$finfo = mysqli_fetch_fields($result);			 
			foreach ($finfo as $val) {			    
				$fields[]=$val->name;
			}    
		}
        return $fields;		
    }
	function obtaintotalsu($tablename,$wherestring){//테이블의 레코드총수를 구함
		if(strlen(trim($wherestring))>0){
			$query = "select count(*) from $tablename where $wherestring";
		}else{
			$query = "select count(*) from $tablename";
		}
		$result = $connection->query($query);
		if ($result){
		   $row=$result->fetch_row();
			if($row[0]>0){
				return $row[0];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
		
    function callrow($tablename,$fieldstring,$wherestring){//레코드 한개를 구함
        if(!isset($fieldstring)){$fieldstring='*';}
        if(strlen(trim($fieldstring))<1){
            if(strlen(trim($wherestring))>0){
                $query = "select * from $tablename where $wherestring";
            }else{
                $query = "select * from $tablename";
            }
        }else{
            if(strlen(trim($wherestring))>0){
                $query = "select $fieldstring from $tablename where $wherestring";
            }else{
                $query = "select $fieldstring from $tablename";
            }
        }
        $result = $this->connection->query($query);
        if ($result){
            $row=$result->fetch_row();
            return $row;
        }else{
	        return false;
	    }
    }
    function callarray($tablename,$field,$wherestring){ //래코드의 배열을 구함
        $array=array();
        if(!isset($field)){$field='*';}
	    if(  (isset($wherestring))  && (strlen(trim($wherestring))>0) ){
            $query = "select $field from $tablename where $wherestring ";
	    }else{
            $query = "select $field from $tablename";	   
	    }
        $result = $this->connection->query($query);
        if ($result){

            $row=$result->fetch_assoc();
            if(isset($row)){
                foreach($row as $key => $whatrow){
                    if(substr($key,-4)=='date'){
                        $$key=str_replace("'",'&#039',stripslashes($whatrow));
                        $array["$key"]=$$key;
                        $xdate_1=$key.'_1';
                        $xdate_2=$key.'_2';
                        $xdate_3=$key.'_3';
                        $$xdate_1=substr($whatrow,0,4);
                        $$xdate_2=substr($whatrow,4,2);
                        $$xdate_3=substr($whatrow,6,2);
                        $array["$xdate_1"]=$$xdate_1;
                        $array["$xdate_2"]=$$xdate_2;
                        $array["$xdate_3"]=$$xdate_3;

                    }else{
                        $$key=str_replace("'",'&#039',stripslashes($whatrow));
                        $array["$key"]=$$key;
                    }
                }
            }

        }
        return $array;
    }
	

    function callsu($tablename,$field,$wherestring,$limitstring){
       if($wherestring){
          $query = "select $field from $tablename where $wherestring $limitstring";
       }else{
          $query = "select $field from $tablename $limitstring";
       }
       $result = $this->connection->query($query);
       return $result;
    }
	
	function membername(){
	    $ar=$this->callarray($this->memberdata,"name","userid='$_SESSION[my_session]'");
		return $ar['name'];
	
	}
	function ismember($userid){
	    $totalsu=$this->obtaintotalsu($this->memberdata,"userid='$userid'");
		if($totalsu>0){
		    return true;
		}else{
		    return false;
		}
	}
	function ismanager($userid){
	    $ar=$this->callarray($this->memberdata,"grade","userid='$userid'");
		if($ar['grade']==9){
		    return true;
		}else{
            return false;
        }		
	}
	
	function managerornot(){
	    if(  (isset($_SESSION['my_session'])) && ($_SESSION['my_session']=="si")  ){
		    return true;
		}else{
			return true;
		    //return false;
		}
	}
	function masterornot(){
	   return true;
	}
	function sessionuserid(){
	    $userid="";
        if(isset($_SESSION['my_session'])){
            $userid=$_SESSION['my_session'];
		}else{
		    $userid=$_SESSION['imsisession'];
		}
		return $userid;
	}
	
    function noauth(){
        parse_str(getm());
        if (!isset($_SESSION['my_session'])){
            ?>
            <script>
                window.alert('권한이없습니다');
                window.close();
                //this.window.location.replace("./<?echo basename($_SERVER[SCRIPT_FILENAME]);?>");
            </script>
            <?php
        }
    }
	
	function customatt($apr,$xid){
		?>
		<script>		
		function customgo(){
			if(customchoice.customid.value){
				parent.location.href="tong.php?a=tong_time&ws=2&apr=<?php echo$apr;?>&id="+customchoice.customid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function customtogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="custom.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function lettertogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="letter.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function apptogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="app.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debittogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}

		function customchange(){
			
			
		}
		
		</script>
		
		<?php
        if($apr==1){
			$query= "select f.id,f.sangho,count(bu.lappcode) as cnt from $this->customdata f left join $this->appdata bu on f.id = bu.lappcode where ( bu.applino>0 ) group by f.id order by cnt desc";
		}
        elseif($apr==2){
			$query= "select f.id,f.sangho,count(bu.lappcode) as cnt from $this->customdata f left join $this->appdata bu on f.id = bu.lappcode where ( length(bu.regno)>=9 ) group by f.id order by cnt desc";
		}
		$result=$this->connection->query($query);
        ?> 			
         <form name=customchoice method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr><td> 고객목록(<font color=red><?php /* echo$result->num_rows;*/?></font>)
			<tr>
			<td>
            <select name='customid' size='18' width=200 ondblclick='customgo();' onchange='customchange();' style = "padding:2;width:300px;">
		    <?php
			//$query= "select f.id,f.sangho,count(bu.lappcode) as cnt from $this->customdata f left join $this->appdata bu on f.id = bu.lappcode where bu.lappcode>0 group by f.id order by binary(f.sangho) asc";
			//$result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_row()){
					?>
					<option value="<?php echo$row[0];?>" <?php if($row[0]==$xid){?> selected <?php }?>><?php echo cutstring_utf8($row[1],30,"..");?>(<?php echo$row[2];?>)</option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='custom_display' value='상세' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='custom_form' value='수정' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='letter_show' value='서신' onclick="return lettertogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_show' value='사건' onclick="return apptogo(this.name);">
                </td>
				</tr>
				<tr>
                <td>
                <input type='button' name='debit_show' value='청구서' onclick="return debittogo(this.name);">
                </td>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}
	
	function customapp($apr,$xid){
		?>
		<script>		
		function customgo(){
			if(customchoice.customid.value){
				parent.location.href="tong.php?a=tong_time&ws=1&apr=<?php echo$apr;?>&id="+customchoice.customid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function customtogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="custom.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function lettertogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="letter.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function apptogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="app.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debittogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}

		function customchange(){
			
			
		}
		
		</script>
		
		
		<?php
        if(!isset($ob)){$ob='sagunban';}
        if($ob=='sanghosun'){$orderstring="order by sangho asc";}
        elseif($ob=='sanghoban'){$orderstring="order by sangho desc";}
        elseif($ob=='sagunban'){$orderstring="order by cnt desc";}
        elseif($ob=='sagunsun'){$orderstring="order by cnt asc";}
		
		$searchkey="(find_in_set($this->customdata.id,$this->appdata.appcode)>0)";
		
        if( (isset($apr)) && ($apr==1)) {
			if( (isset($searchkey)) && (strlen(trim($searchkey))>0)  ){
			    $searchkey.=" and ";	
			}
			$searchkey.=" ( $this->appdata.applino>0 )";			 			
		}
		
        if( (isset($apr)) && ($apr==2)) {
			if( (isset($searchkey)) && (strlen(trim($searchkey))>0)  ){
			    $searchkey.=" and ";	
			}
			$searchkey.=" ( length($this->appdata.regno)>0 )";			 			
		}		

		if( strlen(trim($searchkey))>0 ){
            $wherestring=" where $searchkey ";
        }else{
            $wherestring="";
        }	 

	    $query="select id,sangho,count(id) as cnt from $this->customdata,$this->appdata $wherestring group by $this->customdata.id $orderstring";
		$result=$this->connection->query($query);
        ?>			
         <form name=customchoice method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr><td> 고객목록(<font color=red><?php /* echo$result->num_rows;*/?></font>)
			<tr>
			<td>
            <select name='customid' size='18' width=200 ondblclick='customgo();' onchange='customchange();' style = "padding:2;width:300px;">
		    <?php


			if($result->num_rows>0){
				while($row=$result->fetch_row()){
					?>
					<option value="<?php echo$row[0];?>" <?php if($row[0]==$xid){?> selected <?php }?>><?php echo cutstring_utf8($row[1],30,"..");?>(<?php echo$row[2];?>)</option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='custom_display' value='상세' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='custom_form' value='수정' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='letter_show' value='서신' onclick="return lettertogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_show' value='사건' onclick="return apptogo(this.name);">
                </td>
				</tr>
				<tr>
                <td>
                <input type='button' name='debit_show' value='청구서' onclick="return debittogo(this.name);">
                </td>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}

	function customlistbox($xid){
		?>
		<script>		
		function customgo(){
			if(customchoice.customid.value){
				parent.location.href="custom.php?a=custom_display&id="+customchoice.customid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function customtogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="custom.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function lettertogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="letter.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function apptogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="app.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debittogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}

		function customchange(){
			
			
		}
		
		</script>
		
		<?php
		$query="select id,sangho from customer order by binary(sangho) asc";
		$result=$this->connection->query($query);
		if($result){
        ?> 			
         <form name=customchoice method=post style='margin-bottom:0;margin-top:0'>
         <table border=0 cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr><td><img src="./icons/for.png" border="0" width="20"> 고객목록(<font color=red><?php echo$result->num_rows;?></font>)
			<tr>
			<td>
            <select name='customid' size='8' width=100 ondblclick='customgo();' onchange='customchange();' style = "padding:2;width:200px;">
		    <?php
			$query="select id,sangho from customer order by binary(sangho) asc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['id'];?>" <?php if($row['id']==$xid){?> selected <?php }?>><?php echo$row['sangho'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='custom_display' value='상세' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='custom_form' value='수정' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='letter_show' value='서신' onclick="return lettertogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_show' value='사건' onclick="return apptogo(this.name);">
                </td>
				</tr>
				<tr>
                <td>
                <input type='button' name='debit_show' value='청구서' onclick="return debittogo(this.name);">
                </td>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
		}
	}
	
	
	
	function customkor($xid){////국내고객
		?>
		<script>		
		function customgo(){
			if(customchoice.customid.value){
				parent.location.href="custom.php?a=custom_display&id="+customchoice.customid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function customtogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="custom.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function lettertogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="letter.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function apptogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="app.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debittogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}

		function customchange(){
			
			
		}
		
		</script>
         <form name=customchoice method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
		    <tr>
			<td>
			<img src="./icons/for2.png" border=0 width=20>국내고객선택
			</td></tr>
		    <tr>
			<td>
            <select name='customid' size='8' width=100 ondblclick='customgo();' onchange='customchange();' style = "padding:2;width:200px;">
		    <?php
			$query="select id,sangho from customer where fornot=2 order by binary(sangho) asc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['id'];?>" <?php if($row['id']==$xid){?> selected <?php }?>><?php echo$row['sangho'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='custom_display' value='상세' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='custom_form' value='수정' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='letter_show' value='서신' onclick="return lettertogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_show' value='사건' onclick="return apptogo(this.name);">
                </td>
				</tr>
				<tr>
                <td>
				<?php 
				if(basename($_SERVER['SCRIPT_NAME'])=="debit.php"){
					
					if($_REQUEST['a']=="debit_graph"){
						$buttonname="debit_graph";
					}
					elseif($_REQUEST['a']=="debit_show"){
						$buttonname="debit_show";
					}
					elseif($_REQUEST['a']=="debit_point"){
						$buttonname="debit_point";
					}else{
						$buttonname="debit_show";
					}
				}else{
					$buttonname="debit_show";
				}
				?>				
                <input type='button' name='<?php echo$buttonname;?>' value='청구서' onclick="return debittogo(this.name);">
                </td>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}
	function customfor($xid){//외국고객
		?>
		<script>		
		function customgo(){
			if(customchoice.customid.value){
				parent.location.href="custom.php?a=custom_display&id="+customchoice.customid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function customtogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="custom.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function lettertogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="letter.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function apptogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="app.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debittogo(avalue){
            if(customchoice.customid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&id="+customchoice.customid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}

		function customchange(){
			
			
		}
		
		</script>
         <form name=customchoice method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
		    <tr>
			<td>
			<img src="./icons/for1.png" width="20" border="0"> 외국고객
			</td></tr>
			<tr>
			<td>
            <select name='customid' size='8' width=100 ondblclick='customgo();' onchange='customchange();' style = "padding:2;width:200px;">
		    <?php
			$query="select id,sangho from customer where fornot=1 order by binary(sangho) asc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['id'];?>" <?php if($row['id']==$xid){?> selected <?php }?>><?php echo$row['sangho'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='custom_display' value='상세' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='custom_form' value='수정' onclick="return customtogo(this.name);">
                </td>
                <td>
                <input type='button' name='letter_show' value='서신' onclick="return lettertogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_show' value='사건' onclick="return apptogo(this.name);">
                </td>
				</tr>
				<tr>
                <td>
				<?php 
				if(basename($_SERVER['SCRIPT_NAME'])=="debit.php"){
					if($_REQUEST['a']=="debit_graph"){
						$buttonname="debit_graph";
					}
					elseif($_REQUEST['a']=="debit_show"){
						$buttonname="debit_show";
					}
					elseif($_REQUEST['a']=="debit_point"){
						$buttonname="debit_point";
					}else{
						$buttonname="debit_show";
					}
				}else{
					$buttonname="debit_show";
				}
				?>
    			<input type='button' name='<?php echo$buttonname;?>' value='청구서' onclick="return debittogo(this.name);">				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	
	
	function applistbox($xid){
	
		?>
		<script>		
		function applistgo(){
			if(appchoice.appid.value){
				parent.location.href="app.php?a=app_display&foid="+appchoice.appid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function applisttogo(avalue){
            if(appchoice.appid.value){		
				parent.window.location.href="app.php?a="+avalue+"&foid="+appchoice.appid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}


		function appchange(){
			
			
		}
		
		</script>
         <form name=appchoice method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr>
			<td><img src="./icons/pngsand.png" border="0" width="20">사건목록(출원번호)</td>
			</tr>
			<tr>
			<td>
            <select name='appid' size='8' width=100 ondblclick='applistgo();' onchange='appchange();' style = "padding:2;width:200px;">
		    <?php
			$query="select foid,applino from $this->appdata order by applino asc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['foid'];?>" <?php if($row['foid']==$xid){?> selected <?php }?>><?php echo applinostring($row['applino']);?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='app_display' value='상세' onclick="return applisttogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_form' value='수정' onclick="return applisttogo(this.name);">
                </td>

				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	
	function appourrefbox($xid){
	
		?>
		<script>		
		function appourrefgo(){
			if(apprefform.appid.value){
				parent.location.href="app.php?a=app_display&foid="+apprefform.appid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function appourreftogo(avalue){
            if(apprefform.appid.value){		
				parent.window.location.href="app.php?a="+avalue+"&foid="+apprefform.appid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}


		function appchange(){
			
			
		}
		
		</script>
         <form name=apprefform method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
		    <tr>
			<td>
			<img src="./icons/pngsand.png" border="0" width="20">사건목록(당소번호)</td></tr>
            <tr>
			<td>
            <select name='appid' size='8' width=100 ondblclick='appourrefgo();' onchange='appchange();' style = "padding:2;width:200px;">
		    <?php
			$query="select foid,ourref from $this->appdata order by applino asc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['foid'];?>" <?php if($row['foid']==$xid){?> selected <?php }?>><?php echo $row['ourref'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='app_display' value='상세' onclick="return appourreftogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_form' value='수정' onclick="return appourreftogo(this.name);">
                </td>

				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	
	function appidbox($id){
	
		?>
		<script>		
		function appidgo(){
			if(appidform.appid.value){
				parent.location.href="app.php?a=app_display&foid="+appidform.appid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function appidtogo(avalue){
            if(appidform.appid.value){		
				parent.window.location.href="app.php?a="+avalue+"&foid="+appidform.appid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}


		function appchange(){
			
			
		}
		
		</script>
         <form name=appidform method=post style='margin-bottom:0;margin-top:0'>
         <table bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
		    <tr>
			<td>
			<img src="./icons/pngsand.png" border="0" width="20">현재고객사건
			</td></tr>
            <tr>
			<td>
            <select name='appid' size='8' width=100 ondblclick='appidgo();' onchange='appchange();' style = "padding:2;width:200px;">
		    <?php
			$query="select foid,ourref from $this->appdata where lappcode=$id order by ourref asc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['foid'];?>"><?php echo $row['ourref'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=100% border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='app_display' value='상세' onclick="return appidtogo(this.name);">
                </td>
                <td>
                <input type='button' name='app_form' value='수정' onclick="return appidtogo(this.name);">
                </td>

				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	
	
	
	function debitslistbox($ourref){///////////////////각사건별 청구서바로가기
	
		?>
		<script>		
		function debitslistgo(){
			if(debitschoice.debitid.value){
				parent.location.href="debit.php?a=debit_display&fdeid="+debitschoice.debitid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debitslisttogo(avalue){
            if(debitschoice.debitid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&fdeid="+debitschoice.debitid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}


		function debitschange(){
			
			
		}
		
		</script>
         <form name=debitschoice method=post style='margin-bottom:0;margin-top:0'>
         <table width=90 bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr>
			<td>사건별
			</td>
			</tr>
			<tr>
			<td>
            <select name='debitid' size='7' width="20" ondblclick='debitslistgo();' onchange='debitschange();' style = "padding:2;width:90px;">
		    <?php
			$query="select fdeid,debitno,ourref from $this->debitdata where ourref='$ourref' order by debitno desc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['fdeid'];?>" <?php if($row['ourref']==$ourref){?> selected <?php }?>><?php echo $row['debitno'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=20 border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='debit_display' value='상세' onclick="return debitslisttogo(this.name);">
                </td>
                <td>
                <input type='button' name='debit_form' value='수정' onclick="return debitslisttogo(this.name);">
                </td>

				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	
	
	
	function debitwlistbox($xid){///////청구서전체청구서바로가기
	
		?>
		<script>		
		function debitwlistgo(){
			if(debitwchoice.debitid.value){
				parent.location.href="debit.php?a=debit_display&fdeid="+debitwchoice.debitid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debitwlisttogo(avalue){
            if(debitwchoice.debitid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&fdeid="+debitwchoice.debitid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}


		function debitwchange(){
			
			
		}
		
		</script>
         <form name=debitwchoice method=post style='margin-bottom:0;margin-top:0'>
         <table width=90 bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr>
			<td>전체청구서
			</td>
			</tr>            
			<tr>
			<td>
            <select name='debitid' size='7' width="20" ondblclick='debitwlistgo();' onchange='debitwchange();' style = "padding:2;width:90px;">
		    <?php
			$query="select fdeid,debitno from $this->debitdata order by debitno desc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['fdeid'];?>" <?php if($row['fdeid']==$xid){?> selected <?php }?>><?php echo $row['debitno'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=20 border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='debit_display' value='상세' onclick="return debitwlisttogo(this.name);">
                </td>
                <td>
                <input type='button' name='debit_form' value='수정' onclick="return debitwlisttogo(this.name);">
                </td>

				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	


	function debitglistbox($id,$xid){///////////////////각고객별 청구서바로가기
	
		?>
		<script>		
		function debitglistgo(){
			if(debitgchoice.debitid.value){
				parent.location.href="debit.php?a=debit_display&fdeid="+debitgchoice.debitid.value;
			}else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}
		function debitglisttogo(avalue){
            if(debitgchoice.debitid.value){		
				parent.window.location.href="debit.php?a="+avalue+"&fdeid="+debitgchoice.debitid.value;
		    }else{
				alert  ('먼저선택해주세요.!!');
				return false;
			}
		}


		function debitgchange(){
			
			
		}
		
		</script>
         <form name=debitgchoice method=post style='margin-bottom:0;margin-top:0'>
         <table width=90 bordercolor=dddddd cellspacing=0 cellpadding=1 style='border-collapse:collapse;'>
            <tr>
			<td>고객별
			</td>
			</tr>
			<tr>
			<td>
            <select name='debitid' size='7' width="20" ondblclick='debitglistgo();' onchange='debitgchange();' style = "padding:2;width:90px;">
		    <?php
			$query="select fdeid,debitno from $this->debitdata where attcode='$id' order by debitno desc";
		    $result=$this->connection->query($query);
			if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					?>
					<option value="<?php echo$row['fdeid'];?>" <?php if($row['fdeid']==$xid){?> selected <?php }?>><?php echo $row['debitno'];?></option>
					<?php					
				}

			}
			?>
			</select>


			</td>
			</tr>
			<tr>
			<td>
			
                <table width=20 border=1 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'>
                <tr>
                <td>
                <input type='button' name='debit_display' value='상세' onclick="return debitglisttogo(this.name);">
                </td>
                <td>
                <input type='button' name='debit_form' value='수정' onclick="return debitglisttogo(this.name);">
                </td>

				<td>
				
				</td>
				<td>
				
				</td>
				<td>
				
				</td>
				</tr>
				</table>
			</td>
			</tr>
			
		</table>
		</form>
		<?php
	}	
	

}

