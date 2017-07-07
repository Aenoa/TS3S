<?php

/* 	******************************************************
	* MAILS 											 *
	******************************************************
*/


$TOTAL_SERVERS = "70";
		// HEADERS PHPMAILER();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: TS3S <postmaster@ts3s.org>' . "\r\n";
		$headers_bcc = 'BCC: postmaster@ts3s.org' . "\r\n";

if($_GET['_ufy'] == "ACTIVATED" && $_SESSION['secure_level'] >= 8)
{
	 
	 
	 if($_GET['confirm'] == "y")
	{
	 @exec("cp ./uploads/data/WIP ./uploads/WIP");
	 mail("root", "Mode maintenance", "nous sommes pass&eacute; en mode maintenance. Pour annuler, utiliser la proc&eacute;dure d'urgence bis.", $headers);
	}
	 else
	{
	 die("
			<h1 style=\"text-align:center;\">Confirmer ?</h1>
			<div style=\"margin:auto;text-align:center;font-size:20px;\">
			<a href=\"index.php?_ufy=ACTIVATED&amp;confirm=y\">
				Oui
			</a>
			- 
			<a href=\"index.php\">
				Non
			</a>
			</div>");
	}
}

if($_GET['_ufy'] == "DISACTIVATED" && $_GET['token'] == "AEWADA123654798")
{
	 @exec("rm -R ./uploads/WIP");
}

if(file_exists('uploads/WIP'))
{
	die(file_get_contents('uploads/WIP'));
}



include('mdscript.php');
/*	
			#########################
			## DEBUT DECLARATION	#
			## DIVERSES VARIABLES	#
			## POUR TOUTE LES IF	#
			#########################
		*/
		
		
		// DESTINATAIRE DU MAIL
		$sendtome = addslashes($_POST['m1']);
		
		// CONTENU DU MAIL ( INSCRIPTION )
		$acc_add = 	"<img src=\"http://www.ts3s.org/images/mail_inscr.png\" />" . "<br /> \n";
		$acc_add.= 	"Bonjour ".$_POST['account_name']."," . "<br /> \n";
		$acc_add.= 	"" . "<br /> \n";
		$acc_add.= 	"Vous avez demand&eacute; &agrave; vous inscrire sur le site <a href=\"http://www.ts3s.org/\">http://www.ts3s.org/</a>." . " \n";
		$acc_add.= 	"Cette demande a &eacute;t&eacute; trait&eacute;e avec succ&egrave;s, et nous vous contactons afin de vous fournir vos identifiants de connexion, sp&eacute;cifi&eacute;s lors de l'inscription." . "<br /> \n";
		$acc_add.= 	"" . "<br /> \n";
		$acc_add.= 	"----------- INFORMATION DE COMPTE ------------" . "<br /> \n";
		$acc_add.= 	"Votre nom de compte : <b>".$_POST['acc']."</b>" . "<br /> \n";
		$acc_add.= 	"Votre mot de passe : <b>".$_POST['p1']."</b>" . "<br /> \n";
		$acc_add.= 	"Votre Adresse mail : <b>".$_POST['m1']."</b>" . "<br /> \n";
		$acc_add.= 	"-----------------------------------------------" . "<br /> \n";
		$acc_add.= 	"" . "<br /> \n";
		$acc_add.= 	"Vous avez besoin d'aide, une question vous trotte en t&ecirc;te ? Nous vous invitons &agrave; nous en faire part via la partie
					&quot;contact&quot; du site web TS3S (<a href=\"http://www.ts3s.org/index.php?page=contact\">Cliquez ici</a>)" . "<br /> \n";
		$acc_add.= 	"" . "<br /> \n";
		$acc_add.= 	"Passez une bonne journ&eacute;e / soir&eacute;e !" . "<br /> \n";
		$acc_add.= 	"" . "<br /> \n";
		$acc_add.= 	"L'&eacute;quipe TS3S.org" . "<br /> \n";
		
function GCU_GET()
{
$CGU.= file_get_contents('./CGU.txt'); 
return($CGU);
}


	// CONNEXION SQL
mysql_connect('localhost', 'ts3s_V2', 'tango007');
mysql_select_db('ts3s');

$url = "www.ts3s.org";

function SendTicketInfo($inch, $variable)
{
	//##POST0
	$fetched = 	mysql_fetch_assoc(mysql_query("SELECT content FROM ts3s_support WHERE ticket_id='".$variable."' AND is_first='oui' LIMIT 0,1"));
	$content = 	nl2br(str_replace(array("<",">"), array("&lt;", "&gt;"), $fetched['content']));
	$both = 	"
				un ticket d'assistance TS3S (<b>".$variable."</b>) a &eacute;t&eacute; enregistr&eacute;. Un administrateur prendra bient&ocirc;t en charge votre demande. Vous avez la possibilit&eacute; de lire celui-ci en cliquant sur le lien ci dessous. 
				Notez que vous devez &ecirc;tre connect&eacute; pour visionner cette page. 
				<br /><br />
				<a href=\"http://ts3s.org/index.php?page=support&amp;task=read&amp;ticket_id=".$variable."\">
					http://ts3s.org/index.php?page=support&amp;task=read&amp;ticket_id=".$variable."</a>
				<br /><br />
				Rappel de ce ticket:<br />".$content."
				";
	$user = 	"Une r&eacute;ponse a &eacute;t&eacute; apport&eacute;e par un administrateur sur votre ticket (<b>".$variable."</b>). <br /><br />
				Votre r&eacute;ponse est maintenant demand&eacute;e afin de poursuivre le cours de l'assistance. Votre ticket est consultable a l'addresse 
				suivante (notez que vosu devez &ecirc;tre connect&eacute; pour acc&eacute;der a la page):<br /><br />
				<a href=\"http://ts3s.org/index.php?page=support&amp;task=read&amp;ticket_id=".$variable."\">
					http://ts3s.org/index.php?page=support&amp;task=read&amp;ticket_id=".$variable."</a>
				";
	$admin = 	"Une r&eacute;ponse a &eacute;t&eacute; ajout&eacute;e a un ticket de support. Le ticket dispose de l'ID <b>".$variable."</b> et est pass&eacute; en \"attente d'un administrateur\".<br />
				Il est disponible a cette adresse:<br /><br />
				<a href=\"http://ts3s.org/index.php?page=support&amp;task=read&amp;ticket_id=".$variable."\">
					http://ts3s.org/index.php?page=support&amp;task=read&amp;ticket_id=".$variable."</a>";
		
	switch($inch)
	{
		case 'admin':
		$touse = $admin;
		break;
		case 'user':
		$touse = $user;
		break;
		case 'both':
		$touse = $both;
		break;
		
		default:
		return false;
		break;
	}
	
	return "<html><head><title>Reponse au ticket</title></head><body>Bonjour, <br /><br />".$touse."<br /><br />Cordialement,<br />L'&eacute;quipe TS3S</body></html>";
	
}

require_once('recaptchalib.php');
$publickey = "6Ld0GL4SAAAAAFpfz6-hzzKwIN_RFe5sWv3ocv_A";
$privatekey = "6Ld0GL4SAAAAAPkn3YKATLE3EpB1GyyDScteeFlQ";
$resp = recaptcha_check_answer ($privatekey,
	$_SERVER["REMOTE_ADDR"],
	$_POST["recaptcha_challenge_field"],
	$_POST["recaptcha_response_field"]);
	
function srv_offre()
{
	// LISTE SERVEURS
return(mysql_num_rows(mysql_query("SELECT * FROM ts3s_servers WHERE is_active != '0'")));
}

function GetMonthFromNumeric($value = "1", $format = "long")
{
	switch($value)
	{
	case "01":
	case 1:
	$small = "Janv.";
	$long = "Janvier";
	break;
	
	case "02":
	case 2:
	$small = "F&eacute;v.";
	$long = "F&eacute;vrier";
	break;
	
	case "03":
	case 3:
	$small = "Mars";
	$long = "Mars";
	break;
	
	case "04":
	case 4:
	$small = "Avr.";
	$long = "Avril";
	break;
	
	case "05":
	case 5:
	$small = "Mai";
	$long = "Mai";
	break;
	
	case "06":
	case 6:
	$small = "Juin";
	$long = "Juin";
	break;
	
	case "07":
	case 7:
	$small = "Juil.";
	$long = "Juillet";
	break;
	
	case "08":
	case 8:
	$small = "Ao&ucirc;t";
	$long = "Ao&ucirc;t";
	break;
	
	case "09":
	case 9:
	$small = "Sept.";
	$long = "Septembre";
	break;
	
	case "10":
	case 10:
	$small = "Oct.";
	$long = "Octobre";
	break;
	
	case "11":
	case 11:
	$small = "Nov.";
	$long = "Novembre";
	break;
	
	case "12":
	case 12:
	$small = "D&eacute;c.";
	$long = "D&eacute;cembre";
	break;
	}
	
	if($format == "small")
	{
		return $small;
	}
	else
	{
		return $long;
	}
}

function GetRank($aaa)
{
	switch($aaa)
	{
		case 0:
		$GETTHISSHIT= "Banni / Compte ferm&eacute;";
		break;
		case 1:
		$GETTHISSHIT= "Utilisateur";
		break;
		case 2:
		$GETTHISSHIT= "Membre NPL";
		break;
		case 3:
		$GETTHISSHIT= "B&ecirc;ta testeur";
		break;
		case 4:
		$GETTHISSHIT= "Mod&eacute;rateur";
		break;
		case 5:
		$GETTHISSHIT= "Op&eacute;rateur";
		break;
		case 6:
		$GETTHISSHIT= "Developpeur";
		break;
		case 7:
		$GETTHISSHIT= "Membre inactif";
		break;
		case 8:
		$GETTHISSHIT= "Administrateur";
		break;
		case 9:
		$GETTHISSHIT= "Fondateur / Pr&eacute;sident";
		break;
		default:
		$GETTHISSHIT= "Inconnu";
		break;
	}
	return $GETTHISSHIT;
}

function TranslateDate($string, $var = "long")
{
	$value = strlen($string);
	
	if($value == 10)
	{
		$expl = explode(":", $string);
		return $expl['2']." ".GetMonthFromNumeric($expl['1'], $var)." ".$expl['0'];
	}
	elseif($value == 16)
	{
		$expl = explode(":", $string);
		return $expl['2']." ".GetMonthFromNumeric($expl['1'], $var)." ".$expl['0']." &agrave; ".$expl['3']."h".$expl['4'];
	}
	elseif($value == 19)
	{
		$expl = explode(":", $string);
		return $expl['2']." ".GetMonthFromNumeric($expl['1'], $var)." ".$expl['0']." &agrave; ".$expl['3']."h".$expl['4'].":".$expl['5'];
	}
	else
	{ return false; }
}

function TicketGetStatus($string)
{
	switch($string)
	{
		case 'inbound':
		$toget = "<font color=\"#0066FF\">En traitement</font>";
		break;
		
		case 'user-reply':
		$toget = "<font color=\"#6666CC\">R&eacute;ponse demand&eacute;e</font>";
		break;
		
		case 'sucess':
		$toget = "<font color=\"#009900\">Termin&eacute;e</font>";
		break;
		
		case 'closed':
		$toget = "<font color=\"#FF0000\">Ferm&eacute;e</font>";
		break;
		
		case 'admin-reply':
		default:
		$toget = "<font color=\"#CC9900\">Attente d'un Admin</font>";
		break;
	}
	return $toget;
}

// TEST BANNISSEMENT
$banlist = mysql_query("SELECT ip, pseudo, reason FROM ts3s_bans WHERE ip='".$_SERVER['REMOTE_ADDR']."'");
$bannbr = mysql_num_rows($banlist);

if($bannbr != 0)
	{
		die();
	}
	

// DEBUT AUTOCONNECT
	if(isset($_COOKIE['account']) && $_SESSION['secure_level'] < 1)
	{
				
				$informations = explode(";", $_COOKIE['account']);
				
				$passwd = $informations[1];
				$account = $informations[0];
				$sql = "SELECT * FROM ts3s_members WHERE pseudo='%s' AND password='%s'";
				$sql = sprintf($sql,
						mysql_real_escape_string($account),
						mysql_real_escape_string($passwd)
				);
				$preconnect = mysql_query($sql);
				$connect = mysql_fetch_array($preconnect);
				if (mysql_num_rows($preconnect) == 1 && $connect['secure_level'] >= 1)
				{
				$_SESSION['pseudo'] = $connect['pseudo'];
				$_SESSION['UID'] = $connect['id'];
				$_SESSION['DN'] = $connect['display_name'];
				$_SESSION['avatar'] = addslashes($connect['avatar']);
				$_SESSION['mail'] = $connect['mail'];
				$_SESSION['ip_insc'] = $connect['ip_insc'];
				mysql_query('UPDATE ts3s_members SET ip_actual = \'' . $_SERVER['REMOTE_ADDR'] . '\' WHERE pseudo = \'' . $_SESSION['pseudo'] . '\'');
				$_SESSION['ip_actual'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['sexe'] = $connect['sexe'];
				$_SESSION['birthdate'] = $connect['birthdate'];
				$_SESSION['secure_level'] = $connect['secure_level'];
				
				$sql = "SELECT * FROM ts3s_servers WHERE uid='%s' ";
				$sql = sprintf($sql,  mysql_real_escape_string($connect['id']));
				$query = mysql_query($sql);
				
					if(mysql_num_rows($query) == 1)
					{
					
						$server = mysql_fetch_assoc($query);
						
						$_SESSION['SID'] = $server['SID'];
						$_SESSION['sport'] = $server['sport'];
						$_SESSION['sslots'] = $server['sslots'];
						$_SESSION['sip'] = $server['sip'];
						$_SESSION['PKEY'] = $server['pkey'];
						$_SESSION['cdate'] = $server['cdate'];
						$_SESSION['fdate'] = $server['fdate'];
						$_SESSION['IAC'] = $server['is_active'];
						$_SESSION['mid'] = $server['mid'];
					}
					
			}
			else
			{
			 $pagecontent = "<h4>Echec de la connexion automatique.</h4><br />Vos Cookies sont corrompus.<hr />";
			 setcookie("account", "NULL;NULL", microtime()-3600);
			 sleep(1);
			}
			
	}

// FIN AUTOCONNECT

/* DEBUT SCRIPT GLOBAL */

	if($_GET['page'] == 'offre')
		{
			if($_SESSION['birthdate'] != NULL)
			{
				if(empty($_SESSION['sport']))
				{
				$IWAS = "<a href=\"index.php?page=commander\" border=\"0\">
				<img border=\"0\" src=\"images/IWAS.png\" alt=\"je veux un serveur TS3S !\" /></a>";
				}
				elseif($_SESSION['sport'] != NULL)
				{
				$IWAS = "";
				}
				else
				{
				$IWAS = "<a href=\"index.php?page=commander\" border=\"0\">
				<img border=\"0\" src=\"images/IWAS.png\" alt=\"je veux un serveur TS3S !\" /></a>";
				}
			}
			else
			{
			$IWAS = "<a href=\"index.php?page=acc_create\" border=\"0\">
				<img border=\"0\" src=\"images/IWAS.png\" alt=\"je veux un serveur TS3S !\" /></a>";
			}
			$pagecontent = 	"	Bienvenue dans la liste de ce que vous offre et ne vous offre pas comme droits TS3S lorsque vous commandez un serveur 
								virtuel de discussion vocale. Ci dessous, les cercles de couleur rouge (<img src=\"images/refused.png\" />) indiquent que le service n'est pas inclut dans l'offre, et les cercles de couleurs verts (<img src=\"images/valided.png\" />) signifient qu'il est, quant &agrave; lui, compris dans l'offre.<br /><div align=\"center\">Actuellement : <b>".srv_offre()."</b> serveurs sur <b>".$TOTAL_SERVERS."</b> fournis.<br />
								".$IWAS."
								</div><br /><br />
								<table class=\"T01\" width=\"420px\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style=\"border: 0.5px;\" bordercolor=\"#000\" align=\"center\">
								  <tr>
									<td scope=\"col\" width=\"320\"><b>Fonction</b></th>
									<td width=\"50\" scope=\"col\" align=\"center\"><b>Acc&egrave;s</b></th>
								  </tr>
								  <tr>
									<td>Accès ServerQuery</td>
									<td><img src=\"images/valided.png\" align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Grade &quot;Server Admin&quot;</td>
									<td><img src=\"images/valided.png\" align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Serveur privé</td>
									<td><img src=\"images/valided.png\" align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Ajouter / retirer un mot de passe</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Gérer des groupes d'utilisateurs</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Poid maximum des Avatars</td>
									<td>100 ko</td>
								  </tr>
								  <tr>
									<td>Créer / utiliser / supprimer des Tokens</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>consulter les Logs du serveur</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>ajouter des Logs</td>
									<td><img src=\"images/refused.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Notifier les inscrits / non inscrits</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Réinitialiser les permissions</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer le nom du serveur</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer le message de bienvenue</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer le mot de passe</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer les groupes par défaut</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer l'antiflood</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer les plaintes</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Editer les fonctions FTP</td>
									<td><img src=\"images/refused.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Uploader des fichiers</td>
									<td><img src=\"images/refused.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Télécharger des fichiers</td>
									<td><img src=\"images/refused.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Codecs disponibles</td>
									<td>8kbps<br />
									  16kbps<br />
									  32kbps<br /></td>
								  </tr>
								  <tr>
									<td>Créer / éditer / effacer des canaux<br />
									  (Temporaires, Semi-permanents, Permanents)</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Kicker / bannir par IP, UID, DBID, Pseudo</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Nommer des Administrateurs</td>
									<td><img src=\"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Accès au &quot;SuperAdmin Query&quot;</td>
									<td><img src= \"images/refused.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>Accès au &quot;TCP Query (TSVIEWER)&quot;</td>
									<td><img src= \"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>&Eacute;diter les icones</td>
									<td><img src= \"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>&Eacute;diter la banni&egrave;re du serveur<br />(ci inclut l'url)</td>
									<td><img src= \"images/valided.png\"  align=\"center\" /></td>
								  </tr>
								  <tr>
									<td>&Eacute;diter le bouton Tooltip</td>
									<td><img src= \"images/refused.png\"  align=\"center\" /></td>
								  </tr>
								</table>
								<br />
								<div style=\"margin:auto;color:red;text-decoration:bold;text-align:center;\"><b>Attention: Utiliser le logo
								<img src=\"images/SSA.png\" /> est interdit et passible de bannissement !</b></div>
							";
			$basepos = "Informations";
			$absolutpos = "Configuration des serveurs";
			$pagetitle = "Offre";
		}
		elseif($_GET['page'] == 'crypteur')
		{
			if($_SESSION['secure_level'] < 4)
			{
			header('Location:index.php?page=denied');
			}
			else
			{
			if(isset($_POST['crypting']))
			{
				$pagecontent = 	"votre mot de passe crypt&eacute; est <b>".sha1($_POST['crypting'])."</b><br /><br />
								<a href=\"index.php?page=accueil\">Retour &agrave; l'accueil du site</a>";
			}
			else
			{
				$pagecontent = 	"<form action=\"index.php?page=crypteur\" method=\"post\">
								Mot de passe a crypter: <input type=\"text\" autocomplete=\"off\" name=\"crypting\" size=\"55\" />
								<input type=\"submit\" value=\"Cryptez !\" />
								</form>";
			}
			}
			$basepos = 		"Aide";
			$absolutpos = 	"Cryptage";
			$pagetitle = 	"Cryptage de password";
		}
		
		
// ***********************************************  U  N  D  E  R  D  E  V  E  L  O  P  P  E  M  E  N  T  *********************
	elseif($_GET['page'] == 'tutoriaux')
		{
			// LISTE TUTOS
			$pagecontent = 	"Voici une liste de tutoriaux r&eacute;alis&eacute;s par nos soins et par les utilisateurs afin de vous faciliter 
							l'emploi des serveurs TeamSpeak 3. Vous avez envie de nous envoyer un tutoriel ? Utilisez le formulaire de Contact 
							et indiquez-y l'URL de votre fichier Texte. Nous le mettrons en forme et sous fichier PDF nous même.<br /><br />
							Attention toutefois: Vous ne pouvez utiliser ces documents qu'a but personnel. Vous n'&ecirc;tes pas autoris&eacute; 
							à modifier, redistribuer ou d&eacute;clarer de votre cr&eacute;ation ces fichiers sans accord &eacute;crit de notre part.
							<br /><br />
							<b><font color=\"red\">Les tutoriaux ont &eacute;t&eacute; effac&eacute;s car ceux-ci &eacute;taient obsol&egrave;tes.</font></b>";
			
		}
		elseif($_GET['page'] == 'staff')
		{
			$pagecontent = 	"Voici une liste exhaustive des membres de l'&eacute;quipe de TS3S. Leur Pseudonyme et leur Grade est affich&eacute;, 
			ainsi que leur avatar. N'h&eacute;sitez pas &agrave; postuler pour nous aider en rejoignant notre &eacute;quipe ! Nous aurons sans doute 
			une place pour vous.<br /></br >";
			$rqstaff = mysql_query('SELECT avatar, secure_level, display_name FROM ts3s_members WHERE secure_level >= \'4\' ORDER BY secure_level DESC');
			while($staff = mysql_fetch_array($rqstaff))
			{
			$pagecontent.= "<br />
			<div id=\"staff".$staff['secure_level']."\">
				<div id=\"fiche_staff1\"><img src=\"".$staff['avatar']."\" width=\"140\" height=\"140\" alt=\"\" /></div>
				<div id=\"fiche_staff2\"><b>".strtoupper($staff['display_name'])."</b></div>
				<div id=\"fiche_staff3\"><b>".GetRank($staff['secure_level'])."</b></div>
			</div>";
			
			}
			$basepos = 		"membres";
			$absolutpos = 	"L'&Egacute;quipe TS3S";
			$pagetitle = 	"Le staff TS3S";
		}
		
	elseif($_GET['page'] == 'options')
		{
			if($_SESSION['secure_level'] < 1)
			{
			header('Location:index.php?page=denied');
			}
			else
			{
			if($_GET['task'] == "password")
				{
					if(isset($_POST['old']) && isset($_POST['new1']) && isset($_POST['new2']))
					{
						if($_POST['old'] == NULL || $_POST['new1'] == NULL || $_POST['new2'] == NULL)
						{
						 $pagecontent = "<p class=\"INFORMATION\">Veuillez sp&eacute;cifier tout les champs.</p><br /><br />";
						 $pagecontent.= 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"old\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouveau mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"new1\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							R&eacute;p&ecirc;tez le mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"new2\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>";
						}
						else
						{
							if($_POST['new1'] == $_POST['new2'])
							{
								$pwcg1 = mysql_query('SELECT password FROM ts3s_members WHERE pseudo=\''.$_SESSION['pseudo'].'\' AND password LIKE \''.sha1($_POST['old']).'\'');
								$pwcg2 = mysql_num_rows($pwcg1);
								if($pwcg2 == 1)
								{
									if(mysql_query('UPDATE ts3s_members SET password=\''.sha1($_POST['new1']).'\' 
									WHERE pseudo=\''.$_SESSION['pseudo'].'\' '))
									{
										$pagecontent = "ok";
									}
									else
									{
										$pagecontent = "<p class=\"INFORMATION\">Erreur d'&eacute;criture en BDD.</p><br /><br />";
										$pagecontent.= 	"
						<form action=\"index.php?page=options&amp;task=password\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"old\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouveau mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"new1\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							R&eacute;p&ecirc;tez le mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"new2\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
									}
								}
								else
								{
									$pagecontent = "<p class=\"INFORMATION\">L'ancien mot de passe est incorrect</p><br /><br />";
									$pagecontent.= 	"
						<form action=\"index.php?page=options&amp;task=password\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"old\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouveau mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"new1\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							R&eacute;p&ecirc;tez le mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"new2\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
								}
							}
							else
							{
								$pagecontent = "<p class=\"INFORMATION\">Les mots de passes ne sont pas identiques !</p><br /><br />";
								$pagecontent.= 	"
						<form action=\"index.php?page=options&amp;task=password\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\"  class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"old\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouveau mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"new1\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							R&eacute;p&ecirc;tez le mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"new2\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
							}
						}
					}
					else
					{
						
						$pagecontent = 	"
						<form action=\"index.php?page=options&amp;task=password\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"old\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouveau mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"25\" name=\"new1\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							R&eacute;p&ecirc;tez le mot de passe
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"25\" name=\"new2\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
					}
				}
				elseif($_GET['task'] == "birthdate")
				{
					
					if(isset($_POST['jour']) && isset($_POST['month']) && isset($_POST['year']))
					{
					$bdchange = $_POST['jour']."-".$_POST['month']."-".$_POST['year'];
						if(mysql_query('UPDATE ts3s_members SET birthdate=\''.$bdchange.'\' WHERE pseudo=\''.$_SESSION['pseudo'].'\' '))
						{
							$_SESSION['birthdate'] = $bdchange;
							$pagecontent = "<p class=\"INFORMATION\">Date de naissance modifi&eacute;e !</p><br /><br />";
							$pagecontent.= 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon nom d'affichage
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=displayname\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['DN']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\"valign=\"top\"   width=\"300\" height=\"31\">
							URL de mon avatar
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=avatar\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\"  height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['avatar'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon mail
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=mail\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['mail'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Ma date de naissance
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=birthdate\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['birthdate']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mon mot de passe
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=password\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<acronym title=\"Le mot de passe est cach&eacute; par d&eacute;faut\"><font color=\"orange\">*****************</font></acronym>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>"; 
						}
						else
						{
						$pagecontent = "<p class=\"INFORMATION\">Erreur lors de l'edition !</p><br /><br />";
							$pagecontent.= 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon nom d'affichage
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=displayname\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['DN']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\"valign=\"top\"   width=\"300\" height=\"31\">
							URL de mon avatar
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=avatar\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\"  height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['avatar'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon mail
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=mail\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['mail'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Ma date de naissance
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=birthdate\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['birthdate']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mon mot de passe
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=password\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<acronym title=\"Le mot de passe est cach&eacute; par d&eacute;faut\"><font color=\"orange\">*****************</font></acronym>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>"; 
						}
					}
					else
					{
						$pagecontent = "<form action=\"index.php?page=options&amp;task=birthdate\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Date de naissance
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
					}
					
				}
				elseif($_GET['task'] == "mail")
				{
					if(isset($_POST['mail']) && isset($_POST['mailretiped']) &&isset($_POST['mypass']))
					{
						if($_POST['mail'] == $_POST['mailretiped'])
						{
							$mailchange = mysql_fetch_array(mysql_query('SELECT password FROM ts3s_members WHERE pseudo=\''.$_SESSION['pseudo'].'\' '));
							if(sha1($_POST['mypass']) == $mailchange['password'])
							{
								if(mysql_query('UPDATE ts3s_members SET mail=\''.$_POST['mail'].'\' WHERE pseudo=\''.$_SESSION['pseudo'].'\' '))
								{
									$_SESSION['mail'] = substr($_POST['mail'], 0, 32);
									$pagecontent = "<p class=\"INFORMATION\">Mail chang&eacute; avec succ&egrave;s.</p><br /><br />";
									$pagecontent.= 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon nom d'affichage
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=displayname\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['DN']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\"valign=\"top\"   width=\"300\" height=\"31\">
							URL de mon avatar
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=avatar\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\"  height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['avatar'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon mail
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=mail\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['mail'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Ma date de naissance
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=birthdate\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['birthdate']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mon mot de passe
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=password\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<acronym title=\"Le mot de passe est cach&eacute; par d&eacute;faut\"><font color=\"orange\">*****************</font></acronym>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>";
									
								}
								else
								{
									$pagecontent = "<p class=\"INFORMATION\">La requ&ecirc;te au serveur a &eacute;chou&eacute;e.</p><br /><br />";
									$pagecontent.= "<form action=\"index.php?page=options&amp;task=mail\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mail\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Retapez la nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mailretiped\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Votre mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" name=\"mypass\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
									
									
								}
							}
							else
							{
								$pagecontent = "<p class=\"INFORMATION\">Le mot de passe ne corresponds pas avec celui de votre compte.</p><br /><br />";
								$pagecontent.= "<form action=\"index.php?page=options&amp;task=mail\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mail\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Retapez la nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mailretiped\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Votre mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" name=\"mypass\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
							}
						}
						else
						{
							$pagecontent = "<p class=\"INFORMATION\">L'adresse mail n'est pas identique.</p><br /><br />";
							$pagecontent.= "<form action=\"index.php?page=options&amp;task=mail\" method=\"post\"><table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mail\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Retapez la nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mailretiped\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Votre mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" name=\"mypass\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
						}
					}
					else
					{
					$pagecontent = "<form action=\"index.php?page=options&amp;task=mail\" method=\"post\">
					<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mail\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Retapez la nouvelle adresse mail
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" maxlength=\"55\" name=\"mailretiped\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Votre mot de passe actuel
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"password\" class=\"fichages\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\"  size=\"35\" name=\"mypass\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
					}
				}
				elseif($_GET['task'] == "avatar")
				{
					if(isset($_POST['avatar']))
					{
						if(mysql_query('UPDATE ts3s_members SET avatar=\''.addslashes($_POST['avatar']).'\' WHERE pseudo=\''.$_SESSION['pseudo'].'\' '))
						{
							$_SESSION['avatar'] = addslashes($_POST['avatar']);
							$pagecontent = "<p class=\"INFORMATION\">Avatar mis &agrave; jour !</p><br /><br />";
							$pagecontent.= 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon nom d'affichage
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=displayname\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['DN']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\"valign=\"top\"   width=\"300\" height=\"31\">
							URL de mon avatar
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=avatar\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\"  height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['avatar'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon mail
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=mail\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['mail'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Ma date de naissance
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=birthdate\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['birthdate']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mon mot de passe
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=password\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<acronym title=\"Le mot de passe est cach&eacute; par d&eacute;faut\"><font color=\"orange\">*****************</font></acronym>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>";
						}
						else
						{
							$pagecontent = "";
							$pagecontent.= 	"
						<form method=\"post\" action=\"index.php?page=options&amp;task=avatar\">
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							URL de l'avatar:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" size=\"32\" name=\"avatar\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" value=\"".$_SESSION['avatar']."\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"150\">
							Aper&ccedil;u de l'Avatar:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"150\" id=\"params_field_r2\">
							&nbsp;&nbsp;&nbsp;
							<img src=\"".$_SESSION['avatar']."\" alt=\"\"  width=\"140\" heigth=\"140\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
						}
					}
					else
					{
						
							$pagecontent = 	"
						<form method=\"post\" action=\"index.php?page=options&amp;task=avatar\">
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							URL de l'avatar:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" size=\"32\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" name=\"avatar\" value=\"".$_SESSION['avatar']."\" />
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"150\">
							Aper&ccedil;u de l'Avatar:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"150\" id=\"params_field_r2\">
							&nbsp;&nbsp;&nbsp;
							<img src=\"".$_SESSION['avatar']."\" alt=\"\"  width=\"140\" heigth=\"140\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
					}
				}
				elseif($_GET['task'] == "displayname")
				{
					if(isset($_POST['newdisplay']))
					{
						$nbDN = mysql_num_rows(mysql_query('SELECT display_name FROM ts3s_members WHERE display_name LIKE \''.$_POST['newdisplay'].'\' '));
						if($nbDN == 0)
						{
							if(mysql_query('UPDATE ts3s_members SET display_name=\''.htmlspecialchars($_POST['newdisplay']).'\' 
							WHERE pseudo=\''.$_SESSION['pseudo'].'\' '))
							{
								$_SESSION['DN'] = htmlspecialchars($_POST['newdisplay']);
						$pagecontent = "<p class=\"INFORMATION\">Le nom d'affichage a &eacute;t&eacute; chang&eacute; avec succ&egrave;s !</p><br /><br />";
						$pagecontent.= 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon nom d'affichage
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=displayname\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['DN']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\"valign=\"top\"   width=\"300\" height=\"31\">
							URL de mon avatar
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=avatar\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\"  height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['avatar'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon mail
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=mail\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['mail'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Ma date de naissance
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=birthdate\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['birthdate']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mon mot de passe
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=password\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<acronym title=\"Le mot de passe est cach&eacute; par d&eacute;faut\"><font color=\"orange\">*****************</font></acronym>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>";
							}
							else
							{
							$pagecontent = "<p class=\"\">Erreur lors de l'&eacute;criture dans la Base de Donn&eacute;es.</p><br /><br />";
						$pagecontent.= 	"
						<form method=\"post\" action=\"index.php?page=options&amp;task=displayname\">
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Nom d'affichage:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"32\" maxlength=\"23\" name=\"newdisplay\" value=\"\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
							}
						}
						else
						{
						$pagecontent = "<p class=\"\">Le nom d'affichage est d&eacute;j&agrave; utilis&eacute;</p><br /><br />";
						$pagecontent.= 	"
						<form method=\"post\" action=\"index.php?page=options&amp;task=displayname\">
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Nom d'affichage:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"32\" maxlength=\"23\" name=\"newdisplay\" value=\"\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
						}
					}
					else
					{
					$pagecontent = 	"
						<form method=\"post\" action=\"index.php?page=options&amp;task=displayname\">
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Nom d'affichage:
							&nbsp;&nbsp;&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<input type=\"text\" style=\"color:#FFFFFF;background-color:transparent;
border:0px;\" size=\"32\" maxlength=\"23\" name=\"newdisplay\" value=\"\" />
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							<input type=\"submit\" value=\"Envoyer\" /><input type=\"reset\" value=\"recommencer\" /></td>
						</tr>
						</table></form>";
					}
				}
				
				else
				{
							$pagecontent = 	"
						<table width=\"600\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td colspan=\"2\" id=\"params_top\"  width=\"600\" height=\"100\">
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon nom d'affichage
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=displayname\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\" height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['DN']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\"valign=\"top\"   width=\"300\" height=\"31\">
							URL de mon avatar
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=avatar\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" valign=\"top\"  height=\"31\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['avatar'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\"  width=\"300\" height=\"31\">
							Mon mail
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=mail\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".substr($_SESSION['mail'], 0, 37)."...
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Ma date de naissance
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=birthdate\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							".$_SESSION['birthdate']."
							</td>
						</tr>
						
						<tr>
							<td id=\"params_field_l\" valign=\"top\" width=\"300\" height=\"31\">
							Mon mot de passe
							&nbsp;&nbsp;<a href=\"index.php?page=options&amp;task=password\">[Editer]</a>&nbsp;
							</td>
							
							<td width=\"300\" height=\"31\" valign=\"top\" id=\"params_field_r\">
							&nbsp;&nbsp;&nbsp;
							<acronym title=\"Le mot de passe est cach&eacute; par d&eacute;faut\"><font color=\"orange\">*****************</font></acronym>
							</td>
						</tr>
						
						<tr>
							<td colspan=\"2\" id=\"params_bottom\" width=\"600\" height=\"69\">
							</td>
						</tr>
						</table>";
				}
			}
			$basepos = 		"Profil";
			$absolutpos = 	"Mes Param&egrave;tres";
			$pagetitle = 	"Mes Param&egrave;tres";
		}
		
		
	elseif($_GET['page'] == 'acc_list')
		{
			if($_SESSION['secure_level'] < 4)
			{
			header('Location:index.php?page=denied');
			}
			else
			{
			$pagecontent = "";
				if($_GET['task'] == "scl" && is_numeric($_GET['uid']))
				{
					$pracc = mysql_query("SELECT * FROM ts3s_members WHERE id=".$_GET['uid']." LIMIT 0,1");
					if(mysql_num_rows($pracc) == 0)
					{
						$pagecontent.= "<p class=\"WARN\">Aucune ID de compte ne correspondant avec la base de donn&eacute;e ! Action abord&eacute;e.</p>";
					}
					elseif(mysql_num_rows($pracc) == 1)
					{
						$acc = mysql_fetch_array($pracc);
						if($acc['secure_level'] == 0)
						{
							$pagecontent.= mysql_query("UPDATE ts3s_members SET secure_level=1 WHERE id=".intval($_GET['uid'])) ? 
								"<p class=\"INFORMATION\">L'utilisateur <b>".$_GET['uid']." (".$acc['pseudo'].")</b> a &eacute;t&eacute; d&eacute;banni.</p>" : 
								"<p class=\"WARN\">Echec du d&eacute;bannissement (Quer1)</p>";
								@mysql_query("INSERT INTO ts3s_logs VALUE(
										'', 
										'".date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s")."',
										'".$_SESSION['UID']."',
										'Removing a Banned user',
										'".mysql_real_escape_string($_SERVER['REQUEST_URI'])."',
										'".$_SERVER['REMOTE_ADDR']."',
										'".mysql_real_escape_string($_GET['uid'])."')");
						}
						elseif($acc['secure_level'] != 0)
						{
							$pagecontent.= mysql_query("UPDATE ts3s_members SET secure_level=0 WHERE id=".intval($_GET['uid'])) ? 
								"<p class=\"INFORMATION\">L'utilisateur <b>".$_GET['uid']." (".$acc['pseudo'].")</b> a &eacute;t&eacute; banni avec succ&egrave;s.</p>" : 
								"<p class=\"WARN\">Echec du d&eacute;bannissement (Quer2)</p>";
								@mysql_query("INSERT INTO ts3s_logs VALUE(
										'', 
										'".date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s")."',
										'".$_SESSION['UID']."',
										'Adding a Banned user',
										'".mysql_real_escape_string($_SERVER['REQUEST_URI'])."',
										'".$_SERVER['REMOTE_ADDR']."',
										'".mysql_real_escape_string($_GET['uid'])."')");
						}
						else
						{
							$pagecontent.= "<h5>Une erreur est survenue.</h5>";
						}
					}
					else
					{
					$pagecontent.= "WHAT DA FUK ?<br />";
					}
				}
							// LISTE MEMBRES
			$preacc = mysql_query("SELECT * FROM ts3s_members ORDER BY id");
			$pagecontent.= 	"<table  class=\"tb\" align=\"center\" width=\"600\" border=\"1\" bordercolor=\"#000000\" cellpadding=\"0\" cellspacing=\"0\">
							<tr>
							<td width=\"200\" textalign=\"left\" valign=\"top\"><b>Nom de<br />compte</b></td>
							<td width=\"300\"><b>mail</b></td>
							<td width=\"100\"><b>Options</b></td>
							</tr>";
							while($accs = mysql_fetch_array($preacc))
							{
								$ogame = $_SESSION['secure_level'] < 8 ? "Addresse non affich&eacute;e" : $accs['mail'];
							$varalt = $accs['secure_level'] == 0 ? " bgcolor=\"red\"" : "";
			$pagecontent.= 	"<tr".$varalt.">
							<td valign=\"top\" textalign=\"left\"><b>".$accs['id']."</b> / ".$accs['pseudo']."<br /> ".$accs['ip_actual']."</td>
							<td valign=\"top\" textalign=\"left\">".$ogame."</td>
							<td valign=\"top\" textalign=\"left\">
								<a href=\"index.php?page=acc_list&amp;task=scl&amp;uid=".$accs['id']."\">(d&eacute;)bannir</a><br />
								<a href=\"index.php?page=seeprof&amp;sp=".$accs['id']."\">Informations</a><br />
							</td>
							</tr>
							";
							}
			$pagecontent.= 	"</table>";
			$basepos = 		"Informations";
			$absolutpos = 	"Liste des comptes";
			$pagetitle = 	"Liste des Comptes";
			}
		}
	
	elseif($_GET['page'] == 'report')
	{
		
		$_SESSION['secure_level'] >= 3 ? NULL : header('location: index.php?page=denied');
			
		if(isset($_POST['form']))
		{
			if(!empty($_POST['mail']) && !empty($_POST['name']) && !empty($_POST['type']) && !empty($_POST['describe']))
			{
				// Tout les champs sont rentrés
				$mail = mysql_real_escape_string(substr($_POST['mail'], 0, 155));
				$name = mysql_real_escape_string(substr($_POST['name'], 0, 55));
				$type = in_array($_POST['type'], array('cgu', 'commerce', 'illegal', 'spamming', 'other')) ? $_POST['type'] : false;
				$mesg = str_replace("\\r\\n", "", mysql_real_escape_string(nl2br(substr($_POST['describe'], 0, 60000))));
				
				switch($type)
				{
					case "other":			$type = "Autre";							break;
					case "commercial":		$type = "Utilisation commerciale";			break;
					case "illegal":			$type = "Utilisation ill&eacute;gale"; 		break;
					case "cgu":				$type = "Non respect des CGU"; 				break;
					case "spamming":		$type = "Spam par mail"; 					break;
					default:				$type = false;								break;
				}
				$sujet = "Service d'Abus: " . $type;
				
				
				if($type != false)
				{
					$mailcontent = "
<html>
	<head>
		<title>Signalement d'abus</title>
	</head>
	
	<body style=\"font-size:12px; width: 600px; font-family: Verdana;\">
		<font size=\"+2\">Signalement d'abus d'un serveur</font><br /><br />
		
		Un signalement a &eacute;t&eacute; fait via l'interface de signalement du site (http://ts3s.org/index.php?page=report) et requiert 
		une r&eacute;ponse. <br /><br />
		
		<b>Objet du signalement:</b> $type <br />
		<b>Date du signalement:</b> ".date("d / m / Y à H:i")." <br />
		<b>Signaleur:</b> $name  ( $mail )<br />
		<b>IP:</b> ".$_SERVER['REMOTE_ADDR']." <br />
		<b>Message de signalement:</b><br />
		<i>
		$mesg
		</i>
		<br />---------<br /><br /><br />
		
		Cordialement,
	</body>
</html>";

			$headers_REPORT  = 'MIME-Version: 1.0' . "\r\n";
			$headers_REPORT .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
			$headers_REPORT .= 'From: '.$name.' (web) <'.$mail.'>' . "\r\n";
			mail("abuse@ts3s.org", $sujet, $mailcontent, $headers_REPORT) ? 
						$pagecontent.= "  <p class=\"INFORMATION\">Votre mail &agrave; correctement &eacute;t&eacute; envoy&eacute;. 
										Nous y r&eacute;pondront au plus vite.</p>" 
						: $pagecontent.= "	<p class=\"WARN\">Erreur lors du l'envoi du mail de signalement. <br />
										Merci de nous contacter via l'adresse <b>postmaster (at) ts3s.org</b>.</p>";
					
				
				
				}
			}
			else 
			{
				$pagecontent.= "<p class=\"WARN\">Merci de remplir l'enti&egrave;ret&eacute;e du formulaire.</p>";
			}
		}
		else 
		{
			// Aucune action a entreprendre
		}
		
		$pagecontent.= "TS3S met a disposition une interface vous permettant de <b>signaler un abus relatif aux conditions g&eacute;n&eacute;rales d'utilisations</b> de TS3S ou d'une 
		infraction d'une quelconque loi en Belgique ou dans tout autre pays &eacute;ligible a obtenir un serveur vocal. Nous r&eacute;agirons le plus rapidement possible a cette alerte, 
		sans pour autant que vous obteniez une r&eacute;ponse. <br /><br />
		
		Si vous avez vu un agissement suspicieux, ou qu'une personne n'a pas respect&eacute; nos conditions g&eacute;n&eacute;rales d'utilisations (utilisation commerciale, clan non 
		francophone, ...) nous vous invitons &agrave; remplir ce formulaire avec vos donn&eacute;es exactes. Notez que tout les champs sont obligatoires, et que vous disposez d'un maximum 
		de 60.000 caract&egrave;res pour d&eacute;crire le probl&egrave;me. Tout abus de cet outil entrainera le bannissement de l'adresse IP / Compte / Serveur de celui qui l'utilise pour 
		nous contacter, au d&eacute;triment de notre <a href=\"index.php?page=contact\">Formulaire de contact</a>. <b>Merci d'&ecirc;tre le plus pr&eacute;cis possible dans votre signalement</b> 
		(adresse ip, port, date, type d'infraction, contexte, personnes incrimin&eacute;es, ...)<br /><br />
		
		<form action=\"index.php?page=report\" method=\"post\">
		
		<label for=\"name\">Votre nom et Pr&eacute;nom:</label><br />
		<input type=\"text\" name=\"name\" id=\"name\" class=\"form medium\" maxlength=\"55\" />
		<br /><br />
		
		<label for=\"mail\">Votre adresse mail:</label><br />
		<input type=\"text\" name=\"mail\" id=\"mail\" class=\"form medium\" maxlength=\"155\" />
		<br /><br />
		
		<label for=\"type\">Type d'abus:</label><br />
			<select name=\"type\">
			<option value=\"cgu\" selected=\"selected\">Non respect des CGU</option>
			<option value=\"commerce\">Utilisation commerciale</option>
			<option value=\"illegal\">Activit&eacute; ill&eacute;gale</option>
			<option value=\"spamming\">Spam d'e-mails</option>
			<option value=\"other\">Autre</option>
			</select>
		<br /><br />
		
		<label for=\"describe\">D&eacute;crivez en d&eacute;tail ce que vous avez vu / savez ci-dessous.</label><br />
		<textarea name=\"describe\" id=\"describe\" rows=\"12\" class=\"form medium\"></textarea>
		<br /><br />
		<input type=\"submit\" value=\"Envoyer votre rapport\" name=\"form\" />
		</form>";
		
		$pagetitle = 	"Signaler un abus";
	} 
	elseif($_GET['page'] == 'srv_list')
		{
			if($_SESSION['secure_level'] < 4)
			{
			header('Location:index.php?page=denied');
			}
			else
			{
				// LISTE SERVEURS
			$srv_list = @mysql_query("SELECT * FROM ts3s_servers ORDER BY sport");
			$pagecontent = 	"<table class=\"tb\"  align=\"center\" width=\"600\" border=\"1\" bordercolor=\"#000000\" cellpadding=\"0\" cellspacing=\"0\">
							<tr>
							<td width=\"300\">[ID] <b>Serveur</b></td>
							<td width=\"80\"><b>UID</b></td>
							<td width=\"220\"><b>Options</b></td>
							</tr>";
							while($srvx = mysql_fetch_array($srv_list))
							{
							if( $srvx['is_active'] == "1" || $srvx['is_active'] == "2")
							{
								$pagecontent.="<tr  bgcolor=\"#009900\" style=\"color:#FFF\">";
							}
							else
							{
								$pagecontent.="<tr>";
							}
			$pagecontent.= 	"
							<td valign=\"top\" textalign=\"left\">[".$srvx['SID']."/".$srvx['mid']."] ".$srvx['sip']." : ".$srvx['sport']."</td>
							<td valign=\"top\" textalign=\"left\"><a href=\"index.php?page=seeprof&sp=".$srvx['uid']."\">".$srvx['uid']."</a></td>
							<td valign=\"top\" textalign=\"left\">
								<a onclick=\"alert('Cette fonction est encore en developpement.');\" href=\"index.php?page=srv_list&amp;task=edit&amp;sid=".$srvx['SID']."\">Editer</a><br />
								<a onclick=\"alert('Cette fonction est encore en developpement.');\" href=\"index.php?page=srv_list&amp;task=del&amp;sid=".$srvx['SID']."\">Supprimer</a><br />
							</td>
							</tr>
							";
							}
			$pagecontent.= 	"</table>";
			$basepos = 	"Informations";
			$absolutpos = 	"Liste des serveurs";
			$pagetitle = 	"Liste des serveurs";
			}
		}
		
	elseif($_GET['page'] == 'concours')
		{
			$pagecontent = "Ce concour est termin&eacute;. <br /><br />Le chiffre obtenu est <b>38</b>.";
			
			$basepos = 	"Informations";
			$absolutpos = 	"TS3S";
			$pagetitle = 	"Concours";
		}
		
	elseif($_GET['page'] == 'reqs')
		{
			if($_SESSION['secure_level'] < 6)
			{
			header('Location:index.php?page=denied');
			}
			else
			{
				// LISTE REQUETES -- LIENS
			$pre_linker = @mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'link\' ORDER BY id');
			
				// LISTE REQUETES -- SERVEURS
			//$pre_srv = @mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'server\' ORDER BY id');
			$pre_srv = @mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'server\' AND status=\'en cours\' ORDER BY id');
			
				// LISTE REQUETES -- HELP
			$pre_hp = @mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'help\' ORDER BY id');
			
			// 16051993.
			$encours_rq = mysql_num_rows(mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'server\' AND status=\'en cours\' ORDER BY id'));
			$accepter_rq = @mysql_num_rows(mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'server\' AND status=\'accepter\' ORDER BY id'));
			$refuser_rq = @mysql_num_rows(mysql_query('SELECT * FROM ts3s_reqs WHERE type=\'server\' AND status=\'refuser\' ORDER BY id'));
			
			
			$pagecontent = 	"	
								<div align=\"center\"><h2>Actuellement:</h2>
								<b>".srv_offre()."</b> serveurs TS3 actifs.<br />
								<b>".$encours_rq."</b> demandes en cours.
								<b>".$accepter_rq."</b> demandes accept&eacute;es
								<b>".$refuser_rq."</b> demandes refus&eacute;es</div>
								<hr /><br />SERVEURS:<br />
								<TABLE class=\"T02\" width=\"700\" border=\"1\" cellspadding=\"0\" cellspacing=\"0\">
								<tr>
									<td width=\"40\"><b>Pos.</b></td>
									<td width=\"250\"><b>Nom de la guilde:</b></td>
									<td width=\"250\"><b>Jeu:</b></td>
									<td width=\"60\"><b>Status</b></td>
									<td width=\"100\"><b>UID / RQID</b></td>
								</tr>";
								$pos = 1;
			while($srvq = @mysql_fetch_array($pre_srv))
			{
			$srvq['c4'] == 'on' ? $tosize = " style=\"background: url('images/notify-info.png') repeat;\"" : $tosize = "";
			$pagecontent.= 	"	
								<tr".$tosize.">
									<td>".$pos."</td>
									<td>".str_replace(array('<', '>'), array('&lt;', '&gt;'), $srvq['c1'])."</td>
									<td>".str_replace(array('<', '>'), array('&lt;', '&gt;'), $srvq['c2'])."</td>
									<td><a href=\"index.php?page=validate&uid=
									".$srvq['uid']."&rqid=".$srvq['id']."\">".$srvq['status']."</a></td>
									<td><a href=\"index.php?page=seeprof&sp=".$srvq['uid']."\">".$srvq['uid']."</a>/".$srvq['id']."</td>
								</tr>";
								$pos ++;
			}
			
			$pagecontent.= 	"	</table><br /><br />
								LIENS:<br />
								<TABLE class=\"T03\" width=\"700\" border=\"1\" cellspadding=\"0\" cellspacing=\"0\">
								<tr>
									<td width=\"100\"><b>NOM:</b></td>
									<td width=\"100\"><b>TYPE:</b></td>
									<td width=\"200\"><b>URL:</b></td>
									<td width=\"200\"><b>DESC:</b></td>
									<td width=\"75\"><b>Status</b></td>
									<td width=\"25\"><b>UID</b></td>
								</tr>";
			while($linker = @mysql_fetch_array($pre_linker))
			{
			$pagecontent.= 	"	
								<tr>
									<td>".$linker['c1']."</td>
									<td>".$linker['c2']."</td>
									<td>".$linker['c3']."</td>
									<td>".$linker['c4']."</td>
									<td>".$linker['status']."</td>
									<td>".$linker['uid']."</td>
								</tr>";
			}
			
			$pagecontent.= 	"	</table><br /><br />
								AIDE:<br />
								<TABLE class=\"T04\" width=\"700\" border=\"1\" cellspadding=\"0\" cellspacing=\"0\">
								<tr>
									<td width=\"100\"><b>Probl&egrave;me:</b></td>
									<td width=\"275\"><b>DESC:</b></td>
									<td width=\"200\"><b>URL:</b></td>
									<td width=\"100\"><b>Status</b></td>
									<td width=\"25\"><b>UID</b></td>
								</tr>";
			while($hpq = @mysql_fetch_array($pre_hp))
			{
			$pagecontent.= 	"	
								<tr>
									<td>".$hpq['c1']."</td>
									<td>".$hpq['c2']."</td>
									<td>".$hpq['c3']."</td>
									<td>".$hpq['status']."</td>
									<td>".$hpq['uid']."</td>
								</tr>";
			}
			$pagecontent.= "</table>";
			
			$basepos = 		"Admin";
			$absolutpos = 	"G&eacute;rer les requ&ecirc;tes";
			$pagetitle = 	"G&eacute;rer les requ&ecirc;tes";
			}
		}
		
		elseif($_GET['page'] == 'news')
		{
		//# NEWS PERSONNELLES
			if(!is_numeric($_GET['nid']) || empty($_GET['nid']) )
			{
				$sql = "SELECT * FROM ts3s_news ORDER BY id DESC LIMIT 0,1";
				$lastnews = mysql_query($sql);
				$count = mysql_num_rows($lastnews);
				if($count == 0)
				{
				$pagecontent = "Aucune news disponible...";
				}
				elseif($count != 0)
				{
				$lastnews = mysql_fetch_array($lastnews);
				$pagecontent = 	"
								<h4>".$lastnews['titre']."</h4>
								".nl2br(stripslashes($lastnews['contenu']))."
								<hr />post&eacute; par ".$lastnews['auteur']." le ".$lastnews['date'];
				}
				else
				{
				$pagecontent = "ERREUR.... FATALE ??";
				}
			}
			elseif(is_numeric($_GET['nid']) && !empty($_GET['nid']))
			{
				$sql = "SELECT * FROM ts3s_news WHERE id=".$_GET['nid']." ORDER BY id DESC LIMIT 0,1";
				$lastnews = mysql_query($sql);
				$count = mysql_num_rows($lastnews);
				if($count == 0)
				{
				$pagecontent = "Aucune news disponible avec cette ID.";
				}
				elseif($count != 0)
				{
				$lastnews = mysql_fetch_array($lastnews);
				$pagecontent = 	"
								<h4>".$lastnews['titre']."</h4>
								".nl2br(stripslashes($lastnews['contenu']))."
								<hr />post&eacute; par ".$lastnews['auteur']." le ".$lastnews['date'];
				}
				else
				{
					$pagecontent = "ERREUR.... FATALE ??";
				}
			}
			else
			{
			$pagecontent = "ERREUR.... FATALE ??";
			}
			
			$basepos = 		"info";
			$absolutpos = 	"News";
			$pagetitle = 	stripslashes($lastnews['titre']);
		}
	
	//*************************************************************************************************
	elseif($_GET['page'] == 'about')
		{
			$pagecontent = 	"	<h4>A propos de TS3S</h4>
								<b><u><font color=red>Cette page est obsol&egrave;te et ne sera pas mise &agrave; jour avant la V3 de TS3S.<br />
								Les informations affich&eacute;es par celle-ci peuvent donc &ecirc;tres &eacute;ronn&eacute;s.</font></u></b>
								<br /><br />
								<b>TS3S</b> est une communaut&eacute;e fond&eacute;e en <b>Octobre 2010</b>, par <b>Hugo Regibo</b>.<br />
								Le site a pour but de fournir des serveurs <b>Teamspeak 3 virtuels</b> aux guildes et clans francophones le demandant, afin de
								mettre en avant l'aspect &quot;humain&quot; d'une &eacute;quipe, permettant ainsi de mettre un visage sur un pseudonyme.
								<b>Nous fournissons des serveurs gratuitement</b>, car la plupart des guildes ou clans sont avec des personnes mineurs n'ayant
								pas le moyen de se payer un serveur teamspeak, ou encore n'ayant pas d'argent &agrave; dépenser l&agrave; dedans.<br />
								<br />
								<i><b>Pr&eacute;curseurs</b> dans le domaine de mise &agrave; disposition de serveurs virtuels gratuits et priv&eacute;s, 
								TS3S s'impose comme le meilleur service et la meilleure qualit&eacute; de serveurs, coupl&eacute;s &agrave; une grande 
								stabilit&eacute;. Nos serveurs sont les meilleurs et les plus stables du march&eacute;, et tout ceci gratuitement.</i>
								<br /><br />
								Nous limitons quand m&ecirc;me les droits des administrateurs afin de conserver au mieux la qualit&eacute; du service
								d&eacute;livr&eacute;. La &quot;communaut&eacute;&quot; (car nous n'avons pas de forme juridique) est entièrement gratuite,
								et nous ne touchons aucun b&eacute;n&eacute;fice des h&eacute;bergements de serveurs, car nous employons une license 
								<acronym title=\"Non Profit License\">NPL</acronym> de <a href=\"https://sales.tritoncia.com/\">Triton CI & Associates</a>, 
								pour utilisation non commerciale. Nous ne pouvons par contre octroyer que 10 serveurs, il vous faudra donc attendre si un 
								serveur n'est pas disponible de suite.<br /><br />
								<b>Nous sommes toutefois pour le moment en discussions pour h&eacute;berger les licences utilisateurs gratuitement, en vous laissant
								la main sur l'installation.</b>
								<br /><br />
								Toutefois, notre serveur d&eacute;di&eacute; a un co&ucirc;t, qui est de 717&euro; par ann&eacute;e. Nous le payons avec
								notre propre argent. Si vous souhaitez contribuer &agrave; la p&eacute;r&eacute;nit&eacute;e de TS3S, vous pouvez 
								nous contacter pour obtenir plus d'informations.
							";
			$basepos = "Informations";
			$absolutpos = "A propos de TS3S";
			$pagetitle = "A propos";
		}
	elseif($_GET['page'] == 'CGU')
		{
			//$pagecontent = 	"<p style=\"text-align:justify;\"><textarea cols=\"70\" rows=\"15\" readonly>".GCU_GET()."</textarea></p>";
		$pagecontent = 	nl2br(GCU_GET());
		
		$basepos = "Informations";
		$absolutpos = "Conditions G&eacute;n&eacute;rales d'utilisation";
		$pagetitle = "nos CGU";
		
		}
		/*
			######################### C O N T A C T ##################
		*/
	elseif($_GET['page'] == 'contact')
		{
			if(isset($_POST['message']) && isset($_POST['from']) && isset($_POST['sujet']) && isset($_POST['nom']))
				{
					if($_POST['message'] != NULL && $_POST['from'] != NULL && $_POST['sujet'] != NULL && $_POST['nom'] != NULL)
					{
						// HEADERS PHPMAILER();
						$headers  = 'MIME-Version: 1.0' . "\r\n";
						$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
						$headers .= 'From: e-Support TS3S <'.addslashes($_POST['from']).'>' . "\r\n";
						$headers .= 'Bcc: balkeyser@live.fr' . "\r\n";
						
						  if (!$resp->is_valid)
							{
								$pagecontent = "<p class=\"WARN\">Le code de s&eacute;curit&eacute; est incorrect.</p><br />
										Vous souhaitez nous contacter ? Remplissez le formulaire ci dessous.<br />
										<br />Vous avez besoin d'aide rapidement ? Vous avez une question simple &agrave; poser ? 
			Connectez-vous &agrave; notre teamspeak de support !<br /> (Merci de vous connecter avec votre nom de compte TS3S)
			<br /> 188.165.195.82. Aucun mot de passe n'est requis !<br />
			
										<form method=\"post\" action=\"index.php?page=contact\">
										Votre nom et pr&eacute;nom:<br />";
							
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"nom\" size=\"32\" /><br />";
										
										$pagecontent.= "Votre mail:<br />";
										
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"from\" size=\"32\" /><br />";
										
										$pagecontent.= "
										Sujet du contact:<br />
										<input type=\"text\" autocomplete=\"off\"  name=\"sujet\" size=\"32\" /><br />
										Votre message:<br />
										<textarea name=\"message\" cols=\"65\" rows=\"10\" wrap=\"virtual\">Bonjour,</textarea><br /><br />
										<br />";
								$pagecontent.= recaptcha_get_html($publickey);
								$pagecontent.= 	"<br /><input type=\"submit\" value=\"Envoyer le mail\" />
										<input type=\"reset\" value=\"Recommencer\" />
										";
							} 
							else 
						{
						$cond = !empty($_SESSION['UID']) ? " (ACC_ID::".$_SESSION['UID'].") " : "";
								if(mail(
								'postmaster@ts3s.org',
								htmlspecialchars("TS3S contact: ".$_POST['sujet']), 
								"Message de <b>".addslashes(nl2br($_POST['nom']))."</b> ".$cond.", 
								".htmlspecialchars($_POST['from'])." 
								(".$_SERVER['REMOTE_ADDR'].")
								
								<br /><br />".addslashes(nl2br($_POST['message'])), 
								$headers))
								{
									$pagecontent = "<p class=\"INFORMATION\">Le mail a &eacute;t&eacute; envoyé !</p><br />
										Vous souhaitez nous contacter ? Remplissez le formulaire ci dessous.<br />
										<br />Vous avez besoin d'aide rapidement ? Vous avez une question simple &agrave; poser ? 
										Connectez-vous &agrave; notre teamspeak de support !<br /> (Merci de vous connecter avec votre nom de compte TS3S)
										<br /> 188.165.195.82. Aucun mot de passe n'est requis !<br />
										
										<br />
										<form method=\"post\" action=\"index.php?page=contact\">
										Votre nom et pr&eacute;nom:<br />";
								if($_SESSION['UID'] != NULL && $_SESSION['UID']!= 0)
										{
										$pagecontent.= "<input type=\"text\" autocomplete=\"off\" disabled=\"disabled\" value=\"ACC::".$_SESSION['UID']."\" name=\"nom\" size=\"32\" /><br />";
										}
										else
										{
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"nom\" size=\"32\" /><br />";
										}
										$pagecontent.= "Votre mail:<br />";
										if($_SESSION['mail'] != NULL)
										{
										$pagecontent.= "<input type=\"text\" autocomplete=\"off\" disabled=\"disabled\" value=\"".$_SESSION['mail']."\" name=\"from\" size=\"32\" /><br />";
										}
										else
										{
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"from\" size=\"32\" /><br />";
										}
										$pagecontent.= "Sujet du contact:<br />
										<input type=\"text\" autocomplete=\"off\"  name=\"sujet\" size=\"32\" /><br />
										Votre message:<br />
										<textarea name=\"message\" cols=\"65\" rows=\"10\" wrap=\"virtual\">Bonjour,</textarea><br /><br />
										<br />";
										$pagecontent.= recaptcha_get_html($publickey);
										$pagecontent.= 	"<br /><input type=\"submit\" value=\"Envoyer le mail\" />
										<input type=\"reset\" value=\"Recommencer\" />
										";
								}
								else
									{
										$pagecontent = "<p class=\"WARN\">Erreur lors de l'envoi.</p>";
										$pagecontent.= "<br />
													Vous souhaitez nous contacter ? Remplissez le formulaire ci dessous.<br />
													<br />Vous avez besoin d'aide rapidement ? Vous avez une question simple &agrave; poser ? 
			Connectez-vous &agrave; notre teamspeak de support !<br /> (Merci de vous connecter avec votre nom de compte TS3S)
			<br /> 188.165.195.82 port 9999. Aucun mot de passe n'est requis !<br />
			
													<br />
													<form method=\"post\" action=\"index.php?page=contact\">
													Votre nom et pr&eacute;nom:<br />";
								
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"nom\" size=\"32\" /><br />";
										
										$pagecontent.= "Votre mail:<br />";
										
										
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"from\" size=\"32\" /><br />";
										
										$pagecontent.= "Sujet du contact:<br />
													<input type=\"text\" autocomplete=\"off\"  name=\"sujet\" size=\"32\" /><br />
													Votre message:<br />
													<textarea name=\"message\" cols=\"65\" rows=\"10\" wrap=\"virtual\">Bonjour,</textarea><br /><br />
													<br />";
										$pagecontent.= recaptcha_get_html($publickey);
										$pagecontent.= 	"<br /><input type=\"submit\" value=\"Envoyer le mail\" />
													<input type=\"reset\" value=\"Recommencer\" />
													";
									}
						}
					}
					else
					{
						$pagecontent = "<p class=\"WARN\">Renseignez tout les champs.</p>";
						$pagecontent.= "<br />
										Vous souhaitez nous contacter ? Remplissez le formulaire ci dessous.<br />
										<br />Vous avez besoin d'aide rapidement ? Vous avez une question simple &agrave; poser ? 
			Connectez-vous &agrave; notre teamspeak de support !<br /> (Merci de vous connecter avec votre nom de compte TS3S)
			<br /> 188.165.195.82. Aucun mot de passe n'est requis !<br />
										<br />
										<form method=\"post\" action=\"index.php?page=contact\">
										Votre nom et pr&eacute;nom:<br />";
								
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"nom\" size=\"32\" /><br />";
										
										$pagecontent.= "Votre mail:<br />";
										
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"from\" size=\"32\" /><br />";
										
										$pagecontent.= "Sujet du contact:<br />
										<input type=\"text\" autocomplete=\"off\"  name=\"sujet\" size=\"32\" /><br />
										Votre message:<br />
										<textarea name=\"message\" cols=\"65\" rows=\"10\" wrap=\"virtual\">Bonjour,</textarea><br /><br />
										<br />";
							$pagecontent.= recaptcha_get_html($publickey);
						$pagecontent.= 	"<br /><input type=\"submit\" value=\"Envoyer le mail\" />
										<input type=\"reset\" value=\"Recommencer\" />
										";
					}
				}
			else
			{
				$pagecontent = 	"Vous souhaitez nous contacter ? Remplissez le formulaire ci dessous.<br />
								<br />Vous avez besoin d'aide rapidement ? Vous avez une question simple &agrave; poser ? 
			Connectez-vous &agrave; notre teamspeak de support !<br /> (Merci de vous connecter avec votre nom de compte TS3S)
			<br /> 188.165.195.82, Aucun mot de passe n'est requis !<br />
				<br />
								<form method=\"post\" action=\"index.php?page=contact\">
								Votre nom et pr&eacute;nom:<br />";
							
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"nom\" size=\"32\" /><br />";
										
										$pagecontent.= "Votre mail:<br />";
										
										
											$pagecontent.= "<input type=\"text\" autocomplete=\"off\" name=\"from\" size=\"32\" /><br />";
										
										$pagecontent.= "Sujet du contact:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"sujet\" size=\"32\" /><br />
								Votre message:<br />
								<textarea name=\"message\" cols=\"65\" rows=\"10\" wrap=\"virtual\">Bonjour,</textarea><br /><br />
								<br />";
								$pagecontent.= recaptcha_get_html($publickey);
				$pagecontent.= 	"<br />
									<input type=\"submit\" value=\"Envoyer le mail\" />
									<input type=\"reset\" value=\"Recommencer\" />
									";
			}

			$pagecontent.= "<hr />";
			$basepos = "Support";
			$absolutpos = "Nous contacter";
			$pagetitle = "Contact";
		}
		
		
		/*
			######################### A C C U E I L ##################
		*/
		
	elseif($_GET['page'] == NULL || $_GET['page'] == 'accueil')
		{
			$pagecontent = "<h4>Bienvenue sur TS3S.org !</h4>
			
			<br />";
			
			
			$news_p = mysql_query('SELECT id, auteur, titre, contenu, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date FROM ts3s_news ORDER BY id DESC LIMIT 0,5');
			while($newp = mysql_fetch_array($news_p))
			{
			$pagecontent.= 	"<table width=\"700\" border=\"0.5\" bordercolor=\"#009900\" align=\"center\" cellspacing=\"0\" cellpadding=\"0\">
							<tr><td align=\"center\" style=\"background:#006633;color:#FFF;\">".stripslashes($newp['titre'])."</td></tr>
							<tr><td style=\"text-align:justify;background:#FFFFCC;color:#000;\">".nl2br(stripslashes($newp['contenu']))."</td></tr>
							<tr><td align=\"right\" style=\"background:#003300;color:#FFCC66;\">Post&eacute; le ".$newp['date']." par ".$newp['auteur'].".</td></tr>
							</table><br /><hr /><br />";
			}
			$basepos = "Accueil";
			$absolutpos = "Présentation";
			$pagetitle = "Accueil";
		}
		// ######################## O P T I O N S    D E     S E S S I O N S #################
		elseif($_GET['page'] == 'login')
		{
			if($_SESSION['pseudo'] != "Invit&eacute;")
				{
					header('location:index.php?page=profil');
				}
			
			if (isset($_POST['nameconnect']) && isset($_POST['password'])) 
			{
				$passwd = sha1($_POST['password']);
				$account = strtoupper($_POST['nameconnect']);
				$sql = "SELECT * FROM ts3s_members WHERE pseudo='%s' AND password='%s'";
				$sql = sprintf($sql,
						mysql_real_escape_string($account),
						mysql_real_escape_string($passwd)
				);
				$preconnect = mysql_query($sql);
				$connect = mysql_fetch_array($preconnect);
				if (mysql_num_rows($preconnect) == 1 && $connect['secure_level'] >= 1)
				{
				$_SESSION['pseudo'] = $connect['pseudo'];
				$_SESSION['UID'] = $connect['id'];
				$_SESSION['DN'] = $connect['display_name'];
				$_SESSION['avatar'] = addslashes($connect['avatar']);
				$_SESSION['mail'] = $connect['mail'];
				$_SESSION['ip_insc'] = $connect['ip_insc'];
				mysql_query('UPDATE ts3s_members SET ip_actual = \'' . $_SERVER['REMOTE_ADDR'] . '\' WHERE pseudo = \'' . $_SESSION['pseudo'] . '\'');
				$_SESSION['ip_actual'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['sexe'] = $connect['sexe'];
				$_SESSION['birthdate'] = $connect['birthdate'];
				$_SESSION['secure_level'] = $connect['secure_level'];
				$pagecontent.= "Connexion r&eacute;ussie. Bienvenue.<br />";
					$sql = "SELECT * FROM ts3s_servers WHERE uid='%s' ";
					$sql = sprintf($sql,  mysql_real_escape_string($connect['id']));
					$query = mysql_query($sql);
								
					setcookie("account", $account.";".$passwd, time()+60*60*24*365);
					
					if(mysql_num_rows($query) == 1)
					{
					
						$server = mysql_fetch_assoc($query);
						
						$_SESSION['SID'] = $server['SID'];
						$_SESSION['sport'] = $server['sport'];
						$_SESSION['sslots'] = $server['sslots'];
						$_SESSION['sip'] = $server['sip'];
						$_SESSION['PKEY'] = $server['pkey'];
						$_SESSION['cdate'] = $server['cdate'];
						$_SESSION['fdate'] = $server['fdate'];
						$_SESSION['IAC'] = $server['is_active'];
						$_SESSION['mid'] = $server['mid'];
						
						$pagecontent.= "Votre serveur a &eacute;t&eacute; correctement li&eacute; a votre session.";
						header('location: index.php?page=profil');
					}
				else
				{
				$pagecontent.= "Vous n'avez toujours pas de serveur li&eacute; a votre compte";
				header('location: index.php?page=profil');
				}
				}
				elseif(mysql_num_rows($preconnect) == 1 && $connect['secure_level'] == 0)
				{
					$pagecontent = "<font color=\"red\">Ce compte est inactif. Il est en cet &eacute;tat pour l'une des raisons suivantes:<br />
									<ul>
										<li>Non respect des CGU</li>
										<li>Compte ferm&eacute; sur demande</li>
										<li>Adresse mail invalide</li>
									</ul>
									
									Dans le cas o&ugrave; vous pensez que vous n'entrez pas dans l'une de ces trois conditions, nous vous invitons &agrave; 
									nous contacter via le formulaire de contact du site.</font>";
				}
				elseif(mysql_num_rows($preconnect) == 1 && $connect['secure_level'] == -1)
				{
					$pagecontent = "<h5>Le compte a &eacute;t&eacute; effac&eacute;.</h5>";
				}
				else
				{
				 $pagecontent = "Echec de la connexion. Veuillez v&eacute;rifier que vous avez entr&eacute; les bons identifiants.";
				}
		
			}
			elseif (isset($_GET['a']) && isset($_GET['p'])) 
			{
				
				
				$passwd = sha1($_GET['p']);
				$account = strtoupper($_GET['a']);
				$sql = "SELECT * FROM ts3s_members WHERE pseudo='%s' AND password='%s'";
				$sql = sprintf($sql,
						mysql_real_escape_string($account),
						mysql_real_escape_string($passwd)
				);
				$preconnect = mysql_query($sql);
				$connect = mysql_fetch_array($preconnect);
				if (mysql_num_rows($preconnect) == 1)
				{
				$_SESSION['pseudo'] = $connect['pseudo'];
				$_SESSION['UID'] = $connect['id'];
				$_SESSION['DN'] = $connect['display_name'];
				$_SESSION['avatar'] = addslashes($connect['avatar']);
				$_SESSION['mail'] = $connect['mail'];
				$_SESSION['ip_insc'] = $connect['ip_insc'];
				mysql_query('UPDATE ts3s_members SET ip_actual = \'' . $_SERVER['REMOTE_ADDR'] . '\' WHERE pseudo = \'' . $_SESSION['pseudo'] . '\'');
				$_SESSION['ip_actual'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['sexe'] = $connect['sexe'];
				$_SESSION['birthdate'] = $connect['birthdate'];
				$_SESSION['secure_level'] = $connect['secure_level'];
				$pagecontent.= "Connexion r&eacute;ussie. Bienvenue.<br />Redirection...<br />
												<script type=\"text/javascript\">
												$.modaldialog.success('Connexion au site TS3S r&eacute;ussie.<br />
												Bienvenue, <b>".$_SESSION['pseudo']."</b>. ', {
												  timeout: 3
												  , showClose: false
												  })
												window.setTimeout(\"location=('index.php?page=profil');\",4000)
												</script>";
					$sql = "SELECT * FROM ts3s_servers WHERE uid='%s' ";
					$sql = sprintf($sql,  mysql_real_escape_string($connect['id']));
					$query = mysql_query($sql);
								
					
					if(mysql_num_rows($query) == 1)
					{
					
						$server = mysql_fetch_assoc($query);
						
						$_SESSION['SID'] = $server['SID'];
						$_SESSION['sport'] = $server['sport'];
						$_SESSION['sslots'] = $server['sslots'];
						$_SESSION['sip'] = $server['sip'];
						$_SESSION['PKEY'] = $server['pkey'];
						$_SESSION['cdate'] = $server['cdate'];
						$_SESSION['fdate'] = $server['fdate'];
						$_SESSION['IAC'] = $server['is_active'];
						$_SESSION['mid'] = $server['mid'];
						
						$pagecontent.= "Votre serveur a &eacute;t&eacute; correctement li&eacute; a votre session.";
						header('location: index.php?page=profil');
					}
				else
				{
				$pagecontent.= "Vous n'avez toujours pas de serveur li&eacute; a votre compte";
				header('location: index.php?page=profil');
				}
				}
				else
				{
				 $pagecontent = "Echec de la connexion. Veuillez v&eacute;rifier que vous avez entr&eacute; les bons identifiants.";
				}
		
			}
			else
			{
					$pagecontent = "
					<form method=\"post\" action=\"index.php?page=login\">
					<table align=\"center\" width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
					<tr>
					<td  id=\"CXT\" colspan=\"2\" width=\"600\" height=\"48\">
					</td>
					</tr>
					<tr>
					<td id=\"CXL\" width=\"296\" height=\"72\">
					<input type=\"text\" size=\"30\" maxlength=\"23\" name=\"nameconnect\" dir=\"rtl\" />&nbsp;&nbsp;&nbsp;<br />
					<input type=\"reset\" value=\"Effacer\" />&nbsp;&nbsp;&nbsp;
					</td>
					<td id=\"CXR\" width=\"304\" height=\"72\">
					&nbsp;&nbsp;&nbsp;<input type=\"password\" autocomplete=\"off\"  size=\"32\" name=\"password\" /><br />
					&nbsp;&nbsp;&nbsp;<input type=\"submit\" value=\"Connexion\" />
					</td>
					</tr>
					</table>
					</form><br />
					<p align=\"center\"><a href=\"index.php?page=acc_create\">Pas encore membre ?</a> ou <a href=\"index.php?page=retrieve_password\">mot de passe perdu ?</a></p>";
					$basepos = "Connexion";
					$absolutpos = "Interface d'entr&eacute;e";
					$pagetitle = "Connexion";
			}
		}
		elseif($_GET['page'] == 'retrieve_password')
		{
		$pagetitle = "R&eacute;cup&eacute;ration de mot de passe";
			if(!empty($_POST['mail']) || !empty($_POST['acc']))
			{
				$pagecontent = "";
				$d = 0;$b = 0;
				if(!empty($_POST['mail']) && empty($_POST['acc'])) {$a = mysql_query("SELECT mail, pseudo FROM ts3s_members WHERE mail='".$_POST['mail']."'"); $z = true;}
				elseif(!empty($_POST['acc']) && empty($_POST['mail'])) {$a = mysql_query("SELECT mail, pseudo FROM ts3s_members WHERE pseudo='".strtoupper($_POST['acc'])."'"); $z = true;}
				elseif(!empty($_POST['acc']) && !empty($_POST['mail'])) {$d = 1; $z = false;}
				else{$d = 0; $z = false;}
				if($z == true) {$b = mysql_num_rows($a); $c = mysql_fetch_array($a);}else{$b = 0;}
				
				if($b == 1)
				{
						$pass = NouveauPass();
						mysql_query("UPDATE ts3s_members SET password='".sha1($pass)."' WHERE pseudo='".strtoupper($_POST['acc'])."'");
						mail($c['pseudo']." <".$c['mail'].">", "Changement de mot de passe", "Bonjour <b>".$c['pseudo']."</b>, <br />votre nouveau mot de passe est le suivant : <b>".$pass."</b><br /><br />Bonne journ&eeacute;e.", $headers);
						$pagecontent.= "<font color=\"green\">Votre nouveau mot de passe &agrave; &eacute;t&eacute; envoy&eacute; sur l'adresse mail de votre compte. Vous pouvez le changer &agrave; tout moment dans la section &quot;mes param&egrave;tres&quot; du site.</font><br />";
					
				}
				else
					{
						if($d == 1) 
						{
						$pagecontent.="<font color=\"#FF0000\">Merci d'indiquer un seul des deux champs</font><br />";
						}
						else
						{
						$pagecontent.="<font color=\"#FF0000\">Aucun compte n'existe sous ce nom.</font><br />";
						}
					}
			}
			else
			{
				$pagecontent.= "";
			}
			
			$pagecontent.= "Veuillez rentrer votre nom de compte OU votre adresse mail.<br /><br />
			nom de compte:<br />
			<form action=\"index.php?page=retrieve_password\" method=\"post\">
			<input type=\"text\" name=\"acc\" size=\"40\" /><br />
			adresse mail: <br />
			<input type=\"text\" name=\"mail\" size=\"60\" /><br />
			<input type=\"submit\" value=\"envoyer\" /></form> ";
			
		}
		elseif($_GET['page'] == 'disconnect')
		{
			if(session_destroy())
				{
					$pagecontent = "<p class=\"INFORMATION\">D&eacute;connect&eacute; avec succ&egrave;s !</p>";
					setcookie("account", "NULL;NULL", time()-3600);
					header('location:index.php');
				}
				else
				{
					$pagecontent = "<p class=\"WARN\">erreur lors de la d&eacute;connexion</p>";
				}
				$basepos = "D&eacute;connexion";
				$absolutpos = "Erreur inconnue";
				$pagetitle = "d&eacute;connexion";
		}
		elseif($_GET['page'] == 'seeprof' && $_SESSION['secure_level'] >= 4)
		{
			$varloc = !empty($_POST['id']) ? $_POST['id'] : $_SESSION['UID'];
			$varloc = !empty($_GET['sp']) ? $_GET['sp'] : $varloc;
			$varlocb = is_numeric($varloc) ? 'id='.$varloc : 'pseudo=\''.$varloc.'\'';
			$req0 = mysql_num_rows(mysql_query('SELECT * FROM ts3s_members WHERE '.$varlocb.' LIMIT 0,1')) == 1 ? true : false;
			$reqa = $req0 == true ? 'SELECT * FROM ts3s_members WHERE '.$varlocb.' LIMIT 0,1' : 'SELECT * FROM ts3s_members WHERE id='.$_SESSION['UID'].' LIMIT 0,1';
			$sp = mysql_fetch_array(mysql_query($reqa));
			$pagecontent = "
			<div align=\"center\">Entrez l'ID ou NOM DE COMPTE:<br />
			<form action=\"index.php?page=seeprof\" method=\"post\"><input type=\"text\" size=\"15\" maxlength=\"55\" name=\"id\" /><input type=\"submit\" value=\"check !\" /></form><br />
			<b>Date d'inscription:</b> ".$sp['dcrea']."<br />ACC_ID::".$sp['id']."<br /><a href=\"index.php?page=acc_list&amp;task=scl&amp;uid=".$sp['id']."\">(DE)BANNIR L'UTILISATEUR</a>
			</div>
			<div id=\"profil\">
				<div id=\"profil_avatar\"><img src=\"".$sp['avatar']."\" width=\"140\" height=\"140\" /></div>
				<div id=\"profil_first\">".$sp['pseudo']." <img src=\"images/".$sp['sexe'].".gif\" alt=\"\" /></div><br />
				<div id=\"profil_others\">".$sp['display_name']."</div><br />
				<div id=\"profil_others\">".substr($sp['mail'], 0, 24)." <acronyme title=\"Les mails trop longs sont cach&eacute;s afin d'&eacute;viter des erreurs graphiques.\"><font color=\"orange\" size=\"-2\">[?]</font></acronym></div><br />
				<div id=\"profil_others\">".GetRank($sp['secure_level' ])."</div><br />
				<div id=\"profil_others\"><a href=\"http://www.localiser-ip.com/?ip=".$sp['ip_insc']."\">".$sp['ip_insc']."</a></div><br />
				<div id=\"profil_others\"><a href=\"http://www.localiser-ip.com/?ip=".$sp['ip_actual']."\">".$sp['ip_actual']."</a></div><br />
				<div id=\"profil_others\">".$sp['birthdate']."</div><br />
			</div>
			";	
		}
		// ZONE ENVOI MAIL VALIDATION SERVEUR //
		
		elseif($_GET['page'] == 'validate' && $_GET['rqid'] != NULL && $_GET['uid'] != NULL && $_SESSION['secure_level'] >= 8)
		{
				$rq = mysql_fetch_array(mysql_query('SELECT * FROM ts3s_reqs WHERE id =\''.$_GET['rqid'].'\''));
				$membre = mysql_fetch_array(mysql_query('SELECT * FROM ts3s_members WHERE id =\''.$_GET['uid'].'\''));
				
				$lip = mysql_fetch_array(mysql_query('SELECT sport FROM ts3s_servers ORDER BY sport DESC LIMIT 0, 1'));
				$lastip = $lip['sport'];
				
				
				// ******
						$jour = date('d');
						$mois = date('m');
						$annee = date('Y');
					
					
						if($jour == "30" || $jour == "31" || $jour == "29")
						{
							$jour2 = "28";
							if($mois == "12")
							{
							$moaaas2 = "01";
							$annee2 = date("Y")+1;
							}
							else
							{
							$moaaas2 = date("m")+1;
							$annee2 = $annee;
							}
						}
						elseif($jour == "01")
						{
							$jour2 = "02";
							if($mois == "12")
							{
							$moaaas2 = "01";
							$annee2 = date("Y")+1;
							}
							else
							{
							$moaaas2 = date("m")+1;
							$annee2 = $annee;
							}
						}
						else
						{
							$jour2 = date("d");
							if($mois == "12")
							{
							$moaaas2 = "01";
							$annee2 = date("Y")+1;
							}
							else
							{
							$moaaas2 = date("m")+1;
							$annee2 = $annee;
							}
							
								if($moaaas2 == 1)
								{
								$moaaas2 = "01";
								}
								elseif($moaaas2 == 2)
								{
								$moaaas2 = "02";
								}
								elseif($moaaas2 == 3)
								{
								$moaaas2 = "03";
								}
								elseif($moaaas2 == 4)
								{
								$moaaas2 = "04";
								}
								elseif($moaaas2 == 5)
								{
								$moaaas2 = "05";
								}
								elseif($moaaas2 == 6)
								{
								$moaaas2 = "06";
								}
								elseif($moaaas2 == 7)
								{
								$moaaas2 = "07";
								}
								elseif($moaaas2 == 8)
								{
								$moaaas2 = "08";
								}
								elseif($moaaas2 == 9)
								{
								$moaaas2 = "09";
								}
								else
								{
								$moaaas2 = $moaaas2;
								}
						}
						
					$cdate = $jour."/".$mois."/".$annee;
					$fdate = $jour2."/".$moaaas2."/".$annee2;
					
					
			if(isset($_POST['uid']) && isset($_POST['status']) && isset($_POST['persomsg']))
			{
				
				
				
				if($_POST['status'] == accepter && !empty($_POST['serveur']) && !empty($_POST['port']) && !empty($_POST['cle']) && !empty($_POST['sid']))
				{
				
					$serveur = explode("_", $_POST['serveur']);
					switch($serveur['0']){case "aenoa": $ip = "188.165.195.82"; break; case "ikoula": $ip = "178.170.124.52"; break; default: $ip = "aenoa.net"; break;}
					$mid = $serveur['1'];
					if(mysql_query("UPDATE ts3s_reqs SET status='accepter' WHERE id='".$_POST['rqid']."'"))
					{
						
						
						if	(
								mysql_query(
									"INSERT INTO ts3s_servers 
									(SID, mid, sport, sslots, sip, pkey, uid, cdate, fdate, is_active) VALUES
									(
									'".stripslashes($_POST['sid'])."',
									'".stripslashes($mid)."',
									'".stripslashes($_POST['port'])."',
									'50',
									'".stripslashes($ip)."',
									'".stripslashes($_POST['cle'])."',
									'".stripslashes($_POST['uid'])."',
									'".stripslashes($cdate)."',
									'".stripslashes($fdate)."',
									'1'
									)
									"
								)
								
							)
						{
							$pagecontent = "demande accept&eacute;e.";
						}
						else
						{
							$pagecontent = mysql_error()."<br /><br />".$cdate." ".$fdate;
						}
					}
					else
					{
					 	$pagecontent = "erreur de changement de status request + serveur.";
					}
					$mail =
					"<html><head><title>Mail de TS3S</title></head><body>
					E-mail illisible ? Rendez-vous sur votre compte TS3S dans la section \"Mon Serveur\" pour retrouver vos informations de serveur.
					\n<br />
					<img src=\"http://ts3s.org/images/mail_server.png\" alt=\"image_ts3s_server\" /><br /><br />Bonjour,<br />
					<br />
					Nous vous informons que votre demande de serveur Teamspeak 3 a &eacute;t&eacute; 
					accept&eacute;e par un administrateur ! Voici vos informations de serveur, que vous 
					retrouverez sur le site, section \"mon serveur\".<br />
					<br />
					N'oubliez pas que vous devez le renouveler chaque mois, afin qu'il ne
					soit pas supprim&eacute;. Un simple clic suffit &agrave; le relancer ;) Ceci est faisable
					dans la section \"mon serveur\" du site. Toutefois, si votre serveur n'est pas &eacute;dit&eacute; dans les 
					3 jours apr&egrave;s sa cr&eacute;ation, il sera l&eacute;gu&eacute; au prochain client.<br />
					<font color=\"red\"><b><u>RAPPEL:</u></b><br /> Pensez a revalider votre serveur AVANT la date fix&eacute;e sur 
					le site web. Sinon, il sera automatiquement supprim&eacute;.
					<br />L'emploi d'un de nos TS pour une action totalement ill&eacute;gale ou
					commerciale est interdite.<br />
					si nous recevons une plainte contre votre serveur TS, il sera ferm&eacute;
					apr&egrave;s v&eacute;rification de son ill&eacute;galit&eacute;.<br />
					<br />Si vous avez une question ou que vous avez besoin d'aide, pour quoi que ce soit, vous pouvez vous connecter &agrave;
					notre Teamspeak de support: 188.165.195.82</font>
					<br />
					<b>---- Votre serveur</b> :<br />
					<b>IP</b>: ".$ip." (serveur #".$mid.")<br />
					<b>PORT</b>: ".$_POST['port']."<br />
					<b>PASSWORD</b>: Aucun (Nous conseillons d'en mettre un)<br />
					<b>Cl&eacute; privil&egrave;ge</b>: ".$_POST['cle']."<br />
					<br />
					<font color=\"red\"><b><u>INFORMATIONS:</u></b><br />Si vous n'avez plus besoin de votre serveur teamspeak 3, contactez l'administrateur via <a href=\"http://www.ts3s.org/index.php?page=contact\">ce formulaire</a> en pr&eacute;cisant votre nom de compte, et port de serveur.
					</font>
					<br />
					<br />
					Cordialement,<br />
					<br />
					TS3SdotORG - Fournisseur de serveurs TeamSpeak 3 gratuit<br />
					<a href=\"http://www.ts3s.org/\">http://www.ts3s.org/</a></body></head>
					";
					
					
					mail($membre['mail'], "TS3S : Etat de votre demande de serveur", $mail, $headers.$headers_bcc);
				}
				elseif($_POST['status'] == 'refuser' && isset($_POST['response']))
				{
					mysql_query('UPDATE ts3s_reqs SET status=\'refuser\' WHERE id=\''.$_POST['rqid'].'\'');
					$pagecontent = "demande refus&eacute;e.";
					// TEXTE CHOIX
					switch ($_POST['response'])
					{
						case 1:
						$message = 	"Votre serveur / compte ne respecte pas nos CGU, et votre requ&ecirc;te a 
									&eacute;t&eacute; refus&eacute;e.<br /><br />
									Nous vous invitons &agrave; consulter consulter les CGU de TS3S afin de 
									savoir ce que vous avez enfreint.";
						break;

						case 2:
						$message = 	"Votre serveur / compte est bas&eacute; sur une activit&eacute; ill&eacute;gale 
									en Belgique ou dans l'ensemble du monde.<br /><br />Nous avons donc d&eacute;cid&eacute; 
									de refuser votre demande.";
						break;
						
						case 3:
						$message = 	"Votre serveur / compte est bas&eacute; sur une activit&eacute; commerciale, 
									et notre licence NPL nous interdit de faire cela.
									<br /><br />Nous avons donc d&eacute;cid&eacute; 
									de refuser votre demande.";
						break;
						
						case 4:
						$message = 	nl2br($_POST['persomsg']);
						break;
					}
					
					$mail =
					"
					<html><head><title>Mail de TS3S</title></head><body>
					Bonjour,<br />
					<br />
					Nous vous informons que votre demande de serveur Teamspeak 3 a &eacute;t&eacute; 
					refus&eacute;e par un administrateur. Il a d&eacute;sir&eacute; vous laisser ce 
					message: <br />
					<i>".$message."</i>
					<br />
					<br />
					Si vous consid&eacute;rez que ce n'est pas en contradiction avec l'objectif de TS3S ainsi que 
					de ses conditions d'utilisations, n'h&eacute;sitez pas &agrave; nous expliquer pourquoi &agrave; 
					l'adresse <a href=\"mailto:postmaster@ts3s.org\">postmaster@ts3s.org</a>.
					<br />
					<br />
					Cordialement,
					<br />
					-- <br />
					TS3SdotORG - Fournisseur de serveurs TeamSpeak 3 gratuit<br />
					<a href=\"http://www.ts3s.org/\">http://www.ts3s.org/</a></body></html>
					";
					
					mail($membre['mail'], "TS3S : Etat de votre demande de serveur", $mail, $headers.$headers_bcc);
					
				}
				else
				{
					$pagecontent = 	"?";
				}
				
			}
			else
			{
			$stat = $rq['c4'] == null ? "off" : $rq['c4'];
				$pagecontent = 	"<b>rappel des faits</b>: <br />l'utilisateur <b>".$membre['pseudo']."</b>, 
					au nom du clan / guilde <b>".str_replace(array('<', '>'), array('&lt;', '&gt;'), $rq['c1'])."</b> d&eacute;sire un <b>".$rq['type']."</b>
					sur le jeu <b>".$rq['c2']."</b>.
					<br />L'utilisateur a d&eacute;fini l'acceptation des serveurs Hosting en <b>".$stat."</b>.
					<br />Voici comment il nous a connu:<br />
					<i>".str_replace(array('<', '>'), array('&lt;', '&gt;'), $rq['c3'])."</i><br /><br />
					";
				$pagecontent.= "<form action=\"index.php?page=validate&rqid=".$_GET['rqid']."&uid=".$_GET['uid']."\" method=\"post\">
<br /><p>changer le status: 
<select name=\"status\">
	<option value=\"accepter\" selected=\"selected\">valider la demande</option>
	<option value=\"refuser\">refuser la demande</option>
</select>
</p>
<p>
Raison du refus (dans le cas &eacute;ch&eacute;ant) <select name=\"response\">
	<option value=\"1\" selected=\"selected\">Non respect</option>
	<option value=\"2\">Contenu ill&eacute;gal</option>
	<option value=\"3\">Utilisation commerciale</option>
	<option value=\"4\">Personnalis&eacute;</option>
</select>
<br />uid: 

<input type=\"text\" name=\"xwxwx\" size=\"10\" maxlength=\"5\" value=\"".$_GET['uid']."\" disabled=\"disabled\" /> / 
rqid: <input type=\"text\" name=\"aaze\" size=\"10\" maxlength=\"5\" value=\"".$_GET['rqid']."\" disabled=\"disabled\" /></p>


<input type=\"hidden\" name=\"uid\" size=\"10\" maxlength=\"5\" value=\"".$_GET['uid']."\" />
<input type=\"hidden\" name=\"rqid\" size=\"10\" maxlength=\"5\" value=\"".$_GET['rqid']."\" />
<p>Adresse ip:<br /> 
  <select name=\"serveur\">
  	<option value=\"aenoa_0\">188.165.195.82 // AENOA #0</option>
	<option value=\"aenoa_2\">188.165.195.82 // AENOA #2</option>
	<option value=\"aenoa_4\">188.165.195.82 // AENOA #4</option>
	<option value=\"aenoa_5\">188.165.195.82 // AENOA #5</option>
	<option value=\"aenoa_6\">188.165.195.82 // AENOA #6</option>
	<option value=\"aenoa_7\">188.165.195.82 // AENOA #7</option>
	<option value=\"aenoa_8\" selected=\"selected\">188.165.195.82 // AENOA #8</option>
  </select>
</p>
<p>port :<br />
  <input type=\"text\" name=\"port\" size=\"10\" maxlength=\"5\" />
</p>
<p>ID serveur / clé privilèges:<br />
<input type=\"text\" name=\"sid\" size=\"4\" maxlength=\"3\" /> / <input type=\"text\" name=\"cle\" size=\"53\" maxlength=\"255\" />
</p>
<p>Message personnel:<br />
  <textarea name=\"persomsg\" cols=\"50\" rows=\"12\"></textarea>
</p>
<input type=\"submit\" />
</form>";
			}
			$pagetitle = "validation de serveur";
		}
		// **********************************  //
		elseif($_GET['page'] == 'acc_create')
		{
			
			if($_POST['sended'] == "1")
			{
					if (!$resp->is_valid)
					{
						$pagecontent = "Le code recaptcha est incorrect:" . $resp->error . "<br />";
					} 
					else 
					{
										$compte = strtoupper($_POST['acc']);
										$dn = htmlspecialchars($_POST['DN']);
										$prepasswd = $_POST['p1'];
										$repasswd = $_POST['p2'];
										$passwordf = sha1($prepasswd);
										$premailer = strtoupper($_POST['m1']);
										$remailer = strtoupper($_POST['m2']);
										$naissance = strtoupper($_POST['jour']."-".$_POST['month']."-".$_POST['year']);
										$sexe = strtoupper($_POST['sx']);
										$dcrea = date('d/m/Y H:i');
										$ip = $_SERVER['REMOTE_ADDR'];
											
											if(isset($_POST['acc']) 
											&& isset($_POST['p1']) 
											&& isset($_POST['DN'])
											&& isset($_POST['p2']) 
											&& isset($_POST['m1']) 
											&& isset($_POST['m2']) 
											&& isset($_POST['jour']) 
											&& isset($_POST['month'])
											&& isset($_POST['year'])
											&& isset($_POST['sx']))
									{
										if($prepasswd == $repasswd)
										{
													if($premailer == $remailer)
													{
																$query = mysql_query("SELECT * FROM ts3s_members WHERE pseudo 
																LIKE '".$compte."' ORDER BY id DESC");
																$query2 = mysql_query("SELECT * FROM ts3s_members WHERE mail 
																LIKE '".$premailer."' ORDER BY id DESC");
																$query3 = mysql_query("SELECT * FROM ts3s_members WHERE display_name 
																LIKE '".$dn."' ORDER BY id DESC");
																$REQ = mysql_num_rows($query);
																$REQ2 = mysql_num_rows($query2);
																$REQ3 = mysql_num_rows($query3);
														if($REQ == 0 && $REQ2 == 0 && $REQ3 == 0)
														{
																		$pagecontent = "...";
																		if(mysql_query(
																		"INSERT INTO ts3s_members VALUES 
																		('', 
																		'".$compte."',
																		'".$dn."', 
																		'http://www.ts3s.org/images/av_0.png',
																		'".$passwordf."',
																		'1',
																		'".$premailer."', 
																		'".$ip."', 
																		'', 
																		'".$sexe."',
																		'".$naissance."',
																		'".$dcrea."'
																		)
																		"
																		))
																	{
																		if(mail($sendtome, "TS3S: ajout de votre compte ".$compte, $acc_add, $headers))
																		{
																			$pagecontent = "<p class=\"INFORMATION\">Le compte a &eacute;t&eacute; cr&eacute;er 
																			avec succ&egrave;s !
																			<br /><br />Vous pouvez maintenant vous 
																			<a href=\"index.php?page=login\">connecter</a> avec vos 
																			identifiants !</p>";
																		}
																		else
																		{
																			$pagecontent = "<p class=\"INFORMATION\"><br />Compte cr&eacute;er, mais le mail n'a pas pu 
																			&ecirc;tre envoy&eacute;.<br /></p><br /><br /><br />";
																			$pagecontent.= 	"<form method=\"post\" action=\"index.php?page=acc_create\">
														Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
														Mot de passe:<br />
														<input type=\"password\" name=\"p1\" size=\"32\" /><br />
														Mot de passe (bis):<br />
														<input type=\"password\" autocomplete=\"off\"  name=\"p2\" size=\"32\" /><br />
														Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
														<br />Sexe:
														<input type=\"radio\" name=\"sx\" value=\"M\"  /> Homme
														<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
														<input type= \"hidden\" name=\"sended\" value=\"1\" />
														";
										$pagecontent.= 	recaptcha_get_html($publickey);
										$pagecontent.= 	"
														<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
														J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
														d'utilisation</a> de TS3S.ORG.<br />
														<input type=\"submit\" value=\"S'inscrire\" name=\"validation\" disabled />
														<input type=\"reset\" value=\"Recommencer\" />
														</form>";                                                
										$basepos = "Compte";
										$absolutpos = "Cr&eacute;er un compte";
										$pagetitle = "Cr&eacute;er un compte";
										$header_bonus = 	"<script type=\"text/javascript\">
															function ChangeStatut(formulaire) {
															if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
															if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
															}
															</script> ";
																		}
																	}
																	else
																	{
																	 $pagecontent = "<p class=\"INFORMATION\">erreur lors de l'&eacute;criture dans la Base de donn&eacute;e.
																	 Veuillez contacter un administrateur &agrave; l'adresse 
																	 postmaster [AT] ts3s [dot] org.</p>";
																	 $pagecontent.= 	"<form method=\"post\" action=\"index.php?page=acc_create\">
														Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
														Mot de passe:<br />
														<input type=\"password\" name=\"p1\" size=\"32\" /><br />
														Mot de passe (bis):<br />
														<input type=\"password\" autocomplete=\"off\"  name=\"p2\" size=\"32\" /><br />
														Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
														<br />Sexe:
														<input type=\"radio\" name=\"sx\" value=\"M\"  /> Homme
														<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
														<input type= \"hidden\" name=\"sended\" value=\"1\" />
														";
										$pagecontent.= 	recaptcha_get_html($publickey);
										$pagecontent.= 	"
														<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
														J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
														d'utilisation</a> de TS3S.ORG.<br />
														<input type=\"submit\" value=\"S'inscrire\" name=\"validation\" disabled />
														<input type=\"reset\" value=\"Recommencer\" />
														</form>";                                                
										$basepos = "Compte";
										$absolutpos = "Cr&eacute;er un compte";
										$pagetitle = "Cr&eacute;er un compte";
										$header_bonus = 	"<script type=\"text/javascript\">
															function ChangeStatut(formulaire) {
															if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }

															if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
															}
															</script> ";
																	
																	}
														}
														else
														{
															$pagecontent = "L'adresse email ET/OU le pseudonyme (nom de compte &amp; nom d'affichage) est d&eacute;j&agrave; utilis&eacute; par un autre membre. Veuillez en entrer un diff&eacute;rent.";
															$pagecontent.= 	"<form method=\"post\" action=\"index.php?page=acc_create\">
														Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
														Mot de passe:<br />
														<input type=\"password\" name=\"p1\" size=\"32\" /><br />
														Mot de passe (bis):<br />
														<input type=\"password\" autocomplete=\"off\"  name=\"p2\" size=\"32\" /><br />
														Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
														<br />Sexe:
														<input type=\"radio\" name=\"sx\" value=\"M\"  /> Homme
														<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
														<input type= \"hidden\" name=\"sended\" value=\"1\" />
														";
										$pagecontent.= 	recaptcha_get_html($publickey);
										$pagecontent.= 	"
														<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
														J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
														d'utilisation</a> de TS3S.ORG.<br />
														<input type=\"submit\" value=\"S'inscrire\" name=\"validation\" disabled />
														<input type=\"reset\" value=\"Recommencer\" />
														</form>";                                                
										$basepos = "Compte";
										$absolutpos = "Cr&eacute;er un compte";
										$pagetitle = "Cr&eacute;er un compte";
										$header_bonus = 	"<script type=\"text/javascript\">
															function ChangeStatut(formulaire) {
															if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
															if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
															}
															</script> ";
														}
													}	
													else
													{
															$pagecontent = "L'adresse mail est diff&eacute;rente.";
															$pagecontent.= 	"<form method=\"post\" action=\"index.php?page=acc_create\">
														Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
														Mot de passe:<br />
														<input type=\"password\" name=\"p1\" size=\"32\" /><br />
														Mot de passe (bis):<br />
														<input type=\"password\" autocomplete=\"off\"  name=\"p2\" size=\"32\" /><br />
														Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
														<br />Sexe:
														<input type=\"radio\" name=\"sx\" value=\"M\"  /> Homme
														<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
														<input type= \"hidden\" name=\"sended\" value=\"1\" />
														";
										$pagecontent.= 	recaptcha_get_html($publickey);
										$pagecontent.= 	"
														<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
														J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
														d'utilisation</a> de TS3S.ORG.<br />
														<input type=\"submit\" value=\"S'inscrire\" name=\"validation\" disabled />
														<input type=\"reset\" value=\"Recommencer\" />
														</form>";                                                
										$basepos = "Compte";
										$absolutpos = "Cr&eacute;er un compte";
										$pagetitle = "Cr&eacute;er un compte";
										$header_bonus = 	"<script type=\"text/javascript\">
															function ChangeStatut(formulaire) {
															if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
															if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
															}
															</script> ";
													}
										}
										else
										{
														$pagecontent = "Mots de passes diff&eacute;rents.";
														$pagecontent.= 	"<form method=\"post\" action=\"index.php?page=acc_create\">
														Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
														Mot de passe:<br />
														<input type=\"password\" name=\"p1\" size=\"32\" /><br />
														Mot de passe (bis):<br />
														<input type=\"password\" autocomplete=\"off\"  name=\"p2\" size=\"32\" /><br />
														Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
														<br />Sexe:
														<input type=\"radio\" name=\"sx\" value=\"M\"  /> Homme
														<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
														<input type= \"hidden\" name=\"sended\" value=\"1\" />
														";
										$pagecontent.= 	recaptcha_get_html($publickey);
										$pagecontent.= 	"
														<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
														J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
														d'utilisation</a> de TS3S.ORG.<br />
														<input type=\"submit\" value=\"S'inscrire\" name=\"validation\" disabled />
														<input type=\"reset\" value=\"Recommencer\" />
														</form>";                                                
										$basepos = "Compte";
										$absolutpos = "Cr&eacute;er un compte";
										$pagetitle = "Cr&eacute;er un compte";
										$header_bonus = 	"<script type=\"text/javascript\">
															function ChangeStatut(formulaire) {
															if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
															if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
															}
															</script> ";
										}
									}
									else
									{
										$pagecontent = "<p class=\"WARN\">Veuillez renseigner tout les champs.</p><br />";
										$pagecontent.= 	"<form method=\"post\" action=\"index.php?page=acc_create\">
														Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
														Mot de passe:<br />
														<input type=\"password\" name=\"p1\" size=\"32\" /><br />
														Mot de passe (bis):<br />
														<input type=\"password\" autocomplete=\"off\"  name=\"p2\" size=\"32\" /><br />
														Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
														<br />Sexe:
														<input type=\"radio\" name=\"sx\" value=\"M\"  /> Homme
														<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
														<input type= \"hidden\" name=\"sended\" value=\"1\" />
														";
										$pagecontent.= 	recaptcha_get_html($publickey);
										$pagecontent.= 	"
														<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
														J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
														d'utilisation</a> de TS3S.ORG.<br />
														<input type=\"submit\" value=\"S'inscrire\" name=\"validation\" disabled />
														<input type=\"reset\" value=\"Recommencer\" />
														</form>";                                                
										$basepos = "Compte";
										$absolutpos = "Cr&eacute;er un compte";
										$pagetitle = "Cr&eacute;er un compte";
										$header_bonus = 	"<script type=\"text/javascript\">
															function ChangeStatut(formulaire) {
															if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
															if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
															}
															</script>";
									}
					}
			}
			else
			{
				if($_SESSION['secure_level'] >= 1 && $_SESSION['secure_level'] <= 9)
			{
			header('Location:index.php?page=profil');
			}
			else
			{
			$pagecontent = 	"<form method=\"post\" action=\"index.php?page=acc_create\">
								Nom de compte (pour la connexion):<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"acc\" maxlength=\"23\" size=\"32\" /><br />
								Nom d'affichage:<br />
								<input type=\"text\" autocomplete=\"off\"  name=\"DN\" maxlength=\"23\" size=\"32\" /><br />
								Adresse mail:<br />
								<input type=\"text\" name=\"m1\" size=\"60\" maxlength=\"55\" /><br />
								Adresse mail (bis):<br />
								<input type=\"text\" name=\"m2\" size=\"60\" maxlength=\"55\" /><br />
								Mot de passe:<br />
								<input type=\"password\" name=\"p1\" size=\"32\" /><br />
								Mot de passe (bis):<br />
								<input type=\"password\" name=\"p2\" size=\"32\" /><br />
								Date de naissance:<br />
														<select name=\"jour\">
  <option value=\"01\">1</option>
  <option value=\"02\">2</option>
  <option value=\"03\">3</option>
  <option value=\"04\">4</option>
  <option value=\"05\">5</option>
  <option value=\"06\">6</option>
  <option value=\"07\">7</option>
  <option value=\"08\">8</option>
  <option value=\"09\">9</option>
  <option value=\"10\">10</option>
  <option value=\"11\">11</option>
  <option value=\"12\">12</option>
  <option value=\"13\">13</option>
  <option value=\"14\">14</option>
  <option value=\"15\">15</option>
  <option value=\"16\">16</option>
  <option value=\"17\">17</option>
  <option value=\"18\">18</option>
  <option value=\"19\">19</option>
  <option value=\"20\">20</option>
  <option value=\"21\">21</option>
  <option value=\"22\">22</option>
  <option value=\"23\">23</option>
  <option value=\"24\">24</option>
  <option value=\"25\">25</option>
  <option value=\"26\">26</option>
  <option value=\"27\">27</option>
  <option value=\"28\">28</option>
  <option value=\"29\">29</option>
  <option value=\"30\">30</option>
  <option value=\"31\">31</option>
</select> <select name=\"month\">
  <option value=\"01\">Janvier</option>
  <option value=\"02\">F&eacute;vrier</option>
  <option value=\"03\">Mars</option>
  <option value=\"04\">Avril</option>
  <option value=\"05\">Mai</option>
  <option value=\"06\">Juin</option>
  <option value=\"07\">Juillet</option>
  <option value=\"08\">Ao&ucirc;t</option>
  <option value=\"09\">Septembre</option>
  <option value=\"10\">Octobre</option>
  <option value=\"11\">Novembre</option>
  <option value=\"12\">D&eacute;cembre</option>
</select> <select name=\"year\">
  <option value=\"2011\">2011</option>
<option value=\"2010\">2010</option>
  <option value=\"2009\">2009</option>
  <option value=\"2008\">2008</option>
  <option value=\"2007\">2007</option>
  <option value=\"2006\">2006</option>
  <option value=\"2005\">2005</option>
  <option value=\"2004\">2004</option>
  <option value=\"2003\">2003</option>
  <option value=\"2002\">2002</option>
  <option value=\"2001\">2001</option>
  <option value=\"2000\">2000</option>
  <option value=\"1999\">1999</option>
  <option value=\"1998\">1998</option>
  <option value=\"1997\">1997</option>
  <option value=\"1996\">1996</option>
  <option value=\"1995\">1995</option>
  <option value=\"1994\">1994</option>
  <option value=\"1993\">1993</option>
  <option value=\"1992\">1992</option>
  <option value=\"1991\">1991</option>
  <option value=\"1990\">1990</option>
  <option value=\"1989\">1989</option>
  <option value=\"1988\">1988</option>
  <option value=\"1987\">1987</option>
  <option value=\"1986\">1986</option>
  <option value=\"1985\">1985</option>
  <option value=\"1984\">1984</option>
  <option value=\"1983\">1983</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1982\">1982</option>
  <option value=\"1981\">1981</option>
  <option value=\"1980\">1980</option>
  <option value=\"1979\">1979</option>
  <option value=\"1978\">1978</option>
  <option value=\"1977\">1977</option>
  <option value=\"1976\">1976</option>
  <option value=\"1975\">1975</option>
  <option value=\"1974\">1974</option>
  <option value=\"1973\">1973</option>
  <option value=\"1972\">1972</option>
  <option value=\"1971\">1971</option>
  <option value=\"1970\">1970</option>
  <option value=\"1969\">1969</option>
  <option value=\"1968\">1968</option>
  <option value=\"1967\">1967</option>
  <option value=\"1966\">1966</option>
  <option value=\"1965\">1965</option>
  <option value=\"1964\">1964</option>
  <option value=\"1963\">1963</option>
  <option value=\"1962\">1962</option>
  <option value=\"1961\">1961</option>
  <option value=\"1960\">1960</option>
  <option value=\"1959\">1959</option>
  <option value=\"1958\">1958</option>
  <option value=\"1957\">1957</option>
  <option value=\"1956\">1956</option>
  <option value=\"1955\">1955</option>
  <option value=\"1954\">1954</option>
  <option value=\"1953\">1953</option>
  <option value=\"1952\">1952</option>
  <option value=\"1951\">1951</option>
  <option value=\"1950\">1950</option>
  <option value=\"1949\">1949</option>
  <option value=\"1948\">1948</option>
  <option value=\"1947\">1947</option>
  <option value=\"1946\">1946</option>
  <option value=\"1945\">1945</option>
  <option value=\"1944\">1944</option>
  <option value=\"1943\">1943</option>
  <option value=\"1942\">1942</option>
  <option value=\"1941\">1941</option>
  <option value=\"1940\">1940</option>
  <option value=\"1939\">1939</option>
  <option value=\"1938\">1938</option>
  <option value=\"1937\">1937</option>
  <option value=\"1936\">1936</option>
  <option value=\"1935\">1935</option>
  <option value=\"1934\">1934</option>
  <option value=\"1933\">1933</option>
  <option value=\"1932\">1932</option>
  <option value=\"1931\">1931</option>
  <option value=\"1930\">1930</option>
  <option value=\"1929\">1929</option>
  <option value=\"1928\">1928</option>
  <option value=\"1927\">1927</option>
  <option value=\"1926\">1926</option>
  <option value=\"1925\">1925</option>
  <option value=\"1924\">1924</option>
  <option value=\"1923\">1923</option>
  <option value=\"1922\">1922</option>
  <option value=\"1921\">1921</option>
  <option value=\"1920\">1920</option>
  <option value=\"1919\">1919</option>
  <option value=\"1918\">1918</option>
  <option value=\"1917\">1917</option>
  <option value=\"1916\">1916</option>
  <option value=\"1915\">1915</option>
  <option value=\"1914\">1914</option>
  <option value=\"1913\">1913</option>
  <option value=\"1912\">1912</option>
  <option value=\"1911\">1911</option>
  <option value=\"1910\">1910</option>
  <option value=\"1909\">1909</option>
  <option value=\"1908\">1908</option>
  <option value=\"1907\">1907</option>
  <option value=\"1906\">1906</option>
  <option value=\"1905\">1905</option>
  <option value=\"1904\">1904</option>
  <option value=\"1903\">1903</option>
  <option value=\"1902\">1902</option>
  <option value=\"1901\">1901</option>
  <option value=\"1900\">1900</option>
</select>
								<br />Sexe:
								<input type=\"radio\" name=\"sx\" value=\"M\" /> Homme
								<input type=\"radio\" name=\"sx\" value=\"F\" /> Femme <br />
								<input type= \"hidden\" name=\"sended\" value=\"1\" />
								";
								$pagecontent.= recaptcha_get_html($publickey);
				$pagecontent.= 	"
								<input type=\"checkbox\" name=\"regagree\" value=\"0\" onClick=\"ChangeStatut(this.form)\" /> 
								J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
								d'utilisation</a> de TS3S.ORG.<br /><input type=\"submit\" name=\"validation\" value=\"S'inscrire\" disabled />
								<input type=\"reset\" value=\"Recommencer\" />
								</form>";                                                
				$basepos = "Compte";
				$absolutpos = "Cr&eacute;er un compte";
				$pagetitle = "Cr&eacute;er un compte";
				$header_bonus = "<script type=\"text/javascript\">
function ChangeStatut(formulaire) {
if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
}</script> ";
			}}
			 
			$basepos = "Compte";
			$absolutpos = "Cr&eacute;er un compte";
			$pagetitle = "Cr&eacute;er un compte";
		}
	
		elseif($_GET['page'] == 'profil')
		{
			if($_SESSION['secure_level'] < 1)
			{
			header('Location:index.php?page=denied');
			}
			else
			{
			$pagecontent = "
			
			<div id=\"profil\">
				<div id=\"profil_avatar\"><img src=\"".$_SESSION['avatar']."\" width=\"140\" height=\"140\" /></div>
				<div id=\"profil_first\">".$_SESSION['pseudo']." <img src=\"images/".$_SESSION['sexe'].".gif\" alt=\"\" /></div><br />
				<div id=\"profil_others\">".$_SESSION['DN']."</div><br />
				<div id=\"profil_others\">".substr($_SESSION['mail'], 0, 24)." <acronyme title=\"Les mails trop longs sont cach&eacute;s afin d'&eacute;viter des erreurs graphiques.\"><font color=\"orange\" size=\"-2\">[?]</font></acronym></div><br />
				<div id=\"profil_others\">".GetRank($_SESSION['secure_level'])."</div><br />
				<div id=\"profil_others\">".$_SESSION['ip_insc']."</div><br />
				<div id=\"profil_others\">".$_SESSION['ip_actual']."</div><br />
				<div id=\"profil_others\">".$_SESSION['birthdate']."</div><br />
			</div>
			";
			
			
			
			$basepos = "Compte";
			$absolutpos = "Consulter mon profil";
			$pagetitle = "Mon profil";
			}
		}
		elseif($_GET['page'] == 'webinfo')
		{
			// REQUETES
			$bans = mysql_num_rows(mysql_query("SELECT id FROM ts3s_bans"));
			$membres = mysql_num_rows(mysql_query("SELECT id FROM ts3s_members"));
			$serveurs = mysql_num_rows(mysql_query("SELECT sid FROM ts3s_servers"));
			$reqs = mysql_num_rows(mysql_query("SELECT id FROM ts3s_reqs"));
			$reqs2 = mysql_num_rows(mysql_query("SELECT id FROM ts3s_reqs WHERE status='en cours'"));
			$news = mysql_num_rows(mysql_query("SELECT id FROM ts3s_news"));
			$ban= mysql_num_rows(mysql_query("SELECT id FROM ts3s_members WHERE secure_level=0"));
			$admins = mysql_num_rows(mysql_query("SELECT id FROM ts3s_members WHERE secure_level >= '4'"));
			
			// SCRIPT AFFICHAGE
			$pagecontent = 
						"<h2>Statistiques de TS3S.ORG</h2>
						<ul>
							<li><b>".$membres."</b> membres inscrits;</li>
							<li><b>".$serveurs."</b> serveurs teamspeak 3 (Actifs et inactifs confondus);</li>
							<li><b>".$reqs."</b> requ&ecirc;tes (dont ".$reqs2." en cours)</li>
							<li><b>".$news."</b> news publi&eacute;es sur le site;</li>
							<li><b>".$admins."</b> administrateurs;</li>
							<li><b>".$bans."</b> adresses IP bannies (bots / Non respect);</li>
							<li><b>".$ban."</b> comptes bannis pour non respect;</li>
						</ul>";
						
			$basepos = "Statistiques";
			$absolutpos = "Consulter les stats";
			$pagetitle = "Statistiques";
			
		}
		elseif($_GET['page'] == 'rqpos')
		{
			if($_SESSION['secure_level'] < 1)
			{
				$pagecontent =  "<h5>Vous devez &ecirc;tre connect&eacute; pour continuer.</h5>";
			}
			elseif($_SESSION['SID'] != 0)
			{
				$pagecontent =  "<h5>Vous avez d&eacute;j&agrave; un serveur actif.</h5>";
			}
			else
			{
				$req = mysql_query("SELECT * FROM ts3s_reqs WHERE uid=".$_SESSION['UID']." LIMIT 0,1");
				$is_requested = mysql_num_rows($req);
				if($is_requested == 0)
				{
					$pagecontent =  "<h2>Vous n'avez pas demand&eacute; de serveur.</h2>";
				}
				else
				{
					$pre_position = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_reqs WHERE uid='".$_SESSION['UID']."'"));
					
					
					if($pre_position['status'] == "en cours")
					{
						$position = mysql_num_rows(mysql_query("SELECT * FROM ts3s_reqs WHERE id < '".$pre_position['id']."' AND status='en cours'"))+1;
						$pagecontent = "<h5>Vous &ecirc;tes <u>".$position."</u>e en file d'attente.</h5>";
					}
					else
					{
						$pagecontent = "<h5>Votre requ&ecirc;te a d&eacute;j&agrave; &eacute;t&eacute; trait&eacute;e</h5>";
					}
					switch ($pre_position['status'])
					{
					case "en cours":
					$stA = "En attente de traitement";
					break;
					case "accepter":
					$stA = "Requ&ecirc;te valid&eacute;e";
					break;
					case "refuser":
					$stA = "Requ&ecirc;te refus&eacute;e";
					break;
					default:
					$stA = "Indefini";
					break;
					}
					$stB = $pre_position['c4'] == "on" ? "accept&eacute;" : "refus&eacute;";
					$pagecontent.=  "
					<b>Rappel de votre requ&ecirc;te:</b><br />
					Votre guilde: <b>".$pre_position['c1']."</b><br />
					Votre jeu: <b>".$pre_position['c2']."</b><br />
					Etat: <b>".$stA."</b><br />
					Comment vous nous avez connu:<br />
					<i>".$pre_position['c3']."</i>
					<br />
					vous avez <b>".$stB."</b> d'&ecirc;tre sur un serveur parrain&eacute;.";
				}
			}
			
			$basepos = "Compte";
			$absolutpos = "Consulter ma position";
			$pagetitle = "Position en file d'attente";
			
		}
		elseif($_GET['page'] == 'server')
		{
			if($_SESSION['secure_level'] < 1){ header("location: index.php?page=denied"); }
			
			if($_SESSION['SID'] == 0)
			{header('Location:index.php?page=commander');
			}
			
			
			else
			{
			
				if($_GET['task'] == update && $_SESSION['IAC'] == 1)
				{	
					if(!empty($_POST['regagree']))
					{
						$ndate = date('d')."/".date('m')."/".date('Y');
						if($_SESSION['MON2'] == 1)
						{
						$_SESSION['MONTH2'] = "01";
						}
						elseif($_SESSION['MON2'] == 2)
						{
						$_SESSION['MONTH2'] = "02";
						}
						elseif($_SESSION['MON2'] == 3)
						{
						$_SESSION['MONTH2'] = "03";
						}
						elseif($_SESSION['MON2'] == 4)
						{
						$_SESSION['MONTH2'] = "04";
						}
						elseif($_SESSION['MON2'] == 5)
						{
						$_SESSION['MONTH2'] = "05";
						}
						elseif($_SESSION['MON2'] == 6)
						{
						$_SESSION['MONTH2'] = "06";
						}
						elseif($_SESSION['MON2'] == 7)
						{
						$_SESSION['MONTH2'] = "07";
						}
						elseif($_SESSION['MON2'] == 8)
						{
						$_SESSION['MONTH2'] = "08";
						}
						elseif($_SESSION['MON2'] == 9)
						{
						$_SESSION['MONTH2'] = "09";
						}
						else
						{
						$_SESSION['MONTH2'] = $_SESSION['MON2'];
						}
						$fudate = $_SESSION['JOU2']."/".$_SESSION['MONTH2']."/".$_SESSION['ANN2'];
						if(
						mysql_query('UPDATE ts3s_servers 
						SET cdate=\''.$ndate.'\', fdate=\''.$fudate.'\'
						WHERE sport=\''.$_SESSION['sport'].'\''))
						{
							$pagecontent = "Votre serveur a &eacute;t&eacute; mis &agrave; jour. <br />il est valid&eacute; du <b>".$ndate."</b> au <b>".$fudate."</b> à midi. Merci d'utiliser TS3S pour votre serveur !<br /><br /><a href=\"index.php?page=server\">Retour a votre serveur</a>";
							$_SESSION['cdate'] = $ndate;
							$_SESSION['fdate'] = $fudate;
							mail("balkeyser@live.fr", "relancement serveur", "Serveur relancer :<br /><br />IP ".$_SESSION['sip']."<br />PORT ".$_SESSION['sport']." <br />Utilisateur: ".$_SESSION['pseudo']."<br />Date: ".date("d-m-Y"), $headers.$headers_bcc);
						}
						else
						{
							$pagecontent = "Erreur lors de la revalidation de votre serveur. Veuillez <a href=\"mailto:postmaster@ts3s.org\">contacter l'administrateur</a>.";
						}
					}
					else
					{
						$jour = date('d');
						$mois = date('m');
						$annee = date('Y');
					
					
						if($jour == "30" || $jour == "31" || $jour == "29")
						{
							$jour2 = "28";
							if($mois == "12")
							{
							$moaaas2 = "01";
							$annee2 = date("Y")+1;
							}
							else
							{
							$moaaas2 = date("m")+1;
							$annee2 = $annee;
							}
						}
						elseif($jour == "01")
						{
							$jour2 = "02";
							if($mois == "12")
							{
							$moaaas2 = "01";
							$annee2 = date("Y")+1;
							}
							else
							{
							$moaaas2 = date("m")+1;
							$annee2 = $annee;
							}
						}
						else
						{
							$jour2 = date("d");
							if($mois == "12")
							{
							$moaaas2 = "01";
							$annee2 = date("Y")+1;
							}
							else
							{
							$moaaas2 = date("m")+1;
							$annee2 = $annee;
							}
							if($moaaas2 == 2 || $moaaas2 === 2 || $moaaas2 == "2" || $moaaas2 === "2")
							{
							$moaaas2 == "02";
							}
							elseif($moaaas2 == 3 || $moaaas2 === 3 || $moaaas2 == "3" || $moaaas2 === "3")
							{
							$moaaas2 == "03";
							}
							elseif($moaaas2 == 4 || $moaaas2 === 4 || $moaaas2 == "4" || $moaaas2 === "4")
							{
							$moaaas2 == "04";
							}
							elseif($moaaas2 == 5 || $moaaas2 === 5 || $moaaas2 == "5" || $moaaas2 === "5")
							{
							$moaaas2 == "05";
							}
							elseif($moaaas2 == 6  || $moaaas2 === 6 || $moaaas2 == "6" || $moaaas2 === "6")
							{
							$moaaas2 == "06";
							}
							elseif($moaaas2 == 7 || $moaaas2 === 7 || $moaaas2 == "7" || $moaaas2 === "7")
							{
							$moaaas2 == "07";
							}
							elseif($moaaas2 == 8 || $moaaas2 === 8 || $moaaas2 == "8" || $moaaas2 === "8")
							{
							$moaaas2 == "08";
							}
							elseif($moaaas2 == 9 || $moaaas2 === 9 || $moaaas2 == "9" || $moaaas2 === "9")
							{
							$moaaas2 == "09";
							}
							else
							{}
						}
						$_SESSION['ANN2'] = $annee2;
						$_SESSION['MON2'] = $moaaas2;
						$_SESSION['JOU2'] = $jour2;
						
					
						// REVALIDATION_SERVEUR
						$pagecontent = "Votre serveur est actuellement actif jusqu'&agrave; la date du <b>
						".$_SESSION['fdate']."</b> (Nous sommes le <b>".$jour."/".$mois."/".$annee."</b>). Si vous revalidez le serveur, 
						il sera actif jusqu'au <b>".$jour2."/".$moaaas2."/".$annee2."</b> à midi. Si vous souhaitez confirmer cela, veuillez lire et 
						accepter les CGU puis cliquer sur \"relancer le serveur\".
						<form action=\"index.php?page=server&amp;task=update\" method=\"post\">
						<textarea cols=\"70\" rows=\"15\" readonly>".GCU_GET()."</textarea><br />
						<input type=\"checkbox\" name=\"regagree\" onClick=\"ChangeStatut(this.form)\" /> 
						J'ai lu et j'accepte les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
						d'utilisation</a> de TS3S.ORG.<br />
						<input type=\"submit\" value=\"Relancer le serveur\" name=\"validation\" disabled />
						</form>";
						$header_bonus = 	"<script type=\"text/javascript\">
																function ChangeStatut(formulaire) {
																if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
																if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
																}
																</script> ";
					}
				}
				else
				{
					// ts3s_SERVER_INFO
					$IACST = mysql_fetch_array(mysql_query('SELECT is_active FROM ts3s_servers WHERE uid=\''.$_SESSION['UID'].'\' '));
					$_SESSION['IAC'] = $IACST['is_active'];
					if($_SESSION['IAC'] == 1)
					{
					$IAC = "<img src=\"images/on.png\" alt=\"actif\" /> Serveur Actif.";
					$REV_S = "[<a href=\"index.php?page=server&task=update\">Revalider le serveur</a>]";
					}
					elseif($_SESSION['IAC'] == 0)
					{
					$IAC = "<img src=\"images/off.png\" alt=\"inactif\" /> Serveur Inactif.";
					$REV_S = "";
					}
					elseif($_SESSION['IAC'] == 2)
					{
					$IAC = "<img src=\"images/NaN.png\" alt=\"actif\" /> Serveur actif jusqu'&agrave; fermeture de TS3S";
					$REV_S = "";
					$_SESSION['fdate'] = "--- Aucune &eacute;ch&eacute;ance. ---";
					}
					else
					{
					$IAC = "Erreur d'analyse SQL.";
					}
					$pagecontent = "
					Si vous n'avez plus besoin de votre serveur teamspeak 3, contactez l'administrateur via <a href=\"index.php?page=contact\">ce formulaire</a> en pr&eacute;cisant votre nom de compte, et port de serveur.
					<br />
					</font><br /><table width=\"600\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
									<tr>
								<td colspan=\"2\" id=\"srv_top\" width=\"600\" height=\"130\">
								</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>IP</b>:&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['sip']."</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>PORT</b>:&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['sport']."</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>SLOTS</b>:&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['sslots']."</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>ServerID</b>:&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['SID']." (machineID: ".$_SESSION['mid'].")</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>Cl&eacute; priv.</b> :&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['PKEY']."</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>Date revalidation</b>:&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['cdate']."</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>A renouveler avant le</b>:&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"red\"><b>".$_SESSION['fdate']." avant Midi</b></font>
								".$REV_S."</td>
							</tr>
							<tr>
								<td id=\"srv_left\" width=\"200\" height=\"30\">
								<b>Status du serveur</b> :&nbsp;&nbsp;&nbsp;</td>
								<td id=\"srv_right\" width=\"400\" height=\"30\">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$IAC."</td>
							</tr>
							<tr>
								<td colspan=\"2\" id=\"srv_bottom\" width=\"600\" height=\"40\">
								</td>
							</tr>
						</table><br />
						<br /><font color=\"red\"><b><u>Information:</u></b> Le port TCP (pour les Viewers) sont organis&eacute;s comme suit:
					<i><ul>
					<li>Ports serveurs 19987 &agrave; 19999 : TCP 10011</li>
					<li>Ports serveurs 20020 &agrave; 20029 : TCP 10012</li>
					<li>Ports serveurs 10040 &agrave; 10049 : TCP 10014</li>
					<li>Ports serveurs 10050 &agrave; 10059 : TCP 10015</li>
					<li>Ports serveurs 10060 &agrave; 10069 : TCP 10016</li>
					<li>Ports serveurs 10070 &agrave; 10079 : TCP 10017</li>
					<li>Ports serveurs 10080 &agrave; 10089 : TCP 10018</li>
					</ul></i>
					
					<br /><br />";
				}		
			$basepos = "Compte";
			$absolutpos = "Informations serveur";
			$pagetitle = "Mon Serveur";
			}
		}
		elseif($_GET['page'] == 'commander')
		{
			if($_SESSION['SID'] != 0)
			{
				header('Location:index.php?page=server');
			}
			
			if($_SESSION['secure_level'] < 1){ header("location: index.php?page=denied"); }
			
			mysql_num_rows(mysql_query("SELECT * FROM ts3s_reqs WHERE uid=".$_SESSION['UID']." LIMIT 0,1")) != 0 ? header('location: index.php?page=rqpos') : null;
			
			$pagecontent = "Les demandes de serveurs sont actuellement ferm&eacute;es suite aux soucis de black-listing.";
		
				if(!empty($_POST['c1']) && !empty($_POST['c2']) && !empty($_POST['c3']))
				{
					$st = $_POST['C4'] == "on" ? "on" : "off";
					if(mysql_query('INSERT INTO ts3s_reqs VALUES (
					\'\', 
					\''.$_SESSION['UID'].'\', 
					\'server\', 
					\''.addslashes($_POST['c1']).'\', 
					\''.addslashes($_POST['c2']).'\', 
					\''.substr(mysql_real_escape_string($_POST['c3']), 0, 650).'\', 
					\''.$st.'\',
					\'en cours\')'
					))
					{
					$pagecontent = "Demande bien envoy&eacute;e ! Merci de votre confiance envers TS3S. <a href=\"index.php?page=\">Retour &agrave; l'accueil</a>";
					$rq_info = 	"<html><head><title>Mail de TS3S</title></head><body>
					Bonjour, <br /><br />
								Nous avons bien re&ccedil;u votre demande de serveur Teamspeak 3.<br /><br />
								Suite &agrave; votre demande, nous vous informons qu'il se peut que vous attendiez assez longtemps avant d'obtenir 
								votre serveur, car nous avons beaucoups de demandes.<br /><br />
								Vous pouvez consulter votre position dans la file d'attente en cliquant ici:<br />
								<a href=\"http://www.ts3s.org/index.php?page=rqpos\">http://www.ts3s.org/index.php?page=rqpos</a><br /><br /><br />
								Cordialement,<br />
								l'&eacute;quipe TS3S.</body></html>";
								// MAIL NEW REQUEST
					@mail("balkeyser@live.fr", "[TS3S] nouvelle demande de TS", "Nouvelle demande recue.\n\n pseudo: ".$_SESSION['pseudo']."\n date: ".date("d-m-Y H:i")."\n\nMerci de vous rendre sur le site.", $headers.$headers_bcc);
					
					@mail($_SESSION['mail'], "Votre requete TS3S", $rq_info, $headers);
					
					}
					else
					{
					$pagecontent = "Erreur lors de l'envoi de la demande. Veuillez contacter l'administrateur.";
					}
				}
				else
				{
				// ts3s_SERVER_COMMAND
				// DEBUT ZONE REQUETE
				$pagecontent.= 	"Bienvenue dans la page de commande de serveurs TS3S. Dans cette partie, vous allez &ecirc;tre dans 
				la capacit&eacute; de demander a obtenir un serveur pour votre clan ou guilde, d'une capacit&eacute; de 50 slots.
				<br /><br /><form method=\"post\" action=\"index.php?page=commander\"><br />
				<h5>Attention: Vous n'avez droit qu'a une seule requ&ecirc;te. Veillez &agrave; remplir tout les champs correctement. tout les champs sont obligatoires.</h5><br />
				<b>Votre nom de clan / guilde</b>:
				<br /><input type=\"text\" name=\"c1\" maxlength=\"55\" size=\"40\" />
				<br />
				<b>Votre jeu principal</b>:
				<br /><input type=\"text\" name=\"c2\" maxlength=\"55\" size=\"40\" /><br />
				<b>Service d'Hosting des partenaires de TS3S</b>:<br />
				<input type=\"checkbox\" name=\"C4\" id=\"C4\" /> <label for=\"C4\">Autoriser les serveurs d'Hosting</label><br />
				<i>(Cela consiste &agrave; &ecirc;tre (peut-&ecirc;tre) sur un serveur d'un de nos clients Hosting. Cela ne changera pas le fait 
				que votre serveur est totalement priv&eacute;, mais le propri&eacute;taire de la license est libre de choix de vous retirer votre 
				serveur ou non, m&ecirc;me si cela n'a que tr&egrave;s peu de chances d'arriver. Vous n'&ecirc;tes bien &eacute;videment pas oblig&eacute; 
				d'accepter cela, c'est totalement optionnel.)</i><br />
				<b>Comment avez-vous connu notre site ?</b>:
				<br /><textarea cols=\"40\" onkeyup=\"this.value = this.value.slice(0, 650)\" onchange=\"this.value = this.value.slice(0, 254)\" rows=\"8\" name=\"c3\" maxlength=\"255\"></textarea>
				<br />
				<textarea cols=\"70\" rows=\"15\" readonly>".GCU_GET()."</textarea>
				<br />
				en cliquant sur le bouton, vous confirmez avoir lu et accept&eacute; les <a href=\"index.php?page=CGU\" target=\"_blank\">Conditions g&eacute;n&eacute;rales 
						d'utilisation</a> de TS3S.ORG.<br />
						<input type=\"submit\" value=\"J'accepte, commander mon serveur\"  name=\"validation\" />
				</form><br />";
				
				$basepos = "Compte";
				$absolutpos = "Commander un serveur";
				$pagetitle = "Commande";
				$header_bonus = "<script type=\"text/javascript\">
											function ChangeStatut(formulaire) {
											if(formulaire.regagree.checked == true) {formulaire.validation.disabled = false }
											if(formulaire.regagree.checked == false) {formulaire.validation.disabled = true }
											}
											</script>";}
			
			
			
				$basepos = "Compte";
				$absolutpos = "Commander un serveur";
				$pagetitle = "Commande";
		}
		elseif($_GET['page'] == 'disable')
		{
			if($_SESSION['secure_level'] < 8)
			{
				header('location: index.php?page=denied');
			}
			
			if($_POST['step'] == "1")
			{
					if(!isset($_POST['nb']) || $_POST['nb'] == NULL || $_POST['nb'] <= 0 || $_POST['nb'] >= 30 || !is_numeric($_POST['nb']))
						{
							header('location: index.php?page=disable');
						}
						
					$pagecontent = "Entrez le port de chaque serveur a couper:<br /><form action=\"index.php?page=disable\" method=\"post\">
					<input type=\"hidden\" name=\"step\" value=\"2\" />";
					$_SESSION['max_servers_disable'] = $_POST['nb'];
					for($i = 1; $i <= $_SESSION['max_servers_disable']; $i++)
					{
						$pagecontent.= "Serveur #".$i.": PORT <input type=\"text\" name=\"sv-".$i."\" size=\"7\" />
						<input type=\"checkbox\" name=\"ban-".$i."\" /> Serveur illegal<br />";
					}
					$pagecontent.= "<input type=\"submit\" value=\"desactiver les serveurs\" /></form>";
			}
			elseif($_POST['step'] == "2")
			{
				// definition mail bannissement
				$mail_bannissement = 	"
				<html><head><title>Mail de TS3S</title></head><body>
				<img src=\"http://ts3s.org/images/mail_server.png\"<br /><br />
										Bonjour,<br /><br />
										
										Nous vous informons que votre serveur a &eacute;t&eacute; d&eacute;sactiv&eacute; suite &agrave;
										un non respect des Conditions G&eacute;n&eacute;rales d'Utilisation des services TS3S.<br /><br />
										
										Cette action a &eacute;t&eacute; r&eacute;alis&eacute;e par l'administrateur <b>".$_SESSION['DN']."</b>.
										<br /><br />
										
										Si vous ne comprennez pas en quoi le serveur est en contradiction avec les CGU de TS3S, nous vous invitons &agrave;
										nous contacter via les diff&eacute;rents moyens mis &agrave; votre disposition:<br />
										* - Via le Support Audio: <i>188.165.195.82</i>,<br />
										* - Via mail: <i>postmaster@ts3s.org</i>,<br />
										* - Via twitter: <a href=\"http://www.twitter.com/_Aenoa\">_Aenoa</a> (Fondateur de TS3S.org);<br /><br />
										
										Cordialement,<br />
										l'&Eacute;quipe TS3S.<br /><br /><br />
										Nb: Ceci est un message totalement automatis&eacute;.
										</body></html>";

				// code analyse
				
				for($i = 1; $i <= $_SESSION['max_servers_disable']; $i++)
					{
						if(!isset($_POST['sv-'.$i]) || $_POST['sv-'.$i] == NULL  || !is_numeric($_POST['sv-'.$i]))
						{
							header('location: index.php?page=disable');
						}
					}
				$pagecontent = "traitement en cours... <br /><br />";
				
				for($i = 1; $i <= $_SESSION['max_servers_disable']; $i++)
					{
						$id_cible = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_servers WHERE is_active='1' AND sport=".$_POST['sv-'.$i]."")) or die("id_cible bugged ".$_POST['sv-'.$i]);
						$ok = true;
						if(mysql_num_rows(mysql_query("SELECT * FROM ts3s_servers WHERE is_active='1' AND sport='".$_POST['sv-'.$i]."'")) == 0)
						{
							$pagecontent.= "<font color=darkblue><b>serveur ".$_POST['sv-'.$i]." inexistant</b></font>;<br />";
							$ok = false;
						}
						elseif($ok && mysql_query("UPDATE ts3s_servers SET is_active='0' WHERE is_active='1' AND sport='".$_POST['sv-'.$i]."' LIMIT 1"))
						{
							$is_it = "";
							if($_POST['ban-'.$i] == "on")
							{
								$mail_cible = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_members WHERE id=".$id_cible['uid']." LIMIT 1")) or die("mail_cible bugged");
								mail($mail_cible['mail'], "TS3S: Etat de votre serveur TS3S", $mail_bannissement, $headers.$headers_bcc) or die("mail sender bugged");
								$is_it = " (illegal)";
							}
							$pagecontent.= "serveur ".$_POST['sv-'.$i]." coup&eacute;;".$is_it."<br />";
							
						}
						else
						{
							$pagecontent.= "<font color=red><b>Erreur avec le serveur ".$_POST['sv-'.$i]."</b></font>;<br />";
						}
					}
					unset($_SESSION['max_servers_disable']);
				$pagecontent.= "<br />traitement termin&eacute;.";
			}
			else
			{
				$pagecontent = "Entrez le nombre de serveurs a desactiver: <form action=\"index.php?page=disable\" method=\"post\">
				<input type=\"hidden\" name=\"step\" value=\"1\" /><input type=\"text\" size=\"4\" name=\"nb\" />\t
				<input type=\"submit\" value=\"entrer les ports\" />
				</form>";
			}
		}
		elseif($_GET['page'] == 'denied')
		{
		$pagecontent = 
		"<div id=\"header_403\"><h1>Erreur de serveur</h1></div>
		<div id=\"content_403\">
 		<div class=\"content-container_403\"><fieldset>
  		<h2>403 - Interdit : accès refusé.</h2>

  		<h3>Vous n'avez pas l'autorisation d'afficher ce répertoire ou cette page à l'aide des informations d'identification que vous avez fournies.
		</h3>
 		</fieldset></div>
		</div>";
		$basepos = "Global";
				$absolutpos = "Acc&egrave;s refus&eacute;";
				$pagetitle = "#403 - Acc&egrave;s interdit";
		}
		
		elseif($_GET['page'] == 'recrutement')
		{
			$pagecontent = 	"<br /><p>Bienvenue dans la section recrutement du site de TS3S !</p>
<p>Dans cette section, nous allons vous communiquer ce que nous recherchons afin de remplir et parfaire notre équipe.</p>
<p>Postes a promouvoir :</p><br />

<h2>Aucun pour le moment.</h2>";	
		$basepos = "Global";
		$absolutpos = "concours";
		$pagetitle = "Concours Steam";
	}
	elseif($_GET['page'] == 'support')
	{
		//+++
		$_SESSION['secure_level'] < 3 ? header('location: index.php?page=denied') : true;
		
		$pagecontent = "";
		if($_GET['task'] == NULL || empty($_GET['task']))
		{
			
			// Page d'accueil de support
			// Affiche la liste des tickets
			$pagecontent.= 	"<p class=\"indented\">Bienvenue sur notre page de gestion de ticket. Sur cette page, vous 
							avez la possibilit&eacute; de cr&eacute;er, lire et changer vos demandes d'assistance ou vos 
							d&eacute;clarations d'incidents.</p>
							
							<p class=\"center\">
								<a href=\"index.php?page=support&amp;task=add\">
									<img src=\"images/buttons/ticket_create.png\" alt=\"Cr&eacute;er une nouvelle demande\" />
								</a>
							</p>
							
							<h4 class=\"center\">Liste de vos requ&ecirc;tes</h4>";
			$query = mysql_query("SELECT * FROM ts3s_support WHERE user_id=".$_SESSION['UID']." AND subject <> 're' GROUP BY ticket_id ORDER BY id DESC");

			if(mysql_num_rows($query) != 0)
			{
				$pagecontent.=	"
									<table align=\"center\" width=\"600\" border=\"0\">
						<tr>
							<th width=\"100\">
								Num&eacute;ro de ticket
							</th>
							<th width=\"150\">
								Derni&egrave;re activit&eacute;
							</th>
							<th width=\"150\">
								Sujet du contact
							</th>
							<th width=\"100\">
								&Eacute;tat actuel
							</th>
						</tr>";
						$color = 0;
				while($returned = mysql_fetch_array($query))
				{
					$damn  = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_support WHERE ticket_id='".$returned['ticket_id']."' 
					ORDER BY id DESC LIMIT 0,1"));
					
					/*
					$coloring = $color % 2 == 0 ? " style=\"background:#efefef;\"" : "";
					$pagecontent.= 	"<tr".$coloring.">
							<td width=\"100\"> ".$returned['ticket_id']." </td>
							<td width=\"150\"> ".TranslateDate($damn['date'])." </td>
							<td width=\"150\"><i>
								<a href=\"index.php?page=support&amp;task=read&amp;ticket_id=".$returned['ticket_id']."\">
								".str_replace(array("<",">"), array("&lt;", "&gt;"), strtolower(substr($returned['subject'], 0, 30)))."</a>
							</i></td>
							<td width=\"100\">".TicketGetStatus($damn['status'])."</td>
						</tr>";
					$color ++;
				}
				*/
						$coloring1 = $color1 % 2 == 0 ? " style=\"background:#efefef;\"" : "";
						$coloring2 = $color2 % 2 == 0 ? " style=\"background:#efefef;\"" : "";
						if($damn['status'] == "closed" || $damn['status'] == "sucess" && $returned['subject'] != 're')
						{
							$dide.= "<tr".$coloring2.">
								<td width=\"100\"> ".$returned['ticket_id']." </td>
								<td width=\"150\"> ".TranslateDate($damn['date'])." </td>
								<td width=\"150\"><i>
									<a href=\"index.php?page=support&amp;task=read&amp;ticket_id=".$returned['ticket_id']."\">
									".str_replace(array("<",">"), array("&lt;", "&gt;"), strtolower(substr($returned['subject'], 0, 30)))."</a>
								</i></td>
								<td width=\"100\">".TicketGetStatus($damn['status'])."</td>
							</tr>";
							$color2++;
						}
						elseif($returned['subject'] != 're')
						{
						$todo= 	"<tr".$coloring1.">
								<td width=\"100\"> ".$returned['ticket_id']." </td>
								<td width=\"150\"> ".TranslateDate($damn['date'])." </td>
								<td width=\"150\"><i>
									<a href=\"index.php?page=support&amp;task=read&amp;ticket_id=".$returned['ticket_id']."\">
									".str_replace(array("<",">"), array("&lt;", "&gt;"), strtolower(substr($returned['subject'], 0, 30)))."</a>
								</i></td>
								<td width=\"100\">".TicketGetStatus($damn['status'])."</td>
							</tr>";
							$color1 ++;
						}
						else
						{
						 //nothing to do
						}
						
					}
					
					$pagecontent.=	$todo."<tr><td colspan=\"4\"><hr /></td></tr>".$dide."</table>";
			}
			else
			{
				$pagecontent.= 	"<h5 class=\"center\">Vous n'avez pas de requ&ecirc;te.<h5>";
			}
			
			if($_SESSION['secure_level'] >= 4)
			{
				$pagecontent.= 	"<h4 class=\"center\">Toute les requ&ecirc;tes</h4>";
				// A CORRIGER CI DESSOUS - ORDER DU PREMIER MESSAGE
				$query2 = mysql_query("SELECT * FROM ts3s_support GROUP BY ticket_id ORDER BY id DESC");
				if(mysql_num_rows($query2) != 0)
				{
					$pagecontent.=	"
										<table align=\"center\" width=\"600\" border=\"0\">
							<tr>
								<th width=\"100\">
									Num&eacute;ro de ticket
								</th>
								<th width=\"150\">
									Derni&egrave;re activit&eacute;
								</th>
								<th width=\"150\">
									Sujet du contact
								</th>
								<th width=\"100\">
									&Eacute;tat actuel
								</th>
							</tr>";
					$color = 0;
					$stamina = true;
					$todo = "";
					$dide = "";
					while($returned = mysql_fetch_array($query2))
					{
						$returne = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_support 
						WHERE ticket_id='".mysql_real_escape_string($returned['ticket_id'])."'
						ORDER BY id DESC
						LIMIT 0,1"));
						$name = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_support 
						WHERE ticket_id='".mysql_real_escape_string($returned['ticket_id'])."' AND is_first='oui' 
						ORDER BY id
						LIMIT 0,1"));
						$coloring1 = $color1 % 2 == 0 ? " style=\"background:#efefef;\"" : "";
						$coloring2 = $color2 % 2 == 0 ? " style=\"background:#efefef;\"" : "";
						if($returned['status'] == "closed" || $returned['status'] == "sucess")
						{
							$dide.= "<tr".$coloring2.">
								<td width=\"100\"> ".$returned['ticket_id']." </td>
								<td width=\"150\"> ".TranslateDate($returne['date'])." </td>
								<td width=\"150\"><i>
									<a href=\"index.php?page=support&amp;task=read&amp;ticket_id=".$returned['ticket_id']."\">
									".str_replace(array("<",">"), array("&lt;", "&gt;"), strtolower(substr($name['subject'], 0, 30)))."</a>
								</i></td>
								<td width=\"100\">".TicketGetStatus($returne['status'])."</td>
							</tr>";
							$color2++;
						}
						else
						{
						$pagecontent.= 	"<tr".$coloring1.">
								<td width=\"100\"> ".$returned['ticket_id']." </td>
								<td width=\"150\"> ".TranslateDate($returne['date'])." </td>
								<td width=\"150\"><i>
									<a href=\"index.php?page=support&amp;task=read&amp;ticket_id=".$returned['ticket_id']."\">
									".str_replace(array("<",">"), array("&lt;", "&gt;"), strtolower(substr($name['subject'], 0, 30)))."</a>
								</i></td>
								<td width=\"100\">".TicketGetStatus($returne['status'])."</td>
							</tr>";
							$color1 ++;
						}
						
					}
					
					$pagecontent.=	$todo."<tr><td colspan=\"4\"><hr /></td></tr>".$dide."</table>";
				}
				else
				{
					$pagecontent.= 	"<h5 class=\"center\">Pas de requ&ecirc;te.<h5>";
				}
			}
			
			
		}
		elseif($_GET['task'] == "read")
		{
			
			// Page de lecture / réponse au ticket
			if(!empty($_GET['ticket_id']))
			{
				$check = mysql_num_rows(mysql_query("SELECT * FROM ts3s_support WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."' AND 
				user_id=".$_SESSION['UID']." ORDER BY id"));
				if($check != 0 || $_SESSION['secure_level'] >= 4)	
				{
					if($_GET['mod'] == "reply")
					{
						// reponse detectee
						$contenu = mysql_real_escape_string($_POST['content']);
						$counting = mysql_num_rows(mysql_query("SELECT content FROM 
						ts3s_support 
						WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."' 
						AND content LIKE '%".$contenu."%'"));
						
						if($counting == 0)
						{
						// ###11
							$state = $_SESSION['secure_level'] < 4 ? "admin-reply" : "user-reply";
							
							if(mysql_query("INSERT INTO ts3s_support VALUES(
							'',
							'".$_SESSION['UID']."',
							'".$_GET['ticket_id']."',
							'non',
							'RE',
							'".$contenu."',
							'".date("Y").":".date("m").":".date("d").":".date("H").":".date("i")."',
							'".$state."')"))
							{
								$pagecontent.= 	"<h6 class=\"center\">Votre r&eacute;ponse a &eacute;t&eacute; ajout&eacute;e.</h6>";
								$aa = mysql_fetch_array(mysql_query("SELECT user_id FROM ts3s_support WHERE ticket_id='".$_GET['ticket_id']."' LIMIT 0,1"));
								$bb = mysql_fetch_array(mysql_query("SELECT mail FROM ts3s_members WHERE id=".$aa['user_id']." LIMIT 0,1"));
								
								//$targeting = $_SESSION['secure_level']  4 ? $bb['mail'] : "root";
								$targ = $_SESSION['secure_level'] < 4 ? "admin" : "user";
								mail("root", "TS3S - Ticket support mis a jour", "".SendTicketInfo($targ, $_GET['ticket_id'])."", $headers);
								mail($bb['mail'], "TS3S - Ticket support mis a jour", "".SendTicketInfo($targ, $_GET['ticket_id'])."", $headers);
							}
							else
							{
								$pagecontent.= 	"<h5 class=\"center\">Impossible d'ajouter votre r&eacute;ponse...</h5>";
							}
						}
						else
						{
							$pagecontent.= 	"<h5 class=\"center\">Le ticket contient (en grande partie) le m&ecirc;me que votre ancien post. 
							Merci de ne pas faire de duplication.</h5>";
						}
					}
					else
					{
						// Pas d'action requise, aucune reponse
					}
					
					
					$tofetch1 = mysql_query("SELECT * FROM ts3s_support WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."' ORDER BY id DESC");				
					$tofetch2 = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_support WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."' ORDER BY id DESC LIMIT 0,1"));
					
					if($tofetch2['status'] != "closed" && $tofetch2['status'] != "sucess")
					{
						$pagecontent.=	"<p class=\"center\">";
							if($_SESSION['secure_level'] >= 4)
							{
							 $pagecontent.=	"<p class=\"WARN center\">D&eacute;finir le nouvel &eacute;tat du ticket:<br />
												[<a href=\"index.php?page=support&amp;task=close&amp;ticket_id=".mysql_real_escape_string($_GET['ticket_id'])."&amp;args=inbound\">En cours de traitement</a>] - 
												[<a href=\"index.php?page=support&amp;task=close&amp;ticket_id=".mysql_real_escape_string($_GET['ticket_id'])."&amp;args=sucess\">Achev&eacute;e</a>] - 
												[<a href=\"index.php?page=support&amp;task=close&amp;ticket_id=".mysql_real_escape_string($_GET['ticket_id'])."&amp;args=closed\">Ferm&eacute;e</a>] - 
												[<a href=\"index.php?page=support&amp;task=close&amp;ticket_id=".mysql_real_escape_string($_GET['ticket_id'])."&amp;args=user-reply\">Attente d'une r&eacute;ponse</a>] 
											</p>";
							}
						$pagecontent.=	"<a href=\"
											index.php?page=support&amp;task=close&amp;ticket_id=".mysql_real_escape_string($_GET['ticket_id'])."\">
											Le ticket est actuellement ouvert. 
											Vous pouvez le d&eacute;clarer comme termin&eacute; en cliquant ici
										</a>.
										<h4 class=\"center\">R&eacute;pondre / ajouter des informations au ticket:</h4>
										<form action=\"
										index.php?page=support&amp;task=read&amp;
										ticket_id=".mysql_real_escape_string($_GET['ticket_id'])."&amp;mod=reply\" method=\"post\">
<textarea class=\"textarea-medium\" name=\"content\"></textarea><br />
											<input type=\"submit\" value=\"Envoyer mes donn&eacute;es\" />
										</form>
									</p>
									<hr />";
					}
					else
					{
						$pagecontent.=	"<h5 class=\"center\">Ce ticket est ferm&eacute; et reste disponible en lecture seule uniquement.</h5>";
					}
									
					$pagecontent.=	"<table align=\"center\" border=\"0\" width=\"600\">";
					while($fetched = mysql_fetch_array($tofetch1))
					{
						$user = mysql_fetch_array(mysql_query(
						"SELECT display_name,secure_level FROM ts3s_members WHERE id=".$fetched['user_id']." LIMIT 0,1"));
						$contenu_sujet = $user['secure_level'] > 4 ? "<font color=\"darkgreen\">".nl2br(str_replace(array("<",">"), array("&lt;", "&gt;"), $fetched['content']))."</font>" : nl2br(str_replace(array("<",">"), array("&lt;", "&gt;"), $fetched['content']));
						$pagecontent.=	"<tr><td>Message de: <b>".$user['display_name']."</b> (".GetRank($user['secure_level']).")<br />
										Date: le <b>".TranslateDate($fetched['date'])."</b></td></tr>
										<tr><td><i>".$contenu_sujet."</i>
										<hr />
										</td></tr>
										";
					}
					
					$pagecontent.=	"</table>";
					
				}
				else
				{
					$pagecontent.=	"<h5 class=\"center\">Cette requ&ecirc;te ne vous appartient pas.</h5>";
				}
			}
			else
			{
				$pagecontent.=	"<h5 class=\"center\">Aucun ID de requ&ecirc;te fourni...</h5>";
			}
		
		}
		elseif($_GET['task'] == "add")
		{
			// Ajouter un ticket
			if($_GET['mod'] == "sended")
			{
				if(!empty($_POST['type']) && !empty($_POST['sujet']) && !empty($_POST['content']))
				{
					$user_id = $_SESSION['secure_level'] < 4 ? $_SESSION['UID'] : intval($_POST['user_id']);
					
					$content = mysql_real_escape_string($_POST['content']);
					$subject = mysql_real_escape_string($_POST['sujet']);
					$type = 	$_POST['type'] == "INC" || 
								$_POST['type'] == "INF" || 
								$_POST['type'] == "MUT" || 
								$_POST['type'] == "HOS" || 
								$_POST['type'] == "REC" || 
								$_POST['type'] == "UND" ? mysql_real_escape_string($_POST['type']) : "UND";
					
					$asking = mysql_query("SELECT * FROM ts3s_support 
									WHERE user_id=".$user_id." 
									AND ticket_id LIKE '".$type."%' 
									AND is_first='oui' ORDER BY id DESC LIMIT 0,1");
									
					$asking_count = mysql_num_rows($asking);
					if($asking_count != 0)
					{
						$asking_fetch = mysql_fetch_assoc($asking);
						$var = explode("-", $asking_fetch['ticket_id']);
						if($var['1'] == NULL || $var['1'] == 0)
						{
							$touse = "1";
						}
						else
						{
							$touse = intval($var['1']);
							$touse ++;
						}
					}
					else
					{
						$touse = "1";
					}
									
					$ticket_value = $type.$user_id."-".$touse;
					$pagecontent.= mysql_query("INSERT INTO ts3s_support VALUES(
								'', 
								'".$user_id."', 
								'".$ticket_value."',
								'oui',
								'".$subject."',
								'".$content."',
								'".date("Y").":".date("m").":".date("d").":".date("H").":".date("i")."',
								'admin-reply')") ? 
										"<h6 class=\"center\">Votre demande a &eacute;t&eacute; enregistr&eacute;e sous le ticket <u>".$ticket_value."</u>.</h6>" : 
										"<h5 class=\"center\">Votre demande n'a pas su &ecirc;tre enregistr&eacute;e. contactez un administrateur.</h5>";
					$pagecontent.= 	"<a class=\"center\" href=\"index.php?page=support\">Retour a la liste des tickets</a><br />";
					//##POST2
								$targetin = mysql_fetch_array(mysql_query("SELECT * FROM ts3s_members WHERE id=".$user_id." LIMIT 0,1"));
								$targeting = $targetin['mail'];
								mail($targeting, "TS3S - ajout du ticket ".$ticket_value."", "".SendTicketInfo('both', $ticket_value)."", $headers.$headers_bcc);
					
					
				}
				else
				{
					$pagecontent.= "<h5>Veuillez remplir tout les champs.</h5>";
				}
			}
			else
			{
				// aucune entrée
			}
			
			$pagecontent.= 	"<p class=\"indented\">
								Vous avez la possibilit&eacute; d'effectuer une demande d'assistance pour diff&eacute;rentes raisons possibles. 
								Vous devez, pour nous faciliter le travail, nous indiquer le plus de d&eacute;tails possibles, a conditions que 
								cela reste dans le sujet de la demande.<br /><br />
								
								Notez que vous devez remplir l'int&eacute;gralit&eacute; des champs.
								</p>
								
								<form action=\"index.php?page=support&amp;task=add&amp;mod=sended\" method=\"post\">";
								
			if($_SESSION['secure_level'] >= 4)
			{
				$pagecontent.= 	"	<p class=\"WARN\">Num&eacute;ro du compte: (Visible par membres TS3S uniquement)<br />
									<input type=\"text\" name=\"user_id\" size=\"5\" maxlength=\"4\" value=\"".$_SESSION['UID']."\" /> 
									</p><br />";
			}
								
			$pagecontent.= 		"
									Cat&eacute;gorie du probl&egrave;me: <br />
									<select name=\"type\">
										<option value=\"INC\">D&eacute;claration d'incident</option>
										<option value=\"HOS\">Serveurs Hosting</option>
										<option value=\"MUT\">Serveurs mutualis&eacute;s</option>
										<option value=\"REC\">Relatif au recrutement</option>
										<option value=\"INF\">Question, information</option>
										<option value=\"UND\" selected=\"selected\">Autre</option>
									</select>
									<br /><br />
									
									Titre du message: <br />
									<input type=\"text\" size=\"45\" maxlength=\"55\" name=\"sujet\" />
									<br /><br />
									
									Votre message: <br />
									<textarea name=\"content\" cols=\"65\" rows=\"15\"></textarea>
									<br /><br />
									
									<input type=\"submit\" value=\"Envoyer votre ticket\" />
								</form>
								";
		}
		elseif($_GET['task'] == "close")
		{
			// Fermer un ticket
			if(!empty($_GET['ticket_id']))
			{
				$check = mysql_num_rows(mysql_query("SELECT * FROM ts3s_support
				 WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."' 
				 AND user_id=".$_SESSION['UID']."
				 '"));

				 
				if($check != 0 || $_SESSION['secure_level'] >= 4)
				{
					if(!empty($_GET['args']) && $_SESSION['secure_level'] >= 4)
					{
						if($_GET['args'] == "closed" ||  $_GET['args'] == "inbound" ||  $_GET['args'] == "sucess" || $_GET['args'] == "user-reply")
						{
							$status = $_GET['args'];
						}
						else
						{
							$status = "sucess";
						}
						if(mysql_query("UPDATE ts3s_support SET status='".$status."' 
						WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."'"))
						{
							$pagecontent.= 	"<h6 class=\"center\">Cette requ&ecirc;te a &eacute;t&eacute; modifi&eacute;e.</h6>";
							
						}
						else
						{
							$pagecontent.= 	"<h5 class=\"center\">Echec de la mise en etat de la requ&ecirc;te.</h5>";
						}
					}
					else
					{
						if(mysql_query("UPDATE ts3s_support SET status='sucess' WHERE ticket_id='".mysql_real_escape_string($_GET['ticket_id'])."'"))
						{
							$pagecontent.= 	"<h6 class=\"center\">Votre requ&ecirc;te a &eacute;t&eacute; ferm&eacute;e.</h6>";
							
						}
						else
						{
							$pagecontent.= 	"<h5 class=\"center\">Echec de la mise en etat de la requ&ecirc;te.</h5>";
						}
					}
				}
				else
				{
					$pagecontent.= 	"<h5 class=\"center\">Ce ticket n'est pas le votre.</h5>";
				}
				
				$pagecontent.= 	"<a href=\"index.php?page=support\">Retour a la liste des tickets</a>";
			}
			else
			{
				$pagecontent.= 	"<h5 class=\"center\">Aucun numero de ticket indiqu&eacute;.</h5>";
			}
		}
		else
		{
			// Aucune correspondance
			$pagecontent.= 	"<h5 class=\"center\">Le contenu de cette requ&ecirc;te n'est pas g&eacute;r&eacute;.</h5>";	
		}
		$pagetitle = "SUPPORT";
		//+++
	}
	elseif($_GET['page'] == "beta")
	{
		$_SESSION['secure_level'] < 3 ? header('location: index.php?page=denied') : true;
		$pagecontent = "";
		$pagecontent.= @file_get_contents('uploads/todolist.htpswd');
		
		$pagetitle = "BETA V3";
	}
	
	
	
		// ######################## E L S E       F I N A L ######################
	else
		{
			/*$pagecontent = 
		"<div id=\"header_403\"><h1>Erreur de serveur</h1></div>
		<div id=\"content_403\">
 		<div class=\"content-container_403\"><fieldset>
  		<h2>404 - Page introuvable</h2>

  		<h3>Nous ne pouvons pas d&eacute;finir quel est la page que vous souhaitez chercher. Si vous avez entr&eacute; vous m&ecirc;me l'adresse, v&eacute;rifiez la casse.</h3>
 		</fieldset></div>
		</div>";
		*/
		
		$pagecontent = 	"<div align=center>
						<h1>Oh gosh ! C'est une erreur !</h1>
						<img src=\"images/oh_gosh_400.png\" /><br />
						<h5>Il semblerait que la page demand&eacute;e n'aie pas &eacute;t&eacute; trouv&eacute;e ! D&eacute;sol&eacute; :(</h5>
						</div>";
			$basepos = "Accueil";
			$absolutpos = "Erreur (404)";
			$pagetitle = "#404 - Page non trouv&eacute;e";
		}
		
		
// CODE POUR LE TOP RIGHT MENU
if(isset($_SESSION['pseudo']))
	{}
	else
	{$_SESSION['pseudo'] = "Invit&eacute;";}
	
	if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != "Invit&eacute;")
	{
		$topright = "<a href=\"index.php?page=disconnect\">Se d&eacute;connecter</a>";
		$menu = 	"<font class=\"TITRES\">Menu G&eacute;n&eacute;ral</font><br />
						<a href=\"index.php?page=accueil\">Accueil</a><br />
						<a href=\"index.php?page=offre\">Notre offre</a><br  />
						<a href=\"index.php?page=tutoriaux\">Tutoriaux</a><br  />
						<a href=\"index.php?page=staff\">l'&eacute;quipe TS3S</a><br  />
						<a href=\"index.php?page=status\" class=\"srv_a\">&Eacute;tat des serveurs</a><br />
						<a href=\"index.php?page=about\">A propos</a><br  />
						<a href=\"index.php?page=webinfo\">Statistiques</a>
						
						<br /><br />
						<font class=\"TITRES\">Menu Utilisateur</font><br />
						<a href=\"index.php?page=disconnect\">D&eacute;connexion</a><br  />
						<a href=\"index.php?page=profil\">Mon profil</a><br  />
						<a href=\"index.php?page=options\">Mes param&egrave;tres</a><br  />
					";
						if(isset($_SESSION['sport']))
						{
							$menu.=	"<a href=\"index.php?page=server\">Mon serveur</a><br />";
						}
						elseif(!isset($_SESSION['sport']) && mysql_num_rows(mysql_query("SELECT * FROM ts3s_reqs WHERE uid=".$_SESSION['UID']." LIMIT 0,1")) == 1)
						{
							$menu.=	"
									<a href=\"index.php?page=rqpos\">Ma requ&ecirc;te</a><br />";
						}
						else
						{
							$menu.= "<a href=\"index.php?page=commander\">Commander un serveur</a><br  />";
						}
		$menu.=			"<br />";
						
						
						if($_SESSION['secure_level'] >= 4)
						{
							$rq = mysql_num_rows(mysql_query('SELECT * FROM ts3s_reqs WHERE status=\'en cours\''));
							if($rq > 0)
							{
							$sta = "[<font color=\"red\"><b>".$rq."</b></font>] ";
							}
							else
							{
							$sta = NULL;
							}
							$menu.=	"<font class=\"TITRES\">Menu Administrateur</font><br />
									<a href=\"index.php?page=acc_list\">Liste des comptes</a> (4+)<br />
									<a href=\"index.php?page=srv_list\">Liste des serveurs</a> (4+)<br />
									".$sta."<a href=\"index.php?page=reqs\">Gestion des Requ&ecirc;tes</a> (6+)<br />
									<a href=\"index.php?page=logs\">Historique</a> (8+)<br />
									<br />
									<a href=\"index.php?page=crypteur\">Crypteur de Password</a> (4+)<br />
									<a href=\"index.php?page=seeprof&sp=1\">Visionner un profil utilisateur</a> (4+)<br />
									<a href=\"index.php?page=disable\">D&eacute;sactiver un serveur</a> (8+)<br />
									<a href=\"index.php?FUCKTHISSHIT=ACTIVATED\">[BOUTON D'URGENCE]</a> (8+)<br />";
						}
						
						
	}
	else
	{
		$topright = "<a href=\"index.php?page=login\">Identification</a> &Xi; <a href=\"index.php?page=acc_create\">Inscription</a>";
		$menu = 	"
						<a href=\"index.php?page=accueil\">Accueil</a><br />
						<a href=\"index.php?page=offre\">Notre offre</a><br  />
						<a href=\"index.php?page=tutoriaux\">Tutoriaux</a><br  />
						<a href=\"index.php?page=staff\">l'&eacute;quipe TS3S</a><br  />
						<a href=\"index.php?page=status\" class=\"srv_a\">&Eacute;tat des serveurs</a><br />
						<a href=\"index.php?page=about\">A propos</a><br  />
						<a href=\"index.php?page=webinfo\">Statistiques</a>
						<br /><br />
						<font class=\"TITRES\">Menu Utilisateur</font><br />
						<a href=\"index.php?page=login\">Connexion</a><br  />
						<a href=\"index.php?page=acc_create\">Créer un compte</a><br  />
						<br /><br /><img src=\"images/micrologo.png\" align=\"center\" alt=\"\" /><br />
					";
	}

		//	
		//	------------------------------
		//	-  CODE GENERAL DE LA PAGE   -
		//	------------------------------
		//	
		?>
