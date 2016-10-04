yii2-hidden-link-widget
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/yii2-hidden-link-widget "*"
```

or add

```
"skeeks/yii2-hidden-link-widget": "*"
```

How to use
----------

```php
<?= \skeeks\yii2\hiddenLink\HiddenLinkWidget::widget([
    'content' => $model->description_full,
    //'url' => 'http://hidden-site.com/page.html',
    //'replaceSymbol' => '.',
    //'includeCss' => true,
    //'options' => [
        'class' => 'sx-hidden-link'
    ],
]); ?>

```

___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](http://skeeks.com)  
<i>SkeekS CMS (Yii2) — fast, simple, effective!</i>  
[skeeks.com](http://skeeks.com) | [cms.skeeks.com](http://cms.skeeks.com) | [marketplace.cms.skeeks.com](http://marketplace.cms.skeeks.com)

