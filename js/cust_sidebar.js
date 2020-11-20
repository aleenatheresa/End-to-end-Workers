function userprofile()
{
    document.getElementById("profile").style.display = "inline";
    document.getElementById("booking").style.display = "none";
    document.getElementById("reserve").style.display = "none";
   
}
function cust_book()
{
   
    document.getElementById("profile").style.display = "none";
    document.getElementById("booking").style.display = "inline";
    document.getElementById("reserve").style.display = "none";

}
function reserve()
{
    document.getElementById("profile").style.display = "none";
    document.getElementById("booking").style.display = "none";
    document.getElementById("reserve").style.display = "inline";
}
