


var lis = document.getElementsByTagName("li");
for(let i = 0; i < lis.length; i++)
  lis[i].onclick = imgRequest;



function imgRequest(e){

  var boundary = String(Math.random()).slice(2);
  var boundaryMiddle = '--' + boundary + '\r\n';
  var boundaryLast = '--' + boundary + '--\r\n';

  var body = boundaryMiddle;
  body += 'Content-Disposition: form-data; name="' + "name" + '"\r\n\r\n' + e.currentTarget.innerHTML + '\r\n';
  body += boundaryLast;

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/test", true );
  xhr.setRequestHeader('Content-Type', 'multipart/form-data; boundary=' + boundary);

  xhr.onreadystatechange = function(e) {
    if (this.readyState != 4) return;

    try{
      var image = JSON.parse(this.responseText);

    }
    catch(e){
      alert("JSON parse error" + e);
    }

    showImage(image);
  }

  xhr.send(body);
}

function showImage(imgObject ){
  var imageBoard = document.getElementById("imageBoard");
  imageBoard.src = "data:image;base64," + imgObject.image;

}
