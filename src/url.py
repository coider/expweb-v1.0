# coding: UTF-8
import urllib
import re
import sys
import os
import threading
from time import ctime
#sys.stderr = None

#获取每页URL,返回当前页URL 列表
def getUrl(url):
    page = urllib.urlopen(url)
    srcHtml = page.read()
    
    reg = '<span class="g">([a-zA-Z0-9<b></b>\._-]+\.[a-zA-Z]{2,6})/.*?</span>'
    aListUrl = re.findall(reg,srcHtml)
    
    for index in range(len(aListUrl)): 
           reg = '[<b>|</b>]'
           ok = re.sub(reg,'',aListUrl[index])
           if ok:
               aListUrl[index] = ok
    return aListUrl

#拼装所有请求页URL地址 "Codier's Blog" "30"
def getPage(search,num,threadNum):
    pageList = []
    for index in range(0,num):
        strBuff = "http://www.baidu.com/s?wd="+search+"&pn="
        nowPage = index*10
        strBuff = strBuff + str(nowPage)
        pageList.append(strBuff)
    return pageList,threadNum

#封装多线程对象列表
def creMultiThread(allPageList,threadNum=2):
    if len(allPageList) < 100:#如果页数少于10页，则不使用多线程
        getPageListUrl(allPageList)
    else:
        threads = []
        nextpage = ceil(len(allPageList)/(10*threadNum))
        for index in range(0,threadNum):
            threads.append(threading.Thread(target=getPageListUrl,args=(pageList[nextpage*index*10:nextpage*(index+1)*10],)))
            for thd in threads:
                thd.setDaemon(True)
                thd.start()
                    
            for thd in threads:
                thd.join()
resultList = []
def getPageListUrl(pageList):
    global resultList
    for index in pageList:
        for index2 in getUrl(index):
            print index2
            resultList.append(index2)

#把每页采集到的URL写入文件
def putFile(allUrl):
    if os.path.exists("url.txt"):
        print u"己删除历史记录,将重新生成采集url...."
        os.remove("url.txt")
    for index in allUrl:
        file = open("url.txt","a+")
        file.write("http://"+index+"/\n")
        file.close()
#多线程跑起来
if __name__ == '__main__':
    if len(sys.argv) == 4:
        list = getPage(str(sys.argv[1]),int(sys.argv[2]),int(sys.argv[3]))
        st = ctime()
        creMultiThread(list[0],list[1])
        result = set(resultList)
        print u'''
        -----------------------------------------------------
                    多线程百度URL采集器 python:2.7.10
        -----------------------------------------------------
                                                                                    
        ^v^ example:geturl.pyc "关键字"  "页数" "线程数" ^v^  
        ^v^    team:http://www.codier.cn                       ^v^ 
            codier_qq:510623849
        -----------------------------------------------------
        '''
        putFile(result)
        print u"开始时间:"+st
        print u"结束时间:"+ctime() 
        print u"总共采集"+str(len(resultList))+u"条url........."
        print u"去除重复剩余"+str(len(result))+u"条url........."
        print u"采集结果已经自动保存当前目录 url.txt 文件中....."
    elif len(sys.argv) < 4:
        print u'''
            -----------------------------------------------------
                          多线程百度URL采集器 python:2.7.10
            -----------------------------------------------------
                                                                           
               ^v^ example:geturl.pyc "关键字"  "页数" "线程数" ^v^  
               ^v^    team:http://www.codier.cn                ^v^ 
                 codier_qq:510623849
            -----------------------------------------------------
            '''
    
    
    



    
    


    

    