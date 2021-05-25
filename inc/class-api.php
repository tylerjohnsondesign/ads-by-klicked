<?php
/**
 * Ads API.
 * 
 * @since   2.0.0
 * @author  Tyler Johnson
 * @return  HTML
 */
class adsAPI {

    /**
     * Construct.
     */
    public function __construct() {

        // Register endpoint.
        add_action( 'rest_api_init', [ $this, 'register_endpoint' ] );

    }

    /**
     * Register endpoint.
     */
    public function register_endpoint() {

        // Set endpoint.
        register_rest_route( 'ads/v1', 'ad', [
            'methods'               => 'GET',
            'callback'              => [ $this, 'get_ad' ],
            'permissions_callback'  => '__return_true',
        ] );

    }

    /**
     * Get ad.
     */
    public function get_ad( $request ) {

        // Check for size.
        if( !empty( $request['size'] ) ) {

            // Set args.
            $args = [
                'post_type'     => [ 'klicked_ad' ],
                'post_status'   => [ 'publish' ],
                'meta_query'    => [
                    [
                        'key'       => 'klicked_adssize',
                        'value'     => $request['size'],
                        'compare'   => 'LIKE'
                    ],
                ],
            ];

            // Query.
            $ad_query = new WP_Query( $args );

            // Storage for ads.
            $ads = [];

            // Set count.
            $count = 0;

            // Loop.
            if( $ad_query->have_posts() ) {

                while( $ad_query->have_posts() ) {
                    
                    $ad_query->the_post();

                    // Get featured image URL.
                    $image = get_the_post_thumbnail_url( get_the_ID(), 'full' );

                    // Check for image and meta.
                    if( !empty( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) && !empty( get_post_meta( get_the_ID(), 'klicked_adsurl', true ) ) ) {

                        // Set values.
                        $image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        $url   = get_post_meta( get_the_ID(), 'klicked_adsurl', true );

                        // Save.
                        $ads[] = [
                            'url'   => $url,
                            'image' => $image
                        ];

                        // Add to count.
                        $count++;

                    }

                }

            }
            
            // Reset.
            wp_reset_postdata();

            // Add count.
            $ads['count']   = $count;

            // Return.
            return $ads;

        }

    }

}
new adsAPI;