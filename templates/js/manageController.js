
var menuItems = document.querySelectorAll(".part-nav_list li");
for(let i=0; i<menuItems.length; i++){
  menuItems[i].addEventListener("click", getTableData);
}

var aItems = document.querySelectorAll("a");
for(let i=0; i<aItems.length; i++){
  aItems[i].addEventListener("click", preventRedirect);
}


function renderTable(){



}


function preventRedirect(e){
  e.preventDefault();
}



function getTableData(e){

  var addr = e.currentTarget.firstChild;

  alert(addr);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", addr, true);

  xhr.onreadystatechange = function(e) {
    if (this.readyState != 4) return;

      alert(this.status + " " + this.statusText);

      console.log( this.responseText );
    /*
    try{
      var image = JSON.parse(this.responseText);
    }
    catch(e){
      alert("JSON parse error" + e);
    }
    showImage(image);
    */

  }

  xhr.send();

}
