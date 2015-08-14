# coding:utf-8

import base64,json,re,hashlib
from dummy import *

class Tools:
    def __init__(self):
        self.key = '297c6fb50b4fb44f37d0613a54047d' 
    #http://localhost/web/index.php?m=api&a=gettask
    #每次获取一条任务
    def getTask(self,url):
        mycurl = miniCurl.Curl() 
        code,head,res,errcode,_ = mycurl.curl(url + 'expweb/index.php?m=api&a=getTask')
        if code ==200 and res != 'notask':
            gtask = json.loads(self.data_decode(res,self.key))
            return gtask
        else:
            return 'notask'

    #数据解码解密
    #data 解密数据
    #key 解密key
    #返回值 is string '{"project_hash":"9792235009da8ac019028d577c1cf7","url":"http://www.baidu.com/shell.php"}'
    def data_decode(self,data,key):
        data = base64.b64decode(data)
        datalength = len(data)
        keylength = len(key)
        task = []
        for i in range(datalength):
            task.append((ord(data[i]) - ord(key[i % keylength])) % 256)
        return ''.join(chr(i) for i in task)
    
     #数据加密编码
     #data 加密数据
     #data is string '{"project_hash":"9792235009da8ac019028d577c1cf7","url":"http://www.baidu.com/shell.php"}'
     #key 加密key
    def data_encode(self,data,key):
         datalength = len(data)
         keylength = len(key)
         ret = ''
         for i in range(datalength):
             ret += chr((ord(data[i])+ord(key[i % keylength]))%256)
         return base64.b64encode(ret)
    #md5 加密
    def md5(self,str):
        m = hashlib.md5()  
        m.update(str)
        return m.hexdigest()
    #字符串提取url列表
    def getAllUrl(self,allurlstr):
              return re.findall(r'(http:\/\/.*?\/)',allurlstr)
    

    


    
    