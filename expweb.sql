/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50508
Source Host           : 127.0.0.1:3306
Source Database       : expweb

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2015-07-16 08:36:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for exp_project
-- ----------------------------
DROP TABLE IF EXISTS `exp_project`;
CREATE TABLE `exp_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_desc` varchar(255) NOT NULL,
  `project_hash` varchar(30) NOT NULL,
  `user_hash` varchar(25) NOT NULL,
  `target` text NOT NULL,
  `setting` text NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_project
-- ----------------------------
INSERT INTO `exp_project` VALUES ('60', 'ceshi', 'ceshi', '5f1c174271304db581abbca8ad68cd', 'd08d5f2e5d8594500bdbf91bd', 'http://themeforest.net/\r\nhttp://www.chinaedu.e/\r\nhttp://10086.jl.cn/\r\nhttp://plumr.eu/\r\nhttp://www.17ce.com/\r\nhttp://www.dokuwiki.org/\r\nhttp://faq.comsenz.com/\r\nhttp://www.oschina.net/\r\nhttp://www.spsswj.gov.cn/\r\nhttp://www.mfashi.com/\r\nhttp://www.aifung.com/\r\nhttp://coenraets.org/\r\nhttp://www.jiexieyin.org/\r\nhttp://unix.eng.ua.edu/\r\nhttp://s.phpcms.cn/\r\nhttp://pyd.io/\r\nhttp://www.phpinfo.me/\r\nhttp://new.shi720.com/\r\nhttp://www.technologizer.com/\r\nhttp://www.523we.com/\r\nhttp://www.0826jz.com/\r\nhttp://ymwx.lsu.edu.cn/\r\nhttp://www.finecms.pl/\r\nhttp://www.phpwind.net/\r\nhttp://www.china-wu.com/\r\nhttp://e107.org/\r\nhttp://www.olympusmicro.com/\r\nhttp://www.yanmon.com/\r\nhttp://vip.finecms.net/\r\nhttp://www.huomao.net/\r\nhttp://www.it0527.com/\r\nhttp://faq.phpwind.net/\r\nhttp://www.tio.cc/\r\nhttp://chengcha.com.cn/\r\nhttp://www.0991c.com/\r\nhttp://tcw.ias3.com/\r\nhttp://v.youku.com/\r\nhttp://www.ren21.net/\r\nhttp://www.asp.net/\r\nhttp://www.ppmag.com/\r\nhttp://outstar.lamost.org/\r\nhttp://www.yeaxun.com/\r\nhttp://www.seocxw.com/\r\nhttp://2.finecms.net/\r\nhttp://it0453.com/\r\nhttp://unixpapa.com/\r\nhttp://demo.finecms.net/\r\nhttp://www.artscs.com/\r\nhttp://www.cnwzml.com/\r\nhttp://lonelypeople.com.cn/\r\nhttp://jpkc.swufe.edu.cn/\r\nhttp://aishagz.com/\r\nhttp://fox.cs.vt.edu/\r\nhttp://www.estdownload.pl/\r\nhttp://www.ttlly.com/\r\nhttp://minwe.cn/\r\nhttp://www.tweaksoftware.com/\r\nhttp://www.10086.jl.cn/\r\nhttp://down.shi720.com/\r\nhttp://www.markhamstra.com/\r\nhttp://www.360doc.com/\r\nhttp://www.sunwha8898.com.cn/\r\nhttp://www.dz000.com/\r\nhttp://www.52sweetstory.com/\r\nhttp://www.tfship.com/\r\nhttp://www.idc-log.com/\r\nhttp://www.aspcms.com/\r\nhttp://ivd.xindushi.com.cn/\r\nhttp://doteduguru.com/\r\nhttp://www.leavesongs.com/\r\nhttp://dispcalgui.hoech.net/\r\nhttp://www.gswhgz.com/\r\nhttp://www.ip2location.com/\r\nhttp://www.ptjs.net/\r\nhttp://www.dayrui.net/\r\nhttp://www.mmo-champion.com/\r\nhttp://log.sina.com.cn/\r\nhttp://www.redaks.com/\r\nhttp://www.5yaofu.com/\r\nhttp://en.wikipedia.org/\r\nhttp://html.net/\r\nhttp://pkhuzqt.org/\r\nhttp://www.finecms.eu/\r\nhttp://www.techradar.com/\r\nhttp://www.pyrocms.com/\r\nhttp://www.siteloop.net/\r\nhttp://finecms.jrkzw.cn/\r\nhttp://521yingzi.com.cn/\r\nhttp://www.newfinecn.com/\r\nhttp://www.minwe.cn/\r\nhttp://www.cnzxz.com/\r\nhttp://lswh.lcu.edu.cn/\r\nhttp://www.concrete5.org/\r\nhttp://www.we3389.com/\r\nhttp://yule.shi720.com/\r\nhttp://qwone.com/\r\nhttp://code.taoao.org/\r\nhttp://dev.mysql.com/\r\nhttp://www.templatemonster.com/\r\nhttp://finecms.adtfw.com/\r\nhttp://www.sanjise.com.cn/\r\nhttp://dygoit.com/\r\nhttp://www.finecms.net/\r\nhttp://log.mgm-tp.com/\r\nhttp://nodcms.com/\r\nhttp://stackoverflow.com/\r\nhttp://www.wakehealth.edu/\r\nhttp://lama.life/\r\nhttp://212213.com/\r\nhttp://www.fzgclz.com/\r\nhttp://www.tinaq.clu/\r\nhttp://www.server889.com/\r\nhttp://www.ancestry.com/\r\nhttp://www.creativeloq.com/\r\nhttp://www.finestyle.cn/\r\nhttp://www.wzxly.com/\r\nhttp://store.steampowered.com/\r\nhttp://expocms.86clouds.com/\r\nhttp://img.shi720.com/\r\nhttp://www.telerik.com/\r\nhttp://lytyj.com/\r\nhttp://wed9.com/\r\nhttp://www.gsl.xwie.com/\r\nhttp://www.aizhan.com/\r\nhttp://por.tw/\r\nhttp://www.mattcutts.com/\r\nhttp://www.spzscq.gov.cn/\r\nhttp://www.mathsisfun.com/\r\nhttp://www.cnseay.com/\r\nhttp://s.locoy.com/\r\nhttp://s.rccms.com/\r\nhttp://www.chemate.net/\r\nhttp://www.wed9.com/\r\nhttp://www.getfuelcms.com/\r\nhttp://en.phdhzx.net/\r\nhttp://www.gtp-icommerce.com/\r\nhttp://fhjp.org/\r\nhttp://www.xpar.com/', 'a:1:{i:0;s:7:\"finecms\";}', '1437006301', '1');

