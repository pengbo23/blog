<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Documentation - jQuery EasyUI</title>
		<link rel="stylesheet" type="text/css" href="/jquery-easyui-1.5.1/themes/metro/easyui.css">
        <link rel="stylesheet" href="/jquery-easyui-1.5.1/kube.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="/jquery-easyui-1.5.1/main.css">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../../prettify/prettify.css">
		<script type="text/javascript" src="../../prettify/prettify.js"></script>
		<script type="text/javascript" src="/jquery-easyui-1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="/jquery-easyui-1.5.1/jquery.easyui.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('#tt').tabs({
					onLoad:function(panel){
						var plugin = panel.panel('options').title;
						panel.find('textarea[name="code-'+plugin+'"]').each(function(){
							var data = $(this).val();
							data = data.replace(/(\r\n|\r|\n)/g, '\n');
							if (data.indexOf('\t') == 0){
								data = data.replace(/^\t/, '');
								data = data.replace(/\n\t/g, '\n');
							}
							data = data.replace(/\t/g, '    ');
							var pre = $('<pre name="code" class="prettyprint linenums"></pre>').insertAfter(this);
							pre.text(data);
							$(this).remove();
						});
						prettyPrint();
					}
				});
				var sw = $(window).width();
				if (sw < 767){
					$('body').layout('collapse', 'west');
				}
				$('.navigation-toggle span').bind('click', function(){
					$('#head-menu').toggle();
				});
			});
			function open1(plugin){
				if ($('#tt').tabs('exists',plugin)){
					$('#tt').tabs('select', plugin);
				} else {
					$('#tt').tabs('add',{
						title:plugin,
						href:plugin+'.php',
						closable:true,
						bodyCls:'content-doc',
						extractor:function(data){
							data = $.fn.panel.defaults.extractor(data);
							var tmp = $('<div></div>').html(data);
							data = tmp.find('#content').html();
							tmp.remove();
							return data;
						}
					});
				}
			}
		</script>
		<style type="text/css">
			.tree-title{
				font-size: 14px;
			}
			.tree-title a{
				text-decoration: none;
			}
			#head-menu{
				position: absolute;
				z-index: 8;
				display: none;
				background: #2d3e50;
				color: #fff;
				left: 0;
				padding: 0 4.5%;
				top: 66px;
			}
			#head-menu .navbar{
				margin: 0 40px 20px 40px;
			}
			#head-menu a{
				color: #fff;
			}
		</style>
	</head>
	<body class="easyui-layout" style="text-align:left">
		<div id="head-menu">
			<div class="navbar navbar-right">
				<ul>
					<li><a href="/index.php">Home</a></li>
					<li><a href="/demo/main/index.php">Demo</a></li>
					<li><a href="/tutorial/index.php">Tutorial</a></li>
					<li><a href="/documentation/index.php">Documentation</a></li>
					<li><a href="/download/index.php">Download</a></li>
					<li><a href="/extension/index.php">Extension</a></li>
					<li><a href="/contact.php">Contact</a></li>
					<li><a href="/forum/index.php">Forum</a></li>
				</ul>
			</div>
		</div>
		<div region="north" border="false" class="group wrap header" style="height:66px;font-size:100%">
			<div class="content">
	<div class="navigation-toggle" data-tools="navigation-toggle" data-target="#navbar-1">
		<span>EasyUI</span>
	</div>
	<div id="elogo" class="navbar navbar-left">
		<ul>
			<li>
				<a href="/index.php"><img src="/images/logo2.png" alt="jQuery EasyUI"/></a>
			</li>
		</ul>
	</div>
	<div id="navbar-1" class="navbar navbar-right">
		<ul>
			<li><a href="/index.php">Home</a></li>
			<li><a href="/demo/main/index.php">Demo</a></li>
			<li><a href="/tutorial/index.php">Tutorial</a></li>
			<li><a href="/documentation/index.php">Documentation</a></li>
			<li><a href="/download/index.php">Download</a></li>
			<li><a href="/extension/index.php">Extension</a></li>
			<li><a href="/contact.php">Contact</a></li>
			<li><a href="/forum/index.php">Forum</a></li>
		</ul>
	</div>
	<div style="clear:both"></div>
