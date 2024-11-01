=== Twitter Tags ===

Contributors: ElMcGuinness
Donate link: http://progressivethink.in/donate
Tags: twitter, shortcodes
Requires at least: 3.0.1
Tested up to: 3.6.1
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows one to embed hashtags and usertags into a wordpress post, and in such as way as to not break common publication formatting.

== Description ==

### Twitter Hashtags Syntax
In the body of your post use the [twitter_hashtag] shortcode to create a hashtag link to the twitter site that will open in its own window. This is great for directing people to a trending topic on twitter.

### Twitter Usertags Syntax
In the body of your post use the [twitter_user] shortcode to create a usertag link to the twitter site that will open in its own window. This is great for directing people to a specific person's twitter feed.

### Attributes

The shortcode does allow for two attributes to be passed to it:

*   A CSS class tag
*   An alias to pass to the twitter site

#### Class

Want to give the shortcode text a particular look n' feel? If so you can specify a class name for the link in question by specifying the class attribute.

    #!shortcode
    [twitter_hashtag class="custom_class"]Some Tag[/twitter_hashtag]
    [twitter_user class="custom_class"]Some User[/twitter_user]

#### Alias

Since a large number of hash tags and usernames will either not make lexical sense or are just plain jibberish, the shortcode contents can be seperated from the actual tag in question.

    #!shortcode
    [twitter_hashtag alias="crazyname42"]Crazy Name[/twitter_hashtag]
    [twitter_user alias="someodduser"]John Smith[/twitter_user]

As noted above, the twitter tag will appear as [Crazy Name](http://twitter.com/search?1=%23crazyname42 "Twitter: #crazyname42"), but the hashtag searched fro on twitter will be #crazyname42.
The usertag will be shown as [John Smith](http://twitter.com/someodduser "Twitter: @someodduser"), while the name searched for on twitter will be @someodduser.

### Removal of White Spaces

It should be noted that white spaces in the shortcode contents--everything between the opening and closing tags--will be removed automatically when creating the hashtag or usertag, but it will remain in the post as written.

    #!shortcode
    [twitter_hashtag]New Widget[/twitter_hashtag]
    [twitter_user]John Smith[/twitter_user]

In your post, New Widget will remain as typed, but the hashtag will be compressed to NewWidget.

In your post, John Smith will remain as typed, but the usertag will be compressed to JohnSmith.