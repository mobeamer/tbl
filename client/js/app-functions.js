

function loadCompanyList()
{
    console.log("loadCompanyList()");
  
   var url = rootUrl + "/api/company-search.php";
   var data = {};
   
    $.ajax({
        type:'POST',
        url:url,
        data:data,
        success: function(dataPacket) {

            if(dataPacket.error.errorID > 0)
            {
                debug(dataPacket.error.errorMsg);
            }
            else
            {
                var html = "";
                var bizList = dataPacket.data.biz;
                for(var i=0;i<bizList.length;i++)
                {
                  html+="<a href='" + bizList[i].bizUrl + "'>" + bizList[i].bizName + "</a> - " + bizList[i].bizDesc + "<hr>";
                }

                document.getElementById("div-biz-list").innerHTML = html;

            }

        }
        ,error: function(xhr, textStatus, errorThrown){
            console.log("Ajax Error: " + errorThrown);
        }
        });
}
function addCompany()
{
  
  console.log("addCompany()");
  
   var url = rootUrl + "/api/company-save.php";
   var self = this;
   
   var data = {action:"new",
              companyName: document.getElementById("companyName").value
              ,companyDesc:document.getElementById("companyDesc").value
              ,companyUrl:document.getElementById("companyUrl").value
            };

    $.ajax({
        type:'POST',
        url:url,
        data:data,
        success: function(dataPacket) {

            if(dataPacket.error.errorID > 0)
            {
                document.getElementById("add-company-msg").innerHTML = dataPacket.error.errorMsg;
                debug(dataPacket.error.errorMsg);
            }
            else
            {
                debug("Company added");
                gui.growl("Company Added", 5);
            }

        }
        ,error: function(xhr, textStatus, errorThrown){
            console.log("Ajax Error: " + errorThrown);
        }
        });


        
}


function setNotification(msg)
{
  document.getElementById("div-general-notification").innerHTML = msg;
}