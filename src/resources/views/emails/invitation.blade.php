<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Invitation CoLoc</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Mono:wght@400;500&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body style="margin:0;padding:0;background:#0a0a0a;font-family:'DM Sans',sans-serif;">

  <table width="100%" cellpadding="0" cellspacing="0" style="background:#0a0a0a;min-height:100vh;padding:48px 16px;">
    <tr>
      <td align="center">
        <table width="580" cellpadding="0" cellspacing="0" style="max-width:580px;width:100%;">

          <!-- LOGO -->
          <tr>
            <td style="padding-bottom:32px;text-align:center;">
              <table cellpadding="0" cellspacing="0" align="center">
                <tr>
                  <td style="
                    background:#c9a84c;
                    border-radius:9px;
                    width:30px;height:30px;
                    text-align:center;
                    vertical-align:middle;
                    font-weight:800;
                    font-size:13px;
                    color:#0a0a0a;
                    padding:0 10px;
                  ">C</td>
                  <td style="
                    padding-left:9px;
                    font-family:'DM Serif Display',serif;
                    font-size:20px;
                    color:#c9a84c;
                    vertical-align:middle;
                  ">CoLoc</td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- CARD -->
          <tr>
            <td style="
              background:#111111;
              border:1px solid #1e1e1e;
              border-radius:16px;
              overflow:hidden;
            ">

              <!-- TOP GOLD BAR -->
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="height:3px;background:linear-gradient(90deg,#c9a84c,#e8c97a,#c9a84c);"></td>
                </tr>
              </table>

              <!-- HERO -->
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="
                    padding:48px 52px 40px;
                    text-align:center;
                    border-bottom:1px solid #1a1a1a;
                  ">
                    <!-- Icon badge -->
                    <table cellpadding="0" cellspacing="0" align="center" style="margin-bottom:28px;">
                      <tr>
                        <td style="
                          background:rgba(201,168,76,0.08);
                          border:1px solid rgba(201,168,76,0.2);
                          border-radius:14px;
                          width:56px;height:56px;
                          text-align:center;
                          vertical-align:middle;
                          font-size:22px;
                          color:#c9a84c;
                        ">&#9670;</td>
                      </tr>
                    </table>

                    <h1 style="
                      font-family:'DM Serif Display',serif;
                      font-size:32px;
                      font-weight:400;
                      color:#ffffff;
                      margin:0 0 10px;
                      letter-spacing:-0.03em;
                      line-height:1.15;
                    ">Vous avez été invité</h1>

                    <p style="
                      font-size:13px;
                      color:#666;
                      margin:0;
                      font-weight:400;
                      letter-spacing:0.1em;
                      text-transform:uppercase;
                    ">à rejoindre une colocation</p>
                  </td>
                </tr>
              </table>

              <!-- BODY CONTENT -->
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="padding:36px 52px 0;">

                    <!-- Label -->
                    <p style="
                      font-size:10.5px;
                      letter-spacing:0.15em;
                      text-transform:uppercase;
                      color:#444;
                      margin:0 0 10px;
                      font-weight:600;
                    ">Colocation</p>

                    <!-- Coloc name box -->
                    <table width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="
                          background:rgba(201,168,76,0.06);
                          border:1px solid rgba(201,168,76,0.15);
                          border-radius:10px;
                          padding:15px 20px;
                        ">
                          <table cellpadding="0" cellspacing="0">
                            <tr>
                              <td style="
                                width:7px;height:7px;
                                background:#c9a84c;
                                border-radius:50%;
                                vertical-align:middle;
                                padding-right:12px;
                              "></td>
                              <td style="
                                font-family:'DM Serif Display',serif;
                                font-size:19px;
                                color:#e8c97a;
                                vertical-align:middle;
                              ">{{ $invitation->colocation->name }}</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>

                <!-- DIVIDER -->
                <tr>
                  <td style="padding:28px 52px;">
                    <table width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="height:1px;background:linear-gradient(90deg,transparent,#222 30%,#222 70%,transparent);"></td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <!-- CODE SECTION -->
                <tr>
                  <td style="padding:0 52px 36px;">

                    <p style="
                      font-size:10.5px;
                      letter-spacing:0.15em;
                      text-transform:uppercase;
                      color:#444;
                      margin:0 0 8px;
                      font-weight:600;
                    ">Votre code d'invitation</p>

                    <p style="
                      font-size:13px;
                      color:#777;
                      margin:0 0 18px;
                      line-height:1.6;
                    ">Entrez ce code après vous être connecté pour rejoindre la colocation.</p>

                    <!-- CODE BOX -->
                    <table width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="
                          background:#0a0a0a;
                          border:1px solid #2a2a2a;
                          border-radius:12px;
                          padding:28px 20px;
                          text-align:center;
                        ">
                          <span style="
                            font-family:'DM Mono',monospace;
                            font-size:36px;
                            font-weight:500;
                            color:#ffffff;
                            letter-spacing:0.3em;
                          ">{{$code}}</span>
                          <br>
                          <span style="
                            font-size:10px;
                            color:#333;
                            letter-spacing:0.12em;
                            text-transform:uppercase;
                            display:block;
                            margin-top:10px;
                          ">code unique &mdash; usage unique</span>
                        </td>
                      </tr>
                    </table>

                  </td>
                </tr>

                <!-- FOOTER NOTE -->
                <tr>
                  <td style="
                    padding:20px 52px 36px;
                    border-top:1px solid #161616;
                    text-align:center;
                  ">
                    <p style="
                      font-size:12px;
                      color:#333;
                      margin:0;
                      line-height:1.8;
                    ">
                      Si vous n'êtes pas concerné par ce message, ignorez-le simplement.<br>
                      Cette invitation expirera automatiquement.
                    </p>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

          <!-- BOTTOM -->
          <tr>
            <td style="padding:24px 0 0;text-align:center;">
              <p style="
                font-size:10px;
                color:#222;
                margin:0;
                letter-spacing:0.12em;
                text-transform:uppercase;
              ">CoLoc &mdash; Gestion de colocation</p>
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>

</body>
</html>