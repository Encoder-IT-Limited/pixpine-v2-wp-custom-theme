<?php
function order_confirmation_email($product_ids, $method, $discount){
  $user_id = get_current_user_id();
  $first_name = get_user_meta($user_id, 'first_name', true);
  $last_name = get_user_meta($user_id, 'last_name', true);
  if($first_name == ''){
    $first_name = get_user_meta($user_id, 'billing_f_name', true);
  }
  if($last_name == ''){
    $last_name = get_user_meta($user_id, 'billing_l_name', true);
  } 

  $billing_f_name = get_user_meta($user_id, 'billing_f_name', true);
  $billing_l_name = get_user_meta($user_id, 'billing_l_name', true);
  $billing_email = get_user_meta($user_id, 'billing_email', true);
  $billing_company = get_user_meta($user_id, 'billing_company', true);
  $billing_country = get_user_meta($user_id, 'billing_country', true);
  $billing_address = get_user_meta($user_id, 'billing_address', true);
  $billing_city = get_user_meta($user_id, 'billing_city', true);
  $billing_state = get_user_meta($user_id, 'billing_state', true);
  $billing_zip = get_user_meta($user_id, 'billing_zip', true);


  if($billing_f_name == ''){
    $billing_f_name = get_user_meta($user_id, 'first_name', true);
  }
  if($billing_l_name == ''){
    $billing_l_name = get_user_meta($user_id, 'last_name', true);
  }

  $html = '';
  $html .= '
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bundle mockups with yearly subscription</title>
  </head>
  <body>
    <div
      style="
        background: #ffffff;
        margin: 0 auto;
        padding: 0;
        position: relative;
        max-width: 630px;
      "
    >
      <table cellpadding="0" cellspacing="0" border="0" width="">
        <tbody>
          <!--Top row-->
          <tr id="top">
            <!--Top-left corner-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-a1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-a2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-a3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-a4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-a5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-a6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-a7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-b1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-c1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-d1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-e1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-f1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tl-g1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <!--END Top-left corner-->

            <!--Top shadow-->
            <td height="5" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <!--END Top shadow-->

            <!--Top-right corner-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-a1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-b1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-c1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-d1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-e1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-f1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="tr-g1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-g2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-g3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-g4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-g5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-g6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-g7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <!--END Top-right corner-->
          </tr>
          <!--END Top row-->

          <!--Middle row-->
          <tr id="middle">
            <!--Middle-left shadow-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <!--END Middle-left shadow-->
            <!--Content-->
            <td width="100%" bgcolor="#ffffff">
              <div
                style="
                  display: block;
                  background: #fff;
                  margin: 0 auto;
                  padding: 0;
                  color: #333;
                  font-family: \'Roboto\', \'Open Sans\', \'Helvetica Neue\',
                    Helvetica, Arial, sans-serif;
                  font-size: 14px;
                  overflow: hidden;
                  box-sizing: border-box;
                  width: 100%;
                "
              >
                <div
                  style="
                    border: 1px solid #a6a6a6;
                    background-color: #fff;
                    max-width: 610px;
                    margin-left: auto;
                    margin-right: auto;
                    padding: 20px;
                    padding-bottom: 30px;
                    padding-top: 70px;
                  "
                >
                  <div class="header" style="text-align: center">
                    <div
                      style="
                        text-align: center;
                        font-size: 24px;
                        margin: 0;
                        padding: 0;
                        font-weight: bold;
                        display: inline-block;
                      "
                    >
                      <a href="'.site_url().'">
                        <img
                          style="width: 171px; hight: auto"
                          class="wp_logo"
                          src="'.get_template_directory_uri().'/assets/email/logo.png"
                          alt=""
                        />
                      </a>
                    </div>
                    <div
                      class="name__order"
                      style="
                        text-align: center;
                        max-width: 430px;
                        margin: 0 auto;
                        margin-top: 40px;
                      "
                    >
                      <h4
                        style="
                          margin: 0;
                          font-size: 16px;
                          line-height: 19px;
                          font-weight: 700;
                        "
                      >
                        Order ID:
                        <span
                          style="
                            margin: 0;
                            font-size: 16px;
                            line-height: 19px;
                            font-weight: 700;
                          "
                          >215478</span
                        >
                      </h4>
                      <h3
                        style="
                          margin-bottom: 0;
                          font-size: 18px;
                          line-height: 22px;
                          margin-top: 7px;
                          font-weight: 500;
                          text-transform: uppercase;
                        "
                      >
                        Thank you
                        <span
                          style="
                            font-size: 18px;
                            line-height: 22px;
                            margin-top: 7px;
                            font-weight: 500;
                            text-transform: uppercase;
                          "
                          >'.$first_name.' '.$last_name.'</span
                        >
                      </h3>
                      <p
                        style="
                          margin-top: 13px;
                          margin-bottom: 0;
                          font-size: 16px;
                          line-height: 24px;
                        "
                      >
                        Thank you for your recent purchase, your order has been
                        processed. Log in to your account to start downloading.
                      </p>
                    </div>
                  </div>
                  <div
                    class="main_section_parent"
                    style="
                      background: transparent;
                      height: auto;
                      margin: 0;
                      box-sizing: border-box;
                      margin-top: 44px;
                    "
                  >
                    <div class="main__content">
                      <div class="table__hading">
                        <h2
                          style="
                            text-transform: uppercase;
                            font-size: 16px;
                            line-height: 19px;
                            font-weight: 700;
                            margin-top: 0;
                            margin-bottom: 13px;
                          "
                        >
                          Order Summary
                        </h2>
                        <div class="purchase_date__payment_method">
                          <p
                            style="
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                              margin-bottom: 6px;
                              margin-top: 0;
                            "
                          >
                            Purchase Date:
                            <span style="font-weight: 700"
                              >'.date("F d, Y").'</span
                            >
                          </p>
                          <p
                            style="
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                              margin-bottom: 6px;
                              margin-top: 0;
                            "
                          >
                            Payment Method:
                            <span style="font-weight: 700">'.$method.'</span>
                          </p>
                        </div>
                      </div>
                      <table
                        style="
                          border-collapse: collapse;
                          width: 100%;
                          margin-top: 25px;
                        "
                      >
                        <tr>
                          <th
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            Description
                          </th>
                          <th
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            Price
                          </th>
                          <th
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            Discount
                          </th>
                          <th
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 700;
                            "
                            class="font_bold"
                          >
                            Subtotal
                          </th>
                        </tr>';
                        $total_price = 0;
                        foreach($product_ids as $cpt_id){
                          $cpt_post = get_post($cpt_id);
                          $thumbnail_url = get_the_post_thumbnail_url($cpt_id);
                          $price = get_post_meta($cpt_id, 'personal_commercial_sale_price', true);
                          
                          $discounted_price = $price;
                          $taxonomy = 'mockup_category'; //'your_custom_taxonomy'; 
                          if($discount != 0){
                            $custom_categories = wp_get_post_terms($cpt_id, $taxonomy);
                            // Check if custom categories were found
                            if (!is_wp_error($custom_categories) && !empty($custom_categories)) {
                                // Loop through the custom categories and display them
                                foreach ($custom_categories as $category) {
                                    if(esc_html($category->slug) == "bundle-mockups"){
                                      $discounted_price = $price - (($discount/100)*$price);
                                    }
                                }
                            }
                          }
                       
                          if (empty($price)) {
                            $price = 0;
                          }
                          $total_price += $discounted_price; 

                        $html .= '
                        <tr>
                          <td
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            <h3
                              style="
                                font-size: 14px;
                                line-height: 17px;
                                font-weight: 400;
                                color: #005aff;
                                margin: 0;
                              "
                            >
                              '.$cpt_post->post_title.'
                            </h3>
                            <p
                              style="
                                font-size: 12px;
                                line-height: 15px;
                                font-weight: 400;
                                margin: 0;
                                color: #333333;
                              "
                            >
                              ID: <span>'.$cpt_id.'</span>
                            </p>
                            <p
                              style="
                                font-size: 12px;
                                line-height: 15px;
                                font-weight: 400;
                                margin: 0;
                                color: #333333;
                              "
                            >
                              File Type: <span>'.get_post_meta($cpt_id, 'file_type', true).'</span>
                            </p>
                            <p
                              style="
                                font-size: 12px;
                                line-height: 15px;
                                font-weight: 400;
                                margin: 0;
                                color: #333333;
                              "
                            >
                              License:
                              <a
                                href=""
                                style="
                                  font-size: 12px;
                                  line-height: 15px;
                                  font-weight: 400;
                                  margin: 0;
                                  color: #333333;
                                  text-decoration: none;
                                "
                              >
                                Personal & Commercial
                              </a>
                            </p>
                          </td>
                          <td
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            '.'US$<span>'.$price.'</span>'.'
                          </td>
                          <td
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            <span>'.$discount.'%</span>
                          </td>
                          <td
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                          >
                            US$<span>'.$discounted_price.'</span>
                          </td>
                        </tr>';
                      }
                        $html .= '<tr>
                          <td
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 400;
                            "
                            colspan="3"
                          >
                            <h3
                              style="
                                font-size: 16px;
                                line-height: 19px;
                                font-weight: 700;
                                color: #333333;
                                margin: 0;
                              "
                              class="order_total"
                            >
                              Order Total
                            </h3>
                          </td>
                          <td
                            style="
                              border: 1px solid #707070;
                              text-align: left;
                              padding: 9px;
                              font-size: 16px;
                              line-height: 19px;
                              font-weight: 700;
                            "
                            class="font_bold table__heading"
                          >
                            US$<span>'.$total_price.'</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="footer" style="margin-top: 30px">
                    <div class="address">
                      <h4
                        style="
                          font-size: 16px;
                          font-weight: 700;
                          margin-bottom: 14px;
                          margin-top: 0;
                        "
                      >
                        Billing Address
                      </h4>
                      <p style="font-size: 15px; line-height: 22px; margin: 0">
                        '.$billing_f_name.' '.$billing_l_name.'
                      </p>
                      <p style="font-size: 15px; line-height: 22px; margin: 0">
                        '.$billing_address.' <br />
                        '.$billing_city.', '.$billing_state.' '.$billing_zip.' <br />
                        '.$billing_country.'.
                      </p>
                      <!-- <a
                        style="
                          text-decoration: none;
                          color: #333333;
                          font-size: 15px;
                          line-height: 22px;
                          margin: 0;
                        "
                        href="tel:62425687724"
                        >62425687724</a
                      >
                      <br /> -->
                      <a
                        style="
                          text-decoration: none;
                          color: #333333;
                          font-size: 15px;
                          line-height: 22px;
                          margin: 0;
                        "
                        href="mailto:'.$billing_email.'"
                        >'.$billing_email.'</a
                      >
                    </div>
                    <div
                      class="footer_inner_col"
                      style="
                        border-top: 1px solid #707070;
                        padding-top: 26px;
                        margin-top: 26px;
                      "
                    >
                      <ul
                        class="social_link"
                        style="text-align: center; margin: 0; padding: 0"
                      >
                      <li style="display: inline-block; margin: 0 13px; vertical-align: middle;">
                        <a class="youtube" href="https://www.youtube.com/">
                          <img
                            style="width: 25px; height: 18px; object-fit: contain;"
                            src="'.get_template_directory_uri().'/assets/email/youtube.png"
                            alt=""
                          />
                        </a>
                      </li>
                      <li style="display: inline-block; margin: 0 13px; vertical-align: middle;">
                        <a
                          class="pinterest"
                          href="https://www.pinterest.com/"
                        >
                          <img
                            style="width: 20px; height: 21px; object-fit: contain;"
                            src="'.get_template_directory_uri().'/assets/email/pinterest.png"
                            alt=""
                          />
                        </a>
                      </li>
                      <li style="display: inline-block; margin: 0 13px; vertical-align: middle;">
                        <a
                          class="instagram"
                          href="https://www.instagram.com/"
                        >
                          <img
                            style="width: 19px; height: 19px; object-fit: contain;"
                            src="'.get_template_directory_uri().'/assets/email/instagram.png"
                            alt=""
                          />
                        </a>
                      </li>
                      <li style="display: inline-block; margin: 0 13px; vertical-align: middle;">
                        <a class="twitter" href="https://twitter.com/">
                          <img
                            style="width: 19px; height: 20px; object-fit: contain;"
                            src="'.get_template_directory_uri().'/assets/email/twitter.png"
                            alt=""
                          />
                        </a>
                      </li>
                      <li style="display: inline-block; margin: 0 13px; vertical-align: middle;">
                        <a class="behance" href="https://www.behance.net/">
                          <img
                            style="width: 26px; height: 16px; object-fit: contain;"
                            src="'.get_template_directory_uri().'/assets/email/behance.png"
                            alt=""
                          />
                        </a>
                      </li>
                      <li style="display: inline-block; margin: 0 13px; vertical-align: middle;">
                        <a class="facebook" href="https://www.facebook.com/">
                          <img
                            style="width: 10px; height: 19px; object-fit: contain;"
                            src="'.get_template_directory_uri().'/assets/email/facebook.png"
                            alt=""
                          />
                        </a>
                      </li>
                      </ul>
                      <div class="footer_menu" style="margin: 8px 0">
                        <ul style="text-align: center; margin: 0; padding: 0">
                          <li
                            style="
                              display: inline-block;
                              padding: 0 7.5px;
                              border-right: 1px solid #333333;
                              margin: 0;
                              line-height: 1;
                              margin: 4px 0;
                            "
                          >
                            <a
                              style="
                                text-decoration: none;
                                color: #333333;
                                font-size: 12px;
                                line-height: 14px;
                              "
                              href="https://www.pixpine.com/"
                            >
                              www.pixpine.com
                            </a>
                          </li>
                          <li
                            style="
                              display: inline-block;
                              padding: 0 7.5px;
                              margin: 0;
                              line-height: 1;
                              margin: 4px 0;
                            "
                          >
                            <a
                              style="
                                text-decoration: none;
                                color: #333333;
                                font-size: 12px;
                                line-height: 14px;
                              "
                              href="mailto:support@pixpine.com"
                            >
                              support@pixpine.com
                            </a>
                          </li>
                        </ul>
                        <ul style="text-align: center; margin: 0; padding: 0">
                          <li
                            style="
                              display: inline-block;
                              padding: 0 7.5px;
                              border-right: 1px solid #333333;
                              margin: 0;
                              line-height: 1;
                              margin: 4px 0;
                            "
                          >
                            <a
                              style="
                                text-decoration: none;
                                color: #333333;
                                font-size: 12px;
                                line-height: 14px;
                              "
                              href="https://chonburiinterww.com/pixpine-v2/terms-and-conditions.php"
                            >
                              Terms & Conditions
                            </a>
                          </li>
                          <li
                            style="
                              display: inline-block;
                              padding: 0 7.5px;
                              border-right: 1px solid #333333;
                              margin: 0;
                              line-height: 1;
                              margin: 4px 0;
                            "
                          >
                            <a
                              style="
                                text-decoration: none;
                                color: #333333;
                                text-decoration: none;
                                color: #333333;
                                font-size: 12px;
                                line-height: 14px;
                              "
                              href="https://chonburiinterww.com/pixpine-v2/policy.php"
                            >
                              Privacy Policy
                            </a>
                          </li>
                          <li
                            style="
                              display: inline-block;
                              padding: 0 7.5px;
                              margin: 0;
                              line-height: 1;
                              margin: 4px 0;
                            "
                          >
                            <a
                              style="
                                text-decoration: none;
                                color: #333333;
                                font-size: 12px;
                                line-height: 14px;
                              "
                              href="https://chonburiinterww.com/pixpine-v2/license.php"
                            >
                              Licences
                            </a>
                          </li>
                        </ul>
                      </div>
                      <p
                        style="
                          margin: 0;
                          text-align: center;
                          font-size: 12px;
                          line-height: 14px;
                        "
                      >
                        Copyright © 2024
                        <a
                          style="
                            text-decoration: none;
                            color: #333333;
                            font-size: 12px;
                            line-height: 14px;
                          "
                          href="https://www.pixpine.com/"
                          >Pixpine</a
                        >
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <div style="width: 1px; height: 1px"></div>
            </td>
          </tr>
          <tr id="bottom">
            <!--Bottom-left corner-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-a1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-b1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-c1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-d1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-e1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-f1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-g1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <!--END Bottom-left corner-->
            <!--Bottom-middle shadow-->
            <td height="5" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <!--END Bottom-middle shadow-->
            <!--Bottom-right corner-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-a1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-b1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-c1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-d1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-e1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-f1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="br-g1" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g2" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g3" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g4" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g5" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g6" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g7" height="1" bgcolor="#ffffff">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
            <!--END Bottom-right corner-->
          </tr>
          <!--END Bottom row-->
        </tbody>
      </table>
    </div>
  </body>
</html>';
  return $html;
}