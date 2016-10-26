<?php 
ob_start();
session_start();
include('fscript.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $header_bonus; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="fr" />
	<meta name="robots" content="all" />
	<link rel="stylesheet" href="dev.css" title="Design du site" lang="fr" media="all" type="text/css" />  
	<meta name="description" content="TS3S est un fournisseur de Teamspeak 3 gratuits pour guildes et Clans francophones. L'inscription est 
    par contre obligatoire au site, afin de renouveler chaque mois le serveur. " />
	<meta name="keywords" lang="fr" content="TS3S, teamspeak, gratuit, hosting, free, teamspeak 3, teamspeak, web, privé, server, serveur, 
    private, virtual, no, money" />
	<meta name="reply-to" content="postmaster@ts3s.org" />
	<meta name="category" content="Internet" />
	<meta name="distribution" content="global" />
	<meta name="author" lang="fr" content="Hugo Regibo" />
	<meta name="copyright" content="TS3S" />
	<meta name="identifier-url" content="http://www.ts3s.org/" />
	<meta property="fb:admins" content="1631762385" />
	<meta name="expires" content="never" />
	<meta name="Date-Creation-yyyymmdd" content="20101021" />
	<meta name="Date-Revision-yyyymmdd" content="20110920" />
    <meta name="google-site-verification" content="O9t6o-pQGPp4jiW_R5lTD_1vR-ZmYcxvlwZOIMlmYZg" />
	<meta name="revisit-after" content="7 days" />
	<title><?php echo $pagetitle; ?> &raquo; TS3S</title>
	<script>
     var RecaptchaOptions = {
       theme : 'white'
    };
    </script>    
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22244754-1']);
  _gaq.push(['_setDomainName', '.ts3s.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>

<div id="top">
<a href="index.php?page=accueil"><img src="images/a.jpg" alt="Accueil" /></a>
<a href="index.php?page=offre"><img src="images/b.jpg" alt="Offres" /></a>
<a href="http://forum.ts3s.org/"><img src="images/c.jpg" alt="Notre forum" /></a>
<a href="index.php?page=about"><img src="images/d.jpg" alt="A propos" /></a>
<a href="index.php?page=contact"><img src="images/e.jpg" alt="Contact" /></a>

</div>
    <div id="milieu">
        <div id="mg"></div>
        <div id="md">Bienvenue, <?php echo $_SESSION['pseudo']; ?>.<br /><?php echo $topright; ?>
        <br />
<br /><img src="images/spacer.gif" width="150px" height="150px" border="0" usemap="#logo" alt="Accueil du site" />
<map name="logo" id="logo"><area shape="rect" coords="4,13,136,139" alt="Accueil du site" href="index.php?page=accueil" /></map>
</div>
    </div>
<div id="txt">
    <div id="tg">
		<p class="WARN">
		Apr&egrave;s de nombreuses discussions avec Dez (Support de Teamspeak), nous sommes devant un cas qui m'attriste au plus haut point. 
<br /><br />
En effet, nous ne pouvons plus h&eacute;berger d'autres licences que la mienne (et donc 10 serveurs qui sont a des amis) et sommes oblig&eacute;s de 
fermer les portes de TS3S de mani&egrave;re d&eacute;finitive. 
<br /><br />
Nous allons stopper la location de notre serveur d&eacute;di&eacute;, et prendre un petit VPS pour stocker nos sites webs. Le forum 
reste disponible &agrave; tout le monde. L'ensemble des comptes de TS3S restent disponibles, et les inscriptions sont ferm&eacute;es. Je 
vous invite &agrave; venir sur le forum (qui changera bient&ocirc;t de nom) si vous souhaitez garder un contact avec les membres (ou) que vous 
voulez juste nous parler. La page facebook ne sera pas supprim&eacute;e, mais nous ne posteront plus de mises &agrave; jours.
<br /><br />
Bonne fin de soir&eacute;e, et bonne continuation &agrave; tout le monde.
<br /><br />
Votre d&eacute;vou&eacute; serviteur, Aenoa.
		</p>
        <?php echo $pagecontent; ?>
    </div>
  <div id="td">
    <p class="top">&nbsp;</p>
    <p class="mdl">&nbsp;
    <?php echo $menu; ?>
    &nbsp;
    </p>
    <p class="btm">&nbsp;</p>
	
	<?php echo $beta_menu; ?>
    </div>
</div>
<div id="bottom">
Tout les textes et images sont la propri&eacute;t&eacute; de <a class="btlk" href="http://www.ts3s.org/">TS3S.ORG</a>. <br />Certaines images sont la propri&eacute;t&eacute; de <a class="btlk" href="http://www.valvesoftware.com/">VALVe</a>,  <a class="btlk" href="http://www.ea.com/fr/">EAGAMES</a>, <a class="btlk" href="http://www.ubi.com/fr/default.aspx">UBISOFT</a> et <a class="btlk" href="http://eu.blizzard.com/fr-fr/">Blizzard</a>.<br />
[<a class="btlk" href="index.php?page=CGU">Conditions G&eacute;n&eacute;rales d'utilisation</a>] &nbsp;
[<a class="btlk" href="index.php?page=recrutement">TS3S recrute !</a>] &nbsp;
[<a class="btlk" href="index.php?page=staff">l'&Eacute;quipe de TS3S</a>]
<br />

               
</div>
<div align="center">
<?php
// CC LICENCE + ECOSITE
?>
<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/">
	<img alt="Contrat Creative Commons" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" />
</a>
<?php
// HOST TRACKER
?>
<a href='http://host-tracker.com/fr/' onMouseOver='this.href="http://host-tracker.com/fr/web-site-monitoring-stats/5802453-5802454-5802455-5802456-5802457-5802458-5802459-5802460-5802461-5802462-5802463/lvuc/";'><img 
width='80' height='15' border='0' alt='alerte de surveillance de site web' 
src="http://ext.host-tracker.com/uptime-img/?s=15&amp;t=5802453-5802454-5802455-5802456-5802457-5802458-5802459-5802460-5802461-5802462-5802463&amp;m=00.09&amp;p=Total&amp;src=lvuc" /></a><noscript><a href='http://host-tracker.com/fr/' >alerte de surveillance de site web</a></noscript><br />

	<?php
	//<a href="http://www.teamspeak.com/" target="_blank"><img src="images/links/ts3_480_60.jpg" alt="" /></a>
	 ?>

</div>

</body>
</html>
<?php
ob_end_flush();
?>
