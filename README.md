# HTML module

A module that help you work with HTML documents in a OOP manner.

## Collectors

### views
This modules provides implementation for the following views: `html.document`,
`html.collection`, `html.script`, `html.meta`, `html.style`, `html.link`, and
`html.attributes`.

### routes

This module provides a global binding, named `htmldoc`, that will return
a singleton instance of the `OpisColibri\Html\Document` class.


## How to use

Here is some basic usage for this module

```php
use OpisColibri\Html\Document as HtmlDoc;

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
provided by the `OpisColibri\Html\MetaCollection` class. To access
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

