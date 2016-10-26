#!/usr/bin/php

	<?php
	
	mysql_connect('localhost', 'vikingsdsite', 'tango007');
	mysql_select_db('vikingsdsite');
	
	
	
	$etape = mysql_query("SELECT * FROM AE_MailingQueue WHERE is_queued='1' LIMIT 1");
	$count = mysql_num_rows($etape);
	if($count == 1)
	{
	$by_step = $etape['by_step'];
	$step = $etape['etape'];
	$actual = ($step - 1 ) * $by_step;
	$secured = $etape['slr'];
	$mailing_ID = $etape['id'];
	
	$sql = "SELECT mail FROM ts3s_members WHERE secure_level>='".$secured."' ORDER BY id";
	$sql2 = "SELECT mail FROM ts3s_members WHERE secure_level>='".$secured."' LIMIT ".$actual.", ".$by_step;
	$nombre_de_comptes = mysql_num_rows(mysql_query($sql));
	
	$mail_subject = "TS3S - ".$etape['Mail_Subject'];
	$mail_content = "	<img src=\"http://www.ts3s.org/images/newsletter_header.png\" 
						alt=\"TS3S - Newsletter Image\" /><br /><br />
					Bonjour, <br /><br />".nl2br($etape['Mail_Content']);
	
	$cible = $etape['Status_Target'];
	$bcc = "";
	
	$request = mysql_query($sql2);
	
	while($liste = mysql_fetch_array($request))
	{
		$bcc.= "<".$liste['mail'].">, ";
	}
	$bcc.= "<postmaster@ts3s.org>";
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: TS3S <postmaster@ts3s.org>' . "\r\n";
		$headers_b  = 'BCC: ' . $bcc . "\r\n";
		
	mail("postmaster@ts3s.org", $mail_subject, $mail_content, $headers.$headers_b);
	$info = "	[TS3S - RAPPORT D'ENVOI DE NEWSLETTER]<br /><br />
				ID Mailing List:<b> $mailing_ID </b><br />
				Passe N° <b>$step</b><br />
				Mails par Passe: <b>$by_step</b><br />
				Niveau d'envoi: <b>$secured</b><br />
				Clients de départ: <b>$actual</b><br />
				Sujet: <b>$mail_subject</b><br />
				Destinataires: ".htmlspecialchars($bcc)."<br />
				Date / Heure: <b>".date("d-m-Y on H:i")."</b>";
	mail($cible, "TS3S - RAPPORT D'ENVOI", $info, $headers);
	
	if($actual >= $nombre_de_comptes)
	{
		$step++;
		mysql_query("UPDATE AE_MailingQueue SET step='".$step."' WHERE id='".$mailing_ID."' LIMIT 1");
		mysql_query("UPDATE AE_MailingQueue SET is_queued='0' WHERE id='".$mailing_ID."' AND is_queued='1' LIMIT 1");
	}
	else
	{
		$step++;
		mysql_query("UPDATE AE_MailingQueue SET step='".$step."' WHERE id='".$mailing_ID."' LIMIT 1");
	}
	
		echo $info;
	}
	else
	{
		
	}
	
?>
