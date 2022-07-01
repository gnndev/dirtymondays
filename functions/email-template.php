<?php

// define the ninja_forms_action_email_message callback 
function filter_ninja_forms_action_email_message( $message, $data, $action_settings ) { 
    // error_log(print_r($action_settings,true));
    // error_log(print_r($data['settings']['key'],true));
     $logo = ('laform' === $data['settings']['key']) ? 'https://dirtymondays.com/wp-content/uploads/2021/11/dmo_la_logo_white.png' : 'https://dirtymondays.com/wp-content/uploads/2021/09/dmo_roundlogo_white_300.png';
    //error_log( $logo );
	$message = <<<HTML
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Dirty Mondays</title>
                <style>
                    body{
                        background:black;
                        color:white;
                        font-family:Helvetica,Arial,sans-serif;
                        font-size:14px;
                    }
                    p{
                        color:white;
                        margin-bottom:16px;
                    }
                    div{
                        color:white;
                    }
                    a{
                        color:white;
                        text-decoration:underline;
                    }
                    table{
                        background:black;
                        color:white;
                    }
                </style>
            </head>
            <body>
                <table style="background-color:black;" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer">
                                <tr>
                                    <td align="center" valign="top">
                                        <a href="https://dirtymondays.com"><img alt="DIRTYMONDAYS_logo_black" width="250" height="250" border="0" src="$logo"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%" id="emailContent">
                                            <tr>
                                                <td align="center" valign="top">
                                                    <div style="color:white">
                                                        $message
                                                    </div>
                                                 </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%" id="emailContent">
                                            <tr>
                                                <td align="center" valign="top">
                                                    <p style="text-align: center;">Check our website <a href="https://dirtymondays.com/" style="color: #ffffff; text-decoration: underline;">dirtymondays.com</a><br>
                                                    Follow us on Instagram <a href="https://www.instagram.com/dirtymondays/" style="color: #ffffff; text-decoration: underline;">@dirtymondays</a><br>
                                                    Follow us on Facebook <a href="https://www.facebook.com/dirtymondaysofficial/" style="color: #ffffff; text-decoration: underline;">@dirtymondays</a><br>
                                                    <p>LIVE FAST DIE DIRTY</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top">
                                        <table border="0" cellpadding="10" cellspacing="0" width="100%" id="emailFooter">
                                            <tr>
                                                <td align="center" valign="top">
                                                <p style="font-size:12px">@Copyright 2022 - Dirtymondays</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
    HTML;
    return $message; 
}; 
         
// add the filter 
add_filter( 'ninja_forms_action_email_message', 'filter_ninja_forms_action_email_message', 10, 3 );