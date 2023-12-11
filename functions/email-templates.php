<?php

/**
 * this contains all html EMAIL templates and returns as text
 */


function pixpine_new_account_password_email($password){
  return $html = '
  <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Setup</title>
    <link rel="stylesheet" href="styles/style.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

      * {
        font-family: "Roboto", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        background-color: #fafafa;
        transition: 0.3s;
      }
      @font-face {
        font-family: "Helvetica Neue", sans-serif;
        src: url(../fonts/helveticaneue.ttf);
        font-weight: 400;
      }
      a {
        transition: 0.3s;
        text-decoration: none;
        color: var(--text-color);
      }
      a:hover {
        color: var(--primary-color);
      }
      :root {
        --primary-color: #005aff;
        --text-color: #333333;
        --banner-color: #b9dfff;
      }
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      span,
      strong,
      i,
      small,
      div {
        transition: 0.3s;
        color: var(--text-color);
        margin: 0;
        text-decoration: none;
      }
      p {
        font-size: 16px;
        line-height: 24px;
      }
      ul {
        margin: 0;
        padding: 0;
      }
      ul li {
        list-style-type: none;
      }
      img {
        max-width: 100%;
      }
      .container {
        max-width: 1450px;
        padding-left: 50px;
        padding-right: 50px;
        margin: 0 auto;
        box-sizing: border-box;
      }
      .social_link {
        text-align: center;
      }
      .social_link li {
        display: inline-block;
        margin: 0 13px;
      }
      .footer_menu ul {
        text-align: center;
      }
      .footer_menu ul li {
        display: inline-block;
        padding: 0 7.5px;
        border-right: 1px solid var(--text-color);
        margin: 0;
        line-height: 1;
        margin: 4px 0;
      }
      .footer_menu ul li:last-child {
        border-right: 0;
      }
      .footer_menu {
        margin: 8px 0;
      }
      .footer .footer_inner_col {
        border-top: 1px solid #707070;
        padding-top: 26px;
        margin-top: 26px;
      }
      .footer .footer_inner_col p,
      .footer .footer_inner_col a {
        font-size: 12px;
        line-height: 14px;
      }
      .footer .address h4 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 14px;
      }
      .footer .address p,
      .footer .address a {
        font-size: 15px;
        line-height: 22px;
      }
      .name__order p {
        margin-top: 13px;
      }

      .name__order h3 {
        font-size: 18px;
        line-height: 22px;
        margin-top: 7px;
        font-weight: 500;
        text-transform: uppercase;
      }
      .name__order h4 {
        font-size: 16px;
        line-height: 19px;
        font-weight: 700;
      }
      .main__content {
        margin-top: 44px;
        margin-bottom: 35px;
        /* min-height: 40vh; */
      }
      .main__content h2 {
        text-transform: uppercase;
        font-size: 16px;
        line-height: 19px;
        font-weight: 700;
        margin-bottom: 13px;
      }
      .purchase_date__payment_method p {
        font-size: 16px;
        line-height: 19px;
        font-weight: 400;
        margin-bottom: 6px;
      }
      .purchase_date__payment_method p span,
      .purchase_date__payment_method p strong {
        font-weight: 700;
      }
      .main__content table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 25px;
      }

      .main__content td,
      .main__content th {
        border: 1px solid #707070;
        text-align: left;
        padding: 9px;
      }

      .main__content .table__heading,
      .main__content .order_total,
      .main__content th,
      .main__content td {
        font-size: 16px;
        line-height: 19px;
        font-weight: 400;
      }
      .main__content .order_total,
      .main__content .font_bold {
        font-weight: 700;
        color: var(--text-color);
      }
      .main__content td h3 {
        font-size: 14px;
        line-height: 17px;
        font-weight: 400;
        color: var(--primary-color);
      }

      .main__content td p {
        font-size: 10px;
        line-height: 13px;
        font-weight: 400;
      }

      /* rest password */
      .reset__login__page .rest_btn {
        border: 1px solid var(--primary-color);
        border-radius: 30px;
        padding: 7px 30px;
        box-shadow: none;
        color: var(--text-color);
        background-color: transparent;
        font-size: 16px;
        line-height: 19px;
        font-weight: 500;
        display: inline-block;
        cursor: pointer;
        margin: 30px 0;
      }
      .top_p {
        margin-bottom: 25px;
      }
      .reset__login__page .main__content p a {
        color: var(--primary-color);
        font-weight: 700;
      }
      .reset__login__page p span,
      .reset__login__page p strong {
        font-weight: 700;
        color: var(--text-color);
      }
      .reset__login__page .main__content {
        margin-bottom: 50px;
      }
      .welcome_btn_col button {
        background: transparent;
        outline: none;
        box-shadow: none;
        padding: 13px;
        border: 1px solid #707070;
        border-radius: 0;
        font-size: 18px;
        line-height: 22px;
        font-weight: 500;
        color: var(--primary-color);
        min-width: 165px;
        text-align: left;
        cursor: pointer;
      }
      .welcome_btn_col button img {
        margin-left: 12px;
      }
      .welcome_btn_text__col {
        display: inline-block;
        background-color: var(--banner-color);
        padding: 8px 12px;
        margin-left: auto;
        float: right;
      }
      .welcome_btn_col {
        margin-top: 35px;
        margin-bottom: 40px;
      }
      .welcome_btn_text__col h3 {
        font-size: 14px;
        line-height: 16px;
        font-weight: 500;
        color: #696969;
      }
      .welcome_btn_text__col h3 span {
        color: var(--primary-color);
        font-weight: 700;
      }
      .welcome_btn_text__col p {
        font-size: 13px;
        line-height: 18px;
        font-weight: 500;
        color: var(--primary-color);
      }
      .free__mockups__grid__col h2 {
        font-size: 17px;
        line-height: 20px;
        font-weight: 500;
        text-transform: inherit;
        margin-bottom: 10px;
      }
      .free__mockups__grid__col .card_container {
        text-align: center;
        margin: 0 -5px;
      }

      .free__mockups__grid__col .card_item {
        border: 1px solid #707070;
        display: inline-block;
        text-align: center;
        background-color: #ffffff;
        overflow: hidden;
        width: 158px;
        height: 115px;
        margin: 0 5px;
        margin-bottom: 20px;
      }
      .free__mockups__grid__col .card_item img {
        width: 100%;
        max-width: 100%;
        object-fit: cover;
        margin-top: 0;
        height: 100%;
      }
      .welcome__page .footer .footer_inner_col {
        margin-top: 0;
      }
      .welcome__page .main__content {
        margin-bottom: 15px;
      }

      @media only screen and (max-width: 767px) {
        .main_section_parent {
          padding: 0 20px 30px 20px !important;
        }
        .free__mockups__grid__col .card_item {
          width: 190px;
        }
        .welcome_btn_text__col {
          width: max-content;
          margin-top: 10px;
          display: block;
          float: unset;
          margin-left: 0;
        }
      }
    </style>
  </head>
  <body>
    <div
      style="
        background: #ffffff;
        margin: 0 auto;
        padding: 0;
        position: relative;
        max-width: 655px;
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
                    <td id="tl-a7" height="1" bgcolor="#fefefe">
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
                    <td id="tl-b5" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b6" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b7" height="1" bgcolor="#fdfdfd">
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
                    <td id="tl-c4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c5" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c7" height="1" bgcolor="#f9f9f9">
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
                    <td id="tl-d3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d4" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d5" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d7" height="1" bgcolor="#f1f1f1">
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
                    <td id="tl-e3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e4" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e5" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e6" height="1" bgcolor="#fefefe">
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
                    <td id="tl-f2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f4" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f5" height="1" bgcolor="#fefefe">
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
                    <td id="tl-g2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g3" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g4" height="1" bgcolor="#f9f9f9">
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
                    <td height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#f8f8f8">
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
                    <td id="tr-a2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a3" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a4" height="1" bgcolor="#f9f9f9">
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
                    <td id="tr-b2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b4" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b5" height="1" bgcolor="#fefefe">
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
                    <td id="tr-c3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c4" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c5" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c6" height="1" bgcolor="#fefefe">
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
                    <td id="tr-d3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d4" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d5" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d7" height="1" bgcolor="#f1f1f1">
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
                    <td id="tr-e4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e5" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e7" height="1" bgcolor="#f9f9f9">
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
                    <td id="tr-f5" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f6" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f7" height="1" bgcolor="#fdfdfd">
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
                    <td id="tr-g7" height="1" bgcolor="#fefefe">
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
            <td height="100%" width="1" bgcolor="#fefefe">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#fcfcfc">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#f5f5f5">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#e8e8e8">
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
                  class="header"
                  style="padding: 20px; padding-top: 70px; text-align: center"
                >
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
                    <a href="">
                      <img class="wp_logo" src="' . get_template_directory_uri() . '/assets/email/logo.jpg" alt="" />
                    </a>
                  </div>
                </div>
                <div
                  class="main_section_parent reset__login__page"
                  style="
                    background: transparent;
                    height: auto;
                    margin: 0;
                    padding: 0 55px 30px 55px;
                    box-sizing: border-box;
                  "
                >
                  <div class="main__content" style="max-width: 430px">
                    <div class="top_p">
                      <p>
                        Thank you for creating a new account on Pixpine, your
                        account password is auto-generated
                        <span>'.$password.'</span>
                      </p>
                    </div>
                    <p>
                      You can change this password when
                      <a href="'.site_url().'"
                        >login</a
                      >
                      to your account.
                    </p>
                  </div>
                  <div class="footer">
                    <div class="footer_inner_col">
                      <ul class="social_link">
                        <li>
                          <a class="youtube" href="https://www.youtube.com/">
                            <img src="' . get_template_directory_uri() . '/assets/email/youtube.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a
                            class="pinterest"
                            href="https://www.pinterest.com/"
                          >
                            <img src="' . get_template_directory_uri() . '/assets/email/pinterest.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a
                            class="instagram"
                            href="https://www.instagram.com/"
                          >
                            <img src="' . get_template_directory_uri() . '/assets/email/instagram.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a class="twitter" href="https://twitter.com/">
                            <img src="' . get_template_directory_uri() . '/assets/email/twitter.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a class="behance" href="https://www.behance.net/">
                            <img src="' . get_template_directory_uri() . '/assets/email/behance.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a class="facebook" href="https://www.facebook.com/">
                            <img src="' . get_template_directory_uri() . '/assets/email/facebook.jpg" alt="" />
                          </a>
                        </li>
                      </ul>
                      <div class="footer_menu">
                        <ul>
                          <li>
                            <a href="https://www.pixpine.com/">
                              www.pixpine.com
                            </a>
                          </li>
                          <li>
                            <a href="mailto:support@pixpine.com">
                              support@pixpine.com
                            </a>
                          </li>
                        </ul>
                        <ul>
                          <li>
                            <a
                              href="https://chonburiinterww.com/pixpine-v2/terms-and-conditions.php"
                            >
                              Terms & Conditions
                            </a>
                          </li>
                          <li>
                            <a
                              href="https://chonburiinterww.com/pixpine-v2/policy.php"
                            >
                              Privacy Policy
                            </a>
                          </li>
                          <li>
                            <a
                              href="https://chonburiinterww.com/pixpine-v2/license.php"
                            >
                              Licences
                            </a>
                          </li>
                        </ul>
                      </div>
                      <p style="text-align: center">
                        Copyright © 2023
                        <a href="https://www.pixpine.com/">Pixpine</a>
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
            <td height="100%" width="1" bgcolor="#e8e8e8">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#f5f5f5">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#fcfcfc">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#fefefe">
              <div style="width: 1px; height: 1px"></div>
            </td>
          </tr>
          <tr id="bottom">
            <!--Bottom-left corner-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-a1" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a3" height="1" bgcolor="#fefefe">
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
                    <td id="bl-b1" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b5" height="1" bgcolor="#fefefe">
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
                    <td id="bl-c1" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c2" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c3" height="1" bgcolor="#f8f8f8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c4" height="1" bgcolor="#f9f9f9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c5" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c6" height="1" bgcolor="#fefefe">
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
                    <td id="bl-d1" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d2" height="1" bgcolor="#e9e9e9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d3" height="1" bgcolor="#ececec">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d4" height="1" bgcolor="#efefef">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d5" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d7" height="1" bgcolor="#fefefe">
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
                    <td id="bl-e2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e3" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e4" height="1" bgcolor="#e0e0e0">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e5" height="1" bgcolor="#ebebeb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e7" height="1" bgcolor="#fdfdfd">
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
                    <td id="bl-f3" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f4" height="1" bgcolor="#cdcdcd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f5" height="1" bgcolor="#e0e0e0">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f6" height="1" bgcolor="#f1f1f1">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f7" height="1" bgcolor="#fbfbfb">
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
                    <td id="bl-g4" height="1" bgcolor="#bbbbbb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g5" height="1" bgcolor="#d4d4d4">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g6" height="1" bgcolor="#eeeeee">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g7" height="1" bgcolor="#f9f9f9">
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
                    <td height="1" bgcolor="#afafaf">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#cfcfcf">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ececec">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#f9f9f9">
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
                    <td id="br-a4" height="1" bgcolor="#bbbbbb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a5" height="1" bgcolor="#d4d4d4">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a6" height="1" bgcolor="#eeeeee">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a7" height="1" bgcolor="#f9f9f9">
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
                    <td id="br-b3" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b4" height="1" bgcolor="#cdcdcd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b5" height="1" bgcolor="#e0e0e">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b6" height="1" bgcolor="#f1f1f1">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b7" height="1" bgcolor="#fbfbfb">
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
                    <td id="br-c2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c3" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c4" height="1" bgcolor="#e0e0e0">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c5" height="1" bgcolor="#ebebeb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c7" height="1" bgcolor="#fdfdfd">
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
                    <td id="br-d1" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d2" height="1" bgcolor="#e9e9e9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d3" height="1" bgcolor="#ececec">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d4" height="1" bgcolor="#efefef">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d5" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d7" height="1" bgcolor="#fefefe">
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
                    <td id="br-e1" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e2" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e3" height="1" bgcolor="#f8f8f8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e4" height="1" bgcolor="#f9f9f9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e5" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e6" height="1" bgcolor="#fefefe">
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
                    <td id="br-f1" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f5" height="1" bgcolor="#fefefe">
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
                    <td id="br-g1" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g3" height="1" bgcolor="#fefefe">
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
</html>

  ';
}

