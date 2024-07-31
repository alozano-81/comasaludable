<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Coma Saludable</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body id="page-top">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <div class="container mt-5 position-relative">
        <div class="row">
            <div class="col">
                <button class="btn btn-success mb-2">New Register</button>
                <table class="table table-dark" id="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Teclado Gamer Rgba</td>
                            <td>80</td>
                            <td>23</td>
                            <td><button class="btn btn-warning">Edit</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Mouse Rgba</td>
                            <td>50</td>
                            <td>800</td>
                            <td><button class="btn btn-warning">Edit</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Monitor Asus Hd</td>
                            <td>700</td>
                            <td>23</td>
                            <td><button class="btn btn-warning">Edit</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Lapto Lenovo</td>
                            <td>2.500</td>
                            <td>120</td>
                            <td><button class="btn btn-warning">Edit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="position-absolute w-100 top translate" id="modal">
        <form class="form-control w-50">
            <h1 class="text-center">New Register</h1>
            <div class="form-control border-white">
                <label for="">Id :</label>
                <input type="text" class="form-control w-25">
            </div>
            <div class="form-control border-white">
                <label for="">Name :</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-control border-white">
                <label for="">Price :</label>
                <input type="number" class="form-control w-25">
            </div>
            <div class="form-control border-white">
                <label for="">Quantity :</label>
                <input type="number" class="form-control w-25">
            </div>
            <div class="form-control border-white">
                <button class="btn btn-primary">Save!</button>
            </div>
        </form>
        <button class="position-absolute btn btn-danger close">Close</button>
    </div>

    
    <script src="js/modal2.js"></script>


</body>


</html>




<!-- Modal -->
