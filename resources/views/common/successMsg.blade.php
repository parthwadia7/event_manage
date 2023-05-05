<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
	xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
	<meta charset="utf-8"> <!-- utf-8 works for most cases -->
	<meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
	<meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
	<title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->


	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

	<!-- CSS Reset : BEGIN -->
	<style>
		html,
		body {
			margin: 0 auto !important;
			padding: 0 !important;
			height: 100% !important;
			width: 100% !important;
			background: #f1f1f1;
		}

		/* What it does: Stops email clients resizing small text. */
		* {
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%;
		}

		/* What it does: Centers email on Android 4.4 */
		div[style*="margin: 16px 0"] {
			margin: 0 !important;
		}

		/* What it does: Stops Outlook from adding extra spacing to tables. */
		table,
		td {
			mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
		}

		/* What it does: Fixes webkit padding issue. */
		table {
			border-spacing: 0 !important;
			border-collapse: collapse !important;
			table-layout: fixed !important;
			margin: 0 auto !important;
		}

		/* What it does: Uses a better rendering method when resizing images in IE. */
		img {
			-ms-interpolation-mode: bicubic;
		}

		/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
		a {
			text-decoration: none;
		}

		/* What it does: A work-around for email clients meddling in triggered links. */
		*[x-apple-data-detectors],
		/* iOS */
		.unstyle-auto-detected-links *,
		.aBn {
			border-bottom: 0 !important;
			cursor: default !important;
			color: inherit !important;
			text-decoration: none !important;
			font-size: inherit !important;
			font-family: inherit !important;
			font-weight: inherit !important;
			line-height: inherit !important;
		}

		/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
		.a6S {
			display: none !important;
			opacity: 0.01 !important;
		}

		/* What it does: Prevents Gmail from changing the text color in conversation threads. */
		.im {
			color: inherit !important;
		}

		/* If the above doesn't work, add a .g-img class to any image in question. */
		img.g-img+div {
			display: none !important;
		}

		/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
		/* Create one of these media queries for each additional viewport size you'd like to fix */

		/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
		@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
			u~div .email-container {
				min-width: 320px !important;
			}
		}

		/* iPhone 6, 6S, 7, 8, and X */
		@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
			u~div .email-container {
				min-width: 375px !important;
			}
		}

		/* iPhone 6+, 7+, and 8+ */
		@media only screen and (min-device-width: 414px) {
			u~div .email-container {
				min-width: 414px !important;
			}
		}
	</style>

	<!-- CSS Reset : END -->

	<!-- Progressive Enhancements : BEGIN -->
	<style>
		.email-section {
			padding: 2.5em;
			background: #cfcfcf;
			color: #ffff;
		}

		.email-section h2 {
			color: #fff;
		}

		/*BUTTON*/
		.btn {
			padding: 10px 15px;
		}

		.btn.btn-primary {
			border-radius: 30px;
			background: #f3a333;
			color: #ffffff;
		}



		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: 'Playfair Display', serif;
			color: #000000;
			margin-top: 0;
		}

		body {
			font-family: 'Montserrat', sans-serif;
			font-weight: 400;
			font-size: 15px;
			line-height: 1.8;
			color: rgba(0, 0, 0, .4);
		}

		a {
			color: #f3a333;
		}

		table {}

		/*LOGO*/

		.logo h1 {
			margin: 0;
		}

		.logo h1 a {
			color: #000;
			font-size: 20px;
			font-weight: 700;
			text-transform: uppercase;
			font-family: 'Montserrat', sans-serif;
		}

		/*HERO*/
		.hero {
			position: relative;
		}

		.hero img {}

		.hero .text {
			color: rgba(255, 255, 255, .8);
		}

		.hero .text h2 {
			color: #ffffff;
			font-size: 30px;
			margin-bottom: 0;
		}

		/*FOOTER*/

		.footer {
			width: 910px;
			margin: 0 auto;
			color: rgba(255, 255, 255, .5);
		}

		.custom-footer {
			display: flex;
			justify-content: space-between;
			color: rgba(255, 255, 255, .5);
			width: 170px;
			margin: 0 auto;
		}

		.footer .heading {
			color: #ffffff;
			font-size: 20px;
		}

		.footer ul {
			margin: 0;
			padding: 0;
		}

		.footer ul li {
			list-style: none;
			margin-bottom: 10px;
		}

		.footer ul li a {
			color: rgba(255, 255, 255, 1);
		}

		.btn.btn-primary {
			border-radius: 30px;
			background: #42bfbf;
			color: #ffffff;
			padding: 20px 50px;
			font-size: 20px;
			font-weight: 500;
		}

		.heading-section.heading-section-white {
			width: 910px;
			margin: 0 auto;
			text-align: left;
		}

		.heading-section.heading-section-white p.custom-button {
			text-align: center;
			margin-top: 70px;
		}

		.text {
			padding: 0 3em;
			text-align: center;
			width: 35%;
			margin: 0 auto;
		}

		.footer {
			width: 910px;
			border-top: 1px solid #fff;
			margin: 0 auto;
		}

		.custom-thankyou-table {
			margin: auto;
			height: 100%;
			width: 50%;
			border-right: 1px solid #c5c5c5;
			border-left: 1px solid #c5c5c5;
		}

		.custom-thankyou-table .text {
			margin: 90px auto;
			text-align: center;
		}

		.text-img {
			width: 50%;
			margin: 0 auto;
		}

		@media screen and (max-width: 768px) {
			.footer {
				width: 100%;
			}

			.heading-section.heading-section-white {
				width: 100%;
			}
		}

		@media screen and (max-width: 575px) {
			.custom-thankyou-table .text {
				margin: 60px auto;
			}

			.custom-thankyou-table {
				width: 100%;
			}

			.footer {
				width: 100%;
			}

			.text {
				width: 70%;
			}

			.heading-section.heading-section-white {
				width: 100%;
			}

			.heading-section.heading-section-white p.custom-button {
				text-align: center;
				margin: 29px 0;
			}

			.btn.btn-primary {
				padding: 20px 20px;
			}

			.icon {
				text-align: left;
			}

			.text-services {
				padding-left: 0;
				padding-right: 20px;
				text-align: left;
			}

		}
	</style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">
	<center style="width: 100%; background-color: #f1f1f1;">
		<div
			style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
			&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
		</div>
		<div style="max-width: 100%; margin: 0 auto;height: 100vh;background-color: #fff;" class="email-container">
			<!-- BEGIN BODY -->
			<table class="custom-thankyou-table" align="center" role="presentation" cellspacing="0" cellpadding="0"
				width="100%">
				<tr>
					<td valign="middle" class="hero"
						style="background-size: cover; height: 400px;background-color: #ffff;">
						<table>
							<tr>
								<td>
									<div class="text-img">
										<img src="{{asset('img/logo_one.png')}}" alt="" style="width:100%;">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="text">
										 @php if($lang == 'en') { @endphp
                                            <p style="color:#000;text-align: center;">Your password has been successfully changed!
                                        You can go back to the app to log in
										</p>
                                         @php  }else{ @endphp
                                            <p style="color:#000;text-align: center;">Ton mot de passe a bien ete modifie !
                                        Tu peux retourner sur I'application pour te connecter
										</p>
                                         @php }@endphp
										 <input type="hidden" name="lang" value="{{$lang}}">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="text-img" style="width: 15%;;margin: 0 auto;">
										<img src="{{asset('img/Icon awesome-check-circle.png')}}" alt="" style="width:100%;">
									</div>
								</td>
							</tr>
						</table>
					</td>
				</tr><!-- end tr -->
				<!-- 1 Column Text + Button : END -->
			</table>
		</div>
	</center>
</body>

</html>