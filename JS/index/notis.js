var xmlhttp = createxmlhttprequestobject();
var active = null;
var store_msg = new Array();
var ready = true;

function fade_login() {

	$("div.loggain").fadeOut(400);
	$("div.login_fog").fadeOut(400);
}

function createxmlhttprequestobject() {
	var xml;

	if(window.ActiveXObject){

		try {
			xml = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e) {
			xml = false;
			alert(e.message);
		}

	}else {
		try{
			xml = new XMLHttpRequest();
		}catch(e) {
			xml = false;
			alert(e.message);
		}
	}

	if (!xml)
		alert("Error: 0, error creating the xml object");
	else
		return xml;
}

function set_meddelande(msg) {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			var id = $("div.user.active").attr('id');
			xmlhttp.open("GET", "set_meddelande.php?mot=" + id + "&avs="+$.cookie("login") + "&msg=" + msg, true);
			xmlhttp.onreadystatechange = handleresponse_set_meddelanden;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
		}
	} else {
		setTimeout('get_meddelanden()', 1000);
	}
}

function handleresponse_set_meddelanden () {
	get_meddelanden(null);
	$("textarea.msg").empty();
}

function get_meddelanden(clicked) {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			if (clicked == null) {
				id = $(active).attr("id");
			} else {
				id = $(clicked).attr("id");
			}
			xmlhttp.open("GET", "get_meddelanden.php?id_1="+id+"&id_2="+$.cookie("login"), true);
			xmlhttp.onreadystatechange = handleresponse_meddelanden;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
		}
	} else {
		setTimeout('get_meddelanden()', 1000);
	}
}

function get_friends() {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			var id = $.cookie("login");
			xmlhttp.open("GET", "get_friends.php?id="+id, true);
			xmlhttp.onreadystatechange = handleresponse_friends;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
			alert(e.message);
		}
	} else {
		settimeout('get_meddelanden()', 1000);
	}
}

function get_friend_request() {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			var id = $.cookie("login");
			xmlhttp.open("GET", "get_friend_request.php?id="+id, true);
			xmlhttp.onreadystatechange = handleresponse_friend_request;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
			alert(e.message);
		}
	} else {
		setTimeout('get_friend_request()', 1000);
	}
}

function handleresponse_friend_request() {

	if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			var xmlresponse = xmlhttp.responseXML;
			var xmlroot = xmlresponse.documentElement;
			$("div.meddelanden_display").empty();
			$(xmlroot).find("Request").each(function () {
				var new_div = document.createElement("div");
				new_div.setAttribute("class", "friendreq");
				var status = $(this).find("Status").text();
				var sender = $(this).find("Avsandare").text();
				var mot = $(this).find("Mottagare").text();
				var mot_id = $(this).find("Mottagare_ID").text();
				var avs_id = $(this).find("Avsandare_ID").text();

				if (status == 1) {
					$(new_div).html(sender + " -> " + mot);
					new_div.setAttribute("id", "active");
					var button_accept = document.createElement("button");
					var button_decline = document.createElement("button");
					$(button_accept).html("Acceptera");
					$(button_decline).html("Avböj");
					button_accept.setAttribute("class", "acc_req");
					button_decline.setAttribute("class", "dec_req");
					$(new_div).append(button_accept);
					$(new_div).append(button_decline);
					$(button_accept).click(function () {
						accept_friend(avs_id, mot_id);
					});
					$(button_decline).click(function () {
						decline_friend(avs_id, mot_id);
					});
					$("div.meddelanden_display").append(new_div);
				} else if (status == 2) {
					$(new_div).html(sender + " -> " + mot);
					new_div.setAttribute("id", "responded");
					$("div.meddelanden_display").append(new_div);
				}

			});
		}
	}
}

function get_notis (val) {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			if (val == null) {
				val = "alla";
			}
			var id = $.cookie("login");
			xmlhttp.open("GET", "get_notis.php?id=" + id + "&val=" + val, true);
			xmlhttp.onreadystatechange = handleresponse_notis;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
			alert(e.message);
		}
	} else {
		setTimeout('get_notis()', 1000);
	}
}

