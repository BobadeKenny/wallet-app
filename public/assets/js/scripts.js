function toggle(name){
    if (document.getElementById(name).style.display == 'none'){
        document.getElementById(name).style.display = 'block'
    } else {
        document.getElementById(name).style.display = 'none'
    }
}


function search_username(str) {
  if (str.length==0) {
    document.getElementById("results").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("results").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/searchusername?q="+str,true);
  xmlhttp.send();
}


function search_email(str) {
  if (str.length==0) {
    document.getElementById("results_email").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("results_email").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/searchemail?q="+str,true);
  xmlhttp.send();
}

function search_users(str) {
  if (str.length==0) {
    document.getElementById("users").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      // document.getElementById("users").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","/searchuser?q="+str,true);
  xmlhttp.send();
}