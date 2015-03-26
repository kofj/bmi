<?php
namespace kofj\BMI;

/**
 *
 * @since  2015-03-26 18:21:23
 * @author Konsta Vesterinen <kvesteri@cc.hut.fi>
 * @author Jonathan H. Wage <jonwage@gmail.com>
 */

class BMI
{

    /**
     * 体重指数
     *
     * @var
     */
    public $BMI;

    /**
     * 年龄段索引
     *
     * @var
     */
    private $ageIndex;

    /**
     * BMI建议索引
     *
     * @var
     */
    private $adviceIndex;

    /**
     * 年龄段BMI标准
     *
     * @var
     */
    private $standardArray = [
        0 => [// 3-2 上限
            0 => [14.2, 17.0, 18.5, null],
            1 => [14.4, 17.6, 19.2, null],
        ],
        1 => [// 5-6 上限
            0 => [13.9, 17.0, 18.8, null],
            1 => [14.0, 17.6, 19.3, null],
        ],
        2 => [// 7-8 上限
            0 => [13.4, 17.8, 20.2, null],
            1 => [13.6, 18.4, 20.4, null],
        ],
        3 => [// 9-10 上限
            0 => [13.6, 19.4, 22.0, null],
            1 => [14.1, 20.1, 22.6, null],
        ],
        4 => [// 11-12 上限
            0 => [14.1, 20.8, 23.6, null],
            1 => [14.6, 21.8, 24.5, null],
        ],
        5 => [// 13-14 上限
            0 => [15.2, 22.2, 24.8, null],
            1 => [15.6, 22.5, 25.2, null],
        ],
        6 => [// 15-16 上限
            0 => [16.4, 22.7, 25.2, null],
            1 => [16.4, 23.2, 26.3, null],
        ],
        7 => [// 17-18 上限
            0 => [17.0, 23.3, 25.7, null],
            1 => [17.2, 23.8, 27.3, null],
        ],
        8 => [// 19-20 上限
            0 => [17.1, 23.9, 27.9, null],
            1 => [17.8, 23.9, 27.9, null],
        ],
        9 => [// 21-100 上限
            0 => [18.5, 24.9, 28.0, null],
            1 => [18.5, 24.9, 28.9, null],
        ],
    ];

    /**
     * 年龄段数据
     *
     * @var
     */
    private $ageIndexArray = array(4, 6, 8, 10, 12, 14, 16, 18, 20, 100);

    /**
     * BMI建议数据
     *
     * @var
     */
    private $advice = array('underWeight', 'normalRange', 'overWeight', 'obese');

    public function __construct($height, $weight)
    {
        $height = $height / 100;
        $this->BMI = round($weight / ($height * $height), 1);
    }

    public function get()
    {
        return $this->BMI;
    }

    public function getAdvice($age, $sex)
    {
        $this->ageIndex = $this->getAgeIndex($age);
        $this->adviceIndex = $this->getAdviceIndex($this->BMI, $this->standardArray[$this->ageIndex][$sex]);
        return $this->advice[$this->adviceIndex];
    }

    /**
     * 获取年龄段索引
     *
     * @var int $age
     * @var array $ageIndexArray
     * @return int
     */
    private function getAgeIndex($age)
    {
        if ($age < 3) {
            return false;
        }
        $i = 0;
        while ($age > $this->ageIndexArray[$i]) {
            $i++;
        }
        return $i;
    }

    /**
     * 获取评价标准索引
     *
     * @var int $bmi
     * @var array $ageIndex
     * @return int $age
     */
    private function getAdviceIndex($bmi, $standardArray)
    {
        $i = 0;
        while ($bmi > $standardArray[$i] and !empty($standardArray[$i])) {
            $i++;
        }
        return $i;
    }
}
