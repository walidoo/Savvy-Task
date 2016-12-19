$(document).ready(function() {

	//Add "active" class for <li> has the current url
	var activeurl = window.location;
	$('a[href="'+activeurl+'"]').parent('li').addClass('active');


//===================================== [Category] ======================================

	//Add New Category
	$("button.add_category").on('click', function() {
		var category_name = $("input#new_category_name").val();
		var ar_category_name = $("input#new_ar_category_name").val();
		$.ajax({
			type: 'get',
		    url: './add_category',
		    datatype: 'JSON',
		    data:{
		        cat_name : category_name,
		        ar_cat_name : ar_category_name
		    },
		    success : function(data) {
		    	$("p.alert_msg").text('New Category Added Successfully... Please wait!');
		    	setTimeout(function(){
										window.location.reload(true);
									  }, 2000);
		    	console.log(data.added);
		    }

		//End-of-ajax   
		});

	});

	//Add New Arabic Category
	$("button.ar_add_category").on('click', function() {
		var category_name = $("input#new_category_name").val();
		var ar_category_name = $("input#new_ar_category_name").val();
		$.ajax({
			type: 'get',
		    url: './ar_add_category',
		    datatype: 'JSON',
		    data:{
		        cat_name : category_name,
		        ar_cat_name : ar_category_name
		    },
		    success : function(data) {
		    	$("p.alert_msg").text('تم إضافة التصنيف بنجاح...يرجي الأنتظار!');
		    	setTimeout(function(){
										window.location.reload(true);
									  }, 2000);
		    	console.log(data.added);
		    }

		//End-of-ajax   
		});

	});


	//Edit Category
	$("button.edit_category").on('click', function() {
		var new_category_id = $(this).attr('cat-id');
		var new_category_name = $("input#edit_the_category_"+new_category_id).val();
		var new_ar_category_name = $("input#edit_ar_the_category_"+new_category_id).val();
		$.ajax({
			type: 'get',
		    url: './edit_category',
		    datatype: 'JSON',
		    data:{
		        new_cat_name : new_category_name,
		        new_ar_cat_name : new_ar_category_name,
		        new_cat_id : new_category_id
		    },
		    success : function(data) {
		    	$("p.alert_msg").text('Category Edit Successfully... Please wait!');
		    	setTimeout(function(){
										window.location.reload(true);
									  }, 2000);
		    	console.log(data.editit);
		    }

		//End-of-ajax   
		});

	});

	//Edit Arabic Category
	$("button.ar_edit_category").on('click', function() {
		var new_category_id = $(this).attr('cat-id');
		var new_category_name = $("input#edit_the_category_"+new_category_id).val();
		var new_ar_category_name = $("input#edit_ar_the_category_"+new_category_id).val();
		$.ajax({
			type: 'get',
		    url: './ar_edit_category',
		    datatype: 'JSON',
		    data:{
		        new_cat_name : new_category_name,
		        new_ar_cat_name : new_ar_category_name,
		        new_cat_id : new_category_id
		    },
		    success : function(data) {
		    	$("p.alert_msg").text('تم تعديل بيانات التصنيف بنجاح... يرجى الأنتظار!');
		    	setTimeout(function(){
										window.location.reload(true);
									  }, 2000);
		    	console.log(data.editit);
		    }

		//End-of-ajax   
		});

	});


	//Delete Category
	$("a.rm_category").on('click', function() {
		var check = confirm("Do you want to delete this category?");
		if( check == true ) {
			var the_category_id = $(this).attr('category-id');
			$.ajax({
				type: 'delete',
			    url: './delete_category',
			    datatype: 'JSON',
			    data:{
			        the_cat_id : the_category_id
			    },
			    success : function(data) {
			    	$("body").animate({'scrollTop':'0'},"fast");
			    	$("p.the_alert").text('Category deleted successfully... Please wait!');
			    	setTimeout(function(){
											window.location.reload(true);
										  }, 2000);
			    	console.log(data.deleted);
			    }

			//End-of-ajax   
			});
		}

	});

	//Delete Arabic Category
	$("a.ar_rm_category").on('click', function() {
		var check = confirm("هل تريد حذف هذا التصنيف؟");
		if( check == true ) {
			var the_category_id = $(this).attr('category-id');
			$.ajax({
				type: 'delete',
			    url: './ar_delete_category',
			    datatype: 'JSON',
			    data:{
			        the_cat_id : the_category_id
			    },
			    success : function(data) {
			    	$("body").animate({'scrollTop':'0'},"fast");
			    	$("p.the_alert").text('تم حذف التصنيف بنجاح....من فضلك أنتظر!');
			    	setTimeout(function(){
											window.location.reload(true);
										  }, 2000);
			    	console.log(data.deleted);
			    }

			//End-of-ajax   
			});
		}

	});


//===================================== [Users] ======================================

	//Edit user
	$("button.edit_user").on('click', function() {
		var edit_ID = $(this).attr('user-id');
		var edit_firstName = $("input.the_first_name_"+edit_ID).val();
		var edit_lastName = $("input.the_last_name_"+edit_ID).val();
		var edit_email = $("input.the_email_"+edit_ID).val();
		var edit_pass = $("input.the_password_"+edit_ID).val();
		$.ajax({
			type: 'get',
		    url: './edit_user',
		    datatype: 'JSON',
		    data:{
		        the_ID : edit_ID,
		        the_fname : edit_firstName,
		        the_lname : edit_lastName,
		        the_email : edit_email,
		        the_pass : edit_pass
		    },
		    success : function(data) {
		    	$("p.alert_msg").text('User Edit Successfully... Please wait!');
		    	setTimeout(function(){
										window.location.reload(true);
									  }, 2000);
		    	console.log(data.userEditit);
		    }

		//End-of-ajax   
		});

	});


	//Delete user
	$("button.delete_user").on('click', function() {
		var check = confirm("Do you want to delete this user?");
		if( check == true ) {
			var the_user_id = $(this).attr('user-id');
			$.ajax({
				type: 'delete',
			    url: './delete_user',
			    datatype: 'JSON',
			    data:{
			        this_user_id : the_user_id
			    },
			    success : function(data) {
			    	$("body").animate({'scrollTop':'0'},"fast");
			    	$("p.the_alert").text('User deleted successfully... Please wait!');
			    	setTimeout(function(){
											window.location.reload(true);
										  }, 2000);
			    	console.log(data.userDeleted);
			    }

			//End-of-ajax   
			});
		}

	});


	//Add user
	$("button.add_user").on('click', function() {
		var The_firstName = $("input#new_first_name").val();
		var The_lastName = $("input#new_last_name").val();
		var The_email = $("input#new_email").val();
		var The_pass = $("input#new_pass").val();
		$.ajax({
			type: 'get',
		    url: './add_user',
		    datatype: 'JSON',
		    data:{
		        the_fname : The_firstName,
		        the_lname : The_lastName,
		        the_email : The_email,
		        the_pass : The_pass
		    },
		    success : function(data) {
		    	$("p.alert_msg").text('User Added Successfully... Please wait!');
		    	setTimeout(function(){
										window.location.reload(true);
									  }, 2000);
		    	console.log(data.userAdded);
		    }

		//End-of-ajax   
		});

	});



//===================================== [Posts] ======================================

	//Delete post
	$("a#delete_post").on('click', function() {
		var check = confirm("Do you want to delete this post?");
		if( check == true ) {
			var the_post_id = $(this).attr('post-id');
			$.ajax({
				type: 'delete',
			    url: './delete_post',
			    datatype: 'JSON',
			    data:{
			        this_post_id : the_post_id
			    },
			    success : function(data) {
			    	$("body").animate({'scrollTop':'0'},"fast");
			    	$("p.the_alert").text('Post deleted successfully... Please wait!');
			    	setTimeout(function(){
											window.location.reload(true);
										  }, 2000);
			    	console.log(data.postDeleted);
			    }

			//End-of-ajax   
			});
		}

	});

	//Delete Arabic post
	$("a#ar_delete_post").on('click', function() {
		var check = confirm("هل تريد حذف هذا المنشور؟");
		if( check == true ) {
			var the_post_id = $(this).attr('post-id');
			$.ajax({
				type: 'delete',
			    url: './delete_post',
			    datatype: 'JSON',
			    data:{
			        this_post_id : the_post_id
			    },
			    success : function(data) {
			    	$("body").animate({'scrollTop':'0'},"fast");
			    	$("p.the_alert").text('تم حذف المنشور بنجاح... من فضلك أنتظر!');
			    	setTimeout(function(){
											window.location.reload(true);
										  }, 2000);
			    	console.log(data.postDeleted);
			    }

			//End-of-ajax   
			});
		}

	});


});