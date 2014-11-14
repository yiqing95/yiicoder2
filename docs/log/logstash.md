## 启动
按照官网上的步骤没办法启动的 报异常

通过把配置文件配置在单独的conf中就可以了
test.conf:

~~~

    input  {
    
    }
    
    output{
       elsaticserch{
           host=>localhost
       }
    }

~~~

然后启动：》logstash.bat agent -f test.conf