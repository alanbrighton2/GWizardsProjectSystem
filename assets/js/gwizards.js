 /* Alan javascript */
(function ($) {

	// choosen js; changes the input control
	$('#project-assignee').chosen();
	$('#project-cat').chosen();

    //ajax is used to transfer variables between PHP and Javascript and vice versa
	// add project, doesn't refresh the page, instant data
    //validation check using an if statement
    //if there is no input then there will be and alert
	var ajaxSubmit = false;
	$(document).on( 'click', '#project-submit', function(e){
		e.preventDefault();
		var t = $(this);
		var title = $('#project-title').val();
		if ( title == '' ) {
			alert( 'You must input a title.' );
			return;
		}
		var desc = $('#project-desc').val();
		if ( desc == '' ) {
			alert( 'You must input a description.' );
			return;
		}
		var assignee = $('#project-assignee').val();
		if ( !assignee ) {
			alert( 'You must choose an assignee.' );
			return;
		}
		var cat = $('#project-cat').val();
		if ( !cat ) {
			alert( 'You must choose a category.' );
			return;
		}
        // this is a check box for the terms and conditions
		var termConditionCheck = $('#term-condition-check');
		if ( !termConditionCheck.is(':checked') ) {
			alert( 'You have to agree to our terms and conditions.' );
			return;
		}
        //this sends the information to add_project to create a project
		if ( ajaxSubmit == false ) {
			ajaxSubmit = true;
			var data = {
				title: title,
				desc: desc,
				assignee: assignee,
				cat: cat,
			}
        
        //if the project is not succesful it will will just alert the user
        //if the project submission is succesful it will redirect the user to the single project page based on the ID
			$.ajax({
				url: 'modules/add_project.php',
				data: data,
				type: 'POST',
				dataType: 'json',
				success: function(response){
					if ( response.error ) {
						alert('Submit project not successful')
					} else {
						window.location.replace( "http://localhost/GWizardsSystem/project-single.php?id="+response.redirect );
					}
				},
		        complete: function(xhr, textStatus) {
		          	ajaxSubmit = false;
		        }
			});
		}

	} )

	// $(document).on( 'click', '.cat-rdr ', function(e){
	// 	e.preventDefault();
	// 	var t = $(this);
	// 	var cat = t.data( 'cat' );
	// 	var url      = window.location.href;
	// 	var url = new URL(url_string);
	// 	var c = url.searchParams.get("c");


	// 	console.log( url );
	// } )

})(jQuery);