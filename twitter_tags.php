<?php 
/*
 * Plugin Name: Twitter Tags
 * Plugin URI: http://wordpress.org/plugins/twitter-tags/
 * Description: Shortcode to create links to twitter based hashtags and usertags on the twitter site
 * Author: Eldon McGuinness
 * Version: 1.2.1
 * Author URI: http://progressivethink.in
 * Text Domain: twitter-tags
 * Domain Path: /localization/
*/

function twitter_user_shortcode( $atts , $content = null ) {
    
    // Call the main function to parse the data
    list($tagHref, $content, $tagTitle, $tagClass) = twitter_tags_worker( $atts, $content, '@');
    
    return '<a href="'.$tagHref.'" target="_blank" class="'.$tagClass.'" title="'.$tagTitle.'">'.$content.'</a>';
}

function twitter_hashtag_shortcode( $atts , $content = null ) {

    // Call the main function to parse the data
    list($tagHref, $content, $tagTitle, $tagClass) = twitter_tags_worker( $atts, $content, '#');
    
    return '<a href="'.$tagHref.'" target="_blank" class="'.$tagClass.'" title="'.$tagTitle.'">'.$content.'</a>';
}

function twitter_tags_worker( $atts, $content = null, $twitterPreTag = '#') {

    // Main twitter URL and pages
    $twitterURL = "https://twitter.com/";
    $twitterTagSearch = "search?q=%23";
    $twitterUserSearch = "";

    /* Process any attributes
     * class: is the css class, in any to be added to the <a> tag
     * alias: is the actual twitter handle, great for items whose
     *        names do not match their handles
    */
    extract( shortcode_atts( array(
        'class' => '', 
        'alias' => ''
    ), $atts ) );

    // Choose the correct twitter name/hash to use
    if ($alias== '') { $twitterTag .= str_replace(" ", "", $content); }
    else { $twitterTag .= str_replace(" ", "", $alias); }

    // Build the destination URL
    switch ($twitterPreTag) {
        case '#':
            $tagHref = $twitterURL.$twitterTagSearch.$twitterTag;
            break;
        case '@':
            $tagHref = $twitterURL.$twitterUserSearch.$twitterTag;
            break;
    }

    // Build the tag attributes
    $tagTitle = "Twitter: ".$twitterPreTag.$twitterTag;
    
    return array($tagHref, $content, $tagTitle, $class);

}

/* Application Start Point main()*/
function ap_action_init()
{
    // Localization
    load_plugin_textdomain('twitter-tags', false, dirname(plugin_basename(__FILE__)));
}

// Add actions
add_action('init', 'ap_action_init');

// Add Shortcodes
add_shortcode( 'twitter_hashtag', 'twitter_hashtag_shortcode' );
add_shortcode( 'twitter_user', 'twitter_user_shortcode' );