</div>
<script type="text/javascript">
	function setNav(){
		var demosubmenu = $('#demo-submenu');
		if (demosubmenu.length){
			if ($(window).width() < 450){
				demosubmenu.find('a:last').hide();
			} else {
				demosubmenu.find('a:last').show();
			}
		}
		if ($(window).width() < 767){
			$('.navigation-toggle').each(function(){
				$(this).show();
				var target = $(this).attr('data-target');
				$(target).hide();
				setDemoNav();
			});
		} else {
			$('.navigation-toggle').each(function(){
				$(this).hide();
				var target = $(this).attr('data-target');
				$(target).show();
			});
		}
	}
	function setDemoNav(){
		$('.navigation-toggle').each(function(){
			var target = $(this).attr('data-target');
			if (target == '#navbar-demo'){
				if ($(target).is(':visible')){
					$(this).css('margin-bottom', 0);
				} else {
					$(this).css('margin-bottom', '2.3em');
				}
			}
		});
	}
	$(function(){
		setNav();
		$(window).bind('resize', function(){
			setNav();
		});
		$('.navigation-toggle').bind('click', function(){
			var target = $(this).attr('data-target');
			$(target).toggle();
			setDemoNav();
		});
	})
</script>		</div>
		<div region="west" split="true" title="Plugins" style="width:20%;min-width:180px;padding:5px;">
			<ul class="easyui-tree">
				<li iconCls="icon-base">
				<span>Base</span>
				<ul>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('parser')">parser</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('easyloader')">easyloader</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('draggable')">draggable</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('droppable')">droppable</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('resizable')">resizable</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('pagination')">pagination</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('searchbox')">searchbox</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('progressbar')">progressbar</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('tooltip')">tooltip</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('mobile')">mobile</a>
				</li>
				</ul>
				</li>
				<li iconCls="icon-layout">
				<span>Layout</span>
				<ul>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('panel')">panel</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('tabs')">tabs</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('accordion')">accordion</a>
				</li>
				<li iconCls="icon-gears">
				<a href="#" onclick="open1('layout')">layout</a>
				</li>
				</ul>
				</li><li iconCls="icon-menu"><span>Menu and Button</span><ul><li iconCls="icon-gears"><a href="#" onclick="open1('menu')">menu</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('linkbutton')">linkbutton</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('menubutton')">menubutton</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('splitbutton')">splitbutton</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('switchbutton')">switchbutton</a></li></ul></li><li iconCls="icon-form"><span>Form</span><ul><li iconCls="icon-gears"><a href="#" onclick="open1('form')">form</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('validatebox')">validatebox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('textbox')">textbox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('passwordbox')">passwordbox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('combo')">combo</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('combobox')">combobox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('combotree')">combotree</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('combogrid')">combogrid</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('combotreegrid')">combotreegrid</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('tagbox')">tagbox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('numberbox')">numberbox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('datebox')">datebox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('datetimebox')">datetimebox</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('datetimespinner')">datetimespinner</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('calendar')">calendar</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('spinner')">spinner</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('numberspinner')">numberspinner</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('timespinner')">timespinner</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('slider')">slider</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('filebox')">filebox</a></li></ul></li><li iconCls="icon-window"><span>Window</span><ul><li iconCls="icon-gears"><a href="#" onclick="open1('window')">window</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('dialog')">dialog</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('messager')">messager</a></li></ul></li><li iconCls="icon-datagrid"><span>DataGrid and Tree</span><ul><li iconCls="icon-gears"><a href="#" onclick="open1('datagrid')">datagrid</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('datalist')">datalist</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('propertygrid')">propertygrid</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('tree')">tree</a></li><li iconCls="icon-gears"><a href="#" onclick="open1('treegrid')">treegrid</a></li></ul></li>			</ul>
		</div>
		<div region="center">
			<div id="tt" class="easyui-tabs" fit="true" border="false" plain="true">
				<div title="welcome" href="{{ url('/welcome') }}" class="content-doc"></div>
			</div>
		</div>
	</body>
</html>