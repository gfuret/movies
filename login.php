<?php
  session_start();
  if(isset($_SESSION['LOGIN_STATUS']) && !empty($_SESSION['LOGIN_STATUS'])){
      header('location:index.php');
  }
  $title = 'login';
  include_once('inc/header.php');
?>
    <body>
    <header>
      <div class="header">
        <h1>Movie test</h1>
      </div>
    </header>
    <div id="wrapper">
      <!-- BEGIN LOGIN FORM -->
         <table class="login_box">
              <tr><td colspan="2" id="errorMessage"></td></tr>
              <tr>
                 <td colspan="2"><label>UserName: </label><input type="text" name="uname" id="uname"></td>
              </tr>
              <tr>
                 <td colspan="2"><label>Password: </label><input type="password" name="password" id="password"></td>
              </tr>
              <tr style="display: none">
                 <td colspan="2"><label>email: </label><input type="email" name="email" id="email"></td>
              </tr>              
              <tr id="button_box">
                 <td colspan="2"><input type="button" name="submit" value="Submit" class="button" onclick="validLogin()"></td>
              </tr>
          </table>
          <!-- END LOGIN FORM -->
    </div>      
<?php
  include_once('inc/footer.php');
?>