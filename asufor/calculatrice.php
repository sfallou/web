<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Asufor de seokhaye</title>
<script language="Javascript">
<!--
var valor=0;var stock="",stock2="";
var ope=false,plu=false,moi=false,mul=false,div=false,flag_egal=false;
function affiche(res)
{ document.calc.ecran.value=res;}
function touche(param)
 {
  if ( param =="12") {
                         valor=0;document.calc.ecran.value="";stock="";stock2="";
                         raz_flags();ope=false;
                       } 
  if ((param >=0)&&(param <=10))
   {  if (flag_egal) {raz_flags();valor=0;ope=false;stock="";}
      if (ope==true)
            { if (param==10) stock2+='.'; else stock2+=param;
              affiche(stock2);
              if (plu) valor = (stock*1)+(stock2*1);
              if (moi) valor = (stock*1)-(stock2*1);
              if (mul) valor = (stock*1)*(stock2*1);
              if (div) valor = (stock*1)/(stock2*1);
            } else 
                 { if (param==10) stock+='.';else stock+=param;
                   affiche(stock);}
   }
  if (param==13) {raz_flags() ; plu=true; if (stock2 != "") inter();ope=true;}
  if (param==14) {raz_flags() ; moi=true; if (stock2 != "") inter();ope=true;} 
  if (param==15) {raz_flags() ; mul=true; if (stock2 != "") inter();ope=true;}
  if (param==16) {raz_flags() ; div=true; if (stock2 != "") inter();ope=true;} 
  if (param==17) {inter();flag_egal=true;} 
 }
function raz_flags()
{ plu=false;moi=false;mul=false;div=false;flag_egal=false;}
function inter()
{affiche(valor); stock=valor;stock2="";} 
//-->
</script>
</head>
<body text="#ffffff" bgcolor="#ffffff" >
<p class="tt" >Calculatrice</p>
<form name="calc">
<table BORDER=5 WIDTH="10%" BGCOLOR="#808080" >
<tr><td><table BORDER WIDTH="10%" BGCOLOR="#394963" cellspadding="0" >
<tr><td align=CENTER COLSPAN="4"><font face="Tahoma" color="#000000" size=2><b>Calculatrice</b></font></td></tr>
<tr><td align=CENTER COLSPAN="4" bgcolor="#FF9933"><input type=text name="ecran" size=18 maxlength=25></td></tr>
<tr><td WIDTH="5%"><input type="button" value="   7   " onClick="touche(7)"></td>
<td WIDTH="5%"><input type="button" value= "   8   " onClick="touche(8)"></td>
<td WIDTH="5%"><input type="button" value="   9   " onClick="touche(9)"></td>
<td align=CENTER WIDTH="5%"><input type="button" name="/" value="   /   " onClick="touche(16)"></td></tr>
<tr><td WIDTH="5%"><input type="button" value="   4   " onclick="touche(4)"></td>
<td align=CENTER WIDTH="5%"><input type="button" value="   5   " onclick="touche(5)"></td>
<td align=CENTER WIDTH="5%"><input type="button" value="   6   " onclick="touche(6)"></td>
<td align=CENTER WIDTH="5%"><input type="button" name="*" value="   *   " onclick="touche(15)"></td></tr>
<tr><td WIDTH="5%"><input type="button" value="   1   " onclick="touche(1)"></td>
<td align=CENTER WIDTH="5%"><input type="button" value="   2   " onclick="touche(2)"></td>
<td align=CENTER WIDTH="5%"><input type="button" value="   3   " onclick="touche(3)"></td>
<td align=CENTER WIDTH="5%"><input type="button" name="-" value="   -   " onclick="touche(14)"></td></tr>
<tr><td WIDTH="5%"><input type="button" value="   0   " onclick="touche(0)"></td>
<td align=CENTER WIDTH="5%"><input type="button" name="." value="    ,   " onclick="touche(10)"></td>
<td align=CENTER COLSPAN="2" WIDTH="5%"><input type="button" name="+" value="       +        " onclick="touche(13)"></td></tr>
<tr><td COLSPAN="2"><input type="button" name="C" value="       C        " onclick="touche(12)"></td>
<td align=CENTER COLSPAN="2"><input type="button" value="       =        "         onclick="touche(17)"></td></tr>
</table></td></tr>
</table>
</form>

</body>
</html>