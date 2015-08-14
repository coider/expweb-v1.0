PHP side for the distribution of tasks, python receiver and processing tasks, the two sides through API data exchange.

In the project, a url.py can be used to collect the target.

example:url.pyc "keywords"  "pages" "threads" ^v^  

Contact:codier@qq.com

Project Tree:

expweb
├── config.inc.php<br/>
├── corephp<br/>
│   ├── bases<br/>
│   │   ├── Controller.class.php<br/>
│   │   ├── Model.class.php<br/>
│   │   └── MyTpl.class.php<br/>
│   └── corephp.php<br/>
├── expweb<br/>
│   ├── controls<br/>
│   │   ├── ApiController.class.php<br/>
│   │   ├── CommonController.class.php<br/>
│   │   ├── IndexController.class.php<br/>
│   │   ├── LoginController.class.php<br/>
│   │   └── ProjectController.class.php<br/>
│   ├── models<br/>
│   └── views<br/>
│       ├── footer.html<br/>
│       ├── header.html<br/>
│       ├── Index_index.html<br/>
│       ├── Project_listall.html<br/>
│       ├── Project_listpr.html<br/>
│       └── Project_listurl.html<br/>
├── expweb-python<br/>
│   ├── dummy<br/>
│   │   ├── common.pyc<br/>
│   │   ├── __init__.py<br/>
│   │   └── __init__.pyc<br/>
│   ├── finecms.py<br/>
│   ├── finecms.pyc<br/>
│   ├── fucking.py<br/>
│   ├── tools.py<br/>
│   ├── tools.pyc<br/>
│   └── zoomla.py<br/>
├── expweb.sql<br/>
├── functions.inc.php<br/>
├── index.php<br/>
├── public<br/>
│   ├── bots<br/>
│   │   ├── css<br/>
│   │   │   ├── bootstrap.css<br/>
│   │   │   ├── bootstrap.css.map<br/>
│   │   │   ├── bootstrap.min.css<br/>
│   │   │   ├── bootstrap-theme.css<br/>
│   │   │   ├── bootstrap-theme.css.map<br/>
│   │   │   └── bootstrap-theme.min.css<br/>
│   │   ├── fonts<br/>
│   │   │   ├── glyphicons-halflings-regular.eot<br/>
│   │   │   ├── glyphicons-halflings-regular.svg<br/>
│   │   │   ├── glyphicons-halflings-regular.ttf<br/>
│   │   │   ├── glyphicons-halflings-regular.woff<br/>
│   │   │   └── glyphicons-halflings-regular.woff2<br/>
│   │   └── js<br/>
│   │       ├── bootstrap.js<br/>
│   │       ├── bootstrap.min.js<br/>
│   │       ├── jquery.min.js<br/>
│   │       └── npm.js<br/>
│   ├── css<br/>
│   │   ├── gb_tip_layer_ie6.png<br/>
│   │   ├── gb_tip_layer.png<br/>
│   │   ├── loading.gif<br/>
│   │   └── msgbox.css<br/>
│   └── js<br/>
│       └── expweb.js<br/>
├── README.md<br/>
├── runtimes<br/>
│   └── views<br/>
│       ├── com_Index_index.html.php<br/>
│       ├── com_Project_listpr.html.php<br/>
│       └── com_Project_listurl.html.php<br/>
├── url.py<br/>
├── url.txt<br/>
├── 主体框架.bmp<br/>
└── 数据库设计与交互流程.doc<br/>
