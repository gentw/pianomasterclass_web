<!DOCTYPE html>

<html>

<head>

    <title>Requests for Events</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />

    <link rel="stylesheet"
      href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<link rel="stylesheet"
      href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
<link rel="stylesheet"
      href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
<link rel="stylesheet"
      href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/admin/dashboard">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">          
        <a class="nav-link log__out" href="/logout">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
    

<div class="container">
    <br><br>
    <h1>Requests for Events</h1>
    <br><br>
    <table class="table table-bordered data-table">

        <thead>

            <tr>

                <th>No</th>

                <th>First Name</th>

                <th>Last Name</th>

                <th>Event Title</th>

                <th>Start Date</th>

                <th>End Date</th>

                <th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>
    <div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title" id="modelHeading"></h4>

            </div>

            <div class="modal-body">

                <form id="eventForm" name="eventForm" class="form-horizontal">

                   <input type="hidden" name="_method" value="PUT">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">

                        <label for="name" class="col-sm-12 control-label">First Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="first_name" name="first_name" value="" maxlength="50" required="">

                        </div>

                    </div>

     

                    <div class="form-group">

                        <label for="name" class="col-sm-12 control-label">Last Name</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="last_name" name="last_name" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="name" class="col-sm-12 control-label">Event Title</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="event_title" name="event_title" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="name" class="col-sm-12 control-label">Start Date</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="start_date" name="start_date" value="" maxlength="50" required="">

                        </div>

                    </div>

                    <div class="form-group">

                        <label for="name" class="col-sm-12 control-label">End Date</label>

                        <div class="col-sm-12">

                            <input type="text" class="form-control" id="end_date" name="end_date" value="" maxlength="50" required="">

                        </div>

                    </div>

      

                    <div class="col-sm-offset-2 col-sm-10">

                     <button type="submit" class="btn btn-primary" id="updateBtn" value="Update">Update

                     </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</div>



   

</body>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>   
<script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">




  $(function () {

    // window.dtDefaultOptions = {
    //     retrieve: true,
    //     dom: 'lBfrtip<"actions">',
    //     columnDefs: [],
    //     "iDisplayLength": 100,
    //     "aaSorting": [],
        
    // };
    var table = $('.data-table').DataTable({

        processing: true,




        ajax: "{{ route('events.index') }}",

        columns: [

            {data: 'id', name: 'id'},

            {data: 'first_name', name: 'first_name'},

            {data: 'last_name', name: 'last_name'},

            {data: 'event_title', name: 'event_title'},

            {data: 'start_date', name: 'start_date'},

            {data: 'end_date', name: 'end_date'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ],

        dom: 'Bfrtip',
        buttons: [
            'print', 'excel', 'pdf'
        ]



    });

    $('body').on('click', '.editEvent', function() {
        window.event_id = $(this).data('id');

        var event_id = $(this).data('id');
        $.get("{{ route('events.index') }}" + '/' + event_id + '/edit', function (data) {
          $('#modelHeading').html("Edit Event");

          $('#saveBtn').val("edit-user");

          $('#ajaxModel').modal('show');

          $('#id').val(data.id);

          $('#first_name').val(data.first_name);

          $('#last_name').val(data.last_name);

          $('#event_title').val(data.event_title);

          $('#start_date').val(data.start_date);

          $('#end_date').val(data.end_date);
        });
    });

    $('#updateBtn').click(function(e) {

        e.preventDefault();
        $(this).html('Updating...');

        $.ajax({
            data: $('#eventForm').serialize(),
            url: "{{ route('events.index') }}"+"/"+window.event_id,
            type: "PUT",
            dataType: "json",

            success: function(data) {
              $('#eventForm').trigger("reset");

              $('#ajaxModel').modal('hide');

              window.location = "{{route('events.index')}}";
            },
            error: function(data) {
              console.log('Error:', data);
              $('#updateBtn').html('Updated.');
            }
        });
    });


    $("body").on("click", ".deleteEvent", function() {
        var event_id = $(this).data("id");
        confirm("Are you sure want to delete this event?");
        
        $.ajax({
            type: "DELETE",
            url: "{{ route('events.index') }}" + "/" + event_id,
            success: function(data) {
                window.location = "{{route('events.index')}}";
            },
            error: function (data) {
                console.log("Error:", data);
            }
        });
    });


   


  });

</script>

</html>