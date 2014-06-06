<?php
  session_start();
  if(!isset($_SESSION['LOGIN_STATUS'])){
      header('location:login.php');
  }
  include_once('inc/dbConnect.inc.php');
  $title = 'movies';
  include_once('inc/header.php');
?>

    <body onload="movielist()">
    <header>
    	<div class="header">
        	<h1>Welcome home <?php echo $_SESSION['UNAME'];?></h1>
      	</div>
    </header>	
    <div id="wrapper">


<!-- BEGIN SEARCH FILTERS -->	    
	    <div class="search">
		<table >
              <tr>
                 <td colspan="2"><label for="mname">Movie Name/Year: </label><input type="text" name="mname" id="mname"></td>
              </tr>
              <tr id="button_box">
                 <td ><input type="button" name="submit" value="Search" class="button" onclick="movielist()"></td><td></td>
              </tr>
         </table>
	    </div>
	    <?php
	    ?>
<!-- END SEARCH FILTERS -->	    



<!-- BEGIN MOVIE LIST -->
	    <div class="movielist">
	    		<ul class="movie-list">
		    			<li ></li>
				</ul>	
	    </div>
<!-- END MOVIE LIST -->



<!-- BEGIN FORM INSERT MOVIE-->
		<div class="insert">

				<table>
					<tr>
						<th colspan="2">
							Add a movie to the list
						</th>
					</tr>
					<tr>
						<td colspan="2">
							<label for="name">Movie name: </label>
							<input type="text" name="name" id="name">
						</td >	
					</tr>
					<tr>	
						<td colspan="2">
							<label for="year">Release year: </label>
							<select name="year" id="year">
							<?php for ($i=date("Y"); $i >= 1900 ; $i--) {  ?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
							<?php }?>	
						    </select>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="button" name="submit" value="Submit" class="button" onclick="addMovie()">
						</td>
					</tr>
				</table>
<!-- BEGIN LOGOUT SECTION -->
		<div class="logout">
			<a href="logout.php" title="logout" class="big-button"><h1>Logout</h1></a>
		</div>
<!-- END LOGOUT SECTION -->						
		</div>
<!-- END FORM -->
    </div>
<?php
  include_once('inc/footer.php');
?>