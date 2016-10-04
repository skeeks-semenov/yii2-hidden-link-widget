<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (ÑêèêÑ)
 * @date 04.10.2016
 */
namespace skeeks\yii2\hiddenLink;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class HiddenLinkWidget
 * @package skeeks\yii2\hiddenLink
 */
class HiddenLinkWidget extends Widget
{
    /**
     * @var string
     */
    public $content = '';

    /**
     * @var string
     */
    public $url = '';

    /**
     * @var string
     */
    public $replaceSymbol = '.';

    /**
     * @var bool
     */
    public $includeCss = true;

    /**
     * @var array link options
     */
    public $options = [
        'class' => 'sx-hidden-link',
    ];

    public function init()
    {
        parent::init();

        if (!$this->url)
        {
            $this->url = \Yii::$app->request->absoluteUrl;
        }
    }

    /**
     * @return string
     */
    public function run()
    {
        $result = $this->content;
        $tagA = Html::a($this->replaceSymbol, $this->url, $this->options);
        $result = static::strReplaceOnce($this->replaceSymbol, $tagA, $result);
        $this->registerCss();

        return (string) $result;
    }

    /**
     * @return bool
     */
    public function registerCss()
    {
        if ($this->includeCss !== true)
        {
            return false;
        }

        $this->view->registerCss(<<<CSS
a.sx-hidden-link,
a.sx-hidden-link:active,
a.sx-hidden-link:focus,
a.sx-hidden-link:hover
{
    cursor: text !important;
    color: black !important;
    text-decoration: none !important;
    border-bottom: none !important;
}
CSS
);

        return true;
    }

    /**
     * Once replace
     *
     * @param $search
     * @param $replace
     * @param $text
     * @return string
     */
    static public function strReplaceOnce($search, $replace, $text)
    {
       $pos = strpos($text, $search);
       $result = $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
       return (string) $result;
    }
}