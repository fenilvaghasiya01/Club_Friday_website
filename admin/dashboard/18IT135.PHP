<!DOCTYPE html>
<html>
<head>
  <title>login</title>
</head>
<style>
  
</style>
<body>
  <form action="valide.php" method="post">
    <tableborder="1" cellspacing="15" cellpadding="15">
    <tr><tf colspan="2"><center>login</center></td></tr>
      <tr><td><label for="email_address"></label>Email</td>
        <td><input type="email" id="email" name="email"></td>
      </tr>
      <tr>
        <td><label for="password"></label>Password</td>
        <td><input type="password" id="password" name="password"></td>
      </tr>
      <tr>
        <td><label for="submit"></label>Submit</td>
        <td><center><input type="submit" id="submit"  name="submit" onclick="valide_password()" value="submit"></center></td>
      </tr>
  </table>
</form>
<script >
  function valide_password(){
    var password=/^[A-z]\w(7,14)$/;
    var inputed_pass=document.getElementById(password);
    if(!(inputed_pass.match(password))){
      alery("enter password again....!");
      return false;
    }
    else
    {
      return true;
    }
  }
</script>

</body>
</html>