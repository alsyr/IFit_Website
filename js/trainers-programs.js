$(init);

/**
 * Populate the trainer menu via AJAX 
 * and set the change callback.
 */
 function init()
 {
 	$("#trainermenu").selectmenu();
 	$("#trainermenu").on("selectmenuchange", showTrainees);
 	$.get("php/queryDBTrainersList.php", null, loadMenu);

 	$("#exercisemenu").selectmenu();
 	$("#exercisemenu").on("selectmenuchange", showExercises);
 	$.get("php/queryDBMembersList.php", null, loadMenu2);
 }

/**
 * Load the select menu options as returned by AJAX.
 * @param data the options to load
 * @param status the request status
 */
 function loadMenu(data, status)
 {
 	$("#trainermenu").html(data);
 }

/**
 * Load the select menu options as returned by AJAX.
 * @param data the options to load
 * @param status the request status
 */
 function loadMenu2(data, status)
 {
 	$("#exercisemenu").html(data);
 }

/**
 * Generate the student-subject table via AJAX
 * based on the teacher selection.
 * @param event the event that occurred
 * @param ui the jQuery object
 */
 function showTrainees(event, ui)
 {
 	trainerId = $("#trainermenu").val();
 	$.post("php/queryDBTraineesOfList.php", {"id": trainerId}, loadTable);
 }

 /**
 * Generate the student-subject table via AJAX
 * based on the teacher selection.
 * @param event the event that occurred
 * @param ui the jQuery object
 */
 function showExercises(event, ui)
 {
 	memberId = $("#exercisemenu").val();
 	$.post("php/queryDBExercisesOfList.php", {"id": memberId}, loadTable2);
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

 /**
 * Load the trainees table as returned by AJAX.
 * @param data the table to load
 * @param status the request status
 */
 function loadTable2(data, status)
 {
 	$("#output2").html(data);
 }