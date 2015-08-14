#!/usr/bin/env python
# -*- coding: utf-8 -*-
from common import *
import util
import miniCurl
curl = miniCurl.Curl()

_G = {
    'scanport':False,
    'subdomain': False,
    'target': 'www.abc.com',
    'disallow_ip':['127.0.0.1'],
    'kv' : {},
    #'user_dict':'http://192.168.0.158/1.txt'
    #'pass_dict':'http://192.168.0.158/1.txt'
    }

util._G = _G

def debug(fmt, *args):
    print(fmt % args)

LEVEL_NOTE = 0
LEVEL_INFO =1
LEVEL_WARNING = 2
LEVEL_HOLE = 3

def _problem(level, body):
    debug('[LOG] <%s> %s', ['note', 'info', 'warning', 'hole'][level], body)

security_note = lambda body : _problem(LEVEL_NOTE, body)
security_info = lambda body : _problem(LEVEL_INFO, body)
security_warning = lambda body : _problem(LEVEL_WARNING, body)
security_hole = lambda body : _problem(LEVEL_HOLE, body)

def task_push(service, arg, uuid = None, target=None):
    if uuid is None:
        uuid = str(arg)
        
    debug('[JOB] <%s> %s (%s/%s)', service, arg, uuid, target)

