$(document).ready(function() {

    // Custom validation method for positive numbers
    $.validator.addMethod("positiveNumber", function(value, element) {
        return this.optional(element) || (parseFloat(value) > 0);
    }, "Please enter a positive number");

    // Custom validation method for selling price greater than purchase price
    $.validator.addMethod("greaterThanPurchase", function(value, element) {
        var purchasePrice = parseFloat($('input[name="purchase_price"]').val()) || 0;
        var sellingPrice = parseFloat(value) || 0;
        return this.optional(element) || sellingPrice >= purchasePrice;
    }, "Selling price must be greater than or equal to purchase price");

    // Initialize form validation
    $('#createProductForm').validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 255
            },
            sku: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            category: {
                required: true
            },
            unit: {
                required: true
            },
            purchase_price: {
                required: true,
                number: true,
                positiveNumber: true,
                min: 0.01
            },
            selling_price: {
                required: true,
                number: true,
                positiveNumber: true,
                greaterThanPurchase: true,
                min: 0.01
            },
            stock: {
                required: true,
                digits: true,
                min: 0
            },
            min_stock: {
                digits: true,
                min: 0
            },
            status: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Product name is required",
                minlength: "Product name must be at least 3 characters",
                maxlength: "Product name cannot exceed 255 characters"
            },
            sku: {
                required: "SKU is required",
                minlength: "SKU must be at least 2 characters",
                maxlength: "SKU cannot exceed 50 characters"
            },
            category: {
                required: "Please select a category"
            },
            unit: {
                required: "Please select a unit of measurement"
            },
            purchase_price: {
                required: "Purchase price is required",
                number: "Please enter a valid number",
                min: "Purchase price must be greater than 0"
            },
            selling_price: {
                required: "Selling price is required",
                number: "Please enter a valid number",
                min: "Selling price must be greater than 0"
            },
            stock: {
                required: "Current stock is required",
                digits: "Please enter a valid number",
                min: "Stock cannot be negative"
            },
            min_stock: {
                digits: "Please enter a valid number",
                min: "Minimum stock cannot be negative"
            },
            status: {
                required: "Please select product status"
            }
        },
        errorElement: 'span',
        errorClass: 'text-danger d-block mt-1',
        errorPlacement: function(error, element) {
            // For select elements
            if (element.is('select')) {
                error.insertAfter(element);
            }
            // For input groups (purchase_price, selling_price, margin)
            else if (element.parent().hasClass('input-group')) {
                error.insertAfter(element.parent());
            }
            // For regular inputs
            else {
                error.insertAfter(element);
            }
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid border-danger');
            $(element).removeClass('is-valid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid border-danger');
            $(element).addClass('is-valid');
        },
        submitHandler: function(form) {
            var $submitBtn = $('button[type="submit"]');
            var originalText = $submitBtn.html();

            // Disable button and show loader
            $submitBtn.prop('disabled', true);
            $submitBtn.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Creating...');

            // Submit the form
            form.submit();
        }
    });

    $('input, select, textarea').on('change keyup', function() {
        if ($(this).hasClass('is-invalid')) {
            $(this).valid();
        }
    });

    $('input[name="purchase_price"]').on('change keyup', function() {
        $('input[name="selling_price"]').valid();
    });

});