function handleresponse_friends() {
	if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			var xmlresponse = xmlhttp.responseXML;
			var xmlroot = xmlresponse.documentElement;
			$("div.lista_display").empty();
			var bool = true;
			$(xmlroot).find("User").each(function () {
				var new_div = document.createElement("div");
				if (bool) {
					new_div.setAttribute("class","user active");
					active = new_div;
					bool = false;
				} else {
					new_div.setAttribute("class","user");
				}
				var fri = $(this).find("Nickname").text();
				var id = $(this).find("ID").text();
				new_div.setAttribute("id", id);
				$(new_div).html(fri);
				$("div.lista_display").append(new_div);
			});

			$("div.user").click(function () {
				store_msg[$(active).attr("id")] = $("textarea.msg").val();
				if (store_msg[$(this).attr("id")] != null) {
					 $("textarea.msg").val(store_msg[$(this).attr("id")]);
				} else {
					$("textarea.msg").val("Skriv ett meddelande");
				}
				get_meddelanden(this);
				if(!$(this).hasClass('active')) {
					$("div.user").removeClass("user active").addClass("user");
					$(this).removeClass("user").addClass("user active");
				}
				active = $(this);
			});
		}
	}
}

function accept_friend (avs, mot) {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			xmlhttp.open("GET", "set_friend_request.php?val=add&avs="+avs+"&mot="+mot, true);
			xmlhttp.onreadystatechange = handleresponse_friend_request_answered;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
			alert(e.message);
		}
	} else {
		setTimeout('accept_friend()', 1000);
	}
}

function decline_friend (avs, mot) {
	if (xmlhttp.readyState == 0 || xmlhttp.readyState == 4) {
		try {
			xmlhttp.open("GET", "set_friend_request.php?val=dec&avs="+avs+"&mot="+mot, true);
			xmlhttp.onreadystatechange = handleresponse_friend_request_answered;
			xmlhttp.send(null);
		} catch(e) {
			alert("Error: 1, error sending request");
			alert(e.message);
		}
	} else {
		setTimeout('decline_friend()', 1000);
	}
}

function handleresponse_friend_request_answered () {
	get_friend_request();
}

function handleresponse_meddelanden() {
	if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			var xmlresponse = xmlhttp.responseXML;
			var xmlroot = xmlresponse.documentElement;
			$("div.meddelanden_display").empty();
			meddelanden = xmlresponse.getElementsByTagName("Meddelande");
			for(var i=0; i<meddelanden.length; i++) {
				var new_div = document.createElement("div");
				new_div.setAttribute("class","meddelande");
				var avs = meddelanden[i].getElementsByTagName("Avsandare")[0].childNodes[0].nodeValue;
				var tid = meddelanden[i].getElementsByTagName("Datum")[0].childNodes[0].nodeValue
				var text = meddelanden[i].getElementsByTagName("Text")[0].childNodes[0].nodeValue
				$(new_div).html('<span class="meddelande_info">' + tid + ' (' + avs + '): </span>' + text);
				$("div.meddelanden_display").append(new_div);
			}
		}
	}
}

function handleresponse_notis () {
	if (xmlhttp.readyState == 4) {
		if (xmlhttp.status == 200) {
			var xmlresponse = xmlhttp.responseXML;
			var xmlroot = xmlresponse.documentElement;
			$("div.meddelanden_display").empty();
			notis = xmlresponse.getElementsByTagName("Notis");
			for(var i=0; i<notis.length; i++) {
				var new_div = document.createElement("div");
				new_div.setAttribute("class","notis");
				var status = notis[i].getElementsByTagName("Status")[0].childNodes[0].nodeValue;
				var tid = notis[i].getElementsByTagName("Datum")[0].childNodes[0].nodeValue
				var text = notis[i].getElementsByTagName("Text")[0].childNodes[0].nodeValue
				$(new_div).html('<span class="meddelande_info">' + tid + ' (' + status + '): </span>' + text);
				$("div.meddelanden_display").append(new_div);
			}
		}
	}
}

