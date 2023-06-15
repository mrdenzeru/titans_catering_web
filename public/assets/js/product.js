$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    fetchProduct();
    //fetch-function
    function fetchProduct()
    {
        $.ajax({
            type: "GET",
            url: "/fetch-product",
            dataType: "json",
            success: function(response) {
                // console.log(response.product);

                $('tbody').html("");
                $.each(response.product, function (key, item) {
                    $('tbody').append('<tr>\
                                <td>'+item.id+'</td>\
                                <td><img src="http://localhost:8000/uploads/products/'+item.image+'" width="110px" height="150px"></td>\
                                <td>'+item.name+'</td>\
                                <td>'+item.description+'</td>\
                                <td>\
                                    <button type="button" value="'+item.id+'" class="edit_btn btn btn-success btn-sm">Edit</button>\
                                    <button type="button" value="'+item.id+'" class="delete_btn btn btn-danger btn-sm">Delete</button></td>\
                            </tr>');
                });
            }
        });
    }
    //end-fetch-function

    // delete-function
    $(document).on('click', '.delete_btn', function (e) {
        e.preventDefault();

        var pro_id = $(this).val();
        $('#deleteProductModal').modal('show');
        $('#deleting_pro_id').val(pro_id);

    });

    $(document).on('click', '.delete_product_btn', function (e) {
        e.preventDefault();

        var id = $('#deleting_pro_id').val();

        $.ajax({
            type: "DELETE",
            url: "/delete-product/"+id,
            dataType: "json",
            success: function (response) {
                if(response.status == 400)
                {
                    alert(response.message);
                    $('#deleteProductModal').modal('hide');
                }
                else if(response.status == 200)
                {
                    fetchProduct();
                    $('#deleteProductModal').modal('hide');
                    alert(response.message);
                }
            }
        });
    });
    // end-delete-function

    // edit-function
    $(document).on('click', '.edit_btn', function (e) {
        e.preventDefault();

        var pro_id = $(this).val();
        $('#editProductModal').modal('show');

        $.ajax({
            type: "GET",
            url: "/edit-product/"+pro_id,
            success: function (response) {
                if (response.status == 404) 
                {
                    alert(response.message);
                    $('#editProductModal').modal('hide');
                } 
                else 
                {
                    $('#edit_name').val(response.product.name);
                    $('#edit_description').val(response.product.description);
                    $('#pro_id').val(pro_id);
                }
            }
        });

    });
    // end-edit-function

    //update-function
    $(document).on('submit', '#updateProductForm', function (e) {
        e.preventDefault();

        var id = $('#pro_id').val();
        let editFormData = new FormData($('#updateProductForm')[0]);

        $.ajax({
            type: "POST",
            url: "/update-product/"+id,
            data: editFormData,
            contentType: false,
            processData: false,
            success: function (response) {
                if(response.status == 400)
                {
                    $('#update_errorList').html("");
                    $('#update_errorList').removeClass('d-none');

                    $.each(response.errors, function(key, err_value) {
                        $('#update_errorList').append('<li>' + err_value + '</li>');
                    });
                }
                else if(response.status == 404)
                {
                    alert(response.message);
                }
                else if(response.status == 200)
                {
                    $('#update_errorList').html("");
                    $('#update_errorList').addClass('d-none');

                    $('#editProductModal').modal('hide');
                    $('.modal-backdrop').remove();
                    alert(response.message);
                    fetchProduct();
                }
            }
        });

    });
    //end-update-function

    // add-function
    $(document).on('submit', '#addProductForm', function(e) {
        e.preventDefault();

        let formData = new FormData($('#addProductForm')[0]);

        $.ajax({
            type: "POST",
            url: "/product",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 400) { 
                    $('#save_errorList').html("");
                    $('#save_errorList').removeClass('d-none');

                    $.each(response.errors, function(key, err_value) {
                        $('#save_errorList').append('<li>' + err_value + '</li>');
                    });
                }
                else if(response.status == 200)
                {
                    $('#save_errorList').html("");
                    $('#save_errorList').addClass('d-none');

                    // this.reset();
                    $('#addProductForm').find('input').val('');
                    $('#addProductModal').modal('hide');
                    $('.modal-backdrop').remove();
                    alert(response.message);
                    fetchProduct();
                }
            }
        });
    });
    // end-add-function
});