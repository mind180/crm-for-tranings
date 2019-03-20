
var menuItems = document.querySelectorAll(".part-nav_list li");
for(let i=0; i<menuItems.length; i++){
  menuItems[i].addEventListener("click", getTableData);
}

var aItems = document.querySelectorAll("a");
for(let i=0; i<aItems.length; i++){
  aItems[i].addEventListener("click", preventRedirect);
}


function getTableHead( columnNames )
{
  var trHead = document.createElement("tr");
  trHead.classList.add("table__row");
  trHead.classList.add("table__row_head");

  for(let i = 0; i < columnNames.length; i++)
  {
    var td = document.createElement("td");
    td.classList.add("table__cell");
    td.innerText = columnNames[i];

    trHead.appendChild(td);
  }

  var td = document.createElement("td");
  td.classList.add("table__cell");
  td.innerHTML = "<i class=\"fas fas fa-angle-down\"></i>";

  trHead.appendChild(td);

  console.log(trHead);

  return trHead;
}


function getTableBody( dataSet )
{
  var tBody = document.createElement("tBody");
  tBody.classList.add("table__body");

  for(let i = 0; i < dataSet.records.length; i++)
  {
    var tr = document.createElement("tr");
    tr.classList.add("table__row");

    for( let j=0; j < dataSet.column_names.length; j++ )
    {
      var td = document.createElement("td");
      td.classList.add("table__cell");
      td.innerText = dataSet.records[i][dataSet.column_names[j]];
      tr.appendChild(td);
    }

    var td = document.createElement("td");
    td.classList.add("table__cell");
    td.innerText = ">";
    tr.appendChild(td);

    tBody.appendChild(tr);
  }
  console.log(tBody);

  return tBody;
}

function renderTable(dataSet){

    var table = document.getElementsByClassName("table")[0];

    //clear table
    table.innerHTML = "";

    //set head
    var tableHead = getTableHead(dataSet.column_names);
    var tableBody = getTableBody(dataSet);

    table.appendChild(tableHead);
    table.appendChild(tableBody);


}


function preventRedirect(e){
  e.preventDefault();
}



function getTableData(e){

  var addr = e.currentTarget.firstChild;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", addr, true);

  xhr.onreadystatechange = function(e) {
    if (this.readyState != 4) return;

      //alert(this.status + " " + this.statusText);
    console.log( this.responseText );

    try{
      var dataSet = JSON.parse(this.responseText);
    }
    catch(e){
      alert("JSON parse error: " + e);
    }

    renderTable(dataSet);

  }

  xhr.send();

}
