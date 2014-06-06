
/*
*   Handle user request, redirect to index.php if the user is authenticated
*   if not send error messages  
*
*
*/
function validLogin(){
      var uname=$('#uname').val();
      var password=$('#password').val();
      var email=$('#email').val();
      var dataString = 'uname='+ uname + '&password='+ password + '&email='+ email;
      $.ajax({
      type: "POST",
      url: "ajax.php",
      data: dataString,
      cache: false,
      // send the request with password and username
      success: function(result){
               var result=trim(result);
               if(result=='correct'){
                    // If the message is correct start session and redirects to index.php
                     window.location='index.php';
               }else{
                    // if the request is not correct, prints an error message
                     $("#errorMessage").html(result);
               }
      }
      });
}
// replace characters
function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
// Request list of movies using mname 
// and the user id as filter parameter
function movielist(){
  var mname = $('#mname').val();
  var dataString = 'mname='+ mname;
  $.ajax({
    type: "POST",
    url: "movielist.php",
    dataType: "html",
    data: dataString,
    success: function(data){  
         // Update the movie list with the information of the filter 
      $(".movie-list").html(data);                                    
          }
      });
}
// Create a new record in the movie database  
// takes the movie name 'name', year of release 'year'
// and user id from session
function addMovie(){
  var today = new Date();
  var name = $('#name').val();
  var year = $('#year').val();
  // validates de year intro
  if(parseInt(year)>=1900 && parseInt(year)<=parseInt(today.getFullYear()) && (name)){ 
    var dataString = 'name='+ name + '&year='+ year;
    $.ajax({
      type: "POST",
      url: "movieadd.php",
      dataType: "html",
      data: dataString,
      success: function(data){
             // Is input was correct, calls movielist function to refresh the list 
        movielist();                                    
            }
        });
  } else {
    alert('Please use a valid date');
  }
}
