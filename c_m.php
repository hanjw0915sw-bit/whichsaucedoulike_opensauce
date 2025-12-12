<?php
include_once('./adbconfig.php');
///데이타베이스가 mysql 7.2.0 에서 작성된 것임
///mysqli 또는 PDO 명령어로만 사용가능

/*
	$gif_bluedisk="R0lGODlhHAAcAJEAAAAAAP///0Fp4f///yH5BAEAAAMALAAAAAAcABwAAAJS3ISpy+annpzprUmFq+bijYAhxH2kGHpmyagf25bvSMZmR8cyBuvabfEJh8Si8bgDBl3KTKQ5e0KdyWmNZkVhs9cfFyf9Nr7g6nRMrpiVT6StAAA7";
	$gif_brain="R0lGODlhHAAVAPcAAAAAAP////38+p+foIKCg5ucm42Ojff49vP08urr6cDBv+Xn4ubn5Ofo5Obn4+Dh3OXm4OHi3Ojo5Jycmvz8+vv7+fr6+Pn59/X18/Pz8fLy8PHx7+rq6Onp5+Xl4+Li4OHh397e3NnZ19PT0dHRz87OzMzMysjIxsbGxMXFw8TEwr+/vX19fP///vz8+/v7+vn5+Pf39vX19PPz8u/v7u3t7Ovr6ufn5uHh4N/f3t3d3NfX1tbW1dHR0M/Pzs3NzMvLysfHxsXFxMPDwsLCwb+/vr29vLy8u7q6ubm5uLi4t7e3tra2tbS0s7KysbGxsLCwr6+vrq6ura2trKysq6urqqqqqampqKiop6ampaWlpKSko6KioaGhoKCgn56enZ2dnJmZmJWVlJKSkZGRkJCQj4uLiv79+/r59/Lx7/Dv7e7t6+Lh393c2tbV09DPzc7Ny8zLycvKyMrJx8jHxcLBv6KhoJ6dnJeWlf/+/fz7+vf29fLx8O/u7e3s6+zr6tva2dbV1NXU09TT0tLR0MjHxsLBwMC/vrq5uLa1tLCvrqyrquno6MzLy8bFxbu6urOysqqpqaempqOioo6NjfDw8MDAwLS0tJ+fn5eXl5KSko2NjYmJif///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAJ0ALAAAAAAcABUAAAj/AB9A6FCDxoEKN4howfLlyaZMQfBM0QGjxQUEG2pwWBBhYI0NLz6UKCNnSBNCTpQYOSKnSJIlhBBYwKChRgcIDf6kuZBDEpUSWJJY+cPDCyYURKgoQKEgywsXGDb8kcBBTQwnYp6cQKHkyg8cTsIwCbEFEpIRU7oIoXGRRgI/CGYMUOJEBRAVgqBkCQQnSBBKUOoUkmJmTJhKFjKq4cODiBdJKaw8scFFASA2Joo04tKkyZsoSKhYkoFBDQIbBJhEmSDnBCY5CpocMWHHSZs7BpKQSLRFjBgQFDZg8NDFShAtc0p0MYEECBMiRZYsIaMATJRFYTZVSaIBQQwPT4hs/3ncxoSCExKbAEGiZQSJKE5WSHFyAsmNGDJmoJhSmUsKQl9YMcQOWyhAiAJEHGJECSs8goIRVxxBAQYvtCBJAXJsAcUJVQzRwxSc9EBHElwcQYUhCwIyRBgoQAVDHn1EEsYUWGChBSYmJFHFClRsoQQSTqTwBApJpPTDhDAI0IIAjAySyBRDaNJEFksg8YYRTyihQBteOHHFCkcIMeEFFAhwRgsBBMACJkv0IIQVJriRAhdGrGDEEkQ04YMiIVyQwUECBGpmAprQdwkiRzxixQoiSAKCCCGUEMIOB9AUgwWCBhpAB2KAaYgjZWiShBFSFCIHbIYocABGMlyQqaZ/nHlwghNfHCGfEZlEYoQKR4yBRGI1IHDAC68qmeYZK/gQhSAlZHEEFka0oUQMGNSQgHCAFnvGHpOUkMJ2gbwQgh9nWLCHVB2soYEMMOhRrAB5tCBHCj9wgUUALeQBQwwZ2ORAAjRksEe72qIRB1MpuHAGBTDskYFbDAQEADs=";
	$gifgod="R0lGODlhHAAZAPcAAAAAAP////4rLCQnJ+3//yYpKe7///H///L///P///T///X///b//3l9ffb9/SIjI/X7+/b7+zAxMfb6+j4/P/b4+HV2dv3+/p+trPH+/fP//qu9u+3//ez+/PH7+tPk4rzJx+z6+PL5+ENJSOz9+tbi4PD7+fj+/fT6+e///PX6+fT5+O37+N/s6ZCUk/T49+349fD39e/29O718+308jQ3NvP59/L49vD29O/18+Hn5eDm5PX49/P29fL19PH08+/28/P39fL29PD08u/z8e7y8Pz+/fr8+/j6+ff5+PX39vT29fP19PL08/Hz8urs6+Xn5svNzO7z8Pn8+vb59/X49vT39fP29PL18/H08vDz8e/y8Nfa2NLV0/L28+/z8CQlJC4vLjk6OTY3NlRVVEtMS0RFRPv9+/f59/b49vX39V9gX/r7+vb39vX29fLz8t/g393e3dTV1NDR0JqbmoaHhu7w7evt6u/t6+7q5/Hu7PDt6+fk4vXx7/Ds6vbx7/Pv7vHt7PDs6+/m5Lm0s/bx8PXw7/fx8PXv7u/Z1u/f3fPZ1/jPzPDKyPTZ1/Ognvuvrfi5t/G2tPPBv/DBv/fe3f8AAP8CAv8DA/8FBf8GBv8HB/4LC/4UFP4WFf4WFv4XF/0bG/wgIPwpKPwrKv4sK/0rK/0sK/wrK/4sLP8tLf0tLfwuLvwvLv4vL/4xMf8zMv8zM/80NPo5OPo9PPtERPxGRvlKSf1UU/lTUvhfXfliYvtnZvdpaPdubfV4d/WDgviJiPyNjPqRkfWQj/OVk/epqPfFxPjs7L+6uvbx8ff19VpZWb+/v5qamm5ubmNjY2FhYVpaWj8/Pzo6OjIyMi0tLSwsLCsrKyoqKigoKCYmJiUlJSQkJCIiIiAgIB4eHv///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAOEALAAAAAAcABkAAAj/AMMJHEhwoCVLBRMqXHhwoUOGlxo+nBju4K9bCCk+tCTqDqVMGTUmPFjMQApdEkUStDRLyI4WjjqFVFnxUiQMY8RsEJZSpSVcJWqAeTCCD6yZGi1xYgTiGrZsEj5A6jnxYC8EXao9paYDQi2kGz8lMpFFGrdu0NJomKQJrMKDwDhkCeDMmzc6AYJk2EX17ag8MXwYkRPG2pwLVzwsklnV0iMOP9QcaVPGzBskV7AcCNZ3JS0aObzwYBPg2ZozSTKLALTKrUBLmCSR+OKjCpIAdSwESJOZSQJjnSvmCiGFSBMrFQLAiRPAyhUmTF6gsOVWaSMWRb5kEXKkGbNoUaZAnu+xRMGxTUgP+uogJfuQKlCmfQNHxomSJUvc8FjAq6elUIrAsAURWmhBBRfWaLMNBU+gkZ8SbThQySchHUQMATMAIQMOMdxgQwMDFODCCSisoIIKE0TAwDASWdLKIHb4gccee+gRSB+CEJKMIYUgYsgfhShzyDLIvILQQZ6wQsqSTKKCiiqyxJKKKaacUkoqWArgCigHdenll2CG2WVAADs=";
	$pnggod="iVBORw0KGgoAAAANSUhEUgAAABwAAAAZCAYAAAAiwE4nAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAFLUlEQVR42mL4z8DAQCIWAOJzQDyDDL0MAAHEQIameiD+D8T/gNiOVP0AAUSqZSpA/P4/E9N/qKWHgJiZFDMAAohUC+eDLPpaUf7/p5cnzNJEUswACCBSLLMA4l9/FBT+v3776v+Hg/v//2dlBVn4AIiFiTUHIICItYwRiHeCfPR56uT/7/7////+/5//P+JjYb5sJdZCgAAi1kJ/kMG/LC3+f/r25f+DZ0/+33/z8v+Xm9f//xMRAVn4EYjViTELIICIsYwDiM+DEsqPndv/z1+75r+Zudl/SyvL/6v37v7/p7cH5stlxFgIEEDEWJgJMvBvSPD/a48e/DcBWqaiqvJfSVn5v7Onx//nTx79/29sBLLwDxA7EDIPIICYGPADCSCu/s/NzfC7upLh2fPnDD++fmNgZ2Nn4GBnZ3j74iXDG6CCPzXVILXMQNwCxKz4DAQIIEIWFgOx9M+4WIZfBsYMYjw8DGxsbHBJLk5OBj5mZoZfPn4Mf1xcQELWQJyAz0CAAMJnoSYQp/8XE2P4UZDH8O/PLwZ5eXkGDQ0Nhl+/foGxpqYmg6igIMM/FmaGH7VAX0IcUwvEorgMBQggfBaCNPJ+z81h+KemzsD48ycDHzcvg4ODA8Pfv38Z/v37x2BuYc7Ayc7JwPDjO8M/WzuGXzExIH2yQFyCy1CAAMIVuTagRPBHU+P/u1fP/3/4/vX/p69f/v/59/f/latX/uvp6/3X1dX9f+Hihf9///37/xmYVT7+/vX/MyKbfAZiDWxmAwQQEw5fN4ESwffyMob/omIMjH//MTAzMYJ9paSkxCArK8sgLiEOZv/+8xusifHXT2BIAIO7FOw5HiBuxOZBgADCZmEwEDv+trVh+BUSwsD07RsDI0gViAC6nZODk0FZSZlBWlqagZOLEyj0H64RZOnvtDSGf7q6IG4IEDujGw4QQOgW8oJdBkx53ysrGP5zcgArob9AixjBAfIPariEpASDmJg4AwsTC9DCfwgL//wB1paCDL8g2YQJWzYBCCD0MC4FZfKfwUH/3/z68f/d5w//33/++P/Tl8//vwDj8duPH/9B4P6D+//v3rsLZoPEQXH4+SsEf/nx/f+XXz///3Fzg5VAach2AAQQsmXSQPziHzf3/w+nTvx/+xto4SeQhR/+f/zyCVyG/vrz+//+/fv/R0VG/k9MTPx/+uyZ/z///IJb9vnb1/9fQBjokO9Hj/z/z84OsvAxEIvB7AEIIGQLJ4Jc9D0v9/+bf3/AvoNZ+AFo4dcf3/4/ff7sv729/X8FYBUlJyf3PyQ05P/Hz0C5798gFgHxVxAG+vIr0NLf6WkwX/bA7AEIIFgcgmI59R8wIfwoLABHPqg+YmRkZABBkBYQ+9PnTwzv3r1j4ODgAONXr14z/ATmTyYmRkgcggmgDpB6YIr+U17OACo4gCADiLVBDIAAgllYB8ScP4BJ+p+CEjgbMABLD1DiAWMWFmDJ/J9BBljS+AQEgNkg8aDQEAY+ISGGv6AUDFUH0QOkgRb+V1Ri+FMNTkDcsGwCEEAgj4CS7q6/+npMn7dvY/gPTOpMf/4CEyYjxMUMEJ+CwoMF6Ijfv/8wnDxxAliKsTOYmZmC5f4DDQf7jBHmT5BekAZWBsbv3xnYXF0ZGM+fB4WoJ0AAgSw8DWSY/BcTZfgnIcnA8PcPjjIJYj0zE9A3wJoCFMz/gcEJz4eMMBWMqFkAFFIvXjAwvnwJEjkHEEBAvzN8BeKPjMD4YAZiUgAjqvHEgK8AAQYArjdKW4mOCpAAAAAASUVORK5CYII=";
	$pngupload="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";

	$png1="iVBORw0KGgoAAAANSUhEUgAAABcAAAATCAYAAAB7u5a2AAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAADZ0lEQVR42mL8//8/Ay7w45YQF5CyBmI/IDYBYjWo1C0gPgPEm4D4KIfau2/Y9AMEECMuw4EGiwGpaiAOB2JxHPa/BOKVDAz/WznU3r9ClwQIIKyGAw3mBVLdQJzOQBT4P/PnP95ifo1HX5FFAQKICYfqICBOZSAaMKYyM/4KRBcFCCBchochyV0B4jYgdgZiESh2hopdgZnDwvgrEt0QgADCFSwfgBQ/EO8D4iZghB3EES/2QKoOiJ3+/mf6wK3+RhBZHiCAsLqckeE/I5Q5B5fBIACVmwMMc4Z//1m+o8sDBBBWw//+Zz0MtADE3EpEgG/9+5+ZgZGRqRNdAiCAsBr+4y9Pz59/rCDTvQlGJcN/77//2e8CvToNXQ4ggLAazsb849A/BuZ6oONToOGKIy8I2v/5zxbIyvQvkpHx/x90eYAAYlx69C44AF59+cPw6MMvoFMYGT7++MeWo1HBqMF3yp+R4V8eUCMobPcC8UWoPn1oijH69Y+3dcn98lPXPtn+YmViYpDmY2UQ4WZiYGVmZAAIIBTDX3z+zfDx5z/jp59+J7MxMzxlY/q/fK6N+9ff/1htgfrygV7nZGL8y83w/9+HP/852nY/C72x8XGU26cfLBpCXMxLRbhZTohxs8ANBwggsOH/gKZ//PGX8dLL7+nnn/1o/frrnxArEyMDPwfjeX5Otp1ffgse42Vnvvfi86/ffBxM7EwMTKLcLB/MP/746fX22z+bP0AD2FkYP1jKcdepibBP5eNg/AcyHCCAWCBhzMjw5uuf1FOPvk/6/e8/KwcLMJpAFv78b/jx5w9DduYXX3/8Yvzw/x/D7y/fGVj+M/znffWbge8fMMkyA4MRaDDDz7//BY49+jqBF2i1CDf7ZFBoAAQQCxPQhS++/LHcdedL0x+YwQzgoGdghqaH338ZuH/9/c8NEvsNzXOMwKTAwsCISPNAB/4A5qR9d7/Ui/EwX5bkYT0AEEBMr7785jn84GvR+x9/xdmhBmPEOtAMoBvARjEhsVGKLqgFwAgSPnjva/HLL7/5AAKI6d33v6Z33/3052BmYPjPQBn4Dw3ihx9+e73+9tcGIICY7rz5FfQbmCUZGRkZqAFApgCDl+nW65+BAAHE8ujjLz0WJsYfoDzBQCUANI/j+ec/mgABBgAPRUh1WeE0BwAAAABJRU5ErkJggg==";
		//외국인아이콘
	$png2="iVBORw0KGgoAAAANSUhEUgAAABcAAAATCAYAAAB7u5a2AAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAD6klEQVR42mJk45ZlQAb///9nYOfiYmBhYWP8+eO74b8/v3cCxUSAUv+QlDExMjJ+BNIeQHwXKP+aAQsACCAmbIKMDIysQGt8GP7/Ows1GKYWhkGO4AdSx4F4BxBLYzMHIICYmdn4UQ1mZOBiZmGN+fPnz7K/v38xgqzCB5hYWCRZ2NhEgap2Abm/gT5igGGAAAIazodqOBNT8L+/fxf8/f0b5HUGQuD/v/8gg9SB+u4CVV9ENhwggJhY2NgZkDEzK7sZ0MvIwfUEiCcAsRcQi0GxF1Tsyf///xj+/vnDAXSVJRMLKwMyBgggFmD8oTuFmREUFBBXXwPipp9fHq1EU7UdhNl55E4AXVgHjACtPz9//Ae6HkURQABhRChQwT9IMINtnY/FYDiAys1nBMcVE+P/f/8YkDFAADEBAQMyZmT4/xuUHP9DvLSRcKD/B6thYmNlZGJmYUDGAAHE9P/fXwZk/Ofnz1nMLCx3QJLEAKCJDEysbLcZ//+fwMQCZCNhgABi+vPrFwMy/vHl0Z3f3z47///79x5Qqz8hw3/9+OL/+8v7BV/f3bnBgBYsAAHEwi8kDFYETFEMf4FBISRjwPD756tHwnJGPR+fPfRkZOR//P//R6zhzsQkFC4ir/IloGHGPFEFUwYuPgEGYGoAZV+wPEAAMS4/fh8cda++/GF4+PEXAzMHN8Onb7+E2dlYPh5cOIXlx6tHZbeObnvFyMDykJGR+cz//8DgY/hjomrlKckjKf/HNTFv+bcfv7mYWZk/Mv/+wSDNx8ogws3EwAq0BSCAWP6BvAByOcgbDP85X775GPHww480dmam53pRRZPfvH/fyqVkJMTFxWb39Q+DMRvjP46/v/8yuASFLv/EwCV07dGzad9+/dMW42VdKCvAthRozhegUQz/gK4HCCB4rDEzMYo9fP+z59rrX7GghMLI+J/h3bfHHgLcbBdUvWL2cbMynnz57c8fXjamX8BUJX/u0au1n76/tvn2h5EXlEuff/ljCQwOBwkeliKgcc9BZgIEEMTw/wy8V1/+6L744kcsOwvESyDf/PnPyPny8y/LV5+eWELCmJHhOdBmUPwAMz2YzwbMKYxA9X/+MTKcffo9ghXId1ThzgQq/wAQQCwvvv5hevHpT8LhB1/jOIEyzIwQgyHlKixyIGIg1n9QgcSAWpz9B/ucgYETWJaefPItQoib+bwsH2sPQAAx/f33X/H442/FIElkgzGLYQSNqzgD6WcD+uL4o28Fv/7+VwcIIKaH73/7vf/2R56NGbfBxAKQfhagdz///Cd5792vQIAAYrr15mcEMxMDVQEL0Ad33v4KAQgwAFcklX0caEloAAAAAElFTkSuQmCC";
    $pngmag="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";
*/         
function generateQR($url, $width = 150, $height = 150) {
        $url    = urlencode($url);
        $image  = '';
         
        return $image;
}
function addstring($varname,$varvalue){
    $str="";
    if(  strlen(trim($varvalue))>0 ){
        $str="&".$varname."=".$varvalue;
    }else{
	    $str="";	
	}
	return $str;	
}


function addid($idname,$idvalue){
    $str="";
    if(  $idvalue>0  ){
        $str="&".$idname."=".$idvalue;
    }else{
	    $str="";	
	}
	return $str;	
}

function addmore($a,$string){
    $str="";
	if ($a=="0"){$a="";}
	if (strlen(trim($a))>0){ 
		$str="<font color=white style='background-color:green;padding:5px;'><b>".$string."</b></font>";
	}else{
		$str=$string;	
	}
	return $str;
}
function addless($a,$string){
    $str="";
	if ($a=="0"){$a="";}
	if (strlen(trim($a))<1){ 
		$str="<font color=white style='background-color:green;padding:5px;'><b>".$string."</b></font>";
	}else{
		$str=$string;	
	}
	return $str;
}
function arraygreen($array,$b,$string){
    $str="";
	if($b=="0"){$b="";}
	if (strlen(trim($b))>0){ 
		if (in_array($b,$array)){
			$str="<font color=white style='background-color:green;padding:3px;'><b>".$string."</b></font>";
		}else{
			$str=$string;	
		}
	}else{
		$str=$string;	
		
	}
	return $str;	
}
function addgreen($a,$b,$string){
    $str="";
	if($b=="0"){$b="";}
	if (strlen(trim($b))>0){ 
		if(  $a==$b ){
			$str="<font color=white style='background-color:#0066ff;padding:2px;'><b>".$string."</b></font>";
		}else{
			$str=$string;	
		}
	}else{
		if($a==""){
			$str="<font color=white style='background-color:#0066ff;padding:2px;'><b>".$string."</b></font>";			
		}else{
			$str=$string;	
		}
		
	}
	return $str;	
}
function oderban($a,$b,$value){
    if($a==$value){
         return $b;
    }elseif ($b==$value){
         return $a;
    }else{
         return $a;
    }		
}

function selected($a,$b){
    $str="";
    if(  $a==$b ){
        $str="selected";
    }else{
	    $str="";	
	}
	return $str;	
}
function checked($a,$b){
    $str="";
    if(  $a==$b ){
        $str=" checked ";
    }else{
	    $str="";	
	}
	return $str;	
}
function gradestring($grade,$fornot=2){
//global $fornot;
    if(!$fornot){$fornot=2;}
    if($fornot==1){
        if ($grade==4){$gradestring='opposition';}
        elseif ($grade==1){$gradestring='trial';}
        elseif ($grade==2){$gradestring='suit';}
        elseif ($grade==3){$gradestring='suit before Korean Supreme Court';}
        elseif ($grade==5){$gradestring='Information';}
    }
    elseif($fornot==2){
        if ($grade==4){$gradestring='이의';}
        elseif ($grade==1){$gradestring='심판';}
        elseif ($grade==2){$gradestring='소송';}
        elseif ($grade==3){$gradestring='상고';}
        elseif ($grade==5){$gradestring='정보';}
    }
    return $gradestring;
}

function addbr($su=1){
    $i=0;
    for($i=0;$i<=$su;$i++){
	    echo "<br>";
	}

}

function pic($grim,$width,$title=""){
	?><img src="data:image/png;base64,<?php echo$grim;?>" width="<?php echo$width;?>" border=0 title="<?php echo$title;?>"><?php	
}	
function picgif($grim,$width,$title=""){
	?><img src="data:image/gif;base64,<?php echo$grim;?>" width="<?php echo$width;?>" border=0 title="<?php echo$title;?>"><?php	
}	
function picjpg($grim,$width,$title=""){
	?><img src="data:image/jpg;base64,<?php echo$grim;?>" width="<?php echo$width;?>" border=0 title="<?php echo$title;?>"><?php	
}	

function upprinter(){
	?>
	<div class="noprint">
	<table width=100%><tr><td align="right">
	<?php
		$printer="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";
	?>
	<span onclick="window.print();" style="cursor:hand;"><?php pic($printer,20);?></span>
	</td></tr></table>		
	</div>	
	<?php
}

function obtainextension($filename){ ///파일 확장자
	if(   (strlen(trim($filename))>0)   &&  (is_file($filename))    ){
		$extension = pathinfo($filename, PATHINFO_EXTENSION); 
	}
	return $extension;
}

function pagerefresh(){	
	?>
	<a href="JavaScript:window.location.reload()"><img src="./icons/refresh.png" width=30>페이지새로고침</a>
	<?php
}

function dbconnection(){
   /*
   global $hostname,$dbuser,$dbpass,$dbname;
   global $charset;
   mysqli_query("set session character_set_connection=$charset;");
   mysqli_query("set session character_set_results=$charset;");
   mysqli_query("set session character_set_client=$charset;");
   $connection=new mysqli($hostname, $dbuser, $dbpass);
   return $connection;
   */
}

function detectencoding(){ 

	$ary[] = "UTF-8"; 
	$ary[] = "EUC-KR"; 
	$ary[] = "ASCII"; 
	$ary[] = "JIS"; 
	$ary[] = "eucjp-win"; 
	$ary[] = "sjis-win"; 
	$ary[] = "euc-jp";  
	$result = mb_detect_encoding("사랑해", $ary);
	return $result;
	
}
function obtainfornot($id){
	global $connection;
	$fornot="";
	$query="select countrycode from customer where id='$id'";
	$result=$connection->query($query);
	if($result->num_rows>0){
		$row=$result->fetch_row();
		$countrycode=$row[0];
		if(  trim($countrycode)==""  ){
			$fornot=2;
		}else{
			if (strtolower($countrycode)=="kr" ){
				$fornot=2;
			}else{
				$fornot=1;
			}
		}

	}
	return $fornot;
	
}
function obtainclas($id){
	global $connection;
	global $customdata;
	$clas="";
	$query="select clas from $customdata where id='$id'";
	$result=$connection->query($query);
	if($result){
		if($result->num_rows>0){
			$row=$result->fetch_row();
			$clas=$row[0];
		}
	}
	return $clas;	
}
function optioncountrycode(){
	global $connection;
	$string="";
    $query = "select twocode,krname from countrycode order by binary(krname) asc";
	$result = $connection->query($query);
	if ($result){
	    while($row=$result->fetch_row()){
		    if($row){			    
                $string.="<option>".$row[1]."</option>";
			}
	    }
	}
	return $string;
}	
function allhr(){
	?>
	<div class="noprint">
    <hr color="steelblue" style="height:10px;">	
	</div>
	<?php
}
function pageline(){
    ?>
	<p style="page-break-before: always;">
	<?php
}	
function fontstyle($kind=1){/// 1은 홈페이지   2는 모바일
    
	global $charset2;
    date_default_timezone_set("Asia/Seoul");
	
	if($kind==1){///홈페이지
		?>
		<META http-equiv="Content-Type" CONTENT="text/html; charset=<?php echo$charset2;?>">
		<?php
		$fontsize="11";
    }
	elseif($kind==2){
		?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />

		<?php
		$fontsize="13";
	}
	?>
	<style>
	html, body { border:0; margin:0; padding:0; width:100%; height:100%; } 
	body,td,a,p,h,div,input,span,textarea{font-size:<?php echo$fontsize;?>pt;color:black;font-family:'Times New Roman';}
	table{border-collapse:collapse;}
	//td{padding:3px;border:1px solid #eeeeee;}
    A:Hover {color:red;font-weight:bold;text-decoration:underline;}
    A {color:black;text-decoration:none }
    Body {background-color:white;}
    </style>

    <style media='print'>
        .noprint     { display: none }
    </style>
    <style type ='text/css'>
          P.breakhere {page-break-before: always;}
    </style>		
    <script language='javascript'>
        function getElement(e,f){//////////////////이게 있어야  div block none이 가능해진다...
            if(document.layers){
                f=(f)?f:self;
                if(f.document.layers[e]) {
                    return f.document.layers[e];
                }
                for(W=0;i<f.document.layers.length;W++) {
                    return(getElement(e,fdocument.layers[W]));
                }
            }
            if(document.all) {
                return document.all[e];
            }
            return document.getElementById(e);
        }
    </script>
    <script>
        function trim (str) {
            str = this != window? this : str;
            return str.replace(/^\s+/, '').replace(/\s+$/, '');
        }
    </script>

    <script>
        function popup(self,wvalue,hvalue){
            var newwin=window.open(self.href,'newwin','scrollbars=yes,toolbar=no,resizable=yes,width='+wvalue+',height='+hvalue+',left=0,top=0');
            if(navigator.appName.indexOf('Microsoft')>-1){

            }else{
                newwin.moveTo(0,0);
                newwin.resizeTo(wvalue,hvalue);
            }
            newwin.focus();
            return false;
        }
		
    </script>
    <script>
        function newup(ref){
            w=window.open(ref,'googlewin','width=990,height=600,status=1,scrollbars=yes,top=0,left=0');
            w.focus();
        }
    </script>

    <?php
	/*
    <script src="chart.js"></script> 
	*/
	?>
    <script>	
            function todayinsert(formname,fieldname){
                var field1=fieldname+"_1";
                var field2=fieldname+"_2";
                var field3=fieldname+"_3";

			    var date=new Date();
                var year=date.getFullYear();
				var month=date.getMonth()+1;
                var day=date.getDate();		
                if (month<10){month="0"+month;}				
                if (day<10){day="0"+day;}				
		        document.forms[formname][field1].value=year;
		        document.forms[formname][field2].value=month;
		        document.forms[formname][field3].value=day;			
			}
            function deletedate(formname,fieldname){
                var field1=fieldname+"_1";
                var field2=fieldname+"_2";
                var field3=fieldname+"_3";
		        document.forms[formname][field1].value='';
		        document.forms[formname][field2].value='';
		        document.forms[formname][field3].value='';
		
			}
			function onedayafter(formname,fieldname,suntak){
                var field1=fieldname+"_1";
                var field2=fieldname+"_2";
                var field3=fieldname+"_3";

			    var date=new Date();
                var year=date.getFullYear();
				var month=date.getMonth()+1;
                var day=date.getDate();		

				var xyear;
				var xmonth;
				var xday;
				
				xyear=document.forms[formname][field1].value;
				xmonth=document.forms[formname][field2].value;
				xday=document.forms[formname][field3].value;


                if (xyear==""){xyear=year;}
				if (xmonth==""){xmonth=month;}
				if (xday==""){xday=day;}

                var monarr = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
                var stringarr = new Array('00','01','02','03','04','05','06','07','08','09');
                xmonth=eval(xmonth);
                if (((eval(xyear) % 4 == 0) && (eval(xyear) % 100 != 0)) || (eval(xyear) % 400 == 0)) {monarr[1] = "29";}
                       if (suntak=='a'){
                             xday=eval(xday) + 1;
                             if (xday>monarr[xmonth-1]){
                                     xday=1;
                                     xmonth=eval(xmonth)+1;
                             }
                             if (xmonth>12){
                                     xmonth=1;
                                     xyear=eval(xyear)+1;
                             }
                       }
                       else if (suntak=='b'){
                             xday=eval(xday) - 1;
                             if (xday<1){
                                  xmonth=eval(xmonth)-1;
                                  if (xmonth<1){
                                        xmonth=12;
                                        xyear=eval(xyear)-1;
                                  }
                                  xday=monarr[xmonth-1];
                             }
                       }
                if(xmonth<10){xmonth="0"+xmonth;}
				if(xday<10){xday="0"+xday;}
		        document.forms[formname][field1].value=xyear;
		        document.forms[formname][field2].value=xmonth;
		        document.forms[formname][field3].value=xday;
			}


	</script>

    <?php

}

function dateinsform($formname,$varname,$value,$next){
   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);

   $todayyear=date("Y");
   $todaymonth=date("m");if(strlen($todaymonth)==1){$todaymonth="0".$todaymonth;}
   $todayday=date("d");if(strlen($todayday)==1){$todayday="0".$todayday;}
   ?>


 
   <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;"><tr>
   <td><input type='text' name='<?php echo$va_1;?>' value='<?php echo$var_1;?>' size='4' maxlength='4'  style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:42;padding-top:1px;" <?php movefocus($formname,$va_1,$va_2,4);?>></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_2;?>' value='<?php echo$var_2;?>' size='2' maxlength='2'  style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:24;padding-top:1px;" <?php movefocus($formname,$va_2,$va_3,2);?>></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_3;?>' value='<?php echo$var_3;?>' size='2' maxlength='2'  style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:24;padding-top:1px;" <?php movefocus($formname,$va_3,$next,2);?>></td>
   <td><input type='button' value='<'  onclick="onedayafter('<?php echo$formname;?>','<?php echo$varname;?>','b');">
   </td>
   <td>

   <input type='button' value='오늘' onClick="document.<?php echo$formname;?>.<?php echo$va_1;?>.value='<?php echo$todayyear;?>';document.<?php echo$formname;?>.<?php echo$va_2;?>.value='<?php echo$todaymonth;?>';document.<?php echo$formname;?>.<?php echo$va_3;?>.value='<?php echo$todayday;?>';<?php if(  (isset($next))  && (  strlen(trim($next))>0)  ){?>document.<?php echo $formname;?>.<?php echo$next;?>.focus();<?php }?>">
   </td><td>
   <input type='button' value='>' onclick="onedayafter('<?php echo$formname;?>','<?php echo$varname;?>','a');">
   </td><td>
   <input type='button' value='x' onClick="deletedate('<?php echo$formname;?>','<?php echo$varname;?>');">
   </td></tr></table>
   <?php
}
function dateinssero($formname,$varname,$value,$next){
   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);

   $todayyear=date("Y");
   $todaymonth=date("m");if(strlen($todaymonth)==1){$todaymonth="0".$todaymonth;}
   $todayday=date("d");if(strlen($todayday)==1){$todayday="0".$todayday;}
   ?>
   <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;"><tr>
   <td><input type='text' name='<?php echo$va_1;?>' value='<?php echo$var_1;?>' size='4' maxlength='4' <?php movefocus($formname,$va_1,$va_2,4);?>></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_2;?>' value='<?php echo$var_2;?>' size='2' maxlength='2' <?php movefocus($formname,$va_2,$va_3,2);?>></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_3;?>' value='<?php echo$var_3;?>' size='2' maxlength='2' <?php movefocus($formname,$va_3,$next,2);?>></td>
   </tr>
   <tr>
   <td colspan=5>
    <table>
	<tr>
	<td>
    <input type='button' value='<'  onclick="onedayafter('<?php echo$formname;?>','<?php echo$varname;?>','b');">
    </td><td>
    <input type='button' value='오늘' onClick="document.<?php echo$formname;?>.<?php echo$va_1;?>.value='<?php echo$todayyear;?>';document.<?php echo$formname;?>.<?php echo$va_2;?>.value='<?php echo$todaymonth;?>';document.<?php echo$formname;?>.<?php echo$va_3;?>.value='<?php echo$todayday;?>';<?php if(  (isset($next))  && (  strlen(trim($next))>0)  ){?>document.<?php echo $formname;?>.<?php echo$next;?>.focus();<?php }?>">
    </td><td>
    <input type='button' value='>' onclick="onedayafter('<?php echo$formname;?>','<?php echo$varname;?>','a');">
    </td><td>    
	<input type='button' value='x' onClick="deletedate('<?php echo$formname;?>','<?php echo$varname;?>');">
    </td></tr>
	</table>
	</td></tr>
	</table>
    <?php
}
function dateonly($formname,$varname,$value,$next){
   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);

   ?>

 
   <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;"><tr>
   <td><input type='text' name='<?php echo$va_1;?>' value='<?php echo$var_1;?>' size='4' maxlength='4' style="border-width:1;color:gray;border-style:solid;padding:0; width:36;padding-top:1px;" <?php movefocus($formname,$va_1,$va_2,4);?>></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_2;?>' value='<?php echo$var_2;?>' size='2' maxlength='2' style="border-width:1;color:gray;border-style:solid;padding:0; width:20;padding-top:1px;" <?php movefocus($formname,$va_2,$va_3,2);?>></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_3;?>' value='<?php echo$var_3;?>' size='2' maxlength='2' style="border-width:1;color:gray;border-style:solid;padding:0; width:20;padding-top:1px;" <?php movefocus($formname,$va_3,$next,2);?>></td>
   </tr></table>
   <?php
}

function dateinsert($formname,$varname,$value,$next){
   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);

   $todayyear=date("Y");
   $todaymonth=date("m");if(strlen($todaymonth)==1){$todaymonth="0".$todaymonth;}
   $todayday=date("d");if(strlen($todayday)==1){$todayday="0".$todayday;}
   ?>

 
   <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;"><tr>
   <td><input type='text' name='<?php echo$va_1;?>' value='<?php echo$var_1;?>' size='4' maxlength='4' <?php movefocus($formname,$va_1,$va_2,4);?> style='border-width:1;color:gray;border-style:solid;padding:0; width:34;padding-top:2px;'></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_2;?>' value='<?php echo$var_2;?>' size='2' maxlength='2' <?php movefocus($formname,$va_2,$va_3,2);?> style='border-width:1;color:gray;border-style:solid;padding:0; width:18;padding-top:2px;'></td>
   <td>-</td>
   <td><input type='text' name='<?php echo$va_3;?>' value='<?php echo$var_3;?>' size='2' maxlength='2' <?php movefocus($formname,$va_3,$next,2);?> style='border-width:1;color:gray;border-style:solid;padding:0; width:18;padding-top:2px;'></td>
   </tr>
   <tr>
   <td colspan=5>
   <table><tr><td>
   <input type='button' value='<'  onclick="onedayafter('<?php echo$formname;?>','<?php echo$varname;?>','b');" style='border-width:1;color:gray;border-style:solid;padding:0; width:20;padding-top:2px;'>
   </td><td>
   <input type='button' value='오늘' onClick="document.<?php echo$formname;?>.<?php echo$va_1;?>.value='<?php echo$todayyear;?>';document.<?php echo$formname;?>.<?php echo$va_2;?>.value='<?php echo$todaymonth;?>';document.<?php echo$formname;?>.<?php echo$va_3;?>.value='<?php echo$todayday;?>';<?php if(  (isset($next))  && (  strlen(trim($next))>0)  ){?>document.<?php echo $formname;?>.<?php echo$next;?>.focus();<?php }?>" style='border-width:1;color:gray;border-style:solid;padding:0; width:20;padding-top:2px;'>
   </td><td>
   <input type='button' value='>' onclick="onedayafter('<?php echo$formname;?>','<?php echo$varname;?>','a');" style='border-width:1;color:gray;border-style:solid;padding:0; width:20;padding-top:2px;'>
   </td><td>
   <input type='button' value='x' onClick="deletedate('<?php echo$formname;?>','<?php echo$varname;?>');" style='border-width:1;color:gray;border-style:solid;padding:0; width:20;padding-top:2px;'>
   </td></tr></table>
   </td></tr></table>
   <?php
}

function metastring(){
    global $charset2;
    ?>
	<META http-equiv="Content-Type" CONTENT="text/html; charset=<?php echo$charset2;?>">
    <?php
}
function tableclass($fornot){
    if($fornot==1){?>class=olivetable <?php }
    if($fornot==2){?>class=skybluetable <?php }
}
function unitstring($ckind){
	if($ckind==1){$unitstring="US$";}
	if($ckind==2){$unitstring="EURO";}
	if($ckind==3){$unitstring="JPY";}
	if($ckind==4){$unitstring="원";}
	return $unitstring;
}
function egularray(){
    $array=array('','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	return $array;
}	

function hgularray(){
    $array=array('','가','나','다','라','마','바','사','아','자','차','카','타','파','하');
	return $array;
}	

function getbrowser(){ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
 
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) { $platform = 'linux'; }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) { $platform = 'mac'; }
    elseif (preg_match('/windows|win32/i', $u_agent)) { $platform = 'windows'; }
     
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { $bname = 'Internet Explorer'; $ub = "MSIE"; } 
    elseif(preg_match('/Firefox/i',$u_agent)) { $bname = 'Mozilla Firefox'; $ub = "Firefox"; } 
    elseif(preg_match('/Chrome/i',$u_agent)) { $bname = 'Google Chrome'; $ub = "Chrome"; } 
    elseif(preg_match('/Safari/i',$u_agent)) { $bname = 'Apple Safari'; $ub = "Safari"; } 
    elseif(preg_match('/Opera/i',$u_agent)) { $bname = 'Opera'; $ub = "Opera"; } 
    elseif(preg_match('/Netscape/i',$u_agent)) { $bname = 'Netscape'; $ub = "Netscape"; } 
     
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
     
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){ $version= $matches['version'][0]; }
        else { $version= $matches['version'][1]; }
    }
    else { $version= $matches['version'][0]; }
     
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    return array('userAgent'=>$u_agent, 'name'=>$bname, 'version'=>$version, 'platform'=>$platform, 'pattern'=>$pattern);

    //
	/* 사용방법 
	$ua = getBrowser();
    if($ua[name] == 'Internet Explorer' && $ua[version] < 8) { echo 'Internet Explorer 8 이하의 버전을 사용하고 계십니다'; }

	getBrowser() 함수를 요청해서 $ua 변수에 넣으면,
	$ua[userAgent] : 유저에이전트 정보.
	$ua[name] : 브라우저 이름.
	$ua[version] : 브라우저 버전.
	$ua[platform] : 구동 플랫폼.
	$ua[pattern] : 패턴.

    */
}
function memberpass(){
	@session_cache_limiter("");
	@session_start();
	if (!isset($_SESSION['mem_session'])){
		if(!isset($_COOKIE['mem_session'])){
			?>
			<script>
				window.alert('권한이 없습니다.!!');
				this.window.location.replace('./member.php');
			</script>
			<?php
		}else{
			$_SESSION['mem_session']=$_COOKIE['mem_session'];
		}
	}
}

function sessionpass(){
    global $memberdata;
	global $staffdata;
	global $auth;
	//adbconfig파일에서 false로 되어 있으면 세선처리 안함
	//adbconfig파일에서 $auth가 true 가 되어 있으면 세션처리를 하도록 되어있음
	if($auth==true){
		session_cache_limiter("");
		session_start();
		if (!isset($_SESSION['my_session'])){
			if(!isset($_COOKIE['my_session'])){
				gofirstpass();
				exit;
			}else{
				$_SESSION['my_session']=$_COOKIE['my_session'];
			}
		}else{
			if(!totalornot($staffdata,"userid='$_SESSION[my_session]' and nowuseornot='1'")){
				if($_SESSION['my_session']=='si'){
					$_SESSION['my_session']=$_COOKIE['my_session'];
				}else{
					gofirstpass();
					session_destroy();
					exit;
				}
			}else{
				$_SESSION['my_session']=$_COOKIE['my_session'];
			}
		}
	}
}
function gofirstpass(){
    metastring();
	?>
    <script>
        window.alert('권한이 없습니다.!!');
        this.window.location.replace('./cpass.php');
    </script>
    <?php
}
function pagetitle($string){
   global $charset2;
?>
<html><head><title><?php echo $string;?></title>
<meta http-equiv='Content-Type' content='text/html; charset=<?php echo$charset2;?>'>
</head>
<?php
}

function customchoiceform($afile,$baction,$cadd){
    ?>
    <script>
        function customchoice(){
            choicew=window.open("","choicewin","scrollbars=yes,resizable=no,width=910,height=530,top=0,left=0");
            choicew.focus();
            choiceform.submit();
        }
    </script>
    <form name=choiceform method=post  style="margin-bottom:0;margin-top:0" action="customchoice.php" style="margin-bottom:0;margin-top:0" target="choicewin">
        <input type=hidden name=afile value="<?php echo$afile;?>">
        <input type=hidden name=baction value="<?php echo$baction;?>">
        <input type=hidden name=cadd value="<?php echo$cadd;?>">
    </form>
    <?php
}


function groupchoiceform($afile,$baction,$cadd){
	if(strlen(trim($cadd))>0){
	   if(substr($cadd,0,1)!="&"){
		  $cadd="&".$cadd;
	   }
	}
	parse_str($cadd);
    ?>
    <script>
        function groupchoice(e){
            if(e==1){
			     groupform.kind.value=4;			   
			}
            else if(e==2){
			     groupform.kind.value=5;			   
    		}
            groupwin=window.open("","choicexwin","scrollbars=yes,resizable=no,width=910,height=530,top=0,left=0");
            groupwin.focus();
            groupform.submit();
        }
    </script>
    <form name=groupform method=post  style="margin-bottom:0;margin-top:0" action="groupchoice.php?a=groupshow<?php if($fornot){?>&fornot=<?php echo$fornot;?><?php }?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?>" style="margin-bottom:0;margin-top:0" target="choicexwin">
        <input type=hidden name="afile" value="<?php echo$afile;?>">
        <input type=hidden name="baction" value="<?php echo$baction;?>">
        <input type=hidden name="cadd" value="<?php echo$cadd;?>">
		<input type=hidden name="kind" value="">
    </form>
    <?php
}

function customchoice($taction,$varstring){
global $dbname,$connection;
global $customdata;
parse_str($varstring);
dbconnection();
if($fornot==1){if($ws==1){$searchkey="fornot='1' and ws='1'";}elseif($ws==2){$searchkey="fornot='1' and ws='1'";}}
elseif($fornot==2){$searchkey="fornot='2'";}

   if(totalornot($customdata,$searchkey)){
      if(strlen(trim($searchkey))>0){$wherestring="where $searchkey";}

         ?>
         <form name=innamechoice method=post action='<?php echo$globals[php_self];?>?a=<?php echo$taction;?>&id=<?php echo $id;?><?php if($addstring){echo$addstring;}?>'>
         <table border=0><tr><td>
         <table width=250 border=0 cellspacing=0 cellpadding=0>
         <tr><td bgcolor=eeeeee height=24><center><b>회사명/성명</b></td></tr>
         <tr><td>
         <select name='sh' size='24' width='350px' style='width:350px;' ondblclick="chak();">
         <?php
         $query = "select id,sangho from $customdata $wherestring order by sangho";
         $result = $connection->query($query);
         if ($result){
            while($row=$result->fetch_row()){
               ?>
               <option value='<?php echo$row[0];?>'><?php echo $row[1];?></option>
               <?php
            }
         }
         ?>
         </select>
         </td></tr></table></td><td valign=top><br><br><br>
         <input type=submit name=choicebutton value='선택확인' style='font-size:9pt;font-family:gothic;color:white; background-color:rgb(250,149,149); border-width:0; border-color:ivory; border-style:solid;'><br><br>
         <input type='reset' value='선택취소' onClick='JavaScript:history.go(-1)' style='font-size:9pt;font-family:gothic;color:white; background-color:rgb(250,149,149); border-width:0; border-color:ivory; border-style:solid;'><br><br>
         <input type='reset' value='나가기' onClick='window.close()' style='font-size:9pt;font-family:gothic;color:white; background-color:rgb(49,49,49); border-width:0; border-color:ivory; border-style:solid;'><br><br>
         </td></tr></table>
         </form>
      <?php
   }


}

function emaillinkstring($varstring){
    global $officedata;
	parse_str($varstring);
	if(isset($email)){
		$email=deletelastcomma($email);
		$emailarray=explode(',',$email);
		$smtpornot=obtainfield($officedata,"smtpornot","officeid='1'");
		if($smtpornot==1){
			$action="smtpornot"; 	  
		}else{
			$action="mailsend"; 
		}	
		  
		foreach ($emailarray as $whatemail){
			if(strlen(trim($whatemail))>0){
				if($smtpornot==1){
					?>
					<img src='./icons/close.gif' border=0><a href='#' onClick="window.open('mail.php?a=smtpsend<?php if($fornot){?>&fornot=1<?php }?><?php if($ws){?>&ws=2<?php }?><?php if($id){?>&id=<?php echo$id;?><?php }?>&whd=2&targetmail=<?php echo$whatemail;?>','fxxmlappsdsdinsert','scrollbars=yes,resizable=no,width=970,height=500,left=0,top=0');"><?php echo $whatemail;?></a><br>
					<?php
				}else{
					?>
					<img src='./icons/close.gif' border=0><a href='#' onClick="window.open('mail.php?a=mailsend<?php if($fornot){?>&fornot=1<?php }?><?php if($ws){?>&ws=2<?php }?><?php if($id){?>&id=<?php echo$id;?><?php }?>&whd=2&targetmail=<?php echo$whatemail;?>','fxxmlappsdsdinsert','scrollbars=yes,resizable=no,width=970,height=500,left=0,top=0');"><?php echo $whatemail;?></a><br>
					<?php
				}
			}
		}
	}

}


function poplink($link,$wvalue,$hvalue){
   ?><a href="<?php echo$link;?>" onclick="popup(this,<?php echo$wvalue;?>,<?php echo$hvalue;?>);return false;" target="_blank">[<font color=red>^</font>]</a><?php
}
function weblink($link,$wvalue,$hvalue){
   ?><a href="<?php echo$link;?>" onclick="popup(this,<?php echo$wvalue;?>,<?php echo$hvalue;?>);return false;" target="_blank">[<font color=red><b>W^</b></font>]</a><?php
}


function numeralonly($string){
   $number=0;	
   $n = preg_match_all("/[0-9]/i", $string, $match);
   for ($j=0 ; $j < $n ; ++$j) {$number.= $match[0][$j];};

   return $number;
}

function showimgsize($file,$width,$height){//////////////이미지 크기 조정, 사이즈 조절 그림 조절 가로 세로
	if(   (file_exists($file))   &&    (is_file($file))   ){
		$imgsizearray=getimagesize($file);
		if($imgsizearray[0]>=$imgsizearray[1]){
			if($imgsizearray[0]>=$width){
			   ?>
			   <img src="<?php echo$file;?>" width="<?php echo$width;?>" border=0>
			   <?php
			}else{
			   ?>
			   <img src="<?php echo$file;?>" border=0>
			   <?php
			}

		}else{
			if($imgsizearray[0]>=$height){
			   ?>
			   <img src="<?php echo$file;?>" height="<?php echo$height;?>" border=0>
			   <?php
			}else{
			   ?>
			   <img src="<?php echo$file;?>" border=0>
			   <?php
			}

		}
	}
}

function datelast($date){

    if($date=='01'){
        $datelast='st';
    }
    elseif($date=='02'){
        $datelast='nd';
    }
    elseif($date=='03'){
        $datelast='rd';
    }else{
        $datelast='th';
    }
    return $datelast;
}

function deletableid($fornot,$ws,$idarray){
	global $connection,$dbname;
	global $customdata;
	global $letterdata;
	global $debitdata;
	global $fdata;
	global $fregdata,$cdata;

    dbconnection();
    foreach ($idarray as $whatid){
        if(strlen(trim($whatid))>0){
            $deleteok=true;
            $lettersu=obtaintotalsu($letterdata,"id='$whatid'");
            $totaldebit=obtaintotalsu($debitdata,"attorneycode='$whatid'");
            $applappsu=obtaintotalsu($fdata,"lappcode='$whatid'");
            $appappsu=obtaintotalsu($fdata,"(  find_in_set($whatid,appcode)>0 )");
            $reglappsu=obtaintotalsu($fregdata,"lappcode='$whatid'");
            $regappsu=obtaintotalsu($fregdata,"(  find_in_set($whatid,appcode)>0 )");
            $simtotalsu=obtaintotalsu($cdata,"lappcode='$whatid'");
            if( ($lettersu>0) ||  ($totaldebit>0) || ($applappsu>0) ||  ($appappsu>0) || ($reglappsu>0) || ($regappsu>0) || ($simtotalsu>0)  ) {
                $deleteok=false;
            }
        }
        if($deleteok==true){
            $deletearray[]=$whatid;
        }
    }
    return $deletearray;
}

function alphago($varstring){
   parse_str($varstring);
   $alphabets=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
   if(!$cellspacing){$cellspacing=1;}
   ?>
   <table border=0 cellspacing=0 cellpadding=<?php echo$cellspacing;?>><tr>
      <td><span class=komigreen>▶<a href=<?php echo$_SERVER['SCRIPT_NAME'];?>?a=customshow&fornot=1&ws=1<?php if ($aor){?>&aor=<?php echo$aor;?><?php }?>&kind=normal&ob=sanghosun&whd=1>↑</a></td>
      <?php
      foreach($alphabets as $whatalpha){
         if($twoline==true){
            if($whatalpha=='m'){
              ?>
              <td><a href=custom.php?a=<?php echo$taction;?>&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&kind=alpha&fal=<?php echo$whatalpha;?>><?php if ($fal==$whatalpha){?><font color=white style="background:red;padding:3px;"><b><?php echo strtoupper($whatalpha);?></b></font><?php }else{?><?php echo strtoupper($whatalpha);?><?php }?></b></a></td>
              </tr><tr>
              <?php
            }else{
              ?>
              <td> <a href=custom.php?a=<?php echo$taction;?>&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&kind=alpha&fal=<?php echo$whatalpha;?>><?php if ($fal==$whatalpha){?><font color=white style="background:red;padding:3px;"><b><?php echo strtoupper($whatalpha);?></b></font><?php }else{?><?php echo strtoupper($whatalpha);?><?php }?></b></a></td>
              <?php
            }
         }else{
              ?>
              <td> <a href=custom.php?a=<?php echo$taction;?>&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&kind=alpha&fal=<?php echo$whatalpha;?>><?php if ($fal==$whatalpha){?><font color=white style="background:red;padding:3px;"><b><?php echo strtoupper($whatalpha);?></b></font><?php }else{?><?php echo strtoupper($whatalpha);?><?php }?></b></a></td>
              <?php
         }
      }
      ?>
      <td>
      <span class=komigreen>▶<a href=custom.php?a=customshow&fornot=1&ws=1&kind=normal<?php if ($aor){?>&aor=<?php echo$aor;?><?php }?>&ob=sanghoban&whd=1>↓</a>
      </td>
      </tr></table>
   <?php
}
function borderline($color='red'){
   if(!$color){$color='red';}
   ?>
               <br>
               <table width=100% cellspacing=0 cellpadding=0 bgcolor=<?php echo$color;?>><tr><td height=10><span class=kowhite><b>경계선</b></td></tr></table>
               <br>
   <?php
}

function uplink(){
?>[<font color=red>√</font>]<?php
}
function docuprotable($filings){
?>
                 <table width=100% border=1 bordercolor=eeeeee cellspacing=1 cellpadding=2 <?php echo collapse;?>>

                 <tr  bgcolor=<?php echo seecolor($fornot,$kind='small');?>>
                 <td width=80>과정구분</td><td width=80>날짜</td> <td>서류명등코멘트</td></tr>
                 <?php
                 $filings=str_replace("\r\n\r\n","\r\n",$filings);
                 $filings=str_replace("'","`",$filings);
                 $openarray=explode("\r\n",$filings);
                 $endsu=count($openarray)-1;
                 if(  strlen(trim($filings))>0){
                    for ($j=0;$j<$endsu;$j++){
                       if ( strlen(trim($openarray[$j]))>0){
                          if (eregi('(날짜)',$openarray[$j]) ){
                             $filename='';
                             $fileornotstring=obtainstring($openarray[$j],'(과정구분)','(날짜)');
                             $date=obtainstring($openarray[$j],'(날짜)','(종류등)');
                             $filename=obtainlaststring($openarray[$j],'(종류등)');
                             ?>
                             <tr>
                             <td><?php echo $fileornotstring;?></td>
                             <td> <?php echo datestring($date,2);?></td>
                             <td><?php echo $docuname;?></td>
                             </tr>
                             <?php
                          }
                       }
                    }
                 }else{
                    ?>
                    <tr><td colspan=4><img src='./icons/ohmygod.gif' border=0>제출또는 수령한 서류상세가 없음</td></tr>
                    <?php
                 }
                 ?>
                 </table>
<?php
}



function vi($varname){
  if($_GET[$varname]){?>&<?php echo$varname;?>=<?php echo$_GET[varname];?><?php }
}
function addnbsp($howmuch){
    $string='';
    for($i=0;$i<$howmuch;$i++){        
        $string.="&nbsp;";        
    }
	return $string;
}
function unsetarray($varstring){
   $vararray=explode('&',$varstring);
   foreach($vararray as $what){
      unset($$what);
   }
}
function countrykrbycode($countrycode){
global $connection;
global $dbname;
       dbconnection();
       $query="select krname from countrycode where twocode='$countrycode'";
       $result=$connection->query($query);
       if ($result){
                $row=$result->fetch_row();
       }
       return $row[0];
}

function sanghotwoline($sangho,$length){
// 빈칸이 있을경우에 이를 짜르는 로직...빈칸이 없으면 안됨..
    $sangho=trim($sangho);
    $tok=strtok($sangho,' ');
	$word="";$word2="";
    while($tok){
        if (strlen($word.' '.$tok)>$length){
		    if(!$word){
                $word=$tok;
			}else{			
				if (strlen($word2.' '.$tok)>$length){
					$word2=$word2.'..';
				}else{
					$word2=$word2.' '.$tok;
				}			
			}
        }else{
            $word=$word.' '.$tok;
        }
        $tok=strtok(' ');
    }
    $array[]=$word;
    $array[]=$word2;
    return $array;
}

function labelsanghonot($userid,$id,$kind,$labelkind,$eposition,$fposition){
	global $connection;
	$sangho="";
    $query="select * from labelimsi where userid='$userid' and id='$id' and kind='$kind' and labelkind='$labelkind' and eposition='$eposition' and fposition='$fposition'";
	$result=$connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_assoc();
			if($row){
				$sangho=$row['sangho'];
			}
		}
	}
	if(strlen(trim($sangho))>0){
		return true;
	}else{
	    return false;	
	}
}

function labelunit($userid,$id,$kind,$labelkind,$eposition,$fposition){
	global $connection;
		
    $query="select * from labelimsi where userid='$userid' and id='$id' and labelkind='$labelkind' and eposition='$eposition' and fposition='$fposition'";
    
	//echo $query;
	
	$result=$connection->query($query);
    if ($result->num_rows>0){
        $row=$result->fetch_assoc();
		if($row){
		    $sangho=$row['sangho'];
            $attention=$row['attention'];
			$fornot=$row['fornot'];
            $street=$row['woo1'];
            $city=$row['woo2'];
			$country=$row['country'];
			$zipcode=$row['zipcode'];
		}
    }
	
	$cutlocation=39;
    $array=sanghotwoline($sangho,$cutlocation);
    $word=$array[0];
    $word2=$array[1];
    ?>
    <b>
    <?php
    if (trim($word2)==''){
        echo '&nbsp;&nbsp;'.$word.'<br>'.'&nbsp;&nbsp;';
    }else{
        echo '&nbsp;&nbsp;'.$word.'<br>'.'&nbsp;&nbsp;'.$word2;
    }
    ?>
    </b>
    <br>
    <?php
    if ($fornot==1){if (trim($attention)!=''){echo '&nbsp;&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
    elseif ($fornot==2){if (trim($attention)!=''){echo '&nbsp;&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
    ?>
    <br><br>
    <?php 
	if (trim($street)!=''){echo '&nbsp;&nbsp;&nbsp;'.$street;}else{echo '<font color=white>&nbsp;</font>';}?>
    <br>
	<?php if (trim($city)!=''){echo '&nbsp;&nbsp;&nbsp;'.$city;}else{echo '<font color=white>&nbsp;</font>';}?>
    <?php
    if ($fornot==1){
       ?>
        <br><?php if (trim($country)!=''){echo '&nbsp;&nbsp;&nbsp;'.$country;}else{echo '<font color=white>&nbsp;</font>';}?>
        <?php
    }
    elseif ($fornot==2){
        ?>
        <br><font style="font-size:16pt;"><b><?php if( (strlen(trim($zipcode))>0) ){echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$zipcode;}?></b></font>
        <?php
    }
}

function labelunit2($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zipcode){
    $array=sanghotwoline($sangho,$cutlocation);
    $word=$array[0];
    $word2=$array[1];

    ?>
    <p style='font-size:<?php echo$fontsize;?>;font-family:gothic;font-color:black; line-height:<?php echo$lineheight;?>%;'>
        <b>
		<?php
        if (trim($word2)==''){
            echo '&nbsp;&nbsp;'.$word.'<br>'.'&nbsp;&nbsp;';
        }else{
            echo '&nbsp;&nbsp;'.$word.'<br>'.'&nbsp;&nbsp;'.$word2;
        }	
        ?>
        </b>
        <br>
        <?php
        if ($fornot==1){if (trim($attention)!=''){echo '&nbsp;&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
        elseif ($fornot==2){if (trim($attention)!=''){echo '&nbsp;&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
        ?>
        <br><br>
        <?php if (trim($street)!=''){echo '&nbsp;&nbsp;&nbsp;'.$street;}else{echo '<font color=white>&nbsp;</font>';}?>
        <br><?php if (trim($city)!=''){echo '&nbsp;&nbsp;&nbsp;'.$city;}else{echo '<font color=white>&nbsp;</font>';}?>
        <?php
        if ($fornot==1){
            ?>
            <br><?php if (trim($country)!=''){echo '&nbsp;&nbsp;&nbsp;'.$country;}else{echo '<font color=white>&nbsp;</font>';}?>
            <?php
        }
        elseif ($fornot==2){
            ?>
            <br><font style="font-size:16pt;"><b><?php if( strlen(trim($zipcode))>0 ){echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$zipcode;}?></font></b>
            <?php
        }
        ?>
    </p>
    <?php
}


function labelunit3($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zipcode){
    $array=sanghotwoline($sangho,$cutlocation);
    $word=$array[0];
    $word2=$array[1];
    ?>
	<p style="line-height:<?php echo$lineheight;?>%;" align="justify">
    <b>
    <?php
    if (trim($word2)==''){
        echo '&nbsp;'.$word;
    }else{
        echo '&nbsp;'.$word.'<br>'.'&nbsp;&nbsp;'.$word2;
    }
    ?>
    </b>
    <br>
    <?php
    if ($fornot==1){if (trim($attention)!=''){echo '&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
    elseif ($fornot==2){if (trim($attention)!=''){echo '&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
    ?>
    <br><br><?php if (trim($street)!=''){echo '&nbsp;&nbsp;'.$street;}else{echo '<font color=white>&nbsp;</font>';}?>
    <br><?php if (trim($city)!=''){echo '&nbsp;&nbsp;'.$city;}else{echo '<font color=white>&nbsp;</font>';}?>
    <?php
    if ($fornot==1){
       ?>
       <br><?php if (trim($country)!=''){echo '&nbsp;&nbsp;'.$country;}else{echo '<font color=white>&nbsp;</font>';}?>
       <?php
    }
    elseif ($fornot==2){
       ?>
       <br><font style="font-size:16pt;"><b><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$zipcode;?></b></span>
       <?php
    }
    ?>
    </p>
    <?php
}

function telnotype1($telno){
    $telnoarray=array();
    $telnoarray=explode(',',$telno);
    $telnosu=count($telnoarray);
    for($x=0;$x<$telnosu;$x=$x+1){
       if($telnoarray[$x]){
          ?>☏  <?php echo$telnoarray[$x];?><?php
          if ($telnoarray[$x+1]){
            ?><br><?php
          }
       }
    }
}
function nodata($tablename,$dbhanname){
   global $connection,$nodatasignal;
   $query = "select count(*) from $tablename";
   $result = $connection->query($query);
   if ($result){
      $total=$result->fetch_row();
      if ($total[0]<1){
         ?>
         <br><br><br><br><center><img src='./icons/hujitong.gif' border=0><b><?php echo$dbhanname;?> 데이타베이스 에 등록된 데이타가 없습니다.
         <?php
         $nodatasignal='ok';
      }
   }

}
function nodatastring($string=""){
	global $pnggod;
    if(strlen(trim($string))>0){
         ?><img src="./icons/ohmygod.png" width="20" border="0"><b> <?php echo $string;?></center><?php
	}else{
         ?><img src="./icons/ohmygod.png" width="20" border="0"><b> 해당 데이타가 없거나 가져올 수 없습니다.</center><?php	
	}
}

function nodatavalue($value,$howmuch){
   if(strlen(trim($value))>0){
      return $value;
   }else{
      return nbsp($howmuch);
   }
}
function nodatabelow(){
   ?><br><img src='./icons/ohmygod.gif' border=0><b>해당하는 데이타가 없습니다.<?php
}
function nodatatable($string,$tablewidth=860){
   if(!$string){$string='데이타';}
   ?>
   <center>
   <table width=800 border=0>
      <tr>
         <td align=center>
         <table width=60% border=0 cellspacing=0 cellpadding=0>
            <tr><td align=right>
                    <center><img src='./icons/mag.gif' border=0><span class=kored><b> 검색된목록 </center><center><span class=kored>
            </td></tr>
         </table>
         </td>
      </tr>
      <tr><td valign=top>
         <table width=800 border=0>
            <tr><td><img src='./icons/ohmygod.gif' border=0><b>검색된 <?php echo$string;?> 없습니다</b>
            </td></tr>
         </table>
      </td></tr>
   </table>
   </center>
   <?php
}

function nodatago($tablename,$filename,$actionname,$addstring){
    global $dbname,$connection;
    dbconnection();
    $totalsu=obtaintotalsu($tablename,"");
    if($totalsu<1){
        ?>
        <br><br><center>데이타베이스에 <?php echo $tablename;?>의 정보가 없습니다. 처음으로 정보를 넣으시겠습니까?=> 그러시려면 <a href='<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>'><font color=red>여기</font></a>를 눌러주세여!!!</center><br><br>
        <?php
    }
}

function nodataresult(){
	$pnggod="iVBORw0KGgoAAAANSUhEUgAAABwAAAAZCAYAAAAiwE4nAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAFLUlEQVR42mL4z8DAQCIWAOJzQDyDDL0MAAHEQIameiD+D8T/gNiOVP0AAUSqZSpA/P4/E9N/qKWHgJiZFDMAAohUC+eDLPpaUf7/p5cnzNJEUswACCBSLLMA4l9/FBT+v3776v+Hg/v//2dlBVn4AIiFiTUHIICItYwRiHeCfPR56uT/7/7////+/5//P+JjYb5sJdZCgAAi1kJ/kMG/LC3+f/r25f+DZ0/+33/z8v+Xm9f//xMRAVn4EYjViTELIICIsYwDiM+DEsqPndv/z1+75r+Zudl/SyvL/6v37v7/p7cH5stlxFgIEEDEWJgJMvBvSPD/a48e/DcBWqaiqvJfSVn5v7Onx//nTx79/29sBLLwDxA7EDIPIICYGPADCSCu/s/NzfC7upLh2fPnDD++fmNgZ2Nn4GBnZ3j74iXDG6CCPzXVILXMQNwCxKz4DAQIIEIWFgOx9M+4WIZfBsYMYjw8DGxsbHBJLk5OBj5mZoZfPn4Mf1xcQELWQJyAz0CAAMJnoSYQp/8XE2P4UZDH8O/PLwZ5eXkGDQ0Nhl+/foGxpqYmg6igIMM/FmaGH7VAX0IcUwvEorgMBQggfBaCNPJ+z81h+KemzsD48ycDHzcvg4ODA8Pfv38Z/v37x2BuYc7Ayc7JwPDjO8M/WzuGXzExIH2yQFyCy1CAAMIVuTagRPBHU+P/u1fP/3/4/vX/p69f/v/59/f/latX/uvp6/3X1dX9f+Hihf9///37/xmYVT7+/vX/MyKbfAZiDWxmAwQQEw5fN4ESwffyMob/omIMjH//MTAzMYJ9paSkxCArK8sgLiEOZv/+8xusifHXT2BIAIO7FOw5HiBuxOZBgADCZmEwEDv+trVh+BUSwsD07RsDI0gViAC6nZODk0FZSZlBWlqagZOLEyj0H64RZOnvtDSGf7q6IG4IEDujGw4QQOgW8oJdBkx53ysrGP5zcgArob9AixjBAfIPariEpASDmJg4AwsTC9DCfwgL//wB1paCDL8g2YQJWzYBCCD0MC4FZfKfwUH/3/z68f/d5w//33/++P/Tl8//vwDj8duPH/9B4P6D+//v3rsLZoPEQXH4+SsEf/nx/f+XXz///3Fzg5VAach2AAQQsmXSQPziHzf3/w+nTvx/+xto4SeQhR/+f/zyCVyG/vrz+//+/fv/R0VG/k9MTPx/+uyZ/z///IJb9vnb1/9fQBjokO9Hj/z/z84OsvAxEIvB7AEIIGQLJ4Jc9D0v9/+bf3/AvoNZ+AFo4dcf3/4/ff7sv729/X8FYBUlJyf3PyQ05P/Hz0C5798gFgHxVxAG+vIr0NLf6WkwX/bA7AEIIFgcgmI59R8wIfwoLABHPqg+YmRkZABBkBYQ+9PnTwzv3r1j4ODgAONXr14z/ATmTyYmRkgcggmgDpB6YIr+U17OACo4gCADiLVBDIAAgllYB8ScP4BJ+p+CEjgbMABLD1DiAWMWFmDJ/J9BBljS+AQEgNkg8aDQEAY+ISGGv6AUDFUH0QOkgRb+V1Ri+FMNTkDcsGwCEEAgj4CS7q6/+npMn7dvY/gPTOpMf/4CEyYjxMUMEJ+CwoMF6Ijfv/8wnDxxAliKsTOYmZmC5f4DDQf7jBHmT5BekAZWBsbv3xnYXF0ZGM+fB4WoJ0AAgSw8DWSY/BcTZfgnIcnA8PcPjjIJYj0zE9A3wJoCFMz/gcEJz4eMMBWMqFkAFFIvXjAwvnwJEjkHEEBAvzN8BeKPjMD4YAZiUgAjqvHEgK8AAQYArjdKW4mOCpAAAAAASUVORK5CYII=";
    pic($pnggod,20);?> 해당데이타가 없거나 가져올 수 없습니다.!!<?php
}
function minicalc(){

?>
<script>
function compute(obj)
   {obj.expr.value = eval(obj.expr.value)}

var one = '1'
var two = '2'
var three = '3'
var four = '4'
var five = '5'
var six = '6'
var seven = '7'
var eight = '8'
var nine = '9'
var zero = '0'
var plus = '+'
var minus = '-'
var multiply = '*'
var divide = '/'
var decimal = '.'

function enter(obj, string)
   {obj.expr.value += string}

function clear(obj)
   {obj.expr.value = ''}

</script>
<?php $fontsize='8pt';?>
<center>
<form name='simplecalc'  style='margin-bottom:0;margin-top:0'>
<table border=1 cellspacing=0 cellpadding=2 style='border-collapse:collapse;'>
<tr>
<td colspan=4><input type='text' name='expr' size=18 action='compute(this.form)'></td></tr>
<tr>
<td><input type='button' value=' 7 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, seven)' onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'tabledown');?>'"  onmouseout="this.style.backgroundColor='eeeeee'">
<td><input type='button' value=' 8 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, eight)'>
<td><input type='button' value=' 9 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, nine)'>
<td><input type='button' value=' / ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, divide)'>
<tr>

<td><input type='button' value=' 4 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, four)'>
<td><input type='button' value=' 5 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, five)'>
<td><input type='button' value=' 6 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, six)'>
<td><input type='button' value=' * ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, multiply)'>
<tr>

<td><input type='button' value=' 1 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, one)'>
<td><input type='button' value=' 2 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, two)'>
<td><input type='button' value=' 3 ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, three)'>
<td><input type='button' value=' - ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, minus)'>
<tr>

<td colspan=2><input type='button' value='    0   ' style='font-size:11;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:60;padding-top:2px;cursor:hand;' onClick='enter(this.form, zero)'>
<td><input type='button' value=' .  ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, decimal)'>
<td><input type='button' value=' + ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;' onClick='enter(this.form, plus)'>
<tr>

<td colspan=2><input type='button' value='    =   ' style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:60;padding-top:2px;cursor:hand;' onClick='compute(this.form)'>
<td colspan=2><input type='reset' value='AC' size= 3 style='font-size:<?php echo$fontsize;?>;font-family:gothic;background-color:eeeeee; border-width:0; border-color:ivory; border-style:solid;padding:0; width:60;padding-top:2px;cursor:hand;' onClick='clear(this.form)'>
</table>
</form>
</center>



</td>
</tr></table>
<script>
function reducecomma(account){
    var x,ch;
    var i=0;
    var newVal="";
    for(x=0;x<account.length;x++){
        ch=account.substring(x,x+1);
        if (ch!=",") newVal +=ch;
    }
    return newVal;
}
function addcomma(str){

 var len = str.length;
 var s1 = "",s2 = "";

 if(len <= 3)
  return str;
 else{

  for(i = len-1 ; i >= 0; i--)
   s1 += str.charAt(i);

  for(i = len-1 ; i >= 0; i--){
   s2 += s1.charAt(i);
   if(i % 3 == 0 && i != 0) s2 += ",";
  }



  return s2;
 }
}

function feecalc(){

                                var newstr=document.debitinform.amountfee.value;
                                var thisindex=newstr.indexOf("\n");
                                var thisarray = new Array("113");
                                var i=0;
                                var x=0;
                                var goodstring=0;
                                var totalstring=0;
                                while (thisindex != -1) {
                                            thisarray[i]=thisindex;
                                            thisindex = newstr.indexOf("\n", thisindex + 1);
                                            i=i+1;
                                }
                                for (x=0;x<=thisarray.length;x++){

                                            goodstring=eval(reducecomma(newstr.substring(thisarray[x-1],thisarray[x])));
                                            if (!(isNaN(goodstring))){
                                                    totalstring=totalstring+"+"+goodstring;

                                            }
                                            document.debitinform.finalfee.value=eval(totalstring);
                                }

  var numb=document.debitinform.finalfee.value;
  var str=int=deci='';
  var hi='';
  decicheck=false;
  len=numb.length;
  for (i=0;i< len;i++){
    char=numb.substring(i,i+1);                // 한 글자 추출
    if (char=='.'){ decicheck=true;}        // 소수점이 발견되면 소수점이 있슴 표시
    if (decicheck) deci+=char;                // 소수점이 발견되었으면 소수에 글자 추가
    else int+=char;                        // 소수점이 발견 안되었으면 정수에 글자 추가
  }
  while (int>=1000){                        // 정수가 1000 작을때까지 반복
    hi=Math.floor(int/1000);                // 마지막 3자리의 소수점 없는 글자를 높은 수치 변수에
    lostr='000'+int%1000;                // 정수를 1000으로 나누고 나머지에 앞에 '0' 글자 추가
    len=lostr.length;
    lostr=lostr.substring(len-3,len);        // 3자리 수치만 채택
    if (!str) str=lostr;                        // 맨 먼저 스트링은 제일 낮은 3자리수
    else str=lostr+','+str;                // 그 다음부터는 낮은수 3자리수 앞에 콤마(,) 넣고 붙임
    int=Math.floor(int/1000);                // 처리한 디짓트 제거
  }
  str=hi+','+str;                                // 마지막에는 제일 높은 자리수를 맨 앞에 붙임
  if (decicheck) str+=deci;                        // 소수점이 있으면 소수점을 맨뒤에 붙임
  document.debitinform.finalfee.value=str;

}


</script>
<?php
}

function datesidein($formname,$datename,$nextfield){
$datename_1=$datename.'_1';
$datename_2=$datename.'_2';
$datename_3=$datename.'_3';
?>
<input type='button' value='<-' onclick="onedayafter('<?php echo$datename;?>','b');" style="font-size:7pt;font-family:gothic;color:black; background-color:ffffff; border-width:0; border-color:ivory; border-style:solid;width:14;padding:0;" onmouseover="this.style.backgroundColor='#DFD2A6'" onmouseout="this.style.backgroundColor='ffffff'">
<?php
if($nextfield){
?><input type='button' value='오늘' onClick="<?php inserttodayfocus($formname,$datename_1,$datename_2,$datename_3,$nextfield);?>" style="font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:24;padding:0;"><?php
}else{
?><input type='button' value='오늘' onClick="<?php inserttoday($formname,$datename_1,$datename_2,$datename_3);?>" style="font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:24;padding:0;"><?php
}
?><input type='button' value='->' onclick="onedayafter('<?php echo$datename;?>','a');" style="font-size:7pt;font-family:gothic;color:black; background-color:ffffff; border-width:0; border-color:ivory; border-style:solid;width:16;cursor:hand;padding:0;" onmouseover="this.style.backgroundColor='#DFD2A6'" onmouseout="this.style.backgroundColor='ffffff'">
<input type='button' value='x' onClick="<?php deletetoday($formname,$datename_1,$datename_2,$datename_3);?>"  style="font-size:8pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:9;padding:0;cursor:hand;">
<input type='button' value='▼' style="font-size:6pt;font-family:gothic;cursor:hand;text-align:center;padding:0;" onClick="datePicker(event,'<?php echo$datename;?>');">
<?php
}
function datesideonly($formname,$datename,$nextfield){
$datename_1=$datename.'_1';
$datename_2=$datename.'_2';
$datename_3=$datename.'_3';
?>
<input type='button' value='<' onclick="onedayafter('<?php echo$datename;?>','b');"  style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:10;padding:0;' onmouseover="this.style.backgroundColor='#DFD2A6'" onmouseout="this.style.backgroundColor='FFFFFF'">
<?php
if($nextfield){
?><input type='button' value='오늘' onClick="<?php inserttodayfocus($formname,$datename_1,$datename_2,$datename_3,$nextfield);?>" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:22;padding:0;'> <?php
}else{
?><input type='button' value='오늘' onClick="<?php inserttoday($formname,$datename_1,$datename_2,$datename_3);?>" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:22;padding:0;'> <?php
}
?>
<input type='button' value='>' onclick="onedayafter('<?php echo$datename;?>','a');" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:10;cursor:hand;padding:0;' onmouseover="this.style.backgroundColor='#DFD2A6'" onmouseout="this.style.backgroundColor='FFFFFF'">
<input type='button' value='x' onClick="<?php deletetoday($formname,$datename_1,$datename_2,$datename_3);?>"  style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:10;padding:0;cursor:hand;'>
<?php
}

/*
function inserttoday($nowform,$fblank,$sblank,$tblank){
   $todaymonth=date('m');$todayyear=date('Y');$todayday=date('d');$todaymonth=sprintf('%02d',$todaymonth);
   ?>
   document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
   <?php
}
function inserttodayfocus($nowform,$fblank,$sblank,$tblank,$nextblank){
    global $todaymonth,$todayyear,$todayday;
    $todaymonth=date('m');$todayyear=date('Y');$todayday=date('d');$todaymonth=sprintf('%02d',$todaymonth);
    ?>
    document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
    document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
    <?php
}
*/



function dateins($varname,$value,$formname,$next){
   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);
   ?>
   <table border=0><tr><td><input type='text' name='<?php echo$va_1;?>'  <?php if ($var_1){?> value='<?php echo$var_1;?>'<?php }?> size='4' maxlength='4' <?php movefocus($formname,$va_1,$va_2,'4');?>></td><td>-</td><td><input type='text' name='<?php echo$va_2;?>' <?php if($var_2){?> value='<?php echo$var_2;?>'<?php }?> size='2' maxlength='2' <?php movefocus($formname,$va_2,$va_3,'2');?>></td><td>-</td><td><input type='text' name='<?php echo$va_3;?>' <?php if ($var_3){?> value='<?php echo$var_3;?>'<?php }?> size='2' maxlength='2' <?php movefocus($formname,$va_3,$next,'2');?>></td></tr></table>
   <?php
}

function dateauto($varname,$value,$formname,$next){

   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);

   ?>
   <input type='text' name=<?php echo$va_1;?>  value='<?php echo$var_1;?>' size=4 maxlength=4 <?php movefocus($formname,$va_1,$va_2,'4');?>>-<input type='text' name='<?php echo$va_2;?>' value='<?php echo$var_2;?>' size=2 maxlength=2 <?php movefocus($formname,$va_2,$va_3,'2');?>>-<input type='text' name='<?php echo$va_3;?>' value='<?php echo$var_3;?>' size=2 maxlength=2 <?php movefocus($formname,$va_3,$next,'2');?>>
   <?php

}

function stringtable($string,$tablewidth,$bgcolor){
   ?>
   <br>
   <center>
   <table width=<?php echo$tablewidth;?> bgcolor=<?php echo $bgcolor;?>>
   <tr><td><center>
   <b><?php echo $string;?> </b>
   </td></tr></table><br>
   </center>
   <?php
}


function sol2lun($yyyymmdd) {
         $getYEAR = (int)substr($yyyymmdd,0,4);
         $getMONTH = (int)substr($yyyymmdd,4,2);
         $getDAY = (int)substr($yyyymmdd,6,2);
		 $gf_yun=0;

         $arrayDATASTR = sunlunar_data();
         $arrayDATA = explode('-',$arrayDATASTR);

         $arrayLDAYSTR='31-0-31-30-31-30-31-31-30-31-30-31';
         $arrayLDAY = explode('-',$arrayLDAYSTR);

         $arrayYUKSTR='갑-을-병-정-무-기-경-신-임-계';
         $arrayYUK = explode('-',$arrayYUKSTR);

         $arrayGAPSTR='자-축-인-묘-진-사-오-미-신-유-술-해';
         $arrayGAP = explode('-',$arrayGAPSTR);

         $arrayDDISTR='쥐-소-호랑이-토끼-용-뱀-말-양-원숭이-닭-개-돼지';
         $arrayDDI = explode('-',$arrayDDISTR);

         $arrayWEEKSTR='일-월-화-수-목-금-토';
         $arrayWEEK = explode("-",$arrayWEEKSTR);

         $dt = $arrayDATA;

         for ($i=0;$i<=168;$i++) {
         $dt[$i] = 0;
         for ($j=0;$j<12;$j++) {
         switch (substr($arrayDATA[$i],$j,1)) {
         case 1:
         $dt[$i] += 29;
         break;
         case 3:
         $dt[$i] += 29;
         break;
         case 2:
         $dt[$i] += 30;
         break;
         case 4:
         $dt[$i] += 30;
         break;
         }
         }
         switch (substr($arrayDATA[$i],12,1)) {
         case 0:
         break;
         case 1:
         $dt[$i] += 29;
         break;
         case 3:
         $dt[$i] += 29;
         break;
         case 2:
         $dt[$i] += 30;
         break;
         case 4:
         $dt[$i] += 30;
         break;
         }
         }
         $td1 = 1880 * 365 + (int)(1880/4) - (int)(1880/100) + (int)(1880/400) + 30;
         $k11 = $getYEAR - 1;

         $td2 = $k11 * 365 + (int)($k11/4) - (int)($k11/100) + (int)($k11/400);

         if ($getYEAR % 400 == 0 || $getYEAR % 100 != 0 && $getYEAR % 4 == 0) {
         $arrayLDAY[1] = 29;
         } else {
         $arrayLDAY[1] = 28;
         }

         if ($getMONTH > 13) {
         $gf_sol2lun = 0;
         }

         if ($getDAY > $arrayLDAY[$getMONTH-1]) {
         $gf_sol2lun = 0;
         }

         for ($i=0;$i<=$getMONTH-2;$i++) {
         $td2 += $arrayLDAY[$i];
         }

         $td2 += $getDAY;
         $td = $td2 - $td1 + 1;
         $td0 = $dt[0];

         for ($i=0;$i<=168;$i++) {
         if ($td <= $td0) {
         break;
         }
         $td0 += $dt[$i+1];
         }

         $ryear = $i + 1881;
         $td0 -= $dt[$i];
         $td -= $td0;

         if (substr($arrayDATA[$i], 12, 1) == 0) {
         $jcount = 11;
         } else {
         $jcount = 12;
         }
         $m2 = 0;

         for ($j=0;$j<=$jcount;$j++) { // 달수 check, 윤달 > 2 (by harcoon)
         if (substr($arrayDATA[$i],$j,1) <= 2) {
         $m2++;
         $m1 = substr($arrayDATA[$i],$j,1) + 28;
         $gf_yun = 0;
         } else {
         $m1 = substr($arrayDATA[$i],$j,1) + 26;
         $gf_yun = 1;
         }
         if ($td <= $m1) {
         break;
         }
         $td = $td - $m1;
         }
         $k1=($ryear+6) % 10;
         $syuk = $arrayYUK[$k1];
         $k2=($ryear+8) % 12;
         $sgap = $arrayGAP[$k2];
         $sddi = $arrayDDI[$k2];
         $gf_sol2lun = 1;
         return ($ryear.'|'.$m2.'|'.$td.'|'.$syuk.$sgap.'|'.$sddi);
}

function uploadfile($uploadfile,$uploadfilename,$uploadpath){
global $uploadfile_size;
   $mime=explode('.',$uploadfilename);
   $mime[1]=strtolower($mime[1]);
   $newname=$mime[0].'.'.$mime[1];
   if($mime[1]=='htm' || $mime[1]=='html' || $mime[1]=='php' || $mime[1]=='php' || $mime[1]=='jsp' || $mime[1]=='asp' || $mime[1]=='cgi' || $mime[1]=='pl' || $mime[1]=='inc'){
      ?>
      <script> alert('업로드 불가능한 파일.'); history.go(-1); </script>
      <?php
      exit;
   }
   if($uploadfile_size>10072864){
      ?>
      <script> alert('파일크기는 3.0 MB 까지.'); history.go(-1); </script>
      <?php
      exit;
   }
   if(file_exists("$uploadpath$newname")){
      ?>
      <script> alert('같은 파일이 존재합니다.'); history.go(-1); </script>
      <?php
      exit;
   }
   $resolt=copy($uploadfile,"$uploadpath".$newname);
   if(!$resolt){
      ?>
      <script> alert('파일이 있는지 확인요망.'); history.go(-1); </script>
      <?php
      exit;
   }
}
function newfilename($filename,$filefront){ // $filefront  파일의 앞쪽이름
   $extension = strrchr($filename, '.');//마지막 점을 포함한 확장자
   $extensionleng=strlen($extension);/// 마지막점을 포함한 확장자길이
   $fileex=strtolower(substr($extension,1));//점을 제외한 순수확장자를 소문자화함
   $newfilename=$filefront.'.'.$fileex;
   return $newfilename;
}
function fileextention($filename){
   $extension = strrchr($filename, '.');//마지막 점을 포함한 확장자
   $extensionleng=strlen($extension);/// 마지막점을 포함한 확장자길이
   $front=substr($filename,0,-$extensionleng);//마지막점 앞쪽
   $fileex=strtolower(substr($extension,1));//점을 제외한 순수확장자를 소문자화함
   return $fileex;
}

function datethisstring($date){
  if(strlen(trim($date))>0){
       $date_1=substr($date,0,4);
       $date_2=monthtostr(substr($date,4,2));
       $date_3=substr($date,6,2);
       if($date_3==1){$date_3="1 st";}
       elseif($date_3==2){$date_3="2 nd";}
       elseif($date_3==3){$date_3="3 rd";}
       else{$date_3=$date_3." th";}
       $datestring="Dated this $date_3 day of $date_2 , $date_1";
  }else{
       $datestring="Dated this   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; day of  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ,";
  }
  return $datestring;
}


function monthtostr($inputmonth,$kind=1){
global $resultmon;
   if (strlen(trim($inputmonth))==1){
      $inputmonth='0'.$inputmonth;
   }
   if($kind==1){
	   if ($inputmonth=='01'){$resultmon='January';}
	   elseif ($inputmonth=='02'){$resultmon='February';}
	   elseif ($inputmonth=='03'){$resultmon='March';}
	   elseif ($inputmonth=='04'){$resultmon='April';}
	   elseif ($inputmonth=='05'){$resultmon='May';}
	   elseif ($inputmonth=='06'){$resultmon='June';}
	   elseif ($inputmonth=='07'){$resultmon='July';}
	   elseif ($inputmonth=='08'){$resultmon='August';}
	   elseif ($inputmonth=='09'){$resultmon='September';}
	   elseif ($inputmonth=='10'){$resultmon='October';}
	   elseif ($inputmonth=='11'){$resultmon='November';}
	   elseif ($inputmonth=='12'){$resultmon='December';}
   }
   elseif($kind==2){
	   if ($inputmonth=='01'){$resultmon='Jan';}
	   elseif ($inputmonth=='02'){$resultmon='Feb';}
	   elseif ($inputmonth=='03'){$resultmon='Mar';}
	   elseif ($inputmonth=='04'){$resultmon='Apr';}
	   elseif ($inputmonth=='05'){$resultmon='May';}
	   elseif ($inputmonth=='06'){$resultmon='Jun';}
	   elseif ($inputmonth=='07'){$resultmon='Jul';}
	   elseif ($inputmonth=='08'){$resultmon='Aug';}
	   elseif ($inputmonth=='09'){$resultmon='Sep';}
	   elseif ($inputmonth=='10'){$resultmon='Oct';}
	   elseif ($inputmonth=='11'){$resultmon='Nov';}
	   elseif ($inputmonth=='12'){$resultmon='Dec';}
   }
   return $resultmon;
}
function keyhead(){
?>
<script Language='javascript'>
function Check(){
  if (document.all){
<?php
}
function keybottom(){
?>
}
}
document.onkeydown = Check;
</script>
<?php
}
function currencycolor($currencykind){
   if($currencykind==1){return 'pink';}
   elseif($currencykind==2){return 'yellow';}
   elseif($currencykind==3){return 'bluesky';}
   elseif($currencykind==4){return 'white';}
}
function currencystring($currencykind,$style=2){
	if($style==1){
	    if($currencykind==1){return '&#036';}
	    elseif($currencykind==2){return '&#8364;';}
	    elseif($currencykind==3){return '&#165;';}
	    elseif($currencykind==4){return '&#8361;';}
	}
	elseif($style=2){
	    if($currencykind==1){return 'US$';}
	    elseif($currencykind==2){return 'EURO';}
	    elseif($currencykind==3){return 'JPY';}
	    elseif($currencykind==4){return '원';}
    }
}
function currencydon($money,$cykind){
   if($cykind==1){return  commamake($money,1);}
   elseif($cykind==2){return commamake($money,1);}
   elseif($cykind==3){return commamake($money,2);}
   elseif($cykind==4){return commamake($money,3);}
}
function debitstatusstring($nowstatus){
   if($nowstatus==1){return '미납';}
   elseif($nowstatus==2){return '결제완료';}
   elseif($nowstatus==3){return '무효';}
   elseif($nowstatus==4){return '일부지불';}
   else{return '전체';}
}
function encurrency($currencykind){
   if($currencykind==1){return 'US$';}
   elseif($currencykind==2){return 'EURO';}
   elseif($currencykind==3){return 'JPY';}
}

function krcurrency($currencykind=4){
   if($currencykind==4){
      return '원';
   }
}
function blankstring($value){
   return "(".$value.")";
}

function commamake($calsu,$shape=1){  //금액에 콤마를 찍는 로직
    global $resultsu;
    if ($shape==1){
        $calsu= sprintf ('%01.2f', $calsu);
    }

    $calsu=str_replace(',','',$calsu);
    $calsulen=strlen($calsu);
    $hu=strstr($calsu,'.');//소숫점 뒤 문자열
    $hulen=strlen($hu);   //소숫점 뒤 문자열길이
    $chunlen=$calsulen-$hulen;          //앞쪽 문자열 길이
    $chunvalue=substr($calsu,0,$chunlen); //앞쪽 문자열
    $na=$chunlen%3;//앞쪽문자열 숫자에서 3으로 나눗숫자
    $chunv=substr($chunvalue,0,$na);  //3으로 나눈숫자의 실제값
    $nagil=strlen($chunvalue);
	$chong='';
	$huvaluearray=array();
    if ($nagil>3){
        while ($nagil>3){
            $navalue=substr($chunvalue,0,$chunlen-3); // echo $chunvalue;      echo $navalue;
            $huvalue=substr($chunvalue,-3);
            $nagil=strlen(trim($navalue));
            if ($nagil<=3){
                $firstsu=substr($chunvalue,0,$nagil);
            }
            $huvaluearray[]=$huvalue;
            $chunvalue=$navalue;
            $chunlen=$nagil;
//echo $huvalue;
        }
        $totalsu=count($huvaluearray);
        for ($i=$totalsu;$i>=0;$i--){
            if ($i=='0'){
                $chong.=$huvaluearray[$i];
            }else{
			    if (isset($huvaluearray[$i])) {
                    $chong.=$huvaluearray[$i].',';
				}else{
				    $chong.=',';
				}
            }
        }
        $resultsu=$firstsu.$chong."$hu";
    }else{//만약 3자리가 안된다면
        $resultsu=$chunvalue."$hu";
    }  //만약 3자리가 안된다면의 끝
    return $resultsu;
}
function moneystring($number){ 
    $num = array('','일','이','삼','사','오','육','칠','팔','구'); 
    $unit4 = array('','만','억','조','경'); 
    $unit1 = array('','십','백','천'); 
    $res = array(); 
    $number = str_replace(',','',$number); 
    $split4 = str_split(strrev((string)$number),4); 
    for($i=0;$i<count($split4);$i++){ 
        $temp = array(); 
        $split1 = str_split((string)$split4[$i], 1); 
        for($j=0;$j<count($split1);$j++){ 
            $u = (int)$split1[$j]; 
            if($u > 0) $temp[] = $num[$u].$unit1[$j]; 
        } 
        if(count($temp) > 0) $res[] = implode('', array_reverse($temp)).$unit4[$i]; 
    } 
    return implode('', array_reverse($res)); 
}

function moneycomma($calsu){  //금액에 콤마를 찍는 로직
    global $resultsu;
    $calsu=str_replace(',','',$calsu);
    $calsulen=strlen($calsu);
    $hu=strstr($calsu,".");//소숫점 뒤 문자열
    $hulen=strlen($hu);   //소숫점 뒤 문자열길이
    $chunlen=$calsulen-$hulen;          //앞쪽 문자열 길이
    $chunvalue=substr($calsu,0,$chunlen); //앞쪽 문자열
    $na=$chunlen%3;//앞쪽문자열 숫자에서 3으로 나눗숫자
    $nagil=strlen($chunvalue);
	$chong='';
    $huvaluearray=array();
    if ($nagil>3){
        while ($nagil>3){
            $navalue=substr($chunvalue,0,$chunlen-3); // echo $chunvalue;      echo $navalue;
            $huvalue=substr($chunvalue,-3);
            $nagil=strlen(trim($navalue));
            if ($nagil<=3){
                $firstsu=substr($chunvalue,0,$nagil);
            }
            $huvaluearray[]=$huvalue;
            $chunvalue=$navalue;
            $chunlen=$nagil;
//echo $huvalue;
        }
        for ($i=count($huvaluearray);$i>=0;$i--){
            if ($i=='0'){
                $chong.=$huvaluearray[$i];
            }else{
			    if (isset($huvaluearray[$i])) {
                    $chong.=$huvaluearray[$i].',';
				}else{
				    $chong.=',';
				}
            }
        }
        $resultsu=$firstsu.$chong."$hu";
    }else{//만약 3자리가 안된다면
        $resultsu=$chunvalue."$hu";
    }  //만약 3자리가 안된다면의 끝
    return $resultsu;
}


function filepic($filename){
    $grimfile="";
    if( strlen(trim($filename))>0){
		///*
        $extension = strrchr($filename, '.');//마지막 점을 포함한 확장자
        $extensionleng=strlen($extension);/// 마지막점을 포함한 확장자길이
        $front=substr($filename,0,-$extensionleng);//마지막점 앞쪽
        $ex=strtolower(substr($extension,1));//점을 제외한 순수확장자를 소문자화함
		//*/
		//$ex=strtolower(end(explode('.',$filename)));
    }

	$pngxls="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";
	$pngdoc="iVBORw0KGgoAAAANSUhEUgAAABwAAAAZCAYAAAAiwE4nAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAGEUlEQVR42mL8//8/Q93sIwy8nGwMrCxMDG8/fmcQF+JmePH2C4OEEBfD959/GPi42Biev/3M9uTVJxFJIR61T99+aTx7/cmYiYmRLzPYJO7H778/bz96x/D3338GbOAfUJwFaHZeuCkDQACxgASYmZkY2FiZGViYGRmA9jP9/POX/+OXn4qfv/7QePnum/rPn78133z8rvbh83f5f3//8f/89Zfxx6/fDLoqYld+/fn38/HLzwwMjIxABzPitJAJaAcIAAQQ2MLnb754PHr+SevT159abz98U/387af6j19/hf7+/cv6+89foA6IBiaGfwwMQE+AQoKJiZUB6Cj+1XuvZ//+8+8PIyPIMuw+/PP3P4O8BP9lIPMYQACBLTx++fncn79+S4GClwmoEehPBkYwzcjAxsLMAPI22Kj/EB+A1IEEgDxZMy2pKazA0MEFQGqBocCw6eCtB0CuIkAAsUBEGf6BXA1RACL+IWnAbtDff/8YBPk4GVIDDRmIAXtP3+cC0QABBLYQ6Jl/OEIDJwAlgqevPzNE121kYGZkxOIzBobff/8x5IaZMFjpSYP4f0HiAAHEQool/9ESAh83G0OEqzb2xAJU/Bdoi6IUPwNy4gUIIBZ0V/36/ZcBFLrAJM/wA5glQEHHxc4CtuD7j98MHGwsQB9B1LID2TrKogzsrExYAwikRoCXExLnUAAQQCzIkQvKGiAXvQTmwc9ffzLYGMoycAMt23v6ATC+OBiqE60Zjl56xLDz6F0GDnZmhqevPjOEVKxlwJo+QYnl9z+GzlxHBi9rFbgwQACxICddEQF2hqWNPgxNc48ybDxwi6Et056Bn4edwSx+PoOmgghDrLcuw/lbz4FB9Y/h9x8GBiUZfoYZVT5gh+JKocL8nECzEYkQIIDgFoKC8MOnHwyfvv5iUJYWYBAX5mEQBZY4rMD8JyXKyyAnwQc24PyNF0ALWMBZ5+evPwzX7r1hYGVlwhqH/4Dq9VXFgWZxw4UBAghuISjffQXG0bX7bxhkxfkYTLQkGJ4BgwzkQlA8yUvyMzx68ZHh1btvDMxMkEQCctyKXVfBjsXmu99//jPkhrMzSIogLAQIIIQPGSEJ5vqDtwwOhnIMFjrSDBduv2QQ4ediMNWSZFCQEmC4cPMlw9fvvxg4gfEKUislysOwqNEPq4XIAFgSwdkAAYSSSkGZ/yrQh7Ge2gzcXKwM8zZdZJAGGuphqcwgAEw0u0/eBadaUCphAQb1y7ffGAon7MGZD0Fxl+Cjy2CkIQkXBwggFtTMzMxw6+F7oA9YGZRlOBku3XnF8PnbL4bsUBOGv0DNl26/ghZ1EAPZgHGnJisELvwx0ul/SGnEx82Oki0AAgjFQlDcvPv0neEhMK6kRXjAyf4vNIV9+f6b4f7TD2CfwYo2AV4OhhR/A2B+ZCY6SAECCMVCUFyA6rSyyfsZeIF1ICienr76wtAy9wjYpz+AqRIWX6CsAHKYQ8YScBBjTTTAfNiaZQ+OEhgACCCMog2UWm8AEw4oSXMADQXFw8x154AWMTFwczCD5UGG/QG6WkaEl6EhzQFrtvgPLf405IVRKmaAAMJalsIz8n9QNcUAiQcGtFoEGgXCApzguMRWq8CKP2Q5gABiYSATgOLy1ftvDOWT9zEwMuLKh/8YKhOtGByN5eHiAAEEs5CRVAtBLQElGUGGdV0hBBMNtAoEhztAALFAytF/3KC4gjgUJPMfTONzBSjxfAEmpG3H7gDzL24LQfH4C+i4z19+gY0DCCCwhZa6UmUv333R//HzrwYwNap9+/5THFiYc4AcAcoWsKIM2QGgpsjP339e7jv9cCEwSP8y4KnBQeZY6cmcA7EBAghsoY6i8Fx+YGUqKsgFrAuZed58+CoDbJVpPXn1WQ1ooeab91/Vv/38rfL9+y9+oENY/gBdDMqHQrycr8JdNcv/QQtqnBU3UMEXYJEIAgABBLYQ1MgBRTAoSIFNhy+83Gw3pMS4b3BzsjKIAx3x8u1XFkVpAYHLd14pgxwADA11YJ2pBay6fv/+/ZedkYkR2JL8i7P9Aw7W3+AWBgNAgAEAD0CQIu6OPykAAAAASUVORK5CYII=";
	$pngpdf="iVBORw0KGgoAAAANSUhEUgAAABwAAAAbCAYAAABvCO8sAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAFAklEQVR42mK8XVXCgAIYGRkYfvxQYfn4dhO7hjYLw////5Dk/v//+ZOTkYXlFwMT0z8Uff//MzL8/8f2981rhh/v3+1k0NEvZubm+srExcvw6+0rBlYeHgYmLi4GgABi+ffpI4aF/798ZuaQk1MUL67iYIQYxkAMYATq/bhnO8P3+rJ0ph/fVf6bmMUz8As/RVYDEEBMQJcyYGCQL4G+AVnGCDWIGAy2FKSflZWB4dED538H9u5h+PDegIGVBW4hQAAxMVAbwAIDaCnj+3caf7at3/H/6RMnRnZ2sDBAAFHfQmQA8umH9+LMp09s+n3jWjQD0FKAAGKhugf//Gb49+UzAwMLKyRqQODbF+5/O7cu+M/FzQ8QQCwM//5B4o1KgE1BmUEgNhUSlzALgex/Xz6xfD1yoBoggFjYFBUZfj14gJCkEHCqa4IxOvj9+hXD1xNHmQECiIlVRpaBkY2VgfbgP9hTAAHE9P/vH0iK4mBHTWU0AgABxMQAy9jMzBBLGWlrIUAAsTAwMSMyPNBSMP72lWb+BAgglv8f32sD84oq0KK/0OLpN+Pvnwp/371l/nriGCSMiSza/v/9y8AmK8fALq+IUw1AALH8ObRvEdOzp0bgMhRqMCjB/mFkYnhRXcDA8PcvWiRAkztI7T+08vv3LwYuS1sG6e6pOFM9QACxMP79xw7SzMjByQCsBSBBCkxI/z59YmBkBhrOxQ2kQUENZP8BiX8E8lkgpQgrO1APM9ywf58+MABrE7DDGXFYCBBALCDJ/0BXi1Y3M3Coa4FLCVA18nnvDoaPS+YxSPRMZ2AWFmb4/+0b0FEcDF8PH2B4O7mHgVNfl0GspoXhH1D8P7TweNvfzvD/+3e8wQ4QQCywMGSTlmH4emAXw+veNgb+8FgG0exihq9HDzKwSUgwfDq4l+HdjIkMnIYmDBINnQw/rl5k+P/+HQMLLz/D47oyhj8P7zMwAcvJv0Dfc2jr4bUQIIBYYNni/+/fDOyKqgx8PkEM3GZWDH8/vmf49/kzODj/ff3K8BdYUnw7cpDh553bDJy6hkDH7QZHgVBCGsP/Hz8Yft67zfBx7nSCCQsggBCF9+8/DGxKygy8nr5gC17UlzP8ff4UUggjV7JMoATzD5pw/jH8efoIHN//Xr4gqngECCBokAIRKN52bmV409/BAKpGQKmTWUgI7HsmHl4GZglJBi4TCwY2RRWGd8C4BRXOoGzwfvkihj93bzMwcXIiUjAeABBALLDi7PerFwx/Pn4AagIiNjaIL/79BwbVHQYeE3MGLu3ZwMTFzPBu2TyGb4f2gi3/BQwBRjZ2BiY+PmDwsoJTKCEAEEAsIFcBm0YMrxsrwPmKiYcPGnbMDP9//WR4UZEHyRYgH/2C1HVMQEt+XrvM8CwnCSj2C2wZsQAggFgY//2FJJrv36BtGSYGeEIC5rv/P9CSOcghIHFgIgMWgQzgohGW8YEOBDkAXw0AEEAs/8WlDv57/44dmOF/QIMXCP9xMHNwqLCKipNUlP//+YuBQx9YaCE5Ah0ABBALg7pW7o8Xz1jBRRWktfaThYVVh1NV/bRUXRsHKLiJLUvhrTY8ACCAQE0MUIH4E2Yoq4AwA+Ofv7/hSR9WbhLrS5BatPIXlF9B0QBKIwABBM/4jMCykU1cGliscTMw/Pr56/ejh/ee1ZdzAWX/UlwngRz96ycrIyfnc4AAAwDdMNLBGYDo9QAAAABJRU5ErkJggg==";
	$pngtxt="iVBORw0KGgoAAAANSUhEUgAAABwAAAAbCAYAAABvCO8sAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAFNklEQVR42mL8//8/Q0njdAYoiGZmYupnZWH+BxT+z0AEYGRkZPj37x/z7z9/PgG5WUC8C5fa7vpMBoAAYgEx/vz+AxOzUVGTF3WxNWb4/484G5mZmRjuP3rBsGPfCVEgdw7QAVFA+ggu9QABBLYQ6EIY/z8/LzeDiqI0Ayngzx+4g2WBeD4QxwDxSWxqAQKICV0AFMSkgn//UPSoAPECINbBphYggJgYaAM0gHgpEGuiSwAEEFUsBPnw95+/wKBFwXpA8WVAaW1ktQABxEINC7m42BkE+HkY/v39C0610PTL8OvPH4O/f/5mAiMqBxZTAAEEtpCNjZXh16/f4Cgkx0I5aXGGnMRASOJjhKVeZoZdB04znDhzDZSQGNjZWcHiAAHEAstLMEvhDiQBgLKGqIgAhjgvDxcDMEP/5oBaBgIAAQQLUgmgpRZ////TePbiLcORU5eBEQPKh5C8yMLMAk/+IJezADFI5jcoOwAVsLCwMPz5C2L/Z4B5EZI/n4M8I8/ExBgClDoGFH4GEEAwC2cBZXz5eLgZXr/9yLBx+1Fw6IJ8DoJ/gHEDMgBk1E9QKAAhyEKQGCsrK7DgAMYdEyMDE6jUAVsK1cvExMDFyW7y79/f1UCHbANKeAMEENjCv//+OXJzcTLEhrgycLCzMXz7/pPhL9ASLi4OsG+27jnO8P3HL4ZAT1uG81duM+w5dJaBn4+bIcTHHpwiQfKBXvYMQoK8DN+//wCLcXCwM3BysDHsP3ae4eSZ66A4tAXZBRBATNA4/AuK8DfvPzK8evuBQVpKhEFbQ5Hh85dvDK/efQAn+ddvPoBcy+DpbA5OkdrqigxGemoMb959ZPj67SfDh4+fGV69eccgBoxLkN6fv34xvHzzHuxQYJCCcw+IAAggsA9BQfHz5y+GpWt2A332jyEzMYBBX0uZYdm6vQzvgQZxAy36DQy2NVsOMmQB5XxcLBnkZMUZHj5+wbDvyHlw6lyz5QDQjN8MiZGeDFamOgzrtx1mePDkJQMPJwc4QcJKMIAAYkEu9UHB+e8vMG6YIOUBKHVxsbOD+UzszAzXbj9kOHbqCtjAX79/M0ycsw5MswMNZGdiA8cZKF4hetkgeoF85OISIIBY0KsaRiZ4VoLyGUEMsBgjUB8oAYE4oNTKDA6q/3C1TNBEBucD5RnR8hlAABFdtP0Apk5NNXkGSxNthkPHLzC8+/AJnGg4OTjA0UBs9gUIIKwWwoIUuazk4+Zi8PewBiegHXtPMRw8fpFBTkacwcHaAJgV/sGDjQmqF1cBAhBAMJPZEOHKwPAW6PpXr9+DEwPIIFCGV1WSZuABWrpr/ymGD5++Mpy9eJPhzv2n4NQqyM8LCWqgnaBE9haY2n9CikpkAC5uAAKIEWRgaeP0S0C2LjhP/oWUhyxAl34HpjpQ6QFSw8kJSTxfv/2AZ25wYgEmjh/ApP8b2GoAxRcrK6Qk+gHUC0owLCzMMAsvApsYBgABBEs0GUDFkX/+/nMVFeJTl5ORABUG4OCBhcw/qMWwxIEsxgRMabAghImxAou7R89eMbx89fYBMIHtAEqtBMkDBBCs8D4GLB2A+M8kRXkp9YhAZ6rUwpt2HGN4/PTVKS4WlkyYGEAAscAKZWiQsPz7/59q1T4oMYHS4G9EI40BIIDAFsLCn1bgF5KFAAEErw+RMz+1ACyukc0ECCAWWO0MU/Py9TuGwycuMlAatKAE9/j5K2AqZULxAUAAgS1ESrqnnjx7FfLw8cvf/xkosxCamoHlNsthZHGAAAMARJwHQHviHd4AAAAASUVORK5CYII=";
    $pngjpg="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";
    $pngtif="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";
    $pnggif="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";
	$pngpng="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";
    $pnghwp="iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAKaklEQVR42mLkEldmMPaKl9e3dIh59fat0sufbHyv3n3k/fjzL/cvZi7O718+cv5jZOJkYGJlYWRmZWVgYmRkZABCRgYGBjALCP79/c3w789vhr9/fjJz8XH8//ntG5D/mYmZ9d2/bx8+cHBwPWR4enHpjwfnrgAEIGnuURCIgQAKv0wmG1FBkEUEwUL0MnaWNjZe0sMIitaKjT/LJNGA3XvVp5P5crHbbg4Pc6vj5UTpEuOe0g6E4N/E6ZDYBGJQGvV4leoIIh7x/84I5etIlbeUsdJi9TvLPG3G+f7h1R/t3e26/gkgFufQlITvDGyqm7asZ3B3tGKw0Vdj4OVgZWADWwCylJmBFUhzswEtA/oI6EGG73/+Mfz/zwAHf4Gcf//+g+m/QPrPPwj9++9/hrdffzHsuvycYdnZl6LfNJ2SAQKI5ft/Zrl9py4w2FiaMGQF2TIIMDOgAFCQ/fjLwLDpzjeGCy9+MtjIsDF4KXOD5f4z4Ab/4TQ3gwgPO8P5Z18ZTjxmlgAIIKY3f7i433z8xmCgrsDADbTsN1Dlz38QDNP07vtvhj1XnzGsufCMIXDlY4aGA6+AQfif4ReSWnT8C4h/Q82Q5GNnEOVlZ2Dh4uMCCCCWF+8+8LL8/cvAw8UBDAqgAiAGImBQMjBcf/OL4cyz7wwfvv9h0BXnYnCVZwMG0W+GRdffMBiIMTP4aAkzfP8LCQVsPgRGL8PXL98Zvr1/wyDP+YuBheEPF0AAsXz6zcTND9TBwgLkAlUBg56BnYWB4dST7wxF254yXH75E+jS/wxswATCz87EYCLJyuCrzMFw7+UHhg+K/AyswLj+hyNs/wN98Psn0MLPnxjkv91mEOZg4AQIIKZfTBwcTEyMwNQHsRCEQfq3Xn/PcPb+ewau/z8YRJh/MfAz/mT49fMHw67bXxi6TnxhePMNpO4/AzBBMwATJDj4QCEE0g+Klj9AM/58BybHP78Y7t+7y3D05lOGr6z87AABxPLz2yduVgE2cDIHaQAmLIYvQNW2smwM8i6cDIpAZ3EBvXz3zQ+GlVe/Mhx9DkylP/4zTDn1geHRFwYGA2keBm9tIWA2YgXrB7kWlEd/AV2w/dEnBu73zxne373PwKuox8B49zcHQAAx/Wdm4QBlAWZg8ge7DqjpB9BCYyURhmhnHQYZeXmGjfeYGCad+cVw6tl/hh/ffzIw/v7J8PfXH4blZ14xlK68w1Cw6jrD15+/GP4xQnzIDKQvv/nEMOf+d4b4nc8ZXguqMiiqqgGjjZkdIIBYGFnYWNhZ/wAtZAL7DhYfoGC69eoXQ/W6mwz7br0H5ysDkX8MLlqcDJ//sDEsvvSdgZvxP4O1MtA3Xz8yvPrwlUFajA3su/fARLbn2WeGa48+MIj9/cpgbe7AcPfdP1A6YQYIIBZmYHHFxgIJh39QC0GaQMGz4PAjYHZ4xQAqzMLVGRkK3ZQZFOQkGZ59/MOw9spphs/ffjFEmcoyGKmIA0s+TmBGByY+YMo8BUxQx17/Zvj28DFDjqkMg5yUKMOdd88ZmIE2AQQQsHxkYgQVUaCS4+9/SKkBKlHefQHmvcsvGP7//sMgL8DAkO6kziClIMfwE+QooM/YgBhUfLKysDIICAswAFM/OIu8/fyD4eDLbwwXH7xjUOX8w+BlqsHwHRRcQAQKRYAAYgKlUCZGUPwxQi2EpNLPP34zvAUWCMDCkYGHlYFBTFQEmLAg+fP03bcMb999Y5Dh/ssgKsjN8BZo2ec/oBLpP8OZlx8ZjgCz0s9HTxgijBUYBIWFgGUqpMxiBkYuQACxsAAtBLn6LdB5fEAJkE+ZQfmOnY1BhIuZ4e3brwy3X/xhmLbnPoO9njTD/RdfGObuvs3w89tXhnBHSQZBUWGGn8CUwgIMlScfvzLsf/md4catFwzaPH8ZHA1VwaXO33//wKHGDHQxQACxgLwJKhJ+ADX9/AsphEFxyAnMChHWsgzNy88z/PzKxDBtyw2GBXvvMnwDFqzM/38zJFsLMfjaajEwMLEwMIL1/QVmmfcMx54BQ+XVc4ZoNzUGPj4+sK9h6QJkF0AAsTCCghQUVtDiCJxIgd78CcwfPhZKDKxAw9ccusPw/P1PBhbmnwzGCuwMXsYyDM7mmgxs3HwMf/7+Y2AHGnQbGBI7nv1geHP/OYOlODuDjZ4y0AOgovI/vGYBFXUAAcTC9P/fb1D4glz4/98/sGVgR4AVsDD42mkx2OlKM3z+/IWBlxOYQHi5GZjYOYF1IDNQDzCpg9wHpLc9fs9w+flXBrYPrxmiA/QZOLl5GX4Aky2oNPoPTB9AUxmY/v/9CxBATIz///4BpQZQUILzICjxAPPET2BF/OvXb3CJISQowCAoIsZw4u5XhrMPPoPqe5BmoJX/gb5jZLjz5h3DhkdfGf49fs7gqSzIYKqhAExroDoT4rt/wBoBVLswAO0CCCBgfvj9A5gvGP7+hUhyACvaE5efMCS1bWVI69rOcOveMwYeDgaGNfuvM5T17WXImbiX4TXQAnZmZnCJ8hdoufzPBwwhv88xSP15yxBrq83Ays4BNOsfvNoA10AgX/758wsggFhYOHjBxfA/WHCCy8E/DHcevGEAheu7dx+BBssyyApxMvDzMjNoiDMD8+A/YFYCJgIgAUqB/F8fMUT8Oc5g4eDPoCAjyfAH6DvG/5D8BUsTf/6BSgX27wABxMLw+8eP/4ycwMiHhPc/YCIQ4ediYOFmZ/gDDNK3n38BNTMwhNipMVgo8wJDgIlBVEwMaBEDuD3z/dNbhke3rjP8U/Ri0NN3ADsY5AiE9xjAQQsK0t8/vv0CCCCWfz8+f2Vk4QUGKTDMgY74AzRdXoIXGG/cDK/efWeYtf8Bw5PP/xkkgXwuYFsHVNn+vPiB4ROwWHsPrIxv3r7HIPybl6HWyY6BDdjYAoUOAyyhwFoNoEoBGGU/P7//DhBALCycfJ/AwfjrL8QVQJ8K83EyJLqpM8zad5fhNbCtMOfQA2i6ZkRp7ICyMCiB5TsYMfABQ+Q7OJQghcd/ULsBnDr/g33469cvYAHB9BUggFj+fnr55Z+MMMOXL1/BGR9U8oAK4WBrVQYTBT6Gh8CC+B3QNz+ADgJpBFnECrSYC1j78wALB352ZgY1WTFgGwaSTSD5jhFCMzBA68j/wLL2J8Pnl0++AwQQsHBnfvGNhYPhwev3DHwPOBikRPgYuIApFdQGlRAXZ5CTFAcWW6Ci6T8kb8IavyDfAuMQJPoLaPhXYIH5D1qB/4FmMVDTBGTru09fGA5dvMPw79efNwABxChiFqSrElOyn4uPV5if8TcDJwvEMlZgeIHapWzApgeoPQPCrEyQlAkp8BnAbVQmUKHBCPEVKEr+/oe2S4HB+/Mn0FdffjCcvHaf4dHDZ9//XD/oDRBAjDzKFgyCOg4mwnpWCf8Z/0kyc3ADG53/uIFtHE4WLmDb7vc3dmYWVnYmFlYWIM0CsomRAdZSgzT5gS19YKoHpvPfv3/9Z2T7/vPrp1/fP3/6/vPXv69fXz37+v8Pw+s/rx+s+Pnwwn6AAAMATo6IDzrqjTAAAAAASUVORK5CYII=";
    $pngzip="R0lGODlhHAAbAPcAAAAAAP////Ts8ZKBjaqls3t0m3Z0f7u5xlJIlYF7qailvqyrvKGhsaeoyaWmviQqfVZbl0BJlFxrppedtM3Q20RYmml5q4WWzYCLrxg6mXiLxHWFtE9oqX+X0GSCxn+VyX+SvIiUr5umwF9+urjJ67C1vyxcsUtyuFB5wVZvm5Oq1IOWt6S54amwvVl3qjRrumeIu2eGtHWWyY+kw6WtuQFFn1qDunWd03+l2YOl05e55T5pn1WJx3udxo604aOxwjFqpzt2u2OW0WuTvnCXwnKXv5y20sPb9SpyvEmMzTxegKvM77nW84Gz43KcwgVmtCJvsjiFxled2m2t4XKt4V2FpqnE20ib2Mvm++ru8Qd5yCeJyieAv2KcxKW/0Z+2xjSX1TSQy1it4WO16GOiyMfp/iWRzCiV1Xa+583q+wd/ugdzrRN9tV2ozoK61qbW8AGV2Bye2S+l2YnU98Tj8Q2Oxiuu5HbP8/H7/xSXyBmr4QWo3hy46A235iXI9dz3/+37/9Xh4/v///v9+//5RvHUBvzgE//vc/POBfnbIPnOAO7JB/PKDfnHAP3REu/FFPbQJvC7BPjCCeO2C/jFDvHEI/C4CvK9Eem4HOO0HvDCLfjQSvi9DvTTdfW1DdqfD/q7FPy5GuOrGdulG/zBLN2sMPXBPPGoC+yoEPi0E/SuFfq1G/W4MO23Of7LVeWdDfiuHe2rJ+ClNOSrPPDFbdyYHuGeIdieMvW3SdehQeKsTPnDY86BA/2qHe+nMeSiO/m6VvbMiN+KC9mIFfSnN/W7Ys97B+KVK+WdPvWtTf/8+NB3C9J7EN+CEtKCHtuJJ+OUNfmxV9BzDsxxD+mKG9N9IO6kUNWZWdBwEN13E957Fcx2HuOLM96IOciVZMNnF8BnI9d5LrhdIdSCTtedd9x7QuKCVOmMY++deO2bd+6Tbe6XctGNech8aeurm9JcQ9xnUuB2ZeWEdrKTjraalrifm+uXjL6AefGyqsaGgMCEfqt2c62Ihv/8/Ojl5f///yH5BAEAAP8ALAAAAAAcABsAAAj/AP8JHGhgAogiCJ0ozHFjoMOHDhkEusEljp6LfPj48ZMEokeBRqzAiNGlC5mTbfLs0TMnSxYfUcSA+Lhv372b+nLmazeADZw5AQSh0WImhsNx5cydO6duXTp06NapU/dO4Bo0gwBdqRHGyMBJihopGouIESVKnDhJIgaPn8AqNpq8eLCCxsBFiTrhMqXpUqRIllBhcoQrnluBKI6QGPEQESZ3wYqx8uQplSpWtiThkjdP4AUfLD5seFho0rVDm2i1YlaNlCtnlIDZ6yzQhA8eEUhPykUIkq5b38T5es1JNr2BTRTLCOGw0KNSmUTZOnaMG7du30AVc3f83wUPOU5A/3i4yNAnXsaWLZOGDdu0YaB24as3MMgSHS7IQ4qczJeqUwCiEssq0bhD3z8a6ECCChpM4BAjmZATzC6kXMJJKLCY8gwsbB32jwk4oFDBQ4yIclpqrUyzjWvVwJIMPPsMJAQWTMDw0COi8AbJLLdsA85wLUYTz0Ad3MCgBTdWUsootdTyzJPhhPNNL9GwM1ACKOgghAQPXeLIK8KE2Uwz2miTDTW9WDOQEm4IgscUUYwxk0C3lCKLLLP8oicyfCIDjTcCpVAHUHhc8cQZRnlEwAIKOOCooyL8U0UecNwRgFY1mKHCRxTQkUQUYIAhhx126NHHHlwAcYMPQWTQww8f/XpjRRRQcLGFGWqsUYccbRzQgAlN8JBCrAOVsEALyGLAwQoUUODPATcwgQOXxHqEBREC9PPDFwFgIcUZVAjkhQ3VCjQHEkkEwcMfAZSxhRZivBAEGjuU+08GEVgggQ1pKPPGE09IsQEHNSBgr8ED9TDDEBVUkN8/CBQQEAA7";
    $pngdisk="iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAYAAAByDd+UAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAB1UlEQVR42mJ8pGnEyMDAkArE6UCszAABrED8H4j/MhAGyGpAZrEAMTMQPwHiaiBejawYIIBAkilAPBPNkDtAXAvEX4iwEOQ4JiTLQfwaINYD4lVAnAXE02GKAQKIBeo7dLAYiFcwEAcWArE6lD0dyteAWggC05DkGAACCGShLBZDGIm0jB2ILYFYFcrfA6X/oKkDWcoNxD0AAcQCZZBrIQj8RGLDLPqARV03ED8GCCBQ2P9joB9oAAggJgb6AlmAAKK3hX8AAgiXhf9JMIQDLYvg1Q8QQCw4xJlISDC7gfgulH+JUKIDCCBcFkYC8Q0gfk+EpZuRLAD5LBSI03ApBgggXBaC8tUyIn35n5TsBBBALFRICKTkWQaAAMJm4S8SEw0xpREcAAQQuoUbgLgRS9FECciEFuBgABBA6BZuAeILVM57a5AtBAgg9OTPRoPMjhKkAAFE75KGASCA6G4hQAChW/iR1hYCBBC6hT9obSFAADFRkonJAQABRHcLAQKICc1SEVpbCBBATGhNQVr7kAkggEAWvsHRIKIWQDbzJ0AAgYq25UCsCxVwgxZt1GpYgUIsAom/CSCAQBb2QJsJ8UDsA8SOVKwtGKHN0GdAvA2IqwACDACtgUCdaq3X8wAAAABJRU5ErkJggg==";
	$pnghlt="iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAADAFBMVEV+fYWCgI2Ni5MAAAWysbq5t7+HhowODRMTEhcAAAIuLTSFhIyYl5yEg4oMChd/foQEBAKVlJsJCQvv7/C3tb98e4EPDhSNjJTu7u8SEhgAAASKiJX9HwYAAAD///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB6WLzJAAAAH3RSTlP///////////////////////////////////////8AzRl2EAAAAQ1JREFUeNpilGPADQACiAmPHANAALEwMHzCLvNLhAEggHDrZGNgAAggFhD9AYvFIPMAAgiu898/TAUAAQSWFPyK3WSAAMLrWoAAAtv5WwBs5j+I6n9wTQABBJbkhgqByX8McNMAAgivsQABBJZ8iUMSIIBYoB5BkEz//sE0AQQQEz4PAAQQxEF/2JBF4bIAAYTXQQABBPEnSONfTEmAAAJL/gIRzAjB/wyMYBoggPAaCxBALDAGkqlMLxj+MvEAGQABBA0+JFOBZkpCmQABhNdYgACCuBbJKVC3gAFAAIEl+dFcCQMAAYTXWIAAYoL78////+iSAAEEMfbHZwYGdgY+dEmAAAJK8uE0FiDAAKrPJbjbenj9AAAAAElFTkSuQmCC";
	$pnghlz="iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAADAFBMVEV+fYWCgI2Ni5MAAAWysbq5t7+HhowODRMTEhcAAAIuLTSFhIyYl5yEg4oMChd/foQEBAKVlJsJCQvv7/C3tb98e4EPDhSNjJTu7u8SEhgAAASKiJX9HwYAAAD///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB6WLzJAAAAH3RSTlP///////////////////////////////////////8AzRl2EAAAAQ1JREFUeNpilGPADQACiAmPHANAALEwMHzCLvNLhAEggHDrZGNgAAggFhD9AYvFIPMAAgiu898/TAUAAQSWFPyK3WSAAMLrWoAAAtv5WwBs5j+I6n9wTQABBJbkhgqByX8McNMAAgivsQABBJZ8iUMSIIBYoB5BkEz//sE0AQQQEz4PAAQQxEF/2JBF4bIAAYTXQQABBPEnSONfTEmAAAJL/gIRzAjB/wyMYBoggPAaCxBALDAGkqlMLxj+MvEAGQABBA0+JFOBZkpCmQABhNdYgACCuBbJKVC3gAFAAIEl+dFcCQMAAYTXWIAAYoL78////+iSAAEEMfbHZwYGdgY+dEmAAAJK8uE0FiDAAKrPJbjbenj9AAAAAElFTkSuQmCC";
	$pngbib="iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAIAAAD9b0jDAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAEPElEQVR42mL8//8/Axj8+/fvx89ff/7+YWBgZMAJgIoZmZmYODjYgSQuRQABxAJnvXn/YfeR40yMQIhTNSPY1G/ff0iKCblYWbKysmBVBhBACNGfv4DO/OtqbcrAyIjf0N2HT1y7++Df339udtasLFjMBQgghBDQKG4ODilxMQZCgJOD3UBB9+nT59v3H/awt2FjY0VTABBAKD799+8/0LH4TQTGwZ8/v3l5uK2tLF5//rR9/yGgF9HUAAQQavCBPM5I0KX/Gf5zMrOICQs6O9l//f0bGBq/fv9GVgAQQEwMJIL/DIy/fv/58vnzhzdvf33/paGl8fDli91HTiC7FyCAWEg1lInxv5iw8MXrN2/cvfeP4T8TMys7C8vNu/d11FTkpSUhagACiChD//5n+Pr7zz9GBg4WFg5GRhcbi0fPXrx+/5EJCEChxXjhyrU/f/7A1QMEEAFDX334PGXD4b17TzE+eSn+94+QIK+ShV5kcoCqvKySjPR/cPj//fP3xp07yLoAAogFLRkig7M3H0XVz/q6/3QNy383ET7uf39/Pbr9bNOms6s2fJnZqm2mDVHPxAJOvUgAIIBYMHIhFDx59S60dDLL2at7XIw0kvwYtFUZWFn/v/sovfu4akv37cCU1zsXi+mogBMZenYBCCAWVIcCZaHm1s7acP/ynbURLhoN6Qy83FAVwvyMqnJ8lgaK3vE/Srv+bJnOwswMMRfZmwABhD1JPXr5dvexKzLC/D4xnnATEQ4xVOftr2c+dOTPoXPYPMkAEEAs6HkbbOHTVx9+fP7KzssNLDnYYJIv331at+cUEyNjgIu5uLsNs4T832t3GRxNMd0EEEDYY//H79///v59/vnb3P1nCyPdgCKPX76Lqp5x5MhFhj9/d5y4uqQpldvF4t+HTwhXInkfIIBYUJ0PdSovFwcbJ/v/rz+aZ2+89fCFIC/XrhNXzl68zSLIC0xAG/afvfc+QpWX5zcPF0wrSvQDBBB2l2rKS0pJibx89/n9p68zFm8H6WFmYeXmBJd9/7l4uDh+/f736TO7vTdW7QABhD2iuDnZ88PdWP7/B6YGFj5uFj4eVh4OoInA2uH/x69BnpYy95/+kxZnM9DAqh0ggHAWKHHeVvkJ3qzA6uXz1z/ffvz++vP35+9/3302MtNu8rflePyMKysCl16AAMKZTRkZGXsKInRVZZdtPXrjzpN///+LCvG72hskuZorfv/+z8OaSVQQl16AACKQ9+O9rYOcjG8/evn3338xQV55CWFQoP7+y8SKTyNAABEupXg5OYzU5VH8wEpAF0AAkVxIEwMAAogJtQBmxFOb4wLMzMxMqCUKQACxIGfebz9+PHv5mohaCr0q/P7jB7xRAgQAAYQwlJ2NDViQHzh1BtiaIM3Qf/842Nk52dnhIgABxEhiswe7sSzMLBzsIDdB+AABBgB/mJPfAlo3zwAAAABJRU5ErkJggg==";
    $pngmp3="iVBORw0KGgoAAAANSUhEUgAAABwAAAAdCAYAAAC5UQwxAAAACXBIWXMAAAsTAAALEwEAmpwYAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAHFUlEQVR42mL8////QwYGBn4G+oCPAAHEAiSEgZgbXeb+l18MZ95+Z/j89z8DEwMjVt3/Qfj/fwZlHhYGWzFuBiZGRkIWsgAEECNQwwd0Hx5+9ZVh89MvDJ/+gI1kwGcMCxMT0EEMDAYCbAzh8nwMXCzMeH0IEEAs6CLPvv9m2PrsK8PvfwwMFkIcDPLcLAzMOGwEep7h1LsfDK9//mU4/+EXw7//nxiiFfkZOJiZcNoIEEAYFl798JPhw69/DMZCbAzxSgIMhEIJZOmmZ18YOIGWXPr4i+HPvQ9gfbgsBQggDNFPv/4y/AEGoyI3GwPhKGFgYGNihAc5BzAorn36zbDswUeG73/+YVUPEEBYncFIQrL7j8YHWXoBGLxL739k+PkX01KAAGKiNJ3/xyLGCbT08qdfDGsefQIGOaoKgACi2EJQgvoJjMjvSPgHELMCg/rUu58MJ998Q1EPEEAslFqoL8DB8FOWgeEX0COgOAdFx/c/fxmufvzJ8PLnf4Y7n38zWIki1AMEEIaFzMzMDExAzIo/P8EBHxszg4skRrnBIMbxnWHJw08MjMyo5gAEEMhClr///jF8+f4D6EJGhs+fPj378PbD80dsPxju/uViAEU7BysLDz8nu9p/9PQEjR5sqZn59w9gEfabgRVIf/zKwsDBxsrAzsrCABBAjG8/fdmfOH25w4UHTxl+//3L8Pnn73c//v59J8DJwcAGzEu/gSntx69fnOwszFJsLCyMXOxsDN9+/mL49ecPAzOwlAGlif9AyMnKCg4VUFH3Exikv4AYJA7UA4xPJgYRXi6GmWnhHwECiOX8g6c3dl666QDyXZiFHoOOjITQz99/hGbuPcHw6ss3Bgk+HoY8NysGFqDG47ceMGw9d43B3UCDwU5DiYGPiwNYugDj6cUbhi1A8Ydv3jPwcLAzaEmLM2jLiIODA2g+w8XHzxkevnzDsPPCdQaAAGL59+8/K8gVIMlMV2sGCzVFSOH9+h3DvF3HGDztTBhqQjzAYsuPnGXYdOoSQ7S1EUOUrQlKEOZ52jG4tkwH6ldgWJITAxf/+vMnQ+HCDQyzdxwB+x4ggKAF/H8GFmDwgYIIBpx01BjYgMHnbaiJiBeQPAsTAzAEwPz5+08wmJZ3M5y5+4hBUUwYGEIGDJcfPWdYeOAkQ8bslcDQuMrAzc7OkGBvysAIjD9QlAMEEBMs7kGGcXOwQRPDfwYTJVkGPUVpBnstFYa/fyAWcAMdwMzEDM/sLz58Zjhz8z7Dk7cfwHxBbk6GS/efMDSu3cVw8eEzhk/ffoB9dev5a4b/wPQB8htAALHAUhvIh3zAhAJKEHefvWRQkhJniLU1BsYTJ8NeYNjb66kzCHBzMLCCC2WIlWGWBgyO2irgaAAZvPfqbQYGYIqPsTZmaIrwgpTN374zzNl3HCj+H5wLAAII7kOQQYLcXAyvP31h2HvtLtg3iQ7mDB+BrgQmKmCJwgjMHqzgShZWWilLiDAYKMgwnAAmptSZKxiO3nzAwA504B6gxVXLtzDsAerjAXqiNsgdHD2gBAYQQCyQSvs/Azsw4YASz6/fvxmO3LjHkAtMBLxAzUeB7CtPX4Jdx8XOihLP03ceYahdtQOcET//+AnOaxLA5P8AmODaV91muGT+jMEFGDJu+hoMAkBxUH4HCCCQhWwgmwWA4Q/KR0xAA88Bk/Kzdx8ZZEUEGfZcvsXwEhhXICDMwwOu4Zmhdd13YOIB5mMGfh5ucIh8/vGDocbfmSHOwZTh+uMXDBoyEmB1p+48ZPjw+RvQsYwMAAEEKmV8QBb+BYbxZWBE33z+kuHt568M03cdYbDTVGHYcPoS2OCbT16AgxfkU1AiuffiNcPrj58ZmEBZChzMwAIbWIyB8uI7oOFW6koMb798ZVh9/DxD56Z9DL9+/QJHBUAAMd589vK5S/M03mdAX3CC4wgYxkCvg0qLf9D4BfkKVCyBAChLgPgsQMNBJdMfoFpGpJLuN1AfyLc8wOD///8fw7uv34Hq/nNwsLEwL86K+ggQQKBG1MaTtx5wX3j0DJwgzr//wXADWMKbCnIwqPKxgV0PbkpADQbFIShE/kNrB2wtNVBoPfzyk+H42x8MSrzsDDaiXMYywvwCDtqqHwECCGThe+RW2543PxnWP/nK4CnJxeAjzkF2tXX43W+GVY8/MziJcTIESnLCXPURIIBYoJkf7kwpFmBc/PvFcOT5HwZBxr8Marxs4GAmugUA9PltYJt2B7DlBwxvBhk2ThR5gABiQW8lqPNzMJgAg/PYm+8Mqx9/YeBiZiS5kfMNWOP/AgarhTAHg6EQaigBBBAoSL+gt7xBjZ+9L74yXHj/k+ErkM3IyEiCD/+DHanDz87gIcXDwI7aXPwKEECM+PoWIFeC2ieMJMYfO9BCNuzx8BEgwAALIrkBpyLQAQAAAABJRU5ErkJggg==";
    $pngjs="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";
	$exarray=array("xls","doc","pdf","txt","jpg","gif","tif","png","hwp","bib","hlt","hlz","mp3","js");	
    if((isset($ex)) && (strlen(trim($ex))>0)  ){
		if(in_array($ex,$exarray)){
			$filename="png".$ex;
			pic($$filename,24);
		}else{
		    pic($pngdisk,20);	
		}
    }
}
function makenewfile($newfilename){
global $first,$fp;
global $int_dir;
   if(!file_exists($newfilename)){
      $first='';
      $fp=fopen($newfilename,'w');
      fwrite($fp,$first);
      fclose($fp);
      chmod($int_dir.'/'.$newfilename,0777);
   }
}
function makethatfile($dirpath,$newfilename){
global $first,$fp;
   if (substr(trim($dirpath),-1)!='/'){
      $dirpath=$dirpath.'/';
   }
   if(!file_exists($dirpath.$newfilename)){
      $first='';
      $fp=fopen($dirpath.$newfilename,'w');
      fwrite($fp,$first);
      fclose($fp);
      chmod($dirpath.$newfilename,0777);
   }
}
function makenewdir($dirname){
    global $int_dir;
    chdir($int_dir);
    if (!file_exists($dirname)){
        mkdir($int_dir.'/'.$dirname,0777);
    }
}
function makethatdir($nowroot,$dirname){
    if (substr(trim($nowroot),-1)!='/'){
		if(!file_exists($nowroot."/".$dirname)){
			mkdir($nowroot.'/'.$dirname,0777);
		}
    }else{
		if(!file_exists($nowroot.$dirname)){		
            mkdir($nowroot.$dirname,0777);
		}
    }
}
function checkdir($dirpath){
    global $int_dir;
    if (!file_exists($dirpath)){
        mkdir($int_dir.$dirpath,0777);
    }
}
function checkfile($filename){
global $first,$fp;
global $int_dir;
   if(!file_exists($filename)){
      $first='';
      $fp=fopen($filename,'w');
      fwrite($fp,$first);
      fclose($fp);
      chmod($int_dir.'/'.$filename,0777);
   }
}
function dirfiledelete($dirpath){
   if (($handle=opendir($dirpath))){
     while ($node = readdir($handle)){
       if (      (strlen(trim($node))!='.') &&  (strlen(trim($node))=='..')  ){
         if ( (strlen(trim($node))>0) ){
            unlink($node);
         }
       }
     }
   }
}

function obtaindaysu($lastdate,$firstdate){
       $totaldaysu=intval((strtotime(substr($lastdate,0,4).'-'.substr($lastdate,4,2).'-'.substr($lastdate,6,2))-strtotime(substr($firstdate,0,4).'-'.substr($firstdate,4,2).'-'.substr($firstdate,6,2)))/86400);
       return $totaldaysu;
}
function obtainnamsu($lastdate,$firstdate){

          $gongarray=gongdate($lastdate);

          if( (in_array($lastdate,$gongarray))  || (obtainyoil($lastdate)==0) || (obtainyoil($lastdate)==6) ) {
             $startworkday=nextday($lastdate);
             while(in_array($startworkday,$gongarray)  || (obtainyoil($startworkday)==0) || (obtainyoil($startworkday)==6) ){
                $nextday=nextday($startworkday);
                if( (in_array($nextday,$gongarray))  || (obtainyoil($nextday)==0) || (obtainyoil($nextday)==6) ){
                   $startworkday=nextday($startworkday);
                }else{
                   break;
                }
             }

          }else{
             $startworkday=$lastdate;
          }
          $lastdate=$startworkday;
          $totaldaysu=intval((strtotime(substr($lastdate,0,4).'-'.substr($lastdate,4,2).'-'.substr($lastdate,6,2))-strtotime(substr($firstdate,0,4).'-'.substr($firstdate,4,2).'-'.substr($firstdate,6,2)))/86400);
          return $totaldaysu;
}

function monthtitle($getdate){
    $year=substr($getdate,0,4);
    $month=substr($getdate,4,2);
    $string='<b>'.$year.' 년'. $month.' 월'.'</b>';
    return $string;
}
function yeartitle($getdate){
    $year=substr($getdate,0,4);
    $month=substr($getdate,4,2);
    $string=$year.' 년';
    return $string;
}
function daytitle($getdate){
    $year=substr($getdate,0,4);
    $month=substr($getdate,4,2);
    $day=substr($getdate,6,2);
    $string=$year.' 년 '. $month.' 월 '. $day. ' 일 ';
    return $string;
}
function postdate($name){
    $value=$_POST[$name.'_1'].$_POST[$name.'_2'].$_POST[$name.'_3'];
    return $value;
}
function postno($name){
	//$$name1=$$name2=$$name3=$$name4=$$name5="";
	$name1=$name."_1";
	$name2=$name."_2";
	$name3=$name."_3";
	$name4=$name."_4";
	$name5=$name."_5";	
	if(  !isset($_POST["$name1"]) ){$_POST["$name1"]="";}
	if(  !isset($_POST["$name2"]) ){$_POST["$name2"]="";}
	if(  !isset($_POST["$name3"]) ){$_POST["$name3"]="";}
	if(  !isset($_POST["$name4"]) ){$_POST["$name4"]="";}
	if(  !isset($_POST["$name5"]) ){$_POST["$name5"]="";}
    $value=$_POST["$name1"].$_POST["$name2"].$_POST["$name3"].$_POST["$name4"].$_POST["$name5"];
    return $value;
}
function postno3($name){
    if(!isset($_POST[$name.'_1'])){$_POST[$name.'_1']=0;}
    if(!isset($_POST[$name.'_2'])){$_POST[$name.'_2']=0;}
    if(!isset($_POST[$name.'_3'])){$_POST[$name.'_3']=0;}	
    $value=$_POST[$name.'_1'].$_POST[$name.'_2'].$_POST[$name.'_3'];
    return $value;
}
function postno4($name){
    $value=$_POST[$name.'_1'].$_POST[$name.'_2'].$_POST[$name.'_3'].$_POST[$name.'_4'];
    return $value;
}
function postno5($name){
    $value=$_POST[$name.'_1'].$_POST[$name.'_2'].$_POST[$name.'_3'].$_POST[$name.'_4'].$_POST[$name.'_5'];
    return $value;
}
function makevar($kind,$varname){
   if($kind==1){
      if($_GET[$varname]){$s="&$varname="."$_GET[$varname]";}
   }
   elseif($kind==2){
      if($_POST[$varname]){$s="&$varname="."$_POST[$varname]";}
   }
   return $s;
}

function datekal($getdate,$yearsu,$monthsu,$daysu){
    global $resultdate;
    $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
    if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
    if ((strlen($dd)==2) && (substr($dd,0,1)=='0')){$dd=str_replace('0','',$dd);}
    $yy=(int)$yy+(int)$yearsu;
    if ($monthsu<1){
       $yy=$yy-(int)(abs($monthsu)/12);
       $mm=$mm-(abs($monthsu)%12);
       if ($mm<1){
          $mm=12+$mm;
          $yy=$yy-1;
       }
    }
    elseif ($monthsu>0){
       $yy=$yy+(int)($monthsu/12);
       $mm=$mm+($monthsu%12);
       if ($mm>12){
          $mm=$mm-12;
          $yy=$yy+1;
       }
    }
    $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
    if($yy%4==0 && $yy%100!=0 || $yy%400==0){
       $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
    }
    if ($dd>$lastday[$mm-1]){$dd=$lastday[$mm-1];}
    if ($daysu!=0){
       $dd=$dd+$daysu;
       if ($dd>0){
          while (true){
             $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
             if($yy%4==0 && $yy%100!=0 || $yy%400==0){
                $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
             }
             if ($dd>$lastday[$mm-1]){
                $dd=$dd-$lastday[$mm-1];
                $mm=$mm+1;
                if ($mm>12){
                   $mm=1;
                   $yy=$yy+1;
                }
             }else{
                break;
             }
          }
       }
       if ($dd<0){
          $mm=$mm-1;
          if ($mm==0){$mm=12;$yy=$yy-1;}
          while (true){
             $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
             if($yy%4==0 && $yy%100!=0 || $yy%400==0){
                $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
             }
             $dd=$lastday[$mm-1]-abs($dd);
             if ($dd<=0){
                $mm=$mm-1;
                if ($mm<1){
                   $mm=12;
                   $yy=$yy-1;
                }
             }else{
                break;
             }
          }
       }
       if ($dd==0){
          $mm=$mm-1;
          if ($mm==0){$mm=12;$yy=$yy-1;}
          $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
          if($yy%4==0 && $yy%100!=0 || $yy%400==0){
             $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
          }
          $dd=$lastday[$mm-1];
       }
   }
   if (strlen($mm)==1){$mm='0'.$mm;}
   if (strlen($dd)==1){$dd='0'.$dd;}
   $resultdate=$yy.$mm.$dd;
   return $resultdate;
}
function monthcha($date2,$date1){
    $ayear=substr($date2,0,4);$amonth=substr($date2,4,2);
    $byear=substr($date1,0,4);$bmonth=substr($date1,4,2);
    if($amonth>=$bmonth){
       $monthcha=$amonth-$bmonth;
       $monthcha=$monthcha+($ayear-$byear)*12;
    }
    if($amonth<$bmonth){
       $ayear=$ayear-1;
       $monthcha=($amonth+12)-$bmonth;
       $monthcha=$monthcha+($ayear-$byear)*12;
    }
    return $monthcha;
}

    function daybody(){

        if (!isset($getdate)){$getdate=date('Ymd');}
		if($getdate==date('Ymd')){$istoday=true;}else{$istoday=false;}

        ?>
        <center>
        <table width=990 border=0 bordercolor=ffd020 cellspacing=1 cellpadding=3>
           <tr>
             <td>
                <b>일간:</b>
                <a href="?a=daybody&getdate=<?php echo $getdate;?>"><img src='./icons/dayon.png' border=0></span></a>
                <a href="?a=weekbody&wkind=sschedule&getdate=<?php echo $getdate;?>"><img src='./icons/weekon.png' border=0></span></a>
                <a href="?a=monthbody&getdate=<?php echo $getdate;?>"><img src='./pics/monthon.png' border=0></span></a>
             </td>
             <td align=right>
                <span class=kored>
                <a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo beforeyear($getdate);?>>전년<span class=komigreen>◀</span></a>
                <a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo beforemonth($getdate);?>>전달<span class=komigreen>◀</span></a>
                <span class=kored><a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo beforemanday($getdate);?>>전일<span class=komigreen>◀</span></a>
                <a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo date('Ymd');?>><?php if ($getdateistoday){?><font style='background-color: #ff8000'><b><font color=white>오늘<?php echo date('Y').'.'.date('m').'.'.date('d').'('.yoil($getdate,2).')';?> </font></b></font><?php }else{?><b><font color=ko><?php echo substr($getdate,0,4).'-'.substr($getdate,4,2).'-'.substr($getdate,6,2).'('.yoil($getdate,2).')';?></b></font><a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo date('Ymd');?>><font style='background-color: #ff8000' color=white><b>오늘로</font></a><?php }?></a></b>
                </span><a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo nextmanday($getdate);?>><span class=komigreen>▶</span>다음일</a>
                <a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo nextmonth($getdate);?>><span class=komigreen>▶</span>다음달</a>
                <a href=pv.php?a=schedule&kind=day&wkind=smemo&getdate=<?php echo nextyear($getdate);?>><span class=komigreen>▶</span>다음년</a>
                </center>
             </td>
           </tr>
        </table>
               <table border=3 bordercolor=ffd020 cellspacing=1 cellpadding=3>
                <tr><td valign=top>
                     <table width=490 border=0 cellspacing=0 cellpadding=0><tr><td valign=top>
                     <center>
                              <?php 

                              $this->sschedule(makeaddstring('kind,wkind,status,getdate,wantlist=19,wantlink=1'));

                              ?>
                     </td></tr></table>
                    </td>
                    <td bgcolor=gray><font color=white style='font-size:2;'>&nbsp;</font></td>
                    <td width=470 bgcolor=white valign=top>
                        <?php 

                        $this->smemoform($getdate);
                        ?>
                        <br>
                        <?php 
                        $this->sdiaryform($getdate);
                        ?>

                    </td>
                </tr>
                </table>
                </td></tr></table>

        </table>
        <?php 
    }


function monthbody($getdate,$pok,$nop,$funcname){

			if(!isset($getdate)){$getdate=date('Ymd');}
			if(isset($userid)){$useridstring=" and userid='$userid' ";}else{$useridstring="";}
			if(!isset($daysum)){$daysum=0;}
			
			$gong=gongname($getdate);

			foreach($gong as $k=>$v){
			    $gongarray[]=$k;	
				$gongname[]=$v;
			}
			
			if($pok<1){$pok="13%";$widthstring="width='98%'";}else{$widthstring="";}
			if($nop<1){$nop="50";}
			

			$todaydate=date('Ymd');
			$yy=substr($getdate,0,4);
			$mm=substr($getdate,4,2);
			$dd=substr($getdate,6,2);
			if ((strlen($mm)==2) && (substr($mm,0,1)=="0")){$mm=str_replace("0","",$mm);}
			$lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
			$dayname=array('일','월','화','수','목','금','토');// 요일명 지정
			if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
			$total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
			for($i=0;$i<$mm-1;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
			$total++;// 그 달의 1일
			$sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)

		   ?>
		   <center>
		   <br>
		   <table border=1 <?php echo $widthstring;?>>
			  <tr bgcolor=<?php echo seecolor(1,'small');?>>
				 <?php // 년 - 월 출력
				 for($i=0;$i<7;$i++){ // 요일명 출력
					if($i==0) echo("<td align='center' width='$pok'><font color=red><b>$dayname[$i]</font></td>\n");
					else if($i==6) echo("<td align='center' width='$pok'><font color=blue><b>$dayname[$i]</b></font></td>\n");
					else echo("<td align='center' width='$pok'><font color=gray><b>$dayname[$i]</td>\n");
				 }
				 echo("</tr>\n<tr>");
						// 처음부터 시작 요일값까진 공백처리
				 if ($sday>0){
					$priormm=$mm-1;
					if ($priormm<1){
					   $prioryy=$yy-1;$priormm=12;
					}else{
					   $prioryy=$yy;
					   $priormm=$mm-1;
					}
					$xxx=0;
					for ($i=$lastday[$priormm-1]-($sday-1);$i<=$lastday[$priormm-1];$i++){
					   $xxx=$xxx+1;
					   if (strlen($priormm)==1){$priormm='0'.$priormm;}
					   if (strlen($i)==1){$i='0'.$i;}
					   $objectdate=$prioryy.$priormm.$i;
					   ?>
					   <td align='right' valign='top' width='<?php echo$pok;?>' height='<?php echo $nop;?>'  bgcolor=eeeeee>
						  <font color=gray><?php echo$i;?></font>

					   </td>
					   <?php
					}
				 }
				 unset($xxx);
				 $c=$sday;// 임시변수는 시작 요일값으로 지정
				 for($i=1;$i<=$lastday[$mm-1];$i++) { // 1부터 해당 월의 마지막 날까지 반복
					$c++;// 임시 변수 증가
					$chk=$c%7;
					if (strlen($mm)==1){$mm='0'.$mm;}
					if (strlen($i)==1){$i='0'.$i;}
					$objectdate=$yy.$mm.$i;
					if($chk==1){ //일요일
						?>
					    <td align='right' valign='top' width='<?php echo$pok;?>' height='<?php echo $nop;?>' <?php if ($objectdate==$todaydate) {?> bgcolor="mistyrose" <?php }elseif($objectdate==$getdate){?> bgcolor=yellow <?php } ?>>
                        
						<?php $funcname($objectdate);?>
                      
						</td>
						<?php

					}
					elseif(!$chk){    //토요일
					     ?>
					     <td align='right' valign='top' width='<?php echo$pok;?>' height='<?php echo $nop;?>' <?php if ($objectdate==$todaydate) {?> bgcolor="mistyrose" <?php }elseif($objectdate==$getdate){?> bgcolor=yellow <?php } ?>>
						 <?php $funcname($objectdate);?>
					     </td>
					<?php
					}else{    //중간
					     ?>
					     <td align='right' valign='top' width='<?php echo$pok;?>' height='<?php echo $nop;?>' <?php if ($objectdate==$todaydate) {?> bgcolor="salmon" <?php }elseif($objectdate==$getdate){?> bgcolor=yellow <?php } ?>>
						 <?php $funcname($objectdate);?>
  						 </td>
						 <?php
					}
					if(!$chk&&$i!=$lastday[$mm-1]){
					   echo("</tr>\n<tr>");// 7로 나눠 떨어지면 다음줄로 (토요일마다 다음줄)
					   $daysum=0;
					}else{ $daysum++;}
				 }
				 $j=0;
				 for($i=$daysum;$i<7;$i++){
					$nextmm=$mm+1;
					if ($nextmm>12){
					   $nextmm='1';$nextyy=$yy+1;
					}else{
					   $nextyy=$yy;
					}
					$j=$j+1;
					if (strlen($nextmm)==1){$nextmm='0'.$nextmm;}
					if (strlen($j)==1){$j='0'.$j;}
					$objectdate=$nextyy.$nextmm.$j;
					?>
					<td height='<?php echo $nop;?>' class='w' align=right valign=top bgcolor=eeeeee>
					   <font color=gray>
					   <?php
					   echo$j;
					   ?>
					   </font>
					</td>
					<?php
				 }
			  ?>
			  </tr>
		   </table>
		   <br>

		   <?php

}	
	

function nextday($getdate){
	$xxdate="";		
	if( (isset($getdate)) && ($getdate>0) ){
		$yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);$dd=$dd+1;
		$lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
		if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
		if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산

		if($mm<1){$mm=1;}

		
		if ($dd>$lastday[$mm-1]){
			$dd='01';$mm=$mm+1;
			if ($mm>12){
				$yy=$yy+1;$mm='01';
			}
			if (strlen($mm)==1){
				$mm='0'.$mm;
			}
			if (strlen($dd)==1){
				$dd='0'.$dd;
			}
			$xxdate=$yy.$mm.$dd;
			return $xxdate;
		}
		else{
			if (strlen($mm)==1){
				$mm='0'.$mm;
			}
			if (strlen($dd)==1){
				$dd='0'.$dd;
			}
			$xxdate=$yy.$mm.$dd;
			return $xxdate;
		}
	}else{
	    echo "N";	
	}
}

function beforeday($getdate){
	$xxdate="";
	if( (isset($getdate)) && ($getdate>0) ){	
		$yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
		$dd=$dd-1;
		$lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
		if ((strlen($mm)==2)&& (substr($mm,0,1)=="0")){$mm=str_replace("0","",$mm);}
		if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
		if ($dd<1){
			$mm=$mm-1;
			if ($mm<1){
				$yy=$yy-1;$mm='12';
			}
			if (strlen($mm)==1){
				$mm='0'.$mm;
			}		
			$dd=$lastday[$mm-1];
			if (strlen($dd)==1){
				$dd='0'.$dd;
			}
			$xxdate=$yy.$mm.$dd;
			return $xxdate;

		}else{
			if (strlen($mm)==1){
				$mm='0'.$mm;
			}
			if (strlen($dd)==1){
				$dd='0'.$dd;
			}
			$xxdate=$yy.$mm.$dd;
			return $xxdate;
		}
	}else{
		echo "n";
	}
}
function nextmonth($getdate){
    $xxdate="";
         $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);$mm=$mm+1;
         $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
         if ((strlen($mm)==2)&& (substr($mm,0,1)=="0")){$mm=str_replace("0","",$mm);}
         if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
         if ($mm>12){$yy=$yy+1;$mm='1';} if ($dd>$lastday[$mm-1]){$dd=$lastday[$mm-1];}
         if (strlen($mm)==1){$mm='0'.$mm;}
         if (strlen($dd)==1){$dd='0'.$dd;}
         $xxdate=$yy.$mm.$dd;
		 return $xxdate;
}
function beforemonth($getdate){
        $xxdate="";
                $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);$mm=$mm-1;
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                if ($dd>$lastday[$mm]){$dd=$lastday[$mm];}
                if ($mm<1){$yy=$yy-1;$mm='12';}
                if (strlen($mm)==1){$mm='0'.$mm;}
                if (strlen($dd)==1){$dd='0'.$dd;}
                $xxdate=$yy.$mm.$dd;
		return $xxdate;
}
function rightmonth($getdate){
	$xxdate="";
        $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
        $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
        if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
        if ((strlen($dd)==2)&& (substr($dd,0,1)=='0')){$dd=str_replace('0','',$dd);}
        if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
        if ($dd>$lastday[$mm-1]){$dd=$lastday[$mm-1];}
        if (strlen($mm)==1){$mm='0'.$mm;}
        if (strlen($dd)==1){$dd='0'.$dd;}
        $xxdate=$yy.$mm.$dd;
        return $xxdate;
}

function monthfirst($getdate){//그달의 첫일을 구함
	$xxdate="";
         $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
         $xxdate=$yy.$mm."01";return $xxdate;
}
function monthlast($getdate){//그달의 말일울 구함
	$xxdate="";
         $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
         $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
         if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
         if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
         $dd=$lastday[$mm-1];
         if (strlen($mm)==1){$mm='0'.$mm;}
         if (strlen($dd)==1){$dd='0'.$dd;}
         $xxdate=$yy.$mm.$dd;return $xxdate;
}
function monthlastday($getdate){//그달의 말일울 구함
	$xxdate="";
         $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);
         $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
         if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
         if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
         $dd=$lastday[$mm-1];

         if (strlen($dd)==1){$dd='0'.$dd;}
         $xxday=$dd;return $xxday;
}
function yearfirst($getdate){//그달의 첫일을 구함
	$xxdate="";
    $yy=substr($getdate,0,4);
       //  $yy=$yy-1;
    $xxdate=$yy.'01'.'01';
	return $xxdate;
}
function yearlast($getdate){//그달의 말일울 구함
	$xxdate="";
    $yy=substr($getdate,0,4);
        // $yy=$yy-1;
    $xxdate=$yy.'12'.'31';
	return $xxdate;
}
function nextyear($getdate){
    $xxdate="";
         $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);$yy=$yy+1;
         $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
         if ((strlen($mm)==2)&& (substr($mm,0,1)=="0")){$mm=str_replace('0','',$mm);}
         if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
         if ($dd>$lastday[$mm-1]){$dd=$lastday[$mm-1];}
         if (strlen($mm)==1){$mm='0'.$mm;}
         if (strlen($dd)==1){$dd='0'.$dd;}
         $xxdate=$yy.$mm.$dd;
		 return $xxdate;
}
function beforeyear($getdate){
    $xxdate="";
                $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);$yy=$yy-1;
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                if ($dd>$lastday[$mm-1]){$dd=$lastday[$mm-1];}
                if (strlen($mm)==1){$mm='0'.$mm;}
                if (strlen($dd)==1){$dd='0'.$dd;}
                $xxdate=$yy.$mm.$dd;return $xxdate;
}
function thisyearonly($getdate){
    $xxdate="";
         $xxyear=substr($getdate,0,4);
         return $xxyear;
}

function nextyearonly($getdate){
    $xxdate="";
         $yy=substr($getdate,0,4);
         $xxyear=$yy+1;
         return $xxyear;
}
function beforeyearonly($getdate){
    $xxdate="";
         $yy=substr($getdate,0,4);
         $xxyear=$yy-1;
         return $xxyear;
}
function weekstart($getdate){
	$xxdate="";
                $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
                if ((strlen($dd)==2)&& (substr($dd,0,1)=='0')){$dd=str_replace('0','',$dd);}
                if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
                $total=$total+$dd;
                $sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
                $weekday=$dd-$sday;
                if ($weekday<1){
                           $priormm=$mm-1;
                           if ($priormm<1){
                                        $yy=$yy-1;$priormm=12;
                           }
                           $weekday=$sday-$dd;
                           $firstweekday=$lastday[$priormm-1]-$weekday;
                           $weekday=$firstweekday;
                           $mm=$priormm;
                }
                if (strlen($weekday)==1){$weekday='0'.$weekday;}
                if (strlen($mm)==1){$mm='0'.$mm;}
                $xxdate=$yy.$mm.$weekday;

                return $xxdate;
}
function weeklast($getdate){
    $xxdate="";
                $yy=substr($getdate,0,4);$mm=substr($getdate,4,2);$dd=substr($getdate,6,2);
                if ((strlen($dd)==2)&& (substr($dd,0,1)=='0')){$dd=str_replace('0','',$dd);}
                if ((strlen($mm)==2)&& (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
                $total=$total+$dd;// 그 달의 1일
                $sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
                $weekday=$dd+(7-$sday);
                if ($weekday>$lastday[$mm-1]){
                           $nextmm=$mm+1;
                           if ($nextmm>12){
                                        $yy=$yy+1;$nextmm=1;
                           }
                           $weekday=$weekday-$lastday[$mm-1];

                           $mm=$nextmm;
                }
                if (strlen($weekday)==1){$weekday='0'.$weekday;}
                if (strlen($mm)==1){$mm='0'.$mm;}
                $xxdate=$yy.$mm.$weekday;
                return $xxdate;
}

function effectdateornot($getdate){
   $gongarray=gongdate($getdate);
   if( (satsunornot($getdate)) || (in_array($getdate,$gongarray))  ){
      return false;
   }else{
      return true;
   }
}

function effectdate($getdate){
	///// 효과일을 얻는것.... 말하자면 토요일,일요일 공휴일을 다 건너뛰고 그다음 유효일을 구함 
   $gongarray=gongdate($getdate);
   $x=true;
   while($x){
      if( (satsunornot($getdate)) || (in_array($getdate,$gongarray))  ){
         $getdate=nextday($getdate);
      }else{
         $x=false;
      }
   }
   return $getdate;
}

function sunornot($getdate){

                $yy=substr($getdate,0,4);
                $mm=substr($getdate,4,2);
                $dd=substr($getdate,6,2);
                if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                $dayname=array('일','월','화','수','목','금','토');// 요일명 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
                $total=$total+$dd;// 그 달의 1일
                $sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
                if( $sday==0 ){
                    return true;
                }else{
                    return false;
                }
             //  return $dayname[$sday];
}


function satsunornot($getdate){
                $yy=substr($getdate,0,4);
                $mm=substr($getdate,4,2);
                $dd=substr($getdate,6,2);
                if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                $dayname=array('일','월','화','수','목','금','토');// 요일명 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
                $total=$total+$dd;// 그 달의 1일
                $sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
                if( ($sday==0) || ($sday==6) ){
                    return true;
                }else{
                    return false;
                }
             //  return $dayname[$sday];
}

function obtainyoil($getdate){
	
	if( (isset($getdate))  &&  ($getdate>0)  ){
	
		$yy=substr($getdate,0,4);
		$mm=substr($getdate,4,2);
		$dd=substr($getdate,6,2);
		
		if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
		$lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
		$dayname=array('일','월','화','수','목','금','토');// 요일명 지정
		
		if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
		$total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
		
		for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
		$total=$total+$dd;// 그 달의 1일
		$sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
		return $sday;
	}else{
	    return "obtainyoilerror";	
	}
             //  return $dayname[$sday];
}
function yoil($getdate,$type=2){
                $yy=substr($getdate,0,4);
                $mm=substr($getdate,4,2);
                $dd=substr($getdate,6,2);
                if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                $dayname=array('일','월','화','수','목','금','토');// 요일명 지정
                $dayhan=array('日','月','火','水','木','金','土');// 요일명 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
                $total=$total+$dd;// 그 달의 1일

                $sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
                if ($type==1){
                     return $sday;
                }
                elseif ($type==2){
                     return $dayname[$sday];
                }
                elseif ($type==3){
                     return $dayhan[$sday];
                }
                elseif ($type==4){
                     return $dayhan[$sday].'요일';
                }
}

function whatndweek($getdate){
                $yy=substr($getdate,0,4);
                $mm=substr($getdate,4,2);
                $dd=substr($getdate,6,2);
                if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                $dayname=array('일','월','화','수','목','금','토');// 요일명 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
               // $total++;// 현재날짜의 총수;
                $sday=$total%7;// 시작 요일을 구함 (0-일요일,...,6-토요일)
                $dd=$dd+$sday;
                $whatnd=(int)($dd/7);
            //    $whatsday=$dd%7;
            //    $xx=$whatnd.'_'.$whatsday; // whatnd는 몇번째주 $whatsday 는 몇째일
                $whatnd++;
                return $whatnd;
}

function getdatebyweek($yymm,$whatndweek,$sday){ //몇째주  몇일로부터 날짜를 구함
// $whatndweek 첫주일경우 0부터
//$sday 월요일부터 1부터 토요일까지 7
                $yy=substr($yymm,0,4);
                $mm=substr($yymm,4,2);
                if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
                $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
                $dayname=array('일','월','화','수','목','금','토');// 요일명 지정
                if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
                $total=($yy-1)*365+(int)(($yy-1)/4) - (int)(($yy-1)/100) + (int)(($yy-1)/400); // 전해까지 평년 기준으로 날짜수 계산 및 윤년의 횟수를 더함
                for($i=0,$endsu=$mm-1;$i<$endsu;$i++) $total+=$lastday[$i];// 전달까지의 날짜수 더함
                $total++;// 현재날짜의 총수;

                $startday=$total%7;
                echo $startday;
                $dd=$whatndweek*7+$sday-$startday;

                if ($whatndweek==0){
                        if ($sday<=$startday){
                              return false;
                              exit;
                        }
                }
                if ($dd>lastday($mm+1)){return false;exit;}


                if (strlen($mm)==1){$mm='0'.$mm;}if (strlen($dd)==1){$dd='0'.$dd;}
                $getdate=$yy.$mm.$dd;
                return $getdate;
}


function sunlunar_data() {
return '1212122322121-1212121221220-1121121222120-2112132122122-2112112121220-2121211212120-2212321121212-2122121121210-2122121212120-1232122121212-1212121221220-1121123221222-1121121212220-1212112121220-2121231212121-2221211212120-1221212121210-2123221212121-2121212212120-1211212232212-1211212122210-2121121212220-1212132112212-2212112112210-2212211212120-1221412121212-1212122121210-2112212122120-1231212122212-1211212122210-2121123122122-2121121122120-2212112112120-2212231212112-2122121212120-1212122121210-2132122122121-2112121222120-1211212322122-1211211221220-2121121121220-2122132112122-1221212121120-2121221212110-2122321221212-1121212212210-2112121221220-1231211221222-1211211212220-1221123121221-2221121121210-2221212112120-1221241212112-1212212212120-1121212212210-2114121212221-2112112122210-2211211412212-2211211212120-2212121121210-2212214112121-2122122121120-1212122122120-1121412122122-1121121222120-2112112122120-2231211212122-2121211212120-2212121321212-2122121121210-2122121212120-1212142121212-1211221221220-1121121221220-2114112121222-1212112121220-2121211232122-1221211212120-1221212121210-2121223212121-2121212212120-1211212212210-2121321212221-2121121212220-1212112112210-2223211211221-2212211212120-1221212321212-1212122121210-2112212122120-1211232122212-1211212122210-2121121122210-2212312112212-2212112112120-2212121232112-2122121212110-2212122121210-2112124122121-2112121221220-1211211221220-2121321122122-2121121121220-2122112112322-1221212112120-1221221212110-2122123221212-1121212212210-2112121221220-1211231212222-1211211212220-1221121121220-1223212112121-2221212112120-1221221232112-1212212122120-1121212212210-2112132212221-2112112122210-2211211212210-2221321121212-2212121121210-2212212112120-1232212122112-1212122122120-1121212322122-1121121222120-2112112122120-2211231212122-2121211212120-2122121121210-2124212112121-2122121212120-1212121223212-1211212221220-1121121221220-2112132121222-1212112121220-2121211212120-2122321121212-1221212121210-2121221212120-1232121221212-1211212212210-2121123212221-2121121212220-1212112112220-1221231211221-2212211211220-1212212121210-2123212212121-2112122122120-1211212322212-1211212122210-2121121122120-2212114112122-2212112112120-2212121211210-2212232121211-2122122121210-2112122122120-1231212122212-1211211221220-2121121321222-2121121121220-2122112112120-2122141211212-1221221212110-2121221221210-2114121221221';
}

function lun2sol($yyyymmdd) {
	$getYEAR = (int)substr($yyyymmdd,0,4);
	$getMONTH = (int)substr($yyyymmdd,4,2);
	$getDAY = (int)substr($yyyymmdd,6,2);
    $gf_yun=0;
	$arrayDATASTR = sunlunar_data();
	$arrayDATA = explode('-',$arrayDATASTR);

	$arrayLDAYSTR='31-0-31-30-31-30-31-31-30-31-30-31';
	$arrayLDAY = explode('-',$arrayLDAYSTR);

	$arrayYUKSTR='갑-을-병-정-무-기-경-신-임-계';
	$arrayYUK = explode('-',$arrayYUKSTR);

	$arrayGAPSTR='자-축-인-묘-진-사-오-미-신-유-술-해';
	$arrayGAP = explode('-',$arrayGAPSTR);

	$arrayDDISTR='쥐-소-호랑이-토끼-용-뱀-말-양-원숭이-닭-개-돼지';
	$arrayDDI = explode('-',$arrayDDISTR);

	$arrayWEEKSTR='일-월-화-수-목-금-토';
	$arrayWEEK = explode("-",$arrayWEEKSTR);

	if ($getYEAR <= 1881 || $getYEAR >= 2050) { //년수가 해당일자를 넘는 경우
	$YunMonthFlag = 0;
	return false; //년도 범위가 벗어남..
	}
	if ($getMONTH > 12) { // 달수가 13이 넘는 경우
	$YunMonthFlag = 0;
	return false; //달수 범위가 벗어남..
	}
	$m1 = $getYEAR - 1881;
	if (substr($arrayDATA[$m1],12,1) == 0) { // 윤달이 없는 해임
	$YunMonthFlag = 0;
	} else {
	if (substr($arrayDATA[$m1],$getMONTH, 1) > 2) {
	$YunMonthFlag = 1;
	} else {
	$YunMonthFlag = 0;
	}
	}
	//-------------
	$m1 = -1;
	$td = 0;

	if ($getYEAR > 1881 && $getYEAR < 2050) {
	$m1 = $getYEAR - 1882;
	for ($i=0;$i<=$m1;$i++) {
	for ($j=0;$j<=12;$j++) {
	$td = $td + (substr($arrayDATA[$i],$j,1));
	}
	if (substr($arrayDATA[$i],12,1) == 0) {
	$td = $td + 336;
	} else {
	$td = $td + 362;
	}
	}
	} else {
	$gf_lun2sol = 0;
	}

	$m1++;
	$n2 = $getMONTH - 1;
	$m2 = -1;

	while(1) {
	$m2++;
	if (substr($arrayDATA[$m1], $m2, 1) > 2) {
	$td = $td + 26 + (substr($arrayDATA[$m1], $m2, 1));
	$n2++;
	} else {
	if ($m2 == $n2) {
	if ($gf_yun) {
	$td = $td + 28 + (substr($arrayDATA[$m1], $m2, 1));
	}
	break;
	} else {
	$td = $td + 28 + (substr($arrayDATA[$m1], $m2, 1));
	}
	}
	}

	$td = $td + $getDAY + 29;
	$m1 = 1880;
	while(1) {
	$m1++;
	if ($m1 % 400 == 0 || $m1 % 100 != 0 && $m1 % 4 == 0) {
	$leap = 1;
	} else {
	$leap = 0;
	}

	if ($leap == 1) {
	$m2 = 366;
	} else {
	$m2 = 365;
	}

	if ($td < $m2) break;

	$td = $td - $m2;
	}
	$syear = $m1;
	$arrayLDAY[1] = $m2 - 337;

	$m1 = 0;

	while(1) {
	$m1++;
	if ($td <= $arrayLDAY[$m1-1]) {
	break;
	}
	$td = $td - $arrayLDAY[$m1-1];
	}
	$smonth = $m1;
	$sday = $td;
	$y = $syear - 1;
	$td = intval($y*365) + intval($y/4) - intval($y/100) + intval($y/400);

	if ($syear % 400 == 0 || $syear % 100 != 0 && $syear % 4 == 0) {
	$leap = 1;
	} else {
	$leap = 0;
	}

	if ($leap == 1) {
	$arrayLDAY[1] = 29;
	} else {
	$arrayLDAY[1] = 28;
	}
	for ($i=0;$i<=$smonth-2;$i++) {
	$td = $td + $arrayLDAY[$i];
	}
	$td = $td + $sday;
	$w = $td % 7;

	$sweek = $arrayWEEK[$w];
	$gf_lun2sol = 1;

	return($syear."|".$smonth."|".$sday."|".$sweek);
}
function todaydate(){
	return date("Ymd");
}

function deletelastcomma($string){
      $string=trim($string);
      while ( substr($string,-1)==',') {
            $string=substr($string,0,strlen($string)-1);
      }
      return $string;
}
function deletefirstcomma($string){
      $string=trim($string);
      while ( substr($string,0,1)==',') {
            $string=substr($string,1,strlen($string));
      }
      return $string;
}
function deletebothcomma($string){
      $string=str_replace(' ','',$string);
      $string=trim($string);

      while ( substr($string,-1)==',') {
            $string=substr($string,0,strlen($string)-1);
      }
      while ( substr($string,0,1)==',') {
            $string=substr($string,1,strlen($string));
      }
      return $string;
}
function totalbycomma($string){   //comma로 구분된 것의 충수
      $string=deletebothcomma($string);
      $stringarray=explode(',',$string);
      return count($stringarray);
}
function firstofcomma($string){   //comma로 구분된 것의 충수
      $string=deletebothcomma($string);
      $stringarray=explode(',',$string);
      return array_shift($stringarray);
}


function autolink($contents) {
       $pattern = "/(http|https|ftp|mms):\/\/[0-9a-z-]+(\.[_0-9a-z-]+)+(:[0-9]{2,4})?\/?";       // domain+port
       $pattern .= "([\.~_0-9a-z-]+\/?)*";                                                                                                                                                                                             // sub roots
       $pattern .= "(\S+\.[_0-9a-z]+)?"       ;                                                                                                                                                                                                    // file & extension string
       $pattern .= "(\?[_0-9a-z#%&=\-\+]+)*/i";                                                                                                                                                                               // parameters
       $replacement = "<a href=\"\\0\" target=\"_blank\">\\0</a>";
       return preg_replace($pattern, $replacement, $contents, -1);

}


function makefform(){
  ?>
  <br>
  <center>
     <form name=makefform method=post action='<?php echo $_SERVER['SCRIPT_NAME'];?>?a=mastermakef' style='margin-bottom:0;margin-top:0'>
     <table border=0 cellspacing=0 cellpadding=0><tr><td>
      **파일내용을 넣으세요.!!
     </td></tr>
     <tr><td>
     파일이름<input type=text name=filename size=100 value=''>
     </td>
     </tr>

     <tr><td>
     <textarea name=query rows=10 cols=110></textarea
     </td>
     <td><input type=submit name=submitbutton value='입력'></td>
     </tr>

     </table>
     </form>
  </center>
  <?php
}
function makef($filename,$query){
global $dbname,$connection;
global $int_dir;

$query=stripslashes($query);
dbconnection();
$fn=fopen($filename,'w');
fwrite($fn,$query);
fclose($fn);
?>
저장완료
<?php
   exit;
}
function obtainfirststring($whole,$xstring){
    $aa=strstr($whole,$xstring);
    $aalength=strlen($aa);
    $aa=substr($whole,0,strlen($whole)-$aalength);
    return $aa;
}

function obtainstring($whole,$xstring,$ystring){
    $aa=strstr($whole,$xstring);
    $bb=strstr($aa,$ystring);
    return substr($aa,strlen($xstring),strlen($aa)-strlen($xstring)-strlen($bb));
}
function obtainlaststring($whole,$xstring){
    $aa=strstr($whole,$xstring);
    $aa=str_replace($xstring,'',$aa);
    return $aa;
}
function basicbuttonstyle($fontsize,$fontcolor,$fontweight,$buttonsize,$backgroundcolor,$mouseovercolor,$mouseoutcolor){
?> style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;font-weight:<?php echo$fontweight;?>;color:<?php echo$fontcolor;?>; background-color:<?php echo$backgroundcolor;?>;background-border:1;border-color:ivory; border-style:solid; width:<?php echo$buttonsize;?>; padding:3px;cursor:hand;'  onmouseover="this.style.backgroundColor='<?php echo$mouseovercolor;?>'"  onmouseout="this.style.backgroundColor='<?php echo$mouseoutcolor;?>'" <?php
}

function cutstring_utf8($str, $len,$tail='') {
	if(strlen(trim($str))>$len){
	    return mb_substr($str,0, $len, "utf-8").' '.$tail;
    }else{
	    return mb_substr($str,0, $len, "utf-8");
    }	

}
function shortstring($string,$length,$other="..") {
	    
        $stringlength = strlen($string);
        $effectlength = $length - strlen($other);
        if ( $stringlength < $length )return $string;
        for ($i = 0; $i <= $effectlength; $i++) {
                $laststring = substr($string, $i, 1);
                if ( ord($laststring) > 127 ) $i++;
        }
        $objectstring = substr($string, 0, $i);
        return $objectstring .= $other;
}

function cutstring($string,$len) {
	if(strlen(trim($string))>$len){
	    return mb_substr($string,0, $len, "utf-8").'..';
    }else{
	    return mb_substr($string,0, $len, "utf-8");
    }	
}

function cutwordstring($string,$length,$kind,$other){
         $tok=strtok($string,' ');
         $stringarray=array();
         while($tok){
                //    $word=$word." ".$tok;
                if (strlen($word.' '.$tok)>$length){
                     $stringarray[]=$word;
                     $word=$tok;
                }else{
                     $word=$word.' '.$tok;
                }
                $tok=strtok(' ');
         }
         if (strlen(trim($word))>0){
              $stringarray[]=$word;
         }
         if ($kind==1){
                $string=$stringarray[0].$other;
         }
         elseif ($kind==2){
                $string=implode($other,$stringarray);
         }
         return $string;
}

function brstring($string,$length){
global $resultstring;
      $wordarray=array();
      if (!   (eregi('<br>',$string)  )  ){
             if (  strlen($string)<$length   ){
                     $resultstring=$string;
             }else{
                     $tok=strtok($string,' ');
                     while($tok){
                               $stringword=$stringword.' '.$tok;
                               $bstringword=str_replace($tok,'',$stringword);
                               if (   strlen($stringword) > $length    ){
                                         $wordarray[]=$bstringword;
                                         $stringword=$tok;
                               }else{
                               }
                               $tok=strtok(' ');
                     }
             }
             $endsu=count($wordarray);
             for ($cs=0;$cs<$endsu;$cs++){
                     if ($cs==($endsu-1)){
                               $totalsangho.=$wordarray[$cs];
                     }else{
                               $totalsangho.=$wordarray[$cs].'<br>';
                     }
                 //    echo $wordarray[$cs];
             }
             $totalsangho.='<br>'.$stringword;
             $resultstring=$totalsangho;
             $totalsangho='';
             $string='';
             $stringword='';
             unset($wordarray);
      }else{
             $resultstring=$string;
      }
      return $resultstring;
}

function colorstring($backcolor,$fontcolor,$string){
	?><font color='<?php echo$fontcolor;?>' style='background-color:<?php echo$backcolor;?>;padding:1;padding-top:2;'><b><?php echo$string;?></b></font><?php
}
function fontcolor($string,$backcolor,$fontcolor,$boldornot=1){
   if($boldornot==1){
      ?>
      <font color=<?php echo $fontcolor;?> style='background-color: <?php echo$backcolor;?>;padding:3px;'><b><?php echo$string;?></b></font>
      <?php
   }else{
      ?>
      <font color=<?php echo $fontcolor;?> style='background-color: <?php echo$backcolor;?>;padding:3px;'><?php echo$string;?></font>
      <?php
   }
}

function banfont($string,$banornot,$backcolor){
   $paddingup=2;
   if($banornot==1){

      ?>

      <span style="background-color:<?php echo$backcolor;?>;margin:3;padding:2;padding-top:<?php echo$paddingup;?>;"><font style="font-size:9pt;color:white"><b><?php echo$string;?></b></font>
      <?php
   }else{
      ?>
      <span style="background-color:white;margin:3;padding:2;padding-top:<?php echo$paddingup;?>;"><font style="font-size:9pt;"><?php echo$string;?></font>
      <?php
   }
}

function cpage($xid,$searchkey,$postvar,$varstring,$addstring=""){//$varstring는 일반적인 면수..

	//cpage("ff",$searchkey,"&fornot=$fornot&aor=$aor&ob=&ob","&totalsu=$totalsu&list_num=$list_num","");

    parse_str($postvar);
	parse_str($varstring);
	
	$postvararray=makemyarray($postvar);
	
    if(isset($_POST['page'])){$page=$_POST['page'];}
	if(!isset($page)){$page=1;}
	//$postvararray=makemyarray($postvar);
	
    if(!isset($aor)){$aor=2;}
	if(!isset($totalsu)){$totalsu=0;}
	
	if(isset($_REQUEST['a'])){$action=$_REQUEST['a'];}

    if($aor==1){
        $list_num=$totalsu;
        if($totalsu>500){
            $list_num=500;
        }
    }else{

	}
    if(   (!isset($list_num))   ||   ($list_num<1)  ){$list_num=10;}	
    if(   (!isset($link_num))   ||   ($link_num<1)  ){$link_num=10;}

    if(   (isset($totalsu))   &&   ($totalsu>0)   ){
		$start_list_num = ($page-1)*$list_num;                     // 화면에 보여줄 리스트의 첫 번호 입니다.
		$start_link_num = intval(($page-1)/$link_num)*$link_num+1;
		$total_page = intval(($totalsu-1)/$list_num)+1;

		?>
		<center>
		<table border=0 cellspacing=0 cellpadding=0>
		  <tr>
			  <?php
			  // 페이지 링크 첫 번호가 link_num보다 크면 prev 링크 생성
			  if ($start_link_num>$link_num) {
				$prev = $start_link_num - 1;
				?>
				<td>
				<form name='f1_<?php echo$xid;?><?php echo$prev;?>'  style='margin-bottom:0;margin-top:0'  method=post action='?a=<?php echo$action;?><?php if(  (isset($addstring))   &&   (strlen(trim($addstring))>0)  ){echo$addstring;}?>'>
				<input type=hidden name=searchkey value="<?php echo$searchkey;?>">
				<input type=hidden name=page value="<?php echo$prev;?>">
				<?php
				if($postvararray){
					foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					}
				}
				?>
				<input type=button name=prevbutton value='[prev]' onclick='f1_<?php echo$xid;?><?php echo$prev;?>.page.value=<?php echo$prev;?>;f1_<?php echo$xid;?><?php echo$prev;?>.submit();' style='font-family:gothic; color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				</form>
				</td>
				<?php
			  }
					// 페이지 링크 생성
			  $i = 0;
			  while (($i<$link_num)&&($start_link_num + $i<=$total_page)) {
				$page_link = $start_link_num + $i;
				?>
				<td>
				<?php
				if ($page_link==$page){
		    	    ?>
		 		    <form name='f1_<?php echo$xid;?><?php echo$page;?>'  style='margin-bottom:0;margin-top:0' method=post action='?a=<?php echo$action;?><?php if(  (isset($addstring))   &&   (strlen(trim($addstring))>0)  ){echo$addstring;}?>'>
				    <input type=hidden name=searchkey value="<?php echo$searchkey;?>">
				    <input type=hidden name=page value="<?php echo$page;?>">
				    <?php
				    if($postvararray){
					    foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					    }
				    }
				    ?>
				    <input type=button name='button_<?php echo$page;?>' value='[<?php echo$page;?>]' onclick='f1_<?php echo$xid;?><?php echo$page;?>.page.value=<?php echo$page;?>;f1_<?php echo$xid;?><?php echo$page;?>.submit();' style='font-family:font-weight:bold;gothic;color:red;background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				    </form>
				    <?php
				}else{
				    ?>
				    <form name='f1_<?php echo$xid;?><?php echo$page_link;?>'  style='margin-bottom:0;margin-top:0' method=post action='?a=<?php echo$action;?><?php if(  (isset($addstring))   &&   (strlen(trim($addstring))>0)  ){echo$addstring;}?>'>
				    <input type=hidden name=searchkey value="<?php echo$searchkey;?>">
				    <input type=hidden name=page value="<?php echo$page_link;?>">
				    <?php
				    if($postvararray){
					    foreach($postvararray as $key => $value ){
							?>
							<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
							<?php
					    }
				    }
				    ?>
				    <input type=button name='button_<?php echo$page_link;?>' value='<?php echo$page_link;?>' onclick='f1_<?php echo$xid;?><?php echo$page_link;?>.page.value=<?php echo$page_link;?>;f1_<?php echo$xid;?><?php echo$page_link;?>.submit();' style='font-family:gothic;color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				    </form>
				    <?php
				}
				?>
				</td>
				<?php
				$i++;
			  }
			  if ($page_link<$total_page) {
				$next = $page_link + 1;
				?>
				<td>
				<form name='f1_<?php echo$xid;?><?php echo$next;?>'  style='margin-bottom:0;margin-top:0' method=post action='?a=<?php echo$action;?><?php if(  (isset($addstring))   &&   (strlen(trim($addstring))>0)  ){echo$addstring;}?>'>
				<input type=hidden name=page value="<?php echo$next;?>">
				<input type=hidden name=searchkey value="<?php echo$searchkey;?>">
				<input type=button name=nextbutton value='[next]' onclick='f1_<?php echo$xid;?><?php echo$next;?>.page.value=<?php echo$next;?>;f1_<?php echo$xid;?><?php echo$next;?>.submit();' style='font-family:gothic; color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				<?php
				if($postvararray){
					  foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					  }
				}
				?>
				</form>
				</td>
				<?php
			  }
			?>
		  </tr>
		</table>
		</center>
		<?php
    }
}



function gakpage($xid,$postvar,$varstring,$addstring){//$varstring는 일반적인 면수..
    parse_str($postvar);
	parse_str($varstring);
	parse_str($addstring);
	
	//$postvararray=makemyarray($postvar);
	$postvararray=makemyarray($postvar);
	
    if(isset($_POST['gakpage'])){$gakpage=$_POST['gakpage'];}
	if(!isset($gakpage)){$gakpage=1;}
	
    if(!isset($aor)){$aor=2;}
	

    if($aor==1){
        $list_num=$totalsu;
        if($totalsu>500){
            $list_num=500;
        }
    }else{

	}
    if(!isset($list_num)){$list_num=10;}	
    if(!isset($link_num)){$link_num=10;}

    if(isset($totalsu)){
		$start_list_num = ($gakpage-1)*$list_num;                     // 화면에 보여줄 리스트의 첫 번호 입니다.
		$start_link_num = intval(($gakpage-1)/$link_num)*$link_num+1;
		$total_page = intval(($totalsu-1)/$list_num)+1;
		?>
		<center>
		<table border=0 cellspacing=0 cellpadding=0>
		<tr>
		    <?php
			  // 페이지 링크 첫 번호가 link_num보다 크면 prev 링크 생성
			if ($start_link_num>$link_num) {
				$prev = $start_link_num - 1;
				?>
				<td>
				<form name='f1_<?php echo$xid;?><?php echo$prev;?>'  style='margin-bottom:0;margin-top:0'  method=post action='?a=<?php echo$action;?><?php if(isset($addstring)){echo$addstring;}?>'>
				<input type=hidden name=gakpage value="<?php echo$prev;?>">
				
				<?php
				if($postvararray){
					foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					}
				}
				?>
				<input type=button name=prevbutton value='[prev]' onclick='f1_<?php echo$xid;?><?php echo$prev;?>.gakpage.value=<?php echo$prev;?>;f1_<?php echo$xid;?><?php echo$prev;?>.submit();' style='font-family:gothic; color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				</form>
				</td>
				<?php
			}
					// 페이지 링크 생성
			$i = 0;
			while (($i<$link_num)&&($start_link_num + $i<=$total_page)) {
				$page_link = $start_link_num + $i;
				?>
				<td>
				<?php
				if ($page_link==$gakpage){
				   ?>
				   <form name='f1_<?php echo$xid;?><?php echo$gakpage;?>'  style='margin-bottom:0;margin-top:0' method=post action='?a=<?php echo$action;?><?php if(isset($addstring)){echo$addstring;}?>'>
				   <input type=hidden name=gakpage value="<?php echo$gakpage;?>">
				   <?php
				   if($postvararray){
					  foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					  }
				   }
				   ?>
				   <input type=button name='button_<?php echo$gakpage;?>' value='[<?php echo$gakpage;?>]' onclick='f1_<?php echo$xid;?><?php echo$gakpage;?>.gakpage.value=<?php echo$gakpage;?>;f1_<?php echo$xid;?><?php echo$gakpage;?>.submit();' style='font-family:font-weight:bold;gothic;color:red;background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				   </form>
				   <?php
				}else{
				   ?>
				   <form name='f1_<?php echo$xid;?><?php echo$page_link;?>'  style='margin-bottom:0;margin-top:0' method=post action='?a=<?php echo$action;?><?php if(isset($addstring)){echo$addstring;}?>'>
				   <input type=hidden name=gakpage value="<?php echo$page_link;?>">
				   <?php
				   if($postvararray){
					  foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					  }
				   }
				   ?>
				   <input type=button name='button_<?php echo$page_link;?>' value='<?php echo$page_link;?>' onclick='f1_<?php echo$xid;?><?php echo$page_link;?>.gakpage.value=<?php echo$page_link;?>;f1_<?php echo$xid;?><?php echo$page_link;?>.submit();' style='font-family:gothic;color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				   </form>
				   <?php
				}
				?>
				</td>
				<?php
				$i++;
			}
			if ($page_link<$total_page) {
				$next = $page_link + 1;
				?>
				<td>
				<form name='f1_<?php echo$xid;?><?php echo$next;?>'  style='margin-bottom:0;margin-top:0' method=post action='?a=<?php echo$action;?><?php if(isset($addstring)){echo$addstring;}?>'>
				<input type=hidden name=gakpage value="<?php echo$next;?>">
				<input type=button name=nextbutton value='[next]' onclick='f1_<?php echo$xid;?><?php echo$next;?>.gakpage.value=<?php echo$next;?>;f1_<?php echo$xid;?><?php echo$next;?>.submit();' style='font-family:gothic; color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;width:;cursor:hand;'>
				<?php
				if($postvararray){
					foreach($postvararray as $key => $value ){
						?>
						<input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
						<?php
					}
				}
				?>
				</form>
				</td>
				<?php
			}
			?>
		</tr>
		</table>
		<?php
    }
}

function noidwarning($tablename,$idname,$idvalue,$gourl){
	global $connection,$dbname;
    if (strlen(trim($idname))>0){
        mysql_select_db($dbname, $connection) or die('데이터베이스 연결에 실패.....했습니다.(noid)');
        $dquery="select count(*) from $tablename where $idname='$idvalue'";
        $dresult = mysql_query($dquery,$connection);
        if ($dresult){
            $drow_num=mysql_fetch_row($dresult);
            if ($drow_num[0]<1){
                ?>
                <script>
                    window.alert('현재아이디의 정보는 삭제되었거나 더이상 존재하지 않습니다');
                    this.window.location.replace('<?php echo$gourl;?>');
                </script>
                <?php
            }
        }
    }
}

function deletedata($tablename,$wherestring,$gourl=''){
    global $connection,$dbname;
    dbconnection();
    if(strlen(trim($wherestring))>0){
        $query = "delete from $tablename where $wherestring";
    }else{
        $query = "delete from $tablename";
    }

    $result = $connection->query($query);
    if(strlen(trim($gourl))>0){
        ?>
        <script>
            window.alert('현재아이디의 정보는 삭제되었거나 더이상 존재하지 않습니다');
            this.window.location.replace('<?php echo$gourl;?>');
        </script>
        <?php
    }
    if ($result){
        return true;
    }else{
        return false;
    }
}
function deleteframe(){
    ?>
    <script>
        function ddata(a,b,c){
            if(confirm("정말 삭제하시겠습니까? 영원히 회복할 수 없습니다!!")){
                document.getElementById("delwindow").src="ddata.php?";
            }else{
                return false;
            }
        }
    </script>
    <iframe src="" id="delwindow" name="delanydata" width="0" height="0" frameborder="0"></iframe>
	<?php
}

function deletearraydata($tablename,$idname,$arrayvar,$gourl=''){
    global $connection,$dbname;
    dbconnection();
   
    print_r($arrayvar);
    foreach($arrayvar as $whatitem){
        if(strlen(trim($whatitem))>0){
            $query = "delete from $tablename where $idname='$whatitem'";
            $result = $connection->query($query);
        }
    }
    if(strlen(trim($gourl))>0){
        ?>
        <script>
            window.alert('삭제완료!!');
            this.window.location.replace('<?php echo$gourl;?>');
        </script>
        <?php
    }
    if ($result){
        return true;
    }else{
        return false;
    }
}
function fileform($filename,$taction,$addstring){
	global $pngupload;

    ?>
    <form name='form' action='<?php if(strlen(trim($filename))>0){echo$filename;}else{echo$_SERVER['SCRIPT_NAME'];}?>?a=<?php echo$taction;?><?php echo$addstring;?>' method='post' enctype='multipart/form-data' style='margin-bottom:0;margin-top:0' onsubmit='chfield();'>
    <table border=1 cellspacing=0 <?php echo collapse;?> bgcolor=eeeeee>
        <tr>
            <td bgcolor=eeeeee>
		        <img src="./icons/upload.png" border="0" width="20">파일올리기(<span class=kored><b>10M제한</b>)
		    </td>
        </tr>
        <tr>
            <td>
                <input type=file name=file1 size=50>
            </td>
            <td>
                <center>
				<input type=submit name=submitbutton value='확인' onclick='return check();' style='font-size:9pt;font-family:gothic;font-weight:bold;color:black;background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
				</center>
            </td>
        </tr>
    </table>
   </form>
<?php
}
function fileupform($formid,$afile,$baction,$cadd){
	global $pngupload;

	parse_str($cadd);
	if(!isset($baction)){
		$baction=$_REQUEST['a'];
	}
	if(strlen(trim($cadd))>0){
		if(substr($cadd,0,1)!="&"){
			$cadd="&".$cadd;
		}
	}
	?>
    <script language='javascript'>
    function nowcheck_<?php echo$formid;?>(){
        blank='';
        if(!form_<?php echo$formid;?>.file1.value) { alert  ('첨부된 파일이 없습니다!'); form_<?php echo$formid;?>.file1.focus(); return false; }
        form_<?php echo$formid;?>.submit();
    }
    </script>
    <script language='javascript'>
        var submitcount=0;
        function chfield_<?php echo$formid;?>(){
            if (submitcount==0){
                submitcount++;
                return true;
            }else{
                window.alert ('1회만입력허용!!');
                return false;
            }
        }
    </script>

    <form name='form_<?php echo$formid;?>' action='<?php if(strlen(trim($afile))>0){echo$afile;}else{echo basename($_SERVER['SCRIPT_NAME']);}?>?a=<?php echo$baction;?><?php echo$cadd;?>' method='post' enctype='multipart/form-data' style='margin-bottom:0;margin-top:0' onsubmit='chfield();'>
        <table border=1 cellspacing=0 style="border:1px solid green;">
            <tr>
            <td bgcolor=eeeeee><img src="./icons/upload.png" border="0" width="20">파일올리기(<b>10M제한</b>)</td>
            <td>
            <input type=file name=file1 size=50>
            </td>
            <td>
            <center><input type=button name=submitbutton value='확인' onclick='return nowcheck_<?php echo$formid;?>();' style='font-size:9pt;font-family:gothic;font-weight:bold;color:black;background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
            </td>
            </tr>
        </table>
    </form>
    <?php
}
function samefilename($dirname,$filename){
        $filefind=false;
		$dh  = opendir($dirname);
		
        while (false !== ($file = readdir($dh))) {
           if (  ($file!='.') && ($file!='..')  ){

              $extension = strrchr($file,'.');//마지막 점을 포함한 확장자
              $extensionleng=strlen($extension);/// 마지막점을 포함한 확장자길이
              $front=substr($file,0,-$extensionleng);//마지막점 앞쪽
              $ex=substr($extension,1);//점을 제외한 순수확장자를 소문자화함
              if(strlen(trim($filename))>0){
                 if ($front==$filename){
                     $targetfile=$file;
                     $filefind=true;
                 }
              }
           }
        }
        if($filefind==true){
           return $targetfile;
        }else{
           return false;
        }

}
function imagefile($filename,$string=''){
  if(strlen(trim($string))>0){
  ?><img src='./icons/<?php echo$filename;?>' title='<?php echo$string;?>' border=0><?php
  }else{
  ?><img src='./icons/<?php echo$filename;?>' border=0><?php
  }
}
function img($filename,$width=''){
  if(strlen(trim($width))>0){
  ?><img src='./icons/<?php echo$filename;?>' width='<?php echo$width;?>' border=0><?php
  }else{
  ?><img src='./icons/<?php echo$filename;?>' border=0><?php
  }
}

function lgoto($filename,$actionname,$addstring,$string){
    $addstring=trim($addstring);
	if(strlen(trim($addstring))>0){
		$firstalpha=substr($addstring,0,1);
		if($firstalpha!="&"){
			$addstring="&".$addstring;
		}	
	}
    if(strlen(trim($filename))>0){
        ?><a href='<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>'><?php echo$string;?></a><?php
    }else{
        ?><a href="<?php echo basename($_SERVER['SCRIPT_NAME']);?>?a=<?php echo$actionname;?><?php echo$addstring;?>"><?php echo$string;?></a><?php
    }
}

function wgoto($filename,$actionname,$addstring,$string,$varstring){
    parse_str($varstring);
    if(!isset($string)){$string='[<font color=red>√</font>]';}
    if(!isset($resizable)){$resizable='yes';}
    if(!isset($width)){$width=970;}
    if(!isset($height)){$height=500;}
    if(!isset($windowname)){$windowname='memowindow';}
    if(strlen(trim($filename))>0){
        ?>
        <a href='#' onClick="window.open('<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>','<?php echo$windowname;?>','scrollbars=yes,toolbar=no,resizable=<?php echo$resizable;?>,width=<?php echo$width;?>,height=<?php echo$height;?>,left=0,top=0'); return true"><?php echo$string;?></a>
        <?php
    }else{
        ?>
        <a href='#' onClick="window.open('<?php $SERVER['SCRIPT_NAME'];?>?a=<?php echo$actionname;?><?php echo$addstring;?>','<?php echo$windowname;?>','scrollbars=yes,toolbar=no,resizable=<?php echo$resizable;?>,width=<?php echo$width;?>,height=<?php echo$height;?>,left=0,top=0'); return true"><?php echo$string;?></a>
        <?php
    }
}
function rgoto($filename,$actionname,$addstring){
	$addstring=trim($addstring);
	if(substr($addstring,0,1)!="&"){
	    $addstring="&".$addstring;	
	}
    if(!$filename){$filename=basename($_SERVER['SCRIPT_NAME']);}	
    if(strlen(trim($actionname))<1){
       ?>
        <script>
             this.window.location.replace('<?php echo$filename;?>');
        </script>
        <?php
    }else{
		
       ?>
        <script>
             this.window.location.replace('<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>');
        </script>
        <?php
    }
}

function gotoself($url){

	?>
    <meta http-equiv="refresh" content="0;url='<?php echo$url;?>'">
    <?php
}
function selfreload(){
	?>
    <script>
        window.self.location.reload(true);
    </script>
	<?php
}
function openerreload(){
    ?>
    <script>
        window.opener.location.reload(true);
    </script>
    <?php
}
function openerreloadclose(){
    ?>
    <script>
        window.opener.location.reload(true);
        window.close();
    </script>
   <?php
}
function gotopage($page){
    ?>
        <script>
        this.window.location.replace('<?php echo$page;?>');
        </script>
    <?php
}

function titletable($title,$tablewidth=860){
    ?>
    <center>
    <table width=800 border=0 cellspacing=3 cellpadding=3 style='border-collapse:collapse;'>
        <tr>
        <td>
            <center>
            <b><?php echo$title;?></b>
            </center>
        </td>
        </tr>
    </table>
    </center>
    <?php
}
function dbmake($tablename){
    include('./dbset.php');
    $tablenamecommand="$tablename".'make';
    $tablenamecommand();

}
function searchkeymake($hangstring,$searchkey){
    $searchkey=str_replace("'",'',$searchkey);
    $searchkey=str_replace('  ',',',$searchkey);
    $searchkey=str_replace(' ',',',$searchkey);
    $searchkey=str_replace(',,',',',$searchkey);
    $searchkey=str_replace(',,',',',$searchkey);
    $searchkey=str_replace(',,',',',$searchkey);
    $searchkeyarray=explode(",",$searchkey);
    $xsearchkey='';
    $x=0;
    $hangstringarray=explode(',',$hangstring);
    for ($y=0;$y<count($hangstringarray);$y=$y+1){
        foreach ($searchkeyarray as $whatsearchkey){
            if (         $x==(count($searchkeyarray)-1)        ){
                $searchkey.="($whathangstring[$y] LIKE '%$whatsearchkey%')";
            }else{
                $searchkey.="($whathangstring[$y] LIKE '%$whatsearchkey%') and ";
            }
            $x=$x+1;
        }
    }
    echo $searchkey;
}

function schardeal($string){
    global $string;
    $string=str_replace('/','',$string);
    return $string;
}

function movefocus($nowform,$nowblank,$nextblank,$nowlength){
    ?>
    onKeyUp='if(document.<?php echo$nowform;?>.<?php echo$nowblank;?>.value.length==<?php echo$nowlength;?>){document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();}'
    <?php
}

function inserttoday($nowform,$fblank,$sblank,$tblank){
   $todaymonth=date('m');$todayyear=date('Y');$todayday=date('d');$todaymonth=sprintf('%02d',$todaymonth);
   ?>
   document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
   <?php
}
function inserttodayfocus($nowform,$fblank,$sblank,$tblank,$nextblank){
    global $todaymonth,$todayyear,$todayday;
    $todaymonth=date('m');$todayyear=date('Y');$todayday=date('d');$todaymonth=sprintf('%02d',$todaymonth);
    ?>
    document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
    document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
    <?php
}
function insertonemonth($nowform,$fblank,$sblank,$tblank,$nextblank){
    $todaydate=datekal(date('Ymd'),0,1,0);
    $todayyear=substr($todaydate,0,4);
    $todaymonth=substr($todaydate,4,2);
    $todayday=substr($todaydate,6,2);
    ?>
    document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
    document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
    <?php
}
function insertthreemonth($nowform,$fblank,$sblank,$tblank,$nextblank){
         $todaydate=datekal(date('Ymd'),0,3,0);
         $todayyear=substr($todaydate,0,4);
         $todaymonth=substr($todaydate,4,2);
         $todayday=substr($todaydate,6,2);
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function insertoneyear($nowform,$fblank,$sblank,$tblank,$nextblank){
         $todaydate=datekal(date('Ymd'),1,0,0);
         $todayyear=substr($todaydate,0,4);
         $todaymonth=substr($todaydate,4,2);
         $todayday=substr($todaydate,6,2);
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function insertonemonthb($nowform,$fblank,$sblank,$tblank,$nextblank){
         $todaydate=datekal(date('Ymd'),0,-1,0);
         $todayyear=substr($todaydate,0,4);
         $todaymonth=substr($todaydate,4,2);
         $todayday=substr($todaydate,6,2);
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function insertthreemonthb($nowform,$fblank,$sblank,$tblank,$nextblank){
         $todaydate=datekal(date('Ymd'),0,-3,0);
         $todayyear=substr($todaydate,0,4);
         $todaymonth=substr($todaydate,4,2);
         $todayday=substr($todaydate,6,2);
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function insertoneyearb($nowform,$fblank,$sblank,$tblank,$nextblank){
         $todaydate=datekal(date('Ymd'),-1,0,0);
         $todayyear=substr($todaydate,0,4);
         $todaymonth=substr($todaydate,4,2);
         $todayday=substr($todaydate,6,2);
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function inserttodayfocusindus($nowform,$fblank,$sblank,$tblank,$setblank,$nextblank,$induskind){
         global $todaymonth,$todayyear,$todayday;
         $todaymonth=date('m');$todayyear=date('Y');$todayday=date('d');$todaymonth=sprintf('%02d',$todaymonth);
         if ($induskind==2){
             $indusvalue=10;
         }
         elseif ($induskind==3){
              $indusvalue=20;
         }
         elseif ($induskind==4){
              $indusvalue=30;
         }
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='<?php echo$todayyear;?>';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='<?php echo$todaymonth;?>';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='<?php echo$todayday;?>';
         document.<?php echo$nowform;?>.<?php echo$setblank;?>.value=<?php echo$indusvalue;?>;
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function deletetoday($nowform,$fblank,$sblank,$tblank,$nextblank){
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='';
         document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();
         <?php
}
function deletesixtoday($nowform,$fblank,$sblank,$tblank,$xblank,$yblank,$zblank){
         ?>
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$sblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$tblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$xblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$yblank;?>.value='';document.<?php echo$nowform;?>.<?php echo$zblank;?>.value='';
         document.<?php echo$nowform;?>.<?php echo$fblank;?>.focus();
         <?php
}
function nwindow($page,$pagename,$scrollbars,$resizable,$width,$height,$left,$top,$windowname){
         ?>
           <a href='#' onClick="window.open('<?php echo $page;?>','<?php echo$pagename;?>','scrollbars=<?php echo$scrollbars;?>,resizable=<?php echo$resizableno;?>,width=<?php echo$width;?>,height=<?php echo$height;?>,left=<?php echo$left;?>,top=<?php echo$top;?>'); return true"><?php echo$windowname;?></a><br>

         <?php
}
function textpop(){
	?>
	<script>
	/*풍선 도움말*/
	var nav = (document.layers);
	var iex = (document.all);
	function popshow(msg,bak,width,titlemsg) {
			if(msg == "") return;
			var skn = document.all.topdecks;
			var content ="<TABLE width="+width+" BORDER=1 bordercolor=cccccc CELLPADDING=0 CELLSPACING=1 BGCOLOR=snow><TR><TD>"+
				 "<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0><TR align=center height=22><TD><B><font color=gray>"+titlemsg+"</B></TD></TR></TABLE>"+
				 "<TABLE  WIDTH=100% cellpadding=0 cellspacing=0 BGCOLOR="+bak+"><TR><TD style='padding:5;'><FONT COLOR=#000000>"+msg+"</FONT></TD></TR></TABLE></TD></TR></TABLE>";
	 
		skn.innerHTML = content;
		skn.style.display = "";
	}
	function get_mouse(e) {
		var skn = document.all.topdecks;
		var x = (nav) ? e.pageX : event.x+document.body.scrollLeft;
		var y = (nav) ? e.pageY : event.y+document.body.scrollTop;
		skn.style.left = x-0;
		skn.style.top  = y+20;
	}
	function killshow() {
			var skn = document.all.topdecks;
			skn.style.display = "none";
	}
	document.onmousemove = get_mouse;
	</script>	 
	<div id="topdecks" name="topdecks" style="position:absolute;display:none;">&nbsp;</div>
	<?php
}

function popsimple($string,$fornot=1){
    
    $r=`onMouseover="popshow('<?php echo $string;?>','<?php echo basiccolor($fornot);?>','500','');" onMouseout="killshow();"`;
    return $r;  
}

function sideoption(){
    ?>
    <script type='text/javascript'>
    var target;
    function insert(jucke) {
        target=jucke
		x = (document.layers) ? loc.pageX : event.x+document.body.scrollLeft;
		y = (document.layers) ? loc.pageY : event.y+document.body.scrollTop;
        document.all.div.style.left=x;   
        document.all.div.style.top=y;
        show_div()
        div.style.display='block'
    }
    var stime
    function doOver() {
        var el = window.event.srcElement;
        cal_Day = el.title;
        if (cal_Day.length > 7) {
            el.style.borderTopColor = el.style.borderLeftColor = 'buttonhighlight';
            el.style.borderRightColor = el.style.borderBottomColor = 'buttonshadow';
        }
        window.clearTimeout(stime);
    }
    function doOut() {
       stime=window.setTimeout("div.style.display='none';", 180);
    }
    function doClick(){
       var origina = document.choice;
   
       <?php
       if($kind==1){
       ?>
       document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].text;
       <?php
       }
       elseif($kind==2){
       ?>
       document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].value;
       <?php
       }
       ?>
    }

    function show_div(){
       document.all.div.innerHTML="<select name=choice size=20 style='width:100px;'  onmouseover='doOver();' onmouseout='doOut();' onclick='doClick();'><?php echo$sidestring;?></select>"
    }
    </script>
	<div id="div" name="div" style="position:absolute;display:none;">&nbsp;</div>
    <input type=button value='□'  OnClick="insert('this');" style='font-size:8pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:20; padding:0;'>
    <?php
}	
	
function sideinsert($formname,$varname,$sidestring,$width,$howlong,$kind=1){
    ?>
    <script type='text/javascript'>
    var target;
    function insert<?php echo$varname;?>(jucke) {
        target=jucke
		x = (document.layers) ? loc.pageX : event.x+document.body.scrollLeft;
		y = (document.layers) ? loc.pageY : event.y+document.body.scrollTop;
        document.all.<?php echo$varname;?>div.style.left=x;   
        document.all.<?php echo$varname;?>div.style.top=y;
        show_<?php echo$varname;?>div()
        <?php echo$varname;?>div.style.display='block'
    }
    var stime
    function doOver<?php echo$varname;?>() {
        var el = window.event.srcElement;
        cal_Day = el.title;
        if (cal_Day.length > 7) {
            el.style.borderTopColor = el.style.borderLeftColor = 'buttonhighlight';
            el.style.borderRightColor = el.style.borderBottomColor = 'buttonshadow';
        }
        window.clearTimeout(stime);
    }
    function doOut<?php echo$varname;?>() {
       stime=window.setTimeout("<?php echo$varname;?>div.style.display='none';", 180);
    }
    function doClick<?php echo$varname;?>(){
       var origina = document.<?php echo$formname;?>.<?php echo$varname;?>choice;
   
       <?php
       if($kind==1){
       ?>
       document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].text;
       <?php
       }
       elseif($kind==2){
       ?>
       document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].value;
       <?php
       }
       ?>
    }

    function show_<?php echo$varname;?>div(){
       document.all.<?php echo$varname;?>div.innerHTML="<select name=<?php echo$varname;?>choice size=<?php echo $howlong;?> style='width:<?php echo$width;?>px;'  onmouseover='doOver<?php echo$varname;?>();' onmouseout='doOut<?php echo$varname;?>();' onclick='doClick<?php echo$varname;?>();'><?php echo$sidestring;?></select>"
    }
    </script>
	<div id="<?php echo$varname;?>div" name="<?php echo$varname;?>div" style="position:absolute;display:none;">&nbsp;</div>
    <input type=button value='□'  OnClick="insert<?php echo$varname;?>('this');" style='font-size:8pt;font-family:gothic;color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:20; padding:0;'>
    <?php
}
function gosideinsert($formname,$varname,$sidestring,$width,$howlong,$kind=1){
    ?>
    <script type='text/javascript'>
    var target;
    function insert<?php echo$varname;?>(jucke) {
       target=jucke
       x = (document.layers) ? loc.pageX : event.clientX;
       y = (document.layers) ? loc.pageY : event.clientY;
       <?php echo$varname;?>div.style.pixelTop        = document.body.scrollTop+y-2;
       <?php echo$varname;?>div.style.pixelLeft        = x-50;
       <?php echo$varname;?>div.style.display = (<?php echo$varname;?>div.style.display == 'block') ? 'none' : 'block';
       show_<?php echo$varname;?>div()
       <?php echo$varname;?>div.style.display='block'
    }
    var stime
    function doOver<?php echo$varname;?>() {
       var el = window.event.srcElement;
       cal_Day = el.title;
       if (cal_Day.length > 7) {
          el.style.borderTopColor = el.style.borderLeftColor = 'buttonhighlight';
          el.style.borderRightColor = el.style.borderBottomColor = 'buttonshadow';
       }
       window.clearTimeout(stime);
    }
    function doOut<?php echo$varname;?>() {
       stime=window.setTimeout("<?php echo$varname;?>div.style.display='none';", 180);
    }
    function doClick<?php echo$varname;?>(){
       var origina = document.<?php echo$formname;?>.<?php echo$varname;?>choice;
       <?php
       if($kind==1){
         ?>
         document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].text;
         <?php
       }
       elseif($kind==2){
         ?>
         document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].value;
         <?php
       }
       ?>
       <?php echo$varname;?>gopage();
    }
    </script>
    <script Language='javascript'>
    function show_<?php echo$varname;?>div(){
       document.all.<?php echo$varname;?>div.innerHTML="<select name=<?php echo$varname;?>choice size=<?php echo $howlong;?> style='width:<?php echo$width;?>px;'  onmouseover='doOver<?php echo$varname;?>()' onmouseout='doOut<?php echo$varname;?>()' onclick='doClick<?php echo$varname;?>()'><?php echo $sidestring;?></select>"
    }
    </script>
    <div id=<?php echo$varname;?>div OnClick="this.style.display='none';" oncontextmenu='return false' ondragstart='return false' onselectstart='return false' style="background : buttonface; margin: 5; margin-top: 2;border-top: 1 solid buttonhighlight;border-left: 1 solid buttonhighlight;border-right: 1 solid buttonshadow;border-bottom: 1 solid buttonshadow;width:122;display:none;position: absolute; z-index: 99"></div>
    <input type=button value='□' OnClick="insert<?php echo$varname;?>('this');"  style='font-size:6pt;font-family:gothic;width:18;height:17;padding:0;'>
    <?php
}



function calendaronly($formname,$datename,$nextfield){
$datename_1=$datename.'_1';
$datename_2=$datename.'_2';
$datename_3=$datename.'_3';

   /*
   ?>
   <input type=button value='▼' OnClick="MiniCal('this','pre2ddate');" readonly  style='font-size:6pt;font-family:gothic;border-style:solid;width:16;padding:0;cursor:hand;text-align:center;'>
   <?php
   */
   ?>

   <input type='button' value='▼' style="font-size:6pt;font-family:gothic;cursor:hand;text-align:center;padding:0;" onClick="datePicker(event,'<?php echo$datename;?>');">

   <?php
}



function zerostring($su){
    if($su>0){return $su;}else{return 0;}
}
function notitlestring($string){
    if(strlen(trim($string))>0){return $string;}else{return '기재없음';}
}
function apptitle($foid){
    global $dbname,$connection;
    global $fdata;
    dbconnection();
    $query = "select induskind,trademark,ktitle from $fdata where foid='$foid'";
    $result = $connection->query($query);
    if ($result){
        $row=$result->fetch_row();
        if($row){
			if($row[0]==4){
				return $row[1];
			}else{
				return $row[2];
			}
		}
    }
}
function nospstring($string){
    $string=deletebothcomma($string);//공백을 제거
    $string=str_replace('  ','',$string);//공백을 제거
    $string=str_replace(' ','',$string);//공백을 제거
    $string=str_replace(',,,',',',$string);//공백을 제거
    $string=str_replace(',,',',',$string);
    return $string;
}
function iconvtoutf($string){
    $string = iconv("EUC-KR", "UTF-8", $string);
    return $string;
}
function iconvtoeuc($string){
    $string = iconv("UTF-8","EUC-KR",$string);
    return $string;
}
function makeidarray(){	
	$idarray=array();    
	if (!isset($_POST['idstring'])){
		if (   isset($_POST['fdeidstring'])   ){
			$fdeidarray=explode('|',$_POST['fdeidstring']);
			foreach($fdeidarray as $whatfdeid){
				$xgstring='x_'.$whatfdeid;
				if (  (isset($_POST["$xgstring"]))   &&  ($_POST["$xgstring"]==1)  ){
					$idarray[]=$whatfdeid;
				}
			}
		}
    }else{
		if (isset($_POST['idstring'])){
			$idarray=explode('|',$_POST['idstring']);
		}
    }
    return $idarray;
}

function obtainstringtype($utf8_string){
    //$utf8_string = iconv("EUC-KR", "UTF-8", $euckr_string);
    $string_type = "";
    if (preg_match_all('!['.'\x{0030}-\x{0039}'.']+!u', $utf8_string, $match)){
            $string_type .= "숫자";
    }
    if (preg_match_all('!['.'\x{0061}-\x{007a}|\x{0041}-\x{005a}'.']+!u', $utf8_string, $match)){
            $string_type .= "영어";
    }
    if (preg_match_all('!['.'\x{1100}-\x{11ff}\x{3130}-\x{318f}\x{ac00}-\x{d7af}'.']+!u', $utf8_string, $match)){
            $string_type .= "한글";
    }
    if (preg_match_all('!['.'\x{2E80}-\x{2EFF}'.'\x{31C0}-\x{31EF}\x{3200}-\x{32FF}'.'\x{3400}-\x{4DBF}\x{4E00}-\x{9FBF}\x{F900}-\x{FAFF}'.'\x{20000}-\x{2A6DF}\x{2F800}-\x{2FA1F}'.']+!u', $utf8_string, $match)){
            $string_type .= "한자";
    }
    if (preg_match_all('!['.'\x{2E80}-\x{2EFF}'.'\x{31C0}-\x{31EF}\x{3200}-\x{32FF}'.'\x{3400}-\x{4DBF}\x{4E00}-\x{9FBF}\x{F900}-\x{FAFF}'.'\x{20000}-\x{2A6DF}\x{2F800}-\x{2FA1F}'.']+!u', $utf8_string, $match)){
            $string_type .= "일어";
    }
    return $string_type;
}
function untilbunji($kaddress){
global $sa;
    $karray=explode(' ',$kaddress);
    $susee=false;
    foreach($karray as $what){
      if($what){

        if($susee==false){
           if(obtainstringtype($what)=='한글'){
              $sa.=$what;
           }
        }
        if($susee==true){
           if(  (obtainstringtype($what)=='한글')  ||  (obtainstringtype($what)=='영어') ){
              break;
           }
        }
        if(obtainstringtype($what)=='숫자'){
           $susee=true;
           $sa.=$what;
        }
        if(obtainstringtype($what)==''){
           $susee=true;
           $sa.=$what;
        }

      }
    }
    return $sa;
}

function datestring($date,$fornot=2){
    $datestring="";
    if(  (isset($date))  &&  (strlen(trim($date))>0)  ){
        if ($fornot==1){
			$datestring=monthtostr(substr($date,4,2)).' '.substr($date,6,2).', '.substr($date,0,4);

        }
        elseif ($fornot==2){
		    if(strlen(trim($date))==8){
				$datestring=substr($date,0,4).'.'.substr($date,4,2).'.'.substr($date,6,2).'.';
			}
			elseif(strlen(trim($date))==10){
				$datestring=substr($date,0,4).'.'.substr($date,4,2).'.'.substr($date,6,2).'.'.substr($date,8,2).'.';				
			}
			elseif(strlen(trim($date))==12){
				$datestring=substr($date,0,4).'.'.substr($date,4,2).'.'.substr($date,6,2).'.'.substr($date,8,2).'.'.substr($date,10,2).'.';				
			}
			elseif(strlen(trim($date))==14){
				$datestring=substr($date,0,4).'.'.substr($date,4,2).'.'.substr($date,6,2).'.'.substr($date,8,2).'.'.substr($date,10,2).'.'.substr($date,12,2).'.';				
			}			
        }
        elseif ($fornot==8){
			$datestring=substr($date,0,4).'.'.substr($date,4,2).'.'.substr($date,6,2).'.';	
        }
    }
    return $datestring;
}
function shortdatestring($date,$fornot=2){ //년도를 두자리로 표시

    if($date){
       if ($fornot==1){
              $datestring=monthtostr(substr($date,2,2),2).' '.substr($date,6,2).', '.substr($date,0,4);
              ////monthtostr($date,$kind=1); $kind==2 면 Jan,Feb,Mar 이렇게 표시 
       }
       elseif ($fornot==2){
              $datestring=substr($date,2,2).'.'.substr($date,4,2).'.'.substr($date,6,2).'.';
       }
    }
    return $datestring;
}
function deaddatestring($induskind,$gizundate){//년도를 두자리로 표시
    if($induskind==1){
        $deaddate=datekal($gizundate,20,0,0);
	}
    elseif($induskind==2){
        $deaddate=datekal($gizundate,10,0,0);
	}
    elseif($induskind==3){
        $deaddate=datekal($gizundate,20,0,0);
	}
    elseif($induskind==4){
        $deaddate=datekal($gizundate,10,0,0);
	}
    return $deaddate;
}

function monthday($date,$fornot=2){///달과일만표시
	    if($fornot==2){
            $datestring=substr($date,4,2).'.'.substr($date,6,2).'.';
	    }
		elseif($fornot==1){
		
		}
    return $datestring;
}
function monthdaysimple($date,$fornot=2){
        $month="";
		$day="";
	    if($fornot==2){
		    $month=substr($date,4,2);
			if($month<10){
			    $month=substr($month,1,1);
			}
			$day=substr($date,6,2);
			if($day<10){
			    $day=substr($day,1,1);
			}
			
            $datestring=$month.'/'.$day;
	    }
		elseif($fornot==1){
		
		}
    return $datestring;
}
function yearmonth($getdate,$fornot=2){
	$datestring="";
	if($fornot==2){
        $datestring=substr($getdate,0,4).'.'.substr($getdate,4,2).'.';
	}
	elseif($fornot==1){
		
	}
    return $datestring;
}
function yearstring($getdate){
   $string=substr($getdate,0,4);
   return $string;
}


function yearmonthstring($getdate){
   $string=substr($getdate,0,4).'.'.substr($getdate,4,2).'.';
   return $string;
}

function wholedate($date,$fornot=2){
    if($date){
       if ($fornot==1){
              $datestring=monthtostr(substr($date,4,2)).' '.substr($date,6,2).', '.substr($date,0,4);
       }
       elseif ($fornot==2){
              $datestring=substr($date,0,4).'.'.substr($date,4,2).'.'.substr($date,6,2).'.'.substr($date,8,2).'.'.substr($date,10,2).'.'.substr($date,12,2).'.';
       }
    }
    return $datestring;
}




function stackmakdae($array,$varstring){ //합쳐져있는것 
    parse_str($varstring);  
		$xarray=array_values($array);
		foreach($xarray as $key =>$value){
			$aarray[]=$value[0];
			$barray[]=$value[1];
			$carray[]=$value[2];
			$darray[]=$value[3];
    	}

		$plusarray=array_merge($aarray,$barray,$carray,$darray);
		$max=max($plusarray);
        if($max>0){
		    $su=$gsize/$max;
		}
	    $yarray=array_keys($array);		
		parse_str($varstring);
		if(!isset($acolor)){$acolor="coral";}
		if(!isset($bcolor)){$bcolor="darkcyan";}
		
		if(!isset($tablewidth)){$tablewidth="700";}
		if(!isset($makdaewidth)){$makdaewidth="30";}
		
	    ?>
		<center>
        <table border=1 bordercolor=aaaaaa style="border:1px solid #dddddd;">

		<tr>
		<td>
		<center>
			<table border=1 bordercolor=eeeeee>
			
			<?php
			if (  $max<1  ){
				?>
				<tr>
				<td colspan=12>
				  <center><?php echo ohmygodstring($kind=1);?></center>		
				</td>
				</tr>
				<?php
			}
			?>
			<tr>
				<?php
				for($i=0;$i<12;$i=$i+1){
					if($i==0){
					   ?>
					   <td align=center valign=bottom style='border:1px solid <?php echo bascolor($fornot);?>;'>
					   <center>
					   <?php
					}else{
					   ?>
					   <td align=center valign=bottom style='border:1px solid <?php echo bascolor($fornot);?>;'>
					   <center>
					   <?php
					}
					if(!isset($aarray[$i])){$aarray[$i]=0;}
					if(!isset($barray[$i])){$barray[$i]=0;}
					if(!isset($carray[$i])){$carray[$i]=0;}
					if(!isset($darray[$i])){$darray[$i]=0;}
					$total=$aarray[$i]+$barray[$i]+$carray[$i]+$darray[$i];


						?>
						<table border=0 cellspacing=0 cellpadding=0>
						<?php
						if($darray[$i]>0){
							?>
							<tr>					
							<td width=30 height=<?php echo$darray[$i]*$su;?> valign=center bgcolor=<?php echo induscolor(4);?>><center><font color=white><b><?php echo$darray[$i];?></b></font></center></td>	
							</tr>
							<?php
						}
						if($carray[$i]>0){
							?>
							<tr>					
							<td width=30 height=<?php echo$carray[$i]*$su;?> valign=center bgcolor=<?php echo induscolor(3);?>><center><font color=white><b><?php echo$carray[$i];?></b></font></center></td>			
							</tr>
							<?php
						}
						if($barray[$i]>0){
							?>
							<tr>					
							<td width=30 height=<?php echo$barray[$i]*$su;?> valign=center bgcolor=<?php echo induscolor(2);?>><center><font color=white><b><?php echo$barray[$i];?></b></font></center></td>			
							</tr>
							<?php
						}
						if($aarray[$i]>0){
							?>
							<tr>					
							<td width=30 height=<?php echo$aarray[$i]*$su;?> valign=center bgcolor=<?php echo induscolor(1);?>><center><font color=white><b><?php echo$aarray[$i];?></b></font></center></td>			
							</tr>
							<?php
						}
						?>
						</table>
                        </center>						
					</td>
					<?php
				}				
				?>
			</tr>		
			<tr>
				<?php
				for($i=0;$i<12;$i=$i+1){
				
					?>
					<td valign=bottom style='border-top: solid #000000 1px;'>				

						<img src="./graph.php?a=textgrim&x=70&y=30&angle=4&fornot=<?php echo$fornot;?>&string=<?php echo substr($yarray[$i],0,4).'.'.substr($yarray[$i],4,2).'.';?>" border=0>	

					</td>
					<?php
				}				
				?>
			</tr>		
			</table>
		    </td></tr>
		</table>
	
		<?php	
}

function textgrim($str,$ex="png"){?><img src="data:image/<?php echo$ex;?>;base64,<?php echo$str;?>" width=20 border=0><?php }
function grimtext($filename){
	if(strlen(trim($filename))>0){
		$str = base64_encode(file_get_contents($filename));
		return $str;
	}
}

function stacksero($array,$varstring){ //합쳐져있는것   
    parse_str($varstring);
		$xarray=array_values($array);
		foreach($xarray as $key =>$value){
			$aarray[]=$value[0];
			$barray[]=$value[1];
			$carray[]=$value[2];
			$darray[]=$value[3];
    	}
		if(  ($aarray) || ($barray) || ($carray) || ($darray) ){
		    $plusarray=array_merge($aarray,$barray,$carray,$darray);
		}
		if($plusarray){
		    $max=max($plusarray);
        }
		
        if($max>0){
		    $su=$gsize/$max;
		}

	    $yarray=array_keys($array);		
		parse_str($varstring);
		$ptotal=$utotal=$dtotal=$mtotal=0;
		if(!isset($acolor)){$acolor="coral";}
		if(!isset($bcolor)){$bcolor="darkcyan";}
		
		if(!isset($tablewidth)){$tablewidth="700";}
		if(!isset($makdaewidth)){$makdaewidth="30";}
		
	    ?>
		<center>
        <table border=1 bordercolor=aaaaaa style="border:1px solid #dddddd;">

		<tr>
		<td>
		<center>
			<table width=500 border=1 bordercolor=<?php echo bascolor($fornot);?>>
				<?php
				foreach($array as $key =>$value){
                    

					?>
					<tr>
					<td valign=bottom style='border-top: solid #000000 1px;'>				
						<img src="./graph.php?a=textgrim&x=70&y=30&angle=4&fornot=<?php echo$fornot;?>&string=<?php echo substr($key,0,4);?>넌" border=0>	

					</td>

					<td width=90%>
					<?php
					if(!$value[0]){$value[0]=0;}
					if(!$value[1]){$value[1]=0;}
					if(!$value[2]){$value[2]=0;}
					if(!$value[3]){$value[3]=0;}

					$total=$value[0]+$value[1]+$value[2]+$value[3];


						?>
						<table border=0 cellspacing=0 cellpadding=0>
						<?php
						if($value[0]>0){
							?>				
							<td height=20 width=<?php echo$value[0]*$su;?> valign=center bgcolor=<?php echo induscolor(1);?>><center><font color=white><b><?php echo$value[0];?></b></font></center></td>	
							<?php
						}
						if($value[1]>0){
							?>
				
							<td height=20 width=<?php echo$value[1]*$su;?> valign=center bgcolor=<?php echo induscolor(2);?>><center><font color=white><b><?php echo$value[1];?></b></font></center></td>			

							<?php
						}
						if($value[2]>0){
							?>
				
							<td height=20 width=<?php echo$value[2]*$su;?> valign=center bgcolor=<?php echo induscolor(3);?>><center><font color=white><b><?php echo$value[2];?></b></font></center></td>			

							<?php
						}
						if($value[3]>0){
							?>
					
							<td height=20 width=<?php echo$value[3]*$su;?> valign=center bgcolor=<?php echo induscolor(4);?>><center><font color=white><b><?php echo$value[3];?></b></font></center></td>			

							<?php
						}
						?>
						</table>
                        </center>						
					</td>
					<td>
					<font color=<?php echo bascolor($fornot);?>><?php echo $total;?></font>
					</td>
					</tr>
					<?php
				}				
				?>
		
			</table>
		    </td>
		<td valign=top>
			<?php


			foreach($array as $value){
			    if(isset($value[0])){
			        $ptotal=$ptotal+$value[0];
				}
				if(isset($value[1])){
			        $utotal=$utotal+$value[1];
				}
				if(isset($value[2])){
			        $dtotal=$dtotal+$value[2];
				}
				if(isset($value[3])){
			        $mtotal=$mtotal+$value[3];
				}
				
			
			}
			    if(!isset($ptotal)){
			        $ptotal=0;
				}
				if(!isset($utotal)){
			        $utotal=0;
				}
				if(!isset($dtotal)){
			        $dtotal=0;
				}
				if(!isset($mtotal)){
			        $mtotal=0;
				}
			?>
			
   	 	<div>
	    	<canvas id="allyearsu-area" width="90" height="90">
		</div>
		 
			<script>
				var pieData = [
						{
							value: <?php echo$ptotal;?>,
							color:"#4682b4",
							highlight: "#4682c4",
							label: "특"
						},
						{
							value: <?php echo$utotal;?>,
							color: "#87CEEB",
							highlight: "#87CEFB",
							label: "실"
						},
						{
							value: <?php echo$dtotal;?>,
							color: "#8FBC8F",
							highlight: "#8FBC9F",
							label: "디"
						},
						{
							value: <?php echo$mtotal;?>,
							color: "#F08080",
							highlight: "#F08090",
							label: "상"
						}
					];
					
				function drawbar(){
						var ctx = document.getElementById("allyearsu-area").getContext("2d");
						myPie = new Chart(ctx).Pie(pieData);
				}
			    drawbar();
			</script>
			
			</td>
			
			
			</tr>
		</table>
	
		<?php	
}

function array2makdae($array,$varstring){   
		parse_str($varstring);

		$xarray=array_values($array);		
		/*
foreach($xarray as $w){
print_r($w);echo"<br>";

}
*/
		foreach($xarray as $key =>$value){
			$aarray[]=$value[0];
			$barray[]=$value[1];
    	}
		
		$plusarray=array_merge($aarray,$barray);
		$max=max($plusarray);
        if($max>0){
		    $su=$gsize/$max;
		}

		
		
	    $yarray=array_keys($array);		

		if(!$acolor){$acolor="coral";}
		if(!$bcolor){$bcolor="darkcyan";}		
		if(!$tablewidth){$tablewidth="700";}
		if(!$makdaewidth){$makdaewidth="30";}
		
	    ?>
        <table border=1 bordercolor=<?php echo bascolor($fornot);?>>

		<tr>
		<td>
        <table  border=1 bordercolor=<?php echo bascolor($fornot);?>>

		<tr>
            <?php
            for($i=0;$i<12;$i=$i+1){
				if($i==0){
				   ?>
				   <td align=center valign=bottom style='border-bottom: solid <?php echo bascolor($fornot);?> 1px;'>
				   <?php
				}else{
				   ?>
				   <td valign=bottom align=center style='border-bottom: solid <?php echo bascolor($fornot);?> 1px;'>
				   <?php
				}

	    			?>
					<table cellspacing=0 cellpadding=0>
					<tr>					
					<td colspan=2>
					    <table border=1 style="border:1px solid <?php echo bascolor($fornot);?>;"><tr><td>
					    <font color=coral> <?php echo ckindstring($money=$aarray[$i],$ckind);?></font><br>
						</td>
						</tr>
						<tr>
						<td>
					    <font color=darkcyan><?php echo ckindstring($money=$barray[$i],$ckind);?><br>
					    </td></tr></table><br>
					
					</td>
					</tr>
					
		
					<tr><td width=50% valign=bottom>
					<?php
					if( $aarray[$i] * $su >0 ) {
					$avalue=$aarray[$i] * $su;
				    ?>
                    <table><tr>
					    <td height=<?php echo$avalue;?> width=15 style="background-color:rgba(240,128,128,0.5);cursor:hand;" onclick="location.href='debit.php?a=show&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&fromdate=<?php echo monthfirst(substr($yarray[$i],0,4).substr($yarray[$i],4,2));?>&todate=<?php echo monthlast(substr($yarray[$i],0,4).substr($yarray[$i],4,2));?>'"></td>
					</tr>
					</table>
                    <?php 
                    }else{
					
				    ?>
                    <table><tr><td height=<?php echo$avalue;?> width=15 bgcolor=white>&nbsp;</td></tr></table>
                    <?php 
					}
                    ?>					
                    </td>
					<td width=50% valign=bottom>					
					<?php
					if( $barray[$i] * $su >0 ) { 
					$bvalue=$barray[$i] * $su;
				    ?>
                    <table><tr><td height=<?php echo$bvalue;?> width=15  style="background-color:rgba(0,128,128,0.5);" onclick="location.href='custom.php'">&nbsp;</td></tr></table>
                    <?php 
                    }else{
					
					
				    ?>
                    <table><tr><td height=<?php echo$avalue;?> width=15 bgcolor=white>&nbsp;</td></tr></table>
                    <?php 
					
					}
                    ?>					
					
                    </td></tr></table>		


					
				</td>
				<?php
            }				
	        ?>
		</tr>		
		<tr>
            <?php
            for($i=0;$i<12;$i=$i+1){
                ?>
				<td valign=bottom style='border-top: solid #000000 1px;'>				
      				<img src="./graph.php?a=textgrim&x=70&y=30&angle=4&fornot=<?php echo$fornot;?>&string=<?php echo substr($yarray[$i],0,4).'.'.substr($yarray[$i],4,2).'.';?>" border=0>	

				</td>
				<?php
            }				
	        ?>
		</tr>		
		</table>
		</td></tr></table>
		<?php	
}

function arraymakdae($array,$varstring){   
		$xarray=array_values($array);		
		$max=max($xarray);
		
        if($max>0){
		    $su=$gsize/$max;
		}
		
		//$su=round($su);
		//echo $varstring;
	    $yarray=array_keys($array);		
		parse_str($varstring);
		if(!$color){$color="coral";}
		if(!$tablewidth){$tablewidth="700";}
		if(!$makdaewidth){$makdaewidth="30";}
	    ?>

        <table width=<?php echo$tablewidth;?> border=1 bordercolor=eeeeee>
		<?php $yheight=$max*$su+30;?>
		<tr height=<?php echo$yheight;?>>
            <?php
            for($i=0;$i<12;$i=$i+1){

				if($i==0){
				   ?>
				   <td align=center valign=bottom style='border-bottom: solid #000000 1px;'>
				   <?php
				}else{
		 		    if($fornot==1){
						?>
						<td valign=bottom align=center style='border-bottom: solid #000000 1px;'>
						<?php
				    }
		 		    if($fornot==2){
						?>
						<td valign=bottom align=center style='border-bottom: solid #000000 1px;'>
						<?php
				    }
				}
    				if($xarray[$i] * $su>0){
	    			?>
				    <table height="<?php echo $xarray[$i] * $su ;?>" width=<?php echo$makdaewidth;?>>
					    <tr>
				        <td bgcolor=<?php echo$color;?>>
					    <center><font color=white><b><?php echo $xarray[$i];?></b></font></center>
				        </td>
					    </tr>
					</table>			
		            <?php
                    }
                    ?>					
				</td>
				<?php
            }				
	        ?>
		</tr>		
		<tr>
            <?php
            for($i=0;$i<12;$i=$i+1){
                ?>
				<td valign=bottom style='border-top: solid #000000 1px;'>				
      				<img src="./graph.php?a=textgrim&x=70&y=40&angle=10&fornot=<?php echo$fornot;?>&string=<?php echo substr($yarray[$i],0,4).'.'.substr($yarray[$i],4,2).'.';?>" border=0>	
				</td>
				<?php
            }				
	        ?>
		</tr>		
		</table>

		<?php	
}
function ckindstring($money,$ckind){


   	if($ckind==1){$av=commamake($money);$unitstring="US$";}
	elseif($ckind==2){$av=commamake($money);$unitstring="EURO";}
	elseif($ckind==3){$av=commamake($money,2);$unitstring="JPY";}
	elseif($ckind==4){$av=commamake($money,2);$unitstring="원";}
    if(  ($ckind==1) ||  ($ckind==2) ||  ($ckind==3) ){
	    return $av;
	}
	elseif($ckind==4){
	    return $av;
	}
}

function seromakdae($array,$varstring){   
		parse_str($varstring);
     	$xarray=array_values($array);
		$max=max($xarray);
        if($max>0){
		    $su=$gsize/$max;
		}
		

		//$su=round($su);		
	    $yarray=array_keys($array);		
		if(!$color){$color="coral";}
		if(!$tablewidth){$tablewidth="700";}
		if(!$makdaeheight){$makdaeheight="30";}
	    ?>
        <table border=1 bordercolor=aaaaaa>		
		<?php
		if($title){
		?>
		<tr>
		<td><center>
		    <font style="font-size:12pt;"><b><?php echo $title;?></b></font>
            </center>			
		</td>
		</tr>
		<?php
		}
		?>
		<tr>
		<td>
        <table width=<?php echo$tablewidth;?> border=1 bordercolor=eeeeee>
		<?php $xwidth=$max*$su+30;?>
            <?php
            foreach($array as $key =>$value){
                   ?>
					<tr>
					<td valign=bottom style='border-top: solid #000000 1px;'>				
						<img src="./graph.php?a=textgrim&x=90&y=30&angle=4&fornot=<?php echo$fornot;?>&string=<?php echo substr($key,0,4).'년';?>" border=0>	
					</td>
				   <td width=99%>
				   <?php
    				if($value>0){
	    			?>
				    <table border=0 width="<?php echo $value * $su ;?>" height=22>
					    <tr>
				        <td bgcolor=<?php echo$color;?>>
					    <center><font color=white><b><?php echo $value;?></b></font></center>
				        </td>
					    </tr>
					</table>			
		            <?php
                    }
                    ?>					
				    </td>
				    </tr>
				<?php
            }				
	        ?>				
		</table>
		</td></tr>
		</table>
		<?php	
}

function sero2makdae($array,$varstring){   
    if($array){
	    parse_str($varstring);

		$xarray=array_values($array);

		foreach($xarray as $key =>$value){
			$aarray[]=$value[0];
			$barray[]=$value[1];
    	}
		$plusarray=array_merge($aarray,$barray);
		$max=max($plusarray);

        if($max>0){
		    $su=$gsize/$max;
		}


	    $yarray=array_keys($array);		
		parse_str($varstring);
		if(!isset($acolor)){$acolor="coral";}
		if(!isset($bcolor)){$bcolor="darkcyan";}
		
		if(!isset($tablewidth)){$tablewidth="700";}
		if(!isset($makdaewidth)){$makdaewidth="30";}
		
	    ?>
		<center>
        <table border=1 bordercolor=aaaaaa>
		
		<?php
		if(isset($title)){
		?>
		<tr>
		<td><center>
		    <font style="font-size:12pt;"><b><?php echo $title;?></b></font>
            </center>			
		</td>
		</tr>
		<?php
		}
		?>
		<tr>
		<td>
        <table border=1 bordercolor=eeeeee>

            <?php
            foreach($array as $key =>$value){
              
			 
	    		?>
				<tr>
				<td valign=bottom style='border-top: solid #000000 1px;'>				
      				<img src="./graph.php?a=textgrim&x=70&y=30&angle=4&fornot=<?php echo$fornot;?>&string=<?php echo$key;?>년" border=0>	

				</td>
					
				<td valign=bottom align=left style='border-bottom: solid #000000 1px;'>
				    <table cellspacing=0 cellpadding=0>
					<?php
					if($value[0] * $su>0){
					    if($ckind==1){$av=commamake($value[0],2);$unitstring="US$";}
					    if($ckind==2){$av=commamake($value[0],2);$unitstring="EURO";}
					    if($ckind==3){$av=commamake($value[0],2);$unitstring="JPY";}
					    if($ckind==4){$av=commamake($value[0],2);$unitstring="원";}
					    ?>
					    <tr>
						  <td align=left>
							<table border=0 style="border:0px solid white;">
							<tr>
							<td width=<?php echo $value[0] * $su;?> height=15  style="background-color:rgba(240,128,128,0.5);cursor:hand;" onclick="location.href='debit.php?a=show&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&fromdate=<?php echo yearfirst(substr($yarray[$i],0,4).substr($yarray[$i],4,2));?>&todate=<?php echo yearlast(substr($key,0,4).substr($key,4,2));?>'"></td>
							<td> <font color=coral><b><?php echo $av;?></b></font></td>							
							</tr></table>
						  </td>
						</tr>
						<?php
					}else{//안하면 비어있어서 보기가 안좋아 하는 것임
					    ?>
					    <tr>
						  <td align=left>
     						<table><tr><td bgcolor=white height=15>&nbsp;</td></tr></table>
						  </td>
						</tr>
						<?php
                    }					

					if($value[1] * $su>0){
					    if($ckind==1){$bv=commamake($value[1],2);$unitstring="US$";}
					    if($ckind==2){$bv=commamake($value[1],2);$unitstring="EURO";}
					    if($ckind==3){$bv=commamake($value[1],2);$unitstring="JPY";}
					    if($ckind==4){$bv=commamake($value[1],2);$unitstring="원";}
					    ?>
					    <tr>
						  <td align=left>
     						<table border=0 style="border:0px solid white;">
							<tr>
							<td width=<?php echo $value[1] * $su;?> height=15 style="background-color:rgba(0,128,128,0.5);cursor:hand;" onclick="location.href='debit.php?a=show&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&fromdate=<?php echo yearfirst(substr($yarray[$i],0,4).substr($yarray[$i],4,2));?>&todate=<?php echo yearlast(substr($key,0,4).substr($key,4,2));?>&kind=2'"></td>
							<td> <font color=darkcyan><b><?php echo $bv;?></b></font></td>							
							</tr></table>
						  </td>
						</tr>
						<?php
					}else{//안하면 비어있어서 보기가 안좋아 하는 것임
					    ?>
					    <tr>
						  <td align=left>
     						<table><tr><td bgcolor=white height=15>&nbsp;</td></tr></table>
						  </td>
						</tr>
						<?php
                    }					
					?>  
				    </table>
			    </td>
				</tr>
				<?php

            }				
	        ?>
				
		
		</table>
        </td>
		</tr>
		</table>
		<?php	
	}
}

function beforenextid($taction,$tablename,$idname,$idvalue,$string,$addstring){
?>
  <img src='./icons/leftdirection.gif' border=0><a href=<?php echo$globals[php_self];?>?a=<?php echo$taction;?>&id=<?php echo beforefield($tablename,$idname,"$idname<$idvalue");?><?php if($addstring){echo$addstring;}?>>이전<?php echo$string;?></a>
  <img src='./icons/rightdirection.gif' border=0><a href=<?php echo$globals[php_self];?>?a=<?php echo$taction;?>&id=<?php echo nextfield($tablename,$idname,"$idname>$idvalue");?><?php if($addstring){echo$addstring;}?>>다음<?php echo$string;?></a>
<?php
}
function java_confirmornot($idstring,$string){
?>
<script>
function <?php echo$idstring;?>(){
      if (confirm('<?php echo$string;?>')){
           return true;
      }else{
           return false;
      }
}
</script>
<?php
}
function java_pagebreak(){
   ?>
   <STYLE TYPE ='text/css'>
       P.breakhere {page-break-before: always}
   </STYLE>
   <?php
}
function makepoststring($fields){
   $xstring="";
   deletebothcomma($fields);
   $xarray=explode(',',$fields);
   $xtip='|#^^*&*#|';
   foreach($xarray as $whatx){
      $xstring.=$xtip.$_POST["$whatx"];

   }
   return $xstring;
}
function updatedata($tablename,$fields,$wherestring){
global $connection;
global $dbname;
   dbconnection();
   deletebothcomma($fields);
   $xarray=explode(',',$fields);
   $xtip='';
   foreach($xarray as $whatx){
      $postx=$_POST[$whatx];
      if($postx){
         $xstring.=$xtip."$whatx='$postx'";
      }
      $xtip=',';
   }
   if(strlen(trim($wherestring))>0){
      $query = "update $tablename set $xstring where $wherestring";


   }else{
      $query = "update $tablename set $xstring";
   }
   $result = $connection->query($query);

   if ($result){
      return true;
   }else{
      return false;
   }
}

function updatepostfields($tablename,$fields,$wherestring){
global $connection;
global $dbname;
    dbconnection();
    deletebothcomma($fields);
    $xarray=explode(',',$fields);
    $xtip='';
	$xstring="";
    foreach($xarray as $whatx){
		if( isset($_POST["$whatx"]) ){
			$postx=$_POST["$whatx"];
			if(  (isset($postx))  &&  (strlen(trim($postx))>0)  ){
				$xstring.=$xtip."$whatx='$postx'";
			}
			$xtip=',';
		}
    }
    if(strlen(trim($wherestring))>0){
        $query = "update $tablename set $xstring where $wherestring";
    }else{
        $query = "update $tablename set $xstring";
    }
    $result = $connection->query($query);

    if ($result){
        return true;
    }else{
        return false;
    }
}

function updatefield($tablename,$updatestring,$wherestring){
	global $connection;
	global $dbname;
	dbconnection();
	if(strlen(trim($wherestring))>0){
	    $query = "update $tablename set $updatestring where $wherestring";
	}else{
	    $query = "update $tablename set $updatestring";
	}

	$result = $connection->query($query);
    if ($result){
	    return true;
	}else{
	    return false;
	}
}

function updatecustom($id){//  fornot,$ws,$id
	global $connection;
	global $letterdata;
	global $debitdata;
	global $customdata;
	global $appdata;

	dbconnection();
	if( (isset($id)) && ($id>0) ){
		$query = "select count(*),sum(induskind=1),sum(induskind=2),sum(induskind=3),sum(induskind=4) from $appdata where lappcode='$id'";
		$result = $connection->query($query);
		if($result){
			$row=$result->fetch_row();
			$appsu=$row[0];
			$apppsu=$row[1];
			$appusu=$row[2];
			$appdsu=$row[3];
			$appmsu=$row[4];
		}else{
			$appsu=$apppsu=$appusu=$appdsu=$appmsu=0;
		   	
		}

		
		$query = "select count(*),sum(induskind=1),sum(induskind=2),sum(induskind=3),sum(induskind=4) from $appdata where (lappcode='$id') and (length(regno)>=9) ";
		$result = $connection->query($query);
		if($result){
			$row=$result->fetch_row();
			$regsu=$row[0];
			$regpsu=$row[1];
			$regusu=$row[2];
			$regdsu=$row[3];
			$regmsu=$row[4];
		}else{
		    $regsu=$regpsu=$regusu=$regdsu=$regmsu=0;	
		}
		
		$query = "select count(*) from $letterdata where id='$id'";
		$result = $connection->query($query);
		if($result){
			$row=$result->fetch_row();
			$lettersu=$row[0];
		}else{
		    $lettersu=0;	
		}
		$query = "select count(*) from $debitdata where attcode='$id'";
		$result = $connection->query($query);
		if($result){
			$row=$result->fetch_row();
			$debitsu=$row[0];
		}else{
		    $debitsu=0;	
		}

		$query = "select count(*) from $appdata where (find_in_set($id,appcode)>0) ";
		$result = $connection->query($query);
		if($result){
			$row=$result->fetch_row();
			if($row[0]>0){
			    $ws=1;	///출원인에 아디가 있다..
			}else{
				$aquery = "select count(*) from $appdata where lappcode='$id' ";
				$aresult = $connection->query($aquery);		
                if($aresult){
                    $arow=$aresult->fetch_row();
					if($arow[0]>0){
					    $ws=2;	//대리인에 아이디가 있다...
					}else{
					    $ws=3;	/// 
					}

                }				
				$ws=2;	
			}
		}else{
		    $ws=3;	
		}
		
		$query = "select fornot,countrycode from $customdata where id='$id'";
		$result = $connection->query($query);
		if($result){
   			$row=$result->fetch_row();
			if($row){
			    $fornot=$row[0];	
				$countrycode=$row[1];

				if( strlen(trim($fornot))<1){
					if( strlen(trim($countrycode))<1 ){
						$fornot=2;
					}else{
						$countrycode=strtolower($countrycode);				   
						if ($countrycode=="kr") {
							$fornot=2;	
						}else{
							$fornot=1;	
						}
					}				
				}
			}
		}
		
		if(!isset($fornot)){$fornot="";}
		
		$query = "update $customdata set ws='$ws',fornot='$fornot',lettersu='$lettersu',appsu='$appsu',apppsu='$apppsu',appusu='$appusu',appdsu='$appdsu',appmsu='$appmsu',regsu='$regsu',regpsu='$regpsu',regusu='$regusu',regdsu='$regdsu',regmsu='$regmsu',debitsu='$debitsu' where id='$id'";
		$connection->query($query);
    }

}

function fornotbyid($id){
	global $customdata;
	global $connection;
	
	$fornot="";
	
	$query = "select fornot,countrycode from $customdata where id='$id'";
	$result = $connection->query($query);
	if($result){
		if($result->num_rows>0){
   			$row=$result->fetch_row();
			if($row){
			    $fornot=$row[0];	
				$countrycode=$row[1];

				if(  (strlen(trim($fornot))<1)  ||  ($fornot==0)  ){
					if( strlen(trim($countrycode))<1 ){
						$fornot=2;
					}else{
						$countrycode=strtolower($countrycode);				   
						if ($countrycode=="kr") {
							$fornot=2;	
						}else{
							$fornot=1;	
						}
					}				
				}
			}
		}
	}	
	return $fornot;
}	

function idbyfoid($foid){
	global $appdata;
	global $connection;	
	$id="";	
	$query = "select lappcode from $appdata where foid='$foid'";
	$result = $connection->query($query);
	if($result){
		if($result->num_rows>0){
   			$row=$result->fetch_row();
			if($row){
			    $id=$row[0];	
			}
		}
	}	
	return $id;
}	

function ourrefbyfoid($foid){
	global $appdata;
	global $connection;	
	$ourref="";	
	$query = "select ourref from $appdata where foid='$foid'";
	$result = $connection->query($query);
	if($result){
		if($result->num_rows>0){
   			$row=$result->fetch_row();
			if($row){
			    $ourref=$row[0];	
			}
		}
	}	
	return $ourref;
}	

function applinobyfoid($foid){
	global $appdata;
	global $connection;	
	$applino="";	
	$query = "select applino from $appdata where foid='$foid'";
	$result = $connection->query($query);
	if($result){
		if($result->num_rows>0){
   			$row=$result->fetch_row();
			if($row){
			    $applino=$row[0];	
			}
		}
	}	
	return $applino;
}
	
function idbyfdeid($fdeid){
	global $debitdata;
	global $connection;	
	$id="";	
	$query = "select attcode from $debitdata where fdeid='$fdeid'";
	$result = $connection->query($query);
	if($result){
		if($result->num_rows>0){
   			$row=$result->fetch_row();
			if($row){
			    $id=$row[0];	
			}
		}
	}	
	return $id;
}	


function obtaintrueornot($tablename,$wherestring){
global $connection;
global $dbname;
dbconnection();
   if(strlen(trim($wherestring))>0){
      $query = "select count(*) from $tablename where $wherestring";
   }else{
      $query = "select count(*) from $tablename";
   }
   $result = $connection->query($query);
   if ($result){
      $row_num=$result->fetch_row();
      if($row_num[0]>0){
         return true;
      }else{
         return false;
      }
   }else{
      return false;
   }
}

function totalornot($tablename,$wherestring){
	global $connection;
	global $dbname;
	dbconnection();
    if(strlen(trim($wherestring))>0){
        $query = "select count(*) from $tablename where $wherestring";
    }else{
        $query = "select count(*) from $tablename";
    }
	$result=$connection->query($query);
	if ($result){
		$row=$result->fetch_row();
        if($row[0]>0){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function fieldtypes($tablename){
	global $dbname,$connection;
	$array=array();
	$fieldname="";
	$typename="";
	if (strlen(trim($tablename))>0) {
		$query="explain $tablename";
		$result=$connection->query($query);
		if($result){
			while($row=$result->fetch_assoc()){
				foreach($row as $key=>$value){
					if ($key=="Field"){
						$fieldname=$value;
						
					}
					if($key=="Type"){
						$typename=$value;
					}
					
				}
				$array[$fieldname]=$typename;
				$fieldname="";
				$typename="";
			}
		}
	}
	return $array;
}
function fieldnames($tablename){
	global $connection;
	if (strlen(trim($tablename))>0) {
		$query="show columns from $tablename ";
		$result=$connection->query($query);
		if($result){
			while($row=$result->fetch_assoc()){
				$array[]=$row['Field'];
			}
		}
	    return $array;
	}else{
		return false;
	}
}
function obtainfieldnames($tablename){
        $result=mysql_query("select * from $tablename");
        if ($result){
               $fieldsu=mysql_num_fields($result);
        }
        for ($i=0;$i<$fieldsu;$i++){
               $array[]=mysql_field_name($result,$i);
        }
        return $array;
}


function obtainfielddateno($tablename){
	global $connection;
	    $query="select * from $tablename";
        $result=$connection->query($query);
        if ($result){
		    while ($finfo = $result->fetch_field()) {
			   //$finfo->name은 필드명임	
               if(substr($finfo->name,-2)=='no'){
                  $array[]=$finfo->name;
               }
               if(substr($finfo->name,-4)=='date'){
                  $array[]=$finfo->name;
               }
			}    
			$result->close();
        }
        return $array;
}

function attexistnot(){
	global $staffdata;
	$totalsu="";
    $totalsu=obtaintotalsu($staffdata,"clas='1'");
    return $totalsu;
}

function obtaintotalsu($tablename,$wherestring){
	global $connection;
    if(strlen(trim($wherestring))>0){
        $query = "select count(*) from $tablename where $wherestring ";
    }else{
        $query = "select count(*) from $tablename ";
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
function obtainfield($tablename,$fieldname,$wherestring){//필드값이 하나인것을 조건절에 따라 그냥 구함
global $connection;
global $dbname;
    dbconnection();
    if(strlen(trim($wherestring))>0){
        $query = "select $fieldname from $tablename where $wherestring";
    }else{
        $query = "select $fieldname from $tablename";
    }

	$result = $connection->query($query);
	if ($result){
	    $row=$result->fetch_row();
        return  stripslashes($row[0]);
    }else{
        return false;
    }
}

function obtainkeyvalue($tablename,$key,$value,$wherestring){
global $connection;
global $dbname;
$fieldarray=array();
dbconnection();
   if(strlen(trim($wherestring))>0){
      $query = "select $key,$value from $tablename where $wherestring";
   }else{
      $query = "select $key,$value from $tablename";
   }

   $result = $connection->query($query);
   if ($result){
      while($row=$result->fetch_row()){
         $fieldarray[$row[0]]=stripslashes($row[1]);
      }
      return $fieldarray;
   }	
	
	
	
	
}


function obtainfields($tablename,$fieldname,$wherestring){
//필드값이 하나인것을  조건에 따라 그냥 특별한 값을 따지지 않고 배열로 해서 리턴
global $connection;
global $dbname;
$fieldarray=array();
dbconnection();
   if(strlen(trim($wherestring))>0){
      $query = "select $fieldname from $tablename where $wherestring";
   }else{
      $query = "select $fieldname from $tablename";
   }

   $result = $connection->query($query);
   if ($result){
      while($row=$result->fetch_row()){
         $fieldarray[]=stripslashes($row[0]);
      }
      return $fieldarray;
   }
}
function obtaincate($tablename,$fieldname,$wherestring){
//필드값이 하나 있을때  값이 다른 것들만  배열로
	global $connection;
	global $dbname;
    dbconnection();
    $array=array();
    if(strlen(trim($wherestring))>0){
        $query="select DISTINCT $fieldname from $tablename where $wherestring";
    }else{
        $query="select DISTINCT $fieldname from $tablename";
    }
	

    $result = $connection->query($query);
    if($result){
        while($row=$result->fetch_row()){
			
            $row[0]=str_replace(' ','',$row[0]);
            $array[]=trim($row[0]);
        }
    }
    return $array;
}
function obtaintwocate($tablename,$field1,$field2,$wherestring){
	//두개의 필드값에서 서로  다른 것들만  배열로
	global $connection;
	global $dbname;
    //dbconnection();
    $array=array();
    if(strlen(trim($wherestring))>0){
        $wherestring="where $wherestring";
    }
    $query="select DISTINCT $field1 from $tablename $wherestring";

    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_row()){
				$array[]=trim($row[0]);
			}
		}
	}
    $query="select DISTINCT $field2 from $tablename $wherestring";
    $result = $connection->query($query);
	if($result){
		if($result->num_rows>0){
			while($row=$result->fetch_row()){
				if (!in_array($row[0],$array)){
					$array[]=trim($row[0]);
				   
				}
			}
		}
	}
    return $array;
}

function obtainfieldarray($tablename,$fieldname,$wherestring){
//필드값이 콤마로 여럭개가 있을때 그 여러개의 값을 매열로///딱 한개만 가져옴 
	global $connection;
	global $dbname;
	dbconnection();
    $valuearray=array();
    deletebothcomma($fieldname);
    $arrayfield=explode(',',$fieldname);
    $fieldsu=count($arrayfield);
    if(strlen(trim($wherestring))>0){
        $query = "select $fieldname from $tablename where $wherestring";

    }else{
        $query = "select $fieldname from $tablename";
    }
    $result =$connection->query($query);
    if ($result){
        $row=$result->fetch_row();
        for ($i=0;$i<$fieldsu;$i=$i+1){
            $valuearray[$arrayfield[$i]]=$row[$i];

        }
    }
    return $valuearray;
}


function obtainfieldsarray($tablename,$fieldname,$wherestring){
//필드값이 콤마로 여럭개가 있을때 그 여러개의 값을 매열로//여러개가져옴  그래서 array[0]
	global $connection;
	global $dbname;
	dbconnection();
	$array=array();
    deletebothcomma($fieldname);
    $arrayfield=explode(',',$fieldname);
    $fieldsu=count($arrayfield);
    if(strlen(trim($wherestring))>0){
        $query = "select $fieldname from $tablename where $wherestring";
    }else{
        $query = "select $fieldname from $tablename";
    }

    $result = $connection->query($query);
    if ($result->num_rows>0){
        while($row=$result->fetch_row()){
            for ($i=0;$i<$fieldsu;$i=$i+1){
                $valuearray["$arrayfield[$i]"]=$row[$i];

            }
            $array[]=$valuearray;
       }
    }
    return $array;
}


function obtainoptioncate($tablename,$fieldname,$wherestring){
////필드값이 하나 있을때  값이 다른 것들만 옵션태그를 붙여서  문자열로 반환
	global $connection;
	global $dbname;
	dbconnection();
    if(strlen(trim($wherestring))>0){
        $catequery="select DISTINCT $fieldname from $tablename where $wherestring";
    }else{
        $catequery="select DISTINCT $fieldname from $tablename";
    }
    $cateresult = $connection->query($catequery);
    $string="";
    if ($cateresult){
        while($row=$cateresult->fetch_row()){
            if(strlen(trim($row[0]))>0){
                $row[0]=str_replace(' ','',$row[0]);
                $string.='<option>'.trim($row[0]);
            }
        }
    }
    return $string;
}

function obtaincommafield($tablename,$fieldname,$wherestring){
	//한개의 필드값안에 컴마로 나눠져 있을때 컴마를 잘라서 서로 다른것들만 배열로
	global $connection;
	global $dbname;
    //dbconnection();
    $array=array();
    if(strlen(trim($wherestring))>0){
        $wherestring="where $wherestring";
    }
	
	$xarray=array();
	
    $query="select $fieldname from $tablename $wherestring";
    $result = $connection->query($query);
    if ($result){
        while($row=$result->fetch_row()){
			
			$array=explode(",",$row[0]);
            foreach($array as $w){
				if(strlen(trim($w))>0){
					if (!in_array($w,$xarray)){
						$xarray[]=trim($w);
					}				
                }				
			}
        }
		

    }
    return $xarray;
}



function callrow($tablename,$fieldstring,$wherestring){
    global $connection,$dbname;
 
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
    $result = $connection->query($query);
    if ($result){
	    $row=$result->fetch_row();
        if($row){
            return $row;
        }
    }
}
function callarray($tablename,$fieldstring,$wherestring){
    global $connection,$dbname;
    dbconnection();
    $array=array();
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
	$result = $connection->query($query);
    if ($result){
	    $row=$result->fetch_assoc();
        if($row){
            foreach($row as $key => $whatrow){
                if(substr($key,-4)=='date'){
                    $$key=str_replace("'",'&#039',stripslashes($whatrow));
                    $xdate_1=$key.'_1';
                    $xdate_2=$key.'_2';
                    $xdate_3=$key.'_3';
                    $$xdate_1=substr($whatrow,0,4);
                    $$xdate_2=substr($whatrow,4,2);
                    $$xdate_3=substr($whatrow,6,2);
                    $array["$xdate_1"]=$$xdate_1;
                    $array["$xdate_2"]=$$xdate_2;
                    $array["$xdate_3"]=$$xdate_3;
                    $array["$key"]=$$key;
                }else{
                    $$key=str_replace("'",'&#039',stripslashes($whatrow));
                    $array["$key"]=$$key;
                }
            }
        }
    }
    return $array;
}
    function calls($tablename,$field,$wherestring){ 
		global $connection;
		dbconnection();
	//  callstring으로 하려다가 calls로 약칭
	//레코드의 필드명와 값을 구해서 parse_str로 값을 추출할수있도록
	//&fieldname=value 이렇게 계속 만들어서 리턴함
        $string="";
	    if(  (!isset($field)) || (strlen(trim($field))<1)  ){$field='*';}
	    if(  (isset($wherestring))  && (strlen(trim($wherestring))>0) ){
            $query = "select $field from $tablename where $wherestring ";
	    }else{
            $query = "select $field from $tablename";	   
	    }
        $result = $connection->query($query);
        if (isset($result)){
            $row=$result->fetch_assoc();
            if(isset($row)){
                foreach($row as $key => $whatrow){
                    if(substr($key,-4)=='date'){
                        $$key=str_replace("'",'&#039',stripslashes($whatrow));
                        $string.="&".$key."=".$$key;
                        $xdate_1=$key.'_1';
                        $xdate_2=$key.'_2';
                        $xdate_3=$key.'_3';
                        $$xdate_1=substr($whatrow,0,4);
                        $$xdate_2=substr($whatrow,4,2);
                        $$xdate_3=substr($whatrow,6,2);
						$string.="&".$xdate_1."=".$$xdate_1;
						$string.="&".$xdate_2."=".$$xdate_2;
						$string.="&".$xdate_3."=".$$xdate_3;
						
                    }else{
                        $$key=str_replace("'",'&#039',stripslashes($whatrow));
                        $string.="&".$key."=".$$key;
                    }
                }
            }
        }
        return $string;
    }
	function callsx($tablename){
		global $connection;
		dbconnection();
	//  callstringx으로 하려다가 callsx로 약칭
	//레코드의 필드명을 구해서  parse_str로 변수명을 모두 ""로처리할수있도록
	//&fieldname="" 이렇게 계속 만들어서 리턴함
		$string="";
		$query="show columns from $tablename";
		$result=$connection->query($query);
		while($row=$result->fetch_assoc()){
			$fieldname=$row['Field'];
			$string.="&$fieldname=";
		}
		return $string;
	}
	function fdeidcheck($id,$formname,$fdeidarray){
		////////////////////좌측 체크박스에 체크하는 것
		// 
		
		?>
        <script>
            function detail<?php echo$id;?>(ref){
                var a;
                var f = document.<?php echo$formname;?>;
                var window_left = 50;
                var window_top = 50;
                a=checkornot<?php echo$id;?>();
                if(a){
                    f.action = ref;
                    w=window.open(ref,'win<?php echo$id;?>','width=860,height=500,status=1,scrollbars=yes,top=0,left=0');
                    f.target = 'win<?php echo$id;?>';
                    w.focus();
                    f.submit();
                }
            }
            function page<?php echo$id;?>(gopage){
				//a=checkornot<?php echo$id;?>();
				//if(a){
					f = document.<?php echo$formname;?>;
					f.action = gopage; // 보여줘야 하는 페이지 주소
					f.target = '_self'; // <-- 이부분을 써주면 되더라...
					f.submit();
				//}
            }
            </script>
            <script>
            function alltoggle<?php echo$id;?>(button) {
                if(button.checked){
                    <?php 
                    foreach($fdeidarray as $whatfdeid){
                        ?>
                        var e = document.<?php echo$formname;?>.x_<?php echo$whatfdeid;?>;
                        e.checked=true;
                        <?php 
                    }
                    ?>
                }else{
                    <?php 
                    foreach($fdeidarray as $whatfdeid){
                        ?>
                        var e = document.<?php echo$formname;?>.x_<?php echo$whatfdeid;?>;
                        e.checked=false;
                        <?php 
                    }
                    ?>
                }
            }
           function checkornot<?php echo$id;?>() {
                var ch=false;
                <?php 
                foreach($fdeidarray as $whatfdeid){
                    ?>
                    var e = document.<?php echo$formname;?>.x_<?php echo$whatfdeid;?>;
                   if(e.checked){
                        ch=true;
                    }
                    <?php 
                }
                ?>
                if(ch==false){
                    window.alert('체크한항목이 없습니다.먼저체크하세요!!');
                    return false;
                }else{
                     return true;
                }
            }
        </script>
    	<?php
	}

function bascolor($fornot=1){
    $color="";
	if($fornot==1){$color='darkkhaki';}
    elseif($fornot==2){$color='skyblue';}
    elseif($fornot==3){$color='mediumaquamarine';}
	else{
	    $color="darkkhaki";
	}
	return $color;
}
function basiccolor($fornot=1){
    if($fornot==1){$color='F8F6F1';}
    elseif($fornot==2){$color='ECF4F8';}
	return $color;
}
function lettercolor($letterkind=1,$kind="down"){
    if ($letterkind==1){
        if ($kind=='down'){$color='white';}
        if ($kind=='up'){$color='whitesmoke';}
	}	
    elseif ($letterkind==2){
        if ($kind=='down'){$color='lavenderblush';}
        if ($kind=='up'){$color='mistyrose';}
	}	
    elseif ($letterkind==3){
        if ($kind=='down'){$color='f3ffff';}
        if ($kind=='up'){$color='eeffff';}
	}	
    elseif ($letterkind==4){
        if ($kind=='down'){$color='fffff5';}
        if ($kind=='up'){$color='ffffcd';}
	}	
    return $color;	
}
function seecolor($fornot,$kind='basic'){
    $seecolor="";
       if ($fornot==1){
           if ($kind=='tableup'){$seecolor='#e7e7de';}
           if ($kind=='tabledown'){$seecolor='#F1F1EC';}
           if ($kind=='listup'){$seecolor='#f3f6f6';}
           if ($kind=='listdown'){$seecolor='#E0DEDC';}
           if ($kind=='small'){$seecolor='#f6f3eb';}
           if ($kind=='basic'){$seecolor='#d5d5c4';}
           if ($kind=='strong'){$seecolor='#a08010';}

       }
       elseif($fornot==2){
           if ($kind=='tableup'){$seecolor='D9EDF9';}
           if ($kind=='tabledown'){$seecolor='aliceblue';}
           if ($kind=='listup'){$seecolor='#DAF0F9';}
           if ($kind=='listdown'){$seecolor='#DFE7F1';}
           if ($kind=='small'){$seecolor='#F3FDFD';}
           if ($kind=='basic'){$seecolor='#bae6f7';}
           if ($kind=='strong'){$seecolor='#6030ff';}
       }
       elseif($fornot==3){
           if ($kind=='tabledown'){$seecolor='ffcfcf';}
           if ($kind=='listup'){$seecolor='ff69b4';}
           if ($kind=='listdown'){$seecolor='#ffedff';}
       }
       elseif($fornot==4){
           if ($kind=='tabledown'){$seecolor='ffcfcf';}
           if ($kind=='listup'){$seecolor='#f3f6f6';}
           if ($kind=='listdown'){$seecolor='#ffedff';}
       }else{
           if ($kind=='tabledown'){$seecolor='#aed3bf';}
           if ($kind=='listup'){$seecolor='#e2f1e9';}
           if ($kind=='listdown'){$seecolor='#d8e1dc';}
           if ($kind=='small'){$seecolor='#eefbf4';}
           if ($kind=='strong'){$seecolor='#30b0a0';}

       }
       return $seecolor;
}
function tabledowncolor($fornot){
       if ($fornot==1){$seecolor='#d5d5c4';}
       elseif($fornot==2){$seecolor='aliceblue';}
       elseif($fornot==3){$seecolor='ffcfcf';}
       elseif($fornot==4){$seecolor='ffcfcf';}
       return $seecolor;
}
function listupcolor($fornot){
       if ($fornot==1){$seecolor='#f3f6f6';}
       elseif($fornot==2){$seecolor='#f3f6f6';}
       elseif($fornot==3){$seecolor='ff69b4';}
       elseif($fornot==4){$seecolor='#f3f6f6';}
       return $seecolor;
}
function listdowncolor($fornot){
       if ($fornot==1){$seecolor='#e7e7de';}
       elseif($fornot==2){$seecolor='#bae6f7';}
       elseif($fornot==3){$seecolor='#ffedff';}
       elseif($fornot==4){$seecolor='#ffedff';}
       return $seecolor;
}
function smallcolor($fornot){
       if ($fornot==1){$seecolor='#f1ece6';}
       elseif($fornot==2){$seecolor='#f3f6f6';}
       elseif($fornot==3){$seecolor='#ffedff';}
       elseif($fornot==4){$seecolor='#ffedff';}
       return $seecolor;
}


function hanchararray($string){
$string=str_replace(" ","",$string);
$length = strlen($string);
    $p=0;
    for($x=2;$x<=$length;$x=$x+2){
       $array[]=substr($string,$p,2);
       $p=$x;
    }

    return $array;

}

function showstring($string,$method){





}
function drawbox($array,$gaesa,$tablewidth){
  $si=0;
  ?>
  <table border=1 width='<?php echo$tablewidth;?>'>
  <?php
  foreach($array as $what){
      if($si%$gaesa==0){
      ?>
      <tr><td><?php echo$what;?>     </td>
      <?php
      $si=0;
      }
      elseif($si%$gaesa==($gaesa-1)){
      ?>
      <td> <?php echo$what;?>     </td></tr>
      <?php
      }else{
      ?>
      <td> <?php echo$what;?>     </td>
      <?php
      }
      $si=$si+1;
  }
  if ($si<$gaesa){
      for ($x=0;$x<$gaesa-$si;$x++){
      ?>
      <td bgcolor='eeeeee'>&nbsp; </td>
      <?php
      }
      ?>
      </tr>
      <?php
  }
  ?>
  </table>
  <?php
}

function textronmouse(){
	////////////////서신제목위에 마우스를 올려놓으면 편지내용을 보게 하기 위한 것이다.
	
	
	?>
	<script type="text/javascript">
	function abspos(e){
		this.x = e.clientX + (document.documentElement.scrollLeft?document.documentElement.scrollLeft:document.body.scrollLeft);
		this.y = e.clientY + (document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop);
		return this;
	}
	 
	function itemClick(e,text,divname,width){
		var ex_obj = document.getElementById(divname);
		 var src ='<div style="border:1px solid#b1b1b1;margin-bottom:1px;color:black;background-color:#eeeeee;text-align:left;padding-right:5px;padding-left:5px;padding-top:5px;width:'+width+'px;">'+text+'<br/>'+'</div>';
		 ex_obj.innerHTML = src;
	 
		 if(!e) e = window.Event;
		pos = abspos(e);
		ex_obj.style.left = pos.x+"px";
		ex_obj.style.top = (pos.y+10)+"px";
		ex_obj.style.display = ex_obj.style.display=='none'?'block':'none';
	 
	}
	 
	function itemRemove(divname){
	 var ex_obj = document.getElementById(divname);
		 ex_obj.style.display = 'none';
	}
	 
	function msgmove(e,divname){
		var obj = document.getElementById(divname);
		var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
		var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft;
	 
		obj.style.top = scrollTop + e.clientY + 10 + "px";
		obj.style.left = scrollLeft + e.clientX + 10 + "px";
	}
	</script>
	<?php ///사용방법
	//<div id="lay" style="position:absolute;display:none;"></div>
	//위에 것은 반드시있다............
    //그리고 그 페이지 안에 또 밑에 것도 있다...
    //<span onmouseover="itemClick(event,'이준빈은 호박머리','lay')" onmousemove="msgmove(event,'lay')" onmouseout="itemRemove('lay')">이준빈은 호박머리 풍선도움말 예제</span> 
    
}


function imageronmouse(){
?>
<script language='Javascript'>
     document.write( '<div id=imageprint style="font-size:11pt; border:1 solid #000000; ');
     document.write( 'position:absolute; visibility:hidden; z-Index:10; padding:3; background-color:beige;"></div>' );
     function imagebodyprint(txtin,closeview){
          if(closeview==1){
               imageprint.opened = false;
               imageprint.style.visibility = 'hidden';
               return;
          }
          imageprint.opened = true;
          imageprint.style.pixelTop = event.clientY + document.body.scrollTop - 80;
          imageprint.style.pixelLeft = event.clientX + document.body.scrollLeft -500;
          imageprint.style.visibility = 'visible';
          document.all["imageprint"].innerHTML ="<img src="+"'"+"./fbox/"+txtin+"'"+ " " + "width=500"+ '>';
     }
</script>
<?php
}
function obtaindbnames(){
global $connection;
  $dbnames= mysql_list_dbs($connection);
  $i = 0;
  $cnt = mysql_num_rows($dbnames);
  while ($i < $cnt) {
      $dbarray[]=mysql_db_name($dbnames,$i);
      $i++;
  }
  return $dbarray;
}
function obtaintablenames($dbname){
global $connection;
  $tablenames= mysql_list_tables($dbname,$connection);
  $i = 0;
  $cnt = mysql_num_rows($tablenames);
  while ($i < $cnt) {
      $tablearray[]=mysql_db_name($tablenames,$i);
      $i++;
  }
  return $tablearray;
}
function obtaintablebyfield($dbname,$fieldname){
global $connection;
global $dbname;
dbconnection();
   $tablenames= mysql_list_tables($dbname,$connection);
   $i = 0;
   $cnt = mysql_num_rows($tablenames);
   dbconnection();
   while ($i < $cnt) {
      $tablename=mysql_db_name($tablenames, $i);
      $result=mysql_query("select * from $tablename");
      if ($result){
         $fieldsu=mysql_num_fields($result);
         for ($x=0;$x<$fieldsu;$x++){
            $string=mysql_field_name($result,$x);

            if($fieldname==$string){
               $tablearray[]=$tablename;
            }
         }
      }
      $i++;
   }
   return $tablearray;
}
function wsstring($ws){
    if($ws==1){
        $wsstring="출원인";
    }		
    if($ws==2){
        $wsstring="대리인";
    }		
    return $wsstring;

}
function obtainoptionstring($tablename,$fieldname,$wherestring,$orderstring,$firststring){
	global $connection;
	global $dbname;

	$query="";
	$sidestring="";
    if(strlen(trim($wherestring))>0){
        $query="select $fieldname from $tablename where $wherestring $orderstring";
    }else{
        $query="select $fieldname from $tablename $orderstring";
    }

    $result=$connection->query($query);
    if ($result){
        if ($result->num_rows > 0){
            while($row=$result->fetch_row()){
                if(strlen(trim($row[0]))>0){
                    $sidestring.='<option>'.$row[0];
                }
            }
            if($firststring){
		        $firststring='기재없음';
                $sidestring="<option>$firststring".$sidestring;
		    }
            return $sidestring;
        }
    }
}
function maxfield($tablename,$fieldname,$wherestring){//제일큰값,최대값,
global $connection;
global $dbname;
dbconnection();
    if(strlen(trim($wherestring))>0){
        $query = "select max($fieldname) from $tablename where $wherestring";
    }else{
        $query = "select max($fieldname) from $tablename";

    }
    $result = $connection->query($query);
    if ($result){
                 $row=$result->fetch_row();
                 return stripslashes($row[0]);
    }

}
function minfield($tablename,$fieldname,$wherestring){ //제일큰값,최소값,
global $connection;
global $dbname;
dbconnection();
    if(strlen(trim($wherestring))>0){
        $query = "select min($fieldname) from $tablename where $wherestring";
    }else{
        $query = "select min($fieldname) from $tablename";

    }
    $result = $connection->query($query);
    if ($result){
        $row=$result->fetch_row();
        return stripslashes($row[0]);
    }

}

function sumfield($tablename,$fieldname,$wherestring){
global $connection;
global $dbname;
dbconnection();
    if(strlen(trim($wherestring))>0){
        $query = "select sum($fieldname) from $tablename where $wherestring";
    }else{
        $query = "select sum($fieldname) from $tablename";

    }
    $result = $connection->query($query);
    if ($result){
                 $row=$result->fetch_row();
                 return stripslashes($row[0]);
    }
}

function nextfield($tablename,$fieldname,$wherestring){
	global $connection;
	global $dbname;
	dbconnection();

    $query = "select count(*) from $tablename where $wherestring";
    $result = $connection->query($query);
    if ($result){
        $row_num=$result->num_rows;
        if ($row_num>0){
            $query = "select min($fieldname) from $tablename where $wherestring";
            $result = $connection->query($query);
            $row=$result->fetch_row();
            $nextfield=$row[0];
        }
    }
    if(strlen(trim($nextfield))>>0){
        return stripslashes($nextfield);
    }else{
        return obtainlaststring($wherestring,'>');
    }

}
function beforefield($tablename,$fieldname,$wherestring){
	global $connection;
	global $dbname;
	dbconnection();
	$beforefield="";
    $query = "select count(*) from $tablename where $wherestring";
    $result = $connection->query($query);
    if ($result){
        $row_num=$result->fetch_row();
        if ($row_num[0]>0){
            $query = "select max($fieldname) from $tablename where $wherestring";
            $result =$connection->query($query);
			if($result){
                $row=$result->fetch_row();
                $beforefield=$row[0];
			}
        }
    }
    if(strlen(trim($beforefield))>0){
        return stripslashes($beforefield);
    }else{
        return obtainlaststring($wherestring,'<');
    }
}
function distinctfield($tablename,$fieldname,$wherestring){
	global $connection;
	global $dbname;
	dbconnection();
	$resultarray=array();
    if(strlen(trim($wherestring))>0){
        $query="select DISTINCT $fieldname from $tablename where $wherestring";
    }else{
        $query="select DISTINCT $fieldname from $tablename";
    }
    $result = $connection->query($query);
    if ($result){
        while($row=$result->fetch_row()){
            $resultarray[]=$row[0];
        }
    }
    return $resultarray;
}
function grimornot($filename){
  $fileex=fileextention($filename);
  $fileex=strtolower($fileex);
  if(  ($fileex=='jpg') ||  ($fileex=='gif')  ||  ($fileex=='png') ||  ($fileex=='bmp') ) {
      return true;
  }else{
      return false;
  }
}
function pdffileornot($filename){
  $filekind=explode('.',$filename);
  $filekind[1]=strtolower($filekind[1]);
  if(  $filekind[1]=='pdf'  ) {
      return true;
  }else{
      return false;
  }
}

function obtainwhatcha($regdate,$getdate){
   $regdate_1=substr($regdate,0,4);
   $regdate_2=substr($regdate,4,2);
   $regdate_3=substr($regdate,6,2);
   $getdate_1=substr($getdate,0,4);
   $getdate_2=substr($getdate,4,2);
   $getdate_3=substr($getdate,6,2);
   $xcha=$getdate_1-$regdate_1;
   if ($getdate_2<$regdate_2){
      $resultcha=$xcha;
   }
   elseif ($getdate_2==$regdate_2){
      if ($getdate_3>$regdate_3){
         $resultcha=$xcha+1;
      }else{
         $resultcha=$xcha;
      }
   }
   elseif ($getdate_2>$regdate_2){
      $resultcha=$xcha+1;
   }
   return $resultcha;
}
function obtainchafromdate($regdate,$whatcha){
   $cha=$whatcha-1;
   $chafromdate=datekal($regdate,$cha,0,1);
   $chatodate=datekal($regdate,$whatcha,0,0);
   return $chafromdate;
}
function obtainchatodate($regdate,$whatcha){
   $cha=$whatcha-1;
   $chafromdate=datekal($regdate,$cha,0,0);
   $chatodate=datekal($regdate,$whatcha,0,0);
   return $chatodate;
}
function obtainchuchatodate($regdate,$whatcha){
   $cha=$whatcha-1;
   $chuchatodate=datekal($regdate,$whatcha,6,0);
   return $chuchatodate;
}
function getm(){
    $string="";
	if(isset($_GET)){
		foreach($_GET as $key  => $value){
			
			$string.='&'.$key.'='.$value;
		}
		return $string;
	}
}
function postm(){
    $string="";
    if (isset($_POST)){
		foreach($_POST as $key  => $value){
			if(is_array($value)){
				foreach($value as $k  => $v){
					$string.='&'.$k.'='.$v;
				}
			}else{
				$value=str_replace('"','&#034',$value);
                $value=str_replace("'",'&#039',$value);
                $value=str_replace("`",'&#096;',$value);
				$string.='&'.$key.'='.$value;
			}
		   
		}
	}
    return $string;
}



function makeaddstring($string){  
    //   "a=2,b=6"-----------> "&a=2&b=6"
    $addstring="";
	if(!isset($whd)){$whd=1;}
    $xarray=explode(',',$string);
    $xtip='&';
    foreach($xarray as $whatx){
        if(strlen(trim($whatx))>0){
            if(strstr($whatx,'=')){
                $yarray=explode('=',$whatx);
                if($yarray[1]){
                    $addstring.=$xtip.$whatx;
                }
            }else{ 
			    if(!isset($GLOBALS["$whatx"])){$GLOBALS["$whatx"]='';}
                if(isset($GLOBALS[$whatx])){
                    $addstring.=$xtip.$whatx.'='.$GLOBALS["$whatx"];
                }
            }
        }
    }
    return $addstring;
}
function makeaddpost($string){
   $addstring="";
   $xarray=explode(',',$string);
   $xtip='&';
   foreach($xarray as $whatx){
     if(strlen(trim($whatx))>0){
       if(strstr($whatx,'=')){
          $yarray=explode('=',$whatx);
          if($yarray[1]){
              $addstring.=$xtip.$whatx;
          }
       }else{
         if(   isset($_POST["$whatx"])  ){
           $addstring.=$xtip.$whatx.'='.$_POST["$whatx"];
         }
       }
     }
   }
   return $addstring;
}
function makeaddget($string){
   $addstring="";
   $xarray=explode(',',$string);
   $xtip='&';
   
   foreach($xarray as $whatx){
     if(strlen(trim($whatx))>0){
       if(strstr($whatx,'=')){
          $yarray=explode('=',$whatx);
          if($yarray[1]){
              $addstring.=$xtip.$whatx;
          }
       }else{
         if(isset($_GET["$whatx"])){
           $addstring.=$xtip.$whatx.'='.$_GET["$whatx"];
         }
       }
     }
   }
   return $addstring;
}

function makemyarray($varstring){
	///////// ""&a=2&b=6"-----------> " array([a]=>2 [b]=>6) "
    $xarray=array();
	$what=array();
    $postvararray=explode('&',$varstring);
    foreach($postvararray as $whatpost){
        $what=explode('=',$whatpost);		
        if( (isset($what[1])) &&  (strlen(trim($what[1]))>0)  ){
            if((isset($what[0])) &&  (strlen(trim($what[0]))>0) ){
                $xarray[$what[0]]=$what[1];
            }
        }
    }
    return $xarray;
}

function makepostform($formid,$filename,$actionname,$postvar,$getvar){
  $postvararray=makemyarray($postvar);
  $getvararray=makemyarray($getvar);

  ?>
  <center>
     <form name=form<?php echo$formid;?> method=post  style='margin-bottom:0;margin-top:0' action='<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$getvar;?>' style='margin-bottom:0;margin-top:0'>
     <table border=0 cellspacing=0 cellpadding=0>
     <tr><td>
     <?php
     if($postvararray){
       foreach($postvararray as $key => $value ){
        ?>
        <input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
        <?php

       }
     }
     ?>
     </td>
     <td><input type=submit name=submitbutton value='입력'></td>
     </tr>

     </table>
     </form>
  </center>
  <?php
}

function transferform($formid,$actionand,$postvar){
    $postvararray=makemyarray($postvar);
    ?>

    <form name='sendform_<?php echo$formid;?>'  method=post style='margin-bottom:0;margin-top:0'action='<?php echo$_SERVER['SCRIPT_NAME'];?><?php if($actionand){?>?a=<?php echo$actionand;?><?php }?>'>
    <input type=hidden name=<?php echo$hiddenname;?> value="<?php echo$hiddenvalue;?>">
        <?php
        if($postvararray){
            foreach($postvararray as $key => $value ){
            ?>
            <input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
            <?php
        }
    }
    ?>
    </form>
    <script>
        sendform_<?php echo$formid;?>.submit();
    </script>
    <?php

}


function makeform($formid,$filename,$actionname,$postvar,$getvar,$buttonname,$buttonvar){
    $postvararray=makemyarray($postvar);
    $getvararray=makemyarray($getvar);
    $buttonvararray=makemyarray($buttonvar);
	$getstring="";
    if($getvararray){
        foreach($getvararray as $key =>$value){
            $getstring.='&'.$key.'='.$value;

        }
    }
  ?>
  <script>
     function formsend<?php echo$formid;?>(x){
        form<?php echo$formid;?>.<?php echo$buttonname;?>.value=x;
        form<?php echo$formid;?>.submit();
     }
  </script>
  <center>
     <form name=form<?php echo$formid;?> method=post action='<?php echo $_SERVER['SCRIPT_NAME'];?>?a=<?php echo$actionname;?><?php echo$getstring;?>' style='margin-bottom:0;margin-top:0'>
     <table border=0 cellspacing=0 cellpadding=0>
     <tr><td>
     <?php
     if($postvararray){
       foreach($postvararray as $key => $value ){
        ?>
        <input type=hidden name=<?php echo$key;?> value='<?php echo$value;?>'>
        <?php

       }
     }
     ?>
     </td>
     <input type=hidden name=<?php echo$buttonname;?> value=''>
     <?php

     if($buttonvararray){
       foreach($buttonvararray as $key => $value){
         if($key){
           ?>
           <td>
           <input type=button name=submitbutton value='<?php echo $key;?>' onclick="formsend<?php echo$formid;?>(<?php echo$value;?>);">
           </td>
           <?php
         }
       }
     }
     ?>
     </td>
     </tr>
     </table>
     </form>
  </center>
  <?php
}

function makeunset($string){
   $xarray=explode(',',$string);
   foreach($xarray as $whatx){
     unset($$whatx);
   }
}
function makefromdate(){
   $fromdate=$_POST[fromdate_1].$_POST[fromdate_2].$_POST[fromdate_3];
   return $fromdate;
}
function maketodate(){
   $todate=$_POST[todate_1].$_POST[todate_2].$_POST[todate_3];
   return $todate;
}
function datearray($su=6){
   if(!isset($todaydate)){$todaydate=date('Ymd');}
   $datearray=array();
   $datearray[]=$todaydate;
   $arraysu=0;
   while($arraysu<=$su){
	   $todaydate=beforeday($todaydate);
	   $datearray[]=$todaydate;
	   $arraysu=count($datearray);
   }
   return $datearray;
	
	
}
function obtainstartday($todaydate){
          if(!$todaydate){$todaydate=date('Ymd');}
          $yesterday=beforeday($todaydate);
          $gongarray=gongdate($todaydate);
          if( (in_array($yesterday,$gongarray))  || (obtainyoil($yesterday)==0) || (obtainyoil($yesterday)==6) ) {
             $startworkday=$yesterday;
             while(in_array($startworkday,$gongarray)  || (obtainyoil($startworkday)==0) || (obtainyoil($startworkday)==6) ){
                $beforeday=beforeday($startworkday);
                if( (in_array($beforeday,$gongarray))  || (obtainyoil($beforeday)==0) || (obtainyoil($beforeday)==6) ){
                   $startworkday=beforeday($startworkday);
                }else{
                   break;
                }
             }

          }else{
             $startworkday=$todaydate;
          }
          return $startworkday;
}
function lunartosola($yyyymmdd){
	$getYEAR = substr($yyyymmdd,0,4);
	$getMONTH = substr($yyyymmdd,4,2);
	$getDAY = substr($yyyymmdd,6,2);

	$arrayDATASTR = sunlunar_data();
	$arrayDATA = explode("-",$arrayDATASTR);

	$arrayLDAYSTR="31-0-31-30-31-30-31-31-30-31-30-31";
	$arrayLDAY = explode("-",$arrayLDAYSTR);

	$arrayYUKSTR="갑-을-병-정-무-기-경-신-임-계";
	$arrayYUK = explode("-",$arrayYUKSTR);

	$arrayGAPSTR="자-축-인-묘-진-사-오-미-신-유-술-해";
	$arrayGAP = explode("-",$arrayGAPSTR);

	$arrayDDISTR="쥐-소-호랑이-토끼-용-뱀-말-양-원숭이-닭-개-돼지";
	$arrayDDI = explode("-",$arrayDDISTR);

	$arrayWEEKSTR="일-월-화-수-목-금-토";
	$arrayWEEK = explode("-",$arrayWEEKSTR);

	if ($getYEAR <= 1881 || $getYEAR >= 2050) { //년수가 해당일자를 넘는 경우
		$YunMonthFlag = 0;
		return false; //년도 범위가 벗어남..
	}
	if ($getMONTH > 12) { // 달수가 13이 넘는 경우
		$YunMonthFlag = 0;
		return false; //달수 범위가 벗어남..
	}

	$m1 = $getYEAR - 1881;

	if (substr($arrayDATA[$m1],12,1) == 0) { // 윤달이 없는 해임
	$YunMonthFlag = 0;
	} else {
		if (substr($arrayDATA[$m1],$getMONTH, 1) > 2) {
			$YunMonthFlag = 1;
		} else {
			$YunMonthFlag = 0;
		}
	}

	$m1 = -1;
	$td = 0;

	if ($getYEAR > 1881 && $getYEAR < 2050) {
		$m1 = $getYEAR - 1882;
		for ($i=0;$i<=$m1;$i++) {
			for ($j=0;$j<=12;$j++) {
				$td = $td + (substr($arrayDATA[$i],$j,1));
			}

			if (substr($arrayDATA[$i],12,1) == 0) {
				$td = $td + 336;
			} else {
				$td = $td + 362;
			}
		}
	} else {
		$gf_lun2sol = 0;
	}

	$m1++;
	$n2 = $getMONTH - 1;
	$m2 = -1;

	while(1) {
		$m2++;
		if (substr($arrayDATA[$m1], $m2, 1) > 2) {
			$td = $td + 26 + (substr($arrayDATA[$m1], $m2, 1));
			$n2++;
		} else {
			if ($m2 == $n2) {
				if ($gf_yun) {
					$td = $td + 28 + (substr($arrayDATA[$m1], $m2, 1));
				}
			break;

			} else {
				$td = $td + 28 + (substr($arrayDATA[$m1], $m2, 1));
			}
		}
	}

	$td = $td + $getDAY + 29;
	$m1 = 1880;

	while(1) {
		$m1++;
		if ($m1 % 400 == 0 || $m1 % 100 != 0 && $m1 % 4 == 0) {
			$leap = 1;
		} else {
			$leap = 0;
		}

		if ($leap == 1) {
			$m2 = 366;
		} else {
			$m2 = 365;
		}

		if ($td < $m2) break;

		$td = $td - $m2;
	}

	$syear = $m1;
	$arrayLDAY[1] = $m2 - 337;

	$m1 = 0;

	while(1) {
		$m1++;
		if ($td <= $arrayLDAY[$m1-1]) {
			break;
		}
		$td = $td - $arrayLDAY[$m1-1];
	}
	$smonth = $m1;
	$sday = $td;
	$y = $syear - 1;
	$td = intval($y*365) + intval($y/4) - intval($y/100) + intval($y/400);

	if ($syear % 400 == 0 || $syear % 100 != 0 && $syear % 4 == 0) {
		$leap = 1;
	} else {
		$leap = 0;
	}

	if ($leap == 1) {
		$arrayLDAY[1] = 29;
	} else {
		$arrayLDAY[1] = 28;
	}

	for ($i=0;$i<=$smonth-2;$i++) {
		$td = $td + $arrayLDAY[$i];
	}

	$td = $td + $sday;
	$w = $td % 7;

	$sweek = $arrayWEEK[$w];
	$gf_lun2sol = 1;

	if($smonth<10) $smonth="0".$smonth;
	if($sday<10) $sday="0".$sday;

	$Ary[year]=$syear;
	$Ary[month]=$smonth;
	$Ary[day]=$sday;
	$Ary[time]=mktime(0,0,0,$Ary[month],$Ary[day],$Ary[year]);
	return $Ary;
}

function obtaindate($tdate){
    $gu=lun2sol($tdate);
    $guarray=explode('|',$gu);
    $endsu=count($guarray);
    $gusol='';
    for ($i=0;$i<$endsu-1;$i++){
        if (strlen($guarray[$i])==1){
            $gusol.='0'.$guarray[$i];
        }else{
            $gusol.=$guarray[$i];
        }
    }
    return $gusol;
    $tdate='';
}

function strip_tags_except($text, $allowed_tags, $strip=TRUE) {
  if (!is_array($allowed_tags))
    return $text;

  if (!count($allowed_tags))
    return $text;

  $open = $strip ? '' : '&lt;';
  $close = $strip ? '' : '&gt;';

  preg_match_all('!<\s*(/)?\s*([a-zA-Z]+)[^>]*>!',
    $text, $all_tags);
  array_shift($all_tags);
  $slashes = $all_tags[0];
  $all_tags = $all_tags[1];
  foreach ($all_tags as $i => $tag) {
    if (in_array($tag, $allowed_tags))
      continue;
    $text =
      preg_replace('!<(\s*' . $slashes[$i] . '\s*' .
        $tag . '[^>]*)>!', $open . '$1' . $close,
        $text);
  }

  return $text;
}

function url_to_link($text) {
  $text =
    preg_replace('!(^|([^\'"]\s*))' .
      '([hf][tps]{2,4}:\/\/[^\s<>"\'()]{4,})!mi',
      '$2<a href="$3">$3</a>', $text);
  $text =
    preg_replace('!<a href="([^"]+)[\.:,\]]">!',
    '<a href="$1">', $text);
  $text = preg_replace('!([\.:,\]])</a>!', '</a>$1',
    $text);
  return $text;
}
function removeAttributes($htmlText){
       $stripAttrib = "'\\s(class)=\"(.*?)\"'i"; //remove classes from html tags;
       $htmlText = stripslashes($htmlText);
       $htmlText = preg_replace($stripAttrib, '', $htmlText);
       $stripAttrib = "/(font\-size|color|font\-family|line\-height):\\s".
              "(\\d+(\\x2E\\d+\\w+|\\W)|\\w+)(;|)(\\s|)/i";
//remove font-style,color,font-family,line-height from style tags in the text;
       $htmlText = stripslashes($tagSource);
       $htmlText = preg_replace($stripAttrib, '', $htmlText);
       $htmlText = str_replace(" style=\"\"", '', $htmlText); //remove empty style tags, after the preg_replace above (style="");
       return $htmlText;
}
function removeeviltags($source){
   return preg_replace('/<(.*?)>/ie', "'<'.removeEvilAttributes('\\1').'>'", $source);
}
function dirfile($dirpath){
    $filearray=array();
    if (($handle=opendir($dirpath))){
        while ($node = readdir($handle)){
            $nodebase = basename($node);
            if (  ($nodebase!='.') && ($nodebase!='..')  ){
                $filearray[]=$nodebase;
            }
        }
    }
    return $filearray;
}
function dirfilelist($dir) {
    $d = dir($dir);
    while (false !== ($entry = $d->read())) {
        if($entry != '.' && $entry != '..' && is_dir($dir.$entry))
            $arDir[$entry] = dirfilelist($dir.$entry.'/');
    }
    $d->close();
    return $arDir;
}
function key_right($formname,$fieldname,$nfieldname){
     ?>
     if(event.keyCode ==39 && b=='<?php echo$fieldname;?>'){
        <?php echo$formname;?>.<?php echo$nfieldname;?>.focus();
     }
     <?php
}
function key_left($formname,$fieldname,$nfieldname){
     ?>
     if(event.keyCode ==37 && b=='<?php echo$fieldname;?>'){
        <?php echo$formname;?>.<?php echo$nfieldname;?>.focus();
     }
     <?php
}
function key_up($formname,$fieldname,$nfieldname){
     ?>
     if(event.keyCode ==38 && b=='<?php echo$fieldname;?>'){
        <?php echo$formname;?>.<?php echo$nfieldname;?>.focus();
     }
     <?php
}
function key_down($formname,$fieldname,$nfieldname){
     ?>
     if(event.keyCode ==40 && b=='<?php echo$fieldname;?>'){
        <?php echo$formname;?>.<?php echo$nfieldname;?>.focus();
     }
     <?php
}
function searchform($idsignal,$filename,$actionname,$addstring){
if(!isset($filename)){$filename=$_SERVER['SCRIPT_NAME'];}
if(!isset($actionname)){$actionname=$_REQUEST['a'];}
?>
<script>
   function nowcheck_<?php echo$idsignal;?>(){
    if (trim(searchform_<?php echo$idsignal;?>.searchword.value)==''){window.alert('검색어가 없습니다!'); searchform_<?php echo$idsignal;?>.searchword.focus(); return false; }
   }
</script>
<form name=searchform_<?php echo$idsignal;?> method=post style='margin-bottom:0;margin-top:0' action="<?php echo$filename;?>?a=<?php echo$actionname;?><?php if(strlen(trim($addstring))>0){echo$addstring;}?>" onsubmit='return nowcheck_<?php echo$idsignal;?>();'>
<input type=hidden name=idsign value='<?php echo$idsignal;?>'>
<input type=text name=searchword size=19 style='font-size:9pt;font-family:gothic;color:black;background-color:white;border-width:1;border-color:gray;border-style:solid;'>
</form>
<?php
}

function searchtableform($idsignal,$string,$filename,$actionname,$addstring){
	if(!$filename){$filename=$_SERVER['SCRIPT_NAME'];}
	if(!$actionname){$actionname=$_REQUEST['a'];}
    if(strlen(trim($addstring))>0){
        if(substr($addstring,0,1)!="&"){
            $addstring="&".$addstring;
        }
    }
	$magpng="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";
	?>
	<script>
	    function nowcheck_<?php echo$idsignal;?>(){
		    if (trim(searchform_<?php echo$idsignal;?>.searchword.value)==''){window.alert('검색어가 없습니다!'); searchform_<?php echo$idsignal;?>.searchword.focus(); return false; }
	    }
	</script>
	<center>
	<table border=0 style="border:0px solid green;">
	    <tr>
		<td><img src="data:image/png;base64,<?php echo $magpng;?>" width=20 border=0><?php echo$string;?></td>
	    <td>
	    <form name=searchform_<?php echo$idsignal;?> method=post style='margin-bottom:0;margin-top:0' action="<?php echo$filename;?>?a=<?php echo$actionname;?><?php if(strlen(trim($addstring))>0){echo$addstring;}?>" onsubmit='return nowcheck_<?php echo$idsignal;?>();'>
	    <input type=text name=searchword size=18 style='font-size:9pt;font-family:gothic;color:black;background-color:white;border-width:1;border-color:gray;border-style:solid;'>
	    </form>
	    </td>
		</tr>
	</table>
	</center>
	<?php
}
function windowresize($a,$b){
?>
   <script>
      function resizeme(){
        self.resizeTo(<?php echo$a;?>,<?php echo$b;?>);
      }
      resizeme();
   </script>
<?php
}
function historygo($string){
    ?>
    <script>
    <?php
    if(  (isset($string))  &&  (strlen(trim($string))>0)  ){
    ?>
    window.alert('<?php echo$string;?>');
    <?php
    }
    ?>
    history.go(-1)
    </script>
    <?php
}

function alertgopage($alertstring,$url){
    ?>
    <script>
        window.alert('<?php echo$alertstring;?>');
        this.window.location.replace('<?php echo$url;?>');
    </script>
    <?php
}

function gopageonly($url){
    ?>
    <script>
        this.window.location.replace('<?php echo$url;?>');
    </script>
    <?php
}


function simplewarning($string,$gobackornot=2){
     ?>
     <script>
     window.alert('<?php echo$string;?>');
     <?php
     if($gobackornot==1){
           ?>
           history.go(-1)
           <?php
     }
     ?>
     </script>
     <?php
}
function windowalert($string){
    ?>
    <script>
    window.alert('<?php echo$string;?>');
    </script>
    <?php
}

function windowfocus(){
?>
<script language='javascript'>
window.focus();
</script>
<?php
}
function windowreload(){
 ?>
 <script>
 window.opener.location.reload(true);
 </script>
 <?php
}
function windowclose(){
 ?>
 <script>
 window.close();
 </script>
 <?php
}

function windowreloadclose(){
 ?>
 <script>
 window.opener.location.reload(true);
 window.close();
 </script>
 <?php
}
function windowdelete($openertrueornot){
   ?>
   <script language='javascript'>
   <?php
   if ($openertruornot=='ok'){
      ?>
      opener.document.reload(true);
      <?php
   }
   ?>
   window.close();
   </script>
   <?php
}
function nextconfirmsubmit($idstring,$string,$url){
?>
   <script>
      function gourl_<?php echo$idstring;?>(){
         history.go(-1);
      }
      function beforesubmit_<?php echo$idstring;?>(){
         if( confirm('<?php echo$string;?>') ){
         } else {
            gourl_<?php echo$idstring;?>();
            return false;
         }
      }
      beforesubmit_<?php echo$idstring;?>();
   </script>
<?php
}
function beforesubmit($idstring,$string){
    ?>
    <script>
        function beforesubmit_<?php echo$idstring;?>(){
            if( confirm('<?php echo$string;?>') ){

            } else {
                return false;
            }
        }
    </script>
    <?php
}
function beforedelete(){
?>
   <script>
          function beforedelete(){
                if( confirm('정말 삭제하시겠습니까?') ){

                } else {
                        return false;
                }
          }
   </script>
<?php
}

function bodystring($t,$l,$r,$onloadstring){
        ?>
        <body topmargin='<?php if(!$t){?>0<?php }else{echo$t;}?>' leftmargin='<?php if(!$l){?>0<?php }else{echo$l;}?>' rightmargin='<?php if(!$r){?>0<?php }else{echo$r;}?>' <?php if(strlen(trim($onloadstring))>0){?> onload='<?php echo$onloadstring;?>'<?php }?>>
        <?php
}
function whd($whd=1){
           global $id;
           if ($whd==1){
                   head();
           }
}

function printerwinclose(){
?>
          <div class='noprint'>
             <center>
             <table width=100% border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'><tr>
             <td align=left>
             <?php
             printerbutton();
             printspace(19,19,19,19,'','');
             ?>
             </td>
             <td align=right>
                <img src='./icons/exiticon.gif' border=0> <input type='reset' value='창닫기' onClick='window.close()' style='font-size:12; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>

             </td>
             </tr>
             </table>
             </center>
          </div>

<?php
}

/////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////



function askfordata($tablename){
global $connection,$dbname;
   $dirpath='./officetxt';
   $dirname='officetxt';
   $filename="./$dirname/$tablename.txt";

   if(!file_exists("./$dirname/")){
        makenewdir($dirname);
   }
   if(!file_exists($filename)){
        makenewfile($filename);
   }



    dbconnection();

    $query = "select count(*) from $tablename";
    $result = $connection->query($query);
    if ($result){
            $total=$result->fetch_row();
            if ($total[0]<1){
                    ?>
                    <br><br><br><br><center>데이타베이스에 국내고객정보가 없습니다. 처음으로 정보를 넣으시겠습니까?=> 그러시려면 <a href='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=customform&whd=1'><font color=red>여기</font></a>를 눌러주세여!!!</center><br><br>
                    <?php
                    if(file_exists($filename)){
                          $fp=fopen($filename,'r');
                          if(filesize($filename)>0){
                                 $list=fread($fp,filesize($filename));
                                 fclose($fp);
                                 if(strlen(trim($list))>0){
                                        ?>  <center>
                                        국내고객정보텍스트파일의 파일데이타로 국내고객정보 sql데이타를 구성하시겠습니까?=>그러시려면 <a href='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=txttotable&tablename=<?php echo$tablename;?>'><font color=red>여기 </font></a>를 눌러주세여!!!</center>
                                        <?php
                                 }else{
                                        /*사무소정보텍스트파일의 내용이 없음*/
                                 }
                          }else{
                                 /*사무소정보텍스트파일이 없음*/
                          }
                    }
                    exit;
            }else{

                    /*사무소테이블에 데이타가 있음*/
            }
    }else{
            exit;
    }

}
function prioritywinscript($fornot){
global $connection,$dbname;
global $customdata,$customdata;
if($fornot==1){$customtable=$customdata;}
elseif($fornot==2){$customtable=$customdata;}

?>

<SCRIPT LANGUAGE="JavaScript">
function prioritywin(){

 winW=500;//새창의 너비
 winH=230;//새창의 높이
 stringa="width="+winW+",height="+winH+",left="+0+",top="+0;
 popup=window.open("","mywin",stringa);
 popup.focus();
 popup.document.open();
 popup.document.write("<HTML><HEAD>");
 popup.document.write("<TITLE>대리인입력창</TITLE>");


 popup.document.write("</HEAD><BODY>");
 popup.document.write("<form name='priorityinsert'>");
 popup.document.write("<select name='sh' size='12' style='width:350px;'" +"ondblclick=opener.document.form2.lappstring.value=document.attinsert.sh.options[document.attinsert.sh.selectedIndex].text+'(대리인코드:'+document.attinsert.sh.options[document.attinsert.sh.selectedIndex].value+')';opener.document.form2.lappcode.value=document.attinsert.sh.options[document.attinsert.sh.selectedIndex].value;window.close();>");
                                     <?php
                                     $query = "select id,sangho from $customtable order by sangho";
                                     $result = $connection->query($query);
                                     while($row=$result->fetch_row()){
                                                $string="<option value=$row[0]>$row[1]</option>";
                                                $totalstring.=$string;
                                                ?>
                                                 popup.document.write("<?php echo$string;?>");
                                                <?php

                                     }
                                     ?>
                                     popup.document.write("</select>");
 popup.document.write("</form>");
 popup.document.write("</CENTER>");
 popup.document.write("</BODY></HTML>");
 popup.document.close();
}
</script>
<?php
}

function calwrite($varstring){
	global $connection;
	global $dbname;
	global $scheduledata;
	global $appdata;
	global $gdata;
	global $bappdata;
	global $prodata;

	parse_str($varstring);
	dbconnection();
    if (!isset($tname)){
        if ($whatitem>'90'){
            $tname='gdata';
            $xtip=1;
        }
        if (  ($whatitem>'80') && ($whatitem<'90') ){
            $tname='bappdata';
            $xtip=5;
        }
        if( $whatitem< '80' ){
            $tname=$appdata;
            $xtip=1;
        }
   }else{
        if ($tname==$gdata){$xtip=4;}
        if ($tname==$bappdata){$xtip=5;}
        if( $tname==$appdata){$xtip=1;}
   }
   if(!isset($fscomment)){$fscomment="";}
   if(!isset($firstdate)){$firstdate="";}
   if(!isset($amenddate)){$amenddate="";}
   if(!isset($timesetup)){$timesetup="";}
   if(!isset($firstdate)){$firstdate="";}
   if(!isset($deleteornot)){$deleteornot="";}
   if(!isset($deletedate)){$deletedate="";}
   if(!isset($buseo)){$buseo="";}
   if(!isset($dam)){$dam="";}
   if(!isset($_SESSION['my_session'])){$_SESSION['my_session']="";}
   
    if (  (isset($fsdate))  &&  (strlen(trim($fsdate))>0) ){
        if ($noca==1){///달력에 표시하지 말라..........
            $query="delete from $scheduledata  where fromwhere='2' and fornot='$fornot' and whatitem='$whatitem' and keyname='$idname' and keyid='$xid'";
            $result = $connection->query($query);
        }else{//달력에 표시해라....
            if(!totalornot($scheduledata,"fromwhere='2' and fornot='$fornot' and whatitem='$whatitem' and keyname='$idname' and keyid='$xid'")){
                //////fromwhere는 여기서 적는거 
				$query="insert into $scheduledata values ('','$fsdate','$fsitem','$fscomment','$timesetup','$ourref','$firstdate','$amenddate','$deleteornot','$deletedate','1','$_SESSION[my_session]','2','$whatitem','$fornot','$induskind','$tname','$idname','$xid','$buseo','$dam')";
                $result = $connection->query($query);
            }else{
                $query="update $scheduledata set fsdate='$fsdate',fsitem='$fsitem',ourref='$ourref',tname='$tname',fscomment='$fscomment',buseo='$buseo',dam='$dam' where fromwhere='2' and whatitem='$whatitem' and fornot='$fornot' and keyname='$idname' and keyid='$xid'";
                //echo $query;exit;
				$result = $connection->query($query);
            }
        }
    }else{
        $query="delete from $scheduledata  where fromwhere='2' and fornot='$fornot' and whatitem='$whatitem' and keyname='$idname' and keyid='$xid'";
        $result = $connection->query($query);
    }
}
function countryname($fornot,$countrycode){
global $connection;
global $dbname;
global $countryname;
dbconnection();
   if ($fornot==1){
      $query="select countryenname from countrycode where countrycode='$countrycode'";
   }
   elseif ($fornot==2){
      $query="select countrykrname from countrycode where countrycode='$countrycode'";
   }
   $result = $connection->query($query);
   if ($result){
      $row=$result->fetch_row();
      $countryname=$row[0];
   }
   return $countryname;
}



function obtainlastfield($tablename,$fieldname,$orderby){
	global $connection;
	global $dbname;
	dbconnection();
    if(strlen(trim($orderby))>0){
        $query="select $fieldname from $tablename $orderby  0,1 ";
    }else{
        $query="select $fieldname from $tablename";
    }
    $result = $connection->query($query);
    if ($result){
        $row=$result->fetch_row();
        return $row[0];
    }else{
        return false;
    }
}
function lastourref(){
global $connection;
global $dbname;
global $fdata;
dbconnection();
   $query="select ourref from $fdata order by foid desc limit 0,1 ";
   $result = $connection->query($query);
   if ($result){
      $row=$result->fetch_row();
      return $row[0];
   }else{
      return false;
   }
}



function xsideinsert($formname,$invarname,$varname,$sidestring,$width,$howlong,$shape){
?>
<script type='text/javascript'>
var target;
function insert<?php echo$varname;?>(jucke) {
        target=jucke
        x = (document.layers) ? loc.pageX : event.clientX;
        y = (document.layers) ? loc.pageY : event.clientY;

        <?php echo$varname;?>div.style.pixelTop        = document.body.scrollTop+y-2;
        <?php
        if ($shape==1){
        ?>
        <?php echo$varname;?>div.style.pixelLeft        = x-350;
        <?php
        }
        if ($shape==2){
        ?>
        <?php echo$varname;?>div.style.pixelLeft        = x-350;
        <?php
        }
        ?>

        <?php echo$varname;?>div.style.display = (<?php echo$varname;?>div.style.display == 'block') ? 'none' : 'block';
        show_<?php echo$varname;?>div()
        <?php echo$varname;?>div.style.display='block'
}
var stime
function doOver<?php echo$varname;?>() {
        var el = window.event.srcElement;
        cal_Day = el.title;

        if (cal_Day.length > 7) {
                el.style.borderTopColor = el.style.borderLeftColor = 'buttonhighlight';
                el.style.borderRightColor = el.style.borderBottomColor = 'buttonshadow';
        }
        window.clearTimeout(stime);
}
function doOut<?php echo$varname;?>() {

        stime=window.setTimeout("<?php echo$varname;?>div.style.display='none';", 180);
}
function obtaincode<?php echo$varname;?>(val)
{
 var x, ch;
 var i=0;
 var str="";
 var ring="코드:";
 var newVal="";
 var t=val.length;
 var index = val.indexOf(ring);
 return val.substring(index+ring.length,t-1);
}

function xobtaincode<?php echo$varname;?>(val)
{
 var x, ch;
 var i=0;
 var str='';
 var ring='코드:';
 var newVal='';
 var t=val.length;
 var index = val.indexOf(ring);
 return val.substring(0,index-1);
}
function delete<?php echo$varname;?>(){
 <?php
 if ($varname=='appstring'){
 ?>
 document.<?php echo$formname;?>.appcode.value='';
 <?php
 }
 elseif ($varname=='lappstring'){
 ?>
 document.<?php echo$formname;?>.lappcode.value='';
 <?php
 }

 ?>
 document.<?php echo$formname;?>.<?php echo$varname;?>.value='';
}

function doClick<?php echo$varname;?>(){
        var origina = document.<?php echo$formname;?>.<?php echo$varname;?>choice;
        <?php
        if ($shape==1){
        ?>
        document.<?php echo$formname;?>.<?php echo$invarname;?>.value=obtaincode<?php echo$varname;?>(origina.options[origina.selectedIndex].value);
        document.<?php echo$formname;?>.<?php echo$varname;?>.value=origina.options[origina.selectedIndex].value;
        <?php
        }
        if ($shape==2){
        ?>
        document.<?php echo$formname;?>.<?php echo$invarname;?>.value=document.<?php echo$formname;?>.<?php echo$invarname;?>.value+obtaincode<?php echo$varname;?>(origina.options[origina.selectedIndex].value)+',';
        document.<?php echo$formname;?>.<?php echo$varname;?>.value=document.<?php echo$formname;?>.<?php echo$varname;?>.value+xobtaincode<?php echo$varname;?>(origina.options[origina.selectedIndex].value)+'\r\n';
        <?php
        }
        ?>
}
</script>

<script Language='javascript'>
function show_<?php echo$varname;?>div(){
        document.all.<?php echo$varname;?>div.innerHTML="<select name=<?php echo$varname;?>choice size=<?php echo $howlong;?> style='width:<?php echo$width;?>px;'  onmouseover='doOver<?php echo$varname;?>()' onmouseout='doOut<?php echo$varname;?>()' onclick='doClick<?php echo$varname;?>()'><?php echo $sidestring;?></select>"
}
</script>

                        <div id=<?php echo$varname;?>div OnClick="this.style.display='none';" oncontextmenu='return false' ondragstart='return false' onselectstart='return false' style="background : buttonface; margin: 5; margin-top: 2;border-top: 1 solid buttonhighlight;border-left: 1 solid buttonhighlight;border-right: 1 solid buttonshadow;border-bottom: 1 solid buttonshadow;width:122;display:none;position: absolute; z-index: 99"></div>
                        <input type=button value='x' OnClick='delete<?php echo$varname;?>();'   style='font-size:7pt;border-style:solid;width:14;padding:0;cursor:hand;text-align:center;'>

                        <input type=button value='□' OnClick="insert<?php echo$varname;?>('this');"   style='font-size:7pt;border-style:solid;width:16;padding:0;cursor:hand;text-align:center;'>
<?php
}

function obtainchapay($fregid,$whatcha,$shape){
global $connection;
global $dbname;

global $annuitydata;
      $chapay=false;
dbconnection();
      $yearann='ann'.$whatcha.'thdate';
      $bquery = "select $yearann from $annuitydata where fregid='$fregid'";
      $bresult = mysql_query($bquery,$connection);
      if ($bresult){
               $brow=mysql_fetch_row($bresult);
               if (   strlen(trim($brow[0]))<1 ){
                           $chapay=false;
               }else{
                           $chapay=true;
               }
      }
      return $chapay;
}
function dateamend($getdate){//날짜가 달력에 맞지않응뻑?수정
        $yy=substr($getdate,0,4);
        $mm=substr($getdate,4,2);
        $dd=substr($getdate,6,2);
        $lastday=array(31,28,31,30,31,30,31,31,30,31,30,31);// 각 달의 마지막 날 지정
        if ((strlen($mm)==2) && (substr($mm,0,1)=='0')){$mm=str_replace('0','',$mm);}
        if($yy%4==0 && $yy%100!=0 || $yy%400==0) $lastday[1]=29;  // 윤년 계산을 통해 2월의 마지막 날 계산
        if ($dd>$lastday[$mm-1]){$dd=$lastday[$mm];}
        if (strlen($mm)=='1'){$mm='0'.$mm;}
             $xxxdate=$yy.$mm.$dd;
             return $xxxdate;
}

function arraysero($array){
    foreach($array as $w){
	    echo $w;echo'<br>';
	}
}
function commasero($string){
    $string=str_replace(",","<br>",$string);
    return $string;	
}
function gongdate($getdate){
        $array=array();
        $year=substr($getdate,0,4);
        $array[]=$year.'0101';
        $xdate=$year.'0101';
        $gusul=obtaindate($xdate);//구정
        if( strlen(trim($gusul))==8 ){
			$array[]=$gusul;
			$array[]=beforeday($gusul);
			$array[]=nextday($gusul);
		}
	
                            //음력1월1일 전후 2일
        $array[]=$year.'0301';///삼일절
        $array[]=$year.'0405';//식목일
        $ydate=$year.'0408'; 
        $suk=obtaindate($ydate); //부처님오신날                    //음력4월8일
        if( strlen(trim($gusul))==8 ){
            $array[]=$suk;
        }		
		
        $array[]=$year.'0505';//어린이날
        $array[]=$year.'0606';//현충일
        //$je=$year.'0717';  제헌절이나공휴일에서 제외
        $array[]=$year.'0815';

        $zdate=$year.'0815';
        $jung=obtaindate($zdate); 		//음력8월15일전후2일
		
		if( strlen(trim($jung))==8 ){        
			$array[]=$jung;
			$array[]=beforeday($jung);
			$array[]=nextday($jung);
		}
        
		$array[]=$year.'1003';//개천절
        $array[]=$year.'1009'; //한글날
        $array[]=$year.'1225'; //성탄절
		
		///////////
        //임시공휴일 설정하는 곳//연도까지 다 써준다.
 		//$array[]=array("20160413");
        return $array;
		
}
function gongname($getdate){
        $array=array();
        $year=substr($getdate,0,4);
        $array["신정"]=$year.'0101';
        $xdate=$year.'0101';
        $gusul=obtaindate($xdate);//구정
        if( strlen(trim($gusul))==8 ){
			$array["구정-1"]=beforeday($gusul);
			$array["구정"]=$gusul;
			$array["구정+1"]=nextday($gusul);
		}
	
                            //음력1월1일 전후 2일
        $array["삼일절"]=$year.'0301';///삼일절
        $array["식목일"]=$year.'0405';//식목일
        $ydate=$year.'0408'; 
        $suk=obtaindate($ydate); //부처님오신날                    //음력4월8일
        if( strlen(trim($gusul))==8 ){
            $array["석가탄신일"]=$suk;
        }		
		
        $array["어린이날"]=$year.'0505';//어린이날
        $array["현충일"]=$year.'0606';//현충일
        //$je=$year.'0717';  제헌절이나공휴일에서 제외
        $array["광복절"]=$year.'0815';

        $zdate=$year.'0815';
        $jung=obtaindate($zdate); 		//음력8월15일전후2일
		
		if( strlen(trim($jung))==8 ){        
			$array["중추절-1"]=beforeday($jung);
			$array["중추절"]=$jung;
			$array["중추절+1"]=nextday($jung);
		}
        
		$array["개천절"]=$year.'1003';//개천절
        $array["한글날"]=$year.'1009'; //한글날
        $array["성탄절"]=$year.'1225'; //성탄절
		


        return $array;
}


function obtainworkday($getdate){
   $xarray=gongdate($getdate);
   
   while (   (in_array($getdate,$xarray))   ||  (obtainyoil($getdate)==0)   ||  (obtainyoil($getdate)==6 )   ){
      $getdate=nextday($getdate);
   }
   return $getdate;
}
function workable($getdate){//휴일인지 여부 토요일,일요일,공휴일이면 false 그렇치않으면 true
   $xarray=gongdate($getdate);
   $work=true;
   while (   (in_array($getdate,$xarray))   ||  (obtainyoil($getdate)==0)   ||  (obtainyoil($getdate)==6 )   ){
       $work=false;
   }
   return $work;   
}

function obtainmagamdate($getdate){
   $xarray=gongdate($getdate);
   $startworkday=beforeday($getdate);
   echo $startworkday;
   if(   (in_array($startworkday,$xarray))   ||  (obtainyoil($startworkday)==0)   ){
      while (   (in_array($startworkday,$xarray))   ||  (obtainyoil($startworkday)==0)   ){
         if(    obtainyoil($startworkday)==6  ){
            if(  in_array(beforeday($startworkday),$xarray)   ){
                 $startworkday=beforeday(beforeday($startworkday));
                 break;
            }
         }else{

         }
      }
   }else{
      $startworkday=$getdate;

   }
   echo '<br>';
   echo  $startworkday;
}

function reddate($getdate,$sornot=2){
   $xarray=gongdate($getdate);
   if( (in_array($getdate,$xarray)) || ($sornot==1) ){echo '<span class=kored>'.substr($getdate,6,2).'';}
   else{
      echo ''.substr($getdate,6,2).'';
   }
}







function basicwhd($fornot,$printerornot,$whd,$idvalue,$ws,$windowkind=1){
    global $REQUEST_URI;




    if (!$whd){$whd=1;}
    if($whd==2){
       if(!$printerornot){$printerornot=1;}
    }
    if ($whd==1){


       head();
       if ( ($idvalue) && ($idvalue!='x') ){
           if($fornot==1){if(!$ws){$ws=2;}if($ws==2){headbutton($idvalue,$ws);}elseif($ws==1){fheadbutton($idvalue,$ws);}}
           elseif($fornot==2){if(!$ws){$ws=1;} iheadbutton($idvalue,$ws);}
       }
       if($printerornot==1){
          ?>
          <div class='noprint'>
             <center>
             <table width=100% border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'><tr>
             <td align=left>
             <?php
             printerbutton();
             printspace(21,19,19,19,'','');
             ?>
             </td>
             </tr>
             </table>
             </center>
          </div>
          <?php
       }
    }else{
       ?>
       <div id=dtongji class='noprint'>
       <table width=100% border=0 cellspacing=0 cellpadding=0><tr>
       <?php
       if($printerornot==1){
          ?>
          <td align=right>
          <center>
          <table width=100% border=0 cellspacing=0 cellpadding=0 style='border-collapse:collapse;'><tr>
          <td align=left>
          <?php
          printerbutton();
          printspace(21,19,19,19,'','');
          ?>
          </td>
          </tr>
          </table>
          </center>
          </td>
          <?php
       }
       ?>
       <td align=right>
         <table border=0 bgcolor=bdd5b6 cellspacing=2 <?php echo collapse;?>><tr>
       <?php
       if($whd==2){
          if($windowkind==1){
             ?>
             <td><img src='icons/exiticon.gif' border=0 valign=bottom> <input type='reset' value='부모창으로전환' onClick='opener.window.location.replace("<?php echo str_replace('&whd=2','',$_SERVER[REQUEST_URI]);?>&whd=1");window.focus();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:90;'></td>
             <td><img src='icons/exiticon.gif' border=0 valign=bottom> <input type='reset' value='부모창전환후닫음' onClick='opener.window.location.replace("<?php echo $_SERVER[REQUEST_URI];?>&whd=1");window.close();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:100;'></td>
             <?php
          }
       }
       ?>
       <td><img src='./icons/exiticon.gif' border=0 valign=bottom> <input type='reset' value='창닫기' onClick='window.close()' style='font-size:12; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
         </td></tr></table>
       </td></tr></table>
       </div>
       <?php
    }
    return $ws;
}
function rwhd($windowkind=1){
    ?>
	<div id=dtongji class='noprint'>
	<table width=100%><tr><td align=right>
    <table border=0cellspacing=2 <?php echo collapse;?>>
	<tr>
        <?php
        
        if($windowkind==1){
             ?>
             <td><img src='icons/exiticon.gif' border=0 valign=bottom> <input type='reset' value='부모창으로전환' onClick='opener.window.location.replace("<?php echo str_replace('&whd=2','',$_SERVER[REQUEST_URI]);?>&whd=1");window.focus();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:90;'></td>
             <td><img src='icons/exiticon.gif' border=0 valign=bottom> <input type='reset' value='부모창전환후닫음' onClick='opener.window.location.replace("<?php echo $_SERVER[REQUEST_URI];?>&whd=1");window.close();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:100;'></td>
             <?php
        }
       ?>
       <td><img src='./icons/exiticon.gif' border=0 valign=bottom> <input type='reset' value='창닫기' onClick='window.close()' style='font-size:12; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
         </td></tr>
    </table>
	</td></tr></table>
	</div>
    <?php
}
function parentbutton(){
   ?>
   <img src='icons/exiticon.gif' border=0> <input type='reset' value='부모창으로' onClick='opener.window.location.replace("<?php echo str_replace('&whd=2','',$_SERVER[REQUEST_URI]);?>&whd=1");window.focus();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:120;'>
   <img src='icons/exiticon.gif' border=0> <input type='reset' value='부모창으로전환후닫음' onClick='opener.window.location.replace("<?php echo $_SERVER[REQUEST_URI];?>&whd=1");window.close();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:160;'>
   <img src='./icons/exiticon.gif' border=0> <input type='reset' value='창ss닫기' onClick='window.close()' style='font-size:12; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
   <?php
}



function tableexist($tablename, $db) {
   $result = mysql_list_tables($db);
   $rcount = mysql_num_rows($result);
   // Check each in list for a match.
   for ($i=0;$i<$rcount;$i++) {
       if (mysql_tablename($result, $i)==$tablename) return true;
   }
   return false;
}

function minical($tablename,$formname){
	global $connection,$dbname;
	if (tableornot($tablename,$dbname)){
		$query = "select * from $tablename";
		$result = $connection->query($query);
		if ($result){
		    $stringarray = $result->fetch_fields();
			foreach($stringarray as $w){
				if (substr($w->name,-4)=='date'){
				    $fieldnamearray[]=$w->name;
				}
			
			}
		}
	}else{
		if (strstr($tablename, '&&')){
			$datestring=explode('&&',$tablename);
			$threecut=1;
		}
		elseif (strstr($tablename,'##')){
			$datestring=explode("##",$tablename);
			$threecut=2;
		}
	}
	?>
	<script language='javascript'>
        function onedayafter(xflag,suntak){
                <?php
                if (tableornot($tablename,$dbname)){
                  for ($d=0;$d<count($fieldnamearray);$d++){
                         ?>

                                if (xflag=="<?php echo$fieldnamearray[$d];?>"){
                                    var xyear=document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_1.value;var xmonth=document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_2.value;var xday=document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_3.value;
                                }
                         <?php
                  }
                }else{
                 if ($threecut==1){
                  for ($d=0;$d<count($datestring);$d++){
                         ?>

                                if (xflag=="<?php echo$datestring[$d];?>"){
                                    var xyear=document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_1.value;var xmonth=document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_2.value;var xday=document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_3.value;
                                }
                         <?php
                  }
                 }

                }
                ?>


                  if (xyear==""){xyear=<?php echo date("Y");?>;}if (xmonth==""){xmonth=<?php echo date("m");?>;}if (xday==""){xday=<?php echo date("d");?>;}
                  var monarr = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
                  var stringarr = new Array('00','01','02','03','04','05','06','07','08','09');
                  xmonth=eval(xmonth);
                  if (((eval(xyear) % 4 == 0) && (eval(xyear) % 100 != 0)) || (eval(xyear) % 400 == 0)) {monarr[1] = "29";}
                       if (suntak=='a'){
                             xday=eval(xday) + 1;
                             if (xday>monarr[xmonth-1]){
                                     xday=1;
                                     xmonth=eval(xmonth)+1;
                             }
                             if (xmonth>12){
                                     xmonth=1;
                                     xyear=eval(xyear)+1;
                                     }
                            }
                       else if (suntak=='b'){
                            xday=eval(xday) - 1;
                                     if (xday<1){
                                              xmonth=eval(xmonth)-1;
                                              if (xmonth<1){
                                                     xmonth=12;
                                                     xyear=eval(xyear)-1;
                                              }
                                              xday=monarr[xmonth-1];
                                     }
                       }
                <?php
                if (tableornot($tablename,$dbname)){
                  for ($d=0;$d<count($fieldnamearray);$d++){
                         ?>

                                if (xflag=="<?php echo$fieldnamearray[$d];?>"){
                                     document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_1.value=xyear;
                                     if (xmonth<10){document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_2.value=stringarr[xmonth];}else{document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_2.value=xmonth;}
                                     if (xday<10){document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_3.value=stringarr[xday];}else{document.<?php echo$formname;?>.<?php echo$fieldnamearray[$d];?>_3.value=xday;}
                                }
                         <?php
                  }
                }else{

                 if ($threecut==1){
                  for ($d=0;$d<count($datestring);$d++){
                         ?>

                                if (xflag=="<?php echo$datestring[$d];?>"){
                                     document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_1.value=xyear;
                                     if (xmonth<10){document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_2.value=stringarr[xmonth];}else{document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_2.value=xmonth;}
                                     if (xday<10){document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_3.value=stringarr[xday];}else{document.<?php echo$formname;?>.<?php echo$datestring[$d];?>_3.value=xday;}
                                }
                         <?php
                  }
                 }

                }
                ?>


	    }
	</script>
	<?php
}

function userfiletype($extension){
global $userfiletype;
/* 마임타입
MIME-Type Description File Extension
application/acad AutoCAD drawing files dwg
application/clariscad ClarisCAD files ccad
application/dxf DXF (AutoCAD) dxf
application/msaccess Microsoft Access file mdb
application/msword Microsoft Word file doc
application/octet-stream Uninterpreted binary bin
application/pdf PDF (Adobe Acrobat) pdf
application/postscript PostScript, encapsulated PostScript, ai, ps, eps
Adobe Illustrator
application/rtf Rich Text Format file rtf rtf
application/vnd.ms-excel Microsoft Excel file xls
application/vnd.ms-powerpoint Microsoft PowerPoint file ppt
application/x-cdf Channel Definition Format file cdf
application/x-csh C-shell script csh csh
application/x-dvi TeX dvi dvi dvi
application/x-javascript JavaScript source file js
application/x-latex LaTeX source file latex
application/x-mif FrameMaker MIF format mif
application/x-msexcel Microsoft Excel file xls
application/x-mspowerpoint Microsoft PowerPoint file ppt
application/x-tcl TCL script tcl
application/x-tex TeX source file tex
application/x-texinfo Texinfo (emacs) texinfo, texi
application/x-troff troff file t, tr, roff t, tr, roff
application/x-troff-man troff with MAN macros man
application/x-troff-me troff with ME macros me
application/x-troff-ms troff with MS macros ms
application/x-wais-source WAIS source file src
application/zip ZIP archive zip
audio/basic Basic audio (usually m-law) au, snd
audio/x-aiff AIFF audio aif, aiff, aifc
audio/x-wav Windows WAVE audio wav
image/gif GIF image gif
image/ief Image Exchange Format file ief
image/jpeg JPEG image jpeg, jpg jpe
image/tiff TIFF image tiff, tif
image/x-cmu-raster CMU Raster image ras
image/x-portable-anymap PBM Anymap image format pnm
image/x-portable-bitmap PBM Bitmap image format pbm
image/x-portable-graymap PBM Graymap image format pgm
image/x-portable-pixmap PBM Pixmap image format ppm
image/x-rgb RGB image format rgb
image/x-xbitmap X Bitmap image xbm
image/x-xpixmap X Pixmap image xpm
image/x-xwindowdump X Windows Dump (xwd) xwd
multipart/x-gzip GNU ZIP archive gzip
multipart/x-zip PKZIP archive zip
text/css Cascading style sheet css
text/html HTML file html, htm
text/plain Plain text txt
text/richtext MIME Rich Text rtx
text/tab-separated- values Text with tab-separated values tsv
text/xml XML document xml
text/x-setext Struct-Enhanced text etx
text/xsl XSL style sheet xsl
video/mpeg MPEG video mpeg, mpg, mpe
video/quicktime QuickTime video qt, mov
video/x-msvideo Microsoft Windows video avi
video/x-sgi-movie SGI movie player format movie
*/

       if (strtolower($extension)=='jpg'){$userfiletype = 'image/pjpeg';}
       elseif (strtolower($extension)=='gif'){$userfiletype = 'image/gif';}
       elseif (strtolower($extension)=='zip'){$userfiletype = 'application/x-zip-compressed';}
       elseif (strtolower($extension)=='hwp'){$userfiletype = 'application/ostet-stream';}
       elseif (strtolower($extension)=='doc'){$userfiletype = 'application/msword';}
       elseif (strtolower($extension)=='pdf'){$userfiletype = 'application/pdf';}
       elseif (strtolower($extension)=='doc'){$userfiletype = 'application/msword';}
       elseif (strtolower($extension)=='avi'){$userfiletype = 'video/x-msvideo';}
       elseif (strtolower($extension)=='mpeg'){$userfiletype = 'video/mpeg';}
       else{$userfiletype = 'application/ostet-stream';}
       return $userfiletype;
}

function tablevar($tablename){
	global $connection;
    $str="";
	$query="show columns from $tablename";
    $result=$connection->query($query);
	while($row=$result->fetch_assoc()){
		$array[]=$row['Field'];
	}
    foreach($array as $v){
		$str.="&".$v."=''";	
	}
	return $str;
}

function tablelist(){
    global $connection;
    $tablelist = array();
    $res = mysqli_query($connection,"SHOW TABLES");
    while($row = mysqli_fetch_array($res)){
        $tablelist[] = $row[0];
    }
	return $tablelist;
}
function tablesu(){
    global $connection;
    $tablelist = array();
    $res = mysqli_query($connection,"SHOW TABLES");
    return $res->num_rows;
}
function dbsu(){
    global $connection;
    $databasesu = array();
    $res = mysqli_query($connection,"SHOW databases");
    return $res->num_rows;
}
function tableornot($tablename) {
    global $connection;
    $tablelist = array();
    $res = mysqli_query($connection,"SHOW TABLES");
    while($row = mysqli_fetch_array($res)){
        $tablelist[] = $row[0];
    }

    if(in_array($tablename,$tablelist)){
        return true;
    }else{
        return false;
    }
}

function dbornot($dbname){
    global $connection;
    
/* check connection */ 
    if (!$connection) {
        return false;
    
    }else{
	    return false;
	}
}

function masterornot(){
    global $staffdata;
    if(!isset($_SESSION['my_session'])){$_SESSION['my_session']="";}
    $masterornot=obtainfield($staffdata,'masterornot',"userid='$_SESSION[my_session]'");
    if(    $masterornot==1  ){
        return true;
    }else{
	    return false;
    }
}
function noapproach(){
global $staffdata;
           if($action=='backup'){
             if($_SESSION[my_session]!='si'){
               $masterornot=obtainfield($staffdata,'masterornot',"userid='$_SESSION[my_session]'");
               if(    $masterornot!=1  ){
                   exit;
               }
             }
           }

}
function blinkstring($blinkid,$string,$kind=1){
    ?>
    <script type='text/javascript'>
        function fregkeyblink_<?php echo$blinkid;?>(){
            document.all.fregkeyword_<?php echo$blinkid;?>.style.display=document.all.fregkeyword_<?php echo$blinkid;?>.style.display==""?"none":"";
        }
        setInterval(fregkeyblink_<?php echo$blinkid;?>,2100);
    </script>
    <?php
    if($kind==1){
        ?>
        <b>키워드:&nbsp;&nbsp; </b><b><font color=red><span id='fregkeyword_<?php echo$blinkid;?>'><?php echo $string;?></font></b>
        <?php
	}
    elseif($kind==2){
        ?>
        <b><font color=red><span id='fregkeyword_<?php echo$blinkid;?>'><?php echo $string;?></font></b>
        <?php
	}

}
function colorchangestring($blinkid,$string){
    ?>
    <script type='text/javascript'>
        function fregkeyblink_<?php echo$blinkid;?>(){
            document.all.fregkeyword_<?php echo$blinkid;?>.style.color=document.all.fregkeyword_<?php echo$blinkid;?>.style.color=="red"?"black":"red";
        }
        setInterval(fregkeyblink_<?php echo$blinkid;?>,600);
    </script>
    <b><span id='fregkeyword_<?php echo$blinkid;?>'><?php echo $string;?></span></b>
    <?php
}


function collapse(){?> style='border-collapse:collapse;'<?php }

function dbsettablefields($tablename){
global $connection;
global $dbname;
   dbconnection();
   if (function_exists($tablename)){
      $x=$tablename();
      $x=nl2br($x);
      $xarray=explode("\r\n",$x);
      $xsu=count($xarray);
      for($i=1;$i<$xsu-1;$i++){
         $xxarray=explode(" ",trim($xarray[$i]));
         if( ($xxarray[0]=='index') || ($xxarray[0]=='key') || ($xxarray[0]=='primary')   ){
               break;
         }else{
               $string.=$xxarray[0].', ';
         }
      }
   }
   return $string;
}

function tablegang($tablename){
	global $connection;
	global $dbname;
    $newtablename='x'.$tablename;
    dbconnection();

    $query="rename table $tablename to $newtablename";
    $result = $connection->query($query);

    $tablename();

    $fieldsuresult=mysql_query("select * from $tablename");
    if ($fieldsuresult){
        $fieldsu=mysql_num_fields($fieldsuresult);
    }else{
        simplewarning('해당데이타베이스가 없습니다.!!');
    }
    $query = "select * from $newtablename";
    $result = $connection->query($query);
    if ($result){
        while($row=$result->fetch_assoc()){
            foreach($row as $key => $whatrow){
                $$key=str_replace("'",'&#039',stripslashes($whatrow));
            }
            for ($i=0;$i<$fieldsu;$i++){
                $string=mysql_field_name($fieldsuresult,$i);
                                      //  $GLOBALS[$string]=str_replace("'",'`',$GLOBALS[$string]);
                $$string=addslashes($$string);
                if ($i==($fieldsu-1)){
                    $totalfields.="'".$$string."'";
                }else{
                    $totalfields.="'".$$string."'".",";
                }
            }
            $aquery="insert into $tablename values ( $totalfields )";
            $aresult = mysql_query($aquery,$connection);
            $totalfields='';
        }
    }
    $bquery="drop table $newtablename";
    $bresult = mysql_query($bquery,$connection);
}

function tablefields($tablename){
global $connection;
global $dbname;
    dbconnection();
    $query="select * from $tablename";
    $result = $connection->query($query);
    if($result){
	    $stringarray=$result->fetch_fields();
		foreach($stringarray as $w){ 
		    $names.= $w->name.', ';
		}
    }
    return $names;
}

function tablefieldsarray($tablename){
global $connection;
global $dbname;
    $namearray=array();
    dbconnection();
	$query="select * from $tablename";
    $result = $connection->query($query);
    if($result){		
		$finfo = $result->fetch_fields();
		foreach ($finfo as $val) {
			$namearray[]=$val->name;
		}    		
    }
    return $namearray;
}
function tabletotxt($tablename){
global $connection;
global $dbname;
   dbconnection();
   $bb="";
   $string="";
   $fp="";
   $query = "select * from $tablename";
   $result = $connection->query($query);
   if ($result){
         $total=$result->num_rows;
   }
   $dirpath="./datatxt/";
   $dirname="datatxt";
   if (!file_exists($dirpath)){
          makenewdir($dirname);
   }
   if($total>0){
       $filename="./$dirname/$tablename.txt";
       if (!file_exists($filename)){
           makenewfile($filename);
       }
	   $finfo = $result->fetch_fields();
	   foreach ($finfo as $val) {
			$namearray[]=$val->name;
			$string=implode(",",$namearray);
	   }    
       while($row=$result->fetch_row()){
            foreach($row as $whatrow){
                $bb.=addslashes($whatrow).'|#&|';
            }
            $bb.='|#^&|';
       }
       echo$bb;
	   echo $filename;
       $fp=fopen($filename,'w');
       fwrite($fp,$string.'|#^&|'.$bb);
       fclose($fp);
   }else{
        ?>
        <script>
             window.alert('<?php echo $tablename;?> 테이블의 데이타가없습니다');
        </script>
        <?php
   }
}
function txttotable($tablename,$dirname){
global $connection;
global $dbname;
   dbconnection();
   $otainfieldsuresult=$connection->query("select * from $tablename",$connection);
   if ($otainfieldsuresult){
         $fieldsu=$obtainfieldsuresult->field_count;
   }else{
         include('./dbset.php');
   }
   if(!file_exists($dirname)){
       makenewdir($dirname);
   }
   if(strlen(trim($dirname))>0){
      $filename="./$dirname/$tablename.txt";
      if(!file_exists($filename)){
         $filename="./$tablename.txt";
      }
   }
   if (!file_exists($filename)){
          makenewfile($filename);
   }else{
       $fp=fopen($filename,'r');
       if(filesize($filename)>0){
            $list=fread($fp,filesize($filename));
			
       }
       fclose($fp);
   }
   $list=srt_replace("\n","",$list);
   $list=srt_replace("\r","",$list);
   $list=srt_replace("\r\n","",$list);
   $list=srt_replace("\n\n","",$list);
   
   $token=explode('|#^&|',$list);
   $tokensu=count($token);

   $newtable=deletelastcomma(mysqltablefields($tablename));
   $newtable=str_replace(' ','',$newtable);

   $newtablearray=explode(',',$newtable);
   $newtablesu=count($newtablearray);

   $token[0]=str_replace(' ','',$token[0]);
   $stringarray=explode(',',$token[0]);
   $stringsu=count($stringarray);

   $resultarray = array_diff($newtablearray,$stringarray);
   $keyarray=array_keys($resultarray);
   $lastfield=end($newtablearray);

   for($i=1;$i<$tokensu-1;$i=$i+1){
         $bb='';
         $tok=explode('|#&|',$token[$i]);
         for($a=0;$a<$stringsu;$a=$a+1){
             $$stringarray[$a]=$tok[$a];
         }
         foreach($newtablearray as $whatitem){
            if(strlen(trim($whatitem))>0){
               if(strlen(trim($whatitem))>0){
                 if($lastfield==$whatitem){
                   $bb.="'".str_replace("'",'&#039',stripslashes($$whatitem))."'";
                 }else{
                   $bb.="'".str_replace("'",'&#039',stripslashes($$whatitem))."',";
                 }
               }
            }
         }

         reset($newtablearray);
         $query="insert into $tablename values ($bb)";

         $result = $connection->query($query);
         $bb='';
   }

}

function tabletojultxt($tablename,$dirname){
global $connection;
global $dbname;
   dbconnection();
   $query = "select count(*) from $tablename";
   
   $result = $connection->query($query);
   if ($result){
         $row_num=$result->fetch_row();
   }
   if($row_num[0]>0){
             $filename="./$dirname/$tablename.txt";
             if (!file_exists($filename)){
                    makenewfile($filename);
             }
             $otainfieldsuresult=mysql_query("select * from $tablename");
             if ($otainfieldsuresult){
                   $fieldsu=mysql_num_fields($otainfieldsuresult);
                   for ($i=0;$i<$fieldsu;$i++){
                      if($i==($fieldsu-1)){
                         $string.=mysql_field_name($otainfieldsuresult,$i);
                      }else{
                         $string.=mysql_field_name($otainfieldsuresult,$i).',';
                      }
                   }
             }
             $query = "select concat_ws('|#&|',$string) from $tablename";
             $result = $connection->query($query);
             if ($result){
                   while($row=$result->fetch_row()){
                      $row[0]=str_replace("'",'`',$row[0]);
                      $bb.=$row[0]."\n";
                   }
             }
             $fp=fopen($filename,'w');
             fwrite($fp,$string."\n".$bb);
             fclose($fp);
   }else{
        ?>
        <script>
               window.alert('<?php echo $tablename;?> 테이블의 데이타가없습니다');
        </script>
        <?php
   }
}

function jultxttotable($tablename,$dirname){
global $connection;
global $dbname;
   dbconnection();
   $otainfieldsuresult=mysql_query("select * from $tablename",$connection);
   if ($otainfieldsuresult){
         $fieldsu=mysql_num_fields($otainfieldsuresult);
   }else{
         simplewarning('해당데이타베이스가 없습니다.!!');
   }
   $filename="./$dirname/$tablename.txt";
   if (!file_exists($filename)){
          makenewfile($filename);
   }else{
       $fp=fopen($filename,'r');
       if(filesize($filename)>0){
            $list=fread($fp,filesize($filename));
       }
       fclose($fp);
   }
   $token=explode("\n",$list);
   $tokensu=count($token);
   $string=explode(',',$token[0]);
   $stringsu=count($string);
   for($i=1;$i<$tokensu-1;$i=$i+1){
        $tok=explode('|#&|',$token[$i]);
        for($a=0;$a<$stringsu;$a=$a+1){
              $$string[$a]=$tok[$a];
              if($a==($stringsu-1)){
                 $bb.="'".$$string[$a]."'";
              }else{
                 $bb.="'".$$string[$a]."'".",";
              }
        }
        $query="insert into $tablename values ($bb)";
        $result = $connection->query($query);
        $bb='';
   }
}


function newimgsize($whereimg,$garo,$sero){
           $imgsizearray=getimagesize($whereimg);
           if (  $imgsizearray[0]>=$imgsizearray[1] ){
                ?>
                <img src="<?php echo$whereimg;?>" <?php if ( $imgsizearray[0]>$garo  ){echo "width=$garo";}else{echo "width=$imgsizearray[0]";}?> border=0>
                <?php
           }
           if (  $imgsizearray[0]<$imgsizearray[1] ){
                ?>
                <img src="<?php echo$whereimg;?>" <?php if ( $imgsizearray[1]>$sero  ){echo "height=$sero";}else{echo "height=$imgsizearray[1]";}?> border=0>
                <?php
           }
}

function openergoto($filename,$actionname,$addstring){
   if(!$filename){$filename=$_SERVER['SCRIPT_NAME'];}
   if(!$actionname){$actionname=$_REQUEST['a'];}
    ?>
    <script>
         opener.parent.location='<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>';
    </script>
    <?php
}
function parentgoto($filename,$actionname,$addstring){
   if(!$filename){$filename=$_SERVER['SCRIPT_NAME'];}
   if(!$actionname){$actionname=$_REQUEST['a'];}
   ?>
   <script language='javascript'>
      this.parent.window.location.replace('<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>');
   </script>
   <?php
}
function gobutton($filename,$actionname,$addstring,$buttonstring){
   if(!$filename){$filename=$_SERVER['SCRIPT_NAME'];}
   if(!$actionname){$actionname=$_REQUEST['a'];}
   ?>
   <a href='<?php echo$filename;?>?a=<?php echo$actionname;?><?php echo$addstring;?>'><?php echo$buttonstring;?></a>
   <?php
}
function obtainsu($whatsu,$fornot,$id){
global $connection;
global $dbname;

global $custombudata;
global $fdata;

       dbconnection();
    if ( ($fornot=='1') || ($fornot=='2')  ){
       $query = "select $whatsu from $custombudata where fornot='$fornot' and id='$id'";
       $result = $connection->query($query);
       if ($result){
            $row_num=$result->fetch_row();
            return $row_num[0];
       }
    }
    if ($fornot=='3'){
        $query = "select count(*) from $fdata where (find_in_set($id,appcode)>0) and fornot='2' and induskind='$whatsu'";
        $result = $connection->query($query);
        if ($result){
            $row_num=$result->fetch_row();
            return $row_num[0];
        }

    }
}
function mygrade(){
global $dbname,$connection;
global $staffdata;
$grade=obtainfield($staffdata,'staffgrade',"userid='$_SESSION[my_session]'");
return $grade;
}

function fileread($filename){
    if(filesize($filename)>0){
        $fp=fopen($filename,'r');
        $total=fread($fp,filesize($filename));
        fclose($fp);
	    $ex=explode("|#^^*&*#|",$total);
	    return $ex;   
    }else{
	    return false;	
	}
    
}

function filesave($filename,$how,$string){
	
   //$how r읽기전용(파일보전) w 쓰기전용(파일삭제,새로새성) a: 쓰기전용(파일보전,새로생성)	
   if(!file_exists($filename)){
      makenewfile($filename);
   }

   $fp=fopen($filename,"$how");
   fwrite($fp,$string);
   fclose($fp);
}
function filestart($filename){
   if(filesize($filename)>0){
      $fp=fopen($filename,'r');
      $total=fread($fp,filesize($filename));
      fclose($fp);
   }
   $total=str_replace('|#^^*&*##^^*&*#||#^^*&*##^^*&*#|','|#^^*&*##^^*&*#|',$total);
   $fp=fopen($filename,"w");
   fwrite($fp,$total);
   fclose($fp);
}
function fileamend($filename,$i,$string){
   if(!$i){$i=0;}
   if(filesize($filename)>0){
      $fp=fopen($filename,'r');
      $total=fread($fp,filesize($filename));
      fclose($fp);
   }
   $total=str_replace('|#^^*&*##^^*&*#||#^^*&*##^^*&*#|','|#^^*&*##^^*&*#|',$total);
   $tok=explode('|#^^*&*##^^*&*#|',$total);
   $endsu=count($tok);
   for ($x=1;$x<$endsu;$x=$x+1){
      if ($x==$i){
         $totalstring.='|#^^*&*##^^*&*#|'.$string;
      }else{
         $totalstring.='|#^^*&*##^^*&*#|'.$tok[$x];
      }
   }
   $totalstring=str_replace('|#^^*&*##^^*&*#||#^^*&*##^^*&*#|','|#^^*&*##^^*&*#|',$totalstring);
   $fp=fopen($filename,'w');
   fwrite($fp,$totalstring);
   fclose($fp);
}

function filedelete($filename,$i){
   if(!$i){$i=0;}
   if(filesize($filename)>0){
      $fp=fopen($filename,'r');
      $total=fread($fp,filesize($filename));
      fclose($fp);
   }
   $total=str_replace('|#^^*&*##^^*&*#||#^^*&*##^^*&*#|','|#^^*&*##^^*&*#|',$total);
   $tok=explode('|#^^*&*##^^*&*#|',$total);
   $endsu=count($tok);

   for ($x=1;$x<$endsu;$x++){
      if ($x==$i){
      }else{
         $totalstring.='|#^^*&*##^^*&*#|'.$tok[$x];
      }
   }
   $totalstring=str_replace('|#^^*&*##^^*&*#||#^^*&*##^^*&*#|','|#^^*&*##^^*&*#|',$totalstring);
   $fp=fopen($filename,'w');
   fwrite($fp,$totalstring);
   fclose($fp);
}

function sendpostform($formid,$actionand,$hiddenname,$hiddenvalue){
   ?>
   <body onload='sendform_<?php echo$formid;?>.submit();'>
   <form name='sendform_<?php echo$formid;?>'  method=post style='margin-bottom:0;margin-top:0'action='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=<?php echo$actionand;?>'>
   <input type=hidden name=<?php echo$hiddenname;?> value="<?php echo$hiddenvalue;?>">
   </form>
   <?php
}
function background($fornot){
   if($fornot==1){$bgcolor=smallcolor($fornot);}
   elseif($fornot==2){$bgcolor=smallcolor($fornot);}
   $background=" bgcolor=$bgcolor";
   return $background;
}


/*
function wigipart($jsfilename,$fornot,$wigimode,$formname,$contents){
if(!$fornot){$fornot=1;}
if(!$wigimode){$wigimode=1;}
if($jsfilename=='editor.js'){$rowlength=25;$rtrow=27;}
elseif($jsfilename=='leditor.js'){$rowlength=35;$rtrow=37;}
elseif($jsfilename=='wiginote.js'){$rowlength=19;$rtrow=19;}
else{$rowlength=23;}
?>
   <!--======================= DHTML을 이용한 글쓰기 폼 생성 start===============================-->
   <script language='javascript'>
      function SourceEditor(flag) {
         if( flag=='T' ) {
            document.all.tplace.style.display = '';
            document.all.dplace.style.display = 'none';
            document.<?php echo$formname;?>.wigimode.value=1;
         }
         else if( flag=='W' ) {
            document.all.tplace.style.display = 'none';
            document.all.dplace.style.display = '';
            document.<?php echo$formname;?>.wigimode.value=2;
         }else{
            document.all.tplace.style.display = "none";
            document.all.dplace.style.display = "none";
            document.<?php echo$formname;?>.wigimode.value=1;
         }
      }
      function tobold(){
         var str = document.selection.createRange().text;
         if (!str) return;else document.selection.createRange().text = '<b>' + str + '</b>'
      }
      function tounderline(){
         var str = document.selection.createRange().text;
         if (!str) return;else document.selection.createRange().text = '<u>' + str + '</u>'
      }
      function toitalic(){
         var str = document.selection.createRange().text;
         if (!str) return;else document.selection.createRange().text = '<i>' + str + '</i>'
      }
      function tosup(){
         var str = document.selection.createRange().text;
         if (!str) return;else document.selection.createRange().text = '<sup>' + str + '</sup>'
      }
      function tosub(){
         var str = document.selection.createRange().text;
         if (!str) return;else document.selection.createRange().text = '<sub>' + str + '</sub>'
      }
      function changestring(){
         changestringwindow=0;
         changestringform.changestring.value=<?php echo$formname;?>.contents.value;
         changestringwindow=window.open('','changestringwindow','width=400,height=230,top=0,left=0');
         changestringform.submit();
      }
      function dirtychange(){
         mailform.dirtyornot.value=1;
      }
   </script>

      <div class='tarea' id='tplace' style='width:630;' <?php if ( $wigimode==2 ){echo "style='display:none';";}else{echo "style='display:';";}?>>
           <table border='0' cellpadding='0' cellspacing='0' width='500'>
               <tr>
                   <td valign=top><!--<input type='image' src='images/button_wizwig.gif' onClick="SourceEditor('N')">-->
                      <table border=0 cellspacing=0 cellpadding=0>
                         <tr><td>
                             <textarea name='contents' id='textarea1' class='tarea' rows=<?php echo $rowlength;?> cols=106 style='font-size:10pt;font-family:gothic,돋음;' onchange='dirtychange();'><?php if ($wigimode==1){$contents=str_replace("%^#","'",$contents);echo $contents;}?></textarea>
                         </td></tr>
                         <tr><td>
                             <table border=0 cellspacing=0 cellpadding=2>
                             <tr>
                                 <td>
                                     <input type='button' value='wisiWIG 편집' onclick="SourceEditor('W');wigimode.click();" style="font-size:9pt;font-family:gothic;border-width:0px;border-color:#666600;border-style:solid;background-color:<?php echo seecolor($fornot,'tabledown');?>; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'listdown');?>'"  onmouseout="this.style.backgroundColor='<?php echo seecolor($fornot,'tabledown');?>'"></td>
                                 </td>
                                 <td>
                                 <input type='button' value='문자열바꿈' onclick='changestring();' style="font-size:9pt;font-family:gothic;border-width:1px;border-color:#666600;border-style:solid;width:80;background-color:'eeeeee'; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo$tabledowncolor;?>'"  onmouseout="this.style.backgroundColor='eeeeee'">
                                 </td>
                                 <td>
                                 <input type='button' value='bold' onclick='tobold();' style="font-size:9pt;font-family:gothic;border-width:1px;border-color:#666600;border-style:solid;width:40;background-color:'eeeeee'; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo$tabledowncolor;?>'"  onmouseout="this.style.backgroundColor='eeeeee'">
                                 </td>
                                 <td>
                                 <input type='button' value='밑줄' onclick='tounderline();' style="font-size:9pt;font-family:gothic;border-width:1px;border-color:#666600;border-style:solid;width:40;background-color:'eeeeee'; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo$tabledowncolor;?>'"  onmouseout="this.style.backgroundColor='eeeeee'">
                                 </td>
                                 <td>
                                 <input type='button' value='이탤릭' onclick='toitalic();' style="font-size:9pt;font-family:gothic;border-width:1px;border-color:#666600;border-style:solid;width:49;background-color:'eeeeee'; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo$tabledowncolor;?>'"  onmouseout="this.style.backgroundColor='eeeeee'">
                                 </td>
                                 <td>
                                 <input type='button' value='윗첨자' onclick='tosup();' style="font-size:9pt;font-family:gothic;border-width:1px;border-color:#666600;border-style:solid;width:58;background-color:'eeeeee'; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo$tabledowncolor;?>'"  onmouseout="this.style.backgroundColor='eeeeee'">
                                 </td>
                                 <td>
                                 <input type='button' value='아래첨자' onclick='tosub();' style="font-size:9pt;font-family:gothic;border-width:1px;border-color:#666600;border-style:solid;width:62;background-color:'eeeeee'; padding-top:2px;cursor:hand;"  onmouseover="this.style.backgroundColor='<?php echo$tabledowncolor;?>'"  onmouseout="this.style.backgroundColor='eeeeee'">

                                 </td>
                             </tr>
                             </table>
                         </td></tr>
                      </table>
                   </td>
               </tr>
           </table>
      </div>
      <div class='darea' id='dplace' style='width:630;' <?php if ( $wigimode==1 ){echo "style='display:none';";}else{echo "style='display:';";}?> style="border:1 #555555 solid; margin-left:2; margin-right:2;">
           <table border='0' cellpadding='0' cellspacing='0' width='500'>
               <tr>
                   <td valign=top><!--<input type='image' src='images/button_wizwig.gif' onClick="SourceEditor('N')">-->
                      <table border=0 cellspacing=0 cellpadding=0>
                         <tr><td>
                             <textarea name=rtcontents id='textarea2' rows=<?php echo$rtrow;?> cols=100 style='font-size: 9pt;font-family:gothic;border:0 outset rgb(255,255,255) autoscroll;none'><?php if ($wigimode==2){$contents=str_replace('%%^**##',"'",$contents);echo $contents;}?></textarea></center>
                                <script language="Javascript1.2"><!-- // load htmlarea
                                _editor_url = "";                     // URL to htmlarea files
                                var win_ie_ver = parseFloat(navigator.appVersion.split("MSIE")[1]);
                                if (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }
                                if (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }
                                if (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }
                                if (win_ie_ver >= 5.5) {
                                  document.write('<scr' + 'ipt src="' +_editor_url+ '<?php echo$jsfilename;?>"');
                                  document.write(' language="Javascript1.2"></scr' + 'ipt>');
                                } else { document.write('<scr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }
                                // --></script>


                                <script language="javascript1.2">
                                editor_generate('rtcontents');
                                </script>


                                <script language="javascript1.2">
                                var config = new Object();    // create new config object
                                config.width = "500";
                                config.height = "700";
                                config.bodyStyle = "background-color: white;font-size:9pt;font-family:'Verdana'; font-size: x-small;";
                                config.debug = 0;
                                </script>
                         </td></tr>
                         <tr><td>
                             <table border=0 cellspacing=0 cellpadding=2><tr>
                                <td>
                                    <input type='button' value='HTML 편집' onclick="SourceEditor('T');" style='border-width:0px;border-color:#666600;border-style:solid;background-color:<?php echo seecolor($fornot,'tabledown');?>; padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'listdown');?>'"  onmouseout="this.style.backgroundColor='<?php echo seecolor($fornot,'tabledown');?>'"> </td>
                                </td>
                                <td align='right'>
                                    <span class=kored><b>**<span class=kogreen> 줄바꿈은 Shift+Enter 문단바꿈은 Enter ! </b>
                                </td>
                                </tr>
                             </table>
                         </td></tr>
                      </table>
                   </td>
               </tr>
           </table>
      </div>
      <style type='text/css'>
           .tarea { width:630;  border:1 #555555 solid; }
           .darea { width:600;  border:1 #555555 solid; }
      </style>
     <!--======================= DHTML을 이용한 글쓰기 폼 생성 end================================-->
<?php
}

*/

function up_file($file,$path,$newname,$kind=1){
	//kind=1 이면같은 파일이 발견되면 오버라이트함
	//kind=2 같은파일이 있으면 올리지 않고 돌아감
	
	//$newname 이 있으면 파일명을 바꾸어버림
	//$newname이 없으면 원래의 파일명을 사용해서 올림.
	
    if( strlen(trim($file['name']))>0){
        ///*
		$extension = strrchr($file['name'], '.');//마지막 점을 포함한 확장자
        $extensionleng=strlen($extension);/// 마지막점을 포함한 확장자길이
        $front=substr($file['name'],0,-$extensionleng);//마지막점 앞쪽
        $ex=strtolower(substr($extension,1));//점을 제외한 순수확장자를 소문자화함
		//*/
		
		//$ex=strtolower(end(explode('.',$file['name'])));
        
		if(strlen(trim($newname))>0){
            $newname=$newname.'.'.$ex;
        }else{
            $newname=$file['name'];
        }
		
		$original=$newname;
		$newname=iconv("UTF-8","euc-kr",$newname); //////////////////////여기서 파일을 바꾸고
		///euc
        if($file['type']=='htm' || $file['type']=='html' || $file['type']=='php' || $file['type']=='php' || $file['type']=='jsp' || $file['type']=='asp' || $file['type']=='cgi' || $file['type']=='pl' || $file['type']=='inc'){
           ?><script> alert('업로드 불가능한 파일.'); history.go(-1); </script><?php exit;
        }
        if($file['size']>10072864){
          ?><script> alert('파일크기는 10.0 MB 까지.'); history.go(-1); </script><?php exit;
        }
        if($kind==2){
            if(file_exists($path.$newname)){
                ?><script> alert('같은 파일이 존재합니다.'); history.go(-1); </script><?php exit;
            }
        }
        if(move_uploaded_file($file['tmp_name'],$path.$newname)){
		    //$newname=iconv("euc-kr","utf-8",$newname); ////////////////////여기서 파일을 또 바꿈
			//$newname=urlencode($newname);
            return $newname;
        }else{
            ?><script> alert('파일이 있는지 확인요망.'); history.go(-1); </script><?php
        }

    }
}

function customname($id){
	return obtainfield("customer","sangho","id='$id'");		
}

function customsusin($id){  //우편라벨이나 청구서에 님자 붙이는거
	global $dbname,$connection;
	global $customdata;
	
    $query="select sangho,clas from $customdata where id='$id'";
    $result=$connection->query($query);
    if ($result->num_rows>0){
		$row=$result->fetch_row();
		if( $row[1]==1  ){
		    return $row[0]." 님";
		}else{
		    return $row[0];			
		}
       
    }	
}


function savedata($tablename,$field,$value){
	global $connection;
	$query="select * from $tablename";
    $result=$connection->query($query);
	if($result){
		$stringarray = $result->fetch_fields();	
		$totalfields="";
		if(  (isset($value)) && ($value>0)  ){
			foreach($stringarray as $w){ 
				if($w->name != $field){
					if (strlen(trim($totalfields))>0){
						if(isset($_POST["$w->name"])){
							$totalfields.=",".$w->name."="."'".$_POST["$w->name"]."'";
						}else{
							$totalfields.=",".$w->name."="."'"."'";
						}
					}else{
						if(isset($_POST["$w->name"])){
							$totalfields.=$w->name."="."'".$_POST["$w->name"]."'";
						}else{
							$totalfields.=$w->name."="."'"."'";
						}
					}
				}
			}
			$query="update $tablename set $totalfields where $field=$value";
			$result=$connection->query($query);
			return $value;
		}else{
			foreach($stringarray as $w){ 
				if (strlen(trim($totalfields))>0){
					if(isset($_POST["$w->name"])){
						$totalfields.=","."'".$_POST["$w->name"]."'";
					}else{
						$totalfields.=","."'"."'";
					   
					}
				}else{
					if(isset($_POST["$w->name"])){
						$totalfields.="'".$_POST["$w->name"]."'";
					}else{
						$totalfields.="'"."'";
					   
					}
				}
			}
			$query="insert into $tablename values ($totalfields)";
			$result=$connection->query($query);
			if($result){
				return $connection->insert_id;
			}		
		}
	}else{
	    ?>
        <script>
		     window.alert("테이블이 존재하지 않는것같습니다. 창을 닫습니다");
			 window.close();
		</script>
        <?php 		
	}
}

function saveeachdata($tablename,$mode,$firststring,$objectid){ //각항목의 데이타를 새로 저장하거나 수정함
global $dbname,$connection;
global $imsiobjectid;
dbconnection();
   $query="select * from $tablename";
   $result=$connection->query($query);
   if ($result){
      $fieldsu=mysql_num_fields($result);
   }else{
      simplewarning('해당데이타베이스가 없습니다.!!');
   }
   if ($mode=='new'){
      for ($i=0;$i<$fieldsu;$i++){
         $string=mysql_field_name($result,$i);
                            //  $GLOBALS[$string]=str_replace("'",'`',$GLOBALS[$string]);
         $_POST[$string]=addslashes($_POST[$string]);
         if ($i==($fieldsu-1)){
            $totalfields=$totalfields."'".$_POST[$string]."'";
         }else{
            $totalfields=$totalfields."'".$_POST[$string]."'".",";
         }
         $xxstring=$xxstring."'".$string."'";
      }
      $bb=$totalfields;
      $query="insert into $tablename values ($bb)";
      $result = $connection->query($query);
      $imsiobjectid=mysql_insert_id();
      return $imsiobjectid;
   }
   elseif ($mode=='amend'){
      for ($i=0;$i<$fieldsu;$i++){
         if ($i==0){
            if (  (strlen(trim($firststring))=='') || (!$firststring)  ){
               $firststring=mysql_field_name($result,$i);
            }
         }else{
            $string=mysql_field_name($result,$i);
            $_POST[$string]=addslashes($_POST[$string]);
            if ($i==($fieldsu-1)){
               $totalstring=$totalstring.$string."="."'".$_POST[$string]."'";
            }else{
               $totalstring=$totalstring.$string."="."'".$_POST[$string]."'".",";
            }
         }
      }
      $bb=$totalstring;
      $query="update $tablename set $bb where $firststring='$objectid'";
      $result = $connection->query($query);
      return $objectid;
   }
}
function deleteeachdata($tablename,$wherestring){ //각항목의 데이타를 새로 저장하거나 수정함
global $connection;
global $dbname;
      dbconnection();
      if(strlen(trim($wherestring))>0){
          $query = "delete from $tablename where $wherestring";
      }else{
          $query = "delete from $tablename";
      }

      $result = $connection->query($query);
      if ($result){
          return true;
      }else{
          return false;
      }
}
function deleteeachfile($dirpath,$tablename,$fieldname,$wherestring){ //각항목의 데이타를 새로 저장하거나 수정함
global $connection;
global $dbname;
dbconnection();
      if(strlen(trim($wherestring))>0){
         $query="select $fieldname from $tablename where $wherestring";
      }else{
         $query="select $fieldname from $tablename";
      }
      $result = $connection->query($query);
      if ($result){
         $row=$result->fetch_row();
         if (strlen(trim($row[0]))>0){
            if (file_exists($dirpath.$row[0])){
               unlink("./$dirname/$row[0]");
               return true;
            }else{
               return false;
            }
         }else{
            return false;
         }
      }else{
         return false;
      }

}
function deletefile($dirpath,$filename){
   if (file_exists($dirpath.$filename)){
      unlink($dirpath.$filename);
   }
}

function deletezeromore($tablename,$wherestring){ //각항목의 데이타를 새로 저장하거나 수정함
global $connection;
global $dbname;
   dbconnection();
   if(strlen(trim($wherestring))>0){
      $query = "select count(*) from $tablename where $wherestring";
   }else{
      $query = "select count(*) from $tablename";
   }
   $result = $connection->query($query);
   if ($result){
      $row_num=$result->fetch_row();
      if($row_num[0]>0){
         if(strlen(trim($wherestring))>0){
            $aquery = "delete from $tablename where $wherestring";
         }else{
            $aquery = "delete from $tablename";
         }
         $aresult = mysql_query($aquery,$connection);
      }
   }
   if ($aresult){
      return true;
   }else{
      return false;
   }
}

function goback(){
                    ?>
                    <script>
                     function xx(){
                       if (history.length>0){
                          document.write("<input type='image' src='./icons/hwasal_left.gif' onClick='history.go(-1);'");
                       }
                     }
                     xx();
                    </script>
                    <?php
}


function gprinterbutton($exitornot=1){
?>
   <div id=dtongji class='noprint'>
      <table width=100% border=0 cellspacing=0 cellpadding=0>
        <tr><td>
          <?php
          printerbutton();
          printspace(21,19,19,19,'','');
          ?>
        </td>
        <?php
        if($exitornot!=1){
        ?>
        <td>
           <img src='./icons/exiticon.gif' border=0 onclick='window.close();' style=<?php echo mousehand;?>>
        </td>
        <?php
        }
        ?>
        </tr>
      </table>
   </div>
<?php
}
function breakpage(){
?>
   <div id=dtongji class='noprint'>
   <table width=100% border=0 cellspacing=0 cellpadding=0><tr>
      <td align=right>
         <hr>
      </td></tr>
   </table>
   <P CLASS='breakhere'>
   </div>
   <?php
}
function breaksetup(){
?>
<STYLE TYPE = 'text/css'>
P.breakhere {page-break-before: always}
</STYLE>
<?php
}
function printerbutton(){
    if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')==true){ //익스플로러 이면

        ?>
        <div class='noprint'>
        <object id=IEPageSetupX classid="clsid:41C5BC45-1BE8-42C5-AD9F-495D6C8D7586" codebase="./IEPageSetupX.cab#version=1,0,20,4" width=0 height=0>
           <param name='copyright' value='http://isulnara.com'>
        </object>
        <table width=200 border=0 cellspacing=0 cellpadding=0>
           <TR>
              <TD>
                 <button onclick='IEPageSetupX.Preview();' style='width:85;'><img src='./icons/preview.gif' width=17><span class=ko style='font-size:8pt;'>미리보기</button>
              </TD>
              <TD>
                 <button onclick='IEPageSetupX.SetupPage();' style='width:85;'><img src='./icons/pagesetup.gif' width=17><span class=ko style='font-size:8pt;'>인쇄설정</button>
              </TD>
              <TD>
                 <button onclick='IEPageSetupX.Print();' style='width:85;'><img src='./icons/blueprinter.gif' width=17><span class=ko style='font-size:8pt;'>즉시인쇄</button>
              </TD>
              <TD>
                 <button onclick='IEPageSetupX.Print(true);' style='width:82;'><img src='./icons/printerchat.gif' width=17><span class=ko style='font-size:8pt;'>인쇄(창)</button>
              </TD>
           </TR>
        </table>
        </div>
        <?php
    }
}
function printspace($top,$bottom,$left,$right,$header,$footer){
        ?>
        <SCRIPT LANGUAGE='javascript'>
              IEPageSetupX.header =''; // 헤더설정
              IEPageSetupX.footer =''; // 푸터설정

              IEPageSetupX.topMargin = <?php echo$top;?>; // 윗쪽여백 설정
              IEPageSetupX.bottomMargin = <?php echo$bottom;?>; // 아랫쪽 여백설정
              IEPageSetupX.leftMargin = <?php echo$left;?>; // 왼쪽여백설정
              IEPageSetupX.rightMargin = <?php echo$right;?>; // 오른쪽여백 설정
              IEPageSetupX.Orientation = 1;
        </SCRIPT>
        <?php
}
function printercode(){
   ?>
        <STYLE TYPE = 'text/css'>
        P.breakhere {page-break-before: always}
        </STYLE>
         <div id=dtongji class='noprint'>
         <table width=100% border=0 cellspacing=0 cellpadding=0><tr>
         <td>
         <?php
         printerbutton();
         printspace(20,19,19,10,'','');
         ?>
         </td>
         <td align=right>
         <img src='./icons/exiticon.gif' border=0> <input type='reset' value='창닫기' onClick='window.close();' style="font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
         </td>

         </tr></table>
         </div>
   <?php
}
function newprinterbutton(){
global $id,$labelkind;
?>
<div class='noprint'>
<script language='javascript'>
function ieExecWB( intOLEcmd, intOLEparam ){
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
if ( ( ! intOLEparam ) || ( intOLEparam < -1 ) || (intOLEparam > 1 ) )
intOLEparam = 1;
WebBrowser1.ExecWB( intOLEcmd, intOLEparam );
WebBrowser1.outerHTML = '';}
</script>

<table border=0 cellspacing=0 cellpadding=0><tr><td>
<button onclick='window.ieExecWB(7)' style='width:78;'>
        <img src='./icons/preview.jpg' width=20>미리보기</font>
        </button>
<button onclick='window.ieExecWB(8)' style='width:82;'>
        <img src='./icons/pagesetup.jpg' width=20>페이지설정</font>
        </button>
<button onclick='window.ieExecWB(6, -1)' style='width:78;'>
        <img src='./icons/blueprinter.jpg' width=20>바로인쇄</font>
        </button>
<button onclick='window.ieExecWB(6)' style='width:78;'>
        <img src='./icons/printerchat.jpg' width=20>인쇄(창)</font>
        </button>
</td>
</tr></table>
</div>

<?php
}
function choice($choiceid,$tablename,$idname,$idvalue,$whattitle,$wherestring,$ob,$actionname,$actionafter,$buttonornot,$width,$howmuch,$seeornot){
	global $connection,$dbname;
	global $customdata,$debitdata,$fdata,$fregdata,$staffdata,$letterdata,$gdata,$cdata;
	global $fornot,$ws;
	global $xkind,$whd;
	parse_str($actionname);
    if($tablename=='yakdata'){$filename='custom.php';}
    elseif($tablename=='estidata'){$filename='custom.php';}
    elseif($tablename==$fdata){$filename='sagun.php';}
    elseif($tablename==$fregdata){$filename='reg.php';}
    elseif($tablename==$debitdata){$filename='debit.php';}
    elseif($tablename==$customdata){
        if($choiceid=='tong'){
            $filename='tong.php';$whattitle='sangho';
        }
        elseif($choiceid=='debit'){
            $filename='debit.php';$whattitle='sangho';
        }
        else{
            $filename='custom.php';$whattitle='sangho';
        }
    }
    elseif($tablename==$cdata){$filename='c.php';$whattitle='ourref';}
    elseif($tablename==$gdata){$filename='c.php';$whattitle='ourref';}
    elseif($tablename==$staffdata){$filename='officedetail.php';}
    elseif($tablename=='member'){$filename='mec.php';}
    elseif($tablename==$letterdata){$filename='letter.php';}
    if (!isset($width)){$with=178;}
    if (!isset($howlong)){$howlong=12;}
    if (strlen(trim($wherestring))>0){
        $wherestring=" where $wherestring ";
    }
    if($tablename==$fdata){
        $query = "select $idname,$whattitle,interregnumber,applino from $tablename $wherestring $ob";
    }
    elseif($tablename==$gdata){
        $query = "select $idname,$whattitle from $tablename $wherestring $ob";
    }else{
        $query = "select $idname,$whattitle from $tablename $wherestring $ob";
    }
    $result = $connection->query($query);
    if ($result){
        ?>
        <script>
            function togo_<?php echo$choiceid;?>(bvalue){
                choiceform_<?php echo$choiceid;?>.buttonvalue.value=bvalue;
                choiceform_<?php echo$choiceid;?>.submit();
            }
        </script>
        <script>
            function gochoice_<?php echo$choiceid;?>(){
				<?php
				///여기는 더블클릭하면 가는곳 적는데....
				
				if ($actionafter==1){
					if($filename=='custom.php'){$actionname='customdisplay';$ws=$_GET[ws];}
  			        ?>
				    parent.location.href="<?php echo$filename;?>?a=<?php echo$actionname;?><?php if($fornot){?>&fornot=<?php echo$fornot;?><?php }?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?>&<?php echo$idname;?>="+choiceform_<?php echo$choiceid;?>.<?php echo$idname;?>.value+"&whd=<?php echo$whd;?><?php if ($xkind){echo "&xkind=$xkind";}?>";
				    <?php
				}
				if ($actionafter==2){
				    if($filename=='custom.php'){$actionname='customdisplay';$ws=$_GET[ws];}
				    ?>
				    opener.parent.location.href="<?php echo$filename;?>?a=<?php echo$actionname;?><?php if($fornot){?>&fornot=<?php echo$fornot;?><?php }?>&<?php echo$idname;?>="+choiceform_<?php echo$choiceid;?>.<?php echo$idname;?>.value+"&whd=<?php echo$whd;?><?php if ($xkind){echo "&xkind=$xkind";}?>";
				    window.close();
				    <?php
				}
				if ($actionafter==3){
				    if($filename=='custom.php'){$actionname='customdisplay';$ws=$_GET[ws];}
				    ?>
				    this.window.location.href="<?php echo$filename;?>?a=<?php echo$actionname;?><?php if($fornot){?>&fornot=<?php echo$fornot;?><?php }?>&<?php echo$idname;?>="+choiceform_<?php echo$choiceid;?>.<?php echo$idname;?>.value+"&whd=<?php echo$whd;?><?php if ($xkind){echo "&xkind=$xkind";}?>";
				    <?php
				}
				
				////////////특별한경우
				if ($actionafter==7){///7번이면 청구서 원하는 액션으로 가는곳
                    $filename=='debit.php';$actionname='graph';$ws=$_GET[ws];
				    ?>
				    this.window.location.href="debit.php?a=<?php echo$actionname;?><?php if($fornot){?>&fornot=<?php echo$fornot;?><?php }?>&<?php echo$idname;?>="+choiceform_<?php echo$choiceid;?>.<?php echo$idname;?>.value+"&whd=<?php echo$whd;?><?php if ($xkind){echo "&xkind=$xkind";}?>";
				    <?php
				}
				
				//////////////////////////////////////////////////////////////
				
				?>
            }
            function changechoice_<?php echo$choiceid;?>(){


            }
            function chk_<?php echo$choiceid;?>(){
                var ff = document.choiceform_<?php echo$choiceid;?>;
                if(ff.<?php echo$idname;?>.selectedIndex == 0){
                    alert("항목을 선택해 주세요!!");
                    ff.<?php echo$idname;?>.focus();
                    return false;
                }
            }
        </script>
        <form name=choiceform_<?php echo$choiceid;?> method=post style='margin-bottom:0;margin-top:0' action='baroga.php'>
        <table class=graytable>
            <tr><td>
               <select name='<?php echo$idname;?>' size='<?php echo $howmuch;?>' style = 'padding:2;width:<?php echo$width;?>px;border-width:0; border-color:black; border-style: solid; background:#whitesmoke; font-size:10pt;' ondblclick='gochoice_<?php echo$choiceid;?>();' onchange='changechoice_<?php echo$choiceid;?>();'>
               <?php
               while($row=$result->fetch_row()){
                  $row[0]=str_replace("'",'&#039',stripslashes($row[0]));
                  $row[1]=str_replace("'",'&#039',stripslashes($row[1]));
                  if(strlen(trim($row[1]))<3){$row[1]='';}   //만약출원번호가 10 이나 40 또는 45 그게 다라면 그냥 없는 것으로 만들것
                  if ($tablename==$fdata){
                     if ($whattitle=='applino'){
                        if(strlen(trim($row[1]))>0){
                           ?>
                           <option value='<?php echo $row[0];?>' <?php if ($idvalue==$row[0]){?>selected<?php }?>><span class=koen><?php echo substr($row[1],0,2).'-'.substr($row[1],2,4).'-'.substr($row[1],6,7);?></option>
                           <?php
                        }
                        elseif(strlen(trim($row[1]))<1){
                           ?>
                           <option value='<?php echo $row[0];?>' <?php if ($idvalue==$row[0]){?>selected<?php }?>><span class=koen>Madrid <?php echo $row[2];?></option>
                           <?php
                        }
                     }
                     elseif ($whattitle=='ourref'){
                        ?>
                        <option value='<?php echo $row[0];?>' <?php if ($idvalue==$row[0]){?>selected<?php }?>><span class=koen><?php echo$row[1];?>&nbsp;(<?php if(strlen(substr($row[3],0,2))>0){echo substr($row[3],0,2);}else{?>M<?php };?>)</option>
                        <?php
                     }
                  }
                  elseif ($tablename==$fregdata){
                     if ($whattitle=='regno'){
                        ?>
                        <option value='<?php echo $row[0];?>' <?php if ($idvalue==$row[0]){?>selected<?php }?>><?php echo substr($row[1],0,2).'-'.substr($row[1],2,7).'-'.substr($row[1],9,2).'-'.substr($row[1],11,2);?></option>
                        <?php
                     }
                     elseif ($whattitle=='ourref'){
                        ?>
                        <option value='<?php echo $row[0];?>' <?php if ($idvalue==$row[0]){?>selected<?php }?>><span class=koen><?php echo$row[1];?></option>
                        <?php
                     }
                  }else{
                     if(strlen(trim($row[1]))>0){
                        ?>
                        <option value='<?php echo $row[0];?>' <?php if ($idvalue==$row[0]){?>selected<?php }?>><?php echo cutstring($row[1],30,'..');?></option>
                        <?php
                     }
                  }
               }
               ?>
               </select>
            </td></tr>
            <input type=hidden name=buttonvalue value=''>
               <?php
               if ($buttonornot==1){
                  if ($seeornot==1){
                     if($tablename==$customdata){
                        if(  ($fornot==1) && ($ws==2) || ($fornot==2)  ){
                           if($tablename==$customdata){$bgcolor=seecolor(1,'listdown');}
                           ?>

                           <tr><td>
                            <table width=100%>
                               <tr>
                                  <td>
                                      <input type='button' name='customdetail' value='상세' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type='submit' name='customamend' value='수정' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=letterlist value='편지' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=newletter value='작성' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=debitview value='청구' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                               </tr>
                               <tr>
                                  <td>
                                      <input type=submit name=faxcover value='팩스' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=labelprint value='라벨' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=matterlist value='사건' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=maillist value='메일' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=newmail value='작성' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding:0; width:30;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='white'"><br>
                                  </td>
                               </tr>
                            </table>
                        </td></tr>
                        <?php
                        }
                        elseif($ws==1){
                           ?>
                           <tr><td>
                            <table width=100% style="border:1px solid <?php echo bascolor($fornot);?>;">
                               <tr>
                                  <td>
                                      <?php $fontsize=9;?>
                                      <input type=submit name=customdetail value='출원인' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:42;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=customamend value='수정' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=makepower value='일회' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=spowerform value='저장' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                               </tr>
                               <tr>
                                  <td>
                                      <input type=submit name=spowerkform value='한글' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=gpowereform value='E포' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=gpowerkform value='K포' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=nationform value='국적' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:<?php echo$fontsize;?>pt;font-family:gothic;color:white;font-weight:bold; background-color:fbc1c1; border-width:0; border-color:ivory; border-style:solid;padding:0; width:32;padding-top:2px;cursor:hand;' onmouseover="this.style.backgroundColor='#DFD2A6'"  onmouseout="this.style.backgroundColor='fbc1c1'"><br>
                                  </td>
                               </tr>
                            </table>
                        </td></tr>
                        <?php
                        }
                     }
                     elseif(  $tablename==$debitdata ){
                        ?>

                        <tr><td>
                            <table border=0 cellspading=0 cellpadding=0>
                               <tr>
                                  <td>
                                      <input type=submit name=debitdetail value='상세' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:pink; border-width:0; border-color:ivory; border-style:solid;padding:0; width:28;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'small');?>'"  onmouseout="this.style.backgroundColor='pink'"><br>
                                  </td>
                                  <td>
                                      <input type=submit name=debitamend value='수정' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:pink; border-width:0; border-color:ivory; border-style:solid;padding:0; width:28;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'small');?>'"  onmouseout="this.style.backgroundColor='pink'"><br>
                                  </td>
                               </tr>
                            </table>
                        </td></tr>
                        <?php
                     }
                     elseif(     ($tablename==$fdata) ||  ($tablename==$fregdata)  ){
                        ?>
                        <tr><td>
                            <table>
                               <tr>
                                  <td>
                                     <input type=submit name=datadetail value='상세' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:pink; border-width:0; border-color:ivory; border-style:solid;padding:0; width:28;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'small');?>'"  onmouseout="this.style.backgroundColor='pink'"><br>
                                  </td>
                                  <td>
                                     <input type=submit name=dataamend value='수정' onclick="togo_<?php echo$choiceid;?>(this.name);" style='font-size:9pt;font-family:gothic;color:black; background-color:pink; border-width:0; border-color:ivory; border-style:solid;padding:0; width:28;padding-top:2px;cursor:hand;'  onmouseover="this.style.backgroundColor='<?php echo seecolor($fornot,'small');?>'"  onmouseout="this.style.backgroundColor='pink'"><br>
                                  </td>
                               </tr>
                            </table>
                        </td></tr>
                        <?php
                     }
                  }
               }
               ?>
               <input type=hidden name=fornot value='<?php echo $fornot;?>'>
               <input type=hidden name=ws value='<?php echo $ws;?>'>
               <input type=hidden name=xkind value='<?php echo$xkind;?>'>
               <input type=hidden name=induskind value='<?php echo $induskind;?>'>
               <input type=hidden name=tablename value='<?php echo $tablename;?>'>
               <input type=hidden name=wherestring value="<?php echo $wherestring;?>">
        </table>
        </form>
        <?php
    }
}

function lettersearchform($taction,$varstring){
	parse_str($varstring);
	minical('&&fromdate&&todate','flettertitle');
	if(!isset($tablewidth)){$tablewidth='1000';}
	if(!isset($mode)){$mode='new';}
	if(!isset($fromdate)){$fromdate=0;}
	if(!isset($todate)){$todate=0;}
    ?>
    <center>
    <form name=flettertitle method=post style='margin-bottom:0;margin-top:0' action=<?php echo$_SERVER['SCRIPT_NAME'];?>?a=<?php echo$taction;?><?php if(isset($fornot)){?>&fornot=<?php echo$fornot;?><?php }?><?php if(isset($ws)){?>&ws=<?php echo$ws;?><?php }?><?php if(isset($findkind)){?>&findkind=<?php echo$findkind;?><?php }?><?php if (isset($id)){?>&id=<?php echo$id;?><?php }?><?php if(isset($maker)){?>&maker=<?php echo$maker;?><?php }?><?php if(isset($aor)){?>&aor=<?php echo$aor;?><?php }?><?php if(isset($whd)){?>&whd=<?php echo$whd;?><?php }?>>
    <table width=<?php echo$tablewidth;?> border=0  cellspacing=1 cellpadding=1>
        <tr><td>
        <?php echo arrowhead;?>제목</td><td><input type=text name=keytitle size=15>
        </td>
        <td>
        <?php echo arrowhead;?>내용</td><td><input type=text name=keycontents size=15>
        </td>
        <td>
        <?php echo arrowhead;?>사건</td><td><input type=text name=keymatter size=15>
        </td>
        <td>
<?php
/*
function dateinsform($mode,$varname,$value,$formname,$next){
   $var_1=substr($value,0,4);
   $var_2=substr($value,4,2);
   $var_3=substr($value,6,2);
   $va_1=$varname.'_1';
   $va_2=$varname.'_2';
   $va_3=$varname.'_3';
   ?>
   <input type='text' name='<?php echo$va_1;?>' <?php if ($mode=='amend'){?> value='<?php echo$var_1;?>'<?php } elseif ($mode=='imsi'){?> value='<?php echo$var_1;?>'<?php } else {if($var_1){?> value='<?php echo$var_1;?>'<?php }else{?> value=''<?php }}?> size='4' maxlength='4' style="width:38px;" <?php movefocus($formname,$va_1,$va_2,4);?>>-<input type='text' name='<?php echo$va_2;?>' <?php if ($mode=='amend'){?> value='<?php echo$var_2;?>'<?php } elseif ($mode=='imsi'){?> value='<?php echo$var_2;?>'<?php } else {if($var_2){?> value='<?php echo$var_2;?>'<?php }else{?> value=''<?php }}?> size='2' maxlength='2' style="width:24px;" <?php movefocus($formname,$va_2,$va_3,2);?>>-<input type='text' name='<?php echo$va_3;?>' <?php if ($mode=='amend'){?> value='<?php echo$var_3;?>'<?php } elseif ($mode=='imsi'){?> value='<?php echo$var_3;?>'<?php } else {if($var_3){?> value='<?php echo$var_3;?>'<?php }else{?> value=''<?php }}?> size='2' maxlength='2' style="width:24px;" <?php movefocus($formname,$va_3,$next,2);?>>
   <?php
}
*/
?>

        		<?php echo arrowhead;?>날짜
			    <?php dateinsform($mode,'fromdate',$fromdate,'flettertitle','todate');?>
                <?php echo datesidein('flettertitle','fromdate','todate_1');?>
                ~
			    <?php dateinsform($mode,'todate',$todate,'flettertitle','');?>
                <?php echo datesidein('flettertitle','todate','');?>
        </td>
        <td valign=bottom>
        <input type=submit name=submitbutton value='검색' style='font-size:9pt; color:black; background-color:rgb(228,238,238); border-width:0; border-color:ivory; border-style:solid;width:30;padding:0;'><br>
        </td>
        </tr>
    </table>
    </form>
    <?php


}
function lettersearchsero($taction,$varstring){
parse_str($varstring);
   ?>
   <center>
   <form name=flettertitle method=post style='margin-bottom:0;margin-top:0' action="?a=<?php echo$taction;?>&fornot=<?php echo$fornot;?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?>&id=<?php echo$id;?><?php if($findkind){?>&findkind=<?php echo$findkind;?><?php }?><?php if($maker){?>&maker=<?php echo$maker;?><?php }?><?php if($aor){?>&aor=<?php echo$aor;?><?php }?><?php if($kind){?>&kind=<?php echo$kind;?><?php }?><?php if($wkind){?>&wkind=<?php echo$wkind;?><?php }?>">
      <table width=100% border=1 cellspacing=2 cellpadding=2 <?php echo collapse;?> style="border:1px solid <?php echo bascolor($fornot);?>;">
         <tr><td>
            제목</td><td> <input type=text name=keytitle size=20>
         </td></tr>
         <tr><td>
            내용</td><td> <input type=text name=keycontents size=20>
         </td></tr>
         <tr><td>
            사건</td><td> <input type=text name=keymatter size=20>
         </td></tr>
         <tr><td>
            날짜</td><td>
            <input type=text name=fromdate_1 size=4 <?php movefocus('flettertitle','fromdate_1','fromdate_2',4);?>>
            .<input type=text name=fromdate_2 size=2 <?php movefocus('flettertitle','fromdate_2','fromdate_3',2);?>>
            .<input type=text name=fromdate_3 size=2 <?php movefocus('flettertitle','fromdate_3','todate_1',2);?>>
             <?php echo datesidein('flettertitle','fromdate','todate_1');?>
            <div id=minical OnClick="this.style.display='none';" oncontextmenu='return false' ondragstart='return false' onselectstart='return false' style="background : buttonface; margin: 5; margin-top: 2;border-top: 1 solid buttonhighlight;border-left: 1 solid buttonhighlight;border-right: 1 solid buttonshadow;border-bottom: 1 solid buttonshadow;width:122;display:none;position: absolute; z-index: 99"></div>
            </td></tr>
            <tr>
            <td align=center>~</td><td>
            <input type=text name=todate_1 size=4 style="font-size:9pt;font-family:gothic;color:black; background-color:white; border-width:1; border-color:gray; border-style:solid;" <?php movefocus('flettertitle','todate_1','todate_2',4);?>>
            .<input type=text name=todate_2 size=2 style="font-size:9pt;font-family:gothic;color:black; background-color:white; border-width:1; border-color:gray; border-style:solid;" <?php movefocus('flettertitle','todate_2','todate_3',2);?>>
            .<input type=text name=todate_3 size=2 style="font-size:9pt;font-family:gothic;color:black; background-color:white; border-width:1; border-color:gray; border-style:solid;">

            <?php echo datesidein('flettertitle','todate','todate_1');?>
            </td></tr>
            <tr><td colspan=2><center>
            <input type=submit name=submitbutton value='검색' style="font-size:12; color:white; background-color:rgb(250,149,149); border-width:0; border-color:ivory; border-style:solid;"><br>
         </td></tr>
       </table>
    </form>
<?php
}


function onebyonemenu(){
?>
<br><br>
<table border=0 bordercolor=green cellspacing=0 cellpadding=0>

<tr><td>
<span class=komigreen>▶<a href=c.php?a=onebyone&whd=1 target='_top'>(외)대리인</a>

<span class=komigreen>▶<a href=fmmatters.php?a=onebyone&whd=1 target='_top'>(출상)</a>


</td></tr>

<tr><td>

<span class=komigreen>▶<a href=c.php?a=customshow&whd=1 target='_top'>페이지별대리인으로</a>


</td></tr>
</table>
<?php
}


function dateinsertbyc(){
global $year,$month,$day;

?>

 <script language='javascript'>
function getElement(e,f){
    if(document.layers){
        f=(f)?f:self;
        if(f.document.layers[e]) {
            return f.document.layers[e];
        }
        for(W=0;i<f.document.layers.length;W++) {
            return(getElement(e,fdocument.layers[W]));
        }
    }
    if(document.all) {
        return document.all[e];
    }
    return document.getElementById(e);
}
</script>
    <script type="text/javascript">
    <!--
    function wonhide_them_all() {
        getElement("wonornot").style.display = 'none';
    }
    function wonshow_checked_option() {
        wonhide_them_all();
        if (getElement('wonornot_incheck').checked) {
            getElement('wonornot').style.display = 'block';
        }else{
            getElement("wonornot").style.display = 'none';
        }
    }
    function inhide_them_all() {
        getElement("inornot").style.display = 'none';
    }
    function inshow_checked_option() {
        inhide_them_all();
        if (getElement('inornot_incheck').checked) {
            getElement('inornot').style.display = 'block';
        }else{
            getElement("inornot").style.display = 'none';
        }
    }
    //-->
    </script>
<?php
}
function nodatabase($tablename,$dbhanname){
           global $connection;
           global $dbname;

           dbconnection();
           $query = "select count(*) from $tablename";
           $result = $connection->query($query);
           $actionstring=$tablename.'make';
           if (!$result){
                       ?>
                       <br><br><br><br><center><img src='./icons/nne.gif' border=0><b><?php echo$dbhanname;?> 데이타베이스가 없습니다.;

                       <center><b><?php echo $dbhanname;?> 데이타베이스를 새로 만드시려면 <a href=<?php $globals[php_self]?>?a=<?php echo $actionstring;?>>----> 여기</a> 를 누르세여!!!!!111
                      <?php

                      exit;
           }
}

function fileupload($filevar,$uploadpath,$newfilename){
         if($_FILES[$filevar]['name']){
               $mime=explode(".",$_FILES[$filevar]['name']);
               if($mime[1]=='htm' || $mime[1]=='html' || $mime[1]=='php' || $mime[1]=='php' || $mime[1]=='jsp' || $mime[1]=='asp' || $mime[1]=='cgi' || $mime[1]=='pl' || $mime[1]=='inc'){
                 ?><script> window.alert('업로드가 불가능한 파일입니다.'); history.go(-1); </script><?php exit;
               }
               if($_FILES[$filevar]['size']>13072864){
                    ?><script> window.alert('파일크기는 3.0 MB 까지입니다.'); history.go(-1); </script><?php exit;
               }
               if(file_exists($uploadpath.$_FILES[$filevar]['name'])){
                    ?><script> window.alert('같은 <?php echo$filevar;?>파일이 존재합니다.'); history.go(-1); </script><?php exit;
               }
               if(strlen(trim($newfilename))>0){
                    $zfilename=$newfilename.strtolower($mime[1]);
                    $result=copy($_FILES[$filevar]['tmp_name'],$uploadpath.$zfilename);
               }else{
                    $result=copy($_FILES[$filevar]['tmp_name'],$uploadpath.$_FILES[$filevar]['name']);
               }
                 // data 폴더에 파일 복사.
               if(!$result)  {
                    ?><script> window.alert('파일이 있는지 확인해주십시오.'); history.go(-1); </script><?php exit;
               }
         }
} // 첨부파일이 있는지 확인. if문
function upwindowclose($kind,$tablewidth='100%'){
    ?>
    <div id=dtongji class='noprint'>
    <table width=100% border=0 cellspacing=0 cellpadding=0><tr><td align=right>
    <?php
    if($kind==3){
        ?>
        <img src='icons/exiticon.gif' border=0> <input type='reset' value='부모창으로전환' onClick='opener.window.location.replace("<?php echo $REQUEST_URI;?>&whd=1");' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:120;'>
        <img src='icons/exiticon.gif' border=0> <input type='reset' value='부모창으로전환후닫음' onClick='opener.window.location.replace("<?php echo $REQUEST_URI;?>&whd=1");window.close();' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;padding-top:2px;cursor:hand;width:160;'>
        <?php
    }
    ?>
    <img src='icons/exiticon.gif' border=0> <input type='reset' value='창닫기' onClick='window.close()' style='font-size:9pt; color:black; background-color:rgb(255,255,255); border-width:0; border-color:ivory; border-style:solid;'>
    </td>
    </tr>
    </table>
    </div>
   <?php

}


function keymain(){
global $shekind;
?>
    if(event.keyCode==120) {

    }
    if(event.keyCode==27) {
      if(confirm('정말 창을 닫으시겠습니까 ? ')){
          return true;
      }else{
          return false;
      }
    }
    if(event.keyCode==119) {
       window.location="<?php echo './fmatters.php?a=viewfirst'?>";
      return false;
    }
    if(event.keyCode==117) {
       window.location="<?php echo './custom.php?a=customshow'?>";
      return false;
    }
    if(event.keyCode==118) {
       window.location="<?php echo './debit.php?a=debitlist'?>";
      return false;
    }
    if(event.keyCode==123) {
      window.print();
      return false;
    }
    if(event.keyCode==113) {
       window.location="<?php echo './custom.php?a=customform&whatdo=show'?>";
      return false;
    }

    if(event.keyCode==121) {
       window.location="<?php echo './calen.php'?>";
      return false;
    }
<?php
}


//offimemoshow('memodata',1,'','외국대리인','',$jungstring,'');

function send_mail($emailaddress, $fromaddress,$emailsubject,$body,$wigimode,$attachments=false){
  $eol="\r\n";
  $mime_boundary=md5(time());

  # Common Headers
  $headers .= 'From: <'.$fromaddress.'>'.$eol;
  $headers .= 'Reply-To: <'.$fromaddress.'>'.$eol;
  $headers .= 'Return-Path: <'.$fromaddress.'>'.$eol;    // these two to set reply address
  $headers .= "Message-ID: <".$now." kimspat@".$_SERVER['SERVER_NAME'].">".$eol;
  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
  # Boundry for marking the split & Multitype Headers
  $headers .= 'MIME-Version: 1.0'.$eol;
  $headers .= "Content-Type: multipart/mixed; boundary=\"".$mime_boundary."\"".$eol;
  $msg = "";
  if ($attachments !== false)
  {
    for($i=0; $i < count($attachments); $i++)
    {
      if (is_file($attachments[$i]["file"]))
      {
        # File for Attachment
        $file_name = substr($attachments[$i]["file"], (strrpos($attachments[$i]["file"], "/")+1));

        $handle=fopen($attachments[$i]["file"], 'rb');
        $f_contents=fread($handle, filesize($attachments[$i]["file"]));
        $f_contents=chunk_split(base64_encode($f_contents));    //Encode The Data For Transition using base64_encode();
        fclose($handle);

        # Attachment
        $msg .= "--".$mime_boundary.$eol;
        $msg .= "Content-Type: ".$attachments[$i]["content_type"]."; name=\"".$file_name."\"".$eol;
        $msg .= "Content-Transfer-Encoding: base64".$eol;
        $msg .= "Content-Disposition: attachment; filename=\"".$file_name."\"".$eol.$eol; // !! This line needs TWO end of lines !! IMPORTANT !!
        $msg .= $f_contents.$eol.$eol;

      }
    }
  }

  # Setup for text OR html
  $msg .= "Content-Type: multipart/alternative".$eol;

  # Text Version

  if ($wigimode==1){
  $msg .= "--".$mime_boundary.$eol;
  $msg .= "Content-Type: text/plain; charset=euc-kr".$eol;
  $msg .= "Content-Transfer-Encoding: 8bit".$eol;
  $msg .= strip_tags(str_replace("<br>", "\n", $body)).$eol.$eol;
  }

  # HTML Version
  elseif ($wigimode==2){
  $msg .= "--".$mime_boundary.$eol;
  $msg .= "Content-Type: text/html; charset=euc-kr".$eol;
  $msg .= "Content-Transfer-Encoding: 8bit".$eol;
  $msg.=stripslashes($body);
  $msg .= $body.$eol.$eol;
  }

  # Finished
  $msg .= "--".$mime_boundary."--".$eol.$eol;  // finish with two eol's for better security. see Injection.
  # SEND THE EMAIL
  ini_set(sendmail_from,$fromaddress);  // the INI lines are to force the From Address to be used !
  mail($emailaddress, $emailsubject, $msg, $headers);
  ini_restore(sendmail_from);
  echo "mail send";
}



function addressinputform($taction){
global $formname;
global $fieldname;
if(!isset($fm)){$fm=$_GET['fm'];}
if(!isset($fd)){$fd=$_GET['fd'];}
?>
<center>
<table border=1 class=greentable><tr><td>
<span class=kogreen><b>**입력하려는 주소의 동/읍/면을 입력하세여!!</b>
<form name='addressinput' method=post style='margin-bottom:0;margin-top:0' action='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=<?php echo$taction;?><?php if($fm){?>&fm=<?php echo$fm;?><?php }if($fd){?>&fd=<?php echo$fd;?><?php }?>'>
<table width=100% border=1 cellspacing=1 cellpadding=1 <?php echo collapse;?>>
<tr><td><img src='./icons/mag.gif' border=0>동/읍/면입력</td>
<td>
<input type=text name=dongname size=18  style='ime-mode:active'>
</td>
<td>
<center><input type=submit value='체크'>
</td></tr>
</table>
</td></tr></table>
</form>
<?php
}
function zipbydong($dongname){
global $dbname,$connection;
   dbconnection();
   if ($dongname){
      $dongname=trim($dongname);
      if (totalornot('zipcode',"(gugun like '%$dongname%') or (dong like '%$dongname%') or (ri like '%$dongname%') or (bldg like '%$dongname%')")){
         $totalsu=obtaintotalsu('zipcode',"(gugun like '%$dongname%') or (dong like '%$dongname%') or (ri like '%$dongname%') or (bldg like '%$dongname%')");

         ?>
         <table><tr><td><img src="./icons/docufind.png" border=0 width=20>검색된 수:(<font color=red><b><?php echo$totalsu;?></b></font>)</td></tr></table><br>
         <table width=580 border=0 class=greentable>
         <tr bgcolor=eeeeee><td>우편번호</td><td>시,군,동,리,빌딩</td></tr>

         <?php
            $result=$connection->query("select zipcode,sido,gugun,dong,ri,bldg,bunji from zipcode where (gugun like '%$dongname%') or (dong like '%$dongname%') or (ri like '%$dongname%') or (bldg like '%$dongname%')");
            if($result){
              while($row=$result->fetch_row()){
                 if($_GET['fm']){
                    ?>
                    <tr><td <?php dottedunderline();?>><span class=kored><b><?php echo $row[0];?></b>&nbsp;&nbsp; </td><td <?php dottedunderline();?>><a href='address.php?a=addressinput&fm=<?php echo$_GET['fm'];?>&fd=<?php echo$_GET['fd'];?>&no=<?php echo$row[0];?>'><img src='./icons/icon_pink.gif' border=0> <span class=kogreen><b><?php echo $row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].' '.$row[6];?></b></a></td></tr>
                    <?php
                 }else{
                    ?>
                    <tr><td <?php dottedunderline();?>><span class=kored><b><?php echo $row[0];?></b>&nbsp;&nbsp; </td><td <?php dottedunderline();?>><span class=kogreen><b><?php echo $row[1].' '.$row[2].' '.$row[3].' '.$row[4].' '.$row[5].' '.$row[6];?></b></td></tr>
                    <?php
                 }
              }
            }
         ?>

         </table>

      <?php

      }else{

      ?>

      <table width=480 class=greentable>
      <tr bgcolor=eeeeee><td>우편번호</td><td>도 시군,동,리,빌딩</td></tr>
      <tr><td colspan=2><img src='./icons/ohmygod.gif' border=0>검색된 데이타가없습니다.</td></tr>
      </table>

      <?php
      }

   }
}


function deletetablefile($dirpath,$tablename,$keyid,$file,$wherestring){ //각항목의 데이타를 새로 저장하거나 수정함
    global $connection,$dbname;
    dbconnection();
    if(strlen(trim($wherestring))>0){
        $query="select $keyid,$file from $tablename where $wherestring";
    }else{
        $query="select $keyid,$file from $tablename";
    }
    $result =$connection->query($query);
    if ($result){
        while($row=$result->fetch_assoc()){
            if(strlen(trim($row[$file]))>0){
                if(!file_exists($dirpath.$row[$file])){
                    $aquery="delete from $tablename $keyid='$row[$keyid]'";
                    $aresult = $connection->query($aquery);
                }
            }else{
                $aquery="delete from $tablename $keyid='$row[$keyid]'";
                $aresult = $connection->query($aquery);
            }
        }
    }
}

function nofiledelete($varstring){//tablename,keyname,keyid
    global $connection,$dbname;
    global $filedata;
    dbconnection();
    parse_str($varstring);
    $dirpath="./$tablename/";
	
	if(!isset($keyid)){$keyid=0;}
	
    $query="select fileid,file1_name from $filedata where tablename='$tablename' and keyname='$keyname' and keyid='$keyid'";
    $result =$connection->query($query);
    if ($result){
        while($row=$result->fetch_assoc()){		 
            if( (isset($row['file1_name'])) && (strlen(trim($row['file1_name']))>0) ){
                if(!file_exists($dirpath.$row['file1_name'])){
                    $aquery="delete from $filedata where tablename='$tablename' and keyname='$keyname' and keyid='$keyid' and fileid='$row[fileid]'";
                    $aresult = $connection->query($aquery);
                }
            }else{
                $aquery="delete from $filedata where tablename='$tablename' and keyname='$keyname' and keyid='$keyid' and fileid='$row[fileid]'";
                $aresult = $connection->query($aquery);
            }
        }
    }
}


function fileshow($varstring){
    global $dbname,$connection;
    global $customdata;
    global $filedata;
    parse_str($varstring);
    dbconnection();
    deletetablefile($dirpath="./$tablename/",'filedata',$keyid,$file='file1_name',$wherestring);
    $si=0;
    $gaesa=4;
    beforedelete();
    $query="select fileid,file1_name,filememo from $filedata where tablename='$tablename' and keyname='$keyname' and keyid='$keyid'";
    $result = $connection->query($query);
    if ($result){

        ?>
		<center>
		<?php
		if( ($seroshow)&&($seroshow==1)){
		   ?>
		   <table border=1 bordercolor=eeeeee width=180 cellpadding=2 <?php echo collapse;?>>
		   <?php
		}else{

		   ?>
		   <table border=1 bordercolor=eeeeee width=800 cellpadding=4 <?php echo collapse;?>>
		   <?php

		}

    	while($row=$result->fetch_row()){
		    if( ($seroshow)&&($seroshow==1)){
		 	    ?>
			    <tr><td>
				 <a href='cfileopen.php?dn=<?php echo$tablename;?>&fn=<?php echo$row[1];?>'  onMouseover="textbodyprint2('<?php $filememo = str_replace("\r\n", '<br>',$filememo);$filememo=htmlspecialchars($filememo);echo $filememo;?>')" onMouseout=textbodyprint2(0,1)><?php filepic($row[1]);?><?php echo cutstring($row[1],20,'..');?></a>
			    </td></tr>
			    <?php
		    }else{
			    $filememo=$row[2];
			    if($si%$gaesa==0){
			        if(file_exists("./$tablename/$row[1]")){
  				    ?>
				    <tr><td>
				    <table>
					    <tr>
					    <td><a href='cfileopen.php?dn=<?php echo$tablename;?>&fn=<?php echo$row[1];?>'  onMouseover="textbodyprint2('<?php $filememo = str_replace("\r\n", '<br>',$filememo);$filememo=htmlspecialchars($filememo);echo $filememo;?>')" onMouseout=textbodyprint2(0,1)><?php filepic($row[1]);?><?php echo$row[1];?></a></td>
					    <td>
					    <a href='#' onClick="window.open('<?php echo $_SERVER['SCRIPT_NAME'];?>?a=x_filememo&tablename=<?php echo$tablename;?>&keyname=<?php echo$keyname;?>&keyid=<?php echo$keyid;?>&fileid=<?php echo$row[0];?>','debitexample','scrollbars=yes,resizable=yes,width=690,height=560,left=0,top=0'); return true">
					    <?php imagefile('g3.gif');?>
					    </a>
					    </td>
					    <td><a href='<?php echo $_SERVER['SCRIPT_NAME'];?>?a=x_filedelete&tablename=<?php echo$tablename;?>&keyname=<?php echo$keyname;?>&keyid=<?php echo$keyid;?>&fileid=<?php echo$row[0];?>'><span onclick="return beforedelete();"><?php imagefile('deletesite.gif');?></a>
						</td>
		 		        </tr>
					</table>
				    </td>
				    <?php
				    $si=0;
			        }
			    }
			    elseif($si%$gaesa==($gaesa-1)){
			        if(file_exists("./$tablename/$row[1]")){
					    ?>
					    <td>
					    <table>
						    <tr>
						    <td><a href='cfileopen.php?dn=<?php echo$tablename;?>&fn=<?php echo$row[1];?>' onMouseover="textbodyprint2('<?php $filememo = str_replace("\r\n", '<br>',$filememo);$filememo=htmlspecialchars($filememo);echo $filememo;?>')" onMouseout=textbodyprint2(0,1)><?php filepic($row[1]);?><?php echo$row[1];?></a></td>
						    <td>
						    <a href='#' onClick="window.open('<?php echo $_SERVER['SCRIPT_NAME'];?>?a=x_filememo&tablename=<?php echo$tablename;?>&keyname=<?php echo$keyname;?>&keyid=<?php echo$keyid;?>&fileid=<?php echo$row[0];?>','debitexample','scrollbars=yes,resizable=yes,width=690,height=560,left=0,top=0'); return true">
						    <?php imagefile('g3.gif');?>
						    </a>
						    </td>
						    <td><a href='<?php echo $_SERVER['SCRIPT_NAME'];?>?a=x_filedelete&tablename=<?php echo$tablename;?>&keyname=<?php echo$keyname;?>&keyid=<?php echo$keyid;?>&fileid=<?php echo$row[0];?>'><span onclick="return beforedelete();"><?php imagefile('g3_1.gif');?></a>
							</td>
					        </tr>
						</table>
					    </td>
						</tr>
					    <?php
				    }
				}else{
				    if(file_exists("./$tablename/$row[1]")){
				  	    ?>
					    <td>
					    <table>
						    <tr>
						    <td><a href='cfileopen.php?dn=<?php echo$tablename;?>&fn=<?php echo$row[1];?>' onMouseover="textbodyprint2('<?php $filememo = str_replace("\r\n", '<br>',$filememo);$filememo=htmlspecialchars($filememo);echo $filememo;?>')" onMouseout=textbodyprint2(0,1)><?php filepic($row[1]);?><?php echo$row[1];?></a></td>
						    <td>
						    <a href='#' onClick="window.open('<?php echo $_SERVER['SCRIPT_NAME'];?>?a=x_filememo&tablename=<?php echo$tablename;?>&keyname=<?php echo$keyname;?>&keyid=<?php echo$keyid;?>&filename=<?php echo$row[0];?>','debitexample','scrollbars=yes,resizable=yes,width=690,height=560,left=0,top=0'); return true">
						    <?php imagefile('g3.gif');?>
						    </a>
						    </td>
						    <td><a href='<?php echo $_SERVER['SCRIPT_NAME'];?>?a=x_filedelete&tablename=<?php echo$tablename;?>&keyname=<?php echo$keyname;?>&keyid=<?php echo$keyid;?>&fileid=<?php echo$row[0];?>'><span onclick=" return beforedelete();"><?php imagefile('deletesite.gif');?></a>
							</td>
					        </tr>
						</table>
					    </td>
					    <?php
				    }
				}
				$si=$si+1;
			}
		}
		?>
        </table>
        <?php
    }
}


function attpopchoice($varstring,$addstring){
    parse_str($varstring);
	parse_str($addstring);
	if(!isset($attornot)){$attornot=0;}
	if(!isset($fornot)){$fornot=0;}

    ?>
    <script language="javascript">
    function <?php echo$idsignal;?>gotox(){
       var formPop = window.open("", "<?php echo$idsignal;?>gotoformpopup", "scrollbars=yes,resizable=no,width=910,height=530,top=0,left=0");
       <?php echo$idsignal;?>gotoform.target = "<?php echo$idsignal;?>gotoformpopup";
       <?php echo$idsignal;?>gotoform.method = "post";
       <?php echo$idsignal;?>gotoform.action = "c.php?a=goto&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&attornot=<?php echo$attornot;?>";
       <?php echo$idsignal;?>gotoform.submit();
    }
    </script>
    <form name='<?php echo$idsignal;?>gotoform' style='margin-bottom:0;margin-top:0'>
     <input type=hidden name=afile value="<?php echo$afile;?>">
     <input type=hidden name=baction value="<?php echo$baction;?>">
     <input type=hidden name=addstring value="<?php echo$addstring;?>">
     <?php if($fornot==1){if($attornot==1){?><img src='./icons/attor.gif' border=0><?php }elseif($attornot==2){?><img src='./icons/useralone.gif' border=0><?php }}elseif($fornot==2){if($attornot==1){?><img src='./icons/useralone.gif' border=0><?php }elseif($attornot==2){?><img src='./icons/useralone.gif' border=0><?php }}?>
     <input type=button name='<?php echo$idsignal;?>button_name' value='<?php if($fornot==1){if($attornot==1){?>대리인선택^<?php }elseif($attornot==2){?>출원인선택^<?php }}elseif($fornot==2){if($attornot==1){?>의뢰인선택^<?php }elseif($attornot==2){?>출원인선택^<?php }}?>' onclick="<?php echo$idsignal;?>gotox();" style='font-size:9pt; color:black; background-color:white; border-width:0; border-color:gray; border-style:solid;cursor:hand;'>
    </form>
    <?php
}

function headexistnot(){
    $totalsu=obtaintotalsu("head","headnick='1'");
    return $totalsu;
}

function onepageform($varstring){
global $searchkey;
global $xsearchkey;
global $searchword;
global $searchstring;
global $querystring;
parse_str($varstring);

         ?>
         <table cellspacing=0 cellpadding=0 border=0>
           <tr>
             <td align=left>
               <table><tr><td>
               <form name='ca1<?php echo$idsignal;?>' style='margin-bottom:0;margin-top:0' method=post action='<?php echo$filename;?>?a=<?php echo$actionname;?><?php if($addstring){echo$addstring;}?>&aor=1'>
                <input type=hidden name=searchkey value="<?php echo$searchkey;?>">
                <input type=hidden name=xsearchkey value="<?php echo$xsearchkey;?>">
                <input type=hidden name=searchword value="<?php echo$searchword;?>">
                <input type=hidden name=searchstring value="<?php echo$searchstring;?>">
                <input type=hidden name=querystring value="<?php echo$querystring;?>">
               <img src='./icons/onepage.gif' border=0><input type=button name='buttonca1<?php echo$idsignal;?>' value='한페이지로' onclick='ca1<?php echo$idsignal;?>.submit();' style='font-size:9pt;<?php if($aor==1){?>font-weight:bold;<?php }?>color:red; background-color:white; border-width:0; border-color:gray; border-style:solid; width:64;cursor:hand;'>
               </form>
               </td></tr></table>
             </td>
             <td>
               <table><tr><td>
               <form name='cb1<?php echo$idsignal;?>' style='margin-bottom:0;margin-top:0' method=post action='<?php echo$filename;?>?a=<?php echo$actionname;?><?php if($addstring){echo$addstring;}?>&aor=2'>
                <input type=hidden name=searchkey value="<?php echo$searchkey;?>">
                <input type=hidden name=xsearchkey value="<?php echo$xsearchkey;?>">
                <input type=hidden name=searchword value="<?php echo$searchword;?>">
                <input type=hidden name=searchstring value="<?php echo$searchstring;?>">
                <input type=hidden name=querystring value="<?php echo$querystring;?>">
               <img src='./icons/manypage.gif' border=0><input type=button name='buttoncb1<?php echo$idsignal;?>' value='여러페이지' onclick='cb1<?php echo$idsignal;?>.submit();' style='font-size:9pt;<?php if($aor==2){?>font-weight:bold;<?php }?>color:red; background-color:white; border-width:0; border-color:gray; border-style:solid; width:64;cursor:hand;'>
               </form>
               </td></tr></table>
             </td>
           </tr>
         </table>

         <?php
}
function delete_file($dirname,$filename){//디렉토리명 에 앞에서 $filename 이 들어간게 있으면 다지워라

        $dh  = opendir($dirname);
        while (false !== ($file = readdir($dh))) {
           if (  ($file!='.') && ($file!='..')  ){
              $extension = strrchr($file,'.');//마지막 점을 포함한 확장자
              $extensionleng=strlen($extension);/// 마지막점을 포함한 확장자길이
              $front=substr($file,0,-$extensionleng);//마지막점 앞쪽
              $ex=substr($extension,1);//점을 제외한 순수확장자를 소문자화함

              if(strlen(trim($filename))>0){
                 if ($front==$filename){
                     unlink($dirname.$file);
                 }
              }else{
                 unlink($dirname.$file);
              }
           }
        }
}
function askdatabase($tablename,$dirname,$filename){
global $connection,$dbname;
dbconnection();
   if($tablename=='officedata'){$action='officeform';}
   elseif($tablename=='letterheaddata'){$action='officeform';}
   if(!totalornot($tablename,'')){
      ?>
      <br><br><br><br><center>데이타베이스에 <?php echo $tablename;?>의 정보가 없습니다. 처음으로 정보를 넣으시겠습니까?=> 그러시려면 <a href='<?php echo$_SEVER[PHP_SELF];?>?a='<?php echo$action;?>'><font color=red>여기</font></a>를 눌러주세여!!!</center><br><br>
      <?php
      if(file_exists($filename)){
         $fp=fopen($filename,'r');
         if(filesize($filename)>0){
            $list=fread($fp,filesize($filename));
            fclose($fp);
            if(strlen(trim($list))>0){
               ?>
               <center>
               텍스트파일의 파일데이타로 <?php echo $tablename;?> 의 sql데이타를 구성하시겠습니까?=>그러시려면 <a href='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=txttotable<?php if($dirname){?>&dirname=<?php echo$dirname;?><?php }?>&tablename=<?php echo$tablename;?>'><font color=red>여기 </font></a>를 눌러주세여!!!</center>
               <?php
            }else{
                               /*사무소정보텍스트파일의 내용이 없음*/
            }
         }else{
            /*사무소정보텍스트파일이 없음*/
         }
      }
   }
}


function countrysidestring(){
	global $connection,$dbname;
	dbconnection();
    $totalcountrysu=obtaintotalsu('countrycode','');
    if($totalcountrysu<1){
        $dirname='infotxt';
        $filename="./$dirname/countrycode.txt";
        if(file_exists($filename)){
            txttotable('countrycode',$dirname);
        }
    }
    $sidestring='';
    $query = "select twocode,krname from countrycode order by twocode asc";
    $result=$connection->query($query);
	if ($result){
        while($row=$result->fetch_row()){
            if (strlen(trim($row[0]))>0){
                $row[1]=str_replace("\r\n",'',$row[1]);
                $sidestring.="<option value='$row[0]'>".$row[0].'('.$row[1].')'.'</option>';
            }
            $row[0]='';
        }
    }
    return $sidestring;
}
function ohmygodstring($kind=1){
    if($kind==1){
        ?>
	    <table><tr><td>
        <img src="./icons/ohmygod.png" width="20" border="0">찾으시는 데이타가 없습니다.
	    </td></tr></table>	   
        <?php
    }
    elseif($kind==2){
       ?>
       <img src='./icons/warning.png' width=20 border=0>실행할 수 없습니다.
       <?php
    }else{	   
        ?>
        <img src='./icons/warning.png' width=20 border=0><?php echo$kind;?>
        <?php	   
    }
}
function asktxttotable($dirname,$tablename,$string,$addstring){
   $filename="./$dirname/$tablename.txt";
   if(!file_exists("./$dirname/")){
      makenewdir($dirname);
   }
   if(!file_exists($filename)){
      makenewfile($filename);
   }else{
      $fp=fopen($filename,"r");
      if(filesize($filename)>0){
         $list=fread($fp,filesize($filename));
         fclose($fp);
         if(strlen(trim($list))>0){
            if(obtaintotalsu($tablename,'')<1){
               ?>
               <img src='./icons/ohmygod.gif' border=0>현재 텍스트파일의 데이타로 <?php echo $string;?> sql데이타를 만들수있습니다.그러시려면 <a href='c.php?a=txttotable&dirname=<?php echo$dirname;?>&tablename=<?php echo$tablename;?><?php echo$addstring;?>'><font color=red><b>=>여기 </b></font></a>를 눌러주세여!!!</center>
               <?php
               return true;
            }else{
               return false;
            }
         }else{
            /*사무소정보텍스트파일의 내용이 없음*/
         }
      }else{
         /*사무소정보텍스트파일이 없음*/
      }
   }
}

function logfile(){
    $contents=file('./logfile.txt');
    ?>
    <br>
    <center>
    <b>사용자 입 퇴장 내역
    <table width=500 border=1>
    <tr bgcolor=beige>
    <td>번호</td>
    <td>사용자아디 </td>
        <td>구분</td>
        <td>시각 </td>
        <td>접속자아이피</td>
    </tr>
    <?php
    $endsu=count($contents);
    for ($i=$endsu-1;$i>=0;$i--){
             $list=explode('|||||',$contents[$i]);
             ?>
             <tr>
             <td><?php echo$i;?></span</td>
             <td><?php echo$list[0];?></span</td>
             <td><?php echo$list[1];?></span</td>
             <td><?php echo$list[2].'-'.$list[3].'-'.$list[4].'-'.$list[5].'-'.$list[6].'-'.$list[7];?></span</td>
             <td> <?php echo$list[8];?></span</td></tr>
             <?php
    }
    ?>
    </table>
    <?php
}

function movefocusindus($nowform,$nowblank,$setblank,$induskind,$nextblank,$nowlength){
   if ($induskind==1){
      $indusvalue=10;
   }
   elseif ($induskind==2){
      $indusvalue=20;
   }
   elseif ($induskind==3){
      $indusvalue=30;
   }
   ?>
   onKeyUp='if(document.<?php echo$nowform;?>.<?php echo$nowblank;?>.value.length==<?php echo$nowlength;?>){document.<?php echo$nowform;?>.<?php echo$setblank;?>.value=<?php echo$indusvalue;?>;document.<?php echo$nowform;?>.<?php echo$nextblank;?>.focus();}'
   <?php
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function myname(){
	global $dbname,$connection;
	global $staffdata;
	if(  (isset($_SESSION["my_session"]))  &&   ( strlen(trim($_SESSION["my_session"]))>0 ) ){
		$myname=obtainfield($staffdata,'krname',"userid='$_SESSION[my_session]'");
		return $myname;
	}
}


function mystaffid(){
global $dbname,$connection;
global $staffdata;
    $staffid=obtainfield($staffdata,'staffid',"userid='$_SESSION[my_session]'");
    return $staffid;
}
function staffuserid($staffid){
global $dbname,$connection;
global $staffdata;
    $userid=obtainfield($staffdata,'userid',"staffid='$staffid'");
    return $userid;
}
function staffname($userid){
global $dbname,$connection;
global $staffdata;
    return obtainfield($staffdata,'krname',"userid='$userid'");
}
function staffkind($staffclass){
    if($staffclass==1){$string="변리사";}
    if($staffclass==2){$string="직원";}
    return $string;
}
function customching($fornot,$ws){
   if($fornot==1){if($ws==1){$ching='외국출원인';}elseif($ws==2){$ching='외국대리인';}}
   if($fornot==2){$ching='국내고객';}
   return $ching;
}
function nopaystring($paynot){	
   $string="";
   if ($paynot==1){$string='미지불';}
   elseif($paynot==2){$string='지불완료';}
   elseif($paynot==3){$string='무효';}
   elseif($paynot==4){$string='일부지불';}   
   return $string;
}

function fornotstring($fornot){
   if ($fornot==1){$string='외국';}
   elseif ($fornot==2){$string='국내';}
   elseif ($fornot==3){$string='국내외';}
   else{$string='전체';}
   return $string;
}
function fornotappstring($fornot){
   if ($fornot==1){$string='외국출원';}
   elseif ($fornot==2){$string='국내출원';}
   elseif ($fornot==3){$string='국내외출원';}
   return $string;
}
function fornotregstring($fornot){
   if ($fornot==1){$string='외국등록';}
   elseif ($fornot==2){$string='국내등록';}
   elseif ($fornot==3){$string='국내외등록';}
   return $string;
}
function aprstring($apr){
   if ($apr==1){$string='출원';}
   elseif ($apr==2){$string='등록';}
   return $string;
}
function aprhanja($apr){
   if ($apr==1){$string='[<font color=red>出</font>]';}
   elseif ($apr==2){$string='[<font color=red>登</font>]';}
   return $string;
}
function memoview($varstring){//$cate,$jungcode
	global $connection;
	global $dbname;
	global $memodata;
	dbconnection();
        parse_str($varstring);
		if(!isset($jungcode)){$jungcode=0;}
		if(!isset($_SESSION['my_session'])){$_SESSION['my_session']='';}
		
        $tdate=date('Ymd');
        if ($cate=='주간'){
           $weekfirst=weekfirst($jungcode);
           $weeklast=weeklast($jungcode);
        }
        $status=2;
        if ( ($cate=='월간') ||  ($cate=='주간') || ($cate=='일간') ){
           if ($cate=='월간'){
              $jungcode=substr($jungcode,0,6);
              $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (  jungcode like '$jungcode%')   )   )  and ((todaynosee>$tdate) or (todaynosee<$tdate )) and  (writer='$_SESSION[my_session]')  and (status='$status')";
           }
           elseif ($cate=='주간'){
              $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (  (jungcode >='$weekfirst') and (jungcode <=='$weeklast')  )   )   ) and ((todaynosee>$tdate) or (todaynosee<$tdate )) and  (writer='$_SESSION[my_session]')  and (status='$status')";
           }
           elseif ($cate=='일간'){
              $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (  jungcode like '$jungcode%')   )    )  and ((todaynosee>$tdate) or (todaynosee<$tdate )) and  (writer='$_SESSION[my_session]')  and (status='$status')";
           }
        }else{
           if($jungcode){
              $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and  (cate='$cate') and (jungcode='$jungcode')  )     )  and  (   (todaynosee>$tdate) or (todaynosee<$tdate )   ) and  (writer='$_SESSION[my_session]')  and (status='$status')";
           }else{
              $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (trim(jungcode)='')   )    )   and  (   (todaynosee>$tdate) or (todaynosee<$tdate )    ) and  (writer='$_SESSION[my_session]')  and (status='$status')";
           }
        }

        $result = $connection->query($query);

        if ($result){
		   $row=$result->fetch_row();
           if ($row[0]>0){

             ?>

             <a href="memo.php?a=memoshow<?php if ($cate){?>&cate=<?php echo$cate;?><?php }?><?php if ($jungcode){?>&jungcode=<?php echo$jungcode;?><?php }?>&status=1" onclick="popup(this,990,700);return false;" target="_blank">
             <img src='./icons/memoview.gif' border=0><?php echo colorchangestring('ff',$row[0]);?>
             </a>
             <?php
           }else{
             $status=3;
             if ( ($cate=='월간') ||  ($cate=='주간') || ($cate=='일간') ){
                if ($cate=='월간'){
                   $jungcode=substr($jungcode,0,6);
                   $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (  jungcode like '$jungcode%')   )   )  and ((todaynosee>$tdate) or (todaynosee<$tdate )) and  (writer='$_SESSION[my_session]')  and (status='$status')";
                }
                elseif ($cate=='주간'){
                   $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (  (jungcode >='$weekfirst') and (jungcode <=='$weeklast')  )   )   ) and ((todaynosee>$tdate) or (todaynosee<$tdate )) and  (writer='$_SESSION[my_session]')  and (status='$status')";
                }
                elseif ($cate=='일간'){
                   $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (  jungcode like '$jungcode%')   )    )  and ((todaynosee>$tdate) or (todaynosee<$tdate )) and  (writer='$_SESSION[my_session]')  and (status='$status')";
                }
             }else{
                if($jungcode){
                   $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and  (cate='$cate') and (jungcode='$jungcode')  )     )  and  (   (todaynosee>$tdate) or (todaynosee<$tdate )   ) and  (writer='$_SESSION[my_session]')  and (status='$status')";
                }else{
                   $query = "select count(*) from $memodata where (  (onecheck='') or    (  ( onecheck='1' ) and (cate='$cate')  and (trim(jungcode)='')   )    )   and  (   (todaynosee>$tdate) or (todaynosee<$tdate )    ) and  (writer='$_SESSION[my_session]')  and (status='$status')";
                }
             }
             $result = $connection->query($query);
             if ($result){
			    $row=$result->fetch_row();
                   // echo $query; echo$total[0];
                if ($row[0]>0){
                   ?>
                   <a href='#' onClick="window.open('memo.php?a=memoshow<?php if ($cate){?>&cate=<?php echo$cate;?><?php }?><?php if ($jungcode){?>&jungcode=<?php echo$jungcode;?><?php }?>&status=3','ggmemowindow','scrollbars=yes,resizable=no,width=850,height=600,left=0,top=0'); return true">
                   <img src='./icons/memoview.gif' border=0  border=1 bordercolor=white class='borderimage'  style='filter:alpha(opacity=50)' onmouseover="high(this);borderit(this,'red');" onmouseout="low(this);borderit(this,'white');">
                   </a>
                   <?php
                }else{

                }
             }
           }
        }
}
function memowrite($cate,$jungcode){
global $dbname,$connection;
global $memodata;
dbconnection();
?>
<script language='javascript'>
function awmake(){
   d = new Date();
   newwin=window.open('./memo.php?a=memoform&mode=new&cate=<?php echo$cate;?>&onecheck=1&jungcode=<?php echo$jungcode;?>&timesm='+ t,'ddsdst','scrollbars=no,resizable=yes,width=610,height=414,left=0,top=0');
}
function bwmake(){
   d = new Date();
   t = d.getTime();
   var newwin=t;
   newwin=window.open('./memo.php?a=memoform&mode=new&cate=<?php echo$cate;?>&onecheck=1&alwaycheck=1&timesm='+ t,'ddsdst','scrollbars=no,resizable=yes,width=610,height=414,left=0,top=0');
}
</script>
<?php
          if ($jungcode>0){
               ?>
               <input type=image src='./icons/memowrite.gif' onClick='javascript:awmake();' border=1 bordercolor=white class='borderimage'  style='filter:alpha(opacity=50)' onmouseover="high(this);borderit(this,'red');" onmouseout="low(this);borderit(this,'white');">

               <?php
          }else{
               ?>
               <input type=image src='./icons/memowrite.gif'  onClick='javascript:bwmake();' border=1 bordercolor=white class='borderimage'  style='filter:alpha(opacity=50)' onmouseover="high(this);borderit(this,'red');" onmouseout="low(this);borderit(this,'white');">

               <?php
          }
}
function banfornot($fornot){
   if($fornot==1){return 2;}
   elseif($fornot==2){return 1;}
}
function attorsu($fornot=1){
global $connection;
global $dbname;
global $customdata;
$tdbackcolor=seecolor($fornot,'tabledown');
$linetype='solid';
                  dbconnection();
                  $thisyear=date('Y');
                  $beforeyear=date('Y')-1;
                  $thismonth=date('Ym');
                  $xaquery = "select count(*) from $customdata where firstdate like '$thisyear%'";
                  $xaresult = mysql_query($xaquery,$connection);
                  if ($xaresult){
                          $xa_num=mysql_fetch_row($xaresult);
                  }
                  $xbquery = "select count(*) from $customdata where firstdate like '$beforeyear%'";
                  $xbresult = mysql_query($xbquery,$connection);
                  if ($xbresult){
                          $xb_num=mysql_fetch_row($xbresult);
                  }
                  $xcquery = "select count(*) from $customdata where firstdate like '$thismonth%'";
                  $xcresult = mysql_query($xcquery,$connection);
                  if ($xcresult){
                          $xc_num=mysql_fetch_row($xcresult);
                  }


                  ?>
                  <table width=100% class=eetable>
                  <tr><td style='border-bottom: <?php echo $linetype;?> <?php echo$tdbackcolor;?> 1px;border-right: <?php echo $linetype;?> <?php echo$tdbackcolor;?> 1px;'><img src='./icons/attor.gif' width=10>당월등록(<?php echo$xc_num[0];?>)</td>
                  <td width=74% style='border-bottom: <?php echo $linetype;?> <?php echo$tdbackcolor;?> 1px;'><img src=graph.php?a=makdae&gkind=1&garo=100&sero=3&su=<?php echo$xc_num[0]*5;?>&color=red></td>
                  </tr>
                  <tr><td style='border-right: <?php echo $linetype;?> <?php echo$tdbackcolor;?> 1px;'><img src='./icons/attor.gif' width=10>올해등록(<?php echo$xa_num[0];?>)</td>
                  <td><img src='graph.php?a=makdae&gkind=1&garo=100&sero=3&su=<?php echo$xa_num[0]*5;?>&color=green'></td>
                  </tr>
                  </table>

<?php
}
function gotodate($getdate,$url){
        $yythis=substr($getdate,0,4);
        $mmthis=substr($getdate,4,2);
        $monthfirst=monthfirst($getdate);
        $monthlast=monthlast($getdate);
?>      <script>

        function endday(rsyear,rsmonth){
        var enddayarr = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
        if (((rsyear % 4 == 0) && (rsyear % 100 != 0)) || (rsyear % 400 == 0)) enddayarr[1] = "29";
        remon = Number(rsmonth)-1;
        return enddayarr[remon];
        }

        function gotowantdate(){
              this.window.location.replace('<?php echo$url;?>&getdate='+kkkform.goyear.value+kkkform.gomonth.value+'01&fromdate='+kkkform.goyear.value+kkkform.gomonth.value+'01&todate='+kkkform.goyear.value+kkkform.gomonth.value+endday(kkkform.goyear.value,kkkform.gomonth.value));
        }
        </script>
        <form name=kkkform  method='post' style='margin-bottom:0;margin-top:0'>
                        <table border=0 cellspacing=0 cellpadding=0><tr>
                        <td>
                        <input type=text name=goyear size=4 value='<?php echo$yythis;?>' style='font-size:9pt;font-family:Gothic; color:black; background-color:white; border-width:1; border-color:gray; border-style:solid;'>
                        <?php
                          $nowyear=substr($getdate,0,4);
                          $firstsu=$nowyear+10;

                          if ($firstsu>9999){$firstsu=9999;}

                          $endsu=$nowyear-20;

                          for ($eachyear=$firstsu;$eachyear>$endsu;$eachyear=$eachyear-1){
                          $sidestring.="<option value='$eachyear'>$eachyear";
                          }
                         // echo $sidestring;
                          sideinsert('kkkform','goyear',$sidestring,120,20);
                           ?>
                          </td>
                        <td>
                        <input type=text name=gomonth size=2 value='<?php echo$mmthis;?>' style='font-size:9pt;font-family:Gothic; color:black; background-color:white; border-width:1; border-color:gray; border-style:solid;'>
                        <?php
                          $sidestring='';
                          $sidestring="<option value='01'>01<option value='02'>02<option value='03'>03<option value='04'>04<option value='05'>05<option value='06'>06<option value='07'>07";
                          $sidestring.="<option value='08'>08<option value='09'>09<option value='10'>10<option value='11'>11<option value='12'>12";
                          sideinsert('kkkform','gomonth',$sidestring,120,13);
                           ?>
                          </td>
                          <td>
                          <input type='button' value='가기' onclick='gotowantdate();' style='font-size:11;font-family:Gothic; color:black; background-color:white; border-width:1; border-color:gray; border-style:solid;'>
                          </td>
                          </tr>
                          </table>
            </form>
<?php
}
function applicanttable($fornot,$appstring){
        $appstring=str_replace("\r\n\r\n","\r\n",$appstring);
        $appstring=str_replace("'","`",$appstring);
        $appstringarray=explode("\r\n",$appstring);
        $endsu=count($appstringarray)-1;
        for ($j=0;$j<$endsu;$j=$j+1){
           if ( strlen(trim($appstringarray[$j]))>0){
              if (eregi('(성명/상호)',$appstringarray[$j]) ){
                 $krname=obtainstring($appstringarray[$j],'(성명/상호)','(코드:');
                 $code=obtainstring($appstringarray[$j],'(코드:',")");
                 $citizenno=obtainstring($appstringarray[$j+1],'(주민/법인번호)','(출원인코드)');
                 $appcode=obtainlaststring($appstringarray[$j+1],'(출원인코드)');
                 $kaddress=obtainlaststring($appstringarray[$j+2],'(주소)');
                 ?>
                 <table width=100% border=1 bordercolor=<?php echo seecolor($fornot,'listup');?> cellspacing=2 cellpadding=2 <?php echo collapse;?>>
                    <tr>
                       <td width=80>성명상호</td>
                       <td>
                       <?php
                       if(strlen(trim($code))>0){
                          if($fornot==1){
                             ?>
                             <a href=fa.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$code;?>&whd=<?php echo$whd;?>><?php echo $krname;?></a>
                             <?php
                          }
                          if($fornot==2){
                             ?>
                             <a href=fa.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$code;?>&whd=<?php echo$whd;?>><?php echo $krname;?></a>
                             <?php
                          }
                       }else{
                          echo $krname;
                       }
                       ?>
                       </td>
                       <td width=80>코드</td>
                       <td>
                          <?php
                          if(strlen(trim($code))>0){
                             if($fornot==1){
                                ?>
                                <a href=fa.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$code;?>&whd=<?php echo$whd;?>><?php echo $code;?></a>
                                <a href='#' onClick="window.open('fa.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$code;?>&whd=2','aletterexample','scrollbars=yes,resizable=yes,width=990,height=560,left=0,top=0'); return true"><span class=kored>[√<span class=kored>]</a>
                                <?php
                             }
                             elseif($fornot==2){
                                ?>
                                <a href=fa.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$code;?>&whd=<?php echo$whd;?>><?php echo $code;?></a>
                                <a href='#' onClick="window.open('fa.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$code;?>&whd=2','aletterexample','scrollbars=yes,resizable=yes,width=990,height=560,left=0,top=0'); return true"><span class=kored>[√<span class=kored>]</a>
                                <?php
                             }
                          }
                          ?>
                       </td>
                    </tr>
                    <tr>
                       <td width=80>주민/법인번호</td>
                       <td><?php echo $citizenno;?></td>
                       <td width=80>출원인코드</td>
                       <td width=120>
                           <?php echo substr($appcode,0,1).'-'.substr($appcode,1,4).'-'.substr($appcode,5,6).'-'.substr($appcode,11,1);?>
                       </td>
                    </tr>
                    <?php
                    if(strlen(trim($kaddress))>0){
                       ?>
                       <tr>
                          <td>주소</td>
                          <td colspan=3>
                          <?php echo $kaddress; ?>
                          </td>
                       </tr>
                       <?php
                    }
                    ?>
                 </table>
                 <?php
                 $j=$j+2;
              }
           }
        }
}

function customsangho($id,$kind=1){
	global $dbname,$connection;
	global $customdata;
	$sangho="";
    $query="select sangho from $customdata where id='$id'";
    $result= $connection->query($query);
    if ($result->num_rows>0){
         $row=$result->fetch_row();
		 $sangho=$row[0];
    }
    return $sangho;
}
function customicon($id){
	global $dbname,$connection;
	global $customdata;
	$fornot="";
	if ( (isset($id)) && ($id>0) ){
		$query="select fornot,sangho,countrycode from $customdata where id='$id'";
		$result= $connection->query($query);
		if($result){
			if ($result->num_rows>0){
				$row=$result->fetch_row();			
				$fornot=$row[0];
				$sangho=$row[1];
				$countrycode=$row[2];
				if( (trim($fornot)=="")  || ($fornot<1) ){
					if(strlen(trim($countrycode))<1){
						$fornot=1;
					}else{
						if (strtolower($countrycode)!="kr"){
							$fornot=1;	
						}else{
							$fornot=2; 	
						}
					}				
				}
				?>
				<span onmouseover="itemClick(event,'<?php echo$sangho;?>','sanghofield',200)" onmousemove="msgmove(event,'sanghofield')" onmouseout="itemRemove('sanghofield')"> 

				<a href="custom.php?a=custom_display&id=<?php echo $id;?>">
				<img src="./icons/for<?php echo$fornot;?>.png" width="20" border="0">
				</a>
				</span>
				<?php					
			}else{
				
				
			}
		}
	}
}
function lettersangho($id){///////서신에 사업자상호를 쓰는 거 상호
	global $dbname,$connection;
	global $customdata;
	dbconnection();
	$str="";
    $query="select fornot,sangho,saupsangho,saupuse,clas from $customdata where id='$id'";
    $result= $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_row();
			$fornot=$row[0];
			$sangho=$row[1];
			$saupsangho=$row[2];
			$saupuse=$row[3];
			$clas=$row[4];
			if($fornot==2){
				if($saupuse=='1'){
					$str=$saupsangho;
				}else{			
					if($clas=='1'){
						$str=$sangho." 님";
					}
					elseif($clas=='2'){
						$str=$sangho;	
					}
					elseif($clas=='3'){
						$str=$sangho;	
					}
					
				}			
			}
			elseif($fornot==1){
				
			    $str=$sangho;	
			}
			 
		}
    }
	return $str;
}
function letterattention($id){///////서신에 참조를 어떻게 할껀지
	global $dbname,$connection;
	global $customdata;
	dbconnection();
	$str="";
    $query="select sangho,saupsangho,saupuse,clas from $customdata where id='$id'";
    $result= $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_row();
			$sangho=$row[0];
			$saupsangho=$row[1];
			$saupuse=$row[2];
			$clas=$row[3];
			if($saupuse=='1'){
                $str=$saupsangho;
            }else{			
			    if($clas=='1'){
					$str=$sangho." 님";
				}
				elseif($clas=='2'){
				    $str=$sangho;	
				}
				elseif($clas=='3'){
				    $str=$sangho;	
				}
				
            }			
			 
		}
		return $str;
	}
    return $sangho;
}

function customclasstring($clas,$fornot=2){///개인,법인,법인격없는단체 구하기...
    $str="";
	if($fornot==1){
		if($clas==1){
			$str="Individual";
		}
		if($clas==2){
			$str="Legal Person";
		}
		if($clas==3){
			$str="corporation without incorporation";
		}
	}
	if($fornot==2){
		if($clas==1){
			$str="개인";
		}
		if($clas==2){
			$str="법인";
		}
		if($clas==3){
			$str="법인격없는단체";
		}
	}
	return $str;
}

function customlappstring($id){//////////코드자를 붙이는거 고객명(코드:몇)
	global $dbname,$connection;
	global $customdata;
	dbconnection();
	$sangho="";
    $query="select sangho from $customdata where id='$id'";
    $result= $connection->query($query);
    if ($result->num_rows>0){
         $row=$result->fetch_row();
		 $sangho=$row[0];
    }
    return $sangho."(코드:".$id.")";
}
function damoptionstring($id){
	global $dbname,$connection;
    global $customdata;
    $sidestring="";
    $query="select dam1,jikwe1,dam2,jikwe2,dam3,jikwe3 from $customdata where id='$id'";
    $result= $connection->query($query);
	if ($result->num_rows>0){
        $row=$result->fetch_assoc();
		$dam1=$row['dam1'];
		$jikwe1=$row['jikwe1'];
		$dam2=$row['dam2'];
		$jikwe2=$row['jikwe2'];
		$dam3=$row['dam3'];
		$jikwe3=$row['jikwe3'];
		if(strlen(trim($dam1))>0){			
			$sidestring="<option>".$dam1." $jikwe1"."</option>";
		}
		if(strlen(trim($dam2))>0){			
			$sidestring.="<option>".$dam2." $jikwe2"."</option>";
		}
		if(strlen(trim($dam3))>0){			
			$sidestring.="<option>".$dam3." $jikwe3"."</option>";
		}
		
		return $sidestring;
    }
	return $sidestring;
}
function ourrefoptionstring($id){
	global $dbname,$connection;
    global $appdata;
    $sidestring="";
    $query="select ourref from $appdata where lappcode='$id'";
    $result= $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_assoc();
			$ourref=$row['ourref'];

			if(strlen(trim($ourref))>0){			
				$sidestring="<option>".$ourref."</option>";
			}	
			return $sidestring;
		}
	}
	return $sidestring;
}
function customweb($id){
	global $dbname,$connection;
	global $customdata;
	dbconnection();
    $query="select homep from $customdata where id='$id'";
    $result= $connection->query($query);
    if ($result){
        $row=$result->fetch_assoc();
        if($row){
            return $row['homep'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
function customdetail($id){
global $dbname,$connection;
global $customdata;
dbconnection();
  $query="select telno,faxno,email.woo1,woo2,country from $customdata where id='$id'";
  $result= $connection->query($query);
  if ($result){
     $row=$result->fetch_assoc();
     if($row){
        return $row[telno].'<br>'.$row[faxno].'<br>'.$row[email].'<br>'.$row[woo1].'<br>'.$row[woo1].'<br>'.$row[country];
     }else{
        return false;
     }
  }else{
     return false;
  }
}
function fornotcolor($fornot=1){
      if(!$fornot){$fornot=1;}
      if($fornot==1){$color='#d5d5c4';}
      elseif($fornot==2){$color='skyblue';}
      return $color;

}
///////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
function induscolortable(){
    ?>
    <table><tr>
    <td><font color=blue>■</span></td> <td>특허</td><td><font color=skyblue>■</span></td> <td>실용</td>
    <td><font color=green>■</span></td> <td>디자인</td><td><font color=red>■</span></td> <td>상표</td>
	</tr></table>
	<?php
}
function induscolor($induskind,$kind=1){
    if($kind==1){
		if($induskind==1){$color='blue';}//4682B4	70,130,180
		elseif($induskind==2){$color='skyblue';}//87CEEB	135,206,23
		elseif($induskind==3){$color='green';}//8FBC8F	143,188,143
		elseif($induskind==4){$color='red';} //F08080	240,128,128
		return $color;
	}
    elseif($kind==2){
		if($induskind==1){$color='#4682B4';}    //4682B4	70,130,180
		elseif($induskind==2){$color='#87CEEB';}//87CEEB	135,206,23
		elseif($induskind==3){$color='#8FBC8F';}//8FBC8F	143,188,143
		elseif($induskind==4){$color='#F08080';}//F08080	240,128,128
		return $color;
	}
    elseif($kind==3){
		if($induskind==1){$color='70,130,180';}    //4682B4	70,130,180
		elseif($induskind==2){$color='135,206,23';}//87CEEB	135,206,23
		elseif($induskind==3){$color='143,188,143';}//8FBC8F	143,188,143
		elseif($induskind==4){$color='240,128,128';}//F08080	240,128,128
		return $color;
	}
}
function debitcolor($nowstatus=1){
    if($nowstatus==1){$color="salmon";}
    if($nowstatus==2){$color="green";}
    if($nowstatus==3){$color="yellow";}
    if($nowstatus==4){$color="yellow";}	
	return $color;
}
function nowstatusdot($nowstatus=1){
    if($nowstatus==1){echo "<font color=red>●</font>";}
    if($nowstatus==2){echo "<font color=green>●</font>";}
    if($nowstatus==3){echo "<font color=red>무효</font>";}
    if($nowstatus==4){echo "<font color=red>일부지불</font>";}	
}
function debitcolorstring(){
     ?>
	 <table border=0 width=80 style="border:1px solid #ffffff;"><tr><td>
     <font color=<?php echo debitcolor(1);?>>■</font>청구<font color=<?php echo debitcolor(2);?>>■</font>입금
	 </td></tr></table>
	 <?php
}

function gradepic($grade){
//global $fornot;
      if ($grade==1){$picname='mangchi';}
      elseif ($grade==2){$picname='jeoul3';}
      elseif ($grade==3){$picname='super1';}
      elseif ($grade==4){$picname='oppo';}
      ?>
      <img src='./icons/<?php echo$picname;?>.gif' border=0 width=20>
      <?php
}
function classificmal($classific){
   $classific=deletelastcomma(deletefirstcomma($classific));
   $classificarray=explode(',',$classific);
   $remain=count($classificarray);
   if (count($classificarray)>1){
      $string="Total $remain classes". " including class $classificarray[0]";
   }else{
      if (strlen(trim($classific))>3){
         $classific=substr($classific,0,3).'..';
         $string=$classific;
      }else{
         $string=$classific;
      }
   }
   return $string;
}

function appnostring($appno){
	$no="";
	$no=substr($appno,0,1).'-'.substr($appno,1,4).'-'.substr($appno,5,6).'-'.substr($appno,11,1);
    return $no;
}

function saupnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $var_1=substr($value,0,3);
    $var_2=substr($value,3,2);
    $var_3=substr($value,5,5);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=3 maxlength=3 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,3);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=2 maxlength=2 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,$va_3,2);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=5 maxlength=5 value='<?php echo$var_3;?>' <?php movefocus($formname,$va_3,$next,5);?>></td>
    </td></tr></table>	
	<?php
	
}

function saupnostring($saupno){
     if($saupno){
         return substr($saupno,0,3).'-'.substr($saupno,3,2).'-'.substr($saupno,5,5);
     }
}
function citizennostring($regno){
     if($regno){
         return substr($regno,0,6).'-'.substr($regno,6,7);
     }
}
function zupnostring($zupno){
    if(  (isset($zupno))  && (strlen(trim($zupno))>0)  ){
        return substr($zupno,0,4).'-'.substr($zupno,4,7);
    }else{
	    return false;	
	}
}
function citizennotitle($clas){
	if($clas=='1'){
		return "주민등록번호";
	}
	elseif($clas=='2'){
		return "법인등록번호";
	}
}
function saupjanostring($saupno){
     if($saupno){
         return substr($saupno,0,3).'-'.substr($saupno,3,2).'-'.substr($saupno,5,5);
     }
}
function zipcodestring($zipcode){
     if(strlen(trim($zipcode))==7){
         return substr($zipcode,0,3).'-'.substr($zipcode,4,3);
     }
     elseif(strlen(trim($zipcode))==6){
         return substr($zipcode,0,3).'-'.substr($zipcode,3,3);
     }

}

function postfromdate(){
    if(isset($_POST['fromdate_1'])){
        return$_POST['fromdate_1'].$_POST['fromdate_2'].$_POST['fromdate_3'];
	}
}
function posttodate(){
    if(isset($_POST['todate_1'])){
        return$_POST['todate_1'].$_POST['todate_2'].$_POST['todate_3'];
	}
}
function fromtostring($fromdate,$todate){
    return datestring($fromdate).'~'.datestring($todate);	
}

function fromtodate($varstring){
	
	parse_str($varstring);
	$formname=$id."form";
	if(!isset($pk)){$pk=1;}
	if(!isset($fromdate)){$fromdate=date("Ymd");}
	if(!isset($fromdate_1)){$fromdate_1=date("Y");}
	if(!isset($fromdate_2)){$fromdate_2=date("m");}
	if(!isset($fromdate_3)){$fromdate_3=date("d");}
	if(!isset($todate)){$todate=date("Ymd");}
	if(!isset($todate_1)){$todate_1=date("Y");}
	if(!isset($todate_2)){$todate_2=date("m");}
	if(!isset($todate_3)){$todate_3=date("d");}
	
    ?>
    <form name='<?php echo$formname;?>' method="post" style='margin-bottom:0;margin-top:0' action="?a=<?php echo$actionname;?>">
    <input type=text name="fromdate_1" size=4 maxlength=4 value='<?php echo$fromdate_1;?>' style="border-width:1;color:gray;border-style:solid;padding:0; width:36;padding-top:1px;" <?php movefocus($formname,'fromdate_1','fromdate_2',4);?>>.
    <input type=text name="fromdate_2" size=2 maxlength=2 value='<?php echo$fromdate_2;?>' style="border-width:1;color:gray;border-style:solid;padding:0; width:18;padding-top:1px;" <?php movefocus($formname,'fromdate_2','fromdate_3',2);?>>.
    <input type=text name="fromdate_3" size=2 maxlength=2 value='<?php echo$fromdate_3;?>' style="border-width:1;color:gray;border-style:solid;padding:0; width:18;padding-top:1px;" <?php movefocus($formname,'fromdate_3','todate_1',2);?>>.
    <?php
    if($pk==1){///과거 한달,3달,1년전
        ?>
        <input type='button' value='한달전' onClick="<?php insertonemonthb($formname,'fromdate_1','fromdate_2','fromdate_3','fromdate_1');?>">
        <input type='button' value='3달전' onClick="<?php insertthreemonthb($formname,'fromdate_1','fromdate_2','fromdate_3','fromdate_1');?>">
        <input type='button' value='일년전' onClick="<?php insertoneyearb($formname,'fromdate_1','fromdate_2','fromdate_3','fromdate_1');?>">
        <?php
    }

	?>
    <input type='button' value='x' onClick="<?php deletetoday($formname,'fromdate_1','fromdate_2','fromdate_3','todate_1');?>">
    ~
    <input type=text name="todate_1" size=4 maxlength=4 value='<?php echo$todate_1;?>' style="border-width:1;color:gray;border-style:solid;padding:0; width:36;padding-top:1px;" <?php movefocus($formname,'todate_1','todate_2',4);?>>.
    <input type=text name="todate_2" size=2 maxlength=2 value='<?php echo$todate_2;?>' style="border-width:1;color:gray;border-style:solid;padding:0; width:18;padding-top:1px;" <?php movefocus($formname,'todate_2','todate_3',2);?>>.
    <input type=text name="todate_3" size=2 maxlength=2 value='<?php echo$todate_3;?>' style="border-width:1;color:gray;border-style:solid;padding:0; width:18;padding-top:1px;">.
    <?php
    if($pk==2){///미래한달,3달,1년후
        ?>
        <input type='button' value='한달후' onClick="<?php insertonemonth($formname,'todate_1','todate_2','todate_3','todate_1');?>">
        <input type='button' value='3달후' onClick="<?php insertthreemonth($formname,'todate_1','todate_2','todate_3','todate_1');?>">
        <input type='button' value='일년후' onClick="<?php insertoneyear($formname,'todate_1','todate_2','todate_3','todate_1');?>">
        <?php
    }

    ?>
    <input type='button' value='오늘' onClick="<?php inserttoday($formname,'todate_1','todate_2','todate_3','todate_1');?>">
	
    <input type='button' value='x' onClick="<?php deletetoday($formname,'todate_1','todate_2','todate_3','todate_1');?>">
    <script language='javascript'>
    document.<?php echo$formname;?>.fromdate_1.focus();
    </script>
    <input type=submit name=startsearch value='찾기' style="font-size:9pt;font-family:gothic;color:black; background-color:rgb(225,220,201); border-width:1; border-color:green; border-style:solid; padding-top:2px;cursor:hand;width:30;padding:0;" onmouseover="this.style.backgroundColor='#DFD2A6'" onmouseout="this.style.backgroundColor='E1DCC9'">
    </form>
    <?php
}
function differornot($apr,$id){
global $connection,$dbname;
global $fdata;
global $fregdata;
dbconnection();
 $differ=false;
 if($apr==1){
  $result = $connection->query("select count(*) from $fdata where ( (find_in_set($id,appcode)>0) and (lappcode !='$id' ) ) or ( (find_in_set($id,appcode)<1) and (lappcode ='$id' ) ) ");
  if ($result){
      $row_num=$result->fetch_row();
      if($row_num[0]>0){
          $differ=true;
      }
  }
 }
 if($apr==2){
  $result = $connection->query("select count(*) from $fregdata where ( (find_in_set($id,appcode)>0) and (lappcode !='$id' ) ) or ( (find_in_set($id,appcode)<1) and (lappcode ='$id' ) ) ");
  if ($result){
      $row_num=$result->fetch_row();
      if($row_num[0]>0){
          $differ=true;
      }
  }
 }
  return $differ;
}

function officeaddress($fornot=2){
	global $dbname,$connection;
	global $officedata;
	dbconnection();
    $query = "select enaddress,kraddress from $officedata where officeid='1'";
    $result = $connection->query($query);
    if ($result->num_rows>0){
        $row=$result->fetch_row();
        if($row){
			if($fornot==1){
				return $row[0];
			}
			elseif($fornot==2){
				return $row[1];
			}
		}
    }
}
function officedetail($fornot=2){
	global $dbname,$connection;
	global $officedata;
	dbconnection();
    $query = "select * from $officedata where officeid='1'";
	$result = $connection->query($query);

	if($result){

		if ($result->num_rows>0){
			    $row=$result->fetch_assoc();
				if($fornot==1){
					?>
					<table border=1>
					<tr>
					<td><center>
					<?php 
					echo "<b>".$row['enname']."</b>";
					echo "<br><br>";
					echo $row['enwoo1'];echo "<br>";
					echo $row['enwoo2'];echo "<br>";
					echo "Tel:".$row['tel']; echo "Fax:".$row['fax'];echo "<br>"; 
					echo "Email:".$row['email']; echo "<br>"; 					
					?>
					</center>					
					</td>
					</tr>
					</table>
					<?php										
				}
				elseif($fornot==2){
					?>
					<table border=1>
					<tr>
					<td>
					<?php 
					echo "<b>".$row['krname']."</b>";
					echo "<br><br>";
					echo $row['krwoo1'];echo "<br>";
					echo $row['krwoo2'];echo "<br>";
					echo "Tel:".$row['tel']; echo "Fax:".$row['fax'];echo "<br>"; 
					echo "Email:".$row['email']; echo "<br>"; 					
					?>
					</center>					
					</td>
					</tr>
					</table>
					<?php					
				}
		}
	}
	
}
function officeemail(){
	global $dbname,$connection;
	global $officedata;
	dbconnection();
    $query = "select email from $officedata where officeid='1'";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_row();
			return $row[0];
		}
	}
}
function officename($fornot=2){
	global $dbname,$connection;
	global $officedata;
    dbconnection();
    $query = "select enname,krname from $officedata where officeid='1'";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_row();
			if( isset($row)){
				if($fornot==1){
					return $row[0];
				}
				elseif($fornot==2){
					return $row[1];
				}
			}
		}
	}
}
function officetel(){
	global $dbname,$connection;
	global $officedata;
    dbconnection();
    $query = "select tel from $officedata where officeid='1'";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_row();
			if(isset($row)){
				return $row[0];
			}
		}
	}
}
function officefax(){
	global $dbname,$connection;
	global $officedata;
    dbconnection();
    $query = "select fax from $officedata where officeid='1'";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			$row=$result->fetch_row();
			if(isset($row)){
				return $row[0];
			}
		}
	}
}

function customemail($varstring){//////////배열을 반환//fornot,id
	global $connection;
    global $customdata;
	
	parse_str($varstring);

	if( (isset($fornot)) && ($fornot>0) ){
	    $searchkey="fornot='$fornot'";	
	}
	if(  (isset($id)) &&  ($id>0)  ){
		$searchkey="id='$id'";
	}	
	
	if( strlen(trim($searchkey))>0 ){
        $wherestring="where $searchkey ";
		
    }else{
		$wherestring="";
	}
	$mailarray=array();
    $query = "select sangho,email,dam1,mail1,dam2,mail2,dam3,mail3,dam4,mail4,dam5,mail5 from $customdata $wherestring order by sangho asc";
    $result = $connection->query($query);
    if ($result){
        while($row=$result->fetch_array()){
			
			$eacharray=array();
			
		    $sangho=$row['sangho'];

			$email=$row['email'];
			$emailarray=explode(',',deletebothcomma($email));
			$dam1=$row['dam1'];
			$mail1=$row['mail1'];
			$dam2=$row['dam2'];
			$mail2=$row['mail2'];
			$dam3=$row['dam3'];
			$mail3=$row['mail3'];
			$dam4=$row['dam4'];
			$mail4=$row['mail4'];
			$dam5=$row['dam5'];
			$mail5=$row['mail5'];
			
             
	        if (strlen(trim($email))>0){
				foreach($emailarray as $whatemail){
				   if (strlen(trim($whatemail))>0){
					  $eacharray['고객대표메일']=$whatemail;
				   }
				}
			}
			
			if (  (strlen(trim($dam1))>0)  &&  (strlen(trim($mail1))>0 )  ){
				$eacharray["$dam1"]=$mail1;
			}
			if (  (strlen(trim($dam2))>0)  &&  (strlen(trim($mail2))>0 )  ){
				$eacharray["$dam2"]=$mail2;
			}
			if (  (strlen(trim($dam3))>0)  &&  (strlen(trim($mail3))>0 )  ){
				$eacharray["$dam3"]=$mail3;
			}
			if (  (strlen(trim($dam4))>0)  &&  (strlen(trim($mail4))>0 )  ){
				$eacharray["$dam4"]=$mail4;
			}
			if (  (strlen(trim($dam5))>0)  &&  (strlen(trim($mail5))>0 )  ){
				$eacharray["$dam5"]=$mail5;
			}


			if(count($eacharray)>0){
    			$mailarray["$sangho"]=$eacharray;
				
			}
			unset($eacharray);
        }
    }
    return $mailarray;
}
function attarray($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$array=array();
    $query = "select attsun,enname,krname from $staffdata where attsun>0 order by attsun asc";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$array[$row['attsun']]=$row['enname'];
				}
				elseif($fornot==2){
					$array[$row['attsun']]=$row['krname'];
				}
			}
		}
	}
	return $array;
}

function attcodeornot(){
	///대리인코드가 저장된게 있는지 여부  true or false
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$str=false;
    $query = "select attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
	if ($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if (strlen(trim($row['attno']))>0){
                     $str=true;           
				}
			}
		}
	}
	return $str;
}

function attnamecodegaro($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$string="";
    $query = "select attsun,enname,krname,attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
	if ($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$string.="Patent Attorney ".$row['enname'].'(Attorney code:'.attnostring($row['attno']).'),';
				}
				elseif($fornot==2){
					$string.="변리사 ".$row['krname'].'(변리사 코드: '.attnostring($row['attno']).' ), ';
				}
			}
		}
	}
	return $string;
}
function attnamecodesero($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$string="";
    $query = "select attsun,enname,krname,attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$string.="Patent Attorney ".$row['enname'].'(Attorney code:'.attnostring($row['attno']).')'."<br>";
				}
				elseif($fornot==2){
					$string.="변리사 ".$row['krname'].'(변리사코드: '.attnostring($row['attno']).')'."<br>";
				}
			}
		}
	}
	return $string;
}
function attjavasero($fornot=2){
	global $dbname,$connection;
	global $staffdata;
	$string="";
    $query = "select attsun,enname,krname,attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
    if ($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$string.="Patent Attorney ".$row['enname'].'\n';
				}
				elseif($fornot==2){
					$string.="변리사 ".$row['krname'].'\n';
				}
			}
		}
	}
	return $string;
}
function attnamegaro($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$string="";
    $query = "select attsun,enname,krname,attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$string.="Patent Attorney ".$row['enname'].',';
				}
				elseif($fornot==2){
					$string.="변리사 ".$row['krname'];
				}
			}
		}
	}
	return $string;
}

function attnamesero($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$string="";
    $query = "select attsun,enname,krname,attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$string.="Patent Attorney ".$row['enname']."<br>";
				}
				elseif($fornot==2){
					$string.="변리사 ".$row['krname']."<br>";
				}
			}
		}
	}
	return $string;
}
function attnameletter($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$string="";
    $query = "select attsun,enname,krname,attno from $staffdata where attsun>0 and formuse='1' order by attsun asc";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				if($fornot==1){
					$string.='Patent Attorney '.$row['enname'].'\n\n';
				}
				elseif($fornot==2){
					$string.='변리사 '.$row['krname'].'\n\n';
				}
			}
		}
	}
	return $string;
}

function attnamecodearray($fornot=2){
	global $dbname,$connection;
	global $staffdata;
    dbconnection();
	$array=array();
    $query = "select attsun,attno,krname,enname from $staffdata where (attsun>0) order by attsun asc";
    $result = $connection->query($query);
	if($result){
		if ($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				$attno=$row['attno'];
				$attnostring=attnostring($attno);
				if($fornot==1){
					$array[$row['attsun']]=$row['enname']."(".$attnostring.")";
				}
				elseif($fornot==2){
					$array[$row['attsun']]=$row['krname']."(".$attnostring.")";
				}
			}
		}	
	}
	return $array;
}

function currencytotal($varstring){ //$fornot,$id,$currencykind
global $connection;
global $dbname;
global $debitdata;
dbconnection();
parse_str($varstring);
   if(!isset($fromdate)){$fromdate=1900;}
   if(!isset($todate)){$todate=date('Ymd');}

   if(  (isset($fornot))   &&   ($fornot>0)  ){$searchkey=" fornot='$fornot' ";}
   if(  (isset($id))  &&  ($id>0)  ){
      if( strlen(trim($searchkey))>0){
         $searchkey.= " and attcode='$id' ";
      }else{
         $searchkey.= " atttcode='$id' ";
      }
   }
   if(  (isset($ckind))  &&  ($ckind>0)  ){
      if( strlen(trim($searchkey))>0){
         $searchkey.= " and currencykind='$ckind' ";
      }else{
         $searchkey.= " currencykind='$ckind' ";
      }
   }
   if(   (isset($fromdate))  &&  ($fromdate>0)  ){
      if( strlen(trim($searchkey))>0){
         $searchkey.= " and ( debitdate >= '$fromdate' ) and ( debitdate <= '$todate' ) ";
      }else{
         $searchkey.= " ( debitdate >= '$fromdate' ) and ( debitdate <= '$todate' ) ";
      }
   }

   if( strlen(trim($searchkey))>0){
      $wherestring=" where $searchkey ";
   }
   $query="select count(*) from $debitdata $wherestring ";
   $result = $connection->query($query);
   if ($result){
      $row=$result->fetch_row();
      return $row[0];
   }else{
      return false;
   }
}
function groupids($varstring){//title,wkind,wenot
    global $connection,$dbname;
	global $groupdata;
    parse_str($varstring);
	if($wenot==1){
	    $ids=obtainfield($groupdata,'idgroup',"wkind='$wkind' and wenot='$wenot' and title='$title'");
	}
	elseif($wenot==2){
	    $ids=obtainfield($groupdata,'idgroup',"wkind='$wkind' and wenot='$wenot' and title='$title' and userid='$_SESSION[my_session]'");
	}
	return $ids;
}


function groupnames($cate){///wkind,wenot  공용이거나 내가 userid인경우
    global $connection,$dbname;
	global $groupdata;
    $array=array();
    
    if(  (!isset($_SESSION['my_session']))  ||  (strlen(trim($_SESSION['my_session']))<1)  ){
		$_SESSION['my_session']="";
	}
	
    $query = "select title from $groupdata where  (  (wenot='1') and (cate='$cate')  )  or (  (cate='$cate') and (wenot='2') and (userid='$_SESSION[my_session]')  ) ";
    $result = $connection->query($query);
	if($result->num_rows>0){
	    while($row=$result->fetch_assoc()){
            $array[]=$row['title'];
        }		
		
	}
	return $array;
}


function groupnamelink ($array,$varstring){///wkind,wenot
    global $connection,$dbname;
	global $groupdata;
    parse_str($varstring);
	if(!isset($string)){$string="";}
	if(!isset($title)){$title="";}
	if(!isset($kind)){$kind="";}
    ?>
    <center><img src='./icons/grouped.gif' border=0> <b>그룹화된 <?php echo $string;?> 그룹보기 및 수정</b> <br>
    <table width=700 border=0 cellspacing=0 cellpadding=2>
        <tr><td bgcolor='eeeeee'><img src='./icons/jikding.gif' border=0> 그룹명칭</td></tr>
        <tr><td>
        <?php

        $arraysu=count($array);
        if($arraysu>0){
            foreach($array as $whattitle){
                if( strlen(trim($whattitle))>0){
                    ?>
                    <a href=<?php echo$_SERVER['SCRIPT_NAME'];?>?a=groupshow&fornot=<?php echo$fornot;?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?><?php if($wenot){?>&wenot=<?php echo$wenot;?><?php }?><?php if($wkind){?>&wkind=<?php echo$wkind;?><?php }?>&kind=group&title=<?php echo$whattitle;?>>
                    <font color=green>▶
                    <?php
                    if ( $whattitle==$title ){?><font style='background-color:#e7e7d2;padding:3;'><?php }
                    echo $whattitle;
                    if ( $whattitle==$title ){?></font><?php }
                    ?>
                    </a>
                    <a href=sagun.php?a=sagun_show&fornot=<?php echo$fornot;?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?><?php if($wenot){?>&wenot=<?php echo$wenot;?><?php }?><?php if($wkind){?>&wkind=<?php echo$wkind;?><?php }?>&kind=4&title=<?php echo$whattitle;?>>대리사건</a>
                    <a href=<?php echo$_SERVER['SCRIPT_NAME'];?>?a=groupmake&fornot=<?php echo$fornot;?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?><?php if($wenot){?>&wenot=<?php echo$wenot;?><?php }?><?php if($wkind){?>&wkind=<?php echo$wkind;?><?php }?>&kind=groupchoice&title=<?php echo$whattitle;?>><img src='./icons/goch.gif' border=0></a>
                    <a href=<?php echo$_SERVER['SCRIPT_NAME'];?>?a=groupdelete&fornot=<?php echo$fornot;?><?php if($ws){?>&ws=<?php echo$ws;?><?php }?><?php if($wenot){?>&wenot=<?php echo$wenot;?><?php }?><?php if($wkind){?>&wkind=<?php echo$wkind;?><?php }?>&kind=<?php echo$kind;?>&title=<?php echo$whattitle;?>>
                    <img src='./icons/delete.gif' border=0 onclick="return confirm('데이타를 정말로 지울까여?');">
                    </a>
                    <?php
                }
            }
        }else{
		    ?>
			<img src='./icons/ohmygod.gif'>그룹화된 데이타가 없습니다.!!
			<?php
		}
        ?>
        </td>
		</tr>
	</table>
    </center>
    <?php
}
function groupchoice($ob,$varstring){
    global $connection,$dbname;
    parse_str($varstring);
       if($wenot==1){
          $beidstring=obtainfield('groupdata','idgroup',"wenot='$wenot' and wkind='$wkind'");
       }
       elseif($wenot==2){
          $beidstring=obtainfield('groupdata','idgroup',"userid='$_SESSION[my_session]' and wenot='$wenot' and wkind='$wkind'");
       }
       ?>
       <center>
       <b><?php echo$string;?> 선택</b>
       <?php
       if($asclose==1){$addstring='&asclose=1';}
       $addstring="&fornot=$fornot&ws=$ws&kind=group&wenot=$wenot&wkind=$wkind";
      // idchoice($taction,$title,$tablename,$ob,$idname,$fieldname,$size,$width,$beidstring,$addstring,seecolor($fornot,'small'));
       $varstring="fornot=$fornot";
       idchoice($taction,$wherestring,$ob,$varstring,$beidstring);
}

function calldata($tablename,$idname,$idvalue){
       $query = "select * from $tablename where $idname='$idvalue'";
       $result = $connection->query($query);
       if ($result){
          $row=$result->fetch_assoc();
          if($row){
             foreach($row as $key => $whatrow){
                if(substr($key,-4)=='date'){
                   $$key=str_replace("'",'&#039',stripslashes($whatrow));
                   $xdate_1=$key.'_1';
                   $xdate_2=$key.'_2';
                   $xdate_3=$key.'_3';
                   $$xdate_1=substr($whatrow,0,4);
                   $$xdate_2=substr($whatrow,4,2);
                   $$xdate_3=substr($whatrow,6,2);
                }else{
                   $$key=str_replace("'",'&#039',stripslashes($whatrow));
                }
             }
          }
       }
}
function cstring(){
    parse_str(getm());
    if($fornot==1){if(!$ws){$ws=2;}$cstring="fornot='$fornot' and ( (clas='$ws') or (clas='3') ) ";}
    elseif($fornot==2){$cstring="fornot='$fornot'";}
    return $cstring;
}

function idchoice($taction,$wherestring,$ob,$varstring,$beidstring){
	global $dbname,$connection;
	global $customdata,$groupdata;
	global $cstring;
	parse_str($varstring);
	$beidarray=explode(',',$beidstring);
	$sanghoarray=array();
	dbconnection();

	if(!isset($taction)){$taction='choicecon';}
	if(!isset($title)){$title="";}

    foreach($beidarray as $whatbeid){
        if($whatbeid>0){
            $query = "select $idname,$fieldname from $tablename where $idname='$whatbeid'";
            $result = $connection->query($query);
            if ($result){
                $row=$result->fetch_row();
                if($row){
				    if(strlen(trim($row[1]))>0){
                        $sanghoarray[$whatbeid]=$row[1];
                    }        
				}
            }
        }
    }
	?>
	<script language='Javascript'>
	<!--
		function ClearList_<?php echo$title;?>(OptionList, TitleName) {
		    OptionList.length = 0;
		}

		function move_<?php echo$title;?>(side){
     		var temp1 = new Array();
			var temp2 = new Array();
			var tempa = new Array();
			var tempb = new Array();
			var current1 = 0;
			var current2 = 0;
			var y=0;
			var attribute;
    		if (side == "right") {
	            attribute1 = document.fappchu.origin;
		        attribute2 = document.fappchu.obj;
			} else {
		        attribute1 = document.fappchu.obj;
		        attribute2 = document.fappchu.origin;
			}

			for (var i = 0; i < attribute2.length; i++) {
		        y=current1++
		        temp1[y] = attribute2.options[i].value;
		        tempa[y] = attribute2.options[i].text;
			}

			for (var i = 0; i < attribute1.length; i++) {
				if ( attribute1.options[i].selected ) {
					 y=current1++
					 temp1[y] = attribute1.options[i].value;
					 tempa[y] = attribute1.options[i].text;
				} else {
					 y=current2++
					 temp2[y] = attribute1.options[i].value;
					 tempb[y] = attribute1.options[i].text;
				}
			}

			for (var i = 0; i < temp1.length; i++) {
				attribute2.options[i] = new Option();
				attribute2.options[i].value = temp1[i];
				attribute2.options[i].text =  tempa[i];
			}

			ClearList_<?php echo$title;?>(attribute1,attribute1);

			if (temp2.length>0) {
				for (var i = 0; i < temp2.length; i++) {
            		 attribute1.options[i] = new Option();
					 attribute1.options[i].value = temp2[i];
					 attribute1.options[i].text =  tempb[i];
				}
			}
		}
		function saveMe_<?php echo$title;?>() {
		    var strValues = "";
		    var boxLength = document.fappchu.obj.length;
		    var count = 0;

		    if (boxLength != 0) {
		        for (i = 0; i < boxLength; i++) {
			        if (count == 0) {
			            strValues = document.fappchu.obj.options[i].value;
			        } else {
			            strValues = strValues + "," + document.fappchu.obj.options[i].value;
		            }
		    	    count++;
		        }
		    }
            if (strValues.length == 0) {
		        alert("적용할 시스템을 선택하세요.");
		    } else {
		        alert("선택한 시스템 :\r\n" + strValues);
		    }
		}
	//-->
	</script>

    <center>

    <form name=fappchu method=post style='margin-bottom:0;margin-top:0' action='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=<?php echo$taction;?><?php if(isset($fornot)){?>&fornot=<?php echo$fornot;?><?php }if(isset($ws)){?>&ws=<?php echo$ws;?><?php }if(isset($wkind)){?>&wkind=<?php echo$wkind;?><?php }if(isset($wenot)){?>&wenot=<?php echo$wenot;?><?php }?>'>
        <table border=1 width=700 bgcolor='<?php echo$bgcolor;?>' cellspacing=0 cellpadding=5 <?php echo collapse;?>>
		    <input type=hidden name="wenot" value='<?php echo$wenot;?>'>
            <tr>
			<td colspan=3>
                <center> 그룹명칭<input type=text name=title size=16 maxlength=16 value='<?php echo$title;?>' style='font-size:9pt;font-family:돋음,굴림;'>
            </td>
			</tr>
            <tr>
            <td width=42%>
                <center>
                <select name='origin' multiple size='<?php echo$size;?>' width='<?php echo$width;?>px' style='width:300px;' ondblclick="move_<?php echo$title;?>('right')">
                 <?php
                 if(strlen(trim($wherestring))>0){$wherestring= " where $wherestring ";}
                 $query = "select $idname,$fieldname from $tablename $wherestring $ob";

                 $result = $connection->query($query);
                 if ($result){
                    while($row=$result->fetch_row()){
                       if(!in_array($row[0],$beidarray)){
                          ?>
                          <option value='<?php echo$row[0];?>'><?php echo$row[1];?></option>
                          <?php
                       }
                    }
                 }
                 ?>
                 </select>
            </td>
            <td valign=top><br><br>
                 <center>
                 <input type='button' value='선택->' name='Add' onClick="move_<?php echo$title;?>('right');" style='cursor:hand;'> <br>
                 <input type='button' value='<-삭제' name='Rem' onClick="move_<?php echo$title;?>('left');" style='cursor:hand;'><br><br>
            </td>
            <td width=42%>
                 <center>
                 <select name='obj' multiple size='<?php echo$size;?>' width='<?php echo$width;?>px' style='width:300px;' ondblclick="move_<?php echo$title;?>('left')">
                 <?php
                 foreach($sanghoarray as $key => $value){
                         ?>
                         <option value='<?php echo$key;?>'><?php echo$value;?></option>
                         <?php
                 }
                 ?>
                 </select>
                 <input type='hidden' name='fmappcode' value=''>
            </td>
            </tr>
            <tr>
            <td colspan=2>
                <a href=# onClick="window.open('custom.php?a=customform&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&asclose=1&whd=2','trtrtmemowindow','scrollbars=yes,toolbar=no,resizable=no,width=980,height=600,left=0,top=0'); return true">
                목록에 없는 경우 --> 여기 </a> 를 눌러새로입력!!</font>
              </td>
              <td align='right'>
                <input type='submit' value='  확인  ' onClick='return puter_<?php echo$title;?>();'>
                &nbsp;
                <input type='button' value='취소' onClick='window.close();' >
            </td>
            </tr>
        </table>
    </form>
    <script language='javascript'>
        function addlist_<?php echo$title;?>(){
            var origina = document.fappchu.origin;
            var obja= document.fappchu.obj;
            selectedValue = origina.options[origina.selectedIndex].value;
            selectedText  = origina.options[origina.selectedIndex].text;
            obja.options[obja.length] = new Option(selectedText,selectedValue);
            origina.options[origina.selectedIndex] = null;
        }
        function remove_<?php echo$title;?>(){
            var origina = document.fappchu.origin;
            var obja= document.fappchu.obj;
            selectedValue = obja.options[obja.selectedIndex].value;
            selectedText  = obja.options[obja.selectedIndex].text;
            origina.options[origina.length] = new Option(selectedText,selectedValue);
            obja.options[obja.selectedIndex] = null;
        }
        function puter_<?php echo$title;?>(){
            if(!fappchu.title.value) { alert  ('제목 또는 그룹명칭을 간격없이 입력해주십시요!!'); fappchu.title.focus(); return false; }
            var obja= document.fappchu.obj;
            var fullList = '';
            for(var i = 0; i < obja.length; i++){
               fullList += (obja.options[i].value + ',');
            }
            fullList = fullList.substring(0, fullList.length-1);
            document.fappchu.fmappcode.value = fullList;
            document.fappchu.submit();
        }
    </script>
    <?php

}

function attexist(){  // 변리사는 전부 기재한 명칭을 반환
    global $dbname,$connection;
    global $staffdata;
    dbconnection();
    $query = "select count(*) from $staffdata where staffclass='1' and formuseornot='1' and nowuseornot='1' order by attorneysun asc";
     $result = $connection->query($query);
    if ($result){
        $row=$result->fetch_row();
		if($row){
			$total=$row[0];
			if($total>0){
				return true;
			}else{
				return false;
			}
		}
    }
}


function officeboxstring($fornot){
	global $dbname,$connection;
	global $officedata;
	dbconnection();
    $query = "select krname,enname,kraddress,enaddress,tel,fax,email from $officedata where officeid='1'";
    $result = $connection->query($query);
    if ($result->num_rows>0){
        $row=$result->fetch_assoc();
		if($fornot==1){
			?>
			<table>
			<tr>
			<td colspan=2>
			<?php 
			echo $row['enname'];
			?>
			</td>
			</tr>
			<tr>
			<td colspan=2>
			<?php 
			echo $row['enaddress'];
			?>
			</td>
            </tr>
			<tr>
			<td>Tel:<?php echo$row['tel'];?></td><td>Fax:<?php echo$row['fax'];?></td>
			</tr>
			<tr>
			<td colspan=2>
			Email:<?php	echo $row['email'];?>
			</td>
			</tr>
			</table>
			<?php
		}
		elseif($fornot==2){
			?>
			<table>
			<tr>
			<td colspan=2>
			<?php 
			echo $row['krname'];
			?>
			</td>
			</tr><tr>
			<td colspan=2>
			<?php 
			echo $row['kraddress'];
			?>
			</td>
			</tr>
			<tr>
			<td>Tel:<?php echo$row['tel'];?></td><td>Fax:<?php echo$row['fax'];?></td>
			</tr>
			<tr>
			<td colspan=2>
			Email:<?php	echo $row['email'];?>
			</td>
			</tr>
			</table>
			<?php
		}
		
		
	}
	
}
function bankboxstring($fornot){
	global $dbname,$connection;
	global $bankdata;
	dbconnection();
	if($fornot==2){
		$query = "select krname,krowner,krbranch,account from $bankdata where ( idebitsun>0 ) order by idebitsun asc";
		$result = $connection->query($query);
        if ($result->num_rows>0){
			?>
			<table>
			<?php
			while($row=$result->fetch_assoc()){
				?>
				<tr>
				<td>은행명:<?php echo $row['krname'];?>(<?php echo $row['account'];?>)</td>
				</tr>
				<?php				
			}
			?>
			</table>
			<?php
		}
	}elseif($fornot==1){
		$query = "select krname,krowner,enbranch,account from $bankdata where ( fdebitsun>0 ) order by idebitsun asc";
		$result = $connection->query($query);
        if ($result->num_rows>0){
			?>
			<table>
			<?php
			while($row=$result->fetch_assoc()){
				?>
				<tr>
				<td>Bankname:<?php echo $row['enname'];?>(<?php echo $row['account'];?>)</td>
				</tr>
				<?php				
			}
			?>
			</table>
			<?php
		}
	}

	
}
function bankoption(){
	global $connection;
	$string="";
    $bankok=true;$firstbankstring='';$secondbankstring='';$thirdbankstring='';
    $query = "select * from bank";
    $result = $connection->query($query);
    if ($result){
		if($result->num_rows>0){
	    	while($row=$result->fetch_assoc()){
				$krname=$row['krname'];
				$krbranch=$row['krbranch'];
				$account=$row['account'];	
				if(strlen(trim($krname))>0){
				    $string.="<option>".$krname."(".$krbranch.")".$account."</option>";					
				}

			}
		}
    }
    return $string;	
}
function obtainsangho($id){
	global $connection,$dbname;
	global $customdata;
    dbconnection();
    $query = "select sangho from $customdata where id='$id'";
     $result = $connection->query($query);
    if ($result){
        $row=$result->fetch_row();
        $sangho=$row[0];
    }
    if(strlen(trim($sangho))>0){
        return $sangho;
    }else{
        return false;
    }
}
function obtainsangholink($id){
    global $connection,$dbname;
    global $customdata;
    dbconnection();
    $query = "select sangho,fornot from $customdata where id='$id'";
    $result = $connection->query($query);
    if ($result){
        $row=$result->fetch_row();
        $sangho=$row[0];
        $fornot=$row[1];
    }
    if(strlen(trim($fornot))>0){
        if ($fornot==1){
         ?>
         <a href=custom.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=2&id=<?php echo$id;?>&whd=<?php echo$whd;?> onMouseover="textbodyprint('<?php $sangho = str_replace("\r\n", '<br>',$sangho);$sangho=htmlspecialchars($sangho);echo $sangho;?>')" onMouseout=textbodyprint2(0,1)>代</a>
         <?php
        }
        elseif ($fornot==2){
         ?>
         <a href=custom.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$id;?>&whd=<?php echo$whd;?> onMouseover="textbodyprint('<?php $sangho = str_replace("\r\n", '<br>',$sangho);$sangho=htmlspecialchars($sangho);echo $sangho;?>')" onMouseout=textbodyprint2(0,1)>대</a>
         <?php
        }

    }
}
function obtainapplicantlink($appcode){
    global $connection,$dbname;
    global $customdata;
    dbconnection();
    $apparray=explode(',',$appcode);
    foreach($apparray as $key =>$whatapp){
        if (strlen(trim($whatapp))>0){
            $sangho=obtainfield($customdata,'sangho',"id='$whatapp'");
            $fornot=obtainfield($customdata,'fornot',"id='$whatapp'");
            ?>
            <a href=custom.php?a=customdisplay&fornot=<?php echo$fornot;?>&ws=1&id=<?php echo$whatapp;?>&whd=<?php echo$whd;?> onMouseover="textbodyprint('<?php $sangho = str_replace("\r\n", '<br>',$sangho);$sangho=htmlspecialchars($sangho);echo $sangho;?>')" onMouseout=textbodyprint(0,1)>人</a>
            <?php
        }
    }
}

function dottedunderline($thick=1){
   ?>
    style='border-bottom: dotted #aaaaaa <?php echo$thick;?>px;'
   <?php
}
function solidunderline($color,$thick=1){
   ?>
    style='border-bottom: solid <?php echo$color;?> <?php echo$thick;?>px;'
   <?php
}
function dirnames($path){
    $dir=array();
    $files=array();
    if (($handle=opendir($path))){
        while ($file = readdir($handle)){
            $file = basename($file);
            if (  ($file!='.') && ($file!='..')  ){
                if (is_dir($file)==true){
                    $dir[]=$file;
                }
            }
        }
    }	
	return $dir;
}
function filenames($path){

    $files=array();
    if (($handle=opendir($path))){
        while ($file = readdir($handle)){

          //  $file=iconv("euc-kr","utf-8",$file);
		    //위명령어를 버전5.대를 쓸때는 반드시 있어야 햇는데
			//7.20으로 바뀌니깐 오히려 쓰면 에러가 난다..........그래서 지운다.... 2017.12.28.
		  
			//////////// $file을 basename($file)하면 파일명이 깨진다.
			//그래서 파일명이 없는걸로 표시된다.
			/*
			그리고 아마도 읽을때euc-kr로 읽혀지는것같다.
			그래서 $file=iconv("euc-kr","utf-8",$file);
			이명령어를 안쓰면 파일명이 깨져나온다
			그래서 basename을쓸수도 없고 또 iconv를 안할수도 없다....
			만약 basename을 쓰면 파일명이 아예 나오지 않고
			iconv를 안쓰면 파일명이깨진다.
			
			*/
			

            if (  ($file!='.') && ($file!='..')  ){
                if (is_dir($file)==true){

                }else{
                  //echo $file;
                 
                  //echo $file; 
                  $files[]=$file;
                }
            }else{
   
            }
        }
    }	

	return $files;
}

function dirmanager($basicroot,$nowroot,$diradd){
    $root=$_SERVER['DOCUMENT_ROOT'];  //// C:/xampp/htdocs//// 
	$programfile=dirname($_SERVER['SCRIPT_FILENAME']); //// C:/xampp/htdocs/total/my.php
    $priordir="";
	//$basicroot=dirname($_SERVER['SCRIPT_FILENAME'])."/_mydir/";  기본디렉토리
	if(   (!isset($nowroot))   ||   (   strlen(trim($nowroot))<1  )   ){
        $nowroot=$basicroot;
    }else{
        if (     (!isset($diradd))   ||   (   strlen(trim($diradd))<1  )    ){
            $nowroot=$nowroot.$diradd.'/';
        }
    }
    chdir($nowroot);
    $nowarray=explode('/',$nowroot);
    $su=count($nowarray);
    for($i=0;$i<$su-2;$i++){
       $priordir.=$nowarray[$i].'/';
    }
    echo $nowroot;echo "<br>";
	echo $priordir;
	
	?>
	
	
    <center>
    <script>
        function dirgo(nowroot,whatdir){
            dirgoform.nowroot.value=nowroot;
            dirgoform.diradd.value=whatdir;
            dirgoform.submit();
        }
    </script>

    <form name=dirgoform method=post action='<?php echo$_SERVER['SCRIPT_NAME'];?>?a=<?php echo$_REQUEST['a'];?>'>
    <input type=hidden name=nowroot value=''>
    <input type=hidden name=diradd value=''>
    </form>
    <center>
	
    <table border=10 width=980 cellspacing=0 cellpadding=0>
		<tr>
		<td colspan=2 style='border-bottom: solid black 1px;' height=50>
			<table width=100% border=0><tr>
			<td>
			<script>
				function dirname(){
					var formPop = window.open("", "gotoformpopup", "scrollbars=yes,resizable=no,width=910,height=530,top=0,left=0");
					gotoform.target = "gotoformpopup";
					gotoform.method = "post";
					gotoform.action = "mypageup.php?a=newdirname";
					gotoform.submit();
				}
			</script>
			<form name='gotoform' style='margin-bottom:0;margin-top:0'>
				<input type=hidden name=nowroot value="<?php echo$nowroot;?>">
			</form>
			<span onclick="dirname();" style='cursor:hand;'>
			<img src="./icons/makedir.png" width=30 border=0>디렉토리만들기</span>
			<?php
			/*
			   $filename='fa.php';
			   $actionname='newdirname';
			   $addstring="&nowroot=$nowroot&whd=2";
			   $string="<img src='./icons/closedfolder.gif' border=0>새디렉토리만들기";
			   $resizable='yes';
			   $width=600;
			   $height=100;
			   wgoto($filename,$actionname,$addstring,$string,$resizable,$width,$height);
			   echo '<br>';
			*/
			   ?>
			</td>
			<td>
			</td>
			</tr>
			<tr>
			<td colspan=2><?php echo $nowroot;?></td>
			</tr>
			</table>
        </td>
		</tr>
        <tr>
        <td width=160  height=500 valign=top align=left style='border-right: solid black 1px;'>
                <?php
                if ($nowroot!=$basicroot){
                  ?>
                   <span onclick='dirgo("<?php echo$priordir;?>","<?php echo$whatdir;?>");'><?php imagefile('fileupload.gif');?>상위디렉토리로
                  <?php
                }
                if(   (isset($lastdirname))  &&   (strlen(trim($lastdirname))>0)   ){
                  ?>
                   <img src='./icons/bluedisk.png' width=20 border=0><?php echo $lastdirname;?>
                  <?php
                }
                ?>
                <table width=100% border=1 bordercolor=red>
                <tr><td valign=top>
                <?php
                $dir=array();
                $files=array();
                if (($handle=opendir($nowroot))){
                    while ($file = readdir($handle)){
                       $file = basename($file);
                       if (  ($file!='.') && ($file!='..')  ){
                          if (is_dir($file)==true){
                             $dir[]=$file;
                          }else{
                             $files[]=$file;
                          }
                       }else{

                       }
                    }
                }

                foreach($dir as $whatdir){
                    if(strlen(trim($whatdir))>0){
                       ?>
                        <span class=ko onclick='dirgo("<?php echo$nowroot;?>","<?php echo$whatdir;?>");'><img src='./icons/closefolder.png' width=20 border=0><?php echo$whatdir;?> <br>
                       <?php
                    }
                }
                ?>
                </td>
                </tr></table>
        </td>
        <td valign=top>
        <?php
        $filelistarray=array();
        $filelistarray=array_merge($dir,$files);
        $filestring=implode('|',$filelistarray);
        ?>
        <script>
        function alltoggle(button) {
            if(button.checked){
                <?php
                foreach($filelistarray as $key => $whatfdeid){
                    ?>
                    var e = document.filelistform.x_<?php echo$key;?>;
                    e.checked=true;
                    <?php
                }
                ?>
            }else{
                <?php
                foreach($filelistarray as $key=> $whatfdeid){
                    ?>
                    var e = document.filelistform.x_<?php echo$key;?>;
                    e.checked=false;
                    <?php
                }
                ?>
            }
        }
        </script>
		<form name=filelistform method=post style='margin-bottom:0;margin-top:0' enctype='multipart/form-data'  action=<?php echo$_SERVER['SCRIPT_NAME'];?>?a=filelistcheck>
		<input type=hidden name=filestring value='<?php echo$filestring;?>'>
		<input type=hidden name=nowroot value='<?php echo$nowroot;?>'>
		<input type=hidden name=diradd value='<?php echo$diradd;?>'>
		전체선택<input type='checkbox' name='checkall' value=1 <?php if ($checkall==1){?>checked<?php }?> onClick='alltoggle(this);'>
		<input type=submit name=deletebutton value='선택파일삭제'>
		<img src='./icons/file.gif' border=0>파일올리기<input type=file name=file1 size=50>
		<input type=submit name=submitbutton value='확인' onclick="if( trim(filelistform.file1.value)==''){window.alert('선택된파일이 없습니다.!!');return false;}">
		<table border=4 bordercolor=purple width=100% <?php echo collapse;?>>
		<?php
		$s=0;
		foreach($filelistarray as $key=> $whatfile){
		    $whatfilearray=explode('.',$whatfile);
    	    $fname=$whatfilearray[0];
			$fext=$whatfilearray[1];
			if (strlen(trim($whatfile))>0){
			    if (file_exists("$nowroot$whatfile")){
					$imgsizearray=@getimagesize("$nowroot$whatfile");
				 }
			}
			$nowrootarray=explode('/',$nowroot);
			$programrootarray=explode('/',$programroot);
			$chaarray=array_diff($nowrootarray,$programrootarray);
			$chapath=implode('/',$chaarray);
			if (substr(trim($chapath),-1)!='/'){
			   $chapath=$chapath.'/';
			}
    	    if($s==0){?><tr><?php }
		    ?>
			<td valign=top>
			<table width=100% border=1 bordercolor=blue cellspacing=0 cellpadding=0 height=100% <?php echo collapse;?>>
			<tr>
			<td height=10 width=10 align=left> <input type=checkbox name=x_<?php echo $key;?> value=1> </td>
			<td>
			    <?php
				if(is_dir($whatfile)){
					?>
					<span class=ko onclick='dirgo("<?php echo$nowroot;?>","<?php echo$whatdir;?>");'><img src='./icons/closedfolder.gif' border=0><?php echo$whatfile;?>
					<?php
				}else{
					if(  (strtolower($fext)=='gif') || (strtolower($fext)=='jpg') ){
					    ?>
					    <img src='./<?php echo$chapath;?><?php echo$whatfile;?>' <?php if ($imgsizearray[0]>=$imgsizearray[1]){if( $imgsizearray[0]>90  ){echo 'width=90';}else{echo "width='$imgsizearray[0]'";}}else{if( $imgsizearray[1]>90  ){echo 'height=90';}else{echo "height='$imgsizearray[1]'";} }?> border=0 onclick="window.open('./<?php echo$chapath;?><?php echo$whatfile;?>','dsfsdddsdst','scrollbars=yes,resizable=yes,width=610,height=314,left=0,top=0');"></a><?php echo cutstring($whatfile,20,'..');?>
						<?php
					}else{
					    ?>
						<a href="./<?php echo$chapath;?><?php echo$whatfile;?>"><?php echo filepic($whatfile);?><?php echo cutstring($whatfile,20,'..');?></a>
						<?php
					}
				}
				?>
			</td>
			</tr>
			</table>
			</td>
		    <?php
		    $s=$s+1;
		    if($s==4){?></tr><?php $s=0;}
		}
		?>
		</td>
		</tr>
		</table>
		</form>
		<?php
}
function allcheck($idstring,$fdeidstring){
$fdeidarray=explode('|',$fdeidstring);
    ?>
                               <script>
                                function <?php echo$idstring;?>detail(ref){
                                var a;
                                var f = document.<?php echo$idstring;?>frm;

                                var window_left = 50;
                                var window_top = 50;
                                a=<?php echo$idstring;?>checkornot();

                                if(a){
                                f.action = ref;
                                window.open(ref,'<?php echo$idstring;?>win','width=960,height=500,status=1,scrollbars=yes,top=0,left=0');
                                f.target = '<?php echo$idstring;?>win';
                                f.submit();
                                }
                                }
                                function <?php echo$idstring;?>page(gopage){
                                f = document.<?php echo$idstring;?>frm;

                                f.action = gopage; // 보여줘야 하는 페이지 주소
                                f.target = '_self'; // <-- 이부분을 써주면 되더라...
                                f.submit();
                                }

                                </script>
                                <script>
                                function <?php echo$idstring;?>alltoggle(button) {
                                        if(button.checked){
                                        <?php
                                        foreach($fdeidarray as $whatfdeid){
                                                ?>
                                                var e = document.<?php echo$idstring;?>frm.x_<?php echo$whatfdeid;?>;
                                                e.checked=true;
                                                <?php
                                        }
                                        ?>
                                        }else{
                                        <?php
                                        foreach($fdeidarray as $whatfdeid){
                                                ?>
                                                var e = document.<?php echo$idstring;?>frm.x_<?php echo$whatfdeid;?>;
                                                e.checked=false;
                                                <?php
                                        }
                                        ?>
                                        }
                                }
                                function <?php echo$idstring;?>checkornot() {
                                        var ch=false;
                                        <?php
                                        foreach($fdeidarray as $whatfdeid){
                                                ?>
                                                var e = document.<?php echo$idstring;?>frm.x_<?php echo$whatfdeid;?>;
                                                if(e.checked){
                                                    ch=true;
                                                }
                                                <?php
                                        }
                                        ?>
                                        if(ch==false){
                                                window.alert('체크한항목이 없습니다.먼저체크하세요!!');
                                                return false;
                                        }else{
                                                return true;
                                        }

                                }

                               </script>
<?php
}


function letterhead($headnick){
	global $connection;
	global $dbname;
	global $headdata;
	dbconnection();
    if(totalornot($headdata,"headnick='$headnick'")){
        $letterhead=obtainfield($headdata,'headcontents',"headnick='$headnick'");
        return $letterhead;		
    }else{
		return false;
	}
}

function letterend($fornot,$encl=1){
	global $connection;
	global $dbname;
	global $staffdata;
	global $officedata;
	dbconnection();
        if ($fornot==1){
                $aquery = "select enname from $staffdata where clas='1' and attsun='1' and nowuseornot='1' and formuse='1' ";
                $aresult = $connection->query($aquery);
                if ($aresult->num_rows>0){
                    $arow=$result->fetch_row();
                    $firstatt=$arow[0];
                }else{
				    $firstatt="";
				}
                $bquery = "select enname from $staffdata where clas='1' and attsun='2' and nowuseornot='1' and formuse='1' ";
                $bresult = $connection->query($bquery);
                if ($bresult->num_rows>0){
                       $brow=$result->fetch_row();
                       $secondatt=$brow[0];
                }
                $cquery = "select enname from $officedata where officeid='1'";
                $cresult = $connection->query($cquery);
                if ($cresult){
                    $crow=$result->fetch_row();
                    $officeenname=$crow[0];
                }

                if ($encl==1){
                    $letterend='Faithfully yours,'."\n\n".$officeenname."\n".'Patent and Trademark Attorney'."\n\n\n\n\n".$firstatt."\n";
                }
                elseif ($encl==2){
                    $letterend='Faithfully yours,'."\n".$officeensname."\n".'Patent and Trademark Attorney'."\n\n\n\n\n".$firstatt."\n".'Enc. (Via airmail)';
                }
                return $letterend;

        }
        elseif($fornot==2){
            $aquery = "select krname from $staffdata where clas=1 and attsun='1' and nowuseornot='1' and formuse='1'";
            $aresult = $connection->query($aquery);
            if ($aresult->num_rows>0){
                $arow=$aresult->fetch_row();
                $firstatt=$arow[0];
            }else{
			    $firstatt="";	
			}
            $bquery = "select krname from $staffdata where clas=1 and attsun='2' and nowuseornot='1' and formuse='1'";
            $bresult = $connection->query($bquery);
            if ($bresult->num_rows>0){
                $brow=$result->fetch_row();
                $secondatt=$brow[0];
            }else{
				$secondatt="";
			}
            if(strlen(trim($secondatt))>0){
                $letterend="변리사:  $firstatt"."\n\n"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $secondatt ";
            }else{
                $letterend="변리사:  $firstatt"."\n\n";
            }
            return $letterend;
        } 
}

    function formhead($fornot){
        global $dbname,$connection;

        if (!isset($officeid)){$officeid=1;}
        if ($fornot==1){
            $query = "select enname,enwoo1,enwoo2,encountry,tel,fax,email from office where officeid='$officeid'";
            $result = $connection->query($query);
            if ($result){
				if ($result->num_rows>0){
					$row=$result->fetch_assoc();
					if($row){
						foreach($row as $key => $whatrow){
							$$key=str_replace("'",'&#039',stripslashes($whatrow));
						}
					}
				}else{
			    $fields=tablefieldsarray('office');
                foreach($fields as $w){
                    $$w="";
                }					 
			}
            }else{
			    $fields=tablefieldsarray('office');
                foreach($fields as $w){
                    $$w="";
                }					 
			}
            ?>
            <table width=100% cellspacing=0 cellpadding=0> 
			    <tr>
				<td>
                <center>
				
				<table cellspacing=0 cellpadding=0>
				<tr>
				<td>

                </td>
				<td>
                <font style='font-size:16pt;'><b><?php echo $enname;?></b></font>
                </td>
				</tr>
				</table>
                </td>
				</tr>
                <tr>
				<td>
					<center>
					<font style='font-size:10pt;'><b> <?php echo$enwoo1;?><br>
					<?php echo$enwoo2;?> 
					<?php echo$encountry;?></b>
					</font>
				</td>
				</tr>
                <tr>
				<td style=`border-bottom: solid #000000 1px;`>
				<center>
				<table width=70% cellspacing=0 cellpadding=0>
				<tr>
                <td>
				<center><font style='font-size:10pt;'><b>TEL:<?php echo $tel;?></b></font></td>
				<td><center><font style='font-size:10pt;'><b>FAX:<?php echo$fax;?></b></font></td>
                </tr>
				</table>
				</td>
                </tr>
            </table>
            <?php
         }
         elseif ($fornot==2){
            $query = "select krname,krwoo1,krwoo2,tel,fax,email from office where officeid='1'";
			$result = $connection->query($query);
            if ($result){
				if ($result->num_rows>0){
					$row=$result->fetch_assoc();
					if($row){
						foreach($row as $key => $whatrow){
							$$key=str_replace("'",'&#039',stripslashes($whatrow));
						}
					}
				}
            }else{
			    $fields=tablefieldsarray('office');
                foreach($fields as $w){
                    $$w="";
                }					 
			}
                ?>
                <table width=100% cellspacing=0 cellpadding=0> <tr><td>
                <center><table cellspacing=0 cellpadding=0><tr><td>

                </td><td>
                <font style='font-size:16pt;'><b><?php echo$krname;?></b></font>
                </td></tr></table>
                </td></tr>
                 <tr><td><center><font style='font-size:10pt;'><b> <?php echo$kraddress1;?><br><?php echo$kraddress2;?> </b></font></td></tr>

                 <tr><td style=`border-bottom: solid #000000 1px;`><center><table width=70% cellspacing=0 cellpadding=0><tr>

                <td><center><font style='font-size:10pt;'><b>TEL:<?php echo $telno;?></b></font></td><td><center><font style='font-size:10pt;'><b>FAX:<?php echo$faxno;?></b></font></td>
                </tr></table></td>
                </tr>

                </table>
                <?php
         }
    }

    function arrayformtec($array,$labelkind='3108',$tdcolor='skyblue'){
      parse_str(getm());
      $arraysu=count($array);

      if ($labelkind=='3107'){
          $lastsu=16;     //16
          $boxheight=126;
          $lineheight=100;
          $fontsize='10pt';
          $totalpage=ceil($arraysu/16);
      }
      elseif ($labelkind=='3108'){
          $lastsu=14;       //14
          $boxheight=144;
          $lineheight=110;
          $fontsize='11pt';
          $totalpage=ceil($arraysu/14);
      }
      elseif ($labelkind=='3109'){
          $lastsu=18;   //18
          $boxheight=112;
          $lineheight=110;
          $fontsize='9pt';
          $totalpage=ceil($arraysu/18);
      }
      elseif ($labelkind=='3620'){
          $lastsu=6;
          $boxheight=155;
          $lineheight=120;
          $fontsize='13pt';
          $totalpage=ceil($arraysu/6);

      }

      $cellwidth=0;
      $cutlocation=39;
      if(!$labelfrom){$labelfrom=2;}
      if($labelfrom==2){
          ?>
          <script>
             function labelinput(e,f){
                this.window.location.replace("<?php echo$globals[php_self];?>?a=labelmode&id=<?php echo$id;?>&k=a&e="+e+"&f="+f);
                //lwindow = window.open('<?php echo$globals[php_self];?>?a=labelmode&id=<?php echo$id;?>&k=a&e='+e+'&f='+f,'labelinputwindow','resizable=no, scrollbars=yes,menubar=no,status=no,width=500,height=470,left=0,top=0');
             }
             function labeldelete(e,f){
                if(confirm('정말삭제하시겠습니까?')){
                   this.window.location.replace("<?php echo$globals[php_self];?>?a=labelmode&id=<?php echo$id;?>&k=d&e="+e+"&f="+f);
                  // mwindow = window.open('<?php echo$globals[php_self];?>?a=labelmode&id=<?php echo$id;?>&k=d&e='+e+'&f='+f,'labelinputwindow','resizable=no, scrollbars=yes,menubar=no,status=no,width=500,height=470,left=0,top=0');
                }
             }
          </script>
          <?php 
      }

      $e=1;
      if ( ($labelkind=='3107') || ($labelkind=='3108') ||  ($labelkind=='3109')  ){
          for ($page=0;$page<$totalpage;$page=$page+1){

          ?>
          <br><br>
          <center>
          <table border=0 bordercolor=red width=760 cellspacing=0 cellpadding=0><tr>
          <td valign=top align=center>
              <table border=0 bordercolor=<?php echo $tdcolor;?> cellspacing=2 cellpadding=2 width=720 height=880 <?php echo collapse;?>>
              <?php 

              for ($i=0;$i<$lastsu;$i=$i+2){

                 $x=$i;

                 $fornot=$array[$x][0];
                 $sangho=$array[$x][1];
                 $attention=$array[$x][2];
                 $street=$array[$x][3];
                 $city=$array[$x][4];
                 $country=$array[$x][5];
                 $zip1=$array[$x][6];
                 $zip2=$array[$x][7];

                 ?>
                 <tr>
                 <td width=350 align=top style="border-bottom: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-top: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-right: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-left: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;" <?php if (strlen(trim($sangho))<1){?> onclick="labelinput(<?php echo$e;?>,1);"<?php }else{?> onclick="return labeldelete(<?php echo$e;?>,1);"<?php }?>>
                 <?php 
                 //echo $fornot;echo$sangho; echo$attention;echo$street;echo$city;echo$country;
                 echo labelunit2($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zip1,$zip2);
                 unsetarray("word&word2&sangho&attention&street&city&country&zip1&zip2&query&result");
                 ?>
                 </td>
                 <td width=5 height=<?php echo$boxheight;?>></td>
                 <?php 

                 $fornot=$array[$x+1][0];
                 $sangho=$array[$x+1][1];
                 $attention=$array[$x+1][2];
                 $street=$array[$x+1][3];
                 $city=$array[$x+1][4];
                 $country=$array[$x+1][5];
                 $zip1=$array[$x+1][6];
                 $zip2=$array[$x+1][7];
                 ?>
                 <td width=350 align=top style="border-bottom: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-top: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-right: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-left: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;" <?php if (strlen(trim($sangho))<1){?> onclick="labelinput(<?php echo$e;?>,2);"<?php }else{?> onclick="return labeldelete(<?php echo$e;?>,2);"<?php }?>>
                 <?php 
                 //echo $fornot;echo$sangho; echo$attention;echo$street;echo$city;echo$country;
                 echo labelunit2($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zip1,$zip2);


                 unsetarray("word&word2&sangho&attention&street&city&country&zip1&zip2&query&result");
                 ?>
                 </td>
                 </tr>
                 <?php 
              $e=$e+1;
              }
              ?>
              </table>
              </td></tr></table>
              </center>
              <?php 
          }
      }
      elseif ($labelkind=='3620'){
          for ($page=0;$page<$totalpage;$page=$page+1){

              ?>
              <br><br><br><br><br><br><center>

              <table border=0 bordercolor=red width=780 cellspacing=0 cellpadding=0><tr>
              <td valign=top align=center>
              <table border=0 bordercolor=blue cellspacing=2 cellpadding=12 width=790 height=880>
              <?php 
              for ($i=0;$i<$lastsu;$i=$i+1){
                 $x=$i;
                 ?>
                 <tr>
                 <td width=22% height=<?php echo$boxheight;?>> </td>
                 <td width=56% align=top style="border-bottom: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-top: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-right: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-left: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;"  onclick="labelinput(<?php echo$x;?>,1);">
                 <p style='font-size:<?php echo$fontsize;?>;font-family:gothic;font-color:gray; line-height:<?php echo$lineheight;?>%;'>
                 <?php 

                 $fornot=$array[$x][0];
                 $sangho=$array[$x][1];
                 $attention=$array[$x][2];
                 $street=$array[$x][3];
                 $city=$array[$x][4];
                 $country=$array[$x][5];
                 $zip1=$array[$x][6];
                 $zip2=$array[$x][7];

                 echo labelunit3($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zip1,$zip2);


                 ?>
                 </td>
                 <td width=22%> </td>
                 </tr>
                 <?php 
                 unsetarray("word&word2&sangho&attention&street&city&country&zip1&zip2&query&result");
                 }
                 ?>
                 </table>
                 </td></tr></table>
              <?php 
          }
      }
    }
    function imformtec($varstring){
      parse_str($varstring);
      if ($labelkind=='3107'){
          $lastsu=16;     //16
          $boxheight=126;
          $lineheight=100;
          $fontsize='10pt';
          $totalpage=ceil($arraysu/16);
      }
      elseif ($labelkind=='3108'){
          $lastsu=14;       //14
          $boxheight=144;
          $lineheight=110;
          $fontsize='11pt';
          $totalpage=ceil($arraysu/14);
      }
      elseif ($labelkind=='3109'){
          $lastsu=18;   //18
          $boxheight=112;
          $lineheight=115;
          $fontsize='9pt';
          $totalpage=ceil($arraysu/18);
      }
      elseif ($labelkind=='3620'){
          $lastsu=6;
          $boxheight=155;
          $lineheight=120;
          $fontsize='13pt';
          $totalpage=ceil($arraysu/6);

      }

      $cellwidth=1;
      $cutlocation=39;
      if(!isset($labelkind)){$labelkind='3108';}
      if(!isset($labelfrom)){$labelfrom=2;}
      if($labelfrom==1){
          ?>
          <script>
             function labelinput(e,f){
                if(confirm('정말입력하시겠습니까?')){
                   this.window.location.replace('?a=amlabelsave&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&labelfrom=<?php echo$labelfrom;?>&labelkind=<?php echo$labelkind;?>&id=<?php echo$id;?>&whd=<?php echo$whd;?><?php if($ts){?>&ts=<?php echo$ts;?><?php }?>&e='+e+'&f='+f);
                }
             }
             function labeldelete(e,f){
                if(confirm('정말삭제하시겠습니까?')){
                   this.window.location.replace('?a=amlabeldelete&fornot=<?php echo$fornot;?>&ws=<?php echo$ws;?>&labelfrom=<?php echo$labelfrom;?>&labelkind=<?php echo$labelkind;?>&id=<?php echo$id;?>&whd=<?php echo$whd;?><?php if($ts){?>&ts=<?php echo$ts;?><?php }?>&e='+e+'&f='+f);
                }
             }
          </script>
          <?php 
      }
      elseif($labelfrom==2){
          ?>
          <script>
             function labelinput(e,f){

                lwindow = window.open('labelinput.php?a=flabel&e='+e+'&f='+f,'labelinputwindow','resizable=no, scrollbars=yes,menubar=no,status=no,width=500,height=470,left=0,top=0');
                lwindow.focus();
             }
             function labeldelete(e,f){
                if(confirm('정말삭제하시겠습니까?')){
                   mwindow = window.open('labelinput.php?a=dlabelcon&e='+e+'&f='+f,'labelinputwindow','resizable=no, scrollbars=yes,menubar=no,status=no,width=500,height=470,left=0,top=0');
                   mwindow.focus();
                }
             }
          </script>
          <?php 
      }
      elseif($labelfrom==3){
          ?>
          <script>
             function labelinput(e,f){
                if(confirm('정말입력하시겠습니까?')){
                   this.window.location.replace('<?php echo$globals[php_self];?>?a=f_alabelcon&labelfrom=<?php echo$labelfrom;?>&labelkind=<?php echo$labelkind;?>&id=<?php echo$id;?>&whd=<?php echo$whd;?><?php if($ts){?>&ts=<?php echo$ts;?><?php }?>&e='+e+'&f='+f);
                }
             }
             function labeldelete(e,f){
                if(confirm('정말삭제하시겠습니까?')){
                   this.window.location.replace('<?php echo$globals[php_self];?>?a=f_dlabelcon&labelfrom=<?php echo$labelfrom;?>&labelkind=<?php echo$labelkind;?>&id=<?php echo$id;?>&whd=<?php echo$whd;?><?php if($ts){?>&ts=<?php echo$ts;?><?php }?>&e='+e+'&f='+f);
                }
             }
          </script>
          <?php 
      }
      if ( ($labelkind=='3107') || ($labelkind=='3108') ||  ($labelkind=='3109')  ){
          ?>

          <center>
          <table border=0 bordercolor=red width=760 cellspacing=0 cellpadding=0><tr>
          <td valign=top align=center>
              <table border=0 bordercolor=<?php echo $tdcolor;?> cellspacing=2 cellpadding=2 width=720 height=880 <?php echo collapse;?>>
              <?php 
              for ($i=1;$i<$lastsu/2;$i=$i+1){
                 $x=$i;
                 $labelarray=obtainfieldarray('imsilabel','fornot,title,attention,woo1,woo2,country,zip1,zip2',"  eposition='$x' and fposition='1' and userid='$_SESSION[my_session]' and kind='2'");

                 $fornot=$labelarray['fornot'];
                 $sangho=$labelarray['title'];
                 $attention=$labelarray['attention'];
                 $street=$labelarray['woo1'];
                 $city=$labelarray['woo2'];
                 $country=$labelarray['country'];
                 $zip1=$labelarray['zip1'];
                 $zip2=$labelarray['zip2'];
                 ?>
                 <tr>
                 <td width=350 align=top style="border-bottom: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-top: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-right: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-left: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;" <?php if (strlen(trim($sangho))<1){?> onclick="labelinput(<?php echo$x;?>,1);"<?php }else{?> onclick="return labeldelete(<?php echo$x;?>,1);"<?php }?>>
                 <?php 
                 echo labelunit2($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zip1,$zip2);
                 unsetarray("word&word2&sangho&attention&street&city&country&zip1&zip2&query&result");
                 ?>
                 </td>
                 <td width=5 height=<?php echo$boxheight;?>></td>
                 <?php 

                 $labelarray=obtainfieldarray('imsilabel','fornot,title,attention,woo1,woo2,country,zip1,zip2',"  eposition='$x' and fposition='2' and userid='$_SESSION[my_session]' and kind='2'");
                 $fornot=$labelarray['fornot'];
                 $sangho=$labelarray['title'];
                 $attention=$labelarray['attention'];
                 $street=$labelarray['woo1'];
                 $city=$labelarray['woo2'];
                 $country=$labelarray['country'];
                 $zip1=$labelarray['zip1'];
                 $zip2=$labelarray['zip2'];
                 ?>
                 <td width=350 align=top style="border-bottom: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-top: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-right: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-left: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;" <?php if (strlen(trim($sangho))<1){?> onclick="labelinput(<?php echo$x;?>,2);"<?php }else{?> onclick="return labeldelete(<?php echo$x;?>,2);"<?php }?>>
                 <?php 
                 echo labelunit2($fornot,$fontsize,$lineheight,$sangho,$cutlocation,$attention,$street,$city,$country,$zip1,$zip2);
                 unsetarray("word&word2&sangho&attention&street&city&country&zip1&zip2&query&result");
                 ?>
                 </td>
                 </tr>
                 <?php 
              }
              ?>
              </table>
              </td></tr></table>
              </center>
              <?php 
      }
      elseif ($labelkind=='3620'){
              ?>
              <br><br><br><br><br><br><center>

              <table border=0 bordercolor=red width=780 cellspacing=0 cellpadding=0><tr>
              <td valign=top align=center>
              <table border=0 bordercolor=blue cellspacing=2 cellpadding=12 width=790 height=880>
              <?php 
              for ($i=1;$i<$lastsu;$i=$i+1){
                 $x=$i;
                 ?>
                 <tr>
                 <td width=22% height=<?php echo$boxheight;?>> </td>
                 <td width=56% align=top style="border-bottom: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-top: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-right: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;border-left: solid <?php echo$tdcolor;?> <?php echo$cellwidth;?>px;"  onclick="labelinput(<?php echo$x;?>,1);">
                 <p style='font-size:<?php echo$fontsize;?>;font-family:gothic;font-color:gray; line-height:<?php echo$lineheight;?>%;'>
                 <?php 
                 $labelarray=obtainfieldarray('imsilabel','sangho,attention,addr1,addr2,addr3,zip1,zip2',"fornot='$fornot' and eposition='$x' and fposition='1' and userid='$_SESSION[my_session]' and labelfrom=$labelfrom");
                 $sangho=$labelarray['sangho'];
                 $attention=$labelarray['attention'];
                 $street=$labelarray['addr1'];
                 $city=$labelarray['addr2'];
                 $country=$labelarray['addr3'];
                 $zip1=$labelarray['zip1'];
                 $zip2=$labelarray['zip2'];
                 $array=sanghotwoline($sangho,$cutlocation);
                 $word=$array[0];$word2=$array[1];
                 ?>

                                     <b>
                                      <?php 
                                      if (trim($word2)==''){
                                           echo '&nbsp;'.$word;
                                      }else{
                                           echo '&nbsp;'.$word.'<br>'.'&nbsp;&nbsp;'.$word2;
                                      }
                                      ?>
                                      </b>
                                       <br>
                                      <?php 
                                      if ($fornot==1){if (trim($attention)!=''){echo '&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
                                      elseif ($fornot==2){if (trim($attention)!=''){echo '&nbsp;&nbsp;'.$attention;}else{echo '<font color=white>&nbsp;</font>';}}
                                      ?>
                                      <br><br><?php if (trim($street)!=''){echo '&nbsp;&nbsp;'.$street;}else{echo '<font color=white>&nbsp;</font>';}?>
                                      <br><?php if (trim($city)!=''){echo '&nbsp;&nbsp;'.$city;}else{echo '<font color=white>&nbsp;</font>';}?>
                                      <?php 
                                      if ($fornot==1){
                                      ?>
                                      <br><?php if (trim($country)!=''){echo '&nbsp;&nbsp;'.$country;}else{echo '<font color=white>&nbsp;</font>';}?>
                                      <?php 
                                      }
                                      elseif ($fornot==2){
                                      ?>
                                             <br><span class=kofive><b><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$zip1.'-'.$zip2;?></b></span>
                                      <?php 
                                      }
                 ?>
                 </td>
                 <td width=22%> </td>
                 </tr>
                 <?php 
                 unsetarray("word&word2&sangho&attention&street&city&country&zip1&zip2&query&result");
                 }
                 ?>
                 </table>
                 </td></tr></table>
              <?php 
      }
}	
function indusstring($induskind,$fornot=2){
//global $fornot;
    if(!$fornot){$fornot=2;}


    if($fornot==1){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='Patent';}
            elseif($induskind==2){$string='Utility Model';}
            elseif($induskind==3){$string='Design';}
            elseif($induskind==4){$string='Trademark';}
            else{$string='All';}
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='Patent';}
            elseif($induskind==20){$string='Utility Model';}
            elseif($induskind==30){$string='Design';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='Trademark';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='Servicemark';}
            elseif($induskind==42){$string='Businessmark';}
            elseif($induskind==43){$string='Collective mark';}
            elseif($induskind==44){$string='the collective marks for geographical indications';}
            elseif($induskind==45){$string='Trademark/Servicemark';}
        }
        elseif(strlen(trim($induskind))==13){
     	    $induskind=substr($induskind,0,2);
            if($induskind==10){$string='Patent';}
            elseif($induskind==20){$string='Utility Model';}
            elseif($induskind==30){$string='Design';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='Trademark';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='Servicemark';}
            elseif($induskind==42){$string='Businessmark';}
            elseif($induskind==43){$string='Collective mark';}
            elseif($induskind==44){$string='the collective marks for geographical indications';}
            elseif($induskind==45){$string='Trademark/Servicemark';}
        }else{
            $string='All';
        }
    }
    elseif($fornot==2){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='특허';}
            elseif($induskind==2){$string='실용';}
            elseif($induskind==3){$string='디자인';}
            elseif($induskind==4){$string='상표';}
            else{$string='전체';}
            return $string;
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='특허';}
            elseif($induskind==20){$string='실용';}
            elseif($induskind==30){$string='디자인';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='상표';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='서비스표';}
            elseif($induskind==42){$string='업무표장';}
            elseif($induskind==43){$string='단체표장';}
            elseif($induskind==44){$string='지리적단체표장';}
            elseif($induskind==45){$string='상표서비스표';}

        }
        elseif(strlen(trim($induskind))==13){
		    $induskind=substr($induskind,0,2);
            if($induskind==10){$string='특허';}
            elseif($induskind==20){$string='실용';}
            elseif($induskind==30){$string='디자인';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='상표';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='서비스표';}
            elseif($induskind==42){$string='업무표장';}
            elseif($induskind==43){$string='단체표장';}
            elseif($induskind==44){$string='지리적단체표장';}
            elseif($induskind==45){$string='상표서비스표';}
        }else{
            $string='전체';
        }
    }
    elseif($fornot==3){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='[<font color=blue><b>特</b></font>]';}
            elseif($induskind==2){$string='[<font color=skyblue><b>實</b></font>]';}
            elseif($induskind==3){$string='[<font color=green><b>디</b></font>]';}
            elseif($induskind==4){$string='[<font color=red><b>商</b></font>]';}
            else{
            $string='[全體]';
            }
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='[特許]';}
            elseif($induskind==20){$string='[實用]';}
            elseif($induskind==30){$string='[디자인]';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='[商標]';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='[營業標]';}
            elseif($induskind==45){$string='[商標營業標]';}
        }else{
            $string='[全體]';
        }
    }
    return $string;
}
function applikindstring($applino,$fornot=2){
	$str="";
	
	if ($fornot==1){
		if (substr($applino,0,2)=='40'){$str="Trademark";}
		elseif (substr($applino,0,2)=='41'){$str="Servicemark";}
		elseif (substr($applino,0,2)=='45'){$str="Trademark/Servicemark";}
		elseif (substr($applino,0,2)=='50'){$str="Renewal Trademark";}
		elseif (substr($applino,0,2)=='51'){$str="Renewal Servicemark";}
		elseif (substr($applino,0,2)=='10'){$str="Patent";}
		elseif (substr($applino,0,2)=='20'){$str="Utility Model";}
		elseif (substr($applino,0,2)=='30'){$str="Design";}		
	}else if($fornot==2){
		if (substr($applino,0,2)=='40'){$str="상표";}
		elseif (substr($applino,0,2)=='41'){$str="서비스표";}
		elseif (substr($applino,0,2)=='45'){$str="상표서비스표";}
		elseif (substr($applino,0,2)=='50'){$str="갱신상표";}
		elseif (substr($applino,0,2)=='51'){$str="갱신서비스표";}
		elseif (substr($applino,0,2)=='10'){$str="특허";}
		elseif (substr($applino,0,2)=='20'){$str="실용";}
		elseif (substr($applino,0,2)=='30'){$str="디자인";}
	}else if($fornot==3){
		if (substr($applino,0,2)=='40'){$str="[商]";}
		elseif (substr($applino,0,2)=='41'){$str="<b>[<font color=red>商</font>]</b>";}
		elseif (substr($applino,0,2)=='45'){$str="<b>[<font color=red>商</font>]</b>";}
		elseif (substr($applino,0,2)=='50'){$str="<b>[<font color=red>更商</font>]</b>";}
		elseif (substr($applino,0,2)=='51'){$str="<b>[<font color=red>更商</font>]</b>";}
		elseif (substr($applino,0,2)=='10'){$str="<b>[<font color=blue>特</font>]</b>";}
		elseif (substr($applino,0,2)=='20'){$str="<b>[<font color=blue>實</font>]</b>";}
		elseif (substr($applino,0,2)=='30'){$str="<b>[<font color=green>디자인</font>]</b>";}
	}
    return $str;	
}
function appliobjectstring($applino,$fornot=2){
	$str="";
	if($fornot==2){
		if (substr($applino,0,2)=='40'){$str="상표";}
		elseif (substr($applino,0,2)=='41'){$str="서비스표";}
		elseif (substr($applino,0,2)=='45'){$str="상표서비스표";}
		elseif (substr($applino,0,2)=='50'){$str="갱신상표";}
		elseif (substr($applino,0,2)=='51'){$str="갱신서비스표";}
		elseif (substr($applino,0,2)=='10'){$str="발명";}
		elseif (substr($applino,0,2)=='20'){$str="고안";}
		elseif (substr($applino,0,2)=='30'){$str="디자인";}
	}else{
		if (substr($applino,0,2)=='40'){$str="Trademark";}
		elseif (substr($applino,0,2)=='41'){$str="Servicemark";}
		elseif (substr($applino,0,2)=='45'){$str="Trademark/Servicemark";}
		elseif (substr($applino,0,2)=='50'){$str="Renewal Trademark";}
		elseif (substr($applino,0,2)=='51'){$str="Renewal Servicemark";}
		elseif (substr($applino,0,2)=='10'){$str="Invention";}
		elseif (substr($applino,0,2)=='20'){$str="Utility Model Invention";}
		elseif (substr($applino,0,2)=='30'){$str="Design";}		
	}
    return $str;	
}
function industitlestring($induskind,$fornot=2){
    if( (!isset($fornot))  ||  ($fornot<1) ){$fornot=2;}
    if($fornot==1){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='Title of Invention';}
            elseif($induskind==2){$string='Title of Utility Model';}
            elseif($induskind==3){$string='Title of Design';}
            elseif($induskind==4){$string='Trademark';}
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='Title of Invention';}
            elseif($induskind==20){$string='Title of Utility Model';}
            elseif($induskind==30){$string='Title of Design';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='Trademark';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='Servicemark';}
            elseif($induskind==42){$string='Businessmark';}
            elseif($induskind==43){$string='Collective mark';}
            elseif($induskind==44){$string='the collective marks for geographical indications';}
            elseif($induskind==45){$string='Trademark/Servicemark';}
        }
    }
    elseif($fornot==2){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='발명의명칭';}
            elseif($induskind==2){$string='고안의명칭';}
            elseif($induskind==3){$string='디자인명칭';}
            elseif($induskind==4){$string='상표';}
            else{$string='전체';}
            return $string;
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='발명의명칭';}
            elseif($induskind==20){$string='고안의명칭';}
            elseif($induskind==30){$string='디자인명칭';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='상표';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='서비스표';}
            elseif($induskind==42){$string='업무표장';}
            elseif($induskind==43){$string='단체표장';}
            elseif($induskind==44){$string='지리적단체표장';}
            elseif($induskind==45){$string='상표서비스표';}
        }
    }
 	
}
function indusobject($induskind,$fornot){	
    if( (!isset($fornot))  ||  ($fornot<1) ){$fornot=2;}
    if($fornot==1){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='Invention';}
            elseif($induskind==2){$string='Utility Model';}
            elseif($induskind==3){$string='Design';}
            elseif($induskind==4){$string='Trademark';}
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='Invention';}
            elseif($induskind==20){$string='Utility Model';}
            elseif($induskind==30){$string='Design';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='Trademark';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='Servicemark';}
            elseif($induskind==42){$string='Businessmark';}
            elseif($induskind==43){$string='Collective mark';}
            elseif($induskind==44){$string='the collective marks for geographical indications';}
            elseif($induskind==45){$string='Trademark/Servicemark';}
        }
    }
    elseif($fornot==2){
        if(strlen(trim($induskind))==1){
            if($induskind==1){$string='발명';}
            elseif($induskind==2){$string='고안';}
            elseif($induskind==3){$string='디자인';}
            elseif($induskind==4){$string='상표';}
            else{$string='전체';}
            return $string;
        }
        elseif(strlen(trim($induskind))==2){
            if($induskind==10){$string='발명';}
            elseif($induskind==20){$string='고안';}
            elseif($induskind==30){$string='디자인';}
            elseif(  ($induskind==40)  || ($induskind==50)  ){$string='상표';}
            elseif(  ($induskind==41)  || ($induskind==51)  ){$string='서비스표';}
            elseif($induskind==42){$string='업무표장';}
            elseif($induskind==43){$string='단체표장';}
            elseif($induskind==44){$string='지리적단체표장';}
            elseif($induskind==45){$string='상표서비스표';}
        }
    }	
	return $string;	
}
function attnostring($attno){
	$str="";
    $str=substr($attno,0,1).'-'.substr($attno,1,4).'-'.substr($attno,5,6).'-'.substr($attno,11,1);
    return $str;
	
}
function kwanchoicestring($kwanchoice){
    $string="";
	if($kwanchoice==1){
        $string="관할유지";
    }	
	elseif($kwanchoice==2){
        $string="관할중단";
    }	
	elseif($kwanchoice==3){
        $string="관할불능";
    }	
	elseif($kwanchoice==4){
        $string="관할이전";
    }	
	return $string;
	
}
function rmethodstring($rmethod){
	if ($rmethod=='1') {return '메일';}			  
	elseif ($rmethod=='2') {return '팩스';}
	elseif ($rmethod=='3') {return '우편';}
	elseif ($rmethod=='4') {return '전화';}	
	elseif ($rmethod=='5') {return '직접대면';}	
	
}
function statuskeepstring($statuskeep){
	if ($statuskeep=='1') {return '출원유지요망';}			  
	elseif ($statuskeep=='2') {return '포기서신접수';}
	elseif ($statuskeep=='3') {return '취하의사접수';}
	elseif ($statuskeep=='4') {return '방식미대응무효';}
	elseif ($statuskeep=='5') {return '실체중절차무효';}
	elseif ($statuskeep=='6') {return '등록료미납무효';}
	elseif ($statuskeep=='7') {return '불복심판포기';}
	elseif ($statuskeep=='8') {return '관할권상실';}
	
}
function applinomal($applino){
	$applino_1=substr($applino,0,2);
	$applino_2=substr($applino,2,6);
	$applino_3=substr($applino,6,7);
    if( ($applino_1=='50') or ($applino_1=='51') or ($applino_1=='55') ){echo 'Renewal Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    if( ($applino_1=='40') ){echo 'Trademark Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    if( ($applino_1=='41') ){echo 'Servicemark Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    if( ($applino_1=='42') ){echo 'Business mark Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    if( ($applino_1=='43') ){echo 'Collective mark Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    if( ($applino_1=='44') ){echo 'Collective marks for geographical indications Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    if( ($applino_1=='45') ){echo 'Trademark/Servicemark Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    elseif ($applino_1=='10'){echo 'Patent Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    elseif ($applino_1=='20'){echo 'Utility Model Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
    elseif ($applino_1=='30'){echo 'Design Application No.'.$applino_1.'-'.$applino_2.'-'.$applino_3;}
}

function applinostring($applino,$color=1){
global $nostring;
    if(isset($applino)){
   
        if($color==1){
		    $colorstring='cd5c5c';
            $nostring="<b><font color=$colorstring>".substr($applino,0,2).'-'.substr($applino,2,4).'-'.substr($applino,6,7).'</font></b>';
		
		}else{
            $nostring="<b>".substr($applino,0,2).'-'.substr($applino,2,4).'-'.substr($applino,6,7)."</b>";
		}
        return $nostring;
    }else{
        return false;
    }
}
function regnostring($regno,$color=1){
global $nostring;

    if(isset($regno)){
   
        if($color==1){
		    $colorstring='cd5c5c';
			if(substr($regno,9,4)=="0000"){
				$nostring="<font color=$colorstring>".substr($regno,0,2).'-'.substr($regno,2,7).'</font>';		
			}else{
				$nostring="<font color=$colorstring>".substr($regno,0,2).'-'.substr($regno,2,7).'-'.substr($regno,9,2).'-'.substr($regno,11,2).'</font>';				
			}
		}else{
			if(substr($regno,9,4)=="0000"){
				$nostring="<font color=$colorstring>".substr($regno,0,2).'-'.substr($regno,2,7).'</font>';		
			}else{
				$nostring="<font color=$colorstring>".substr($regno,0,2).'-'.substr($regno,2,7).'-'.substr($regno,9,2).'-'.substr($regno,11,2).'</font>';				
			}
		}
        return $nostring;
    }else{
        return false;
    }
}

function balnostring($applibalno){	
    $applibalno_1=substr($applibalno,0,1); $applibalno_2=substr($applibalno,1,1);
    $applibalno_3=substr($applibalno,2,4); $applibalno_4=substr($applibalno,6,7);
    $applibalno_5=substr($applibalno,13,2);
	return $applibalno_1.'-'.$applibalno_2.'-'.$applibalno_3.'-'.$applibalno_4.'-'.$applibalno_5;
}	
function pubnostring($pubno){	
    $pubno_1=substr($pubno,0,2); $pubno_2=substr($pubno,2,4);
    $pubno_3=substr($pubno,6,7); 
	return $pubno_1.'-'.$pubno_2.'-'.$pubno_3;
}	
function applinoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $var_1=substr($value,0,2);
    $var_2=substr($value,2,4);
    $var_3=substr($value,6,7);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=2 maxlength=2 value='<?php echo$var_1;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:22;padding-top:1px;" <?php movefocus($formname,$va_1,$va_2,2);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=4 maxlength=4 value='<?php echo$var_2;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:40;padding-top:1px;" <?php movefocus($formname,$va_2,$va_3,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=7 maxlength=7 value='<?php echo$var_3;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:60;padding-top:1px;" <?php movefocus($formname,$va_3,$next,7);?>></td>
    </td>
    <td>
	<span onclick="<?php echo$formname;?>.<?php echo $va_1;?>.value='';<?php echo$formname;?>.<?php echo $va_2;?>.value='';<?php echo$formname;?>.<?php echo $va_3;?>.value='';" style="cursor:hand;"> x</span>
	</td>		
	</tr></table>	
	<?php
	
}
function pubnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $var_1=substr($value,0,2);
    $var_2=substr($value,2,4);
    $var_3=substr($value,6,7);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=2 maxlength=2 value='<?php echo$var_1;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:22;padding-top:1px;" <?php movefocus($formname,$va_1,$va_2,2);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=4 maxlength=4 value='<?php echo$var_2;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:40;padding-top:1px;" <?php movefocus($formname,$va_2,$va_3,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=7 maxlength=7 value='<?php echo$var_3;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:60;padding-top:1px;" <?php movefocus($formname,$va_3,$next,7);?>></td>
    </td>
    <td>
	<span onclick="<?php echo$formname;?>.<?php echo $va_1;?>.value='';<?php echo$formname;?>.<?php echo $va_2;?>.value='';<?php echo$formname;?>.<?php echo $va_3;?>.value='';" style="cursor:hand;">&nbsp; x &nbsp;</span>
	</td>		
	</tr></table>	
	<?php
	
}
function appnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $va_4=$varname.'_4';
    $var_1=substr($value,0,1);
    $var_2=substr($value,1,4);
    $var_3=substr($value,5,6);	
    $var_4=substr($value,11,1);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=1 maxlength=1 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,1);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=4 maxlength=4 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,$va_3,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=6 maxlength=6 value='<?php echo$var_3;?>' <?php movefocus($formname,$va_3,$va_4,6);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_4;?>' size=1 maxlength=1 value='<?php echo$var_4;?>' <?php movefocus($formname,$va_4,$next,1);?>></td>
    </td></tr></table>	
	<?php
	
}
function attnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $va_4=$varname.'_4';
    $var_1=substr($value,0,1);
    $var_2=substr($value,1,4);
    $var_3=substr($value,5,6);	
    $var_4=substr($value,11,1);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=1 maxlength=1 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,1);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=4 maxlength=4 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,$va_3,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=6 maxlength=6 value='<?php echo$var_3;?>' <?php movefocus($formname,$va_3,$va_4,6);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_4;?>' size=1 maxlength=1 value='<?php echo$var_4;?>' <?php movefocus($formname,$va_4,$next,1);?>></td>
    </td></tr></table>	
	<?php
	
}

function citizennoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $var_1=substr($value,0,6);
    $var_2=substr($value,6,7);
	?>	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=6 maxlength=6 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,6);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=7 maxlength=7 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,$next,7);?>></td>
    </tr>
	</table>	
	<?php	
}
function zupnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $var_1=substr($value,0,4);
    $var_2=substr($value,4,7);
	?>	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=4 maxlength=4 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=7 maxlength=7 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,'gangclass',7);?>></td>
    </tr>
	</table>	
	<?php	
}

function ponostring($pono){
    $no="";
	$no= substr($pono,0,4).'-'.substr($pono,4,6).'-'.substr($pono,10,1);
    return $no;
}
function ponoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $var_1=substr($value,0,4);
    $var_2=substr($value,4,6);
    $var_3=substr($value,10,1);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=4 maxlength=4 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=6 maxlength=6 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,$va_3,6);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=1 maxlength=1 value='<?php echo$var_3;?>' <?php movefocus($formname,$va_3,$next,1);?>></td>
    </td></tr></table>	
	<?php
	
}
function regnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $va_4=$varname.'_4';
    $var_1=substr($value,0,2);
    $var_2=substr($value,2,7);
    $var_3=substr($value,9,2);	
    $var_4=substr($value,11,2);		
	?>	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=2 maxlength=2 value='<?php echo$var_1;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:22;padding-top:1px;" <?php movefocus($formname,$va_1,$va_2,2);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=7 maxlength=7 value='<?php echo$var_2;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:62;padding-top:1px;" <?php movefocus($formname,$va_2,$va_3,7);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=2 maxlength=2 value='<?php echo$var_3;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:22;padding-top:1px;" <?php movefocus($formname,$va_3,$va_4,2);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_4;?>' size=2 maxlength=2 value='<?php echo$var_4;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:22;padding-top:1px;" <?php movefocus($formname,$va_4,$next,2);?>></td>
    <td>
	<span onclick="<?php echo$formname;?>.<?php echo $va_1;?>.value='';<?php echo$formname;?>.<?php echo $va_2;?>.value='';<?php echo$formname;?>.<?php echo $va_3;?>.value='';<?php echo$formname;?>.<?php echo $va_4;?>.value='';">&nbsp;&nbsp; x &nbsp;&nbsp;</span>
	</td>
	</tr></table>	
	<?php	
}


function intapplinostring($intapplino,$color=1){
    global $nostring;
    if(  (isset($intapplino))  &&  (strlen(trim($intapplino))>0)  ){
   
        if($color==1){
		    $colorstring='cd5c5c';
            $nostring="<b><font color=$colorstring>".substr($intapplino,0,2).'-'.substr($intapplino,2,4).'-'.substr($intapplino,6,6).'</font></b>';
		
		}else{
            $nostring="<b>".substr($intapplino,0,2).'-'.substr($intapplino,2,4).'-'.substr($intapplino,6,6)."</b>";
		}
        return $nostring;
    }else{
        return false;
    }
}

function intapplinoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $var_1=substr($value,0,2);
    $var_2=substr($value,2,4);
    $var_3=substr($value,6,6);	
	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=2 maxlength=2 value='<?php echo$var_1;?>' <?php movefocus($formname,$va_1,$va_2,2);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=4 maxlength=4 value='<?php echo$var_2;?>' <?php movefocus($formname,$va_2,$va_3,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=6 maxlength=6 value='<?php echo$var_3;?>' <?php movefocus($formname,$va_3,$next,6);?>></td>
    </td></tr></table>	
	<?php
	
}
function balnoinput($formname,$varname,$value,$next){
    $va_1=$varname.'_1';
    $va_2=$varname.'_2';
    $va_3=$varname.'_3';
    $va_4=$varname.'_4';
    $va_5=$varname.'_5';
	
    $var_1=substr($value,0,1);
    $var_2=substr($value,1,1);
    $var_3=substr($value,2,4);	
    $var_4=substr($value,6,7);
    $var_5=substr($value,13,2);	
	

	?>
	
    <table border=0 cellspacing=0 cellpadding=0 style="border:0px solid;padding:0px;">
    <tr>
    <td><input type='text' name='<?php echo$va_1;?>' size=1 maxlength=1 value='<?php echo$var_1;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:14;padding-top:1px;" <?php movefocus($formname,$va_1,$va_2,1);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_2;?>' size=1 maxlength=1 value='<?php echo$var_2;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:14;padding-top:1px;" <?php movefocus($formname,$va_2,$va_3,1);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_3;?>' size=4 maxlength=4 value='<?php echo$var_3;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:42;padding-top:1px;" <?php movefocus($formname,$va_3,$va_4,4);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_4;?>' size=7 maxlength=7 value='<?php echo$var_4;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:62;padding-top:1px;" <?php movefocus($formname,$va_4,$va_5,7);?>></td>
    <td>-</td>
    <td><input type='text' name='<?php echo$va_5;?>' size=2 maxlength=2 value='<?php echo$var_5;?>' style="font-color:black;border-width:1;border-color:gray;border-style:solid;padding:0; width:22;padding-top:1px;" <?php movefocus($formname,$va_5,$next,2);?>></td>
    <td>
	<span onclick="<?php echo$formname;?>.<?php echo $va_1;?>.value='';<?php echo$formname;?>.<?php echo $va_2;?>.value='';<?php echo$formname;?>.<?php echo $va_3;?>.value='';<?php echo$formname;?>.<?php echo $va_4;?>.value='';<?php echo$formname;?>.<?php echo $va_5;?>.value='';" style="cursor:hand;"> x</span>
	</td>	
	
    </tr></table>	
	<?php
	
}
function staffclasstring($clas,$color=true){
	if(!isset($color)){$color=true;}
	$string="";
	if($clas==1){
		if($color==true){
		    $string="<font color=red>"."[代]"."</font>";
		}else{			
			$string="[代]";
		}
	}
	elseif($clas==2){
		if($color==true){
		    $string="<font color=blue>"."職"."</font>";
		}else{
			
			$string="職";
		}		
	}
	return $string;
}
function usenotstring($nowuseornot){
	$string="";
	if($nowuseornot==1){
	    $string="<font color=red>"."使"."</font>";
	}else{
	    $string="<font color=gray>"."不"."</font>";
	}
	return $string;
}
function staffformusestring($formuse){
	$string="";
	if($formuse==1){
		$string="서식사용권한있음";
	}
	elseif($formuse==2){
		$string="서식사용권한없음";
	}
	return $string;
}
function staffjikwestring($jikwe){
	$string="";
	if($jikwe==1){$string="소장";}
	elseif($jikwe==2){$string="부소장";}
	elseif($jikwe==3){$string="부소장";}
	elseif($jikwe==4){$string="이사";}
	elseif($jikwe==5){$string="사무장";}
	elseif($jikwe==6){$string="부장";}
	elseif($jikwe==7){$string="과장";}
	elseif($jikwe==8){$string="대리";}

	return $string;
}
function staffbuseostring($buseo){
	$string="";
	if($buseo==1){$string="상표부";}
	elseif($buseo==2){$string="특허부";}
	elseif($buseo==3){$string="도면부";}
	elseif($buseo==4){$string="관리부";}
	elseif($buseo==5){$string="외국부";}
	return $string;
}
function recentapparray($varstring){
global $connection;
global $dbname;
global $appdata;
parse_str($varstring);
        dbconnection();
        $todaydate=date('Ymd');
        if($ws==1){
              $query="select period_diff( left($todaydate,6) , left(min(applidate),6) ), min(applidate) from $appdata where fornot=$fornot and (find_in_set('$id',appcode)>0) and applidate like '________'";
        }
        elseif($ws==2){
              $query="select period_diff( left($todaydate,6) , left(min(applidate),6) ), min(applidate) from $appdata where fornot=$fornot and lappcode='$id' and applidate like '________'";
        }
        $result = $connection->query($query);
        if($result){
              $row=$result->fetch_row();
              $totalmonthsu=$row[0];
              $minapplidate=$row[1];

        }
        if($totalmonthsu<1){
              $totalmonthsu=1;
        }
        $intsu=ceil($totalmonthsu/12);
        $namsu=$totalmonthsu%12;
        $datearray[]=$todaydate;
        $date=$todaydate;
        for($i=0;$i<12;$i=$i+1){
            $caldate=datekal($date,0,-$intsu,0);
            $datearray[]=$caldate;
            $date=$caldate;
        }

        if($datearray[12]>$minapplidate){
            $datearray[12]=$minapplidate;
        }
        return $datearray;
}
function recentapptable($datearray,$varstring){
	global $connection;
	global $dbname;
	global $appdata;
	parse_str($varstring);
	dbconnection();

    ?>
    <table border=1 bordercolor=aaaaaa width=980 style='border-collapse:collapse;' cellspacing=0 cellpadding=0>
    <tr>
        <td>
            <?php 		
            if($ws==2){
                $query = "select sum(induskind=1),sum(induskind=2),sum(induskind=3),sum(induskind=4),count(*) from $appdata where fornot='$fornot' and lappcode='$id' ";
            }
            elseif($ws==1){
                $query = "select sum(induskind=1),sum(induskind=2),sum(induskind=3),sum(induskind=4),count(*) from $appdata where fornot='$fornot' and (find_in_set('$id',appcode)>0) ";
            }
            $result = $connection->query($query);
            if ($result){
                $row=$result->fetch_row();
                $psu=$row[0];$usu=$row[1];$dsu=$row[2];$msu=$row[3];
				if(!$psu){$psu=0;}
				if(!$usu){$usu=0;}
				if(!$dsu){$dsu=0;}
				if(!$msu){$msu=0;}
            }
		    ?>
    	 	<div>
	    	<canvas id="recentappsu-area" width="70" height="70"/>
		    </div>
		 
			<script>
				var pieData = [
						{
							value: <?php echo$psu;?>,
							color:"#4682b4",
							highlight: "#4682c4",
							label: "특"
						},
						{
							value: <?php echo$usu;?>,
							color: "#87CEEB",
							highlight: "#87CEFB",
							label: "실"
						},
						{
							value: <?php echo$dsu;?>,
							color: "#8FBC8F",
							highlight: "#8FBC9F",
							label: "디"
						},
						{
							value: <?php echo$msu;?>,
							color: "#F08080",
							highlight: "#F08090",
							label: "상"
						}
					];
					
				function drawbar(){
						var ctx = document.getElementById("recentappsu-area").getContext("2d");
						window.myPie = new Chart(ctx).Pie(pieData);
				}
			    drawbar();
			</script>
			
			
			
	    </td>
        <?php 
        if (!isset($todaydate)){$todaydate=date('Ymd');}
        for($x=0;$x<12;$x=$x+1){
            $fromdate=$datearray[$x];
            $todate=$datearray[$x+1];
            if($ws==2){
                $query = "select sum(induskind=1),sum(induskind=2),sum(induskind=3),sum(induskind=4),count(*) from $appdata where fornot='$fornot' and lappcode='$id' and (  (applidate>'$fromdate') and (applidate<='$todate')  ) ";
            }
            elseif($ws==1){
              $query = "select sum(induskind=1),sum(induskind=2),sum(induskind=3),sum(induskind=4),count(*) from $appdata where fornot='$fornot' and (find_in_set('$id',appcode)>0) and (  (applidate>'$fromdate') and (applidate<='$todate')  ) ";
            }
            $result = $connection->query($query);
            if ($result){
                $row=$result->fetch_row();
                $apppsu=$row[0];$appusu=$row[1];$appdsu=$row[2];$appmsu=$row[3];$apptotalsu=$row[4];
            }

            ?>
            <td valign=bottom>
                <table border=0 width=74 cellspacing=0 cellpadding=0 valign=bottom>
                <tr>
                    <td bgcolor=white valign=bottom align=center>
                     <table>
                       <tr>
                        <td> <?php if($apppsu>0){$su=$apppsu;$color=induscolor(1); recentappbox(makeaddstring("su=$su,fornot=$fornot,induskind=1,ws=$ws,id=$id,color=$color,fromdate=$fromdate,todate=$todate"));} ?></td>
                        <td> <?php if($appusu>0){$su=$appusu;$color=induscolor(2); recentappbox(makeaddstring("su=$su,fornot=$fornot,induskind=2,ws=$ws,id=$id,color=$color,fromdate=$fromdate,todate=$todate"));} ?></td>
                        <td> <?php if($appdsu>0){$su=$appdsu;$color=induscolor(3); recentappbox(makeaddstring("su=$su,fornot=$fornot,induskind=3,ws=$ws,id=$id,color=$color,fromdate=$fromdate,todate=$todate"));} ?></td>
                        <td> <?php if($appmsu>0){$su=$appmsu;$color=induscolor(4); recentappbox(makeaddstring("su=$su,fornot=$fornot,induskind=4,ws=$ws,id=$id,color=$color,fromdate=$fromdate,todate=$todate"));} ?></td>
                       </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td colspan=2>
                     <?php 
                     $fromdate=datekal($fromdate,0,0,1);
                     echo shortdatestring($fromdate).'<br>~'.shortdatestring($todate);?>
                    </td>
                  </tr>
                  </table>
         </td>
           <?php 
           unset($apppsu);unset($appusu);unset($appdsu);unset($appmsu);unset($su);
       }
       ?>
       </tr></table><?php 

}
function recentappbox($varstring){
    parse_str($varstring);
    $color=induscolor($induskind);
    ?>
    <table>
        <tr><td>
         <a href='app.php?a=app_show&fornot=<?php echo$fornot;?>&induskind=<?php echo$induskind;?>&ws=<?php echo$ws;?>&id=<?php echo$id;?>&fromdate=<?php echo$fromdate;?>&todate=<?php echo$todate;?>&whd=1'><?php echo$su;?></a>
        </td></tr>
        <tr><td>
            <table height=<?php echo$su;?> width=5 bgcolor=<?php echo$color;?>><tr><td bgcolor=<?php echo$color;?>></td></tr></table>
        </td></tr>
    </table>
    <?php 
}
function countrycorrect($id){////영문 나라이름있는데 나라 코드가 있으면 나라이름을 넣거나 고치는것
	global $connection;
	$query="select fornot,country,countrycode,krname from customer where id='$id'";
	$result=$connection->query($query);
	if($result){
		if($result->num_rows>0){
		    $row=$result->fetch_assoc();
			$fornot=$row['fornot'];
			$country=$row['country'];
			$krname=$row['krname'];
			$countrycode=strtoupper($row['countrycode']);
			if($fornot==1){
				if( (strlen(trim($countrycode))>0) && ($countrycode!="kr") ){
					if(strlen(trim($country))<1){
						$aquery="select enname from countrycode where twocode='$countrycode'";
						$aresult=$connection->query($aquery);	
						if($aresult){
							if($aresult->num_rows>0){
								$arow=$aresult->fetch_assoc();	
								$enname=$arow['enname'];
								$enname=ucwords(strtolower($enname));///첫글자만 대문자로 
								if(strlen(trim($enname))>0){
									$cquery="update custom set country='$enname' where id='$id'";
									$cresult = $connection->query($cquery);  	
									
								}
								
							}
						}					
						
					}

				}
				elseif(  (strlen(trim($country))>1) && ( trim($countrycode)=="")  ){
					
					if($country=="USA"){  //미국이면 
						$country="UNITED STATES";//countrycode테이블에서 코드를 찾을수있게 바꾼다.
					}
					
					$country=strtoupper($country);///대문자로 
					
					$aquery="select twocode from countrycode where upper(enname)='$country'";
					$aresult=$connection->query($aquery);	
					if($aresult){
						if($aresult->num_rows>0){
							$arow=$aresult->fetch_assoc();	
							$twocode=$arow['twocode'];
							
							$twocode=strtoupper($twocode);///대문자로 
							if(strlen(trim($twocode))>0){
								$cquery="update custom set countrycode='$twocode' where id='$id'";
								$cresult = $connection->query($cquery);  		
							}							
						}
					}	
				}
				
				elseif(  (strlen(trim($country))<1) && ( trim($countrycode)=="")  ){
					/////외국인인데 나라도 없고 국가코드도 없다면
					if( strlen(trim($krname))>0) {						
					    if(strstr($krname,"게엠베하")){
							$cquery="update custom set countrycode='DE' where id='$id'";
							$cresult = $connection->query($cquery);  
                        }												
					}
				}
			}

		}
	
	}	
}
?>