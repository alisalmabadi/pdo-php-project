<!--Form with header-->
<div class="form">
<h3>ورود</h3>
<form action="" method="post">
    
       
   
        <div class="form-group">
		    <label for="form2">نام کاربری</label>
            <input type="text" id="form2" class="form-control input-lg" name="username">
            
        </div>

        <div class="form-group">
		    <label for="form4">رمز عبور</label>
            <input type="password" id="form4" class="form-control input-lg" name="password">
           
        </div>
    <center>
     <div class="form-group">
         <label for="form4">تصویر امنیتی</label>
         
  <?php $sa_captchaDIR='sa-captcha';  include 'sa-captcha/captcha.php';  ?>
<br/><br/>کد امنیتی را وارد نمایید
<input name="captcha" type="text">
  

  </div>
        </center>

        <div class="text-xs-center">
            <center>
            <button class="btn btn-deep-purple" type="submit" name="login" style="text-align:center;margin-right:115px; margin-top:10px;">ورود به سامانه</button>
            </center>
        </div>


</div>
    </form>