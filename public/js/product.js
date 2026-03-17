document.addEventListener('DOMContentLoaded', function () {
    const purchasePrice = document.querySelector('input[name="purchase_price"]');
    const sellingPrice = document.querySelector('input[name="selling_price"]');
    const margin = document.querySelector('input[name="margin"]');

    function calculateMargin() {
        const purchase = parseFloat(purchasePrice.value) || 0;
        const selling = parseFloat(sellingPrice.value) || 0;

        if (purchase > 0 && selling > 0) {
            const marginValue = ((selling - purchase) / purchase * 100).toFixed(2);
            margin.value = marginValue;
        } else {
            margin.value = '';
        }
    }

    purchasePrice.addEventListener('input', calculateMargin);
    sellingPrice.addEventListener('input', calculateMargin);

    const uploadArea = document.querySelector('.image-upload-area');
});
