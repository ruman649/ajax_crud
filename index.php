<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div id="message">
        <div id="err"></div>
        <div id="success"></div>
    </div>

    <form id="form" action="">
        <span id="load">DataLoad</span>
        <span>Name</span><input type="text" name="" id="full_name">
        <span>Age</span><input type="text" name="" id="age">
        <button id="submit">Insert Data</button>
    </form>

    <!-- data show  -->
    <table border="1px" cellpadding='10px' cellspacing='0' width='100%'>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>

    <div class="edit_box">
        <div class="edit_form">
            <span class='x'>X</span>
            <h1>Edit Data</h1><br><br>
            <div class="place_edit"></div>
        </div>
    </div>


    <script src="./jquery.js"></script>
    <script>
        $(document).ready(function() {
        

            // data inserted 
            $('#submit').on('click', function(e) {
                e.preventDefault();
                let name = $('#full_name').val();
                let age = $('#age').val();
                if (name == '' || age == '') {
                    $('#err').html("fillup all fields").slideDown();
                    $('#success').slideUp();
                } else {
                    $.ajax({
                        url: "insert_data.php",
                        type: "post",
                        data: {
                            name: name,
                            age: age
                        },
                        success: function(data) {
                            if (data == 1) {
                                $('#form').trigger('reset');
                                $('#success').html('data inserted').slideDown();
                                $('#err').slideUp();
                                showData();
                            } else {
                                $('#err').html('data not inserter').slideDown();
                                $('#success').slideUp();
                            }
                        }
                    })
                }
            })

            //data show
            function showData() {
                $.ajax({
                    url: "show_data.php",
                    type: "post",
                    success: function(data) {
                        $('#tbody').html(data);
                    }
                })
            }
            showData();

            //data edit
            //show in box
            $(document).on('click', '#edit_btn', function() {
                $('.edit_box').show();
                let eid = $(this).data('eid');
                $.ajax({
                    url: "get_update.php",
                    type: 'post',
                    data: {
                        id: eid
                    },
                    success: function(data) {
                        $('.place_edit').html(data);
                    }
                })
            });

            $('.x').on('click', function() {
                $('.edit_box').hide();
            });

            //data edit
            $(document).on('click', '.esubmit', function(){
                let id = $('#eid').val();
                let name = $('#ename').val();
                let age = $('#eage').val();
                // console.log(name);
                if(name==''|| age==''){
                    $('#err').html("cant updata data empty").slideDown();
                    $('#success').slideUp();
                }
                else{
                    $.ajax({
                        url: "update.php", 
                        type: "post",
                        data: {id:id, name:name, age:age},
                        success: function(data){
                            if(data==1){
                                $('.edit_box').hide();
                                showData();
                            }
                        }
                    })
                }
            })


            //delete data
            $(document).on('click', '#delete_id', function(){
                let id = $(this).data('delete_id');
                let row = this;

                $.ajax({
                    url: "delete.php",
                    type: "post",
                    data: {id:id},
                    success: function(data){
                        if(data==1){
                            $('#success').html('delete success full').slideDown();
                            $('#err').slideUp();
                            $(row).closest('tr').fadeOut();
                        }
                        else{
                            $('#err').html("data not delete ").slideDown();
                            $('#success').slideUp();
                        }
                    }
                })
            })

        });
    </script>


</body>

</html>