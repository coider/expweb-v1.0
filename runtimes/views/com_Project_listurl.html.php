<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title>expweb</title>
		<!-- 新 Bootstrap 核心 CSS 文件 -->
		<link rel="stylesheet" href="<?php echo $GLOBALS["public"]?>bots/css/bootstrap.min.css">
		<!-- 导入项目css文件-->
		<link rel="stylesheet" href="<?php echo $GLOBALS["public"]?>css/msgbox.css">
		<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
		<script src="<?php echo $GLOBALS["public"]?>bots/js/jquery.min.js"></script>
		<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
		<script src="<?php echo $GLOBALS["public"]?>bots/js/bootstrap.min.js"></script>
		<!--导入项目全局js文件-->
		<script src="<?php echo $GLOBALS["public"]?>js/expweb.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-default" role="navigation">
		   <div class="navbar-header">
			   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
				 <span class="sr-only">切换导航</span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
				 <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">EXPweb</a>
		   </div>
		   
		   <div class="collapse navbar-collapse" id="example-navbar-collapse">
			  <ul class="nav navbar-nav">
				 <li><a href="index.php?m=index&a=index">项目列表</a></li>
				 <li><a href="index.php?m=project&a=listpr">添加项目</a></li>
				 <li><a href="index.php?m=project&a=listexp">EXP目录</a></li>
				 <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					   用户操作 
					   <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
					   <li><a href="#">修改密码</a></li>
					   <li class="divider"></li>
					   <li><a href="javascript:logout();">退出</a></li>
					</ul>
				 </li>
			  </ul>
		   </div>
		</nav>
		<script type="text/javascript">
			//导航操作
			$("li").on("click",function(){
				$("li").removeClass("active");
				$(this).addClass("active");
			});

			//模态框操作
			function ctrModal(modalId,action){
				$('#'+modalId).modal(action);
			};

			function ajax_deal(action,formId,modalId){
				$.ajax({
					type:"POST",
					url:"index.php?m=Login&a="+action,
					data:$('#'+formId).serialize(),
					success:function(jsstr){
						obj = JSON.parse(jsstr);
						u.msg(obj.message,obj.type,obj.url);
						if(obj.type != 5) ctrModal('myLoginModal','hide');
					}
					
				
				});
			}
		</script>

		<!-- 模态框（Modal） -->
		<div class="modal fade" id="myLoginModal" tabindex="-2" role="dialog" aria-labelledby="myLoginModalLabel" aria-hidden="true" data-backdrop="static">
		   <div class="modal-dialog modal-sm">
			  <div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" 
					   data-dismiss="modal" aria-hidden="true">
						  &times;
					</button>
					<h4 class="modal-title" id="myModalLabel">
					   用户登录
					</h4>
				 </div>
				 <div class="modal-body">
					<form class="form-horizontal" id="myFormLogin">
					  <div class="form-group">
						<label for="username" class="col-sm-3 control-label">账号</label>
						<div class="col-sm-9">
						  <input type="email" class="form-control" name="username" id="username" placeholder="Username">
						</div>
					  </div>
					  <div class="form-group">
						<label for="password" class="col-sm-3 control-label">密码</label>
						<div class="col-sm-9">
						  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
					  </div>
					</form>
					
				 </div>
				 <div class="modal-footer">
					<button type="button" class="btn btn-default" onclick="ctrModal('myRegisterModal','show')">注册</button>
					<button type="button" class="btn btn-primary" onclick="ajax_deal('check','myFormLogin','myLoginModal')">登录</button>
				 </div>
			  </div><!-- /.modal-content -->
			</div>
		</div><!-- /.modal -->
		<!-- 模态框（Modal） -->
		<div class="modal fade" id="myRegisterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
		   <div class="modal-dialog modal-sm">
			  <div class="modal-content">
				 <div class="modal-header">
					<button type="button" class="close" 
					   data-dismiss="modal" aria-hidden="true">
						  &times;
					</button>
					<h4 class="modal-title" id="myModalLabel">
					   用户注册
					</h4>
				 </div>
				 <div class="modal-body">
					<form class="form-horizontal" id="myFormRegister">
					  <div class="form-group">
						<label for="username" class="col-sm-3 control-label">账号</label>
						<div class="col-sm-9">
						  <input type="email" class="form-control" name="username" id="username" placeholder="Username">
						</div>
					  </div>
					  <div class="form-group">
						<label for="password" class="col-sm-3 control-label">密码</label>
						<div class="col-sm-9">
						  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
						</div>
					  </div>
					  <div class="form-group">
						<label for="email" class="col-sm-3 control-label">邮箱</label>
						<div class="col-sm-9">
						  <input type="email" class="form-control" name="email" id="email" placeholder="email">
						</div>
					  </div>
					</form>
					
				 </div>
				 <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					<button type="button" class="btn btn-primary" onclick="ajax_deal('register','myFormRegister','myRegisterModal')">注册</button>
				 </div>
			  </div><!-- /.modal-content -->
			</div>
		</div><!-- /.modal -->
	<table class="table table-striped table-hover table-condensed">
			<thead>
				<tr>
					<th>WebShell</th>
					<th>创建时间</th>
					<th>Shell状态</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			 <?php foreach($this->tpl_vars["allShell"] as $this->tpl_vars["arr"]) { ?>
				<tr>
					<td><a href="<?php echo $this->tpl_vars["arr"]["url"]; ?>" target="_blank"><?php echo $this->tpl_vars["arr"]["url"]; ?></a></td>
					<td><?php echo $this->tpl_vars["arr"]["time"]; ?></td>
					<td><span class="label label-success ">可用</span></td>
					<td><a href="javascript:dealsome('index.php?m=project&a=delurl&token=','<?php echo $this->tpl_vars["arr"]["url_hash"]; ?>')">删除</a></td>
				</tr>
			 <?php } ?>
			</tbody>
	</table>
	</body>
</html>

