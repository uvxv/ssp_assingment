<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Verify Your Email - Tesher Harmony</title>
    <style type="text/css">
        /* Client-specific resets */
        body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; }

        /* General Resets */
        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #fdf2f8; /* Lightest Pink */
            color: #1f1f22; /* Dark Text */
        }

        /* Mobile Responsive Styles */
        @media screen and (max-width: 600px) {
            .email-container { width: 100% !important; }
            .fluid { width: 100% !important; height: auto !important; margin-left: auto !important; margin-right: auto !important; }
            .stack-column, .stack-column-center { display: block !important; width: 100% !important; max-width: 100% !important; direction: ltr !important; }
            .stack-column-center { text-align: center !important; }
            .center-on-mobile { text-align: center !important; }
        }
    </style>
</head>
<body style="background-color: #18181b; margin: 0; padding: 0; height: 100% !important; width: 100% !important; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #1f1f22;">

    <!-- 1. The Preheader (Hidden Preview Text) -->
    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        Start your musical journey with Tesher Harmony. Please verify your email address.
    </div>

    <!-- 2. Main Wrapper Table -->
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #fdf2f8; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #1f1f22;">
        <tr>
            <td align="center" style="padding: 20px 0;">
                
                <!-- 3. The Email Container (Max Width 600px) -->
                <table class="email-container" border="0" cellpadding="0" cellspacing="0" width="600" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    
                    <!-- A. Header Section (Dark Pink/Burgundy Background) -->
                    <tr>
                        <td align="center" style="background-color: #be185d; padding: 40px 20px;">
                            <!-- Musical Icon / Logo Placeholder -->
                            <div style="color: #fce7f3; font-size: 40px; line-height: 40px; margin-bottom: 10px;">
                                &#9835;
                            </div>
                            <h1 style="color: #ffffff; font-family: 'Georgia', serif; font-size: 28px; font-weight: 400; margin: 0; letter-spacing: 1px;">
                                TESHER HARMONY
                            </h1>
                            <p style="color: #fce7f3; font-size: 14px; letter-spacing: 2px; text-transform: uppercase; margin: 10px 0 0 0; opacity: 0.9;">
                                Where Music Meets Soul
                            </p>
                        </td>
                    </tr>

                    <!-- Mail Body -->
                    <tr>
                        <td style="padding: 40px 30px; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
                            <h2 style="color: #18181b; font-size: 22px; font-weight: bold; margin: 0 0 20px 0;">
                                Reset Your Password
                            </h2>
                            
                            <p style="font-size: 16px; line-height: 1.6; color: #1f1f22; margin: 0 0 20px 0;">
                                Hello <strong>{{ $user->first_name }} {{ $user->last_name }}</strong>,
                            </p>
                            
                            <p style="font-size: 16px; line-height: 1.6; color: #1f1f22; margin: 0 0 30px 0;">
                                You recently requested to reset your password for your <strong>Tesher Harmony</strong> account. Click the button below to reset it.
                            </p>

                            <!-- Call To Action (Button) -->
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="padding-bottom: 30px;">
                                        <!-- Button Style: Vibrant Pink Background -->
                                        <a href="{{ url('reset-password/'.$token) }}" target="_blank" style="background-color: #db2777; color: #ffffff; padding: 14px 28px; font-size: 16px; font-weight: bold; text-decoration: none; border-radius: 4px; display: inline-block; box-shadow: 0 2px 4px rgba(219, 39, 119, 0.3);">
                                            Reset Your Password
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size: 14px; line-height: 1.6; color: #1f1f22; margin: 0;">
                                If you didn't create an account with Tesher Harmony, you can safely ignore this email.
                            </p>
                            
                            <!-- Signature -->
                            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #fce7f3;">
                                <p style="font-size: 14px; color: #831843; margin: 0;">
                                    Best regards,<br>
                                    <strong>The Tesher Harmony Team</strong>
                                </p>
                            </div>
                        </td>
                    </tr>

                    <!-- C. Footer Section (Light Pink) -->
                    <tr>
                        <td align="center" style="background-color: #fce7f3; padding: 20px; font-size: 12px; color: #831843; font-family: sans-serif;">
                            <p style="margin: 0 0 10px 0;">&copy; {{ date('Y') }} Tesher Harmony. All rights reserved.</p>
                            
                            <!-- Fallback Link -->
                            <p style="margin: 0; line-height: 1.4; color: #555555;">
                                If you're having trouble clicking the button, copy and paste the URL below into your web browser:<br>
                                <a href="{{ url('reset-password/'.$token) }}" style="color: #db2777; text-decoration: underline;">Reset Password Link</a>
                            </p>
                        </td>
                    </tr>

                </table>
                <!-- End Email Container -->

                <!-- Decorative Footer -->
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td align="center" style="padding: 20px 0 0 0; color: #db2777; font-size: 12px; font-family: sans-serif;">
                            <p>Sent with &#9834; from Tesher Harmony HQ</p>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>
</html>