-- ----------------------------
-- Table structure for exp_url
-- ----------------------------
DROP TABLE IF EXISTS `exp_url`;
CREATE TABLE `exp_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_hash` varchar(30) NOT NULL,
  `url_hash` varchar(25) NOT NULL,
  `time` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_url
-- ----------------------------
INSERT INTO `exp_url` VALUES ('47', '5f1c174271304db581abbca8ad68cd', '62c13a3fcfd0e4fd432846e2a', '1437006532', 'http://it0453.com/dayrui/libraries/tmp-upload-images/test3910.php');
INSERT INTO `exp_url` VALUES ('48', '5f1c174271304db581abbca8ad68cd', '11f91f611c1b19cf4fde9e744', '1437006533', 'http://pkhuzqt.org/dayrui/libraries/tmp-upload-images/test6010.php');
INSERT INTO `exp_url` VALUES ('49', '5f1c174271304db581abbca8ad68cd', 'e3a3f8bf85503aae76ed47dca', '1437006533', 'http://finecms.jrkzw.cn/dayrui/libraries/tmp-upload-images/test8784.php');
INSERT INTO `exp_url` VALUES ('50', '5f1c174271304db581abbca8ad68cd', 'dbb0ae6cf643bf8be1d748b90', '1437006533', 'http://dygoit.com/dayrui/libraries/tmp-upload-images/test1013.php');
INSERT INTO `exp_url` VALUES ('51', '5f1c174271304db581abbca8ad68cd', 'b32df7e83bb423386bec535fa', '1437006533', 'http://lama.life/dayrui/libraries/tmp-upload-images/test6587.php');
INSERT INTO `exp_url` VALUES ('52', '5f1c174271304db581abbca8ad68cd', 'abc3bc2b7f3828f802d91b1b7', '1437006533', 'http://www.wzxly.com/dayrui/libraries/tmp-upload-images/test9421.php');
INSERT INTO `exp_url` VALUES ('53', '5f1c174271304db581abbca8ad68cd', '1e41a141493a553c46544e0b3', '1437006533', 'http://lytyj.com/dayrui/libraries/tmp-upload-images/test3645.php');
INSERT INTO `exp_url` VALUES ('54', '5f1c174271304db581abbca8ad68cd', 'e00363a491a3b38724ae7a371', '1437006533', 'http://fhjp.org/dayrui/libraries/tmp-upload-images/test3427.php');

-- ----------------------------
-- Table structure for exp_users
-- ----------------------------
DROP TABLE IF EXISTS `exp_users`;
CREATE TABLE `exp_users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `usrname` varchar(12) NOT NULL,
  `usrpass` varchar(20) NOT NULL,
  `email` varchar(120) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(32) NOT NULL,
  `user_hash` varchar(25) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of exp_users
-- ----------------------------
INSERT INTO `exp_users` VALUES ('61', 'admin', '7383502de886223a617c', 'admin@qq.com', '1436696313', '', '53c3ada71dda8b452c1b3e643');
INSERT INTO `exp_users` VALUES ('62', 'test', '6af7a48daa6b3abfa242', 'test@qq.com', '1436951470', '', '8972e220b9dacd1dc9e66fcf8');
INSERT INTO `exp_users` VALUES ('63', 'codier', 'd79b22cc9d2e399a0d03', 'codier@qq.com', '1437006278', '', 'd08d5f2e5d8594500bdbf91bd');
