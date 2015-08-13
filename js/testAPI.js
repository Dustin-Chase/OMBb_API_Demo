/*
Title: OMDb API Demonstration
Author: Dustin Chase
E-mail: dustin.chase@gmail.com
Description: Demonstrates using AJAX with an API. 

*/


/*Create a new HttpRequestObject
@ param: none
@ return: an HttpRequestObject on success, undefined variable on failure
@ Description: Tries to create an XMLHttp request for modern browsers. If failure, 
@              tries to create an ActiveXObject (IE 5, 6). If neither succeeds, return
@              will be undefined. 
*/
function createHttpRequestObject() {
	var xmlHttp = new XMLHttpRequest || new ActiveXObject("Microsoft.XMLHTTP");
	return xmlHttp;		 
}


/*Create a new AJAX request and search for requested title
@ param: none
@ return: an HttpRequestObject on success, undefined variable on failure
@ Description: Search for film by title 
*/
function search() {
	event.preventDefault();
	var response_text;
	var title = document.getElementById("title").value;
	if (!title)
		document.getElementById("searchResults").innerHTML = "You must enter a title!";
	else {
		var URL = "http://www.omdbapi.com/?s=" + title;
		var httpRequest = createHttpRequestObject(); 
		httpRequest.onreadystatechange = function() {
			if (httpRequest.readyState != 4) {
				return; 
			}
			if (httpRequest.readyState === 4 && httpRequest.status === 200) {
				response_text = JSON.parse(httpRequest.responseText);
				display(response_text);
			} else {
				alert('There was a problem with the request.'); 
			}

		}
		httpRequest.open("GET", URL, true);
		httpRequest.send();
	}
}

function display(text) {	
	console.log(JSON.stringify(text));
	var output = "<ul>"
	var search_results = document.getElementById("searchResults");
	if (text.Search === undefined) {
		output = text.Error;
	} else {
		for (var i in text.Search) {
		output += "<li>" + text.Search[i].Title + " " + text.Search[i].Year + " " + text.Search[i].Type + " " + "</li>";	
		}
		output += "</ul>"
	}
	
	search_results.innerHTML=output; 
}

$(document).ajaxSend(function(event, request, settings) {
  $('#loading-indicator').show();
});

$(document).ajaxComplete(function(event, request, settings) {
  $('#loading-indicator').hide();
});


