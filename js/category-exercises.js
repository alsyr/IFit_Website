$(init);

/**
 * Populate the trainer menu via AJAX 
 * and set the change callback.
 */
 function init()
 {
 	$("#categorymenu").selectmenu();
 	$("#categorymenu").on("selectmenuchange", showExercises);
 	$.get("php/queryDBTypeOfList.php", null, loadMenu);
 }


/**
 * Load the select menu options as returned by AJAX.
 * @param data the options to load
 * @param status the request status
 */
 function loadMenu(data, status)
 {
 	$("#categorymenu").html(data);
 }


 /**
 * Generate the student-subject table via AJAX
 * based on the teacher selection.
 * @param event the event that occurred
 * @param ui the jQuery object
 */
 function showExercises(event, ui)
 {
 	category = $("#categorymenu").val();
 	$.post("php/queryDBExercisesList.php", {"category": category}, loadTable);
 }

 /**
 * Load the trainees table as returned by AJAX.
 * @param data the table to load
 * @param status the request status
 */
 function loadTable(data, status)
 {
 	$("#output").html(data);
 }