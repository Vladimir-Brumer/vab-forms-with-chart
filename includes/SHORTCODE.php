<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*************************************
*************************************
****CREATE SHORTCODE AND FORM HANDLER
*************************************
*************************************/
$vabfwc = 1;
add_shortcode( "VABFWC", "vabfwc_short" );
if ( ! function_exists( 'vabfwc_short' ) ) {
	function vabfwc_short( $atts ) {
	ob_start();
	$id										= ! empty( $atts['id'] ) ? intval( $atts['id'] ) : '';
	$VABFWC_FORMSA				= get_post_meta( $id, 'VABFWC_FORM', true );
	$VABFWC_FORMSA_OPT		= get_post_meta( $id, 'VABFWC_FORM_OPT', true );
	$i										= esc_html( 'diagramm_' . $GLOBALS['vabfwc'] );
	$i										= ! empty( $atts['id'] ) ? intval( $atts['id'] ) . '_' . $i : $i;
	$VABFWC								=	new VABFWC_Forms_Protect( $i );
	$VABFWC_AD						=	new VABFWC_Forms_Protect( 'veri_Ad_' . $i );
	$VABFWC_Prot_Arg			= 	array( /* wp_kses */
		'input'							=>	array(
			'type'						=>	array(),
			'id'							=>	array(),
			'class'						=>	array(),
			'name'						=>	array(),
			'value'						=>	array(),
			'checked'					=>	array(),
			'onfocus'					=>	array(),
			'onchange'				=>	array(),
		),
	);
	$Class_Adm_Arg				= 	array( /* wp_kses */
		'div'								=>	array(
			'class'						=>	array(),
			'tabindex'				=>	array(),
		),
		'table'							=>	array(),
		'thead'							=>	array(),
		'tbody'							=>	array(),
		'tr'								=>	array(),
		'th'								=>	array(),
		'td'								=>	array(),
		'label'							=>	array(
			'for'							=>	array(),
			'style'						=>	array(),
		),
		'input'							=>	array(
			'id'							=>	array(),
			'style'						=>	array(),
			'type'						=>	array(),
			'name'						=>	array(),
			'value'						=>	array(),
			'onclick'					=>	array(),
		),
		'tfoot'							=>	array(),
		'a'									=>	array(
			'target'					=>	array(),
			'href'						=>	array(),
		),
	);
	$Class_Graphic_Arg		= 	array( /* wp_kses */
		'div'								=>	array(
			'class'						=>	array(),
			'style'						=>	array(),
		),
		'br'								=>	array(),
		'center'						=>	array(),
		'style'							=>	array(
			'type'						=>	array(),
		),
		'span'							=>	array(
			'class'						=>	array(),
			'style'						=>	array(),
		),
	);
	$Erchik								= esc_html__( 'Check entered data', 'VABFWC' );
	$VABFWC_SizeSum				=	0;
	$F_S_M								=	! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_SIZE'] ) ? sanitize_text_field( intval( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_SIZE'] ) ) : '3';
	$FileSendErorSizeInf	=	'';	/* filtering the output through wp_kses */
	$FileSendErorSize			=	'';	/* filtering the output through wp_kses */
	$SiZeS								=	esc_html__( 'Uploaded file size bytes/Mb', 'VABFWC' );
	$VABFWC_multipart			= ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_AddFile'] ) ? esc_attr( 'enctype=multipart/form-data' ) : '';
	$VABFWC_TEMP					=	esc_html( VABFWC_UPLOAD_DIR .'/VABFWC/temp' );
	$VABFWC_EXT 					= ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_EXT'] ) ? explode( ",", $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_EXT'] ) : array();
	if ( ! empty( $VABFWC_FORMSA ) ) {
		$VABFWC_FORMSA		= $VABFWC_FORMSA[$id];
		/* HANDLER */
		foreach( $VABFWC_FORMSA as $k => $v ) {
			${$k . 'Error'}		= '';
			${$k . 'put'}			= '';
		}
	$VABFWC_Class = new VABFWC_Class( $id );
	$hasErrorAd	= false;
	if ( isset( $_POST['submitres'] ) ) {
		$CheckFieldsErorAd	=	$VABFWC_AD->CheckFields();
		if ( $CheckFieldsErorAd == true ) {
			$hasErrorAd = true;
		}
		if ( $hasErrorAd !== true ) {
			unlink( $VABFWC_Class->mIP );
			unlink( $VABFWC_Class->mDATE );
			unlink( $VABFWC_Class->mAGENT );
		}
	}
	if ( isset( $_POST['submitted'] ) ) {
		if ( ! file_exists( $VABFWC_Class->FD ) && ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi'] ) ) {
			mkdir( $VABFWC_Class->FD, 0755, true );
		}
	if ( empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDate']) || empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoIP']) || empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoAgent']) ) {
			if ( ! file_exists( $VABFWC_Class->mIP ) && ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi'] ) ) {
				file_put_contents( $VABFWC_Class->mIP, '', FILE_APPEND );
			}
			if ( ! file_exists( $VABFWC_Class->mDATE ) && ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi'] ) ) {
				file_put_contents( $VABFWC_Class->mDATE, '', FILE_APPEND );
			}
			if ( ! file_exists( $VABFWC_Class->mAGENT ) && ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi'] ) ) {
				file_put_contents( $VABFWC_Class->mAGENT, '', FILE_APPEND );
			}
	}
		$sub			= esc_html__( 'Message from the site', 'VABFWC' )
							. ' «'
							. esc_html( get_bloginfo( 'name' ) )
							. '» / «'
							. esc_html__( 'Form', 'VABFWC' )
							. ' - '
							. esc_html( get_the_title( $id ) )
							. '»';
		$Titla		= esc_html__( 'Questionnaire content', 'VABFWC' );
		$IP				= esc_html__( 'IP address', 'VABFWC' )
							. ": " . $GLOBALS['VABFWC_IP'];
		$AVT			= esc_html__( 'The form author Vladimir Anatolyevich Brumer', 'VABFWC' )
							. '<br>'
							.	'<a style="padding:4px;font-size:14px;text-decoration:underline;color:#FFF;" href="'
							. esc_html( 'mailto:m@it-vab.ru' ) . '" target="_blank" rel="noopener noreferrer">'
							. esc_html( 'm@it-vab.ru' ) . '</a>'.
							' ¯\_(ツ)_/¯ '
							. '<a style="padding:4px;font-size:14px;text-decoration:underline;color:#FFF;" href="'
							. esc_html( 'mailto:brumer.vladimir@mail.ru' ) . '" target="_blank" rel="noopener noreferrer">'
							. esc_html( 'brumer.vladimir@mail.ru' ) . '</a>';
		$Qw				= esc_html__( 'Question', 'VABFWC' );
		$Ans			= esc_html__( 'Possible answer', 'VABFWC' );
		$Oth			= esc_html__( 'Your own answer', 'VABFWC' );
		$tdIn			= '<td style="max-width:15px;min-width:15px;width:15px;"></td>';
		$sty			= 'style="padding-bottom:22px;padding-top:44px;"';
		$ChBody		= '';
		$hasError	= false;
		foreach( $VABFWC_FORMSA as $k => $v ) {
			if ( ! file_exists( $VABFWC_Class->$k ) && ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi'] ) ) {
				file_put_contents( $VABFWC_Class->$k, '', FILE_APPEND );
			}
			if ( $v['type'] == 'checkbox' ) {
				$coanswer		= count( $v['answer'] );
				$ChBody		 .= '<tr style="color:#FFF;">'
											. '<td valign="top">'
												. esc_html ( $v['question'] )
											. '</td>'
											. '<td valign="top" align="center">';
				$chekX			= 0;
				for ( $i = 0; $i < $coanswer; $i++ ) {
					if ( isset($_POST[$k . $i]) && $_POST[$k . $i] !== '' ) {
						$chekX++;
						$ok = sanitize_text_field( $_POST[$k . $i] );
						$ChBody .= '<p>' . $ok . '';
						${$k . 'put'} .= $ok . "\n";
					}
				}
				$ChBody .= '</td>'
								 . '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
				if ( $chekX == 0 ) {
					$hasError = true;
					${$k . 'Error'} = $Erchik;
				}
			} else if ( $v['type'] == 'url' ) {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && VABFWC_Chek_url( $_POST[$k] )&& VABFWC_is_url( $_POST[$k] ) ) {
						$ok = sanitize_url( $_POST[$k] );
					}	else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}
					${$k . 'put'} .= $ok . "\n";
			$ChBody .= '<tr style="color:#FFF;">'
								. '<td valign="top">'
									. esc_html ( $v['question'] )
								. '</td>'
								. '<td valign="top" align="center">'
									. '<a style="color:#FFF;" href="' . esc_url( $ok ) . '" target="_blank" rel="noopener noreferrer">'
										. esc_html ( $ok )
									. '</a>'
								. '</td>'
								. '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
			}else if($v['type']=='tel' ) {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && !VABFWC_Chek_url( $_POST[$k] ) && VABFWC_is_tel( $_POST[$k] ) ) {
						$ok = sanitize_text_field( $_POST[$k] );
					}	else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}
					${$k . 'put'} .= $ok . "\n";
			$ChBody .= '<tr style="color:#FFF;">'
								. '<td valign="top">'
									. esc_html ( $v['question'] )
								. '</td>'
								. '<td valign="top" align="center">'
									. esc_html ( $ok )
								. '</td>'
								. '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
			}else if($v['type']=='email' ) {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && !VABFWC_Chek_url( $_POST[$k] ) && VABFWC_is_email( $_POST[$k] ) ) {
						$ok = sanitize_text_field( $_POST[$k] );
					}	else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}
					${$k . 'put'} .= $ok . "\n";
			$ChBody .= '<tr style="color:#FFF;">'
								. '<td valign="top">'
									. esc_html ( $v['question'] )
								. '</td>'
								. '<td valign="top" align="center">'
									. '<a style="color:#FFF;" href="' . esc_url( $ok ) . '" target="_blank" rel="noopener noreferrer">'
										. esc_html ( $ok )
									. '</a>'
								. '</td>'
								. '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
			}else if($v['type']=='date' ) {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && !VABFWC_Chek_url( $_POST[$k] ) && VABFWC_is_date( $_POST[$k] ) ) {
						$ok = sanitize_text_field( $_POST[$k] );
					}	else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}
					${$k . 'put'} .= $ok . "\n";
			$ChBody .= '<tr style="color:#FFF;">'
								. '<td valign="top">'
									. esc_html ( $v['question'] )
								. '</td>'
								. '<td valign="top" align="center">'
									. esc_html ( $ok )
								. '</td>'
								. '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
			}else if($v['type']=='number'||$v['type']=='range' ) {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && !VABFWC_Chek_url( $_POST[$k] ) && VABFWC_is_number( $_POST[$k] ) ) {
						$ok = sanitize_text_field( intval( $_POST[$k] ) );
					}	else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}
					${$k . 'put'} .= $ok . "\n";
			$ChBody .= '<tr style="color:#FFF;">'
								. '<td valign="top">'
									. esc_html ( $v['question'] )
								. '</td>'
								. '<td valign="top" align="center">'
									. esc_html ( $ok )
								. '</td>'
								. '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
			} else if ( $v['type'] == 'select') {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && $_POST[$k] !== 'default' && !VABFWC_Chek_url( $_POST[$k] ) ) {
						$ok = sanitize_text_field( $_POST[$k] );
					}	else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}
					${$k . 'put'} .= $ok . "\n";
			$ChBody .= '<tr style="color:#FFF;">'
								. '<td valign="top">'
									. esc_html ( $v['question'] )
								. '</td>'
								. '<td valign="top" align="center">'
									. esc_html ( $ok )
								. '</td>'
								. '<td valign="top" align="center">'
									. ' - '
								. '</td>'
							. '</tr>';
			}	else {
				if ( ( isset($_POST[$k]) && $_POST[$k] !== '' && !VABFWC_Chek_url( $_POST[$k] ) ) || ( !empty( $_POST[$k . 'area'] ) && !VABFWC_Chek_url( $_POST[$k . 'area'] ) ) ) {
					$ok = '';
					if ( isset($_POST[$k]) && $_POST[$k] !== '' && !VABFWC_Chek_url( $_POST[$k] ) ) {
						$ok = sanitize_text_field( $_POST[$k] );
					} else {
						$hasError = true;
						${$k . 'Error'} = $Erchik;
					}/*remove so that the field is different without choosing the radio passed*/
					${$k . 'put'} .= $ok . "\n";
				$ChBody .= '<tr style="color:#FFF;">'
									. '<td valign="top">'
										. esc_html ( $v['question'] )
									. '</td>'
									. '<td valign="top" align="center">'
										. esc_html ( $ok )
									. '</td>';
					if ( !empty($_POST[$k . 'area']) && !VABFWC_Chek_url( $_POST[$k . 'area'] ) ) {
						$ChBody .= '<td valign="top" align="center">'
												. sanitize_text_field( $_POST[$k . 'area'] )
										. '</td>'
								. '</tr>';
					} else if ( !empty($_POST[$k . 'area']) && VABFWC_Chek_url( $_POST[$k . 'area'] ) ) {
						$hasError = true;
						${$k . 'Error'} = $Erchik . '. ' . esc_html__( 'Links not allowed', 'VABFWC' ) . ' !!!';
					}
					if ( empty($_POST[$k . 'area']) ) {
						$ChBody .= '<td valign="top" align="center">'
												. ' - '
										. '</td>'
									. '</tr>';
					}
				} else {
					$hasError = true;
					${$k . 'Error'} = $Erchik;
				}
			}
		}
		$body_Arg							= 	array( /* wp_kses */
			'html'							=>	array(
				'xmlns'						=>	array(),
			),
			'head'							=>	array(),
			'title'							=>	array(),
			'body'							=>	array(
				'class'						=>	array(),
				'style'						=>	array(),
			),
			'table'							=>	array(
				'style'						=>	array(),
				'cellspacing'			=>	array(),
				'cellpadding'			=>	array(),
				'border'					=>	array(),
				'align'						=>	array(),
			),
			'tbody'							=>	array(),
			'tr'								=>	array(
				'style'						=>	array(),
			),
			'th'								=>	array(
				'style'						=>	array(),
				'valign'					=>	array(),
			),
			'td'								=>	array(
				'style'						=>	array(),
				'align'						=>	array(),
				'valign'					=>	array(),
			),
			'label'							=>	array(
				'for'							=>	array(),
				'style'						=>	array(),
			),
			'p'									=>	array(
				'style'						=>	array(),
			),
			'a'									=>	array(
				'target'					=>	array(),
				'href'						=>	array(),
				'rel'							=>	array(),
				'style'						=>	array(),
			),
			'br'								=>	array(),
		);
		$body =	'<html xmlns="http://www.w3.org/1999/xhtml">' .
							'<head>' .
								'<title>' . $sub . '</title>' .
							'</head>' .
							'<body class="myBody" style="padding:0px;margin:0px;word-break:normal;">' .
								'<table style="background-color:#014266;max-width:100%;min-width:100%;padding:0;width:100%;" width="100%" cellspacing="0" cellpadding="0" border="0">' .
								'<tbody>' .
									'<tr>' .
										'<td valign="middle" align="center">' .
											'<table style="border:0;max-width:600px;padding:0;width:100%;" cellspacing="0" cellpadding="0" border="0" align="center">' .
												'<tbody>' .
													'<tr>' .
														$tdIn .
														'<td style="padding-bottom:50px;padding-top:30px;" align="center">' .
															'<p style="color:#FFF;font-size:20px;font-style:normal;font-weight:100;line-height:24px;margin-bottom:0;margin-top:0;padding-bottom:10px;">' .
																'<strong>' . $Titla . '</strong>' .
															'</p>' .
															'<table style="border:0;max-width:600px;padding:0;width:100%;" cellspacing="2" border="1" cellpadding="5">' .
																'<tbody>' .
																	'<tr style="text-align:center;color:#FFF;">' .
																		'<th ' . $sty . ' valign="top">' .
																			'<p style="padding:4px;">' . $Qw .
																		'</th>' .
																		'<th ' . $sty . ' valign="top">' .
																			'<p style="padding:4px;">' . $Ans .
																		'</th>' .
																		'<th ' . $sty . ' valign="top">' .
																			'<p style="padding:4px;">' . $Oth .
																		'</th>' .
																	'</tr>' .
																	$ChBody .
																'</tbody>' .
															'</table>' .
															'<table cellspacing="0" cellpadding="0">' .
																'<tbody>' .
																		'<tr style="text-align:center;">' .
																			'<td colspan="2" valign="top">' .
																				'<p style="color:#FFF;font-size:14px;"> ' . $IP . ' </p>' .
																			'</td>' .
																		'</tr>' .
																		'<tr style="text-align:center;">' .
																			'<td style="padding:4px;font-size:14px;color:#FFF;" valign="top" align="center">' .
																				$AVT .
																			'</td>' .
																		'</tr>' .
																'</tbody>' .
															'</table>' .
														'</td>' .
														$tdIn .
													'</tr>' .
												'</tbody>' .
											'</table>' .
										'</td>' .
									'</tr>' .
								'</tbody>' .
							'</table>' .
						'</body>' .
					'</html>';
		$body =	wp_kses( $body, $body_Arg );
		$CheckFieldsEror	=	$VABFWC->CheckFields();
		if ( $CheckFieldsEror == true ) {
			$hasError										= true;
		}
		$attachment 									= array();
		if ( ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_AddFile'] ) ) {
			for( $i = 0, $iC = count( $_FILES['VABFWC_file']['name'] ); $i < $iC; $i++ ) {
				if ( is_uploaded_file( $_FILES['VABFWC_file']['tmp_name'][$i] ) && validate_file( $_FILES['VABFWC_file']['name'][$i], '' ) === 0 ) {
					$vab 										= $i+1;
					$vabContent[$i] 				= chunk_split( base64_encode( file_get_contents( esc_html( $_FILES['VABFWC_file']['tmp_name'][$i] ) ) ) );
					$vabFilesName[$i]				= sanitize_file_name( $_FILES['VABFWC_file']['name'][$i] );
					$fileInfo = wp_check_filetype( basename( $_FILES['VABFWC_file']['name'][$i] ) );
					if ( ! empty( $fileInfo['ext'] ) && is_uploaded_file( $_FILES['VABFWC_file']['tmp_name'][$i] ) ) { /* This file is valid and file uploaded using HTTP POST */
						$FILES_tmp_name[$i]			=  $_FILES['VABFWC_file']['tmp_name'][$i];
						$FILES_type[$i]					= sanitize_mime_type( $_FILES['VABFWC_file']['type'][$i] );
						$FILES_size[$i]					= intval( $_FILES['VABFWC_file']['size'][$i] );
						$FILES_size_Mb[$i]			= intval( $FILES_size[$i] )/1024/1024;
						$ext[$i]								=	substr( $vabFilesName[$i], strpos( $vabFilesName[$i], '.' ), strlen( $vabFilesName[$i] ) - 1 );
						if ( ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_AddFileMulti'] ) ) {
							$VABFWC_SizeSum 		 += $FILES_size[$i];
						}
						if ( $FILES_size[$i] > 1024 * $F_S_M * 1024 ) {
							$FileSendErorSize		 .= '<span class="er">***</span>' . esc_html__(' One or more files exceed the allowed size ', 'VABFWC') . '' . $F_S_M . '' . esc_html__(' Мб','VABFWC') . '<br />';
							$FileSendErorSizeInf .= '<br />' . $vabFilesName[$i] . ' : ' . $SiZeS . ' - ' . $FILES_size[$i] . " / " . $FILES_size_Mb[$i] . '<br />';
							$hasError 						= true;
						}
						if( is_array( $VABFWC_EXT ) && sizeof($VABFWC_EXT) !== 0 && ! in_array( str_replace( '.', '', $ext[$i] ), $VABFWC_EXT ) ){
							$FileSendErorSize		 .= '<span class="er">***</span>' . esc_html__(' One or more files are not in a valid format', 'VABFWC') . '<br />';
							$FileSendErorSizeInf .= ':<br />' . esc_html__('File', 'VABFWC') . ' ' . $vabFilesName[$i];
							$FileSendErorSizeInf .= ' ' . esc_html__('have extension', 'VABFWC') . ' - ' . $ext[$i] . '<br />';
							$hasError 						= true;
						}
						if ( $hasError !== true ) {
							if ( ! file_exists( $VABFWC_TEMP ) ) {
								mkdir( $VABFWC_TEMP, 0755, true );
							}
							move_uploaded_file( $FILES_tmp_name[$i], $VABFWC_TEMP . '/' . basename( $vabFilesName[$i] ) );
							$attachment[]					= $VABFWC_TEMP . '/' . basename( $vabFilesName[$i] );
						}
					}
				}
			}
					if ( ! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_AddFileMulti'] ) && $VABFWC_SizeSum > 1024 * $F_S_M * 1024 ) {
						$FileSendErorSize		 .= '<span class="er">***</span>' . esc_html__(' The total size of files exceeds the allowed size ', 'VABFWC') . '' . $F_S_M . '' . esc_html__(' Мб','VABFWC') . '<br />';
						$hasError 						= true;
					}
		}
		if ( $hasError !== true ) {
			if ( ! empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi']) ) {
				foreach( $VABFWC_FORMSA as $k => $v ) {
					if ( !empty(${$k . 'put'}) ) {
						file_put_contents( $VABFWC_Class->$k, ${$k . 'put'}, FILE_APPEND );
					}
				}
				if ( empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDate']) || empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoIP']) || empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoAgent']) ) {
					$mDATEp 	= empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDate']) ? date("r") . "\n" : " - \n";
					file_put_contents( $VABFWC_Class->mDATE, $mDATEp, FILE_APPEND );
					$mIPp 		= empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoIP']) ? $GLOBALS['VABFWC_IP'] . "\n" : " - \n";
					file_put_contents( $VABFWC_Class->mIP, $mIPp, FILE_APPEND );
					$AGENTp		= empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoAgent']) ? $_SERVER['HTTP_USER_AGENT'] . "\n" : " - \n";
					file_put_contents( $VABFWC_Class->mAGENT, $AGENTp, FILE_APPEND );
				}
			}
			$ADMEm    = get_option('admin_email');
			$emailTo	= $VABFWC_FORMSA_OPT && !empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_MAIL']) ? $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_MAIL'] : get_option('admin_email');
			$headers	= "From:" . $emailTo . "\r\n";
			$headers .= "Reply-To: " . $ADMEm . "\r\n";
			if ( $VABFWC_FORMSA_OPT && !empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_MAIL']) && !empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_MAIL_Copy']) ) {
				$headers .= "Bcc: " . $ADMEm . " <" . $ADMEm . ">\r\n";
			}
			$headers .= "Content-Type:text/html; charset=\"utf-8\"\r\n";
			$headers .= "X-WPVABFWC-Content-Type: text/html\n";
			wp_mail( $emailTo, $sub, $body, $headers, $attachment );
			if ( file_exists( $VABFWC_TEMP ) ) {
				dirDel( $VABFWC_TEMP );
			}
			$emailSent = true;
		}
	}
		/* FINISH OF HANDLER */
	} else {
		return '<div class="contact_message"><h5>' . esc_html__( 'Data array is empty', 'VABFWC' ) . '</h5></div>';
	}
	$placeHolder		= __( 'Text input field...', 'VABFWC' );
	$HolderPlus			= esc_html__( 'Write your answer', 'VABFWC' );
	$sentYN					= '';
	$SentY					= esc_html__( 'Your message was successfully sent', 'VABFWC' ) . '!';
	$SentN					= esc_html__( 'Message not sent', 'VABFWC' ) . '!';
	$ResF						= "";
	$ResFY					= empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi']) || !empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_HideDi']) ? ''
										: ( !empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_ShowDi']) ? esc_html__( 'The results are displayed at the end of the questionnaire', 'VABFWC' ) . '!'
										: esc_html__( 'Results will be displayed after filling out and sending the questionnaire', 'VABFWC' ) . '!' );
	if ( isset($emailSent) && $emailSent == true ) {
		$sentYN		= $SentY;
		$ResFY		= $ResF;
		if ( empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi']) ) {
			ECHO '<div class="contact_message"><span class="VABFWCotrazhenie" title="' . esc_attr( $sentYN ) . '">' . esc_html( $sentYN ) . '</span></div>';
		}
	} else {
		if ( isset($hasError) ) {
			$sentYN	= $SentN;
		}
		ECHO	'<div class="contact_message"><span class="VABFWCotrazhenie" title="' . esc_attr( $sentYN ) . '">' . esc_html( $sentYN ) . '</span><br>',
					'<h5>' . esc_html( $ResFY ) . '</h5></div><br>';
		ECHO '<div id="anketa">',
				 '<form ' . $VABFWC_multipart . ' class="FormS FormSContact" action="' . esc_url( get_the_permalink() ) . '" method="post">';
		ECHO '<div id="UlLi">';
		foreach( $VABFWC_FORMSA as $k => $v ) {
		ECHO '<fieldset><legend>&nbsp;&nbsp;' . esc_html( $v['question'] ) . ': &nbsp;&nbsp;</legend><ul>';
		if ( ${$k . 'Error'} != '' ) {
			ECHO '<div class="errors"><span class="er">***</span> ' . esc_html( ${$k . 'Error'} ) . '</div>';
		}
		if ( $v['type'] == 'text' ) {
			$isset = isset($_POST[$k]) ? sanitize_text_field( $_POST[$k] ) : '';
			ECHO	'<li tabindex="0">',
							'<input size="40" type="text" id="' . esc_attr( $k ) . '" name="' . esc_attr( $k ). '" placeholder="' . esc_html( $placeHolder ) . '" value="' . esc_attr( $isset ) . '">',
						'</li>';
		}
		if ( $v['type'] == 'url' ) {
			$isset = isset($_POST[$k]) ? sanitize_text_field( $_POST[$k] ) : '';
			ECHO	'<li tabindex="0">',
							'<input size="40" type="url" id="' . esc_attr( $k ). '" name="' . esc_attr( $k ). '" title="' . esc_html__( 'URL input field', 'VABFWC' ) . '" placeholder="' . esc_html( $placeHolder ) . '" value="' . esc_url( $isset ) . '">',
						'</li>';
		}
		if ( $v['type'] == 'tel' ) {
			$isset = isset($_POST[$k]) ? sanitize_text_field( $_POST[$k] ) : '';
			ECHO	'<li tabindex="0">',
							'<input size="40" type="tel" id="' . esc_attr( $k ). '" name="' . esc_attr( $k ). '" title="' . esc_html__( 'Phone input field', 'VABFWC' ) . '" placeholder="'.esc_html( $placeHolder ).'" value="' . esc_attr( $isset ) . '">',
						'</li>';
		}
		if ($v['type'] == 'email' ) {
			$isset = isset($_POST[$k]) ? sanitize_text_field( $_POST[$k] ) : '';
			ECHO	'<li tabindex="0">',
							'<input size="40" type="email" id="' . esc_attr( $k ). '" name="' . esc_attr( $k ). '" title="' . esc_html__( 'Email input field', 'VABFWC' ) . '" placeholder="'.esc_html( $placeHolder ).'" value="' . esc_attr( $isset ) . '">',
						'</li>';
		}
		if ( $v['type'] == 'date' ) {
			$isset = isset($_POST[$k]) ? sanitize_text_field( $_POST[$k] ) : '';
			ECHO	'<li tabindex="0">',
							'<input size="40" type="date" id="' . esc_attr( $k ). '" name="' . esc_attr( $k ). '" title="' . esc_html__( 'Input field type «Date»', 'VABFWC' ) . '" placeholder="'.esc_html( $placeHolder ).'" value="' . esc_attr( $isset ) . '">',
						'</li>';
		}
		if ( $v['type'] == 'number' || $v['type'] == 'range' ) {
			$isset		= isset($_POST[$k]) ? sanitize_text_field( intval( $_POST[$k] ) ) : '';
			$TyPe			= $v['type'] == 'number' 	? 'number' : 'range';
			$titles		= $TyPe == 'range' 				? __( 'Input field type «Range»', 'VABFWC' ) : __( 'Input field type «Number»', 'VABFWC' );
			$ScRiPt		= $TyPe == 'range' 				? 'onchange=document.getElementById("'.$k.'_s").innerHTML=this.value' : '';
			$mIn			= !empty($v['min']) 			? $v['min'] : '1';
			$mAx			= !empty($v['max']) 			? $v['max'] : '100';
			$sTEp			= !empty($v['step']) 			? $v['step'] : '1';
			ECHO	$TyPe == 'range' ? '<span id="' . esc_attr( $k . '_s' ) . '">' . esc_html( $isset ) . '</span>' : '' .
						'<li tabindex="0">',
							'<input size="40" type="' . esc_attr( $TyPe ) . '" id="' . esc_attr( $k ). '" ' . esc_js( $ScRiPt ) .' name="' . esc_attr( $k ). '" title="' . esc_html( $titles ) . '" min="' . esc_attr( $mIn ) . '"  max="' . esc_attr( $mAx ) . '" step="' . esc_attr( $sTEp ) .'" value="' . esc_attr( $isset ) . '">',
						'</li>';
		}
		if ( $v['type'] == 'textarea' ) {
			$isset = isset($_POST[$k]) ? sanitize_text_field( $_POST[$k] ) : '';
			ECHO '<li tabindex="0">',
							'<label  for="' . esc_attr( $k ) . '">&nbsp;</label>',
							'<textarea id="' . esc_attr( $k ) . '" name="' . esc_attr( $k ) . '" rows="4" cols="40" placeholder="' . esc_html( $placeHolder ) . '" value="">',
								esc_html( $isset ),
							'</textarea>',
						'</li>';
		}
		if ( $v['type'] == 'radio' || $v['type'] == 'checkbox' || $v['type'] == 'select' ) {
			$coanswer = count( $v['answer'] );
			if ( $v['type'] == 'select' ) {
				ECHO	'<li tabindex="0">',
								'<select name="' . esc_attr( $k ) . '" title="' . esc_html__( 'Input field type «Dropdown list»', 'VABFWC') . '">',
									'<option name="' . esc_attr( $k ) . '" value="default">',
										esc_html__( 'Choose a variant', 'VABFWC' ),
									'</option>';
			}
			for( $ii = 0; $ii < $coanswer; $ii++ ) {
				$isset = '';
				$name = $v['type'] == 'radio' || $v['type'] == 'select' ? $k : $k . $ii;
				if ( $v['type'] == 'checkbox' ) {
					$isset = isset($_POST[$name]) ? 'checked="checked"' : '';
				}
				if ( $v['type'] == 'radio' ) {
					$isset = isset($_POST[$name]) && $_POST[$name] == $v['answer'][$ii] ? 'checked="checked"' : '';
				}
				if ( $v['type'] == 'select' ) {
					$isset = isset($_POST[$name]) && $_POST[$name] == $v['answer'][$ii] ? 'selected="selected"' : '';
					ECHO	'<option name="' . esc_attr( $name ) . '" title="' . esc_attr( $v['answer'][$ii] ) . '" ' . esc_attr( $isset ) . ' value="' . esc_attr( $v['answer'][$ii] ) . '">' . esc_html( $v['answer'][$ii] ) . '</option>';
				} else {
					ECHO	'<li tabindex="0">',
									'<label for="' . esc_attr( $k . $ii ) . '">',
										'<input id="' . esc_attr( $k . $ii ) . '" type="' . esc_attr( $v['type'] ) . '" name="' . esc_attr( $name ) . '" ' . esc_attr( $isset ) . ' title="' . esc_attr( $v['answer'][$ii] ) . '" value="' . esc_attr( $v['answer'][$ii] ) . '"/>',
										esc_html( $v['answer'][$ii] ),
									'</label>',
								'</li>';
				}
			}
			if ( $v['type'] == 'select' ) {
				ECHO		'</select>',
							'</li>';
			}
			if ( $v['type'] == 'radio' && $v['plusArea'] == 'yes' ) {
				$isset = isset($_POST[$k]) && $_POST[$k] == esc_html__( 'Other', 'VABFWC' ) ? 'checked="checked"' : '';
				$issett = isset($_POST[$k . 'area']) ? sanitize_text_field( $_POST[$k . 'area'] ) : '';
				ECHO	'<li tabindex="0">',
								'<label  for="' . esc_attr( $k ) . '">',
									'<input id="' . esc_attr( $k ) . '" type="' . esc_attr( $v['type'] ) . '" name="' . esc_attr( $k ) . '" ' . esc_attr( $isset ) . ' title="' . esc_html__( 'Other', 'VABFWC' ) . '" value="' . esc_html__( 'Other', 'VABFWC' ) . '"/>',
									esc_html__('Other','VABFWC'),
								'</label>',
								'<textarea id="' . esc_attr( $k ) . 'area" name="' . esc_attr( $k ) . 'area" rows="4" cols="40" placeholder="' . esc_html( $placeHolder ) . '" value="">',
									esc_html( $issett ),
								'</textarea>',
							'</li>';
			}
		}
		ECHO '</ul></fieldset>';}
		if ( ! empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_AddFile']) ) {
			$VABFWC_multiple = ! empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_AddFileMulti']) ? 'multiple' : '';
			ECHO	'<fieldset>';
			if ( $FileSendErorSize != '' ) {
				$FileSendErorSize_arg			= 	array(
								'span'						=>	array(
									'class'					=>	array(),
								),
								'br'							=>	array(),
							);
				$FileSendErorSizeInf_arg	= 	array(
								'br'							=>	array(),
							);
				ECHO	'<span class="er">***</span>' . esc_html__(' Sorry, the message was not sent.', 'VABFWC') . '<br />',
							wp_kses( $FileSendErorSize, $FileSendErorSize_arg ),
							wp_kses( $FileSendErorSizeInf, $FileSendErorSizeInf_arg );
			}
			ECHO	'<label for="VABFWC_file" class="VABFWC_fileL">' . esc_html__( 'Select files', 'VABFWC') . '</label>',
						! empty( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_EXT'] ) ? esc_html__( 'Valid File Format', 'VABFWC' ) .
						': ' . str_replace( array( " ", "." ), " ", esc_html( $VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_EXT'] ) ) : '',
						'<input type="file" name="VABFWC_file[]" class="VABFWC_file" id="VABFWC_file" ' . esc_attr( $VABFWC_multiple ) . ' required />',
						'<div id="UploadServerInfo">',
						'</div>',
						'</fieldset>';
		}
		ECHO '</div>';
		ECHO wp_kses( $VABFWC->FieldS(), $VABFWC_Prot_Arg ).
						'<input id="anketaSbros" type="reset" name="profilereset" value="' . esc_attr__( 'Resetting the filled fields', 'VABFWC') . '">',
						'&nbsp;&nbsp;&nbsp;&nbsp;',
						'<input id="anketaSend" type="submit" name="profilesubmit" value="' . esc_attr__( 'Send', 'VABFWC') . '">',
						'<input type="hidden" name="submitted" id="submitted" value="true" />',
					'</form>',
					'</div>';
	}
	if ( ! empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_NoDi']) ) {
		if ( $sentYN == $SentY || is_user_logged_in() && current_user_can( 'administrator' ) ) {
			ECHO	'<form class="FormS FormSContact" action="' . esc_url( get_the_permalink() ) . '" method="post">';
				if ( isset($_POST['submitres']) && $hasErrorAd !== true ) {
					$sentYN = esc_html__( 'Table deleted successfully', 'VABFWC' ) . ' !';
				}
			ECHO	'<div class="contact_message"><span class="VABFWCotrazhenie" title="' . esc_attr( $sentYN ) . '">' . esc_html( $sentYN ) . '</span></div>';
			if ( !empty($VABFWC_FORMSA) ) {
				$VABFWC = new VABFWC_Class_Adm( $id );
				ECHO	'<br>' . wp_kses( $VABFWC->ShoW(), $Class_Adm_Arg );
			}
				ECHO	wp_kses( $VABFWC_AD->FieldS(), $VABFWC_Prot_Arg ) .
							'<input type="hidden" name="submitres" id="submitres" value="true" />';
			ECHO	'</form>';
			if ( !empty($VABFWC_FORMSA) && ( empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_ShowDi']) || $sentYN == $SentY ) && empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_HideDi']) ) {
				$VABFWC = new VABFWC_Class_Graphic( $id );
				ECHO	wp_kses( $VABFWC->ShoW(), $Class_Graphic_Arg );
			}
		}
		if ( $sentYN != $SentY && !empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_ShowDi']) && empty($VABFWC_FORMSA_OPT['VABFWC_FORMSA_OPT_HideDi']) ) {
			$VABFWC = new VABFWC_Class_Graphic( $id );
			ECHO	wp_kses( $VABFWC->ShoW(), $Class_Graphic_Arg );
		}
	}
	$GLOBALS['vabfwc']++;
	return ob_get_clean();
	}
}