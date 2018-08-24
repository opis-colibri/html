# HTML module

A module that helps you work with HTML documents in a OOP manner.

## Collectors

### views
This modules provides implementation for the following views: `html.document`,
`html.collection`, `html.script`, `html.meta`, `html.style`, `html.link`, and
`html.attributes`.

### routes

This module provides a global binding, named `htmldoc`, that will return
a singleton instance of the `Opis\Colibri\Modules\Html\Document` class.


## How to use it

Here is some basic usage for this module

```php
use Opis\Colibri\Modules\Html\Document as HtmlDoc;

$doc = new HtmlDoc();

$doc->title("My page's title")
    ->content("This is some content")
    ->htmlAttributes(['lang' => 'en'])
    ->bodyAttributes(['onload' => 'alert(1)'])
    ->bodyClasses(['foo', 'bar']);
    
echo $doc;
```

The output will be

```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My page's title</title>    
    </head>
    <body onload="alert(1)" class="foo bar">
        This is some content
    </body>
</html>
```

If you wish to set a base url for your document, just use the
`base` method.

```php
$doc->base('/foo');
```
```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My page's title</title>   
        <base href="/foo"> 
    </head>
    <body onload="alert(1)" class="foo bar">
        This is some content
    </body>
</html>
```

You can add meta tags to document by using the various methods
provided by the `Opis\Colibri\Modules\Html\MetaCollection` class. To access
the meta collection instance, just call the `meta` method on the
document instance.

```php
$doc->meta()
    ->keywords(['foo', 'bar', 'baz'])
    ->description('This is a description for my page');
```
```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My page's title</title>    
        <base href="/foo"> 
        <meta name="keywords" content="foo, bar, baz">
        <meta name="description" content="This is a description for my page">
    </head>
    <body onload="alert(1)" class="foo bar">
        This is some content
    </body>
</html>
```

Adding link tags to you document is done with the help of `links` method,
which returns an `Opis\Colibri\Modules\Html\LinkCollection` instance. The returned
instance provides various methods for adding link tags to your page.

```php
$doc->links()
    ->favicon('/assets/favicon.ico')
    ->custom('apple-touch-icon', function(Link $link){
        $link->attributes([
            'rel' => 'apple-touch-icon',
            'sizes' => '180x180',
            'href' => '/assets/icon-180x180.png',
        ]);
    })
    ->link('canonical', '/other-page');
```
```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My page's title</title>    
        <base href="/foo"> 
        <meta name="keywords" content="foo, bar, baz">
        <meta name="description" content="This is a description for my page">
        <link rel="icon" href="/assets/favicon.ico">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/icon-180x180.png">
        <link rel="canonical" href="/other-page">
    </head>
    <body onload="alert(1)" class="foo bar">
        This is some content
    </body>
</html>
```
