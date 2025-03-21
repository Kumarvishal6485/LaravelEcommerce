$(document).ready(function () {
    //categories
    $(document).on('click', '#edit_category', function (e) {
        $('#category_new_image').hide();
        var element = $('#edit_category_modal');
        var id = this.getAttribute('id_val');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'fetch_edit_details',
            type: 'POST',
            datatype: 'json',
            data: {
                'id': id
            },
            success: function (data) {
                //data = JSON.parse(data);
                const obj = data[0];
                console.log(obj);
                $('#edit_category_modal').modal('show');
                $('#id_input').val(obj.id);
                $('#category_input').val(obj.category);
                $('#description_input').html(obj.description);
                $('#image_input').attr('src', '/storage/' + obj.image);
                $('#prev_image').val(obj.image);
            }
        })
    })

    $('#change_image').on('click', function (e) {
        e.preventDefault();
        $('#category_new_image').show();
    })


    //sub category view js starts here
    function get_category() {   //function to fetch all categories
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            url: 'get_categories',
            success: function (data) {
                var option = "<option selected disabled>Select</option>";
                for (let x in data) {
                    option += "<option value='" + data[x].id + "'>" + data[x].category + "</option>";
                }
                $('#category').html(option);
            }
        })
    }

    get_category();

    $(document).on('click', '#sub_category-edit_category', function (e) {
        $('#show_image_input').hide();
        $('#new_image').hide();
        var element = $('#edit_sub_category_modal');
        var id = this.getAttribute('id_val');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'fetch_sub_category_edit_details',
            type: 'POST',
            datatype: 'json',
            data: {
                'id': id
            },
            success: function (data) {
                var options = "<option disabled>Select</option>";
                for (category of data.category) {
                    if (category.id == data.sub_category[0].category) {
                        options += "<option value='" + category.id + "' selected>" + category.category + "</option>";
                    }
                    else {
                        options += "<option value='" + category.id + "'>" + category.category + "</option>";
                    }
                }
                $('#prev_category').html(options);
                $('#edit_sub_category_modal').modal('show');
                $('#previous_sub_category',).val(data.sub_category[0].sub_category);
                $('#previous_description').val(data.sub_category[0].description);
                $('#prev_image').attr('src', '/storage/sub_category/' + data.sub_category[0].image);
                $('#show_image_input').show();
                $('#prev_image').val(data.sub_category[0].image);
                $('#sub_category_id').val(data.sub_category[0].id);
            }
        })

        $('#show_image_input').on('click', function (e) {
            e.preventDefault();
            $('#new_image').show();
        })
    })

    //sub category view js ends here

    //products view js starts here
    function get_categoryy(category_id = 0) {
        id = category_id;
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            url: 'get_categories',
            success: function (data) {
                if (id === 0) {
                    var option = "<option selected disabled>Select</option>";
                    for (let x in data) {
                        option += "<option value='" + data[x].id + "'>" + data[x].category + "</option>";
                    }
                    $('#category').html(option);
                }
                else {
                    var option = "<option disabled>Select</option>";
                    for (let x in data) {
                        if (data[x].id == id) {
                            option += "<option selected value='" + data[x].id + "'>" + data[x].category + "</option>";
                        }
                        else {
                            option += "<option value='" + data[x].id + "'>" + data[x].category + "</option>";
                        }
                    }
                    $('#previous_category').html(option);
                }
            }
        })
    }
    get_categoryy();

    function get_sub_category(cid, iscategory, sid) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            type: 'post',
            data: {
                id: cid
            },
            url: 'get_sub_categories',
            success: function (data) {
                display_sub_categories(cid, iscategory, data, sid);
            }
        })
    }

    function display_sub_categories(cid, iscategory, data, sid) {
        //console.log(data);
        if (iscategory) {
            var option = "<option disabled>Select</option>";
            for (let x in data) {
                if (data[x].id === sid) {
                    option += "<option selected value='" + data[x].id + "'>" + data[x].sub_category + "</option>";
                }
                else {
                    option += "<option value='" + data[x].id + "'>" + data[x].sub_category + "</option>";
                }
            }
            $('#previous_sub_category').html(option);
        }
        else {
            var option = "<option selected disabled>Select</option>";
            for (let x in data) {
                option += "<option value='" + data[x].id + "'>" + data[x].sub_category + "</option>";
            }
            if (sid === 0) {
                $('#previous_sub_category').html(option);
            }
            else {
                $('#sub_category').html(option);
            }
        }
    }

    $('#category').on('change', function (e) {
        var cid = $('#category').val();
        iscategory = false;
        get_sub_category(cid, iscategory);
    })

    $('#previous_category').on('change', function (e) {
        var cid = $(this).val();
        iscategory = false;
        get_sub_category(cid, iscategory, 0);
    })

    $(document).on('click', '#edit_category', function (e) {
        $('#add_new').hide();
        var id = this.getAttribute('id_val');
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'product_edit_details',
            type: 'POST',
            datatype: 'json',
            data: {
                'id': id
            },
            success: function (data) {
                $('#product_iddd').val(data['data'][0].id);
                $('#previous_product').val(data['data'][0].product_name);
                $('#previous_description').val(data['data'][0].description);
                $('#prev_sub_category_id').val(data['data'][0].sid);
                $('#prev_category_id').val(data['data'][0].cid);
                $('#previous_cost').val(data['data'][0].cost);
                $('#previous_price').val(data['data'][0].price);
                get_categoryy(data['data'][0].cid);
                get_sub_category(data['data'][0].cid, true, data['data'][0].sid);
                $('#edit_category_modal').modal('show');
                const images = data['images'];
                var image_html = "";
                if (images.length === 0) {
                    $('#add_more_images').click();
                    $('#add_more_images').hide();
                    $('#images_new_uploaded').attr('required', true);
                }
                else {
                    for (image of images) {
                        image_html = image_html + "<img class='mr-4' src='../storage/products/" + image.image + "' id='" + image.id + "' product_id='" + image.pid + "'height=100px> <a class='btn btn-danger' id='remove_image' product_id='" + image.pid + "' image_id='" + image.id + "'>Remove</a><br>";
                    }
                }
                $('#product_images').html(image_html);
            }
        })
    })

    $('#add_more_images').on('click', function (e) {
        e.preventDefault();
        $('#add_new').show();
    })

    $(document).on('click', '#remove_image', function (e) {
        e.preventDefault();
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'delete_product_image',
            type: 'POST',
            datatype: 'json',
            data: {
                'id': $(this).attr('image_id'),
                'pid': $(this).attr('product_id')
            },
            success: function (data) {
                const images = data['images'];
                var image_html = "";
                if (images.length === 0) {
                    $('#add_more_images').click();
                    $('#add_more_images').hide();
                    $('#images_new_uploaded').attr('required');
                }
                else {
                    for (image of images) {
                        image_html = image_html + "<img class='mr-4' src='../storage/products/" + image.image + "' id='" + image.id + "' product_id='" + image.pid + "'height=100px> <a class='btn btn-danger' id='remove_image' product_id='" + image.pid + "' image_id='" + image.id + "'>Remove</a><br>";
                    }
                }
                $('#product_images').html(image_html);
            }
        })
    })
})