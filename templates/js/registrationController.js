



// create another way to show error msg!!!!!!!


function validate(e){

  var form = document.forms["regForm"];

  var isErrors = false;

  if( form.first_name.value == '' ){
    showError(form.first_name, "Enter your first name");
    isErrors = true;
  }

  if( form.last_name.value == '' ){
    showError(form.last_name, "Enter your last name");
    isErrors = true;
  }

  if( form.job_title.value == '' ){
    showError(form.job_title, "Enter your title");
    isErrors = true;
  }

  if( form.email.value == '' ){
    showError(form.email, "Enter a valid email address");
    isErrors = true;
  }

  if( form.phone.value == '' ){
    showError(form.phone, "Enter a valid phone number");
    isErrors = true;
  }

  if( form.company.value == '' ){
    showError(form.company, "Enter your company name");
    isErrors = true;
  }

  if( form.login.value == '' ){
    showError(form.company, "Enter your company name");
    isErrors = true;
  }
  //not submit
  if(isErrors){
      e.preventDefault();
  }

}

function resetError(container) {
     if (container.parentNode.lastChild.className == "error-msg") {
       container.parentNode.removeChild(container.parentNode.lastChild);
     }
}

function resetAllErrors(){
  var elements = document.forms["regForm"].elements;
  for (var i = 0, element; element = elements[i++];) {
      if (element.type === "text"  || element.type === "tel" || element.type === "email" )
          resetError(element)
  }
}


function showError(container, errorMessage) {
      //p for containing msg
      var errorMsgElem = document.createElement('p');
      errorMsgElem.className = "error-msg";

      //carret elem
      var carretDown = document.createElement('i');
      carretDown.className = "fas fa-caret-down";

      //appen carret and message
      errorMsgElem.innerHTML = errorMessage;
      errorMsgElem.appendChild( carretDown );

      container.parentNode.appendChild( errorMsgElem );
}


function checkLoginPassword(e) {
  var form = document.forms["regForm"];

  var isErrors = false;

  if( form.login.value == '' ){
    showError(form.login, "Enter login");
    isErrors = true;
  }


  if( form.password.value.length <= 7  ){
    showError(form.password, "Password must be more than 8 characters");
    isErrors = true;
  }

  if(form.password.value != form.password2.value ){
    showError(form.password2, "Passwords not match");
    isErrors = true;
  }

  //not show next step
  if(isErrors){
      return false;
  }
  else{
    document.getElementById("step1").className = "hidden";
    document.getElementById("step2").className = "";

    return true;
  }

}

function showStep1(e){
  document.getElementById("step1").className = "";
  document.getElementById("step2").className = "hidden";
}

// ------------------------------- EVENTS --------------------------------------

var elements = document.forms["regForm"].elements;
for (var i = 0, element; element = elements[i++];) {
    if (element.type === "text"  || element.type === "tel" || element.type === "email" )
        element.onclick = resetAllErrors;
}

var nextBtn = document.getElementById("next_btn");
nextBtn.onclick = checkLoginPassword;


document.getElementById("back_carret").onclick = showStep1;


var regBtn = document.getElementById("do_reg");
regBtn.onclick = validate;


// ---------------------------------------------------------------------- EVENTS
