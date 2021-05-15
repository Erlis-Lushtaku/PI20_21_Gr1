function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
      throw "Geolocation is not supported by this browser.";
    }
  }

  function askLocation(){
    try{
      getLocation();
    }
    catch(e){
      window.alert(e);
    }
  }

  function showPosition(position) {
      var x = document.getElementById("perjs");
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
  }
  
  var submit_form = new Array() ;
  function validation(){
      name_validation();
      email_validation();
      company_validaton();
      budget_validation();
      for(var i=0;i < submit_form.length ;i++){
        if (submit_form[i]==false)
            return false;
    }
    return true;
  }
  function name_validation(){
  
      const name_pattern = new RegExp(/^([a-zA-Z]){2,30}$/gi);
      const name = document.getElementById("name").value;
  
      if(name.match(name_pattern)){
          document.getElementById("name").setAttribute("style","border:1px green solid ");
          submit_form[0] = true;}
      else {
          document.getElementById("name").setAttribute("style","border:1px red solid ");
          submit_form[0] = false;
        }
  
  
  }
  function email_validation(){
      const email_pattern = new RegExp(/^[^ ]+@[^ ]+\.[a-z]{2,3}$/gi);
      const email = document.getElementById("email").value;
      if(email.match(email_pattern)){
          document.getElementById("email").setAttribute("style","border:1px green solid ");
          submit_form[1] = true;
        }
      else{
          document.getElementById("email").setAttribute("style","border:1px red solid ");
          submit_form[1] = false;
        }
  }
  function company_validaton(){
      const company_pattern = new RegExp(/^([a-zA-Z ]){2,30}$/gi);
      const company = document.getElementById("company").value;
      if(company.match(company_pattern)){
          document.getElementById("company").setAttribute("style","border:1px green solid ");
          submit_form[2] = true;
        }
      else {
          document.getElementById("company").setAttribute("style","border:1px red solid ");
          submit_form[2] = false;
        }
  }
  function budget_validation(){
      const budget_pattern = new RegExp(/^[1-9]+\.?[0-9]*$/);
      const budget = document.getElementById("budget").value;
      if(budget.match(budget_pattern)){
          document.getElementById("budget").setAttribute("style","border:1px green solid ");
          submit_form[3] = true;
        }
      else{
          document.getElementById("budget").setAttribute("style","border:1px red solid ");
          submit_form[3] = false;
        }
  }
  

  Date.prototype.checkmonth=function(){
switch(this.getMonth()){
case 0:
this.myProp="January";
break;
case 1:
this.myProp="February";
break;
case 2:
this.myProp="March";
break;
case 3:
this.myProp="April";
break;
case 4:
this.myProp="May";
break;
case 5:
this.myProp="June";
break;
case 6:
this.myProp="July";
break;
case 7:
this.myProp="August";
break;
case 8:
this.myProp="September";
break;
case 9:
this.myProp="October";
break;
case 10:
this.myProp="November";
break;
case 11:
this.myProp="December";
break;
default:
  break;
}


  }
function checkm(){
var muaji=new Date();
muaji.checkmonth();
document.getElementById("searchi").innerHTML="Planning on doing investmens on your businesses? You searched the right place on "+muaji.myProp;
}  

  
  
  