function pixpine_welcome_email($name){
    $html = '
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Setup</title>
    <link rel="stylesheet" href="' . get_template_directory_uri() . 'styles/style.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

      * {
        font-family: "Roboto", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      body {
        background-color: #fafafa;
        transition: 0.3s;
      }
      @font-face {
        font-family: "Helvetica Neue", sans-serif;
        src: url(../fonts/helveticaneue.ttf);
        font-weight: 400;
      }
      a {
        transition: 0.3s;
        text-decoration: none;
        color: var(--text-color);
      }
      a:hover {
        color: var(--primary-color);
      }
      :root {
        --primary-color: #005aff;
        --text-color: #333333;
        --banner-color: #b9dfff;
      }
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      p,
      span,
      strong,
      i,
      small,
      div {
        transition: 0.3s;
        color: var(--text-color);
        margin: 0;
        text-decoration: none;
      }
      p {
        font-size: 16px;
        line-height: 24px;
      }
      ul {
        margin: 0;
        padding: 0;
      }
      ul li {
        list-style-type: none;
      }
      img {
        max-width: 100%;
      }
      .container {
        max-width: 1450px;
        padding-left: 50px;
        padding-right: 50px;
        margin: 0 auto;
        box-sizing: border-box;
      }
      .social_link {
        text-align: center;
      }
      .social_link li {
        display: inline-block;
        margin: 0 13px;
      }
      .footer_menu ul {
        text-align: center;
      }
      .footer_menu ul li {
        display: inline-block;
        padding: 0 7.5px;
        border-right: 1px solid var(--text-color);
        margin: 0;
        line-height: 1;
        margin: 4px 0;
      }
      .footer_menu ul li:last-child {
        border-right: 0;
      }
      .footer_menu {
        margin: 8px 0;
      }
      .footer .footer_inner_col {
        border-top: 1px solid #707070;
        padding-top: 26px;
        margin-top: 26px;
      }
      .footer .footer_inner_col p,
      .footer .footer_inner_col a {
        font-size: 12px;
        line-height: 14px;
      }
      .footer .address h4 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 14px;
      }
      .footer .address p,
      .footer .address a {
        font-size: 15px;
        line-height: 22px;
      }
      .name__order p {
        margin-top: 13px;
      }

      .name__order h3 {
        font-size: 18px;
        line-height: 22px;
        margin-top: 7px;
        font-weight: 500;
        text-transform: uppercase;
      }
      .name__order h4 {
        font-size: 16px;
        line-height: 19px;
        font-weight: 700;
      }
      .main__content {
        margin-top: 44px;
        margin-bottom: 35px;
        /* min-height: 40vh; */
      }
      .main__content h2 {
        text-transform: uppercase;
        font-size: 16px;
        line-height: 19px;
        font-weight: 700;
        margin-bottom: 13px;
      }
      .purchase_date__payment_method p {
        font-size: 16px;
        line-height: 19px;
        font-weight: 400;
        margin-bottom: 6px;
      }
      .purchase_date__payment_method p span,
      .purchase_date__payment_method p strong {
        font-weight: 700;
      }
      .main__content table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 25px;
      }

      .main__content td,
      .main__content th {
        border: 1px solid #707070;
        text-align: left;
        padding: 9px;
      }

      .main__content .table__heading,
      .main__content .order_total,
      .main__content th,
      .main__content td {
        font-size: 16px;
        line-height: 19px;
        font-weight: 400;
      }
      .main__content .order_total,
      .main__content .font_bold {
        font-weight: 700;
        color: var(--text-color);
      }
      .main__content td h3 {
        font-size: 14px;
        line-height: 17px;
        font-weight: 400;
        color: var(--primary-color);
      }

      .main__content td p {
        font-size: 10px;
        line-height: 13px;
        font-weight: 400;
      }

      /* rest password */
      .reset__login__page .rest_btn {
        border: 1px solid var(--primary-color);
        border-radius: 30px;
        padding: 7px 30px;
        box-shadow: none;
        color: var(--text-color);
        background-color: transparent;
        font-size: 16px;
        line-height: 19px;
        font-weight: 500;
        display: inline-block;
        cursor: pointer;
        margin: 30px 0;
      }
      .top_p {
        margin-bottom: 25px;
      }
      .reset__login__page .main__content p a {
        color: var(--primary-color);
        font-weight: 700;
      }
      .reset__login__page p span,
      .reset__login__page p strong {
        font-weight: 700;
        color: var(--text-color);
      }
      .reset__login__page .main__content {
        margin-bottom: 50px;
      }
      .welcome_btn_col button {
        background: transparent;
        outline: none;
        box-shadow: none;
        padding: 13px;
        border: 1px solid #707070;
        border-radius: 0;
        font-size: 18px;
        line-height: 22px;
        font-weight: 500;
        color: var(--primary-color);
        min-width: 165px;
        text-align: left;
        cursor: pointer;
      }
      .welcome_btn_col button img {
        margin-left: 12px;
      }
      .welcome_btn_text__col {
        display: inline-block;
        background-color: var(--banner-color);
        padding: 8px 12px;
        margin-left: auto;
        float: right;
      }
      .welcome_btn_col {
        margin-top: 35px;
        margin-bottom: 40px;
      }
      .welcome_btn_text__col h3 {
        font-size: 14px;
        line-height: 16px;
        font-weight: 500;
        color: #696969;
      }
      .welcome_btn_text__col h3 span {
        color: var(--primary-color);
        font-weight: 700;
      }
      .welcome_btn_text__col p {
        font-size: 13px;
        line-height: 18px;
        font-weight: 500;
        color: var(--primary-color);
      }
      .free__mockups__grid__col h2 {
        font-size: 17px;
        line-height: 20px;
        font-weight: 500;
        text-transform: inherit;
        margin-bottom: 10px;
      }
      .free__mockups__grid__col .card_container {
        text-align: center;
        margin: 0 -5px;
      }

      .free__mockups__grid__col .card_item {
        border: 1px solid #707070;
        display: inline-block;
        text-align: center;
        background-color: #ffffff;
        overflow: hidden;
        width: 158px;
        height: 115px;
        margin: 0 5px;
        margin-bottom: 20px;
      }
      .free__mockups__grid__col .card_item img {
        width: 100%;
        max-width: 100%;
        object-fit: cover;
        margin-top: 0;
        height: 100%;
      }
      .welcome__page .footer .footer_inner_col {
        margin-top: 0;
      }
      .welcome__page .main__content {
        margin-bottom: 15px;
      }

      @media only screen and (max-width: 767px) {
        .main_section_parent {
          padding: 0 20px 30px 20px !important;
        }
        .free__mockups__grid__col .card_item {
          width: 190px;
        }
        .welcome_btn_text__col {
          width: max-content;
          margin-top: 10px;
          display: block;
          float: unset;
          margin-left: 0;
        }
      }
    </style>
  </head>
  <body>
    <div
      style="
        background: #ffffff;
        margin: 0 auto;
        padding: 0;
        position: relative;
        max-width: 655px;
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
                    <td id="tl-a7" height="1" bgcolor="#fefefe">
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
                    <td id="tl-b5" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b6" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-b7" height="1" bgcolor="#fdfdfd">
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
                    <td id="tl-c4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c5" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-c7" height="1" bgcolor="#f9f9f9">
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
                    <td id="tl-d3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d4" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d5" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-d7" height="1" bgcolor="#f1f1f1">
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
                    <td id="tl-e3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e4" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e5" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-e6" height="1" bgcolor="#fefefe">
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
                    <td id="tl-f2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f4" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-f5" height="1" bgcolor="#fefefe">
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
                    <td id="tl-g2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g3" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tl-g4" height="1" bgcolor="#f9f9f9">
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
                    <td height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#f8f8f8">
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
                    <td id="tr-a2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a3" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-a4" height="1" bgcolor="#f9f9f9">
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
                    <td id="tr-b2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b4" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-b5" height="1" bgcolor="#fefefe">
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
                    <td id="tr-c3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c4" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c5" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-c6" height="1" bgcolor="#fefefe">
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
                    <td id="tr-d3" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d4" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d5" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-d7" height="1" bgcolor="#f1f1f1">
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
                    <td id="tr-e4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e5" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-e7" height="1" bgcolor="#f9f9f9">
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
                    <td id="tr-f5" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f6" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="tr-f7" height="1" bgcolor="#fdfdfd">
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
                    <td id="tr-g7" height="1" bgcolor="#fefefe">
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
            <td height="100%" width="1" bgcolor="#fefefe">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#fcfcfc">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#f5f5f5">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#e8e8e8">
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
                  class="header"
                  style="padding: 20px; padding-top: 70px; text-align: center"
                >
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
                    <a href="">
                      <img class="wp_logo" src="' . get_template_directory_uri() . '/assets/email/logo.jpg" alt="" />
                    </a>
                  </div>
                </div>
                <div
                  class="main_section_parent welcome__page"
                  style="
                    background: transparent;
                    height: auto;
                    margin: 0;
                    padding: 0 55px 30px 85px;
                    box-sizing: border-box;
                  "
                >
                  <div class="main__content">
                    <div style="max-width: 430px">
                      <div class="top_p">
                        <p style="font-weight: 500">
                          ' . $name . ', Welcome to Pixpine
                        </p>
                      </div>
                      <p>
                        Thanks for registering an account on Pixpine we are
                        excited to see you join. Start exploring our wide range
                        of free mockups and premium mockups.
                      </p>
                    </div>
                    <div class="welcome_btn_col">
                        <a href="' . site_url() . '">
                            <button>
                                Get started <img src="' . get_template_directory_uri() . '/assets/email/right_arrow.jpg" alt="" />
                            </button>
                        </a>
                      <div class="welcome_btn_text__col">
                        <h3><span>Get 96% Off</span> on premium mockups</h3>
                        <p>As low as $0.56 a mockup</p>
                      </div>
                    </div>
                    <div class="free__mockups__grid__col">
                      <h2>Free Mockups</h2>
                      <div class="card_container">';

    $args = array(
        // 'post_type' => 'product', // Replace with the name of your CPT
        'posts_per_page' => 9, // Number of posts to display (adjust as needed)
        'order' => 'DESC', // Sorting order (DESC for latest first, ASC for oldest first)
        'tax_query' => array(
            array(
                'taxonomy' => 'mockup_category', // Replace with the name of your custom category taxonomy
                'field' => 'slug', // You can use 'term_id', 'name', or 'slug'
                'terms' => 'free-mockups', // Replace with the slug of the custom category term you want to query
            ),
        ),
    );
    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) {
        $count = 0;
        while ($custom_query->have_posts()) {
            $custom_query->the_post();
            $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());

            $html .= '<div class="card_item">
                                            <img src="' . $thumbnail_url . '" alt="" />
                                        </div>';
        }
    }

    $html .= '</div>
                    </div>
                  </div>
                  <div class="footer">
                    <div class="footer_inner_col">
                      <ul class="social_link">
                        <li>
                          <a class="youtube" href="https://www.youtube.com/">
                            <img src="' . get_template_directory_uri() . '/assets/email/youtube.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a
                            class="pinterest"
                            href="https://www.pinterest.com/"
                          >
                            <img src="' . get_template_directory_uri() . '/assets/email/pinterest.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a
                            class="instagram"
                            href="https://www.instagram.com/"
                          >
                            <img src="' . get_template_directory_uri() . '/assets/email/instagram.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a class="twitter" href="https://twitter.com/">
                            <img src="' . get_template_directory_uri() . '/assets/email/twitter.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a class="behance" href="https://www.behance.net/">
                            <img src="' . get_template_directory_uri() . '/assets/email/behance.jpg" alt="" />
                          </a>
                        </li>
                        <li>
                          <a class="facebook" href="https://www.facebook.com/">
                            <img src="' . get_template_directory_uri() . '/assets/email/facebook.jpg" alt="" />
                          </a>
                        </li>
                      </ul>
                      <div class="footer_menu">
                        <ul>
                          <li>
                            <a href="' . site_url() . '">
                              www.pixpine.com
                            </a>
                          </li>
                          <li>
                            <a href="mailto:support@pixpine.com">
                              support@pixpine.com
                            </a>
                          </li>
                        </ul>
                        <ul>
                          <li>
                            <a
                              href="' . site_url("terms-and-conditions") . '"
                            >
                              Terms & Conditions
                            </a>
                          </li>
                          <li>
                            <a
                              href="' . site_url("policy") . '"
                            >
                              Privacy Policy
                            </a>
                          </li>
                          <li>
                            <a
                              href="' . site_url("license") . '"
                            >
                              Licences
                            </a>
                          </li>
                        </ul>
                      </div>
                      <p style="text-align: center">
                        Copyright © 2023
                        <a href="' . site_url() . '">Pixpine</a>
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
            <td height="100%" width="1" bgcolor="#e8e8e8">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#f5f5f5">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#fcfcfc">
              <div style="width: 1px; height: 1px"></div>
            </td>
            <td height="100%" width="1" bgcolor="#fefefe">
              <div style="width: 1px; height: 1px"></div>
            </td>
          </tr>
          <tr id="bottom">
            <!--Bottom-left corner-->
            <td height="100%" width="1" bgcolor="#ffffff">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tbody>
                  <tr>
                    <td id="bl-a1" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-a3" height="1" bgcolor="#fefefe">
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
                    <td id="bl-b1" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-b5" height="1" bgcolor="#fefefe">
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
                    <td id="bl-c1" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c2" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c3" height="1" bgcolor="#f8f8f8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c4" height="1" bgcolor="#f9f9f9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c5" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-c6" height="1" bgcolor="#fefefe">
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
                    <td id="bl-d1" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d2" height="1" bgcolor="#e9e9e9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d3" height="1" bgcolor="#ececec">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d4" height="1" bgcolor="#efefef">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d5" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-d7" height="1" bgcolor="#fefefe">
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
                    <td id="bl-e2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e3" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e4" height="1" bgcolor="#e0e0e0">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e5" height="1" bgcolor="#ebebeb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-e7" height="1" bgcolor="#fdfdfd">
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
                    <td id="bl-f3" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f4" height="1" bgcolor="#cdcdcd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f5" height="1" bgcolor="#e0e0e0">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f6" height="1" bgcolor="#f1f1f1">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-f7" height="1" bgcolor="#fbfbfb">
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
                    <td id="bl-g4" height="1" bgcolor="#bbbbbb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g5" height="1" bgcolor="#d4d4d4">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g6" height="1" bgcolor="#eeeeee">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="bl-g7" height="1" bgcolor="#f9f9f9">
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
                    <td height="1" bgcolor="#afafaf">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#cfcfcf">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#ececec">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="#f9f9f9">
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
                    <td id="br-a4" height="1" bgcolor="#bbbbbb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a5" height="1" bgcolor="#d4d4d4">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a6" height="1" bgcolor="#eeeeee">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-a7" height="1" bgcolor="#f9f9f9">
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
                    <td id="br-b3" height="1" bgcolor="#fafafa">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b4" height="1" bgcolor="#cdcdcd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b5" height="1" bgcolor="#e0e0e">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b6" height="1" bgcolor="#f1f1f1">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-b7" height="1" bgcolor="#fbfbfb">
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
                    <td id="br-c2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c3" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c4" height="1" bgcolor="#e0e0e0">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c5" height="1" bgcolor="#ebebeb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c6" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-c7" height="1" bgcolor="#fdfdfd">
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
                    <td id="br-d1" height="1" bgcolor="#e8e8e8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d2" height="1" bgcolor="#e9e9e9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d3" height="1" bgcolor="#ececec">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d4" height="1" bgcolor="#efefef">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d5" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d6" height="1" bgcolor="#fbfbfb">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-d7" height="1" bgcolor="#fefefe">
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
                    <td id="br-e1" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e2" height="1" bgcolor="#f6f6f6">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e3" height="1" bgcolor="#f8f8f8">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e4" height="1" bgcolor="#f9f9f9">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e5" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-e6" height="1" bgcolor="#fefefe">
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
                    <td id="br-f1" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f2" height="1" bgcolor="#fcfcfc">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f3" height="1" bgcolor="#fdfdfd">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f4" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-f5" height="1" bgcolor="#fefefe">
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
                    <td id="br-g1" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g2" height="1" bgcolor="#fefefe">
                      <div style="width: 1px; height: 1px"></div>
                    </td>
                  </tr>
                  <tr>
                    <td id="br-g3" height="1" bgcolor="#fefefe">
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
</html>
';
return $html;
}


function pixpine_send_html_email($to, $subject, $message) {
  $headers[] = 'Content-Type: text/html; charset=UTF-8';
  $result = wp_mail($to, $subject, $message, $headers);
  // if ($result) {
  //     echo 'HTML email sent successfully!';
  // } else {
  //     echo 'Failed to send HTML email.';
  // }
}