<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

   <style>
        a#addfeature {
            margin-inline-start: 991px;
            font-size: unset;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Features Listing</h2>
        <h4><a href="{{ route('features.create') }}" id="addfeature" class="btn btn-success">Add features</a></h4>
        <table id="users-table" class="table" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th> Feature Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        var oTable = $('#users-table').DataTable({
            "processing": true,
            "serverSide": false,
            "searching": false,
            "responsive": true,
            "ajax": {
                url: '{!! route('features.listing') !!}',
                "type" : "POST",
            },
            "columns": [
                {
                    data: 'id'
                },
                {
                    data: 'features_name'
                },
                {
                    data: 'action'
                },
            ]
        });



        $(document).on("click", ".delete", function() {


            var myUrl = $(this).attr('data-link');

            $.ajax({
                type: 'DELETE',
                url: myUrl,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    if (response.status == 0 && response.msg != "") {

                        oTable.draw();

                    }
                }

            });
        });
    </script>

</body>

</html>
