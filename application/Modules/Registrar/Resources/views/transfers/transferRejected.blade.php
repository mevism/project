<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>TUM-SIMS</title>
        <meta name="viewport" content="width=device-width" />
       <style type="text/css">
            @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                body[yahoo] .buttonwrapper { background-color: transparent !important; }
                body[yahoo] .button { padding: 0 !important; }
                body[yahoo] .button a { background-color: #27ae60; padding: 15px 25px !important; }
            }

            @media only screen and (min-device-width: 601px) {
                .content { width: 600px !important; }
                .col387 { width: 387px !important; }
            }
            .bgcolor{
                background-color: #344a3d

            }
            .bgcolor1{
                background-color: #27ae60;
            }
            .bgcolor2{
                background-color: #ffffff;
            }
            .bgcolor3{
                background-color: #dddddd;
            }

        </style>
    </head>
    <body  class="bgcolor" style="margin: 0; padding: 0;" yahoo="fix">

        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; width: 100%; max-width: 600px;  " class="content">
            <tr>
                <td style="padding: 15px 10px 15px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" style="color: #aaaaaa; font-family: Arial, sans-serif; font-size: 12px;">
                                  <a href="#" style="color: #27ae60; text-decoration: none;">Technical University of Mombasa</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" class="bgcolor1" style="padding: 20px 20px 20px 20px; color: #ffffff; font-family: Arial, sans-serif; font-size: 36px; font-weight: bold;">
                    <img src="{{ asset('media/tum-logo/tum-logo.png') }}" alt="" width="160" height="152" style="display:block;" />
                </td>
            </tr>
            <tr>
                <td align="auto" class="bgcolor2" style="padding: 40px 20px 40px 20px; color: #555555; font-family: Arial, sans-serif; font-size: 20px; line-height: 30px; border-bottom: 1px solid #f6f6f6;">
                    <h5>Dear {{ $student->surname. ' '. $student->first_name .' '. $student->middle_name }}, </h5>
                     <p>
                       Your course transfer request to <b> {{ $student->course_name }} </b> was not successful. You are advised to continue with your current course <b>{{ $student->StudentsTransferCourse->StudentsCourse->course_name }}</b>.
                     </p>
                    <div>
                        <p>
                            <b>
                                Kind regards,<br></b>
                               Admissions Department <br>
                             Technical University of Mombasa

                        </p>
                     </div>
                </td>
            </tr>

            <tr>
                <td align="center" class="bgcolor3" style="padding: 15px 10px 15px 10px; color: #555555; font-family: Arial, sans-serif; font-size: 12px; line-height: 18px;">
                    <b>Technical University of Mombasa.</b><br/>Tom Mboya street, Tudor &bull; Mombasa &bull; Kenya
                </td>
            </tr>
            <tr>
                <td style="padding: 15px 10px 15px 10px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="center" width="100%" style="color: #999999; font-family: Arial, sans-serif; font-size: 12px;">
                                2022 &copy; <a href="" style="color: #27ae60;">TUM</a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