function send_msg() {
	var msg = $('[name=msg]').val();

	set_meddelande(msg);
}

function notis_lista () {

	var alla = document.createElement("div");
	alla.setAttribute("class","notis_lista active");
	alla.setAttribute("id","alla");
	$(alla).html("Alla");
	$("div.lista_display").append(alla);

	var evt = document.createElement("div");
	evt.setAttribute("class","notis_lista");
	evt.setAttribute("id","evt");
	$(evt).html("Evenemang");
	$("div.lista_display").append(evt);

	var forum = document.createElement("div");
	forum.setAttribute("class","notis_lista");
	forum.setAttribute("id","forum");
	$(forum).html("Forum");
	$("div.lista_display").append(forum);

	var blogg = document.createElement("div");
	blogg.setAttribute("class","notis_lista");
	blogg.setAttribute("id","blogg");
	$(blogg).html("Blogg");
	$("div.lista_display").append(blogg);

	var friend = document.createElement("div");
	friend.setAttribute("class","notis_lista");
	friend.setAttribute("id","friend");
	$(friend).html("Vänförfrågningar");
	$("div.lista_display").append(friend);

	$("div.notis_lista").click(function () {
		if(!$(this).hasClass('active')) {
			$("div.notis_lista").removeClass("notis_lista active").addClass("notis_lista");
			$(this).removeClass("notis_lista").addClass("notis_lista active");
			get_notis($(this).attr("id"));
		}
	});
	$(friend).off('click').on('click', function () {
		if(!$(this).hasClass('active')) {
			$("div.notis_lista").removeClass("notis_lista active").addClass("notis_lista");
			$(this).removeClass("notis_lista").addClass("notis_lista active");

			get_friend_request();
		}

	});
}

$(document).ready(function () {

	$("div.button").click(function () {
	// 'toggle'
		
		if ($("div.notis_center").css("left") == "0px") {

			$("div.notis_center").animate({
				left: "-31%"
			}, 500);
			$("div.button").animate({
					right: "-8.75%"
			}, 200);
		} else {
			get_friends();
			get_meddelanden(null);
			$("div.notis_center").animate({
				left: "0"
			}, 500);
			$("div.button").animate({
					right: "-6.75%"
			}, 200);
		}

	});
	
	$("button.notis").click(function () {
		if(!$(this).hasClass('active')) {
			$("button.notis").removeClass("notis active").addClass("notis");
			$(this).removeClass("notis").addClass("notis active");

			if ($(this).attr("id") == "notis") {
				$("div.skriv").hide();
				$("div.meddelanden_display").empty();
				$("div.meddelanden").animate({
					height: "98%"
				}, 200);
				$("div.lista_display").empty();
				$("div.lista").animate({
					height: "98%"
				}, 200);
				notis_lista();
			} else {
				$("div.meddelanden_display").empty();
				$("div.meddelanden").animate({
					height: "80%"
				}, 200);
				$("div.lista_display").empty();
				$("div.lista").animate({
					height: "80%"
				}, 200, function () {
					$("div.skriv").show();
				});
				
				get_friends();
				get_meddelanden(null);
			}
		}

	});

	var div = document.createElement("div");

	$("body").append(div);
	$(div).addClass("login_fog");
	$("button.inlogg").click(function (){

		if ($(div).css("display") === "none" && ready == true) {
			ready = false;

			$(div).fadeIn(400, function () {
				ready = true;
			});
			$("div.loggain").fadeIn(400);
		}
		else if (ready == true){
			$(div).fadeOut(400);
			$("div.loggain").fadeOut(400);
		}

	});

	$("textarea.msg").click(function () {
		if ($("textarea.msg").val() == "Skriv ett meddelande") {
			$("textarea.msg").val("");
		}
	});

	$("button.inlogg").click(function (){

		if ($("div.loggain").css("display") == "none" && ready == true) {
			ready = false;
			alert("ok");
			$("div.loggain").slideDown(400, function () {
				ready = true;
			});
		}
		else if (ready == true){
			$("div.loggain").slideUp(400);
		}

	});


});