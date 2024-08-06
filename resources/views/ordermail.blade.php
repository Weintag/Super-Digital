<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body { margin: 0; padding: 0; background: #d9d9d9; }
  div, p, a, li, td { -webkit-text-size-adjust: none; }
  .ReadMsgBody { width: 100%; background-color: #ffffff; }
  .ExternalClass { width: 100%; background-color: #ffffff; }
  body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
  html { width: 100%; }
  p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
  .visibleMobile { display: none; }
  .hiddenMobile { display: block; }

  @media only screen and (max-width: 600px) {
  body { width: auto !important; }
  table[class=fullTable] { width: 96% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 45% !important; }
  .erase { display: none; }
  }

  @media only screen and (max-width: 420px) {
  table[class=fullTable] { width: 100% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 100% !important; clear: both; }
  table[class=col] td { text-align: left !important; }
  .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
  .visibleMobile { display: block !important; }
  .hiddenMobile { display: none !important; }
  }
</style>


<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#d9d9d9">
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
        <tr class="hiddenMobile">
          <td height="40"></td>
        </tr>
        <tr class="visibleMobile">
          <td height="30"></td>
        </tr>

        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
              <tbody>
                <tr>
                  <td>
                    @foreach($order as $ord)
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                      <tbody>
                        <tr>
                          <td align="left"> <img src="{{$message->embed(public_path(). '/storage/img/logo/logo_small.png')}}" width="90%" alt="logo" border="0" /></td>
                        </tr>
                        <tr class="hiddenMobile">
                          <td height="40"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 12px; color: #1b1b1b; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                            Здравствуйте, {{$ord->user->name}}.
                            <br>Спасибо за покупку в нашем магазине.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                      <tbody>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 21px; color: #0D56A6; letter-spacing: -1px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                            Счет
                          </td>
                        </tr>
                        <tr>
                        <tr class="hiddenMobile">
                          <td height="50"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 14px; color: #1b1b1b; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                            <small>Заказ</small> № {{$ord->id}}<br />
                            <small>От {{$ord->created_at}}</small>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<!-- /Header -->
<!-- Order Details -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="d9d9d9">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <th style="font-size: 12px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                        Название товара
                      </th>
                      <th style="font-size: 12px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                        Количество
                      </th>
                      <th style="font-size: 12px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                        Цена
                      </th>
                    </tr>
                    <tr>
                      <td height="1" style="background: #bebebe;" colspan="4"></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4"></td>
                    </tr>
                    @foreach($orderproduct as $orderprod)
                    <tr>
                      <td style="font-size: 14px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b;  line-height: 18px;  vertical-align: top; padding:10px 0;" class="article">
                        {{$orderprod->catalog->name}}
                      </td>
                      <td style="font-size: 14px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="center">{{$orderprod->quantity}}</td>
                      <td style="font-size: 14px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b;  line-height: 18px;  vertical-align: top; padding:10px 0;" align="right">{{$orderprod->price}} ₽</td>
                    </tr>
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<!-- /Order Details -->
<!-- Total -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#d9d9d9">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
              <td>
                <!-- Table Total -->
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <th style="font-size: 14px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b; line-height: 22px; vertical-align: top; text-align:right; ">
                        Итог
                      </th>
                      <th style="font-size: 14px; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; color: #1b1b1b; line-height: 22px; vertical-align: top; text-align:right; white-space:nowrap;" width="80">
                        {{$totalPrice}} ₽
                      </th>
                    </tr>
                    <tr>
                      <td height="20"></td>
                    </tr>
                  </tbody>
                </table>
                <!-- /Information -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">

  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
              <tbody>
                <tr>
                  <td style="font-size: 12px; color: #1b1b1b; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                    C уважением,
                  </td>
                </tr>
                <tr>
                  <td style="font-size: 12px; color: #1b1b1b; font-family: Encode Sans Condensed, -apple-system, Roboto, Helvetica, sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                     Супер Цифровой
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr class="spacer">
          <td height="50"></td>
        </tr>

      </table>
    </td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
</table>
