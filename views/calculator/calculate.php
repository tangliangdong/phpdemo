<?php
$operator = '+';
if(isset($_POST['submit'])){
	$opa=$_POST['var1'];
	$opb=$_POST['var2'];
	$operator=$_POST['ysf'];
	if(is_numeric($opa) && is_numeric($opb) && $opa!="" && $opb!=""){
		switch ($operator) {
			case '+':$rs=$opa+$opb;break;
			case '-':$rs=$opa-$opb;break;
			case 'x':$rs=$opa*$opb;break;
			case '/':if($opb!=0){
					$rs=$opa/$opb;
					break;
					}else{
						echo "<script>alert('除数不能为零，请重新输入。');</script>";
						exit;
					}
			case '%':if(is_float($opa) && is_float($opb) &&$opb!=0){
				    $rs=$opa%$opb;
				    break;
					}else{
						echo "<script>alert('除只能对整数求余数，请重新输入。');</script>";
						exit;
					}
		}
		$rs=round($rs,2);
	}else{
		echo "<script>alert('请输入正确的数据进行计算。');</script>";
	}
}
?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7" charset="UTF-8"/>
<title>PHP计算器</title>
</head>
<body>
<div style="width: 320px;height: 70px;margin: 80px auto;line-height: 40px;font-size: 16px;background: #FFFFCC;padding: 15px;border: 1px solid #DDD;">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<input type="text" name="var1" size="10" value="<?php echo isset($_POST['var1'])?$_POST['var1']:'';?>"/>
		<select name="ysf">
			<option value="+"<?php echo $operator=="+" ? "selected":"";?>>+</option>
			<option value="-"<?php echo $operator=="-" ? "selected":"";?>>-</option>
			<option value="x"<?php echo $operator=="x" ? "selected":"";?>>x</option>
			<option value="/"<?php echo $operator=="/" ? "selected":"";?>>/</option>
			<option value="%"<?php echo $operator=="%" ? "selected":"";?>>%</option>
		</select>
		<input type="text" name="var2" size="10" value="<?php echo isset($_POST['var2'])?$_POST['var2']:'' ;?>"/>
		<label> = </label>
		<input type="text" name="result" size="10" value="<?php echo isset($rs)?$rs:'';?>"/>
		<br/>
		<input type="submit" value="计算" name="submit" />&nbsp;
		<?php
			if(isset($_POST['submit']))
				print "$opa $operator $opb"."=".$rs;
		?>
	</form>
	</div>
</body>
</html>
