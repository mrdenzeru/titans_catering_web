@extends('layouts.master')

@section('content')

    <!-- ADD MODAL -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addProductForm" method="POST" enctype="multipart/form-data" >

                <div class="modal-body">

                    <ul class="alert alert-warning d-none" id="save_errorList"></ul>

                    <div class="form-group mb-3">
                        <label>Product Name:</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Description:</label>
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
        </div>
    </div>
    {{-- END ADD MODAL --}}

    {{-- EDIT MODAL --}}
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateProductForm" method="POST" enctype="multipart/form-data" >

                <div class="modal-body">

                    <input type="hidden" name="pro_id" id="pro_id">

                    <ul class="alert alert-warning d-none" id="update_errorList"></ul>

                    <div class="form-group mb-3">
                        <label>Product Name:</label>
                        <input type="text" name="name" id="edit_name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Description:</label>
                        <textarea class="form-control" id="edit_description" name="description"></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Image:</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
        </div>
    </div>
    {{-- END EDIT MODAL --}}

    {{-- DELETE PRODUCT MODAL --}}
    <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Deleting Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <h4>ARE YOU SURE? YOU WANT TO DELETE THIS DATA?</h4>
                <input type="hidden" id="deleting_pro_id">

            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="delete_product_btn btn btn-primary">Yes Delete!</button>
            </div>

        </div>
        </div>
    </div>
    {{-- DELETE PRODUCT MODAL --}}

    <div class="container product-cont">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="float-start">PRODUCTS</h4>
                        <a href="" data-bs-toggle="modal" data-bs-target="#addProductModal" class="btn btn-success float-end">ADD NEW PRODUCT</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script src="{{ asset('assets/js/product.js') }}"></script>

@endsection