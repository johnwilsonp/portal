<?php
//
    include_once('menu_session.php');
    @ini_set('session.cookie_httponly', 1);
    @ini_set('session.use_only_cookies', 1);
    @ini_set('session.cookie_secure', 0);
    session_start();
    $_SESSION['scriptcase']['menu']['glo_nm_path_prod']      = "";
    $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = "";
    //check publication with the prod
    $str_path_apl_url = $_SERVER['PHP_SELF'];
    $str_path_apl_url = str_replace("\\", '/', $str_path_apl_url);
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/"));
    $str_path_apl_url = substr($str_path_apl_url, 0, strrpos($str_path_apl_url, "/")+1);
    //check prod
    if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_prod']))
    {
            /*check prod*/$_SESSION['scriptcase']['menu']['glo_nm_path_prod'] = $str_path_apl_url . "_lib/prod";
    }
    //check tmp
    if(empty($_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp']))
    {
            /*check tmp*/$_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] = $str_path_apl_url . "_lib/tmp";
    }
    //end check publication with the prod
class menu
{
  var $nm_data;
  var $sc_page;
  var $str_lang;
  var $str_conf_reg;
  var $str_schema_all;
  var $Ctr_consecutivos;
//
  function sc_Include($path, $tp, $name)
  {
      if ((empty($tp) && empty($name)) || ($tp == "F" && !function_exists($name)) || ($tp == "C" && !class_exists($name)))
      {
          include_once($path);
      }
  } // sc_Include
//
  function controle()
  {
     global 
             
            $path_libs, $path_lib_php, $path_imag_cab, $script_case_init,
            $nmgp_num_aba, $nm_saida, $nm_apl_dependente;
//
     $this->sc_page = $script_case_init;
     $this->sc_charset['UTF-8'] = 'utf-8';
     $this->sc_charset['ISO-2022-JP'] = 'iso-2022-jp';
     $this->sc_charset['ISO-2022-KR'] = 'iso-2022-kr';
     $this->sc_charset['ISO-8859-1'] = 'iso-8859-1';
     $this->sc_charset['ISO-8859-2'] = 'iso-8859-2';
     $this->sc_charset['ISO-8859-3'] = 'iso-8859-3';
     $this->sc_charset['ISO-8859-4'] = 'iso-8859-4';
     $this->sc_charset['ISO-8859-5'] = 'iso-8859-5';
     $this->sc_charset['ISO-8859-6'] = 'iso-8859-6';
     $this->sc_charset['ISO-8859-7'] = 'iso-8859-7';
     $this->sc_charset['ISO-8859-8'] = 'iso-8859-8';
     $this->sc_charset['ISO-8859-8-I'] = 'iso-8859-8-i';
     $this->sc_charset['ISO-8859-9'] = 'iso-8859-9';
     $this->sc_charset['ISO-8859-10'] = 'iso-8859-10';
     $this->sc_charset['ISO-8859-13'] = 'iso-8859-13';
     $this->sc_charset['ISO-8859-14'] = 'iso-8859-14';
     $this->sc_charset['ISO-8859-15'] = 'iso-8859-15';
     $this->sc_charset['WINDOWS-1250'] = 'windows-1250';
     $this->sc_charset['WINDOWS-1251'] = 'windows-1251';
     $this->sc_charset['WINDOWS-1252'] = 'windows-1252';
     $this->sc_charset['TIS-620'] = 'tis-620';
     $this->sc_charset['WINDOWS-1253'] = 'windows-1253';
     $this->sc_charset['WINDOWS-1254'] = 'windows-1254';
     $this->sc_charset['WINDOWS-1255'] = 'windows-1255';
     $this->sc_charset['WINDOWS-1256'] = 'windows-1256';
     $this->sc_charset['WINDOWS-1257'] = 'windows-1257';
     $this->sc_charset['KOI8-R'] = 'koi8-r';
     $this->sc_charset['BIG-5'] = 'big5';
     $this->sc_charset['EUC-CN'] = 'EUC-CN';
     $this->sc_charset['GB18030'] = 'GB18030';
     $this->sc_charset['GB2312'] = 'gb2312';
     $this->sc_charset['EUC-JP'] = 'euc-jp';
     $this->sc_charset['SJIS'] = 'shift-jis';
     $this->sc_charset['EUC-KR'] = 'euc-kr';
     $_SESSION['scriptcase']['charset_entities']['UTF-8'] = 'UTF-8';
     $_SESSION['scriptcase']['charset_entities']['ISO-8859-1'] = 'ISO-8859-1';
     $_SESSION['scriptcase']['charset_entities']['ISO-8859-5'] = 'ISO-8859-5';
     $_SESSION['scriptcase']['charset_entities']['ISO-8859-15'] = 'ISO-8859-15';
     $_SESSION['scriptcase']['charset_entities']['WINDOWS-1251'] = 'cp1251';
     $_SESSION['scriptcase']['charset_entities']['WINDOWS-1252'] = 'cp1252';
     $_SESSION['scriptcase']['charset_entities']['BIG-5'] = 'BIG5';
     $_SESSION['scriptcase']['charset_entities']['EUC-CN'] = 'GB2312';
     $_SESSION['scriptcase']['charset_entities']['GB2312'] = 'GB2312';
     $_SESSION['scriptcase']['charset_entities']['SJIS'] = 'Shift_JIS';
     $_SESSION['scriptcase']['charset_entities']['EUC-JP'] = 'EUC-JP';
     $_SESSION['scriptcase']['charset_entities']['KOI8-R'] = 'KOI8-R';
     $_SESSION['scriptcase']['sc_num_page'] = $script_case_init;
     $_SESSION['scriptcase']['sc_aba_iframe']['menu'][] = "Ctr_consecutivos";
//
      $NM_dir_atual = getcwd();
      if (empty($NM_dir_atual))
      {
         $str_path_sys    = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
         $str_path_sys    = str_replace("\\", '/', $str_path_sys);
      }
      else
      {
         $sc_nm_arquivo   = explode("/", $_SERVER['PHP_SELF']);
         $str_path_sys    = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
      }
     $str_path_web    = $_SERVER['PHP_SELF'];
     $str_path_web    = str_replace("\\", '/', $str_path_web);
     $str_path_web    = str_replace('//', '/', $str_path_web);
     $root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
     $path_aplicacao  = substr($str_path_sys, 0, strrpos($str_path_sys, '/'));
     $path_embutida   = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/') + 1);
     $path_aplicacao .= '/';
     $path_link       = substr($str_path_web, 0, strrpos($str_path_web, '/'));
     $path_link       = substr($path_link, 0, strrpos($path_link, '/')) . '/';
     $dir_raiz = strrpos($_SERVER['PHP_SELF'],"/") ;  
     $dir_raiz = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
     $path_imag_temp  = $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'];
     $path_img_global = $path_link . "_lib/img/";
     $path_botoes     = $path_link . "_lib/img";
     $path_icones     = $path_link . "_lib/img/";
     $path_img_modelo = $path_link . "_lib/img/";
     $path_imag_cab   = $path_link . "_lib/img/";
     $path_css        = $root . $path_link . "_lib/css/";
     $path_lib_php    = $root . $path_link . "_lib/lib/php";
     $path_help       = $path_link . "_lib/webhelp/";
     $path_imagens    = $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/imagens/";
     $path_libs       = $root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/lib/php/";
     $path_third      = $root . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . "/third/";
     $_SESSION['scriptcase']['dir_temp'] = $root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'];
      if (!function_exists("sc_check_mobile"))
      {
          include_once("../_lib/lib/php/nm_check_mobile.php");
      }
      $_SESSION['scriptcase']['proc_mobile'] = sc_check_mobile();
        if (isset($_GET['_sc_force_mobile'])) {
            $_SESSION['scriptcase']['force_mobile'] = 'Y' == $_GET['_sc_force_mobile'];
        }
        if (isset($_SESSION['scriptcase']['force_mobile'])) {
            $_SESSION['scriptcase']['proc_mobile'] = $_SESSION['scriptcase']['force_mobile'];
        }
     if (isset($_SESSION['scriptcase']['user_logout']))
     {
         foreach ($_SESSION['scriptcase']['user_logout'] as $ind => $parms)
         {
             if (isset($_SESSION[$parms['V']]) && $_SESSION[$parms['V']] == $parms['U'])
             {
                 unset($_SESSION['scriptcase']['user_logout'][$ind]);
                 $nm_apl_dest = $parms['R'];
                 $dir = explode("/", $nm_apl_dest);
                 if (count($dir) == 1)
                 {
                     $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
                     $nm_apl_dest = $path_link . SC_dir_app_name($nm_apl_dest) . "/";
                 }
?>
                 <html>
                 <body>
                 <form name="FRedirect" method="POST" action="<?php echo $nm_apl_dest; ?>" target="<?php echo $parms['T']; ?>">
                 </form>
                 <script>
                  document.FRedirect.submit();
                 </script>
                 </body>
                 </html>
<?php
                 exit;
             }
         }
     }
     if (!isset($_SESSION['scriptcase']['str_lang']) || empty($_SESSION['scriptcase']['str_lang']))
     {
         $_SESSION['scriptcase']['str_lang'] = "es";
     }
     if (!isset($_SESSION['scriptcase']['str_conf_reg']) || empty($_SESSION['scriptcase']['str_conf_reg']))
     {
         $_SESSION['scriptcase']['str_conf_reg'] = "es_es";
     }
     $this->str_lang        = $_SESSION['scriptcase']['str_lang'];
     $this->str_conf_reg    = $_SESSION['scriptcase']['str_conf_reg'];
     if (isset($_SESSION['scriptcase']['menu']['session_timeout']['lang'])) {
         $this->str_lang = $_SESSION['scriptcase']['menu']['session_timeout']['lang'];
     }
     elseif (!isset($_SESSION['scriptcase']['menu']['actual_lang']) || $_SESSION['scriptcase']['menu']['actual_lang'] != $this->str_lang) {
         $_SESSION['scriptcase']['menu']['actual_lang'] = $this->str_lang;
         setcookie('sc_actual_lang_Portal',$this->str_lang,'0','/');
     }
     $this->str_schema_all    = (isset($_SESSION['scriptcase']['str_schema_all']) && !empty($_SESSION['scriptcase']['str_schema_all'])) ? $_SESSION['scriptcase']['str_schema_all'] : "Sc9_BlueBerry/Sc9_BlueBerry";
     $this->path_lang = "../_lib/lang/";
     include($this->path_lang . $this->str_lang . ".lang.php");
     include($this->path_lang . "config_region.php");
     include("../_lib/css/" . $this->str_schema_all . "_tab.php");
     $_SESSION['scriptcase']['charset'] = "UTF-8";
     ini_set('default_charset', $_SESSION['scriptcase']['charset']);
     $_SESSION['scriptcase']['charset_html']  = (isset($this->sc_charset[$_SESSION['scriptcase']['charset']])) ? $this->sc_charset[$_SESSION['scriptcase']['charset']] : $_SESSION['scriptcase']['charset'];
     foreach ($this->Nm_conf_reg[$this->str_conf_reg] as $ind => $dados)
     {
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
        {
            $this->Nm_conf_reg[$this->str_conf_reg][$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
     }
     foreach ($this->Nm_lang as $ind => $dados)
     {
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($ind))
        {
            $ind = sc_convert_encoding($ind, $_SESSION['scriptcase']['charset'], "UTF-8");
            $this->Nm_lang[$ind] = $dados;
        }
        if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($dados))
        {
            $this->Nm_lang[$ind] = sc_convert_encoding($dados, $_SESSION['scriptcase']['charset'], "UTF-8");
        }
     }
     if (isset($_SESSION['sc_session']['SC_parm_violation']) && !isset($_SESSION['scriptcase']['menu']['session_timeout']['redir']))
     {
         unset($_SESSION['sc_session']['SC_parm_violation']);
         echo "<html>";
         echo "<body>";
         echo "<table align=\"center\" width=\"50%\" border=1 height=\"50px\">";
         echo "<tr>";
         echo "   <td align=\"center\">";
         echo "       <b><font size=4>" . $this->Nm_lang['lang_errm_ajax_data'] . "</font>";
         echo "   </b></td>";
         echo " </tr>";
         echo "</table>";
         echo "</body>";
         echo "</html>";
         exit;
     }
     include("../_lib/css/" . $this->str_schema_all . "_grid.php");
     $_SESSION['scriptcase']['reg_conf']['date_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_format'] : "ddmmyyyy";
     $_SESSION['scriptcase']['reg_conf']['date_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['data_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['data_sep'] : "/";
     $_SESSION['scriptcase']['reg_conf']['date_week_ini'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['prim_dia_sema'] : "SU";
     $_SESSION['scriptcase']['reg_conf']['time_format']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_format']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_format'] : "hhiiss";
     $_SESSION['scriptcase']['reg_conf']['time_sep']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_sep']))                 ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_sep'] : ":";
     $_SESSION['scriptcase']['reg_conf']['time_pos_ampm'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_pos_ampm'] : "right_without_space";
     $_SESSION['scriptcase']['reg_conf']['time_simb_am']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_am'] : "am";
     $_SESSION['scriptcase']['reg_conf']['time_simb_pm']  = (isset($this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm']))          ?  $this->Nm_conf_reg[$this->str_conf_reg]['hora_simbolo_pm'] : "pm";
     $_SESSION['scriptcase']['reg_conf']['simb_neg']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg']))            ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sinal_neg'] : "-";
     $_SESSION['scriptcase']['reg_conf']['grup_num']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_agr'] : ".";
     $_SESSION['scriptcase']['reg_conf']['dec_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_sep_dec'] : ",";
     $_SESSION['scriptcase']['reg_conf']['neg_num']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_format_num_neg'] : 2;
     $_SESSION['scriptcase']['reg_conf']['monet_simb']    = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_simbolo'] : "$";
     $_SESSION['scriptcase']['reg_conf']['monet_f_pos']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_pos'] : 3;
     $_SESSION['scriptcase']['reg_conf']['monet_f_neg']   = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_format_num_neg'] : 13;
     $_SESSION['scriptcase']['reg_conf']['grup_val']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_agr'] : ".";
     $_SESSION['scriptcase']['reg_conf']['dec_val']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec']))        ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_sep_dec'] : ",";
     $_SESSION['scriptcase']['reg_conf']['html_dir']      = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  " DIR='" . $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] . "'" : "";
     $_SESSION['scriptcase']['reg_conf']['css_dir']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl']))              ?  $this->Nm_conf_reg[$this->str_conf_reg]['ger_ltr_rtl'] : "LTR";
     $_SESSION['scriptcase']['reg_conf']['num_group_digit']       = (isset($this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit']))       ?  $this->Nm_conf_reg[$this->str_conf_reg]['num_group_digit'] : "1";
     $_SESSION['scriptcase']['reg_conf']['unid_mont_group_digit'] = (isset($this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'])) ?  $this->Nm_conf_reg[$this->str_conf_reg]['unid_mont_group_digit'] : "1";
     include("../_lib/buttons/" . trim($str_button) . "/" . trim($str_button) . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".php");
     $Str_btn_css = trim($str_button) . "/" . trim($str_button) . ".css";
     $this->sc_Include($path_lib_php . "/nm_gp_config_btn.php", "F", "nmButtonOutput"); 
     if (isset($_SESSION['scriptcase']['menu']['session_timeout']['redir'])) {
         $SS_cod_html  = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">';
         $SS_cod_html .= "<HTML>\r\n";
         $SS_cod_html .= " <HEAD>\r\n";
         $SS_cod_html .= "  <TITLE></TITLE>\r\n";
         $SS_cod_html .= "   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\"/>\r\n";
         if ($_SESSION['scriptcase']['proc_mobile']) {
             $SS_cod_html .= "   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\"/>\r\n";
         }
         $SS_cod_html .= "   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\"/>\r\n";
         $SS_cod_html .= "    <META http-equiv=\"Pragma\" content=\"no-cache\"/>\r\n";
         if ($_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] == "R") {
             $SS_cod_html .= "  </HEAD>\r\n";
             $SS_cod_html .= "   <body>\r\n";
         }
         else {
             $SS_cod_html .= "    <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n";
             $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_aba.css\"/>\r\n";
             $SS_cod_html .= "    <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_aba" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\"/>\r\n";
             $SS_cod_html .= "  </HEAD>\r\n";
             $SS_cod_html .= "   <body class=\"scTabTable\">\r\n";
             $SS_cod_html .= "    <table align=\"center\"><tr><td style=\"padding: 0\"><div>\r\n";
             $SS_cod_html .= "    <table class=\"scTabTable\" width='100%' cellspacing=0 cellpadding=0><tr class=\"scTabHeader\"><td class=\"scTabHeaderFont\" style=\"padding: 15px 30px; text-align: center\">\r\n";
             $SS_cod_html .= $this->Nm_lang['lang_errm_expired_session'] . "\r\n";
             $SS_cod_html .= "     <form name=\"Fsession_redir\" method=\"post\"\r\n";
             $SS_cod_html .= "           target=\"_self\">\r\n";
             $SS_cod_html .= "           <input type=\"button\" name=\"sc_sai_seg\" value=\"OK\" onclick=\"sc_session_redir('" . $_SESSION['scriptcase']['menu']['session_timeout']['redir'] . "');\">\r\n";
             $SS_cod_html .= "     </form>\r\n";
             $SS_cod_html .= "    </td></tr></table>\r\n";
             $SS_cod_html .= "    </div></td></tr></table>\r\n";
         }
         $SS_cod_html .= "    <script type=\"text/javascript\">\r\n";
         if ($_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] == "R") {
             $SS_cod_html .= "      sc_session_redir('" . $_SESSION['scriptcase']['menu']['session_timeout']['redir'] . "');\r\n";
         }
         $SS_cod_html .= "      function sc_session_redir(url_redir)\r\n";
         $SS_cod_html .= "      {\r\n";
         $SS_cod_html .= "         if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n";
         $SS_cod_html .= "         {\r\n";
         $SS_cod_html .= "            window.parent.sc_session_redir(url_redir);\r\n";
         $SS_cod_html .= "         }\r\n";
         $SS_cod_html .= "         else\r\n";
         $SS_cod_html .= "         {\r\n";
         $SS_cod_html .= "             if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n";
         $SS_cod_html .= "             {\r\n";
         $SS_cod_html .= "                 window.close();\r\n";
         $SS_cod_html .= "                 window.opener.sc_session_redir(url_redir);\r\n";
         $SS_cod_html .= "             }\r\n";
         $SS_cod_html .= "             else\r\n";
         $SS_cod_html .= "             {\r\n";
         $SS_cod_html .= "                 window.location = url_redir;\r\n";
         $SS_cod_html .= "             }\r\n";
         $SS_cod_html .= "         }\r\n";
         $SS_cod_html .= "      }\r\n";
         $SS_cod_html .= "    </script>\r\n";
         $SS_cod_html .= " </body>\r\n";
         $SS_cod_html .= "</HTML>\r\n";
         unset($_SESSION['scriptcase']['menu']['session_timeout']);
         unset($_SESSION['sc_session']);
     }
     if (isset($SS_cod_html))
     {
         echo $SS_cod_html;
         exit;
     }
     $_SESSION['scriptcase']['contr_link_emb'] = $dir_raiz . "menu.php" ; 
      $this->Change_Menu = false;
      if (isset($_SESSION['scriptcase']['menu_atual']) && (!isset($_SESSION['sc_session'][$this->sc_page]['menu']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->sc_page]['menu']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['menu']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['menu'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['menu']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['menu']['link'] = $path_link . "" . SC_dir_app_name('menu') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['menu']['label'] = "menu";
              $this->Change_Menu = true;
         }
         elseif ($this->sc_page == $this->sc_init_menu)
         {
             $achou = false;
             foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
             {
                 if ($apl == "menu")
                 {
                     $achou = true;
                 }
                 elseif ($achou)
                 {
                     unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                     $this->Change_Menu = true;
                 }
             }
         }
     }
     $_SESSION['scriptcase']['nm_bases_security']  = "enc_nm_enc_v1D9NmDQJsDSrwHQFaHgrwDkB/HEF/VoBOHQXGZSBqHAvCD5BODMvCHEJqHEXCDoFUDcXGZSX7DSN7HuFaHuNOZSrCH5FqDoXGHQJmZ1BiHAvCZMFaHgveHArsDWFGDoBOHQXsDQBOZ1zGV5BODMvsV9BUDWrmVENUHQNmZ1FUZ1vOZMBqHgveDkB/DWBmZuJeHQJKZ9rqZ1zGV5BODMrYZSJqDuX7HMXGHQNmVIJwZ1vOZMFaHgNKHErsDWBmZuBqHQBiDQFaHAveD5NUHgNKDkBOV5FYHMBiD9BsZSBqD1rwHQJeDEvsZSJqV5FaHIX7HQJKZ9XGHIrKD5FaDMzGDkBOHEX7DoFUHQBqZkFGD1rKHQJwDEBODkFeH5FYVoFGHQJKDQJsD1veD5JwHuNOVcBOV5X7HMBiD9BsVIraD1rwV5X7HgBeHEFKV5FaVoFGDcBwDQX7Z1N7VWJwDMrwVIFCDWXCDoX7D9XOZ1FGHArKV5FUDMrYZSXeV5FqHIJsDcBiDuFaZ1NaVWJwDMNOV9BUDWF/HMF7HQBqZ1FaHArKD5rqDMvCHArCH5F/HIJsD9XsZ9JeD1BeD5F7DMvmVcFeV5X/VEBiHQBiZ1FGZ1NOHQNUHgrKZSJ3V5B7VoFGHQNwZSFUDSBYHuBqDMrYDkB/HEX/DoXGHQNwVIJsHANOHuFUDMveHErCDurmVoFGHQFYZSBiHIrwHuX7HgvOVIBsH5XKVoBqD9BsZ1F7DSrYD5rqDMrYZSJ3DurmZuJsHQNwZSFUDSBYHQB/DMvsV9FeDuB7DoXGDcFYZSBqDSNOHQBqHgBeVkJqDWBmVoFGDcXGDuFaDSN7HQXGDMNOVcB/H5B3DoXGHQXGH9BqHINaZMB/HgrKZSJqDWBmDoF7D9XsDQJsDSBYV5FGHgNKDkBsHEX/VEBiHQBqZ1BiD1rwHQJsHgveDkXKDurmVoFGDcXGH9FUDSBYHQBODMBOV9FeDuFGDoXGHQNwZ1BOHANOHQJsHgNOHArCDurmVoFGHQXsDQFUDSBYHuJwDMBYVIB/DWB3VoBqD9BsZ1F7DSrYD5rqDMrYZSJGH5FYDoF7DcXOZSFGHAveV5FUHuBYVcFKDur/VoJwHQJmVIJsDSvmD5FaHgNOHEBUDWr/DoB/DcBwZSFGHANOV5FUHuNOV9FiDWXCHMFaD9JmZ1B/HIrwV5FaDErKDkBsV5FaHMJeDcBwDQFGD1veHQXGHgvsVcBOHEX7DoraHQFYH9FaHAvmZMJeHgvCHEJGDWF/VoJeD9NwDQBqHIvsV5XGDMrwDkFCDuX7VEF7D9BiH9FaHAN7D5FaDEBOZSJGH5BmDoB/D9NwZSX7D1BeV5BOHuvmVcFCDWXCVENUDcBqH9B/HABYD5JeDMzGHAFKV5XKDoF7D9XsDQJsDSBYV5FGHgNKDkFCH5FqVoBqDcNwH9B/HIveD5FaDErKZSJGH5F/DoFUHQNwH9X7Z1rwD5BOHuNOVIBsDWXCDoJsDcBwH9B/Z1rYHQJwHgveDkXKDWBmDoJeHQBiZ9F7HANKV5XGDMvOVcBUH5FqHMBiD9BsVIraD1rwV5X7HgBeHErsDurmZuBqD9JKH9FGHIrwVWBqHgrwVIFCHEFYHIX7HQXOH9BOD1rwV5FaHgBYHArsDuFaHIJsD9XsZ9JeD1BeD5F7DMvmVcFKH5XCDoraD9BsZ1B/Z1BeHQJwDEBODkFeH5FYVoFGHQJKDQBqDSzGD5NUDMvOVcFeDWXCDoJsDcBwH9B/Z1rYHQJwDErKHEBUDWFqDorqDcXOZSFGHAN7V5FUHuNOVcFKHEFYDoNUHQJmZ1FGHAvsD5XGHgveHErsDWrGDoXGHQBiDQBqHAvOV5JeDMvOZSBOV5r/VEB/";
$_SESSION['scriptcase']['nmamp'] = array(60, 100, 105, 118, 32, 115, 116, 121, 108, 101, 61, 34, 102, 111, 110, 116, 45, 102, 97, 109, 105, 108, 121, 58, 32, 84, 97, 104, 111, 109, 97, 44, 32, 65, 114, 105, 97, 108, 44, 32, 115, 97, 110, 115, 45, 115, 101, 114, 105, 102, 59, 32, 102, 111, 110, 116, 45, 115, 105, 122, 101, 58, 32, 49, 51, 112, 120, 59, 32, 102, 111, 110, 116, 45, 119, 101, 105, 103, 104, 116, 58, 32, 98, 111, 108, 100, 59, 32, 116, 101, 120, 116, 45, 97, 108, 105, 103, 110, 58, 32, 99, 101, 110, 116, 101, 114, 34, 62, 84, 104, 105, 115, 32, 97, 112, 112, 108, 105, 99, 97, 116, 105, 111, 110, 32, 119, 97, 115, 32, 100, 101, 118, 101, 108, 111, 112, 101, 100, 32, 97, 110, 100, 32, 112, 117, 98, 108, 105, 115, 104, 101, 100, 32, 117, 115, 105, 110, 103, 32, 97, 32, 116, 114, 105, 97, 108, 32, 118, 101, 114, 115, 105, 111, 110, 32, 111, 102, 32, 83, 99, 114, 105, 112, 116, 67, 97, 115, 101, 32, 97, 110, 100, 32, 105, 116, 115, 32, 116, 114, 105, 97, 108, 32, 112, 101, 114, 105, 111, 100, 32, 104, 97, 115, 32, 101, 120, 112, 105, 114, 101, 100, 46, 60, 47, 100, 105, 118, 62);
     if (is_dir($path_aplicacao . 'img'))
     {
         $Res_dir_img = @opendir($path_aplicacao . 'img');
         if ($Res_dir_img)
         {
             while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
             {
                if (@is_file($path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $path_aplicacao . 'img/' . $Str_arquivo)
                {
                    @unlink($path_aplicacao . 'img/' . $Str_arquivo);
                }
             }
         }
         @closedir($Res_dir_img);
         rmdir($path_aplicacao . 'img');
     }
     $this->sc_Include($path_libs. "/nm_sec_prod.php", "F", "nm_reg_prod") ; 
     $this->sc_Include($path_libs. "/nm_trata_saida.php", "C", "nm_trata_saida") ; 
     $nm_saida = new nm_trata_saida();
     $nmsc_falta_var = "";
     if (!empty($nmsc_falta_var)) 
     {
         echo "<html>";
         echo "<table width=\"80%\" border=\"0\" height=\"117\" cellpadding=0 cellspacing=0>";
         echo "<tr>";
         echo "   <td bgcolor=\"#fafbfe\">";
         echo "       <b><font size=\"4\">" . $this->Nm_lang['lang_errm_glob'] . "</font>";
         echo "  " . $nmsc_falta_var;
         echo "   </b></td>";
         echo " </tr>";
         echo "<tr>";
         echo '<td align="middle"><A HREF="javascript:document.FSAI.submit()">' . $this->Nm_lang['lang_btns_exit_appl_hint'] . '</A></TD>';
         echo " </tr>";
         echo "</table>";
         echo "<form name='FSAI' method='post'"; 
         echo "    action='menu_fim.php'"; 
         echo "    target='_self'>"; 
         echo "    <input type='hidden' name='saida_aba' value='" . NM_encode_input($_SESSION['sc_session'][$this->sc_page]['menu']['aba_saida']) . "'/>";
         echo "    <input type='hidden' name='script_case_init' value='" . NM_encode_input($this->sc_page) . "'/>"; 
         echo "</form>"; 
         echo "</html>";
         exit ;
     }
//  
     if (isset($_SESSION['scriptcase']['sc_apl_conf']['menu']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['menu']['exit'] != '')
     {
         $_SESSION['sc_session'][$this->sc_page]['menu']['aba_saida'] = $_SESSION['scriptcase']['sc_apl_conf']['menu']['exit'];
     }
     header("X-XSS-Protection: 1; mode=block");
     header("X-Frame-Options: SAMEORIGIN");
  
$nm_saida->saida("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"\r\n");
$nm_saida->saida("            \"http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd\">\r\n");
     $nm_saida->saida("  <HTML" . $_SESSION['scriptcase']['reg_conf']['html_dir'] . ">\r\n");
     $nm_saida->saida("  <HEAD>\r\n");
     $nm_saida->saida("   <TITLE>menu</TITLE>\r\n");
     $nm_saida->saida("   <META http-equiv=\"Content-Type\" content=\"text/html; charset=" . $_SESSION['scriptcase']['charset_html'] . "\" />\r\n");
     if ($_SESSION['scriptcase']['proc_mobile'])
     {
          $nm_saida->saida("   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0\" />\r\n");
     }
     $nm_saida->saida("   <META http-equiv=\"Expires\" content=\"Fri, Jan 01 1900 00:00:00 GMT\" />\r\n");
     $nm_saida->saida("   <META http-equiv=\"Last-Modified\" content=\"" . gmdate('D, d M Y H:i:s') . " GMT\" />\r\n");
     $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"no-store, no-cache, must-revalidate\" />\r\n");
     $nm_saida->saida("   <META http-equiv=\"Cache-Control\" content=\"post-check=0, pre-check=0\" />\r\n");
     $nm_saida->saida("   <META http-equiv=\"Pragma\" content=\"no-cache\" />\r\n");
     $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_sweetalert.css\" />\r\n");
     $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/jquery-3.6.0.min.js\"></script>\r\n");
     $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . '/third/sweetalert/sweetalert2.all.min.js' . "\"></script>\r\n");
     $nm_saida->saida("   <script type=\"text/javascript\" src=\"" . $_SESSION['scriptcase']['menu']['glo_nm_path_prod'] . '/third/sweetalert/polyfill.min.js' . "\"></script>\r\n");
     $nm_saida->saida("   <script type=\"text/javascript\" src=\"../_lib/lib/js/frameControl.js\"></script>\r\n");
$nm_saida->saida("   <link rel=\"shortcut icon\" href=\"../_lib/img/scriptcase__NM__ico__NM__favicon.ico\">\r\n");
     $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_tab.css\" /> \r\n");
     $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/css/" . $this->str_schema_all . "_tab" . $_SESSION['scriptcase']['reg_conf']['css_dir'] . ".css\" /> \r\n");
      if(isset($str_google_fonts) && !empty($str_google_fonts)) 
      { 
     $nm_saida->saida("            <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $str_google_fonts . "\" /> \r\n");
      } 
     $nm_saida->saida("   <link rel=\"stylesheet\" type=\"text/css\" href=\"../_lib/buttons/" . $Str_btn_css . "\" /> \r\n");
     $nm_saida->saida("  </HEAD>\r\n");
     $nm_saida->saida("  <BODY class=\"scTabPage\">\r\n");
     $nm_saida->saida("   <style type=\"text/css\">\r\n");
     $nm_saida->saida("    .ttip {border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;color:black;}\r\n");
     $nm_saida->saida("   </style>\r\n");
     $nm_saida->saida("   <div id=\"tooltip\" style=\"position:absolute;visibility:hidden;border:1px solid black;font-size:12px;layer-background-color:lightyellow;background-color:lightyellow;padding:1px;color:black;\"></div>\r\n");
     $nm_saida->saida("   <TABLE class=\"scTabTable\" cellpadding=0 cellspacing=0 ALIGN=\"center\" WIDTH=\"100%\">\r\n");
     $nm_saida->saida("    <TR>\r\n");
     $nm_saida->saida("     <TD>\r\n");
     $this->cabecalho();
     $nm_saida->saida("     </TD>\r\n");
     $nm_saida->saida("    </TR>\r\n");
     $nm_saida->saida("    <TR>\r\n");
     $nm_saida->saida("     <TD style=\"padding: 0px\">\r\n");
     $nm_saida->saida("   <TABLE style=\"border-collapse: collapse; width: 100%\" cellpadding=0 cellspacing=0><TR><TD VALIGN=\"top\" width='10' nowrap align=\"left\">\r\n");
     $nm_saida->saida("   <ul class='scTabLine'  style='white-space:normal;'>\r\n");
     $cor_celula  = "scTabInactive";
     if ($nmgp_num_aba == "1" || empty($nmgp_num_aba)) 
     {
         $cor_celula  = "scTabActive";
         $imagem_fun = "";
     }
     $nm_saida->saida("         <li class=\"" . $cor_celula . "\" ID=\"cel1\">\r\n");
     $nm_saida->saida("           <A HREF=\"javascript:nm_gp_aba1()\" TARGET=\"_self\">CONSECUTIVOS</A>\r\n");
     $nm_saida->saida("         </li>\r\n");
     $cor_celula  = "scTabInactive";
     if ($nmgp_num_aba == "2") 
     {
         $cor_celula  = "scTabActive";
         $imagem_fun = "";
     }
     $nm_saida->saida("         <li class=\"" . $cor_celula . "\" ID=\"cel2\">\r\n");
     $nm_saida->saida("           <A HREF=\"javascript:nm_gp_aba2()\" TARGET=\"_self\">CMCV</A>\r\n");
     $nm_saida->saida("         </li>\r\n");
     $cor_celula  = "scTabInactive";
     if ($nmgp_num_aba == "3") 
     {
         $cor_celula  = "scTabActive";
         $imagem_fun = "";
     }
     $nm_saida->saida("         <li class=\"" . $cor_celula . "\" ID=\"cel3\">\r\n");
     $nm_saida->saida("           <A HREF=\"javascript:nm_gp_aba3()\" TARGET=\"_self\">AUTOEVALUACI??N</A>\r\n");
     $nm_saida->saida("         </li>\r\n");
//
     $cor_celula  = "scTabInactive";
//
         $cor_celula  = "scTabInactive";
     if (is_file("menu_help.txt"))
     {
        $Arq_WebHelp = file("menu_help.txt"); 
        if (isset($Arq_WebHelp[0]) && !empty($Arq_WebHelp[0]))
        {
            $Arq_WebHelp[0] = str_replace("\r\n" , "", trim($Arq_WebHelp[0]));
            $Tmp = explode(";", $Arq_WebHelp[0]); 
            foreach ($Tmp as $Cada_help)
            {
                $Tmp1 = explode(":", $Cada_help); 
                if (!empty($Tmp1[0]) && isset($Tmp1[1]) && !empty($Tmp1[1]) && $Tmp1[0] == "aba" && is_file($root . $path_help . $Tmp1[1]))
                {
     $nm_saida->saida("         <li class=\"" . $cor_celula . "\" ID=\"cel4\">\r\n");
                    $nm_saida->saida("          <A ID=\"cel_help\" HREF=\"javascript:nm_help('" . $path_help . $Tmp1[1] . "')\" >" . $this->Nm_lang['lang_btns_help_hint'] . "</A>\r\n");
     $nm_saida->saida("         </li>\r\n");
                }
            }
        }
     }
     $nm_saida->saida("   </ul>\r\n");
     $nm_saida->saida("     </TD>\r\n");
     $nm_saida->saida("    </TR>\r\n");
     $nm_saida->saida("   </TABLE>\r\n");
     $nm_saida->saida("   <TABLE BORDER=\"0\" CELLSPACING=\"0\"  WIDTH=\"100%\" class=\"scTabTableApls\" style=\"padding: 0 1px 0 0;\" align=\"center\">\r\n");
     $nm_saida->saida("    <TR>\r\n");
     $nm_saida->saida("      <TD style=\"padding: 0px\">\r\n");
     $nm_saida->saida("         <iframe id=\"nmsc_iframe_Ctr_consecutivos_1\" frameborder=\"0\" align=\"center\" valign=\"top\" name=\"nm_iframe_aba_Ctr_consecutivos_1\" height=\"600px\" width=\"100%\" scrolling=\"auto\"></iframe>\r\n");
     $nm_saida->saida("      </TD>\r\n");
     $nm_saida->saida("    </TR>\r\n");
     $nm_saida->saida("   </TABLE>\r\n");
     $nm_saida->saida("     </TD>\r\n");
     $nm_saida->saida("    </TR>\r\n");
     if (!$_SESSION['sc_session'][$this->sc_page]['menu']['iframe_menu'])
     {
         $nm_saida->saida("    <TR>\r\n");
         $Saida = $_SESSION['sc_session'][$this->sc_page]['menu']['aba_saida'];
         if ($nm_apl_dependente)
         {
             $Cod_Btn = nmButtonOutput($this->arr_buttons, "bvoltar", "nm_gp_submit2('$Saida')", "nm_gp_submit2('$Saida')", "sc_b_sair", "", "", "", "absmiddle", "", "0px", $path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         }
         else
         {
             $Cod_Btn = nmButtonOutput($this->arr_buttons, "bsair", "nm_gp_submit2('$Saida')", "nm_gp_submit2('$Saida')", "sc_b_sair", "", "", "", "absmiddle", "", "0px", $path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
         }
         $nm_saida->saida("        <TD align=\"left\">" . $Cod_Btn . "</TD> \r\n");
         $nm_saida->saida("    </TR>\r\n");
     }
         $nm_saida->saida("    </TABLE>\r\n");
     $nm_saida->saida("   <form name=\"F1\" method=\"post\" \r\n");
     $nm_saida->saida("                     action=\"./\" \r\n");
     $nm_saida->saida("                     target=\"_self\"> \r\n");
     $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_num_aba\" value=\"1\"/>\r\n");
     $nm_saida->saida("   </form> \r\n");
     $nm_saida->saida("   <form name=\"F2\" method=\"post\" \r\n");
     $nm_saida->saida("                     target=\"_self\"> \r\n");
     $nm_saida->saida("    <input type=\"hidden\" name=\"saida_aba\" value=\"\"/>\r\n");
     $nm_saida->saida("    <input type=\"hidden\" name=\"script_case_init\" value=\"" . NM_encode_input($this->sc_page) . "\"/> \r\n");
     $nm_saida->saida("   </form> \r\n");
     $nm_saida->saida("   <form name=\"Faba\" method=\"post\" \r\n");
     $nm_saida->saida("                       action=\"\" \r\n");
     $nm_saida->saida("                       target=\"\"> \r\n");
     $nm_saida->saida("    <input type=\"hidden\" name=\"nmgp_parms\" value=\"\"/>\r\n");
     $nm_saida->saida("   </form> \r\n");
     $nm_saida->saida("   <script language=\"javascript\">\r\n");
     $nm_saida->saida("   function sc_session_redir(url_redir)\r\n");
     $nm_saida->saida("   {\r\n");
           $nm_saida->saida("       if (typeof(sc_session_redir_mobile) === typeof(function(){})) { sc_session_redir_mobile(url_redir); }\r\n");
     $nm_saida->saida("       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')\r\n");
     $nm_saida->saida("       {\r\n");
     $nm_saida->saida("           window.parent.sc_session_redir(url_redir);\r\n");
     $nm_saida->saida("       }\r\n");
     $nm_saida->saida("       else\r\n");
     $nm_saida->saida("       {\r\n");
     $nm_saida->saida("           if (window.opener && typeof window.opener.sc_session_redir === 'function')\r\n");
     $nm_saida->saida("           {\r\n");
     $nm_saida->saida("               window.close();\r\n");
     $nm_saida->saida("               window.opener.sc_session_redir(url_redir);\r\n");
     $nm_saida->saida("           }\r\n");
     $nm_saida->saida("           else\r\n");
     $nm_saida->saida("           {\r\n");
     $nm_saida->saida("               window.location = url_redir;\r\n");
     $nm_saida->saida("           }\r\n");
     $nm_saida->saida("       }\r\n");
     $nm_saida->saida("   }\r\n");
     $nm_saida->saida("   function nm_gp_submit(aba) \r\n");
     $nm_saida->saida("   { \r\n");
     $nm_saida->saida("      document.F1.nmgp_num_aba.value = aba;\r\n");
     $nm_saida->saida("      document.F1.submit() ;\r\n");
     $nm_saida->saida("   } \r\n");
     $nm_saida->saida("   function nm_gp_submit2(apl_saida) \r\n");
     $nm_saida->saida("   { \r\n");
     $nm_saida->saida("      document.F2.saida_aba.value = apl_saida  ;\r\n");
     $nm_saida->saida("      document.F2.action = \"menu_fim.php\";\r\n");
     $nm_saida->saida("      document.F2.submit() ;\r\n");
     $nm_saida->saida("   } \r\n");
     $nm_saida->saida("   function nm_help(Page)\r\n");
     $nm_saida->saida("   {\r\n");
     $nm_saida->saida("      window.open(Page, '" . addslashes($this->Nm_lang['lang_btns_help_hint']) . "', 'resizable');\r\n");
     $nm_saida->saida("   }\r\n");
     $nm_saida->saida("   var sc_cel_ativa = 1;\r\n");
     $nm_saida->saida("   var nm_Ctr_consecutivos_1 = 'no';\r\n");
     $nm_saida->saida("   function nm_gp_aba1() \r\n");
     $nm_saida->saida("   { \r\n");
     $nm_saida->saida("      document.getElementById('cel'+sc_cel_ativa).className = 'scTabInactive';\r\n");
     $nm_saida->saida("      sc_cel_ativa = 1;\r\n");
     $nm_saida->saida("      document.getElementById('cel'+sc_cel_ativa).className = 'scTabActive';\r\n");
     $nm_saida->saida("      if (nm_Ctr_consecutivos_1 == 'no') \r\n");
     $nm_saida->saida("      { \r\n");
     $nm_saida->saida("          document.Faba.nmgp_parms.value = \"under_dashboard*scin1*scout\"; \r\n");
     $nm_saida->saida("          document.Faba.target   = \"nm_iframe_aba_Ctr_consecutivos_1\"; \r\n");
     $nm_saida->saida("          document.Faba.action   = \"" . $path_link  . SC_dir_app_name('Ctr_consecutivos') . "/\";\r\n");
     $nm_saida->saida("          document.Faba.submit() ;\r\n");
     $nm_saida->saida("      } \r\n");
     $nm_saida->saida("      document.getElementById('nmsc_iframe_Ctr_consecutivos_1').style.display = 'block'; \r\n");
     $nm_saida->saida("      nm_Ctr_consecutivos_1 = 'yes';\r\n");
     $nm_saida->saida("   } \r\n");
     $nm_saida->saida("   function nm_gp_aba2() \r\n");
     $nm_saida->saida("   { \r\n");
     $nm_saida->saida("      document.getElementById('cel'+sc_cel_ativa).className = 'scTabInactive';\r\n");
     $nm_saida->saida("      sc_cel_ativa = 2;\r\n");
     $nm_saida->saida("      document.getElementById('cel'+sc_cel_ativa).className = 'scTabActive';\r\n");
     $nm_saida->saida("      document.getElementById('nmsc_iframe_Ctr_consecutivos_1').style.display = 'none'; \r\n");
     $nm_saida->saida("   } \r\n");
     $nm_saida->saida("   function nm_gp_aba3() \r\n");
     $nm_saida->saida("   { \r\n");
     $nm_saida->saida("      document.getElementById('cel'+sc_cel_ativa).className = 'scTabInactive';\r\n");
     $nm_saida->saida("      sc_cel_ativa = 3;\r\n");
     $nm_saida->saida("      document.getElementById('cel'+sc_cel_ativa).className = 'scTabActive';\r\n");
     $nm_saida->saida("      document.getElementById('nmsc_iframe_Ctr_consecutivos_1').style.display = 'none'; \r\n");
     $nm_saida->saida("   } \r\n");
     if ($nmgp_num_aba == "1" || empty($nmgp_num_aba)) 
     { 
         $nm_saida->saida("   nm_gp_aba1(); \r\n");
     } 
     $nm_saida->saida("   </script>\r\n");
     if ($this->Change_Menu)
     {
         $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
         $Arr_rastro = array();
         if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
         {
             foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
             {
                $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
             }
             $ult_apl = count($Arr_rastro) - 1;
             unset($Arr_rastro[$ult_apl]);
             $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
         }
         else
         {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
         }
     }
     $nm_saida->saida("   </body>\r\n");
     $nm_saida->saida("   </HTML>\r\n");
  }
  function cabecalho()
  {
     global 
             
            $nm_saida, $path_lib_php, $path_libs, $path_imag_cab;
     $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                  $this->Nm_lang['lang_mnth_janu'],
                                  $this->Nm_lang['lang_mnth_febr'],
                                  $this->Nm_lang['lang_mnth_marc'],
                                  $this->Nm_lang['lang_mnth_apri'],
                                  $this->Nm_lang['lang_mnth_mayy'],
                                  $this->Nm_lang['lang_mnth_june'],
                                  $this->Nm_lang['lang_mnth_july'],
                                  $this->Nm_lang['lang_mnth_augu'],
                                  $this->Nm_lang['lang_mnth_sept'],
                                  $this->Nm_lang['lang_mnth_octo'],
                                  $this->Nm_lang['lang_mnth_nove'],
                                  $this->Nm_lang['lang_mnth_dece']);
     $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_mnth_janu'],
                                  $this->Nm_lang['lang_shrt_mnth_febr'],
                                  $this->Nm_lang['lang_shrt_mnth_marc'],
                                  $this->Nm_lang['lang_shrt_mnth_apri'],
                                  $this->Nm_lang['lang_shrt_mnth_mayy'],
                                  $this->Nm_lang['lang_shrt_mnth_june'],
                                  $this->Nm_lang['lang_shrt_mnth_july'],
                                  $this->Nm_lang['lang_shrt_mnth_augu'],
                                  $this->Nm_lang['lang_shrt_mnth_sept'],
                                  $this->Nm_lang['lang_shrt_mnth_octo'],
                                  $this->Nm_lang['lang_shrt_mnth_nove'],
                                  $this->Nm_lang['lang_shrt_mnth_dece']);
     $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                  $this->Nm_lang['lang_days_sund'],
                                  $this->Nm_lang['lang_days_mond'],
                                  $this->Nm_lang['lang_days_tued'],
                                  $this->Nm_lang['lang_days_wend'],
                                  $this->Nm_lang['lang_days_thud'],
                                  $this->Nm_lang['lang_days_frid'],
                                  $this->Nm_lang['lang_days_satd']);
     $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                  $this->Nm_lang['lang_shrt_days_sund'],
                                  $this->Nm_lang['lang_shrt_days_mond'],
                                  $this->Nm_lang['lang_shrt_days_tued'],
                                  $this->Nm_lang['lang_shrt_days_wend'],
                                  $this->Nm_lang['lang_shrt_days_thud'],
                                  $this->Nm_lang['lang_shrt_days_frid'],
                                  $this->Nm_lang['lang_shrt_days_satd']);
     $this->sc_Include($path_lib_php . "/nm_data.class.php", "C", "nm_data") ; 
     $this->sc_Include($path_lib_php . "/nm_functions.php", "", "") ; 
     $this->sc_Include($path_lib_php . "/nm_api.php", "", "") ; 
     $this->nm_data     = new nm_data("port");
     $Str_date = strtolower($_SESSION['scriptcase']['reg_conf']['date_format']);
     $Lim   = strlen($Str_date);
     $Ult   = "";
     $Arr_D = array();
     for ($I = 0; $I < $Lim; $I++)
     {
         $Char = substr($Str_date, $I, 1);
         if ($Char != $Ult)
         {
             $Arr_D[] = $Char;
         }
         $Ult = $Char;
     }
      $Prim = true;
     $Str  = "";
     foreach ($Arr_D as $Cada_d)
     {
         $Str .= (!$Prim) ? $_SESSION['scriptcase']['reg_conf']['date_sep'] : "";
         $Str .= $Cada_d;
         $Prim = false;
     }
     $Str = str_replace("a", "Y", $Str);
     $Str = str_replace("y", "Y", $Str);
     $nm_data_fixa = date($Str); 
     $nm_saida->saida("<style>\r\n");
     $nm_saida->saida("    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}\r\n");
     $nm_saida->saida("</style>\r\n");
     $nm_saida->saida("<div class=\"scTabHeader\" style=\"height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;\">\r\n");
     $nm_saida->saida("    <div class=\"scTabHeaderFont\" style=\"float: left; text-transform: uppercase;\">" . "ALTA CONSEJER??A PARA LA SEGURIDAD CIUDADANA" . "</div>\r\n");
     $nm_saida->saida("    <div class=\"scTabHeaderFont\" style=\"float: right;\">" . $nm_data_fixa . "</div>\r\n");
     $nm_saida->saida("</div>\r\n");
  }
}
if (!function_exists("NM_is_utf8"))
{
    include_once("../_lib/lib/php/nm_utf8.php");
}
if (!function_exists("SC_dir_app_ini"))
{
    include_once("../_lib/lib/php/nm_ctrl_app_name.php");
}
SC_dir_app_ini('Portal');
$Sc_lig_md5 = false;
$Sem_Session = (!isset($_SESSION['sc_session'])) ? true : false;
$_SESSION['scriptcase']['sem_session'] = false;
if (!empty($_POST))
{
    foreach ($_POST as $nmgp_var => $nmgp_val)
    {
         if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
         {
             $nmgp_var = substr($nmgp_var, 11);
             $nmgp_val = $_SESSION[$nmgp_val];
         }
         if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
         {
             $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
             if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
             {
                 $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                 $Sc_lig_md5 = true;
             }
             else
             {
                 $_SESSION['sc_session']['SC_parm_violation'] = true;
             }
         }
         $$nmgp_var = $nmgp_val;
    }
}
if (!empty($_GET))
{
    foreach ($_GET as $nmgp_var => $nmgp_val)
    {
         if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
         {
             $nmgp_var = substr($nmgp_var, 11);
             $nmgp_val = $_SESSION[$nmgp_val];
         }
         if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
         {
             $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
             if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
             {
                 $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                 $Sc_lig_md5 = true;
             }
             else
             {
                 $_SESSION['sc_session']['SC_parm_violation'] = true;
             }
         }
         $$nmgp_var = $nmgp_val;
    }
}
if (!isset($_SERVER['HTTP_REFERER']) || (!isset($nmgp_parms) && !isset($script_case_init) && !isset($nmgp_start) ))
{
    $Sem_Session = false;
}
$NM_dir_atual = getcwd();
if (empty($NM_dir_atual)) {
    $str_path_sys  = (isset($_SERVER['SCRIPT_FILENAME'])) ? $_SERVER['SCRIPT_FILENAME'] : $_SERVER['ORIG_PATH_TRANSLATED'];
    $str_path_sys  = str_replace("\\", '/', $str_path_sys);
}
else {
    $sc_nm_arquivo = explode("/", $_SERVER['PHP_SELF']);
    $str_path_sys  = str_replace("\\", "/", getcwd()) . "/" . $sc_nm_arquivo[count($sc_nm_arquivo)-1];
}
$str_path_web    = $_SERVER['PHP_SELF'];
$str_path_web    = str_replace("\\", '/', $str_path_web);
$str_path_web    = str_replace('//', '/', $str_path_web);
$path_aplicacao  = substr($str_path_web, 0, strrpos($str_path_web, '/'));
$path_aplicacao  = substr($path_aplicacao, 0, strrpos($path_aplicacao, '/'));
$root            = substr($str_path_sys, 0, -1 * strlen($str_path_web));
if ($Sem_Session && (!isset($nmgp_start) || $nmgp_start != "SC")) {
    if (isset($_COOKIE['sc_apl_default_Portal'])) {
        $apl_def = explode(",", $_COOKIE['sc_apl_default_Portal']);
    }
    elseif (is_file($root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_Portal.txt")) {
        $apl_def = explode(",", file_get_contents($root . $_SESSION['scriptcase']['menu']['glo_nm_path_imag_temp'] . "/sc_apl_default_Portal.txt"));
    }
    if (isset($apl_def)) {
        if ($apl_def[0] != "menu") {
            $_SESSION['scriptcase']['sem_session'] = true;
            if (strtolower(substr($apl_def[0], 0 , 7)) == "http://" || strtolower(substr($apl_def[0], 0 , 8)) == "https://" || substr($apl_def[0], 0 , 2) == "..") {
                $_SESSION['scriptcase']['menu']['session_timeout']['redir'] = $apl_def[0];
            }
            else {
                $_SESSION['scriptcase']['menu']['session_timeout']['redir'] = $path_aplicacao . "/" . SC_dir_app_name($apl_def[0]) . "/index.php";
            }
            $Redir_tp = (isset($apl_def[1])) ? trim(strtoupper($apl_def[1])) : "";
            $_SESSION['scriptcase']['menu']['session_timeout']['redir_tp'] = $Redir_tp;
        }
        if (isset($_COOKIE['sc_actual_lang_Portal'])) {
            $_SESSION['scriptcase']['menu']['session_timeout']['lang'] = $_COOKIE['sc_actual_lang_Portal'];
        }
    }
}
if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
{
    $_SESSION['sc_session']['SC_parm_violation'] = true;
}
if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
{
    $nmgp_parms = "";
}
if (isset($nmgp_parms))
{
    $nmgp_parms = str_replace("@aspass@", "'", $nmgp_parms);
    $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
    $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
    $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
    $todo  = explode("?@?", $todox);
    foreach ($todo as $param)
    {
       $cadapar = explode("?#?", $param);
       if (1 < sizeof($cadapar))
       {
           if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
           {
               $cadapar[0] = substr($cadapar[0], 11);
               $cadapar[1] = $_SESSION[$cadapar[1]];
           }
           if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
           $Tmp_par   = $cadapar[0];;
           $$Tmp_par = $cadapar[1];
       }
    }
}
if (empty($script_case_init))
{
    $script_case_init = rand(2, 10000);
}
if (isset($_SESSION['scriptcase']['sc_outra_jan']) && $_SESSION['scriptcase']['sc_outra_jan'] == 'menu')
{
    $_SESSION['sc_session'][$script_case_init]['menu']['sc_outra_jan'] = true;
     unset($_SESSION['scriptcase']['sc_outra_jan']);
}
if (isset($nmgp_outra_jan) && $nmgp_outra_jan == 'true')
{
    $_SESSION['sc_session'][$script_case_init]['menu']['sc_outra_jan'] = true;
}
$salva_iframe = false;
if (isset($_SESSION['sc_session'][$script_case_init]['menu']['iframe_menu']))
{
    $salva_iframe = $_SESSION['sc_session'][$script_case_init]['menu']['iframe_menu'];
    unset($_SESSION['sc_session'][$script_case_init]['menu']['iframe_menu']);
}
if (isset($nm_run_menu) && $nm_run_menu == 1)
{
    if (isset($_SESSION['scriptcase']['sc_aba_iframe']) && isset($_SESSION['scriptcase']['sc_apl_menu_atual']))
    {
        foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
        {
            if ($aba == $_SESSION['scriptcase']['sc_apl_menu_atual'])
            {
                unset($_SESSION['scriptcase']['sc_aba_iframe'][$aba]);
                break;
            }
        }
    }
    $_SESSION['scriptcase']['sc_apl_menu_atual'] = "menu";
    $achou = false;
    if (isset($_SESSION['sc_session'][$script_case_init]))
    {
        foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
        {
            if ($nome_apl == 'menu' || $achou)
            {
                if ($achou)
                {
                    unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                }
                $achou = true;
            }
        }
        if (!$achou && isset($nm_apl_menu))
        {
            foreach ($_SESSION['sc_session'][$script_case_init] as $nome_apl => $resto)
            {
                if ($nome_apl == $nm_apl_menu || $achou)
                {
                    $achou = true;
                    if ($nome_apl != $nm_apl_menu)
                    {
                        unset($_SESSION['sc_session'][$script_case_init][$nome_apl]);
                    }
                }
            }
        }
    }
    $_SESSION['sc_session'][$script_case_init]['menu']['iframe_menu'] = true;
}
else
{
    $_SESSION['sc_session'][$script_case_init]['menu']['iframe_menu'] = $salva_iframe;
}

   if (!isset($_SESSION['sc_session'][$script_case_init]['menu']['initialize']))
   {
       $_SESSION['sc_session'][$script_case_init]['menu']['initialize'] = true;
   }
   elseif (!isset($_SERVER['HTTP_REFERER']))
   {
       $_SESSION['sc_session'][$script_case_init]['menu']['initialize'] = false;
   }
   elseif (false === strpos($_SERVER['HTTP_REFERER'], '.php'))
   {
       $_SESSION['sc_session'][$script_case_init]['menu']['initialize'] = true;
   }
   else
   {
       $sReferer = substr($_SERVER['HTTP_REFERER'], 0, strpos($_SERVER['HTTP_REFERER'], '.php'));
       $sReferer = substr($sReferer, strrpos($sReferer, '/') + 1);
       if ('menu' == $sReferer || 'menu_' == substr($sReferer, 0, 5))
       {
           $_SESSION['sc_session'][$script_case_init]['menu']['initialize'] = false;
       }
       else
       {
           $_SESSION['sc_session'][$script_case_init]['menu']['initialize'] = true;
       }
   }

$nm_apl_dependente = false;
if (isset($_POST["nmgp_num_aba"])) 
{
    $_SESSION['sc_session'][$script_case_init]['menu']['num_aba'] = $nmgp_num_aba;
}
if (isset($nmgp_url_saida) && !empty($nmgp_url_saida)) 
{ 
    $_SESSION['sc_session'][$script_case_init]['menu']['aba_saida'] = $nmgp_url_saida ; 
    $nm_apl_dependente = true;
} 
if (!isset($nmgp_url_saida) || empty($nmgp_url_saida))
{
    $nmgp_url_saida = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ""; 
    $nmgp_url_saida = str_replace("_fim.php", ".php", $nmgp_url_saida);
}
$_SESSION['sc_session'][$script_case_init]['menu']['aba_saida'] = $nmgp_url_saida;
if ((isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang") || (isset($_GET['nmgp_opcao']) && $_GET['nmgp_opcao'] == "force_lang"))
{
    if (isset($_POST['nmgp_opcao']) && $_POST['nmgp_opcao'] == "force_lang")
    {
        $nmgp_opcao  = $_POST['nmgp_opcao'];
        $nmgp_idioma = $_POST['nmgp_idioma'];
    }
    else
    {
        $nmgp_opcao  = $_GET['nmgp_opcao'];
        $nmgp_idioma = $_GET['nmgp_idioma'];
    }
    $Temp_lang = explode(";" , $nmgp_idioma);
    if (isset($Temp_lang[0]) && !empty($Temp_lang[0]))
    {
        $_SESSION['scriptcase']['str_lang'] = $Temp_lang[0];
    }
    if (isset($Temp_lang[1]) && !empty($Temp_lang[1]))
    {
        $_SESSION['scriptcase']['str_conf_reg'] = $Temp_lang[1];
    }
}
$_POST = array();
$_GET  = array();
$nmgp_num_aba = (isset($_SESSION['sc_session'][$script_case_init]['menu']['num_aba'])) ? $_SESSION['sc_session'][$script_case_init]['menu']['num_aba'] : 1;
$menu_contr = new menu();
$menu_contr->controle();
?>
