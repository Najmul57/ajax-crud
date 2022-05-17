<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Ajax Crud</title>
</head>

<body>


    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <table class="table table-bordered">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
                    <h2 class="d-flex justify-content-center"><strong>Ajax Crud</strong></h2>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        data-price="{{ $product->price }}" class="btn btn-primary update_product_form">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a href="#"
                                    data-id="{{ $product->id }}"
                                     class="btn btn-danger delete_product">
                                     <i class="las la-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>
    </div>

    @include('add_product_modal')
    @include('update-modal')
    @include('product_script')
    {!! Toastr::message() !!}
</body>

</html>
