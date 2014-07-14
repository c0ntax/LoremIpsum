<?php
/**
 * Created by PhpStorm.
 * User: dan
 * Date: 14/07/14
 * Time: 14:53
 */

namespace Badcow\LoremIpsum\Languages;


interface LanguageInterface
{
    /**
     * @return float
     */
    public function getParagraphMean();

    /**
     * @return float
     */
    public function getParagraphStDev();

    /**
     * @return float
     */
    public function getSentenceMean();

    /**
     * @return float
     */
    public function getSentenceStDev();

    /**
     * @return array
     */
    public function getWords();
}