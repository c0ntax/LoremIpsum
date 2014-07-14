<?php
/**
 * Created by PhpStorm.
 * User: dan
 * Date: 14/07/14
 * Time: 14:52
 */

namespace Badcow\LoremIpsum\Languages;


class LoremIpsumLanguage implements LanguageInterface
{
    /**
     * The mean word length of a sentence
     *
     * @var float
     */
    private $sentenceMean = 24.460;

    /**
     * The standard deviation of words in a sentence
     *
     * @var float
     */
    private $sentenceStDev = 5.080;

    /**
     * Mean number of sentences per paragraph
     *
     * @var float
     */
    private $paragraphMean = 5.800;

    /**
     * The standard deviation of sentences in a paragraph
     *
     * @var float
     */
    private $paragraphStDev = 1.930;

    /**
     * @var array
     */
    private $words = array(
        'lorem',        'ipsum',        'dolor',        'sit',          'amet',         'consectetur',
        'adipiscing',   'elit',         'curabitur',    'vel',          'hendrerit',    'libero',
        'eleifend',     'blandit',      'nunc',         'ornare',       'odio',         'ut',
        'orci',         'gravida',      'imperdiet',    'nullam',       'purus',        'lacinia',
        'a',            'pretium',      'quis',         'congue',       'praesent',     'sagittis',
        'laoreet',      'auctor',       'mauris',       'non',          'velit',        'eros',
        'dictum',       'proin',        'accumsan',     'sapien',       'nec',          'massa',
        'volutpat',     'venenatis',    'sed',          'eu',           'molestie',     'lacus',
        'quisque',      'porttitor',    'ligula',       'dui',          'mollis',       'tempus',
        'at',           'magna',        'vestibulum',   'turpis',       'ac',           'diam',
        'tincidunt',    'id',           'condimentum',  'enim',         'sodales',      'in',
        'hac',          'habitasse',    'platea',       'dictumst',     'aenean',       'neque',
        'fusce',        'augue',        'leo',          'eget',         'semper',       'mattis',
        'tortor',       'scelerisque',  'nulla',        'interdum',     'tellus',       'malesuada',
        'rhoncus',      'porta',        'sem',          'aliquet',      'et',           'nam',
        'suspendisse',  'potenti',      'vivamus',      'luctus',       'fringilla',    'erat',
        'donec',        'justo',        'vehicula',     'ultricies',    'varius',       'ante',
        'primis',       'faucibus',     'ultrices',     'posuere',      'cubilia',      'curae',
        'etiam',        'cursus',       'aliquam',      'quam',         'dapibus',      'nisl',
        'feugiat',      'egestas',      'class',        'aptent',       'taciti',       'sociosqu',
        'ad',           'litora',       'torquent',     'per',          'conubia',      'nostra',
        'inceptos',     'himenaeos',    'phasellus',    'nibh',         'pulvinar',     'vitae',
        'urna',         'iaculis',      'lobortis',     'nisi',         'viverra',      'arcu',
        'morbi',        'pellentesque', 'metus',        'commodo',      'ut',           'facilisis',
        'felis',        'tristique',    'ullamcorper',  'placerat',     'aenean',       'convallis',
        'sollicitudin', 'integer',      'rutrum',       'duis',         'est',          'etiam',
        'bibendum',     'donec',        'pharetra',     'vulputate',    'maecenas',     'mi',
        'fermentum',    'consequat',    'suscipit',     'aliquam',      'habitant',     'senectus',
        'netus',        'fames',        'quisque',      'euismod',      'curabitur',    'lectus',
        'elementum',    'tempor',       'risus',        'cras'
    );

    /**
     * @return float
     */
    public function getParagraphMean()
    {
        return $this->paragraphMean;
    }

    /**
     * @return float
     */
    public function getParagraphStDev()
    {
        return $this->paragraphStDev;
    }

    /**
     * @return float
     */
    public function getSentenceMean()
    {
        return $this->sentenceMean;
    }

    /**
     * @return float
     */
    public function getSentenceStDev()
    {
        return $this->sentenceStDev;
    }

    /**
     * @return array
     */
    public function getWords()
    {
        return $this->words;
    }
}