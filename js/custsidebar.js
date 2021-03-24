function userprofile()
{
    document.getElementById("ProModal").style.display = "inline";
    document.getElementById("bookdetails").style.display ="none";
    document.getElementById("reserve").style.display ="none";
    document.getElementById("book").style.display ="none";
    document.getElementById("service_rate").style.display = "none";
   
}
function cust_book()
{
    document.getElementById("bookdetails").style.display ="block";
    document.getElementById("profile").style.display = "none";
    document.getElementById("reserve").style.display = "none";
    document.getElementById("book").style.display = "none";
    document.getElementById("service_rate").style.display = "none";

}

function home()
{
    document.getElementById("book").style.display = "inline";
    document.getElementById("profile").style.display = "none";
    document.getElementById("bookdetails").style.display = "none";
    document.getElementById("reserve").style.display = "none";
    document.getElementById("service_rate").style.display = "none";
}
function ratedetails()
{
    document.getElementById("service_rate").style.display = "inline";
    document.getElementById("book").style.display = "none";
    document.getElementById("profile").style.display = "none";
    document.getElementById("bookdetails").style.display = "none";
    document.getElementById("reserve").style.display = "none";
}
function confirmbk()
{
    document.getElementById("msg").style.display = "inline";
}
function close()
{
    document.getElementById("msg").style.display = "none";
}

