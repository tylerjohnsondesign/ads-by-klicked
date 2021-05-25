jQuery(document).ready(function() {
    jQuery('.klicked-ad').each(function() {
        // Get.
        var adSLOT = jQuery(this).attr('id');
        var adSIZE = jQuery(this).data('size');
        jQuery.getJSON('https://klicked.com/wp-json/ads/v1/ad/?size=' + adSIZE, function(data) {
            // Get count.
            var count = data.count;
            // Get ad ID.
            var adID = Math.floor(Math.random() * ( count - 1 ) );
            // Get ad.
            var adURL = data[adID].url;
            var adIMG = data[adID].image;
            // Display.
            jQuery('#' + adSLOT).html('<a href="' + adURL + '" target="_blank"><img src="' + adIMG + '" /></a>');
        });
    });
});