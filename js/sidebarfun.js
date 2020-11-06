function adminhome()
{
    document.getElementById("new-district").style.display = "none";
    document.getElementById("new-location").style.display = "none";
    document.getElementById("ascm").style.display = "none";
    document.getElementById("sp_table").style.display = "inline";
}
function admindist()
{
    // document.getElementById("alc").style.display = "inline";
    document.getElementById("new-district").style.display = "inline";
    document.getElementById("ascm").style.display = "none";
    document.getElementById("new-location").style.display = "none";
    document.getElementById("sp_table").style.display = "none";
}
function adminloc()
{
    // document.getElementById("alc").style.display = "inline";
    document.getElementById("new-location").style.display = "inline";
    document.getElementById("ascm").style.display = "none";
    document.getElementById("new-district").style.display = "none";
    document.getElementById("sp_table").style.display = "none";
    
}
function adminscmanagment()
{
    document.getElementById("ascm").style.display = "inline";
    // document.getElementById("alc").style.display = "none";
    document.getElementById("sp_table").style.display = "none";
    document.getElementById("new-district").style.display = "none";
    document.getElementById("new-location").style.display = "none";
   
}