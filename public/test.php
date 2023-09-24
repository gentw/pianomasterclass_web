<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form id="eventForm">
		
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input class="form-control" name="first_name" type="text" id="first_name">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input class="form-control" name="last_name" type="text" id="last_name">
        </div>

        <div class="form-group">
            <label for="event_title">Event Title:</label>
            <input class="form-control" name="event_title" type="text" id="event_title">
        </div>

        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input class="form-control" name="start_date" type="text" id="start_date">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input class="form-control" name="end_date" type="text" id="end_date">
        </div>

        <div class="form-group">
            <input id="createBtn" class="form-control" type="submit" value="Create Event">
        </div>

    </form>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>  
    <script type="text/javascript">
    	$('#createBtn').click(function(e) {

        e.preventDefault();
        $(this).html('Updating...');

        $.ajax({
            data: $('#eventForm').serialize(),
            url: "/web/events",
            type: "POST",
            dataType: "json",

            success: function(data) {

              window.location = "/test.php";
            },
            error: function(data) {
              console.log('Error:', data);
            }
        });
    });
    </script>

</body>
</html>