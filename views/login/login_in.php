<?php
  $userid = isset($_GET['ID']) ? $_GET['ID'] : '';
  $ciphercode = isset($_GET['password']) ? $_GET['password'] : '';
  if($userid!="" && $ciphercode!="")
  {
    if($userid == "admin" && $ciphercode =="1001")
    {
      header("Location:test.html");
      print "<script> alert('登录成功'); </script>";
    }else{
      header("Location:login.html");
      print "<script> alert('账号或密码不正确'); </script>";
    }
  }
  else{
    print "<script> alert('请输入账号和密码。'); </script>";
  }
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>登录</title>
</head>
<body>
  <div id="total">
    <form action= "login_in.php" method="get">
      <div id="left"><label>账&nbsp;号</label></div>
      <div id="right"><input type="text" name="ID" id="ID" /></div>
      <br/>
      <div id="left"><label>密&nbsp;码</label></div>
      <div id="right"><input type="password" name="password" id="password" /></div>
      <br/>
      <input type="submit" name="submit" value="登录" />&nbsp;&nbsp;
      <input type="reset" name="reset" value="重置" />
    </form>
  </div>
</body>
</html>
