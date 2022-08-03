<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD CI4</title>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary mt-3" onclick="window.location.href='/add'">Add Student</button> 

        <div class="card mt-3">
            <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php   
                        foreach($pageData as $s){
                            echo'<tr>';
                                echo'<td>'.$s['id'].'</td>'; 
                                echo'<td>'.$s['first_name'].'</td>'; 
                                echo'<td>'.$s['last_name'].'</td>'; 
                                echo'<td>'.$s['address'].'</td>'; 
                                echo'<td>'.$s['email'].'</td>'; 
                                echo'<td>'.$s['mobile'].'</td>'; 
                                echo'<td class="">'; 
                                    echo'<a class="btn btn-primary" href="/edit/'.$s['id'].'">Edit</a>'; 
                                    echo'<a class="btn btn-danger Btn_Delete" data-id="'.$s['id'].'">Delete</a>'; 
                                echo'</td>'; 
                            echo'</tr>';
                        } 
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {   
            $('.Btn_Delete').click(function(){ 
                var postData = {
                    id: $(this).data("id"), 
                }
                $.ajax({
                    url:"/deleteRecord",
                    method:"POST",
                    data:postData, 
                    success:function(data){   
                        alert('Success');
                    }
                }); 
            });
        });
    </script>

</body>

</html>