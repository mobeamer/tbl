function logUserIn()
{
  
  console.log("logUserIn()");
  
   var url = rootUrl + "/api/login.php";
   var self = this;
   var username = document.getElementById("login_username").value;
   var password = document.getElementById("login_password").value;
   
   var body = {action:"login",username:username, password:password}

    $.ajax({
        type:'POST',
        url:url,
        data:body,
        success: function(dataPacket) {

            if(dataPacket.error.errorID > 0)
            {
                document.getElementById("login-msg").innerHTML = dataPacket.error.errorMsg;
            }
            else
            {
                window.location.href = "dashboard.html";
            }

        }
        ,error: function(xhr, textStatus, errorThrown){
            console.log("Ajax Error: " + errorThrown);
        }
        });

}

function registerUser()
{
  
  console.log("registerUser()");
  
   var url = rootUrl + "/api/register.php";
   var self = this;
   var username = document.getElementById("reg_username").value;
   var password = document.getElementById("reg_password").value;
   var confirmPassword = document.getElementById("reg_confirm_password").value;
   var email = document.getElementById("reg_email").value;

   var body = {action:"register",username:username, password:password, confirmPassword:confirmPassword, email:email}

    $.ajax({
        type:'POST',
        url:url,
        data:body,
        success: function(dataPacket) {

            //alert(dataPacket);

            if(dataPacket.error.errorID > 0)
            {
                document.getElementById("reg-msg").innerHTML = dataPacket.error.errorMsg;
            }
            else
            {
                window.location.href = "dashboard.html";
            }

        }
        ,error: function(xhr, textStatus, errorThrown){
            console.log("Ajax Error: " + errorThrown);
        }
        });

}