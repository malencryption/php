/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function addNewContent() {

    var xmlRequest = new XMLHttpRequest();
    xmlRequest.onreadystatechange =function() {
        if (xmlRequest.readyState ==4 && xmlRequest.status == 200) {
            addThisContent(xmlRequest.responseText);
        }
    };
xmlRequest.open("GET", "ajaxExample.php", true);
xmlRequest.send();
}
    function addThisContent(data) {
        var myDiv = document.getElementById("newContent");
    myDiv.innerHTML += "More text";
    }

