<?php
/*
 * This file is part of the Badcow Lorem Ipsum Generator.
 *
 * (c) Samuel Williams <sam@badcow.co>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Badcow\LoremIpsum;

use Badcow\LoremIpsum\Languages\LanguageInterface;

class Generator
{
    /** @var LanguageInterface */
    private $language;

    public function __construct(LanguageInterface $language)
    {
        $this->setLanguage($language);
    }

    /**
     * @param \Badcow\LoremIpsum\Languages\LanguageInterface $language
     */
    public function setLanguage(LanguageInterface $language)
    {
        $this->language = $language;
    }

    /**
     * @return \Badcow\LoremIpsum\Languages\LanguageInterface
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @return array
     */
    public function getWords()
    {
        return $this->getLanguage()->getWords();
    }

    /**
     * @return float
     */
    public function getParagraphMean()
    {
        return $this->getLanguage()->getParagraphMean();
    }

    /**
     * @return float
     */
    public function getParagraphStDev()
    {
        return $this->getLanguage()->getParagraphStDev();
    }

    /**
     * @return float
     */
    public function getSentenceMean()
    {
        return $this->getLanguage()->getSentenceMean();
    }

    /**
     * @return float
     */
    public function getSentenceStDev()
    {
        return $this->getLanguage()->getSentenceStDev();
    }

    /**
     * Get an array of random words from $words
     *
     * @param int $count
     * @return array
     */
    public function getRandomWords($count)
    {
        $words = array();

        for ($i = 0; $i < $count; $i++) {
            $word = $this->getWords()[array_rand($this->getWords())];
            if ($i > 0 && $words[$i - 1] === $word) {
                $i--;
                continue;
            }

            $words[] = $word;
        }

        return $words;
    }

    /**
     * Get an array of sentences
     *
     * @param int $count
     * @return array
     */
    public function getSentences($count)
    {
        $sentences = array();

        for ($i = 0; $i < $count; $i++) {
            $wordCount = Statistics::gauss_ms($this->getSentenceMean(), $this->getSentenceStDev());
            $sentence = $this->getRandomWords($wordCount);
            $sentences[] = $this->toSentence($sentence);
        }

        return $sentences;
    }

    /**
     * Get an array of paragraphs
     *
     * @param $count
     * @return array
     */
    public function getParagraphs($count)
    {
        $paragraphs = array();

        for ($i = 0; $i < $count; $i++) {
            $number = Statistics::gauss_ms($this->getParagraphMean(), $this->getParagraphStDev());
            $sentences = $this->getSentences($number);
            $paragraphs[] = implode(' ', $sentences);
        }

        return $paragraphs;
    }

    /**
     * Inserts commas and periods in the given
     * word array and capitalises first letter.
     *
     * @param array $sentence
     * @return string
     */
    protected function toSentence(array $sentence)
    {
        $count = count($sentence);
        $sentence[$count - 1] = $sentence[$count - 1] . '.';
        $sentence[0] = ucfirst($sentence[0]);

        if ($count < 4) {
            return implode(' ', $sentence);
        }

        $commas = $this->numberOfCommas($count);

        for ($i = 1; $i <= $commas; $i++) {
            $index = (int) round($i * $count / ($commas + 1));

            if ($index < ($count - 1) && $index > 0) {
                $sentence[$index] = $sentence[$index] . ',';
            }
        }

        return implode(' ', $sentence);
    }

    /**
     * Determines the number of commas for a
     * sentence of the given length. Average and
     * standard deviation are determined superficially
     *
     * @param int $len
     * @return int
     */
    public function numberOfCommas($len)
    {
        $avg = (float) log($len, 6);
        $stdDev = (float) $avg / 6.000;

        return (int) round(Statistics::gauss_ms($avg, $stdDev));
    }
}