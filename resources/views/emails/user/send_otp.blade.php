<!DOCTYPE html>
<html>
<head>
	<title>Verify Your Account</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="HTML, CSS, JavaScript">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1:8000/front/css/font-awesome.min.css">
	<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700');
		body {font-family: 'Montserrat', sans-serif;}
		.template_wrapper p{line-height: 25px;font-size:14px;}
		.b2b_temp_content {
		    max-width: 500px;
		    margin: auto;
		    padding: 0 15px;
		}
		.template_footer_social > ul {
		    padding: 0 0 20px 0;
		    margin: 0 -2px;
		    width: 100%;
		    text-align: center;
		}
		.template_footer_social > ul > li {
		    display: inline-block;
		    padding:0 2px;
		}
		.template_footer_social > ul > li > a {
		    background: #4c4c4c none repeat scroll 0 0;
		    border-radius: 50%;
		    display: inline-block;
		    height: 35px;
		    width: 35px;
		    line-height: 35px;
		    color: #fff;
		    font-size: 14px;
		    text-align: center;
		    transition: all 0.3s ease 0s;
		}
		.template_footer_social > ul > li > a:hover {background: #ec1827;}
	</style>
</head>
<body style="margin: 0;padding: 0;">
<div class="template_wrapper">
	<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f7f7f7">
		<tr>
			<td align="center" style="padding: 25px 0;">
				<div class="logo">
					<a href="{{route('/')}}"><span style="color: #ec1827;font-weight: bold;font-size: 24px;">Good Firmz</span></a>
				</div>
			</td>
		</tr>
	</table>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" class="b2b_temp_content">
		<tr style="padding: 40px 0; display: block;">
			<td style="display: block;">
				<p>Hi <b>{{$otp['name']}}</b></p>
			</td>
		</tr>
		<tr style="padding: 40px 0; display: block;">
			<td style="display: block;">
				<p>Please verify your account. Your otp is <b>{{$otp['otp']}}</b></p>
			</td>
		</tr>
	</table>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f7f7f7" style="padding: 20px 0;">
		<tr>
			<td>
				<div class="template_footer_social">
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
						<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li>
						<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
					</ul>
				</div>
			</td>
		</tr>
		<tr>
	        <td align="center" style="font-size: 15px;">&copy; 2021 Good Firmz - All Rights Reserved. 
	        </td>
        </tr>
	</table>
</div>
</body>
</html>