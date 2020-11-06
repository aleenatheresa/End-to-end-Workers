function checkEmail(text){
    return (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text))
}
function checkPassword(text){
    return (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/.test(text));
}
function checkPhone(number){
    return (/^(7|8|9)[0-9]{9}$/.test(number));
}
function checkNumber(number){
    return (/^[0-9]{1,}$/.test(number));
}
function checkName(text){
    return (/^[^\s]+( [^\s]+)+$/.test(text));
}
function checkAddress(text){
    return (/[A-Za-z0-9,()]+$/.test(text));
}
function checkUname(text){
    return (/[A-Za-z0-9,()]+$/.test(text));
}
function checkLno(text){
    return (/[A-Za-z0-9,()]+$/.test(text));
}



function custName()
        {
            var hname = document.getElementsByName('name')[0];
            if (checkName(hname.value)){
                document.getElementById("txt1").style.borderColor = "green";
                document.getElementById("consid").innerHTML = "<span class='error'></span>";
                } 
            else
                {
                   document.getElementById("txt1").style.borderColor = "red"; 
                   document.getElementById("consid").innerHTML = "<span class='error'>Name only contain letters or enter full name</span>";
                }
        }

// function valCapacity()
//         {
//             var hc = document.getElementsByName('totalcap')[0];
//             if (checkNumber(hc.value)){
//                 document.getElementById("totalcap").style.borderColor = "green";
//                 } 
//             else
//                 {
//                    document.getElementById("totalcap").style.borderColor = "red"; 
//                    document.getElementById("consid").innerHTML = "<span class='error'>Please enter a valid name</span>";
//                 }
//         }

// function valhstlEmail()
//         {
//             var he = document.getElementsByName('email')[0];
//             if (checkEmail(he.value)){
//                 document.getElementById("txt4").style.borderColor = "green";
//                 } 
//             else
//                 {
//                    document.getElementById("txt4").style.borderColor = "red"; 
//                    document.getElementById("consid").innerHTML = "<span class='error'>Please enter a valid email</span>";
//                 }
//         }
// function valhstlMob()
//     {
//         var hm = document.getElementsByName('hstlmob')[0];
//             if (checkPhone(hm.value)){
//                 document.getElementById("hstlmob").style.borderColor = "green";
//                 } 
//             else
//                 {
//                    document.getElementById("hstlmob").style.borderColor = "red"; 
//                    document.getElementById("consid").innerHTML = "<span class='error'>Please enter a valid mobilenumber</span>";
//                 }
//     }      
function custAddress()
    {
        var ha = document.getElementsByName('address')[0];
            if (checkAddress(ha.value)){
                document.getElementById("txt2").style.borderColor = "green";
                document.getElementById("consid2").innerHTML = "<span class='error'></span>";
                } 
            else
                {
                   document.getElementById("txt2").style.borderColor = "red"; 
                   document.getElementById("consid2").innerHTML = "<span class='error'>Please enter a valid address</span>";
                }
    }      
// function valhstlPin()
//     {
//         var hp = document.getElementsByName('hstlPin')[0];
//             if (checkPin(hp.value)){
//                 document.getElementById("hstlPin").style.borderColor = "green";
//                 document.getElementById("consid").innerHTML = "<span class='error'></span>";
//                 } 
//             else
//                 {
//                    document.getElementById("hstlPin").style.borderColor = "red"; 
                   
//                 }
//     }   
// function valMname()
//     {
//         var mn = document.getElementsByName('Mname')[0];
//             if (checkName(mn.value)){
//                 document.getElementById("Mname").style.borderColor = "green";
//                 document.getElementById("consid").innerHTML = "<span class='error'></span>";
//                 } 
//             else
//                 {
//                    document.getElementById("Mname").style.borderColor = "red"; 
//                 }
//     }   
function custEmail()
    {
        var me = document.getElementsByName('email')[0];
        if (checkEmail(me.value)){
            document.getElementById("txt4").style.borderColor = "green";
            document.getElementById("consid4").innerHTML = "<span class='error'></span>";
            } 
        else
            {
               document.getElementById("txt4").style.borderColor = "red"; 
               document.getElementById("consid4").innerHTML = "<span class='error'>Please enter a valid email</span>";
            }
    }
function custPhone()
{
    var m = document.getElementsByName('phone')[0];
        if (checkPhone(m.value)){
            document.getElementById("txt3").style.borderColor = "green";
            document.getElementById("consid3").innerHTML = "<span class='error'></span>";
            } 
        else
            {
               document.getElementById("txt3").style.borderColor = "red"; 
               document.getElementById("consid3").innerHTML = "<span class='error'>Please enter a valid phone</span>";
            }
}      
// function valMadr()
//     {
//         var ma = document.getElementsByName('MAdr')[0];
//             if (checkAddress(ma.value)){
//                 document.getElementById("MAdr").style.borderColor = "green";
                
//                 } 
//             else
//                 {
//                    document.getElementById("MAdr").style.borderColor = "red"; 
//                 }
//     }      
// function valMpin()
//     {
//         var mp = document.getElementsByName('Mpin')[0];
//             if (checkPin(mp.value)){
//                 document.getElementById("Mpin").style.borderColor = "green";
//                 } 
//             else
//                 {
//                    document.getElementById("Mpin").style.borderColor = "red"; 
//                 }
//     }   

function custuname()
    {
        var u = document.getElementsByName('username')[0];
            if (checkUname(u.value)){
                document.getElementById("txt6").style.borderColor = "green";
                // document.getElementById("consid6").innerHTML = "<span class='error'></span>";
                } 
            else
                {
                   document.getElementById("txt6").style.borderColor = "red"; 
                   document.getElementById("consid6").innerHTML = "<span class='error'>Please enter a valid Username</span>";
                }
    }      


    function pass()
    {
        var p= document.getElementsByName('password')[0];
        if (checkPassword(p.value)){
            document.getElementById("txt7").style.borderColor = "green";
            document.getElementById("consid7").innerHTML = "<span class='error'></span>";
            } 
        else
            {
               document.getElementById("txt7").style.borderColor = "red"; 
               document.getElementById("consid7").innerHTML = "<span class='error'>Password should contain Uppercase,lowercase,numbers</span>";
            }
  
    }
    function mycpassword()
        {
          var n7=document.getElementById("txt7");
          var n8=document.getElementById("txt8");
          if(n8.value == "")
          {
            document.getElementById("txt8").style.borderColor = "red";
            document.getElementById("consid8").innerHTML = "<span class='error'>Please enter a valid password</span>";
            txt8.focus();
            return false;
        }
        if(n7.value==n8.value)
        {

            document.getElementById("txt8").style.borderColor = "green";
          document.getElementById("consid8").innerHTML = "<span class='error'>Matching</span>";
          return false;
        }
        else {
            document.getElementById("txt8").style.borderColor = "red";
          document.getElementById("consid8").innerHTML = "<span class='error'> Password Missmatch</span>";
          txt8.focus();
          return false;
        }
  }
  function mylicense()
  {
    var lno= document.getElementsByName('licensceno')[0];
    if (checkLno(lno.value)){
        document.getElementById("txt9").style.borderColor = "green";
        document.getElementById("consid9").innerHTML = "<span class='error'></span>";
        } 
    else
        {
           document.getElementById("txt9").style.borderColor = "red"; 
           document.getElementById("cconsid9").innerHTML = "<span class='error'>Lisence num should contain Letters and numbers</span>";
        }


  }
  