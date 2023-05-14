<?php declare(strict_types=1);

namespace mszl\core;

use PHPUnit\Framework\TestCase;

class TestConfReader extends TestCase
{
    private string $confPath;


    protected function setUp(): void
    {
        // 在每个测试方法执行之前初始化变量
        $this->confPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'conf' . DIRECTORY_SEPARATOR;
    }

    public function testIni()
    {
        $iniFile = $this->confPath . 'app1.ini';
        $config = parse_ini_file($iniFile, true);
        if ($config === false) {
            $error = error_get_last();
            console($error['message']);
        }
        $this->assertIsArray($config, '解析配置文件失败');

//        else {
//            // 解析成功，可以继续处理配置数据
//            // ...
//        }
//        $this->assertNotFalse($config, '解析配置文件失败');
//        $this->assertArrayHasKey('key1', $config, '配置文件缺少 key1');
//        $this->assertEquals('value1', $config['key1'], '配置文件 key1 值错误');
    }
}
