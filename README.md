PHP side for the distribution of tasks, python receiver and processing tasks, the two sides through API data exchange.

In the project, a url.py can be used to collect the target.

example:url.pyc "keywords"  "pages" "threads" ^v^  

Contact:codier@qq.com

Project Tree:

expweb
├── config.inc.php
├── corephp
│   ├── bases
│   │   ├── Controller.class.php
│   │   ├── Model.class.php
│   │   └── MyTpl.class.php
│   └── corephp.php
├── expweb
│   ├── controls
│   │   ├── ApiController.class.php
│   │   ├── CommonController.class.php
│   │   ├── IndexController.class.php
│   │   ├── LoginController.class.php
│   │   └── ProjectController.class.php
│   ├── models
│   └── views
│       ├── footer.html
│       ├── header.html
│       ├── Index_index.html
│       ├── Project_listall.html
│       ├── Project_listpr.html
│       └── Project_listurl.html
├── expweb-python
│   ├── dummy
│   │   ├── common.pyc
│   │   ├── __init__.py
│   │   └── __init__.pyc
│   ├── finecms.py
│   ├── finecms.pyc
│   ├── fucking.py
│   ├── tools.py
│   ├── tools.pyc
│   └── zoomla.py
├── expweb.sql
├── functions.inc.php
├── index.php
├── public
│   ├── bots
│   │   ├── css
│   │   │   ├── bootstrap.css
│   │   │   ├── bootstrap.css.map
│   │   │   ├── bootstrap.min.css
│   │   │   ├── bootstrap-theme.css
│   │   │   ├── bootstrap-theme.css.map
│   │   │   └── bootstrap-theme.min.css
│   │   ├── fonts
│   │   │   ├── glyphicons-halflings-regular.eot
│   │   │   ├── glyphicons-halflings-regular.svg
│   │   │   ├── glyphicons-halflings-regular.ttf
│   │   │   ├── glyphicons-halflings-regular.woff
│   │   │   └── glyphicons-halflings-regular.woff2
│   │   └── js
│   │       ├── bootstrap.js
│   │       ├── bootstrap.min.js
│   │       ├── jquery.min.js
│   │       └── npm.js
│   ├── css
│   │   ├── gb_tip_layer_ie6.png
│   │   ├── gb_tip_layer.png
│   │   ├── loading.gif
│   │   └── msgbox.css
│   └── js
│       └── expweb.js
├── README.md
├── runtimes
│   └── views
│       ├── com_Index_index.html.php
│       ├── com_Project_listpr.html.php
│       └── com_Project_listurl.html.php
├── url.py
├── url.txt
├── 主体框架.bmp
└── 数据库设计与交互流程.doc
