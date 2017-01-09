$(document).ready(function(){
	
	console.log('init');

	function updateAction() {
		if( $('#tasks-list tr').length == 0 )
		{
			$('#first-action').show();
		}
		else
		{
			$('#first-action').hide();	
		}		
	}


	var token = $('meta[name="csrf-token"]').attr('content');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });	


	$('#create_task').on('click', function($event){

		console.log('add task');

		$event.preventDefault();


    	var formData = {
    		'name'    : $('#task-name').val(),
    		'user_id' : user_id
    	};        

    	console.log(formData);

        $.ajax({

            type: 'post',
            url: '/task',
            data: formData,
            dataType: 'json',
            encode: true,
            success: function (data) {
                
                console.log(data);

				var task  = '<tr id="task'+ data.id +'"><td class="table-text"><div>'+ data.name +'</div></td>';
				    task += '<td>';				    				    
				    task += '<button type="button" data-id="'+ data.id +'" class="btn btn-danger delete-task"><i class="fa fa-btn fa-trash"></i>Delete</button>';
					task += '</form></td></tr>';

				$('#tasks-list').append(task);

				$('#frmTasks').trigger("reset");

			  	var message = '<div class="alert alert-success">Task added</div>';
			  	$('#messages').html( message ).show().delay(2000).fadeOut();

				updateAction();
            },
			error: function(xhr, status, error) {
			  	var err = JSON.parse(xhr.responseText);
			  	var message = '<div class="alert alert-danger">'+ err.name +'</div>';
			  	$('#messages').html( message ).show().delay(2000).fadeOut();;
			}
        });    	
	});

	$(document).on('click', '.delete-task', function($event){
		
		console.log('delete task')

		$event.preventDefault();

		console.log( $(this).data('id') );		

		var task_id = $(this).data('id');

        $.ajax({

            type: "DELETE",
            url: '/task/' + task_id,
            // dataType: 'json',
            success: function (data) {
                console.log(data);

                $("#task" + task_id).remove();

                var message = '<div class="alert alert-success">Task deleted</div>';
			  	$('#messages').html( message ).show().delay(2000).fadeOut();;

                updateAction();
            },
			error: function(xhr, status, error) {
			  	var err = JSON.parse(xhr.responseText);
			  	var message = '<div class="alert alert-danger">'+ err.name +'</div>';
			  	$('#messages').html( message ).show().delay(2000).fadeOut();;
			}
        });		
	});

});