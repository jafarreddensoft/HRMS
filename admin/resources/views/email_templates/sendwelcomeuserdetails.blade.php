<!doctype html>
<html>
  <head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Welcome Message</title>    
  </head>
  <body class="">
    <table border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <span class="preheader"></span>
            <table class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p style="text-align: center;background:#fff; padding: 20px 0"><img src="https://works-reddensoft.com/email-marketing-admin/logo.jpg" style="max-width: 250px; margin: 0 auto;" /></p>
                        <div class="wrapper-content">
						<p class="estap">Hi <?php echo $name;?>,</p>
                        <p>Welcome to HRMS. Please click the link below to Login.</p>
                        <p>Email: <?php echo $email;?></p>
                        <p>Password: <?php echo $password;?></p>
                        <p>Link: <a href="http://localhost:8080/"> http://localhost:8080/</a></p>

                        <p>Sincerely,<br>
          				Reddensoft Team
          			    </p> 
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer">
              <table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                   <!--  <span class="apple-link">email-marketing</span> -->
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>