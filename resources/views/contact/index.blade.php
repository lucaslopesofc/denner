<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>

	<meta charset="utf-8" http-equiv="Content-Type" content="text/html" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
	<meta name="format-detection" content="telephone=no" />
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
	<title>Simplicity Responsive</title>
	<style type="text/css">
	
		/* ===> Importing Fonts <=== */
		@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,500);
		@import url(https://fonts.googleapis.com/css?family=Open+Sans);
		@import url(https://fonts.googleapis.com/css?family=Raleway:200,300,400,600,800);
	
		/* ===> Global CSS <=== */
		.ReadMsgBody{width:100%;background-color:#ffffff;}
		.ExternalClass{width:100%;background-color:#ffffff;}
		.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:100%;}
		html{width: 100%;}
		body{-webkit-text-size-adjust:none;-ms-text-size-adjust:none;margin:0;padding:0;}
		table{border-spacing:0;border-collapse:collapse;}
		table td{border-collapse:collapse;}
		img{display:block !important;}
		a{text-decoration:none;color:#e91e63;}
	
		/* ===> Responsive CSS For Tablets <=== */
		@media only screen and (max-width:640px) {
			body{width:auto !important;}
			table[class="tab-1"] {width:450px !important;}
			table[class="tab-2"] {width:47% !important;text-align:left !important;}
			table[class="tab-3"] {width:100% !important;text-align:center !important;}
			img[class="img-1"] {width:100% !important;height:auto !important;}
		}
	
		/* ===> Responsive CSS For Phones <=== */
		@media only screen and (max-width:480px) {
			body { width: auto !important; }
			table[class="tab-1"] {width:290px !important;}
			table[class="tab-2"] {width:100% !important;text-align:left !important;}
			table[class="tab-3"] {width:100% !important;text-align:center !important;}
			img[class="img-1"] {width:100% !important;}
		}
		
	</style>

</head>
<body>
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">

	<!-- ====> STARTING <========================= -->
	<!--               Logo Section                -->
	<!-- ========================================= -->
	<tr bgcolor="#00BCD4">
		<td align="center">
			<table class="tab-1" align="center" cellspacing="0" cellpadding="0" width="600">
				
				<tr><td height="20"></td></tr>
				
				<tr>
					<!-- ===> img : Logo <=== -->
					<td align="left" >
						<img src="https://i.imgur.com/D8WU1WQ.png" width="company_logo_20.png" alt="Company Logo" >
					</td>
					
					<td align="right">
						<table>
							
							<tr>
								<!-- ===> text : Company name <=== -->
								<td  align="right" style="font-family: 'Raleway', Sans-Serif; font-size: 25px; color: white; letter-spacing: 1px;">
									Nome: {{ $dados->name }}
								</td>
							</tr>
							
							<tr><td height="3"></td></tr>
							
							<tr>
								<td  align="right" style="font-family: 'Raleway', Sans-Serif; font-size: 15px; color: white; letter-spacing: 1px;">
									Email: {{ $dados->email }}
								</td>
							</tr>

							<tr>
								<td  align="right" style="font-family: 'Raleway', Sans-Serif; font-size: 15px; color: white; letter-spacing: 1px;">
									Telefone: {{ $dados->phone }}
								</td>
							</tr>

							<tr>
								<td  align="right" style="font-family: 'Raleway', Sans-Serif; font-size: 15px; color: white; letter-spacing: 1px;">
									Assunto: {{ $dados->subject }}
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				
				<tr><td height="20"></td></tr>
				
			</table>
		</td>
	</tr>
	<!-- ========================================= -->
	<!--               Logo Section                -->
	<!-- ===========================> ENDING <==== -->


	<!-- ====> STARTING <========================= -->
	<!--                 Features                  -->
	<!-- ========================================= -->
	<tr bgcolor="#ffffff">
		<td align="center">
			<table width="600" align="center" class="tab-1" cellspacing="0" cellpadding="0" >
				
				<tr><td height="70"></td></tr>
				
				<tr>
					<!-- ===> Module Title <=== -->
					<td  align="center" style="text-transform: uppercase; font-family: 'Raleway', Sans-Serif; font-size: 20px; color: #00BCD4; font-weight: 800; letter-spacing: 1.2px; line-height: 22px;">
						#Mensagem
					</td>
				</tr>
				
				<tr><td height="20"></td></tr>
				
				<tr>
					<td align="center">
						<table width="300" align="center" cellspacing="0" cellpadding="0" >
							
							<tr>
								<td align="center" style="background: #e0e0e0; height: 1px;"></td>
							</tr>
							
						</table>
					</td>
				</tr>
				
				<tr><td height="30"></td></tr>

				<tr>								
					<td>
						<table align="center" cellspacing="0" cellpadding="0" >
							<tr>
								<td tdtype="ts" align="left" style="font-family: 'open sans', Sans-Serif; font-size: 16px; color: #808080; letter-spacing: .5px; line-height: 22px;">
									<multiline label="Description">{{ $dados->message }}</multiline>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr><td height="70"></td></tr>
				
			</table>
		</td>
	</tr>
	<!-- ========================================= -->
	<!--                 Features                  -->
	<!-- ===========================> ENDING <==== -->



	<!-- ====> STARTING <========================= -->
	<!--             Footer Copyright              -->
	<!-- ========================================= -->
	<tr bgcolor="#282828" style="border-top: 5px solid #404040;">
		<td align="center">
			<table width="600" align="center" class="tab-1" cellspacing="0" cellpadding="0" >
				
				<tr><td height="50"></td></tr>
				
				<tr>
					<td>
												
						<!-- ===> Copyright <=== -->
						<table align="center" class="tab-3" cellspacing="0" cellpadding="0">
							<tr>
								<!-- ===> Copyright Text <=== -->
								<td style="font-family: 'Raleway', Sans-Serif; font-size: 17px; color: white; letter-spacing: .7px; line-height: 22px;">
									Denner Grillo &copy; Todos os direitos reservados
								</td>
							</tr>
						</table>
						 
					</td>
				</tr>
				
				<tr><td height="40"></td></tr>
				
			</table>
		</td>
	</tr>
	<!-- ========================================= -->
	<!--             Footer Copyright              -->
	<!-- ===========================> ENDING <==== -->




</table>
</body>
</html>