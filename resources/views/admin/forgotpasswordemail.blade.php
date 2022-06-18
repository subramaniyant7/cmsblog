<div>
    <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
        <tbody>
          <tr>
            <td valign="top" align="center">
              <table style="max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                 <tbody>
                  <tr>
                    <td valign="top" align="center">
                      <table style="max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                          <tr>
                            <td style="font-size:0;padding-top:0px" valign="top" bgcolor="#FFFFFF" align="left">
                              <div style="display:inline-block;max-width:600px;vertical-align:top;width:100%">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#2d8cff" align="left">
                                  <tbody>
                                    <tr style="background:#dfd1d1">
                                      <td style="padding:20px 30px" valign="middle" align="left">
                                        <a href="{{ url(FRONTENDURL)}}" style="text-decoration:none" target="_blank">
                                                <img alt="GoHealthe" src="{{ URL::to('frontend/assets/img/logo.png') }}"
                                                    style="display:block;font-family:'Lato',Helvetica,sans-serif;font-size:18px;line-height:22px;
                                                    color:#76798a;font-weight:bold;width:100%;max-width:200px" width="100" border="0" class="CToWUd"> </a></td>
                                      <td style="padding:20px 30px" valign="top" align="right"></td>
                                           </tr>
                                  </tbody>
                                </table>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </td>
                  </tr>
                   <tr>
                    <td valign="top" bgcolor="#FFFFFF" align="center">
                      <table style="max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                            <tr>
                                <td style="text-align:center;color: #cb202d;font-size: 25px;padding: 45px 10px 7px;font-weight: bold;font-family:'Lato',Helvetica,sans-serif;">
                                    Hi {{ $user_email }}</td>
                            </tr>
                          <tr>
                            <td style="padding:40px 30px 10px;font-family:'Lato',Helvetica,sans-serif;font-size:20px;
                                line-height:42px;color:#232333;font-weight:900;text-align:center;display:block;letter-spacing:0.01em">
                                We have received password reset request. Please use New Password to login in CPanel <br>
                              
                                <br>
                                New Password : {{ $user_password }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table style="max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                          <tr>
                            <td style="padding:0px 30px 30px 30px;display:block" valign="top" align="center">

                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                   
                   <tr>
                    <td valign="top" align="center">
                      <table style="max-width:600px" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                        <tbody>
                          <tr>
                            <td style="padding:30px 15px" valign="top" align="center">
                              <table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tbody>

                                  <tr>
                                    <td style="font-family:'Lato',Helvetica,sans-serif;font-size:13px;line-height:22px;color:#828282" align="center">
                                       <br>
                                      © {{date('Y')}} GoHealthe - All Rights Reserved</td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      </td>
                  </tr>

                </tbody>
              </table>
              </td>
          </tr>
        </tbody>
      </table>
</div>
