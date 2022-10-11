
<form id="form1" name="form1" method="post" action="index.php?control=login">
<div align="center">
    <div style="max-width: 300px;">
</br></br></br>



<p><img src="img/lnxgestlogo.png" /></p>

<div class="msgaviso">
<?php
        $sqlaux = $mysqli->query("select * from ".$prefixsql."users_config where opcion = 'ALLOW_LOGIN' "); 
        $rowaux = mysqli_fetch_assoc($sqlaux);
        $permitido_login = $rowaux["valor"];

        if($permitido_login == "NO")
        {
            echo '<p align="center"><b>User login is disabled</b></p>';
        }
?>
<div class="row">
    <div class="col-sm-2">
        username
    </div>
    <div class="col">
        <input name="txtusername" type="text" maxlength="50" with="100%" required="" autofocus/>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Password
    </div>
    <div class="col">
        <input name="txtpassword" type="password" with="100%" required="" maxlength="50" />
    </div>
</div>
<div class="row">
    <div class="col-sm-2">
        Device
    </div>
    <div class="col">
        <input name="txtdevice" type="text" with="100%" maxlength="50" />
    </div>
</div>
<div class="row">
    <div class="col">
        <label><input type="checkbox" name="chkmantenersesion" value="1" /> Keep the session started</label>
    </div>
</div>
<div class="row">
    <div class="col" align="center">
        <input type="submit" class="btnsubmit" name="button" id="button" value="Enter" />
    </div>
</div>  

</div>



</form>


<p>For a best experience, you should use <a href="https://www.mozilla.org/es-ES/firefox/" target="_blank">Mozilla Firefox</a></p>



    </div>
</div>