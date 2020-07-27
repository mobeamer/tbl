function Gui()
{

    this.showView = function(viewDivID)
    {
        var i;
        var x = document.getElementsByClassName("view");
        for (i = 0; i < x.length; i++) 
        {
            x[i].style.display = "none"; 
        }
        var d = document.getElementById(viewDivID);
        
        if(d)
        {
            document.getElementById(viewDivID).style.display = "block"; 
        }
        else
        {
            debug("Something went wrong...(view:" + viewDivID + " not found)");
        }        

        debug("showView(" + viewDivID + ")");


    }

    
    this.growl = function(msg, secs)
    {
        var d = document.getElementById("div-pop-msg");
        d.innerHTML = msg;
        d.style.display = "inline-block";
        d.style.visibility = "visible";
        clearTimeout(gui.growlerTimeout);

        if(secs <= 0) secs = 5;

        gui.growlerTimeout = setTimeout("gui.hideGrowl()", secs * 1000);
        console.log("Growl:" + msg);
    }

    
    this.hideGrowl = function()
    {
        document.getElementById("div-pop-msg").style.visibility = "hidden";
        clearTimeout(gui.growlerTimeout);
    }


}