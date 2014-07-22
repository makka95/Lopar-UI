var cur_date = new Date();

function set_calendar(tid) {
	if (tid != "null") {
		cur_date = tid;
	}
	var first_date = new Date(cur_date.getFullYear(), cur_date.getMonth(), 1);
	var day_week = first_date.getDay();
	if (day_week == 0) {
		day_week = 7;
	}
	$("table.sok_table").html('<tr><td id="dag">M</td><td id="dag">T</td><td id="dag">O</td><td id="dag">T</td><td id="dag">F</td><td id="dag">L</td><td id="dag">S</td></tr>');
	
	var table = document.getElementsByClassName("sok_table")[0];
	var days_month = getDaysOfMonth(first_date.getMonth());
	var days_past_month = getDaysOfMonth(first_date.getMonth() - 1, first_date.getFullYear());
	var month = first_date.getMonth() + 1;
	var year = first_date.getFullYear();
	var days = 0;
	var line = 0;
	var line_count = 1;
	var past_month = month-1;
	var last_year = year;
	if (past_month == 0) {
		past_month = 12;
		last_year -= 1;
		days_past_month = getDaysOfMonth(first_date.getMonth() - 1, last_year);
	}

	var tbody = document.createElement("tbody");
	var tr = document.createElement("tr");
	tr.setAttribute("id", line_count);
	
	$("p.date").html(get_month(month-1) + ' ' + year);
	
	for (var i = 0; i<day_week-1; i++) {
		var day = days_past_month - day_week + i+2;
		var td = document.createElement("td");
		var text = document.createTextNode(day);
		td.setAttribute("id", last_year + "-" + past_month + "-" + day);
		td.setAttribute("class", "last " + "sok");
		td.appendChild(text);
		tr.appendChild(td);
		days += 1;
		line += 1;
	}
	for (var d = 1; d <= days_month; d++) {
		var td = document.createElement("td");
		var text = document.createTextNode(d);
		td.setAttribute("id", year + "-" + month + "-" + d);
		td.setAttribute("class", "sok");
		td.appendChild(text);
		tr.appendChild(td);

		days += 1;
		if (line >= 6) {
			line = 0;
			if (line_count <= 5) {
				line_count += 1;
				table.appendChild(tr);
				tr = document.createElement("tr");
				tr.setAttribute("id", line_count);
			}
		} else {
			line += 1;
		}
	}
	month = month + 1;
	if (month >= 13) {
		month = 1;
		year += 1;
	}
	for (var n = 1; days <= 41; n++) {
		var td = document.createElement("td");
		var text = document.createTextNode(n);
		td.setAttribute("id", year + "-" + month + "-" + n);
		td.appendChild(text);
		td.setAttribute("class", "last " + "sok");
		tr.appendChild(td);
		days += 1;
		if (line >= 6) {
			line = 0;
			if (line_count <= 6) {
				line_count += 1;
				table.appendChild(tr);
				tr = document.createElement("tr");
				tr.setAttribute("id", line_count);
			}
		} else {
			line += 1;
		}
	}
	
	$("button.sok_calendar#left").off('click').on("click", function () {
		var nytt_datum = new Date(last_year, past_month-1, 1);
		set_calendar(nytt_datum);
	});
	$("button.sok_calendar#right").off('click').on("click", function () {
		var nytt_datum = new Date(year, month-1, 1);
		set_calendar(nytt_datum);
	});

}

function getDaysOfMonth(m,y) {
	var days;
	switch (m) {
		case 1:
			if (y == 2008 || y == 2012 || y == 2016 || y == 2020 || y == 2024) {
				days = 29;
			} else {
				days = 28;
			}
			break;
		case 3:
			days = 30;
			break;
		case 5:
			days = 30;
			break;
		case 8:
			days = 30;
			break;
		case 10:
			days = 30;
			break;
		default: 
			days = 31;
	}
	return days;
}

function get_month(m) {
	var month = null;
	switch(m) {
	case 0:
		month = "Januari";
		break;
	case 1:
		month = "Februari";
		break;
	case 2:
		month = "Mars";
		break;
	case 3:
		month = "April";
		break;
	case 4:
		month = "Maj";
		break;
	case 5:
		month = "Juni";
		break;
	case 6:
		month = "Juli";
		break;
	case 7:
		month = "Augusti";
		break;
	case 8:
		month = "September";
		break;
	case 9:
		month = "Oktober";
		break;
	case 10:
		month = "November";
		break;
	case 11:
		month = "December";
		break;
	}
	return month;
}

function setup_small_calendar() {
	set_calendar("null");
	
	$(".small_calendar").each(function() {
		var text = $(this);
		
		$(text).focus(function() {
			$("div.sok_calendar").show();
			$("div.sok_calendar").css("left", $(text).position().left);
			$("div.sok_calendar").css("top", $(text).position().top + 130);
			
			$("td.sok").off('click').on("click", function () {
				text.val($(this).attr("id"));
				$("div.sok_calendar").hide();
			});
		});
		$(text).focusout(function () {
			$(document).on("mouseup", function (e){
				if((!$("div.sok_calendar").is(e.target) && $("div.sok_calendar").has(e.target).length === 0) && (!$(".small_calendar").is(e.target) && $(text).has(".small_calendar").length === 0)) {
					$("div.sok_calendar").hide();
				}
			}); 
		});
	});
	
}
