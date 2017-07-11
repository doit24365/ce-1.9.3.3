/**
 * Final date js
 *
 * @category  Test
 * @package   Js
 * @author    Roman <do.it.24.365@gmail.com>
 * @copyright 2017 Roman
 */

Product.Config.prototype.getIdOfSelectedProduct = function(val) {
    var existingProducts = new Object();
    for (var i = this.settings.length-1; i >= 0; i--) {
        var selected = this.settings[i].options[this.settings[i].selectedIndex];
        if (selected.config) {
            for (var iproducts = 0; iproducts < selected.config.products.length; iproducts++) {
                var usedAsKey = selected.config.products[iproducts] + "";
                if (existingProducts[usedAsKey] == undefined) {
                    existingProducts[usedAsKey] = 1;
                } else {
                    existingProducts[usedAsKey] = existingProducts[usedAsKey] + 1;
                }
            }
        }
    }
    for (var keyValue in existingProducts) {
        for ( var keyValueInner in existingProducts) {
            if (Number(existingProducts[keyValueInner]) < Number(existingProducts[keyValue])) {
                delete existingProducts[keyValueInner];
            }
        }
    }
    var sizeOfExistingProducts = 0;
    var currentSimpleProductId = "";
    for (var keyValue in existingProducts) {
        currentSimpleProductId = keyValue;
        sizeOfExistingProducts = sizeOfExistingProducts + 1
    }
    if (sizeOfExistingProducts == 1) {
        return currentSimpleProductId;
    }

};

jQuery(document).ready(function(){
    jQuery('.swatch-link').on('click', function() {
        var simpleProductId = spConfig.getIdOfSelectedProduct();
        if (typeof(spConfig.config.finalDate[simpleProductId]) !== 'undefined') {
            jQuery('#product-attribute-specs-table .label:contains("Final date")')
                .next()
                .text(spConfig.config.finalDate[simpleProductId]);
        }
    });
});
