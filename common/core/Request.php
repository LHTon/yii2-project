<?php

namespace common\core;

use Yii;

class Request extends \yii\web\Request
{
    /**
     * 获取页面 GET/POST数据
     *
     * @author linhongtong
     * date: 2021/7/7 10:26
     */
    public function param($name, $defaultValue = null) {
        $value = $this->get($name);
        $vaule = (!empty($value)) ? $this->get($name) : $this->post($name);
        $vaule = (!empty($value)) ? $value : $defaultValue;
        return $value;
    }

    /**
     * 获取页面GET/POST的int数据
     *
     * @param $name
     * @param null $defaultValue
     * @return int
     * @author linhongtong
     * date: 2021/7/7 10:45
     */
    public function paramInt($name, $defaultValue = null) {
        return intval($this->param($name, $defaultValue));
    }

    /**
     * 重写核心框架的getBodyParams方法，添加过滤选项
     *
     * @return array|false|mixed
     * @throws \yii\base\InvalidConfigException
     * @author linhongtong
     * date: 2021/7/7 11:43
     */
    public function getBodyParams() {
        $bodyParams = parent::getBodyParams();
        // 将参数中的字符串过滤
        $bodyParams = $this->filter_input($bodyParams);
        $this->setBodyParams($bodyParams);
        return $bodyParams;
    }

    public function getQueryParams() {
        $queryParams = parent::getQueryParams();
        // 将参数中的字符串过滤
        $queryParams = $this->filter_input($queryParams);
        $this->setQueryParams($queryParams);
        return $queryParams;

    }

    /**
     * 过滤输入的数据
     *
     * @param $data
     * @param string $filter
     * @author linhongtong
     * date: 2021/7/7 10:55
     */
    public function filter_input($data, string $filter = '') {
        $filters = !empty($filter) ? $filter : Yii::$app->params['default_filter'];
        if ($filters) {
            $filters = explode(',', $filters);
            foreach ($filters as $filter) {
                $filter = trim($filter);
                if (!function_exists($filter)) {
                    continue;
                }

                // 参数过滤
                $data = $this->array_map_recursive($filter, $data);
            }
        }
        return $data;
    }

    /**
     * 递归处理待过滤的数据
     *
     * @param $filter
     * @param $data
     * @return array|false|mixed
     * @author linhongtong
     * date: 2021/7/7 11:42
     */
    public function array_map_recursive($filter, $data) {
        if (is_string($data)) {
            // data 为字符串
            return call_user_func($filter, $data);
        } elseif (is_array($data)) {
            // data 为数组
            $result = [];
            foreach ($data as $key => $val) {
                if (is_array($val)) {
                    // 这里只对字符串做处理
                    $result[$key] = call_user_func($filter, $val);
                }
            }
            return $result;
        }
        return $data;
    }
}
